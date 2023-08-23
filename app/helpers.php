<?php

use App\Models\Analytic;
use App\Models\Category;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Poll;
use App\Models\PollResult;
use App\Models\Post;
use App\Models\SeoTool;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

/**
 *
 * @return Authenticatable|null
 */
function getLogInUser()
{
    return Auth::user();
}

/**
 * @return mixed
 */
function getAppName()
{
    static $appName;

    if (empty($appName)) {
        $appName = Setting::where('key', '=', 'application_name')->first()->value;
    }

    return $appName;
}

/**
 *
 * @return int
 */
function getLogInUserId()
{
    return Auth::user()->id;
}

/**
 * @return string
 */
function getDashboardURL()
{
    if (Auth::user()->hasRole('clinic_admin')) {
        return 'admin/dashboard';
    }

    return RouteServiceProvider::HOME;
}

/**
 *
 *
 * @return \Illuminate\Support\Collection
 */
function getLanguage()
{
    static $language;
    if (empty($language)) {
        $language = Language::pluck('name', 'id');
    }

    return $language;
}

/**
 *
 * @return \Illuminate\Support\Collection
 */
function getLanguageSet()
{
    $language = Language::pluck('name', 'iso_code');

    return $language;
}

/**
 * @param $langId
 *
 *
 * @return mixed
 */
function getAlbums($langId)
{
    return \App\Models\Album::where('lang_id', $langId)->toBase()->pluck('name', 'id')->toArray();
}

/**
 * @param $albumId
 *
 *
 * @param $langId
 * @return array
 */
function getAlbumCategory($albumId, $langId): array
{
    return \App\Models\AlbumCategory::where('lang_id', $langId)->where('album_id', $albumId)->pluck('name',
        'id')->toArray();
}

/**
 * @param $index
 *
 * @return string
 */
function getRandomColor($index): string
{
    $badgeColors = [
        'primary',
        'success',
        'info',
        'secondary',
        'danger',
        'warning',
    ];
    $number = ceil($index % 6);

    return $badgeColors[$number];
}

/**
 * @param $index
 *
 * @return string
 */
function getParentMenu()
{
    $menu = Menu::whereNotNull('link')->pluck('link', 'id')->sort();

    return $menu;
}

/**
 * @return mixed
 */
function getHeaderElement()
{
    $data['navigations'] = Navigation::with('navigationable')
        ->whereHas('navigationable', function ($q) {
            $q->where('show_in_menu', 1);
        })->whereNull('parent_id')->orderBy('order_id')->get();

    //child
    $data['navigationsTakeData'] = [];
    foreach ($data['navigations'] as $item) {
        $navigationType = $item->navigationable_type == Category::class ? SubCategory::class : $item->navigationable_type;
        $data['navigationsTakeData'][$item->id] = Navigation::with('navigationable')
            ->whereHas('navigationable', function ($q) {
                $q->where('show_in_menu', 1);
            })->where('navigationable_type', $navigationType)
            ->where('parent_id', $item->navigationable_id)->orderBy('order_id')->get();
    }

    $data['pages'] = Page::where('location', Page::MAIN_MENU)->where('visibility', 1)->get()->sort();
    
    return $data;
}

/**
 * @return mixed
 */
function getRecentPost()
{
    return Post::with('language', 'category')->whereVisibility(Post::VISIBILITY_ACTIVE)->latest('id')->take(3)->get();
}

/**
 * @return Category[]|Collection
 */
function getCategory()
{
    return Category::active()->get();
}

/**
 * @return mixed
 */
function getSettingValue()
{
    static $settingValues = [];

    if (empty($settingValues)) {
        $settingValues = Setting::pluck('value', 'key')->toArray();
    }

    return $settingValues;
}

function getUrl()
{
    return Request::url();
}

/**
 *
 *
 * @return array
 */
function getNavigationDetails(): array
{
    //parent navigation get
    $data['navigations'] = Navigation::with('navigationable')
        ->whereHas('navigationable', function ($q) {
            $q->where('show_in_menu', 1);
        })->whereNull('parent_id')->orderBy('order_id')->get();

    $data['menus'] = [];

    foreach ($data['navigations'] as $menu ) {
        if($menu['navigationable']['lang_id'] == getFrontSelectLanguage()){
            $data['menus'][] = $menu;
        }
        elseif($menu->navigationable_type == Menu::class){
            $data['menus'][] = $menu;
        }
    }

    $data['navigations'] = collect($data['menus'])->take(6);
    //child
    $data['navigationsTakeData'] = [];
    foreach ($data['navigations'] as $item) {
        $navigationType = $item->navigationable_type == Category::class ? SubCategory::class : $item->navigationable_type;
        $data['navigationsTakeData'][$item->id] = Navigation::with('navigationable')
            ->whereHas('navigationable', function ($q) {
                $q->where('show_in_menu', 1);
            })->where('navigationable_type', $navigationType)
            ->where('parent_id', $item->navigationable_id)->orderBy('order_id')->get();
    }

    $data['menuCount'] = [];
    foreach($data['navigationsTakeData'] as $menuGet){
          if($menuGet->isEmpty()){
              $data['menuCount'] ;
          }
    }

    //remaining navigation
    $data['navigationsSkipData'] = Navigation::with('navigationable')
        ->whereHas('navigationable', function ($q) {
            $q->where('show_in_menu', 1);
        })->whereNull('parent_id')
        ->whereNotIn('id', $data['navigations']->pluck('id')->toArray())->orderBy('order_id')->get();

    // child
    $data['navigationsSkipItem'] = [];
    foreach ($data['navigationsSkipData'] as $item) {
        $navigationType = $item->navigationable_type == Category::class ? SubCategory::class : $item->navigationable_type;
        $data['navigationsSkipItem'][$item->id] = Navigation::with('navigationable')
            ->whereHas('navigationable', function ($q) {
                $q->where('show_in_menu', 1);
            })->where('navigationable_type', $navigationType)
            ->where('parent_id', $item->navigationable_id)->orderBy('order_id')->get();
    }

    //categoryCount
    $countMenu = Category::whereShowInMenu(1)->where('lang_id', '!=' ,getFrontSelectLanguage())->count();
    //total navigation
    $data['navigationsCount']  = $data['navigationsSkipData']->count()  + $data['navigations']->count() - $countMenu;
    //pages
    $data['pages'] = Page::whereLangId(getFrontSelectLanguage())->where('location', Page::MAIN_MENU)->where('visibility', 1)->get()->sort();

    return $data;
}

/**
 *
 * @return array
 */
function getPopularNews()
{
    $countPosts = DB::table('analytics')->select('post_id',
        DB::raw('count("post_id") as total_count'))->groupBy('post_id')
        ->orderBy('total_count', 'desc')
        ->get();

    $categories = Category::toBase()->pluck('name','id')->toArray();
    $postData = Post::whereVisibility(Post::VISIBILITY_ACTIVE)
        ->whereIn('id', $countPosts->pluck('post_id')->toArray())->get();
    static $popularNews = [];
    $cnt = 0;
    if (empty($popularNews)){
        foreach ($countPosts as $countPost) {
            if ($cnt > 6){
                continue;
            }
            $post = $postData->where('id',$countPost->post_id)->first();
            if(!empty($post)){
                $post = $post->toArray();
                $post['category'] = ['name' => !empty($categories[$post['category_id']]) ? $categories[$post['category_id']] : '' ];
                $popularNews[] = $post;
                $cnt++;
            }
        }
    }

    return $popularNews;
}

/**
 * @param $id
 *
 * @return int
 */
function getPostViewCount($id)
{
    $postViewCount = Analytic::wherePostId($id)->count();

    return $postViewCount;
}

/**
 *
 * @return array
 */
function getPopularTags()
{
    $countPostsTags = DB::table('analytics')->select('post_id',
        DB::raw('count("post_id") as total_count'))->groupBy('post_id')
        ->orderBy('total_count', 'desc')
        ->get();
    
    static $popularTags = [];
    $postData = Post::toBase()->whereVisibility(Post::VISIBILITY_ACTIVE)
        ->whereIn('id', $countPostsTags->pluck('post_id')->toArray())->get();
    $cnt = 0;
    if(empty($popularTags)){
        foreach ($countPostsTags as $countPostsTag) {
            if ($cnt > 6){
                continue;
            }
            $postTag = $postData->where('id',$countPostsTag->post_id)->pluck('tags', 'id')->sort()->first();
            if (!empty($postTag)){
                $popularTags[] = $postTag;
                $cnt++;
            }
        }
    }

    $tagArr = [];
    foreach (array_filter($popularTags) as $tags){
        foreach (explode(',',$tags) as $tag){
            $tagArr[] = $tag;
        }
    }

    return array_unique($tagArr);
}

/**
 *
 *
 * @return Poll[]|Builder[]|Collection
 */
function getPoll()
{
    if (!Auth::check()){
        return Poll::where('lang_id',getFrontSelectLanguage())->where('vote_permission',1)->whereStatus(1)->limit(3)->get();
    }else{
        return Poll::where('lang_id',getFrontSelectLanguage())->whereStatus(1)->limit(3)->get();
    }
}

/**
 *
 *
 * @return string[]
 */
function getOption(): array
{
    return [
        'option1', 'option2', 'option3', 'option4', 'option5', 'option6', 'option7', 'option8', 'option9', 'option10',
    ];
}

/**
 * @param int $pollId
 *
 *
 * @return array
 */
function getPollStatistics($pollId): array
{
    $pollResults = PollResult::with('poll')->wherePollId($pollId)->get();
    $resultsAns = $pollResults->pluck('answer')->toArray();
    $totalPollResults = count($pollResults);
    $totalPerAns = array_count_values($resultsAns);
    $optionAns = [];
    foreach ($pollResults as $result) {
        $poll = $result->poll;
        foreach (getOption() as $option) {
            if (!empty($poll->$option)) {
                $optionAns[$poll->$option] = !empty($totalPerAns[$poll->$option])
                    ? intval($totalPerAns[$poll->$option] * 100 / $totalPollResults) : 0;
            }
        }
    }

    $data['totalPollResults'] = $totalPollResults;
    $data['optionAns'] = $optionAns;
    $data['pollId'] = $pollId;

    return $data;
}

/**
 * @param $id
 * @return string
 */
function getColorClass($id)
{
    $randomClass = ['world', 'technology', 'travel', 'fashion', 'music', 'animal'];
    $index = $id % 5;

    return $randomClass[$index];
}

/**
 *
 * @return array
 */
function getPopulerCategories()
{
    $postCount = DB::table('analytics')->select('post_id',
        DB::raw('count("post_id") as total_count'))->groupBy('post_id')
        ->orderBy('total_count', 'desc')
        ->get();

    $popularCategory = [];

    $posts = Post::toBase()->whereIn('id',$postCount->pluck('post_id')->toArray())->where('visibility',Post::VISIBILITY_ACTIVE)->get()->groupBy('category_id');
    $categories = Category::toBase()->get();
    $cnt = 0;
    foreach ($posts as $id => $post) {
        $category = $categories->where('id',$id)->first();
        if (!empty($category)){
            if ($cnt >10){
                continue;
            }
            $popularCategory[$id]['name'] = $category->name;
            $popularCategory[$id]['slug'] = $category->slug;
            $popularCategory[$id]['posts_count'] = $post->count();
            $cnt++;
        }
    }

    return array_values($popularCategory);
}

/**
 * @param $url
 */
function getNavUrl($url)
{

    $contain = Str::contains($url, 'https');
    if ($contain) {
        return $url;
    } else {
        return "http://".$url;
    }
}

/**
 * @param $body
 *
 * @return string
 */
function getReadingTime($body)
{
    $myContent = $body;
    $word = str_word_count(strip_tags($myContent));
    $m = floor($word / 200);
    $s = floor($word % 200 / (200 / 60));

    if ($s > 30) {
        $m += 1;
        $s = 00;
    } else {
        $s = 00;
    }

    if ($m == 0) {
        $m += 1;
    }

    $time = $m.' minute'.($m == 1 ? '' : 's');

    return $time;
}

/**
 *
 *
 * @return array
 */
function getTrendingPost()
{
    $posts = Analytic::toBase()->pluck('post_id')->toArray();

    $postsCont = array_count_values($posts);
    arsort($postsCont);
    $postIds = array_keys($postsCont);
    $posts = Post::with('category')->whereVisibility(Post::VISIBILITY_ACTIVE)->whereIn('id', $postIds)->get()->groupBy('id')->toArray();
    static $trendingPosts = [];
    $cnt = 1;
    if(empty($trendingPosts)) {
        foreach ($postsCont as $id => $total) {
            if ($cnt > 6) {
                break;
            }

            if (! empty($posts[$id][0])) {
                $trendingPosts[$id] = $posts[$id][0];
                $cnt++;
            }
        }
    }

    return $trendingPosts;
}

/**s
 *
 * @return Post[]|Builder[]|Collection
 */
function getBreakingPost()
{
    $getBreakingPost = Post::whereBreaking(1)->whereVisibility(Post::VISIBILITY_ACTIVE)->get();

    return $getBreakingPost;
}

/**
 *
 * @return Post[]|Builder[]|Collection
 */
function getRecommendedPost()
{
    $recommendedPosts = Post::with('category')->whereRecommended(1)->whereVisibility(Post::VISIBILITY_ACTIVE)
        ->latest()->orderBy('created_at', 'desc')->take(6)->get();

    return $recommendedPosts;
}

/**
 *
 * @return mixed|null
 */
function getSelectLanguage()
{
    $langIdLanguage = empty(Session::get('languageChange')['data']);

    if ($langIdLanguage) {
        $langId = 1;
    } else {
        $langId = Session::get('languageChange')['data'];
    }

    return $langId;
}

/**
 *
 * @return mixed
 */
function getSelectLanguageName()
{
    return Language::find(getSelectLanguage())->name;
}

function getFrontSelectLanguage()
{
    $langIdLanguage = empty(Session::get('frontLanguageChange'));

    if ($langIdLanguage) {
        $langId = getSettingValue()['front_language'];
    } else {
        $langId = Session::get('frontLanguageChange');
    }

    return $langId;
}

/**
 *
 * @return mixed
 */
function getFrontSelectLanguageName()
{
    static $languageName;

    if (empty($languageName)) {
        $languageName = !empty(Language::find(getFrontSelectLanguage())) ? Language::find(getFrontSelectLanguage())->name : '';
    }

    return $languageName;
}

/**
 *
 * @return \Anhskohbo\NoCaptcha\NoCaptcha
 */
function reCaptcha()
{
    $settings = Setting::pluck('value', 'key')->toArray();
    $secret = $settings['secret_key'];
    $sitekey = $settings['site_key'];
    $captcha = new Anhskohbo\NoCaptcha\NoCaptcha($secret, $sitekey);

    return $captcha;
}

/**
 * @return mixed
 */
function getSEOTools()
{
    static $seoTool;

    if (empty($seoTool)) {
        $seoTool = SeoTool::with('language')->first();
    }
    if ($seoTool->language->name == getFrontSelectLanguageName()) {
        return $seoTool;
    };
}

/**
 * @param $range
 * @return array
 */
function getCategoryNumbers($range): array
{
    $result = [];
    $count = 1;
    $start = 1;
    foreach($range as $val) {
        if ($val % 2 == 0){
            $skip = 1;
        }else{
            $skip = 3;
        }
        $result[] = $start;
        $start += $skip;
        $count++;
    }
    
    return array_values(array_unique($result));
}

function getCurrentVersion()
{
    $composerFile = file_get_contents('../composer.json');
    $composerData = json_decode($composerFile, true);

    return $composerData['version'];
}

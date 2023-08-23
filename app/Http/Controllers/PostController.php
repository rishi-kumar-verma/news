<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Analytic;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostController extends AppBaseController
{
    /**
     * @var PostRepository
     */
    private $PostRepository;

    /**
     * CategoryRepository constructor.
     * @param  PostRepository  $PostRepository
     */
    public function __construct(PostRepository $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $subCategories = SubCategory::toBase()->get();
        $categories = Category::toBase()->get();

        return view("post.index", compact('subCategories','categories'));
    }

    /**
     * @param  CreatePostRequest  $request
     *
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreatePostRequest $request)
    {
        if (count(explode(' ', $request->keywords)) > 10) {

            return redirect::back()->withErrors(['Keyword should be of maximum 10 words only']);
        }
        if ($request['scheduled_post'] == 1) {
            $request->validate(['scheduled_post_time' => 'required']);
        }
        $input = $request->all();
        $input['created_by'] = (! empty($input['created_by'])) ? $input['created_by'] : getLogInUserId();
        $this->PostRepository->store($input);

        Flash::success('Post created successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * @param  Request  $request
     *
     *
     * @return Application|Factory|View
     */
    public function postFormat(Request $request)
    {
        $sectionName = ($request->get('section') === null) ? 'post_format' : $request->get('section');

        if ($request->get('section') != null)
        {
            if($sectionName == Post::ARTICLE)
            {
                $sectionType = Post::ARTICLE_TYPE_ACTIVE;
            }
            else if($sectionName == Post::GALLERY)
            {
                $sectionType = Post::GALLERY_TYPE_ACTIVE;
            }
            else if($sectionName == Post::SORT_LIST)
            {
                $sectionType = Post::SORTED_TYPE_ACTIVE;
            }
            else if($sectionName == Post::TRIVIA_QUIZ)
            {
                $sectionType = Post::TRIVIA_TYPE_ACTIVE;
            }
            else if($sectionName == Post::PERSONALITY_QUIZ)
            {
                $sectionType = Post::PERSONALITY_TYPE_ACTIVE;
            }
            else if($sectionName == Post::VIDEO)
            {
                $sectionType = Post::VIDEO_TYPE_ACTIVE;
            }
            else
            {
                $sectionType = Post::AUDIO_TYPE_ACTIVE;
            }

            return view("post.post_table", compact('sectionName', 'sectionType'));
        }

        return view("post.$sectionName", compact('sectionName'));
    }

    /**
     *
     * @param  Request  $request
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function postType(Request $request)
    {
        if ($request->get('section') === null){
            return \redirect(route('posts.index'));
        }
        $sectionName = ($request->get('section') === null) ? 'article-create' : $request->get('section');
        $allStaff = User::where('type', User::STAFF)->pluck('first_name', 'id');

        if ($sectionName == Post::POST_FORMAT) {
            return redirect()->route(Post::POST_FORMAT);
        }
        else if($sectionName == Post::GALLERY_CREATE)
        {
            $sectionType        = Post::GALLERY_TYPE_ACTIVE;
            $sectionAdd         = Post::ADD_GALLERY;
            $addRouteSection    = Post::GALLERY;
        }
        else if($sectionName == Post::SORT_LIST_CREATE)
        {
            $sectionType        = Post::SORTED_TYPE_ACTIVE;
            $sectionAdd         = Post::ADD_SORT_LIST;
            $addRouteSection    = Post::SORT_LIST;
        }
        else if($sectionName == Post::TRIVIA_QUIZ_CREATE)
        {
            $sectionType        = Post::TRIVIA_TYPE_ACTIVE;
            $sectionAdd         = Post::ADD_TRIVIA_QUIZE;
            $addRouteSection    = Post::TRIVIA_QUIZ;
        }
        else if($sectionName == Post::PERSONALITY_QUIZ_CREATE)
        {
            $sectionType        = Post::PERSONALITY_TYPE_ACTIVE;
            $sectionAdd         = Post::ADD_PERSONALITY_QUIZ;
            $addRouteSection    = Post::PERSONALITY_QUIZ;
        }
        else if($sectionName == Post::VIDEO_CREATE)
        {
            $sectionType        = Post::VIDEO_TYPE_ACTIVE;
            $sectionAdd         = Post::ADD_VIDEO;
            $addRouteSection    = Post::VIDEO;
        }
        else if($sectionName == Post::AUDIO_CREATE)
        {
            $sectionType        = Post::AUDIO_TYPE_ACTIVE;
            $sectionAdd         = Post::ADD_AUDIO;
            $addRouteSection    = Post::AUDIO;
        } else{
            $sectionType = Post::ARTICLE_TYPE_ACTIVE;
            $sectionAdd = Post::ADD_ARTICLE;
            $addRouteSection = Post::ARTICLE;
        }

        return view("post.create", compact('sectionName', 'sectionType', 'sectionAdd', 'addRouteSection', 'allStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {

        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->with([
                'language', 'category', 'subCategory', 'postArticle', 'postGalleries.media', 'postSortLists.media',
            ])->findOrFail($post);

        $sectionType = $post->post_types;
        $allStaff = User::where('type', User::STAFF)->pluck('first_name', 'id');

        return view('post.edit', compact('post', 'sectionType', 'allStaff'));
    }

    /**
     * Update the specified Staff in storage.
     *
     * @param  UpdateStaffRequest  $request
     * @param  User  $staff
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdatePostRequest $request)
    {
        if ($request['scheduled_post'] == 1) {
            $request->validate(['scheduled_post_time' => 'required']);
        }
        $input = $request->all();
        $input['created_by'] = (! empty($input['created_by'])) ? $input['created_by'] : getLogInUserId();
        $this->PostRepository->update($input, $input['id']);
        
        Flash::success('Post updated successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return JsonResponse
     */
    public function destroy($post)
    {
        Analytic::wherePostId($post)->delete();
        Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->find($post)->delete();

        return $this->sendSuccess('Post deleted successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function language(Request $request)
    {

        $category = Category::where('lang_id', $request->data)->pluck('id', 'name');

        return $this->sendResponse($category, 'Category retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function category(Request $request)
    {
        $sub_category = SubCategory::where('parent_category_id', $request->cat_id)->where('lang_id',$request->lang_id)
            ->pluck('id', 'name');

        return $this->sendResponse($sub_category, 'Sub category retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function categoryFilter(Request $request)
    {
        if ($request->cat_id == null) {
            $sub_category = SubCategory::all()->pluck('id', 'name');
        } else {
            $sub_category = SubCategory::where('parent_category_id', $request->cat_id)->pluck('id', 'name');
        }

        return $this->sendResponse($sub_category, 'Sub category retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function imgUpload(Request $request)
    {
        $input = $request->all();
        $user = getLogInUser();

        $imageCheck = Media::where('collection_name', User::NEWS_IMAGE)->where('file_name',
            $input['image']->getClientOriginalName())->exists();
        if (! $imageCheck) {
            if ((! empty($input['image']))) {
                $media = $user->addMedia($input['image'])->toMediaCollection(User::NEWS_IMAGE);
            }
            $data['url'] = $media->getFullUrl();
            $data['mediaId'] = $media->id;

            return $this->sendResponse($data, 'Image Upload successfully');
        } else {
            return $this->sendError('Already Image Exist');
        }
    }

    /**
     * @return mixed
     */
    public function imageGet()
    {
        $images = getLogInUser()->getMedia(User::NEWS_IMAGE);
        $data = [];
        foreach ($images as $index => $image) {
            $data[$index]['imageUrls'] = $image->getFullUrl();
            $data[$index]['id'] = $image->id;
        }

        return $this->sendResponse($data, 'img retrieved');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function imageDelete($id)
    {
        $media = Media::whereId($id)->firstorFail();
        $media->delete();

        return $this->sendResponse($media, 'Image Delete successfully');
    }
}

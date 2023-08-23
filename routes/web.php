<?php

use App\Http\Controllers\AlbumCategoriesController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailSettingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\seoToolsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//
//Route::get('/', function () {
//    return (! Auth::check()) ? view('auth.login') : Redirect::to(getDashboardURL());
//})->name('login');

// Update profile
Route::group(['middleware' => ['auth','xss','verified.user']], function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.setting');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('update.profile.setting');
    Route::put('/change-user-password', [UserController::class, 'changePassword'])->name('user.changePassword');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','xss','verified.user']], function () {
    //admin dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/chart', [DashboardController::class, 'getChart'])->name('dashboard.chart');

    //category
    Route::group(['middleware' => ['permission:manage_categories']], function () {
        Route::resource('categories', CategoryController::class);
        Route::post('categories/{category}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //sub category
    Route::group(['middleware' => ['permission:manage_sub_categories']], function () {
        Route::resource('sub-categories',SubCategoryController::class);
    });

    //Page

    Route::group(['middleware' => ['permission:manage_pages']], function () {
        Route::resource('pages', PageController::class);
        Route::post('image-store', [PageController::class, 'imgUpload'])->name('editor.image-upload');
        Route::get('image-get', [PageController::class, 'imageGet'])->name('editor.image-get');
        Route::post('pages-visibility', [PageController::class, 'visibility'])->name('page.visibility');
        Route::get('page-image/{id}', [PageController::class, 'imageDelete'])->name('page-image.destroy');
    });

    //set Language
    Route::get('change-language/{key}', [UserController::class, 'setLanguage'])->name('change-Language');

    //update darkMode Field
    Route::get('update-dark-mode', [UserController::class, 'updateDarkMode'])->name('update-dark-mode');
    
    Route::get('comment-status/{key}', [CommentController::class, 'commentStatus'])->name('admin.comment-status');
    // Role route
    Route::group(['middleware' => ['permission:manage_roles|manage_roles_permission']], function () {
        Route::resource('roles', RoleController::class);
    });

    // Settings routes
    Route::group(['middleware' => ['permission:manage_settings']], function () {
        Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('setting.update');
    });

    // Contacts routes
    Route::group(['middleware' => ['permission:manage_contacts']], function () {
        Route::get('/contacts', [ContactController::class, 'listContact'])->name('contacts.index');
        Route::get('/contacts/edit/{id}', [ContactController::class, 'editContact'])->name('contacts.edit');
        Route::delete('/contacts/{id}', [ContactController::class, 'removeContact'])->name('Contacts.destroy');
    });

    //Mail
    Route::group(['middleware' => ['permission:manage_mail_setting']], function () {
        Route::resource('/mails', MailSettingController::class);
        Route::post('/mails-verification', [MailSettingController::class, 'mail'])->name('mails-verification');
        Route::post('/mails-contact', [MailSettingController::class, 'contactMessage'])->name('mails.contact');
        Route::post('/mails-send-test', [MailSettingController::class, 'sendTestemail'])->name('mails-send-test');
    });
    // Staff route
    Route::group(['middleware' => ['permission:manage_staff']], function () {
        Route::resource('staff', StaffController::class);
    });

    // album category route
    Route::group(['middleware' => ['permission:manage_albums_category']], function () {
        Route::resource('album-categories', AlbumCategoriesController::class);
    });

    //Add-Post Route
    Route::group(['middleware' => ['permission:manage_all_post']], function () {
        Route::resource('posts', PostController::class);
        Route::post('posts/language', [PostController::class, 'language'])->name('posts.language');
        Route::post('posts/category', [PostController::class, 'category'])->name('posts.category');
        Route::post('posts-subcategory', [PostController::class, 'categoryFilter'])->name('posts.categoryFilter');
        Route::post('posts/image-store', [PostController::class, 'imgUpload'])->name('editor.post-image-upload');
        Route::any('post-upload-image-get', [PostController::class, 'imageGet'])->name('post-upload-image-get');
        Route::get('post/image/{id}', [PostController::class, 'imageDelete'])->name('post-image.destroy');
        Route::get('post-format',[PostController::class,'postFormat'])->name('post_format');
        Route::get('post-type',[PostController::class,'postType'])->name('post_type');
    });

    Route::group(['middleware' => ['permission:manage_albums']], function () {
        Route::resource('albums', AlbumController::class);
    });


    Route::group(['middleware' => ['permission:manage_language']], function () {
        Route::resource('languages', LanguageController::class);
        Route::get('languages/translation/{language}',
            [LanguageController::class, 'showTranslation'])->name('languages.translation');
        Route::post('languages/translation/{language}/update',
            [LanguageController::class, 'updateTranslation'])->name('languages.translation.update');
    });

    Route::group(['middleware' => ['permission:manage_menu']], function () {
        Route::resource('menus', MenuController::class);
        Route::post('get-menus', function (){
            return getMenus();
        })->name('get-menus');
    });

    Route::group(['middleware' => ['permission:manage_navigation']], function () {
        Route::get('navigation', [NavigationController::class, 'index'])->name('navigation.index');
        Route::post('navigation/update', [NavigationController::class, 'update'])->name('navigation.update');
        Route::post('language-change',[NavigationController::class,'languageChange'])->name('language.change');
    });

    Route::group(['middleware' => ['permission:manage_polls']], function () {
        Route::resource('polls', PollController::class);
        Route::get('polls-vote-result/{id}', [PollController::class, 'pollResult'])->name('polls-vote-result');
    });

    //comment
    Route::group(['middleware' => ['permission:manage_polls']], function () {
        Route::get('post-comments', [CommentController::class, 'index'])->name('post-comments.index');
        Route::delete('post-comments/{comment}', [CommentController::class, 'delete'])->name('post-comments.destroy');
    });

    Route::resource('gallery-images', GalleryController::class);
    Route::get('album-list', [GalleryController::class, 'getAlbums'])->name('album-list');
    Route::get('album-category-list', [GalleryController::class, 'getCategory'])->name('album-category-list');
    Route::group(['middleware' => ['permission:manage_news_letter']], function () {
        Route::resource('news-letter', NewsLetterController::class);
    });
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin','verified.user']], function () {
    Route::group(['middleware' => ['permission:manage_seo_tools']], function () {
        // SEO tools
        Route::get('seo-tools', [seoToolsController::class, 'index'])->name('seo-tools.index');
        Route::Post('seo-tools', [seoToolsController::class, 'update'])->name('seo-tools.update');
    });

    // logs view route
    Route::get('logs', [LogViewerController::class, 'index']);
});

Route::group(['middleware' => ['xss']], function () {

    Route::get('/', [LandingPageController::class, 'index'])->name('front.home');
    Route::post('/comments', [LandingPageController::class, 'saveCommentsUser'])->name('comment.store');
    Route::delete('/comments/{comment}', [LandingPageController::class, 'destroyComment'])->name('comment.destroy');
    Route::post('subscribe', [LandingPageController::class, 'saveSubscribeUser'])->name('subscribe.store');
    Route::post('language-change-home', [LandingPageController::class, 'detailPage'])->name('language.change.home');

    Route::get('p', [LandingPageController::class, 'allPosts'])->name('allPosts');
    Route::get('p/{data}', [LandingPageController::class, 'detailPage'])->name('detailPage')->middleware('analytic');
    Route::get('p/{data}/{id}', [LandingPageController::class, 'detailPage'])->name('detailPage.gallery');
    Route::get('c/{category?}/{slug?}', [LandingPageController::class, 'categoryPage'])->name('categoryPage');
    Route::get('t/{tag}', [LandingPageController::class, 'popularTagPage'])->name('popularTagPage');
    Route::get('/g/{id?}', [LandingPageController::class, 'galleryPage'])->name('galleryPage');
// logs view route
    Route::get('logs', [LogViewerController::class, 'index']);

    Route::get('/terms-conditions', [LandingPageController::class, 'displayTerms'])->name('page.Terms');
    Route::get('/support', [LandingPageController::class, 'displayTerms'])->name('page.support');
    Route::get('/privacy', [LandingPageController::class, 'displayTerms'])->name('page.privacy');

    Route::get('/contact-save', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// logs view route
    Route::get('logs', [LogViewerController::class, 'index']);

//vote poll route
    Route::post('vote-poll', [PollController::class, 'votePoll'])->name('vote.poll');

//pages
    Route::get('page/{slug}', [PageController::class, 'showPageSlug'])->name('pages.show-page-slug');
});

require __DIR__.'/auth.php';    




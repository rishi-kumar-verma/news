@include('flash::message')
@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif
<div class="row">
    <div class="col-sm-12 d-flex mb-10">
        <a href="{{ route('posts.index') }}" class="btn btn-primary ms-auto post-btn">
            {{ __('messages.post.posts') }}</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-header">
        <h1 class="form-title form-title-post-format text-center text-gray-700 mb-5">{{ __('messages.post.choose_post_format') }}</h1>
    </div>
</div>
<div class="row justify-content-center g-5">
    <div class="col-xl-4 col-sm-6">
        <a class="nav-link text-active-primary p-0 {{ (isset($sectionName) && $sectionName == 'article') ? 'active' : ''}}"
           href="{{ route('post_type',['section' => 'article/create']) }}">
            <div class="card add-post-card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="item-icon">
                            <i class="far fa-file-alt icon-article"></i>
                        </div>
                        <div class="mb-5 text-center fw-bolder text-gray-700">
                            {{ __('messages.post.article') }}
                        </div>
                        <p class="text-center mb-0 text-muted">{{ __('messages.post.article_with_images') }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-4 col-sm-6">
        <a class="nav-link text-active-primary p-0 {{ (isset($sectionName) && $sectionName == 'gallery') ? 'active' : ''}}"
           href="{{ route('post_type',['section' => 'gallery/create']) }}">
            <div class="card add-post-card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="item-icon">
                            <i class="far fa-images icon-article"></i>
                        </div>
                        <div class="mb-5 text-center fw-bolder text-gray-700">
                            {{ __('messages.post.gallery') }}
                        </div>
                        <p class="text-center mb-0 text-muted">{{ __('messages.post.collection_of_images') }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-4 col-sm-6">
        <a class="nav-link text-active-primary p-0 {{ (isset($sectionName) && $sectionName == 'sort_list') ? 'active' : ''}}"
           href="{{ route('post_type',['section' => 'sort_list/create']) }}">
            <div class="card add-post-card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="item-icon">
                            <i class="fas fa-list-ol icon-article"></i>
                        </div>
                        <div class="mb-5 text-center fw-bolder text-gray-700">
                            {{ __('messages.post.sort_list') }}
                        </div>
                        <p class="text-center mb-0 text-muted">{{ __('messages.post.list_based_article') }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>

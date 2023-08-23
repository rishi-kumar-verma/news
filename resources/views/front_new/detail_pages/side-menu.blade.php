<!-- start trending-post-section -->
@if(!empty(getTrendingPost()))
    <section class="trending-post-section pt-60">
        <div class="section-heading border-0 mb-2">
            <div class="row align-items-center">
                <div class="col-12 section-heading-left">
                    <h2 class="text-black mb-0">{{ __('messages.details.trending_post') }}</h2>
                </div>
            </div>
        </div>
        <div class="trending-post">
            <div class="row">
                <div class="col-xl-12 d-flex flex-wrap justify-content-between">
                    @foreach(getTrendingPost() as $trendingPost)
                        @if(!empty($trendingPost))
                            <div class="col-xl-12 col-sm-6 card d-flex flex-xl-row py-20 pe-xl-0 pe-lg-4 pe-sm-3">
                                <div class="row">
                                    <div class="col-xl-4 col-5 card-top">
                                        <div class="card-img-top">
                                            <a href="{{route('detailPage',$trendingPost['slug'])}}">
                                                <img data-src="{{ $trendingPost['post_image'] }}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 w-300px lazy">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-7">
                                        <div class="card-body ">
                                            <h5 class="card-title mb-1 fs-12 text-gray fw-7">{!! $trendingPost['category']['name'] !!}</h5>
                                            <p class="card-title mb-0 fs-14 text-black fw-6">
                                                <a href="{{route('detailPage',$trendingPost['slug'])}}" class="text-black">
                                                    {!! $trendingPost['title'] !!}
                                                </a>
                                            </p>
                                            <span class="card-text fs-12 text-gray">{{\Carbon\Carbon::parse($trendingPost['created_at'])->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                            @if($loop->iteration >= 6)
                                @break
                            @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!-- end trending-post-section -->

<!-- start hot-categories-section -->
@if(!empty(getPopulerCategories()))
    <section class="hot-categories-section py-60">
        <div class="section-heading border-0 mb-30">
            <div class="row align-items-center">
                <div class="col-12 section-heading-left">
                    <h2 class="text-black mb-0">{{ __('messages.details.hot_categories') }}</h2>
                </div>
            </div>
        </div>
        <div class="hot-categories-post">
            @foreach(array_slice(getPopulerCategories(),0,10) as $category)
                <div class="post bg-light d-flex justify-content-between align-items-center px-4 pt-2 pb-2 mb-20 ">
                    <div class="desc d-flex align-items-center">
                        <i class="fa-solid fa-list me-4 text-primary"></i>
                        <a href="{{ route('categoryPage',['category' => $category['slug']]) }}" class="fs-16 fw-6 text-black mb-0">{!! $category['name'] !!}</a>
                    </div>
                    <div class="numbers bg-white d-flex align-items-center justify-content-center rounded-circle">
                        <a href="#" class="fs-16 fw-6 text-gray">{{ $category['posts_count'] }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
<!-- end hot-categories-section -->

<!-- start popular-news-section -->
@if(!empty(getPopularNews()))
<section class="popular-news-section">
    <div class="section-heading border-0 mb-2">
        <div class="row align-items-center">
            <div class="col-12 section-heading-left">
                <h2 class="text-black mb-0">{{ __('messages.details.popular_news') }}</h2>
            </div>
        </div>
    </div>
    <div class="popular-news-post">
        <div class="row">
            <div class="col-xl-12 d-flex flex-wrap justify-content-between">
                @foreach(getPopularNews() as $news)
                    @if(!empty($news))
                        <div class="col-xl-12 col-sm-6 card d-flex flex-xl-row py-20 pe-xl-0 pe-lg-4 pe-sm-3">
                            <div class="row">
                                <div class="col-xl-4 col-5 card-top">
                                    <div class="card-img-top">
                                        <a href="{{route('detailPage',$news['slug'])}}">
                                            <img data-src="{{ $news['post_image'] }}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 w-300px lazy">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-7">
                                    <div class="card-body ">
                                        <h5 class="card-title mb-1 fs-12 text-gray fw-7">{!! $news['category']['name'] !!}
                                        </h5>
                                        <p class="card-title mb-0 fs-14 text-black fw-6">
                                            <a href="{{route('detailPage',$news['slug'])}}" class="text-black">
                                                {!!  $news['title'] !!}
                                            </a>
                                        </p>
                                        <span class="card-text fs-12 text-gray">{{ ucfirst(__('messages.common.'.strtolower(\Carbon\Carbon::parse($news['created_at'])->format('F')))) }} {{ \Carbon\Carbon::parse($news['created_at'])->format('d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                        @if($loop->iteration >= 6)
                            @break
                        @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<!-- end popular-news-section -->

<!-- start popular-tag-section -->
@if(count(array_filter(getPopularTags())))
<section class="popular-tag-section py-60">
    <div class="section-heading border-0 mb-30">
        <div class="row align-items-center">
            <div class="col-12 section-heading-left">
                <h2 class="text-black mb-0">{{ __('messages.details.popular_tag') }}</h2>
            </div>
        </div>
    </div>
    <div class="popular-tags ">
        @foreach(getPopularTags() as $tag)
            <div class="tag br-gray-100 d-inline-block py-2 px-3 mb-3 me-2">
                <a href="{{ route('popularTagPage',$tag) }}" class="fs-14 text-black "> {!! $tag !!}</a>
            </div>
            @if($loop->iteration >= 15)
                @break
            @endif
        @endforeach
    </div>
</section>
@endif
<!-- end popular-tag-section -->

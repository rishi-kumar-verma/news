<div>
    @if($categoryPosts->count() > 0)
        @foreach($categoryPosts as $post)
        <div class="row pt-60">
            <div class="col-lg-5 sports-content-img">
                <div class="sports-img position-relative">
                    <a href="{{route('detailPage',$post->slug)}}">
                        <img src="{{$post->post_image}}" class="w-100 h-100">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 ps-xl-4">
                <div class="text pt-lg-0 pt-4">
                    <h3 class="text-black fw-7 mb-xxl-3 mb-xl-0 mb-lg-3 ">
                        <a href="{{route('detailPage',$post->slug)}}" class="text-black">
                            {!! $post->title!!}
                        </a>
                    </h3>
                    <p class=" fs-14 text-gray mb-xxl-4 mb-xl-2">
                        {!! $post->description !!}
                    </p>
                    <div class="desc d-flex flex-wrap">
                        <span class="fs-12 text-black">By {{$post->user->full_name}}</span>
                        <span class="fs-12 text-primary mx-2"> | </span>
                        <span class="fs-12 text-black">{{$post->created_at->format('F d, Y')}}</span>
                        <span class="fs-12 text-primary mx-2"> | </span>
                        <span class=" fs-12 text-black"> {{ $post->comment->count() }} Comments</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="d-flex justify-content-center pt-100">
            <h1>{{ __('messages.no_matching_records_found') }}</h1>
        </div>
    @endif

    @if($categoryPosts->count() > 0)
        <div class="row justify-content-center pt-60 mb-xl-4">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                {{$categoryPosts->links()}}
            </div>
        </div>
    @endif
</div>

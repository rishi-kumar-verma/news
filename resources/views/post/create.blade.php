@extends('layouts.app')
@section('title')
    {{__('messages.post.'.$sectionAdd)}}
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tagify.css') }}">
@endsection
@php $styleCss = 'style' @endphp
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            <a class="btn btn-outline-primary float-end" href="{{ route('post_format')}}">
                {{ __('messages.common.back') }}
            </a>
        </div>  
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('layouts.errors')
            </div>
        </div>
        {{ Form::open(['route' => 'posts.store','files' => 'true','method'=>'POST','id' => 'create-post-form']) }}
        <input type="hidden" id="sectionType" name="post_types"
               value="{{ (!empty($sectionType)) ? $sectionType : \App\Models\Post::POST_TYPE_DEACTIVA }}">
        <div class="row">
            @include('post.fields')
        </div>
        {{ Form::close() }}
    </div>
@endsection
@section('page_js')
    <script>
        let langId = '{{old('lang_id')}}'
        let categoryId = '{{old('category_id')}}'
        let subCategoryId = '{{old('sub_category_id')}}'
        let styleCss = 'style'
    </script>
    <script src="{{asset('/web/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{mix('assets/js/add_post/create_edit.js')}}"></script>
    <script src="{{ mix('assets/js/tagify.js') }}"></script>
    <script>
        tinymce.init({
            mode: 'specific_textareas',
            editor_selector: 'text-description',  // change this value according to your HTML
            plugin: 'a_tinymce_plugin',
            a_plugin_option: true,
            a_configuration_option: 400,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            document_base_url: "{{ config('app.url') }}",
            content_style: tinymce_textarea_coler
        })
        tinymce.init({
            selector: '.text-gallery-description,.text-sort_list-description',
            themes: 'modern',
            height: 200,
            content_style: tinymce_textarea_coler 
        })
    </script>
@endsection


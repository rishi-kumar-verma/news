@extends('layouts.app')
@section('title')
    {{__('messages.post.edit_'.$post->type_name)}}
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tagify.css') }}">
@endsection
@php $styleCss = 'style' @endphp
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            <a class="btn btn-outline-primary float-end" href="{{ route('posts.index')}}">
                {{ __('messages.common.back') }}
            </a>
        </div>
    </div>
@endsection
@section('content')

<div class="container-fluid">
    @include('layouts.errors')
    {{ Form::open(['route' => ['posts.update', $post->id], 'method' => 'put','files' => 'true','id' => 'update-post-form' ]) }}
    @csrf
        <input type="hidden" id="sectionType" name="post_types" value="{{ $post->post_types}}">
        <div class="row">
            @include('post.fields')
        </div>
</div>
    {{ Form::close() }}
@endsection
@section('page_js')
    <script>
        let isEdit = false
        let langId = "{{ $post->lang_id }}";
        let categoryId = "{{ $post->category_id }}";
        let subCategoryId = "{{ $post->sub_category_id }}";
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

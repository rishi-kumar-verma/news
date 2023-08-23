@extends('layouts.app')
@section('title')
    {{__('messages.page.add_page')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('pages.index') }}">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')

    <div class="container-fluid">
        @include('layouts.errors')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'pages.store']) }}
                @include('page.field')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/web/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{mix('assets/js/page/creat-edit.js')}}"></script>
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
            height: 400,
            content_style: tinymce_textarea_coler,
        })
    </script>
    <script>

    </script>
    <script>

    </script>
@endsection

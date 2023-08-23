@extends('layouts.app')
@section('title')
    {{ __('messages.categories') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:category-table/>
        </div>
    </div>
    @include('categories.add_modal')
    @include('categories.edit_modal')
@endsection
@section('page_js')
    <script>
        let categoriesStore  = "{{ route('categories.store') }}";
        let categoriesUrl   = "{{ route('categories.index') }}"
    </script>
    <script src="{{mix('assets/js/categories/categories.js')}}"></script>
@endsection


@extends('layouts.backend.admin-dashboard.master')
@push('css')
@endpush
@include('layouts.backend.admin-dashboard.partials.css')
@section('title', 'Create Category')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="name" type="text"
                                        placeholder="Enter your category name here..." required="" name="name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="description" :value="__('Description')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="description" type="text"
                                        placeholder="Enter your description here..." required="" name="description" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="image" type="file" required=""
                                        name="image" />
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="status" :value="__('Status')" />
                                <span class="text-danger">(*)</span>
                                <select class="form-control" id="status" name="status" required="">
                                    <option value="active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="parent_category_id" :value="__('Parent Category ID')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="parent_category_id" type="number"
                                    placeholder="Enter your parent category id here..."
                                    name="parent_category_id" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <x-primary-button href="#" class="btn btn-primary">Save</x-primary-button>
                                <x-secondary-button href="#" class="btn btn-secondary">Cancel
                                </x-secondary-button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- <script>
        //FroalaEditor
        var editor = new FroalaEditor('#about', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '100px',
        });
    </script> --}}
@endpush

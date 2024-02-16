@extends('layouts.backend.admin-dashboard.master')
@push('css')
@endpush
@include('layouts.backend.admin-dashboard.partials.css')
@section('title', 'Create Product')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="name" type="text"
                                        placeholder="Enter your product name here..." required="" name="name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="slug" :value="__('Slug')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="slug" type="text"
                                        placeholder="Enter your product slug here..." required="" name="slug" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="description" :value="__('Description')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="description" type="text"
                                        placeholder="Enter your product description here..." required=""
                                        name="description" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Upload Image')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="image" type="file" required=""
                                        name="image" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="price" :value="__('Price')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="price" type="number" required=""
                                        name="price" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="discount" :value="__('Discount')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="discount" type="number" required=""
                                        name="discount" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="quantity" :value="__('Quantity')" />
                                    <span class="text-danger">(*Insert O value - Only for Customer)</span>
                                    <x-text-input class="form-control" id="quantity" type="number" name="quantity" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="stock_quantity_available" :value="__('Stock QTY Available')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="stock_quantity_available" type="number"
                                        required="" name="stock_quantity_available" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="status" :value="__('Status')" />
                                    <span class="text-danger">(*)</span>
                                    <select class="form-control" id="status" name="status" required="">
                                        <option value="in stock" selected>In stock</option>
                                        <option value="out of stock">Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="category_name" :value="__('Category')" />
                                    <span class="text-danger">(*)</span>
                                    <select class="form-select" id="category_name" name="category_name" required="">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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

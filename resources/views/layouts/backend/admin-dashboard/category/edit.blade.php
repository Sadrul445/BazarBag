@extends('layouts.backend.admin-dashboard.master')
@push('css')
@endpush
@include('layouts.backend.admin-dashboard.partials.css')
@section('title', 'Edit Category')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">Edit</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <x-text-input class="form-control" id="name" type="text"
                                        value="{{ $category->name }}" name="name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="description" :value="__('Description')" />

                                    <x-text-input class="form-control" id="description" type="text"
                                        value="{{ $category->description }}" name="description" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <x-text-input class="form-control" id="image" type="file" name="image" />
                                    @if ($category->image)
                                        <img class="mt-4 shadow bg-body rounded"
                                            src="{{ asset('storage/' . $category->image) }}" alt="Cat Image" width="30%">
                                    @endif
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
                                <select class="form-control" id="status" name="status">
                                    <option value="active" {{ $category->status === 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="Inactive" {{ $category->status === 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="parent_category_id" :value="__('Parent Category ID')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="parent_category_id" type="number"
                                    value="{{ $category->parent_category_id }}" name="parent_category_id" />
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

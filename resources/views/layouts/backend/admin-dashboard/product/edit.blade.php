@extends('layouts.backend.admin-dashboard.master')
@push('css')
@endpush
@include('layouts.backend.admin-dashboard.partials.css')
@section('title', 'Edit Product')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item">Edit</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <x-input-label class="form-label" for="images" :value="__('Existing Images')" />
                                    <div id="imageContainer" class="d-flex flex-wrap">
                                        @foreach ($product->images as $image)
                                            <div class="image-area mr-2 mb-2">
                                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image"
                                                    class="img-fluid mb-2 mr-2" style="width: 100%;">
                                                <a class="remove-image" href="#" style="display: inline;">&#215;</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="new_images" :value="__('Upload New Image')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="new_images" type="file" name="images[]"
                                        multiple required />
                                </div>
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="weight" :value="__('Weight')" />
                                    <x-text-input class="form-control" id="weight" type="text"
                                        placeholder="Enter product weight here..." value="{{ $product->weight }}" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="name" type="text"
                                        placeholder="Enter product name here..." name="name"
                                        value="{{ $product->name }}" />
                                </div>
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="category_id" :value="__('Category')" />
                                    <span class="text-danger">(*)</span>
                                    <select class="form-select" id="category_id" name="category_id" required="">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_name == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="description" :value="__('Description')" />
                                    <textarea class="form-control" id="description" type="text" placeholder="Enter product description here..."
                                        name="description">{!! $product->description !!}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="information" :value="__('Information')" />
                                    <textarea class="form-control" id="information" type="text" placeholder="Enter product information here..."
                                        name="information">{!! $product->information !!}</textarea>
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
                                <x-input-label class="form-label" for="short_information" :value="__('Short Information')" />
                                <textarea class="form-control" id="short_information" type="text"
                                    placeholder="Enter product short information here..." name="short_information">{!! $product->short_information !!}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <x-input-label class="form-label" for="price" :value="__('Price')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="price" type="number" required=""
                                    name="price" value="{{ $product->price }}" />
                            </div>
                            <div class="col-sm-4">
                                <x-input-label class="form-label" for="discount" :value="__('Discount')" />
                                <x-text-input class="form-control" id="discount" type="number" name="discount"
                                    value="{{ $product->discount }}" />
                            </div>
                            <div class="col-sm-4">
                                <x-input-label class="form-label" for="quantity" :value="__('Quantity')" />
                                <x-text-input class="form-control" id="quantity" type="number" name="quantity"
                                    value="{{ $product->quantity }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <x-input-label class="form-label" for="stock_quantity_available" :value="__('Stock QTY Available')" />
                                <x-text-input class="form-control" id="stock_quantity_available" type="number"
                                    value="{{ $product->stock_quantity_available }}" name="stock_quantity_available" />
                            </div>
                            <div class="col-sm-4">
                                <x-input-label class="form-label" for="sku" :value="__('Stock Keep Unit (sku)')" />
                                <x-text-input class="form-control" id="sku" type="text" name="sku"
                                    value="{{ $product->sku }}" />
                            </div>
                            <div class="col-sm-4">
                                <x-input-label class="form-label" for="status" :value="__('Status')" />
                                <span class="text-danger">(*)</span>
                                <select class="form-control" id="status" name="status" required="">
                                    <option value="in stock" selected>In stock</option>
                                    <option value="out of stock">Out of Stock</option>
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
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>

    <script>
        // Uncomment this block if you want to dynamically add more file inputs

        $(document).ready(function() {
            $('#addMoreImages').click(function() {
                var newInput =
                    '<input type="file" name="images[]" class="form-control-file mt-2" multiple>';
                $('#new_images').after(newInput);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#new_images').change(function() {
                // Get the file input element
                var input = $(this)[0];
                // Get the files
                var files = input.files;

                // Loop through each file
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    // Create a new FileReader object
                    var reader = new FileReader();
                    // Closure to capture the file information
                    reader.onload = (function(file) {
                        return function(e) {
                            // Append the newly added image to the container
                            $('#imageContainer').append(
                                '<div class="image-area mr-2 mb-2">' +
                                '<img src="' + e.target.result +
                                '" alt="Product Image" class="img-fluid">' +
                                '<a class="remove-image" href="#" style="display: inline;">&#215;</a>' +
                                '</div>'
                            );
                        };
                    })(file);
                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }
            });

            // Handle removal of images
            $('#imageContainer').on('click', '.remove-image', function() {
                $(this).parent().remove();
            });
        });
    </script>
    
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>
    <script>
        //FroalaEditor
        var editorIds = ['#information', '#short_information', '#description'];

        editorIds.forEach(function(id) {
            new FroalaEditor(id, {
                pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline',
                    'strikeThrough',
                    'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent',
                    'indent',
                    'quote', 'insertLink',
                    'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
                ],
                height: '100px',
            });
        });
    </script>
@endpush

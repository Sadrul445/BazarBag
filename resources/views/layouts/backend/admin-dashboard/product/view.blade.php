@extends('layouts.backend.admin-dashboard.master')

@section('title', 'View Product')

@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
        <li class="breadcrumb-item">{{ $product->name }}</li>
    @endcomponent

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $product->name }}</h2>
                        <p><strong>Category:</strong> {{ $product->category_name }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                        <p><strong>sku:</strong> {{ $product->sku }}</p>
                        <p><strong>Discount:</strong> {{ $product->discount }}</p>
                        <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                        <p><strong>Weight:</strong> {{ $product->weight }}</p>
                        <p><strong>Short Information:</strong> {!! $product->short_information !!}</p>
                        <p><strong>Description:</strong> {!! $product->description !!}</p>
                        <p><strong>Information:</strong> {!! $product->information !!}</p>
                        <p><strong>Stock Quantity Available:</strong> {{ $product->stock_quantity_available }}</p>
                        <p><strong>Status:</strong> {{ $product->status }}</p>
                        <!-- Add more details as needed -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- You can include an image gallery here -->
                        @if ($product->images->count() > 0)
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($product->images as $image)
                                                        <div class="col-md-3">
                                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                                alt="Product Image" width="70">
                                                        </div>
                                                    @endforeach
                                </div>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="card" style="border-radius: 25px">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>{{ $product->name }}</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <span><strong>Price:</strong> {{ $product->price }} taka</span>
                                <span><strong>Weight: </strong>{{ $product->weight }}</span>
                            </div>
                            <div class="col-sm-6">col-2</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">col-3</div>
                            <div class="col-sm-6">col-4</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- <div class="card" style="border-radius: 25px">
                    <div class="card-body"> --}}
                        {{-- <h2>Product Name 2</h2> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <x-input-label class="form-label fw-bold fs-6" for="short_information" :value="__('Short Information')" />
                                <p>{!! $product->short_information !!}</p>
                            </div>
                            <div class="col-sm-6">
                                <x-input-label class="form-label fw-bold fs-6" for="information" :value="__('Information')" />
                                <p>{!! $product->information !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <div class="col">
                                    <x-input-label class="form-label fw-bold fs-6" for="description" :value="__('Description')"/>
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>
                        </div>
                        {{-- </div>
                </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

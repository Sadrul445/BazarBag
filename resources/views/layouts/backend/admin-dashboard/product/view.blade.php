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
    <div class="container">
        <div class="card shadow" style="border-radius: 10px">
            {{-- <div class="d-flex justify-content-end p-2">
                <a href="{{ route('product.edit', ['id' => $product->id, 'name' => $product->name]) }}" class="btn btn-primary shadow">Edit</a>
            </div> --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-11">
                        <h4 class="fw-bold">{{ $product->name }}</h4>
                        <span class="{{ $product->status == 'in stock' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $product->status }}</span>
                    </div>
                    <div class="col-sm-1">
                        <div class="d-flex justify-content-end p-2">
                        <a href="{{ route('product.edit', ['id' => $product->id, 'name' => $product->name]) }}" class="btn btn-primary shadow">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="my-2 border border-2 rounded-3 p-3">
                            <div class="row mt-2">
                                <div class="col-sm-8 mb-2">
                                    <span class="bg-warning text-dark bg-gradient rounded-2 p-2"><strong>Stock Quantity
                                            Availability:</strong> {{ $product->stock_quantity_available }}</span>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <span><strong>SKU:</strong> {{ $product->sku }}</span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-10 mb-4">
                                    <span class="bg-primary bg-gradient p-2 rounded-2"><strong>Price:</strong>
                                        {{ $product->price }} &#2547;</span>
                                    <span class="bg-danger bg-gradient rounded-2 p-2 ">
                                        Discount:{{ $product->discount }}%
                                    </span>
                                </div>
                            </div>
                            <div class="row bg-gradient rounded-2 py-3" style="background-color:#e1d9f7;color:black">
                                <div class="col-sm-4">
                                    <span><strong>Weight: </strong>{{ $product->weight }}</span>
                                </div>
                                <div class="col-sm-4">
                                    <span><strong>Quantity:</strong> {{ $product->quantity }}</span>
                                </div>
                                <div class="col-sm-4">
                                    <span><strong>Brand:</strong> {{ $product->brand_id }}</span>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <h5 class="fw-bold mb-2">Images</h5>
                                @foreach ($product->images as $image)
                                    <div class="col-md-2">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image"
                                            class="img-fluid mb-2 rounded shadow" style="width:100%;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <x-input-label class="form-label fw-bold fs-6 bg-gradient p-2 rounded" for="description" :value="__('Description')" style="background-color:#caddad;color:black" />
                                <p class="d-inline-block text-truncate" style="max-width: 50px;">{!! $product->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <x-input-label class="form-label fw-bold fs-6 bg-gradient p-2 rounded" for="short_information" :value="__('Short Information')" style="background-color:#caddad;color:black"/>
                                <p>{!! $product->short_information !!}</p>
                            </div>
                            <div class="col-sm-6">
                                <x-input-label class="form-label fw-bold fs-6 bg-gradient p-2 rounded" for="information" :value="__('Information')" style="background-color:#caddad;color:black"/>
                                <p>{!! $product->information !!}</p>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-12">
                                <div class="col">
                                    <x-input-label class="form-label fw-bold fs-6 bg-gradient" for="description" :value="__('Description')" />
                                    <p class="d-inline-block text-truncate" style="max-width: 50px;">{!! $product->description !!}
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

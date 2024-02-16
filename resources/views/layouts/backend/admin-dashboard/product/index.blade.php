@extends('layouts.backend.admin-dashboard.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/datatable-extension.css') }}">
@endpush
@include('layouts.backend.admin-dashboard.partials.css')
@section('title', 'List of Products')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item">List of Products</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h2>
                                Product Index
                            </h2>
                            <div>
                                @if (session()->has('create'))
                                    <div class="alert alert-success">
                                        {{ session('create') }}
                                    </div>
                                @endif
                                @if (session()->has('update'))
                                    <div class="alert alert-success">
                                        {{ session('update') }}
                                    </div>
                                @endif
                                @if (session()->has('delete'))
                                    <div class="alert alert-danger">
                                        {{ session('delete') }}
                                    </div>
                                @endif
                            </div>
                            <table class="table text-center display" id="basic-1">
                                <thead style="font-size:12px;text-align:center">
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Quantity</th>
                                        <th>Stock Quantity Available</th>
                                        <th>Category ID</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;text-align:center">
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->slug }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                                    width="70">
                                            </td>
                                            <td>{{ $product->price }} </td>
                                            <td>{{ $product->discount }} </td>
                                            <td>None</td>
                                            <td>{{ $product->stock_quantity_available }} </td>
                                            <td>{{ $product->category_name }} </td>
                                            <td>{{ $product->status }} </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <a href="{{-- {{ route('product.edit', ['id' => $product->id]) }} --}}" class="btn btn-outline-primary">Edit</a>
                                                    </div>
                                                    <div style="margin-left:5px">
                                                        <form action="{{-- {{ route('product.destroy', ['id' => $product->id]) }} --}}" method="POST">
                                                            @csrf
                                                            {{-- @method('DELETE') --}}
                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>                                              
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div>
                                {{ $product->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

<script>
//    function toggleCollapse(id) {
//     const contentDiv = document.getElementById(`collapseContent${id}`);
//     const linkTextSpan = document.getElementById(`collapseLinkText${id}`);
    
//     if (contentDiv.style.maxHeight) {
//         // Collapse the content
//         contentDiv.style.maxHeight = null;
//         linkTextSpan.textContent = "See More";
//     } else {
//         // Expand the content
//         contentDiv.style.maxHeight = contentDiv.scrollHeight + "px";
//         linkTextSpan.textContent = "See Less";
//     }
// }
</script>

@endpush
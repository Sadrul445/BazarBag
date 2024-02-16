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
        <li class="breadcrumb-item">Brand</li>
        <li class="breadcrumb-item">List of Brand</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h2>
                                Brand Index
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

@endpush
@extends('layouts.backend.admin-dashboard.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/datatable-extension.css') }}">
@endpush
@include('layouts.backend.admin-dashboard.partials.css')
@section('title', 'List of Category')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">List of Category</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h2>
                                Category Index
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
                            <table class="table text-center display dataTable" id="basic-1">
                                <thead style="font-size:12px;text-align:center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        {{-- <th>Slug</th> --}}
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Parent Category ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;text-align:center">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            {{-- <td>{{ $category->slug }}</td> --}}
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image"
                                                    width="70">
                                            </td>
                                            <td>{{ $category->status }} </td>
                                            <td>
                                                @if ($category->parent_category_id == NULL)
                                                    {{-- <strong style="color: green">{{ $category->name }}</strong> --}}
                                                    <strong style="color: #b60000">NULL</strong>
                                                @else
                                                <strong style="color: green">{{ $category->parent_category_id }}</strong>
                                                @endif
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-outline-primary">Edit</a>
                                                    </div>
                                                    <div style="margin-left:5px">
                                                        <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
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
                                {{ $category->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('backend/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
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
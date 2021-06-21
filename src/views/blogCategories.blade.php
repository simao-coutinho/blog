@extends('admin::layout.master')

@section('myStyles')
<title>{{ env('APP_NAME') }} Blog Categories</title>
<meta name="description" content="">

    <x-admin::table-styles />
@endsection

@section('content')
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Blog Categories</h3>
                    <ul class="list-unstyled list-inline text-right">
                            <li class="d-none d-sm-inline-block">
                                <a href="{{ route('admin.blogCategoryAdd') }}">
                                    <button id="btnUpdate"
                                            class="btn btn-success btn-sm backend-button"><i class="fas fa-plus"></i> Add Category
                                    </button>
                                </a>
                            </li>
                    </ul>
                    <div class="table-responsive py-3">
                        <table id="myTable" class="myTable cursor table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr onclick="document.location = '{{ route("admin.blogCategoryShow", ["id" => $category->id]) }}'">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category['description']['title'] }}</td>
                                    <td>
                                        @if ($category->state == 1)
                                            <span class="badge badge-success text-bold fs-12">Active</span>
                                        @else
                                            <span class="badge badge-danger text-bold fs-12">Not Active</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myScripts')
    <x-admin::table-scripts />
@endsection

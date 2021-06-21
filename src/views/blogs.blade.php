@extends('admin::layout.master')

@section('myStyles')
<title>{{ env('APP_NAME') }}</title>
<meta name="description" content="">

    <x-admin::table-styles />
@endsection

@section('content')
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Notícias</h3>
                    <ul class="list-unstyled list-inline text-right">
                            <li class="d-none d-sm-inline-block">
                                <a id="btnUpdate" href="{{ route('admin.blogAdd') }}"
                                        class="btn btn-success btn-sm backend-button"><i class="fas fa-plus"></i> Adicionar Notícia
                                </a>
                            </li>
                    </ul>
                    <div class="table-responsive py-3">
                        <table id="myTable" class="myTable cursor table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Featured</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blogs as $news)
                                <tr onclick="document.location = '{{ route("admin.blogShow", ["id" => $news->id]) }}'">
                                    <td>{{ $news->id }}</td>
                                    <td>{{ $news->description->title }}</td>
                                    <td>{{ $news->date }}</td>
                                    <td>
                                        @if ($news->featured == 1)
                                            <span class="badge badge-success text-bold fs-12">Featured</span>
                                        @else
                                            <span class="badge badge-warning text-bold fs-12">Not Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($news->state == 1)
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

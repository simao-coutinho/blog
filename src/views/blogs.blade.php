@extends('backend.admin')

@section('myStyles')
<title>{{ env('APP_NAME') }}</title>
<meta name="description" content="">

@endsection

@section('content')
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">News</h3>
                    <ul class="list-unstyled list-inline text-right">
                            <li class="d-none d-sm-inline-block">
                                <a id="btnUpdate" href="{{ route('newsAdd') }}"
                                        class="btn btn-success btn-sm backend-button"><i class="fas fa-plus"></i> Add News
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
                                <tr onclick="document.location = '{{ route("newsShow", ["id" => $news->id]) }}'">
                                    <td>{{ $news->id }}</td>
                                    <td>{{ $news->title }}</td>
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
    <script>
        var table = $('#myTable').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "language": {
                url: '{{ asset('public/plugins/datatables/translation.json') }}'
            },
            "order": [[0, 'desc']],
            initComplete: function () {
                setTimeout(function () {
                    table.buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
                }, 10);
            }
        });
    </script>
@endsection

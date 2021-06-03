@extends('backend.admin')

@section('myStyles')
<title>{{ env('APP_NAME') }} Categories</title>
<meta name="description" content="">

@endsection

@section('content')
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title }}</h3>
                    <ul class="list-unstyled list-inline text-right">
                        @if (isset($button))
                            <li class="d-none d-sm-inline-block">
                                <button id="btnUpdate"
                                        class="btn btn-success btn-sm backend-button"
                                        onclick="{{ $button->onClick }}; return false;"><i class="fas fa-plus"></i> {{ $button->title }}
                                </button>
                            </li>
                        @endif
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
                                <tr onclick="document.location = '{{ route($route, ["id" => $category->id]) }}'">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
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

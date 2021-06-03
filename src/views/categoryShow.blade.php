@extends('backend.admin')

@section('myStyles')
    <title>{{ env('APP_NAME') }} Category</title>
    <meta name="description" content="">

@endsection

@section('content')
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title }}</h3>
                    <ul class="list-unstyled list-inline text-right">
                        @if (isset($buttonDelete))
                            <li class="d-none d-sm-inline-block">
                                <button id="btnDelete"
                                        class="btn btn-outline-danger btn-sm backend-button"
                                        onclick="deleteCategory({{ $category->id }}, '{{ $route }}'); return false;"><i
                                            class="far fa-trash-alt"></i> Delete
                                </button>
                            </li>
                        @endif
                        <li class="d-none d-sm-inline-block ml-2">
                            <button id="btnSave"
                                    class="btn btn-success btn-sm backend-button"
                                    onclick="updateCategory('{{ $route }}'); return false;">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </li>
                    </ul>

                    <form id="formId" class="mt-4">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ isset($category) ? $category->id : 0 }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input class="form-control form-control-sm" type="text" name="title"
                                           id="title" placeholder="Title"
                                           @if(isset($category))
                                           value="{{ $category->title }}"
                                            @endif>
                                </div>
                            </div>
                            @if (isset($category))
                                <div class="col-md-2">
                                    <label class="b-contain text-center">
                                        <span id="spanState"></span>
                                        <input type="checkbox" name="checkState"
                                               id="checkState"
                                               @if ($category->state == 1)
                                               checked
                                                @endif>
                                        <div class="b-input"></div>
                                        Active
                                    </label>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myScripts')
    <script src="{{ asset("public/js/backend/category.min.js") }}"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('public/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script>
        $("#formId").validate({
            rules: {
                title: "required",
            },
            messages: {
                title: "Title is missing",
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    </script>
@endsection	
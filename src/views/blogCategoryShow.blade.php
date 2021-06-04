@extends('admin::layout.master')

@section('myStyles')
    <title>{{ env('APP_NAME') }} Blog Category</title>
    <meta name="description" content="">


@endsection

@section('content')
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Blog Category</h3>
                    <ul class="list-unstyled list-inline text-right">
                        <li class="d-none d-sm-inline-block">
                            <button id="btnDelete"
                                    class="btn btn-outline-danger btn-sm backend-button"
                                    onclick="deleteBlogCategory({{ $category->id }}); return false;"><i
                                    class="far fa-trash-alt"></i> Delete
                            </button>
                        </li>
                        <li class="d-none d-sm-inline-block ml-2">
                            <button id="btnSave"
                                    class="btn btn-success btn-sm backend-button"
                                    onclick="updateBlogCategory(); return false;">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </li>
                        <li class="d-none d-sm-inline-block ml-2">
                            <a href="{{ route('admin.blogCategories') }}">
                                <button class="btn btn-outline-secondary btn-sm backend-button">
                                    <i class="fas fa-reply"></i> Back
                                </button>
                            </a>
                        </li>
                    </ul>

                    <form id="blog-category-form" class="mt-4">
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

    <!-- jquery-validation -->
    <script src="{{ asset('vendor/simao-coutinho/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/simao-coutinho/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script>
        $("#blog-category-form").validate({
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

        function updateBlogCategory() {
            if ($("#blog-category-form").valid()) {
                let btn = document.getElementById("btnSave");
                btn.prop('disabled', true);
                btn.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Saving";

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.blogCategoryUpdate') }}",
                    data: $("#formId").serialize(),
                    success: function (response) {
                        btn.innerHTML = "Saved";

                        setTimeout(function () {
                            window.location.href = "{{ route('admin.blogCategories') }}"
                        }, delay);
                    }
                });
            }
        }

        function deleteBlogCategory(id) {
            const response = confirm("Do you want to delete this item?");

            if (response === true) {
                let btn = document.getElementById("btnDelete");
                btn.prop('disabled', true);
                btn.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Deleting";

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.blogCategoryDelete') }}",
                    data: {_token: CSRF_TOKEN, id: id},
                    success: function (response) {
                        btn.innerHTML = "Deleted";

                        setTimeout(function () {
                            window.location.href = "{{ route('admin.blogCategories') }}"
                        }, delay);
                    }
                });
            }
        }
    </script>
@endsection
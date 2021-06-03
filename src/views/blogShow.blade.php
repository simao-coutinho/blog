@extends('backend.admin')

@section('myStyles')
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("public/plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("public/plugins/summernote/summernote-bs4.css") }}">
@endsection

@section('content')
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-bold text-secondary">News</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled list-inline text-right">
                                @if (isset($blog))
                                    <li class="d-none d-sm-inline-block">
                                        <a class="btn btn-outline-secondary btn-sm backend-button" target="_blank"
                                           href="{{ route('newsSingle', ['url_alias' => $blog->url_alias]) }}">
                                            <i class="fas fa-link"></i> Open In Website
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-inline-block ml-2">
                                        <button id="btnDelete"
                                                class="btn btn-outline-danger btn-sm backend-button"
                                                onclick="deleteCategory({{ $blog->id }}, 'admin/blog/'); return false;">
                                            <i class="far fa-trash-alt"></i> Delete
                                        </button>
                                    </li>
                                @endif
                                <li class="d-none d-sm-inline-block ml-2">
                                    <button id="btnSave"
                                            class="btn btn-success btn-sm backend-button"
                                            onclick="savePressed()">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form id="formId" class="mt-4" enctype="multipart/form-data" method="post" action="{{ route("newsUpdate") }}">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ isset($blog) ? $blog->id : 0 }}">
                        <input type="hidden" name="oldDate" id="oldDate" value="{{ isset($blog) ? $blog->date : 0 }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control form-control-sm" id="title"
                                                   name="title"
                                                   @if (isset($blog))
                                                   value="{{ $blog->title }}"
                                                    @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="post_date">Date</label>
                                            <input type="text" class="form-control form-control-sm" id="post_date"
                                                   name="post_date" placeholder="YYYY-MM-DD"
                                                   @if (isset($blog))
                                                   value="{{ $blog->date }}"
                                                    @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="categories[]">Categorias</label>
                                            <select class="select2 form-control form-control-sm" id="categories[]"
                                                    name="categories[]"
                                                    data-toggle="select-multiple" multiple="multiple" required>
                                                @foreach ($blogCategories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @if (isset($blog))
                                                            @foreach ($blog->blogCategory as $blogCategory)
                                                            @if ($blogCategory->category_id == $category->id)
                                                            selected
                                                            @endif
                                                            @endforeach
                                                            @endif>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="summary">Sumary</label>
                                            <textarea type="text" class="form-control form-control-sm" id="summary"
                                                      name="summary" rows="4"
                                                      maxlength="300" required>@if (isset($blog)){{ $blog->summary }}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-left mb-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="state"
                                                       id="state"
                                                       @if ((isset($blog) && $blog->state == 1) || !isset($blog))
                                                       checked
                                                        @endif>
                                                <label class="custom-control-label font-13-px pt-1"
                                                       for="state">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="featured"
                                                       id="featured"
                                                       @if (isset($blog) && $blog->featured == 1)
                                                       checked
                                                        @endif>
                                                <label class="custom-control-label font-13-px pt-1"
                                                       for="featured">Featured</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="img">Image</label>
                                            <input type="file" class="d-block font-13-px" id="img" name="img"
                                                   accept=".png, .jpg, .jpeg, .gif">
                                            <p class="text-muted font-13-px mt-2">Ideal dimensions: 700x350</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="video">Video</label>
                                            <input type="file" class="d-block font-13-px" id="video" name="video"
                                                   accept=".mp4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <textarea type="text" class="form-control form-control-sm summernote" id="text"
                                              name="text"
                                              rows="10" required>@if (isset($blog)){!! $blog->text !!}@endif</textarea>
                                </div>
                            </div>
                            <input type="submit" class="d-none" id="submitButton">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myScripts')
    <script src="{{ asset("public/js/backend/category.min.js") }}"></script>

    <!-- Select2 -->
    <script src="{{ asset("public/plugins/select2/js/select2.full.min.js") }}"></script>

    <!-- Summernote -->
    <script src="{{ asset("public/plugins/summernote/summernote-bs4.min.js") }}"></script>

    <!-- InputMask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('public/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script>
        $('.select2').select2();
        $('.summernote').summernote({
            height: 400,
        });

        let oldDate = document.getElementById("oldDate").value;
        if (oldDate !== 0) {
            $("#post_date").inputmask({
                mask: "9999-99-99",
                setvalue: oldDate
            });
        } else {
            $("#post_date").inputmask({
                mask: "9999-99-99",
            });
        }

        function savePressed() {
            $('#submitButton').click();
        }
    </script>
@endsection

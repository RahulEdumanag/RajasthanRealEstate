@extends('backend.layouts.master')
@section('title', 'Create')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Covid/</span> Add Covid
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/covid') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Covid List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.covid.store') }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                 
                                

                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="Full Desc">Full Desc</label>
                                    <textarea class="ckeditor form-control" id="Pag_FullDesc" name="Pag_FullDesc" class="form-control"></textarea>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
                                </div>






                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4" style='display: none;'>
                                    <label class="form-label" for="type"> Covid Category <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="Pag_PagCat_Id" name="Pag_PagCat_Id">
                                        @foreach ($model as $value)
                                            <option value="{{ $value->PagCat_Id }}"
                                                {{ $value->is_Covid ? 'selected' : '' }}>
                                                {{ $value->PagCat_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <div class=" d-flex col-xl-6">
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                            <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                            </button>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">

                                            <button type="button" class="btn btn-secondary" onclick="confirmReset()">
                                                <i class="fa fa-refresh fa-fw"></i> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function($) {
            $("#register-form").validate({
                rules: {
                    Pag_Name: "required",
                    Pag_FullDesc: "required"
                },
                messages: {
                    Pag_Name: "This field is required",
                    Pag_FullDesc: "This field is required"
                },
                errorPlacement: function(error, element) {
                    var fieldName = element.attr("name");
                    if (fieldName in fieldErrorMap) {
                        error.appendTo(fieldErrorMap[fieldName]);
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            var fieldErrorMap = {
                Pag_Name: "#Pag_Name-error",
                Pag_FullDesc: "#Pag_FullDesc-error"
            };
        });
    </script>
     <script>
        CKEDITOR.replace('Pag_FullDesc', {
            filebrowserUploadUrl: "{{ route('admin.images.upload') }}",
            filebrowserUploadMethod: 'form',
            filebrowserImageBrowseUrl: "{{ route('admin.images.browse') }}",
            filebrowserImageBrowseMethod: 'get',
            height: 400,
            extraPlugins: 'colorbutton,justify,font,smiley,link,templates',
            colorButton_enableMore: true,
            colorButton_colors: '00BCD4,8BC34A,FFC107,FF5722,673AB7,F44336,2196F3,4CAF50',
            toolbar: [
                ['Bold', 'Italic', 'Underline', 'TextColor', 'BGColor', 'NumberedList', 'BulletedList', 'Link',
                    'Unlink'
                ],
                ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'],
                ['Image', 'Table', 'HorizontalRule', 'Smiley'],
                ['Format', 'Font', 'FontSize'],
                ['Link', 'Unlink'],
                ['JustifyLeft', 'JustifyCenter', 'JustifyRight'],
                ['Templates'],
            ],
            templates: 'default',
            fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            filebrowserImageUploadUrl: "{{ route('admin.images.upload') }}",
            filebrowserImageBrowseUrl: "{{ route('admin.images.browse') }}",
            filebrowserImageBrowseMethod: 'get',
            filebrowserUploadMethod: function(url, result, formData) {
                result = JSON.parse(result);
                if (result.uploaded) {
                    return result.url;
                } else {
                    console.error('Error uploading image:', result.error.message);
                    return '';
                }
            },
        });
    </script>
@endsection

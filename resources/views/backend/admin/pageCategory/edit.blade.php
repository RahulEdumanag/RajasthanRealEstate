@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Page Category/</span> Edit Page Category
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/pageCategory') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>Page Category List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.pageCategory.update', $model->PagCat_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PagCat_Name" name="PagCat_Name"
                                        value="{{ old('PagCat_Name', $model->PagCat_Name) }}" placeholder="">
                                    <span id="PagCat_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <!-- @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6">
                                        <label for="URL" class="form-label">URL<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="PagCat_URL" name="PagCat_URL"
                                            value="{{ old('PagCat_URL', $model->PagCat_URL) }}" placeholder="">
                                        <span id="PagCat_URL-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif -->
                                <!-- <div class="col-sm-6">
                                    <label for="Short Desc" class="form-label">Short Desc<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="PagCat_ShortDesc" name="PagCat_ShortDesc" placeholder="">{{ old('PagCat_ShortDesc', $model->PagCat_ShortDesc) }}</textarea>
                                    <span id="PagCat_ShortDesc-error" class="error" style="color: red;"></span>
                                </div> -->
                                <!-- <div class="col-sm-6">
                                    <label for="SerialOrder" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PagCat_SerialOrder"
                                        name="PagCat_SerialOrder"
                                        value="{{ old('PagCat_SerialOrder', $model->PagCat_SerialOrder) }}" placeholder="">
                                    <span id="PagCat_SerialOrder-error" class="error" style="color: red;"></span>
                                </div> -->
                                <div class="col-sm-12">
                                    <label for="Full Desc" class="form-label">Full Desc</label>
                                    <textarea class="ckeditor form-control" id="PagCat_FullDesc" name="PagCat_FullDesc" placeholder="">{!! old('PagCat_FullDesc', $model->PagCat_FullDesc) !!}</textarea>
                                    <span id="PagCat_FullDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <!-- @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-2">
                                        <label for="Admin Exists" class="form-label">Admin Exists<span
                                                style="color:red">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="PagCat_AdminExists"
                                                name="PagCat_AdminExists"
                                                {{ old('PagCat_AdminExists', $model->PagCat_AdminExists) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="PagCat_AdminExists">
                                                AdminExists
                                            </label>
                                        </div>
                                        @error('PagCat_AdminExists')
                                            <div class="has-error mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                                <div class="col-sm-2">
                                    <label for="Short Desc Exists" class="form-label">Short Desc Exists<span
                                            style="color:red">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="PagCat_ShortDescExists"
                                            name="PagCat_ShortDescExists"
                                            {{ old('PagCat_ShortDescExists', $model->PagCat_ShortDescExists) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="PagCat_ShortDescExists">
                                            ShortDescExists
                                        </label>
                                    </div>
                                    @error('PagCat_ShortDescExists')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                    <label for="FullDescExists" class="form-label">FullDescExists<span
                                            style="color:red">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="PagCat_FullDescExists"
                                            name="PagCat_FullDescExists"
                                            {{ old('PagCat_FullDescExists', $model->PagCat_FullDescExists) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="PagCat_FullDescExists">
                                            FullDescExists
                                        </label>
                                    </div>
                                    @error('PagCat_FullDescExists')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Slider Image">Slider Image <span
                                            style="color:red">*</span></label>
                                    <div class="input-group">
                                        <input id="photo" type="file" name="PagCat_Image" style="display:none"
                                            onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-dark text-white" onclick="selectImage('photo')">Image</a>
                                        </div>
                                    </div>
                                    <img id="selectedImagePreview2"
                                        src="{{ imageOrDefault('uploads/' . $model->PagCat_Image, '/assets/images/default.jpg') }}"
                                        alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                    <span id="PagCat_Image-error" class="error" style="color: red;"></span>

                                </div> -->
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn " style="background-color:#7367f0;color:white"
                                        data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                    </button>
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

            var isFileSizeValid = true; // Flag to track file size validation

            function handleFileSizeValidation(fp, maxSize, errorSelector, clearSelectors) {
                var fileSize = Array.from(fp[0].files).reduce((size, file) => size + file.size, 0);

                if (fileSize > maxSize) {
                    isFileSizeValid = false;
                    $(errorSelector).html(`File size must not be more than ${maxSize / 1024} KB`);
                    $(clearSelectors.join(',')).val('').hide();
                } else {
                    isFileSizeValid = true;
                    $(errorSelector).html('');
                }
            }
            $("#edit").validate({
                rules: {
                    PagCat_Name: {
                        required: true,
                        maxlength: 255
                    },
                    PagCat_Image: "required",
                    PagCat_URL: {
                        required: true,
                        maxlength: 255
                    },
                    PagCat_ShortDesc: {
                        required: true,
                        maxlength: 255
                    },
                    PagCat_FullDesc: "required",
                    PagCat_SerialOrder: "required"
                },
                messages: {
                    PagCat_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PagCat_Image: "This field is required",

                    PagCat_URL: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PagCat_ShortDesc: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PagCat_SerialOrder: "This field is required",
                    PagCat_FullDesc: "This field is required"
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
            $('#photo').change(function() {
                handleFileSizeValidation($("#photo"), 102400, "#PagCat_Image-error", ['#photo',
                    '#SelectedFileName'
                ]);
            });
            var fieldErrorMap = {
                PagCat_Name: "#PagCat_Name-error",
                PagCat_Image: "#PagCat_Image-error",
                PagCat_URL: "#PagCat_URL-error",
                PagCat_ShortDesc: "#PagCat_ShortDesc-error",
                PagCat_SerialOrder: "#PagCat_SerialOrder-error",
                PagCat_FullDesc: "#PagCat_FullDesc-error"

            };
        });
    </script>
    <script>
        CKEDITOR.replace('PagCat_FullDesc', {
            filebrowserUploadUrl: "/admin/images/upload",
            filebrowserUploadMethod: 'form',
            customConfig: '/path/to/your/config.js',
            height: 100
        }).setData(`{!! old('PagCat_FullDesc', $model->PagCat_FullDesc) !!}`);
    </script>
@stop

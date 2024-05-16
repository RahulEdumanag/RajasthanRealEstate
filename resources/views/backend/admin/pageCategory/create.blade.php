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
                <span class="text-muted fw-light">Page Category/</span> Add Page Category
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
                        <form id="register-form" action="{{ route('admin.pageCategory.store') }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="PagCat_Name" name="PagCat_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your category name"
                                            aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="PagCat_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <!-- @if (Auth::user()->EmpRegistration->Emp_Role == '1')
    <div class="col-sm-6 form-group ">
                                            <label class="form-label" for="URL">URL <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="URL" name="PagCat_URL" class="form-control"
                                                    autocomplete="off" placeholder="Enter your URL" aria-describedby="name2" />
                                                <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                        class="card-type"></span></span>
                                            </div>
                                            <span id="PagCat_URL-error" class="error" style="color: red;"></span>
                                        </div>
    @endif -->
                                <!-- <div class="col-sm-6 form-group">
                                        <label class="form-label" for="ShortDesc">Short Desc <span
                                                style="color:red">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <textarea id="PagCat_ShortDesc" name="PagCat_ShortDesc" class="form-control" autocomplete="off"
                                                placeholder="Enter your SerialOrder" aria-describedby="name2"></textarea>
                                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                    class="card-type"></span></span>
                                        </div>
                                        <span id="PagCat_ShortDesc-error" class="error" style="color: red;"></span>
                                    </div>   -->

                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="FullDesc">Full Desc</label>
                                    <textarea class="ckeditor form-control" id="PagCat_FullDesc" name="PagCat_FullDesc" class="form-control"></textarea>
                                    <span id="PagCat_FullDesc-error" class="error" style="color: red;"></span>
                                </div>

                                <!-- <div class="col-sm-6 form-group">
                                    <label class="form-label" for="SerialOrder">Serial Order <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="PagCat_SerialOrder" name="PagCat_SerialOrder"
                                            class="form-control" autocomplete="off" placeholder="Enter your SerialOrder"
                                            aria-describedby="name2" value="{{ $nextSerialOrder }}" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="PagCat_SerialOrder-error" class="error" style="color: red;"></span>
                                </div> -->


                                <!-- <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                        <label class="form-label" for="Image">Image <span
                                                style="color:red">*</span></label>
                                        <div class="input-group">
                                            <input id="photo" type="file" name="PagCat_Image" style="display:none"
                                                onchange="displaySelectedImage(this, 'SelectedFileName', 'selectedImagePreview')">
                                            <div class="input-group-prepend">
                                                <a class="btn btn-dark text-white"
                                                    onclick="$('input[id=photo]').click();">Image</a>
                                            </div>
                                            <input type="text" name="PagCat_Image" class="form-control"
                                                id="SelectedFileName" value="" readonly>

                                        </div>
                                        <img id="selectedImagePreview" src="" alt="Selected Image"
                                            style="display:none; max-width: 10%; margin-top: 10px;">
                                        <span id="PagCat_Image-error" class="error" style="color: red;"></span>

                                    </div> -->
                                <!-- @if (Auth::user()->EmpRegistration->Emp_Role == '1')
    <div class="col-sm-2 form-group">
                                            <label class="form-check-label" for="Admin Exists">Admin Exists</label>
                                            <div class="form-check">
                                                <input type="checkbox" id="PagCat_AdminExists" name="PagCat_AdminExists"
                                                    class="form-check-input">
                                            </div>
                                            <span id="PagCat_AdminExists-error" class="error" style="color: red;"></span>
                                        </div>
    @endif -->

                                <!-- <div class="col-sm-2 form-group">
                                        <label class="form-check-label" for="Full Desc Exists">Full Desc Exists <span
                                                style="color:red">*</span></label>
                                        <div class="form-check">
                                            <input type="checkbox" id="PagCat_FullDescExists" name="PagCat_FullDescExists"
                                                class="form-check-input">
                                        </div>
                                        <span id="PagCat_FullDescExists-error" class="error" style="color: red;"></span>
                                    </div> -->
                                <!-- <div class="col-sm-2 form-group">
                                        <label class="form-check-label" for="ShortDesc Exists">ShortDesc Exists <span
                                                style="color:red">*</span></label>
                                        <div class="form-check">
                                            <input type="checkbox" id="PagCat_ShortDescExists" name="PagCat_ShortDescExists"
                                                class="form-check-input">
                                        </div>
                                        <span id="PagCat_ShortDescExists-error" class="error" style="color: red;"></span>
                                    </div> -->
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


            $("#register-form").validate({
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
        });
    </script>
    <script>
        function selectImage(inputId) {
            $('#' + inputId).Menck();
        }
    </script>
@endsection

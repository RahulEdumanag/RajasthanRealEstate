@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Packages/</span> Edit Packages
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/package') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Packages List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.package.update', $model->Pag_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}

                            <div class="col-sm-6">
                                <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="Pag_Name" name="Pag_Name"
                                    value="{{ old('Pag_Name', $model->Pag_Name) }}" placeholder="">
                                <span id="Pag_Name-error" class="error" style="color: red;"></span>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label class="form-label" for="Upload image">Upload image <span
                                        style="color:red">*</span></label>
                                <div class="input-group">
                                    <input id="photo" type="file" name="Pag_Image" style="display:none"
                                        onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                    <div class="input-group-prepend">
                                        <a class="btn btn-dark text-white" onclick="selectImage('photo')">Image</a>
                                    </div>
                                    <span id="Pag_Image-error" class="error" style="color: red;"></span>
                                </div>
                                <img id="selectedImagePreview2"
                                    src="{{ imageOrDefault('uploads/' . $model->Pag_Image, '/assets/images/default.jpg') }}"
                                    alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                @error('Pag_Image')
                                    <div class="has-error mt-2" style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success " data-loading-text="Loading..."><span
                                        class="fa fa-save fa-fw"></span> Save
                                </button>
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
            var maxSize = {{ $ImgMaxSizeModel->imgsize->Img_Title ?? '' }}; // Get the maximum file size from PHP

            function handleFileSizeValidation(fp, maxSize, errorSelector, clearSelectors) {
                var fileSize = fp[0].files[0].size; // Get the file size directly

                if (fileSize > maxSize) {
                    isFileSizeValid = false;
                    $(errorSelector).html(
                        `File size must not be more than @if ($ImgMaxSizeModel){{ $ImgMaxSizeModel->imgsize->Img_Value }}@endif `
                    );
                    $(clearSelectors.join(',')).val('').hide();
                } else {
                    isFileSizeValid = true;
                    $(errorSelector).html('');
                }
            }

            $('#photo').change(function() {
                handleFileSizeValidation($("#photo"), maxSize, "#Pag_Image-error", ['#photo',
                    '#SelectedFileName'
                ]);
            });

            $("#edit").validate({
                rules: {
                    Pag_Name: {
                        required: true,
                        maxlength: 255
                    },
                    Pag_Image: {
                        required: true

                    },
                    Pag_ShortDesc: {
                        required: true,
                        maxlength: 255
                    },
                    Pag_FullDesc: {
                        required: true,
                        maxlength: 255
                    },
                    Pag_SerialOrder: "required"
                },
                messages: {
                    Pag_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pag_Image: {
                        required: "This field is required"

                    },
                    Pag_ShortDesc: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pag_SerialOrder: "This field is required",
                    Pag_FullDesc: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    }
                },
                errorPlacement: function(error, element) {
                    var fieldName = element.attr("name");
                    if (fieldName === 'Pag_Image') {
                        // Display error message for Pag_Image in the specified span
                        $('#Pag_Image-error').html(error);
                    } else if (fieldName in fieldErrorMap) {
                        error.appendTo(fieldErrorMap[fieldName]);
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    if (isFileSizeValid) {
                        form.submit();
                    } else {
                      alert(
                            'File size must not be more than @if ($ImgMaxSizeModel){{ $ImgMaxSizeModel->imgsize->Img_Value }}@endif ');
                    }
                }
            });
            var fieldErrorMap = {
                Pag_Name: "#Pag_Name-error",
                Pag_Image: "#Pag_Image-error",

                Pag_ShortDesc: "#Pag_ShortDesc-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error",
                Pag_FullDesc: "#Pag_FullDesc-error"
            };
        });
        
    </script>
    <script>
        CKEDITOR.replace('Pag_FullDesc', {
            filebrowserUploadUrl: "/admin/images/upload",
            filebrowserUploadMethod: 'form',
            customConfig: '/path/to/your/config.js',
            height: 100
        }).setData(`{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}`);
    </script>
@stop

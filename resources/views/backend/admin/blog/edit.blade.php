@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Blog/</span> Edit Blog
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/blog') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Blog List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.blog.update', $model->Pag_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pag_Name" name="Pag_Name"
                                        value="{{ old('Pag_Name', $model->Pag_Name) }}" placeholder="">
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Title" class="form-label">Title<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pag_ShortDesc" name="Pag_ShortDesc"
                                        value="{{ old('Pag_ShortDesc', $model->Pag_ShortDesc) }}" placeholder="">
                                    <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">

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
                                </div>

                                <div class="col-sm-6">
                                    <label for="Serial Order" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                        value="{{ old('Pag_SerialOrder', $model->Pag_SerialOrder) }}" placeholder="">
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-lg-12">
                                    <label for="FullDesc" class="form-label">FullDesc</label>
                                    <textarea class="ckeditor form-control" id="Pag_FullDesc" name="Pag_FullDesc" placeholder="">{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}</textarea>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
                                </div>
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
                        // Use the helper function for file size validation
                        handleFileSizeValidation($("#photo"), 102400, "#Pag_Image-error", ['#photo',
                            '#SelectedFileName'
                        ]);
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
                            'File size must not be more than @if ($ImgMaxSizeModel){{ $ImgMaxSizeModel->imgsize->Img_Value }}@endif '
                            );
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
        // Common configuration
        const commonConfig = {
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
        };

        // Create or Edit mode
        @if (isset($model))
            // Edit mode
            CKEDITOR.replace('Pag_FullDesc', {
                ...commonConfig,
                fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            }).setData(`{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}`);
        @else
            // Create mode
            CKEDITOR.replace('Pag_FullDesc', {
                ...commonConfig,
                fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            });
        @endif
    </script>
@stop

@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Gallery Category/</span> Edit Gallery Category
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/galleryCategory') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Gallery Category List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.galleryCategory.update', $model->GallCat_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="GallCat_Name" name="GallCat_Name"
                                        value="{{ old('GallCat_Name', $model->GallCat_Name) }}" placeholder="">
                                    <span id="GallCat_Name-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Description" class="form-label">Description </label>
                                    <textarea class="form-control" id="GallCat_FullDesc" name="GallCat_FullDesc" placeholder="">{{ old('GallCat_FullDesc', $model->GallCat_FullDesc) }}</textarea>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Category Image">Category Image <span
                                            style="color:red">*</span></label>
                                    <div class="input-group">
                                        <input id="photo" type="file" name="GallCat_Image" style="display:none"
                                            onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-dark text-white" onclick="selectImage('photo')">Image</a>
                                        </div>
                                        <span id="GallCat_Image-error" class="error" style="color: red;"></span>
                                    </div>
                                    <img id="selectedImagePreview2"
                                        src="{{ imageOrDefault('uploads/' . $model->GallCat_Image, '/assets/images/default.jpg') }}"
                                        alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                    @error('GallCat_Image')
                                        <div class="has-error  mt-2" style='color:red'>{{ $message }}</div>
                                    @enderror
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
            var isFileSizeValid = true;
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
            // $('#photo').change(function() {
            //     handleFileSizeValidation($("#photo"), 102400, "#GallCat_Image-error", [
            //         '#GallCat_Image'
            //     ], 'selectedImagePreview');
            // });


            $('#photo').change(function() {
                handleFileSizeValidation($("#photo"), maxSize, "#GallCat_Image-error", ['#photo',
                    '#SelectedFileName'
                ]);
            });




            $("#edit").validate({
                rules: {
                    GallCat_Name: {
                        required: true,
                        maxlength: 255
                    },
                    GallCat_GallCat_Id: "required",

                    GallCat_Image: "required"
                },
                messages: {
                    GallCat_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    GallCat_GallCat_Id: "This field is required",

                    GallCat_Image: "This field is required"
                },
                submitHandler: function(form) {
                    if (isFileSizeValid) {
                        form.submit();
                    } else {
                        alert(
                            'File size must not be more than @if ($ImgMaxSizeModel){{ $ImgMaxSizeModel->imgsize->Img_Value }}@endif '
                            );
                    }
                },
                errorPlacement: function(error, element) {
                    var fieldName = element.attr("name");
                    if (fieldName in fieldErrorMap) {
                        error.appendTo(fieldErrorMap[fieldName]);
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            var fieldErrorMap = {
                GallCat_Name: "#GallCat_Name-error",
                GallCat_Image: "#GallCat_Image-error"

            };
        });
    </script>

@stop

@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Service/</span> Edit Service
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/service') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Service List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.service.update', $model->Pag_Id) }}"
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
                                    <label class="form-label" for=" Short Desc"> Short Desc <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_ShortDesc" name="Pag_ShortDesc" class="form-control"
                                            value="{{ old('Pag_ShortDesc', $model->Pag_ShortDesc) }}"
                                            aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label class="form-label" for="Icon">Icon </label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_URL" name="Pag_URL" class="form-control"
                                            value="{{ old('Pag_URL', $model->Pag_URL) }}" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <!-- <span id="Pag_URL-error" class="error" style="color: red;"></span> -->
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Image ">Image <span style="color:red">*</span></label>
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
                                <div class="col-sm-6">
                                    <label for="Serial Order" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                        value="{{ old('Pag_SerialOrder', $model->Pag_SerialOrder) }}" placeholder="">
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-lg-12">
                                    <label for="FullDesc" class="form-label">FullDesc</label>
                                    <textarea class="applyCK form-control" id="Pag_FullDesc" name="Pag_FullDesc" placeholder="">{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}</textarea>
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
                    Pag_Name: "required",
                    Pag_ShortDesc: "required",
                    // Pag_URL: "required",
                    Pag_SerialOrder: "required"

                },
                messages: {
                    Pag_Name: "This field is required",
                    Pag_ShortDesc: "This field is required",
                    // Pag_URL: "This field is required",
                    Pag_SerialOrder: "This field is required"

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
                Pag_ShortDesc: "#Pag_ShortDesc-error",
                // Pag_URL: "#Pag_URL-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error"
            };
        });
    </script>

@stop

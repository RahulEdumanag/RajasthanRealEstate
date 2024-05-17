@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Property /</span> Edit Property
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.property.update', $model->PId) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PName" name="PName"
                                        value="{{ old('PName', $model->PName) }}" placeholder="">
                                    <span id="PName-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Contact No" class="form-label">Contact No<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PContactNo" name="PContactNo"
                                        value="{{ old('PContactNo', $model->PContactNo) }}" placeholder="">
                                    <span id="PContactNo-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Email Id" class="form-label">Email Id<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PEmailId" name="PEmailId"
                                        value="{{ old('PEmailId', $model->PEmailId) }}" placeholder="">
                                    <span id="PEmailId-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label for="Tagline" class="form-label">Tagline<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PTagline" name="PTagline"
                                        value="{{ old('PTagline', $model->PTagline) }}" placeholder="">
                                    <span id="PTagline-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Map" class="form-label">Map<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PMap" name="PMap"
                                        value="{{ old('PMap', $model->PMap) }}" placeholder="">
                                    <span id="PMap-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label for="About" class="form-label">About<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PAbout" name="PAbout"
                                        value="{{ old('PAbout', $model->PAbout) }}" placeholder="">
                                    <span id="PAbout-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Opening Hours" class="form-label">Opening Hours<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PopeningHours"
                                        name="PopeningHours"
                                        value="{{ old('PopeningHours', $model->PopeningHours) }}"
                                        placeholder="">
                                    <span id="PopeningHours-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Address" class="form-label">Address<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="PAddress" name="PAddress" placeholder="">{{ old('PAddress', $model->PAddress) }}</textarea>
                                    <span id="PAddress-error" class="error" style="color: red;"></span>
                                </div>



                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Short Information</legend>
                                    <div class="row g-3">

                                        <div class="col-sm-6 form-group">
                                            <label for="Part 1" class="form-label">Part 1<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="PShortInfo1" name="PShortInfo1" placeholder="">{{ old('PShortInfo1', $model->PShortInfo1) }}</textarea>
                                            <span id="PShortInfo1-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 2" class="form-label">Part 2<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="PShortInfo2" name="PShortInfo2" placeholder="">{{ old('PShortInfo2', $model->PShortInfo2) }}</textarea>
                                            <span id="PShortInfo2-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 3" class="form-label">Part 3<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="PShortInfo3" name="PShortInfo3" placeholder="">{{ old('PShortInfo3', $model->PShortInfo3) }}</textarea>
                                            <span id="PShortInfo3-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 4" class="form-label">Part 4<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="PShortInfo4" name="PShortInfo4" placeholder="">{{ old('PShortInfo4', $model->PShortInfo4) }}</textarea>
                                            <span id="PShortInfo4-error" class="error" style="color: red;"></span>
                                        </div>


                                    </div>
                                </fieldset>
                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="  color: #6a6a6af5;">Upload Images</legend>
                                    <div class="row g-3">

                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="FooterLogo">FooterLogo <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo1" type="file" name="PFooterLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName1', 'selectedImagePreview1')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo1')">Image</a>
                                                </div>
                                                <span id="PFooterLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>

                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->PFooterLogo, '/assets/images/default.jpg') }}"
                                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">

                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="HeaderLogo">HeaderLogo <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo2" type="file" name="PHeaderLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName2', 'selectedImagePreview2')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo2')">Image</a>
                                                </div>
                                                <span id="PHeaderLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->PHeaderLogo, '/assets/images/default.jpg') }}"
                                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="Favicon">Favicon <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo3" type="file" name="PFavicon"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo3')">Image</a>
                                                </div>
                                                <span id="PFavicon-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->PFavicon, '/assets/images/default.jpg') }}"
                                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                        </div>
                                    </div>
                                </fieldset>

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
            // File input 1
            $('#photo1').change(function() {
                handleFileSizeValidation($("#photo1"), 102400, "#PFooterLogo-error", [
                    '#PFooterLogo', '#SelectedFileName1'
                ], 'selectedImagePreview1');
            });

            // File input 2
            $('#photo2').change(function() {
                handleFileSizeValidation($("#photo2"), 102400, "#PHeaderLogo-error", [
                    '#PHeaderLogo', '#SelectedFileName2'
                ], 'selectedImagePreview2');
            });

            // File input 3
            $('#photo3').change(function() {
                handleFileSizeValidation($("#photo3"), 102400, "#PFavicon-error", ['#PFavicon',
                    '#SelectedFileName3'
                ], 'selectedImagePreview3');
            });

            $("#edit").validate({
                rules: {
                    PName: {
                        required: true,
                        maxlength: 255
                    },

                    PContactNo: {
                        required: true,

                        minlength: 10
                    },
                    PEmailId: {
                        required: true,
                        email: true,

                    },
                    PAddress: {
                        required: true,
                        maxlength: 255
                    },
                    PFavicon: "required",
                    PHeaderLogo: "required",
                    PFooterLogo: "required",
                    PTagline: {
                        required: true,
                        maxlength: 255
                    },
                    PMap: {
                        required: true,
                        maxlength: 500
                    },
                    PAbout: {
                        required: true,
                        maxlength: 255
                    },
                    PopeningHours: {
                        required: true,
                        maxlength: 255
                    },
                    PShortInfo1: {
                        required: true,
                        maxlength: 255
                    },
                    PShortInfo2: {
                        required: true,
                        maxlength: 255
                    },

                    PShortInfo3: {
                        required: true,
                        maxlength: 255
                    },
                    PShortInfo4: {
                        required: true,
                        maxlength: 255
                    }
                },
                messages: {
                    PName: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },

                    PContactNo: {
                        required: "This field is required",
                        digits: "Please enter only digits",
                        maxlength: "Maximum length allowed is 10 digits"
                    },
                    PEmailId: {
                        required: "This field is required",
                        email: "Please enter a valid email address",

                    },
                    PAddress: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PFavicon: "This field is required",
                    PHeaderLogo: "This field is required",
                    PFooterLogo: "This field is required",
                    PTagline: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PMap: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PAbout: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PopeningHours: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PShortInfo1: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PShortInfo2: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PShortInfo3: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    PShortInfo4: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    }
                },
                submitHandler: function(form) {
                    if (isFileSizeValid) {
                        form.submit();
                    } else {
                        alert(
                            'File size must not be more than @if ($ImgMaxSizeModel){{ $ImgMaxSizeModel->imgsize->Img_Value }}@endif ');
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
                // File input 1

            });
            var fieldErrorMap = {
                PName: "#PName-error",

                PContactNo: "#PContactNo-error",
                PAddress: "#PAddress-error",
                PEmailId: "#PEmailId-error",
                PFavicon: "#PFavicon-error",
                PHeaderLogo: "#PHeaderLogo-error",
                PFooterLogo: "#PFooterLogo-error",
                PTagline: "#PTagline-error",
                PMap: "#PMap-error",
                PAbout: "#PAbout-error",
                PopeningHours: "#PopeningHours-error",
                PShortInfo1: "#PShortInfo1-error",
                PShortInfo2: "#PShortInfo2-error",
                PShortInfo3: "#PShortInfo3-error",
                PShortInfo4: "#PShortInfo4-error"
            };
        });
    </script>

@stop

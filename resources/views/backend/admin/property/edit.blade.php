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
                        <form id='edit' action="{{ Route('admin.property.update', $model->Pro_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pro_Name" name="Pro_Name"
                                        value="{{ old('Pro_Name', $model->Pro_Name) }}" placeholder="">
                                    <span id="Pro_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Contact No" class="form-label">Contact No<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pro_ContactNo" name="Pro_ContactNo"
                                        value="{{ old('Pro_ContactNo', $model->Pro_ContactNo) }}" placeholder="">
                                    <span id="Pro_ContactNo-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Email Id" class="form-label">Email Id<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pro_EmailId" name="Pro_EmailId"
                                        value="{{ old('Pro_EmailId', $model->Pro_EmailId) }}" placeholder="">
                                    <span id="Pro_EmailId-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label for="Tagline" class="form-label">Tagline<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pro_Tagline" name="Pro_Tagline"
                                        value="{{ old('Pro_Tagline', $model->Pro_Tagline) }}" placeholder="">
                                    <span id="Pro_Tagline-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Map" class="form-label">Map<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pro_Map" name="Pro_Map"
                                        value="{{ old('Pro_Map', $model->Pro_Map) }}" placeholder="">
                                    <span id="Pro_Map-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label for="About" class="form-label">About<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pro_About" name="Pro_About"
                                        value="{{ old('Pro_About', $model->Pro_About) }}" placeholder="">
                                    <span id="Pro_About-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Opening Hours" class="form-label">Opening Hours<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pro_openingHours"
                                        name="Pro_openingHours"
                                        value="{{ old('Pro_openingHours', $model->Pro_openingHours) }}"
                                        placeholder="">
                                    <span id="Pro_openingHours-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Address" class="form-label">Address<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="Pro_Address" name="Pro_Address" placeholder="">{{ old('Pro_Address', $model->Pro_Address) }}</textarea>
                                    <span id="Pro_Address-error" class="error" style="color: red;"></span>
                                </div>



                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Short Information</legend>
                                    <div class="row g-3">

                                        <div class="col-sm-6 form-group">
                                            <label for="Part 1" class="form-label">Part 1<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="Pro_ShortInfo1" name="Pro_ShortInfo1" placeholder="">{{ old('Pro_ShortInfo1', $model->Pro_ShortInfo1) }}</textarea>
                                            <span id="Pro_ShortInfo1-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 2" class="form-label">Part 2<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="Pro_ShortInfo2" name="Pro_ShortInfo2" placeholder="">{{ old('Pro_ShortInfo2', $model->Pro_ShortInfo2) }}</textarea>
                                            <span id="Pro_ShortInfo2-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 3" class="form-label">Part 3<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="Pro_ShortInfo3" name="Pro_ShortInfo3" placeholder="">{{ old('Pro_ShortInfo3', $model->Pro_ShortInfo3) }}</textarea>
                                            <span id="Pro_ShortInfo3-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 4" class="form-label">Part 4<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="Pro_ShortInfo4" name="Pro_ShortInfo4" placeholder="">{{ old('Pro_ShortInfo4', $model->Pro_ShortInfo4) }}</textarea>
                                            <span id="Pro_ShortInfo4-error" class="error" style="color: red;"></span>
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
                                                <input id="photo1" type="file" name="Pro_FooterLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName1', 'selectedImagePreview1')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo1')">Image</a>
                                                </div>
                                                <span id="Pro_FooterLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>

                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->Pro_FooterLogo, '/assets/images/default.jpg') }}"
                                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">

                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="HeaderLogo">HeaderLogo <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo2" type="file" name="Pro_HeaderLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName2', 'selectedImagePreview2')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo2')">Image</a>
                                                </div>
                                                <span id="Pro_HeaderLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->Pro_HeaderLogo, '/assets/images/default.jpg') }}"
                                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="Favicon">Favicon <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo3" type="file" name="Pro_Favicon"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo3')">Image</a>
                                                </div>
                                                <span id="Pro_Favicon-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->Pro_Favicon, '/assets/images/default.jpg') }}"
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
                handleFileSizeValidation($("#photo1"), 102400, "#Pro_FooterLogo-error", [
                    '#Pro_FooterLogo', '#SelectedFileName1'
                ], 'selectedImagePreview1');
            });

            // File input 2
            $('#photo2').change(function() {
                handleFileSizeValidation($("#photo2"), 102400, "#Pro_HeaderLogo-error", [
                    '#Pro_HeaderLogo', '#SelectedFileName2'
                ], 'selectedImagePreview2');
            });

            // File input 3
            $('#photo3').change(function() {
                handleFileSizeValidation($("#photo3"), 102400, "#Pro_Favicon-error", ['#Pro_Favicon',
                    '#SelectedFileName3'
                ], 'selectedImagePreview3');
            });

            $("#edit").validate({
                rules: {
                    Pro_Name: {
                        required: true,
                        maxlength: 255
                    },

                    Pro_ContactNo: {
                        required: true,

                        minlength: 10
                    },
                    Pro_EmailId: {
                        required: true,
                        email: true,

                    },
                    Pro_Address: {
                        required: true,
                        maxlength: 255
                    },
                    Pro_Favicon: "required",
                    Pro_HeaderLogo: "required",
                    Pro_FooterLogo: "required",
                    Pro_Tagline: {
                        required: true,
                        maxlength: 255
                    },
                    Pro_Map: {
                        required: true,
                        maxlength: 500
                    },
                    Pro_About: {
                        required: true,
                        maxlength: 255
                    },
                    Pro_openingHours: {
                        required: true,
                        maxlength: 255
                    },
                    Pro_ShortInfo1: {
                        required: true,
                        maxlength: 255
                    },
                    Pro_ShortInfo2: {
                        required: true,
                        maxlength: 255
                    },

                    Pro_ShortInfo3: {
                        required: true,
                        maxlength: 255
                    },
                    Pro_ShortInfo4: {
                        required: true,
                        maxlength: 255
                    }
                },
                messages: {
                    Pro_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },

                    Pro_ContactNo: {
                        required: "This field is required",
                        digits: "Please enter only digits",
                        maxlength: "Maximum length allowed is 10 digits"
                    },
                    Pro_EmailId: {
                        required: "This field is required",
                        email: "Please enter a valid email address",

                    },
                    Pro_Address: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_Favicon: "This field is required",
                    Pro_HeaderLogo: "This field is required",
                    Pro_FooterLogo: "This field is required",
                    Pro_Tagline: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_Map: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_About: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_openingHours: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_ShortInfo1: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_ShortInfo2: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_ShortInfo3: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pro_ShortInfo4: {
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
                Pro_Name: "#Pro_Name-error",

                Pro_ContactNo: "#Pro_ContactNo-error",
                Pro_Address: "#Pro_Address-error",
                Pro_EmailId: "#Pro_EmailId-error",
                Pro_Favicon: "#Pro_Favicon-error",
                Pro_HeaderLogo: "#Pro_HeaderLogo-error",
                Pro_FooterLogo: "#Pro_FooterLogo-error",
                Pro_Tagline: "#Pro_Tagline-error",
                Pro_Map: "#Pro_Map-error",
                Pro_About: "#Pro_About-error",
                Pro_openingHours: "#Pro_openingHours-error",
                Pro_ShortInfo1: "#Pro_ShortInfo1-error",
                Pro_ShortInfo2: "#Pro_ShortInfo2-error",
                Pro_ShortInfo3: "#Pro_ShortInfo3-error",
                Pro_ShortInfo4: "#Pro_ShortInfo4-error"
            };
        });
    </script>

@stop

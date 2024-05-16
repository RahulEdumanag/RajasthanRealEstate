@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">WebInfo /</span> Edit WebInfo
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.webInfo.update', $model->WebInf_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="WebInf_Name" name="WebInf_Name"
                                        value="{{ old('WebInf_Name', $model->WebInf_Name) }}" placeholder="">
                                    <span id="WebInf_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Contact No" class="form-label">Contact No<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="WebInf_ContactNo" name="WebInf_ContactNo"
                                        value="{{ old('WebInf_ContactNo', $model->WebInf_ContactNo) }}" placeholder="">
                                    <span id="WebInf_ContactNo-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Email Id" class="form-label">Email Id<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="WebInf_EmailId" name="WebInf_EmailId"
                                        value="{{ old('WebInf_EmailId', $model->WebInf_EmailId) }}" placeholder="">
                                    <span id="WebInf_EmailId-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label for="Tagline" class="form-label">Tagline<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="WebInf_Tagline" name="WebInf_Tagline"
                                        value="{{ old('WebInf_Tagline', $model->WebInf_Tagline) }}" placeholder="">
                                    <span id="WebInf_Tagline-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Map" class="form-label">Map<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="WebInf_Map" name="WebInf_Map"
                                        value="{{ old('WebInf_Map', $model->WebInf_Map) }}" placeholder="">
                                    <span id="WebInf_Map-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label for="About" class="form-label">About<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="WebInf_About" name="WebInf_About"
                                        value="{{ old('WebInf_About', $model->WebInf_About) }}" placeholder="">
                                    <span id="WebInf_About-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Opening Hours" class="form-label">Opening Hours<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="WebInf_openingHours"
                                        name="WebInf_openingHours"
                                        value="{{ old('WebInf_openingHours', $model->WebInf_openingHours) }}"
                                        placeholder="">
                                    <span id="WebInf_openingHours-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Address" class="form-label">Address<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="WebInf_Address" name="WebInf_Address" placeholder="">{{ old('WebInf_Address', $model->WebInf_Address) }}</textarea>
                                    <span id="WebInf_Address-error" class="error" style="color: red;"></span>
                                </div>



                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Short Information</legend>
                                    <div class="row g-3">

                                        <div class="col-sm-6 form-group">
                                            <label for="Part 1" class="form-label">Part 1<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="WebInf_ShortInfo1" name="WebInf_ShortInfo1" placeholder="">{{ old('WebInf_ShortInfo1', $model->WebInf_ShortInfo1) }}</textarea>
                                            <span id="WebInf_ShortInfo1-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 2" class="form-label">Part 2<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="WebInf_ShortInfo2" name="WebInf_ShortInfo2" placeholder="">{{ old('WebInf_ShortInfo2', $model->WebInf_ShortInfo2) }}</textarea>
                                            <span id="WebInf_ShortInfo2-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 3" class="form-label">Part 3<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="WebInf_ShortInfo3" name="WebInf_ShortInfo3" placeholder="">{{ old('WebInf_ShortInfo3', $model->WebInf_ShortInfo3) }}</textarea>
                                            <span id="WebInf_ShortInfo3-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="Part 4" class="form-label">Part 4<span
                                                    style="color:red">*</span></label>
                                            <textarea class="form-control" id="WebInf_ShortInfo4" name="WebInf_ShortInfo4" placeholder="">{{ old('WebInf_ShortInfo4', $model->WebInf_ShortInfo4) }}</textarea>
                                            <span id="WebInf_ShortInfo4-error" class="error" style="color: red;"></span>
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
                                                <input id="photo1" type="file" name="WebInf_FooterLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName1', 'selectedImagePreview1')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo1')">Image</a>
                                                </div>
                                                <span id="WebInf_FooterLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>

                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->WebInf_FooterLogo, '/assets/images/default.jpg') }}"
                                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">

                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="HeaderLogo">HeaderLogo <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo2" type="file" name="WebInf_HeaderLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName2', 'selectedImagePreview2')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo2')">Image</a>
                                                </div>
                                                <span id="WebInf_HeaderLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->WebInf_HeaderLogo, '/assets/images/default.jpg') }}"
                                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="Favicon">Favicon <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo3" type="file" name="WebInf_Favicon"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo3')">Image</a>
                                                </div>
                                                <span id="WebInf_Favicon-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview2"
                                                src="{{ imageOrDefault('uploads/' . $model->WebInf_Favicon, '/assets/images/default.jpg') }}"
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
                handleFileSizeValidation($("#photo1"), 102400, "#WebInf_FooterLogo-error", [
                    '#WebInf_FooterLogo', '#SelectedFileName1'
                ], 'selectedImagePreview1');
            });

            // File input 2
            $('#photo2').change(function() {
                handleFileSizeValidation($("#photo2"), 102400, "#WebInf_HeaderLogo-error", [
                    '#WebInf_HeaderLogo', '#SelectedFileName2'
                ], 'selectedImagePreview2');
            });

            // File input 3
            $('#photo3').change(function() {
                handleFileSizeValidation($("#photo3"), 102400, "#WebInf_Favicon-error", ['#WebInf_Favicon',
                    '#SelectedFileName3'
                ], 'selectedImagePreview3');
            });

            $("#edit").validate({
                rules: {
                    WebInf_Name: {
                        required: true,
                        maxlength: 255
                    },

                    WebInf_ContactNo: {
                        required: true,

                        minlength: 10
                    },
                    WebInf_EmailId: {
                        required: true,
                        email: true,

                    },
                    WebInf_Address: {
                        required: true,
                        maxlength: 255
                    },
                    WebInf_Favicon: "required",
                    WebInf_HeaderLogo: "required",
                    WebInf_FooterLogo: "required",
                    WebInf_Tagline: {
                        required: true,
                        maxlength: 255
                    },
                    WebInf_Map: {
                        required: true,
                        maxlength: 500
                    },
                    WebInf_About: {
                        required: true,
                        maxlength: 255
                    },
                    WebInf_openingHours: {
                        required: true,
                        maxlength: 255
                    },
                    WebInf_ShortInfo1: {
                        required: true,
                        maxlength: 255
                    },
                    WebInf_ShortInfo2: {
                        required: true,
                        maxlength: 255
                    },

                    WebInf_ShortInfo3: {
                        required: true,
                        maxlength: 255
                    },
                    WebInf_ShortInfo4: {
                        required: true,
                        maxlength: 255
                    }
                },
                messages: {
                    WebInf_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },

                    WebInf_ContactNo: {
                        required: "This field is required",
                        digits: "Please enter only digits",
                        maxlength: "Maximum length allowed is 10 digits"
                    },
                    WebInf_EmailId: {
                        required: "This field is required",
                        email: "Please enter a valid email address",

                    },
                    WebInf_Address: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_Favicon: "This field is required",
                    WebInf_HeaderLogo: "This field is required",
                    WebInf_FooterLogo: "This field is required",
                    WebInf_Tagline: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_Map: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_About: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_openingHours: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_ShortInfo1: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_ShortInfo2: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_ShortInfo3: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    WebInf_ShortInfo4: {
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
                WebInf_Name: "#WebInf_Name-error",

                WebInf_ContactNo: "#WebInf_ContactNo-error",
                WebInf_Address: "#WebInf_Address-error",
                WebInf_EmailId: "#WebInf_EmailId-error",
                WebInf_Favicon: "#WebInf_Favicon-error",
                WebInf_HeaderLogo: "#WebInf_HeaderLogo-error",
                WebInf_FooterLogo: "#WebInf_FooterLogo-error",
                WebInf_Tagline: "#WebInf_Tagline-error",
                WebInf_Map: "#WebInf_Map-error",
                WebInf_About: "#WebInf_About-error",
                WebInf_openingHours: "#WebInf_openingHours-error",
                WebInf_ShortInfo1: "#WebInf_ShortInfo1-error",
                WebInf_ShortInfo2: "#WebInf_ShortInfo2-error",
                WebInf_ShortInfo3: "#WebInf_ShortInfo3-error",
                WebInf_ShortInfo4: "#WebInf_ShortInfo4-error"
            };
        });
    </script>

@stop

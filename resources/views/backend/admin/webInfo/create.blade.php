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
        @if (Auth::user()->EmpRegistration->Emp_Role == '1')
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="py-3">
                    <span class="text-muted fw-light">Web Info/</span> Add Web Info
                </h5>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/webInfo') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Web Info List
                    </a>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.webInfo.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">


                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="WebInf_Name" name="WebInf_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your Name" aria-describedby="name2" />
                                    </div>
                                    <span id="WebInf_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Contact No">Contact No <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="WebInf_ContactNo" name="WebInf_ContactNo"
                                            class="form-control" autocomplete="off" placeholder="Enter your Contact No"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="WebInf_ContactNo-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Email Id">Email Id <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="WebInf_EmailId" name="WebInf_EmailId" class="form-control"
                                            autocomplete="off" placeholder="Enter your Email Id" aria-describedby="name2" />
                                    </div>
                                    <span id="WebInf_EmailId-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Tagline">Tagline <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="WebInf_Tagline" name="WebInf_Tagline" class="form-control"
                                            autocomplete="off" placeholder="Enter your Tagline" aria-describedby="name2" />
                                    </div>
                                    <span id="WebInf_Tagline-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Map">Map <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="WebInf_Map" name="WebInf_Map" class="form-control"
                                            autocomplete="off" placeholder="Enter your Map Link" aria-describedby="name2" />
                                    </div>
                                    <span id="WebInf_Map-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="About">About <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="WebInf_About" name="WebInf_About" class="form-control"
                                            autocomplete="off" placeholder="Enter About Website "
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="WebInf_About-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Opening Hours">Opening Hours <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="WebInf_openingHours" name="WebInf_openingHours"
                                            class="form-control" autocomplete="off"
                                            placeholder="Enter your Opening Hours" aria-describedby="name2" />
                                    </div>
                                    <span id="WebInf_openingHours-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Address">Address <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="WebInf_Address" name="WebInf_Address" class="form-control" autocomplete="off"
                                            placeholder="Enter your Address" aria-describedby="name2"></textarea>
                                    </div>
                                    <span id="WebInf_Address-error" class="error" style="color: red;"></span>
                                </div>
                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Short Information</legend>
                                    <div class="row g-3">
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 1">Part 1 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="WebInf_ShortInfo1" name="WebInf_ShortInfo1" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo1" aria-describedby="name2"></textarea>
                                            <span id="WebInf_ShortInfo1-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 2">Part 2 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="WebInf_ShortInfo2" name="WebInf_ShortInfo2" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo2" aria-describedby="name2"></textarea>
                                            <span id="WebInf_ShortInfo2-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 3">Part 3 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="WebInf_ShortInfo3" name="WebInf_ShortInfo3" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo3" aria-describedby="name2"></textarea>
                                            <span id="WebInf_ShortInfo3-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label class="form-label" for="Part 4">Part 4 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="WebInf_ShortInfo4" name="WebInf_ShortInfo4" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo4" aria-describedby="name2"></textarea>
                                            <span id="WebInf_ShortInfo4-error" class="error" style="color: red;"></span>
                                        </div>

                                    </div>
                                </fieldset>

                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="  color: #6a6a6af5;">Upload Images</legend>
                                    <div class="row g-3">

                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group">
                                            <label class="form-label" for="FooterLogo">Footer Logo <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo1" type="file" name="WebInf_FooterLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName1', 'selectedImagePreview1')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo1')">Image</a>
                                                </div>
                                                <input type="text" name="WebInf_FooterLogo" class="form-control"
                                                    id="SelectedFileName1" value="" readonly>
                                                <span id="WebInf_FooterLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview1" src="" alt="Selected Image"
                                                style="display:none; max-width: 10%; margin-top: 10px;">
                                            <span id="WebInf_FooterLogo-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group">
                                            <label class="form-label" for="Logo">Logo <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo2" type="file" name="WebInf_HeaderLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName2', 'selectedImagePreview2')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo2')">Image</a>
                                                </div>
                                                <input type="text" name="WebInf_HeaderLogo" class="form-control"
                                                    id="SelectedFileName2" value="" readonly>
                                                <span id="WebInf_HeaderLogo-error" class="error"
                                                    style="color: red;"></span>

                                            </div>
                                            <img id="selectedImagePreview2" src="" alt="Selected Image"
                                                style="display:none; max-width: 10%; margin-top: 10px;">
                                            <span id="WebInf_HeaderLogo-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group">
                                            <label class="form-label" for="Fav icon">Fav icon <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo3" type="file" name="WebInf_Favicon"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo3')">Image</a>
                                                </div>
                                                <input type="text" name="WebInf_Favicon" class="form-control"
                                                    id="SelectedFileName3" value="" readonly>
                                                <span id="WebInf_Favicon-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview3" src="" alt="Selected Image"
                                                style="display:none; max-width: 10%; margin-top: 10px;">
                                            <span id="WebInf_Favicon-error" class="error" style="color: red;"></span>
                                        </div>


                                    </div>
                                </fieldset>
                                <div class="form-group mt-3">
                                    <div class=" d-flex col-xl-6">
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                            <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span>
                                                Save
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
        function handleCheckboxChange(checkbox) {
            const icon = checkbox.parentElement.querySelector('.icon');
            if (checkbox.checked) {
                icon.classList.add('icon-moved');

            } else {
                icon.classList.remove('icon-moved');

            }
        }
    </script>
    <script>
        $(document).ready(function($) {
            var isFileSizeValid = true;

            function handleFileSizeValidation(fp, maxSize, errorSelector, clearSelectors) {
                var fileSize = Array.from(fp[0].files).reduce((size, file) => size + file.size, 0);

                if (fileSize > maxSize) {
                    isFileSizeValid = false;
                    $(errorSelector).html(`File size must not be more than 
                        @if ($ImgMaxSizeModel)
                        {{ $ImgMaxSizeModel->imgsize->Img_Value }}
                        @endif
                        `);
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

            $("#register-form").validate({
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
    <script>
        function displaySelectedImage(input, fileNameId, previewId) {
            var selectedFileName = input.files[0].name;
            document.getElementById(fileNameId).value = selectedFileName;
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                document.getElementById(previewId).style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }

        function selectImage(inputId) {
            $('#' + inputId).click();
        }
    </script>
@endsection

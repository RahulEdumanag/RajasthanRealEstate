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
                    <span class="text-muted fw-light">Property/</span> Add Property
                </h5>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/property') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Property List
                    </a>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.property.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">


                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pro_Name" name="Pro_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your Name" aria-describedby="name2" />
                                    </div>
                                    <span id="Pro_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Contact No">Contact No <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="Pro_ContactNo" name="Pro_ContactNo"
                                            class="form-control" autocomplete="off" placeholder="Enter your Contact No"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="Pro_ContactNo-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Email Id">Email Id <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pro_EmailId" name="Pro_EmailId" class="form-control"
                                            autocomplete="off" placeholder="Enter your Email Id" aria-describedby="name2" />
                                    </div>
                                    <span id="Pro_EmailId-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Tagline">Tagline <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pro_Tagline" name="Pro_Tagline" class="form-control"
                                            autocomplete="off" placeholder="Enter your Tagline" aria-describedby="name2" />
                                    </div>
                                    <span id="Pro_Tagline-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Map">Map <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pro_Map" name="Pro_Map" class="form-control"
                                            autocomplete="off" placeholder="Enter your Map Link" aria-describedby="name2" />
                                    </div>
                                    <span id="Pro_Map-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="About">About <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pro_About" name="Pro_About" class="form-control"
                                            autocomplete="off" placeholder="Enter About Website "
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="Pro_About-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Opening Hours">Opening Hours <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pro_openingHours" name="Pro_openingHours"
                                            class="form-control" autocomplete="off"
                                            placeholder="Enter your Opening Hours" aria-describedby="name2" />
                                    </div>
                                    <span id="Pro_openingHours-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Address">Address <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="Pro_Address" name="Pro_Address" class="form-control" autocomplete="off"
                                            placeholder="Enter your Address" aria-describedby="name2"></textarea>
                                    </div>
                                    <span id="Pro_Address-error" class="error" style="color: red;"></span>
                                </div>
                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Short Information</legend>
                                    <div class="row g-3">
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 1">Part 1 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="Pro_ShortInfo1" name="Pro_ShortInfo1" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo1" aria-describedby="name2"></textarea>
                                            <span id="Pro_ShortInfo1-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 2">Part 2 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="Pro_ShortInfo2" name="Pro_ShortInfo2" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo2" aria-describedby="name2"></textarea>
                                            <span id="Pro_ShortInfo2-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 3">Part 3 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="Pro_ShortInfo3" name="Pro_ShortInfo3" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo3" aria-describedby="name2"></textarea>
                                            <span id="Pro_ShortInfo3-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label class="form-label" for="Part 4">Part 4 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="Pro_ShortInfo4" name="Pro_ShortInfo4" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo4" aria-describedby="name2"></textarea>
                                            <span id="Pro_ShortInfo4-error" class="error" style="color: red;"></span>
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
                                                <input id="photo1" type="file" name="Pro_FooterLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName1', 'selectedImagePreview1')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo1')">Image</a>
                                                </div>
                                                <input type="text" name="Pro_FooterLogo" class="form-control"
                                                    id="SelectedFileName1" value="" readonly>
                                                <span id="Pro_FooterLogo-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview1" src="" alt="Selected Image"
                                                style="display:none; max-width: 10%; margin-top: 10px;">
                                            <span id="Pro_FooterLogo-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group">
                                            <label class="form-label" for="Logo">Logo <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo2" type="file" name="Pro_HeaderLogo"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName2', 'selectedImagePreview2')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo2')">Image</a>
                                                </div>
                                                <input type="text" name="Pro_HeaderLogo" class="form-control"
                                                    id="SelectedFileName2" value="" readonly>
                                                <span id="Pro_HeaderLogo-error" class="error"
                                                    style="color: red;"></span>

                                            </div>
                                            <img id="selectedImagePreview2" src="" alt="Selected Image"
                                                style="display:none; max-width: 10%; margin-top: 10px;">
                                            <span id="Pro_HeaderLogo-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group">
                                            <label class="form-label" for="Fav icon">Fav icon <span
                                                    style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input id="photo3" type="file" name="Pro_Favicon"
                                                    style="display:none"
                                                    onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="selectImage('photo3')">Image</a>
                                                </div>
                                                <input type="text" name="Pro_Favicon" class="form-control"
                                                    id="SelectedFileName3" value="" readonly>
                                                <span id="Pro_Favicon-error" class="error"
                                                    style="color: red;"></span>
                                            </div>
                                            <img id="selectedImagePreview3" src="" alt="Selected Image"
                                                style="display:none; max-width: 10%; margin-top: 10px;">
                                            <span id="Pro_Favicon-error" class="error" style="color: red;"></span>
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

            $("#register-form").validate({
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

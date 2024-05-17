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
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="type"> Property Type <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="PPTyp_Id" name="PPTyp_Id">
                                        <option selected disabled>Select Property Type</option>
                                        @foreach ($PropertyTypeModel as $value)
                                            <option value='{{ $value->PTyp_Id }}'>{{ $value->PTyp_Name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="PPTyp_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="type"> City <span style="color:red">*</span></label>
                                    <select class="form-control" id="PCit_Id" name="PCit_Id">
                                        <option selected disabled>Select City</option>
                                        @foreach ($CityModel as $value)
                                            <option value='{{ $value->Cit_Id }}'>{{ $value->Cit_Name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="PPTyp_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="type">Property Features<span
                                            style="color:red">*</span></label>
                                    <div class="row">
                                        @foreach ($PropertyFeaturesModel as $value)
                                            <div class="col-3 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="PFea_Id[]"
                                                        id="PFea_Id_{{ $value->PFea_Id }}" value="{{ $value->PFea_Id }}">
                                                    <label class="form-check-label"
                                                        for="PFea_Id_{{ $value->PFea_Id }}">{{ $value->PFea_Name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <span id="PFea_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Property Code">Property Code <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="PPropertycode" name="PPropertycode" class="form-control"
                                            autocomplete="off" placeholder="Enter your Property Code"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="PPropertycode-error" class="error" style="color: red;"></span>
                                </div>



                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Title">Title <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="PTitle" name="PTitle" class="form-control"
                                            autocomplete="off" placeholder="Enter your Title" aria-describedby="name2" />
                                    </div>
                                    <span id="PTitle-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Tag">Tag <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="PTag" name="PTag" class="form-control"
                                            autocomplete="off" placeholder="Enter your Tag" aria-describedby="name2" />
                                    </div>
                                    <span id="PTag-error" class="error" style="color: red;"></span>
                                </div>



                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Short Desc">Short Desc <span
                                            style="color:red">*</span></label>
                                    <textarea id="PShortDesc" name="PShortDesc" class="form-control" autocomplete="off"
                                        placeholder="Enter your ShortInfo1" aria-describedby="name2"></textarea>
                                    <span id="PShortDesc-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="Full Desc">Full Desc</label>
                                    <textarea class="applyCK form-control" id="PFullDesc" name="PFullDesc" class="form-control"></textarea>
                                    <span id="PFullDesc-error" class="error" style="color: red;"></span>
                                </div>





                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="type"> Featured <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="PFeatured" name="PFeatured">
                                        <option selected disabled>Select Featured</option>

                                        <option value='1'>Yes</option>
                                        <option value='0'>No</option>

                                    </select>
                                    <span id="PFeatured-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Address">Address <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="PAddress" name="PAddress" class="form-control" autocomplete="off" placeholder="Enter your Address"
                                            aria-describedby="name2"></textarea>
                                    </div>
                                    <span id="PAddress-error" class="error" style="color: red;"></span>
                                </div>



                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="type"> BedRoom <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="PBedRoom" name="PBedRoom">
                                        <option selected disabled>Select BedRoom</option>

                                        <option value='1'>1</option>
                                        <option value='0'>1</option>

                                    </select>
                                    <span id="PBedRoom-error" class="error" style="color: red;"></span>
                                </div>



                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="type"> BathRoom <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="PBathRoom" name="PBathRoom">
                                        <option selected disabled>Select BathRoom</option>

                                        <option value='1'>1</option>
                                        <option value='0'>1</option>

                                    </select>
                                    <span id="PBathRoom-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="SqureFeet">SqureFeet <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="PSqureFeet" name="PSqureFeet" class="form-control"
                                            autocomplete="off" placeholder="Enter your SqureFeet"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="PSqureFeet-error" class="error" style="color: red;"></span>
                                </div>



                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Map">Map Link<span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="PMapLink" name="PMapLink" class="form-control"
                                            autocomplete="off" placeholder="Enter your Map Link"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="PMapLink-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Map">Amount<span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="PAmount" name="PAmount" class="form-control"
                                            autocomplete="off" placeholder="Enter your Amount"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="PAmount-error" class="error" style="color: red;"></span>
                                </div>




                                 
                              
                                <!-- <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Short Information</legend>
                                    <div class="row g-3">
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 1">Part 1 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="PShortInfo1" name="PShortInfo1" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo1" aria-describedby="name2"></textarea>
                                            <span id="PShortInfo1-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 2">Part 2 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="PShortInfo2" name="PShortInfo2" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo2" aria-describedby="name2"></textarea>
                                            <span id="PShortInfo2-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Part 3">Part 3 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="PShortInfo3" name="PShortInfo3" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo3" aria-describedby="name2"></textarea>
                                            <span id="PShortInfo3-error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="col-sm-6 form-group mb-3">
                                            <label class="form-label" for="Part 4">Part 4 <span
                                                    style="color:red">*</span></label>
                                            <textarea id="PShortInfo4" name="PShortInfo4" class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortInfo4" aria-describedby="name2"></textarea>
                                            <span id="PShortInfo4-error" class="error" style="color: red;"></span>
                                        </div>
                                    </div>
                                </fieldset> -->
                           
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
            $("#register-form").validate({
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

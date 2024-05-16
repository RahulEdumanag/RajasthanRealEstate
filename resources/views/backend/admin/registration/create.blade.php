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



    @if (session()->has('generated_password') && session()->has('generated_username'))
        <div id="success-alert" class="alert alert-info">
            <p>Client Username: <span id="generatedUsername">{{ session('generated_username') }}</span></p>
            <p>Client Password: <span id="generatedPassword">{{ session('generated_password') }}</span></p>
            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedUsername">
                Copy Username
            </button>
            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedPassword">
                Copy Password
            </button>
            <button class="btn btn-sm btn-outline-danger" onclick="removeSuccessAlert()">
                &#10006; <!-- Cross icon -->
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Client Registration/</span> Add Registration
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/registration') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>Client Registration List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.registration.store') }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Reg_Organization_Name">Organization Name <span
                                            style="color:red">*</span></label>
                                    <input type="text" id="Reg_Organization_Name" name="Reg_Organization_Name"
                                        class="form-control" autocomplete="off" placeholder="Organization your Name" />
                                    <span id="Reg_Organization_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Reg_Name">Name <span style="color:red">*</span></label>
                                    <input type="text" id="Reg_Name" name="Reg_Name" class="form-control"
                                        autocomplete="off" placeholder="Enter your Name" />
                                    <span id="Reg_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Reg_Email">Email <span style="color:red">*</span></label>
                                    <input type="email" id="Reg_Email" name="Reg_Email" class="form-control"
                                        autocomplete="off" placeholder="Enter your email " />
                                    <span id="Reg_Email-error" class="error" style="color: red;"></span>
                                    @error('Reg_Email')
                                        <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Reg_Contact">Contact <span
                                            style="color:red">*</span></label>
                                    <input type="number" id="Reg_Contact" name="Reg_Contact" class="form-control"
                                        autocomplete="off" placeholder="Enter your contact" />
                                    <span id="Reg_Contact-error" class="error" style="color: red;"></span>

                                </div>


                                <div class="form-group col-md-6 col-sm-12 mb-4">
                                    <label for="Reg_Address">Address<span style="color:red">*</span></label>
                                    <textarea class="form-control" id="Reg_Address" name="Reg_Address" autocomplete="off"
                                        placeholder="Enter Address address"></textarea>
                                    <span id="Reg_Address-error" class="error" style="color: red;"></span>

                                </div>


                                <div class="form-group col-md-6 col-sm-12 mb-4">
                                    <label for="Reg_Remark">Remark<span style="color:red">*</span></label>
                                    <textarea class="form-control" id="Reg_Remark" name="Reg_Remark" autocomplete="off" placeholder="Enter remark"></textarea>
                                    <span id="Reg_Remark-error" class="error" style="color: red;"></span>

                                </div>

                                <!-- <div class="form-group col-md-6 col-sm-12 mb-4">
                                    <label for="Reg_StartDate">Start Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="Reg_StartDate" name="Reg_StartDate"
                                        required>
                                    <span id="Reg_StartDate-error" class="error" style="color: red;"></span>

                                </div>

                                <div class="form-group col-md-6 col-sm-12 mb-4">
                                    <label for="Reg_ExpiryPeriod">Expiry Period (in days)<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="Reg_ExpiryPeriod"
                                        name="Reg_ExpiryPeriod" autocomplete="off" placeholder="Enter expiry period"
                                        required>
                                    <span id="Reg_ExpiryPeriod-error" class="error" style="color: red;"></span>

                                </div> -->

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Logo">Logo <span
                                            style="color:red">*</span></label>
                                    <div class="input-group">
                                        <input id="photo" type="file" name="Reg_Logo" style="display:none"
                                            onchange="displaySelectedImage(this, 'SelectedFileName', 'selectedImagePreview')"
                                            accept="image/*">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-dark text-white"
                                                onclick="$('input[id=photo]').click();">Image</a>
                                        </div>
                                        <input type="text" name="Reg_Logo" class="form-control" id="SelectedFileName"
                                            value="" readonly>

                                    </div>
                                    <img id="selectedImagePreview" src="" alt="Selected Image"
                                        style="display:none; max-width: 10%; margin-top: 10px;">
                                    <span id="Reg_Logo-error" class="error" style="color: red;"></span>
                                    @error('Reg_Logo')
                                        <div class="has-error mt-2" style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Reg_Amount">Amount <span
                                            style="color:red">*</span></label>
                                    <input type="text" id="Reg_Amount" name="Reg_Amount" class="form-control"
                                        autocomplete="off" placeholder="Enter Amount" />
                                    <span id="Reg_Amount-error" class="error" style="color: red;"></span>

                                </div>


                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Reg_TwoStepVerification">Two-Step Verification</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="Reg_TwoStepVerification"
                                            name="Reg_TwoStepVerification" class="form-check-input" value="1">
                                        <label class="form-check-label" for="Reg_TwoStepVerification">Enable Two-Step
                                            Verification</label>
                                    </div>
                                    <span id="Reg_TwoStepVerification-error" class="error" style="color: red;"></span>
                                </div>



                                <div class=" d-flex col-xl-12">
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                        <button type="submit" class="btn "
                                            style="background-color:#7367f0;color:white"
                                            data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                        </button>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">

                                        <button type="button" class="btn btn-secondary" onclick="confirmReset()">
                                            <i class="fa fa-refresh fa-fw"></i> Reset
                                        </button>
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
        $(document).ready(function($) {

            $("#register-form").validate({
                rules: {
                    Reg_Logo: {
                        required: true,
                        accept: "image/*",
                        filesize: 1024 * 1024
                    },
                    Reg_Organization_Name: {
                        required: true,
                        maxlength: 255
                    },
                    Reg_Name: {
                        required: true,
                        maxlength: 255
                    },
                    Reg_Email: {
                        required: true,
                        email: true,

                    },
                    Reg_Contact: {
                        required: true,
                        digits: true,
                        maxlength: 10
                    },
                    Reg_Address: {
                        required: true,
                        maxlength: 255
                    },
                   
                    Reg_Remark: {
                        required: true,
                        maxlength: 255
                    },
                    Reg_StartDate: "required",
                    Reg_StartDate: "required",
                    Reg_ExpiryPeriod: {
                        required: true,
                        digits: true,
                        maxlength: 4
                    },
                    Reg_Role: "required",
                    Reg_Amount: "required"

                },
                messages: {
                    Reg_Logo: {
                        required: "This field is required",
                        accept: "Please upload a valid image file",
                        filesize: "File size must be less than 1 MB"
                    },
                    Reg_Organization_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Reg_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Reg_Email: {
                        required: "This field is required",
                        email: "Please enter a valid email address",

                    },
                    Reg_Contact: {
                        required: "This field is required",
                        digits: "Please enter only digits",
                        maxlength: "Maximum length allowed is 10 digits"
                    },
                    Reg_Amount: {
                        required: "This field is required",
                        digits: "Please enter only digits",
                        maxlength: "Maximum length allowed is 10 digits"
                    },
                    Reg_Address: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },

                    Reg_Remark: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Reg_StartDate: "This field is required",
                    Reg_ExpiryPeriod: {
                        required: "This field is required",
                        digits: "Please enter only digits",
                        maxlength: "Please enter exactly 4 digits"
                    },
                    Reg_Role: "This field is required"
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
                    form.submit();
                }
            });
            var fieldErrorMap = {
                Reg_Amount: "#Reg_Amount-error",
                Reg_Logo: "#Reg_Logo-error",
                Reg_Organization_Name: "#Reg_Organization_Name-error",
                Reg_Name: "#Reg_Name-error",
                Reg_Email: "#Reg_Email-error",
                Reg_Contact: "#Reg_Contact-error",
                Reg_Address: "#Reg_Address-error",
                Reg_Remark: "#Reg_Remark-error",
                Reg_StartDate: "#Reg_StartDate-error",
                Reg_ExpiryPeriod: "#Reg_ExpiryPeriod-error",
                Reg_Role: "#Reg_Role-error"
            };
        });
    </script>
    <script>
        function displaySelectedImage(input) {
            var selectedFileName = input.files[0].name;
            document.getElementById('SelectedFileName').value = selectedFileName;
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('selectedImagePreview').src = e.target.result;
                document.getElementById('selectedImagePreview').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>


@stop

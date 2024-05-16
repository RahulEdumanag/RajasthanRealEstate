@extends('backend.layouts.master')
@section('title', 'Create')
@section('content')

    <div class="col-12">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('generated_password') && session()->has('generated_username'))
            <div id="employee-alert" class="alert alert-info">
                <p>Employee Username: <span id="generatedUsername">{{ session('generated_username') }}</span></p>
                <p>Employee Password: <span id="generatedPassword">{{ session('generated_password') }}</span></p>
                <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedUsername">
                    Copy Username
                </button>
                <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedPassword">
                    Copy Password
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="removeEmployeeAlert()">
                    &#10006; <!-- Cross icon -->
                </button>
            </div>
        @endif


        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="py-3">
                    <span class="text-muted fw-light">Employee/</span> Add Employee
                </h5>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/empRegistration') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Employee List
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form id="register-form" action="{{ route('admin.empRegistration.store') }}" enctype="multipart/form-data"
                    method="post" accept-charset="utf-8" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Emp_Name">Name <span style="color:red">*</span></label>
                            <input type="text" id="Emp_Name" name="Emp_Name" class="form-control" autocomplete="off"
                                placeholder="Enter Name" />
                            <span id="Emp_Name-error" class="error" style="color: red;"></span>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Emp_Email">Email <span style="color:red">*</span></label>
                            <input type="email" id="Emp_Email" name="Emp_Email" class="form-control" autocomplete="off"
                                placeholder="Enter Name" />
                            <span id="Emp_Email-error" class="error" style="color: red;"></span>
                            @error('Emp_Email')
                                <div class="has-error mt-2" style="color: red">This email is already exists</div>
                            @enderror
                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Emp_Contact">Contact <span style="color:red">*</span></label>
                            <input type="number" id="Emp_Contact" name="Emp_Contact" class="form-control"
                                autocomplete="off" placeholder="Enter contact" maxlength="10" />
                            <span id="Emp_Contact-error" class="error" style="color: red;"></span>
                        </div>



                        <div class="form-group col-md-6 col-sm-12 mb-4">
                            <label for="Emp_Address">Address<span style="color:red">*</span></label>
                            <textarea class="form-control" id="Emp_Address" name="Emp_Address" autocomplete="off" placeholder="Enter address"></textarea>
                            <span id="Emp_Address-error" class="error" style="color: red;"></span>

                        </div>


                        <div class="form-group col-md-6 col-sm-12 mb-4">
                            <label for="Emp_Remark">Remark<span style="color:red">*</span></label>
                            <textarea class="form-control" id="Emp_Remark" name="Emp_Remark" autocomplete="off" placeholder="Enter remark"></textarea>
                            <span id="Emp_Remark-error" class="error" style="color: red;"></span>

                        </div>

                        <div class="form-group col-md-6 col-sm-12 mb-4">
                            <label for="Emp_StartDate">Start Date<span style="color:red">*</span></label>
                            <input type="date" class="form-control" id="Emp_StartDate" name="Emp_StartDate" required>
                            <span id="Emp_StartDate-error" class="error" style="color: red;"></span>

                        </div>

                        <div class="form-group col-md-6 col-sm-12 mb-4">
                            <label for="Emp_ExpiryPeriod">Expiry Period<span style="color:red">*</span>(in days)</label>
                            <input type="number" class="form-control" id="Emp_ExpiryPeriod" name="Emp_ExpiryPeriod"
                                autocomplete="off" placeholder="Enter expiry period" required>
                            <span id="Emp_ExpiryPeriod-error" class="error" style="color: red;"></span>

                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Emp_Role">Role <span style="color:red">*</span></label>
                            <select id="Emp_Role" name="Emp_Role" class="form-select">
                                <option value="" selected disable>Select</option>

                                <option value="2">Admin</option>
                                <!-- <option value="3">User</option>
                                            <option value="4">Employee</option> -->
                            </select>
                            <span id="Emp_Role-error" class="error" style="color: red;"></span>

                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Logo">Logo <span style="color:red">*</span></label>
                            <div class="input-group">
                                <input id="photo" type="file" name="Emp_Logo" style="display:none"
                                    onchange="displaySelectedImage(this, 'SelectedFileName', 'selectedImagePreview')">
                                <div class="input-group-prepend">
                                    <a class="btn btn-dark text-white" onclick="$('input[id=photo]').click();">Image</a>
                                </div>
                                <input type="text" name="Emp_Logo" class="form-control" id="SelectedFileName"
                                    value="" readonly>

                            </div>
                            <img id="selectedImagePreview" src="" alt="Selected Image"
                                style="display:none; max-width: 10%; margin-top: 10px;">
                            <span id="Emp_Logo-error" class="error" style="color: red;"></span>
                            @error('Emp_Logo')
                                <div class="has-error mt-2" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Emp_TwoStepVerification">Two-Step Verification</label>
                            <div class="form-check">
                                <input type="checkbox" id="Emp_TwoStepVerification" name="Emp_TwoStepVerification"
                                    class="form-check-input" value="1">
                                <label class="form-check-label" for="Emp_TwoStepVerification">Enable Two-Step
                                    Verification</label>
                            </div>
                            <span id="Emp_TwoStepVerification-error" class="error" style="color: red;"></span>
                        </div>

                        <div class="form-group mt-3">
                            <div class=" d-flex col-xl-6">
                                <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                    <button type="submit" class="btn " style="background-color:#7367f0;color:white"
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
                    </div>
                </form>

            </div>
        </div>
        <script>
            $(document).ready(function($) {
                var isFileSizeValid = true;

                function handleFileSizeValidation(fp, maxSize, errorSelector, clearSelectors, previewId) {
                    var fileSize = Array.from(fp[0].files).reduce((size, file) => size + file.size, 0);

                    if (fileSize > maxSize) {
                        isFileSizeValid = false;
                        $(errorSelector).html(`File size must not be more than ${maxSize / 1024} KB`);
                        $(clearSelectors.join(',')).val('').hide();
                        $(`#${previewId}`).attr('src', '').hide();
                    } else {
                        isFileSizeValid = true;
                        $(errorSelector).html('');
                    }
                }

                $('#photo').change(function() {
                    handleFileSizeValidation($("#photo"), 102400, "#Emp_Logo-error", [
                        '#Emp_Logo'
                    ], 'selectedImagePreview');
                });

                $("#register-form").validate({
                    rules: {
                        Emp_Logo: {
                            required: true,
                            maxlength: 255
                        },
                        Emp_Reg_Id: "required",
                        Emp_Name: {
                            required: true,
                            maxlength: 255
                        },
                        Emp_Email: {
                            required: true,
                            email: true,
                        },
                        Emp_Contact: {
                            required: true,
                            digits: true,
                            number: true,
                            minlength: 10,
                            maxlength: 10
                        },

                        Emp_Address: {
                            required: true,
                            maxlength: 255
                        },
                        WebInf_Favicon: "required",
                        WebInf_HeaderLogo: "required",
                        WebInf_FooterLogo: "required",
                        Emp_Remark: {
                            required: true,
                            maxlength: 255
                        },
                        Emp_StartDate: "required",
                        Emp_ExpiryPeriod: {
                            required: true,
                            digits: true,
                            maxlength: 4
                        },
                        Emp_Role: "required"
                    },
                    messages: {
                        Emp_Logo: "This field is required",
                        Emp_Reg_Id: "This field is required",
                        Emp_Name: {
                            required: "This field is required",
                            maxlength: "Maximum length exceeded"
                        },
                        Emp_Email: {
                            required: "This field is required",
                            email: "Please enter a valid email address",

                        },
                        Emp_Contact: {
                            required: "This field is required",
                            digits: "Please enter only digits",
                            maxlength: "Maximum length allowed is 10 digits"
                        },
                        Emp_Address: {
                            required: "This field is required",
                            maxlength: "Maximum length exceeded"
                        },
                        WebInf_Favicon: "This field is required",
                        WebInf_HeaderLogo: "This field is required",
                        WebInf_FooterLogo: "This field is required",
                        Emp_Remark: {
                            required: "This field is required",
                            maxlength: "Maximum length exceeded"
                        },
                        Emp_StartDate: "This field is required",
                        Emp_ExpiryPeriod: {
                            required: "This field is required",
                            digits: "Please enter only digits",
                            maxlength: "Please enter exactly 4 digits"
                        },
                        Emp_Role: "This field is required"
                    },
                    submitHandler: function(form) {
                        if (isFileSizeValid) {
                            form.submit();
                        } else {
                            alert('File size must not be more than 100 KB');
                        }
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
                    Emp_Logo: "#Emp_Logo-error",
                    Emp_Reg_Id: "#Emp_Reg_Id-error",
                    Emp_Name: "#Emp_Name-error",
                    Emp_Email: "#Emp_Email-error",
                    Emp_Contact: "#Emp_Contact-error",
                    Emp_Address: "#Emp_Address-error",
                    WebInf_Favicon: "#WebInf_Favicon-error",
                    WebInf_HeaderLogo: "#WebInf_HeaderLogo-error",
                    WebInf_FooterLogo: "#WebInf_FooterLogo-error",
                    Emp_Remark: "#Emp_Remark-error",
                    Emp_StartDate: "#Emp_StartDate-error",
                    Emp_ExpiryPeriod: "#Emp_ExpiryPeriod-error",
                    Emp_Role: "#Emp_Role-error"
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

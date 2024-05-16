@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')

    <div class="col-12">
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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="py-3">
                    <span class="text-muted fw-light">Client Registration/</span> Edit Registration
                </h5>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/registration') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i>Client Registration List
                    </a>
                </div>
            </div>
            <div class="card mb-4">

                <div class="card-body">
                    <form id='edit' action="{{ Route('admin.registration.update', $user->Reg_Id) }}"
                        enctype="multipart/form-data" method="POST" accept-charset="utf-8" class="needs-validation"
                        novalidate>
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div id="status"></div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label for="Reg_Organization_Name">Organization Name</label>
                                <input type="text" class="form-control" id="Reg_Organization_Name"
                                    name="Reg_Organization_Name" value="{{ $user->Reg_Organization_Name }}"
                                    placeholder="Organization Name" />
                                <span id="Reg_Organization_Name-error" class="has-error"></span>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label for="Reg_Name">Name</label>
                                <input type="text" class="form-control" id="Reg_Name" name="Reg_Name"
                                    value="{{ $user->Reg_Name }}" placeholder="Enter contact" />
                                <span id="Reg_Name-error" class="has-error"></span>
                            </div>
                            @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label for="Reg_Email">Email</label>
                                    <input type="text" class="form-control" id="Reg_Email" name="Reg_Email"
                                        value="{{ $user->Reg_Email }}" placeholder="Enter contact" />
                                    <span id="Reg_Email-error  " class="has-error"></span>
                                    @error('Reg_Email')
                                        <div class="has-error mt-2" style="color: red">This email is already exists</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label for="Reg_Contact">Contact</label>
                                <input type="text" class="form-control" id="Reg_Contact" name="Reg_Contact"
                                    value="{{ $user->Reg_Contact }}" placeholder="Enter contact" />
                                <span id="Reg_Contact-error" class="has-error"></span>
                            </div>

                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label for="Reg_Address">Address</label>
                                <textarea class="form-control" id="Reg_Address" name="Reg_Address" placeholder="Enter address">{{ $user->Reg_Address }}</textarea>
                                <span id="Reg_Address-error" class="has-error"></span>
                            </div>

                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label for="Reg_Remark">Remark</label>
                                <textarea class="form-control" id="Reg_Remark" name="Reg_Remark" placeholder="Enter remark">{{ $user->Reg_Remark }}</textarea>
                                <span id="Reg_Remark-error" class="has-error"></span>
                            </div>

                            <!-- <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label for="Reg_StartDate">Start Date</label>
                                    <input type="date" class="form-control" id="Reg_StartDate" name="Reg_StartDate"
                                        value="{{ $user->Reg_StartDate }}" required>
                                    <span id="Reg_StartDate-error" class="has-error"></span>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label for="Reg_ExpiryPeriod">Expiry Period (in days)</label>
                                    <input type="text" class="form-control" id="Reg_ExpiryPeriod" name="Reg_ExpiryPeriod"
                                        value="{{ $user->Reg_ExpiryPeriod }}" placeholder="Enter expiry period" required>
                                    <span id="Reg_ExpiryPeriod-error" class="has-error"></span>
                                </div> -->
                            <!-- <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                                    <label class="form-label" for="Reg_Role">Role <span style="color:red">*</span></label>
                                                    <select id="Reg_Role" name="Reg_Role" class="form-select">

                                                        <option value="SUPERADMIN" {{ $user->Reg_Role == 'SUPERADMIN' ? 'selected' : '' }}>Super
                                                            Admin</option>
                                                        <option value="ADMIN" {{ $user->Reg_Role == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                                                        <option value="USER" {{ $user->Reg_Role == 'USER' ? 'selected' : '' }}>User</option>
                                                        <option value="EMPLOYEE" {{ $user->Reg_Role == 'EMPLOYEE' ? 'selected' : '' }}>Employee
                                                        </option>
                                                    </select>
                                                    <span id="Reg_Role-error" class="error" style="color: red;"></span>
                                                </div> -->

                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label class="form-label" for="Logo">Logo <span style="color:red">*</span></label>
                                <div class="input-group">
                                    <input id="photo3" type="file" name="Reg_Logo" style="display:none"
                                        onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                    <div class="input-group-prepend">
                                        <a class="btn btn-dark text-white" onclick="selectImage('photo3')">Image</a>
                                    </div>
                                    <span id="Reg_Logo-error" class="error" style="color: red;"></span>

                                </div>
                                <img id="selectedImagePreview2"
                                    src="{{ imageOrDefault('uploads/' . $user->Reg_Logo, '/assets/images/default.jpg') }}"
                                    alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                                @error('Reg_Logo')
                                    <div class="has-error mt-2" style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label for="Reg_Amount">Amount<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="Reg_Amount" name="Reg_Amount"
                                    value="{{ $user->Reg_Amount }}" placeholder="Enter Amount" />
                                <span id="Reg_Amount-error" class="has-error"></span>
                            </div>


                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label class="form-label" for="Reg_TwoStepVerification">Two-Step Verification</label>
                                <div class="form-check">
                                    <input type="checkbox" id="Reg_TwoStepVerification" name="Reg_TwoStepVerification"
                                        class="form-check-input" value="1"
                                        {{ $user->Reg_TwoStepVerification ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Reg_TwoStepVerification">Enable Two-Step
                                        Verification</label>
                                </div>
                                <span id="Reg_TwoStepVerification-error" class="error" style="color: red;"></span>
                            </div>

                            <div class="col-md-12 mb-3 mt-3">
                                <button type="submit" class="btn " style="background-color:#7367f0;color:white"
                                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function($) {
                $("#edit").validate({
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
                        Reg_Amount: "required",
                        WebInf_HeaderLogo: "required",
                        WebInf_FooterLogo: "required",
                        Reg_Remark: {
                            required: true,
                            maxlength: 255
                        },
                        Reg_StartDate: "required",
                        Reg_ExpiryPeriod: {
                            required: true,
                            digits: true,
                            maxlength: 4
                        },
                        Reg_Role: "required"
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
                        Reg_Address: {
                            required: "This field is required",
                            maxlength: "Maximum length exceeded"
                        },
                        Reg_Amount: "This field is required",
                        WebInf_HeaderLogo: "This field is required",
                        WebInf_FooterLogo: "This field is required",
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
                    Reg_Logo: "#Reg_Logo-error",
                    Reg_Organization_Name: "#Reg_Organization_Name-error",
                    Reg_Name: "#Reg_Name-error",
                    Reg_Email: "#Reg_Email-error",
                    Reg_Contact: "#Reg_Contact-error",
                    Reg_Address: "#Reg_Address-error",
                    Reg_Amount: "#Reg_Amount-error",
                    WebInf_HeaderLogo: "#WebInf_HeaderLogo-error",
                    WebInf_FooterLogo: "#WebInf_FooterLogo-error",
                    Reg_Remark: "#Reg_Remark-error",
                    Reg_StartDate: "#Reg_StartDate-error",
                    Reg_ExpiryPeriod: "#Reg_ExpiryPeriod-error",
                    Reg_Role: "#Reg_Role-error"
                };
            });
        </script>

    @stop

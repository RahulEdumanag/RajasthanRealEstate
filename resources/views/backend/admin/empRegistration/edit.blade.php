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
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="py-3">
                    <span class="text-muted fw-light">Employee/</span> Edit Employee
                </h5>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/empRegistration') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Employee List
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form id='edit' action="{{ Route('admin.empRegistration.update', $user->Emp_Id) }}"
                    enctype="multipart/form-data" method="POST" accept-charset="utf-8" class="needs-validation" novalidate>
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div id="status"></div>


                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="Emp_Name">Name</label>
                            <input type="text" class="form-control" id="Emp_Name" name="Emp_Name"
                                value="{{ $user->Emp_Name }}" placeholder="Enter Name" />
                            <span id="Emp_Name-error" class="has-error"></span>
                        </div>

                        @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label for="Emp_Email">Email</label>
                                <input type="email" class="form-control" id="Emp_Email" name="Emp_Email"
                                    value="{{ $user->Emp_Email }}" placeholder="Enter Email" />
                                <span id="Emp_Email-error" class="has-error"></span>
                            </div>
                            @error('Emp_Email')
                                <div class="has-error mt-2" style="color: red">This email is already exists</div>
                            @enderror
                        @endif
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="Emp_Contact">Contact</label>
                            <input type="text" class="form-control" id="Emp_Contact" name="Emp_Contact"
                                value="{{ $user->Emp_Contact }}" placeholder="Enter contact" />
                            <span id="Emp_Contact-error" class="has-error"></span>
                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="Emp_Address">Address</label>
                            <textarea class="form-control" id="Emp_Address" name="Emp_Address" placeholder="Enter address">{{ $user->Emp_Address }}</textarea>
                            <span id="Emp_Address-error" class="has-error"></span>
                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="Emp_Remark">Remark</label>
                            <textarea class="form-control" id="Emp_Remark" name="Emp_Remark" placeholder="Enter remark">{{ $user->Emp_Remark }}</textarea>
                            <span id="Emp_Remark-error" class="has-error"></span>
                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="Emp_StartDate">Start Date</label>
                            <input type="date" class="form-control" id="Emp_StartDate" name="Emp_StartDate"
                                value="{{ $user->Emp_StartDate }}" required>
                            <span id="Emp_StartDate-error" class="has-error"></span>
                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="Emp_ExpiryPeriod">Expiry Period (in days)</label>
                            <input type="text" class="form-control" id="Emp_ExpiryPeriod" name="Emp_ExpiryPeriod"
                                value="{{ $user->Emp_ExpiryPeriod }}" placeholder="Enter expiry period" required>
                            <span id="Emp_ExpiryPeriod-error" class="has-error"></span>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Emp_Role">Role <span style="color:red">*</span></label>
                            <select id="Emp_Role" name="Emp_Role" class="form-select">


                                <option value="2" {{ $user->Emp_Role == '2' ? 'selected' : '' }}>Admin</option>
                                <!-- <option value="3" {{ $user->Emp_Role == '3' ? 'selected' : '' }}>User</option>
                                            <option value="4" {{ $user->Emp_Role == '4' ? 'selected' : '' }}>Employee
                                            </option> -->
                            </select>
                            <span id="Emp_Role-error" class="error" style="color: red;"></span>
                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Image">Image <span style="color:red">*</span></label>
                            <div class="input-group">
                                <input id="photo" type="file" name="Emp_Logo" style="display:none"
                                    onchange="displaySelectedImage(this, 'SelectedFileName3', 'selectedImagePreview3')">
                                <div class="input-group-prepend">
                                    <a class="btn btn-dark text-white" onclick="selectImage('photo')">Image</a>
                                </div>
                                <span id="Emp_Logo-error" class="error" style="color: red;"></span>
                            </div>
                            <img id="selectedImagePreview2"
                                src="{{ imageOrDefault('uploads/' . $user->Emp_Logo, '/assets/images/default.jpg') }}"
                                alt="Selected Image" style="max-width: 19%; margin-top: 10px;">
                            @error('Emp_Logo')
                                <div class="has-error mt-2" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="Emp_TwoStepVerification">Two-Step Verification</label>
                            <div class="form-check">
                                <input type="checkbox" id="Emp_TwoStepVerification" name="Emp_TwoStepVerification"
                                    class="form-check-input" value="1"
                                    {{ $user->Emp_TwoStepVerification ? 'checked' : '' }}>
                                <label class="form-check-label" for="Emp_TwoStepVerification">Enable Two-Step
                                    Verification</label>
                            </div>
                            <span id="Emp_TwoStepVerification-error" class="error" style="color: red;"></span>
                        </div>

                        <div class="col-md-12 mb-3 mt-3">
                            <button type="submit" class="btn btn-success button-submit"
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

            $("#edit").validate({
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

@stop

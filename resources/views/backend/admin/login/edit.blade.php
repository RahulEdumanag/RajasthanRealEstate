@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    @if (session('errors') && session('errors')->has('Old_password'))
        <div class="alert alert-danger">
            {{ session('errors')->first('Old_password') }}
        </div>
    @endif
    <div class="container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">login/</span> Edit login
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ route('admin.login.update', $model->Log_Id) }}" method="post"
                            accept-charset="utf-8" class="needs-validation">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-6 mb-5">
                                    <label for="Old Password" class="form-label">Old Password<span
                                            style="color:red">*</span></label>
                                    <input type="password" class="form-control" id="Old_password" name="Old_password"
                                        value="{{ old('Old_password') }}" placeholder="">
                                    <span id="Emp_Name-error" class="error" style="color: red;"></span>
                                    <span id="Old_password-error" class="error" style="color: red;"></span>

                                    @error('Old_password')
                                        <div class="error" style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <label for="New Password" class="form-label">New Password<span
                                            style="color:red">*</span></label>
                                    <input type="password" class="form-control" id="Log_Password" name="Log_Password"
                                        value="{{ old('Log_Password') }}" placeholder="">
                                    <span id="Log_Password-error" class="error" style="color: red;"></span>

                                    @error('Log_Password')
                                        <div class="error" style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success" data-loading-text="Loading..."><span
                                            class="fa fa-save fa-fw"></span> Save</button>
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
            $("#edit").validate({
                rules: {
                    Log_Password: {
                        required: true,
                        minlength: 4,
                        maxlength: 25 
                       
                    },
                    Old_password: {
                        required: true,

                        maxlength: 25

                    }
                },

                messages: {
                    Log_Password: {
                        required: "This field is required",
                        minlength: "Minimum length must be 4 characters",
                        maxlength: "Maximum length exceeded" 
                        
                    },
                    Old_password: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
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
                Log_Password: "#Log_Password-error",
                Old_password: "#Old_password-error"

            };
        });
    </script>

@stop

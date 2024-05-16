@extends('backend.layouts.master')
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
                                    <label for="User Name" class="form-label">User Name<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Log_Username" name="Log_Username"
                                        value="{{ old('Log_Username', $model->Log_Username) }}" placeholder="">

                                    @error('Log_Username')
                                        <div class="error" style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-5">
                                    <label for="Old Password" class="form-label">Old Password<span
                                            style="color:red">*</span></label>
                                    <input type="password" class="form-control" id="Old_password" name="Old_password"
                                        value="{{ old('Old_password') }}" placeholder="">

                                    @error('Old_password')
                                        <div class="error" style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <label for="New Password" class="form-label">New Password<span
                                            style="color:red">*</span></label>
                                    <input type="password" class="form-control" id="Log_Password" name="Log_Password"
                                        value="{{ old('Log_Password') }}" placeholder="">

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
    <!-- <script>
        $(document).ready(function($) {
            $("#edit").validate({
                rules: {
                    Log_Password: "required"
                    Old_password: "required"

                },
                messages: {
                    Log_Password: "This field is required"
                    Old_password: "This field is required"


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
                Log_Password: "#Log_Password-error"
                Old_password: "#Old_password-error"

            };
        });
    </script> -->

@stop

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
                    <form id='edit' action="{{ route('admin.loginPower.update', $model->Log_Id) }}" method="post" accept-charset="utf-8"
    class="needs-validation">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-sm-6 mb-5">
            <label for="User Name" class="form-label">User Name
                <span style="color:red">*</span>
            </label>
            <input type="text" class="form-control" id="Log_Username" name="Log_Username"
                value="{{ old('Log_Username', $model->Log_Username) }}" placeholder="">

            @error('Log_Username')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-6 mb-5">
            <label for="Password" class="form-label">Password
                <span style="color:red">*</span>
            </label>
            <div class="input-group">
                <input type="password" class="form-control" id="Log_Password" name="Log_Password" placeholder="">
                <button type="button" class="btn btn-secondary" id="generatePassword">Generate Password</button>
            </div>
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

                    <script>
                        // JavaScript/jQuery code to generate random password
                        $(document).ready(function() {
                            $('#generatePassword').click(function() {
                                // Generate a random 6-digit password
                                var randomPassword = Math.floor(100000 + Math.random() * 900000);
                                // Set the generated password to the Log_Password input field
                                $('#Log_Password').val(randomPassword);
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>


@stop

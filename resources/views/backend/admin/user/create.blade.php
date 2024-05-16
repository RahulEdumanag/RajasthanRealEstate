@extends('backend.layouts.master')
@section('content')
    <?php
    $idd = Auth::user();
    ?>
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
            <h5 class="card-header">Create User</h5>


            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" enctype="multipart/form-data" method="post"
                    accept-charset="utf-8" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="name">Guest Name <span style="color:red">*</span></label>
                            <input type="text" id="name" name="name" class="form-control credit-card-mask"
                                placeholder="Enter your name" />
                            @error('name')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="UseReg Name">UseReg Name <span style="color:red">*</span></label>

                            <input type="text" id="UseReg_Name" name="UseReg_Name" class="form-control credit-card-mask"
                                placeholder="Enter your name" autocomplete="off" />
                            @error('UseReg_Name')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-4">
                            <label for=""> Email </label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email address" required>

                            @error('email')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-4">
                            <label for=""> Mobile </label>
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                placeholder="Enter your mobile address" required>
                            @error('mobile')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-password-toggle">
                            <label>Password:</label>
                            <!-- <input type="password" name="password" placeholder="Password" class="form-control" required> -->


                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" minlength="4" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            @error('password')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror

                            <span id="error_password" class="has-error"></span>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-password-toggle">
                            <label>Confirm Password:</label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    class="form-control" required minlength="4">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            @error('password_confirmation')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror

                            <span id="error_confirm-password" class="has-error"></span>
                        </div> <br />

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="idproff">Id proff <span style="color:red">*</span></label>
                            <div class="input-group">
                                <input id="photo" type="file" name="idproff" style="display:none"
                                    onchange="displaySelectedImage(this)">
                                <div class="input-group-prepend">
                                    <a class="btn btn-dark text-white" onclick="$('input[id=photo]').click();">Image</a>
                                </div>
                                <input type="text" name="idproff" class="form-control" id="SelectedFileName"
                                    value="" readonly>

                            </div>


                            <img id="selectedImagePreview" src="" alt="Selected Image"
                                style="display:none; max-width: 10%; margin-top: 10px;">
                            @error('idproff')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label class="form-label" for="type"> Website <span style="color:red">*</span></label>
                            <select class="form-control" id="UseReg_Cli_Id" name="UseReg_Cli_Id">
                                <option selected disabled>Select Website</option>
                                @foreach ($model as $value)
                                    <option value='{{ $value->Cli_Id }}'>{{ $value->Cli_WebsiteName }}</option>
                                @endforeach
                            </select>
                            @error('UseReg_Cli_Id')
                                <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success button-submit"
                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
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

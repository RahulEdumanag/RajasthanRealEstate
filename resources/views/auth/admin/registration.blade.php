@extends('auth.layouts.app')
@section('content')

<div class="authentication-inner row">

    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img src="../../assets/img/illustrations/auth-register-illustration-light.png" alt="auth-register-cover"
                class="img-fluid my-5 auth-illustration"
                data-app-light-img="illustrations/auth-register-illustration-light.png"
                data-app-dark-img="illustrations/auth-register-illustration-dark.html">

            <img src="../../assets/img/illustrations/bg-shape-image-light.png" alt="auth-register-cover"
                class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.html">
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Register -->
    <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                fill="#7367F0" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                fill="#7367F0" />
                        </svg>
                    </span>
                </a>
            </div>
            <!-- /Logo -->
            <h3 class="mb-1">Adventure starts here 🚀</h3>
            <p class="mb-4">Make your app management easy and fun!</p>

            <form action="{{ route('user.auth.registration') }}" enctype="multipart/form-data" method="post"
                accept-charset="utf-8" class="needs-validation" novalidate id="signup">
                @csrf
                <div class="row">


                    <div class="mb-3">
                        <label class="form-label" for="name">Name <span style="color:red">*</span></label>

                        <input type="text" id="name" name="name" class="form-control credit-card-mask"
                            placeholder="Enter your name" />


                        @error('name')
                        <div class="has-error mt-2" style="color: red"> Guest name required.</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email address" required>
                            <button type="button" name="submit-otp" value="Send OTP" id="sendOTPButton"
                                class="btn btn-secondary">Send OTP</button>

                        </div>
                        @error('email')
                        <div class="has-error mt-2" style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Otp</label>

                        <input type="tel" class="form-control" id="otp" placeholder="Enter OTP" required value=""
                            name="otp" pattern="[0-9]{6}" maxlength="6" minlength="6" />  </div>
                    <div class="mb-3 form-password-toggle">
                        <label>Password:</label>
                        <!-- <input type="password" name="password" placeholder="Password" class="form-control" required> -->


                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>

                        </div>
                        @error('password')
                        <div class="has-error mt-2" style="color: red">Password is required.</div>
                        @enderror

                        <span id="error_password" class="has-error"></span>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label>Confirm Password:</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                class="form-control" required>
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        @error('password_confirmation')
                        <div class="has-error mt-2" style="color: red">{{ $message }}</div>
                        @enderror

                        <span id="error_confirm-password" class="has-error"></span>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary d-grid w-100">
                            Sign up
                        </button>
                    </div>
                </div>
                <p class="text-center">
                    <span>Already have an account?</span>
                    <a href="{{ URL::to('/admin_login/login') }}">
                        <span>Sign in instead</span>
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
<!-- "<script>
    $(document).ready(function() {
        // Add the CSRF token to all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#signup').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Serialize the form data
            var formData = $(this).serialize();

            // Submit the form data via AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    if (response.success) {
                        // Form submitted successfully
                        alert('Form submitted successfully');

                        // Check if a redirect URL is provided
                        if (response.redirect) {
                            // Redirect the user to the specified URL
                            window.location.href = response.redirect;
                        } else {
                            // Optionally, reset the form
                            $('#signup')[0].reset();
                            $('#popup-message').text(
                                'Please correct the following errors:');
                            $('#error_description_type').text(response.errors.type);
                            $('#error_description_email').text(response.errors.email);
                            $('#error_description_verificationCode').text(response.errors
                                .verificationCode);
                            $('#error_description_accept').text(response.errors.accept);
                        }
                    } else {
                        // Display validation errors
                        $('#popup-message').text('Please correct the following errors:');
                        $('#error_description').html(response.errors.join('<br>'));
                    }
                },
                error: function(xhr) {
                    // Handle AJAX errors
                    console.log(xhr.responseText);
                    // Display the error message to the user
                    alert('An error occurred while processing your request.');
                }
            });
        });

        $('#sendOTPButton').on('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Assuming your email field has an ID of 'email'
            var userEmail = $('#email').val();

            // Generate a random 6-digit OTP
            var randomOTP = Math.floor(100000 + Math.random() * 900000);

            // Send an AJAX request to your Laravel backend to handle OTP sending logic
            $.ajax({
                url: '/send-otp-email', // Replace with your Laravel route for sending OTP emails
                method: 'POST',
                data: { email: userEmail, otp: randomOTP },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Email sent successfully
                        alert('OTP sent to email');

                        // Set the generated OTP in the input field 
                        $('#generatedOTP').val(randomOTP);
                        // Enable the input field
                        $('#verificationCode').removeAttr('readonly');
                    } else {
                        // Handle errors if needed
                        alert('Failed to send OTP. Please try again.');
                    }
                },
                error: function(xhr) {
                    // Handle AJAX errors
                    console.log(xhr.responseText);
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>" -->
@endsection
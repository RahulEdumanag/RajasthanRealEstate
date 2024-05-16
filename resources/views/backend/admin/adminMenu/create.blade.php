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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Admin Menu/</span> Add Admin Menu
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/adminMenu') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Admin Menu List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.adminMenu.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="AddMen_Name" name="AddMen_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your Name" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="AddMen_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="URL">URL <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="AddMen_URL" name="AddMen_URL" class="form-control"
                                            autocomplete="off" placeholder="Enter your URL" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="AddMen_URL-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Serial Order">Serial Order <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="AddMen_SerialOrder" name="AddMen_SerialOrder"
                                            class="form-control" autocomplete="off" placeholder="Enter your Serial Order"
                                            aria-describedby="name2" value=" " />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="AddMen_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="form-group mt-3">
                                    <div class=" d-flex col-xl-6">
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
                    AddMen_Name: {
                        required: true,
                        maxlength: 255 // Set the maximum length here
                    },
                    AddMen_URL: {
                        required: true,
                        maxlength: 255 // Set the maximum length here
                    },
                    AddMen_SerialOrder: "required"

                },
                messages: {
                    AddMen_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    AddMen_URL: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    AddMen_SerialOrder: "This field is required"
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
                AddMen_Name: "#AddMen_Name-error",
                AddMen_URL: "#AddMen_URL-error",
                AddMen_SerialOrder: "#AddMen_SerialOrder-error",
            };
        });
    </script>
@endsection

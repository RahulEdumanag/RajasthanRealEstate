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
                <span class="text-muted fw-light">State/</span> Add State
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/state') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> State List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.state.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group ">
                                    <label for="Sta_Name">State Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Sta_Name" name="Sta_Name"
                                        placeholder="Name">
                                    <span id="Sta_Name-error" class="error" style="color: red;">&nbsp;</span>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group ">
                                    <label for="Sta_Code">State Code</label>
                                    <input type="text" class="form-control" id="Sta_Code" name="Sta_Code"
                                        placeholder="State Code">
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
            var isFileSizeValid = true;
            $("#register-form").validate({
                rules: {
                    Sta_Name: {
                        required: true,
                        maxlength: 255
                    },
                    Sta_Cou_Id: {
                        required: true,
                        maxlength: 255
                    }
                },
                messages: {
                    Sta_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Sta_Cou_Id: {
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
                }
            });
            var fieldErrorMap = {
                Sta_Name: "#Sta_Name-error",
                Sta_Cou_Id: "#Sta_Cou_Id-error"
            };
        });
    </script>
@endsection

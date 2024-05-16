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
                <span class="text-muted fw-light">Contact Category/</span> Add Contact Category
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/contactCategory') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Contact Category List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.contactCategory.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group ">
                                    <label class="form-label" for="Contact Category">Contact Category <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="ConCat_Title" name="ConCat_Title" class="form-control"
                                            autocomplete="off" placeholder="Enter your Contact Category"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="ConCat_Title-error" class="error" style="color: red;"></span>
                                </div>

<!--                            
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group ">
                                    <label class="form-label" for="Value">Value  </label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="ConCat_Value" name="ConCat_Value" class="form-control"
                                            autocomplete="off" placeholder="Enter your Value"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="ConCat_Value-error" class="error" style="color: red;"></span>
                                </div>
  -->
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
                    ConCat_Title: {
                        required: true,
                        maxlength: 255
                    },

                },
                messages: {
                    ConCat_Title: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
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
                ConCat_Title: "#ConCat_Title-error"
            };
        });
    </script>
@endsection

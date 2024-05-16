@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
      <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Social Links/</span> Edit Social Links
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/social') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Social Links List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.social.update', $model->Pag_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="Pag_Name">Social Media <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <select id="Pag_Name" name="Pag_Name" class="form-control"
                                            aria-describedby="name2">
                                            <option value="Instagram"
                                                {{ old('Pag_Name', $model->Pag_Name) == 'Instagram' ? 'selected' : '' }}>
                                                Instagram
                                            </option>
                                            <option value="Telegram"
                                                {{ old('Pag_Name', $model->Pag_Name) == 'Telegram' ? 'selected' : '' }}>
                                                Telegram
                                            </option>
                                            <option value="Facebook"
                                                {{ old('Pag_Name', $model->Pag_Name) == 'Facebook' ? 'selected' : '' }}>
                                                Facebook
                                            </option>
                                            <option value="Twitter"
                                                {{ old('Pag_Name', $model->Pag_Name) == 'Twitter' ? 'selected' : '' }}>
                                                Twitter
                                            </option>
                                            <option value="Youtube"
                                                {{ old('Pag_Name', $model->Pag_Name) == 'Youtube' ? 'selected' : '' }}>
                                                Youtube
                                            </option>
                                            <option value="Linkedin"
                                                {{ old('Pag_Name', $model->Pag_Name) == 'Linkedin' ? 'selected' : '' }}>
                                                Linkedin
                                            </option>
                                        </select>
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="URL" class="form-label">URL<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pag_URL" name="Pag_URL"
                                        value="{{ old('Pag_URL', $model->Pag_URL) }}" placeholder="">
                                    <span id="Pag_URL-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6">
                                        <label for="Icon" class="form-label">Icon<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="Pag_Image" name="Pag_Image"
                                            value="{{ old('Pag_Image', $model->Pag_Image) }}" placeholder="">
                                        @error('Pag_Image')
                                            <div class="has-error mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                                <div class="col-sm-6">
                                    <label for="Serial Order" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                        value="{{ old('Pag_SerialOrder', $model->Pag_SerialOrder) }}" placeholder="">
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                            </button>
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
                    Pag_Name: "required",
                    Pag_URL: "required",
                    Pag_ShortDesc: "required",
                    Pag_FullDesc: "required",
                    Pag_SerialOrder: "required"
                },
                messages: {
                    Pag_Name: "This field is required",
                    Pag_URL: "This field is required",
                    Pag_ShortDesc: "This field is required",

                    Pag_SerialOrder: "This field is required",
                    Pag_FullDesc: "This field is required"

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
                Pag_Name: "#Pag_Name-error",
                Pag_URL: "#Pag_URL-error",
                Pag_ShortDesc: "#Pag_ShortDesc-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error",
                Pag_FullDesc: "#Pag_FullDesc-error"

            };
        });
    </script>
    <script>
        $(document).ready(function($) {
            $("#edit").validate({
                rules: {
                    Pag_Name: "required",
                    Pag_URL: "required",
                    Pag_ShortDesc: "required",
                    Pag_FullDesc: "required",
                    Pag_SerialOrder: "required"
                },
                messages: {
                    Pag_Name: "This field is required",
                    Pag_URL: "This field is required",
                    Pag_ShortDesc: "This field is required",
                    Pag_SerialOrder: "This field is required",
                    Pag_FullDesc: "This field is required"
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
                Pag_Name: "#Pag_Name-error",
                Pag_URL: "#Pag_URL-error",
                Pag_ShortDesc: "#Pag_ShortDesc-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error",
                Pag_FullDesc: "#Pag_FullDesc-error"

            };
        });
    </script>
@stop

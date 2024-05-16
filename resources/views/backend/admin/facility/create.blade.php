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
                <span class="text-muted fw-light">Facilities/</span> Add Facilities
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/facility') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Facilities List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.facility.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4 form-group ">
                                    <label class="form-label" for="Facility">Facility <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_Name" name="Pag_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your Facilities"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Serial Order">Serial Order <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                            class="form-control" autocomplete="off" placeholder="Enter your ShortDesc"
                                            aria-describedby="name2" value="{{ $nextSerialOrder }}" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4" style='display:    none;'>
                                    <label class="form-label" for="type"> Facilities Category <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="Pag_PagCat_Id" name="Pag_PagCat_Id">
                                        @foreach ($model as $value)
                                            <option value="{{ $value->PagCat_Id }}"
                                                {{ $value->is_Facility ? 'selected' : '' }}>
                                                {{ $value->PagCat_Name }}
                                            </option>
                                        @endforeach
                                    </select>
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
                    Pag_Name: {
                        required: true,
                        maxlength: 255
                    },
                    Pag_SerialOrder: "required"
                },
                messages: {
                    Pag_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Pag_SerialOrder: "This field is required"
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
                Pag_SerialOrder: "#Pag_SerialOrder-error"
            };
        });
    </script>
@endsection

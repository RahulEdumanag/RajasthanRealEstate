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
                <span class="text-muted fw-light"> Expiry Period/</span> Add Expiry Period
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/expiryPeriod') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Expiry Period List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.expiryPeriod.store') }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12 mb-4">
                                    <label class="form-label" for="type">Registration <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="ExpPer_Reg_Id" name="ExpPer_Reg_Id">
                                        <option Selected disabled>Select</option>
                                        @foreach ($RegistrationModel as $value)
                                            <option value="{{ $value->Reg_Id }}">
                                                {{ $value->Reg_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="ExpPer_Reg_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mb-4">
                                    <label for="ExpPer_StartDate">Start Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="ExpPer_StartDate" name="ExpPer_StartDate"
                                        required>
                                    <span id="ExpPer_StartDate-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mb-4">
                                    <label for="ExpPer_EndDate">End Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="ExpPer_EndDate" name="ExpPer_EndDate"
                                        required>
                                    <span id="ExpPer_EndDate-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="ExpPer_Amount">Amount <span
                                            style="color:red">*</span></label>
                                    <input type="text" id="ExpPer_Amount" name="ExpPer_Amount" class="form-control"
                                        autocomplete="off" placeholder="Enter your Amount" />
                                    <span id="ExpPer_Amount-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mb-4">
                                    <label for="ExpPer_Remark">Remark</label>
                                    <textarea class="form-control" id="ExpPer_Remark" name="ExpPer_Remark" autocomplete="off" placeholder="Enter remark"></textarea>
                                </div>
                                <div class=" d-flex col-xl-6">
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                        <button type="submit" class="btn " style="background-color:#7367f0;color:white"
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
                    ExpPer_Reg_Id: {
                        required: true,
                        digits: true,
                        maxlength: 10
                    },
                    ExpPer_StartDate: "required",
                    ExpPer_EndDate: "required",
                    ExpPer_Amount: "required"
                },
                messages: {
                    ExpPer_Reg_Id: {
                        required: "This field is required"
                    },
                    ExpPer_StartDate: "Please select a start date",
                    ExpPer_EndDate: "Please select an end date",
                    ExpPer_Amount: {
                        required: "This field is required",
                        digits: "Please enter only digits",
                        maxlength: "Maximum length allowed is 10 digits"
                    }
                },
                submitHandler: function(form) {
                    const startDate = new Date($("#ExpPer_StartDate").val());
                    const endDate = new Date($("#ExpPer_EndDate").val());

                    if (endDate < startDate) {
                        $("#ExpPer_EndDate-error").text("End Date cannot be less than Start Date");
                    } else {
                        form.submit();
                    }
                }
            });
            var fieldErrorMap = {
                ExpPer_Reg_Id: "#ExpPer_Reg_Id-error",
                ExpPer_StartDate: "#ExpPer_StartDate-error",
                ExpPer_EndDate: "#ExpPer_EndDate-error",
                ExpPer_Amount: "#ExpPer_Amount-error"
            };
        });
    </script>
    
@stop

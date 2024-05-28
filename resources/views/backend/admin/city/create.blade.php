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
                <span class="text-muted fw-light">City/</span> Add City
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/city') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> City List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.city.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Menu Name">State Name<span style="color:red">*</span></label>
                                    <select class="form-control" id="Cit_Sta_Id" name="Cit_Sta_Id">
                                        <option selected disabled>Select State Name</option>
                                        @foreach ($StateModel as $value)
                                            <option value='{{ $value->Sta_Id }}'
                                                {{ isset($lastSelectedDropdownId) && $lastSelectedDropdownId == $value->Sta_Id ? 'selected' : '' }}>
                                                {{ $value->Sta_Name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="Cit_Sta_Id-error" class="error" style="color: red;">&nbsp;</span>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Cit_Name">City Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Cit_Name" name="Cit_Name"
                                        placeholder="Name" autocomplete="off" >
                                    <span id="Cit_Name-error" class="error" style="color: red;">&nbsp;</span>
                                    @error('Cit_Name')
                                        <div class="has-error" style="color: red"> This record already exists.</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Cit_Code">City Code</label>
                                    <input type="text" class="form-control" id="Cit_Code" name="Cit_Code"
                                        placeholder="City Code" autocomplete="off" >
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
                    Cit_Name: {
                        required: true,
                        maxlength: 255
                    },
                    Cit_Sta_Id: {
                        required: true,
                        maxlength: 255
                    }
                },
                messages: {
                    Cit_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Cit_Sta_Id: {
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
                Cit_Sta_Id: "#Cit_Sta_Id-error",
                Cit_Name: "#Cit_Name-error"
            };
        });
    </script>
@endsection

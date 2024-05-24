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
                <span class="text-muted fw-light">Area/</span> Add Area
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/area') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Area List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="edit-form" action="{{ route('admin.area.update', $model->Are_Id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="type"> State Name <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="Are_Cit_Id" name="Are_Cit_Id">
                                        <option selected disabled>Select State Name</option>
                                        @foreach ($CityModel as $value)
                                            <option value='{{ $value->Cit_Id }}'
                                                @if ($value->Cit_Id == $model->Are_Cit_Id) selected @endif>
                                                {{ $value->Cit_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Add more fields as needed -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Are_Name">Area Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Are_Name" name="Are_Name"
                                        value="{{ $model->Are_Name }}" placeholder="Category Name">
                                    <span id="Are_Name-error" class="error" style="color: red;">&nbsp;</span>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Are_Code">Area Code</label>
                                    <input type="text" class="form-control" id="Are_Code" name="Are_Code"
                                        value="{{ $model->Are_Code }}" placeholder="Area Code">
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
        <script>
            $(document).ready(function($) {
                var isFileSizeValid = true;
                $("#edit-form").validate({
                    rules: {
                        Are_Name: {
                            required: true,
                            maxlength: 255
                        }
                    },
                    messages: {
                        Are_Name: {
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
                    Are_Name: "#Are_Name-error"
                };
            });
        </script>
    @endsection

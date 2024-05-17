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
                        <form id="edit-form" action="{{ route('admin.city.update', $model->Cit_Id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="type"> State Name <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="Cit_Sta_Id" name="Cit_Sta_Id">
                                        <option selected disabled>Select State Name</option>
                                        @foreach ($StateModel as $value)
                                            <option value='{{ $value->Sta_Id }}'
                                                @if ($value->Sta_Id == $model->Cit_Sta_Id) selected @endif>
                                                {{ $value->Sta_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Add more fields as needed -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Cit_Name">City Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Cit_Name" name="Cit_Name"
                                        value="{{ $model->Cit_Name }}" placeholder="Category Name">
                                    <span id="Cit_Name-error" class="error" style="color: red;">&nbsp;</span>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Cit_Code">City Code</label>
                                    <input type="text" class="form-control" id="Cit_Code" name="Cit_Code"
                                        value="{{ $model->Cit_Code }}" placeholder="City Code">
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
                        Cit_Name: {
                            required: true,
                            maxlength: 255
                        }
                    },
                    messages: {
                        Cit_Name: {
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
                    Cit_Name: "#Cit_Name-error"
                };
            });
        </script>
    @endsection

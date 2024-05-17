@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Facilities/</span> Edit Facilities
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
                        <form id="edit-form" action="{{ route('admin.state.update', $model->Sta_Id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <!-- Add more fields as needed -->
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Sta_Name">State Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Sta_Name" name="Sta_Name"
                                        value="{{ $model->Sta_Name }}" placeholder="Category Name">
                                    <span id="Sta_Name-error" class="error" style="color: red;">&nbsp;</span>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="Sta_Code">State Code</label>
                                    <input type="text" class="form-control" id="Sta_Code" name="Sta_Code"
                                        value="{{ $model->Sta_Code }}" placeholder="State Code">
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn " style="background-color:#7367f0;color:white"
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
            var isFileSizeValid = true;
            $("#edit-form").validate({
                rules: {
                    Sta_Name: {
                        required: true,
                        maxlength: 255
                    }
                },
                messages: {
                    Sta_Name: {
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
                Sta_Name: "#Sta_Name-error"
            };
        });
    </script>
@endsection

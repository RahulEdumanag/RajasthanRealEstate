@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
   <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Admin Menu/</span> Edit Admin Menu
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
                        <form id='edit' action="{{ Route('admin.adminMenu.update', $model->AddMen_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">

                              
                                    <div class="col-sm-6">
                                        <label for="Name" class="form-label">Name<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="AddMen_Name" name="AddMen_Name"
                                            value="{{ old('AddMen_Name', $model->AddMen_Name) }}" placeholder="">
                                        <span id="AddMen_Name-error" class="error" style="color: red;"></span>
                                    </div>
                               
                                   
                                



                              
                                    <div class="col-sm-6">
                                        <label for="URL" class="form-label">URL<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="AddMen_URL" name="AddMen_URL"
                                            value="{{ old('AddMen_URL', $model->AddMen_URL) }}" placeholder="">
                                        <span id="AddMen_URL-error" class="error" style="color: red;"></span>
                                    </div>
                               
                                
                                <div class="col-sm-6">
                                    <label for="Serial Order" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="AddMen_SerialOrder" name="AddMen_SerialOrder"
                                        value="{{ old('AddMen_SerialOrder', $model->AddMen_SerialOrder) }}" placeholder="">
                                    <span id="AddMen_SerialOrder-error" class="error" style="color: red;"></span>
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
            $("#edit").validate({
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
 
@stop

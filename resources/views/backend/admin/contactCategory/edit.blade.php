@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
 <style>
        .serial-number {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .serial-number:hover {
            overflow: visible;
            white-space: normal;
        }
    </style>
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Contact Category/</span> Edit Contact Category
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
                        <form id='edit' action="{{ Route('admin.contactCategory.update', $model->ConCat_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">

                                <div class="col-sm-12">
                                    <label for="contactCategory" class="form-label">Contact Category<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="ConCat_Title" name="ConCat_Title"
                                        value="{{ old('ConCat_Title', $model->ConCat_Title) }}" placeholder="">
                                    <span id="ConCat_Title-error" class="error" style="color: red;"></span>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <label for="Value" class="form-label">Value<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="ConCat_Value" name="ConCat_Value"
                                        value="{{ old('ConCat_Value', $model->ConCat_Value) }}" placeholder="">
                                    <span id="ConCat_Value-error" class="error" style="color: red;"></span>
                                </div> -->
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

@stop

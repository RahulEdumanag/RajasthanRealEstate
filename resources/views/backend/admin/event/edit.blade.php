@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Event/</span> Edit Event
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/event') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Event List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.event.update', $model->Pag_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Title" class="form-label">Title<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pag_Name" name="Pag_Name"
                                        value="{{ old('Pag_Name', $model->Pag_Name) }}" placeholder="">
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>




                                <div class="col-sm-6">
                                    <label for="Date" class="form-label">Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="Pag_Date" name="Pag_Date"
                                        value="{{ old('Pag_Date', $model->Pag_Date) }}" placeholder=""
                                        min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <span id="Pag_Date-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-6">
                                    <label for="ShortDesc" class="form-label">ShortDesc<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="Pag_ShortDesc" name="Pag_ShortDesc" placeholder="Enter your Short Description">{{ old('Pag_ShortDesc', $model->Pag_ShortDesc) }}</textarea>
                                    <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Serial Order" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                        value="{{ old('Pag_SerialOrder', $model->Pag_SerialOrder) }}" placeholder="">
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-12">
                                    <label for="FullDesc" class="form-label">FullDesc</label>
                                    <textarea class="applyCK form-control" id="Pag_FullDesc" name="Pag_FullDesc" placeholder="">{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}</textarea>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
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
            $("#edit").validate({
                rules: {
                    Pag_Name: "required",
                    Pag_Date: "required",
                    Pag_ShortDesc: "required",
                    Pag_FullDesc: "required"
                },
                messages: {
                    Pag_Name: "This field is required",
                    Pag_Date: "This field is required",
                    Pag_ShortDesc: "This field is required",
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
                Pag_Date: "#Pag_Date-error",
                Pag_Image: "#Pag_Image-error",
                Pag_ShortDesc: "#Pag_ShortDesc-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error",
                Pag_FullDesc: "#Pag_FullDesc-error"
            };
        });
    </script>
 

@stop

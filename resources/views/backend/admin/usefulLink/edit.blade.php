@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Useful Link/</span> Edit Useful Link
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/usefulLink') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Useful Link List
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.usefulLink.update', $model->Pag_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pag_Name" name="Pag_Name"
                                        value="{{ old('Pag_Name', $model->Pag_Name) }}" placeholder="">
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6">
                                        <label for="URL" class="form-label">URL</label>
                                        <input type="text" class="form-control" id="Pag_URL" name="Pag_URL"
                                            value="{{ old('Pag_URL', $model->Pag_URL) }}" placeholder="">
                                    </div>
                                @endif
                                <!-- <div class="col-sm-6">
                                        <label for="Short Desc" class="form-label">Short Desc<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="Pag_ShortDesc" name="Pag_ShortDesc"
                                            value="{{ old('Pag_ShortDesc', $model->Pag_ShortDesc) }}" placeholder="">
                                        <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                    </div> -->
                                <div class="col-sm-6">
                                    <label for="Serial Order" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                        value="{{ old('Pag_SerialOrder', $model->Pag_SerialOrder) }}" placeholder="">
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-12">
                                    <label for="Full Desc" class="form-label">Full Desc</label>
                                    <textarea class="applyCK form-control" id="Pag_FullDesc" name="Pag_FullDesc" placeholder="">{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}</textarea>
                                    @error('Pag_FullDesc')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-2">
                                        <label for="Admin Exists" class="form-label">AdminExists</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Pag_AdminExists"
                                                name="Pag_AdminExists"
                                                {{ old('Pag_AdminExists', $model->Pag_AdminExists) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Pag_AdminExists">
                                                AdminExists
                                            </label>
                                        </div>
                                        @error('Pag_AdminExists')
                                            <div class="has-error mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
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
                    // Pag_ShortDesc: "required",
                    Pag_FullDesc: "required",
                    Pag_SerialOrder: "required"
                },
                messages: {
                    Pag_Name: "This field is required",
                    // Pag_ShortDesc: "This field is required",
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
                // Pag_ShortDesc: "#Pag_ShortDesc-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error"
            };
        });
    </script>
 

@stop

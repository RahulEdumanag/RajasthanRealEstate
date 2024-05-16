@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Menu/</span> Edit Menu
            </h5>
            <div class="page-title-actions">
            @if (Auth::user()->EmpRegistration->Emp_Role == '1')

                <a href="{{ URL::to('admin/menu') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Menu List
                </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.menu.update', $model->Men_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">

                                @if ($model->Men_AdminExists == 'on' && Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6">
                                        <label for="Name" class="form-label">Name<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="Men_Name" name="Men_Name"
                                            value="{{ old('Men_Name', $model->Men_Name) }}" placeholder="">
                                        <span id="Men_Name-error" class="error" style="color: red;"></span>
                                    </div>
                                @elseif($model->Men_AdminExists == null)
                                    <div class="col-sm-6">
                                        <label for="Name" class="form-label">Name<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="Men_Name" name="Men_Name"
                                            value="{{ old('Men_Name', $model->Men_Name) }}" placeholder="">
                                        <span id="Men_Name-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif



                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6">
                                        <label for="URL" class="form-label">URL </label>
                                        <input type="text" class="form-control" id="Men_URL" name="Men_URL"
                                            value="{{ old('Men_URL', $model->Men_URL) }}" placeholder="">
                                     </div>
                                @endif
                                <div class="col-sm-6">
                                    <label for="ShortDesc" class="form-label">Short Desc<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="Men_ShortDesc" name="Men_ShortDesc" placeholder="">{{ old('Men_ShortDesc', $model->Men_ShortDesc) }}</textarea>
                                 </div>
                                <div class="col-sm-6">
                                    <label for="Serial Order" class="form-label">Serial Order<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Men_SerialOrder" name="Men_SerialOrder"
                                        value="{{ old('Men_SerialOrder', $model->Men_SerialOrder) }}" placeholder="">
                                    <span id="Men_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                             
                                <div class="col-sm-3">
                                    <label for="Sub Menu Exists" class="form-label">Sub Menu Exists<span
                                            style="color:red">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Men_SubMenuExists"
                                            name="Men_SubMenuExists"
                                            {{ old('Men_SubMenuExists', $model->Men_SubMenuExists) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Men_SubMenuExists">
                                            SubMenuExists
                                        </label>
                                    </div>
                                    @error('Men_SubMenuExists')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                   <div class="col-sm-12">
                                    <label for="Full Desc" class="form-label">Full Desc</label>
                                    <textarea class="applyCK form-control" id="Men_FullDesc" name="Men_FullDesc" placeholder="">{!! old('Men_FullDesc', $model->Men_FullDesc) !!}</textarea>
                                    @error('Men_FullDesc')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                    <!-- @if (!empty($model->Men_FullDesc))
                                        <img src="{{ asset('images/' . $model->Men_FullDesc) }}" alt="Uploaded Image"
                                            class="img-fluid mt-3">
                                    @endif -->
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-3">
                                        <label for="Admin Exists" class="form-label">Admin Exists </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Men_AdminExists"
                                                name="Men_AdminExists"
                                                {{ old('Men_AdminExists', $model->Men_AdminExists) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Men_AdminExists">
                                                AdminExists
                                            </label>
                                        </div>
                                        @error('Men_AdminExists')
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
                    Men_Name: {
                        required: true,
                        maxlength: 255
                    }, 

                    Men_FullDesc: "required",
                    Men_SerialOrder: "required"

                },
                messages: {
                    Men_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
               
                    Men_SubMenuExists: "This field is required",
 
                    Men_FullDesc: "This field is required",
                    Men_SerialOrder: "This field is required"
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
                Men_Name: "#Men_Name-error", 
                Men_SubMenuExists: "#Men_SubMenuExists-error", 
                Men_FullDesc: "#Men_FullDesc-error",
                Men_SerialOrder: "#Men_SerialOrder-error",
            };
        });
    </script>
 
@stop

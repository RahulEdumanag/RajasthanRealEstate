@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Sub Menu/</span> Edit Sub Menu
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/submenu') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Sub Menu List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.submenu.update', $model->SubMen_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">

                                @if ($model->SubMen_AdminExists == 'on' && Auth::user()->EmpRegistration->Emp_Role == '1')

                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                        <label class="form-label" for="type"> Menu Name <span 3
                                                style="color:red">*</span></label>
                                        <select class="form-control" id="SubMen_Men_Id" name="SubMen_Men_Id">
                                            <option selected disabled>Select Menu Name</option>
                                            @foreach ($menuModel as $value)
                                                <option value='{{ $value->Men_Id }}'
                                                    @if ($value->Men_Id == $model->SubMen_Men_Id) selected @endif>{{ $value->Men_Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="Name" class="form-label">Name<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="SubMen_Name" name="SubMen_Name"
                                            value="{{ old('SubMen_Name', $model->SubMen_Name) }}" placeholder="">
                                        <span id="SubMen_Name-error" class="error" style="color: red;"></span>
                                    </div>
                                @elseif($model->SubMen_AdminExists == null)
                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                        <label class="form-label" for="type"> Menu Name <span 3
                                                style="color:red">*</span></label>
                                        <select class="form-control" id="SubMen_Men_Id" name="SubMen_Men_Id">
                                            <option selected disabled>Select Menu Name</option>
                                            @foreach ($menuModel as $value)
                                                <option value='{{ $value->Men_Id }}'
                                                    @if ($value->Men_Id == $model->SubMen_Men_Id) selected @endif>{{ $value->Men_Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="Name" class="form-label">Name<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="SubMen_Name" name="SubMen_Name"
                                            value="{{ old('SubMen_Name', $model->SubMen_Name) }}" placeholder="">
                                        <span id="SubMen_Name-error" class="error" style="color: red;"></span>
                                    </div>

                                @endif


                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6">
                                        <label for="URL" class="form-label">URL<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="SubMen_URL" name="SubMen_URL"
                                            value="{{ old('SubMen_URL', $model->SubMen_URL) }}" placeholder="">
                                        <span id="SubMen_URL-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif



                                <div class="col-sm-6">
                                    <label for="SubMen_ShortDesc" class="form-label">ShortDesc<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="SubMen_ShortDesc" name="SubMen_ShortDesc" placeholder="">{{ old('SubMen_ShortDesc', $model->SubMen_ShortDesc) }}</textarea>
                                    <span id="SubMen_ShortDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="SerialOrder" class="form-label">SerialOrder<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="SubMen_SerialOrder"
                                        name="SubMen_SerialOrder"
                                        value="{{ old('SubMen_SerialOrder', $model->SubMen_SerialOrder) }}" placeholder="">
                                    <span id="SubMen_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-12">
                                    <label for="FullDesc" class="form-label">FullDesc</label>
                                    <textarea class="applyCK form-control" id="SubMen_FullDesc" name="SubMen_FullDesc" placeholder="">{!! old('SubMen_FullDesc', $model->SubMen_FullDesc) !!}</textarea>
                                    <span id="SubMen_FullDesc-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-3">
                                        <label for="AdminExists" class="form-label">AdminExists</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="SubMen_AdminExists"
                                                name="SubMen_AdminExists"
                                                {{ old('SubMen_AdminExists', $model->SubMen_AdminExists) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="SubMen_AdminExists">
                                                AdminExists
                                            </label>
                                        </div>
                                        <span id="SubMen_Men_Id-error" class="error" style="color: red;"></span>
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
                    SubMen_Name: "required",
                    SubMen_URL: "required",
                    SubMen_Men_Id: "required",
                    SubMen_ShortDesc: "required",
                    SubMen_FullDesc: "required",
                    SubMen_SerialOrder: "required"
                },
                messages: {
                    SubMen_Name: "This field is required",
                    SubMen_URL: "This field is required",
                    SubMen_Men_Id: "This field is required",
                    SubMen_ShortDesc: "This field is required",
                    SubMen_FullDesc: "This field is required",
                    SubMen_SerialOrder: "This field is required"
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
                SubMen_Name: "#SubMen_Name-error",
                SubMen_URL: "#SubMen_URL-error",
                SubMen_ShortDesc: "#SubMen_ShortDesc-error",
                SubMen_Men_Id: "#SubMen_Men_Id-error",
                SubMen_FullDesc: "#SubMen_FullDesc-error",
                SubMen_SerialOrder: "#SubMen_SerialOrder-error",
            };
        });
    </script>
    
@stop

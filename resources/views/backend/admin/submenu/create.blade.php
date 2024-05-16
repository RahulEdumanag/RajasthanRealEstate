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
                <span class="text-muted fw-light">Sub Menu/</span> Add Sub Menu
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
                        <form id="register-form" action="{{ route('admin.submenu.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">

                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="type"> Menu Name <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="SubMen_Men_Id" name="SubMen_Men_Id">

                                        <option selected disabled>Select Menu Name</option>
                                        @foreach ($model as $value)
                                            <option value='{{ $value->Men_Id }}'>{{ $value->Men_Name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="SubMen_Men_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="SubMen_Name" name="SubMen_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your Name" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="SubMen_Name-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6 form-group ">
                                        <label class="form-label" for="URL">URL  </label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="URL" name="SubMen_URL" class="form-control"
                                                autocomplete="off" placeholder="Enter your URL" aria-describedby="name2" />
                                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                    class="card-type"></span></span>
                                        </div>
                                     </div>
                                @endif

                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="SerialOrder">Serial Order <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="SubMen_SerialOrder" name="SubMen_SerialOrder"
                                            class="form-control" autocomplete="off" placeholder="Enter your SerialOrder"
                                            aria-describedby="name2" value="{{ $nextSerialOrder }}" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="SubMen_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Short Desc">Short Desc </label>
                                    <div class="input-group input-group-merge">
                                        <textarea type="text" id="SubMen_ShortDesc" name="SubMen_ShortDesc" class="form-control" autocomplete="off"
                                            placeholder="Enter your ShortDesc" aria-describedby="name2"></textarea>
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                 </div>

                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="FullDesc">FullDesc</label>
                                    <textarea class="applyCK form-control" id="SubMen_FullDesc" name="SubMen_FullDesc" class="form-control"></textarea>
                                    <span id="SubMen_FullDesc-error" class="error" style="color: red;"></span>
                                </div>

                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-3 form-group">
                                        <label class="form-check-label" for="AdminExists">AdminExists</label>
                                        <div class="form-check">
                                            <input type="checkbox" id="SubMen_AdminExists" name="SubMen_AdminExists"
                                                class="form-check-input">
                                        </div>
                                        <span id="SubMen_AdminExists-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif
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
            $("#register-form").validate({
                rules: {
                    SubMen_Name: {
                        required: true,
                        maxlength: 255
                    },

                  
                    SubMen_Men_Id: "required",
                    

                    SubMen_FullDesc: "required",
                    SubMen_SerialOrder: "required"
                },
                messages: {
                    SubMen_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                   
                    SubMen_Men_Id: "This field is required",
                   
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
                 SubMen_Men_Id: "#SubMen_Men_Id-error",

                SubMen_FullDesc: "#SubMen_FullDesc-error",
                SubMen_SerialOrder: "#SubMen_SerialOrder-error",
            };
        });
    </script>
    
@endsection

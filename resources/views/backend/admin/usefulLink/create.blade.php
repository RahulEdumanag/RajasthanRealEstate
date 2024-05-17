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
                <span class="text-muted fw-light">Useful Link/</span> Add Useful Link
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
                        <form id="register-form" action="{{ route('admin.usefulLink.store') }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_Name" name="Pag_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your Name" aria-describedby="name2" />
                                    </div>
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6 form-group ">
                                        <label class="form-label" for="URL">URL</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="URL" name="Pag_URL" class="form-control"
                                                autocomplete="off" placeholder="Enter your Pag_URL"
                                                aria-describedby="name2" />
                                        </div>
                                    </div>
                                @endif
                                <!-- <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Short Desc">Short Desc <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="Pag_ShortDesc" name="Pag_ShortDesc" class="form-control" autocomplete="off"
                                            placeholder="Enter your ShortDesc" aria-describedby="name2"></textarea>
                                    </div>
                                    <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                </div> -->
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Serial Order">Serial Order <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                            class="form-control" autocomplete="off" placeholder="Enter your SerialOrder"
                                            aria-describedby="name2" value="{{ $nextSerialOrder }}" />
                                    </div>
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="Full Desc">Full Desc </label>
                                    <textarea class="applyCK form-control" id="Pag_FullDesc" name="Pag_FullDesc" class="form-control"></textarea>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-2 form-group">
                                        <label class="form-check-label" for="Admin Exists">Admin Exists</label>
                                        <div class="form-check">
                                            <input type="checkbox" id="Pag_AdminExists" name="Pag_AdminExists"
                                                class="form-check-input">
                                        </div>
                                        <span id="Pag_AdminExists-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4" style='display: none;'>
                                    <label class="form-label" for="type"> UsefulLink Category <span
                                            style="color:red">*</span></label>

                                    <select class="form-control" id="Pag_PagCat_Id" name="Pag_PagCat_Id">
                                        @foreach ($model as $value)
                                            <option value="{{ $value->PagCat_Id }}"
                                                {{ $value->is_UsefulLink ? 'selected' : '' }}>
                                                {{ $value->PagCat_Name }}
                                            </option>
                                        @endforeach
                                    </select>
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
    </div>
  
    <script>
        $(document).ready(function($) {
            $("#register-form").validate({
                rules: {
                    Pag_Name: "required",
                    // Pag_ShortDesc: "required",
                    Pag_FullDesc: "required",
                    Pag_SerialOrder: "required"
                },
                messages: {
                    Pag_Name: "This field is required",
                    // Pag_ShortDesc: "This field is required",
                    Pag_SerialOrder: "This field is required",
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
                // Pag_ShortDesc: "#Pag_ShortDesc-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error",
                Pag_FullDesc: "#Pag_FullDesc-error"
            };
        });
    </script>
@endsection

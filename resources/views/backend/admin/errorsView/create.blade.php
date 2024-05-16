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
                <span class="text-muted fw-light">Error/</span> Add Error
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/errorsView') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Error List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.errorsView.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">

                                <div class="col-sm-12 form-group text-center">
                                    <label class="form-label text-center" for="type"> Organization Name<span
                                            style="color:red">*</span></label>
                                    <select class="form-control text-center" id="Error_Reg_Id" name="Error_Reg_Id">

                                        <option selected disabled>Select Organization Name</option>
                                        @foreach ($RegModel as $value)
                                            <option value='{{ $value->Reg_Id }}'>{{ $value->Reg_Organization_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="Error_Reg_Id-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-12">
                                    <label class="form-label" for="Title">Title</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Error_Title" name="Error_Title" class="form-control"
                                            autocomplete="off" placeholder="Enter your Title" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Error_Title-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="Full Desc">Full Desc</label>
                                    <textarea class="ckeditor form-control" id="Error_Message" name="Error_Message" class="form-control"></textarea>
                                    <span id="Error_Message-error" class="error" style="color: red;"></span>
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
                    Error_Reg_Id: "required",
                    Pag_Name: "required",
                    Pag_ShortDesc: "required"
                },
                messages: {
                    Error_Reg_Id: "This field is required",
                    Pag_Name: "This field is required",
                    Pag_ShortDesc: "This field is required"
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
                Error_Reg_Id: "#Error_Reg_Id-error",
                Pag_Name: "#Pag_Name-error",
                Pag_ShortDesc: "#Pag_ShortDesc-error"
            };
        });
    </script>
@endsection

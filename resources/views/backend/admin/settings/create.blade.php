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
                <span class="text-muted fw-light">Image Size/</span> Add Image Size
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/settings') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> SettingsList
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="Set_Img_Id">Image Size<span style="color:red">*</span></label>
                                    <select class="form-control" id="Set_Img_Id" name="Set_Img_Id">
                                        <option selected disabled>Select</option>
                                        @foreach ($ImgSizeModel as $value)
                                            <option value='{{ $value->Img_Id }}'>{{ $value->Img_Value }}</option>
                                        @endforeach
                                    </select>
                                    <span id="Set_Img_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="Set_Website">Website<span style="color:red">*</span></label>
                                    <select class="form-control" id="Set_Website" name="Set_Website">
                                        <option selected disabled>Select</option>
                                        <option value='0'>Active</option>
                                        <option value='1'>Under Construction</option>


                                    </select>
                                    <span id="Set_Website-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group mt-3">
                                    <div class=" d-flex col-xl-6">
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                            <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span>
                                                Save
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
                    Set_Img_Id: {
                        required: true,
                        maxlength: 255
                    },
                    Set_Website: "required"
                },
                messages: {
                    Set_Img_Id: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Set_Website: "This field is required"
                },
                errorPlacement: function(error, element) {
                    var fieldName = element.attr("name");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

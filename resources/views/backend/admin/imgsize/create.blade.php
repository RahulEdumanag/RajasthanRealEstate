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
                <a href="{{ URL::to('admin/imgsize') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Image Size List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.imgsize.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="Img Title">Image Title <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Img_Value" name="Img_Value" class="form-control"
                                            autocomplete="off" placeholder="Enter your Image Title"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="Img_Value-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="Image value">Image Value<span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Img_Title" name="Img_Title" class="form-control"
                                            autocomplete="off" placeholder="Enter your Image Value"
                                            aria-describedby="name2" />
                                    </div>
                                    <span id="Img_Title-error" class="error" style="color: red;"></span>
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

                    Img_Title: "required",
                    Img_Value: "required"
                },
                messages: {

                    Img_Title: "This field is required",
                    Img_Value: "This field is required"
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
                Img_Title: "#Img_Title-error",
                Img_Value: "#Img_Value-error"
            };
        });
    </script>
@endsection

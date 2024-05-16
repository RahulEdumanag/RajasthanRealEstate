@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Image Size/</span> Edit Image Size
            </h5>
            <div class="page-title-actions">
                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                    <a href="{{ URL::to('admin/imgsize') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Image Size List
                    </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.imgsize.update', $model->Img_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Keywords" class="form-label">Image Title<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Img_Value" name="Img_Value"
                                        value="{{ old('Img_Value', $model->Img_Value) }}" placeholder="">
                                    <span id="Img_Value-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="Og: Title" class="form-label">Image Value<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Img_Title" name="Img_Title"
                                        value="{{ old('Img_Title', $model->Img_Title) }}" placeholder="">
                                        <span id="Img_Title-error" class="error" style="color: red;"></span>
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

@stop

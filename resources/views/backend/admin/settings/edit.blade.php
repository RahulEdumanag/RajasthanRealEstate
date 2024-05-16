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
                    <a href="{{ URL::to('admin/settings') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> SettingsList
                    </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.settings.update', $model->Set_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="Set_Img_Id">Image Size<span style="color:red">*</span></label>
                                    <select class="form-control" id="Set_Img_Id" name="Set_Img_Id">
                                        <option selected disabled>Select Category Type</option>
                                        <!-- Populate options based on ImgSizeModel -->
                                        @foreach ($ImgSizeModel as $value)
                                            <option value="{{ $value->Img_Id }}"
                                                {{ $model->Set_Img_Id == $value->Img_Id ? 'selected' : '' }}>
                                                {{ $value->Img_Value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="Set_Img_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="Set_Website">Website<span style="color:red">*</span></label>
                                    <select class="form-control" id="Set_Website" name="Set_Website">
                                        <option selected disabled>Select</option>
                                        <option value='0' {{ $model->Set_Website == 0 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value='1' {{ $model->Set_Website == 1 ? 'selected' : '' }}>Under
                                            Construction
                                        </option>
                                    </select>
                                    <span id="Set_Website-error" class="error" style="color: red;"></span>
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

                    Set_Title: "required",
                    Set_Value: "required"
                },
                messages: {

                    Set_Title: "This field is required",
                    Set_Value: "This field is required"
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
                Set_Title: "#Set_Title-error",
                Set_Value: "#Set_Value-error"
            };
        });
    </script>

@stop

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

    <div class="forms">
        <h2 class="title1">Setting</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">

            <div class="d-flex">
                <div class="form-title">
                    <h4 class="">Create</h4>
                    <div class="eduTextEnd col-lg-12">
                        <a href="{{ URL::to('admin/setting') }}" class="btn btn-primary  marginUp">
                            <i class="bi bi-plus-lg"></i> Setting List
                        </a>
                    </div>

                </div>
                <div class="form-body">
                    <form id="register-form" action="{{ route('admin.setting.store') }}" enctype="multipart/form-data"
                        method="post" accept-charset="utf-8">
                        @csrf






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




                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
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

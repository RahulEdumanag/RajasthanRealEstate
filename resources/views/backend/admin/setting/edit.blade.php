@extends('backend.layouts.master')
@section('title', 'Edit')
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
        <h2 class="title1">Edit Setting</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="d-flex">
                <div class="form-title">
                    <h4 class="">Edit </h4>
                    <div class="eduTextEnd col-lg-12">
                        <a href="{{ URL::to('admin/setting') }}" class="btn btn-primary  marginUp">
                            <i class="bi bi-arrow-left"></i> Back to Setting List
                        </a>
                    </div>
                </div>
                <div class="form-body">
                    <form id="edit-form" action="{{ route('admin.setting.update', $model->Set_Id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')




                        <!-- Add more fields as needed -->
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
                                <option value='0' {{ $model->Set_Website == 0 ? 'selected' : '' }}>Active</option>
                                <option value='1' {{ $model->Set_Website == 1 ? 'selected' : '' }}>Under Construction
                                </option>
                            </select>
                            <span id="Set_Website-error" class="error" style="color: red;"></span>
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 ">
                            <button type="submit" class="btn btn-default">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function($) {
            var isFileSizeValid = true;

            function handleFileSizeValidation(fp, maxSize, errorSelector, clearSelectors, previewId) {
                var fileSize = Array.from(fp[0].files).reduce((size, file) => size + file.size, 0);

                if (fileSize > maxSize) {
                    isFileSizeValid = false;
                    $(errorSelector).html(`File size must not be more than ${maxSize / 1024} KB`);
                    $(clearSelectors.join(',')).val('').hide();
                    $(`#${previewId}`).attr('src', '').hide();
                } else {
                    isFileSizeValid = true;
                    $(errorSelector).html('');
                }
            }
            $('.photo').change(function() {
                var maxSize = 102400; // 100 KB
                var errorSelector = "#" + $(this).attr("id") + "-error";
                handleFileSizeValidation($(this), maxSize, errorSelector, [], $(this).attr("id"));
            });
            $('#edit-form').submit(function(event) {
                var imageFields = ['Set_ShortDesc'];
                var hasEmptyImage = false;

                $.each(imageFields, function(index, field) {
                    if (!$('#' + field).val()) {
                        hasEmptyImage = true;
                        return false;
                    }
                });


            });
            $("#edit-form").validate({
                rules: {
                    Set_Img_Id: {
                        required: true,
                        maxlength: 255
                    },
                    Set_Website: {
                        required: true,
                        maxlength: 255
                    },
                    Set_Amount: {
                        required: true,
                        maxlength: 255
                    },


                    Set_ShortDesc: "required",
                    PerInf_Address: "required",
                    Men_Order: "required"

                },
                messages: {
                    Set_Img_Id: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Set_Website: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                    Set_Amount: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },

                    PerInf_Address: "This field is required",
                    Men_Order: "This field is required",

                    Set_ShortDesc: "This field is required"
                },
                submitHandler: function(form) {
                    if (isFileSizeValid) {
                        form.submit();
                    } else {
                        alert('File size must not be more than 100 KB');
                    }
                },
                errorPlacement: function(error, element) {
                    var fieldName = element.attr("name");
                    if (fieldName in fieldErrorMap) {
                        error.appendTo(fieldErrorMap[fieldName]);
                    } else {
                        error.inSettAfter(element);
                    }
                }
            });


            var fieldErrorMap = {
                Set_Img_Id: "#Set_Img_Id-error",
                Set_Website: "#Set_Website-error",
                Set_Amount: "#Set_Amount-error",
                Cli_ShortDesc: "#Cli_ShortDesc-error",

                PerInf_Address: "#PerInf_Address-error",
                Men_Order: "#Men_Order-error",

                Set_ShortDesc: "#Set_ShortDesc-error"

            };
        });
    </script>
@endsection

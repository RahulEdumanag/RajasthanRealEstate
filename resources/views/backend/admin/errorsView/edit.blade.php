@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Error/</span> Edit Error
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
                        <form id='edit' action="{{ Route('admin.errorsView.update', $model->Error_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-12 form-group text-center">
                                    <label class="form-label text-center" for="type">Menu Name <span
                                            style="color:red">*</span></label>
                                    <select class="form-control text-center" id="Error_Reg_Id" name="Error_Reg_Id">
                                        <option selected disabled>Select Menu Name</option>
                                        @foreach ($RegModel as $value)
                                            <option value='{{ $value->Reg_Id }}'
                                                @if ($value->Reg_Id == $model->Error_Reg_Id) selected @endif>
                                                {{ $value->Reg_Organization_Name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class="col-sm-12">
                                    <label for="Title" class="form-label">Title<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Error_Title" name="Error_Title"
                                        value="{{ old('Error_Title', $model->Error_Title) }}" placeholder="">
                                    <span id="Error_Title-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-12">
                                    <label for="Full Desc" class="form-label">Full Desc</label>
                                    <textarea class="ckeditor form-control" id="Error_Message" name="Error_Message" placeholder="">{!! old('Error_Message', $model->Error_Message) !!}</textarea>
                                    @error('Error_Message')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                    @if (!empty($model->Error_Message))
                                        <img src="{{ asset('images/' . $model->Error_Message) }}" alt="Uploaded Image"
                                            class="img-fluid mt-3">
                                    @endif
                                </div>




                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
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
                    Pag_Name: "required",
                    Pag_ShortDesc: "required"

                },
                messages: {
                    Pag_ShortDesc: "This field is required",
                    Pag_Name: "This field is required"

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
                Pag_ShortDesc: "#Pag_ShortDesc-error"

            };
        });
    </script>

    <script>
        // Common configuration
        const commonConfig = {
            filebrowserUploadUrl: "/admin/images/upload",
            filebrowserUploadMethod: 'form',
            customConfig: '/path/to/your/config.js',
            height: 300,
            extraPlugins: 'colorbutton,justify,font',
            colorButton_enableMore: true,
            colorButton_colors: '00BCD4,8BC34A,FFC107,FF5722,673AB7,F44336,2196F3,4CAF50',
            toolbar: [
                ['Bold', 'Italic', 'Underline', 'TextColor', 'BGColor', 'NumberedList', 'BulletedList', 'Link',
                    'Unlink'
                ],
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'],
                ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'],
                ['Image', 'Table', 'HorizontalRule', 'SpecialChar'],
                ['Format', 'Font', 'FontSize'],
                ['Source', '-', 'Maximize']
            ],
        };

        // Create or Edit mode
        @if (isset($model))
            // Edit mode
            CKEDITOR.replace('Error_Message', {
                ...commonConfig,
                fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            }).setData(`{!! old('Error_Message', $model->Error_Message) !!}`);
        @else
            // Create mode
            CKEDITOR.replace('Error_Message', {
                ...commonConfig,
                fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            });
        @endif
    </script>


@stop

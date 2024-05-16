@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Announcement/</span> Edit Announcement
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/announcement') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Announcement List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.announcement.update', $model->Pag_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="Title" class="form-label">Title<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Pag_Name" name="Pag_Name"
                                        value="{{ old('Pag_Name', $model->Pag_Name) }}" placeholder="">
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="Short Description">Short Description <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="Pag_ShortDesc" name="Pag_ShortDesc" class="form-control" aria-describedby="name2">{{ old('Pag_ShortDesc', $model->Pag_ShortDesc) }}</textarea>
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-sm-12">
                                    <label for="Full Desc" class="form-label">Full Desc</label>
                                    <textarea class="ckeditor form-control" id="Pag_FullDesc" name="Pag_FullDesc" placeholder="">{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}</textarea>
                                    @error('Pag_FullDesc')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                    <!-- @if (!empty($model->Pag_FullDesc))
    <img src="{{ asset('images/' . $model->Pag_FullDesc) }}" alt="Uploaded Image"
                                                class="img-fluid mt-3">
    @endif -->
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
            filebrowserUploadUrl: "{{ route('admin.images.upload') }}",
            filebrowserUploadMethod: 'form',
            filebrowserImageBrowseUrl: "{{ route('admin.images.browse') }}",
            filebrowserImageBrowseMethod: 'get',
            height: 400,
            extraPlugins: 'colorbutton,justify,font,smiley,link,templates',
            colorButton_enableMore: true,
            colorButton_colors: '00BCD4,8BC34A,FFC107,FF5722,673AB7,F44336,2196F3,4CAF50',
            toolbar: [
                ['Bold', 'Italic', 'Underline', 'TextColor', 'BGColor', 'NumberedList', 'BulletedList', 'Link',
                    'Unlink'
                ],
                ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'],
                ['Image', 'Table', 'HorizontalRule', 'Smiley'],
                ['Format', 'Font', 'FontSize'],
                ['Link', 'Unlink'],
                ['JustifyLeft', 'JustifyCenter', 'JustifyRight'],
                ['Templates'],
            ],
            templates: 'default',
            fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            filebrowserImageUploadUrl: "{{ route('admin.images.upload') }}",
            filebrowserImageBrowseUrl: "{{ route('admin.images.browse') }}",
            filebrowserImageBrowseMethod: 'get',
            filebrowserUploadMethod: function(url, result, formData) {
                result = JSON.parse(result);
                if (result.uploaded) {
                    return result.url;
                } else {
                    console.error('Error uploading image:', result.error.message);
                    return '';
                }
            },
        };

        // Create or Edit mode
        @if (isset($model))
            // Edit mode
            CKEDITOR.replace('Pag_FullDesc', {
                ...commonConfig,
                fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            }).setData(`{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}`);
        @else
            // Create mode
            CKEDITOR.replace('Pag_FullDesc', {
                ...commonConfig,
                fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            });
        @endif
    </script>


@stop

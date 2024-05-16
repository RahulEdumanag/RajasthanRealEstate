@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Website Help/</span> Edit Website Help
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/websiteHelp') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>Website Help List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.websiteHelp.update', $model->Pag_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="FullDesc" class="form-label">FullDesc</label>
                                    <textarea class="ckeditor form-control" id="Pag_FullDesc" name="Pag_FullDesc" placeholder="">{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}</textarea>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
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
                    Pag_FullDesc: "required"
                },
                messages: {
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
                Pag_FullDesc: "#Pag_FullDesc-error"
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

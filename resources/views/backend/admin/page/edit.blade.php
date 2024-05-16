    @extends('backend.layouts.master')
    @section('content')
        <div class="container-fluid">
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Page/</span> Edit Page
            </h4>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form id='edit' action="{{ Route('admin.page.update', $model->Pag_Id) }}"
                                enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="Name" class="form-label">Name<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="Pag_Name" name="Pag_Name"
                                            value="{{ old('Pag_Name', $model->Pag_Name) }}" placeholder="">
                                        <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                    </div>
                                    @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                        <div class="col-sm-6">
                                            <label for="URL" class="form-label">URL<span
                                                    style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="Pag_URL" name="Pag_URL"
                                                value="{{ old('Pag_URL', $model->Pag_URL) }}" placeholder="">
                                            <span id="Pag_URL-error" class="error" style="color: red;"></span>
                                        </div>
                                    @endif
                                    <div class="col-sm-6">
                                        <label for="ShortDesc" class="form-label">ShortDesc<span
                                                style="color:red">*</span></label>
                                        <textarea class="form-control" id="Pag_ShortDesc" name="Pag_ShortDesc" placeholder="">{{ old('Pag_ShortDesc', $model->Pag_ShortDesc) }}</textarea>
                                        <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="SerialOrder" class="form-label">SerialOrder<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="Pag_SerialOrder"
                                            name="Pag_SerialOrder"
                                            value="{{ old('Pag_SerialOrder', $model->Pag_SerialOrder) }}" placeholder="">
                                        <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="FullDesc" class="form-label">FullDesc<span
                                                style="color:red">*</span></label>
                                        <textarea class="ckeditor form-control" id="Pag_FullDesc" name="Pag_FullDesc" placeholder="">{!! old('Pag_FullDesc', $model->Pag_FullDesc) !!}</textarea>
                                        <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
                                    </div>

                                    @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                        <div class="col-sm-2">
                                            <label for="AdminExists" class="form-label">AdminExists<span
                                                    style="color:red">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="Pag_AdminExists"
                                                    name="Pag_AdminExists"
                                                    {{ old('Pag_AdminExists', $model->Pag_AdminExists) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="Pag_AdminExists">
                                                    AdminExists
                                                </label>
                                            </div>
                                            @error('Pag_AdminExists')
                                                <div class="has-error mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif

                                    @if (Auth::user()->EmpRegistration->Emp_Role == '1')

                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="type"> Page Category <span
                                                    style="color:red">*</span></label>
                                            <select class="form-control" id="Pag_PagCat_Id" name="Pag_PagCat_Id">
                                                <option selected disabled>Select Category Name</option>
                                                @foreach ($modelCat as $value)
                                                    <option value='{{ $value->PagCat_Id }}'
                                                        {{ old('Pag_PagCat_Id', $model->Pag_PagCat_Id) == $value->PagCat_Id ? 'selected' : '' }}>
                                                        {{ $value->PagCat_Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span id="Pag_PagCat_Id-error" class="error" style="color: red;"></span>
                                        </div>
                                    @endif
                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                        <label class="form-label" for="formFile">Upload Image<span
                                                style="color:red">*</span></label>
                                        <div
                                            class="input-group mb-3 bg-white rounded-2 border border-1 shadow-sm border-secondary">
                                            <input name="Pag_Image" id="Pag_Image" type="file"
                                                onchange="readURL(this);" class="form-control">
                                        </div>
                                        @error('Pag_Image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <p class="font-italic text-center"></p>
                                        <div class="image-area mt-4">
                                            <img id="imageResult" src="{{ asset('uploads/' . $model->Pag_Image) }}"
                                                alt="" class="img-fluid rounded shadow-sm mx-auto d-block"
                                                style="width: 250px;">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success "
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
                        Pag_URL: "required",
                        Pag_ShortDesc: "required",
                        Pag_FullDesc: "required",
                        Pag_SerialOrder: "required",
                        Pag_PagCat_Id: "required"
                    },
                    messages: {
                        Pag_Name: "This field is required",
                        Pag_URL: "This field is required",
                        Pag_ShortDesc: "This field is required",
                        Pag_PagCat_Id: "This field is required",
                        Pag_SerialOrder: "This field is required",
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
                    Pag_Name: "#Pag_Name-error",
                    Pag_URL: "#Pag_URL-error",
                    Pag_ShortDesc: "#Pag_ShortDesc-error",
                    Pag_PagCat_Id: "#Pag_PagCat_Id-error",
                    Pag_SerialOrder: "#Pag_SerialOrder-error",
                    Pag_FullDesc: "#Pag_FullDesc-error"
                };
            });
        </script>
         
<script>
    // Common configuration
    const commonConfig = {
        filebrowserUploadUrl: "/admin/images/upload",
        filebrowserUploadMethod: 'form',
        customConfig: '/path/to/your/config.js',
        height: 100,
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
    @if(isset($model))
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

@extends('backend.layouts.master')
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
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Page/</span> Add Page
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.page.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_Name" name="Pag_Name" class="form-control"
                                            placeholder="Enter your Name" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6 form-group ">
                                        <label class="form-label" for="URL">URL <span
                                                style="color:red">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="URL" name="Pag_URL" class="form-control"
                                                placeholder="Enter your Pag_URL" aria-describedby="name2" />
                                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                    class="card-type"></span></span>
                                        </div>
                                        <span id="Pag_URL-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="ShortDesc">ShortDesc <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="Pag_ShortDesc" name="Pag_ShortDesc" class="form-control" placeholder="Enter your ShortDesc"
                                            aria-describedby="name2"></textarea>
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="SerialOrder">SerialOrder <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                            class="form-control" placeholder="Enter your SerialOrder"
                                            aria-describedby="name2" value="{{ $nextSerialOrder }}" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="FullDesc">FullDesc</label>
                                    <textarea class="ckeditor form-control" id="Pag_FullDesc" name="Pag_FullDesc" class="form-control"></textarea>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Image">Image <span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <input id="photo" type="file" name="Pag_Image" style="display:none"
                                            onchange="displaySelectedImage(this, 'SelectedFileName', 'selectedImagePreview')">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-dark text-white"
                                                onclick="$('input[id=photo]').click();">Image</a>
                                        </div>
                                        <input type="text" name="Pag_Image" class="form-control"
                                            id="SelectedFileName" value="" readonly>
                                        @error('Pag_Image')
                                            <div class="has-error mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <img id="selectedImagePreview" src="" alt="Selected Image"
                                        style="display:none; max-width: 10%; margin-top: 10px;">
                                    @error('logo')
                                        <div class="has-error mt-2" style="color: red">Guest Logo required.</div>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="type"> Page Category <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="Pag_PagCat_Id" name="Pag_PagCat_Id">
                                        <option selected disabled>Select Category Name</option>
                                        @foreach ($model as $value)
                                            <option value='{{ $value->PagCat_Id }}'>{{ $value->PagCat_Name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="Pag_PagCat_Id-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6 form-group">
                                        <label class="form-check-label" for="AdminExists">AdminExists</label>
                                        <div class="form-check">
                                            <input type="checkbox" id="Pag_AdminExists" name="Pag_AdminExists"
                                                class="form-check-input">
                                        </div>
                                        <span id="Pag_AdminExists-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn " style="background-color:#7367f0;color:white">
                                        <i class="fa fa-save fa-fw"></i> Save
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
            $("#register-form").validate({
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
        CKEDITOR.replace('Pag_FullDesc', {
            filebrowserUploadUrl: "{{ route('admin.images.upload') }}",
            filebrowserUploadMethod: 'form',
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
            fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px'
        });
    </script>
@endsection

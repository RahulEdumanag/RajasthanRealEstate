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
                <span class="text-muted fw-light">Service/</span> Add Service
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/service') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Service List
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.service.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_Name" name="Pag_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your service Name"
                                            aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for=" Short Desc"> Short Desc <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_ShortDesc" name="Pag_ShortDesc" class="form-control"
                                            autocomplete="off" placeholder="Enter your service price"
                                            aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_ShortDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="Icon">Icon </label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Pag_URL" name="Pag_URL" class="form-control"
                                            autocomplete="off" placeholder="Enter your icon" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                    <label class="form-label" for="Image">Image</label>
                                    <div class="input-group">
                                        <input id="photo" type="file" name="Pag_Image" style="display:none"
                                            onchange="displaySelectedImage(this, 'SelectedFileName', 'selectedImagePreview')">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-dark text-white"
                                                onclick="$('input[id=photo]').click();">Image</a>
                                        </div>
                                        <input type="text" name="Pag_Image" class="form-control" id="SelectedFileName"
                                            value="" readonly>

                                    </div>
                                    <img id="selectedImagePreview" src="" alt="Selected Image"
                                        style="display:none; max-width: 10%; margin-top: 10px;">
                                    <span id="Pag_Image-error" class="error" style="color: red;"></span>

                                </div>





                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Serial Order">Serial Order <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                            class="form-control" autocomplete="off" placeholder="Enter your ShortDesc"
                                            aria-describedby="name2" value="{{ $nextSerialOrder }}" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="form-label" for="Full Desc">Full Desc <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="Pag_FullDesc" name="Pag_FullDesc" class="form-control applyCK" autocomplete="off"
                                            placeholder="Enter your ShortDesc" aria-describedby="name2"></textarea>
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
                                </div>


                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4" style='display: none;'>
                                    <label class="form-label" for="type"> Service Category <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="Pag_PagCat_Id" name="Pag_PagCat_Id">
                                        @foreach ($model as $value)
                                            <option value="{{ $value->PagCat_Id }}"
                                                {{ $value->is_Service ? 'selected' : '' }}>
                                                {{ $value->PagCat_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <div class=" d-flex col-xl-6">
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                            <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
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



            function handleFileSizeValidation(fp, maxSize, errorSelector, clearSelectors) {
                var fileSize = Array.from(fp[0].files).reduce((size, file) => size + file.size, 0);

                if (fileSize > maxSize) {
                    isFileSizeValid = false;
                    $(errorSelector).html(`File size must not be more than 
                                            @if ($ImgMaxSizeModel)
                                            {{ $ImgMaxSizeModel->imgsize->Img_Value }}
                                            @endif
                                            `);
                    $(clearSelectors.join(',')).val('').hide();
                } else {
                    isFileSizeValid = true;
                    $(errorSelector).html('');
                }
            }


            $("#register-form").validate({
                rules: {
                    Pag_Name: "required",
                    Pag_ShortDesc: "required",
                    // Pag_URL: "required",
                    Pag_SerialOrder: "required"

                },
                messages: {
                    Pag_Name: "This field is required",
                    Pag_ShortDesc: "This field is required",
                    // Pag_URL: "This field is required",
                    Pag_SerialOrder: "This field is required"

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
                    if (isFileSizeValid) {
                        form.submit();
                    } else {
                        alert(
                            'File size must not be more than @if ($ImgMaxSizeModel){{ $ImgMaxSizeModel->imgsize->Img_Value }}@endif '
                        );
                    }
                }
            });
            $('#photo').change(function() {
                var maxSize = {{ $ImgMaxSizeModel->imgsize->Img_Title ?? '' }};
                var errorSelector = "#Pag_Image-error";
                var additionalSelectors = ['#photo',
                    '#SelectedFileName'
                ];

                handleFileSizeValidation($("#photo"), maxSize, errorSelector, additionalSelectors);
            });
            var fieldErrorMap = {
                Pag_Name: "#Pag_Name-error",
                Pag_ShortDesc: "#Pag_ShortDesc-error",
                // Pag_URL: "#Pag_URL-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error"
            };
        });
    </script>
@endsection

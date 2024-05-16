@extends('backend.layouts.master')
@section('content')@section('title', 'Create')

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
            <span class="text-muted fw-light">Gallery/</span> Add Gallery
        </h5>
        <div class="page-title-actions">
            <a href="{{ URL::to('admin/gallery') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Gallery List
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="register-form" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data"
                        method="post" accept-charset="utf-8">
                        @csrf
                        <div class="row g-3">

                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label class="form-label" for="type"> Gallery Category <span
                                        style="color:red">*</span></label>
                                <select class="form-control" id="Gall_GallCat_Id" name="Gall_GallCat_Id">
                                    <option Selected disabled>Select</option>

                                    @foreach ($model as $value)
                                        <option value="{{ $value->GallCat_Id }}">
                                            {{ $value->GallCat_Name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="Gall_GallCat_Id-error" class="error" style="color: red;"></span>

                            </div>
                            <!-- <div class="col-sm-6">
                                                                        <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="text" id="Gall_Name" name="Gall_Name" class="form-control"
                                                                                placeholder="Enter your Name" aria-describedby="name2" />
                                                                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                                                    class="card-type"></span></span>
                                                                        </div>
                                                                        <span id="Gall_Name-error" class="error" style="color: red;"></span>
                                                                    </div> -->
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label class="form-label" for="Image">Images <span style="color:red">*</span></label>
                                (upload a maximum of 10 images)
                                <div class="input-group">
                                    <input id="photo" type="file" name="Gall_Image[]" style="display:none"
                                        multiple data-rule-maxsize="10240"
                                        onchange="displaySelectedImages(this, 'SelectedFileNames', 'selectedImagesPreview')">
                                    <div class="input-group-prepend">
                                        <a class="btn btn-dark text-white"
                                            onclick="$('input[id=photo]').click();">Images</a>
                                    </div>
                                    <input type="text" name="Gall_Image" class="form-control" id="SelectedFileNames"
                                        value="" readonly>

                                </div>
                                <div id="selectedImagesPreview" style="display:none; margin-top: 10px;"></div>

                                <span id="Gall_Image-error" class="image-error" style="color: red;"></span>

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
        var isFileSizeValid = true;


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



        function previewPhotoInput() {
            var $preview = $('#previewPhoto');
            var $errors = $('#previewErrors');

            $preview.html('');
            $errors.html('');

            if (this.files) {
                $.each(this.files, function(i, file) {
                    var size = file.size / 1000; // in KB
                    if (size > 100) {
                        $errors.append(
                            `<div class="error" style='color:red'>Image ${i + 1}: File should be less than 100K</div>`
                        );
                        return; // Skip further processing for this image
                    }

                    if (!/\.(jpeg|jpg)$/i.test(file.name)) {
                        $errors.append(
                            `<div class="error" style='color:red'>Image ${i + 1}: Invalid Format!</div>`
                        );
                        return; // Skip further processing for this image
                    }

                    var reader = new FileReader();
                    $(reader).on("load", function() {
                        $preview.append($("<img/>", {
                            src: this.result,
                            height: 100,
                            id: 'selectedImagesPreview' + i
                        }));
                    });
                    reader.readAsDataURL(file);
                });
            }
        }

        $("#register-form").validate({
            rules: {
                Gall_Name: {
                    required: true,
                    maxlength: 255
                },
                Gall_GallCat_Id: "required",
                Gall_Image: "required",

                "Gall_Image[]": "required"
            },
            messages: {
                Gall_Name: {
                    required: "This field is required",
                    maxlength: "Maximum length exceeded"
                },
                Gall_GallCat_Id: "This field is required",
                Gall_Image: "This field is required",

                "Gall_Image[]": "This field is required"
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
            var errorSelector = "#Gall_Image-error";
            var additionalSelectors = ['#photo',
                '#SelectedFileName'
            ];

            handleFileSizeValidation($("#photo"), maxSize, errorSelector, additionalSelectors);
        });



        var fieldErrorMap = {
            Gall_GallCat_Id: "#Gall_GallCat_Id-error",
            Gall_Name: "#Gall_Name-error",
            "Gall_Image[]": ".image-error"
        };
    });

    function displaySelectedImages(input, fileNameElementId, previewElementId) {
        var files = input.files;
        var fileNameList = [];

        for (var i = 0; i < files.length; i++) {
            fileNameList.push(files[i].name);
        }

        document.getElementById(fileNameElementId).value = fileNameList.join(', ');

        var previewContainer = document.getElementById(previewElementId);
        previewContainer.innerHTML = '';

        for (var i = 0; i < files.length; i++) {
            var img = document.createElement('img');
            img.src = URL.createObjectURL(files[i]);
            img.style.maxWidth = '10%';
            img.style.marginRight = '5px';
            previewContainer.appendChild(img);
        }

        previewContainer.style.display = 'flex';
    }
</script>
@endsection

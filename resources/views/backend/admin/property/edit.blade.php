@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Property /</span> Edit Property
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.property.update', $model->PId) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="state">State <span style="color:red">*</span></label>
                                    <select class="form-control" id="state" name="state">
                                        <option selected disabled>Select State</option>
                                        @foreach ($states as $state)
                                            <option value='{{ $state->Sta_Id }}'
                                                @if ($model->city && $state->Sta_Id == $model->city->Cit_Sta_Id) selected @endif>{{ $state->Sta_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="state-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="PCit_Id">City <span style="color:red">*</span></label>
                                    <select class="form-control" id="PCit_Id" name="PCit_Id">
                                        <option selected disabled>Select City</option>
                                        @foreach ($CityModel as $value)
                                            <option value='{{ $value->Cit_Id }}'
                                                @if ($value->Cit_Id == $model->PCit_Id) selected @endif>{{ $value->Cit_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="PCit_Id-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="PAre_Id">Area</label>
                                    <select class="form-control" id="PAre_Id" name="PAre_Id">
                                        <option selected disabled>Select Area</option>
                                        @foreach ($AreaModel as $value)
                                            <option value='{{ $value->Are_Id }}'
                                                @if ($value->Are_Id == $model->PAre_Id) selected @endif>{{ $value->Are_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="PAre_Id-error" class="error" style="color: red;"></span>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="type"> Property Type <span 3
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="PPTyp_Id" name="PPTyp_Id">
                                        <option selected disabled>Select Property Type</option>
                                        @foreach ($PropertyTypeModel as $value)
                                            <option value='{{ $value->PTyp_Id }}'
                                                @if ($value->PTyp_Id == $model->PPTyp_Id) selected @endif>{{ $value->PTyp_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="PPTyp_Id-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label class="form-label">Featured<span style="color:red">*</span></label>
                                    <select class="form-control" id="PFeatured" name="PFeatured">
                                        <option selected disabled>Select</option>
                                        <option value='1' {{ $model->PFeatured == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value='0' {{ $model->PFeatured == 0 ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                    <span id="PFeatured-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label class="form-label" for="Bath Room">Bath Room<span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="PBathRoom" name="PBathRoom">
                                        <option selected disabled>Select</option>
                                        <option value='1' {{ $model->PBathRoom == 1 ? 'selected' : '' }}>1
                                        </option>
                                        <option value='2' {{ $model->PBathRoom == 2 ? 'selected' : '' }}>2
                                        </option>
                                        <option value='3' {{ $model->PBathRoom == 3 ? 'selected' : '' }}>3
                                        </option>
                                        <option value='4' {{ $model->PBathRoom == 4 ? 'selected' : '' }}>4
                                        </option>
                                        <option value='5' {{ $model->PBathRoom == 5 ? 'selected' : '' }}>5
                                        </option>
                                    </select>
                                    <span id="PBathRoom-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label class="form-label" for="Bed Room">Bed Room<span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="PBedRoom" name="PBedRoom">
                                        <option selected disabled>Select</option>
                                        <option value='1' {{ $model->PBedRoom == 1 ? 'selected' : '' }}>1
                                        </option>
                                        <option value='2' {{ $model->PBedRoom == 2 ? 'selected' : '' }}>2
                                        </option>
                                        <option value='3' {{ $model->PBedRoom == 3 ? 'selected' : '' }}>3
                                        </option>
                                        <option value='4' {{ $model->PBedRoom == 4 ? 'selected' : '' }}>4
                                        </option>
                                        <option value='5' {{ $model->PBedRoom == 5 ? 'selected' : '' }}>5
                                        </option>
                                        <option value='6' {{ $model->PBedRoom == 6 ? 'selected' : '' }}>6
                                        </option>
                                        <option value='7' {{ $model->PBedRoom == 7 ? 'selected' : '' }}>7
                                        </option>
                                        <option value='8' {{ $model->PBedRoom == 8 ? 'selected' : '' }}>8
                                        </option>
                                    </select>
                                    <span id="PBedRoom-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Title" class="form-label">Title<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="PTitle" name="PTitle"
                                        value="{{ old('PTitle', $model->PTitle) }}" placeholder="">
                                    <span id="PTitle-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Amount" class="form-label">Amount<span
                                            style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="PAmount" name="PAmount"
                                        value="{{ old('PAmount', $model->PAmount) }}" placeholder="">
                                    <span id="PAmount-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Tag" class="form-label">Tag</label>
                                    <input type="text" class="form-control" id="PTag" name="PTag"
                                        value="{{ old('PTag', $model->PTag) }}" placeholder="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Squre Feet" class="form-label">Squre Feet </label>
                                    <input type="text" class="form-control" id="PSqureFeet" name="PSqureFeet"
                                        value="{{ old('PSqureFeet', $model->PSqureFeet) }}" placeholder="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Map Link" class="form-label">Map Link</label>
                                    <input type="text" class="form-control" id="PMapLink" name="PMapLink"
                                        value="{{ old('PMapLink', $model->PMapLink) }}" placeholder="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Address" class="form-label">Address<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="PAddress" name="PAddress" placeholder="">{{ old('PAddress', $model->PAddress) }}</textarea>
                                    <span id="PAddress-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Short Desc" class="form-label">Short Desc<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" id="PShortDesc" name="PShortDesc" placeholder="">{{ old('PShortDesc', $model->PShortDesc) }}</textarea>
                                    <span id="PShortDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Property Features</legend>
                                    <label class="form-label" for="type">Features<span
                                            style="color:red">*</span></label>
                                    <div class="row">
                                        @foreach ($PropertyFeaturesModel as $value)
                                            <div class="col-lg-3 col-sm-12 col-md-4 mb-2">
                                                <div class="form-check">
                                                    @php
                                                        $featuresArray = json_decode($model->PPFea_Id, true);
                                                        if (!is_array($featuresArray)) {
                                                            $featuresArray = [];
                                                        }
                                                    @endphp
                                                    <input class="form-check-input" type="checkbox" name="PPFea_Id[]"
                                                        id="PPFea_Id_{{ $value->PFea_Id }}"
                                                        value="{{ $value->PFea_Id }}"
                                                        {{ in_array($value->PFea_Id, $featuresArray) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="PFea_Id_{{ $value->PFea_Id }}">{{ $value->PFea_Name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <span id="PPFea_Id-error" class="error" style="color: red;"></span>
                                </fieldset>
                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Images</legend>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="Image">Property Images <span
                                                    style="color:red">*</span></label>
                                            <br>
                                            (upload a maximum of 10 images)
                                            <div class="input-group">
                                                <input id="photo" type="file" name="PImages[]"
                                                    style="display:none" multiple data-rule-maxsize="10240"
                                                    onchange="displaySelectedImages(this, 'SelectedFileNames', 'selectedImagesPreview')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="$('input[id=photo]').click();">Images</a>
                                                </div>
                                                <input type="text" name="PImages" style="color: white;border: white;"
                                                    id="SelectedFileNames"
                                                    value="{{ old('PImages') ?? $model->PImages }}" readonly>
                                            </div>
                                            <div id="selectedImagesPreview" style="display:none; margin-top: 10px;">
                                                @foreach (explode(',', $model->PImages) as $image)
                                                    <img src="{{ asset($image) }}" alt="Selected Image"
                                                        style="width: 100px; height: 100px; margin-right: 5px;">
                                                @endforeach
                                            </div>
                                            @if ($model->PImages)
                                                @foreach (explode(',', $model->PImages) as $image)
                                                    <img src="{{ asset('uploads/' . trim($image)) }}"
                                                        alt="Selected Image"
                                                        style="width: 50px; height: 50px; margin-right: 5px;">
                                                @endforeach
                                            @endif
                                            <span id="PImages-error" class="image-error" style="color: red;"></span>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label" for="Image">Plans Images <span
                                                    style="color:red">*</span></label>
                                            <br>
                                            (upload a maximum of 10 images)
                                            <div class="input-group">
                                                <input id="photo2" type="file" name="PPlansImage[]"
                                                    style="display:none" multiple data-rule-maxsize="10240"
                                                    onchange="displaySelectedImages2(this, 'SelectedFileNames2', 'selectedImagesPreview2')">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-dark text-white"
                                                        onclick="$('input[id=photo2]').click();">Images</a>
                                                </div>
                                                <input type="text" name="PPlansImage"
                                                    style="color: white;border: white;" id="SelectedFileNames2"
                                                    value="{{ old('PPlansImage') ?? $model->PPlansImage }}" readonly>
                                            </div>
                                            <div id="selectedImagesPreview2" style="display:none; margin-top: 10px;">
                                                @foreach (explode(',', $model->PPlansImage) as $image)
                                                    <img src="{{ asset($image) }}" alt="Selected Image"
                                                        style="width: 100px; height: 100px; margin-right: 5px;">
                                                @endforeach
                                            </div>
                                            @if ($model->PPlansImage)
                                                @foreach (explode(',', $model->PPlansImage) as $image)
                                                    <img src="{{ asset('uploads/' . trim($image)) }}"
                                                        alt="Selected Image"
                                                        style="width: 50px; height: 50px; margin-right: 5px;">
                                                @endforeach
                                            @endif
                                            <span id="PPlansImage-error" class="image-error" style="color: red;"></span>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-sm-12">
                                    <label for="Full Desc" class="form-label">Full Desc</label>
                                    <textarea class="ckeditor form-control" id="PFullDesc" name="PFullDesc" placeholder="">{!! old('PFullDesc', $model->PFullDesc) !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <button type="submit" class="btn " style="background-color:#7367f0;color:white"
                                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stateSelect = document.getElementById('state');
            const citySelect = document.getElementById('PCit_Id');
            const areaSelect = document.getElementById('PAre_Id');

            stateSelect.addEventListener('change', function() {
                const stateId = this.value;
                if (stateId) {
                    fetch(`/getCitiesByState/${stateId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            citySelect.innerHTML = '<option selected disabled>Select City</option>';
                            data.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.Cit_Id;
                                option.textContent = city.Cit_Name;
                                citySelect.appendChild(option);
                            });
                            citySelect.disabled = false;
                            areaSelect.innerHTML = '<option selected disabled>Select Area</option>';
                            areaSelect.disabled = true;
                        })
                        .catch(error => console.error('Error fetching cities:', error));
                }
            });

            citySelect.addEventListener('change', function() {
                const cityId = this.value;
                if (cityId) {
                    fetch(`/getAreasByCity/${cityId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            areaSelect.innerHTML = '<option selected disabled>Select Area</option>';
                            data.forEach(area => {
                                const option = document.createElement('option');
                                option.value = area.Are_Id;
                                option.textContent = area.Are_Name;
                                areaSelect.appendChild(option);
                            });
                            areaSelect.disabled = false;
                        })
                        .catch(error => console.error('Error fetching areas:', error));
                }
            });
        });

        // citySelect.addEventListener('change', function() {
        //     const cityId = this.value;
        //     if (cityId) {
        //         fetch(`/getAreasByCity/${cityId}`)
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error('Network response was not ok');
        //                 }
        //                 return response.json();
        //             })
        //             .then(data => {
        //                 areaSelect.innerHTML = '<option selected disabled>Select Area</option>';
        //                 data.forEach(area => {
        //                     const option = document.createElement('option');
        //                     option.value = area.Are_Id;
        //                     option.textContent = area.Are_Name;
        //                     if (area.Are_Id == initialAreaId) {
        //                         option.selected = true;
        //                     }
        //                     areaSelect.appendChild(option);
        //                 });
        //                 areaSelect.disabled = false;
        //             })
        //             .catch(error => console.error('Error fetching areas:', error));
        //     }
        // });

        // Trigger the change event on the state select to load the initial cities and areas
    </script>

    <script>
        $(document).ready(function($) {
            $("#edit").validate({
                rules: {
                    PCit_Id: "required",
                    PPTyp_Id: "required",
                    PFeatured: "required",
                    PBedRoom: "required",
                    PBathRoom: "required",
                    PTitle: "required",
                    PAmount: "required",
                    PAddress: "required",
                    PShortDesc: "required",
                    'PPFea_Id[]': {
                        required: true,
                        minlength: 1
                    }
                },
                messages: {
                    PCit_Id: "This field is required",
                    PPTyp_Id: "This field is required",
                    PFeatured: "This field is required",
                    PBedRoom: "This field is required",
                    PBathRoom: "This field is required",
                    PTitle: "This field is required",
                    PAmount: "This field is required",
                    PAddress: "This field is required",
                    PShortDesc: "This field is required",
                    'PPFea_Id[]': "This field is required"
                },
                errorPlacement: function(error, element) {
                    var fieldName = element.attr("name");
                    if (fieldName in fieldErrorMap) {
                        error.appendTo(fieldErrorMap[fieldName]);
                    } else {
                        error.insertAfter(element);
                    }
                },
            });
            $('#photo').change(function() {
                var maxSize = {{ $ImgMaxSizeModel->imgsize->Img_Title ?? '' }};
                var errorSelector = "#PImages-error";
                var additionalSelectors = ['#photo',
                    '#SelectedFileName'
                ];
                handleFileSizeValidation($("#photo"), maxSize, errorSelector, additionalSelectors);
            });
            $('#photo2').change(function() {
                var maxSize = {{ $ImgMaxSizeModel->imgsize->Img_Title ?? '' }};
                var errorSelector = "#PImages-error";
                var additionalSelectors = ['#photo2',
                    '#SelectedFileName'
                ];
                handleFileSizeValidation($("#photo2"), maxSize, errorSelector, additionalSelectors);
            });
            var fieldErrorMap = {
                PCit_Id: "#PCit_Id-error",
                PPTyp_Id: "#PPTyp_Id-error",
                PFeatured: "#PFeatured-error",
                PBedRoom: "#PBedRoom-error",
                PBathRoom: "#PBathRoom-error",
                PTitle: "#PTitle-error",
                PAmount: "#PAmount-error",
                PAddress: "#PAddress-error",
                PShortDesc: "#PShortDesc-error",
                'PPFea_Id[]': "#PPFea_Id-error"
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

        function displaySelectedImages2(input, fileNameElementId, previewElementId) {
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
@stop

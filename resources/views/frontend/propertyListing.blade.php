@extends('frontend.layouts.master')
@section('title', 'Contact')
@section('content')
    <style>
        ::placeholder {
            color: black;
            opacity: 1;
        }
    </style>
    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>propertyListing</h1>
                <h5>40 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="{{ URL::to('/') }}">home</a><span><i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></span><a href="{{ URL::to('/contact') }}">propertyListing</a>
            </div>
        </div>
    </div>
    <section id="contact-us" class="padding_top parallaxie" style="background-image:url(images/map-bg.png); ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="contact-bg">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="bottom40">
                                    <h2 class="text-uppercase">Send us a<span class="color_red"> message </span>
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
                                    </h2>
                                    <div class="line_1"></div>
                                    <div class="line_2"></div>
                                    <div class="line_3"></div>
                                </div>

                                <form id="register-form" action="{{ route('propertyListing.Pstore') }}"
                                    enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
                                    <div class="row g-3">

                                        <div class="col-sm-6 form-group ">
                                            <label class="form-label" for="type">Type<span
                                                    style="color:red">*</span></label>
                                            <select class="form-control" id="PType" name="PType">
                                                <option selected disabled>Select Type</option>
                                                <option value='1'
                                                    {{ isset($lastSelectedPType) && $lastSelectedPType == '1' ? 'selected' : '' }}>
                                                    Rent</option>
                                                <option value='2'
                                                    {{ isset($lastSelectedPType) && $lastSelectedPType == '2' ? 'selected' : '' }}>
                                                    Sale/Purchase</option>
                                            </select>
                                            @error('PType')
                                                <span class="error" style="color: red;">this field is required</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="PSta_Id">State Name<span
                                                    style="color:red">*</span></label>
                                            <select class="form-control" id="PSta_Id" name="PSta_Id" reui>
                                                <option selected disabled>Select State</option>
                                                @foreach ($StateModel as $state)
                                                    <option value='{{ $state->Sta_Id }}'
                                                        @if ($state->Sta_Id == $lastSelectedPSta_Id) selected @endif>
                                                        {{ $state->Sta_Name }}</option>
                                                @endforeach
                                            </select>
                                            @error('PSta_Id')
                                                <span class="error" style="color: red;">this field is required</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="PCit_Id">City Name<span
                                                    style="color:red">*</span></label>
                                            <select class="form-control" id="PCit_Id" name="PCit_Id">
                                                <option selected disabled>Select City</option>
                                                @if (isset($CityModel) && $lastSelectedPSta_Id)
                                                    @foreach ($CityModel as $city)
                                                        <option value='{{ $city->Cit_Id }}'
                                                            {{ isset($lastSelectedPCit_Id) && $lastSelectedPCit_Id == $city->Cit_Id ? 'selected' : '' }}>
                                                            {{ $city->Cit_Name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('PCit_Id')
                                                <span class="error" style="color: red;">this field is required</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="PAre_Id">Area </label>
                                            <!-- <select class="form-control" id="PAre_Id" name="PAre_Id" disabled> OLD CODE -->
                                            <select class="form-control" id="PAre_Id" name="PAre_Id">
                                                <option selected value='0'>Not Exists</option>
                                                @if (isset($AreaModel) && $lastSelectedPCit_Id)
                                                    @foreach ($AreaModel as $area)
                                                        <option value='{{ $area->Are_Id }}'
                                                            {{ isset($lastSelectedPAre_Id) && $lastSelectedPAre_Id == $area->Are_Id ? 'selected' : '' }}>
                                                            {{ $area->Are_Name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span> &nbsp </span>

                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="type"> Property Type <span
                                                    style="color:red">*</span></label>
                                            <select class="form-control" id="PPTyp_Id" name="PPTyp_Id">
                                                <option selected disabled>Select Property Type</option>
                                                @foreach ($PropertyTypeModel as $propertyType)
                                                    <option value='{{ $propertyType->PTyp_Id }}'
                                                        {{ isset($lastSelectedPPTyp_Id) && $lastSelectedPPTyp_Id == $propertyType->PTyp_Id ? 'selected' : '' }}>
                                                        {{ $propertyType->PTyp_Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('PPTyp_Id')
                                                <span class="error" style="color: red;">this field is required</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="Title">Title <span
                                                    style="color:red">*</span></label>
                                            <div class="">
                                                <input type="text" id="PTitle" name="PTitle" class="form-control"
                                                    autocomplete="off" placeholder="Enter Title" aria-describedby="name2" />
                                            </div>
                                            @error('PTitle')
                                                <span class="error" style="color: red;">this field is required</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="Map">Amount <span
                                                    style="color:red">*</span></label>
                                            <div class="">
                                                <input type="number" id="PAmount" name="PAmount" class="form-control"
                                                    autocomplete="off" placeholder="Enter Amount"
                                                    aria-describedby="name2" />
                                            </div>
                                            @error('PAmount')
                                                <span class="error" style="color: red;">this field is required</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="Map">Mobile Number <span
                                                    style="color:red">*</span></label>
                                            <div class="">
                                                <input type="number" id="PNumber" name="PNumber" class="form-control"
                                                    autocomplete="off" placeholder="Enter Mobile Number"
                                                    aria-describedby="name2" />
                                            </div>
                                            @error('PNumber')
                                                <span class="error" style="color: red;">this field is required</span>
                                            @enderror
                                        </div>


                                        <!-- <div class="col-sm-6 form-group ">
                                                                                                            <label class="form-label" for="type"> Featured <span
                                                                                                                    style="color:red">*</span> </label>
                                                                                                            <select class="form-control" id="PFeatured" name="PFeatured">
                                                                                                                <option selected disabled>Select Featured</option>


                                                                                                                <option value='1'
                                                                                                                    {{ isset($lastSelectedPFeatured) && $lastSelectedPFeatured == '1' ? 'selected' : '' }}>
                                                                                                                    Yes</option>
                                                                                                                <option value='0'
                                                                                                                    {{ isset($lastSelectedPFeatured) && $lastSelectedPFeatured == '2' ? 'selected' : '' }}>
                                                                                                                    No</option>


                                                                                                            </select>
                                                                                                            <span id="PFeatured-error" class="error" style="color: red;"></span>
                                                                                                        </div> -->
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="type">Bath Room</label>
                                            <select class="form-control" id="PBathRoom" name="PBathRoom">
                                                <option selected value='0'>Not Exists</option>
                                                <option value='1'
                                                    {{ isset($lastSelectedPBathRoom) && $lastSelectedPBathRoom == '1' ? 'selected' : '' }}>
                                                    1</option>
                                                <option value='2'
                                                    {{ isset($lastSelectedPBathRoom) && $lastSelectedPBathRoom == '2' ? 'selected' : '' }}>
                                                    2</option>
                                                <option value='3'
                                                    {{ isset($lastSelectedPBathRoom) && $lastSelectedPBathRoom == '3' ? 'selected' : '' }}>
                                                    3</option>
                                                <option value='4'
                                                    {{ isset($lastSelectedPBathRoom) && $lastSelectedPBathRoom == '4' ? 'selected' : '' }}>
                                                    4</option>
                                                <option value='5'
                                                    {{ isset($lastSelectedPBathRoom) && $lastSelectedPBathRoom == '5' ? 'selected' : '' }}>
                                                    5</option>
                                            </select>
                                            <span> &nbsp </span>

                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="type">Bed Room </label>
                                            <select class="form-control" id="PBedRoom" name="PBedRoom">
                                                <option selected value='0'>Not Exists</option>
                                                <option value='1'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '1' ? 'selected' : '' }}>
                                                    1</option>
                                                <option value='2'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '2' ? 'selected' : '' }}>
                                                    2</option>
                                                <option value='3'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '3' ? 'selected' : '' }}>
                                                    3</option>
                                                <option value='4'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '4' ? 'selected' : '' }}>
                                                    4</option>
                                                <option value='5'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '5' ? 'selected' : '' }}>
                                                    5</option>
                                                <option value='6'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '6' ? 'selected' : '' }}>
                                                    6</option>
                                                <option value='7'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '7' ? 'selected' : '' }}>
                                                    7</option>
                                                <option value='8'
                                                    {{ isset($lastSelectedPBedRoom) && $lastSelectedPBedRoom == '8' ? 'selected' : '' }}>
                                                    8</option>
                                            </select>
                                            <span> &nbsp </span>
                                        </div>





                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="Tag">Tag</label>
                                            <div class="">
                                                <input type="text" id="PTag" name="PTag" class="form-control"
                                                    autocomplete="off" placeholder="Enter your Tag"
                                                    aria-describedby="name2" />
                                            </div>
                                            <span> &nbsp </span>

                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="SqureFeet">Built Up Area (Squre Feet)</label>
                                            <div class="">
                                                <input type="text" id="PSqureFeet" name="PSqureFeet"
                                                    class="form-control" autocomplete="off"
                                                    placeholder="Enter Built Up Area" aria-describedby="name2" />
                                            </div>
                                            <span> &nbsp </span>

                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label" for="Map">Map Link</label>
                                            <div class="">
                                                <input type="text" id="PMapLink" name="PMapLink"
                                                    class="form-control" autocomplete="off" placeholder="Enter Map Link"
                                                    aria-describedby="name2" />
                                            </div>
                                            <span> &nbsp </span>

                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Address">Address </label>
                                            <div class="">
                                                <textarea id="PAddress" name="PAddress" class="form-control" autocomplete="off" placeholder="Enter your Address"
                                                    aria-describedby="name2"></textarea>
                                            </div>
                                            <span> &nbsp </span>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="form-label" for="Short Desc">Short Desc </label>
                                            <textarea id="PShortDesc" name="PShortDesc" class="form-control" autocomplete="off" placeholder="Enter Short Info"
                                                aria-describedby="name2"></textarea>
                                            <span> &nbsp </span>
                                        </div>
                                        <div class="col-sm-12 form-group">

                                            <fieldset
                                                style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                                <legend style="  color: #6a6a6af5;">Property Features</legend>
                                                <div class="row g-3">
                                                    <div class="col-sm-12 form-group ">
                                                        <label class="form-label" for="type">Features </label>
                                                        <div class="row">
                                                            @foreach ($PropertyFeaturesModel as $value)
                                                                <div class="col-lg-3 col-sm-12 col-md-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="PPFea_Id[]"
                                                                            id="PPFea_Id_{{ $value->PFea_Id }}"
                                                                            value="{{ $value->PFea_Id }}">
                                                                        <label class="form-check-label"
                                                                            for="PFea_Id_{{ $value->PFea_Id }}">{{ $value->PFea_Name }}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <span id="PPFea_Id-error" class="error"
                                                            style="color: red;"></span>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>

                                        <div class="col-sm-12 form-group ">
                                            <label class="form-label" for="Full Desc">Full Desc</label>
                                            <textarea class="applyCK form-control" id="PFullDesc" name="PFullDesc" class="form-control"></textarea>
                                            <span id="PFullDesc-error" class="error" style="color: red;"></span>
                                        </div>

                                        <fieldset
                                            style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                            <legend style="  color: #6a6a6af5;">Images</legend>
                                            <div class="d-flex">
                                                <!-- Your HTML structure for file input and preview -->
                                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                                    <label class="form-label" for="Image">Property Images</label>
                                                    <br>
                                                    <!-- (upload a maximum of 10 images) -->
                                                    <div class="input-group">
                                                        <input id="photo" type="file" name="PImages[]"
                                                            style="display:none"  data-rule-maxsize="10240"
                                                            onchange="displaySelectedImages(this, 'SelectedFileNames', 'selectedImagesPreview')">
                                                        <div class="input-group-prepend">
                                                            <a class="btn btn-dark text-white"
                                                                onclick="$('input[id=photo]').click();"
                                                                style="background-color: #b6d752;">Images</a>
                                                        </div>
                                                        <input type="text" name="PImages"
                                                            style="color: white;border: white;" id="SelectedFileNames"
                                                            value="" readonly>
                                                    </div>
                                                    <div id="selectedImagesPreview"
                                                        style="display:none; margin-top: 10px;"></div>
                                                    <span id="PImages-error" class="image-error"
                                                        style="color: red;"></span>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                                    <label class="form-label" for="Image">Plans Images</label>
                                                    </br>
                                                    <!-- (upload a maximum of 10 images) -->
                                                    <div class="input-group">
                                                        <input id="photo2" type="file" name="PPlansImage[]"
                                                            style="display:none"  data-rule-maxsize="10240"
                                                            onchange="displaySelectedImages2(this, 'SelectedFileNames2', 'selectedImagesPreview2')">
                                                        <div class="input-group-prepend">
                                                            <a class="btn btn-dark text-white"
                                                                onclick="$('input[id=photo2]').click();"style="background-color: #b6d752;">Images</a>
                                                        </div>
                                                        <input type="text" name="PPlansImage"
                                                            style="color: white;border: white;" id="SelectedFileNames2"
                                                            value="" readonly>
                                                    </div>
                                                    <div id="selectedImagesPreview2"
                                                        style="display:none; margin-top: 10px;">
                                                    </div>
                                                    <span id="PPlansImage-error" class="image-error"
                                                        style="color: red;"></span>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="form-group mt-3">
                                            <div class=" d-flex col-xl-6">
                                                <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                                    <button type="submit" class="btn "
                                                        style="background-color:#7367f0;color:white"
                                                        data-loading-text="Loading..."><span
                                                            class="fa fa-save fa-fw"></span>
                                                        Save
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
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function($) {
            // Fetch cities based on selected state
            $('#PSta_Id').on('change', function() {
                var stateId = $(this).val();
                $.ajax({
                    url: "{{ route('admin.area.getCitiesByState') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        stateId: stateId
                    },
                    success: function(response) {
                        $('#PCit_Id').html(response);
                    }
                });
            });
            // Fetch areas based on selected city
            $('#PCit_Id').on('change', function() {
                var cityId = $(this).val();
                $.ajax({
                    url: "{{ route('admin.area.getAreasByCity') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        cityId: cityId
                    },
                    success: function(response) {
                        $('#PAre_Id').html(response);
                        $('#PAre_Id').prop('disabled', false); // Enable the area dropdown
                    }
                });
            });
        });
    </script>

    <script>
        function displaySelectedImages(input, fileNameElementId, previewElementId) {
            var files = input.files;
            var fileNameList = [];

            // Get file names
            for (var i = 0; i < files.length; i++) {
                fileNameList.push(files[i].name);
            }

            // Update file names input field
            document.getElementById(fileNameElementId).value = fileNameList.join(', ');

            // Display selected images preview
            var previewContainer = document.getElementById(previewElementId);
            previewContainer.innerHTML = '';

            // Create img elements for preview
            for (var i = 0; i < files.length; i++) {
                var img = document.createElement('img');
                img.src = URL.createObjectURL(files[i]);
                img.style.maxWidth = '100px'; // Adjusted max-width for better visibility
                img.style.marginRight = '5px';
                previewContainer.appendChild(img);
            }

            previewContainer.style.display = 'flex'; // Corrected display style
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

@endsection

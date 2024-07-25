@extends('backend.layouts.master')
@section('title', 'View')
@section('content')
    <div class="container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Property Listing /</span> View Property Listing
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            @if ($model->PType == 1)
                                <div class="form-group col-lg-6">
                                    <label class="form-label"> Type:</label>
                                    <p>Rent</p>
                                </div>
                            @else
                                <div class="form-group col-lg-6">
                                    <label class="form-label"> Type:</label>
                                    <p> Sale/Purchase</p>
                                </div>
                            @endif

                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label class="form-label">State:</label>
                                <p>
                                    @if ($model->state)
                                        {{ $model->state->Sta_Name }}
                                    @else
                                        Not Specified
                                    @endif
                                </p>
                            </div>

                            <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                <label class="form-label">City Name:</label>
                                <p>{{ $model->city->Cit_Name }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Area:</label>
                                <p>{{ $model->area ? $model->area->Are_Name : 'Not Exists' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Property Type:</label>
                                <p>{{ $model->propertyType->PTyp_Name }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Bath Room:</label>
                                <p>{{ $model->PBathRoom }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Bed Room:</label>
                                <p>{{ $model->PBedRoom }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Title:</label>
                                <p>{{ $model->PTitle }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Amount:</label>
                                <p>{{ $model->PAmount }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Tag:</label>
                                <p>{{ $model->PTag }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Built Up Area (Square Feet):</label>
                                <p>{{ $model->PSqureFeet }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Map Link:</label>
                                <p>{{ $model->PMapLink }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Address:</label>
                                <p>{{ $model->PAddress }}</p>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Short Desc:</label>
                                <p>{{ $model->PShortDesc }}</p>
                            </div>
                            <div class="col-sm-12">
                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Property Features</legend>
                                    @foreach ($PropertyFeaturesModel as $value)
                                        <div class="form-check">
                                            @php
                                                $featuresArray = json_decode($model->PPFea_Id, true);
                                                if (!is_array($featuresArray)) {
                                                    $featuresArray = [];
                                                }
                                            @endphp
                                            <input class="form-check-input" type="checkbox" name="PPFea_Id[]"
                                                id="PPFea_Id_{{ $value->PFea_Id }}" value="{{ $value->PFea_Id }}"
                                                {{ in_array($value->PFea_Id, $featuresArray) ? 'checked' : '' }} disabled>
                                            <label class="form-check-label"
                                                for="PFea_Id_{{ $value->PFea_Id }}">{{ $value->PFea_Name }}</label>
                                        </div>
                                    @endforeach
                                </fieldset>
                            </div>
                            <div class="col-sm-12">
                                <fieldset style="border: 1px solid #ddd; padding: 10px; margin: 10px; border-radius: 5px;">
                                    <legend style="color: #6a6a6af5;">Images</legend>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label">Property Images</label>
                                            <br>
                                            <div id="selectedImagesPreview">
                                                     <img src="{{ imageOrDefault('uploads/' . $model->PImages, '/assets/images/default.jpg') }}" alt="Selected Image"
                                                        style="width: 100px; height: 100px; margin-right: 5px;">
                                             </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                            <label class="form-label">Plans Images</label>
                                            <br>
                                            <div id="selectedImagesPreview2">
                                              

                                                <img src="{{ imageOrDefault('uploads/' . $model->PPlansImage, '/assets/images/default.jpg') }}" alt="Selected Image"
                                                style="width: 100px; height: 100px; margin-right: 5px;">


                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Full Desc:</label>
                                <p>{!! $model->PFullDesc !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@extends('frontend.layouts.master')
@section('title', 'Properties')
@section('content')
    <style>
        .no-results-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .no-results-text {
            font-size: 20px;
            color: #555;
            margin-bottom: 10px;
        }

        .no-results-image img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 767px) {
            .img-responsive {
                height: 210px !important
            }
        }

        label {
            color: black;
        }

        ::placeholder {
            color: gray;
            opacity: 1;
        }
    </style>
    <div class="page-title page-main-section">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Listing</h1>
                <h5>40 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="/">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a
                    href="{{ URL::to('/property') }}">Listing Properties</a>
            </div>
        </div>
    </div>
    <section class="property-query-area property-page-bg padding" style="background-color:#ff000008">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bottom40">
                    <h2 class="text-uppercase">Advanced <span class="color_red">Search</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
            <form class="findus" id="searchForm">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Keyword</label>
                            <input class="keyword-input" placeholder="Any" type="text" name="keyword" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Location</label>
                            <select class="selectpicker" data-live-search="true" name="location" id="citySelect">
                                <option selected disabled>Select City</option>
                                @foreach ($CityModel as $value)
                                <option value='{{ encodeId($value->Cit_Id) }}'>{{ $value->Cit_Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Area</label>
                            <select class="selectpicker" data-live-search="true" name="area" id="areaSelect">
                                <option selected disabled>Select Area</option>
                                <!-- Areas will be dynamically loaded here -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Property Type</label>
                            <select class="selectpicker" data-live-search="true" name="property_type">
                                <option selected disabled>Select Property Type</option>
                                @foreach ($PropertyTypeModel as $value)
                                <option value='{{ encodeId($value->PTyp_Id) }}'>{{ $value->PTyp_Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row search-2">
                    <div class="col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="single-query form-group">
                                    <label>Bed Room</label>
                                    <select class="selectpicker" data-live-search="true" name="bedroom">
                                        <option selected disabled>Bed Room</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="single-query form-group">
                                    <label>Bath Room</label>
                                    <select class="selectpicker" data-live-search="true" name="bathroom">
                                        <option selected disabled>Bath Room</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="single-query form-group">
                                    <label>Squre Fit Min</label>
                                    <input class="keyword-input" placeholder="Any" type="text" name="square_fit_min"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="single-query form-group">
                                    <label>Squre Fit Max</label>
                                    <input class="keyword-input" placeholder="Any" type="text" name="square_fit_max"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 text-right">
                        <div class="query-submit-button top10">
                            <input class="btn_fill" value="Search" type="submit" id="searchButton">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div style="border-bottom:inset;"></div>
    <div class="line_1"></div>
    <div class="line_2"></div>
    <div class="line_3"></div>
    <section id="listings" class="padding">
        <div class="container">
            <div class="row bottom40">
                <div class="col-xs-12">
                    <h2 class="uppercase">PROPERTY <span class="color_red">LISTINGS</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                    @if ($PropertyModel->isEmpty())
                    @else
                        <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
                    @endif
                </div>
            </div>
            <div class="row bottom30">
                @if ($PropertyModel->isEmpty())
                    <div class="col-md-12">
                        <div class="no-results-container">
                            <h4 class="no-results-text">No results found, please try again.</h4>
                            <div class="no-results-image">
                                <img src="https://i.pinimg.com/originals/49/e5/8d/49e58d5922019b8ec4642a2e2b9291c2.png"
                                    alt="{{$WebInfoModel->WebInf_Name}}"style="height: 25%; width: 25%;">
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($PropertyModel as $value)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="property_item heading_space">
                                <div class="image">
                                    @php
                                        $randomImage = $value->getRandomImage();
                                    @endphp
                                    <img src="{{ $randomImage ? env('Web_CommonURl') . $randomImage : asset('assets/frontend/images/dummy-img/NoImage2.jpg') }}"
                                        alt="{{$WebInfoModel->WebInf_Name}}" class="img-responsive" style="height: 247px;">
                                    <div class="overlay">
                                        <div class="centered"><a class="link_arrow white_border"
                                                href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">View
                                                Detail</a>
                                        </div>
                                    </div>
                                    @if ($value->PTag)
                                        <div class="feature">
                                            <span class="tag">
                                                {{ $value->PTag }}
                                            </span>
                                        </div>
                                    @endif
                                    <div class="price"><span class="tag">{{ $value->propertyType->PTyp_Name }}</span>
                                    
                                    </div>
                                    <div class="property_meta">
                                        @if (!empty($value->PSqureFeet))
                                            <span><i class="fa fa-object-group"></i> {{ $value->PSqureFeet }}
                                            </span>
                                        @endif
                                        
                                        @if (!empty($value->PBedRoom))
                                            <span><i class="fa fa-bed"></i>{{ $value->PBedRoom }}</span>
                                            <span><i class="fa fa-bath"></i>{{ $value->PBathRoom }}</span>
                                        @endif
                                        <span><i class=""></i>&nbsp;</span>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text">
                                        <h3><a
                                                href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">{{ $value->PTitle }}</a>
                                        </h3>
                                        <span class="bottom10">
                                            @if ($value->area && $value->area->city)
                                                <p>{{ $value->area->Are_Name }},{{ $value->area->city->Cit_Name }}</p>
                                            @else
                                                @foreach ($value->cities as $city)
                                                    <p>{{ $city->Cit_Name }}({{ $city->state->Sta_Name }})</p>
                                                @endforeach
                                            @endif
                                        </span>
                                        @if ($value->PAmount == 0)
                                            Call for price
                                        @else
                                            ₹ {{ $value->PAmount }}/-
                                        @endif
                                    </div>
                                    <div class="favroute clearfix">
                                        <p class="pull-left"><i class="icon-calendar2"></i>
                                            {{ \Carbon\Carbon::parse($value->PCreatedDate)->diffForHumans() }}
                                        </p>
                                        <ul class="pull-right">
                                            <li><a
                                                    style="cursor:pointer;background-color:#93bd1a; color:#1f1f1f;font-size: smaller; width: 63px;">KPB{{ $value->PPropertycode }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row top40">
                <div class="col-md-12">
                    <!-- {!! $PropertyModel->links('vendor.pagination.bootstrap-4') !!} -->
                    {!! $PropertyModel->appends(request()->query())->links('vendor.pagination.bootstrap-4') !!}

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var urlParams = new URLSearchParams(window.location.search);
            var queryString = window.location.search;

            if (queryString.startsWith('?') && queryString.length > 1) {
                var section = document.getElementById('listings');
                if (section) {
                    section.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/hashids@2.3.0/dist/hashids.min.js"></script>

    <script>
        $(document).ready(function() {
            var hashids = new Hashids('your_salt_here', 30); // Set your own salt and length

            $('#citySelect').change(function() {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: "{{ route('getAreasByCity') }}",
                        type: "GET",
                        data: {
                            CityId: cityId
                        }, // Use 'Cit_Id' instead of 'Cit_id'
                        success: function(data) {
                        $('#areaSelect').empty();
                        $('#areaSelect').append('<option selected disabled>Select Area</option>');
                        $.each(data, function(key, value) {
                            var encodedId = hashids.encode(value.Are_Id);
                            $('#areaSelect').append('<option value="' + encodedId + '">' + value.Are_Name + '</option>');
                        });
                        $('#areaSelect').selectpicker('refresh');
                    },
                        error: function(xhr, status, error) {
                            console.error(error); // Log any errors to the console for debugging
                        }
                    });
                } else {
                    $('#areaSelect').empty();
                    $('#areaSelect').append('<option selected disabled>Select Area</option>');
                    $('#areaSelect').selectpicker('refresh');
                }
            });
        });
    </script>

@endsection

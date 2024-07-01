@extends('frontend.layouts.master')
@section('title', 'Home')
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

            .defaultimg {
                /* height: 30% !important; */
            }

            .border_heading {
                /* margin-top: -100% !important; */
            }

            .homee {
                /* margin-top: -130% !important; */
            }
        }

        ::placeholder {
            color: white;
            opacity: 1;
        }
    </style>
    <?php
    use Carbon\Carbon;
    ?>
    @if (!$SliderModel->isEmpty())
        <section class="rev_slider_wrapper">
            <div id="rev_full" class="rev_slider" data-version="5.0">
                <ul>
                    @foreach ($SliderModel as $model)
                        <li data-transition="fade">
                            <img src="{{ env('Web_CommonURl') }}{{ $model->Pag_Image ?? 'N/A' }}" alt=""
                                data-bgposition="center center" data-bgfit="cover" class="rev-slidebg">
                            <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                                data-hoffset="['15','15','0','0']" data-y="['240','200','140','140']"
                                data-voffset="['0','0','0','0']" data-responsive_offset="on"
                                data-visibility="['on','on','on','on']" data-transform_idle="o:1;"
                                data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="800">
                                <h2 class="border_heading p-white"> {{ $model->Pag_ShortDesc }} </h2>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif
    <div id="home_icon">
        <div class="container homee">
            <div class="row">

                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="{{ route('property', ['statusType' => encodeId('1')]) }}" class="home_feature">
                        <i class="icon-key3"></i>
                        <h4>For Rent</h4>
                        <p>Latest for rent</p>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="{{ route('property', ['statusType' => encodeId('2')]) }}" class="home_feature">
                        <i class="icon-icons215"></i>
                        <h4>For Sale</h4>
                        <p>Latest for sale</p>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="#" class="home_feature">
                        <i class="icon-icons74"></i>
                        <h4>Beachside</h4>
                        <p>Near the beach</p>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="#" class="home_feature">
                        <i class="icon-stats-dots"></i>
                        <h4>Reduced</h4>
                        <p>Price reduced</p>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="#" class="home_feature">
                        <i class="icon-icons185"></i>
                        <h4>Let Us Find</h4>
                        <p>Ask an agent</p>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="#" class="home_feature">
                        <i class=" icon-clipboard"></i>
                        <h4>Sell Property</h4>
                        <p>Get in touch</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section id="wellcome" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8 text-center">
                    <h2 class="text-uppercase">{!! $HomeMenuModel->Men_ShortDesc ?? 'N/A' !!}</span></h2>
                    <div class="line_1-1"></div>
                    <div class="line_2-2"></div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-12 text-center" style="margin-top: 2%;">
                    <p> {!! $HomeMenuModel->Men_FullDesc ?? 'N/A' !!}</p>
                    <div class="line_1-1"></div>
                    <div class="line_2-2"></div>
                </div>
                <div class="col-sm-1 col-md-2"></div>
            </div>
            <div class="row" style="margin-top: 3%;">
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="welcome top40">
                        <img src="{{ asset('assets/frontend/images/wellcome_1.png') }}" alt="image">
                        <h4> 24/7 Emergency Available</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="welcome top40">
                        <img src="{{ asset('assets/frontend/images/wellcome_2.png') }}" alt="image">
                        <h4>Expert and Professional</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="welcome top40">
                        <img src="{{ asset('assets/frontend/images/wellcome_3.png') }}" alt="image">
                        <h4>Satisfaction Guarantee</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="welcome top40">
                        <img src="{{ asset('assets/frontend/images/wellcome_4.png') }}" alt="image">
                        <h4>Free Inspection</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #/WELCOME -->
    <!-- ESTIMATE -->
    <section id="estimate" class="padding parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estimate_image">
                        <img src="{{ asset('assets/frontend/images/estimate.png') }}" alt="image" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="estimate_form">
                        <h2 class="text-uppercase">Search your<span class="color_red"> Dream</span></h2>
                        <div class="line_1"></div>
                        <div class="line_2"></div>
                        <div class="line_3"></div>
                        <div class="property-query-area top40">
                            <form class="findus">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <input class="keyword-input" placeholder="Keyword (e.g. 'office')"
                                                type="text" name="keyword" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <select class="selectpicker" data-live-search="true" name="location"
                                                id="citySelect">
                                                <option selected disabled>Select City</option>
                                                @foreach ($CityModel as $value)
                                                    <option value='{{ encodeId($value->Cit_Id) }}'>{{ $value->Cit_Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <select class="selectpicker" data-live-search="true" name="area"
                                                id="areaSelect">
                                                <option selected disabled>Select Area</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <select class="selectpicker" data-live-search="true" name="property_type">
                                                <option selected disabled>Select Property Type</option>
                                                @foreach ($PropertyTypeModel as $value)
                                                    <option value='{{ encodeId($value->PTyp_Id) }}'>
                                                        {{ $value->PTyp_Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row search-2">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="single-query">
                                                    <select class="selectpicker" data-live-search="true" name="bedroom">
                                                        <option selected disabled>Min Beds</option>
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
                                                <div class="single-query">
                                                    <select class="selectpicker" data-live-search="true" name="bathroom">
                                                        <option selected disabled>Min Baths</option>
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
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="single-query">
                                                    <input class="keyword-input" name="square_fit_min"
                                                        placeholder="Min Area (sq ft)" type="text" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="single-query">
                                                    <input class="keyword-input" name="square_fit_max"
                                                        placeholder="Max Area (sq ft)" type="text" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="query-submit-button">
                                            <button type="submit" class="btn_fill">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="agent-p-2" class="property-details padding">
        <div class="container ">
            <div class="row">
                <div class="col-xs-12 bottom40">
                    <h2 class="text-uppercase">Our <span class="color_red">PROPERTY</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
            <span>
                @if ($PropertyModel->isEmpty())
                    <div class="col-md-12">
                        <div class="no-results-container">
                            <h4 class="no-results-text">No results found, please try again.</h4>
                            <div class="no-results-image">
                                <img src="https://i.pinimg.com/originals/49/e5/8d/49e58d5922019b8ec4642a2e2b9291c2.png"
                                    alt="No results found image"style="height: 25%; width: 25%;">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 ">
                        <div class="row">
                            <div id="property-2-slider" class="owl-carousel" style="z-index: 1;">
                                @foreach ($PropertyModel as $value)
                                    <div class="item">
                                        <div class="property_item bottom40">
                                            <div class="image ">
                                                @php
                                                    $randomImage = $value->getRandomImage();
                                                @endphp
                                                <img src="{{ $randomImage ? env('Web_CommonURl') . $randomImage : asset('assets/frontend/images/dummy-img/NoImage2.jpg') }}"
                                                    alt="listin" class="img-responsive" style="height: 247px;">
                                                <div class="property_meta">
                                                    @if (!empty($value->PSqureFeet) || !empty($value->PBedRoom))
                                                        @if (!empty($value->PSqureFeet))
                                                            <span><i class="fa fa-object-group"></i>
                                                                {{ $value->PSqureFeet }}
                                                            </span>
                                                        @endif
                                                        @if (!empty($value->PBedRoom))
                                                            <span><i class="fa fa-bed"></i> {{ $value->PBedRoom }}</span>
                                                            <span><i class="fa fa-bath"></i> {{ $value->PBathRoom }}
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span><i class=""></i>&nbsp;</span>
                                                    @endif
                                                </div>
                                                @if ($value->PFeatured == 1)
                                                    <div class="feature ">
                                                        <span class="tag" style="z-index:2;">
                                                            Featured
                                                        </span>
                                                    </div>
                                                @endif
                                                @if ($value->propertyType)
                                                    <div class="price"><span
                                                            class="tag">{{ $value->propertyType->PTyp_Name }}</span>
                                                    </div>
                                                @else
                                                    <div class="price"><span class="tag">No Type Available</span>
                                                    </div>
                                                @endif
                                                <div class="overlay">
                                                    <div class="centered"><a class="link_arrow white_border"
                                                            href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">View
                                                            Detail</a></div>
                                                </div>
                                            </div>
                                            <div class="proerty_content">
                                                <div class="proerty_text">
                                                    <h3><a
                                                            href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">{{ $value->PTitle }}
                                                        </a></h3>
                                                    <span class="bottom10 ">
                                                        @if ($value->area && $value->area->city)
                                                            <p>{{ $value->area->Are_Name }},{{ $value->area->city->Cit_Name }}
                                                            </p>
                                                        @else
                                                            @foreach ($value->cities as $city)
                                                                <p>{{ $city->Cit_Name }}({{ $city->state->Sta_Name }})</p>
                                                            @endforeach
                                                        @endif
                                                    </span>
                                                    <p><strong>
                                                            @if ($value->PAmount == 0)
                                                                Call for price
                                                            @else
                                                                ₹ {{ $value->PAmount }}/-
                                                            @endif
                                                        </strong></p>
                                                </div>
                                                <div class="favroute clearfix">
                                                    <p class="pull-left">
                                                        <i class="icon-calendar2"></i>
                                                        {{ \Carbon\Carbon::parse($value->PCreatedDate)->diffForHumans() }}
                                                    </p>
                                                    <ul class="pull-right">
                                                        <li><a
                                                                style="cursor:pointer;background-color:red;color:white;font-size: smaller; width: 63px;">KPB{{ $value->PPropertycode }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </span>
        </div>
    </section>
    <section id="image-text" class="padding-bottom-top-120 parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="image-text-heading top30 bottom30">
                        <h2 class="bottom40">We Don't Just Find<br><span>Great Deals</span> We Create Them</h2>
                        <a href="{{ URL::to('/property') }}" class="link_arrow white_border top10">View All Listing</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (!$ClientModel->isEmpty())
        <section id="our-partner" class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase">our <span class="color_red">partners</span></h2>
                        <div class="line_1"></div>
                        <div class="line_2"></div>
                        <div class="line_3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="partner_slider_2" class="owl-carousel">
                                @foreach ($ClientModel as $value)
                                    <div class="item">
                                        <img src="{{ env('Web_CommonURl') }}{{ $value->Pag_Image ?? 'N/A' }}"
                                            alt="Our Partner">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var queryString = window.location.search;
            // Check if the URL contains a query string starting with '?'
            if (queryString.startsWith('?') && queryString.length > 1) {
                var section = document.getElementById('agent-p-2');
                if (section) {
                    section.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            $('#areaSelect').append(
                                '<option selected disabled>Select Area</option>');
                            $.each(data, function(key, value) {
                                var encodedId = hashids.encode(value.Are_Id);
                                $('#areaSelect').append('<option value="' + encodedId +
                                    '">' + value.Are_Name + '</option>');
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

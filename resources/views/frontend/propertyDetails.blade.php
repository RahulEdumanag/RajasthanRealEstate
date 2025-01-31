@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <style>
        @media (max-width: 767px) {
            .img-responsive {
                height: 210px !important
            }

            .property-tab .nav-tabs {
                display: grid;
                width: auto;
            }
        }

        ::placeholder {
            color: black;
            opacity: 1;
        }
    </style>
    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Property</h1>
                <h5>40 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="/">home</a>
                <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                <a href="{{ URL::to('/property') }}">Property </a>
            </div>
        </div>
    </div>
    <!--===== #/PAGE TITLE =====-->
    <!--===== PROPERTY - DETAILS - 2 =====-->
    <section class="property-details padding" id="scrollerFilter">

        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <h2 class="text-uppercase">{{ $propertyDetails->PTitle }}</h2>
                    <p class="">{{ $propertyDetails->PShortDesc }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 property-details-2">
                    <div id="agent-2-slider" class="owl-carousel">
                        @foreach (explode(',', $propertyDetails->PImages) as $image)
                            <div class="item">
                                <div class="property_item heading_space">
                                    <div class="image">
                                        <a href="#.">
                                            @if ($image)
                                                <img src="{{ env('Web_CommonURl') . trim($image) }}" alt="{{$WebInfoModel->WebInf_Name}}"
                                                    class="img-responsive" style="max-height: 350px;">
                                            @else
                                                <img src="{{ asset('assets/frontend/images/dummy-img/NoImageBanner.jpg') }}"
                                                    alt="{{$WebInfoModel->WebInf_Name}}" class="img-responsive" style="max-height: 350px;">
                                            @endif
                                        </a>
                                        @if ($propertyDetails->PTag)
                                            <div class="feature">
                                                <span class="tag">
                                                    {{ $propertyDetails->PTag }}
                                                </span>
                                            </div>
                                        @endif
                                        <div class="price"><span
                                                class="tag">{{ $propertyDetails->propertyType->PTyp_Name }}</span></div>
                                        <div class="property_meta">
                                            <h4>
                                                @if ($propertyDetails->PAmount == 0)
                                                    Call for price
                                                @else
                                                    ₹ {{ $propertyDetails->PAmount }}/-
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="property-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#description" aria-controls="description"
                                    role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#summary" aria-controls="summary" role="tab"
                                    data-toggle="tab">Summary</a></li>
                            <li role="presentation"><a href="#features" aria-controls="features" role="tab"
                                    data-toggle="tab">Features</a></li>
                            <li role="presentation"><a href="#plan" aria-controls="plan" role="tab"
                                    data-toggle="tab">Plans</a></li>
                            <li role="presentation"><a href="#tab_contact" aria-controls="tab_contact" role="tab"
                                    data-toggle="tab">Contact</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <h3 class="text-uppercase  bottom20 top10">Property <span
                                        class="color_red">Description</span></h3>
                                {!! $propertyDetails->PFullDesc !!}

                                @if (isset($propertyDetails->PBedRoom) && $propertyDetails->PSqureFeet != '')
                                    <div class="property_meta bottom40"style="margin-top: 40px;">
                                        @if (!empty($propertyDetails->PSqureFeet))
                                            <span><i class="fa fa-object-group"></i> {{ $propertyDetails->PSqureFeet }}
                                            </span>
                                        @endif
                                        @if (!empty($value->PBedRoom))
                                            <span><i class="fa fa-bed"></i>{{ $propertyDetails->PBedRoom }} Bed Rooms</span>
                                        @endif

                                        @if (!empty($value->PBathRoom))
                                            <span><i class="fa fa-bed"></i>{{ $propertyDetails->PBathRoom }} Bath
                                                Rooms</span>
                                        @endif

                                    </div>
                                @endif
                                <!-- <a class="link_arrow" href="#.">Read More</a> -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="summary">
                                <div class="row property-d-table">
                                    <div class="col-md-12">
                                        <h3 class="text-uppercase  bottom30 top10">Quick <span
                                                class="color_red">Summary</span></h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td><b>Property Id</b></td>
                                                    <td class="text-right">KPB{{ $propertyDetails->PPropertycode }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Price</b></td>
                                                    <td class="text-right">

                                                        @if ($propertyDetails->PAmount == 0)
                                                            Call for price
                                                        @else
                                                            ₹ {{ $propertyDetails->PAmount }}/-
                                                        @endif
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td><b>Property Size</b></td>
                                                    <td class="text-right">{{ $propertyDetails->PSqureFeet ?? '-' }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Bed Rooms</b></td>
                                                    <!-- <td class="text-right">{{ $propertyDetails->PBedRoom ?? '-' }}</td> -->
                                                    <td class="text-right">
                                                        {{ ($propertyDetails->PBedRoom ?? 0) == 0 ? '-' : $propertyDetails->PBedRoom }}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><b>Bath Rooms</b></td>
                                                    <!-- <td class="text-right">{{ $propertyDetails->PBathRoom ?? '-' }}</td> -->
                                                    <td class="text-right">
                                                        {{ ($propertyDetails->PBathRoom ?? 0) == 0 ? '-' : $propertyDetails->PBathRoom }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td><b>Property Type</b></td>
                                                    <td class="text-right">{{ $propertyDetails->propertyType->PTyp_Name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>State</b></td>
                                                    <td class="text-right">

                                                        @foreach ($propertyDetails->cities as $city)
                                                            <p> {{ $city->state->Sta_Name }}
                                                            </p>
                                                        @endforeach

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>City</b></td>
                                                    <td class="text-right">
                                                        @if (isset($propertyDetails->city) && isset($propertyDetails->area))
                                                            <p>
                                                                {{ $propertyDetails->city->Cit_Name }},
                                                                {{ $propertyDetails->area->Are_Name }}
                                                            </p>
                                                        @else
                                                            <p>
                                                                {{ $propertyDetails->city->Cit_Name }}
                                                            </p>
                                                        @endif



                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Property For</b></td>
                                                    <td class="text-right">

                                                        @if ($propertyDetails->PTag)
                                                            <div class="feature">
                                                                {{ $propertyDetails->PTag }}
                                                            </div>
                                                        @else
                                                            <div class="feature">
                                                                -
                                                            </div>
                                                        @endif


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Available From</b></td>
                                                    <td class="text-right">
                                                        {{ \Carbon\Carbon::parse($propertyDetails->PCreatedDate)->diffForHumans() }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="features">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-uppercase  bottom30 top10">Property <span
                                                class="color_red">Features</span></h3>
                                    </div>
                                    @php
                                        $featureIds = json_decode($propertyDetails->PPFea_Id, true);
                                    @endphp
                                    @if (is_array($featureIds) && !empty($featureIds))
                                        @foreach ($featureIds as $featureId)
                                            @php
                                                $feature = \App\Models\PropertyFeatures::find($featureId);
                                            @endphp
                                            @if ($feature)
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <ul class="pro-list">
                                                        <li>{{ $feature->PFea_Name }}</li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <p style="text-align:center"> No feature available</p>
                                    @endif

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane bg_light" id="plan">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-uppercase bottom20 top10">Our <span class="color_red">Plans</span>
                                        </h3>
                                    </div>
                                    @php
                                        $planImages = explode(',', $propertyDetails->PPlansImage);
                                    @endphp
                                    @foreach ($planImages as $image)
                                        <div class="col-md-4 col-sm-4 col-xs-12 top10">
                                            <div class="image">
                                                @if ($image)
                                                    <img src="{{ env('Web_CommonURl') . trim($image) }}" alt="{{$WebInfoModel->WebInf_Name}}"
                                                        class="img-responsive" style="max-height: 350px;">
                                                @else
                                                    <img src="{{ asset('assets/frontend/images/dummy-img/NoImage2.jpg') }}"
                                                        alt="{{$WebInfoModel->WebInf_Name}}" class="img-responsive" style="height: 261px;">
                                                @endif
                                                <div class="overlay border_radius">
                                                    @if ($image)
                                                        <a class="fancybox centered"
                                                            href="{{ env('Web_CommonURl') . trim($image) }}"
                                                            data-fancybox-group="gallery">
                                                            <i class="icon-focus"></i>
                                                        </a>
                                                    @else
                                                        <a class="fancybox centered"
                                                            href="{{ asset('assets/frontend/images/dummy-img/NoImage2.jpg') }}"
                                                            data-fancybox-group="gallery">
                                                            <i class="icon-focus"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab_contact">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-uppercase  bottom30 top10">Contact <span
                                                class="color_red">Agent</span></h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="agent-p-img"> <img
                                                src="{{ asset('assets/frontend/images/agent-p-1.jpg') }}"
                                                class="img-responsive" alt="{{$WebInfoModel->WebInf_Name}}" /> </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="agent-p-contact">
                                            <div class="our-agent-box">
                                                <h3 class="bottom10">{{ $WebInfoModel->WebInf_Name ?? 'N/A' }}</h3>
                                                <p class="bottom30">{{ $WebInfoModel->WebInf_Tagline ?? 'N/A' }}</p>
                                            </div>
                                            <div class="agetn-contact">
                                                <h6>Phone:</h6>
                                                <h6>Email Adress:</h6>
                                            </div>
                                            <div class="agetn-contact-2">
                                                <p>{{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}</p>
                                                <p>{{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <ul class="socials">
                                            @foreach ($SocialLinkModel as $model)
                                                <li>
                                                    <a href="{{ $model->Pag_URL }}" target="_blank">
                                                        <i class="{!! $model->Pag_Image !!}"></i>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row top30">
                                    <div class="col-xs-12">
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
                                        <form method="post" action="{{ route('contact.Cstore') }}" class="findus">
                                            @csrf
                                            <input type="hidden" name="s_PropertyType"
                                                value="{{ $propertyDetails->propertyType->PTyp_Id }}">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="single-query">
                                                        <input type="text" autocomplete="off" placeholder="Your Name"
                                                            id="i_Name" name='i_Name' class="keyword-input">
                                                    </div>
                                                    <div class="single-query">
                                                        <input type="number" autocomplete="off"
                                                            placeholder="Whatsapp Number" name='i_Number2' id="i_Number2"
                                                            class="keyword-input">
                                                    </div>

                                                    <div class="single-query">
                                                        <input type="number" autocomplete="off"
                                                            placeholder="Phone Number" name='i_Number' id="i_Number"
                                                            class="keyword-input">
                                                    </div>

                                                    <div class="single-query">
                                                        <input type="email" autocomplete="off"
                                                            placeholder="Email Adress" id="i_Email" name='i_Email'
                                                            class="keyword-input">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 single-query">
                                                    <label for="i_Month" style="color: black;">
                                                        Select Number of Months:</label>
                                                    <select id="i_Month" name="i_Month" class="form-control"style="border: 1\px solid black;">
                                                        <option value="0">Select</option>
                                                        <option value="1">1 Month</option>
                                                        <option value="2">2 Month</option>
                                                        <option value="3">3 Month</option>
                                                        <option value="4">4 Month</option>
                                                        <option value="5">5 Month</option>
                                                        <option value="6">6 Month</option>
                                                    </select>
                                                    <div class="form-group  single-query" style="border: 1\px solid black;">
                                                        <textarea name='ta_Desc' id="ta_Desc" autocomplete="off" placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="submit" value="Submit Now" class="btn_fill">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="social-networks top40">
                                            <div class="social-icons-2">
                                                <span class="share-it">Share: </span>
                                                <span><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}"
                                                        target="_blank">Facebook</a></span>
                                                <span><a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}"
                                                        target="_blank">Twitter</a></span>
                                                <span><a href="https://plus.google.com/share?url={{ request()->fullUrl() }}"
                                                        target="_blank">Google+</a></span>
                                                <span><a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}"
                                                        target="_blank">WhatsApp</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    @if (!empty($propertyDetails->PMapLink))
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padding_top bottom40">
                    <h2 class="text-uppercase">Property <span class="color_red">Map</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="{{ $propertyDetails->PMapLink }}" width="100%" height="520px" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    @endif

    <section id="agent-p-2" class="property-details padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 bottom40">
                    <h2 class="text-uppercase">Similar <span class="color_red">Properties </span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
            <div class="row">
                <div id="property-1-slider" class="owl-carousel">
                    @foreach ($PropertyModel as $value)
                        <div class="item">
                            <div class="property_item heading_space">
                                <div class="image">
                                    @php
                                        $randomImage = $value->getRandomImage();
                                    @endphp
                                    <img src="{{ $randomImage ? env('Web_CommonURl') . $randomImage : asset('assets/frontend/images/dummy-img/NoImage2.jpg') }}"
                                        alt="{{$WebInfoModel->WebInf_Name}}" class="img-responsive" style="height: 350px;">
                                    <div class="overlay">
                                        <div class="centered"><a class="link_arrow white_border"
                                                href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">View
                                                Detail</a></div>
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
                                        @if (!empty($value->PSqureFeet) || !empty($value->PBedRoom))
                                            @if (!empty($value->PSqureFeet))
                                                <span><i class="fa fa-object-group"></i>
                                                    {{ $value->PSqureFeet }}
                                                </span>
                                            @endif

                                            @if (!empty($value->PBedRoom))
                                                <span><i class="fa fa-bed"></i> {{ $value->PBedRoom }}</span>
                                                <span><i class="fa fa-bath"></i> {{ $value->PBathRoom }}
                                                    Bathroom
                                                </span>
                                            @endif
                                        @else
                                            <span>-</span>
                                        @endif
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
                                                    <p>{{ $city->Cit_Name }}({{ $city->state->Sta_Name }})
                                                    </p>
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
                </div>
            </div>
        </div>
    </section>
    <!--PROPERTY DETAILS-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var section = document.getElementById('scrollerFilter');
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>

@endsection

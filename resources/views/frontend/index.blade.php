@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <?php
    use Carbon\Carbon;
    ?>
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
    <div id="home_icon">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="#" class="home_feature">
                        <i class="icon-icons215"></i>
                        <h4>For Sale</h4>
                        <p>Latest for sale</p>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12 text-center">
                    <a href="#" class="home_feature">
                        <i class="icon-key3"></i>
                        <h4>For Rent</h4>
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
                <div class="col-xs-12 col-sm-10 col-md-12 text-center">
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
                        <!-- <p>Mauris accumsan eros eget libero posuere vulputate. Etiam elit elit, elementum sed varius at,</p> -->
                        <div class="property-query-area top40">
                            <form class="findus">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <input class="keyword-input" placeholder="Keyword (e.g. 'office')"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <select class="selectpicker" data-live-search="true">
                                                <option class="active">Loction</option>
                                                <option>Loction - 1</option>
                                                <option>Loction - 2</option>
                                                <option>Loction - 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <select class="selectpicker" data-live-search="true">
                                                <option class="active">Property Type</option>
                                                <option>Property Type - 1</option>
                                                <option>Property Type - 2</option>
                                                <option>Property Type - 3</option>
                                                <option>Property Type - 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-query">
                                            <select class="selectpicker" data-live-search="true">
                                                <option class="active">Property Status</option>
                                                <option>Property Status - 1</option>
                                                <option>Property Status - 2</option>
                                                <option>Property Status - 3</option>
                                                <option>Property Status - 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row search-2">
                                <form class="findus">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="single-query">
                                                    <select class="selectpicker" data-live-search="true">
                                                        <option class="active">Min Beds</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="single-query">
                                                    <select class="selectpicker" data-live-search="true">
                                                        <option class="active">Min Baths</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Min Area (sq ft)"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Max Area (sq ft)"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="query-submit-button">
                                            <button type="submit" class="btn_fill">Search</button>
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
    <section id="agent-p-2" class="property-details padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 bottom40">
                    <h2 class="text-uppercase">Our <span class="color_red">PROPERTY</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div id="property-2-slider" class="owl-carousel">
                        @foreach ($PropertyModel as $value)
                            <div class="item">
                                <div class="property_item bottom40">
                                    <div class="image">
                                        @php
                                            $randomImage = $value->getRandomImage();
                                        @endphp
                                        <img src="{{ asset('uploads/' . $randomImage) }}" alt="listing"
                                            class="img-responsive">
                                        <div class="property_meta">
                                            <span><i class="fa fa-object-group"></i>{{ $value->PSqureFeet }} </span>
                                            <span><i class="fa fa-bed"></i>{{ $value->PBedRoom }}</span>
                                            <span><i class="fa fa-bath"></i>{{ $value->PBathRoom }} Bathroom</span>
                                        </div>
                                        @if ($value->PFeatured == 1)
                                            <div class="feature">
                                                <span class="tag" style="z-index:2;">
                                                    Featured
                                                </span>
                                            </div>
                                        @endif
                                        @if ($value->propertyType)
                                            <div class="price"><span
                                                    class="tag">{{ $value->propertyType->PTyp_Name }}</span></div>
                                        @else
                                            <div class="price"><span class="tag">No Type Available</span></div>
                                        @endif
                                        <div class="overlay">
                                            <div class="centered"><a class="link_arrow white_border"
                                                    href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">View
                                                    Detail</a></div>
                                        </div>
                                    </div>
                                    <div class="proerty_content">
                                        <div class="proerty_text">
                                            <h3><a href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">{{ $value->PTitle }}
                                                </a></h3>
                                            <span class="bottom10">
                                                @foreach ($value->cities as $city)
                                                    <p>{{ $city->Cit_Name }}({{ $city->state->Sta_Name }})</p>
                                                @endforeach
                                            </span>
                                            <p><strong>₹{{ $value->PAmount }}/-</strong></p>
                                        </div>
                                        <div class="favroute clearfix">
                                            <p class="pull-left">
                                                <i class="icon-calendar2"></i>
                                                {{ \Carbon\Carbon::parse($value->PCreatedDate)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="item">
                                                                <div class="property_item bottom40">
                                                                    <div class="image">
                                                                        <img src="{{ asset('assets/frontend/images/property-listing-2.jpg') }}" alt="listin"
                                                                            class="img-responsive">
                                                                        <div class="property_meta">
                                                                            <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                                                            <span><i class="fa fa-bed"></i>2</span>
                                                                            <span><i class="fa fa-bath"></i>1 Bathroom</span>
                                                                        </div>
                                                                        <div class="price"><span class="tag">For Sale</span></div>
                                                                        <div class="overlay">
                                                                            <div class="centered"><a class="link_arrow white_border" href="#">View
                                                                                    Detail</a></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="proerty_content">
                                                                        <div class="proerty_text">
                                                                            <h3><a href="#">House in New York City</a></h3>
                                                                            <span class="bottom10">Merrick Way, Miami, USA</span>
                                                                            <p><strong>₹83,600,200</strong></p>
                                                                        </div>
                                                                        <div class="favroute clearfix">
                                                                            <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="property_item bottom40">
                                                                    <div class="image">
                                                                        <img src="{{ asset('assets/frontend/images/property-listing-3.jpg') }}"
                                                                            alt="listin" class="img-responsive">
                                                                        <div class="property_meta">
                                                                            <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                                                            <span><i class="fa fa-bed"></i>2</span>
                                                                            <span><i class="fa fa-bath"></i>1 Bathroom</span>
                                                                        </div>
                                                                        <div class="price"><span class="tag">For Rent</span></div>
                                                                        <div class="overlay">
                                                                            <div class="centered"><a class="link_arrow white_border" href="#">View
                                                                                    Detail</a></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="proerty_content">
                                                                        <div class="proerty_text">
                                                                            <h3><a href="#">House in New York City</a></h3>
                                                                            <span class="bottom10">Merrick Way, Miami, USA</span>
                                                                            <p><strong>₹8,600 Per Month</strong></p>
                                                                        </div>
                                                                        <div class="favroute clearfix">
                                                                            <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                    </div>
                </div>
            </div>
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
                                    <img src="{{ env('Web_CommonURl') }}{{ $value->Pag_Image ?? 'N/A' }}" alt="Our Partner">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

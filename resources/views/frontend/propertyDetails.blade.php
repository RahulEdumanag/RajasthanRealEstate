@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Property</h1>
                <h5>10 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="/">home</a>
                <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                <a href="#">Property Details </a>
            </div>
        </div>
    </div>
    <!--===== #/PAGE TITLE =====-->
    <!--===== PROPERTY - DETAILS - 2 =====-->
    <section class="property-details padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-uppercase">{{ $propertyDetails->PTitle }}</h2>
                    <p class="">{{ $propertyDetails->PTitle }}</p>
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
                                            <img src="{{ asset('uploads/' . trim($image)) }}" alt="listing"
                                                class="img-responsive">
                                        </a>
                                        <div class="price"><span
                                                class="tag">{{ $propertyDetails->propertyType->PTyp_Name }}</span></div>
                                       <div class="property_meta">
                                            <h4>₹{{ $propertyDetails->PAmount }}/-</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="item">
                                <div class="property_item heading_space">
                                  <div class="image">
                                    <a href="#."><img src="{{ asset('assets/frontend/images/property-d-1-2.jpg') }}" alt="listin" class="img-responsive"></a>
                                    <div class="price"><span class="tag">For Sale</span></div>
                                    <div class="property_meta">
                                      <h4>$8,600</h4><p>For Small Family House</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="item">
                                <div class="property_item heading_space">
                                  <div class="image">
                                    <a href="#."><img src="{{ asset('assets/frontend/images/property-d-1-2.jpg') }}" alt="listin" class="img-responsive"></a>
                                    <div class="price"><span class="tag">For Sale</span></div>
                                    <div class="property_meta">
                                      <h4>$8,600</h4><p>For Small Family House</p>
                                    </div>
                                  </div>
                                </div>
                              </div> -->
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
                                <div class="property_meta bottom40"style="margin-top: 40px;">
                                    <span><i class="fa fa-object-group"></i>{{ $propertyDetails->PSqureFeet }} sq ft </span>
                                    <span><i class="fa fa-bed"></i>{{ $propertyDetails->PBedRoom }} Bedrooms</span>
                                    <span><i class="fa fa-bath"></i>{{ $propertyDetails->PBathRoom }} Bathroom</span>
                                    <!-- <span><i class="fa fa-car"></i>1 Garage</span> -->
                                </div>
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
                                                    <td class="text-right">{{ $propertyDetails->PPropertycode }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Price</b></td>
                                                    <td class="text-right">{{ $propertyDetails->PAmount }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Property Size</b></td>
                                                    <td class="text-right">{{ $propertyDetails->PSqureFeet }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Bedrooms</b></td>
                                                    <td class="text-right">{{ $propertyDetails->PBedRoom }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Bathrooms</b></td>
                                                    <td class="text-right">{{ $propertyDetails->PBathRoom }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Available From</b></td>
                                                    <td class="text-right">22-04-2017</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td><b>Status</b></td>
                                                    <td class="text-right">{{ $propertyDetails->propertyType->PTyp_Name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Year Built</b></td>
                                                    <td class="text-right">1991</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Garages</b></td>
                                                    <td class="text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Cross Streets</b></td>
                                                    <td class="text-right">Nordoff</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Floors</b></td>
                                                    <td class="text-right">Carpet - Ceramic Tile</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Plumbing</b></td>
                                                    <td class="text-right">Full Copper Plumbing</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="features">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-uppercase  bottom30 top10">Proprty <span
                                                class="color_red">Features</span></h3>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <ul class="pro-list">
                                            <li>
                                                Air Conditioning
                                            </li>
                                            <li>
                                                Barbeque
                                            </li>
                                            <li>
                                                Dryer
                                            </li>
                                            <li>
                                                Laundry
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <ul class="pro-list">
                                            <li>
                                                Microwave
                                            </li>
                                            <li>
                                                Outdoor Shower
                                            </li>
                                            <li>
                                                Refrigerator
                                            </li>
                                            <li>
                                                Swimming Pool
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <ul class="pro-list">
                                            <li>
                                                Quiet Neighbourhood
                                            </li>
                                            <li>
                                                TV Cable & WIFI
                                            </li>
                                            <li>
                                                Window Coverings
                                            </li>
                                        </ul>
                                    </div>
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
                                            <img src="{{ asset('uploads/' . trim($image)) }}"
                                                alt="image" />
                                            <div class="overlay border_radius">
                                                <a class="fancybox centered" href="{{ asset('uploads/' . trim($image)) }}"
                                                    data-fancybox-group="gallery"><i class="icon-focus"></i></a>
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
                                                class="img-responsive" alt="image" /> </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="agent-p-contact">
                                            <div class="our-agent-box">
                                                <h3 class="bottom10">Kristen Kononets</h3>
                                                <p class="bottom30">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                    elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer
                                                    adipiscing eleifend option congue nihil imperdiet doming…</p>
                                            </div>
                                            <div class="agetn-contact">
                                                <h6>Phone:</h6>
                                                <h6>Mobile:</h6>
                                                <h6>Email Adress:</h6>
                                                <h6>Skype:</h6>
                                            </div>
                                            <div class="agetn-contact-2">
                                                <p>(+01) 34 56 7890</p>
                                                <p>(+033) 34 56 7890</p>
                                                <p>bohdan@ideahomes.com</p>
                                                <p>bohdan.kononets</p>
                                            </div>
                                        </div>
                                        <ul class="socials">
                                            <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#."><i class="fa fa-youtube"></i></a></li>
                                            <li><a href="#."><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#."><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row top30">
                                    <div class="col-xs-12">
                                        <form class="findus">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="single-query">
                                                        <input type="text" placeholder="Your Name"
                                                            class="keyword-input">
                                                    </div>
                                                    <div class="single-query">
                                                        <input type="text" placeholder="Phone Number"
                                                            class="keyword-input">
                                                    </div>
                                                    <div class="single-query">
                                                        <input type="text" placeholder="Email Adress"
                                                            class="keyword-input">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="single-query">
                                                        <textarea placeholder="Massege"></textarea>
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
                                                <span><a href="#."> Facebook</a></span>
                                                <span><a href="#.">Twitter</a></span>
                                                <span><a href="#."> Google +</a></span>
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
        </div>
        </div>
    </section>
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
                <div id="map_canvas"></div>
            </div>
        </div>
    </div>
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
                    <div class="item">
                        <div class="property_item heading_space">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/b-d-property-2.jpg') }}" alt="listin"
                                    class="img-responsive">
                                <div class="overlay">
                                    <div class="centered"><a class="link_arrow white_border" href="#">View
                                            Detail</a></div>
                                </div>
                                <div class="feature"><span class="tag">Featured</span></div>
                                <div class="price"><span class="tag">For Sale</span></div>
                                <div class="property_meta">
                                    <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                    <span><i class="fa fa-bed"></i>2 Bedrooms</span>
                                    <span><i class="fa fa-bath"></i>1 Bathroom</span>
                                </div>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3><a href="#">House in New York City</a></h3>
                                    <span class="bottom10">Merrick Way, Miami, USA</span>
                                    <p><strong>$83,600,200</strong></p>
                                </div>
                                <div class="favroute clearfix">
                                    <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                    <ul class="pull-right">
                                        <li><a href="#."><i class="icon-video"></i></a></li>
                                        <li><a href="#."><i class="icon-like"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="property_item heading_space">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/b-d-property.jpg') }}" alt="listin"
                                    class="img-responsive">
                                <div class="overlay">
                                    <div class="centered"><a class="link_arrow white_border" href="#">View
                                            Detail</a></div>
                                </div>
                                <div class="feature"><span class="tag">Featured</span></div>
                                <div class="price"><span class="tag">For Sale</span></div>
                                <div class="property_meta">
                                    <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                    <span><i class="fa fa-bed"></i> 3 Bedrooms</span>
                                    <span><i class="fa fa-bath"></i>3 Bathroom</span>
                                </div>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3><a href="#">House in New York City</a></h3>
                                    <span class="bottom10">Merrick Way, Miami, USA</span>
                                    <p><strong>$83,600,200</strong></p>
                                </div>
                                <div class="favroute clearfix">
                                    <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                    <ul class="pull-right">
                                        <li><a href="#."><i class="icon-video"></i></a></li>
                                        <li><a href="#."><i class="icon-like"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="property_item heading_space">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/b-d-property-2.jpg') }}" alt="listin"
                                    class="img-responsive">
                                <div class="overlay">
                                    <div class="centered"><a class="link_arrow white_border" href="#">View
                                            Detail</a></div>
                                </div>
                                <div class="feature"><span class="tag">Featured</span></div>
                                <div class="price"><span class="tag">For Sale</span></div>
                                <div class="property_meta">
                                    <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                    <span><i class="fa fa-bed"></i>2 Bedrooms</span>
                                    <span><i class="fa fa-bath"></i>1 Bathroom</span>
                                </div>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3><a href="#">House in New York City</a></h3>
                                    <span class="bottom10">Merrick Way, Miami, USA</span>
                                    <p><strong>$83,600,200</strong></p>
                                </div>
                                <div class="favroute clearfix">
                                    <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                    <ul class="pull-right">
                                        <li><a href="#."><i class="icon-video"></i></a></li>
                                        <li><a href="#."><i class="icon-like"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="property_item heading_space">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/b-d-property-2.jpg') }}" alt="listin"
                                    class="img-responsive">
                                <div class="overlay">
                                    <div class="centered"><a class="link_arrow white_border" href="#">View
                                            Detail</a></div>
                                </div>
                                <div class="feature"><span class="tag">Featured</span></div>
                                <div class="price"><span class="tag">For Sale</span></div>
                                <div class="property_meta">
                                    <span><i class="fa fa-object-group"></i>5,302 sq ft </span>
                                    <span><i class="fa fa-bed"></i>2 Bedrooms</span>
                                    <span><i class="fa fa-bath"></i>1 Bathroom</span>
                                </div>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3><a href="#">House in New York City</a></h3>
                                    <span class="bottom10">Merrick Way, Miami, USA</span>
                                    <p><strong>$83,600,200</strong></p>
                                </div>
                                <div class="favroute clearfix">
                                    <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                    <ul class="pull-right">
                                        <li><a href="#."><i class="icon-video"></i></a></li>
                                        <li><a href="#."><i class="icon-like"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="property_item heading_space">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/b-d-property.jpg') }}" alt="listin"
                                    class="img-responsive">
                                <div class="overlay">
                                    <div class="centered"><a class="link_arrow white_border" href="#">View
                                            Detail</a></div>
                                </div>
                                <div class="feature"><span class="tag">Featured</span></div>
                                <div class="price"><span class="tag">For Sale</span></div>
                                <div class="property_meta">
                                    <span><i class="fa fa-object-group"></i>5,630 sq ft </span>
                                    <span><i class="fa fa-bed"></i>6 Bedrooms</span>
                                    <span><i class="fa fa-bath"></i>8 Bathroom</span>
                                </div>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3><a href="#">House in New York City</a></h3>
                                    <span class="bottom10">Merrick Way, Miami, USA</span>
                                    <p><strong>$83,600,200</strong></p>
                                </div>
                                <div class="favroute clearfix">
                                    <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                    <ul class="pull-right">
                                        <li><a href="#."><i class="icon-video"></i></a></li>
                                        <li><a href="#."><i class="icon-like"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="property_item heading_space">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/b-d-property-2.jpg') }}" alt="listin"
                                    class="img-responsive">
                                <div class="overlay">
                                    <div class="centered"><a class="link_arrow white_border" href="#">View
                                            Detail</a></div>
                                </div>
                                <div class="feature"><span class="tag">Featured</span></div>
                                <div class="price"><span class="tag">For Sale</span></div>
                                <div class="property_meta">
                                    <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                    <span><i class="fa fa-bed"></i>2 Bedrooms</span>
                                    <span><i class="fa fa-bath"></i>1 Bathroom</span>
                                </div>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3><a href="#">House in New York City</a></h3>
                                    <span class="bottom10">Merrick Way, Miami, USA</span>
                                    <p><strong>$83,600,200</strong></p>
                                </div>
                                <div class="favroute clearfix">
                                    <p class="pull-left"><i class="icon-calendar2"></i> 3 Days ago</p>
                                    <ul class="pull-right">
                                        <li><a href="#."><i class="icon-video"></i></a></li>
                                        <li><a href="#."><i class="icon-like"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PROPERTY DETAILS-->
@endsection

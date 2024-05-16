@extends('frontend.layouts.master')
@section('title', 'Faq')
@section('content')
    <div class="page-title page-main-section">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Listing</h1>
                <h5>10 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="/">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a
                    href="{{ URL::to('/property') }}">Listing Properties</a>
            </div>
        </div>
    </div>
    <section class="property-query-area property-page-bg padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bottom40">
                    <h2 class="text-uppercase">Advanced <span class="color_red">Search</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
            <div class="row">
                <form class="findus">
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Keyword</label>
                            <input class="keyword-input" placeholder="Any" required type="text">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Loction</label>
                            <select class="selectpicker" data-live-search="true">
                                <option selected="" value="any">Any</option>
                                <option>Location - 1</option>
                                <option>Location - 2</option>
                                <option>Location - 3</option>
                                <option>Location - 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Property Type</label>
                            <select class="selectpicker" data-live-search="true">
                                <option class="active">Any</option>
                                <option>Property Type - 1</option>
                                <option>Property Type - 2</option>
                                <option>Property Type - 3</option>
                                <option>Property Type - 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-query form-group">
                            <label>Property Status</label>
                            <select class="selectpicker" data-live-search="true">
                                <option class="active">Any</option>
                                <option>Property Status - 1</option>
                                <option>Property Status - 2</option>
                                <option>Property Status - 3</option>
                                <option>Property Status - 4</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row search-2">
                <form class="findus">
                    <div class="col-md-3 col-sm-6">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="single-query form-group">
                                    <label>Bed Room</label>
                                    <select class="selectpicker" data-live-search="true">
                                        <option class="active">Any</option>
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
                                <div class="single-query form-group">
                                    <label>Bath Room</label>
                                    <select class="selectpicker" data-live-search="true">
                                        <option class="active">Any</option>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="single-query form-group">
                                    <label>Squre Fit Min</label>
                                    <input class="keyword-input" placeholder="Any" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="single-query form-group">
                                    <label>Squre Fit Max</label>
                                    <input class="keyword-input" placeholder="Any" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-query-slider top10">
                            <label>Price Range:</label>
                            <div class="price text-right"><span>$</span>
                                <div class="leftLabel">1</div>
                                <span>to $</span>
                                <div class="rightLabel">500</div>
                            </div>
                            <div data-range_min="0" data-range_max="500" data-cur_min="0" data-cur_max="2000"
                                class="nstSlider">
                                <div class="bar nst-animating" style="left: 1px; width: 359px;"></div>
                                <div class="leftGrip nst-animating" tabindex="0" style="left: 1px;"></div>
                                <div class="rightGrip nst-animating" tabindex="0" style="left: 340px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 text-right">
                        <div class="query-submit-button top10">
                            <input class="btn_fill" value="Search" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="group-button-search"><a data-toggle="collapse" href=".html" class="more-filter"><i
                                class="fa fa-plus text-1" aria-hidden="true"></i><i class="fa fa-minus text-2 hide"
                                aria-hidden="true"></i>
                            <div class="text-1">Show more options</div>
                            <div class="text-2 hide">Show less options</div>
                        </a></div>
                </div>
            </div>
            <div class="search-propertie-filters collapse">
                <div class="container-2">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Wifi</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Park</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Schools</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Grounds</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Masque</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Hospitals</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Transport</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div class="search-form-group white">
                                <div class="check-box"><i><input name="check-box" type="checkbox"></i></div>
                                <span>Security</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="listings" class="padding">
        <div class="container">
            <div class="row bottom40">
                <div class="col-xs-12">
                    <h2 class="uppercase">PROPERTY <span class="color_red">LISTINGS</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                    <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
                </div>
            </div>
            <div class="row bottom30">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="property_item heading_space">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/property-listing-1.jpg') }}" alt="listin" class="img-responsive">
                            <div class="overlay">
                                <div class="centered"><a class="link_arrow white_border" href="#">View Detail</a>
                                </div>
                            </div>
                            <div class="feature"><span class="tag">Featured</span></div>
                            <div class="price"><span class="tag">For Sale</span></div>
                            <div class="property_meta">
                                <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                <span><i class="fa fa-bed"></i>2</span>
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
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="property_item heading_space">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/property-listing-2.jpg') }}" alt="listin" class="img-responsive">
                            <div class="feature"><span class="tag">Featured</span></div>
                            <div class="price"><span class="tag">For Sale</span></div>
                            <div class="overlay">
                                <div class="centered"><a class="link_arrow white_border" href="#">View Detail</a>
                                </div>
                            </div>
                            <div class="property_meta">
                                <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                <span><i class="fa fa-bed"></i>2</span>
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
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="property_item heading_space">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/property-listing-3.jpg') }}" alt="listin" class="img-responsive">
                            <div class="feature"><span class="tag">Featured</span></div>
                            <div class="price"><span class="tag">For Rent</span></div>
                            <div class="overlay">
                                <div class="centered"><a class="link_arrow white_border" href="#">View Detail</a>
                                </div>
                            </div>
                            <div class="property_meta">
                                <span><i class="fa fa-object-group"></i>530 sq ft </span>
                                <span><i class="fa fa-bed"></i>2</span>
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
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="property_item heading_space">
                        <div class="property_head default_clr text-center">
                            <a href="#.">
                                <h3 class="captlize p-white ">The Helux villa</h3>
                            </a>
                            <img src="{{ asset('assets/frontend/images/listing.png') }}" alt="listin" class="start_tag">
                            <p class="p-font-15 p-white ">45 Regent Street, London, UK</p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/property-listing-4.jpg') }}" alt="listin" class="img-responsive">
                            <div class="price"><span class="tag">For Sale</span></div>
                            <div class="overlay">
                                <div class="centered"><a class="link_arrow white_border" href="#">View Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="property_meta">
                            <span><i class="fa fa-object-group"></i>530 sq ft </span>
                            <span><i class="fa fa-bed"></i>2</span>
                            <span><i class="fa fa-bath"></i>1 Bathroom</span>
                        </div>
                        <div class="proerty_content">
                            <div class="proerty_text">
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
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="property_item heading_space">
                        <div class="property_head text-center">
                            <a href="#.">
                                <h3 class="captlize">The Helux villa</h3>
                            </a>
                            <p class="p-font-15">45 Regent Street, London, UK</p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/property-listing-5.jpg') }}" alt="listin" class="img-responsive">
                            <div class="overlay">
                                <div class="centered"><a class="link_arrow white_border" href="#">View Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="property_meta">
                            <span><i class="fa fa-object-group"></i>530 sq ft </span>
                            <span><i class="fa fa-bed"></i>2</span>
                            <span><i class="fa fa-bath"></i>1 Bathroom</span>
                        </div>
                        <div class="proerty_content">
                            <div class="proerty_text">
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
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="property_item heading_space">
                        <div class="property_head text-center">
                            <a href="#.">
                                <h3 class="captlize">The Helux villa</h3>
                            </a>
                            <p class="p-font-15">45 Regent Street, London, UK</p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/property-listing-1.jpg') }}" alt="listin" class="img-responsive">
                            <div class="overlay">
                                <div class="centered"><a class="link_arrow white_border" href="#">View Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="property_meta">
                            <span><i class="fa fa-object-group"></i>530 sq ft </span>
                            <span><i class="fa fa-bed"></i>2</span>
                            <span><i class="fa fa-bath"></i>1 Bathroom</span>
                        </div>
                        <div class="proerty_content">
                            <div class="proerty_text">
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
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="project1 clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12 padding-left-0 project-images">
                            <div class="gri">
                                <figure class="effect-layla">
                                    <img src="{{ asset('assets/frontend/images/b-d-property.jpg') }}" alt="img" />
                                    <figcaption> </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 project-owl-slidee padding-left-0 project-owl-slideee">
                                <div class="item background-color-white">
                                    <h4>Residential Project-d05</h4>
                                    <div class="small-title">
                                        <div class="line1"></div>
                                        <div class="line2"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="client-loc">
                                        <p><span>Client:</span> Bryan Doe Joe</p>
                                        <p><span>Location:</span> Mountain Line CA 62548</p>
                                        <p><span>Value:</span> $15,000</p>
                                    </div>
                                    <a href="#." class="link_arrow">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="project1 clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12 padding-left-0 project-images">
                            <div class="gri">
                                <figure class="effect-layla">
                                    <img src="{{ asset('assets/frontend/images/b-d-property-2.jpg') }}" alt="img" />
                                    <figcaption> </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 project-owl-slidee padding-left-0 project-owl-slideee">
                                <div class="item background-color-white">
                                    <h4>Residential Project-d05</h4>
                                    <div class="small-title">
                                        <div class="line1"></div>
                                        <div class="line2"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="client-loc">
                                        <p><span>Client:</span> Bryan Doe Joe</p>
                                        <p><span>Location:</span> Mountain Line CA 62548</p>
                                        <p><span>Value:</span> $15,000</p>
                                    </div>
                                    <a href="#." class="link_arrow">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row top40">
                <div class="col-md-12">
                    <ul class="pager">
                        <li><a href="#.">1</a></li>
                        <li class="active"><a href="#.">2</a></li>
                        <li><a href="#.">3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

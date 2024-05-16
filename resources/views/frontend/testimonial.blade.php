@extends('frontend.layouts.master')
@section('title', 'Testimonial')
@section('content')
    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Testimonial</h1>
                <h5>10 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="{{ URL::to('/') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a
                    href="{{ URL::to('/testimonial') }}">Testimonial</a>
            </div>
        </div>
    </div>
    <!--===== #/PAGE TITLE =====-->
    <!--===== TESTINOMIAL =====-->
    <section id="testinomila_page" class="padding">
        <div class="container">
            <div class="row bottom40">
                <div class="col-md-12">
                    <h2 class="text-uppercase">Customar <span class="color_red">Feedback</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
            <div id="js-grid-masonry" class="cbp">
                <div class="cbp-item">
                    <div class="cbp-caption-defaultWrap">
                        <div class="testinomial_wrap">
                            <div class="testinomial_text blue_dark  text-center">
                                <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh tempor cum
                                    soluta nobis consectetuer.</p>
                                <img src="{{ asset('assets/frontend/images/quote.png') }}" alt="quote" class="quote">
                            </div>
                            <div class="testinomial_pic">
                                <img src="{{ asset('assets/frontend/images/testinomils.png') }}" alt="testinomial" width="59">
                                <h4 class="color">SAM NICHOLSON</h4>
                                <span class="post_img">( NorthMarq Capital )</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-item">
                    <div class="cbp-caption-defaultWrap">
                        <div class="testinomial_wrap">
                            <div class="testinomial_text blue_dark  text-center">
                                <p>We offer the most complete house renovating services in the country, from kitchen design
                                    to bathroom remodeling. Innovativeness is
                                    the pledge of our stable development. We tap into the most successful international
                                    management data, forestalling market.</p>
                                <img src="{{ asset('assets/frontend/images/quote.png') }}" alt="quote" class="quote">
                            </div>
                            <div class="testinomial_pic">
                                <img src="{{ asset('assets/frontend/images/testinomils.png') }}" alt="testinomial" width="59">
                                <h4 class="color">SAM NICHOLSON</h4>
                                <span class="post_img">( NorthMarq Capital )</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-item">
                    <div class="cbp-caption-defaultWrap">
                        <div class="testinomial_wrap">
                            <div class="testinomial_text blue_dark  text-center">
                                <p>We offer the most complete house renovating services in the country, from kitchen design
                                    to bathroom remodeling.
                                    Innovativeness is the pledge of our stable development. We tap into successful.</p>
                                <img src="{{ asset('assets/frontend/images/quote.png') }}" alt="quote" class="quote">
                            </div>
                            <div class="testinomial_pic">
                                <img src="{{ asset('assets/frontend/images/testinomils.png') }}" alt="testinomial" width="59">
                                <h4 class="color">SAM NICHOLSON</h4>
                                <span class="post_img">( NorthMarq Capital )</span>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </section>
    <!--===== #/TESTINOMIAL =====-->
@endsection

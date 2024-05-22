@extends('frontend.layouts.master')
@section('title', 'Testimonial')
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
    </style>
    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Testimonial</h1>
                <h5>10 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="{{ URL::to('/') }}">home</a><span><i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></span><a href="{{ URL::to('/testimonial') }}">Testimonial</a>
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
            @if (!$TestimonialModel->isEmpty())
                <div id="js-grid-masonry" class="cbp">
                    @foreach ($TestimonialModel as $value)
                        <div class="cbp-item">
                            <div class="cbp-caption-defaultWrap">
                                <div class="testinomial_wrap">
                                    <div class="testinomial_text blue_dark  text-center">
                                        <p>{{ $value->Pag_ShortDesc }}</p>
                                        <img src="{{ asset('assets/frontend/images/quote.png') }}" alt="quote"
                                            class="quote">
                                    </div>
                                    <div class="testinomial_pic">
                                        <img src="{{ env('Web_CommonURl') }}{{ $value->Pag_Image ?? 'N/A' }}"
                                            alt="testinomial" width="59">
                                        <h4 class="color">{{ $value->Pag_Name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-md-12">
                    <div class="no-results-container">
                        <h4 class="no-results-text">No results found, please try again.</h4>
                        <div class="no-results-image">
                            <img src="https://i.pinimg.com/originals/49/e5/8d/49e58d5922019b8ec4642a2e2b9291c2.png"
                                alt="No results found image"style="height: 25%; width: 25%;">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--===== #/TESTINOMIAL =====-->
@endsection

@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')

    <style>
        .design {

            color: #fff;
            border: solid 1px red;
            background: red;
            border-radius: 15px;
            font-weight: bold;
        }
    </style>

    <div>
        <section class="as_banner_wrapper">
            <div class="container">
                <div class="row as_verticle_center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="as_banner_slider">
                            @foreach ($SliderModel as $model)
                                <div class="as_banner_detail">
                                    <h5>{{ $model->Pag_Name }}</h5>
                                    <h1>{{ $model->Pag_ShortDesc }}</h1>
                                    <p>{!! $model->Pag_FullDesc !!}</p>
                                    <a href="{{ URL::to('/contact') }}" class="as_btn">Talk to Astrologer</a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="as_banner_img text-center">
                            <img src="{{ asset('assets/frontend/images/hand_bg.png') }}" alt=""
                                class="img-responsive as_hand_bg">
                            <img src="{{ asset('assets/frontend/images/hand.png') }}" alt=""
                                class="img-responsive as_hand">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <div style="width:100%;">
                                                    <img src="{{ asset('assets/frontend/images/JyodikBanner.jpg') }}" alt="" style="height:75px;">
                                                </div> -->
        <section class="as_about_wrapper as_padderTop80 as_padderBottom80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="as_heading">About Jyodik</h1>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="240" height="15" viewBox="0 0 240 15">
                                <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240"
                                    height="15"
                                    xlink:href="data:img/png;base64,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" />
                            </svg>
                        </span>
                        <p class="as_font14 as_padderTop20 as_padderBottom50">Jyodik(Jyodik Astro & Gemstone (opc) Pvt Ltd)  is the best astrology website for
                            online Astrology predictions. Talk to Astrologer on call and get answers to all your worries by
                            seeing the future life through Astrology Kundli Predictions from the best Astrologers from
                            India. Get best future predictions related to Marriage, love life, Career or Health over call,
                            chat, query or report.

                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="as_aboutimg text-right">
                            <img src="{{ asset('assets/frontend/images/about.jpg') }}" alt=""
                                class="img-responsive">
                            <!-- <span class="as_play"><img src="{{ asset('assets/frontend/images/play.png') }}"
                                    alt=""></span> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="as_about_detail">
                            <h1 class="as_heading">{{ $HomeMenuModel->Men_ShortDesc ?? 'NaN' }}</h1>
                            <div class="as_paragraph_wrapper">
                                <p class="as_margin0 as_font14 as_padderBottom10">
                                    {!! $HomeMenuModel->Men_FullDesc ?? 'NaN' !!}
                                </p>
                                <!-- <p class="as_font14">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p> -->
                            </div>

                            <div class="as_contact_expert">
                                <span class="as_icon">
                                    <img src="{{ asset('assets/frontend/images/svg/about.svg') }}" alt="">
                                </span>
                                <span class="as_year_ex">
                                    100
                                </span>
                                <div>
                                    <h5>years of</h5>
                                    <h1>Experience</h1>
                                </div>
                            </div>
                            <a href="{{ URL::to('/about') }}" class="as_btn">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="as_horoscope_wrapper as_padderBottom80 as_padderTop80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="as_heading">Horoscope Forecasts</h1>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="240" height="15" viewBox="0 0 240 15">
                                <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240"
                                    height="15"
                                    xlink:href="data:img/png;base64,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" />
                            </svg>
                        </span>
                        <p class="as_font14 as_padderTop20 as_padderBottom20">
                        Jyodik(Jyodik Astro & Gemstone (opc) Pvt Ltd)  rings together astrologers and their boundless knowledge about the occult science of
                            Astrology on one platform and lets you connect with them 24*7. Apart from the best future
                            predictions that help you get through the difficult phase of life, Jyodik also offers Free Live
                            astrology sessions, Daily horoscope, Free kundli matching service, Spiritual store and much
                            more.

                    </div>

                    @foreach ($HoroscopeModel as $model)
                        <div class="col-lg-2 col-sm-4 col-xs-6">
                            <div class="as_sign_box text-center">
                                <a href="{{ URL::to('/contact') }}">
                                    <span class="as_sign">
                                        <img src="{{ env('Web_CommonURl') }}{{ $model->Pag_Image }}" alt="">
                                    </span>
                                    <div>
                                        <h5>{{ $model->Pag_Name }}</h5>
                                        {{ $model->Pag_ShortDesc }}
                                        <p class="design">Ask about you</p>




                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="as_product_wrapper as_padderBottom80 as_padderTop80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="as_heading">OUR ASTROLOGERS </h1>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="240" height="15" viewBox="0 0 240 15">
                                <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240"
                                    height="15"
                                    xlink:href="data:img/png;base64,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" />
                            </svg>
                        </span>
                        <p class="as_font14 as_padderTop20 as_padderBottom10">As Vedic astrology of Jyotish gives accurate
                            and correct advice through palm writing only</p>

                        <div class="row">
                            @foreach ($TeamModel as $model)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <a href="{{ URL::to('/booking') }}">
                                        <div class="as_product_box">
                                            <div class="as_product_img">
                                                <img src="{{ env('Web_CommonURl') }}{{ $model->Pag_Image }}"
                                                    alt="" class="img-responsive">

                                            </div>
                                            <div class="as_product_detail">
                                                <span><img src="{{ asset('assets/frontend/images/rating.png') }}"
                                                        alt=""></span>
                                                <h4 class="as_subheading">{{ $model->Pag_Name }}</h4>
                                                <span class="as_price">{{ $model->Pag_ShortDesc }} <span class="as_btn"
                                                        style="color:black;">Free</span></span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endforeach

                        </div>
                        <!-- <div class="text-center as_padderTop60">
                                                                    <a href="javascript:;" class="as_btn">view more</a>
                                                                </div> -->
                    </div>
                </div>
            </div>
        </section>

        <section class="as_service_wrapper as_padderTop80 as_padderBottom80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="as_heading as_heading_center">our services</h1>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="240" height="15" viewBox="0 0 240 15">
                                <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240"
                                    height="15"
                                    xlink:href="data:img/png;base64,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" />
                            </svg>
                        </span>
                        <p class="as_font14 as_padderTop20 as_padderBottom20">Jyotish works for the accurate and right
                            solution of your problems like Kundali Dosh, solution of any problem, Vastu Dosh</p>
                    </div>
                </div>


                <div class="row as_verticle_center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="as_service_img">
                            <img src="{{ asset('assets/frontend/images/service_img2.png') }}" alt=""
                                class="as_service_circle img-responsive">
                            <img src="{{ asset('assets/frontend/images/service_img1.jpg') }}" alt=""
                                class="as_service_img img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                            @foreach ($ServicesModel as $model)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <a href="{{ URL::to('/talk') }}">
                                        <div class="as_service_box text-center">
                                            <span class="as_icon">
                                                <img src="{{ env('Web_CommonURl') }}{{ $model->Pag_Image }}"
                                                    alt="" class="img-responsive"> </span>

                                            <h4 class="as_subheading">{{ $model->Pag_Name }} </h4>
                                            <p class="as_paddingBottom10">{{ $model->Pag_ShortDesc }} </p>

                                            Ask about you
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg') }}" width="12"
                                                    height="7" viewBox="0 0 12 7">
                                                    <path class="cls-1"
                                                        d="M8.966,4.52H1.312A1.644,1.644,0,0,1,.976,4.5,0.656,0.656,0,0,1,.447,3.8a0.672,0.672,0,0,1,.7-0.575q2.824,0,5.649,0c0.7,0,1.4,0,2.13-.051C8.546,2.814,8.166,2.455,7.782,2.1A0.675,0.675,0,0,1,7.523,1.5,0.629,0.629,0,0,1,7.981.959a0.688,0.688,0,0,1,.726.187L10.429,2.8l0.58,0.557a0.637,0.637,0,0,1,.011,1.016q-1.149,1.109-2.3,2.212a0.7,0.7,0,0,1-1.006.036A0.635,0.635,0,0,1,7.77,5.658C8.151,5.294,8.533,4.932,8.966,4.52Z" />
                                                </svg>
                                            </span>

                                        </div>
                                    </a>

                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="as_whychoose_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="as_heading">Why Choose Us</h1>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="240" height="15" viewBox="0 0 240 15">
                                <image id="Design" width="240" height="15"
                                    xlink:href="data:img/png;base64,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" />
                            </svg>
                        </span>
                        <!-- <p class="as_font14 as_padderTop20 as_padderBottom50">It is a long established fact that a reader will be distracted by the readable content of a page <br>when looking at its layout. The point of using Lorem Ipsum .</p> -->
                    </div>
                    <div class="col-lg-12">
                        <ul class="as_choose_ul">
                            <li>
                                <div class="as_whychoose_box text-center">
                                    <span class="as_number">
                                        <span>
                                            <span data-from="0"
                                                data-to="{{ $WebInfoModel->WebInf_ShortInfo1 ?? 'N/A' }}"
                                                data-speed="5000">{{ $WebInfoModel->WebInf_ShortInfo1 ?? 'N/A' }}</span>+
                                        </span><img src="{{ asset('assets/frontend/images/svg/choose.svg') }}"
                                            alt="">
                                    </span>
                                    <h4>Trusted by Million Clients</h4>
                                </div>
                            </li>
                            <li>
                                <div class="as_whychoose_box text-center">
                                    <span class="as_number">
                                        <span>
                                            <span data-from="0"
                                                data-to="{{ $WebInfoModel->WebInf_ShortInfo2 ?? 'N/A' }}"
                                                data-speed="5000">{{ $WebInfoModel->WebInf_ShortInfo2 ?? 'N/A' }}</span>+
                                        </span><img src="{{ asset('assets/frontend/images/svg/choose.svg') }}"
                                            alt="">
                                    </span>
                                    <h4>Years of Experience</h4>
                                </div>
                            </li>
                            <li>
                                <div class="as_whychoose_box text-center">
                                    <span class="as_number">
                                        <span>
                                            <span data-from="0"
                                                data-to="{{ $WebInfoModel->WebInf_ShortInfo3 ?? 'N/A' }}"
                                                data-speed="5000">{{ $WebInfoModel->WebInf_ShortInfo3 ?? 'N/A' }}</span>+
                                        </span><img src="{{ asset('assets/frontend/images/svg/choose.svg') }}"
                                            alt="">
                                    </span>
                                    <h4>Types of Horoscopes</h4>
                                </div>
                            </li>
                            <li>
                                <div class="as_whychoose_box text-center">
                                    <span class="as_number">
                                        <span>
                                            <span data-from="0"
                                                data-to="{{ $WebInfoModel->WebInf_ShortInfo4 ?? 'N/A' }}"
                                                data-speed="5000">{{ $WebInfoModel->WebInf_ShortInfo4 ?? 'N/A' }}</span>+
                                        </span><img src="{{ asset('assets/frontend/images/svg/choose.svg') }}"
                                            alt="">
                                    </span>
                                    <h4>Qualified Astrologers</h4>
                                </div>
                            </li>
                            <li>
                                <div class="as_whychoose_box text-center">
                                    <span class="as_number">
                                        <span>
                                            <span data-from="0" data-to="99" data-speed="5000">99</span>+
                                        </span><img src="{{ asset('assets/frontend/images/svg/choose.svg') }}"
                                            alt="">
                                    </span>
                                    <h4>Success Horoscope</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="as_customer_wrapper as_padderBottom80 as_padderTop80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="as_heading as_heading_center">What My Client Say</h1>
                        <div class="row as_customer_slider">
                            <div class="col-lg-5 col-md-5 as_customer_nav">
                                @foreach ($TestimonialModel as $key => $model)
                                    <div class="as_customer_img" data-target="#modal{{ $key }}"
                                        data-toggle="modal">
                                        <img src="{{ env('Web_CommonURl') }}{{ $model->Pag_Image }}" alt=""
                                            class="img-responsive">
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-7 col-md-7 as_customer_for">
                                @foreach ($TestimonialModel as $key => $model)
                                    <div class="as_customer_box text-center">
                                        <p class="as_margin0">{{ $model->Pag_ShortDesc ?? 'N/A' }}</p>
                                        <h3>{{ $model->Pag_Name }}</h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @foreach ($TestimonialModel as $key => $model)
            <!-- Modal for each testimonial -->
            <div class="modal fade" id="modal{{ $key }}" tabindex="-1" role="dialog"
                aria-labelledby="modal{{ $key }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal{{ $key }}Label">{{ $model->Pag_Name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ env('Web_CommonURl') }}{{ $model->Pag_Image }}" alt=""
                                class="img-fluid">
                            <p>{{ $model->Pag_Description }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!--
                                        <section class="as_blog_wrapper as_padderTop80 as_padderBottom80" style="display:none;">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 text-center">
                                                        <h1 class="as_heading">Latest Articles</h1>
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                width="240" height="15" viewBox="0 0 240 15">
                                                                <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240"
                                                                    height="15"
                                                                    xlink:href="data:img/png;base64,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" />
                                                            </svg>
                                                        </span>
                                                        <p class="as_font14 as_padderTop20 as_padderBottom10">It is a long established fact that a reader
                                                            will be distracted by the readable content of a page <br>when looking at its layout. The point
                                                            of using Lorem Ipsum .</p>


                                                        <div class="v3_blog_wrapper">
                                                            <div class="row text-left">
                                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                    <div class="as_blog_box">
                                                                        <div class="as_blog_img">
                                                                            <a href="blog_detail.html"><img
                                                                                    src="{{ asset('assets/frontend/images/blog1.jpg') }}" alt=""
                                                                                    class="img-responsive"></a>
                                                                            <span class="as_btn">July 29, 2020</span>
                                                                        </div>
                                                                        <div class="as_blog_detail">
                                                                            <ul>
                                                                                <li><a href="javascript:;"><img
                                                                                            src="{{ asset('assets/frontend/images/svg/user2.svg') }}"
                                                                                            alt="">By - Admin</a></li>
                                                                                <li><a href="javascript:;"><img
                                                                                            src="{{ asset('assets/frontend/images/svg/comment1.svg') }}"
                                                                                            alt="">0 comments</a></li>
                                                                            </ul>
                                                                            <h4 class="as_subheading"><a href="blog.html"> Consectetur adipiscing elit
                                                                                    sedeius mod tempor incididunt ut labore.</a></h4>
                                                                            <p class="as_font14 as_margin0">Consectetur adipiscing elit, sed desdo eiusmod
                                                                                tempor incididuesdeentiut labore etesde doloesire esdesdeges magna
                                                                                aliquapspendisse and the gravida.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                    <div class="as_blog_box">
                                                                        <div class="as_blog_img">
                                                                            <a href="blog_detail.html"><img
                                                                                    src="{{ asset('assets/frontend/images/blog2.jpg') }}" alt=""
                                                                                    class="img-responsive"></a>
                                                                            <span class="as_btn">July 29, 2020</span>
                                                                        </div>
                                                                        <div class="as_blog_detail">
                                                                            <ul>
                                                                                <li><a href="blog.html"><img
                                                                                            src="{{ asset('assets/frontend/images/svg/user2.svg') }}"
                                                                                            alt="">By - Admin</a></li>
                                                                                <li><a href="blog.html"><img
                                                                                            src="{{ asset('assets/frontend/images/svg/comment1.svg') }}"
                                                                                            alt="">0 comments</a></li>
                                                                            </ul>blog.html
                                                                            <h4 class="as_subheading"><a href="blog.html"> Consectetur adipiscing elit
                                                                                    sedeius mod tempor incididunt ut labore.</a></h4>
                                                                            <p class="as_font14 as_margin0">Consectetur adipiscing elit, sed desdo eiusmod
                                                                                tempor incididuesdeentiut labore etesde doloesire esdesdeges magna
                                                                                aliquapspendisse and the gravida.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                    <div class="as_blog_box">
                                                                        <div class="as_blog_img">
                                                                            <a href="blog_detail.html"><img
                                                                                    src="{{ asset('assets/frontend/images/blog3.jpg') }}" alt=""
                                                                                    class="img-responsive"></a>
                                                                            <span class="as_btn">July 29, 2020</span>
                                                                        </div>
                                                                        <div class="as_blog_detail">
                                                                            <ul>
                                                                                <li><a href="javascript:;"><img
                                                                                            src="{{ asset('assets/frontend/images/svg/user2.svg') }}"
                                                                                            alt="">By - Admin</a></li>
                                                                                <li><a href="javascript:;"><img
                                                                                            src="{{ asset('assets/frontend/images/svg/comment1.svg') }}"
                                                                                            alt="">0 comments</a></li>
                                                                            </ul>
                                                                            <h4 class="as_subheading"><a href="blog.html"> Consectetur adipiscing elit
                                                                                    sedeius mod tempor incididunt ut labore.</a></h4>
                                                                            <p class="as_font14 as_margin0">Consectetur adipiscing elit, sed desdo eiusmod
                                                                                tempor incididuesdeentiut labore etesde doloesire esdesdeges magna
                                                                                aliquapspendisse and the gravida.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="text-center as_padderTop60">
                                                            <a href="blog.html" class="as_btn">view more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section> -->



    </div>
    <script>
        // Script to handle modal opening when clicking on images
        $(document).ready(function() {
            $('.as_customer_img').click(function() {
                var targetModal = $(this).attr('data-target');
                $(targetModal).modal('show');
            });
        });
    </script>
@endsection

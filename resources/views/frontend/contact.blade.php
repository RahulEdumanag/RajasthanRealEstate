@extends('frontend.layouts.master')
@section('title', 'Contact')
@section('content')
    <!--===== PAGE TITLE =====-->
    <div class="page-title page-main-section parallaxie" style="background-image: url(images/titlebg-1.jpg);">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Contact us</h1>
                <h5>10 Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="{{ URL::to('/') }}">home</a><span><i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></span><a href="{{ URL::to('/contact') }}">Contact us</a>
            </div>
        </div>
    </div>
    <!--===== #/PAGE TITLE =====-->
    <!--===== CONTACT US =====-->
    <section id="contact-us" class="padding_top parallaxie" style="background-image:url(images/map-bg.png); ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="contact-bg">
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="bottom40">
                                    <h2 class="text-uppercase">Send us<span class="color_red"> a message </span></h2>
                                    <div class="line_1"></div>
                                    <div class="line_2"></div>
                                    <div class="line_3"></div>
                                </div>
                                <form method="post" action="{{ route('contact.Cstore') }}" id="contact-form"
                                    class="contact-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group single-query">
                                                <input type="text"id="Con_Name" name='Con_Name' class="keyword-input"
                                                    placeholder="Your Name" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group single-query">
                                                <input type="email" id="Con_Email" name='Con_Email' class="keyword-input"
                                                    placeholder="Your E-mail" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group single-query">
                                                <input type="number" name='Con_Number' id="Con_Number"
                                                    class="keyword-input" placeholder="Number" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group single-query">
                                                <textarea name='Con_Desc' placeholder="Message" id="Con_Desc"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-12">
                                            <div class="form-group single-query">
                                                <img src="{{ asset('assets/frontend/images/contact.jpg') }}"
                                                    class="img-responsive" alt="image">
                                            </div>
                                        </div> -->
                                        <div class="col-md-12 top20">
                                            <div class="form-group single-query">
                                                <button type="submit" class="btn_fill" id="btn_submit"
                                                    name="btn_submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="address_box">
                                    <div class="bottom40">
                                        <h2 class="text-uppercase">get in<span class="color_red"> touch</span></h2>
                                        <div class="line_1"></div>
                                        <div class="line_2"></div>
                                        <div class="line_3"></div>
                                    </div>
                                    <div class="agent-p-contact p-t-30">
                                        <div class="agetn-contact-2">
                                            <p><i
                                                    class="icon-telephone114"></i>{{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}
                                            </p>
                                            <a href="#.">
                                                <p><i class=" icon-icons142"></i>
                                                    {{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}</p>
                                            </a>
                                            <p><i class="icon-icons74"></i> {{ $WebInfoModel->WebInf_Address ?? 'N/A' }}</p>
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
                            </div>
                        </div>
                        <div class="row padding_top">
                            <div class="col-md-12">
                                <div class="bottom40">
                                    <h2 class="text-uppercase">Our <span class="color_red"> Location </span></h2>
                                    <div class="line_1"></div>
                                    <div class="line_2"></div>
                                    <!-- <div class="line_3"></div> -->
                                </div>
                                <div class="contact">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===== #/CONTACT US =====-->
@endsection

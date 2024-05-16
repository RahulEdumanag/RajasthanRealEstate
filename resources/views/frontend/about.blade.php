@extends('frontend.layouts.master')
@section('title', 'About')
@section('content')
    <div>

        <section class="as_breadcrum_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>About us</h1>

                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="as_about_wrapper as_padderTop80 as_padderBottom80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="as_heading">About Astrology</h1>
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            chat, query or report.</p>
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
                            <h1 class="as_heading"> {!! $AboutMenuModel->Men_ShortDesc ?? 'NaN' !!}</h1>
                            <div class="as_paragraph_wrapper">
                                <p class="as_margin0 as_font14 as_padderBottom10"> {!! $AboutMenuModel->Men_FullDesc ?? 'NaN' !!}</p>
                            </div>

                            <div class="as_contact_expert">
                                <span class="as_icon">
                                    <img src="{{ asset('assets/frontend/images/svg/about.svg') }}" alt="">
                                </span>
                                <span class="as_year_ex">
                                    30
                                </span>
                                <div>
                                    <h5>years of</h5>
                                    <h1>Experience</h1>
                                </div>
                            </div>
                            <a href="{{ URL::to('/contact') }}" class="as_btn">Ask about you</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="as_service_wrapper as_padderTop80 as_padderBottom80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="as_heading as_heading_center">our services</h1>
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                                <img src="{{ env('Web_CommonURl') }}{{ $model->Pag_Image }}" alt=""
                                                    class="img-responsive"> </span>

                                            <h4 class="as_subheading">{{ $model->Pag_Name }} </h4>
                                            <p class="as_paddingBottom10">{{ $model->Pag_ShortDesc }} </p>

                                            Ask about you
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg') }}" width="12" height="7"
                                                    viewBox="0 0 12 7">
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

        <!-- <section class="as_pricing_plan as_padderBottom50 as_padderTop80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="as_heading as_heading_center">Our Pricing Plan</h1>
                        <span><svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="240" height="15" viewBox="0 0 240 15">
                                <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240"
                                    height="15"
                                    xlink:href="data:img/png;base64,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" />
                            </svg>
                        </span>
                        <p class="as_font14 as_padderBottom50 as_padderTop20">Consectetur adipiscing elit, sed do
                            eiusmod tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the
                            gravida.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="as_pricing_box text-center">
                            <div class="as_pric_icon">
                                <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="79" height="79" viewBox="0 0 79 79">
                                  
                                    <path class="cls-1"
                                        d="M592.443,3479.7a3.768,3.768,0,0,0,4.275,1.25,3.963,3.963,0,0,0,2.7-3.74,4.184,4.184,0,0,0-3.042-3.86,2.51,2.51,0,0,1-1.392-1.24,30.6,30.6,0,0,0-32.412-19.63c-14.087,1.78-25.816,14.07-26.264,28.3-0.4,12.55,4.994,22.05,15.867,28.41a2.953,2.953,0,0,1,1.179,1.67,5.43,5.43,0,0,0,3.984,4.37,5.3,5.3,0,0,0,5.35-1.7,2.932,2.932,0,0,1,1.917-.74c13.194,0.49,24.759-6.64,29.772-18.43a29.561,29.561,0,0,0,2.368-10.58c-0.905-.06-1.689-0.12-2.466-0.18-1.729,19.52-18.323,27.94-30.252,26.36-1.05-5.61-6.753-6.56-9.85-2.78-10.98-5.28-17.191-18.14-14.827-29.94,2.875-14.35,16.668-24.31,30.893-22.08,10.895,1.71,18.29,7.83,22.269,18.09a2.091,2.091,0,0,1-.171,1.59C591.266,3476.67,591.253,3478.27,592.443,3479.7Zm2.994-4.24a1.738,1.738,0,0,1,1.91,1.55,1.618,1.618,0,0,1,.008.22h0s0,0.01,0,.01A1.735,1.735,0,1,1,595.437,3475.46Zm-36.608,32.07a2.636,2.636,0,1,1-2.841,2.54A2.668,2.668,0,0,1,558.829,3507.53Zm-8.577-26.09c0.319,0.68.653,1.39,0.988,2.1l0.26-.51c2.441,0.56,4.882,1.12,7.739,1.77-1.881,1.18-4.657.56-5.214,3.31,0.568,0.42,1.173.87,1.778,1.32-0.019-.15-0.039-0.3-0.058-0.46,1.361-.42,2.722-0.84,4.083-1.25,0.076,0.17.152,0.35,0.228,0.53a18.753,18.753,0,0,0-3.528,1.69,20.619,20.619,0,0,0-2.756,3.16c1.237,0.43,1.981.69,2.725,0.95-0.065-.19-0.129-0.37-0.194-0.56,2.119-1.33,4.239-2.67,6.781-4.27-0.622,2.23-2.911,3.76-1.461,6.13,0.73-.14,1.5-0.28,2.277-0.43l-0.386-.39c0.695-1.26,1.389-2.52,2.084-3.79,0.169,2.69-2.473,5.25-.086,8.05l2.034-1.01c-0.165-.08-0.331-0.16-0.5-0.25,0.555-2.44,1.111-4.88,1.778-7.82,1.132,1.97.578,4.71,3.288,5.3,0.425-.57.876-1.18,1.327-1.79-0.151.02-.3,0.05-0.452,0.07-0.451-1.43-.9-2.86-1.354-4.28,2.1,1.71,2.007,5.45,5.659,5.71,0.248-.71.5-1.42,0.687-1.96a11.743,11.743,0,0,1-1.93-1.89c-0.887-1.45-1.59-3.01-2.491-4.77a3.977,3.977,0,0,1,1.421.54c1.228,1.3,2.663,1.32,4.4.93-0.15-.83-0.29-1.6-0.431-2.38l-0.3.33q-1.959-1.05-3.917-2.09l0.1-.42c2.615,0.39,5.137,2.78,7.959.53-0.333-.68-0.677-1.39-0.9-1.85a13.279,13.279,0,0,1-2.858-.03c-1.606-.4-3.162-1.01-4.962-1.6,1.548-1.03,4.318-.44,4.956-3.12-0.555-.42-1.186-0.9-1.817-1.39,0.008,0.17.016,0.33,0.024,0.5L573,3477.37c-0.087-.13-0.174-0.25-0.261-0.38,2.164-1.54,5.571-1.72,6.04-5.25-0.721-.25-1.466-0.51-2.21-0.77q0.1,0.255.2,0.51c-2.121,1.34-4.242,2.68-6.847,4.33a6.523,6.523,0,0,1,.789-1.82c1.281-1.24,1.279-2.66.856-4.35-0.841.15-1.621,0.29-2.4,0.44l0.352,0.33c-0.688,1.28-1.376,2.55-2.064,3.83-0.128-.04-0.256-0.07-0.384-0.11,0.341-2.6,2.766-5.11.49-7.92-0.7.35-1.365,0.68-1.8,0.89a12.386,12.386,0,0,1-.035,2.78c-0.419,1.65-1.038,3.24-1.661,5.12-0.925-1.69-.459-4.37-3.126-5-0.423.57-.892,1.2-1.361,1.84,0.175,0,.349-0.01.524-0.01q0.633,2.085,1.267,4.17c-1.991-1.83-2-5.39-5.608-5.72-0.246.69-.5,1.4-0.754,2.11,0.147-.07.293-0.15,0.44-0.22l4.4,6.93c-2.254-.67-3.786-2.95-6.155-1.49,0.136,0.73.281,1.5,0.425,2.28l0.4-.39c1.261,0.69,2.522,1.39,3.783,2.09C555.592,3481.74,553.083,3479.16,550.252,3481.44Zm16.261-4.21a5.27,5.27,0,1,1-5.264,5.19A5.313,5.313,0,0,1,566.513,3477.23Zm-4.561,41.82a35.765,35.765,0,0,1-24.837-14.42,1.909,1.909,0,0,1-.113-1.65c1.366-2.86-.164-5.76-3.294-5.95a1.434,1.434,0,0,1-1.514-1.11c-4.395-11.91-3.112-23.19,3.672-33.89a1.432,1.432,0,0,1,1.843-.79,5.074,5.074,0,0,0,5.89-2.77,5.253,5.253,0,0,0-7.789-6.58,5.131,5.131,0,0,0-1.752,6.28,1.843,1.843,0,0,1-.091,2.06q-11.535,17.595-4,37.26a3.2,3.2,0,0,1-.02,1.98,4.074,4.074,0,0,0,3.036,5.41,3.462,3.462,0,0,1,1.792,1.13,39.494,39.494,0,0,0,45.158,13.64,36.894,36.894,0,0,0,12.132-7.1c-0.572-.69-1.052-1.26-1.609-1.93C581.956,3517.37,572.57,3520.4,561.952,3519.05Zm-23.063-65.52a2.635,2.635,0,1,1-2.647,2.74A2.663,2.663,0,0,1,538.889,3453.53Zm-4.85,49.15a1.735,1.735,0,1,1,1.542-1.91A1.724,1.724,0,0,1,534.039,3502.68Zm67.366-1.76a38.794,38.794,0,0,0,4.02-24.99,39.187,39.187,0,0,0-11.956-22.32,2.341,2.341,0,0,1-.713-1.72,4,4,0,0,0-1.62-4.19,3.867,3.867,0,0,0-4.334-.17,2.176,2.176,0,0,1-1.73.07,39.341,39.341,0,0,0-27.26-3.6,37.348,37.348,0,0,0-12.959,5.53c0.484,0.74.9,1.37,1.4,2.15,0.63-.38,1.088-0.67,1.563-0.94q17.583-9.78,35.668-.96a2.48,2.48,0,0,1,1.6,2,3.663,3.663,0,0,0,4.252,2.99,2.4,2.4,0,0,1,2.416.84,36.979,36.979,0,0,1,7.395,44.05,1.961,1.961,0,0,1-2.217,1.34,5.062,5.062,0,0,0-5.243,3.87,5.252,5.252,0,0,0,8.7,5.15,4.927,4.927,0,0,0,.937-6.3A2.389,2.389,0,0,1,601.405,3500.92Zm-12-48.29a1.74,1.74,0,1,1,1.542-1.91A1.738,1.738,0,0,1,589.41,3452.63Zm7.428,56.21a2.637,2.637,0,1,1,2.585-2.65A2.668,2.668,0,0,1,596.838,3508.84Zm-45.488-11.75a21.05,21.05,0,0,0,30.638-28.87c-8-8.6-20.684-8.53-28.047-2.42,0.483,0.63.969,1.27,1.452,1.9,9.878-6.78,20.688-3.19,25.895,3.76a18.6,18.6,0,0,1-1.953,24.3,18.361,18.361,0,0,1-24.951.59c-6.293-5.4-9.347-16.03-2.083-25.72-0.6-.51-1.2-1.03-1.8-1.55C544.1,3476,543.207,3488.63,551.35,3497.09Z"
                                        transform="translate(-527 -3443)" />
                                </svg>
                            </div>
                            <div class="as_pricing as_gradient_text">
                                <sup class="as_gradient_text">$</sup>10 <sub class="as_gradient_text">/ Per Day</sub>
                            </div>
                            <h1 class="as_heading as_gradient_text">Standard Plan</h1>
                            <ul>
                                <li>Ask One Question</li>
                                <li>Half-Hour Reading</li>
                                <li class="as_inactive"> Newborn / Child <br> Reading</li>
                                <li class="as_inactive">Relationship Reading</li>
                            </ul>

                            <a href="javascript:;" class="as_btn">Choose Now</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="as_pricing_box text-center">
                            <div class="as_pric_icon">
                                <svg xmlns="http://www.w3.org/2000/svg') }}" width="78" height="75"
                                    viewBox="0 0 78 75">
                                    
                                </svg>
                            </div>
                            <div class="as_pricing as_gradient_text">
                                <sup class="as_gradient_text">$</sup>45 <sub class="as_gradient_text">/ Per Day</sub>
                            </div>
                            <h1 class="as_heading as_gradient_text">Pro Plan</h1>
                            <ul>
                                <li>Ask One Question</li>
                                <li>Half-Hour Reading</li>
                                <li class="as_inactive"> Newborn / Child <br> Reading</li>
                                <li class="as_inactive">Relationship Reading</li>
                            </ul>

                            <a href="javascript:;" class="as_btn">Choose Now</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="as_pricing_box text-center">
                            <div class="as_pric_icon">
                                <svg xmlns="http://www.w3.org/2000/svg') }}" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="85.06" height="84.94" viewBox="0 0 85.06 84.94">
                                     
                                    <path class="cls-1"
                                        d="M1343.25,3466.97a7.915,7.915,0,0,1,2.12-3.17c0.24-.12.47-0.24,0.71-0.36v-0.7c0.24-.12.47-0.24,0.71-0.35v-0.35h0.7c0.12-.24.24-0.47,0.36-0.71a7.794,7.794,0,0,1,3.17-2.11c-0.11-.59-0.23-1.18-0.35-1.76h-0.35v-0.71c-0.24-.12-0.47-0.23-0.71-0.35-0.12-.47-0.23-0.94-0.35-1.41-0.24-.12-0.47-0.23-0.71-0.35-0.23-.71-0.47-1.41-0.7-2.11-0.24-.12-0.48-0.24-0.71-0.36-0.24-.7-0.47-1.41-0.71-2.11-0.23-.12-0.47-0.23-0.7-0.35V3449c-0.51-.88-1.12-1.22-1.42-2.46,1.18-.71,2.36-1.41,3.54-2.12h0.7v-0.35h0.71v-0.35h0.7v-0.35h1.06v-0.35h0.71v-0.36q3.18-.87,6.35-1.76c1.53-.11,3.07-0.23,4.59-0.35v-0.35c1.73-.48,6.55,0,7.77.35h2.83v0.35h1.76v0.35h1.77v0.36h1.41v0.35c1.06,0.23,2.12.47,3.18,0.7v0.36h0.7v0.35h1.06v0.35c0.71,0.24,1.42.47,2.12,0.7v0.36h0.71v0.35h0.71v0.35h0.7v0.35h0.71c0.12,0.24.23,0.47,0.35,0.71h0.71v0.35h0.7c0.12,0.23.24,0.47,0.36,0.7h0.7c0.24,0.36.47,0.71,0.71,1.06h0.7c0.36,0.47.71,0.94,1.06,1.41h0.71c0.71,0.82,1.41,1.64,2.12,2.47l2.82,2.46v0.71c0.47,0.35.94,0.7,1.42,1.05v0.71h0.35c0.12,0.35.23,0.7,0.35,1.05,0.35,0.24.71,0.47,1.06,0.71,0.12,0.47.24,0.94,0.35,1.41,0.24,0.11.48,0.23,0.71,0.35,0.24,0.7.47,1.41,0.71,2.11h0.35v0.71h0.35c0.24,0.7.47,1.41,0.71,2.11h0.35v1.06h0.36v0.7h0.35v1.06h0.35v1.05h0.35c0.12,0.83.24,1.65,0.36,2.47h0.35c0.12,1.17.24,2.35,0.35,3.52h0.36v2.82c0.99,3.56.19,9.42-.71,12.33v1.76h-0.35v1.05h-0.36c-0.23,1.18-.47,2.35-0.7,3.53h-0.35v0.7h-0.36v1.06h-0.35c-0.24.7-.47,1.41-0.71,2.11h-0.35v0.7h-0.35c-0.24.71-.47,1.41-0.71,2.12-0.23.12-.47,0.23-0.71,0.35-0.11.47-.23,0.94-0.35,1.41-0.35.23-.71,0.47-1.06,0.7-0.12.36-.23,0.71-0.35,1.06h-0.35v0.7c-0.48.36-.95,0.71-1.42,1.06v0.71l-2.82,2.46c-0.71.82-1.41,1.64-2.12,2.47h-0.71c-0.35.47-.7,0.94-1.06,1.41h-0.7c-0.24.35-.47,0.7-0.71,1.05h-0.7c-0.12.24-.24,0.47-0.36,0.71-0.47.11-.94,0.23-1.41,0.35-0.12.23-.23,0.47-0.35,0.7q-4.41,1.935-8.83,3.88h-1.41v0.35h-1.06v0.35h-1.77v0.35h-1.76v0.36h-2.83v0.35c-2.36.66-9.01-.23-10.59-0.71-1.18-.11-2.35-0.23-3.53-0.35v-0.35h-1.41v-0.35h-1.06v-0.35h-1.06v-0.36h-1.06v-0.35h-0.71v-0.35h-1.06v-0.35c-0.7-.24-1.41-0.47-2.11-0.71v-0.35h-0.71v-0.35c-0.71-.24-1.41-0.47-2.12-0.71-0.12-.23-0.23-0.47-0.35-0.7-0.47-.12-0.94-0.24-1.42-0.35-0.23-.36-0.47-0.71-0.7-1.06h-0.71c-0.12-.23-0.23-0.47-0.35-0.7h-0.71c-0.35-.47-0.7-0.94-1.06-1.41h-0.7c-0.94-1.06-1.89-2.12-2.83-3.17-0.7-.59-1.41-1.18-2.12-1.76v-0.71c-0.47-.35-0.94-0.7-1.41-1.06v-0.7c-0.35-.23-0.7-0.47-1.06-0.7v-0.71c-0.23-.12-0.47-0.23-0.7-0.35l-0.36-1.41c-0.23-.12-0.47-0.23-0.7-0.35v-0.71h-0.36v-0.7h-0.35v-0.71h-0.35v-0.7h-0.35v-0.7h-0.36c-0.12-.47-0.23-0.94-0.35-1.41h-0.35c-0.12-.59-0.24-1.18-0.36-1.76h-0.35c-0.24-1.06-.47-2.12-0.71-3.17h-0.35v-1.41h-0.35v-1.76h-0.36v-1.76h-0.35v-2.82h-0.35c-0.47-1.68.02-6.22,0.35-7.4v-3.17h0.35c0.12-1.17.24-2.35,0.36-3.52h0.35c0.12-.82.24-1.64,0.35-2.47h0.36v-1.05h0.35v-1.06h0.35v-0.7h0.36v-1.06h0.35c0.23-.7.47-1.41,0.71-2.11h0.35v-0.71h0.35c0.24-.7.47-1.41,0.71-2.11,0.23-.12.47-0.24,0.7-0.35l0.36-1.41c0.23-.12.47-0.24,0.7-0.35v-0.71c0.24-.12.47-0.23,0.71-0.35,0.12-.35.23-0.71,0.35-1.06l1.41-1.05v-0.71c1.18-1.06,2.36-2.11,3.54-3.17,0.47-.59.94-1.17,1.41-1.76h0.7c0.12-.23.24-0.47,0.36-0.7a13.312,13.312,0,0,0,1.41-1.06c0.71,0.2.3-.04,0.71,0.35,0.65,0.42.75,0.99,1.41,1.41v0.35h-0.36c-0.69,1.07-.31.16-1.05,0.71-0.48.58-.95,1.17-1.42,1.76h-0.7c-0.24.35-.47,0.7-0.71,1.05-0.82.71-1.65,1.41-2.47,2.12v0.7l-1.77,1.41v0.71c-0.35.23-.7,0.46-1.06,0.7v0.7c-0.23.12-.47,0.24-0.7,0.36-0.12.35-.24,0.7-0.35,1.05,2.47,1.29,4.94,2.59,7.41,3.88,0.12,0.23.24,0.47,0.35,0.7h0.71v0.35C1342.08,3466.73,1342.67,3466.85,1343.25,3466.97Zm21.9-12.68v-11.27c-6.77-.13-12.36,2.43-16.95,4.57,0.2,0.71-.04.31,0.35,0.71,0.12,0.35.24,0.7,0.35,1.06h0.36v0.7h0.35v0.7c0.24,0.12.47,0.24,0.71,0.36,0.23,0.7.47,1.41,0.7,2.11,0.24,0.12.47,0.23,0.71,0.35v0.71h0.35v0.7h0.36c0.5,0.89.66,1.84,1.41,2.47C1355.18,3455.95,1362.11,3454.37,1365.15,3454.29Zm2.82-11.27v11.27c4.54-.01,8.48,1.69,11.65,3.17l0.36-1.41c0.23-.12.47-0.24,0.7-0.35,0.24-.71.47-1.41,0.71-2.12,0.23-.12.47-0.23,0.7-0.35v-0.7h0.36v-0.71h0.35v-0.7c0.24-.12.47-0.24,0.71-0.36,0.12-.47.23-0.93,0.35-1.4,0.24-.12.47-0.24,0.71-0.36,0.11-.58.23-1.17,0.35-1.76-1.94-.18-3.44-1.46-4.94-2.11-0.83-.12-1.65-0.24-2.48-0.35A30.424,30.424,0,0,0,1367.97,3443.02Zm9.89,4.93v1.76q-1.77,1.575-3.53,3.17c-0.36-.12-0.71-0.24-1.06-0.35a5.59,5.59,0,0,1-.36-2.12c-0.52-.56-0.38-2.07-0.35-3.17a2.625,2.625,0,0,0,1.06-.7C1375.03,3447.01,1376.45,3447.48,1377.86,3447.95Zm-22.25-1.06h4.24a2.716,2.716,0,0,0,.71,1.06c-0.12.58-.24,1.17-0.36,1.76h-0.35c-0.33,1.29,1.08,1.78.35,2.82-0.11.35-.23,0.7-0.35,1.05h-4.24a3.045,3.045,0,0,1-.7-2.46c0.66-.73.08-2.2,0-3.53A1.366,1.366,0,0,0,1355.61,3446.89Zm26.48,12.33a6.436,6.436,0,0,1,2.83,1.76c0.12,0.23.24,0.47,0.35,0.7h0.71v0.36c0.35,0.23.71,0.46,1.06,0.7v0.7c0.23,0.12.47,0.24,0.7,0.36a7.65,7.65,0,0,1,2.12,3.17c2.17-.18,3.18-1.58,4.59-2.47,0.71-.23,1.42-0.47,2.12-0.7,0.12-.24.24-0.47,0.35-0.71h0.71a10.733,10.733,0,0,0,2.47-1.76h-0.35c-0.12-.35-0.24-0.7-0.35-1.06h-0.36c-0.11-.35-0.23-0.7-0.35-1.05-0.24-.12-0.47-0.24-0.71-0.35v-0.71c-0.23-.12-0.47-0.23-0.7-0.35v-0.35c-0.36-.24-0.71-0.47-1.06-0.71v-0.7c-0.83-.71-1.65-1.41-2.47-2.12-0.24-.35-0.47-0.7-0.71-1.05h-0.71c-0.47-.59-0.94-1.18-1.41-1.76h-0.7c-0.24-.36-0.47-0.71-0.71-1.06h-0.71c-0.11-.23-0.23-0.47-0.35-0.7-0.35-.12-0.71-0.24-1.06-0.36-1.29,2.47-2.59,4.93-3.88,7.4-0.24.12-.47,0.23-0.71,0.35v0.71h-0.35C1382.33,3458.04,1382.21,3458.63,1382.09,3459.22Zm6.71-3.17h2.83c0.23,0.35.47,0.7,0.7,1.05h0.36v0.71h0.35c0.42,1.21-.96,3.31-1.41,3.52h-2.83c-0.45-.73-2.33-1.99-1.41-3.87h0.35C1388.1,3456.99,1388.45,3456.52,1388.8,3456.05Zm-43.07,4.22a37.758,37.758,0,0,1-6.01.36,5.527,5.527,0,0,1-.7-3.53c1.64-.85,3.76-0.73,6.35-0.7,0.12,0.35.24,0.7,0.36,1.06C1346.44,3458.21,1345.91,3459.41,1345.73,3460.27Zm18-3.17v0.36h-2.47v0.35h-1.41v0.35h-1.06v0.35h-1.06v0.36h-1.06v0.35c-0.47.11-.94,0.23-1.41,0.35v0.35c-0.47.12-.94,0.24-1.41,0.35-0.12.24-.24,0.47-0.36,0.71-0.47.12-.94,0.23-1.41,0.35-0.23.35-.47,0.71-0.7,1.06h-0.71c-0.94,1.05-1.88,2.11-2.82,3.17-0.48.35-.95,0.7-1.42,1.05v0.71c-0.35.23-.7,0.47-1.06,0.7v0.71h-0.35v0.7c-0.23.12-.47,0.24-0.71,0.35-0.23.71-.47,1.41-0.7,2.12h-0.36v0.7h-0.35v1.06h-0.35v1.05h-0.35v1.06h-0.36v1.41h-0.35v2.47h-0.35c-0.71,2.51.49,8,1.06,9.51,0.23,1.05.47,2.11,0.7,3.17h0.35c0.12,0.46.24,0.93,0.36,1.4h0.35c0.12,0.47.24,0.94,0.35,1.41,0.24,0.12.48,0.24,0.71,0.36v0.7c0.24,0.12.47,0.23,0.71,0.35v0.71c0.23,0.11.47,0.23,0.7,0.35v0.7l3.18,2.82c0.35,0.47.71,0.94,1.06,1.41h0.71c0.11,0.23.23,0.47,0.35,0.7,0.35,0.12.71,0.24,1.06,0.36v0.35h0.7c0.12,0.23.24,0.47,0.36,0.7,0.7,0.24,1.41.47,2.12,0.71v0.35h0.7v0.35h1.06v0.35c1.7,0.67,8.92,2.19,11.65,1.41v-0.35h2.48v-0.35h1.41v-0.35h1.06v-0.36h1.06v-0.35h1.06v-0.35c0.47-.12.94-0.24,1.41-0.35V3505c0.47-.11.94-0.23,1.41-0.35,0.12-.23.24-0.47,0.35-0.7h0.71c0.12-.24.23-0.47,0.35-0.71h0.71c0.12-.23.23-0.47,0.35-0.7h0.71c0.94-1.06,1.88-2.11,2.82-3.17,0.47-.35.94-0.7,1.42-1.06v-0.7c0.23-.12.47-0.24,0.7-0.35,0.12-.36.24-0.71,0.35-1.06h0.36v-0.7c0.23-.12.47-0.24,0.7-0.36,0.24-.7.47-1.41,0.71-2.11h0.35v-0.7h0.36v-1.06h0.35v-1.06h0.35v-1.05h0.36v-1.41h0.35v-2.47h0.35c0.63-2.25-.5-9.14-1.06-10.57h-0.35c-0.12-.7-0.24-1.4-0.35-2.11h-0.36c-0.11-.47-0.23-0.94-0.35-1.41h-0.35l-0.36-1.41c-0.23-.11-0.47-0.23-0.7-0.35v-0.7h-0.36c-0.11-.36-0.23-0.71-0.35-1.06-0.23-.12-0.47-0.23-0.7-0.35v-0.71c-0.59-.47-1.18-0.94-1.77-1.4-0.82-.94-1.65-1.88-2.47-2.82h-0.71c-0.12-.24-0.23-0.47-0.35-0.71-0.35-.11-0.71-0.23-1.06-0.35v-0.35h-0.71c-0.11-.24-0.23-0.47-0.35-0.71h-0.71v-0.35c-0.7-.23-1.41-0.47-2.11-0.7v-0.35c-1.06-.24-2.12-0.47-3.18-0.71v-0.35h-1.41v-0.35Zm2.12,2.82h1.42c0.72,1.34,3.85,5.86,3.17,8.1h-0.35c-0.12.82-.24,1.65-0.35,2.47h0.35v-0.71c0.87-.81.26-0.78,0.71-1.76h0.35c0.12-.47.23-0.94,0.35-1.41h0.36v-1.05h0.35v-0.71h0.35c0.51-1.14.15-1.69,1.06-2.46v0.35c0.59,0.12,1.18.23,1.77,0.35a3.748,3.748,0,0,1,.35,1.41c-0.79.72-.58,1.47-1.06,2.47h-0.35v1.05h-0.36c-0.35.94-.7,1.88-1.06,2.82h0.71c0.98-1.11,2.1-.78,3.53-1.41v-0.35c0.47-.12.94-0.24,1.41-0.35,0.12-.24.24-0.47,0.36-0.71l1.41-1.05c0.12-.24.23-0.47,0.35-0.71h1.77a6.7,6.7,0,0,1,.35,2.47c-1,1.02-1.18,4-2.12,5.28-0.8,1.1-2.63.99-3.53,2.47h0.71c0.72-.8.78-0.27,1.76-0.71v-0.35h0.71v-0.35q2.64-.885,5.3-1.76c0.11,0.35.23,0.7,0.35,1.05h0.35v1.06c0.22,0.45.16-.11,0.36,0.35-2.7.52-4.66,2.23-7.42,2.82,0.4,0.4,0,.14.71,0.35v0.35h1.41v0.36h0.7c0.12,0.23.24,0.47,0.36,0.7,0.59,0.12,1.18.23,1.76,0.35v0.35c2.64,0.87,4.75-1.62,4.95,2.12-1.34.72-5.88,3.85-8.12,3.17v-0.35l-2.48-.36v0.36h0.71c0.82,0.87.78,0.25,1.77,0.7v0.35c0.47,0.12.94,0.24,1.41,0.35v0.36h1.06v0.35h0.7v0.35c1.14,0.51,1.7.15,2.48,1.06h-0.36c-0.12.58-.23,1.17-0.35,1.76a3.748,3.748,0,0,1-1.41.35c-0.72-.79-1.48-0.58-2.48-1.06v-0.35h-1.05v-0.35c-0.95-.35-1.89-0.7-2.83-1.06v0.71c1.12,0.97.78,2.09,1.41,3.52h0.36c0.11,0.47.23,0.94,0.35,1.41,0.23,0.12.47,0.23,0.71,0.35l1.05,1.41c0.24,0.12.48,0.23,0.71,0.35v1.76a6.9,6.9,0,0,1-2.47.36c-1.02-1-4.02-1.19-5.3-2.12-1.1-.8-0.99-2.62-2.47-3.52v0.7c0.8,0.72.26,0.79,0.71,1.77h0.35v0.7h0.35l1.77,5.28c-0.35.12-.71,0.24-1.06,0.35v0.36h-1.06v0.35h-0.35c-0.52-2.7-2.24-4.68-2.83-7.4-0.4.4-.14,0-0.35,0.71h-0.35v1.41h-0.36v0.7c-0.23.12-.47,0.24-0.7,0.35-0.12.59-.24,1.18-0.36,1.76h-0.35c-0.86,2.64,1.63,4.74-2.12,4.93-0.72-1.33-3.86-5.86-3.18-8.1h0.36c0.12-.82.23-1.64,0.35-2.46h-0.35v0.7c-0.88.82-.26,0.78-0.71,1.76h-0.35c-0.12.47-.24,0.94-0.35,1.41h-0.36v1.06h-0.35v0.7h-0.35c-0.51,1.14-.15,1.69-1.06,2.47v-0.35l-1.77-.36a3.638,3.638,0,0,1-.35-1.4c0.79-.72.58-1.47,1.06-2.47h0.35v-1.06h0.35c0.36-.94.71-1.87,1.06-2.81h-0.7c-0.98,1.11-2.1.77-3.53,1.41v0.35c-0.47.11-.95,0.23-1.42,0.35-0.11.23-.23,0.47-0.35,0.7-0.47.36-.94,0.71-1.41,1.06-0.12.24-.24,0.47-0.35,0.71h-1.77a6.7,6.7,0,0,1-.35-2.47h0.35c0.12-.7.24-1.41,0.35-2.11h0.36v-1.06h0.35v-1.06c0.23-.11.47-0.23,0.71-0.35v-0.7c1.17-.71,2.35-1.41,3.53-2.12v-0.35h-0.71c-0.72.8-.78,0.26-1.77,0.71v0.35h-0.7v0.35c-1.77.59-3.53,1.17-5.3,1.76-0.12-.35-0.23-0.7-0.35-1.06h-0.35v-1.05h-0.36v-0.35c2.71-.52,4.69-2.24,7.42-2.82v-0.35c-0.94-.24-1.89-0.47-2.83-0.71-0.11-.23-0.23-0.47-0.35-0.7h-0.71v-0.36h-1.06v-0.35c-2.6-.86-4.78,1.62-4.94-2.11,0.94-.59,1.88-1.18,2.83-1.76,0.47-.12.94-0.24,1.41-0.35v-0.36h0.7v-0.35h1.06v-0.35c1.99-.62,3.28,1.43,4.59.35-1.29-.47-2.59-0.94-3.88-1.41v-0.35h-1.06v-0.35h-0.71v-0.35c-1.11-.5-1.77-0.23-2.47-1.06h0.36c0.11-.59.23-1.17,0.35-1.76a3.567,3.567,0,0,1,1.41-.35c0.72,0.78,1.47.58,2.47,1.05v0.35h1.06v0.36c0.94,0.35,1.89.7,2.83,1.05v-0.7c-1.12-.98-0.78-2.09-1.42-3.52h-0.35c-0.12-.47-0.23-0.94-0.35-1.41-0.24-.12-0.47-0.24-0.71-0.35-0.35-.47-0.7-0.94-1.06-1.41-0.23-.12-0.47-0.24-0.7-0.36v-1.76a6.923,6.923,0,0,1,2.47-.35c1.02,1,4.02,1.18,5.29,2.11,1.11,0.81,1,2.63,2.48,3.53v-0.71c-0.8-.72-0.27-0.78-0.71-1.76h-0.35v-0.7h-0.36c-0.58-1.76-1.17-3.53-1.76-5.29,0.35-.11.7-0.23,1.06-0.35v-0.35h1.06v-0.35h0.35c0.52,2.7,2.24,4.68,2.82,7.39,0.41-.4.15,0,0.36-0.7h0.35v-1.41h0.35v-0.7c0.24-.12.48-0.24,0.71-0.36,0.12-.58.24-1.17,0.35-1.76h0.36v-4.22A3.554,3.554,0,0,0,1365.85,3459.92Zm-38.84,21.13h11.3c-0.01-4.5,1.69-8.44,3.18-11.62-1.26-.24-1.59-0.92-2.47-1.41-0.47-.11-0.94-0.23-1.41-0.35-0.12-.23-0.24-0.47-0.36-0.7-0.7-.24-1.41-0.47-2.12-0.71-0.11-.23-0.23-0.47-0.35-0.7h-0.71v-0.35h-0.7c-0.12-.24-0.24-0.47-0.35-0.71h-0.71v-0.35c-0.71.2-.31-0.04-0.71,0.35-0.81.73-.89,1.76-1.41,2.82h-0.35v1.05A33.471,33.471,0,0,0,1327.01,3481.05Zm67.8,0h11.3a15.989,15.989,0,0,0-.71-4.93c-0.12-1.17-.24-2.34-0.35-3.52h-0.36c-0.23-1.17-.47-2.35-0.7-3.52-0.83-1.64-1.65-3.29-2.47-4.93-0.71.2-.31-0.04-0.71,0.35-0.35.12-.71,0.24-1.06,0.35v0.36h-0.71v0.35h-0.7c-0.12.23-.24,0.47-0.36,0.7-0.7.24-1.41,0.47-2.11,0.71-0.12.23-.24,0.47-0.36,0.7-0.47.12-.94,0.24-1.41,0.35-0.12.24-.24,0.47-0.35,0.71h-0.71v0.35c-0.71.4-.86,0.06-1.41,0.7C1393.13,3471.12,1394.72,3478.03,1394.81,3481.05Zm-28.96-9.86h1.06c-0.02-2.39.5-2.82,0.71-4.58h-0.35v0.71C1366.18,3468.01,1365.86,3469.42,1365.85,3471.19Zm-30.01,0v0.71c0.24,0.11.47,0.23,0.71,0.35v4.23a3.871,3.871,0,0,0-.71.7h-4.59c-0.4-.4,0-0.14-0.71-0.35a13.925,13.925,0,0,1-.35-4.23c0.4-.4.14,0,0.35-0.7,1.59-.93,1.12-1.4,3.89-1.41A1.92,1.92,0,0,0,1335.84,3471.19Zm20.13-.35c0.35,1.06.7,2.11,1.06,3.17a3.957,3.957,0,0,0,1.41.7v-0.35h0.35v-0.35C1357.36,3473.17,1357.17,3471.63,1355.97,3470.84Zm40.95,0.35h4.24c0.82,1.56.74,2.49,0.71,4.93-1.56.82-2.5,0.74-4.95,0.71A5.51,5.51,0,0,1,1396.92,3471.19Zm-19.42.71c-1.23,1.16-2.58.21-3.17,2.46h0.35v0.35c0.59-.46,1.18-0.93,1.77-1.4v-0.36h0.7v-0.35c0.35-.12.71-0.23,1.06-0.35C1377.81,3471.85,1378.21,3472.11,1377.5,3471.9Zm-44.48,1.41v1.05h0.7v-1.05h-0.7Zm31.77,0.7v0.35c-0.7.12-1.41,0.24-2.12,0.35-0.11.24-.23,0.47-0.35,0.71h-0.7c-0.12.23-.24,0.47-0.36,0.7-0.59.47-1.17,0.94-1.76,1.41v0.71c-0.24.11-.47,0.23-0.71,0.35-0.12.7-.23,1.41-0.35,2.11h-0.36a6.989,6.989,0,0,0,.36,3.52c0.12,0.71.23,1.41,0.35,2.12,0.24,0.12.47,0.23,0.71,0.35v0.7c0.23,0.12.47,0.24,0.7,0.36,0.47,0.58.94,1.17,1.42,1.76h0.7c0.12,0.23.24,0.47,0.35,0.7,0.71,0.12,1.42.24,2.12,0.35v0.36h3.53v-0.36c0.71-.11,1.42-0.23,2.12-0.35,0.12-.23.24-0.47,0.36-0.7h0.7c0.12-.24.24-0.47,0.36-0.71,0.58-.47,1.17-0.94,1.76-1.41v-0.7c0.24-.12.47-0.23,0.71-0.35v-1.06h0.35c0.96-2.44.02-6.22-1.06-7.75l-1.41-1.05c-0.24-.36-0.47-0.71-0.71-1.06h-0.7c-0.12-.24-0.24-0.47-0.36-0.71h-1.06v-0.35C1367.85,3474.25,1366.32,3474.13,1364.79,3474.01Zm1.77,9.86h-2.83v-3.52c-0.82.12-1.64,0.23-2.47,0.35a9.142,9.142,0,0,0-1.06-2.46h0.71c1.23-1.49,5.04-.58,5.65.7v4.93Zm2.82-5.63h2.83v2.81h-2.83v-2.81Zm-14.12,4.93v-1.06c-2.4.03-2.83-.49-4.59-0.7v0.35h0.71C1352.06,3482.84,1353.48,3483.16,1355.26,3483.17Zm22.6-1.41v1.06h2.82v0.35c0.59,0.12,1.18.23,1.77,0.35v-0.35c-0.35-.12-0.71-0.24-1.06-0.35v-0.36A7.9,7.9,0,0,0,1377.86,3481.76Zm-50.85,2.11a15.9,15.9,0,0,0,.71,4.93c0.12,1.18.23,2.35,0.35,3.53h0.36c0.23,1.17.47,2.34,0.7,3.52q1.245,2.46,2.47,4.93c0.71-.2.31,0.04,0.71-0.35,0.35-.12.71-0.24,1.06-0.36v-0.35h0.7v-0.35h0.71c0.12-.24.24-0.47,0.35-0.7,0.71-.24,1.42-0.47,2.12-0.71,0.12-.23.24-0.47,0.36-0.7h0.7v-0.36h0.71v-0.35c0.89-.5,1.84-0.66,2.47-1.41-1.51-1.33-3.09-8.24-3.18-11.27h-11.3Zm67.8,0c0.01,4.51-1.69,8.45-3.18,11.63,1.25,0.24,1.59.92,2.47,1.4l1.41,0.36c0.12,0.23.24,0.47,0.36,0.7,0.7,0.24,1.41.47,2.11,0.71,0.12,0.23.24,0.46,0.36,0.7h0.7v0.35h0.71c0.12,0.24.23,0.47,0.35,0.71h0.71v0.35c0.71-.2.3,0.04,0.71-0.35,0.81-.73.89-1.76,1.41-2.82h0.35v-1.06a32.614,32.614,0,0,0,2.83-12.68h-11.3Zm-31.08,1.41h5.65v2.82h-5.65v-2.82Zm-31.07,1.41h3.53c0.69,1.29.74,2.08,0.71,4.23h-1.77c-0.7,1.05-1.41,2.11-2.11,3.17-0.71-.21-0.31.04-0.71-0.36-1-.24-1.02-0.62-1.77-1.05,0.12-.35.24-0.71,0.36-1.06C1332.57,3490.67,1332.73,3489.35,1332.66,3486.69Zm64.26,2.47h0.71c0.12-.24.24-0.47,0.35-0.71,1.18,0.12,2.36.24,3.54,0.35,0.79,1.36,1.07,1.11,1.05,3.53h-0.35c-0.12.35-.23,0.7-0.35,1.05h-0.71c-2.4,1.29-4.88.38-4.94-2.82A1.916,1.916,0,0,0,1396.92,3489.16Zm-38.84,1.05a6.252,6.252,0,0,1-3.17,2.47v0.35h0.7v-0.35h1.06v-0.35h1.06c0.12-.24.24-0.47,0.35-0.71h0.36C1359.01,3490.85,1358.71,3490.68,1358.08,3490.21Zm16.6,0c-0.12.24-.24,0.47-0.35,0.71,0.59,0.47,1.17.94,1.76,1.41v0.7h0.36c0.11,0.35.23,0.7,0.35,1.06h0.35v-0.71a8.4,8.4,0,0,1-1.06-2.46A3.964,3.964,0,0,0,1374.68,3490.21Zm-8.47,3.52c0.02,2.4-.5,2.83-0.71,4.58h0.35v-0.7c1.09-.69,1.41-2.1,1.42-3.88h-1.06Zm-15.19,11.98a7.794,7.794,0,0,1-3.17-2.11c-0.12-.24-0.24-0.47-0.36-0.71h-0.7c-0.12-.23-0.24-0.47-0.36-0.7h-0.35v-0.71c-0.24-.11-0.47-0.23-0.71-0.35a7.814,7.814,0,0,1-2.12-3.17c-2.16.18-3.18,1.58-4.59,2.47-0.7.23-1.41,0.47-2.11,0.7-0.12.24-.24,0.47-0.36,0.7h-0.7a10.77,10.77,0,0,0-2.47,1.77,4.579,4.579,0,0,1,.7,1.05h0.35v0.71c0.36,0.23.71,0.47,1.06,0.7v0.71c0.59,0.47,1.18.94,1.77,1.4v0.71l2.47,2.11c0.24,0.35.47,0.71,0.71,1.06h0.7c0.47,0.59.94,1.17,1.42,1.76h0.7c0.24,0.35.47,0.7,0.71,1.06h0.7c0.12,0.23.24,0.47,0.36,0.7,0.35,0.12.7,0.24,1.06,0.35,1.29-2.46,2.59-4.93,3.88-7.39,0.24-.12.47-0.24,0.71-0.36v-0.7h0.35C1350.79,3506.88,1350.91,3506.3,1351.02,3505.71Zm38.84-7.75a7.715,7.715,0,0,1-2.12,3.17c-0.23.12-.47,0.24-0.7,0.35v0.71c-0.24.11-.47,0.23-0.71,0.35v0.35h-0.7c-0.12.24-.24,0.47-0.36,0.71a7.862,7.862,0,0,1-3.18,2.11c0.18,2.16,1.58,3.17,2.48,4.58,0.23,0.7.47,1.41,0.7,2.11,0.24,0.12.47,0.24,0.71,0.35v0.71a10.981,10.981,0,0,0,1.76,2.46,4.866,4.866,0,0,1,1.06-.7v-0.35h0.71c0.24-.36.47-0.71,0.71-1.06h0.7c0.47-.59.94-1.17,1.41-1.76h0.71c0.71-.82,1.41-1.64,2.12-2.47,0.35-.23.71-0.47,1.06-0.7v-0.71c0.35-.23.7-0.46,1.06-0.7v-0.35c0.23-.12.47-0.24,0.7-0.35v-0.71c0.24-.12.47-0.23,0.71-0.35,0.12-.35.24-0.71,0.35-1.06h0.36c0.11-.35.23-0.7,0.35-1.05a0.621,0.621,0,0,0,.35-0.36l-7.41-3.87c-0.12-.24-0.24-0.47-0.36-0.7h-0.7v-0.36C1391.04,3498.2,1390.45,3498.08,1389.86,3497.96Zm-50.49,11.27a12.4,12.4,0,0,1,0-4.93c0.35-.23.71-0.47,1.06-0.7v-0.36h0.71v-0.35c3.48-1.26,5.69,3.62,4.23,5.99-0.64,1.04-3.58.79-5.29,0.7C1339.67,3509.18,1340.08,3509.44,1339.37,3509.23Zm50.85-6.34c1.48,0.23,2.48.71,2.82,2.11h0.35v2.47c-1.84,1.62-1.59,2.65-4.59,1.41a6.952,6.952,0,0,1-1.06-3.52c0.7-.6.31-0.86,0.71-1.41h0.35c0.12-.24.24-0.47,0.36-0.71h1.06v-0.35Zm-48.38,2.82v1.06h0.71v-1.06h-0.71Zm23.31,16.2v-11.27c-4.52.01-8.47-1.69-11.66-3.17-0.24,1.25-.92,1.59-1.41,2.47-0.12.47-.23,0.94-0.35,1.4-0.24.12-.47,0.24-0.71,0.36-0.23.7-.47,1.41-0.7,2.11-0.24.12-.47,0.23-0.71,0.35v0.71h-0.35v0.7c-0.24.12-.47,0.24-0.71,0.35v0.71h-0.35c0.2,0.71-.04.3,0.35,0.7,0.98,1.09,2.39,1.16,3.89,1.76v0.36h1.05A30.962,30.962,0,0,0,1365.15,3521.91Zm2.82-11.27v11.27a25.339,25.339,0,0,0,8.48-1.41h1.05v-0.35c0.83-.12,1.65-0.23,2.48-0.35v-0.35h0.7v-0.36h1.06v-0.35c0.59-.29,2.95-1.03,3.18-1.41v-0.7h-0.35v-0.71c-0.24-.11-0.47-0.23-0.71-0.35v-0.7h-0.35v-0.71c-0.24-.12-0.47-0.23-0.71-0.35v-0.7h-0.35v-0.71h-0.36v-0.7c-0.23-.12-0.47-0.24-0.7-0.36-0.24-.7-0.47-1.4-0.71-2.11-0.23-.12-0.47-0.23-0.7-0.35-0.42-.64.01-0.8-0.71-1.41C1377.89,3509.02,1371.07,3510.55,1367.97,3510.64Zm-7.41,4.58h0.7v2.82h-6.71a7.232,7.232,0,0,1-.35-2.82h1.06v-2.47c1.04-.63,2.39-2.27,4.24-1.05v0.35c0.23,0.12.47,0.23,0.7,0.35v0.71h0.36v2.11Zm12.71-3.17c1.17,0.12,2.35.23,3.53,0.35a4.21,4.21,0,0,0,.7.71v0.7h0.36v4.23c-0.36.11-.71,0.23-1.06,0.35-0.9.84-3.95,0.2-4.94,0a13.586,13.586,0,0,1-.36-4.23h0.36C1372.14,3513.03,1372.76,3512.91,1373.27,3512.05Zm1.06,2.82v1.05h0.7v-1.05h-0.7Z"
                                        transform="translate(-1323.97 -3440)" />
                                </svg>
                            </div>
                            <div class="as_pricing as_gradient_text">
                                <sup class="as_gradient_text">$</sup>80 <sub class="as_gradient_text">/ Per Day</sub>
                            </div>
                            <h1 class="as_heading as_gradient_text">Premium Plan</h1>
                            <ul>
                                <li>Ask One Question</li>
                                <li>Half-Hour Reading</li>
                                <li> Newborn / Child <br> Reading</li>
                                <li>Relationship Reading</li>
                            </ul>

                            <a href="javascript:;" class="as_btn">Choose Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

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

@extends('frontend.layouts.master')
@section('title', 'About')
@section('content')
    <div>
        <!--===== #/HEADER =====-->
        <!-- About us -->
        <section id="about_page_three" class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="text-uppercase"> {{ $AboutMenuModel->Men_ShortDesc ?? 'N/A' }}</span></h2>
                        <div class="line_1"></div>
                        <div class="line_2"></div>
                        <div class="line_3"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="about_text mt-30">
                            <p> {!! $AboutMenuModel->Men_FullDesc ?? 'N/A' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
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
        <!-- /#About us -->
        <!-- Call to action -->
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12">
                    <div class="call-to-action-img">
                        <img src="{{ asset('assets/frontend/images/about-page-3.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
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
        @if (!$ServicesModel->isEmpty())
            <section id="our-services" class="we_are padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase">What We <span class="color_red">Do</span></h2>
                            <div class="line_1"></div>
                            <div class="line_2"></div>
                            <div class="line_3"></div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($ServicesModel as $value)
                            <div class="col-md-4 col-sm-4 top40">
                                <div class="feature_box equal-height">
                                    <span class="icon"><i class="{{ $value->Pag_URL }}"></i></span>
                                    <div class="description">
                                        <h4>{{ $value->Pag_Name }}</h4>
                                        <p>{{ Str::limit($value->Pag_ShortDesc, 70) }}</p>
                                        @if ($value->Pag_FullDesc)
                                            <a href="{{ URL::to('/service-details/' . encodeId($value->Pag_Id)) }}"
                                                class="link_arrow top20">Read More</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </section>
        @endif
    </div>
    <script>
        $(document).ready(function() {
            $('.as_customer_img').click(function() {
                var targetModal = $(this).attr('data-target');
                $(targetModal).modal('show');
            });
        });
    </script>
@endsection

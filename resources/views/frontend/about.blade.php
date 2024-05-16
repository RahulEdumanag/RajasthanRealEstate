@extends('frontend.layouts.master')
@section('title', 'About')
@section('content')
<div>
<!--===== #/HEADER =====--> 
<!-- About us -->
<section id="about_page_three" class="padding">
  <div class="container">
      <div class="row">
        <div class="col-xs-12 bottom40">
          <h2 class="text-uppercase">Company <span class="color_red">overview</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>
        </div>
      </div>
      <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="about_text">
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything.</p>
                </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="row about_image">
                  <div class="col-md-6">
                      <div class="single-effect3">
                        <a href="#">
                             <img src="{{ asset('assets/frontend/images/about-1.jpg') }}" alt="img"></a>
                          <div class="info">
                            <h4>30% Discount</h4> 
                            <p>Only 15 days</p>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-effect3">
                        <a href="#"><img src="{{ asset('assets/frontend/images/about-2.jpg') }}" alt="img"></a>
                          <div class="info">
                            <h4>30% Discount</h4> 
                            <p>Only 15 days</p>
                          </div>         
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
              <div class="about_text mt-30">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
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
          <a href="#" class="link_arrow white_border top10">View All Listing</a>
        </div>
      </div>
    </div>
  </div>
</section> 
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
      <div class="col-md-4 col-sm-4 top40">
        <div class="feature_box equal-height">
          <span class="icon"> <i class="icon-select-an-objecto-tool"></i></span>
          <div class="description">
            <h4>Wide Range of Properties</h4>
            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
            <a href="#" class="link_arrow top20">Read More</a> 
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 top40">
        <div class="feature_box equal-height">
          <span class="icon"><i class="icon-user-tie"></i></span>
          <div class="description">
            <h4>14 Agents for Your Service</h4>
            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
            <a href="#" class="link_arrow top20">Read More</a> 
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 top40">
        <div class="feature_box equal-height">
          <span class="icon"><i class="fa fa-money"></i></span>
          <div class="description">
            <h4>Best Price Guarantee!</h4>
            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
            <a href="#" class="link_arrow top20">Read More</a> 
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-4 top40">
        <div class="feature_box equal-height">
          <span class="icon"> <i class="icon-select-an-objecto-tool"></i></span>
          <div class="description">
            <h4>Wide Range of Properties</h4>
            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
            <a href="#" class="link_arrow top20">Read More</a> 
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 top40">
        <div class="feature_box equal-height">
          <span class="icon"><i class="icon-user-tie"></i></span>
          <div class="description">
            <h4>14 Agents for Your Service</h4>
            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
            <a href="#" class="link_arrow top20">Read More</a> 
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 top40">
        <div class="feature_box equal-height">
          <span class="icon"><i class="fa fa-money"></i></span>
          <div class="description">
            <h4>Best Price Guarantee!</h4>
            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
            <a href="#" class="link_arrow top20">Read More</a> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 
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

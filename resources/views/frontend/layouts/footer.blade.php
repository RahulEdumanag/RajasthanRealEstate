<?php
use App\Models\WebInfo;
use App\Models\Page;
use App\Models\SubMenu;
use App\Models\Menu;
use App\Models\City;
use App\Models\PropertyType;

$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();
$MenuModel = Menu::where('tbl_menu.Men_Reg_Id', '=', $clientId)->where('Men_Status', '=', '0')->orderBy('Men_SerialOrder', 'asc')->get();
$SubMenuModel = SubMenu::where(['SubMen_Reg_Id' => $clientId])
    ->where('SubMen_Status', '=', '0')
    ->orderBy('SubMen_SerialOrder', 'asc')
    ->get();
$SocialLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('Pag_Status', '=', '0')->where('tbl_pagecategory.PagCat_Name', 'SocialLink')->orderBy('tbl_page.Pag_SerialOrder', 'asc')->get();
$ServiceModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('Pag_Status', '=', '0')->where('tbl_pagecategory.PagCat_Name', 'Service')->orderBy('tbl_page.Pag_SerialOrder', 'asc')->get();
$usefulLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->orderBy('Pag_SerialOrder', 'asc')->where('tbl_pagecategory.PagCat_Name', '=', 'UsefulLink')->where('tbl_page.Pag_Reg_Id', '=', $clientId)->where('Pag_Status', '=', '0')->orderBy('tbl_page.Pag_SerialOrder', 'asc')->get();
$CityModel = City::where('Cit_Status', '=', 0)
    ->whereHas('properties', function ($q) {
        $q->where('PStatus', '=', '0'); // Ensure properties are active
    })
    ->get();

?>
<style>
    .footerLogo {
        width: 80%;
    }

    @media (max-width: 767px) {
        .footerLogo {
            width: 175px !important;
        }
    }
</style>
<section id="contact" class="bg-color-red">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="get-tuch">
                    <i class="icon-telephone114"></i>
                    <ul>
                        <li>
                            <h4>Phone Number</h4>
                        </li>
                        <li>
                            <p>{{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="get-tuch">
                    <i class="icon-icons74"></i>
                    <ul>
                        <li>
                            <h4> Address</h4>
                        </li>
                        <li>
                            <p>{{ $WebInfoModel->WebInf_Address ?? 'N/A' }}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="get-tuch">
                    <i class="icon-icons142"></i>
                    <ul>
                        <li>
                            <h4>Email Address</h4>
                        </li>
                        <li><a href="#.">
                                <p>{{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}</p>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container pt-70 pb-40">
    <div class="row border-bottom">
        <div class="col-sm-6 col-md-3">
            <div class="widget dark">
                <img class="mt-5 mb-20 footerLogo" alt=""
                    src="{{ env('Web_CommonURl') }}{{ $WebInfoModel->WebInf_FooterLogo ?? 'N/A' }}">
                <p> {{ $WebInfoModel->WebInf_Address ?? 'N/A' }}</p><br />
                <ul class="list-inline mt-5">
                    <li class="m-0 pl-10 pr-10">
                        <i class="fa fa-phone text-theme-color-2 mr-5"></i>
                        <a class="text-gray" href="#"> {{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}</a>
                    </li><br />
                    <li class="m-0 pl-10 pr-10">
                        <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i>
                        <a class="text-gray" href="#"> {{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="widget dark">
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
        <!-- <div class="col-sm-6 col-md-3">
            <div class="widget dark">
                <h4 class="widget-title">Quick Links</h4>
                <div class="small-title">
                    <div class="line1 background-color-white"></div>
                    <div class="line2 background-color-white"></div>
                    <div class="clearfix"></div>
                </div>
                <ul class="list angle-double-right list-border">
                    @foreach ($MenuModel as $value)
@if ($value->Men_URL !== null && $value->Men_URL !== '#')
<li> <a href="{{ $value->Men_URL }}"> {{ $value->Men_Name }} </a></li>
@endif
@endforeach
                </ul>
            </div>
        </div> -->
        @if (!$usefulLinkModel->isEmpty())

            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h4 class="widget-title ">Use FulLinks</h4>
                    <div class="small-title">
                        <div class="line1 background-color-white"></div>
                        <div class="line2 background-color-white"></div>
                        <div class="clearfix"></div>
                    </div>
                    <ul class="list list-border">
                        @foreach ($usefulLinkModel as $model)
                            <li><a
                                    href="{{ route('usefullLink.view', encodeId($model->Pag_Id)) }}">{{ $model->Pag_Name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="col-sm-6 col-md-6">
            <div class="widget dark">
                <h4 class="widget-title">All Cities</h4>
                <div class="small-title">
                    <div class="line1 background-color-white"></div>
                    <div class="line2 background-color-white"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="opening-hourse">
                    @foreach ($CityModel as $value)
                        <a href="{{ route('property', ['location' => encodeId($value->Cit_Id)]) }}">
                            {{ $loop->first ? '' : '|' }} Properties in {{ $value->Cit_Name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>



    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div
                    class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                    <div style="text-align: center;">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script> <a href="/">{{ $WebInfoModel->WebInf_Name }}</a>, made with ❤️
                        by
                        <a href="https://edumanag.com/" target="_blank" class="fw-medium">Edumanag</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Custom JS -->
<script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootsnav.js') }}"></script>
<!--To View on scroll-->
<script src="{{ asset('assets/frontend/js/jquery.appear.js') }}"></script>
<!--Owl Slider-->
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<!--Parallax-->
<script src="{{ asset('assets/frontend/js/parallaxie.js') }}"></script>
<!--Fancybox-->
<script src="{{ asset('assets/frontend/js/jquery.fancybox.min.js') }}"></script>
<!--Cube Gallery-->
<script src="{{ asset('assets/frontend/js/cubeportfolio.min.js') }}"></script>
<!--Bootstrap Dropdown-->
<script src="{{ asset('assets/frontend/js/bootstrap-select.js') }}"></script>
<!--Video Popup-->
<script src="{{ asset('assets/frontend/js/videobox/video.js') }}"></script>
<!--Datepicker-->
<script src="{{ asset('assets/frontend/js/datepicker.js') }}"></script>
<!--Dropzone-->
<script src="{{ asset('assets/frontend/js/dropzone.min.js') }}"></script>
<!--Wow animation-->
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<!--Rang Slider-->
<script src="{{ asset('assets/frontend/js/range-Slider.min.js') }}"></script>
<!--Checkbox-->
<script src="{{ asset('assets/frontend/js/selectbox-0.2.min.js') }}"></script>
<!--Checkbox-->
<script src="{{ asset('assets/frontend/js/scrollreveal.min.js') }}"></script>
<!--Checkbox-->
<script src="{{ asset('assets/frontend/js/jquery-countTo.js') }}"></script>
<!--Checkbox-->
<script src="{{ asset('assets/frontend/js/jquery.typewriter.js') }}"></script>
<!--Checkbox-->
<script src="{{ asset('assets/frontend/js/death.min.js') }}"></script>
<!--Revolution Slider-->
<script src="{{ asset('assets/frontend/js/themepunch/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/themepunch/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/themepunch/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/themepunch/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/themepunch/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/themepunch/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/themepunch/revolution.extension.video.min.js') }}"></script>
<!--Custom Js -->
<script src="{{ asset('assets/frontend/js/functions.js') }}"></script>
<!--Maps & Markers-->
<script src="{{ asset('assets/frontend/js/form.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom-map.js') }}"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U">
</script>
<script src="{{ asset('assets/frontend/js/gmaps.js') }}"></script>
<script src="{{ asset('assets/frontend/js/contact.js') }}"></script>
<!--===== #/REQUIRED JS =====-->

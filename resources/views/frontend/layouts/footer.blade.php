<?php
use App\Models\WebInfo;
use App\Models\Page;
use App\Models\SubMenu;
use App\Models\Menu;
$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();
$MenuModel = Menu::where('tbl_menu.Men_Reg_Id', '=', $clientId)->where('Men_Status', '=', '0')->orderBy('Men_SerialOrder', 'asc')->get();
$SubMenuModel = SubMenu::where(['SubMen_Reg_Id' => $clientId])
    ->where('SubMen_Status', '=', '0')
    ->orderBy('SubMen_SerialOrder', 'asc')
    ->get();
$SocialLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('Pag_Status', '=', '0')->where('tbl_pagecategory.PagCat_Name', 'SocialLink')->orderBy('tbl_page.Pag_SerialOrder', 'asc')->get();
$ServiceModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('Pag_Status', '=', '0')->where('tbl_pagecategory.PagCat_Name', 'Service')->orderBy('tbl_page.Pag_SerialOrder', 'asc')->get();
?>
<div class="container pt-70 pb-40">
    <div class="row border-bottom">
        <div class="col-sm-6 col-md-3">
            <div class="widget dark">
                <img class="mt-5 mb-20" alt="" src="images/k_logo.png">
                <p>Babu Molalla kasier gunj Ajmer</p><br />
                <ul class="list-inline mt-5">
                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-color-2 mr-5"></i> <a class="text-gray"
                            href="#">+91-8005842231</a> </li>
                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <a
                            class="text-gray" href="#">ajmerproperty25@gmail.com</a> </li>
                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-color-2 mr-5"></i> <a
                            class="text-gray" href="#">www.rajasthanrealestate.com</a> </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="widget dark">
                <h4 class="widget-title">Quick Links</h4>
                <div class="small-title">
                    <div class="line1 background-color-white"></div>
                    <div class="line2 background-color-white"></div>
                    <div class="clearfix"></div>
                </div>
                <ul class="list angle-double-right list-border">
                    <li> <a href="#">Home </a></li>
                    <li> <a href="#">Services </a></li>
                    <li> <a href="#">Pages</a></li>
                    <li> <a href="#">About Us </a></li>
                    <li> <a href="#">Blogs </a></li>
                    <li> <a href="#">Portfolio </a></li>
                    <li> <a href="#">Contact Us </a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="widget dark">
                <h4 class="widget-title ">Use Full Links</h4>
                <div class="small-title">
                    <div class="line1 background-color-white"></div>
                    <div class="line2 background-color-white"></div>
                    <div class="clearfix"></div>
                </div>
                <ul class="list list-border">
                    <li><a href="#">About</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Our team</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="widget dark">
                <h4 class="widget-title">Opening Hours</h4>
                <div class="small-title">
                    <div class="line1 background-color-white"></div>
                    <div class="line2 background-color-white"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="opening-hourse">
                    <ul class="list-border">
                        <li class="clearfix">
                            <span> Mon - Tues : </span>
                            <div class="value pull-right"> 6.00 am - 10.00 pm </div>
                        </li>
                        <li class="clearfix">
                            <span> Wednes - Thurs :</span>
                            <div class="value pull-right"> 8.00 am - 6.00 pm </div>
                        </li>
                        <li class="clearfix">
                            <span> Fri : </span>
                            <div class="value pull-right"> 3.00 pm - 8.00 pm </div>
                        </li>
                        <li class="clearfix">
                            <span> Sun : </span>
                            <div class="value pull-right"> Closed </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-30">
        <div class="col-md-3 col-sm-4">
            <div class="widget dark">
                <h5 class="widget-title mb-10">Call Us Now</h5>
                <div class="text-gray">
                    +91-8005842231
                    <br> +91-9351728335
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="widget dark">
                <h5 class="widget-title mb-10">Connect With Us</h5>
                <ul class="socials">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-sm-4 text-right">
            <div class="mb20">
                <form class="padding-top-30">
                    <input class="search" placeholder="Enter your Email" type="search">
                    <a href="#" class="button"><i class="icon-mail-envelope-open"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom bg-black-333">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-5">
                <p class="font-11 text-black-777 m-0 copy-right">Copyright: 2024 <a href="#"><span
                            class="color_red">Kuber Properties & Builders</span></a>. All Rights Reserved</p>
            </div>
            <div class="col-md-6 col-sm-7 text-right">
                <div class="widget no-border m-0">
                    <ul class="list-inline sm-text-center mt-5 font-12">
                        <li> <a href="#">FAQ</a> </li>
                        <li>|</li>
                        <li> <a href="#">Help Desk</a> </li>
                        <li>|</li>
                        <li> <a href="#">Support</a> </li>
                    </ul>
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

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

<style>
    .footer-two .footer-menu ul li a:before {

        content: "" !important;

    }

    pre {
        overflow: hidden;
    }
</style>


<section class="as_footer_wrapper as_padderTop80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="as_know_sign_wrapper as_padderBottom50 as_padderTop100" style="display:none;">
                    <div class="row">
                        <div class="col-lg-4">
                            <h1 class="as_heading as_heading_center">Zodiac Sign Finder</h1>
                        </div>
                        <div class="col-lg-8">
                            <div class="as_sign_form text-left">
                                <ul>
                                    <li class="as_form_box">
                                        <div class="as_input_feild as_select_box">
                                            <select class="form-control" data-placeholder="Date">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="as_form_box">
                                        <div class="as_input_feild as_select_box">
                                            <select class="form-control" data-placeholder="Month">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="as_form_box">
                                        <div class="as_input_feild as_select_box">
                                            <select class="form-control" data-placeholder="Year">
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="as_form_box">
                                        <a href="javascript:;" class="as_btn">Submit</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="as_footer_inner as_padderTop10 as_padderBottom40">
                    <div class="row" style="width:100%;">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="as_footer_widget">
                                <div class="as_footer_logo">
                                    <a href="{{ URL::to('/contact') }}">
                                        <!-- <img src="assets/images/logo1.svg" alt=""> -->
                                        <img src="{{ env('Web_CommonURl') }}{{ $WebInfoModel->WebInf_FooterLogo ?? 'N/A' }}"
                                            alt="" style="height:75px;">
                                    </a>
                                </div>
                                <!-- <p>There are many variations of this passages of Lorem Ipsum.</p> -->

                                <ul class="as_contact_list">
                                    <li>
                                        <i class="fas fa-map-marker-alt" style="margin-right: 15px;"></i>

                                        <p>
                                            <pre>{{ $WebInfoModel->WebInf_Address ?? 'N/A' }}</pre>
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone" style="margin-right: 15px;"></i>

                                        <p>
                                            {{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}
                                            </a>
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope" style="margin-right: 15px;"></i>

                                        <p>
                                            {{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="as_footer_widget">
                                <h3 class="as_footer_heading">Quick Links</h3>

                                <ul>
                                    @foreach ($MenuModel as $model)
                                        <li><a href="{{ $model->Men_URL }}"> {{ $model->Men_Name }} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="as_footer_widget">
                                <h3 class="as_footer_heading">Our Services</h3>

                                <ul>
                                    @foreach ($ServiceModel as $model)
                                        <li> <a href="{{ URL::to('/contact') }}">{{ $model->Pag_Name }}</a> </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="as_footer_widget">
                                <h3 class="as_footer_heading">Follow Us</h3>
                                <div class="as_share_box">
                                    <!-- <p>Follow Us</p> -->
                                    <ul>
                                        @foreach ($SocialLinkModel as $model)
                                            <li>
                                                <a href="{{ $model->Pag_URL }}"
                                                    target="_blank">{!! $model->Pag_Image !!}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- <p>Lorem ipsum dolor amet, consectetur adipiscing elit,sed eiusmod tempor. </p>

                                        <div class="as_newsletter_wrapper">
                                                <div class="as_newsletter_box">
                                                    <input type="text" name="" id="" class="form-control" placeholder="Email...">
                                                    <a href="javascript:;" class="as_btn">
                                                        <img src="assets/images/svg/plane.svg" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="as_login_data">
                                                <label>I agree that my submitted data is
                                                    being collected and stored.
                                                    <input type="checkbox" name="as_remember_me" value="">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="as_copyright_wrapper text-center">
                    <p>Copyright &copy; 2024 <a href="/">Jyodik Astro Gemstone (opc) Pvt. Ltd</a>. All Right
                        Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  ALl JS Plugins
    ====================================== -->




<script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/plugin/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/plugin/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/plugin/countto/jquery.countTo.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/plugin/airdatepicker/datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/plugin/airdatepicker/i18n/datepicker.en.js') }}">
</script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
<!-- Custom JS -->

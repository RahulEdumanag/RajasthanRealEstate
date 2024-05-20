<?php
use App\Models\WebInfo;
use App\Models\SubMenu;
use App\Models\Menu;
use App\Models\Page;
$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();
$MenuModel = Menu::where('tbl_menu.Men_Reg_Id', '=', $clientId)->where('Men_Status', '=', '0')->orderBy('Men_SerialOrder', 'asc')->get();
$SubMenuModel = SubMenu::where(['SubMen_Reg_Id' => $clientId])
    ->where('SubMen_Status', '=', '0')
    ->orderBy('SubMen_SerialOrder', 'asc')
    ->get();
$SocialLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('Pag_Status', '=', '0')->where('tbl_pagecategory.PagCat_Name', 'SocialLink')->orderBy('Pag_SerialOrder', 'asc')->get();
$AnnouncementModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('tbl_pagecategory.PagCat_Name', 'Announcement')->where('Pag_Status', '=', '0')->orderBy('tbl_page.Pag_CreatedDate', 'asc')->get();
?>
<div id="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <p class="p-font-15 p-white">We are Best in Town With 40 years of Experience.</p>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12 text-right">
                <div class="header-top-links">
                    <ul>
                        <li><a href="#">OPENING HOURS:{{ $WebInfoModel->WebInf_openingHours ?? 'N/A' }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-2 hidden-xs hidden-sm"><a href="/"><img
                        src="{{ env('Web_CommonURl') }}{{ $WebInfoModel->WebInf_HeaderLogo ?? 'N/A' }}"
                        alt="logo" /></a></div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <div class="get-tuch text-left top20">
                    <i class="icon-telephone114"></i>
                    <ul>
                        <li>
                            <h4>Phone Number</h4>
                        </li>
                        <li>
                            <p> {{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}</p>
                        </li>
                    </ul>
                </div>
                <div class="get-tech-line top20"><img src="{{ asset('assets/frontend/images/get-tuch-line.png') }}"
                        alt="line" /></div>
                <div class="get-tuch text-left top20">
                    <i class="icon-icons74"></i>
                    <ul>
                        <li>
                            <h4>Address</h4>
                        </li>
                        <li>
                            <p> {{ $WebInfoModel->WebInf_Address ?? 'N/A' }}</p>
                        </li>
                    </ul>
                </div>
                <div class="get-tech-line top20"><img src="{{ asset('assets/frontend/images/get-tuch-line.png') }}"
                        alt="line" /></div>
                <div class="get-tuch text-left top20">
                    <i class=" icon-icons142"></i>
                    <ul>
                        <li>
                            <h4>Email Address</h4>
                        </li>
                        <li>
                            <p><a href="#"> {{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="social-icons text-right">
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
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i></button>
                    <a class="navbar-brand sticky_logo" href="/">
                        <img src="{{ env('Web_CommonURl') }}{{ $WebInfoModel->WebInf_HeaderLogo ?? 'N/A' }}"
                            class="logo" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="/">Home</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#." class="dropdown-toggle" data-toggle="dropdown">Showcase</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-2">
                                            <h5 class="title">Showcase List</h5>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="#">Properties List</a></li>
                                                    <li><a href="#">Single Property</a></li>
                                                    <li><a href="#">Search by City</a></li>
                                                    <li><a href="#">Search by Category</a></li>
                                                    <li><a href="#">Search by Type</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-8">
                                            <div class="row">
                                                <div id="nav_slider" class="owl-carousel">
                                                    <div class="item">
                                                        <div class="image bottom15">
                                                            <img src="images/nav-slider1.jpg" alt="Featured Property">
                                                            <span class="nav_tag yellow text-uppercase">for rent</span>
                                                        </div>
                                                        <h4><a href="#.">Park Avenue Apartment</a></h4>
                                                        <p>Towson London, MR 21501</p>
                                                    </div>
                                                    <div class="item">
                                                        <div class="image bottom15">
                                                            <img src="images/nav-slider2.jpg" alt="Featured Property">
                                                            <span class="nav_tag yellow text-uppercase">for rent</span>
                                                        </div>
                                                        <h4><a href="#.">Park Avenue Apartment</a></h4>
                                                        <p>Towson London, MR 21501</p>
                                                    </div>
                                                    <div class="item">
                                                        <div class="image bottom15">
                                                            <img src="images/nav-slider3.jpg" alt="Featured Property">
                                                            <span class="nav_tag yellow text-uppercase">for rent</span>
                                                        </div>
                                                        <h4><a href="#.">Park Avenue Apartment</a></h4>
                                                        <p>Towson London, MR 21501</p>
                                                    </div>
                                                    <div class="item">
                                                        <div class="image bottom15">
                                                            <img src="images/nav-slider1.jpg" alt="Featured Property">
                                                            <span class="nav_tag yellow text-uppercase">for rent</span>
                                                        </div>
                                                        <h4><a href="#.">Park Avenue Apartment</a></h4>
                                                        <p>Towson London, MR 21501</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @foreach ($MenuModel as $key => $value)
                            @if ($value->Men_Name != 'Home')
                                <li class="" @if ($key !== 0) style="" @endif>
                                    @if ($value->Men_SubMenuExists == 'on')
                                        @php
                                            $subMenuItems = $SubMenuModel->where('SubMen_Men_Id', $value->Men_Id);
                                        @endphp
                                        @if ($subMenuItems->isNotEmpty())
                                <li class="dropdown">
                                    @php
                                        $menuUrl = $value->Men_URL
                                            ? URL::to($value->Men_URL)
                                            : route('showDetails', [
                                                'type' => 'menu',
                                                'id' => encodeId($value->Men_Id),
                                            ]);
                                    @endphp
                                    <a class=" dropdown-toggle" href="{{ $menuUrl }}"
                                        id="navbarDropdown{{ $value->Men_Id }}" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $value->Men_Name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown">
                                            @foreach ($subMenuItems as $submenu)
                                                <a class="dropdown-item"
                                                    href="{{ $submenu->SubMen_URL ? URL::to($submenu->SubMen_URL) : route('showSubMenuDetails', ['type' => 'submenu', 'id' => encodeId($submenu->SubMen_Id)]) }}
                                                         ">{{ $submenu->SubMen_Name }}</a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="">
                                    <a class=""
                                        href="{{ $value->Men_URL ? URL::to($value->Men_URL) : route('showDetails', ['type' => 'menu', 'id' => encodeId($value->Men_Id)]) }}">
                                        {{ $value->Men_Name }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="">
                                <a class=""
                                    href="{{ $value->Men_URL ? URL::to($value->Men_URL) : route('showDetails', ['type' => 'menu', 'id' => encodeId($value->Men_Id)]) }}">
                                    {{ $value->Men_Name }}
                                </a>
                            </li>
                        @endif
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

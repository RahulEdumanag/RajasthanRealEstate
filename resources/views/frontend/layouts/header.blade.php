<?php
use App\Models\WebInfo;
use App\Models\SubMenu;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Property;
use App\Models\City;
use App\Models\PropertyType;
$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();
$MenuModel = Menu::where('tbl_menu.Men_Reg_Id', '=', $clientId)->where('Men_Status', '=', '0')->orderBy('Men_SerialOrder', 'asc')->get();
$SubMenuModel = SubMenu::where(['SubMen_Reg_Id' => $clientId])
    ->where('SubMen_Status', '=', '0')
    ->orderBy('SubMen_SerialOrder', 'asc')
    ->get();
$SocialLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('Pag_Status', '=', '0')->where('tbl_pagecategory.PagCat_Name', 'SocialLink')->orderBy('Pag_SerialOrder', 'asc')->get();
$PropertyModel = Property::where('PReg_Id', '=', $clientId)->where('PStatus', '=', 0)->inRandomOrder()->take(10)->get();
$CityModel = City::where('Cit_Status', '=', 0)->get();
$PropertyTypeModel = PropertyType::where('PTyp_Status', '=', 0)->get();
?>
<style>
    .dropdown-menu {
        padding: 10px;
        margin-top: 5px;
    }

    .hoverText:hover {
        color: white !important;
    }

    .dropdown-menu-scrollable {
        max-height: 250px;
        /* Adjust this value as needed */
        overflow-y: auto;
    }

    @media (max-width: 767px) {
        .dropdown-menu-scrollable {
            margin-left: -56%;
            height: auto;
        }
    }

    .owl-wrapper {
        z-index: -1;
    }
</style>
<div id="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <p class="p-font-15 p-white">{{ $WebInfoModel->WebInf_About ?? 'N/A' }}</p>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12 text-right">
                <div class="header-top-links">
                    <ul>
                        <li><a href="#">OPENING HOURS: {{ $WebInfoModel->WebInf_openingHours ?? 'N/A' }}</a></li>
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
                            <p style="color:#101010"> {{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}</p>
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
                            <p style="color:#101010"> {{ $WebInfoModel->WebInf_Address ?? 'N/A' }}</p>
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
                            <p style="color:#101010"><a href="#"> {{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}</a></p>
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
                                <a href="{{ $model->Pag_URL }}" target="_blank" style="color: #000000; border: 1px solid #000000;">
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
                                            <h5 class="title"><b style="color:red;">Showcase List</b></h5>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle hoverText">Search by
                                                            City</a>
                                                        <div class="dropdown-menu dropdown-menu-scrollable">
                                                            @foreach ($CityModel as $value)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('property', ['location' => $value->Cit_Id]) }}">{{ $value->Cit_Name }}</br></a>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle hoverText">Search by
                                                            Type</a>
                                                        <div class="dropdown-menu dropdown-menu-scrollable">
                                                            @foreach ($PropertyTypeModel as $type)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('property', ['property_type' => $type->PTyp_Id]) }}">{{ $type->PTyp_Name }}</br></a>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle hoverText">Search by
                                                            Rooms</a>
                                                        <div class="dropdown-menu dropdown-menu-scrollable">
                                                            @for ($i = 1; $i <= 7; $i++)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('property', ['bedroom' => $i]) }}">{{ $i }}
                                                                    Room{{ $i > 1 ? 's' : '' }}</br></a>
                                                            @endfor
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-8">
                                            <div class="row">
                                                <div id="nav_slider" class="owl-carousel">
                                                    @foreach ($PropertyModel as $value)
                                                        <div class="item">
                                                            <div class="image bottom15">
                                                                @php
                                                                    $randomImage = $value->getRandomImage();
                                                                @endphp
                                                                <img src="{{ $randomImage ? env('Web_CommonURl') . $randomImage : asset('assets/frontend/images/dummy-img/NoImage2.jpg') }}"
                                                                    alt="listin" class="img-responsive"
                                                                    style="height: 100px;">
                                                                <span
                                                                    class="nav_tag yellow text-uppercase">{{ $value->propertyType->PTyp_Name }}</span>
                                                            </div>
                                                            <h4><a
                                                                    href="{{ URL::to('/property-Details/' . encodeId($value->PId)) }}">{{ $value->PTitle }}</a>
                                                            </h4>
                                                            @foreach ($value->cities as $city)
                                                                <p>{{ $city->Cit_Name }}({{ $city->state->Sta_Name }})
                                                                </p>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
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

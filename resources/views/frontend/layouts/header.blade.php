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
//    dd($MenuModel);
$AnnouncementModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')->where('Pag_Reg_Id', '=', $clientId)->where('tbl_pagecategory.PagCat_Name', 'Announcement')->where('Pag_Status', '=', '0')->orderBy('tbl_page.Pag_CreatedDate', 'asc')->get();

?>
<style>
    /* Style for submenu items */
    .submenu {
        display: none;
        /* Hide submenu by default */
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 999;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Style for parent item on hover */
    .has-submenu:hover .submenu {
        display: block;
        /* Show submenu on hover */
    }

    /* Style for submenu items */
    .submenu-item {
        padding: 10px;
    }

    /* Style for submenu links */
    .submenu-item a {
        color: #333;
        text-decoration: none;
        display: block;
    }

    /* Style for submenu links on hover */
    .submenu-item a:hover {
        background-color: #000;
    }
</style>
<section class="as_header_wrapper">
    <div class="as_info_detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li>
                            <a href="javascript:;">
                                <div class="as_infobox">
                                    <span class="as_infoicon">
                                    <i class="fab fa-whatsapp"></i>

                                    </span>
                                    {{ $WebInfoModel->WebInf_ContactNo ?? 'N/A' }}
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="as_infobox">
                                    <span class="as_infoicon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                            width="18" height="13" viewBox="0 0 18 13">
                                            <image
                                                xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAANCAMAAACTkM4rAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAllBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAADAm+O6AAAAMHRSTlMAnPKljr/GhqKttZn1jLe+g/bxiLvDfn07z9cuDFuRD7MXFoq9k66LrKSjlo+U852fXjOJAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAIZJREFUCNdNj0kSgkAQBFMccUNFcFfABRX3+v/rHCB0qENFRx4qsqElrxG1wdBRIz5d1KPvyIChCDRi/CMTQk2JpJhZTeYspAjPnmG957O07VVIK9bShq3+yOwSTEqSxRWyWyl7pYfjSTlxuRXozMU5XBWggpvzKriLh7Mqk/OEl97NHz98AaD8G1UEUcOeAAAAAElFTkSuQmCC"
                                                width="18" height="13" />
                                        </svg>

                                    </span>
                                    {{ $WebInfoModel->WebInf_EmailId ?? 'N/A' }}
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <div class="as_logo">
                    <a href="{{ URL::to('/contact') }}">

                        <img src="{{ env('Web_CommonURl') }}{{ $WebInfoModel->WebInf_HeaderLogo ?? 'N/A' }}"
                            alt="" style="height:75px;">



                    </a>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
                <div class="as_right_info">
                    <div class="as_menu_wrapper">
                        <span class="as_toggle">
                        <i style="color:white" class="fas fa-bars"></i>

                        </span>
                        <div class="as_menu">
                            <ul>



                                @foreach ($MenuModel as $key => $value)
                                    @php
                                        $subMenuItems = $SubMenuModel->where('SubMen_Men_Id', $value->Men_Id);
                                    @endphp
                                    @if ($subMenuItems->isNotEmpty())
                                        <li class="has-submenu">
                                            <a id="navbarDropdown{{ $value->Men_Id }}" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ $value->Men_Name }} <i class="fas fa-chevron-down"></i>
                                            </a>
                                            <ul class="submenu" aria-labelledby="navbarDropdown{{ $value->Men_Id }}"
                                                style="
    background: radial-gradient(black, transparent);
">
                                                @foreach ($subMenuItems as $submenu)
                                                    <li class="has-submenu">
                                                        <a
                                                            href="{{ route('showSubMenuDetails', ['type' => 'submenu', 'id' => encodeId($submenu->SubMen_Id)]) }}">
                                                            {{ $submenu->SubMen_Name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ URL::to($value->Men_URL) }}">
                                                {{ $value->Men_Name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!-- <a href="javascript:;" class="as_wishlist"><img src="assets/images/svg/wishlist.svg" alt=""></a>
                            <div class="as_cart">
                                <div class="as_cart_wrapper">
                                    <span><img src="assets/images/svg/cart.svg" alt=""><span class="as_cartnumber">02</span></span>
                                </div>

                                <div class="as_cart_box">
                                    <div class="as_cart_list">
                                        <ul>
                                            <li>
                                                <div class="as_cart_img">
                                                    <img src="assets/images/p1.jpg" class="img-responsive">
                                                </div>
                                                <div class="as_cart_info">
                                                    <a href="#">Yellow Sapphire</a>
                                                    <p>1 X $20.00</p>
                                                    <a href="javascript:;" class="as_cart_remove"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="as_cart_img">
                                                    <img src="assets/images/p2.jpg" class="img-responsive">
                                                </div>
                                                <div class="as_cart_info">
                                                    <a href="#">yantra</a>
                                                    <p>1 X $10.00</p>
                                                    <a href="javascript:;" class="as_cart_remove"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="as_cart_total">
                                        <p>total<span>$30.00</span></p>
                                    </div>
                                    <div class="as_cart_btn">
                                        <button type="button" class="as_btn">view cart</button>
                                        <button type="button" class="as_btn">checkout</button>
                                    </div>
                                </div>
                            </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

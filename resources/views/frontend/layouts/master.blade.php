<?php
use App\Models\{Setting, ExpiryPeriod};
use Carbon\Carbon;
use App\Models\WebInfo;

$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();

$underConstructionSetting = Setting::where('Set_Reg_Id', '=', $clientId)->where('Set_Status', '=', 0)->first();
$ExpiryPeriod = ExpiryPeriod::where('ExpPer_Reg_Id', '=', $clientId)->where('ExpPer_Status', '=', 0)->first();
if ($ExpiryPeriod) {
    $today = Carbon::now();
    $endDate = Carbon::parse($ExpiryPeriod->ExpPer_EndDate);
    if ($endDate->lessThan($today)) {
        header('Location: https://edumanag.com/expired/');
        exit();
    }
}
?>
@if ($underConstructionSetting && $underConstructionSetting->Set_Website == 1)
    @include('frontend.underConstruction')
@else
    <!DOCTYPE html>
    <html lang="en">

    <head>
        @include('frontend.layouts.head')
    </head>

    <body>
        <div class="loader">
            <div class="cssload-thecube">
                <div class="cssload-cube cssload-c1"></div>
                <div class="cssload-cube cssload-c2"></div>
                <div class="cssload-cube cssload-c4"></div>
                <div class="cssload-cube cssload-c3"></div>
            </div>
        </div>
        <!--/LOADER -->
        <!--===== BACK TO TOP =====-->
        <div class="short-msg">
            <a href="#." class="back-to">
                <i class="icon-arrow-up2"></i>
            </a>
            <a href="#." class="short-topup" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-envelope-o" aria-hidden="true"> </i>
            </a>
            @php
                // Split the contact numbers by comma and trim any whitespace
                $contactNumbers = explode(',', $WebInfoModel->WebInf_ContactNo);
                // Use the first contact number
                $firstContactNumber = trim($contactNumbers[0]);
            @endphp

            <a href="https://wa.me/{{ $firstContactNumber }}" class="short-topupLeft" target="_blank">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
            </a>
        </div>
        <header id="main_header">
            @include('frontend.layouts.header')
        </header>
        @yield('content')
        <footer id="footer" class="footer divider layer-overlay overlay-dark-8">
            @include('frontend.layouts.footer')
        </footer>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="myModalLabel">How can <span class="color_red">we help?</span></h2>
                    </div>
                    <div class="modal-body">

                        <div class="short-msg-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                        role="tab" data-toggle="tab"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i> Suggestion</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Suggestion</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <lable>Name</lable>
                                                    <input class="keyword-input" name="name" id="name"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <lable>E - mail</lable>
                                                    <input class="keyword-input" name="email" id="email"
                                                        type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <lable>Message</lable>
                                                    <textarea name="message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="dark_border" data-dismiss="modal">Cancel Message</button>
                        <button type="button" class="btn_fill">Send Message</button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endif

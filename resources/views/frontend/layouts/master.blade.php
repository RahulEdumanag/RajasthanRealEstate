<?php
use App\Models\{Setting, ExpiryPeriod};
use Carbon\Carbon;
$clientId = env('WEB_ID');
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
        <!-- <div class="loader">
            <div class="cssload-thecube">
                <div class="cssload-cube cssload-c1"></div>
                <div class="cssload-cube cssload-c2"></div>
                <div class="cssload-cube cssload-c4"></div>
                <div class="cssload-cube cssload-c3"></div>
            </div>
        </div> -->
        <!--/LOADER -->
        <!--===== BACK TO TOP =====-->
        <div class="short-msg">
            <a href="#." class="back-to"><i class="icon-arrow-up2"></i></a>
            <a href="#." class="short-topup" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope-o"
                    aria-hidden="true"></i></a>
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
                        <p class="bottom40">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <div class="short-msg-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                        role="tab" data-toggle="tab"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i> Suggestion</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                        data-toggle="tab"><i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                        Question</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                                        data-toggle="tab"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        Problems</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab"
                                        data-toggle="tab"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                        Feedback</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Suggestion</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail" name="email"
                                                        id="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Question</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail"
                                                        name="email" id="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Problems</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail"
                                                        name="email" id="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Feedback</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail"
                                                        name="email" id="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
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

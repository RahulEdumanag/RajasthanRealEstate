<?php
use App\Models\{Setting,ExpiryPeriod};
use Carbon\Carbon;

$clientId = env('WEB_ID');

$underConstructionSetting = Setting::where('Set_Reg_Id', '=', $clientId)->where('Set_Status', '=', 0)->first();
$ExpiryPeriod = ExpiryPeriod::where('ExpPer_Reg_Id', '=', $clientId)->where('ExpPer_Status', '=', 0)->first();
if ($ExpiryPeriod) {
    $today = Carbon::now();
    $endDate = Carbon::parse($ExpiryPeriod->ExpPer_EndDate);
  
    if ($endDate->lessThan($today)) {
        header("Location: https://edumanag.com/expired/");
        exit;
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
        <div class="as_loader">
            <img src="assets/images/loader.png" alt="" class="img-responsive">
        </div>

        <div class="as_main_wrapper bg-light">
            @include('frontend.layouts.header')



            @yield('content')


            @include('frontend.layouts.footer')

        </div>
    </body>

    </html>
@endif

<?php
use App\Models\{WebInfo, MetaTags};
$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();
$MetaTagsModel = MetaTags::where('Met_Status', '=', 0)->where('Met_Reg_Id', '=', $clientId)->first();
?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>Rajasthan Real Estate</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/master.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/color/color-1.css') }}" id="color" />
@if ($WebInfoModel && $WebInfoModel->WebInf_Favicon)
    <link rel="shortcut icon" href="{{ asset('uploads/' . $WebInfoModel->WebInf_Favicon) }}">
@endif

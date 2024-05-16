<?php

use App\Models\{WebInfo, MetaTags};
$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();
$MetaTagsModel = MetaTags::where('Met_Status', '=', 0)->where('Met_Reg_Id', '=', $clientId)->first();

?>


<title>Rajasthan Real Estate</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="keywords" content="{{ $MetaTagsModel->Met_Keywords ?? 'N/A' }}">
<meta name="description" content="{{ $MetaTagsModel->Met_Description ?? 'N/A' }}">
<meta property="og:title" content="{{ $MetaTagsModel->Met_OgTitle ?? 'N/A' }}">
<meta property="og:description" content="{{ $MetaTagsModel->Met_OgDescription ?? 'N/A' }}">
    

<!-- stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
<link href="{{ asset('assets/frontend/css/font.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/js/plugin/slick/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/js/plugin/select2/select2.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/frontend/js/plugin/airdatepicker/datepicker.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.css') }}" />
<!-- Favicons -->
@if ($WebInfoModel && $WebInfoModel->WebInf_Favicon)
    <link rel="shortcut icon" href="{{ asset('uploads/' . $WebInfoModel->WebInf_Favicon) }}">
@endif


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



<!-- <link rel="stylesheet" href="{{ asset('assets/ css/style.css') }}"> -->

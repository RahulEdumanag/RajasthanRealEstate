<?php
use App\Models\{WebInfo, MetaTags};
$clientId = env('WEB_ID');
$WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')->where('tbl_website_information.WebInf_Reg_Id', '=', $clientId)->where('WebInf_Status', '=', '0')->first();
$MetaTagsModel = MetaTags::where('Met_Status', '=', 0)->where('Met_Reg_Id', '=', $clientId)->get();
?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>{{ $WebInfoModel->WebInf_Name }}</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/master.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/color/color-1.css') }}" id="color" />
@if ($WebInfoModel && $WebInfoModel->WebInf_Favicon)
    <link rel="shortcut icon" href="{{ env('Web_CommonURl') }}{{ $WebInfoModel->WebInf_Favicon }}">
@endif


<!-- Meta Tags -->
@foreach ($MetaTagsModel as $metaTag)
    @if ($metaTag->Met_Type === 1)
        <meta name="keywords" content="{{ $metaTag->Met_Keywords }}">
        <meta name="description" content="{{ $metaTag->Met_Description }}">
    @elseif ($metaTag->Met_Type === 2)
        <meta name="keywords" content="{{ $metaTag->Met_Keywords }}">
        <meta name="description" content="{{ $metaTag->Met_Description }}">

        <meta property="og:title" content="{{ $metaTag->Met_OgTitle ?? 'N/A' }}">
        <meta property="og:description" content="{{ $metaTag->Met_OgDescription ?? 'N/A' }}">
    @endif
@endforeach

<!--  Auto Load Css function -->


<script type="text/javascript">
    // Get HTML head element
    let head = document.getElementsByTagName('HEAD')[0];

    // Create new link Element
    let link = document.createElement('link');

    // set the attributes for link element
    link.rel = 'stylesheet';

    link.type = 'text/css';

    link.href = 'assets/frontend/css/master.css';

    // Append link element to HTML head
    head.appendChild(link);
</script>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
        }

        .header img {
            max-width: 100px;
        }

        .content {
            margin: 20px 0;
        }

        .content h1 {
            color: #333;
        }

        .content p {
            color: #555;
            line-height: 1.6;
        }

        .resources {
            margin: 20px 0;
        }

        .resources a {
            color: #0066cc;
            text-decoration: none;
            display: block;
            margin: 5px 0;
        }

        .footer {
            text-align: center;
            margin: 20px 0;
            color: #999;
        }

        .footer p {
            margin: 5px 0;
        }

        .social-media {
            margin: 20px 0;
            text-align: center;
        }

        .social-media img {
            width: 24px;
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div class="header">
            @if ($webInfo && $webInfo->WebInf_HeaderLogo)
                <img src="{{ env('Web_CommonURl') }}{{ $webInfo->WebInf_HeaderLogo }}" alt="logo"
                    style="max-width: 200px;" />
            @else
                <p>No logo available</p>
            @endif
        </div>
        <div class="content">
            <h1>Thank You for Reaching Out to Us!</h1>
            <p>Hello {{ $data['Mail_Name'] }},</p>
            <p>Thank you for contacting <strong>{{ config('app.name') }}</strong>! We have received your message and
                will get back to you as soon as possible.</p>
            <div class="resources">
                <p>In the meantime, feel free to explore the following resources:</p>
                <a href="/">{{ config('app.name') }}</a>

            </div>
            <p>If your inquiry is urgent, you can reach us at {{ $webInfo->WebInf_EmailId }} or
                {{ $webInfo->WebInf_ContactNo }}.</p>
        </div>
        <div class="footer">
            <p>Best Regards,</p>
            <p><strong>{{ config('app.name') }} Team</strong></p>
        </div>
        <div class="social-media">
            @foreach ($socialLinkModel as $model)
                <a href="{{ $model->Pag_URL }}" target="_blank" style="color: #black; border: 1px solid #black;">
                    <i class="{!! $model->Pag_Image !!}"></i>
                </a>
            @endforeach
        </div>
        <div class="footer">
            <p>©
                <script>
                    document.write(new Date().getFullYear());
                </script> {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>

</body>

</html>

 
<!DOCTYPE html>
<html>

<head>
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f9;
            color: #333;
        }

        td {
            background-color: #fff;
            color: #555;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 12px;
        }

        .strong {
            color: #333;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>New Contact Form Submission In {{ config('app.name') }}</h1>
        <div class="logo">
            @if ($webInfo && $webInfo->WebInf_HeaderLogo)
                <img src="{{ env('Web_CommonURl') }}{{ $webInfo->WebInf_HeaderLogo }}" alt="logo"
                    style="max-width: 200px;" />
            @else
                <p>No logo available</p>
            @endif
        </div>
        <table>

            <tr>
                <th>Name</th>
            </tr>

            <tr>
                <td>{{ $data['Mail_Name'] }}</td>
            </tr>
            <tr>
                <th>Email</th>
            </tr>
            <tr>
                <td>{{ $data['Mail_Email'] }}</td>
            </tr>
            <tr>
                <th>Message</th>
            </tr>
            <tr>
                <td>{{ $data['Mail_Message'] }}</td>
            </tr>


        </table>
        <div class="footer">
            <p>This is an automated message. Please do not reply.</p>
            <p>©
                <script>
                    document.write(new Date().getFullYear());
                </script> {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Angel Jobs India</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Blinker:wght@100;200;300;400;600;700;800;900&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Blinker', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 120px;
        }
        .logo-1 {
            width: 72px;
        }

        .message {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
            @if (!empty(session('status')) && session('status') ==='true')
                <img class="logo-1" src="{{ asset('images/verified-icon.png')}}" alt="Angel Jobs India Logo" width="80px">
                    <h2><span style="color: #00d97f;font-weight: 600;">
                        {{session('msg')}}
                    </h2>
            @endif
         @if (!empty(session('status')) && session('status') ==='false')
           <img class="logo-1" src="{{ asset('images/not-verified-icon.png')}}" alt="Angel Jobs India Logo" width="80px">
         <h2><span style="color: #d72f37;font-weight: 600;">{{session('msg')}}</span></h2>
            @endif
        <img class="logo" src="{{ asset('images/angel-Jobs-india-logo.png')}}" alt="Angel Jobs India Logo">
        <h2 style="font-weight: 600;">Welcome to <br> <span style="font-size: 40px; color: #23a0d2;font-weight: 700;">Angel Jobs India</span></h2>
        
        <p class="message">Thank you for registering on our platform. <br> You are now part of the Angel Jobs India community.</p>
        <a href="https://www.angel-jobs.in/" class="button" target="_blank">Explore Opportunities</a>
        <p class="footer">If you have any questions, feel free to contact our support team at <strong>info@angel-jobs.com</strong></p>
    </div>
</body>
</html>

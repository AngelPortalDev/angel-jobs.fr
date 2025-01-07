<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Expiring Soon - 2 Days Left</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Rubik", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo-1 {
            width: 140px;
        }

        p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .button {
            display: inline-block;
            padding: 7px 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .footer {
            margin-top: 20px;
            color: #777;
        }

        .social-logo {
            width: 26px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 text-center">
                <img class="logo-1 mb-2" src="{{ asset('images/angel-Jobs-india-logo.png')}}" alt="Angel Jobs India">
            </div>
            <hr>
            <div class="col-md-8">
                <h5 class="mb-3 text-center">
                    Your <span class="text-primary">Angel-Jobs</span> Plan is Expiring Soon Do not Miss Out on New Opportunities!
                </h5>
                <img class="p-3 d-flex justify-content-center mx-auto" src="{{ asset('images/emails/expire_soon.png')}}" alt="Angel Jobs India" style="width: 70%">
            </div>

            <div class="col-md-12 ps-md-4 my-md-4 border-md-start">
               

                <p>Dear #Name#, <br></p>
                <p>This is a reminder that your current <span style="font-weight: 600">Angel Jobs plan is expiring in just 2 days</span>. To continue enjoying our services without interruption, please make sure to renew your plan before it expires.</p>

                <p>Renew your plan now to continue enjoying uninterrupted access to premium features and stay ahead in your job search journey.</p>
                <p>Click below to renew your plan now:</p>
                <a href="#Planlink" class="button">Renew Your Plan</a>

                <p style="margin-top: 10px;">Secure your next big opportunity—act now to keep your journey going!</p>

                <p style="margin-top: 10px;">If you need any assistance or have questions, feel free to contact us at <strong><a class="text-decoration-none text-dark" href="mailto:info@angel-jobs.in">info@angel-jobs.com</a></strong>. We're happy to help!</p>

                <p>Thank you for choosing Angel Jobs. We appreciate having you with us!</p>

                <p>Best regards, <br> Angel Jobs Team</p>

                <a href="" target="_blank"><img class="social-logo mb-2" src="{{ asset('images/social/social-media-01.png') }}" alt="social logo"></a>
                <a href="" target="_blank"><img class="social-logo mb-2" src="{{ asset('images/social/social-media-02.png') }}" alt="social logo"></a>
            </div>
        </div>
    </div>
</body>
</html>

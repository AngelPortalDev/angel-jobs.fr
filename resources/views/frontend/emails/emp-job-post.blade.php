<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Confirmation</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

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
                <img class="logo-1 mb-2" src="{{ asset('images/Angel-Jobs-Malta-logo.svg')}}" alt="Angel Jobs France">
            </div>
            <hr>
            <h4 class="mb-3" style="display: flex; justify-content: center; color:#11a1f5">
                Job Posted Successfully
            </h4>
            <div class="col-md-8">
                <img class="p-3" src="{{ asset('images/emails/job_post.png')}}" alt="Angel Jobs France" style="width: 100%">
            </div>

            <div class="col-md-12 ps-md-4 my-md-4 border-md-start">
               

                <p> Dear #Name#, <br></p>
                <p>Thank you for submitting your job post on Angel-Jobs. Your listing has been successfully submitted and is now being reviewed by our team.</p>

                <p>Once your job post is approved, you’ll receive a confirmation email, and it will go live on our platform to attract top candidates.</p>

                <p>In the meantime, if you have any questions or need assistance, feel free to reach out to us at <strong><a class="text-decoration-none text-dark" href="mailto:info@angel-jobs.fr">info@angel-jobs.fr</a></strong>. We're here to support you throughout the process.</p>

                <p>Thank you for choosing Angel-Jobs to find the best talent!</p>
                <p>Job Url : <a href="#Link#">Click to See Posted Job</a></p> 

                <p>Best Regards, <br>Angel Jobs Team</p>

                <a href="" target="_blank"><img class="social-logo mb-2" src="{{ asset('images/social/social-media-01.png') }}" alt="social logo"></a>
                <a href="" target="_blank"><img class="social-logo mb-2" src="{{ asset('images/social/social-media-02.png') }}" alt="social logo"></a>
            </div>
        </div>
    </div>
</body>
</html>

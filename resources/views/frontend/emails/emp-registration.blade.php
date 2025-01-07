<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Angel Jobs - Employer Registration</title>

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
            <div class="col-md-12 text-center ">
                <img class="logo-1 mb-2" src="{{ asset('images/angel-jobs-France.png')}}" alt="Angel Jobs France">
            </div>
            <hr>
            <div class="col-md-8">
                <h5 class="mb-3 text-center">
                    Welcome to Angel Jobs <br/> Your Hiring Journey Starts Here!
                </h5>
                <img class="p-3 " src="{{ asset('images/emails/registration.png')}}" alt="Angel-jobs France" style="width: 100%">
            </div>

            <div class="col-md-12 ps-md-4 my-md-4 border-md-start">
                <p>Dear #Name#, <br></p>
                <p><span style="font-weight: 600">Congratulations on successfully registering with Angel Jobs!</span> We are excited to partner with you in finding the best talent for your company.</p>
                <p>As an employer on Angel Jobs, you now have access to:</p>
                <ul>
                    <li>A large pool of qualified candidates across various industries.</li>
                    <li>Easy job posting and candidate management tools.</li>
                    <li>Direct communication with job seekers interested in your vacancies.</li>
                </ul>
                <p>Start posting your job openings and connect with top talent today!</p>
                <p>If you need assistance, feel free to reach out to us at <strong><a class="text-decoration-none text-dark" href="mailto:info@angel-jobs.fr">info@angel-jobs.fr</a></strong>. We're here to support you throughout the hiring process. <br></p>
                <strong>Employer Details: <br>
                   
                    Email: #Email#<br>
                    Confirmation Link: <a href="#Link#">Click here to Verify your Email.</a></strong></p>  

                <p>Thank you for choosing Angel Jobs to support your hiring needs!</p>
                <p>Best regards, <br> Angel Jobs Team</p>

                <a href="" target="_blank"><img class="social-logo mb-2"
                    src="{{ asset('images/social/social-media-01.png') }}" alt="social logo"></a>
                <a href="" target="_blank"><img class="social-logo mb-2"
                        src="{{ asset('images/social/social-media-02.png') }}" alt="social logo"></a>
            </div>
        </div>
    </div>  
</body>
</html>

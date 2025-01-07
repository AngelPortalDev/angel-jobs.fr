<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Login Credentials for Angel Jobs</title>

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
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 text-center">
                <!-- Company Logo -->
                <img class="logo-1 mb-2" src="{{ asset('images/angel-jobs-France.png') }}" alt="Angel Jobs France">
            </div>
            <hr>
            <div class="col-md-8">
                <h5 class="mb-3 text-center">
                    Welcome to Angel Jobs – Let’s Kickstart Your Hiring Journey!
                </h5>
                <!-- Promotional Image -->
                <img class="p-3" src="{{ asset('images/emails/login.png') }}" alt="Angel Jobs" width="100%">
            </div>
            <div class="col-md-12 ps-md-4 my-md-4 border-md-start">
                <!-- Congratulations Message -->
                <p>Dear [Employer Name], <br></p>
                <p>Welcome to Angel Jobs! We are thrilled to have you join us and excited to support you in your hiring journey.</p>

                <p>Here are your login details to get started:</p>
                <ul>
                    <li><strong>Username:</strong> [Your Username]</li>
                    <li><strong>Password:</strong> [Your Password]</li>
                </ul>

                <p>Please keep this information secure and do not share it with others.</p>

                <p>To get started, simply click the link below to log in and start posting job openings:</p>
                <p><a class="button" href="[Login URL]" target="_blank">Login to Angel Jobs</a></p>

                <p>If you have any questions or need assistance with your account, feel free to reach out to us at <strong><a class="text-decoration-none text-dark" href="mailto:info@angel-jobs.fr">info@angel-jobs.fr</a></strong>. Our team is here to help you every step of the way.</p>

                <p>Thank you for choosing Angel Jobs. We look forward to helping you find top talent for your organization!</p>

                <p>Best regards, <br> Angel Jobs Team</p>

                <!-- Social Media Links -->
                <div>
                    <a href="" target="_blank"><img class="social-logo mb-2"
                        src="{{ asset('images/social/social-media-01.png') }}" alt="social logo"></a>
                    <a href="" target="_blank"><img class="social-logo mb-2"
                            src="{{ asset('images/social/social-media-02.png') }}" alt="social logo"></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

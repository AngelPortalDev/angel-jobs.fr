<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Form Submission</title>
</head>
<body>
    <h2>Grievance Form Submission</h2>

    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Country Code:</strong> {{ $country_code }}</p>
    <p><strong>Contact Number:</strong> {{ $contact_no }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    @if (isset($address) && !empty($address))
    <p><strong>Address:</strong> {{ $address }}</p>
    @endif
    @if (isset($report_url) && !empty($report_url))
    <p><strong>Report URL:</strong> <a href="{{ $report_url }}" target="_blank">{{ $report_url }}</a></p>
    @endif
    @if (isset($date_oc) && !empty($date_oc))
    <p><strong>Date of Occurrence:</strong> {{ $date_oc }}</p>
    @endif
    <p><strong>Message:</strong>{{ $datameg }}</p> 


 

    <p>Thank you for your submission!</p>

    <p><strong>Best regards,</strong><br>Angel Jobs Team</p>
</body>
</html>

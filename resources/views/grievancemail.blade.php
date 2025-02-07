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
    <p><strong>Address:</strong> {{ $address }}</p>
    <p><strong>Report URL:</strong> <a href="{{ $report_url }}" target="_blank">{{ $report_url }}</a></p>
    <p><strong>Date of Occurrence:</strong> {{ $date_oc }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $datameg }}</p> 


    @if (isset($grfile_name) && !empty($grfile_name))
        <p><strong>Grievance File:</strong> <a href="https://www.angel-jobs.fr/storage/grivance_doc/{{$grfile_name}}" target="_blank">Download File</a></p>
    @endif

    <p>Thank you for your submission!</p>

    <p><strong>Best regards,</strong><br>Angel Jobs Team</p>
</body>
</html>

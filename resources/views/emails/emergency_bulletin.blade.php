<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Bulletin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #880824;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        h1,
        p {
            margin: 0 0 15px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Emergency Notification</h1>
        <p>Hello {{ $userName }},</p>
        <p>An important emergency bulletin has been issued:</p>
        <p><strong>{{ $messageContent }}</strong></p>
        <p>Please take the necessary actions as soon as possible.</p>
        <p>Thank you,</p>
        <p>Barangay Kay-Anlog</p>
        <p>Brgy. Kay-Anlog, Calamba Laguna</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Barangay Kay-Anlog. All rights reserved.
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #880824;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }

        .header h1 {
            margin: 0;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .content {
            padding: 20px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            color: #333;
        }

        .content h2 {
            color: #880824;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }

        .footer p {
            margin: 5px 0;
        }

        .thank-you {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .highlight {
            color: #880824;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="header">
            <h1>Barangay Kay-Anlog</h1>
            <p>Brgy. Kay-Anlog, Calamba, Laguna</p>
        </div>

        <div class="content">
            <h2>Hello, {{ $userName }}</h2>
            <p>{{ $emailMessage }}</p>
            <p><span class="highlight">Document:</span> {{ $documentName }}</p>
            <p class="thank-you">Thank you for using our service!</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Barangay Kay-Anlog. All rights reserved.</p>
        </div>
    </div>

</body>

</html>

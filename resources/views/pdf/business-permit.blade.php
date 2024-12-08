<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Business Permit</title>
    <style>
        html,
        body {
            height: 100%;
            /* Set both to 100% height */
            margin: 0;
            /* Remove any default margin */
            padding: 0;
            /* Remove any default padding */
        }

        body {
            font-family: "Times New Roman", serif;
            color: #000;
            height: 100%;
            /* Make sure body fills the entire viewport */
            background-image: url('{{ public_path('images/background/kayanlogwhite.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            /* Ensure background image covers entire screen */
            background-position: center center;
            /* Center the background */
        }

        .container {
            max-width: 900px;
            margin: auto;
            text-align: center;
        }

        .title,
        .subtitle,
        .details,
        .footer {
            margin-bottom: 20px;
        }

        .title {
            font-size: 34px;
            font-weight: bold;
            font-style: italic;
        }

        .subtitle {
            font-size: 34px;
            font-weight: bold;
        }

        .text {
            font-size: 18px;
        }

        .text-bold {
            font-weight: bold;
        }

        .footer p {
            font-size: 18px;
        }

        .req {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>
    <table style="width: 70%; text-align: center; border-collapse: collapse; margin-left: 100px; margin-top:60px;">
        <tr>
            <td style="width: 20%;">
                <img src="{{ public_path('images/logo/kayanlog.png') }}" alt="Logo 1" width="90px" height="auto" />
            </td>
            <td style="width: 60%;">
                <div>Republic of the Philippines</div>
                <div>Province of Laguna</div>
                <div>City of Calamba</div>
                <div>Barangay Kay Anlog</div>
            </td>
            <td style="width: 20%;">
                <img src="{{ public_path('images/logo/calambalogo.jpg') }}" alt="Logo 2" width="90px"
                    height="auto" />
            </td>
        </tr>
    </table>
    <table style="border-top: 5px; margin-top: 10px;">
        <div class="container">

            <div class="title" style="margin-top: 10px">Office of the Barangay Chairman</div>
            <div class="subtitle"><u>BARANGAY BUSINESS PERMIT</u></div>

            <div class="text" style="text-align: left; margin-left:30px">
                <p>Nature of Business: <u>{{ $business->name }}</u></p>

                <div style="display: flex; justify-content: space-between;">
                    <span>Proprietor: <u>{{ $business->proprietor }}</u> </span> <br>
                    <span>Permit Number:</span> <u>{{ $business->permit_number }}</u> <br>
                    <span>Address: <u>{{ $business->address }}</u></span> <br>
                    <span>Business Location: <u>{{ $business->business_location }}</u></span>
                    <span></span>
                    <span style="margin-left: 200px;">Valid until: _________</span>
                    <span></span>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span>Status: <u>{{ $business->status }}</u></span>
                    <span></span>
                    <span style="margin-left: 289px;">Amount Paid: _________</span>
                    <span></span>
                </div>
            </div>

            <div class="text" style="text-align: left; text-indent: 30px; margin-left:20px">
                <p>
                    This permit is being issued subject to existing rules and regulations provided. However, that
                    the necessary fees are paid to the Treasurer of the Barangay as assessed.
                </p>
                <p>This is non-transferable and shall be deemed null and void upon failure by the owner to
                    follow the said rules and regulations set forth by the Local Government Unit of Calamba
                    City, Laguna.
                </p>
            </div>

            <div class="footer">
                <p>Given this <u>{{ \Carbon\Carbon::parse($business->created_at)->format('d') }}</u> day of
                    <u>{{ \Carbon\Carbon::parse($business->created_at)->format('F') }}</u>, year
                    <u>{{ \Carbon\Carbon::parse($business->created_at)->format('Y') }}</u> at Brgy. Kay Anlog, Calamba
                    City Laguna.
                </p>
                <div class="container" style="text-align: right; margin-right:30px; margin-top:50px">
                    <p class="text-bold"><u>Hon. Nemar G. Mendoza</u></p>
                    <p class="text" style="font-style: italic; margin-right: 23px;">Barangay Chairman</p>
                </div>
            </div>

        </div>
    </table>
</body>

</html>

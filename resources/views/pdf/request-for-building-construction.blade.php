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
            <div class="subtitle"><u>Request for a Building Construction Permit</u></div>

            <div class="text" style="text-align: left;margin-left: 30px;">
                <p>Date: <u>{{ \Carbon\Carbon::parse($permit->created_at)->format('F j, Y') }}</u></p>
                <br><br>
            </div>



            <div class="text" style="text-align: left; text-indent: 30px; margin-left:20px">
                <p>
                    The undersigned request for a <u><b>Building Construction</b></u> located at
                    <u>{{ $permit->address }}</u>
                </p>
                <p>
                    I hereby bind myself further subject to the provision of the existing rules and regulations in
                    accordance with the National Building Code (PD 1096) governing issuance of such
                    building/fencing reconstruction or renovations.
                </p> <br> <br>
            </div>
            <div style="text-align: right; margin-right:20px;">
                <p>Owner: <u>
                        {{ $permit->user->name . ' ' . $permit->user->middle_name . ' ' . $permit->user->last_name }}
                    </u></p>
            </div> <br> <br>

            <div class="footer" style="margin-left: 20px">
                <p style="text-align: left; text-indent: 30px;">
                    The requesting party is briefed in the existing requirement anent to the material needed in the
                    <u><b>Building Construction</b></u> to prevent traffic obstruction and adhere to
                    follow the regulations governing it. This therefore favorably endorsed for approval.
                </p>
                <div class="container" style="text-align: right; margin-right:30px">
                    <p style="margin-right: 50px;"> Certified by:</p> <br>
                    <p class="text-bold"><u>Hon. Nemar G. Mendoza</u></p>
                    <p class="text" style="font-style: italic; margin-right: 23px;">Barangay Chairman</p>
                </div>
            </div>
        </div>
    </table>
</body>

</html>

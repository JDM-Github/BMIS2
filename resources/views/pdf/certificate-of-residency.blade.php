<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Business Permit</title>
    <style>
        /* Ensure html and body take full height */
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

        .container span {
            font-weight: bold;
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
            <div class="subtitle"><u>CERTIFICATE OF RESIDENCY</u></div>
            <div class="container" style="margin: 30px">
                <div class="text" style="text-align: left; font-weight: bold;">To whom it may concern,</div>
                <div class="text" style="text-align: left; text-indent: 30px;">
                    <p>
                        This certify that, of legal age, married, Filipino citizen whose specimen signature appears
                        below is a <span>PERMANENT RESIDENT</span> of this Barangay Kay-Anlog, Calamba, Laguna.
                    </p>
                    <p>
                        Based on records of this office, he/she has been residing at Barangay Kay-Anlog, Calamba,
                        Laguna.
                    </p>
                    <p>
                        This <span>CERTIFICATION</span> is being issued upon the request of the above-named person for
                        whatever legal purpose it may serve.
                    </p>
                </div>
            </div>

            <div class="footer">
                <p style="text-align: left; text-indent: 30px;">
                    Issued this <u>{{ \Carbon\Carbon::parse($certificate->created_at)->format('d') }}</u> day of
                    <u>{{ \Carbon\Carbon::parse($certificate->created_at)->format('F') }}</u>, year
                    <u>{{ \Carbon\Carbon::parse($certificate->created_at)->format('Y') }}</u> at Barangay Kay-Anlog,
                    Calamba, Laguna,
                    Philippines.
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

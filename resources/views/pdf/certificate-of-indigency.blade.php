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
            @php
                $address = $certificate->user->houses->first()->address;

                // Use a regular expression to extract the number after "Purok"
                if (preg_match('/Purok (\d+)/', $address, $matches)) {
                    $purokNumber = $matches[1]; // This will hold the number after "Purok"
                } else {
                    $purokNumber = null; // If "Purok" is not found, set it to null or handle as needed
                }
            @endphp

            <div class="title" style="margin-top: 10px">Office of the Barangay Chairman</div>
            <div class="subtitle"><u>CERTIFICATE OF INDIGENCY</u></div>
            <div class="text" style="text-align: left; margin-left:20px;">To whom it may concern,</div>
            <div class="text" style="text-align: left; text-indent: 30px; margin-left:20px;">

                <p style="margin-left:20px;">
                    This is to certify that <u>
                        {{ $certificate->user->name . ' ' . $certificate->user->middle_name . ' ' . $certificate->user->last_name }}
                    </u>
                    A resident of Purok <u>{{ $purokNumber }}</u> of Barangay Kay-Anlog, <br> Calamba City, Province of
                    Laguna, has no
                    pending administrative or criminal cases againsts him/her <br> in this Barangay.
                </p>
                <p style="margin-left:20px;">
                    Further certified that they belong to the Indegence Family as apparently observed in their
                    poor living condition.
                </p>
                <p style="margin-left:20px;">
                    This certification is being issued upon the request of the above-mentioned name for
                    whatever <br> legal purposes it may serve, particularly for the <u>{{ $certificate->subject }}</u>
                    Of his/her <u>{{ $certificate->purpose }}</u>
                </p>
            </div>

            <div class="footer" style="margin-left:20px;">
                <p style="text-align: left;">
                    Given this <u>{{ \Carbon\Carbon::parse($certificate->created_at)->format('d') }}</u> day of
                    <u>{{ \Carbon\Carbon::parse($certificate->created_at)->format('F') }}</u>,
                    <u>{{ \Carbon\Carbon::parse($certificate->created_at)->format('Y') }}</u> at the office of Barangay
                    Chairman
                    of Barangay Kay-Anlog, Calamba City, Province of Laguna.
                </p>

                <p style="text-align: left;">
                    Certified By:
                </p>
                <div class="container" style="text-align: right; margin-right:20px">
                    <p style="margin-right: 50px;"> Certified by:</p> <br>
                    <p class="text-bold"><u>Hon. Nemar G. Mendoza</u></p>
                    <p class="text" style="font-style: italic; margin-right: 23px;">Barangay Chairman</p>
                </div>
            </div>
        </div>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Certificate</title>
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
            z-index: 10;
            /* Make sure content is above the background */
            position: relative;
            padding: 20px;
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
                <img src="{{ public_path('images/logo/calambalogo.jpg') }}" alt="Logo 2" width="90px" height="auto" />
            </td>
        </tr>
    </table>
    <table style="border-top: 5px; margin-top: 10px;">
        <div class="container">

            <div class="title" style="margin-top: 10px">Office of the Barangay Chairman</div>
            <div class="subtitle"><u>BARANGAY CERTIFICATION</u></div>
            <div style="font-size:30px; font-weight: normal;">(First Time Jobseekers Assistance Act-RA 11261)</div> <br>
            <div class="text" style="text-align: left; text-indent: 30px;">
                @php
                    $address = $certificate->user->houses->first()->address;

                    // Use a regular expression to extract the number after "Purok"
                    if (preg_match('/Purok (\d+)/', $address, $matches)) {
                        $purokNumber = $matches[1]; // This will hold the number after "Purok"
                    } else {
                        $purokNumber = null; // If "Purok" is not found, set it to null or handle as needed
                    }
                @endphp
                <p>
                    This is to certify that <u>
                        {{ $certificate->user->name . ' ' . $certificate->user->middle_name . ' ' . $certificate->user->last_name }}
                    </u> years old a resident of Purok
                    <u>{{ $purokNumber }}</u>
                    Brgy. Kay
                    Anlog for <u>{{ $certificate->user->number_of_years }}</u> years/months, is qualified availed of
                    <span>RA
                        11261</span> or the <span>First Time
                        Jobseekers
                        Act of 2019.</span>
                </p>
                <p>
                    I further certify that the holder/bearer was informed of his/her rights, including the duties
                    and responsibilities accorded by RA 11261 through the <span>Oath of Undertaking</span> he/she has
                    signed
                    and executed in the presence of our Barangay Official.
                </p>
            </div>

            <div class="footer">
                <p style="text-align: left; text-indent: 30px;">
                    Signed this <?= \Carbon\Carbon::parse($certificate->created_at)->format('j') ?> day of
                    <?= \Carbon\Carbon::parse($certificate->created_at)->format('F') ?>, year
                    <?= \Carbon\Carbon::parse($certificate->created_at)->format('Y') ?> at Brgy. Kay Anlog, Calamba
                    City.
                </p>
                <p style="text-align: left; text-indent: 30px;">
                    This certification is valid only one (1) year from the issuance.
                </p>
                <div class="container" style="text-align: right">
                    <p style="margin-right: 50px;"> Certified by:</p> <br>
                    <p class="text-bold"><u>Hon. Nemar G. Mendoza</u></p>
                    <p class="text" style="font-style: italic; margin-right: 23px;">Barangay Chairman</p>
                </div>
            </div>
        </div>
    </table>
</body>

</html>
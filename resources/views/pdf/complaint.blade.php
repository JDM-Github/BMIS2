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
            text-align: center;
            text-decoration: underline;
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
    <table style="margin-top: 10px;">
        <div class="container">

            <div class="title" style="margin-top: 10px; margin-right:25px;">Office of the Barangay Chairman</div>
            <div class="text" style="text-align: left; margin-top:20px;">
                <div style="display: flex; justify-content: space-between; margin-left:80px">
                    <u><span>Complainant: {{ $complaint->complainant }}</span></u>
                    <span></span>
                    <u><span style="margin-left: 300px;">Brgy. Case No: {{ $complaint->case_no ?? null }}</span></u>
                    <span><u></u></span> <br> <br>
                    <p><u>Against: {{ $complaint->against }}</u></p> <br>
                    <p><u>Respondents: {{ $complaint->respondents }}</u></p>
                </div>
                <div class="title">COMPLAINT</div>
                <div class="text" style="text-align: left; margin:20px;">
                    <p style="text-indent: 30px;">
                        One of the main thrust of the Barangay Justice System is to provide an easy and accessible
                        venue for disputing parties to settle their disagreement and come up with a mutually acceptable
                        agreement.
                    </p>
                    <p style="text-indent: 30px;">
                        With this thought in mind, I, hereby complain against the above named respondent for
                        violating my rights and interests which he violated in this manner:
                        <u>{{ $complaint->violate }}</u>
                    </p>
                    <p style="text-indent: 30px;">
                        THEREFORE, I pray that the following relief be granted to me in accordance with law
                        and/or equity.
                    </p>
                </div>

                <div class="footer" style="margin-left: 40px">
                    <p>Made this {{ $complaint->created_at->format('jS') }} day of {{ $complaint->created_at->format('F') }}, year {{ $complaint->created_at->format('Y') }}</p>
                    <p>Complainant</p>
                    <p><u> {{ $complaint->complainant }}</u></p>
                    <p>Received and filed this _ day of ______, year ____</p>
                    <div class="container" style="text-align: right; margin-right:50px;">
                        <p class="text-bold"><u>Hon. Nemar G. Mendoza</u></p>
                        <p class="text" style="font-style: italic; margin-right: 23px;">Barangay Chairman</p>
                    </div>
                </div>
            </div>
    </table>
</body>

</html>

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

        .foot {}
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
            <div class="subtitle"><u>Medico-Legal Certificate</u></div> <br>
            <div class="text" style="text-align: right; margin-right: 30px">Date:
                <u>{{ \Carbon\Carbon::parse($medic->created_at)->format('F j, Y') }}</u>
            </div> <br>
            <div class="container" style="margin: 30px">
                <div class="text" style="text-align: left;">To whom it may concern,</div>
                <div class="text" style="text-align: left; text-indent: 30px;">

                    <p>
                        This is to certify that <u>
                            {{ $medic->user->name . ' ' . $medic->user->middle_name . ' ' . $medic->user->last_name }}
                        </u> ( {{ $medic->user->gender }} )
                        <u> {{ Carbon\Carbon::parse($medic->user->birthdate)->age }}</u>
                        years old,
                        from
                        <u>{{ $medic->user->houses->first()->address .
                            ' ' .
                            $medic->user->houses->first()->barangay .
                            ' ' .
                            $medic->user->houses->first()->municipality .
                            ' ' .
                            $medic->user->houses->first()->province }}</u>,
                        Brgy. Kay Anlog, Calamba City, Laguna
                    </p>
                    <p>
                        Was examined and treated/confined in <u>{{ $medic->medical_facility }}</u> on/from
                        <u>{{ \Carbon\Carbon::parse($medic->start_date)->day }}</u> day of
                        <u>{{ \Carbon\Carbon::parse($medic->start_date)->format('F') }}</u>, year
                        <u>{{ \Carbon\Carbon::parse($medic->start_date)->format('Y') }}</u> to
                        <u>{{ \Carbon\Carbon::parse($medic->end_date)->day }}</u> day of
                        <u>{{ \Carbon\Carbon::parse($medic->end_date)->format('F') }}</u>, year
                        <u>{{ \Carbon\Carbon::parse($medic->end_date)->format('Y') }}</u> for the following:
                        <br>
                        <u>{{ $medic->medical_conditions }}</u>
                    </p>



                </div>

                <div class="footer">

                    <div style="text-align: left;">
                        <p>
                            Time of Arrival:
                            <u>{{ \Carbon\Carbon::parse($medic->time_of_arrival)->format('h:i A') }}</u>
                        </p>
                        <p>
                            Brought by: <u>{{ $medic->brought_by }}</u> / Relationship:
                            <u>{{ $medic->relationship }}</u>
                        </p>
                        <p>
                            Address: <u>{{ $medic->address }}</u>, Brgy. Kay Anlog, Calamba City, Laguna
                        </p>
                        <br>
                        <p style="text-indent: 30px">
                            Treatment will take from <u>{{ $medic->start }}</u> to <u>{{ $medic->end }}</u> days for
                            the above conditions/
                            injuries to
                            heal/recover unless complications will arise.
                        </p>
                    </div>
                    <div class="container" style="text-align: right">
                        <p style="margin-right: 300px;"> Certified by:</p> <br>
                        <u><span class="text-bold" style="margin-right: 250px;">Attending Brgy. Health
                                Worker:</span></u>
                        <span style=""></span>
                        <u><span class="text-bold">Hon. Nemar G. Mendoza</span></u>
                        <span></span>
                        <p class="text" style="font-style: italic; margin-right: 23px;">Barangay Chairman</p>
                    </div>
                </div>
            </div>
        </div>
    </table>
</body>

</html>

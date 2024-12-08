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
            width: 100%;
            margin: 0;
            text-align: center;
        }

        .title,
        .subtitle,
        .details,
        .footer {
            margin-bottom: 20px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            font-style: italic;
        }

        .subtitle {
            font-size: 34px;
            font-weight: bold;
        }

        .text {
            font-size: 17px;
        }

        .text-bold {
            font-weight: bold;
        }

        .footer p {
            font-size: 18px;
        }

        .officials {
            font-weight: bold;
            font-size: 15px;
            text-align: center;
            line-height: 1.6;
        }

        .container table {
            border-top: 5px solid red;
            margin-top: 20px;
        }

        #mid {
            border-right: 5px solid red;
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

    <div class="container">
        <table>
            <tr>
                <td id="mid" width="200px" height="auto" style="padding: 10px; text-align: center;">
                    <div class="subtitle" style="font-size: 16px;"><u>BARANGAY OFFICIALS</u></div>
                    <div class="officials">
                        <div>Hon. Nemar G. Mendoza</div>
                        <div class="text" style="font-style: italic;">Barangay Chairman</div> <br> <br>
                        <div>Hon. Nancy G. Mendoza</div>
                        <div>Hon. Jimmy O. Castillo</div>
                        <div>Hon. Joanne M. Soriano</div>
                        <div>Hon. Marcos E. Alcantara</div>
                        <div>Hon. Valeriano T. Evangelista</div>
                        <div>Hon. Marni M. Matamis</div>
                        <div>Hon. Aaron O. Lucido</div>
                        <div class="text" style="font-style: italic;">Barangay Councilors</div> <br> <br>
                        <div>Hon. Kym Ervin J. Alcantara -</div>
                        <div class="text" style="font-style: italic;">SK Chairman</div> <br> <br>
                        <div>Sec. Lea P. Tercero</div>
                        <div>Treas. Rodelyn M. Grumal</div> <br> <br> <br>
                    </div>
                </td>
                <td style="padding: 10px;">
                    <div class="title" style="margin-top: 30px; text-align:center;">Office of the Barangay Chairman
                    </div>
                    <div class="subtitle" style="font-size: 28px; text-align:center;"><u>BARANGAY CLEARANCE</u></div>
                    <div class="text" style="text-align: left">
                        <p>To whom it may concern,</p>
                        @php
                            $address = $clearance->user->houses->first()->address;

                            // Use a regular expression to extract the number after "Purok"
                            if (preg_match('/Purok (\d+)/', $address, $matches)) {
                                $purokNumber = $matches[1]; // This will hold the number after "Purok"
                            } else {
                                $purokNumber = null; // If "Purok" is not found, set it to null or handle as needed
                            }

                            $birthDate = \Carbon\Carbon::parse($clearance->user->birthday)->format('F j');
                            $birthYear = \Carbon\Carbon::parse($clearance->user->birthday)->year;
                        @endphp
                        <p style="text-indent: 30px;">
                            This is to certify that <u>
                                {{ $clearance->user->name . ' ' . $clearance->user->middle_name . ' ' . $clearance->user->last_name }}
                            </u> years of age,
                            born on <u>{{ $birthDate }}</u>, year <u>{{ $birthYear }}</u> is a
                            <u>{{ $clearance->is_certified }}</u>
                            resident of Purok <u>{{ $purokNumber ?? '___' }}</u>, Barangay Kay-Anlog. City of
                            Calamba, Laguna. He/She is a person of Good Moral
                            Character and Law abiding citizen.
                        </p>
                        <p style="text-indent: 30px;">
                            That according to records, the above named person has
                            not commited any illegal offense againts any person or
                            property of this date.
                        </p>
                        <p style="text-indent: 30px;">
                            Issued to the above named person this
                            <u>{{ \Carbon\Carbon::parse($clearance->created_at)->format('d') }}</u> day of
                            <u>{{ \Carbon\Carbon::parse($clearance->created_at)->format('F') }}</u> year
                            <u>{{ \Carbon\Carbon::parse($clearance->created_at)->format('Y') }}</u> at Brgy. Kay-Anlog,
                            Calamba, Laguna for
                            whatever legal purpose it may serve.
                        </p>
                        <p style="font-style: italic;">
                            Note: Valid only for Six (6) months upon issuance with Official Seal until <br>
                            <u>{{ \Carbon\Carbon::parse($clearance->created_at)->addMonths(6)->format('F j, Y') }}</u>.
                        </p>

                    </div>

                    <div class="footer">
                        <h3>
                            <bold>PURPOSE</bold>:
                        </h3>
                        <p><u>{{ $clearance->purpose }}</u></p>
                        <div class="container" style="text-align: right">
                            <p style="margin-right: 50px;">Certified By:</p> <br> <br>
                            <p class="text-bold"><u>Hon. Nemar G. Mendoza</u></p>
                            <p class="text" style="font-style: italic; margin-right: 23px;">Barangay Chairman</p>
                        </div>
                    </div>
    </div>
    </td>
    </tr>
    </table>
</body>

</html>

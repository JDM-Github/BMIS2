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

        .No {
            border-color: black;
            border-spacing: .5;
            border-collapse: collapse;
        }

        .No td {
            border-color: black;
            padding: 5px;
            height: 12px;
            width: 2px;
        }

        .tables {
            width: auto;

        }

        .No2 {
            border-color: black;
            border-collapse: collapse;
        }

        .No2 td {
            padding: 5px;
            height: 12px;
            width: 2px;
        }

        .tables .No2 {
            border-color: black;
            border-spacing: .5;
            margin-left: 270px;
        }

        .main-table {
            width: 650px;
            height: auto;
            font-size: 15px;
            border-top: 2px solid black;
            border-left: 2px solid black;
            border-right: 2px solid black;
            column-count: 5;
        }

        #pain {
            margin-top: 0;
            margin-bottom: 0;
        }

        .main-table td {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
        }

        .container input {
            background: none;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .last {
            margin-bottom: 30px;
            margin-top: 30px;
        }

        .box {
            margin-left: 0px;
            margin-right: 60px;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .box2 {
            margin-left: 0px;
            margin-right: 20px;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .reqs {
            text-align: left;
            border: 2px solid black;
            height: 150px;
            width: 650px;

        }

        .reqs input {
            margin-left: 70px;
        }

        .measure {
            text-align: left;
            border: 2px solid black;
            height: 240px;
            width: 650px;
        }

        .measure input {
            margin-left: 30px;
            margin-top: 5px;
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
            <div class="subtitle"><u>FENCING PERMIT </u></div>
            <table style="margin-left:100px;">
                <tr>
                    <td>
                        <div style="text-align: left;">
                            APPLICATION NO.
                            <table class="No" border="2">
                                <tr>
                                    @if (isset($fencing->application_no))
                                        @foreach (str_split($fencing->application_no) as $digit)
                                            <td>{{ $digit }}</td>
                                        @endforeach
                                    @else
                                        {{-- Add empty cells if application number is not set --}}
                                        @for ($i = 0; $i < 13; $i++)
                                            <td></td>
                                        @endfor
                                    @endif
                                </tr>
                            </table>
                        </div>

                    </td>
                    <td class="tables" align="right">
                        <div style="text-align: right;">
                            PERMIT NO.
                            <table class="No2" border="2">
                                <tr>
                                    @if (isset($fencing->permit_no))
                                        @foreach (str_split($fencing->permit_no) as $digit)
                                            <td>{{ $digit }}</td>
                                        @endforeach
                                    @else
                                        {{-- Add empty cells if permit number is not set --}}
                                        @for ($i = 0; $i < 13; $i++)
                                            <td></td>
                                        @endfor
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <p style="margin-top: 10px; margin-bottom: 0;">
                            <u>{{ $fencing->created_at->format('F d, Y') ?? 'N/A' }}</u>
                        </p>
                    </td>
                    <td style="text-align: right;">
                        <p style="margin-top: 10px; margin-bottom: 0;">
                            <u>{{ $fencing->created_at->format('F d, Y') ?? 'N/A' }}</u>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top: 0; margin-bottom: 0;">DATE OF APPLICATION</p>
                    </td>
                    <td style="text-align: right;">
                        <p style="margin-top: 0;  margin-bottom: 0;">DATE ISSUED</p>
                    </td>
                </tr>
            </table>
            <p align="left" style="margin-left: 65px">BOX 1 (TO BE ACCOMPLISHED BY APPLICANT IN PRINT)</p>
            <table class="main-table" style="margin-left: 65px">
                <tr>
                    <td colspan="4" style="border-right: 2px solid black;">
                        <p id="pain">
                            <span style="margin-left: 0px; margin-right: 0px ;">Owner </span>
                            <span style="margin-left: 30px; margin-right: 70px;">Last Name</span>
                            <span style="margin-left: 10px; margin-right: 30px;">First Name</span>
                            <span style=" margin-right: 20px;">M.I</span>
                        </p>
                        <p style="margin-left: 0px; margin-right: 90px;margin-bottom:30px;">Applicant
                            <span style="margin-left: 30px; margin-top:20px;">{{ $fencing->last_name }}</span>
                            <span style="margin-left: 80px; margin-top:20px;">{{ $fencing->first_name }}</span>
                            <span style="margin-left: 50px; margin-top:20px;">{{ $fencing->middle_initial }}</span>
                        </p>

                    </td>
                    <td width="170px">
                        <p style=" margin-top:0;text-align: left;">Tax Acct. No.</p>
                        <p>{{ $fencing->tax_account_no }}</p>
                    </td>
                </tr>
                <tr>
                    <td width="180px" style="border-top: 2px solid black; border-bottom: 2px solid black;">
                        <p style="margin-bottom:0px; margin-top:0;text-align: center;">Construction Owned by an</p>
                        <p style="margin-top:0;text-align: center;">Enterprise</p>
                        <p style="margin-left: 20px">{{ $fencing->construction_owned_by_an_enterprise }}</p>
                    </td>
                    <td width="150px"
                        style="border-top: 2px solid black; border-bottom: 2px solid black; border-left:2px solid black;">
                        <p align="center"style=" margin-top:0px;">Form of Ownership</p>
                        <p style="margin-left: 20px">{{ $fencing->form_of_ownership }}</p>
                    </td>
                    <td colspan="4"
                        style="border-top: 2px solid black; border-bottom: 2px solid black;border-left:2px solid black;">
                        <p align="left" style=" margin-top:0px;">Telephone</p>
                        <p style="margin-left: 20px">{{ $fencing->telephone }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" height="auto">
                        <p style="margin-top: 0px;">
                            <span style="margin-left: 5px; margin-right: 100px;">LOCATION</span>
                            <span style="margin-left: 30px; margin-right: 90px;">No.</span>
                            <span style="margin-left: 30px; margin-right: 90px;">Street</span>
                            <span style="margin-left: 30px; margin-right: 40px;">Barangay</span>
                        </p>
                        <p>
                            <span style="margin-left: 200px">{{ $fencing->location->number }}</span>
                            <span style="margin-left: 100px">{{ $fencing->location->street }}</span>
                            <span style="margin-left: 110px">{{ $fencing->location->barangay }}</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" height="auto">
                        <p style="margin-top: 0px;">
                            <span style="margin-left: 5px; margin-right: 100px;">Address</span>
                            <span style="margin-left: 56px; margin-right: 90px;">No.</span>
                            <span style="margin-left: 30px; margin-right: 90px;">Street</span>
                            <span style="margin-left: 30px; margin-right: 40px;">Barangay</span>
                        </p>
                        <p>
                            <span style="margin-left: 200px">{{ $fencing->address->number }}</span>
                            <span style="margin-left: 100px">{{ $fencing->address->street }}</span>
                            <span style="margin-left: 110px">{{ $fencing->address->baranggay }}</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2"colspan="5" height="auto">
                        <p class="last">
                            <span style="margin-left: 5px; margin-right: 50px;">Scope of Work</span>
                            <span style="margin-left: 10px; margin-right: 40px;">FENCE</span>
                            <span><input type="checkbox" {{ $fencing->fence->new ? 'checked' : '' }}></span>
                            <span class="box">New</span>
                            <span><input type="checkbox" {{ $fencing->fence->additional ? 'checked' : '' }}></span>
                            <span class="box">Additional</span>
                            <span><input type="checkbox" {{ $fencing->fence->repairs ? 'checked' : '' }}></span>
                            <span class="box">Repairs</span>
                        </p>
                        <p class="last" style="margin-left: 250px;">
                            <span><input type="checkbox" {{ $fencing->fence->renovation ? 'checked' : '' }}></span>
                            <span class="box2">Renovation</span>
                            <span><input type="checkbox"
                                    {{ $fencing->fence->change_of_material ? 'checked' : '' }}></span>
                            <span class="box2" style="margin-right: 8px;">Change of Material</span>
                            <span><input type="checkbox" {{ $fencing->fence->others ? 'checked' : '' }}></span>
                            <span class="box2">Others</span>
                        </p> <br> <br>
                    </td>
                </tr>
            </table>

            <div class="footer">
                <p style="text-align: right; margin-right: 20px;">
                    Page 1 of 3
                </p>
            </div>
    </table>
    <table style="width: 70%; text-align: center; border-collapse: collapse; margin-left: 100px; padding-top:20px; clear: both;">
        <tr>
            <td style="width: 20%;">
                <img src="{{ public_path('images/logo/kayanlog.png') }}" alt="Logo 1" width="90px"
                    height="auto" />
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
    <table style="border-top: 5px; margin-top: 10px; margin-left:60px;">
        <div class="container">

            <div class="title" style="margin-top: 10px;">Office of the Barangay Chairman</div>
            <div class="subtitle"><u>FENCING PERMIT </u></div>
            <p align="left" style="font-size: 12px;">BOX 2 (TO BE ACCOMPLISHED BY RECEIVING & RECORDING SECTION)</p>
            <table class="reqs">
                <p>Documents/Requirements</p>
                <form action="">
                    <input type="checkbox"
                        {{ $fencing->documentsRequirements->certificate_true_copy_of_tct ? 'checked' : '' }}> Certified
                    True Copy of TCT
                    <input type="checkbox"
                        {{ $fencing->documentsRequirements->contract_of_leases_duly_notarized ? 'checked' : '' }}> Tax
                    Declaration Tax Receipt <br>
                    <input type="checkbox"
                        {{ $fencing->documentsRequirements->plans_and_design_of_fence_over ? 'checked' : '' }}>
                    Contract of Lease Duly Notarized
                    <input type="checkbox" style="margin-left: 35px;"
                        {{ $fencing->documentsRequirements->tax_declaration_tax_receipt ? 'checked' : '' }}> Location
                    Plan & Vicinity Map (5 sets) <br>
                    <input type="checkbox"
                        {{ $fencing->documentsRequirements->location_plan_and_vicinity_map ? 'checked' : '' }}> Plans &
                    Designs of Fence Over 1.00m
                    <input type="checkbox" style="margin-left: 5px;"
                        {{ $fencing->documentsRequirements->other ? 'checked' : '' }}>
                    Others: <u>{{ $fencing->documentsRequirements->other }}</u>
                </form>
            </table>
            <p align="left" style="font-size: 12px;">BOX 3(TO BE ACCOMPLISHED BY DESIGNING ARCHITECT/CIVIL
                ENGINEER/CONTRACTOR IN PRINT)</p>
            <table class="measure">
                <p style="margin-top: 0px; margin-bottom: 5px;">Measurements in meters</p>
                <form action="">
                    <input type="checkbox" {{ $fencing->measurementsInMeters->length ? 'checked' : '' }}>Length:
                    <u> {{ $fencing->measurementsInMeters->length }}</u>
                    <input type="checkbox" {{ $fencing->measurementsInMeters->height ? 'checked' : '' }}>Height:
                    <u> {{ $fencing->measurementsInMeters->height }}</u>
                    <input type="checkbox" {{ $fencing->measurementsInMeters->excess ? 'checked' : '' }}>Excess:
                    <u> {{ $fencing->measurementsInMeters->excess }}</u>
                </form>
                <p>Type of fencing:</p>
                <form action="">
                    <input type="checkbox" {{ $fencing->typeOfFencing->indineous ? 'checked' : '' }}> Indineous
                    <input type="checkbox"style="margin-left: 145px;"
                        {{ $fencing->typeOfFencing->rc ? 'checked' : '' }}> R.C & Interlink/Cyclone Wire <br>
                    <input type="checkbox"
                        {{ $fencing->typeOfFencing->rc_and_concrete_hollow_blocks ? 'checked' : '' }}> R.C (Reinforced
                    Concrete)
                    <input type="checkbox" style="margin-left: 35px;"
                        {{ $fencing->typeOfFencing->rc_and_blocks ? 'checked' : '' }}> R.C & Steel Matting <br>
                    <input type="checkbox" {{ $fencing->typeOfFencing->rc_and_interlink_wire ? 'checked' : '' }}> R.C
                    & Concrete Hollow Blocks
                    <input type="checkbox" style="margin-left: 4px;"
                        {{ $fencing->typeOfFencing->rc_and_steel_matting ? 'checked' : '' }}> R.C & Barbed Wire & Other
                    Wires <br>
                    <input type="checkbox"
                        {{ $fencing->typeOfFencing->rc_and_barbed_wire_and_other_wires ? 'checked' : '' }}> R.C &
                    Blocks
                    <input type="checkbox" style="margin-left: 117px;"
                        {{ $fencing->typeOfFencing->others ? 'checked' : '' }}> Others: <u>
                        {{ $fencing->typeOfFencing->others }}</u>
                </form>
        </div>
        <div class="footer">
            <br> <br> <br> <br> <br> <br> <br>
            <p style="text-align: right;">
                Page 2 of 3
            </p>
        </div>
    </table>
    <table style="width: 70%; text-align: center; border-collapse: collapse; margin-left: 100px; padding-top:90px;">
        <tr>
            <td style="width: 20%;">
                <img src="{{ public_path('images/logo/kayanlog.png') }}" alt="Logo 1" width="90px"
                    height="auto" />
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
    <table style="border-top: 5px; margin-top: 10px; margin-left:60px">
        <div class="container">

            <div class="title" style="margin-top: 10px; margin-right:160px;">Office of the Barangay Chairman</div>
            <div class="subtitle" style="margin-right:160px;"><u>FENCING PERMIT </u></div>
            <p align="left" style="font-size: 12px;">BOX 4 (TO BE ACCOMPLISHED BY THE BUILDING OFFICIALS)</p>
            <Table class="reqs">
                <p class="text-bold">ACTION TAKEN:</p>
                <p style="text-indent:45px">Permit is hereby granted subject in the following conditions:</p>
                <ol type="1">
                    <li>THAT the proposed force construction shall be in conformity with the National
                        Building Code (P.D. 1996) and its corresponding implementing rules and regulations.</li>
                    <li>THAT other provisions of existing laws, decrees, rules and regulations shall be
                        complied with.</li>
                    <li>THAT occupants of lot shall have free access to and from the property.</li>
                    <li>THAT the required setback / easement shall be observed.</li>
                    <li>THAT the property to be fenced is not involved in any case.</li>
                    <li>THAT electrical permit shall be secured when equipped with electrical devices.</li>
                </ol>
            </table>
            <div align="right" style="margin-right: 180px">
                <br> <br> <br> <br> <br>
                <p>______________________</p>
                <p class="text-bold"style="margin-right: 11px;">Local Building Official</p>
            </div>
            <div align="left">
                <p>
                    NOTE: This permit may be cancelled or revoked pursuant to section 305 and 306 of the
                </p>
                <p style="margin-left: 150px;">“NATIONAL BUILDING CODE”</p>
            </div>
            <div class="footer" style="margin-right: 200px">
                <br> <br> <br> <br> <br>
                <p style="text-align: right;">
                    Page 3 of 3
                </p>
            </div>
    </table>
</body>

</html>

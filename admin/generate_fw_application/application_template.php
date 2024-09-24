<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application for PCMP Fish Workers' License</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .container {
            width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid #000;
        }

        .section-title {
            background-color: #e0e0e0;
            font-weight: bold;
            text-align: left;
            padding: 5px;
            border: 1px solid #000;
            margin-bottom: 10px;
        }

        .photo-box {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            text-align: center;
            line-height: 100px;
        }

        .label {
            font-weight: bold;
        }

        .checkbox-group {
            display: inline-block;
            margin-right: 20px;
        }

        .checkbox-group input {
            margin-right: 5px;
        }

        .header {
            text-align: center;
        }

        .signature-table {
            width: 100%;
            margin-top: 20px;
        }

        .signature-table td {
            border: none;
            text-align: center;
        }

        .signature-line {
            border-bottom: 1px solid black;
            width: 200px;
            margin: auto;
        }

        .thumb-box {
            width: 100px;
            height: 50px;
            border: 1px solid black;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        Republic of the Philippines <br>
        Government of Panabo City <br>
        Province of Davao del Norte <br>
        <strong>CITY AGRICULTURE OFFICE</strong> <br>
        APPLICATION FOR PCMP FISH WORKERS' LICENSE
    </div>
    <div>
        Date Applied: {{DATE_APPLIED}} <br>
        Permit Type: {{PERMIT_TYPE}}
    </div>


    <div class="container">

        <!-- <table>
            <tr>
                <td rowspan="3" class="photo-box">
                    PHOTO HERE
                </td>
            </tr>

        </table> -->
        License No. {{FW_ID}}
        <div class="section-title">PERSONAL INFORMATION</div>
        <table>
            <tr>
                <td class="label">Salutation</td>
                <td>
                    {{SALUTATION}}
                </td>
                <td class="label">Last Name</td>
                <td>{{LAST_NAME}}</td>
                <td class="label">First Name</td>
                <td>{{FIRST_NAME}}</td>
            </tr>
            <tr>
                <td class="label">Middle Name</td>
                <td>{{MIDDLE_NAME}}</td>
                <td class="label">Appellation (Jr., Sr., III)</td>
                <td colspan="">{{APPELLATION}}</td>
            </tr>
            <tr>
                <td class="label">Address</td>
                <td colspan="3">{{STREET}}, {{BARANGAY}}, {{CITY}}, {{PROVINCE}}</td>
                <td class="label">Postal Code</td>
                <td>{{POSTAL_CODE}}</td>
            </tr>
            <tr>
                <td class="label">Contact No.</td>
                <td>{{CONTACT}}</td>
                <td class="label">Resident of City/Municipal Since</td>
                <td>{{RESIDENT_SINCE}}</td>
                <td class="label">Age</td>
                <td>{{AGE}}</td>
            </tr>
            <tr>
                <td class="label">Date of Birth</td>
                <td>{{DOB}}</td>
                <td class="label">Place of Birth</td>
                <td>{{BIRTHPLACE}}</td>
                <td class="label">Gender</td>
                <td>
                    {{GENDER}}
                </td>
            </tr>
            <tr>
                <td class="label">Height</td>
                <td>{{HEIGHT}} (age - proxy data)</td>
                <td class="label">Weight</td>
                <td>{{WEIGHT}} (age - proxy data)</td>
                <td class="label">Skin Complexion</td>
                <td> {{SKIN}}
                </td>
            </tr>
            <tr>
                <td class="label">Nationality</td>
                <td>{{NATIONALITY}}
                </td>
                <td class="label">Educational Background</td>
                <td>{{EDUCATION}} </td>
                <td class="label">No. of Children</td>
                <td>{{CHILDREN}}</td>
            </tr>
        </table>

        <div class="section-title">ROLE IN AQUACULTURE / MARICULTURE</div>
        <table>
            <tr>
                <td class="label">Caretaker of:</td>
                <td>
                    {{CARE_TAKEROF}}
                </td>
                <td class="label">Caretaker Since (Indicate Year)</td>
                <td>{{CARE_SINCE}}</td>
            </tr>
            <tr>
                <td class="label">Location (Barangay)</td>
                <td colspan="3">{{LOCATION}}</td>
            </tr>
            <tr>
                <td class="label">Aquaculture Structures/ Gears/ Mariculture</td>
                <td>
                    {{AQUACULTURE}} -
                    {{FLA_PRIVATE}}
                </td>
                <td class="label">Present Employment</td>
                <td colspan="3">{{EMPLOYMENT}}</td>
            </tr>
            <tr>
                <td class="label">Total Units Managed</td>
                <td>{{TOTAL_UNITS}}</td>
                <td class="label">Area / Dimension per Unit</td>
                <td>{{AREA_DIMENSION}}</td>
            </tr>
        </table>

        <div class="section-title">OTHER INFORMATION</div>
        <table>
            <tr>
                <td colspan="4">
                    1. Have you ever been dismissed from the military/civil service for cause, or found guilty of a crime involving moral turpitude?
                </td>
                <td class="checkbox-group">
                    <input type="checkbox"> Yes
                    <input type="checkbox"> No
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    2. Are you a member of any Indigenous People’s Act (RA 8371) or Magna Carta for Disabled Persons (RA 7277)?
                </td>
                <td class="checkbox-group">
                    <input type="checkbox"> Yes
                    <input type="checkbox"> No
                </td>
            </tr>
            <tr>
                <td colspan="4">3. Are you differently able or physically challenged?</td>
                <td class="checkbox-group">
                    <input type="checkbox"> Yes
                    <input type="checkbox"> No
                </td>
            </tr>
        </table>

        <div class="section-title">CERTIFICATION</div>
        I have personally reviewed the information on this application and certify that it is true and correct. <br>
        <table class="signature-table">

            <tr>
                <td>
                    <div class="signature-line"></div>
                    <div>Signature over printed name of Applicant</div>
                </td>
                <td>
                    <div class="signature-line"></div>
                    <div>Date Accomplished</div>
                </td>
                <td>
                    <div class="thumb-box"></div>
                    <div>Right Thumbmark</div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="label">Reviewed by:</td>
                <td>JACKIE LOU G. LABRA, RFT</td>
                <td class="label">Aquaculturist I</td>
            </tr>
        </table>
    </div>
</body>

</html>
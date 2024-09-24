<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fisherfolk Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
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
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #000;
            font-size: 11px;
        }

        .title-table {
            width: 100%;
            /* border: 1px solid black; */
            margin-bottom: 10px;
        }

        .title-table td {
            padding: 10px;
            vertical-align: middle;
            text-align: center;

        }

        .title-text {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
            background-color: #b0d4f1;

        }

        .photo-box {
            height: .2in;
            border: 1px solid #000;
            text-align: center;
            line-height: 1in;
            font-size: 11px;
        }

        .section-title {
            background-color: #b0d4f1;
            font-weight: bold;
            padding: 5px;
            margin-bottom: 10px;
            text-align: center;
        }

        .section-title2 {
            font-weight: bold;
            text-align: center;
        }

        .label {
            font-weight: bold;
        }

        .data {
            /* border-bottom: 1px solid #000; */
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="section-title2"></div>

        <table class="title-table">
            <tr>
                <td class="title-text" colspan="4">APPLICATION FOR MUNICIPAL FISHERFOLK REGISTRATION</td>
                <td class="photo-box" colspan="1">Attach Photo Here</td>
            </tr>
        </table>

        <table>

            <tr>
                <td class="label">Registration No.</td>
                <td class="data">{{REGISTRATION_NO}}</td>
                <td class="label">New Registration</td>
                <td class="data">[Yes/No]</td>
                <td class="label">Renewal</td>
                <td class="data">[Yes/No]</td>
            </tr>
            <tr>
                <td class="label">Registration Date</td>
                <td colspan="5" class="data">[Date]</td>
            </tr>
        </table>

        <div class="section-title">PERSONAL INFORMATION</div>

        <table>
            <tr>
                <td class="label">Salutation</td>
                <td class="data">[Mr/Ms/Mrs]</td>
                <td class="label">Last Name</td>
                <td class="data">{{LAST_NAME}}</td>
                <td class="label">First Name</td>
                <td class="data">{{FIRST_NAME}}</td>
            </tr>
            <tr>
                <td class="label">Middle Name</td>
                <td class="data">{{MIDDLE_NAME}}</td>
                <td class="label">Appellation (Sr., Jr., III)</td>
                <td colspan="3" class="data">{{APPEL}}</td>
            </tr>
            <tr>
                <td class="label">Address</td>
                <td colspan="3" class="data">{{STREET}} {{BRGY}}</td>
                <td class="label">City / Municipality</td>
                <td class="data">{{CITY/MUNI}}</td>
            </tr>
            <tr>
                <td class="label">Province</td>
                <td colspan="5" class="data">{{PROV}}</td>
            </tr>
            <tr>
                <td class="label">Contact No.</td>
                <td class="data">{{CONTACT}}</td>
                <td class="label">Resident of Municipality Since</td>
                <td colspan="3" class="data">{{RESIDENCE_SINCE}}</td>
            </tr>
            <tr>
                <td class="label">Age</td>
                <td class="data">{{AGE}}</td>
                <td class="label">Date of Birth</td>
                <td class="data">{{DOB}}</td>
                <td class="label">Place of Birth</td>
                <td class="data">[Place of Birth]</td>
            </tr>
        </table>

        <div class="section-title">HOUSEHOLD INFORMATION</div>

        <table>
            <tr>
                <td class="label">Gender</td>
                <td class="data">{{GENDER}}</td>
                <td class="label">Civil Status</td>
                <td class="data">[Single/Married/Other]</td>
                <td class="label">No. of Children</td>
                <td class="data">[No. of Children]</td>
            </tr>
            <tr>
                <td class="label">No. of Household Members</td>
                <td colspan="2" class="data">[Number]</td>
                <td class="label">No. of Employed</td>
                <td colspan="2" class="data">[Employed]</td>
            </tr>
            <tr>
                <td class="label">Educational Background</td>
                <td colspan="5" class="data">[Elementary/High School/College/Other]</td>
            </tr>
        </table>

        <div class="section-title">INCOME & LIVELIHOOD INFORMATION</div>

        <table>
            <tr>
                <td class="label">Household Monthly Income</td>
                <td colspan="5" class="data">[Income Value]</td>
            </tr>
            <tr>
                <td class="label">Farming Income</td>
                <td class="data">[Farming Value]</td>
                <td class="label">Non-Farming Income</td>
                <td colspan="3" class="data">[Non-Farming Value]</td>
            </tr>
        </table>

        <div class="section-title">OTHER INFORMATION</div>

        <table>
            <tr>
                <td class="label">Person to Notify in Case of Emergency</td>
                <td class="data">[Emergency Contact]</td>
                <td class="label">Relationship</td>
                <td class="data">[Relationship]</td>
                <td class="label">Contact Number</td>
                <td class="data">[Emergency Contact No.]</td>
            </tr>
        </table>

        <div class="section-title">LIVELIHOOD</div>

        <table>
            <tr>
                <td class="label">Main Source of Income</td>
                <td colspan="2" class="data">[Capture Fishing / Aquaculture / Fish Processing / Other]</td>
                <td class="label">Other Sources of Income</td>
                <td colspan="2" class="data">[Other Income Source]</td>
            </tr>
        </table>

        <div class="section-title">ORGANIZATION INFORMATION</div>

        <table>
            <tr>
                <td class="label">Name of Organization</td>
                <td colspan="5" class="data">{{ORG_NAME}}</td>
            </tr>
            <tr>
                <td class="label">Member Since</td>
                <td class="data">{{MEMBER_SINCE}}</td>
                <td class="label">Position/Designation</td>
                <td colspan="3" class="data">{{ORG_POSITION}}</td>
            </tr>
        </table>

        <div class="section-title">CERTIFICATION</div>

        <table>
            <tr>
                <td class="label">Signature</td>
                <td colspan="5" class="data">____________________</td>
            </tr>
        </table>
    </div>
</body>

</html>
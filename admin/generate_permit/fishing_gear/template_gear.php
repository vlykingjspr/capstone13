<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fishing Gear Permit Application</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .container {
            width: 800px;
            margin: 0 auto;
        }

        h1,
        h2,
        h3 {
            text-align: center;
        }

        .header-section {
            text-align: center;
        }

        .permit-info {
            display: flex;
            justify-content: space-between;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
        }

        .checkbox-group label input {
            margin-right: 5px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
        }

        .signature-section div {
            width: 30%;
            text-align: center;
            border-top: 1px solid black;
        }

        .center {
            text-align: center;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .flex>div {
            width: 45%;
            /* Adjust the width as needed */
        }

        table,
        td,
        th {
            border: .5px solid black;
            text-align: left;
        }

        table {
            width: 100%;
            border: 1px solid black;
        }

        table td {
            padding: 5px;
            vertical-align: top;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="center">
            <strong>
                <label>City Agriculture Office</label><br>
                <label>Panabo City</label><br>
                <label style="font-size: 18px;">Application for Fishing Gear Permit</label><br></strong>
            <label>Barangay: {{BARANGAY}}</label> <br>
            <label>Permit No: </label>
        </div>
        <div class="permit-info">
            <div>
                <label>Date Applied: </label> <br>
                <label>Permit Type:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox"> New</label>
                    <label><input type="checkbox"> Renew</label>
                </div>
            </div>
        </div>
        <label>License I.D. No.: PCMPDDN20-000____</label>
        <div class="permit-info">
            <div>
                <label>Name of Operator</label><br>
                <table>
                    <tr>
                        <th>Last name</th>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Appellation</th>
                    </tr>
                    <tr>
                        <td>{{LAST_NAME}}</td>
                        <td>{{FIRST_NAME}} </td>
                        <td> {{MIDDLE_NAME}} </td>
                        <td> {{APPELL}} </td>
                    </tr>

                </table>
            </div>
            <div>
                <label>Address of Operator:</label> <br>
                <table>
                    <tr>
                        <td>Purok</td>
                        <td>Barangay</td>
                        <td>City</td>
                        <td>Province</td>
                        <td>Contact No.</td>
                    </tr>
                    <tr>
                        <td>{{STREET}}</td>
                        <td>{{BARANGAY}}</td>
                        <td>{{CITY}}</td>
                        <td>{{PROVINCE}}</td>
                        <td>{{CONTACT}}</td>
                    </tr>
                </table>

            </div>
        </div>
        <label style="text-align: right;">FOR CAGRO ONLY</label> <br>
        <label><strong> ADMEASUREMENT</strong></label> <br>
        <label>TYPE OF GEAR APPLIED:</label>
        <div style="margin-left: 10px;">
            {{GEAR_TYPE}}
        </div>

        <br>
        <div class="flex">
            <div>
                <label>REGISTERED DIMENSION:</label> <br>
                <label>Wings: {{WINGS}}</label> <br>
                <label>Center Line Net: {{CENTER}}</label><br>
                <label>Other Specification: {{OTHER}}</label>
            </div>
            <div>
                <label>Remarks:</label>
                {{REMARKS}}
            </div>
        </div>

        <div class="inspection-info">
            <label>OR No.: {{OR_NUMBER}}</label><br>
            <label>Date Issued: {{DATE_ISSUED}}</label><br>
        </div>
        <div style="text-align: right;">
            <label>Inspected By:</label><br>
            <div style="text-align: right;">
                <label>_______________</label>
                <div>Aquaculturist II</div>
            </div>

        </div>
        <label for="">......................................................................................................................................................................</label>
        <br><br>
        <table>
            <tr>
                <!-- First column divided horizontally into two -->
                <td>Validated by: <br>
                    <div style="text-align: center;">
                        <label style="border-top: .5px solid black;">
                            JACKIE LOU G. LABRA, RFT
                        </label> <BR>
                        <label for="">Aquaculturist I</label>
                    </div>

                </td>
                <td class="text-align: center; " rowspan="2">Approved by: <br> <br>
                    <div style="text-align: center;">
                        <label style="border-top: .5px solid black;">
                            JOSE E. RELAMPAGOS
                        </label> <BR>
                        <label for=""> City Mayor</label>
                    </div>

                </td>
            </tr>
            <tr>

                <td>Recommending Approval: <br>
                    <div style="text-align: center;">
                        <label style="border-top: .5px solid black;">
                            SAMUEL N. ANAY,RA,MSAg,DPA
                        </label> <BR>
                        <label for="">City Agriculturist</label>
                    </div>
                </td>
            </tr>
        </table>
    </div>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
            margin-top: 10px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }

        .header-title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header-title">
            License for PCMP Fish Workers' License
        </div>

        <table>
            <tr>
                <td><strong>First Name:</strong> {{FIRST_NAME}}</td>
                <td><strong>Middle Name:</strong> {{MIDDLE_NAME}}</td>
                <td><strong>Last Name:</strong> {{LAST_NAME}}</td>
            </tr>
            <tr>
                <td><strong>Date of Birth:</strong> {{DOB}}</td>
                <td colspan="2"><strong>Address:</strong> {{ADDRESS}}</td>
            </tr>
            <tr>
                <td colspan="3"><strong>Restrictions:</strong> {{RESTRICTIONS}}</td>
            </tr>
        </table>
    </div>

</body>

</html>
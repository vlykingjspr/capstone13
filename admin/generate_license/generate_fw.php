<?php
require_once __DIR__ . '../../vendor/autoload.php'; // Adjust the path if necessary

use Mpdf\Mpdf;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data sent from the client-side (e.g., via AJAX)
    $name = $_POST['name'];
    $address = $_POST['address'];
    $orNumber = $_POST['orNumber'];
    $restrictionsString = $_POST['restrictions'];
    $validatedBy = $_POST['validatedBy'];

    // Create an instance of the mPDF class
    $mpdf = new Mpdf();

    // Define the HTML content
    $html = '
    <div style="justify-content: center; display:flex; margin:0">
        <div style="width: 50rem; background-color:white;" class="space-top">
            <div style="display: flex; border-bottom: 1px solid black" class="style-inline">
                <div>
                    <img src="../img/lic-logo.png" style="width: auto; height:70px">
                </div>
                <div>
                    <p style="color: black; margin: 0;">Republic of the Philippines</p>
                    <p style="color: black; margin: 0;">City Government of Panabo</p>
                    <p style="color: black; margin: 0;">Province of Davao del Norte</p>
                    <h3 style="color: black; margin: 0;">CITY AGRICULTURAL OFFICE</h3>
                </div>
            </div>
            <div style="display: flex; align-items: center;">
                <div style="text-align:center; margin:auto">
                    <h2> APPLICATION FOR FISHER\'S LICENSE</h2>
                </div>
            </div>
            <div>
                <div style="justify-content: space-between; display: flex" class="style-inline">
                    <div>
                        <p style="color: black; margin:0;">Date Issued: ' . date("F j, Y") . '</p>
                    </div>
                    <div>
                        <p style="color: black; margin:0; font-weight: bold">OFFICIAL PERMIT NO: PCDDN 2024-000684</p>
                    </div>
                </div>
                <div style="display: flex; border-bottom: 1px solid black" class="style-inline space-bot">
                    <div style="display: block">
                        <div>
                            <img src="../img/user.png" style="height: 150px; width: 150px; margin: auto">
                        </div>
                        <div>
                        </div>
                    </div>
                    <div style="display: block; padding-inline:2rem;">
                        <div style="display: flex; margin:auto">
                            <div>
                                <p style="color: black; margin:0"> FULL NAME</p>
                                <p style="color: black; margin:0; font-weight:bold">' . htmlspecialchars($name) . '</p>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div>
                                <p style="color: black; margin:0;">ADDRESS</p>
                                <p style="color: black; margin:0; font-weight:bold">' . htmlspecialchars($address) . '</p>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div>
                                <p style="color: black; margin:0">OR NUMBER</p>
                                <p style="color: black; margin:0;">' . htmlspecialchars($orNumber) . '</p>
                            </div>
                            <div style="margin-left: 10px">
                                <p style="color: black; margin:0">RESTRICTIONS</p>
                                <p style="color: black; margin:0;">' . htmlspecialchars($restrictionsString) . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display:flex !important;">
                <div style="border-right: 1px solid black; width: 50%;">
                    <div class="style-inline" style="display:flex; margin:auto; text-align: center; border-bottom: 1px solid black">
                        <div>
                            <p style="color: black;">VALIDATED BY:</p>
                        </div>
                        <div class="style-inline">
                            <p style="color: black; margin:0; border-bottom: 1px solid black">' . htmlspecialchars($validatedBy) . '</p>
                            <p style="color: black; margin:0">Agriculturist</p>
                        </div>
                    </div>
                    <div class="style-inline" style="display:flex; margin: 0 auto; text-align: center">
                        <div>
                            <p style="color: black;">RECOMMENDING APPROVAL:</p>
                        </div>
                        <div class="style-inline">
                            <p style="color: black; margin:0; border-bottom: 1px solid black">Nick Gurr</p>
                            <p style="color: black; margin:0">Agriculturist</p>
                        </div>
                    </div>
                </div>
                <div style="width: 50%">
                    <div class="style-inline" style="display:flex; margin:auto; text-align: center; border-bottom: 1px solid black">
                        <div>
                            <p style="color: black;">APPROVED BY:</p>
                        </div>
                        <div class="style-inline">
                            <p style="color: black; margin:0; border-bottom: 1px solid black">Nick Gurr</p>
                            <p style="color: black; margin:0">Agriculturist</p>
                        </div>
                    </div>
                    <div class="style-inline" style="display:flex; margin: 0 auto; text-align: center">
                        <div>
                            <p style="color: black;">EVALUATED BY:</p>
                        </div>
                        <div class="style-inline">
                            <p style="color: black; margin:0; border-bottom: 1px solid black">Nick Gurr</p>
                            <p style="color: black; margin:0">Agriculturist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';

    // Write HTML to PDF
    $mpdf->WriteHTML($html);

    // Output the PDF
    $mpdf->Output('license.pdf', 'D'); // 'D' for download, 'I' for inline view in browser
}
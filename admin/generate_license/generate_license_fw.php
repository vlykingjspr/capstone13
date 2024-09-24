<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Make sure TCPDF is loaded
include("../../conn.php"); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST
    $user_id = $_POST['user_id'];
    $restrictions = isset($_POST['restrictions']) ? $_POST['restrictions'] : [];

    // Fetch user data from the database
    $query = "SELECT client_fname, client_mname, client_lname, client_dob, client_street, client_brgy, client_municipal, client_prov 
              FROM licensing WHERE client_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }

    // Load the template file
    $htmlTemplate = file_get_contents('license_template.php');

    // Populate the template with user data
    $htmlTemplate = str_replace('{{FIRST_NAME}}', strtoupper($userData['client_fname']), $htmlTemplate);
    $htmlTemplate = str_replace('{{MIDDLE_NAME}}', strtoupper($userData['client_mname']), $htmlTemplate);
    $htmlTemplate = str_replace('{{LAST_NAME}}', strtoupper($userData['client_lname']), $htmlTemplate);
    $htmlTemplate = str_replace('{{DOB}}', strtoupper($userData['client_dob']), $htmlTemplate);
    $htmlTemplate = str_replace('{{ADDRESS}}', strtoupper($userData['client_street'] . ', ' . $userData['client_brgy'] . ', ' . $userData['client_municipal'] . ', ' . $userData['client_prov']), $htmlTemplate);

    // Process restrictions and add to the template
    $restrictionText = '';
    if (!empty($restrictions)) {
        foreach ($restrictions as $restriction) {
            switch ($restriction) {
                case '1':
                    $restrictionText .= 'Subsistence, ';
                    break;
                case '2':
                    $restrictionText .= 'Fishworker, ';
                    break;
                case '3':
                    $restrictionText .= 'Commercial, ';
                    break;
                case '4':
                    $restrictionText .= 'Traps and Weir, ';
                    break;
                case '5':
                    $restrictionText .= 'Aquaculture, ';
                    break;
                case '6':
                    $restrictionText .= 'Mariculture, ';
                    break;
                case '7':
                    $restrictionText .= 'Recreational/Sports Fishing, ';
                    break;
                case '8':
                    $restrictionText .= 'Experiment and Research, ';
                    break;
            }
        }
        $restrictionText = rtrim($restrictionText, ', '); // Remove trailing comma
    }
    $htmlTemplate = str_replace('{{RESTRICTIONS}}', $restrictionText, $htmlTemplate);

    // Initialize TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('CAGRO');
    $pdf->SetTitle('Fishworker Data');
    $pdf->SetSubject('Fishworker Data Report');
    $pdf->SetKeywords('TCPDF, PDF, fishworker, report');

    // Set header and footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();

    // Write the processed template to the PDF
    $pdf->writeHTML($htmlTemplate, true, false, true, false, '');

    // Output the PDF to browser
    $pdf->Output('license_' . $user_id . '.pdf', 'I');
}

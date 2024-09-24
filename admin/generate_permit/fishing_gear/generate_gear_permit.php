<?php
require_once __DIR__ . '../../../../vendor/autoload.php'; // Include TCPDF library
include("../../../conn.php"); // Include your database connection

if (isset($_GET['fg_id'])) {
    $fg_id = $_GET['fg_id'];

    // Fetch fishing gear data from the database based on fg_id
    $query = "SELECT * FROM fishinggears WHERE fg_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $fg_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();


        $htmlTemplate = file_get_contents('template_gear.php');


        // Replace placeholders in the template with actual data
        $htmlTemplate = str_replace('{{FIRST_NAME}}', strtoupper(htmlspecialchars($data['fg_locfname'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{LAST_NAME}}', strtoupper(htmlspecialchars($data['fg_loclname'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{MIDDLE_NAME}}', strtoupper(htmlspecialchars($data['fg_locmname'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{APPELL}}', strtoupper(htmlspecialchars($data['fg_locappel'])), $htmlTemplate);

        $htmlTemplate = str_replace('{{OPERATOR_ADDRESS}}', strtoupper(htmlspecialchars($data['fg_locstreet'] . ', ' . $data['fg_locbarangay'] . ', ' . $data['fg_locmunicipal'] . ', ' . $data['fg_locprov'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{DOB}}', strtoupper(htmlspecialchars($data['fg_dob'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{OR_NUMBER}}', strtoupper(htmlspecialchars($data['fg_OR'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{GEAR_TYPE}}', strtoupper(htmlspecialchars($data['fg_type'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{BARANGAY}}', strtoupper(htmlspecialchars($data['fg_locbarangay'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{CITY}}', strtoupper(htmlspecialchars($data['fg_locmunicipal'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{PROVINCE}}', strtoupper(htmlspecialchars($data['fg_locprov'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{STREET}}', strtoupper(htmlspecialchars($data['fg_locstreet'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{DATE_ISSUED}}', strtoupper(htmlspecialchars($data['issuance_date'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{WINGS}}', strtoupper(htmlspecialchars($data['fg_wing'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{CENTER}}', strtoupper(htmlspecialchars($data['fg_centerline'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{OTHER}}', strtoupper(htmlspecialchars($data['fg_otherspec'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{CONTACT}}', strtoupper(htmlspecialchars($data['fg_loccontact'])), $htmlTemplate);


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
        // Set margins (top margin set to 0 to remove space)
        $pdf->SetMargins(10, 0, 10);  // Left = 10mm, Top = 0mm, Right = 10mm

        // Set auto page breaks (to control the space on the bottom if needed)
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);
        $pdf->writeHTML($htmlTemplate, true, false, true, false, '');
        // Output PDF
        $pdf->Output('fishing_gear_permit_' . $fg_id . '.pdf', 'D'); // 'D' forces download

    } else {
        echo "No data found for the given ID.";
    }
} else {
    echo "Invalid request.";
}

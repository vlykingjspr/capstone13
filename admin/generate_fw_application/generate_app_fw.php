<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Include TCPDF library
include("../../conn.php"); // Include your database connection

if (isset($_POST['fw_id'])) {
    $fw_id = $_POST['fw_id'];

    // Fetch the fishworker data based on fw_id
    $query = "SELECT * FROM fishworkerlicense WHERE fw_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $fw_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Load the HTML template file for Fishworker
        $htmlTemplate = file_get_contents('application_template.php');

        // Replace the placeholders with actual data
        $htmlTemplate = str_replace('{{FW_ID}}', strtoupper($data['fw_id']), $htmlTemplate);
        $htmlTemplate = str_replace('{{FIRST_NAME}}', strtoupper($data['fw_fname']), $htmlTemplate);
        $htmlTemplate = str_replace('{{LAST_NAME}}', strtoupper($data['fw_lname']), $htmlTemplate);
        $htmlTemplate = str_replace('{{MIDDLE_NAME}}', strtoupper($data['fw_mname']), $htmlTemplate);
        $htmlTemplate = str_replace('{{APPELLATION}}', strtoupper($data['fw_appell']), $htmlTemplate);
        $htmlTemplate = str_replace('{{GENDER}}', strtoupper($data['fw_gender']), $htmlTemplate);
        $htmlTemplate = str_replace('{{AGE}}', strtoupper($data['fw_age']), $htmlTemplate);
        $htmlTemplate = str_replace('{{HEIGHT}}', strtoupper($data['fw_age']), $htmlTemplate);
        $htmlTemplate = str_replace('{{WEIGHT}}', strtoupper($data['fw_age']), $htmlTemplate);
        $htmlTemplate = str_replace('{{DOB}}', strtoupper($data['fw_dob']), $htmlTemplate);
        $htmlTemplate = str_replace('{{CITY}}', strtoupper($data['fw_municipal']), $htmlTemplate);
        $htmlTemplate = str_replace('{{PROVINCE}}', strtoupper($data['fw_province']), $htmlTemplate);
        $htmlTemplate = str_replace('{{BARANGAY}}', strtoupper($data['fw_barangay']), $htmlTemplate);
        $htmlTemplate = str_replace('{{STREET}}', strtoupper($data['fw_street']), $htmlTemplate);
        $htmlTemplate = str_replace('{{CONTACT}}', strtoupper($data['fw_contact']), $htmlTemplate);
        $htmlTemplate = str_replace('{{CARE_TAKEROF}}', strtoupper($data['fw_caretakerof']), $htmlTemplate);
        $htmlTemplate = str_replace('{{CARE_SINCE}}', strtoupper($data['fw_caretakersince']), $htmlTemplate);
        $htmlTemplate = str_replace('{{LOCATION}}', strtoupper($data['fw_location']), $htmlTemplate);
        $htmlTemplate = str_replace('{{TOTAL_UNITS}}', strtoupper($data['fw_unitsmanaged']), $htmlTemplate);
        $htmlTemplate = str_replace('{{AREA_DIMENSION}}', strtoupper($data['fw_unitdeminsions']), $htmlTemplate);
        $htmlTemplate = str_replace('{{AREA_DIMENSION}}', strtoupper($data['fw_unitdeminsions']), $htmlTemplate);
        $htmlTemplate = str_replace('{{AQUACULTURE}}', strtoupper($data['fw_aquaculture']), $htmlTemplate);
        $htmlTemplate = str_replace('{{FLA_PRIVATE}}', strtoupper($data['fw_FLA_Private']), $htmlTemplate);


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

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 11);

        // Write HTML content
        $pdf->writeHTML($htmlTemplate, true, false, true, false, '');

        // Close and output the PDF
        $pdf->Output('fishworker_data_' . $fw_id . '.pdf', 'D'); // 'I' to output in browser, 'D' to force download

    } else {
        echo "No data found for the given ID.";
    }
} else {
    echo "Invalid request.";
}

<?php
require_once __DIR__ . '/../../vendor/autoload.php';

include("../../conn.php"); // Include your database connection

if (isset($_POST['ff_id'])) {
    $ff_id = $_POST['ff_id'];

    // Fetch the fisherfolk data based on ff_id
    $query = "SELECT * FROM fisherfolks WHERE ff_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $ff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Load the HTML template file
        $htmlTemplate = file_get_contents('application_template.php');

        // Replace the placeholders with actual data
        $htmlTemplate = str_replace('{{REGISTRATION_NO}}', strtoupper($data['ff_id']), $htmlTemplate);
        $htmlTemplate = str_replace('{{FIRST_NAME}}', strtoupper($data['ff_fname']), $htmlTemplate);
        $htmlTemplate = str_replace('{{LAST_NAME}}', strtoupper($data['ff_lname']), $htmlTemplate);
        $htmlTemplate = str_replace('{{MIDDLE_NAME}}', strtoupper($data['ff_mname']), $htmlTemplate);
        $htmlTemplate = str_replace('{{APPEL}}', strtoupper($data['ff_appell']), $htmlTemplate);
        $htmlTemplate = str_replace('{{GENDER}}', strtoupper($data['ff_gender']), $htmlTemplate);
        $htmlTemplate = str_replace('{{DOB}}', strtoupper($data['ff_dob']), $htmlTemplate);
        $htmlTemplate = str_replace('{{CITY/MUNI}}', strtoupper($data['ff_municipal']), $htmlTemplate);
        $htmlTemplate = str_replace('{{PROV}}', strtoupper($data['ff_prov']), $htmlTemplate);
        $htmlTemplate = str_replace('{{BRGY}}', strtoupper($data['ff_barangay']), $htmlTemplate);
        $htmlTemplate = str_replace('{{STREET}}', strtoupper($data['ff_street']), $htmlTemplate);
        $htmlTemplate = str_replace('{{AGE}}', strtoupper($data['ff_age']), $htmlTemplate);
        $htmlTemplate = str_replace('{{RESIDENCE_SINCE}}', strtoupper($data['ff_residence']), $htmlTemplate);
        $htmlTemplate = str_replace('{{CONTACT}}', strtoupper($data['ff_contact']), $htmlTemplate);
        $htmlTemplate = str_replace('{{OR_NUMBER}}', strtoupper($data['ff_OR']), $htmlTemplate);
        $htmlTemplate = str_replace('{{ORG_NAME}}', strtoupper($data['ff_orgname']), $htmlTemplate);
        $htmlTemplate = str_replace('{{MEMBER_SINCE}}', strtoupper($data['ff_membersince']), $htmlTemplate);
        $htmlTemplate = str_replace('{{ORG_POSITION}}', strtoupper($data['ff_orgposition']), $htmlTemplate);


        // Initialize TCPDF
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('CAGRO');
        $pdf->SetTitle('Fisherfolk Data');
        $pdf->SetSubject('Fisherfolk Data Report');
        $pdf->SetKeywords('TCPDF, PDF, fisherfolk, report');

        // Set header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        $pdf->writeHTML($htmlTemplate, true, false, true, false, '');

        // Output the HTML content
        // $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output the PDF
        $pdf->Output('fisherfolk_data_' . $ff_id . '.pdf', 'D'); // 'I' to output in browser, 'D' to force download

    } else {
        echo "No data found for the given ID.";
    }
} else {
    echo "Invalid request.";
}

// require_once __DIR__ . '/../../vendor/autoload.php';

// // Create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// // Set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Your Name');
// $pdf->SetTitle('TCPDF Template');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, guide');

// // Disable header
// $pdf->setPrintHeader(false);

// // Set margins (0 top margin)
// $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);

// // Set footer margin
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// // Add a page
// $pdf->AddPage();

// // Load HTML content from a separate file (your template)
// $html = file_get_contents('application_template.php');

// // Output the HTML content as PDF
// $pdf->writeHTML($html, true, false, true, false, '');

// // Close and output PDF document
// // Use 'I' to display in browser, not download
// $pdf->Output('example.pdf', 'I');

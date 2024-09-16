<?php
// Include the TCPDF library (auto-loaded by Composer)
require_once __DIR__ . '/../../vendor/autoload.php';

// Capture the submitted form data
$selectedRequirements = isset($_POST['requirements']) ? $_POST['requirements'] : [];
$paymentData = isset($_POST['payment_data']) ? json_decode($_POST['payment_data'], true) : [];

// Create new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CAGRO Administrator');
$pdf->SetTitle('Requirements & Fees');

// Add a page
$pdf->AddPage();

// Set margins
$pdf->SetMargins(15, 40, 15); // Left, Top, Right margins

// Set font for the header
$pdf->SetFont('helvetica', 'B', 12);

// // Add the first logo (left)
// $pdf->Image('path/to/left_logo.png', 15, 10, 20, 20, 'PNG'); // Replace with the path to your left logo

// // Add the second logo (right)
// $pdf->Image('path/to/right_logo.png', 175, 10, 20, 20, 'PNG'); // Replace with the path to your right logo

// Add the main title text
$pdf->SetXY(25, 10); // Adjust this position based on your needs
$pdf->Cell(0, 0, 'CITY AGRICULTURE OFFICE', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 0, 'Panabo City', 0, 1, 'C');

// Add the second line for subtitle
$pdf->SetFont('helvetica', 'B', 14);
$pdf->SetXY(25, 20); // Adjust this position based on your needs
$pdf->Cell(0, 0, 'CHECKLIST FOR PERMIT TO OPERATE', 0, 1, 'C');

// Optional signature or hand-written text
$pdf->SetFont('helvetica', 'I', 12);
$pdf->SetXY(160, 30); // Position to the right
$pdf->Cell(30, 0, 'Signature', 0, 1, 'R');

// Move the Y position to start the content below the header
$pdf->SetY(50);

// Set font for the content
$pdf->SetFont('helvetica', '', 12);

// Add the Requirements Checklist
$pdf->Write(0, 'Requirements Checklist:', '', 0, 'L', true, 0, false, false, 0);

// List the selected requirements
if (!empty($selectedRequirements)) {
    foreach ($selectedRequirements as $requirement) {
        $pdf->Write(0, '- ' . $requirement, '', 0, 'L', true, 0, false, false, 0);
    }
} else {
    $pdf->Write(0, 'No requirements selected.', '', 0, 'L', true, 0, false, false, 0);
}

// Add a line break
$pdf->Ln(10);

// Add the Payment Details section
$pdf->Write(0, 'Payment Details:', '', 0, 'L', true, 0, false, false, 0);

if (!empty($paymentData)) {
    // Create a simple table layout for payments
    $tbl = '<table border="1" cellpadding="4">
            <thead>
                <tr style="background-color:#f2f2f2;">
                    <th><strong>Payment Description</strong></th>
                    <th><strong>Amount</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Subtotal</strong></th>
                </tr>
            </thead>
            <tbody>';

    foreach ($paymentData as $payment) {
        $tbl .= '<tr>
                    <td>' . htmlspecialchars($payment['payment']) . '</td>
                    <td>' . htmlspecialchars($payment['amount']) . '</td>
                    <td>' . htmlspecialchars($payment['qty']) . '</td>
                    <td>' . htmlspecialchars($payment['subtotal']) . '</td>
                </tr>';
    }

    $tbl .= '</tbody></table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
} else {
    $pdf->Write(0, 'No payment data available.', '', 0, 'L', true, 0, false, false, 0);
}

// Output the PDF as a file download
$pdf->Output('requirements_list.pdf', 'D'); // 'D' forces download, 'I' shows in browser

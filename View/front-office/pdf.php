<?php
// Get the date from the POST request
include 'library/tcpdf.php';
$imprimer_date = $_GET['date'];

// Create an instance of TCPDF
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('MEDIPLUS');
$pdf->SetAuthor('MEDIPLUS');
$pdf->SetTitle('Commande Details');
$pdf->SetSubject('Commande Details PDF');

// Set margins and padding
$pdf->SetMargins(15, 15, 15);
$pdf->SetCellPadding(2);

// Add a page
$pdf->AddPage();

// Add logo image
$logoPath = 'img/ligo.jpg';
$logoX = 15;
$logoY = 15;
$logoWidth = 50;
$logoHeight = 0;
$pdf->Image($logoPath, $logoX, $logoY, $logoWidth, $logoHeight);

// Set position for the table
$pdf->SetXY(15, 70); // Adjust the Y position according to the height of your logo

// Line separator
$pdf->SetLineWidth(0.5);
$pdf->Line(15, 30, 195, 30);

// Position for the command details
$pdf->SetXY(15, 35);

// Content of the PDF
$pdf->SetFont('helvetica', 'B', 18);
$pdf->Cell(0, 10, 'Date de la commande - ' . $imprimer_date, 0, 1, 'C');

// Initialize total variables outside the loop
$total_including_vat = 0;
$total_excluding_vat = 0;

include '../../Controller/config.php';
include '../../Controller/commandeC.php';
include '../../Controller/drugsC.php';

// Fetch data for the specific date
$newc = new pannC();
$result = $newc->readwithdate($imprimer_date);
$firstRow = true;

// Table start
$pdf->Ln(10); // Add vertical spacing
$pdf->SetFont('helvetica', 'B', 14);
$pdf->SetFillColor(230, 230, 230); // Set background color for header row
$pdf->Cell(60, 10, 'Médicament', 1, 0, 'C', true); // Set background color for header cell
$pdf->Cell(40, 10, 'Quantité', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Prix unitaire (TTC)', 1, 0, 'C', true); // TTC - Toutes Taxes Comprises
$pdf->Cell(50, 10, 'Prix total (TTC)', 1, 1, 'C', true);

$pdf->SetFont('helvetica', '', 12);
$pdf->SetFillColor(255, 255, 255); // Set background color for data rows
foreach ($result as $row) {
    // Add values to the table
    $c = new MedicamentC();
    $ress = $c->getMedicamentById($row['id_med']);
    $pdf->Cell(60, 10, $ress[0]['nom'], 1, 0, 'C', true); // Set background color for data cell
    $pdf->Cell(40, 10, $row['qte_med'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $ress[0]['prix'] . ' DT', 1, 0, 'C', true);

    // Calculate the total price for each order (including VAT)
    $prix_total_including_vat = $ress[0]['prix'] * $row['qte_med'];

    // Display the total price including VAT with two decimal places
    $pdf->Cell(50, 10, number_format($prix_total_including_vat, 2, '.', '') . ' DT', 1, 1, 'C', true);

    $total_including_vat += $prix_total_including_vat;

    $firstRow = false;
}

// Calculate the total price excluding VAT
$total_excluding_vat = $total_including_vat / 1.19;

// Display total excluding VAT with two decimal places
$pdf->Ln(10); // Add vertical spacing
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(140, 10, 'Total (HT)', 1, 0, 'C', true); // Set background color for total row
$pdf->Cell(50, 10, number_format($total_excluding_vat, 2, '.', '') . ' DT', 1, 1, 'C', true);

// Display VAT amount (subtracted from the total) with two decimal places
$pdf->Ln(5); // Add vertical spacing
$pdf->Cell(140, 10, 'TVA (19%)', 0, 0, 'R'); // Display the VAT label
$pdf->Cell(50, 10, number_format(($total_including_vat - $total_excluding_vat), 2, '.', '') . ' DT', 0, 1, 'C'); // Display the VAT amount

// Display total including 19% VAT with two decimal places
$pdf->Ln(5); // Add vertical spacing
$pdf->Cell(140, 10, 'Total inclus 19% TVA', 1, 0, 'C', true); // Set background color for total row
$pdf->Cell(50, 10, number_format($total_including_vat + 7, 2, '.', '') . ' DT', 1, 1, 'C', true);

// Output the PDF
$pdf->Output('commande_details_' . $imprimer_date . '.pdf', 'D');

header("Location: dashpatient.php");

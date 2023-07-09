<?php
    $pdf->SetFont('times', 'B', 35);
    $pdf->Cell(0, 20, 'DIMPEX', 0, 1, 'C');

    $pdf->SetFont('times', '', 10);
    $pdf->SetX(10);
    $pdf->Cell(0, 5, 'Adresse : '. $company -> adresse);
    $pdf->SetX(160);
    $pdf->Cell(0, 5, 'Email : ' . $company -> email);
    $pdf->Line(10, 40, 200, 40);
    $pdf->Ln(10);

    $pdf->SetFont('times', 'B', 15);
    $pdf->Cell(0, 20, 'FACTURE', 0, 1, 'C');

    // Informations de la facture
    $pdf->SetFont('times', '', 12);
    $pdf->SetY(60);
    $pdf->Cell(0, 5, 'Numero Facture : ' . $my_facture['id_facture'], 0, 1);
    $pdf->Cell(0, 10, 'Date : ' . $my_facture['date_insertion'], 0, 1);
    $pdf->Ln(5);

    $pdf->SetFont('times', '', 12);
    $pdf->SetY(60);
    $pdf->SetX(140);
    $pdf->Cell(0, 7, 'Client : '. $my_facture['nom_entreprise'], 0, 1, 'L');
    $pdf->SetX(140);
    $pdf->Cell(0, 7, 'Adresse : '. $my_facture['adresse_tiers'], 0, 1, 'L');
    $pdf->SetX(140);
    $pdf->Cell(0, 7, 'E-mail : '. $my_facture['email_tiers'], 0, 1, 'L');
    $pdf->SetX(140);
    $pdf->Cell(0, 7, 'Responsable : ' . $my_facture['responsable'], 0, 1, 'L');
    $pdf->Line(10, 90, 200, 90);
    $pdf->Ln(5);

    $pdf->SetFont('times', '', 12);
    $pdf->SetX(70);
    $pdf->Cell(0, 10, 'Ref BC : '. $my_facture['bc'], 0, 1);
    $pdf->SetX(70);
    $pdf->Cell(0, 10, 'Objet : '. $my_facture['object_facture'], 0, 1);
    $pdf->Ln(5);

// Header row
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(40, 10, 'Designation', 1, 0, 'C');
$pdf->Cell(30, 10, 'Unité', 1, 0, 'C');
$pdf->Cell(35, 10, 'Quantité', 1, 0, 'C');
$pdf->Cell(40, 10, 'Prix unitaires', 1, 0, 'C');
$pdf->Cell(40, 10, 'Montant HT', 1, 1, 'C');

$pdf->SetFont('times', '', 10);
foreach ($facture_kid as $child) {
    // Individual product row
    $pdf->Cell(40, 10, $child["nom_product"], 1, 0, 'C');
    $pdf->Cell(30, 10, $child["nom_unity"], 1, 0, 'C');
    $pdf->Cell(35, 10, number_format($child['qty'], 1, ',', ' '), 1, 0, 'C');
    $pdf->Cell(40, 10, "Ar " . number_format($child['pu'], 2, ',', ' '), 1, 0, 'R');
    $pdf->Cell(40, 10, "Ar " . number_format($child['price_ht'], 2, ',', ' '), 1, 1, 'R');
}
    $pdf->SetX(115);
    $pdf->Cell(40, 10, "Total HT", 1, 0, 'C');
    $pdf->Cell(40, 10, "Ar " . number_format($ht_amount, 2, ',', ' '), 1, 1, 'R');

    $pdf->SetX(115);
    $pdf->Cell(40, 10, "TVA", 1, 0, 'C');
    $pdf->Cell(40, 10, "Ar " . number_format($tva, 2, ',', ' '), 1, 1, 'R');

    $pdf->SetX(115);
    $pdf->Cell(40, 10, "Total TTC", 1, 0, 'C');
    $pdf->SetFont('times', 'B', 12);
    $pdf->Cell(40, 10, "Ar " . number_format($ttc_amount, 2, ',', ' '), 1, 1, 'R');
    $pdf->SetFont('times', '', 10);
    $pdf->SetX(115);
    $pdf->Cell(40, 10, "Accompte", 1, 0, 'C');
    $pdf->Cell(40, 10, "Ar " . number_format($my_facture['accompte'], 2, ',', ' '), 1, 1, 'R');

    $pdf->SetX(115);
    $pdf->Cell(40, 10, "Net a payer", 1, 0, 'C');
    $pdf->Cell(40, 10, "Ar " . number_format($net_a_paye, 2, ',', ' '), 1, 1, 'R');

// Écrire le contenu HTML dans le PDF avec le CSS
$pdf->writeHTML($html, true, false, true, false, '');

// Afficher la conversion du nombre en lettres
$pdf->Ln(5);

$pdf->Cell(0, 10, 'Arrêter la présente facture à la somme de :' , 0, 1);
$pdf->SetFont('times', 'B', 13);
$pdf->Cell(0, 10, $letter . ' ('. number_format($ttc_amount, 2, ',', ' ') .') Ariary TTC' , 0, 1);

$pdf->Ln(5);

$pdf->SetFont('times', '', 13);
$pdf->SetX(10);
$pdf->Cell(50, 10, 'DIMPEX :');
$pdf->SetX(170);
$pdf->Cell(40, 10, 'Client :');
$pdf->Line(10, 40, 200, 40);
$pdf->Ln(10);
?>

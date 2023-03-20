<?php

use Classes\Ticket;
use Config\Response;
use Classes\Purchase;

require base_path('fpdf/pdf.php');

if(!$_GET['id'] ?? false) {
    abort(Response::FORBIDDEN);
}

$purchase = new Purchase();
$ticket = new Ticket();

$purchase_id = $_GET['id'];

$seats_result = $ticket->getSeatNumbers($purchase_id);
$ticketInfo = $purchase->getPurchaseInfo($purchase_id);

$seats = "";
for ($i = 0; $i < count($seats_result); $i++) {
    if ($i == array_key_last($seats_result))
        $seats .= $seats_result[$i]["seat_number"];
    else
        $seats .= $seats_result[$i]["seat_number"] . ", ";
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(40, 10, 'EasyCoach Ke Ltd.');
$pdf->Cell(40, 10, '');
$pdf->Cell(40, 10, '');
$pdf->Cell(20, 10, '');
$pdf->Cell(40, 10, date('Y-m-d'));
$pdf->Ln();
$pdf->Ln();

// Ticket Information
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Name:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo["first_name"] . " " . $ticketInfo["last_name"]);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Phone No:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo["tel_no"]);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'ID No:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo["id_number"]);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Route:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo["departure"] . " - " . $ticketInfo["destination"]);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Departure Date:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo["departure_date"]);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Seats Booked:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $seats);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Total Cost:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo["total_cost"]);
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(100, 10, 'Produce this ticket at the bus station, either printed or electronically');

$pdf->Output('', 'Purchase Info ' . $_GET['id'] . ".pdf");

view('print.view.php');

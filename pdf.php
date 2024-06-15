<?php
require_once ('tcpdf/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Topup Game');
$pdf->setTitle('Histori Transaksi');
$pdf->setSubject('Histori Transaksi');
$pdf->setKeywords('Histori Transaksi');
$pdf->setFont('times', '', 11, '', true);
$pdf->setPrintHeader(false);
$pdf->AddPage();

$html = file_get_contents('http://localhost/topup-game/histori.php');
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output('Histori Transaksi Topup Game.pdf', 'D');
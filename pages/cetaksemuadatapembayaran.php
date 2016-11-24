<?php
ob_start();
include '../fpdf/fpdf.php';
include_once('../koneksi.php');

//mengambil data dari tabel
$sql=mysql_query("SELECT * FROM bayar ORDER BY no_bayar");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
}

//mengisi judul dan header tabel
$judul = "LAPORAN SELURUH DATA PEMBAYARAN";
$header = array(
array("label"=>"Nomor Pembayaran", "length"=>50, "align"=>"L"),
array("label"=>"Tanggal Pembayaran", "length"=>50, "align"=>"L"),
array("label"=>"Nomor Formulir", "length"=>30, "align"=>"L"),
array("label"=>"Jumlah Pembayaran (Rp)", "length"=>50, "align"=>"L"),
);

class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('../images/stmikdharmaputra.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',14);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,10,'STMIK Dharma Putra - Tangerang',0,0,'C');

	    $this->Ln();
	    $this->SetFont('Arial','B',12);
	    $this->Cell(190,10,'Laporan Pembayaran',0,0,'C');
	    // Line break

	    $this->Line(10, 37, 210-10, 37);
	    $this->Line(10, 39, 210-10, 39);
	    $this->Ln(15);
	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,25, $judul, '0', 1, 'C');

//Header Table
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 10, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}

//output file pdf
$pdf->Output();
?>

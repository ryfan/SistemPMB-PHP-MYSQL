<?php
ob_start();
include '../fpdf/fpdf.php';
include_once('../koneksi.php');

//mengambil data dari tabel

$no_form = $_GET['no_form'];
$tgl_form = $_GET['tgl_form'];

$sql=mysql_query("SELECT * FROM formulir WHERE no_form='$no_form'");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}
$tempat="Tangerang, ";
$tgl=date('d-m-Y');

//mengisi judul dan header tabel
$header = "Bukti Penerimaan Mahasiswa Baru";
$content = "Dengan dibuatnya formulir ini, pendaftar dengan nomor calon mahasiswa $no_form di STMIK Dharma Putra";
$content2 = "telah menerima berkas syarat-syarat pendaftaran Mahasiswa Baru, forumulir ini dibuat pada tanggal $tgl_form.";
$footer = "$tgl";
$footer2 = "Note: simpan formulir ini sewaktu-waktu dipergunakan.";

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
	    $this->Cell(190,10,'Formulir Pendaftaran',0,0,'C');
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
$pdf->Cell(0,40, $header, '0', 1, 'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $content, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,2, $content2, '0', 1, 'L');

$pdf->Ln(10);
$pdf->Cell(0,5, "Tangerang, $footer ",0,1,'R');

$pdf->Ln(5);
$pdf->Cell(170,0,'',0,0,'');
$pdf->Cell(10,0,'Panitia PMB',0,0,'R');

$pdf->Ln(20);
$pdf->Cell(160,0,'',0,0,'');
$pdf->Cell(30,0,'(Dicetak oleh Sistem)',0,0,'R');

$pdf->Ln(20);
$pdf->SetFont('Times','',7);
$pdf->Cell(0,2, $footer2, '0', 1, 'L');

//output file pdf
$pdf->Output();
?>

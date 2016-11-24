<?php
session_start();
include '../fpdf/fpdf.php';
include_once('../koneksi.php');

//mengambil data dari tabel

$no_bayar = $_GET['no_bayar'];
$tgl_bayar = $_GET['tgl_bayar'];

$sql=mysql_query("SELECT * FROM bayar WHERE no_bayar='$no_bayar'");
$row = mysql_fetch_array($sql);
$staff = $row['nama_panitia'];
$tempat="Tangerang, ";
$tgl=date('l, d-m-Y');

//mengisi judul dan header tabel
$header 	= "Bukti Pembayaran Pendaftaran";
$content 	= "Tercetaknya form ini, pendaftar dengan nomor calon mahasiswa $no_bayar di Universitas STMIK Dharma Putra";
$content2 = "telah melakukan pembayaran sebagai pendaftaran Mahasiswa Baru";
$content3 = "Pembuatan bukti pembayaran ini telah diinput disistem sejak tanggal $tgl_bayar";
$footer = "$tgl";
$footer2 = "Note: simpan bukti pembyaran ini sewaktu-waktu dipergunakan.";
$panitia = "$staff";


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
	    $this->Cell(190,10,'Form Pembayaran',0,0,'C');
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
$pdf->Cell(0,1, $content2, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,15, $content3, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,20, $footer, '0', 1, 'R');

$pdf->Ln(5);
$pdf->Cell(170,0,'',0,0,'');
$pdf->Cell(10,0,'Panitia PMB',0,0,'R');

$pdf->Ln(20);
$pdf->Cell(160,0,'',0,0,'');
$pdf->Cell(25,0,"(Petugas: $panitia)",0,0,'R');

$pdf->Ln(20);
$pdf->SetFont('Times','',7);
$pdf->Cell(0,2, $footer2, '0', 1, 'L');

//output file pdf
$pdf->Output();
?>

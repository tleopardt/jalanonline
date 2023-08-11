<?php 
	require('../pdf/fpdf.php');
	require('../connect.php');

	$pdf= new FPDF('P','cm','A3');
	$pdf->AddPage();
	$pdf->SetMargins(2,1,1);
	$pdf->AliasNbPages();
	$pdf->SetFont('Arial','B',12);

	$pdf->ln(1);
	$pdf->Cell(25,1,"Transaksi Bulan Ini",0,0,"C");
	$pdf->ln(1);
	$pdf->SetLineWidth(0);
	$pdf->ln(1);
	$pdf->Cell(1,0.8,"No",1,0,"C");
	$pdf->Cell(5,0.8,"Nomor Nota",1,0,"C");
	$pdf->Cell(5,0.8,"Tanggal",1,0,"C");
	$pdf->Cell(6,0.8,"Destinasi",1,0,"C");
	$pdf->Cell(4,0.8,"Harga",1,0,"C");
	$pdf->Cell(5,0.8,"Nomor Pelanggan",1,0,"C");

	$pdf->SetFont('Arial','',10);
	$huni = new tampils;

	$getpeng = $huni->GetData("");
	$no = 1;

	while ($getData = $getpeng->fetch()) {
		$pdf->ln(1);
		$pdf->Cell(1,0.8,"No",1,0,"C");
		$pdf->Cell(5,0.8,$getData['no_nota'],1,0,"C");
		$pdf->Cell(5,0.8,$getData['tanggal'],1,0,"C");
		$pdf->Cell(6,0.8,$getData['tujuan'],1,0,"C");
		$pdf->Cell(4,0.8,$getData['harga'],1,0,"C");
		$pdf->Cell(5,0.8,$getData['ktp'],1,0,"C");
		$no++;
	}


		$pdf->Output();
?>
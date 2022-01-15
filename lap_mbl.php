<?php
// memanggil library FPDF
require('admin/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string
$pdf->Cell(190,7,'Jack Meuble',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Laporan Order Barang',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6, $no++ ,1,0);
$pdf->Cell(50,6,'ID Order',1,0);
$pdf->Cell(25,6,'Total Order',1,0);
$pdf->Cell(50,6,'Total Semua',1,0);
$pdf->SetFont('Arial','',10);
include 'databaseset.php';
$order2 = mysqli_query($con, "select * from order2");
while ($row = mysqli_fetch_array($order2)){
 $pdf->Cell(20,6,$row[$no++],1,0);
 $pdf->Cell(50,6,$row['orderid'],1,0);
 $pdf->Cell(25,6,$row['ordertotal'],1,0);
 $pdf->Cell(50,6,$row['grandtotal'],1,0);
}
$pdf->Output();
?>
<?php
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama Merek');
$sheet->setCellValue('C1', 'Warna');
$sheet->setCellValue('D1', 'Jumlah');
 
$query = mysqli_query($db,"select * from printer");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['nama_merk']);
	$sheet->setCellValue('C'.$i, $row['warna']);
	$sheet->setCellValue('D'.$i, $row['jumlah']);	
	$i++;
}
 
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);
 
 
$writer = new Xlsx($spreadsheet);
$writer->save('Report.xlsx');
$message = "Data berhasil di unduh";
echo "<script type='text/javascript'>alert('$message');;history.go(-1);</script>";
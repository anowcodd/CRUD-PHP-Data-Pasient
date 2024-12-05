<?php
// Menyertakan autoloader Composer
require 'vendor/autoload.php'; // Menggunakan autoloader Composer yang otomatis

include 'db.php'; // Koneksi ke database

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menambahkan header kolom
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Age');
$sheet->setCellValue('D1', 'Gender');
$sheet->setCellValue('E1', 'Address');
$sheet->setCellValue('F1', 'Phone');

// Mengambil data dari database
$query = $conn->query("SELECT * FROM patients");
$patients = $query->fetchAll(PDO::FETCH_ASSOC);

// Mengisi data ke dalam Excel
$rowNumber = 2; // Mulai dari baris kedua
foreach ($patients as $patient) {
    $sheet->setCellValue('A' . $rowNumber, $patient['id']);
    $sheet->setCellValue('B' . $rowNumber, $patient['name']);
    $sheet->setCellValue('C' . $rowNumber, $patient['age']);
    $sheet->setCellValue('D' . $rowNumber, $patient['gender']);
    $sheet->setCellValue('E' . $rowNumber, $patient['address']);
    $sheet->setCellValue('F' . $rowNumber, $patient['phone']);
    $rowNumber++;
}

// Simpan file Excel ke download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="patients_data.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>

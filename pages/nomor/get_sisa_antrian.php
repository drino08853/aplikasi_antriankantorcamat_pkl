<?php
// Izinkan permintaan dari semua domain (penting untuk CORS)
header('Access-Control-Allow-Origin: *'); 
// Atur header agar respons berupa JSON
header('Content-Type: application/json');

// Panggil file "database.php" untuk koneksi ke database
require_once "../../config/database.php";

// Ambil tanggal sekarang
// Menggunakan 'gmdate' dengan offset +7 jam untuk zona waktu WIB (Jakarta)
$tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

// SQL statement untuk menghitung jumlah antrian yang belum dilayani (status = '0')
$query = mysqli_query($mysqli, "SELECT count(id) as jumlah FROM queue_antrian_admisi WHERE tanggal='$tanggal' AND status='0'") or die('Ada kesalahan pada query: ' . mysqli_error($mysqli));
    
// Ambil hasil query sebagai array asosiatif
$data = mysqli_fetch_assoc($query);
    
// Simpan jumlah antrian ke dalam variabel
$sisa_antrian = $data['jumlah'];

// Buat array asosiatif untuk respons JSON
// Gunakan number_format() untuk memformat angka jika diperlukan
$response = ['sisa_antrian' => number_format($sisa_antrian, 0, '', '.')];

// Tampilkan data dalam format JSON
echo json_encode($response);

// Hentikan eksekusi skrip
exit();

?>
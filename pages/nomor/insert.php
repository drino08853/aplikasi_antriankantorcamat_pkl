<?php
// Mengatasi CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, x-requested-with, Content-Type, Accept, Access-Control-Request-Method");
header('Access-Control-Allow-Methods: GET, POST');
header("Allow: GET, POST");

// Cek apakah request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["status" => "error", "message" => "Metode tidak diizinkan."]);
    exit;
}

// Panggil file "database.php" untuk koneksi ke database
require_once "../../config/database.php";

// Pastikan data yang dibutuhkan ada di request POST
$input_data = json_decode(file_get_contents("php://input"), true);

if (empty($input_data) || !isset($input_data['id_kategori'])) {
    http_response_code(400); // Bad Request
    echo json_encode(["status" => "error", "message" => "Data yang dibutuhkan tidak lengkap."]);
    exit;
}

// Sanitize dan ambil data
$id_kategori = htmlspecialchars(trim($input_data['id_kategori']));


// Memulai transaksi
$mysqli->begin_transaction();

try {
    // Ambil tanggal sekarang
    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

    // Ambil nomor antrian terakhir hari ini
    $query_antrian = $mysqli->prepare("SELECT max(CAST(no_antrian AS UNSIGNED)) as nomor FROM queue_antrian_admisi WHERE tanggal = ?");
    if (!$query_antrian) {
        throw new Exception("Prepared statement gagal: " . $mysqli->error);
    }
    $query_antrian->bind_param("s", $tanggal);
    $query_antrian->execute();
    $result_antrian = $query_antrian->get_result();
    $data_antrian = $result_antrian->fetch_assoc();
    $query_antrian->close();

    $nomor_terakhir = $data_antrian['nomor'];
    $no_antrian = sprintf("%03s", ($nomor_terakhir ? (int)$nomor_terakhir + 1 : 1));


    // Masukkan data ke tabel `queue_antrian_admisi`
    $stmt_antrian = $mysqli->prepare("INSERT INTO queue_antrian_admisi(tanggal, id_Kategori, no_antrian) VALUES(?, ?, ?)");
    if (!$stmt_antrian) {
        throw new Exception("Prepared statement antrian gagal: " . $mysqli->error);
    }
    $stmt_antrian->bind_param("sss", $tanggal, $id_kategori, $no_antrian);
    if (!$stmt_antrian->execute()) {
        throw new Exception("Gagal menyimpan data antrian: " . $stmt_antrian->error);
    }
    $stmt_antrian->close();

    // Jika semua berhasil, commit transaksi
    $mysqli->commit();

    // Beri respons sukses
    echo json_encode(["status" => "success", "no_antrian" => $no_antrian]);

} catch (Exception $e) {
    // Jika ada error, batalkan transaksi dan berikan respons error
    $mysqli->rollback();
    http_response_code(500); // Internal Server Error
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);

} finally {
    // Pastikan koneksi ditutup
    if (isset($mysqli)) {
        $mysqli->close();
    }
}
?>
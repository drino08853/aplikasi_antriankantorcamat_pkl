<?php
// koneksi database
include '../../config/database.php';

// menangkap data nopesan yang di kirim dari url
$id_kategori = $_GET['id_kategori'];


// menghapus data dari database
$hapus = mysqli_query($mysqli, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

if ($hapus) {
    // Set a session variable to indicate success
echo "<script> 
alert('Berhasil Di Hapus !');
document.location.href = '../?page=kategori/index';
</script>";
//Jika query gagal

} else {
echo "<script> 
alert('Gagal Di Gagal Di Hapus !');
document.location.href = '../?page=kategori/index';
</script>";
}

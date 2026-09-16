<?php
// koneksi database
include "../../config/database.php";

// menangkap data yang di kirim dari form
$nama_kategori = $_POST['nama_kategori'];

// menginput data ke database
$tambah = mysqli_query($mysqli,"INSERT INTO kategori(nama_kategori)VALUES('$nama_kategori')");


if ($tambah) {
  echo "<script> 
    alert('Berhasil Di Simpan !');
    document.location.href = ' ../?page=kategori/tambah';
  </script>";
  //Jika query gagal

} else {
  echo "<script> 
  alert('Gagal Di Simpan !');
  document.location.href = '../?page=kategori/tambah';
  </script>";
}


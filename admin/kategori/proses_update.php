<?php
// koneksi database
include '../../config/database.php';

// menangkap data yang di kirim dari form
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

// query SQL untuk insert data
$ubah = mysqli_query($mysqli, "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'");

//Jika query berhasil

if ($ubah) {
  echo "<script> 
    alert('Berhasil Di Update !');
    document.location.href = ' ../?page=kategori/edit&id_kategori=$id_kategori';
  </script>";
  //Jika query gagal

} else {
  echo "<script> 
  alert('Gagal Di Gagal Di Update !');
  document.location.href = '../?page=kategori/edit&id_kategori=$id_kategori';
  </script>";
}

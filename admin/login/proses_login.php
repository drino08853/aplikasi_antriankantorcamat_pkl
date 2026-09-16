<?php

include "../../config/database.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cek data form ke database
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE username=? AND password=?");


    // Bind parameters to the statement
    // "ss" indicates that both parameters are strings
    $stmt->bind_param("ss", $username, $password);

     // Execute the prepared statement
     $stmt->execute();

     // Get the result set from the executed statement
     $result = $stmt->get_result();

    //jika jumlah data user yang masuk lebih dari 0
    if ($result->num_rows > 0) {
        // Fetch the user data
        $data = $result->fetch_assoc();

        //simpan datanya ke session
        session_start();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['foto'] = $data['foto'];

        echo "<script>
        alert('Login Berhasil !')
        window.location.href='../index.php'
        </script>";
    } else {
        echo "<script>
        alert('Username Atau Password Salah !')
        window.location.href='index.php'
        </script>";
    }
    // Close the statement
    $stmt->close();
}
?>
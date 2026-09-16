<?php
//jika belum login
session_start();
if (isset($_SESSION['id_user'])) {
    echo "<script>
    alert ('Anda Sudah Login')
    window.Location.href='..//index.php'
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin PATEN | Log in </title>
  <!-- Favicon icon -->
  <link href="../../assets/img/kota-padang-seeklogo.png" type="image/x-icon" rel="shortcut icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <img src="../../assets/img/kota-padang-seeklogo.png" class="rounded mx-auto d-block mb-3" alt="Logo" width="150px" height="150px">
      <a href="../../index2.html" class="h3"><b>CAMAT</b> PDG.SELATAN</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login Dulu !</p>

      <form action="proses_login.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</body>
</html>

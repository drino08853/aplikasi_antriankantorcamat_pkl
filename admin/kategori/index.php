<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jenis Layanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jenis Layanan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Jenis Layanan</h3>
                <button type="button" class="btn btn-outline-warning btn-sm float-right" onclick="location.href=('?page=kategori/tambah')"> <i class="fa fa-plus"></i> Tambah Data</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                 <th>No</th>
                    <th>Jenis Layanan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  require_once "../config/database.php";
                        $no = 1;
                        $data = mysqli_query($mysqli, "SELECT * FROM kategori;");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                  <tr>
                  <td><?= $no++; ?></td>
                    <td><?= $d['nama_kategori'];?></td>
                    <td>     
                        <a class="btn btn-outline-primary btn-xs" href="?page=kategori/edit&id_kategori=<?= $d['id_kategori']; ?>"> <i class="fas fa-edit"></i>Edit </a></a>
                        <a class="btn btn-outline-danger btn-xs" href="kategori/proses_hapus.php?id_kategori=<?= $d['id_kategori']; ?>" onclick="return confirm('Apakah anda yakin akan dihapus!');"><i class="fa fa-trash"></i>Hapus</a></a></td>
                  </tr>
                  <?php
                        }
                        ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
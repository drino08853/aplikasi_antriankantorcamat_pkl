<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jumlah Pelayanan Per-Hari</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Jumlah Pelayanan Per-Hari</li>
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
            <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Table Jumlah Pelayanan Per-Hari</h3>
              </div>
              <div class="card-body">
              <form action="" method="POST">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required value="<?= isset($_POST['tgl_mulai']) ? $_POST['tgl_mulai'] : '' ?>" size="10" required />
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="date" name="tgl_sampai" id="tgl_sampai" class="form-control" required value="<?= isset($_POST['tgl_sampai']) ? $_POST['tgl_sampai'] : '' ?>" size="10" required />
                                    </div>

                                    <div class="col-lg-3">
                                    <button class="btn btn-outline-success" type="submit" name="filter"><i class="fas fa-search"></i></button>
                                        <button class="btn btn-outline-info" onclick="openPrintWindow()"><i class="fas fa-print"></i></button>
                                    </div>
                                </div>
                            </form>
              </div>

              <script>
                            function openPrintWindow() {
                                var tglMulai = document.getElementById('tgl_mulai').value;
                                var tglSampai = document.getElementById('tgl_sampai').value;
                                var url = 'laporan/print.php?mulai=' + tglMulai + '&sampai=' + tglSampai;
                                window.open(url, '_blank');
                            }
                        </script>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tgl.Kunjungan</th>
                    <th>Jenis Layanan</th>
                    <th>Total Kunjungan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                             <?php
                              require_once "../config/database.php";
                               //Proses Filter berdasarka tanggal
                               if (isset($_POST['filter'])) {
                                $tgl_mulai = $_POST['tgl_mulai'];
                                $tgl_sampai = $_POST['tgl_sampai'];
                                    //validasi input tanggal
                                    if (!empty($tgl_mulai) && !empty($tgl_sampai) && $tgl_mulai <=  $tgl_sampai) {
                                      $data = mysqli_query($mysqli, "SELECT tanggal,kategori.nama_kategori,COUNT(*)
                                         AS jumlah_data FROM queue_antrian_admisi  JOIN kategori 
                                         ON queue_antrian_admisi.id_kategori = kategori.id_kategori  
                                      WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_sampai' GROUP BY tanggal,kategori.nama_kategori");
                                  } else {
                                      echo "<script>alert('Masukkan Rentang Tanggal Yang Valid !');</script>";
                                  }
                              } else {
                                        // Menampilkan semua data jika filter tidak digunakan 
                                        $data = mysqli_query($mysqli, "SELECT tanggal,kategori.nama_kategori,COUNT(*)
                                         AS jumlah_data FROM queue_antrian_admisi  JOIN kategori ON queue_antrian_admisi.id_kategori = kategori.id_kategori 
                                         GROUP BY tanggal,kategori.nama_kategori");
                                         }
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                  <tr>
                    <td><?=date('d-m-Y',strtotime($d['tanggal']));?></td>
                    <td><?= $d['nama_kategori'];?></td>
                    <td><?= $d['jumlah_data'];?></td>
                    <td><a class="btn btn-outline-success btn" href="laporan/print_detail.php?nama_kategori=<?= urlencode($d['nama_kategori']); ?>&tanggal=<?= $d['tanggal']; ?>" rel="noopener" target="_blank"> <i class="fas fa-print"></i> Cetak Laporan Pengunjung</a></a></td>
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
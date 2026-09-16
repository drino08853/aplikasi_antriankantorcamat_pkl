<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting Antrian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Setting Antrian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
                <?php
                require_once "../config/database.php";
                $query = mysqli_query($mysqli, "SELECT * FROM queue_setting ORDER BY id DESC LIMIT 1") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                // ambil jumlah baris data hasil query
                $rows = mysqli_num_rows($query);

                if ($rows <> 0) {
                    $data = mysqli_fetch_assoc($query);
                } else {
                    $data = [];
                }
                ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Informasi Instansi</h3>
              </div>
              <form action="" method="POST" id="saveSetting">
              <div class="card-body">
              <input type="hidden" name="id" value="<?= $data['id'] ? $data['id'] : ''; ?>">
             <div class="form-group">
                  <label>Nama Instansi</label>
                  <input type="text" class="form-control"id="nama_instansi" name="nama_instansi" placeholder="Nama Instansi" value="<?= $data['nama_instansi'] ? $data['nama_instansi'] : ''; ?>" required>
                </div>
                <div class="form-group">
                  <label>Alamat Lengkap</label>
                  <textarea class="form-control" rows="4" cols="50" id="alamat" name="alamat" placeholder="Alamat Lengkap" required><?= $data['alamat'] ? $data['alamat'] : ''; ?></textarea>
                </div>
                
                <div class="form-group row">
                <div class="col-sm-6">
                  <label>Telephone</label>
                  <input type="number" class="form-control" id="telpon" name="telpon" placeholder="Telephone" value="<?= $data['telpon'] ? $data['telpon'] : ''; ?>" required>
                  </div>
                  <div class="col-sm-6">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $data['email'] ? $data['email'] : ''; ?>" required>
                </div>
                </div>

                <div class="form-group">
                  <label>Running Text</label>
                  <textarea class="form-control" rows="4" cols="50" id="running_text" name="running_text" rows="3" placeholder="Running Text" required><?= $data['running_text'] ? $data['running_text'] : ''; ?></textarea>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Styling Monitor</h3>
              </div>
              <div class="card-body">
              <img src="<?= $data['logo'] && file_exists('../assets/img/' . $data['logo']) ? '../assets/img/' . $data['logo'] : '../assets/img/default.png'; ?>" class="rounded mx-auto d-block mb-3" alt="Logo" width="200px" height="200px">
              <div class="form-group">
                  <label>Pilih Logo</label>
                  <input type="file" class="form-control" id="logo" name="logo">
                  <input type="hidden" name="nama_logo" value="<?= $data['logo'] ? $data['logo'] : ''; ?>">
                </div>

                <div class="form-group row">
                <div class="col-sm-6">
                  <label>Warna Primary</label>
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" name="warna_primary" value="<?= $data['warna_primary'] ? $data['warna_primary'] : '#563d7c'; ?>" title="Warna Primary" required>

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <label>Warna Secondary</label>
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control"  id="warna_secondary" name="warna_secondary" value="<?= $data['warna_secondary'] ? $data['warna_secondary'] : '#563d7c'; ?>" title="Warna Secondary" required>

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-6">
                  <label>Warna Accent</label>
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" id="warna_accent" name="warna_accent" value="<?= $data['warna_accent'] ? $data['warna_accent'] : '#563d7c'; ?>" title="Warna Accent" required>

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <label>Warna Background</label>
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" id="warna_background" name="warna_background" value="<?= $data['warna_background'] ? $data['warna_background'] : '#563d7c'; ?>" title="Warna Background" required>

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-6">
                  <label>Warna Text</label>
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" id="warna_text" name="warna_text" value="<?= $data['warna_text'] ? $data['warna_text'] : '#563d7c'; ?>" title="Warna Text" required>

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                  </div>
                </div>

              </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
              <!-- /.card-body -->
              </form>
              <?php ?>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script src="assets/plugins/jquery/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
     $(document).on("submit", "#saveSetting", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: 'setting/save.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    if (result === 'Success') {
                        alert("Setting berhasil disimpan")
                        window.location.reload();
                    } else {
                        alert(result);
                    }
                },
            });
        });
        </script>
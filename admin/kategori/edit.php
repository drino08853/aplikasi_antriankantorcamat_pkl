

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Jenis Layanan
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Jenis Layanan</li>
            </ol>
          </div>
        </div>                             
      </div><!-- /.container-fluid -->
    </section>

    <?php
    require_once "../config/database.php";
        $id_kategori = $_GET['id_kategori'];
        $data = mysqli_query($mysqli, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
        while ($d = mysqli_fetch_array($data)) {
        ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-7">
            
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Jenis Layanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="kategori/proses_update.php" method="POST">
                <div class="card-body">
                  <input type="hidden" name="id_kategori" value="<?php echo $d['id_kategori'] ?>">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"   name="nama_kategori" placeholder="Kategori"  required style="width: 230px;" value="<?=$d['nama_kategori'];?>" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <button type="button" onclick="location.href=('?page=kategori/index')" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
                 <?php
                }
                    ?>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 


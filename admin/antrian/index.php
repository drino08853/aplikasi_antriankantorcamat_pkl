<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Panggilan Antrian Loket </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Antrian Loket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       <!-- Main content -->
       <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Antrian</span>
                <span class="info-box-number" id="jumlah-antrian"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-square"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Antrian Sekarang</span>
              <span class="info-box-number" id="antrian-sekarang" ></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-plus"></i></span>

            <div class="info-box-content">
             <span class="info-box-text">Antrian Selanjutnya</span>
              <span class="info-box-number" id="antrian-selanjutnya"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Sisa Antrian</span>
            <span class="info-box-number" id="sisa-antrian"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Antrian Loket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel-antrian" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Nomor Antrian</th>
                    <th>Jenis Layanan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
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

  <script src="assets/plugins/jquery/jquery.min.js" type="text/javascript"></script>
  
    <!-- Responsivevoice -->
  <script type="text/javascript">
        $(document).ready(function() {
            var loket = localStorage.getItem('_loket');
            // tampilkan informasi antrian
            $('#jumlah-antrian').load('antrian/get_jumlah_antrian.php');
            $('#antrian-sekarang').load('antrian/get_antrian_sekarang.php');
            $('#antrian-selanjutnya').load('antrian/get_antrian_selanjutnya.php');
            $('#sisa-antrian').load('antrian/get_sisa_antrian.php');

            // menampilkan data antrian menggunakan DataTables
            var table = $('#tabel-antrian').DataTable({
                "lengthChange": true, // non-aktifkan fitur "lengthChange"
                "searching": true, // non-aktifkan fitur "Search"
                "ajax": "antrian/get_antrian.php", // url file proses tampil data dari database
                // menampilkan data
                "columns": [{
                        "data": "no_antrian",
                        "width": '50px',
                        "orderable": true,
                        "searchable": true,
                        "className": 'text-center',
                        render: function(data) {
                            return '<b>' + data + '</b>'
                        }
                    },
                    {
                        "data": "nama_kategori",
                        "width": '100px',
                        "orderable": true,
                        "searchable": true,
                        "className": 'text-center',
                        render: function(data) {
                            return '<b>' + data + '</b>'
                        }
                    },
                    {
                        "data": "status",
                        "visible": false
                    },
                    {
                        "data": null,
                        "orderable": false,
                        "searchable": false,
                        "width": '50px',
                        "className": 'text-center',
                        "render": function(data, type, row) {
                            // jika tidak ada data "status"
                            if (data["status"] === "") {
                                // sembunyikan button panggil
                                var btn = "-";
                            }
                            // jika data "status = 0"
                            else if (data["status"] === "0") {
                                // tampilkan button panggil
                                var btn = "<button class=\"btn btn-block btn-success\"><i class=\"fas fa-microphone\"></i> Panggil Antrian</button>";
                            }
                            // jika data "status = 1"
                            else if (data["status"] === "1") {
                                // tampilkan button ulangi panggilan
                                var btn = "<button class=\"btn btn-block btn-secondary\"><i class=\"fas fa-microphone\"></i> Panggil Antrian</button>";
                            };
                            return btn;
                        }
                    },
                ],
                "order": [
                    [0, "desc"] // urutkan data berdasarkan "no_antrian" secara descending
                ],
                "iDisplayLength": 10, // tampilkan 10 data per halaman
            });

            // panggilan antrian dan update data
            $('#tabel-antrian tbody').on('click', 'button', function() {
                // ambil data dari datatables 
                var data = table.row($(this).parents('tr')).data();
                // buat variabel untuk menampilkan data "id"
                var id = data["id"];

                // proses create panggilan antrian
                $.ajax({
                    url: "antrian/create_panggilan.php", // url file proses update data
                    type: "POST", // mengirim data dengan method POST
                    // tentukan data yang dikirim
                    dataType: 'json',
                    data: {
                        antrian: data["no_antrian"],
                    },
                    async: false,
                    cache: false,
                    success: function(data) {
                        console.log(data);
                    }
                });

                // proses update data
                $.ajax({
                    type: "POST", // mengirim data dengan method POST
                    url: "antrian/update.php", // url file proses update data
                    // tentukan data yang dikirim
                    data: {
                        id: id
                    }
                });
            });

            // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
            setInterval(function() {
            $('#jumlah-antrian').load('antrian/get_jumlah_antrian.php').fadeIn("slow");
            $('#antrian-sekarang').load('antrian/get_antrian_sekarang.php').fadeIn("slow");
            $('#antrian-selanjutnya').load('antrian/get_antrian_selanjutnya.php').fadeIn("slow");
            $('#sisa-antrian').load('antrian/get_sisa_antrian.php').fadeIn("slow");
        table.ajax.reload(null, false);
    }, 1000);
        });x
    </script>
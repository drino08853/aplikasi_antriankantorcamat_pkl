<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Antrian General Static">
    <meta name="author" content="Ade Rahman">

     <!-- Title -->
     <title>PATEN Kantor Camat Padang Selatan</title>

    <!-- Favicon icon -->
    <link href="../../assets/img/kota-padang-seeklogo.png" type="image/x-icon" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="../../assets/vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="../../assets/vendor/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="../../assets/vendor/css/swap.css" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- Select2 -->
  <link rel="stylesheet"  href="../../admin/assets/plugins/select2/css/select2.min.css" >
  <link rel="stylesheet" href="../../admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        .receipt-container {
            display: none;
            width: 80mm;
            margin: 0 auto;
            text-align: center;
            padding: 10px;
        }

        .header { font-size: 14px; font-weight: bold; }
        .address { font-size: 10px; }
        .separator { border-bottom: 1px dashed black; margin: 10px 0; }
        .queue-label { font-size: 12px; font-weight: bold; }
        .queue-number { font-size: 48px; font-weight: bold; margin: 10px 0; }
        .message, .date, .footer { font-size: 10px; }
        .date { margin: 10px 0; }
        .footer { margin-top: 20px; }

        @media print {
            body > *:not(.receipt-container) {
                display: none;
            }
            .receipt-container {
                display: block;
            }
            @page {
                size: 80mm auto;
                margin: 0;
            }
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container pt-5">
            <div class="row justify-content-lg-center">
                <div class="col-lg-5 mb-4">
                    <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                        <!-- judul halaman -->
                        <div class="d-flex align-items-center me-md-auto text-center">
                            <img src="../../assets/img/kota-padang-seeklogo.png" alt="Logo" width="60px" class="">
                            <h1 class="h5 pt-2">Pendaftaran Antrian Pelayanan Terpadu Kantor Camat Padang Selatan</h1>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center d-grid p-5">
                        <form id="formAntrian">
                            <div class="mb-3">
                    <select class="border border-success rounded-2 py-2 form-control select2" name="id_kategori" id="id_kategori" style="width: 100%;">
                    <option value="">Pilih Jenis Layanan</option>
                    <?php
                    require_once "../../config/database.php";
                                    $data = mysqli_query($mysqli, "SELECT * FROM kategori");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                      <option value="<?php echo $d['id_kategori']; ?>"><?php echo $d['nama_kategori']; ?></option>
                                 <?php
                                    }
                                    ?>
                   </select>
                            </div>                           
                            <!-- button pengambilan nomor antrian -->
                            <button type="submit" id="insert" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-2 mb-2">
                                <i class="bi-person-plus fs-4 me-2"></i> OK & Ambil Nomor Antri
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4">
        <div class="container">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">&copy; <?php date('Y') ?> - <a  target="_blank" class="text-brand text-decoration-none">camatpadangselatan</a>. All rights reserved.
            </div>
        </div>
    </footer>
    
    <div id="print-area" class="receipt-container"></div>

    <!-- jQuery Core -->
    <script src="../../assets/vendor/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="../../assets/vendor/js/popper.min.js" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="../../assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="../../admin/assets/plugins/select2/js/select2.full.min.js"></script>


    <script type="text/javascript">
           function hariIndo(hariInggris) {
            const hari = {
                'Sunday': 'Minggu', 'Monday': 'Senin', 'Tuesday': 'Selasa',
                'Wednesday': 'Rabu', 'Thursday': 'Kamis', 'Friday': 'Jumat',
                'Saturday': 'Sabtu'
            };
            return hari[hariInggris] || 'hari tidak valid';
        }

        

 function getSisaAntrian(callback) {
  fetch('get_sisa_antrian.php')
    .then(response => {
      // Periksa apakah respons berhasil (status 200 OK)
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      // Panggil callback dengan data sisa antrian yang valid
      callback(data.sisa_antrian);
    })
    .catch(error => {
      console.error('Error fetching sisa antrian:', error);
      // Panggil callback dengan 'N/A' jika terjadi kesalahan
      callback('N/A');
    });
}

        function printReceipt(noAntrian) {
            const printArea = document.getElementById('print-area');
            const now = new Date();
            const hari = hariIndo(now.toLocaleDateString('en-US', { weekday: 'long' }));
            const tanggal = now.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
            // Format jam
            const jam = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit',second: '2-digit' }); 
          // Panggil fungsi getSisaAntrian dengan callback
            getSisaAntrian(sisaAntrian => {
            printArea.innerHTML = `
                <div class="header">KANTOR CAMAT PADANG SELATAN</div>
                <div class="address">Jl. Sutan Syahrir No.250, Mata Air</div>
                <div class="address">Kec. Padang Sel., Kota Padang, Sumatera Barat 25121 </div>
                <div class="separator"></div>
                <div class="queue-label">NOMOR ANTRIAN ANDA</div>
                <div class="queue-number">${noAntrian}</div>
                <div class="separator"></div>
                <div class="message">Sisa Antrian : <b>${sisaAntrian}</b></div>
                <div class="message">Silahkan menunggu nomor antrian dipanggil</div>
                <div class="message">Nomor ini hanya berlaku pada hari dicetak</div>
                <div class="date">${hari}, ${tanggal}, ${jam}</div>
                <div class="footer">TERIMA KASIH, ANDA TELAH TERTIB</div>
            `;
            
            window.print();
        });
        }

        
        $(document).ready(function() {

     // Initialize Select2
     $('.select2').select2({
                placeholder: "Pilih Jenis Layanan",
                allowClear: true
            });

            // tampilkan jumlah antrian
            $('#antrian').load('get_antrian.php');

              // Tangani event submit form
              $('#formAntrian').on('submit', function(e) {
                e.preventDefault(); // Mencegah form dari reload halaman
                
                // Ambil data dari form
                const id_kategori = $('#id_kategori').val();

                 // REVISI VALIDASI: Cek jika value kosong
                 if (id_kategori === "" || id_kategori === null) {
                    alert('PERINGATAN: Silahkan pilih jenis layanan terlebih dahulu !');
                    $('#id_kategori').select2('open'); // Otomatis buka dropdown jika belum pilih
                    return false;
                }


            // proses insert data
                $.ajax({
                    type: 'POST', // mengirim data dengan method POST
                    url: 'insert.php', // url file proses insert data
                    contentType: 'application/json', // Memberi tahu server bahwa data yang dikirim adalah JSON
                    data: JSON.stringify({ id_kategori: id_kategori }), // Mengubah data menjadi format JSON string
                    success: function(response) {
                        try {
                            //jika berhasil
                            const result = JSON.parse(response);
                            if (result.status === 'success') {
                           // Tampilkan alert
                            alert("Antrian anda " + result.no_antrian + " berhasil di ambil !");
                            // Tampilkan nomor antrian yang baru
                            $('#antrian').text(result.no_antrian);
                                // Cetak struk antrian
                                printReceipt(result.no_antrian);

                                // Reset form setelah sukses
                                $('#formAntrian')[0].reset();
                                $('#id_kategori').val(null).trigger('change'); // Reset Select2
                            } else {
                                // Tampilkan pesan error dari server
                                alert("Error: " + result.message);
                            }
                        } catch (e) {
                            alert("Error: Terjadi kesalahan saat memproses respons dari server.");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tangani error jika terjadi masalah di sisi server
                        let errorMessage = "Terjadi kesalahan. Silakan coba lagi.";
                        if (xhr.responseText) {
                            try {
                                const errorResponse = JSON.parse(xhr.responseText);
                                errorMessage = "Error: " + errorResponse.message;
                            } catch (e) {
                                // Jika respons bukan JSON
                                errorMessage = "Error: " + xhr.responseText;
                            }
                        }
                        alert(errorMessage);
                    },
                });
            });
        });
    </script>
</body>

</html>
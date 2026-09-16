<?php
require_once "../../config/database.php";

// Ambil data tanggal mulai dan sampai dari URL (GET parameter)
$mulai = isset($_GET['mulai']) ? $_GET['mulai'] : '';
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : '';

// Validasi input tanggal
if (!empty($mulai) && !empty($sampai)) {
    $laporan = mysqli_query($mysqli, "SELECT tanggal,kategori.nama_kategori,COUNT(*)
                                         AS jumlah_data FROM queue_antrian_admisi  JOIN kategori 
                                         ON queue_antrian_admisi.id_kategori = kategori.id_kategori  
                                      WHERE tanggal BETWEEN '$mulai' AND '$sampai' GROUP BY tanggal,kategori.nama_kategori");
} else {
    echo "Tanggal tidak valid.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Jumlah Jenis Pelayanan Per-Hari</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse; ">
    <tr>
        <td style="width: 120px; vertical-align: middle; padding: 10px;">
            <img src="../../assets/img/kota-padang-seeklogo.png" alt="Logo Perusahaan" style="width: 100px; height: auto; display: block;">
        </td>
        
        <td style="text-align: center; vertical-align: middle; padding: 10px;">
            <h1 style="margin: 0; font-size: 24px; color: #333;">PELAYANAN TERPADU CAMAT PADANG SELATAN</h1>
            <p style="margin: 5px 0 0; font-size: 14px; color: #555;">Jl. Sutan Syahrir No.250, Mata Air, Kec. Padang Sel., Kota Padang, Sumatera Barat 25121</p>
            <p style="margin: 5px 0 0; font-size: 14px; color: #555;">Tlp. 558450845, Email. koki12@gmail.com</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 2px solid #333; padding-top: 10px;"></td>
    </tr>
</table>
<center>
    <h3>Laporan Data Jumlah Jenis Pelayanan Per-Hari</h3>
</center>
    <center>
        <p>Periode: <?= date('d-m-Y', strtotime($mulai)) ?> s/d <?= date('d-m-Y', strtotime($sampai)) ?></p>
    </center>
    <table>
        <thead>
            <tr>
               <th>Tgl.Kunjungan</th>
                    <th>Jenis Layanan</th>
                    <th>Total Kunjungan Per-Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($laporan)) {
            ?>
                <tr>
                <td><?=date('d-m-Y',strtotime($d['tanggal']));?></td>
                <td><?= $d['nama_kategori'];?></td>
                    <td><?= $d['jumlah_data'];?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="signature" style="text-align: right; margin-right: 50px;">
        <p>Mengetahui,</p>
        <p>Padang, <?php echo date('d-m-Y'); ?></p>
        <div style=""></div>
        <br><br>
        <p>(Kepala Camat)</p>
    </div>




    <script>
        window.print()
    </script>
</body>

</html>
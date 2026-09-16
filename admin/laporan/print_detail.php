
<?php
require_once "../../config/database.php";
            $nama_kategori = $_GET['nama_kategori'];
            $tanggal= $_GET['tanggal'];
            // 1. Query for Invoice Header Information (fetched once)
            $laporan= mysqli_query($mysqli, "SELECT no_antrian,tanggal,kategori.nama_kategori
            FROM queue_antrian_admisi JOIN kategori
            ON queue_antrian_admisi.id_kategori = kategori.id_kategori
            WHERE nama_kategori = '$nama_kategori' AND tanggal = '$tanggal'");
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pengunjung Per-Kategori Harian</title>
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
    <h3>Laporan Data Pengunjung Per-Kategori Harian</h3>
</center>
    <center>
        <p>Jenis Layanan:<?= $nama_kategori;?></p>
    </center>
    <table>
        <thead>
            <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>No.Antrian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($laporan)) {
            ?>
                <tr>
                <td><?= $no++; ?></td>
                    <td><?=date('d-m-Y',strtotime($d['tanggal']));?></td>
                    <td><?= $d['no_antrian'];?></td>
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
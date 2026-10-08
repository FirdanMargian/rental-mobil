<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Rental Mobil</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            float: left;
            width: 80px;
            height: 80px;
        }

        .header-text {
            text-align: center;
        }

        .contact-info {
            font-size: 10pt;
        }

        .judul-laporan {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 14pt;
        }

        .info-tanggal {
            margin-bottom: 10px;
            font-size: 11pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        table th, table td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        .footer-total {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <div style="float: left;">
             <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo Icon" style="width: 150px; height: 150px; object-fit: cover; border-radius: 4px;">
        </div>
        <div class="header-text">
            <h2 style="margin: 0;">RENTAL MOBIL FIRDAN</h2>
            <p class="contact-info">
                Jl. Raya Siliwangi No.6, RT.001/RW.004, Sepanjang Jaya, Kec. Rawalumbu, Kota Bks, Jawa Barat 17114
            </p>
        </div>
    </div>

    <h2>Laporan Transaksi Rental Mobil</h2>

    <table>
        <tr>
            <td>Dari Tgl</td>
            <td>:</td>
            <td><?php echo date('d/m/Y', strtotime($_GET['dari'])); ?></td>
        </tr>
        <tr>
            <td>Sampai Tgl</td>
            <td>:</td>
            <td><?php echo date('d/m/Y', strtotime($_GET['sampai'])); ?></td>
        </tr>
    </table>

    <br>

    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kostumer</th>
                <th>Mobil</th>
                <th>Tgl. Pinjam</th>
                <th>Tgl. Kembali</th>
                <th>Harga</th>
                <th>Denda / Hari</th>
                <th>Tgl. Dikembalikan</th>
                <th>Total Denda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($laporan as $l) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d/m/Y', strtotime($l->transaksi_tgl)); ?></td>
                <td><?php echo $l->kostumer_nama; ?></td>
                <td><?php echo $l->mobil_merk; ?></td>
                <td><?php echo date('d/m/Y', strtotime($l->transaksi_tgl_pinjam)); ?></td>
                <td><?php echo date('d/m/Y', strtotime($l->transaksi_tgl_kembali)); ?></td>
                <td>Rp. <?php echo number_format($l->transaksi_harga); ?></td>
                <td>Rp. <?php echo number_format($l->transaksi_denda); ?></td>
                <td>
                    <?php
                    if ($l->transaksi_tgldikembalikan == "0000-00-00") {
                        echo "-";
                    } else {
                        echo date('d/m/Y', strtotime($l->transaksi_tgldikembalikan));
                    }
                    ?>
                </td>
                <td>Rp. <?php echo number_format($l->transaksi_totaldenda); ?> ,-</td>
                <td>
                    <?php
                    if ($l->transaksi_status == "1") {
                        echo "Selesai";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>

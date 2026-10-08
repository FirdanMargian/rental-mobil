<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tabel Transaksi</h1>

            <div class="card mb-4 mx-4 mt-3">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/transaksi_add') ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah transaksi
                    </a>
                </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered table-striped" id="table-datatable" width="100%" cellspacing="0">
<thead class="table-dark text-center">
    <tr class="text-center">
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
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php 
    $no = 1;
    foreach ($transaksi as $t) { ?>
        <tr class="text-center">
            <td><?php echo $no++; ?></td>
            <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl)); ?></td>
            <td><?php echo $t->kostumer_nama; ?></td>
            <td><?php echo $t->mobil_merk; ?></td>
            <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)); ?></td>
            <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)); ?></td>
            <td><?php echo "Rp. " . number_format($t->transaksi_harga) . ",-"; ?></td>
            <td><?php echo "Rp. " . number_format($t->transaksi_denda) . ",-"; ?></td>
            <td>
                <?php echo ($t->transaksi_tgldikembalikan == "0000-00-00") ? "-" : date('d/m/Y', strtotime($t->transaksi_tgldikembalikan)); ?>
            </td>
            <td><?php echo "Rp. " . number_format($t->transaksi_totaldenda) . ",-"; ?></td>
            <td><?php echo ($t->transaksi_status == 1) ? "Selesai" : "-"; ?></td>
            <!-- Aksi (kode di atas) -->
            <td>
                <?php if ($t->transaksi_status == 0) { ?>
                    <a class="btn btn-sm btn-success mb-1" href="<?php echo base_url('admin/transaksi_selesai/' . $t->id_transaksi); ?>">
                        <i class="fas fa-check"></i> Transaksi Selesai
                    </a><br>
                    <a class="btn btn-sm btn-danger mt-1" href="<?php echo base_url('admin/transaksi_hapus/' . $t->id_transaksi); ?>"
                        onclick="return confirm('Yakin ingin membatalkan transaksi ini?')">
                        <i class="fas fa-times"></i> Batalkan Transaksi
                    </a>
                <?php } else {
                    echo "-";
                } ?>
            </td>
        </tr>
    <?php } ?>
</tbody>

                </table>
                            <script>
                $(document).ready(function() {
                    $('#datatablesSimple').DataTable({
                        responsive: true,
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/English.json"
                        }
                    });
                });
            </script>
            </div>
        </div>

</div>

<div class="container-fluid">
    <h3 class="mt-4 mb-4">Laporan Transaksi</h3>

    <!-- Filter Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?php echo base_url('admin/laporan'); ?>">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control" value="<?php echo set_value('dari'); ?>">
                        <?php echo form_error('dari'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control" value="<?php echo set_value('sampai'); ?>">
                        <?php echo form_error('sampai'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="cari" value="CARI" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>

    <!-- Tombol Print -->
    <div class="mb-3">
        <a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/laporan_print/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai')); ?>">
            <i class="fas fa-print"></i> Print
        </a>
    </div>

    <!-- Table Laporan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table border="1" class="table table-striped table-hover table-bordered" id="table-datatable">
                    <thead class="thead-dark text-center">
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
                        <tr class="text-center">
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
                            <td>Rp. <?php echo number_format($l->transaksi_totaldenda); ?></td>
                            <td><?php echo $l->transaksi_status == 1 ? "Selesai" : "-"; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

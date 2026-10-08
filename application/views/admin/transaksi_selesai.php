<div class="container-fluid">
    <h3 class="mt-4">Selesaikan Transaksi</h3>

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <?php foreach ($transaksi as $t) { ?>
            <form action="<?php echo base_url('admin/transaksi_selesai_aksi/' . $t->id_transaksi); ?>" method="post">

                <!-- Informasi Kostumer & Mobil -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Kostumer</label>
                        <input type="text" class="form-control" value="<?php echo $t->kostumer_nama; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mobil</label>
                        <input type="text" class="form-control" value="<?php echo $t->mobil_merk; ?>" readonly>
                    </div>
                </div>

                <!-- Tanggal Pinjam dan Kembali -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Pinjam</label>
                        <input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)); ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Kembali</label>
                        <input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)); ?>" readonly>
                        <!-- Hidden input untuk dikirim ke controller -->
                        <input type="hidden" name="transaksi_tgl_kembali" value="<?php echo $t->transaksi_tgl_kembali; ?>">
                    </div>
                </div>

                <!-- Harga dan Denda -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga / Hari</label>
                        <input type="text" class="form-control" value="Rp. <?php echo number_format($t->transaksi_harga); ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Denda / Hari</label>
                        <input type="text" class="form-control" value="Rp. <?php echo number_format($t->transaksi_denda); ?>" readonly>
                        <input type="hidden" name="transaksi_denda" value="<?php echo $t->transaksi_denda; ?>">
                    </div>
                </div>

                <!-- Input Tanggal Dikembalikan -->
                <div class="form-group mb-4">
                    <label for="transaksi_tgldikembalikan">Tanggal Dikembalikan</label>
                    <input type="date" name="transaksi_tgldikembalikan" class="form-control" required>
                </div>

                <!-- Hidden untuk id mobil -->
                <input type="hidden" name="transaksi_mobil" value="<?php echo $t->transaksi_mobil; ?>">

                <!-- Tombol -->
                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Selesaikan Transaksi</button>
                <a href="<?php echo base_url('admin/transaksi'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>

            </form>
            <?php } ?>
        </div>
    </div>
</div>

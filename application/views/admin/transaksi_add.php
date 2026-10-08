<div class="container-fluid">
    <div class="page-header">
        <h3 class="mt-4">Transaksi Baru</h3>
    </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?php echo base_url('admin/transaksi_add_aksi'); ?>" method="post">

                        <!-- Tanggal Transaksi -->
                        <div class="form-group">
                            <label for="transaksi_tgl">Tanggal Transaksi</label>
                            <input type="date" name="transaksi_tgl" class="form-control" required>
                        </div>

                        <!-- Kostumer -->
                        <div class="form-group">
                            <label>Kostumer</label>
                            <select name="kostumer" class="form-control">
                                <option value="">-- Pilih Kostumer --</option>
                                <?php foreach ($kostumer as $k) { ?>
                                    <option value="<?php echo $k->id_kostumer; ?>"><?php echo $k->kostumer_nama; ?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_error('kostumer'); ?>
                        </div>

                        <!-- Mobil -->
                        <div class="form-group">
                            <label for="id_mobil">Mobil</label>
                            <select name="id_mobil" class="form-control" required>
                                <option value="">-- Pilih Mobil --</option>
                                <?php foreach ($mobil as $m) { ?>
                                    <option value="<?php echo $m->id_mobil; ?>">
                                        <?php echo $m->mobil_merk; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php echo form_error('mobil'); ?>
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div class="form-group">
                            <label for="transaksi_tgl_pinjam">Tanggal Pinjam</label>
                            <input type="date" name="transaksi_tgl_pinjam" class="form-control" required>
                        </div>

                        <!-- Tanggal Kembali -->
                        <div class="form-group">
                            <label for="transaksi_tgl_kembali">Tanggal Kembali</label>
                            <input type="date" name="transaksi_tgl_kembali" class="form-control" required>
                        </div>

                        <!-- Harga Per Hari -->
                        <div class="form-group">
                            <label for="transaksi_harga">Harga Sewa per Hari</label>
                            <input type="number" name="transaksi_harga" class="form-control" required>
                        </div>

                        <!-- Denda per Hari -->
                        <div class="form-group">
                            <label for="transaksi_denda">Denda per Hari</label>
                            <input type="number" name="transaksi_denda" class="form-control" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('admin/transaksi'); ?>" class="btn btn-secondary">Kembali</a>

                    </form>
                </div>
    </div>

</div>

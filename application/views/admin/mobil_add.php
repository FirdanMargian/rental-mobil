<div class="container-fluid">
    <div class="page-header">
        <h3 class="mt-4">Mobil Baru</h3>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo base_url('admin/mobil_add_act') ?>" method="post">
                <div class="form-group mb-3">
                    <label>Merk Mobil</label>
                    <input type="text" name="merk" class="form-control">
                    <?php echo form_error('merk'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>No. Plat Kendaraan</label>
                    <input type="text" name="plat" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Warna</label>
                    <input type="text" name="warna" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Tahun Kendaraan</label>
                    <input type="text" name="tahun" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Status Mobil</label>
                    <select name="status" class="form-control">
                        <option value="1">Tersedia</option>
                        <option value="2">Sedang Di Rental</option>
                    </select>
                    <?php echo form_error('status'); ?>
                </div>

                <div class="form-group mt-4">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <a href="<?php echo base_url('admin/mobil') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

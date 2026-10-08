<div class="container-fluid">
    <div class="page-header">
        <h3 class="mt-4">Edit Mobil</h3>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo base_url('admin/mobil_update') ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $mobil->id_mobil; ?>">

                <div class="form-group mb-3">
                    <label>Merk Mobil</label>
                    <input type="text" name="merk" class="form-control" value="<?php echo $mobil->mobil_merk; ?>">
                    <?php echo form_error('merk'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>No. Plat Kendaraan</label>
                    <input type="text" name="plat" class="form-control" value="<?php echo $mobil->mobil_plat; ?>">
                    <?php echo form_error('plat'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>Warna</label>
                    <input type="text" name="warna" class="form-control" value="<?php echo $mobil->mobil_warna; ?>">
                    <?php echo form_error('warna'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>Tahun Kendaraan</label>
                    <input type="text" name="tahun" class="form-control" value="<?php echo $mobil->mobil_tahun; ?>">
                    <?php echo form_error('tahun'); ?>
                </div>

                <div class="form-group mb-4">
                    <label>Status Mobil</label>
                    <select name="status" class="form-control">
                        <option value="1" <?php if($mobil->mobil_status == "1") echo "selected"; ?>>Tersedia</option>
                        <option value="2" <?php if($mobil->mobil_status == "2") echo "selected"; ?>>Sedang Di Rental</option>
                    </select>
                    <?php echo form_error('status'); ?>
                </div>

                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <a href="<?php echo base_url('admin/mobil') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

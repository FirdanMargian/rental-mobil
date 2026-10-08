<div class="container-fluid">
    <div class="page-header">
        <h3 class="mt-4">Edit Kostumer</h3>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo base_url('admin/kostumer_update') ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $kostumer->id_kostumer; ?>">

                <div class="form-group mb-3">
                    <label>Nama Kostumer</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $kostumer->kostumer_nama; ?>">
                    <?php echo form_error('nama'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $kostumer->kostumer_alamat; ?>">
                    <?php echo form_error('alamat'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="hp" class="form-control" value="<?php echo $kostumer->kostumer_hp; ?>">
                    <?php echo form_error('hp'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>Nomor KTP</label>
                    <input type="text" name="ktp" class="form-control" value="<?php echo $kostumer->kostumer_ktp; ?>">
                    <?php echo form_error('ktp'); ?>
                </div>

                <div class="form-group mb-4">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                        <option value="L" <?php if($kostumer->kostumer_jk == "L") echo "selected"; ?>>Laki-Laki</option>
                        <option value="P" <?php if($kostumer->kostumer_jk == "P") echo "selected"; ?>>Perempuan</option>
                    </select>
                    <?php echo form_error('jk'); ?>
                </div>

                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <a href="<?php echo base_url('admin/kostumer') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

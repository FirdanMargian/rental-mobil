<div class="container-fluid">
    <div class="page-header">
        <h3 class="mt-4">Kostumer Baru</h3>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo base_url('admin/kostumer_add_act') ?>" method="post">
                <div class="form-group mb-3">
                    <label>Nama Kostumer</label>
                    <input type="text" name="nama" class="form-control">
                    <?php echo form_error('nama'); ?>
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Nomor HP</label>
                    <input type="number" name="hp" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Nomor KTP</label>
                    <input type="text" name="ktp" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <?php echo form_error('jk'); ?>
                </div>

                <div class="form-group mt-4">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <a href="<?php echo base_url('admin/kostumer') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
    
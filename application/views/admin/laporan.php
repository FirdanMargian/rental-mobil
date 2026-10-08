<div class="container-fluid">
    <h3 class="mt-4 mb-4">Laporan Transaksi</h3>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?php echo base_url('admin/laporan'); ?>">

                <!-- Input Tanggal -->
                <div class="row">
                    <!-- Dari Tanggal -->
                    <div class="col-md-6 mb-3">
                        <label for="dari">Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control">
                        <?php echo form_error('dari'); ?>
                    </div>

                    <!-- Sampai Tanggal -->
                    <div class="col-md-6 mb-3">
                        <label for="sampai">Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control">
                        <?php echo form_error('sampai'); ?>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="form-group">
                    <input type="submit" name="cari" value="CARI" class="btn btn-sm btn-primary">
                </div>

            </form>
        </div>
    </div>
</div>

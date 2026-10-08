<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<!-- <div class="container-fluid px-4 mb-4 mx-1 mt-3"> -->
<!-- <div class="card mb-4 mx-4 mt-3"> -->
<div class="row">
  <!-- Panel 1 -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card text-white bg-primary h-100">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <i class="fas fa-folder-open fa-2x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="fs-2">
              <?php echo $this->M_rental->get_data('mobil')->num_rows(); ?>
            </div>
            <div>Jumlah Mobil</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url().'admin/mobil' ?>" class="card-footer text-black text-decoration-none d-flex justify-content-between align-items-center">
        <span>View Details</span>
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>

  <!-- Panel 2 -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card text-white bg-success h-100">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <i class="fas fa-users fa-2x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="fs-2">
              <?php echo $this->M_rental->get_data('kostumer')->num_rows(); ?>
            </div>
            <div>Jumlah Kostumer</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url().'admin/kostumer' ?>" class="card-footer text-black text-decoration-none d-flex justify-content-between align-items-center">
        <span>View Details</span>
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>

  <!-- Panel 3 -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card text-white bg-warning h-100">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <i class="fas fa-sort-amount-down fa-2x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="fs-2">
              <?php echo $this->M_rental->get_data('transaksi')->num_rows(); ?>
            </div>
            <div>Jumlah Transaksi</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url().'admin/transaksi' ?>" class="card-footer text-black text-decoration-none d-flex justify-content-between align-items-center">
        <span>View Details</span>
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>

  <!-- Panel 4 -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card text-white bg-danger h-100">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <i class="fas fa-check-circle fa-2x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="fs-2">
              <?php echo $this->M_rental->edit_data(array('transaksi_status'=>1),'transaksi')->num_rows(); ?>
            </div>
            <div>Rental Selesai</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url().'admin/transaksi' ?>" class="card-footer text-black text-decoration-none d-flex justify-content-between align-items-center">
        <span>View Details</span>
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>
</div>

<hr>

<div class="row">
  <!-- Mobil -->
  <div class="col-lg-4 mb-4">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-car"></i> Mobil
      </div>
      <div class="card-body">
        <div class="list-group">
          <?php foreach($mobil as $m){ ?>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center" style="gap: 10px;">
              <img src="<?php echo base_url('assets/img/mobil.png'); ?>" alt="Mobil Icon" style="width: 24px; height: 24px; object-fit: cover; border-radius: 4px;">
              <span><?php echo $m->mobil_merk; ?></span>
            </span>
            <span class="badge bg-info"><?php echo $m->mobil_status == 1 ? "Tersedia" : "Dirental"; ?></span>
          </a>
          <?php } ?>
        </div>
        <div class="text-end mt-2">
          <a href="<?php echo base_url().'admin/mobil' ?>">Lihat Semua Mobil <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Kostumer -->
  <div class="col-lg-3 mb-4">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-user"></i> Kostumer Terbaru
      </div>
      <div class="card-body">
        <div class="list-group">
          <?php foreach($kostumer as $k){ ?>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center" style="gap: 10px;">
              <img src="<?php echo base_url('assets/img/person.png'); ?>" alt="User" style="width: 24px; height: 24px; border-radius: 50%;">
              <?php echo $k->kostumer_nama; ?>
            </span>
            <span class="badge bg-success"><?php echo $k->kostumer_jk ?></span>
          </a>
          <?php } ?>
        </div>
        <div class="text-end mt-2">
          <a href="<?php echo base_url().'admin/kostumer' ?>">Lihat Semua Kostumer <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Transaksi -->
  <div class="col-lg-5 mb-4">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-shopping-cart"></i> Peminjaman Terakhir
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>Tgl. Transaksi</th>
                <th>Tgl. Pinjam</th>
                <th>Tgl. Kembali</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($transaksi as $t){ ?>
              <tr>
                <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl)); ?></td>
                <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl_pinjam)); ?></td>
                <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl_kembali)); ?></td>
                <td><?php echo "Rp. ".number_format($t->transaksi_harga)." ,-"; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="text-end mt-2">
          <a href="<?php echo base_url().'admin/transaksi' ?>">Lihat Semua Transaksi <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

        </div>
    </main>


<script type="text/javascript">
	$(document).ready(function(){
		$("#table-datatable").dataTable();
	});
</script>
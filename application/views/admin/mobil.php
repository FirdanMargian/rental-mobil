<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tabel Mobil</h1>

            <div class="card mb-4 mx-4 mt-3">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/mobil_add') ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Mobil
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Merk Mobil</th>
                                    <th>Plat</th>
                                    <th>Warna</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($mobil as $m) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo $m->mobil_merk; ?></td>
                                        <td><?php echo $m->mobil_plat; ?></td>
                                        <td><?php echo $m->mobil_warna; ?></td>
                                        <td class="text-center"><?php echo $m->mobil_tahun; ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($m->mobil_status == "1") {
                                                echo "<span class='badge bg-success'>Tersedia</span>";
                                            } else if ($m->mobil_status == "2") {
                                                echo "<span class='badge bg-danger'>Tidak tersedia</span>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/mobil_edit/' . $m->id_mobil); ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/mobil_hapus/' . $m->id_mobil); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- DataTables Initialization -->
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
    </main>
</div>

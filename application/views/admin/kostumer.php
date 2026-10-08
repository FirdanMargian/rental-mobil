<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tabel Kostumer</h1>

            <div class="card mb-4 mx-4 mt-3">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/kostumer_add') ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Kostumer
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>HP</th>
                                    <th>No.KTP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kostumer as $k) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo $k->kostumer_nama; ?></td>
                                        <td><?php echo $k->kostumer_jk; ?></td>
                                        <td><?php echo $k->kostumer_alamat; ?></td>
                                        <td><?php echo $k->kostumer_hp; ?></td>
                                        <td><?php echo $k->kostumer_ktp; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-sm" href="<?php echo base_url('admin/kostumer_edit/' . $k->id_kostumer); ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/kostumer_hapus/' . $k->id_kostumer); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">
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

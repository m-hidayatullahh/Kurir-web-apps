<!DOCTYPE html>
<html lang="id">

<?php include 'head.php'; ?>

<body id="page-top">
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php include 'navbar.php'; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Daftar Penugasan Kurir</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Paket yang Ditugaskan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Order</th>
                                            <th>Kurir Jemput</th>
                                            <th>Kurir Antar</th>
                                            <th>Resi</th>
                                            <th>Status</th>
                                            <th>Update Terakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Include connection to the database
                                        include 'config/koneksi.php';

                                        // Query to fetch data from the database
                                        $sql = "SELECT * FROM tbl_order_masuk ORDER BY id_order_masuk DESC";
                                        $query = $conn->query($sql);

                                        // Loop through the results and display them
                                        while ($row = $query->fetch_assoc()):
                                            $id_order = $row['id_order_masuk'];
                                            $kurir_jemput = $row['kurir_jemput'];
                                            $kurir_antar = $row['kurir_antar'];
                                            $resi = $row['resi'];
                                            $status = ucfirst($row['status_order']); // Make status more readable
                                            $waktu_konfirmasi = $row['waktu_konfirmasi'] ? date('d M Y, H:i', strtotime($row['waktu_konfirmasi'])) : '-';
                                        ?>
                                        <tr>
                                            <form action="update_status.php" method="POST">
                                                <td>
                                                    <?= 'PKT' . str_pad($id_order, 3, '0', STR_PAD_LEFT) ?>
                                                    <input type="hidden" name="id_order" value="<?= $id_order ?>">
                                                </td>
                                                <td><?= htmlspecialchars($kurir_jemput) ?></td>
                                                <td><?= htmlspecialchars($kurir_antar) ?></td>
                                                <td><?= htmlspecialchars($resi) ?></td>
                                                <td>
                                                    <!-- Menampilkan status langsung tanpa dropdown -->
                                                    <?= htmlspecialchars($status) ?>
                                                </td>
                                                <td><?= $waktu_konfirmasi ?></td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="detail_order.php?id=<?= $id_order ?>"
                                                        class="btn btn-info btn-sm mr-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="edit_status.php?id=<?= $id_order ?>"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="hapus_order.php?id=<?= $id_order ?>"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </td>

                                            </form>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include 'footer.php'; ?>
        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    </script>
</body>

</html>
<?php
include 'config/koneksi.php';
?>




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
                    <h1 class="h3 mb-4 text-gray-800">Data Kurir</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kurir</h6>
                            <a href="tambah_kurir.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Kurir
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Kurir</th>
                                            <th>Nama Kurir</th>
                                            <th>Kendaraan</th>
                                            <th>No. HP</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <tbody>
                                        <?php 
$query = "SELECT * FROM tbl_data_kurir";
$result = mysqli_query($conn, $query);

//MENAMPILKAN DATA KURIR
while ($row = mysqli_fetch_assoc($result)) {
    ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['id_kurir']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nama_kurir']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['kendaraan']; ?>
                                            </td>
                                            <th>
                                                <?php echo $row['no_hp']; ?>
                                            </th>
                                            <td><span class="badge badge-success">
                                                    <?php echo $row['status']; ?>
                                                </span></td>
                                            <td>
                                                <a href="edit_kurir.php?id=KUR001" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="hapus_kurir.php?id=KUR001"
                                                    onclick="return confirm('Yakin ingin menghapus kurir ini?')"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
}
?>

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
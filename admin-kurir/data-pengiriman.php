<?php
include 'config/koneksi.php';

$query = mysqli_query($conn, "
    SELECT o.id_order, p.nama AS pengirim, pr.nama AS penerima,
           o.harga_barang, o.status, o.nomor_resi, o.tanggal_order,
           o.id_kurir_jemput, o.id_kurir_antar,
           bayar.metode_pembayaran, bayar.status_pembayaran,
           p.no_hp AS pengirim_hp, p.alamat_lengkap AS pengirim_alamat,
           pr.no_hp AS penerima_hp, pr.alamat_lengkap AS penerima_alamat
    FROM tbl_orderan o
    JOIN tbl_pengirim p ON o.id_pengirim = p.id_pengirim
    JOIN tbl_penerima pr ON o.id_penerima = pr.id_penerima
    LEFT JOIN tbl_pembayaran bayar ON o.id_pembayaran = bayar.id_pembayaran
    ORDER BY o.tanggal_order DESC
");
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
                    <h1 class="h3 mb-4 text-gray-800">Data Pengiriman</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Orderan Kurir Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Order</th>
                                            <th>Pengirim</th>
                                            <th>Penerima</th>
                                            <th>Status</th>
                                            <th>Konfirmasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                                        <tr>
                                            <td><?= $data['id_order']; ?></td>
                                            <td><?= $data['pengirim']; ?></td>
                                            <td><?= $data['penerima']; ?></td>
                                            <td>
                                                <?php
                                                    if ($data['status'] == 'Menunggu Konfirmasi') {
                                                        echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                                    } elseif ($data['status'] == 'Terkonfirmasi') {
                                                        echo '<span class="badge badge-success">Terkonfirmasi</span>';
                                                    } else {
                                                        echo '<span class="badge badge-secondary">' . $data['status'] . '</span>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php if ($data['status'] == 'Menunggu Konfirmasi') : ?>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#modalKonfirmasi<?= $data['id_order']; ?>">
                                                    <i class="fas fa-check"></i> Konfirmasi
                                                </button>
                                                <?php else : ?>
                                                <button class="btn btn-secondary btn-sm" disabled>
                                                    <i class="fas fa-check-double"></i> Sudah
                                                </button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="detail_orderan.php?id=<?= $data['id_order']; ?>"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Modal Konfirmasi untuk setiap Order -->
                                        <div class="modal fade" id="modalKonfirmasi<?= $data['id_order']; ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasiLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="proses_konfirmasi.php" method="POST">
                                                    <input type="hidden" name="id_order"
                                                        value="<?= $data['id_order']; ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalKonfirmasiLabel">Konfirmasi
                                                                Order #<?= $data['id_order']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="id_kurir_jemput">Kurir Jemput</label>
                                                                <select name="id_kurir_jemput" class="form-control"
                                                                    required>
                                                                    <option value="">-- Pilih Kurir Jemput --</option>
                                                                    <?php
                                                                        $kurirQuery = mysqli_query($conn, "SELECT * FROM tbl_data_kurir");
                                                                        while ($k = mysqli_fetch_assoc($kurirQuery)) {
                                                                            echo "<option value='{$k['id_kurir']}'>{$k['nama_kurir']}</option>";
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="id_kurir_antar">Kurir Antar</label>
                                                                <select name="id_kurir_antar" class="form-control"
                                                                    required>
                                                                    <option value="">-- Pilih Kurir Antar --</option>
                                                                    <?php
                                                                        $kurirQuery2 = mysqli_query($conn, "SELECT * FROM tbl_data_kurir");
                                                                        while ($k2 = mysqli_fetch_assoc($kurirQuery2)) {
                                                                            echo "<option value='{$k2['id_kurir']}'>{$k2['nama_kurir']}</option>";
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nomor_resi">Nomor Resi</label>
                                                                <input type="text" name="nomor_resi"
                                                                    class="form-control" required
                                                                    placeholder="Masukkan nomor resi">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="konfirmasi"
                                                                class="btn btn-primary">Konfirmasi</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <?php include 'footer.php'; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript -->
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
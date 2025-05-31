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
                                        <!-- Dummy Data dengan form per baris -->
                                        <tr>
                                            <form action="#" method="POST">
                                                <td>
                                                    PKT001
                                                    <input type="hidden" name="id_order" value="PKT001">
                                                </td>
                                                <td>Joko</td>
                                                <td>Budi</td>
                                                <td>-</td>
                                                <td>
                                                    <select name="status" class="form-control form-control-sm">
                                                        <option value="Menunggu Penjemputan" selected>Menunggu
                                                            Penjemputan</option>
                                                        <option value="Sudah Dijemput">Sudah Dijemput</option>
                                                        <option value="Sedang Transit">Sedang Transit</option>
                                                        <option value="Berhasil Dikirim">Berhasil Dikirim</option>
                                                    </select>
                                                </td>
                                                <td>16 Mei 2025, 10:00</td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="detail_orderan.php?id=PKT001"
                                                        class="btn btn-info btn-sm mr-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fas fa-save"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>

                                        <tr>
                                            <form action="#" method="POST">
                                                <td>
                                                    PKT002
                                                    <input type="hidden" name="id_order" value="PKT002">
                                                </td>
                                                <td>Toni</td>
                                                <td>Ani</td>
                                                <td>-</td>
                                                <td>
                                                    <select name="status" class="form-control form-control-sm">
                                                        <option value="Menunggu Penjemputan">Menunggu Penjemputan
                                                        </option>
                                                        <option value="Sudah Dijemput">Sudah Dijemput</option>
                                                        <option value="Sedang Transit" selected>Sedang Transit</option>
                                                        <option value="Berhasil Dikirim">Berhasil Dikirim</option>
                                                    </select>
                                                </td>
                                                <td>16 Mei 2025, 13:20</td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="detail_orderan.php?id=PKT002"
                                                        class="btn btn-info btn-sm mr-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fas fa-save"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>

                                        <tr>
                                            <form action="#" method="POST">
                                                <td>
                                                    PKT003
                                                    <input type="hidden" name="id_order" value="PKT003">
                                                </td>
                                                <td>Sari</td>
                                                <td>Reza</td>
                                                <td>-</td>
                                                <td>
                                                    <select name="status" class="form-control form-control-sm" disabled>
                                                        <option value="Berhasil Dikirim" selected>Berhasil Dikirim
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>15 Mei 2025, 17:45</td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="detail_orderan.php?id=PKT003"
                                                        class="btn btn-info btn-sm mr-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-secondary btn-sm" disabled>
                                                        <i class="fas fa-check-circle"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>

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
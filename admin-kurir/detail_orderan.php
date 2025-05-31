<?php
include 'config/koneksi.php';

$id_order = $_GET['id'] ?? '';

$query = mysqli_query($conn, "
    SELECT o.id_order, o.status, o.nomor_resi, o.tanggal_order, o.harga_barang,
           p.nama AS pengirim, p.no_hp AS pengirim_hp, p.alamat_lengkap AS pengirim_alamat,
           kab.nama_kabupaten AS pengirim_kabupaten, kec.nama_kecamatan AS pengirim_kecamatan,
           p.no_rekening, b.nama_bank,
           pr.nama AS penerima, pr.no_hp AS penerima_hp, pr.alamat_lengkap AS penerima_alamat,
           kab_pr.nama_kabupaten AS penerima_kabupaten, kec_pr.nama_kecamatan AS penerima_kecamatan,
           t.tarif AS tarif_ongkir, bayar.bukti_transfer,
           kurir.nama_kurir, bayar.metode_pembayaran, bayar.status_pembayaran
    FROM tbl_orderan o
    JOIN tbl_pengirim p ON o.id_pengirim = p.id_pengirim
    JOIN tbl_penerima pr ON o.id_penerima = pr.id_penerima
    LEFT JOIN tbl_kabupaten kab ON p.id_kabupaten = kab.id_kabupaten
    LEFT JOIN tbl_kecamatan kec ON p.id_kecamatan = kec.id_kecamatan
    LEFT JOIN tbl_kabupaten kab_pr ON pr.id_kabupaten = kab_pr.id_kabupaten
    LEFT JOIN tbl_kecamatan kec_pr ON pr.id_kecamatan = kec_pr.id_kecamatan
    LEFT JOIN tbl_bank b ON p.id_bank = b.id_bank
    LEFT JOIN tbl_tarif_ongkir t ON o.id_tarif = t.id_tarif
    LEFT JOIN tbl_pembayaran bayar ON o.id_pembayaran = bayar.id_pembayaran
    WHERE o.id_order = '$id_order'
");

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">

<?php include 'head.php'; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include 'navbar.php'; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Detail Orderan</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Orderan #PKT001</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr class="table-primary">
                                    <th colspan="2">PENGIRIM</th>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $data['pengirim']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <td><?= $data['pengirim_kabupaten']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <td><?= $data['pengirim_kecamatan']; ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <td><?= $data['pengirim_alamat']; ?></td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td><?= $data['pengirim_hp']; ?></td>
                                </tr>
                                <tr>
                                    <th>No. Rekening</th>
                                    <td><?= $data['no_rekening']; ?></td>
                                </tr>

                                <!-- Penerima -->
                                <tr class="table-primary">
                                    <th colspan="2">PENERIMA</th>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $data['penerima']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <td><?= $data['penerima_kabupaten']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <td><?= $data['penerima_kecamatan']; ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <td><?= $data['penerima_alamat']; ?></td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td><?= $data['penerima_hp']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tarif Ongkir</th>
                                    <td>Rp <?= number_format($data['tarif_ongkir'], 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <th>Harga Barang</th>
                                    <td>Rp <?= number_format($data['harga_barang'], 0, ',', '.'); ?>
                                        (<?= $data['metode_pembayaran'] ?? 'COD'; ?>)</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php if ($data['status'] == 'Menunggu Konfirmasi'): ?>
                                        <span class="badge badge-warning"><?= $data['status']; ?></span>
                                        <?php elseif ($data['status'] == 'Terkonfirmasi'): ?>
                                        <span class="badge badge-success"><?= $data['status']; ?></span>
                                        <?php else: ?>
                                        <span class="badge badge-secondary"><?= $data['status']; ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bukti Transfer</th>
                                    <td>
                                        <?php if (!empty($data['bukti_transfer'])): ?>
                                        <a href="uploads/<?= $data['bukti_transfer']; ?>" target="_blank">
                                            <img src="uploads/<?= $data['bukti_transfer']; ?>" alt="Bukti Transfer"
                                                style="max-width: 200px; border: 1px solid #ddd; border-radius: 4px;">
                                        </a>
                                        <?php else: ?>
                                        <em>Tidak ada bukti transfer</em>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Resi</th>
                                    <td><?= $data['nomor_resi'] ?: '<em>Belum ada</em>'; ?></td>
                                </tr>

                            </table>

                            <a href="orderan_masuk.php" class="btn btn-secondary mt-3">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="#" class="btn btn-success mt-3 ml-2">
                                <i class="fas fa-check"></i> Konfirmasi Orderan
                            </a>
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
    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js">
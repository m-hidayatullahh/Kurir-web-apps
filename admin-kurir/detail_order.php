<?php
include 'config/koneksi.php';
$id_order = $_GET['id'] ?? 0;

$query = $conn->prepare("SELECT * FROM tbl_order_masuk WHERE id_order_masuk = ?");
$query->bind_param("i", $id_order);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    die("<div class='alert alert-danger'>Order tidak ditemukan.</div>");
}

$order = $result->fetch_assoc();
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
                    <h1 class="h3 mb-4 text-gray-800">Detail Orderan</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary text-white">
                            <h6 class="m-0 font-weight-bold">Informasi Orderan
                                #<?= htmlspecialchars($order['kode_order'] ?? 'PKT' . str_pad($order['id_order_masuk'], 3, '0', STR_PAD_LEFT)) ?>
                            </h6>
                        </div>
                        <div class="card-body">

                            <!-- Data Pengirim -->
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2" class="bg-primary text-white">PENGIRIM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= htmlspecialchars($order['nama_pengirim']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten</th>
                                            <td><?= htmlspecialchars($order['kabupaten_pengirim']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td><?= htmlspecialchars($order['kecamatan_pengirim']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Lengkap</th>
                                            <td><?= nl2br(htmlspecialchars($order['alamat_pengirim'])) ?></td>
                                        </tr>
                                        <tr>
                                            <th>No. HP</th>
                                            <td><?= htmlspecialchars($order['hp_pengirim']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Bank</th>
                                            <td><?= htmlspecialchars($order['bank_pengirim']) . ' - ' . htmlspecialchars($order['no_rekening']) ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Data Penerima -->
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2" class="bg-success text-white">PENERIMA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= htmlspecialchars($order['nama_penerima']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten</th>
                                            <td><?= htmlspecialchars($order['kabupaten_penerima']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td><?= htmlspecialchars($order['kecamatan_penerima']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Lengkap</th>
                                            <td><?= nl2br(htmlspecialchars($order['alamat_penerima'])) ?></td>
                                        </tr>
                                        <tr>
                                            <th>No. HP</th>
                                            <td><?= htmlspecialchars($order['hp_penerima']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Link Maps</th>
                                            <td><a href="<?= htmlspecialchars($order['link_maps']) ?>"
                                                    target="_blank">Lihat Lokasi</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Info Barang -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2" class="bg-warning text-dark">DETAIL BARANG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Jenis Barang</th>
                                            <td><?= htmlspecialchars($order['jenis_barang']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Berat Barang</th>
                                            <td><?= htmlspecialchars($order['berat_barang']) ?> kg</td>
                                        </tr>
                                        <tr>
                                            <th>Harga Barang</th>
                                            <td>Rp <?= number_format($order['harga_barang'], 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status Pembayaran</th>
                                            <td>COD</td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Order</th>
                                            <td><?= date('d M Y, H:i', strtotime($order['created_at'] ?? 'now')) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><?= ucfirst($order['status_order'] ?? 'menunggu') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tarif Ongkir</th>
                                            <td>Rp <?= number_format($order['tarif_ongkir'] ?? 0, 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Resi</th>
                                            <td><?= htmlspecialchars($order['resi'] ?? '-') ?></td>
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
</body>

</html>
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
    LEFT JOIN tbl_data_kurir kurir ON o.id_kurir = kurir.id_kurir
    LEFT JOIN tbl_pembayaran bayar ON o.id_pembayaran = bayar.id_pembayaran
    WHERE o.id_order = '$id_order'
");

$data = mysqli_fetch_assoc($query);
?>



<!DOCTYPE html>
<html lang="id">

<?php include 'head.php'; ?>

<body>

    <?php include 'sidebar.php'; ?>
    <div class="container mt-5">
        <h3 class="mb-4">Daftar Orderan Kurir Masuk</h3>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th> <?= $data['pengirim']; ?></th>
                    <th>Alamat Pengirim</th>
                    <th>Alamat Tujuan</th>
                    <th>Tanggal Order</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Orderan 1 -->
                <tr>
                    <td>1</td>
                    <td>Ahmad Yusuf</td>
                    <td>Jl. Cendana No.12, Mataram</td>
                    <td>Jl. Kenanga No.45, Praya</td>
                    <td>16 Mei 2025</td>
                    <td><span class="badge badge-warning">Menunggu Konfirmasi</span></td>
                    <td>
                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                        <button class="btn btn-danger btn-sm">Tolak</button>
                    </td>
                </tr>
                <!-- Orderan 2 -->
                <tr>
                    <td>2</td>
                    <td>Siti Aisyah</td>
                    <td>Jl. Anggrek No.7, Lombok Timur</td>
                    <td>Jl. Mawar No.3, Mataram</td>
                    <td>15 Mei 2025</td>
                    <td><span class="badge badge-warning">Menunggu Konfirmasi</span></td>
                    <td>
                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                        <button class="btn btn-danger btn-sm">Tolak</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include 'admin-kurir/config/koneksi.php';

// Ambil data dari form
$nama_pengirim       = $_POST['nama_pengirim'];
$kabupaten_pengirim  = $_POST['kabupaten_pengirim'];
$kecamatan_pengirim  = $_POST['kecamatan_pengirim'];
$alamat_pengirim     = $_POST['alamat_pengirim'];
$hp_pengirim         = $_POST['hp_pengirim'];
$bank_pengirim       = $_POST['nama_bank'];
$no_rekening         = $_POST['no_rekening'];

$nama_penerima       = $_POST['nama_penerima'];
$kabupaten_penerima  = $_POST['kabupaten_penerima'];
$kecamatan_penerima  = $_POST['kecamatan_penerima'];
$alamat_penerima     = $_POST['alamat_penerima'];
$hp_penerima         = $_POST['hp_penerima'];
$link_maps           = $_POST['link_maps'];

$jenis_barang        = $_POST['jenis_barang'];
$berat_barang        = $_POST['berat_barang'];
$harga_barang        = $_POST['harga_barang'] ?? 0;


// Generate nomor resi
$resi = 'RESI' . strtoupper(uniqid());

$tarif_ongkir = '';

// Status awal
$status_order = 'Menunggu Konfirmasi';
$waktu_konfirmasi = null;
$kurir_jemput = null;
$kurir_antar = null;

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO tbl_order_masuk 
(nama_pengirim, kabupaten_pengirim, kecamatan_pengirim, alamat_pengirim, hp_pengirim, bank_pengirim, no_rekening,
 nama_penerima, kabupaten_penerima, kecamatan_penerima, alamat_penerima, hp_penerima, link_maps,
 jenis_barang, berat_barang, harga_barang, resi, tarif_ongkir, status_order, waktu_konfirmasi, kurir_jemput, kurir_antar)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssssssddssssss",
    $nama_pengirim, $kabupaten_pengirim, $kecamatan_pengirim, $alamat_pengirim, $hp_pengirim,
    $bank_pengirim, $no_rekening,
    $nama_penerima, $kabupaten_penerima, $kecamatan_penerima, $alamat_penerima, $hp_penerima,
    $link_maps, $jenis_barang, $berat_barang, $harga_barang,
    $resi, $tarif_ongkir, $status_order, $waktu_konfirmasi, $kurir_jemput, $kurir_antar
);

if ($stmt->execute()) {
    header("Location: order_sukses.php?resi=$resi");
    exit();
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}
?>
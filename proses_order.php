<?php
include 'admin-kurir/config/koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil data dari form POST
$nama_pengirim = $_POST['nama_pengirim'] ?? '';
$kabupaten_pengirim = $_POST['kabupaten_pengirim'] ?? '';
$kecamatan_pengirim = $_POST['kecamatan_pengirim'] ?? '';
$alamat_pengirim = $_POST['alamat_pengirim'] ?? '';
$hp_pengirim = $_POST['hp_pengirim'] ?? '';
$bank_pengirim = $_POST['nama_bank'] ?? '';
$no_rekening = $_POST['no_rekening'] ?? '';

$nama_penerima = $_POST['nama_penerima'] ?? '';
$kabupaten_penerima = $_POST['kabupaten_penerima'] ?? '';
$kecamatan_penerima = $_POST['kecamatan_penerima'] ?? '';
$alamat_penerima = $_POST['alamat_penerima'] ?? '';
$hp_penerima = $_POST['hp_penerima'] ?? '';
$link_maps = $_POST['link_maps'] ?? '';

$jenis_barang = $_POST['jenis_barang'] ?? '';
$berat_barang = (float)($_POST['berat_barang'] ?? 0);
$harga_barang = (float)($_POST['harga_barang'] ?? 0);
$tarif_ongkir = '';
$resi = ''; // Kosong dulu, bisa diisi nanti
$status_order = 'menunggu';
$waktu_konfirmasi = null;
$kurir_jemput = '';
$kurir_antar = '';

// Upload bukti transfer jika ada
$bukti_transfer = '';
if (isset($_FILES['bukti_transfer']) && $_FILES['bukti_transfer']['error'] === 0) {
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0755);

    $filename = time() . '_' . basename($_FILES['bukti_transfer']['name']);
    $target_file = $upload_dir . $filename;

    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

    if (in_array($file_type, $allowed_types)) {
        if (move_uploaded_file($_FILES['bukti_transfer']['tmp_name'], $target_file)) {
            $bukti_transfer = $target_file;
        } else {
            echo "Gagal mengupload file.";
            exit;
        }
    } else {
        echo "Tipe file tidak diperbolehkan. Harap unggah JPG, PNG, GIF, atau PDF.";
        exit;
    }
}

// Validasi kabupaten
if (empty($kabupaten_pengirim) || empty($kabupaten_penerima)) {
    die("Kabupaten pengirim dan penerima harus diisi.");
}

$query_check = $conn->prepare("SELECT 1 FROM tbl_kabupaten WHERE nama_kabupaten = ?");
$query_check->bind_param("s", $kabupaten_pengirim);
$query_check->execute();
$query_check->store_result();
if ($query_check->num_rows == 0) {
    die("Kabupaten pengirim tidak valid.");
}
$query_check->bind_param("s", $kabupaten_penerima);
$query_check->execute();
$query_check->store_result();
if ($query_check->num_rows == 0) {
    die("Kabupaten penerima tidak valid.");
}
$query_check->close();

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO tbl_order_masuk 
(nama_pengirim, kabupaten_pengirim, kecamatan_pengirim, alamat_pengirim, hp_pengirim, bank_pengirim, no_rekening,
 nama_penerima, kabupaten_penerima, kecamatan_penerima, alamat_penerima, hp_penerima, link_maps,
 jenis_barang, berat_barang, harga_barang, bukti_transfer, resi, tarif_ongkir, status_order, waktu_konfirmasi, kurir_jemput, kurir_antar)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssssssssssddssssss",
    $nama_pengirim, $kabupaten_pengirim, $kecamatan_pengirim, $alamat_pengirim, $hp_pengirim,
    $bank_pengirim, $no_rekening,
    $nama_penerima, $kabupaten_penerima, $kecamatan_penerima, $alamat_penerima, $hp_penerima,
    $link_maps, $jenis_barang, $berat_barang, $harga_barang,
    $bukti_transfer, $resi, $tarif_ongkir, $status_order, $waktu_konfirmasi,$kurir_jemput, $kurir_antar
);

if ($stmt->execute()) {
    echo "<script>alert('Order berhasil dikirim!'); window.location.href='index.php';</script>";
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
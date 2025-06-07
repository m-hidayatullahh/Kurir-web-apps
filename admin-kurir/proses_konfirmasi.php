<?php
include 'config/koneksi.php';

if (isset($_POST['konfirmasi'])) {
    $id_order       = $_POST['id_order'];
    $id_kurir_jemput = $_POST['id_kurir_jemput'];
    $id_kurir_antar  = $_POST['id_kurir_antar'];
    $tarif_ongkir    = $_POST['tarif_ongkir'];
    $waktu_konfirmasi = date('Y-m-d H:i:s');

    // Ambil nama kurir jemput
    $kurir_jemput = '-';
    $result1 = mysqli_query($conn, "SELECT nama_kurir FROM tbl_data_kurir WHERE id_kurir = '$id_kurir_jemput'");
    if ($row1 = mysqli_fetch_assoc($result1)) {
        $kurir_jemput = $row1['nama_kurir'];
    }

    // Ambil nama kurir antar
    $kurir_antar = '-';
    $result2 = mysqli_query($conn, "SELECT nama_kurir FROM tbl_data_kurir WHERE id_kurir = '$id_kurir_antar'");
    if ($row2 = mysqli_fetch_assoc($result2)) {
        $kurir_antar = $row2['nama_kurir'];
    }
$query = "UPDATE tbl_order_masuk SET 
    kurir_jemput = '$kurir_jemput',
    kurir_antar = '$kurir_antar',
    tarif_ongkir = '$tarif_ongkir',
    status_order = 'terkonfirmasi',
    waktu_konfirmasi = '$waktu_konfirmasi'
WHERE id_order_masuk = '$id_order'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Order berhasil dikonfirmasi.'); window.location='data_order.php';</script>";
    } else {
        echo "<script>alert('Gagal mengkonfirmasi order.'); window.location='data_order.php';</script>";
    }
} else {
    header("Location: data_order.php");
}
?>
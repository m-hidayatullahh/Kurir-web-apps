<?php
include 'config/koneksi.php';

if (isset($_POST['konfirmasi'])) {
    $id_order = $_POST['id_order'];
    $id_kurir_jemput = $_POST['id_kurir_jemput'];
    $id_kurir_antar = $_POST['id_kurir_antar'];
    $nomor_resi = $_POST['nomor_resi'];

    if ($id_kurir_jemput == $id_kurir_antar) {
        echo "<script>
            alert('Kurir jemput dan antar tidak boleh sama.');
            history.back();
        </script>";
        exit;
    }

    $update = mysqli_query($conn, "
        UPDATE tbl_orderan 
        SET status = 'Terkonfirmasi', 
            id_kurir_jemput = '$id_kurir_jemput',
            id_kurir_antar = '$id_kurir_antar',
            nomor_resi = '$nomor_resi'
        WHERE id_order = '$id_order'
    ");

    if ($update) {
        echo "<script>
            alert('Order berhasil dikonfirmasi.');
            window.location.href = 'data-pengiriman.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengkonfirmasi order.');
            history.back();
        </script>";
    }
}
?>
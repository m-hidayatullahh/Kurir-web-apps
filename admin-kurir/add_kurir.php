<?php
include 'config/koneksi.php';

if (isset($_POST['tambahKurir'])) {
    $id_kurir = $_POST['id_kurir'];
    $nama_kurir = $_POST['nama_kurir'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $query = "INSERT INTO tbl_data_kurir (id_kurir, nama_kurir, no_hp, alamat, status) 
              VALUES ('$id_kurir', '$nama_kurir', '$no_hp', '$alamat', '$status')";
    mysqli_query($conn, $query);

    echo "<script>
        alert('Data kurir berhasil ditambahkan!');
        window.location.href = 'data_kurir.php';
    </script>";
}
?>
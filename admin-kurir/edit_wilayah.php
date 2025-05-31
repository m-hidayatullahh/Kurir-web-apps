<?php
include 'config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data berdasarkan ID
$query = "SELECT * FROM tbl_tarif_ongkir WHERE id_tarif = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Proses edit jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $kabupaten_asal = $_POST['kabupaten_asal'];
    $kabupaten_tujuan = $_POST['kabupaten_tujuan'];
    $tarif = $_POST['tarif'];

    // Query untuk update data
    $update_query = "UPDATE tbl_tarif_ongkir SET kabupaten_asal='$kabupaten_asal', kabupaten_tujuan='$kabupaten_tujuan', tarif='$tarif' WHERE id_tarif='$id'";

    if (mysqli_query($conn, $update_query)) {
        // Redirect ke halaman data_wilayah.php setelah sukses
        header("Location: data_wilayah.php?success=true");
        exit();
    } else {
        // Jika update gagal
        echo "Error: " . mysqli_error($conn);
    }
}
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

                <!-- Form Edit Wilayah -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Edit Wilayah Pengiriman</h1>

                    <form action="edit_wilayah.php?id=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Kabupaten Asal</label>
                            <input type="text" name="kabupaten_asal" class="form-control"
                                value="<?php echo $row['kabupaten_asal']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Kabupaten Tujuan</label>
                            <input type="text" name="kabupaten_tujuan" class="form-control"
                                value="<?php echo $row['kabupaten_tujuan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tarif Ongkir (Rp)</label>
                            <input type="number" name="tarif" class="form-control" value="<?php echo $row['tarif']; ?>"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>

            </div>

            <?php include 'footer.php'; ?>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
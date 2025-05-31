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
                    <h1 class="h3 mb-4 text-gray-800">Upload Bukti Transfer COD</h1>

                    <div class="row">
                        <!-- Form Upload -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Form Upload Bukti Transfer</h6>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id_order">Pilih ID Order</label>
                                            <select name="id_order" id="id_order" class="form-control"
                                                onchange="isiDataPenerima()">
                                                <option value="">-- Pilih --</option>
                                                <option value="PKT001" data-nama="Budi Hartono" data-bank="Bank BRI"
                                                    data-norek="1234567890">PKT001</option>
                                                <option value="PKT002" data-nama="Siti Aminah" data-bank="Bank BCA"
                                                    data-norek="9876543210">PKT002</option>
                                                <option value="PKT003" data-nama="Dedi Supriadi"
                                                    data-bank="Bank Mandiri" data-norek="4567891230">PKT003</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_penerima">Nama Penerima</label>
                                            <input type="text" class="form-control" id="nama_penerima" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="bank">Nama Bank</label>
                                            <input type="text" class="form-control" id="bank" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="norek">Nomor Rekening</label>
                                            <input type="text" class="form-control" id="norek" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="bukti_transfer">Bukti Transfer</label>
                                            <input type="file" class="form-control-file" id="bukti_transfer"
                                                accept="image/*">
                                        </div>
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Bukti Dummy -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-secondary">Preview Bukti Transfer</h6>
                                </div>
                                <div class="card-body text-center">
                                    <img src="assets/img/bukti_dummy.jpg" class="img-fluid rounded"
                                        style="max-height: 300px;" alt="Bukti Transfer">
                                    <p class="mt-2 mb-0"><strong>Status:</strong> Belum upload</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include 'footer.php'; ?>
        </div>
    </div>

    <!-- Script -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <script>
    function isiDataPenerima() {
        const selected = document.getElementById("id_order").selectedOptions[0];
        const nama = selected.getAttribute("data-nama");
        const bank = selected.getAttribute("data-bank");
        const norek = selected.getAttribute("data-norek");

        document.getElementById("nama_penerima").value = nama || '';
        document.getElementById("bank").value = bank || '';
        document.getElementById("norek").value = norek || '';
    }
    </script>
</body>

</html>
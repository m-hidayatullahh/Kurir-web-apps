<?php include 'head.php';?>

<section id="form_pengiriman" class="form_pengiriman section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Formulir Pengiriman Paket</h2>
        <div class="title-shape">
            <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor"
                    stroke-width="2"></path>
            </svg>
        </div>
        <p>
            Becat Kurir NTB menyediakan berbagai layanan pengiriman yang cepat,
            aman, dan terpercaya untuk kebutuhan Anda, baik individu maupun
            bisnis.
        </p>

    </div>
    <main class="container py-5">
        <form action="proses_order.php" method="POST" enctype="multipart/form-data" class="card shadow p-4 border-0">
            <h5 class="mb-3" style="color: #333;">Data Pengirim</h5>
            <div class="mb-3">
                <label for="nama_pengirim" class="form-label" style="color: #333;">Nama Pengirim</label>
                <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control"
                    style="border: 1.5px solid #333;" required>
            </div>
            <div class="mb-3">
                <label for="kabupaten_pengirim" class="form-label" style="color: #333;">Kabupaten Pengirim</label>
                <select name="kabupaten_pengirim" id="kabupaten_pengirim" class="form-control"
                    style="border: 1.5px solid #333;" required>
                    <option value="">Pilih Kabupaten</option>
                    <option value="Lombok Barat">Lombok Barat</option>
                    <option value="Lombok Tengah">Lombok Tengah</option>
                    <option value="Lombok Timur">Lombok Timur</option>
                    <option value="Lombok Utara">Lombok Utara</option>
                    <option value="Kota Mataram">Kota Mataram</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat_pengirim" class="form-label" style="color: #333;">Alamat Lengkap Pengirim</label>
                <textarea name="alamat_pengirim" id="alamat_pengirim" class="form-control"
                    style="border: 1.5px solid #333;" required></textarea>
            </div>
            <div class="mb-3">
                <label for="hp_pengirim" class="form-label" style="color: #333;">No. HP Pengirim</label>
                <input type="text" name="hp_pengirim" id="hp_pengirim" class="form-control"
                    style="border: 1.5px solid #333;" required>
            </div>
            <div class="mb-3">
                <label for="bank_pengirim" class="form-label" style="color: #333;">Bank Pengirim</label>
                <select name="bank_pengirim" id="bank_pengirim" class="form-control" style="border: 1.5px solid #333;"
                    required>
                    <option value="">Pilih Bank</option>
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="BCA">BCA</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="SeaBank">Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_rekening" class="form-label" style="color: #333;">No. Rekening</label>
                <input type="text" name="no_rekening" id="no_rekening" class="form-control"
                    style="border: 1.5px solid #333;" required>
            </div>

            <hr class="my-4" style="border-top: 2px solid #ff6600;">

            <h5 class="mb-3" style="color: #333;">Data Penerima</h5>
            <div class="mb-3">
                <label for="nama_penerima" class="form-label" style="color: #333;">Nama Penerima</label>
                <input type="text" name="nama_penerima" id="nama_penerima" class="form-control"
                    style="border: 1.5px solid #333;" required>
            </div>
            <div class="mb-3">
                <label for="kabupaten_penerima" class="form-label" style="color: #333;">Kabupaten Penerima</label>
                <select name="kabupaten_penerima" id="kabupaten_penerima" class="form-control"
                    style="border: 1.5px solid #333;" required>
                    <option value="">Pilih Kabupaten</option>
                    <option value="Lombok Barat">Lombok Barat</option>
                    <option value="Lombok Tengah">Lombok Tengah</option>
                    <option value="Lombok Timur">Lombok Timur</option>
                    <option value="Lombok Utara">Lombok Utara</option>
                    <option value="Kota Mataram">Kota Mataram</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kecamatan_penerima" class="form-label" style="color: #333;">Kecamatan Penerima</label>
                <select name="kecamatan_penerima" id="kecamatan_penerima" class="form-control"
                    style="border: 1.5px solid #333;" required>
                    <option value="">Pilih Kecamatan</option>
                    <option value="Pujut">Pujut</option>
                    <option value="Praya">Praya</option>
                    <option value="Jonggat">Jonggat</option>
                    <option value="Batukliang">Batukliang</option>
                    <option value="Kopang">Kopang</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat_penerima" class="form-label" style="color: #333;">Alamat Lengkap Penerima</label>
                <textarea name="alamat_penerima" id="alamat_penerima" class="form-control"
                    style="border: 1.5px solid #333;" required></textarea>
            </div>
            <div class="mb-3">
                <label for="hp_penerima" class="form-label" style="color: #333;">No. HP Penerima</label>
                <input type="text" name="hp_penerima" id="hp_penerima" class="form-control"
                    style="border: 1.5px solid #333;" required>
            </div>
            <div class="mb-3">
                <label for="link_maps" class="form-label" style="color: #333;">Link Google Maps (Opsional)</label>
                <input type="url" name="link_maps" id="link_maps" class="form-control"
                    style="border: 1.5px solid #333;">
            </div>

            <hr class="my-4" style="border-top: 2px solid #ff6600;">

            <h5 class="mb-3" style="color: #333;">Detail Barang</h5>
            <div class="mb-3">
                <label for="jenis_barang" class="form-label" style="color: #333;">Jenis Barang</label>
                <input type="text" name="jenis_barang" id="jenis_barang" class="form-control"
                    style="border: 1.5px solid #333;" required>
            </div>
            <div class="mb-3">
                <label for="berat_barang" class="form-label" style="color: #333;">Berat Barang (kg)</label>
                <input type="number" name="berat_barang" id="berat_barang" class="form-control"
                    style="border: 1.5px solid #333;" required>
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="form-label" style="color: #333;">Harga Barang (jika COD)</label>
                <input type="number" name="harga_barang" id="harga_barang" class="form-control"
                    style="border: 1.5px solid #333;">
            </div>
            <div class="mb-3">
                <label for="bukti_transfer" class="form-label" style="color: #333;">Upload Bukti Transfer (Jika Bukan
                    COD)</label>
                <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control"
                    style="border: 1.5px solid #333;">
            </div>

            <button type="submit" class="btn"
                style="background-color: #ff6600; color: white; font-weight: 600; width: 100%;">Kirim Orderan</button>
        </form>
    </main>
</section>

<?php include 'script.php'; ?>
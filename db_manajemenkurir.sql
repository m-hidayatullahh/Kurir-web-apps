-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_manajemenkurir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`) VALUES
(1, 'NTB'),
(2, 'BRI'),
(3, 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_kurir`
--

CREATE TABLE `tbl_data_kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `kendaraan` varchar(50) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_kurir`
--

INSERT INTO `tbl_data_kurir` (`id_kurir`, `nama_kurir`, `no_hp`, `kendaraan`, `status`) VALUES
(1, 'Andi Gerung', '085678901234', 'Motor', 'aktif'),
(2, 'Jaka Pringgasela', '0812838237812', 'NMAX', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kabupaten`
--

CREATE TABLE `tbl_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kabupaten`
--

INSERT INTO `tbl_kabupaten` (`id_kabupaten`, `nama_kabupaten`) VALUES
(1, 'Kota Mataram'),
(2, 'Lombok Barat'),
(3, 'Lombok Tengah'),
(4, 'Lombok Timur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`) VALUES
(1, 1, 'Cakranegara'),
(2, 2, 'Gerung'),
(3, 1, 'Kecamatan Ampenan'),
(4, 1, 'Kecamatan Cakranegara'),
(5, 1, 'Kecamatan Sandubaya'),
(6, 1, 'Kecamatan Selaparang'),
(7, 2, 'Kecamatan Gerung'),
(8, 2, 'Kecamatan Lingsar'),
(9, 2, 'Kecamatan Narmada'),
(10, 2, 'Kecamatan Kediri'),
(11, 2, 'Kecamatan Batulayar'),
(12, 3, 'Kecamatan Praya'),
(13, 3, 'Kecamatan Praya Barat'),
(14, 3, 'Kecamatan Praya Timur'),
(15, 3, 'Kecamatan Janapria'),
(16, 3, 'Kecamatan Batukliang'),
(17, 4, 'Kecamatan Selong'),
(18, 4, 'Kecamatan Pringgabaya'),
(19, 4, 'Kecamatan Sikur'),
(20, 4, 'Kecamatan Keruak'),
(21, 4, 'Kecamatan Jerowaru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderan`
--

CREATE TABLE `tbl_orderan` (
  `id_order` varchar(50) NOT NULL,
  `id_pengirim` int(11) DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `id_tarif` int(11) DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `harga_barang` decimal(12,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `nomor_resi` varchar(50) DEFAULT NULL,
  `tanggal_order` datetime DEFAULT NULL,
  `id_kurir_jemput` int(11) DEFAULT NULL,
  `id_kurir_antar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orderan`
--

INSERT INTO `tbl_orderan` (`id_order`, `id_pengirim`, `id_penerima`, `id_tarif`, `id_pembayaran`, `harga_barang`, `status`, `nomor_resi`, `tanggal_order`, `id_kurir_jemput`, `id_kurir_antar`) VALUES
('ORD001', 1, 1, 1, 1, 150000.00, 'Terkonfirmasi', 'PKET250011', '2025-05-29 19:19:44', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_order` varchar(50) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_order`, `metode_pembayaran`, `bukti_transfer`, `tanggal_pembayaran`, `status_pembayaran`) VALUES
(1, 'PKT001', 'Transfer Bank', 'bukti_pkt001.jpg', '2025-05-25 10:00:00', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerima`
--

CREATE TABLE `tbl_penerima` (
  `id_penerima` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penerima`
--

INSERT INTO `tbl_penerima` (`id_penerima`, `nama`, `no_hp`, `id_kabupaten`, `id_kecamatan`, `alamat_lengkap`) VALUES
(1, 'Budi Hartono', '082345678901', 2, 2, 'Jl. Soekarno-Hatta No.45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengirim`
--

CREATE TABLE `tbl_pengirim` (
  `id_pengirim` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengirim`
--

INSERT INTO `tbl_pengirim` (`id_pengirim`, `nama`, `kecamatan`, `kabupaten`, `no_hp`, `id_kabupaten`, `id_kecamatan`, `alamat_lengkap`, `id_bank`, `no_rekening`) VALUES
(1, 'Andi Setiawan', NULL, NULL, '081234567890', 1, 1, 'Jl. Bung Karno No.123', 1, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penugasan_kurir`
--

CREATE TABLE `tbl_penugasan_kurir` (
  `id_penugasan` int(11) NOT NULL,
  `id_order` varchar(50) DEFAULT NULL,
  `id_kurir_jemput` int(11) DEFAULT NULL,
  `id_kurir_antar` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_penugasan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tarif_ongkir`
--

CREATE TABLE `tbl_tarif_ongkir` (
  `id_tarif` int(11) NOT NULL,
  `kabupaten_asal` varchar(100) DEFAULT NULL,
  `kabupaten_tujuan` varchar(100) DEFAULT NULL,
  `tarif` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tarif_ongkir`
--

INSERT INTO `tbl_tarif_ongkir` (`id_tarif`, `kabupaten_asal`, `kabupaten_tujuan`, `tarif`) VALUES
(1, 'Kota Mataram', 'Lombok Baratt', 16000.00),
(2, 'Kota Mataram', 'Lombok Tengah', 20000.00),
(3, 'Kota Mataram', 'Lombok Timur', 25000.00),
(4, 'Kota Mataram', 'Kota Mataram', 10000.00),
(5, 'Lombok Timur', 'Lombok Tengah', 15000.00),
(6, 'Lombok Timur', 'Lombok Barat', 20000.00),
(7, 'Lombok Timur', 'Kota Mataram', 20000.00),
(8, 'Lombok Timur', 'Lombok Timur', 12000.00),
(9, 'Lombok Tengah', 'Lombok Barat', 20000.00),
(10, 'Lombok Tengah', 'Lombok Timur', 15000.00),
(11, 'Lombok Tengah', 'Kota Mataram', 15000.00),
(12, 'Lombok Tengah', 'Lombok Tengah', 12000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `role`, `nama_lengkap`, `no_hp`) VALUES
(1, 'Dianpertiwi', '0192023a7bbd73250516f069df18b500', 'admin', 'Dian Pertiwi', '081937500766');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_data_kurir`
--
ALTER TABLE `tbl_data_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `tbl_kabupaten`
--
ALTER TABLE `tbl_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indexes for table `tbl_orderan`
--
ALTER TABLE `tbl_orderan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_tarif` (`id_tarif`),
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `id_kurir_jemput` (`id_kurir_jemput`),
  ADD KEY `id_kurir_antar` (`id_kurir_antar`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_penerima`
--
ALTER TABLE `tbl_penerima`
  ADD PRIMARY KEY (`id_penerima`),
  ADD KEY `id_kabupaten` (`id_kabupaten`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `tbl_pengirim`
--
ALTER TABLE `tbl_pengirim`
  ADD PRIMARY KEY (`id_pengirim`),
  ADD KEY `id_kabupaten` (`id_kabupaten`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `tbl_penugasan_kurir`
--
ALTER TABLE `tbl_penugasan_kurir`
  ADD PRIMARY KEY (`id_penugasan`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_kurir_jemput` (`id_kurir_jemput`),
  ADD KEY `id_kurir_antar` (`id_kurir_antar`);

--
-- Indexes for table `tbl_tarif_ongkir`
--
ALTER TABLE `tbl_tarif_ongkir`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_data_kurir`
--
ALTER TABLE `tbl_data_kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kabupaten`
--
ALTER TABLE `tbl_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_penerima`
--
ALTER TABLE `tbl_penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pengirim`
--
ALTER TABLE `tbl_pengirim`
  MODIFY `id_pengirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_penugasan_kurir`
--
ALTER TABLE `tbl_penugasan_kurir`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tarif_ongkir`
--
ALTER TABLE `tbl_tarif_ongkir`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD CONSTRAINT `tbl_kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `tbl_kabupaten` (`id_kabupaten`);

--
-- Constraints for table `tbl_orderan`
--
ALTER TABLE `tbl_orderan`
  ADD CONSTRAINT `tbl_orderan_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `tbl_pengirim` (`id_pengirim`),
  ADD CONSTRAINT `tbl_orderan_ibfk_2` FOREIGN KEY (`id_penerima`) REFERENCES `tbl_penerima` (`id_penerima`),
  ADD CONSTRAINT `tbl_orderan_ibfk_3` FOREIGN KEY (`id_tarif`) REFERENCES `tbl_tarif_ongkir` (`id_tarif`),
  ADD CONSTRAINT `tbl_orderan_ibfk_4` FOREIGN KEY (`id_pembayaran`) REFERENCES `tbl_pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `tbl_orderan_ibfk_6` FOREIGN KEY (`id_kurir_jemput`) REFERENCES `tbl_data_kurir` (`id_kurir`),
  ADD CONSTRAINT `tbl_orderan_ibfk_7` FOREIGN KEY (`id_kurir_antar`) REFERENCES `tbl_data_kurir` (`id_kurir`);

--
-- Constraints for table `tbl_penerima`
--
ALTER TABLE `tbl_penerima`
  ADD CONSTRAINT `tbl_penerima_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `tbl_kabupaten` (`id_kabupaten`),
  ADD CONSTRAINT `tbl_penerima_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `tbl_kecamatan` (`id_kecamatan`);

--
-- Constraints for table `tbl_pengirim`
--
ALTER TABLE `tbl_pengirim`
  ADD CONSTRAINT `tbl_pengirim_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `tbl_kabupaten` (`id_kabupaten`),
  ADD CONSTRAINT `tbl_pengirim_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `tbl_kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `tbl_pengirim_ibfk_3` FOREIGN KEY (`id_bank`) REFERENCES `tbl_bank` (`id_bank`);

--
-- Constraints for table `tbl_penugasan_kurir`
--
ALTER TABLE `tbl_penugasan_kurir`
  ADD CONSTRAINT `tbl_penugasan_kurir_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_orderan` (`id_order`),
  ADD CONSTRAINT `tbl_penugasan_kurir_ibfk_2` FOREIGN KEY (`id_kurir_jemput`) REFERENCES `tbl_data_kurir` (`id_kurir`),
  ADD CONSTRAINT `tbl_penugasan_kurir_ibfk_3` FOREIGN KEY (`id_kurir_antar`) REFERENCES `tbl_data_kurir` (`id_kurir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

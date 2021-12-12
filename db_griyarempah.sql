-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_griyarempah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL,
  `kode_kategori` varchar(12) NOT NULL,
  `gambar_kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `kode_kategori`, `gambar_kategori`) VALUES
(18, 'Kurma', 'KRM', '247455a926384ae855cbb1a25caf45f2.jpg'),
(19, 'Madu', 'MDU', 'ae083dae2cc4fa8e2f71b6962bd6499a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk_ind` varchar(35) NOT NULL,
  `nama_produk_en` varchar(35) DEFAULT NULL,
  `harga_produk_ind` int(25) NOT NULL,
  `harga_produk_en` int(25) DEFAULT NULL,
  `stok_produk` int(12) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar_produk` varchar(64) NOT NULL,
  `berat_produk` int(25) NOT NULL,
  `tanggal_upload` varchar(12) NOT NULL,
  `diskon` varchar(11) NOT NULL,
  `jumlah_diskon` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk_ind`, `nama_produk_en`, `harga_produk_ind`, `harga_produk_en`, `stok_produk`, `id_kategori`, `gambar_produk`, `berat_produk`, `tanggal_upload`, `diskon`, `jumlah_diskon`) VALUES
(25, 'Kurma Ajwa', 'Kurma Ajwa', 23000, 2, 20, 18, 'f59eb903851d452061256d6910bec322.jpg', 320, '2021/06/05', 'Tidak', 0),
(26, 'Kurma Bam Iran', 'Kurma Bam Iran', 45000, 4, 26, 18, '5f8a2dab894215ebcf2e22a57ec519d4.jpg', 500, '2021/06/05', 'Ada', 20),
(27, 'Kurma Muda Ruthab', 'Kurma Muda Ruthab', 100000, 7, 20, 18, '760fa1c57fe20983ed018c061bb2be2b.jpg', 320, '2021/06/05', 'Ada', 20),
(28, 'Kurma Sukari', 'Kurma Sukari', 22000, 2, 20, 18, 'cbc716b8385dc3a113c39768e3a5f0f9.jpg', 1200, '2021/06/05', 'Tidak', 0),
(29, 'Kurma Tunisia', 'Kurma Tunisia', 32000, 2, 321, 18, 'f2c4e34bc36989a5f0cc3ddb5fdc0336.jpg', 500, '2021/06/05', 'Ada', 30),
(30, 'Madu Ipas Mellifera', 'Ipas Mellifera Honey', 56000, 4, 20, 19, '01554222899a33366059307b1665dfd0.jpg', 480, '2021/06/05', 'Ada', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincian_transaksi`
--

CREATE TABLE `tb_rincian_transaksi` (
  `id_rincian_transaksi` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rincian_transaksi`
--

INSERT INTO `tb_rincian_transaksi` (`id_rincian_transaksi`, `no_order`, `id_produk`, `qty`) VALUES
(47, '20210609E4IPQKFY', 27, 3),
(48, '20210609E4IPQKFY', 25, 2),
(49, '20210611OSDR3JYF', 27, 3),
(51, '20210613ISK649SF', 26, 2),
(52, '20210613ISK649SF', 25, 1);

--
-- Triggers `tb_rincian_transaksi`
--
DELIMITER $$
CREATE TRIGGER `pesanan_produk` AFTER INSERT ON `tb_rincian_transaksi` FOR EACH ROW BEGIN
	UPDATE tb_produk SET stok_produk = stok_produk-NEW.qty
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting_lokasi`
--

CREATE TABLE `tb_setting_lokasi` (
  `id_lokasi` int(1) NOT NULL,
  `kota_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_setting_lokasi`
--

INSERT INTO `tb_setting_lokasi` (`id_lokasi`, `kota_kabupaten`) VALUES
(1, 153);

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama_testimoni` varchar(35) NOT NULL,
  `kalimat_testimoni` text NOT NULL,
  `gambar_testimoni` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `nama_testimoni`, `kalimat_testimoni`, `gambar_testimoni`) VALUES
(2, 'Muhammad Agus', '                Ahh Mantap Kali Bah', 'f0a21bd166114f7fbfc28aea4fcbecb8.png'),
(3, 'Toha Amirin', '                                Mantap deh', '3d0b0f9b61907a9616f42a0268bd1e10.png'),
(4, 'Muhammad Arifin', 'Mantap betul', 'a662eea1f16e8d93d37cc090955c1fb4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tanggal_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  `no_hp_penerima` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `no_order`, `tanggal_order`, `nama_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `tanggal_bayar`, `no_resi`, `no_hp_penerima`) VALUES
(25, 13, '20210609E4IPQKFY', '2021-06-09', 'Muhammad Yeshua', 'DKI Jakarta', 'Jakarta Selatan', 'Kec. Lalamat, Kel. Lalatung, Jl. Alalang, No 14', '238763', 'tiki', 'REG', '2 Hari', 18000, 1600, 286000, 304000, 1, '7e4de3869d77b9f4112dc79135ec2731.png', 'Jab Drujana', 'BCA', '2776550', 1, '2021-06-09', '122330983', '02134998223'),
(26, 13, '20210611OSDR3JYF', '2021-06-11', 'Muhammad Aqil Emeraldi', 'Jawa Barat', 'Cianjur', 'Kec. Lalamat, Kel. Lalatung, Jl. Alalang, No 14', '21423', 'tiki', 'ECO', '4 Hari', 13000, 960, 240000, 253000, 1, '3b0fd27af469500b6f1ecd1798bdb7ec.png', 'Jab Drujana', 'Mandiri', 'BCA-1762172-8787212', 1, '2021-06-11', '2134234234', '08982193432'),
(28, 13, '20210613ISK649SF', '2021-06-13', 'Durjana Pamungkas', 'Jawa Tengah', 'Magelang', 'Kec. Lalamat, Kel. Lalatung, Jl. Alalang, No 14', '89912', 'tiki', 'ECO', '4 Hari', 38000, 1320, 95000, 133000, 1, '4c124de91f039821cbdab4f787196646.png', 'Irvan Sanjaya', 'Mandiri', '42342342424', 1, '2021-06-13', '089786867676', '08913123343');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `no_telp_user` varchar(25) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `level_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `no_telp_user`, `email_user`, `password_user`, `level_user`) VALUES
(12, 'sastech@maintenance', '089502009151', 'sastech@gmail.com', '$2y$10$lVRh5IzLRI.1i.lGxPzzQ.IhTGKeJsM6l4.Fp3bMFrWXlR1X.EgAi', 1),
(13, 'bta8jakarta1', '02139372432', 'btagroupzoom15@gmail.com', '$2y$10$urMVfnmH/Sr7z1A53qg8reCSghyCSegq0DDqffhfc6g7nYUEfG3pa', 2),
(17, 'admin@griyarempah', '081340355969', 'admin.griyarempah@gmail.com', '$2y$10$EP9eRmuo8KxHA2BFC4bw0e4ZLha262UWeWb3EBcm50fvtqaAEZ3ea', 1),
(18, 'bta8jakarta2', '09886767312', 'avicena_of_ghazaly@yahoo.com', '$2y$10$LYXVRtFlOShSnEWCqyRs5uip9kbQRTzWMsAof5r4vr4SktgURog5.', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_rincian_transaksi`
--
ALTER TABLE `tb_rincian_transaksi`
  ADD PRIMARY KEY (`id_rincian_transaksi`);

--
-- Indexes for table `tb_setting_lokasi`
--
ALTER TABLE `tb_setting_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_rincian_transaksi`
--
ALTER TABLE `tb_rincian_transaksi`
  MODIFY `id_rincian_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_setting_lokasi`
--
ALTER TABLE `tb_setting_lokasi`
  MODIFY `id_lokasi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

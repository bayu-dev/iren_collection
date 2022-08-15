-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 06:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iren_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(250) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `nama_akun` varchar(250) DEFAULT NULL,
  `sa` double NOT NULL DEFAULT 0,
  `saldo_normal` enum('d','k') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `kategori`, `nama_akun`, `sa`, `saldo_normal`) VALUES
('111', 'Aktiva', 'Kas', 10000000, 'd'),
('113', 'Aktiva', 'Persediaan Barang Dagang', 0, 'd'),
('411', 'Pendapatan', 'Penjualan', 0, 'k'),
('420', 'Pendapatan', 'Diskon Penjualan', 0, 'k'),
('511', 'Beban', 'Harga Pokok Penjualan', 0, 'd'),
('512', 'Beban', 'Beban Listrik', 0, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'pegawai', 'Site Pegawai'),
(2, 'pemilik', 'Site Pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(135, '::1', 'admin', NULL, '2021-11-28 23:08:12', 0),
(136, '::1', 'admin', NULL, '2021-11-28 23:09:19', 0),
(137, '::1', 'admin@gmail.com', 3, '2021-11-28 23:12:35', 1),
(138, '::1', 'admin@gmail.com', 3, '2021-11-28 23:12:38', 1),
(139, '::1', 'admin@gmail.com', 3, '2021-11-28 23:17:19', 1),
(140, '::1', 'admin@gmail.com', 3, '2021-11-30 06:34:15', 1),
(141, '::1', 'admin@gmail.com', 3, '2021-12-02 04:44:58', 1),
(142, '::1', 'admin@gmail.com', 3, '2021-12-02 07:59:23', 1),
(143, '::1', 'admin@gmail.com', 3, '2021-12-04 06:06:03', 1),
(144, '::1', 'admin@gmail.com', 3, '2021-12-04 08:09:48', 1),
(145, '::1', 'admin@gmail.com', 3, '2021-12-05 08:31:19', 1),
(146, '::1', 'admin@gmail.com', 3, '2021-12-05 09:16:17', 1),
(147, '::1', 'atga.admin@cce-leap.com', NULL, '2021-12-05 19:52:54', 0),
(148, '::1', 'atga.admin@cce-leap.com', NULL, '2021-12-05 19:52:57', 0),
(149, '::1', 'admin@gmail.com', 3, '2021-12-05 19:53:07', 1),
(150, '::1', 'admin@gmail.com', 3, '2021-12-05 21:43:07', 1),
(151, '::1', 'admin', NULL, '2021-12-28 06:15:29', 0),
(152, '::1', 'admin@gmail.com', 3, '2021-12-28 06:15:44', 1),
(153, '::1', 'admin@gmail.com', 3, '2021-12-28 08:14:16', 1),
(154, '::1', 'admin@gmail.com', 3, '2021-12-28 23:03:30', 1),
(155, '::1', 'bayuap96@gmail.com', 24, '2021-12-30 01:46:39', 1),
(156, '::1', 'admin@gmail.com', 1, '2021-12-30 01:55:21', 1),
(157, '::1', 'bayuap96@gmail.com', 24, '2021-12-30 06:38:52', 1),
(158, '::1', 'admin@gmail.com', 1, '2021-12-30 06:40:44', 1),
(159, '::1', 'bayuap96@gmail.com', 24, '2021-12-30 09:24:34', 1),
(160, '::1', 'admin@gmail.com', 1, '2021-12-30 11:30:53', 1),
(161, '::1', 'admin@gmail.com', 1, '2022-01-02 19:36:52', 1),
(162, '::1', 'bayuap96@gmail.com', 24, '2022-01-03 00:59:18', 1),
(163, '::1', 'admin', NULL, '2022-01-03 04:12:30', 0),
(164, '::1', 'admin@gmail.com', 1, '2022-01-03 04:12:36', 1),
(165, '::1', 'customer@Mail.com', 25, '2022-01-21 21:33:47', 1),
(166, '::1', 'customer@Mail.com', 25, '2022-01-22 00:19:02', 1),
(167, '::1', 'customer@Mail.com', 25, '2022-01-22 08:07:02', 1),
(168, '::1', 'customer@Mail.com', 25, '2022-02-04 00:10:00', 1),
(169, '::1', 'joni@mail.com', 29, '2022-02-04 00:57:21', 1),
(170, '::1', 'admin@gmail.com', 1, '2022-02-04 05:38:51', 1),
(171, '::1', 'joni@mail.com', 29, '2022-02-04 06:09:37', 1),
(172, '::1', 'admin@gmail.com', 1, '2022-02-04 06:10:09', 1),
(173, '::1', 'joni@mail.com', 29, '2022-02-04 07:01:57', 1),
(174, '::1', 'admin@gmail.com', 1, '2022-02-04 09:27:19', 1),
(175, '::1', 'joni@mail.com', 29, '2022-02-04 09:41:32', 1),
(176, '::1', 'admin@gmail.com', 1, '2022-02-04 10:04:14', 1),
(177, '::1', 'admin@gmail.com', 1, '2022-02-04 10:05:01', 1),
(178, '::1', 'admin@gmail.com', 1, '2022-02-06 23:31:48', 1),
(179, '::1', 'joni@mail.com', 29, '2022-02-06 23:34:15', 1),
(180, '::1', 'admin@gmail.com', 1, '2022-02-07 03:11:59', 1),
(181, '::1', 'joni@mail.com', 29, '2022-02-07 04:46:19', 1),
(182, '::1', 'customer', NULL, '2022-02-19 11:38:59', 0),
(183, '::1', 'joni@mail.com', 29, '2022-02-19 11:39:13', 1),
(184, '::1', 'admin@gmail.com', 1, '2022-02-20 00:05:33', 1),
(185, '::1', 'joni@mail.com', 29, '2022-02-20 04:36:58', 1),
(186, '::1', 'admin@gmail.com', 1, '2022-02-20 04:45:29', 1),
(187, '::1', 'joni@mail.com', 29, '2022-02-20 04:50:24', 1),
(188, '::1', 'admin@gmail.com', 1, '2022-02-20 04:52:54', 1),
(189, '::1', 'admin@gmail.com', 1, '2022-07-08 06:15:55', 1),
(190, '::1', 'admin@gmail.com', 1, '2022-07-08 07:09:02', 1),
(191, '::1', 'admin@gmail.com', 1, '2022-07-08 07:22:02', 1),
(192, '::1', 'admin@gmail.com', 1, '2022-07-08 07:41:30', 1),
(193, '::1', 'admin@gmail.com', 1, '2022-07-15 07:33:28', 1),
(194, '::1', 'admin', NULL, '2022-07-27 11:23:04', 0),
(195, '::1', 'admin', NULL, '2022-07-27 11:23:09', 0),
(196, '::1', 'admin@gmail.com', 1, '2022-07-27 11:23:28', 1),
(197, '::1', 'admin@gmail.com', 1, '2022-07-28 22:15:22', 1),
(198, '::1', 'admin@gmail.com', 1, '2022-07-28 22:37:34', 1),
(199, '::1', 'admin@gmail.com', 1, '2022-07-28 22:59:44', 1),
(200, '::1', 'admin@gmail.com', 1, '2022-07-29 09:55:14', 1),
(201, '::1', 'admin@gmail.com', 1, '2022-07-29 11:42:30', 1),
(202, '::1', 'pemilik@gmail.com', 30, '2022-08-01 09:18:04', 1),
(203, '::1', 'pemilik@gmail.com', 30, '2022-08-01 10:06:09', 1),
(204, '::1', 'pegawai@gmail.com', 1, '2022-08-01 10:27:45', 1),
(205, '::1', 'pemilik@gmail.com', 30, '2022-08-01 10:59:22', 1),
(206, '::1', 'pemilik@gmail.com', 30, '2022-08-02 08:24:24', 1),
(207, '::1', 'pegawai@gmail.com', 1, '2022-08-02 08:41:05', 1),
(208, '::1', 'pemilik@gmail.com', 30, '2022-08-02 09:20:23', 1),
(209, '::1', 'pegawai@gmail.com', 1, '2022-08-02 09:21:20', 1),
(210, '::1', 'pemilik@gmail.com', 30, '2022-08-02 09:23:13', 1),
(211, '::1', 'pemilik@gmail.com', 30, '2022-08-03 10:36:41', 1),
(212, '::1', 'pegawai@gmail.com', 1, '2022-08-03 10:37:07', 1),
(213, '::1', 'pemilik@gmail.com', 30, '2022-08-03 11:07:35', 1),
(214, '::1', 'pegawai@gmail.com', 1, '2022-08-04 09:05:14', 1),
(215, '::1', 'pemilik@gmail.com', 30, '2022-08-04 09:07:01', 1),
(216, '::1', 'pegawai@gmail.com', 1, '2022-08-04 09:09:37', 1),
(217, '::1', 'pemilik@gmail.com', 30, '2022-08-04 09:10:56', 1),
(218, '::1', 'pegawai@gmail.com', 1, '2022-08-14 23:16:23', 1),
(219, '::1', 'pemilik@gmail.com', 30, '2022-08-14 23:26:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(64) NOT NULL,
  `nama_barang` varchar(64) NOT NULL,
  `kategori_barang` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `product_image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori_barang`, `harga`, `deskripsi`, `product_image`) VALUES
('PRD-001', 'Converse Limited Edition', 'KTG-002', 500000, '', 'joshua-vides-converse-pro-leather-A00713C-5.webp'),
('PRD-002', 'Sepatu Reebok Putih', 'KTG-002', 600000, '', '01-REEBOK-FFSSBREE5-REE10-DV8649-White_7.webp');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` varchar(20) NOT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `id_supplier` varchar(20) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `id_stok` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `id_supplier`, `harga_satuan`, `jumlah_beli`, `id_stok`) VALUES
(1, 'PMB-001', 'PRD-001', 'SUP-001', 500000, 5, 'STK-001'),
(2, 'PMB-002', 'PRD-002', 'SUP-001', 600000, 5, 'STK-002');

--
-- Triggers `detail_pembelian`
--
DELIMITER $$
CREATE TRIGGER `after_delete_detail_pembelian` AFTER DELETE ON `detail_pembelian` FOR EACH ROW BEGIN
	DELETE FROM kartu_stok WHERE id_stok = OLD.id_stok;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` varchar(30) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah_jual` int(11) DEFAULT NULL,
  `hpp` int(11) NOT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `diskon` double NOT NULL,
  `id_stok` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `id_pelanggan`, `id_user`, `jumlah_jual`, `hpp`, `harga_satuan`, `diskon`, `id_stok`) VALUES
(1, 'PNJ-001', 'PRD-001', NULL, NULL, 2, 500000, 550000, 55000, 'STK-003');

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `after_delete_detail_penjualan` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN
	DELETE FROM kartu_stok WHERE id_stok = OLD.id_stok;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `id_jurnal` varchar(16) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `nominal` double NOT NULL,
  `posisi` char(1) NOT NULL,
  `debet` double DEFAULT NULL,
  `kredit` double DEFAULT NULL,
  `reff` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `transaksi` varchar(256) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_jurnal`, `tanggal`, `id_akun`, `nominal`, `posisi`, `debet`, `kredit`, `reff`, `transaksi`, `id_transaksi`) VALUES
(14, 'JU-001', '2022-08-15', 113, 2500000, 'd', 2500000, 0, 'PMB-001', 'Pembelian', 1),
(15, 'JU-001', '2022-08-15', 111, 2500000, 'k', 0, 2500000, 'PMB-001', 'Pembelian', 1),
(16, 'JU-002', '2022-08-15', 113, 3000000, 'd', 3000000, 0, 'PMB-002', 'Pembelian', 2),
(17, 'JU-002', '2022-08-15', 111, 3000000, 'k', 0, 3000000, 'PMB-002', 'Pembelian', 2),
(18, 'JU-003', '2022-08-15', 411, 1045000, 'd', 1045000, 0, 'PNJ-001', 'Penjualan', 3),
(19, 'JU-003', '2022-08-15', 420, 55000, 'd', 55000, 0, 'PNJ-001', 'Penjualan', 3),
(20, 'JU-003', '2022-08-15', 111, 1100000, 'k', 0, 1100000, 'PNJ-001', 'Penjualan', 3),
(21, 'JU-003', '2022-08-15', 511, 990000, 'd', 990000, 0, 'PNJ-001', 'Penjualan', 3),
(22, 'JU-003', '2022-08-15', 113, 990000, 'k', 0, 990000, 'PNJ-001', 'Penjualan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG-001', 'Pakaian'),
('KTG-002', 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kartu_stok`
--

CREATE TABLE `laporan_kartu_stok` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `pembelian_unit` int(64) DEFAULT NULL,
  `pembelian_harga` int(64) DEFAULT NULL,
  `pembelian_total` int(64) DEFAULT NULL,
  `penjualan_unit` int(64) DEFAULT NULL,
  `penjualan_harga` int(64) DEFAULT NULL,
  `penjualan_total` int(64) DEFAULT NULL,
  `unit_akhir` int(64) DEFAULT NULL,
  `harga_akhir` int(64) DEFAULT NULL,
  `total_akhir` int(64) DEFAULT NULL,
  `id_stok` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_kartu_stok`
--

INSERT INTO `laporan_kartu_stok` (`id`, `id_barang`, `tanggal`, `pembelian_unit`, `pembelian_harga`, `pembelian_total`, `penjualan_unit`, `penjualan_harga`, `penjualan_total`, `unit_akhir`, `harga_akhir`, `total_akhir`, `id_stok`) VALUES
(5, 'PRD-001', '2022-08-15', 5, 500000, 2500000, NULL, NULL, NULL, 5, 500000, 2500000, 'STK-001'),
(6, 'PRD-002', '2022-08-15', 5, 600000, 3000000, NULL, NULL, NULL, 5, 600000, 3000000, 'STK-002'),
(7, 'PRD-001', '2022-08-15', NULL, NULL, NULL, 2, 500000, 1000000, 3, 500000, 1500000, 'STK-003');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1636530322, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `id_supplier` varchar(20) NOT NULL DEFAULT '',
  `tanggal_pembelian` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '-',
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `tanggal_pembelian`, `status`, `id_transaksi`) VALUES
('PMB-001', 'SUP-001', '2022-08-15', 'LUNAS', 1),
('PMB-002', 'SUP-001', '2022-08-15', 'LUNAS', 2);

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `after_delete_pembelian` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
	DELETE FROM jurnal WHERE id_transaksi = OLD.id_transaksi;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bef_insert_pembelian` BEFORE INSERT ON `pembelian` FOR EACH ROW BEGIN
	DECLARE id_trans integer;
	
	SELECT IFNULL(MAX(id_transaksi),0)+1 INTO id_trans 
	FROM
	(
		SELECT id_transaksi 
		FROM pembelian
		UNION
		SELECT id_transaksi 
		FROM penjualan
		ORDER BY 1
	) TBL;	
	SET NEW.id_transaksi = id_trans ;
	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_penjualan` date NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT '-',
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `id_user`, `tanggal_penjualan`, `status`, `id_transaksi`) VALUES
('PNJ-001', NULL, NULL, '2022-08-15', '-', 3);

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `after_delete_penjualan` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
	DELETE FROM jurnal WHERE id_transaksi = OLD.id_transaksi;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bef_insert_penjualan` BEFORE INSERT ON `penjualan` FOR EACH ROW BEGIN
	DECLARE id_trans integer;
	
	SELECT IFNULL(MAX(id_transaksi),0)+1 INTO id_trans 
	FROM
	(
		SELECT id_transaksi 
		FROM pembelian
		UNION
		SELECT id_transaksi 
		FROM penjualan
		ORDER BY 1
	) TBL;	
	SET NEW.id_transaksi = id_trans ;
	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telp`) VALUES
(1, 'Toko Serbaunik', 22, 'Bandung', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(64) NOT NULL,
  `nama_supplier` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
('SUP-001', 'Sport Shoes', 'Bandung', '081226384640');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'user-1.jpg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pegawai@gmail.com', 'pegawai', 'Pegawai', 'user-1.jpg', '$2y$10$WuoRW1wCN70K5UgdEeiyA.ib8dErwnQwh2FaBMAEP0oHRitK6HeDO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-11-17 08:28:11', '2021-11-17 08:28:11', NULL),
(30, 'pemilik@gmail.com', 'pemilik', 'Pemilik', 'user-1.jpg', '$2y$10$WuoRW1wCN70K5UgdEeiyA.ib8dErwnQwh2FaBMAEP0oHRitK6HeDO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-11-17 08:28:11', '2021-11-17 08:28:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`) USING BTREE,
  ADD KEY `no_faktur_pembelian` (`id_pembelian`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `id_produk_detail` (`id_barang`),
  ADD KEY `id_penjualan_detail` (`id_penjualan`),
  ADD KEY `id_stok_penjualan` (`id_stok`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan_kartu_stok`
--
ALTER TABLE `laporan_kartu_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_data_id_barang` (`id_barang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `laporan_kartu_stok`
--
ALTER TABLE `laporan_kartu_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

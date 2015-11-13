-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2015 at 02:02 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.6-1ubuntu1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `mst_detail_transaksi` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) DEFAULT NULL,
  `bayar` float DEFAULT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mst_detail_transaksi`
--

INSERT INTO `mst_detail_transaksi` (`seq`, `id_transaksi`, `bayar`) VALUES
(1, '1210001', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `mst_produk`
--

CREATE TABLE IF NOT EXISTS `mst_produk` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `harga_beli` float DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `mst_produk`
--

INSERT INTO `mst_produk` (`seq`, `id_produk`, `nama`, `deskripsi`, `harga_beli`, `jenis`, `tgl_daftar`, `user`, `aktif`) VALUES
(1, '1510001', 'Paket Baby A', 'Baby Gym,swim', 0, 'jasa', '2015-10-26', 'admin', 1),
(2, '1510002', 'Paket Baby B', 'Baby Brain Gym,Gym,Swim', 0, 'jasa', '2015-10-26', 'admin', 1),
(3, '6291056068203', 'Benecol Yoghurt 125 gm', NULL, 10000, 'minuman', '2015-10-29', 'admin', 1),
(4, '18998866500705', 'Floridina Orange 360ml', NULL, 2500, 'minuman', '2015-10-29', 'admin', 1),
(5, '8999908005007', 'VITAMIN B1 IPI 50TAB', '', 3500, NULL, '2015-11-03', 'admin', 1),
(6, '1510003', 'Paket Kids A', '', 1, NULL, '2015-11-05', 'admin', 1),
(23, '8999999272173', 'WALLS POPULAIRE STRAWB&VANILA', 'ICE CREAM', 3500, 'makanan', '2015-11-05', 'admin', 1),
(24, '8999908005106', 'VITAMIN B IPI 50TAB', '', 2000, 'obat', '2015-11-05', 'admin', 1),
(25, '8999908010209', 'MARINA H&B LOTION CREAM 100M', '', 4000, 'suplemen', '2015-11-05', 'admin', 1),
(26, '8999908034205', 'HEMAVITON ENERGI DRINK 150 ML', '', 2130, 'suplemen', '2015-11-05', 'admin', 1),
(27, '8999908034601', 'TOTALCARE JUNIOR ORANGE 50G', '', 3480, 'suplemen', '2015-11-05', 'admin', 1),
(28, '8999908042002', 'VIDORAN VISION RS JERUK 30TAB', '', 2578, 'suplemen', '2015-11-05', 'admin', 1),
(29, '8999908042804', 'MY BABY POWDER BIANG K 150G', '', 5660, 'obat', '2015-11-05', 'admin', 1),
(33, '8999908009807', 'MARINA MILK CLEANS 100M', '', 12, 'obat', '2015-11-06', 'admin', 1),
(34, '8999908029607', 'NATURAL HONEY HBL DRY 100ML', '', 12344, 'suplemen', '2015-11-06', 'admin', 1),
(35, '8999908030702', 'REVLON H&B EXTR DRY SKIN 350M', '', 13000, 'obat', '2015-11-06', 'admin', 1),
(36, '8999908037909', 'PRITHO OPTIMA', '', 12000, 'obat', '2015-11-06', 'admin', 1),
(37, '8999908039002', 'CONTREX OBAT FLU 4 TABLET', '', 4000, 'obat', '2015-11-06', 'admin', 1),
(38, '8999908048103', 'REVLON FLEX SHAM NOURISH 200M', '', 444, 'suplemen', '2015-11-06', 'admin', 1),
(39, '8999908052209', 'MARINA COLOGNE GEL LOVELY 50M', '', 45000, 'obat', '2015-11-06', 'admin', 1),
(40, '8999908057709', 'Splash', '', 3400, 'obat', '2015-11-06', 'admin', 1),
(41, '8999908057907', 'NEO HORMOVITON GRENG 10X4,2GR', '', 56000, 'suplemen', '2015-11-06', 'admin', 1),
(42, '8999908255907', 'TOTAL CARE LEMON ICE 250ML', '', 45600, 'suplemen', '2015-11-06', 'admin', 1),
(43, '1511002', 'Paket Baby D', '', 0, 'jasa', '2015-11-12', 'admin', 1),
(44, '6273627362', 'Contrexyn', 'Obat cacing', 12000, 'obat', '2015-11-12', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_transaksi`
--

CREATE TABLE IF NOT EXISTS `mst_transaksi` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) NOT NULL,
  `id_member` int(10) DEFAULT NULL,
  `id_produk` varchar(50) NOT NULL,
  `id_terapis` int(5) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `disc` float NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `mst_transaksi`
--

INSERT INTO `mst_transaksi` (`seq`, `id_transaksi`, `id_member`, `id_produk`, `id_terapis`, `tgl_transaksi`, `harga_beli`, `harga_jual`, `disc`, `user`) VALUES
(57, '455627f49c8780ba9f3ec5146640bb5459daaf6b', 2015001, '1510001', 1501, '2015-10-31 11:10:31', 0, 75000, 0, 'admin'),
(58, 'e8800839aec5669c7324e6af2198622df9e2ed87', 2015002, '1510001', 1505, '2015-10-31 11:10:23', 0, 75000, 0, 'admin'),
(59, 'eea9a29c4dd9a82d34d7afadbe9709cfa88a6073', 2015002, '1510001', 1505, '2015-10-31 11:10:37', 0, 75000, 0, 'admin'),
(60, '6825416d81ef4c4f374f6fcfa64e98b3c78e12ef', 2015002, '1510001', 1505, '2015-10-31 11:10:41', 0, 75000, 0, 'admin'),
(61, '41af1368803be63384a3b1f3cf2e87feb2d984c7', 2015002, '1510001', 1505, '2015-10-31 11:10:30', 0, 75000, 0, 'admin'),
(62, '2e89ac86a0c4780b09335934c8c9b98cf681d3ce', 2015002, '1510001', 1505, '2015-10-31 11:10:52', 0, 75000, 0, 'admin'),
(63, 'cc2e57c4e4cbe92925efe9635d90d77b72c321a9', 2015002, '1510001', 1505, '2015-10-31 11:10:34', 0, 75000, 0, 'admin'),
(64, '1a2bfc4cb69b1095c2761515cb2ad92ecb4ad464', 2015002, '1510001', 1505, '2015-10-31 11:10:32', 0, 75000, 0, 'admin'),
(65, '27c00848de300403a62b5b19da77e2184cd3973c', 2015002, '1510001', 1505, '2015-10-31 11:10:58', 0, 75000, 0, 'admin'),
(66, 'a0bb795d6cce378240dc23700eb3f7c38ae5db95', 2015002, '1510002', 0, '2015-10-31 11:10:21', 0, 90000, 0, 'admin'),
(67, 'a1ce99a88dc5465ff4df2de718416ec85c3d9e59', 2015002, '1510002', 0, '2015-10-31 11:10:42', 0, 90000, 0, 'admin'),
(68, 'd8a7f984d44adb31e5dddfe94801e3ce79791dd5', 2015002, '1510002', 0, '2015-10-31 11:10:26', 0, 90000, 0, 'admin'),
(69, '9c401df7178d7dbcfdda8c827770d25ae7a6a0ca', 2015002, '18998866500705', 0, '2015-10-31 12:10:43', 2500, 3000, 0, 'admin'),
(70, 'b542d1d4d3e12279f085c8b8c04b2f962468bec6', 2015012, '1510001', 1503, '2015-10-31 10:10:55', 0, 75000, 0, 'admin'),
(71, '0bf3c822a4fbf6fe9e888f9054d1f1d56b7c5092', 2015010, '1510001', 0, '2015-11-01 10:11:01', 0, 90000, 0, 'admin'),
(72, '0bf3c822a4fbf6fe9e888f9054d1f1d56b7c5092', 2015010, '1510002', 1501, '2015-11-01 10:11:01', 0, 98000, 0, 'admin'),
(73, '0bf3c822a4fbf6fe9e888f9054d1f1d56b7c5092', 2015010, '1510002', 1505, '2015-11-01 10:11:01', 0, 98000, 0, 'admin'),
(74, '0bf3c822a4fbf6fe9e888f9054d1f1d56b7c5092', 2015010, '1510002', 0, '2015-11-01 10:11:01', 0, 98000, 0, 'admin'),
(75, '4f3b1fb3fd2450d629160d715c25a48cd011a200', 2015011, '18998866500705', 0, '2015-11-01 10:11:15', 2500, 3000, 30, 'admin'),
(76, '9433614cd66369fcc113056a9bdaea76d5868412', 0, '18998866500705', 0, '2015-11-02 03:11:08', 2500, 3000, 0, 'admin'),
(77, 'c871b28372cbefa35c84f69eedd12c035cc20688', 2015010, '18998866500705', 0, '2015-11-02 04:11:46', 2500, 3000, 0, 'admin'),
(78, '0342270db8f46d717dd5485eefeeb69cab91df4e', 2015010, '18998866500705', 0, '2015-11-02 04:11:25', 2500, 3000, 0, 'admin'),
(79, '8b517a8b878a65728006515b296ac9d44e0d7367', 2015010, '18998866500705', 0, '2015-11-02 04:11:49', 2500, 3000, 0, 'admin'),
(80, '2a2bbc97318b87386788bd0ce55de2e23d232ded', 2015010, '18998866500705', 0, '2015-11-02 04:11:02', 2500, 3000, 0, 'admin'),
(81, '318aee036d6355e626d689fe5c7a23c4c28f51df', 2015010, '18998866500705', 0, '2015-11-02 04:11:44', 2500, 3000, 10, 'admin'),
(82, 'f0176fc6d68ec679eb48219f6939dafdec9bcbbe', 2015010, '18998866500705', 0, '2015-11-02 08:11:53', 2500, 3000, 0, 'admin'),
(83, '1860fe665355d4a844957cb1379895976b86eebd', 2015010, '1510001', 0, '2015-11-02 08:11:42', 0, 90000, 0, 'admin'),
(84, '2085a61db7a1841f6d8da77b8a97ee894e577452', 2015010, '1510001', 0, '2015-11-02 08:11:36', 0, 90000, 0, 'admin'),
(85, 'eb4552c3b4b423d99250fb646c2991170b4e0208', 2015010, '1510001', 0, '2015-11-02 08:11:16', 0, 90000, 0, 'admin'),
(86, '48508c74092897b87eb83c90675898e43db77409', 2015010, '1510001', 0, '2015-11-02 08:11:17', 0, 90000, 0, 'admin'),
(87, '2fa71f880e75e5a9f84748f5d491fdcd0d9f2221', 2015010, '1510001', 0, '2015-11-02 08:11:15', 0, 90000, 0, 'admin'),
(88, '4045c7277692ec2fcc7d71f128c97d2e9d6a7c3b', 2015010, '1510001', 0, '2015-11-02 08:11:05', 0, 90000, 0, 'admin'),
(89, '6862b8a3bffd2adb568693caa57efc27e04bc653', 2015010, '1510001', 0, '2015-11-02 08:11:29', 0, 90000, 0, 'admin'),
(90, '1afe9a4b22b735088ec8bcb0637cfdeb594a2a56', 2015010, '1510001', 0, '2015-11-02 08:11:19', 0, 90000, 0, 'admin'),
(91, '65574772c2cc159a9e27fb9635c9e4989b5c41dd', 2015010, '1510001', 1502, '2015-11-02 08:11:02', 0, 90000, 0, 'admin'),
(92, '65574772c2cc159a9e27fb9635c9e4989b5c41dd', 2015010, '1510001', 1503, '2015-11-02 08:11:02', 0, 90000, 0, 'admin'),
(93, '65574772c2cc159a9e27fb9635c9e4989b5c41dd', 2015010, '6291056068203', 0, '2015-11-02 08:11:02', 10000, 12000, 0, 'admin'),
(94, '65574772c2cc159a9e27fb9635c9e4989b5c41dd', 2015010, '18998866500705', 0, '2015-11-02 08:11:02', 2500, 3000, 0, 'admin'),
(95, '65574772c2cc159a9e27fb9635c9e4989b5c41dd', 2015010, '18998866500705', 0, '2015-11-02 08:11:02', 2500, 3000, 0, 'admin'),
(96, '65574772c2cc159a9e27fb9635c9e4989b5c41dd', 2015010, '1510002', 1505, '2015-11-02 08:11:02', 0, 98000, 0, 'admin'),
(97, 'f89e3ad29a1e242d50cf8529b8bac878cbae3d3f', 2015010, '1510001', 0, '2015-11-02 09:11:30', 0, 90000, 0, 'admin'),
(98, 'f89e3ad29a1e242d50cf8529b8bac878cbae3d3f', 2015010, '1510002', 0, '2015-11-02 09:11:30', 0, 98000, 0, 'admin'),
(99, '7ef0cc66e5a3e6ad4671df544f5922ecfb36267f', 2015010, '1510001', 0, '2015-11-02 09:11:52', 0, 90000, 25, 'admin'),
(100, '7ef0cc66e5a3e6ad4671df544f5922ecfb36267f', 2015010, '1510002', 0, '2015-11-02 09:11:52', 0, 98000, 0, 'admin'),
(101, '05408ad31ee5de23d9a3def384ca3fcca857bdd0', 2015010, '1510001', 1505, '2015-11-02 09:11:48', 0, 90000, 90, 'admin'),
(102, 'a84f36307f2ae64c9318b0ec0fa89800be3900ce', 2015010, '1510002', 0, '2015-11-02 09:11:29', 0, 98000, 30, 'admin'),
(103, 'edf8270087e7e2a1703f687131d29eafd05c7edb', 2015010, '1510001', 0, '2015-11-02 09:11:22', 0, 90000, 0, 'admin'),
(104, '0921f11e0fc9deb3e86d205de6583e66bdea3ba2', 2015017, '1510001', 1503, '2015-11-12 10:11:33', 0, 90000, 10, 'admin'),
(105, 'edcff278528308e4ee39da6350635393c9befe0c', 2015010, '1510002', 1503, '2015-11-12 08:11:34', 98000, 98000, 10, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga_beli`
--

CREATE TABLE IF NOT EXISTS `tbl_harga_beli` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(50) NOT NULL,
  `harga_beli` float DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbl_harga_beli`
--

INSERT INTO `tbl_harga_beli` (`seq`, `id_produk`, `harga_beli`, `tgl_input`, `user`, `aktif`) VALUES
(2, '1510001', 88500, '2015-10-28', 'admin', 1),
(3, '6291056068203', 10500, '2015-10-29', 'admin', 0),
(4, '18998866500705', 1500, '2015-10-29', 'admin', 1),
(5, '1510002', 98500, '2015-10-31', 'admin', 0),
(6, '1510002', 96500, '2015-10-31', 'admin', 1),
(10, '8999999272173', 4500, '2015-11-05', 'admin', 1),
(11, '8999908005106', 1500, '2015-11-05', 'admin', 1),
(12, '8999908010209', 4500, '2015-11-05', 'admin', 1),
(13, '8999908034205', 2500, '2015-11-05', 'admin', 1),
(14, '8999908034601', 3500, '2015-11-05', 'admin', 1),
(15, '8999908042002', 3060, '2015-11-05', 'admin', 1),
(16, '8999908042804', 6390, '2015-11-05', 'admin', 1),
(18, '8999908009807', -1487, '2015-11-06', 'admin', 0),
(19, '8999908029607', 13000, '2015-11-06', 'admin', 1),
(20, '8999908030702', 13500, '2015-11-06', 'admin', 1),
(21, '8999908037909', 13500, '2015-11-06', 'admin', 1),
(22, '8999908039002', 3500, '2015-11-06', 'admin', 0),
(23, '8999908048103', -1056, '2015-11-06', 'admin', 1),
(24, '8999908052209', 65500, '2015-11-06', 'admin', 1),
(25, '8999908057709', 3000, '2015-11-06', 'admin', 0),
(26, '8999908057907', 68500, '2015-11-06', 'admin', 1),
(27, '8999908255907', 66300, '2015-11-06', 'admin', 1),
(28, '6291056068203', -1500, '2015-11-07', 'admin', 0),
(29, '6291056068203', 205100, '2015-11-07', 'admin', 0),
(30, '6291056068203', 3000, '2015-11-07', 'admin', 0),
(31, '8999908009807', -1500, '2015-11-07', 'admin', 0),
(32, '8999908009807', 1940, '2015-11-07', 'admin', 1),
(33, '8999908039002', -1050, '2015-11-12', 'admin', 0),
(34, '8999908039002', 2000, '2015-11-12', 'admin', 1),
(35, '1511002', 76500, '2015-11-12', 'admin', 1),
(36, '8999908057709', 500, '2015-11-12', 'admin', 0),
(37, '8999908057709', 21500, '2015-11-12', 'admin', 0),
(38, '8999908057709', 800, '2015-11-12', 'admin', 0),
(39, '6273627362', 20000, '2015-11-12', 'admin', 1),
(40, '8999908057709', 2000, '2015-11-12', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga_jual`
--

CREATE TABLE IF NOT EXISTS `tbl_harga_jual` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(50) NOT NULL,
  `harga_jual` float DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_harga_jual`
--

INSERT INTO `tbl_harga_jual` (`seq`, `id_produk`, `harga_jual`, `tgl_input`, `user`, `aktif`) VALUES
(2, '1510001', 90000, '2015-10-28', 'admin', 1),
(3, '6291056068203', 12000, '2015-10-29', 'admin', 0),
(4, '18998866500705', 3000, '2015-10-29', 'admin', 1),
(5, '1510002', 100000, '2015-10-31', 'admin', 0),
(6, '1510002', 98000, '2015-10-31', 'admin', 1),
(10, '8999999272173', 6000, '2015-11-05', 'admin', 1),
(11, '8999908005106', 3000, '2015-11-05', 'admin', 1),
(12, '8999908010209', 6000, '2015-11-05', 'admin', 1),
(13, '8999908034205', 4000, '2015-11-05', 'admin', 1),
(14, '8999908034601', 5000, '2015-11-05', 'admin', 1),
(15, '8999908042002', 4560, '2015-11-05', 'admin', 1),
(16, '8999908042804', 7890, '2015-11-05', 'admin', 1),
(18, '8999908009807', 13, '2015-11-06', 'admin', 0),
(19, '8999908029607', 14500, '2015-11-06', 'admin', 1),
(20, '8999908030702', 15000, '2015-11-06', 'admin', 1),
(21, '8999908037909', 15000, '2015-11-06', 'admin', 1),
(22, '8999908039002', 5000, '2015-11-06', 'admin', 0),
(23, '8999908048103', 444, '2015-11-06', 'admin', 1),
(24, '8999908052209', 67000, '2015-11-06', 'admin', 1),
(25, '8999908057709', 4500, '2015-11-06', 'admin', 0),
(26, '8999908057907', 70000, '2015-11-06', 'admin', 1),
(27, '8999908255907', 67800, '2015-11-06', 'admin', 1),
(28, '6291056068203', 0, '2015-11-07', 'admin', 0),
(29, '6291056068203', 206600, '2015-11-07', 'admin', 0),
(30, '6291056068203', 4500, '2015-11-07', 'admin', 0),
(31, '8999908009807', 0, '2015-11-07', 'admin', 0),
(32, '8999908009807', 3440, '2015-11-07', 'admin', 1),
(33, '8999908039002', 450, '2015-11-12', 'admin', 0),
(34, '8999908039002', 3500, '2015-11-12', 'admin', 1),
(35, '1511002', 78000, '2015-11-12', 'admin', 1),
(36, '8999908057709', 2000, '2015-11-12', 'admin', 0),
(37, '8999908057709', 23000, '2015-11-12', 'admin', 0),
(38, '8999908057709', 2300, '2015-11-12', 'admin', 1),
(39, '6273627362', 30000, '2015-11-12', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE IF NOT EXISTS `tbl_jenis` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`seq`, `jenis`) VALUES
(1, 'jasa'),
(2, 'makanan'),
(3, 'minuman'),
(4, 'obat'),
(5, 'mainan'),
(6, 'suplemen'),
(7, 'pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `jenis_nik` varchar(3) DEFAULT NULL,
  `alamat` text,
  `hp` varchar(20) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`seq`, `id_member`, `nama`, `nik`, `jenis_nik`, `alamat`, `hp`, `tgl_daftar`, `user`, `aktif`) VALUES
(1, 2015001, 'Alce', '0', 'ktp', 'Jl. Moh. Yamin', '0', '2015-10-01', 'admin', 0),
(2, 2015002, 'Herlina', '0', '0', 'BTN Lagarutu', '0', '2015-10-19', 'admin', 1),
(11, 2015003, '111', '111', 'ktp', '111', '111', '2015-10-31', 'admin', 0),
(12, 2015004, 'qwety', 'eqwe', 'ktp', 'qwe', 'qwe', '2015-10-31', 'admin', 1),
(13, 2015005, 'qwe', 'qwe', 'ktp', 'eqw', 'eqwe', '2015-10-31', 'admin', 0),
(14, 2015006, 'weq', 'weqwe', 'ktp', 'qweq', 'qweqw', '2015-10-31', 'admin', 1),
(15, 2015007, 'qwe', 'qwe', 'ktp', 'ewqe', 'qweqwe', '2015-10-31', 'admin', 0),
(16, 2015008, 'Alce', 'fsf', 'ktp', 'fdss', 'dfdsf', '2015-10-31', 'admin', 1),
(17, 2015009, 'ewrewr', 'werwe', 'ktp', 'rwer', 'werwer', '2015-10-31', 'admin', 0),
(18, 2015010, 'wer435', '532', 'ktp', '2324', '2werewr', '2015-10-31', 'admin', 1),
(19, 2015011, 'erwer', '322342', 'ktp', '32werew', 'werwer', '2015-10-31', 'admin', 1),
(20, 2015012, 'AAaaaa', 'asd', 'ktp', 'das', 'dsd', '2015-10-31', 'admin', 0),
(21, 2015013, 'ARIF RACHMAT', '7271014051277001', 'ktp', 'JL. OTISTA 3 NO. 68A', 'AAA', '2015-11-01', 'admin', 1),
(22, 2015014, 'HERMAWAN SUSANTHO', '234', 'ktp', '3242', '234', '2015-11-01', 'admin', 1),
(23, 2015015, 'HARITS AZMI ZANKI ', '23424', 'ktp', '234', '24234', '2015-11-01', 'admin', 1),
(24, 2015016, 'AFRIZAL UMAR', '7271014051277001', 'ktp', 'JL. OTISTA 3 NO. 68A', '0778978978', '2015-11-01', 'admin', 1),
(25, 2015017, 'H YUSRA', '7271022909820010', 'ktp', 'asdas', 'dsada3231', '2015-11-01', 'admin', 1),
(26, 2015018, 'ARIF RACHMAT', '7271021512680001', 'ktp', 'asd', 'asd', '2015-11-01', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE IF NOT EXISTS `tbl_pengeluaran` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `harga` float NOT NULL,
  `tanggal` date NOT NULL,
  `user` varchar(50) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`seq`, `barang`, `keterangan`, `harga`, `tanggal`, `user`, `aktif`) VALUES
(1, 'Bayar listrik', 'Bulan Januari 2015', 740000, '2015-02-02', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE IF NOT EXISTS `tbl_stok` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(50) NOT NULL,
  `jumlah` float NOT NULL,
  `keterangan` text NOT NULL,
  `user` varchar(20) NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tbl_stok`
--

INSERT INTO `tbl_stok` (`seq`, `id_produk`, `jumlah`, `keterangan`, `user`, `tgl_input`) VALUES
(2, '8999908009807', 2, 'Stok awal', 'admin', '2015-11-06'),
(3, '8999908029607', 3, 'Stok awal', 'admin', '2015-11-06'),
(4, '8999908030702', 2, 'Stok awal', 'admin', '2015-11-06'),
(5, '8999908052209', 3, 'Stok awal', 'admin', '2015-11-06'),
(6, '8999908057709', 4, 'Stok awal', 'admin', '2015-11-06'),
(7, '8999908057907', 5, 'Stok awal', 'admin', '2015-11-06'),
(8, '8999908255907', 3, 'Stok awal', 'admin', '2015-11-06'),
(9, '8999908057907', 2, '', '', '0000-00-00'),
(10, '8999908037909', 10, 'Ubah stok', 'admin', '2015-11-07'),
(11, '8999908057709', 2, 'Ubah stok', 'admin', '2015-11-12'),
(12, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(13, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(14, '8999908057709', 0, 'Ubah stok', 'admin', '2015-11-12'),
(15, '8999908057709', 0, 'Ubah stok', 'admin', '2015-11-12'),
(16, '8999908057709', 0, 'Ubah stok', 'admin', '2015-11-12'),
(17, '8999908057709', 0, 'Ubah stok', 'admin', '2015-11-12'),
(18, '8999908057709', 0, 'Ubah stok', 'admin', '2015-11-12'),
(19, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(20, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(21, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(22, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(23, '8999908057709', -1, 'Ubah stok', 'admin', '2015-11-12'),
(24, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(25, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(26, '8999908057709', 2, 'Ubah stok', 'admin', '2015-11-12'),
(27, '8999908057709', -4, 'Ubah stok', 'admin', '2015-11-12'),
(28, '8999908057709', -3, 'Ubah stok', 'admin', '2015-11-12'),
(29, '8999908057709', 12, 'Ubah stok', 'admin', '2015-11-12'),
(30, '8999908057709', 12, 'Ubah stok', 'admin', '2015-11-12'),
(31, '8999908057709', -10, 'Ubah stok', 'admin', '2015-11-12'),
(32, '8999908057709', -10, 'Ubah stok', 'admin', '2015-11-12'),
(33, '8999908057709', -10, 'Ubah stok', 'admin', '2015-11-12'),
(34, '8999908057709', 2, 'Ubah stok', 'admin', '2015-11-12'),
(35, '8999908057709', 2, 'Ubah stok', 'admin', '2015-11-12'),
(36, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(37, '8999908057709', 2, 'Ubah stok', 'admin', '2015-11-12'),
(38, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(39, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(40, '8999908057709', -2, 'Ubah stok', 'admin', '2015-11-12'),
(41, '8999908057709', 3, 'Ubah stok', 'admin', '2015-11-12'),
(42, '8999908057709', -10, 'Ubah stok', 'admin', '2015-11-12'),
(43, '8999908057709', 2, 'Ubah stok', 'admin', '2015-11-12'),
(44, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(45, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(46, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(47, '8999908037909', 1, 'Ubah stok', 'admin', '2015-11-12'),
(48, '8999908057709', 1, 'Ubah stok', 'admin', '2015-11-12'),
(49, '8999908057709', 12, 'Ubah stok', 'admin', '2015-11-12'),
(50, '8999908057709', -4, 'Ubah stok', 'admin', '2015-11-12'),
(51, '8999908039002', 0, 'Ubah stok', 'admin', '2015-11-12'),
(52, '18998866500705', 0, 'Ubah stok', 'admin', '2015-11-12'),
(53, '8999908034205', 1, 'Ubah stok', 'admin', '2015-11-12'),
(54, '8999908039002', 1, 'Ubah stok', 'admin', '2015-11-12'),
(55, '8999908039002', 12, 'Ubah stok', 'admin', '2015-11-12'),
(56, '8999908039002', -1, 'Ubah stok', 'admin', '2015-11-12'),
(57, '8999908039002', 10, 'Ubah stok', 'admin', '2015-11-12'),
(58, '18998866500705', 3, 'Ubah stok', 'admin', '2015-11-12'),
(59, '1511002', 1, 'Stok awal', 'admin', '2015-11-12'),
(60, '6273627362', 2, 'Stok awal', 'admin', '2015-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terapis`
--

CREATE TABLE IF NOT EXISTS `tbl_terapis` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_terapis` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `user` varchar(50) NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_terapis`
--

INSERT INTO `tbl_terapis` (`seq`, `id_terapis`, `nama`, `alamat`, `hp`, `tgl_daftar`, `user`, `aktif`) VALUES
(1, 1501, 'Elin', '', '', '2015-10-29', 'admin', 1),
(2, 1502, 'Uny', '', '', '2015-10-29', 'admin', 1),
(3, 1503, 'Lilik', '', '', '2015-10-29', 'admin', 1),
(4, 1504, 'Helin', '', '', '2015-10-29', 'admin', 1),
(5, 1505, 'Uci', '', '', '2015-10-29', 'admin', 1),
(6, 0, '0', '0', '0', '0000-00-00', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) NOT NULL,
  `bayar` varchar(11) NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`seq`, `id_transaksi`, `bayar`) VALUES
(1, '123', '123'),
(2, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `userid`, `password`, `nama`, `level`, `aktif`) VALUES
(1, 'admin', 'admin', 'Arif rachmat', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_kasir`
--

CREATE TABLE IF NOT EXISTS `tmp_kasir` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(50) NOT NULL,
  `disc` float NOT NULL,
  `terapis` int(5) NOT NULL,
  `user` varchar(20) NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

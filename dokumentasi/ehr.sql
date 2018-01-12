-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2018 at 08:06 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ehr`
--

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE IF NOT EXISTS `asuransi` (
  `id_asuransi` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_asuransi` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id_asuransi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `asuransi`
--

INSERT INTO `asuransi` (`id_asuransi`, `jenis_asuransi`) VALUES
(1, 'BPJS'),
(2, 'Lippo'),
(3, 'Prudential'),
(4, 'AIA'),
(5, 'Alianz');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_obat`
--

CREATE TABLE IF NOT EXISTS `daftar_obat` (
  `id_daftar_obat` int(10) NOT NULL AUTO_INCREMENT,
  `id_obat` int(10) NOT NULL,
  `id_rekam_medis` int(10) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  PRIMARY KEY (`id_daftar_obat`),
  KEY `fk_dfObat_obat` (`id_obat`),
  KEY `fk_dfObat_rekmed` (`id_rekam_medis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `daftar_obat`
--

INSERT INTO `daftar_obat` (`id_daftar_obat`, `id_obat`, `id_rekam_medis`, `jumlah`) VALUES
(1, 1, 3, '3 x sehari'),
(2, 2, 3, '2 x sehari'),
(3, 1, 3, '1 kantong'),
(4, 1, 4, '3 butir'),
(5, 1, 2, '2 butir');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL DEFAULT '0',
  `nama_dokter` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `id_rs_poli` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0 = closed, 1 = active',
  PRIMARY KEY (`id_dokter`),
  KEY `fk_dokter_poli` (`id_rs_poli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_user`, `nama_dokter`, `alamat`, `no_telp`, `id_rs_poli`, `status`) VALUES
(25, 31, 'Dokter Cantik Jelita', 'Di perumahan cantik membahana', '123-0369852', 22, 1),
(24, 30, 'dr. Arifin Muh', 'Bogor raya deket depok', '021-258963', 24, 1),
(23, 29, 'dr. Robi naldi', 'Pangkalan Riau', '081268459852', 6, 0),
(22, 28, 'Ary Games', 'Belakang PP', '027-698532', 20, 1),
(21, 26, 'dr. Arta Arif', 'Bogor kota', '081268295554', 3, 0),
(20, 24, 'Dr. Randi Maizul Syaputra', 'Bogor baru taman', '081268295554', 22, 1),
(26, 32, 'dr. Alwahab', 'Padjajaran raya madang sindang barang', '021-123546', 25, 0),
(31, 75, 'dr. Ismail Adima', 'Belakang terminal baranang siang', '08126985321', 28, 1),
(29, 71, 'dr. Arif Rahman Yuri', 'Padang Baru Lubuk Basung', '021-963258', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(10) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(150) NOT NULL,
  `ukuran_obat` varchar(150) NOT NULL,
  `harga_obat` int(10) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `ukuran_obat`, `harga_obat`) VALUES
(1, 'Paracetamol', 'generic', '500gr', 1000),
(2, 'Panadol', 'generic', '100gr', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(10) NOT NULL AUTO_INCREMENT,
  `id_asuransi` int(10) DEFAULT NULL,
  `nama_pasien` varchar(250) NOT NULL,
  `alamat` text,
  `no_asuransi` varchar(25) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `nama_orangtua` varchar(50) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `fk_asuransi` (`id_asuransi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_asuransi`, `nama_pasien`, `alamat`, `no_asuransi`, `tanggal_lahir`, `no_telepon`, `agama`, `nama_orangtua`, `golongan_darah`, `id_user`) VALUES
(1, 1, 'nskdkrk', 'ndkdkfk', '946533464', '0000-00-00', '08156706780', 'ndkdkdk', 'cndkdkk', 'jskdk', 0),
(2, 1, 'mail', 'bogor', '649812749', '2017-12-07', '0123456789', 'islam', 'papang', 'A', 4),
(12, 3, 'lathif ritya', 'jdkdk', '846864646', '2017-12-13', '081286881194', 'jsjsmfb', 'nxjGGya', 'B', 5),
(14, 5, 'namaku', 'alamatnya', '54689634', '2017-11-11', '1234567890', 'agamaku', 'ortuku', 'A', 7),
(40, 0, 'Fikri Hasdi', 'Tanggerang city, Jlan Lancar jaya sekali', '-', '1995-06-05', '08193654782', 'Islam', 'Muh. Salahudin', 'B', 65),
(39, 3, 'Marisa', 'Depok City', '2589630147', '1990-06-29', '081993860228', 'Islam', 'Mama Marisa', 'O', 64),
(38, 2, 'Pariban', 'Padang', '258741369', '1995-05-23', '23698547', 'Islam', 'Menhum', 'B', 63),
(37, 2, 'Media Parosa', 'Padang', '963258123', '1992-05-22', '0821369854', 'Islam', 'Iblan Parosa', 'A', 62),
(36, 4, 'Setya2', 'Padang baru', '123698547', '1950-07-24', '021-963258', 'Hindu', 'Novanto2', 'AB', 61),
(41, 2, 'Anggi Pratama', 'Jalan Andara NO.14, Jakarta Selatan, deket Depok, Indonesia Raya', '123963258741', '2003-09-06', '021-7898456', 'Protestan', 'Mutia Hasyim', 'B', 66),
(42, 3, 'Kang Acuy', 'Bandung Jawa Barat 12396', '93258741', '1995-08-26', '021-963258', 'Islam', 'Mamang Burhan', 'A', 69),
(43, 3, 'Arta Ndut Sekali', 'Jalan Simatupang kebon sirih sebelah kebuon nanas', '123456963', '1993-02-14', '0812693582', 'Konghucu', 'Mandau Ndut', 'AB', 70),
(44, 5, 'Nurlita', 'Bogor Baru Taman', '741369852', '2009-06-05', '021-7898456', 'Budha', 'Ekatami', 'AB', 73),
(45, 4, 'Sukirman Setya Ningsi', 'Bogor baru taman, jalan cimanuk blok B1 Tegalega', '789654123', '1952-08-05', '081269538614', 'Islam', 'Nigsih perhatian', 'AB', 74);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(10) NOT NULL AUTO_INCREMENT,
  `id_rs` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nrp` varchar(30) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_rs`, `id_user`, `nrp`, `nama_pegawai`, `alamat`, `no_telepon`, `tgl_masuk`) VALUES
(1, 1, 8, '0123456789', 'Randi Maizul Syaputra', 'Bogor Baru Taman', '01234567890', '2017-12-18 00:00:00'),
(2, 2, 27, '123456', 'Randi ujank', 'Kota Bogor', '081268295554', '2017-12-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE IF NOT EXISTS `penanganan` (
  `id_penanganan` int(10) NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int(10) NOT NULL,
  `jenis_penanganan` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_penanganan`),
  KEY `fk_penanganan_rekmed` (`id_rekam_medis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`id_penanganan`, `id_rekam_medis`, `jenis_penanganan`, `keterangan`) VALUES
(1, 3, 'Lab Radiologi', 'Ronsen data '),
(2, 3, 'THT', 'Priksa tenggorokan\r\n'),
(3, 4, 'Ronsesn', 'tulang'),
(4, 2, 'OK', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `id_rs_poli` int(10) NOT NULL,
  `tanggal_pendaftaran` datetime NOT NULL,
  `nomor_pendaftaran` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = belum approve admin(booking), 1 = approve admin (active), 2=selesai berobat(close), 3= ignore',
  PRIMARY KEY (`id_pendaftaran`),
  KEY `fk_daftar_pasien` (`id_pasien`),
  KEY `fk_daftar_pegawai` (`id_dokter`),
  KEY `fk_daftar_rsPoli` (`id_rs_poli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_pasien`, `id_dokter`, `id_rs_poli`, `tanggal_pendaftaran`, `nomor_pendaftaran`, `status`) VALUES
(1, 1, 1, 1, '2018-01-01 00:00:00', '1', 0),
(2, 14, 4, 6, '2018-01-01 00:00:00', '2', 0),
(3, 14, 4, 6, '2018-01-01 00:00:00', '3', 0),
(4, 14, 4, 6, '2018-01-01 00:00:00', '4', 0),
(5, 14, 4, 6, '2018-01-01 00:00:00', '5', 0),
(6, 14, 4, 6, '2018-01-01 00:00:00', '6', 0),
(7, 14, 4, 6, '2018-01-01 00:00:00', '7', 0),
(8, 14, 4, 6, '2018-01-01 00:00:00', '1', 0),
(9, 14, 4, 6, '2018-01-01 00:00:00', '9', 0),
(10, 14, 4, 6, '2018-01-01 00:00:00', '10', 0),
(11, 14, 4, 6, '2018-01-01 00:00:00', '11', 0),
(12, 14, 4, 6, '2018-01-01 00:00:00', '12', 0),
(13, 14, 4, 6, '2018-01-01 00:00:00', '13', 0),
(14, 14, 4, 6, '2018-01-01 00:00:00', '14', 0),
(15, 14, 4, 6, '2018-01-01 00:00:00', '15', 0),
(16, 14, 4, 6, '2018-01-01 00:00:00', '16', 0),
(17, 14, 4, 6, '2018-01-01 00:00:00', '17', 0),
(18, 14, 4, 6, '2018-01-01 03:00:00', '18', 0),
(30, 37, 22, 20, '2018-01-01 16:42:13', '2', 1),
(32, 39, 25, 22, '2018-01-02 05:16:12', '1', 1),
(31, 38, 25, 22, '2018-01-01 16:45:21', '3', 1),
(29, 36, 25, 22, '2018-01-01 16:31:04', '2', 2),
(33, 40, 22, 20, '2018-01-02 06:52:49', '2', 1),
(34, 41, 24, 24, '2018-01-02 06:56:38', '3', 1),
(35, 42, 25, 22, '2018-01-03 01:15:52', '1', 1),
(36, 41, 22, 20, '2018-01-03 01:50:29', '2', 1),
(37, 39, 20, 24, '2018-01-03 01:50:49', '3', 0),
(38, 43, 21, 3, '2018-01-03 01:52:12', '4', 3),
(39, 44, 24, 22, '2018-01-03 03:05:27', '5', 1),
(40, 43, 20, 22, '2018-01-03 04:01:54', '6', 2),
(41, 41, 20, 22, '2018-01-03 04:02:33', '7', 1),
(42, 39, 25, 22, '2018-01-04 02:30:37', '1', 3),
(43, 42, 22, 20, '2018-01-04 08:02:27', '2', 1),
(44, 45, 20, 22, '2018-01-04 09:12:53', '3', 2),
(45, 43, 20, 22, '2018-01-04 09:59:53', '4', 1),
(46, 40, 31, 28, '2018-01-04 10:15:05', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
  `id_poli` int(10) NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_poli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `keterangan`) VALUES
(1, 'Poliklinik Umum', 'Melayani pengobatan umum'),
(2, 'Poliklinik Gigi', 'Melayani pengobatan gigi'),
(3, 'Poliklinik Jantung', 'Melayani pengobatan jantung'),
(4, 'Poliklinik Anak', 'Melayani pengobatan anak'),
(5, 'Poliklinik THT', 'Melayani pengobatan telinga, hidung, tenggorokan'),
(6, 'Poliklinik Kulit dan Kelamin', 'Melayani pengobatan kulit dan kelamin'),
(7, 'Poliklinik Mata', 'Melayani pengobatan mata'),
(8, 'Poliklinik Penyakit Dalam', 'Melayani pengobatan penyakit dalam');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `id_rekam_medis` int(10) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) NOT NULL,
  `id_pendaftaran` int(10) NOT NULL,
  `keluhan_utama` text NOT NULL,
  `riwayat_alergi` text NOT NULL,
  `tanda_vital` text NOT NULL,
  `tgl_periksa` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rekam_medis`),
  KEY `fk_rekmed_pasien` (`id_pasien`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam_medis`, `id_pasien`, `id_pendaftaran`, `keluhan_utama`, `riwayat_alergi`, `tanda_vital`, `tgl_periksa`) VALUES
(1, 1, 0, 'sakit punggung', 'tidak ada', 'jantung normal, tensi 80/120', '2017-12-18 00:00:00'),
(2, 41, 41, 'OK', 'OK', 'OK', '2018-01-03 06:59:52'),
(3, 43, 40, 'Demam dan flu berat sangat', 'Alergi dengan panadol dan alkohol', 'Bintik-bintik merah pada leher dan tangan', '2018-01-03 07:48:46'),
(4, 45, 44, 'Oke', 'Mantap', 'iyah', '2018-01-04 09:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `rs_poli`
--

CREATE TABLE IF NOT EXISTS `rs_poli` (
  `id_rs_poli` int(10) NOT NULL AUTO_INCREMENT,
  `id_rs` int(10) NOT NULL,
  `id_poli` int(10) NOT NULL,
  PRIMARY KEY (`id_rs_poli`),
  KEY `fk_rsPoli_rs` (`id_rs`),
  KEY `fk_rsPoli_poli` (`id_poli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `rs_poli`
--

INSERT INTO `rs_poli` (`id_rs_poli`, `id_rs`, `id_poli`) VALUES
(25, 2, 6),
(22, 1, 6),
(3, 1, 4),
(21, 1, 2),
(26, 1, 8),
(6, 2, 3),
(7, 2, 5),
(20, 1, 1),
(24, 1, 3),
(10, 2, 8),
(28, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE IF NOT EXISTS `rumah_sakit` (
  `id_rs` int(10) NOT NULL AUTO_INCREMENT,
  `nama_rs` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `akreditasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rs`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rs`, `nama_rs`, `alamat`, `akreditasi`) VALUES
(1, 'RSUD Kota Bogor', 'Jalan Doktor Semeru No. 120, Bogor Barat', 'A'),
(2, 'RS PMI Bogor', 'Jalan Pajajaran No. 80 Bogor, Jawa Barat', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL COMMENT '0 = superadmin,1 = pegawai, 2 = dokter, 3 = pasien',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `status`) VALUES
(4, 'ismailadima@gmail.com', 'b3c55a02882e9050dcd4a6739d4a288c', '2'),
(5, 'lathifrdp@gmail.com', 'qwerty', '2'),
(6, 'lathif', '12345678', '2'),
(7, 'a@a.com', 'qwerty', '2'),
(8, 'rmaizul@gmail.com', 'd4846ea27f47bed317cab33af8e1c20b', '1'),
(17, 'randiujank@gmail.com', 'af071299903e42118aa78d2b99555019', '2'),
(29, 'robi@gmail.com', '202cb962ac59075b964b07152d234b70', '2'),
(26, 'arta@gmail.com', '536f868c09cfbc81399401da424e42e6', '2'),
(27, 'rm@gmail.com', 'd4846ea27f47bed317cab33af8e1c20b', '1'),
(28, 'ary@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(24, 'randimaizul@gmail.com', 'd4846ea27f47bed317cab33af8e1c20b', '2'),
(30, 'arifin@gmail.com', '202cb962ac59075b964b07152d234b70', '2'),
(31, 'darma@gmail.com', '202cb962ac59075b964b07152d234b70', '2'),
(32, 'dr@gmail.com', '202cb962ac59075b964b07152d234b70', '2'),
(68, '', 'd41d8cd98f00b204e9800998ecf8427e', '2'),
(69, 'acuy@gmail.com', '202cb962ac59075b964b07152d234b70', '3'),
(67, '', 'd41d8cd98f00b204e9800998ecf8427e', '2'),
(66, 'anggi@gmail.com', '202cb962ac59075b964b07152d234b70', '3'),
(61, 'setya2@gmail.com', '7815696ecbf1c96e6894b779456d330e', '3'),
(62, 'media@gmail.com', '202cb962ac59075b964b07152d234b70', '3'),
(63, 'pariban@gmail.com', 'a868d710aa4ef67a68807ce4fe8bd0da', '3'),
(64, 'marisa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3'),
(65, 'fikri@gmail.com', '202cb962ac59075b964b07152d234b70', '3'),
(70, 'ndut@gmail.com', '202cb962ac59075b964b07152d234b70', '3'),
(71, 'arif@gmail.com', '202cb962ac59075b964b07152d234b70', '2'),
(73, 'nurlita@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', '3'),
(74, 'sukirman@gmail.com', '202cb962ac59075b964b07152d234b70', '3'),
(75, 'ismail@gmail.com', '202cb962ac59075b964b07152d234b70', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

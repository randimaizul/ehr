-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2017 pada 08.35
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asuransi`
--

CREATE TABLE `asuransi` (
  `id_asuransi` int(10) NOT NULL,
  `jenis_asuransi` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_obat`
--

CREATE TABLE `daftar_obat` (
  `id_daftar_obat` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `id_rekam_medis` int(10) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat`, `no_telp`) VALUES
(1, 'Dr. Lathif', 'Depok', '08123456789'),
(2, 'Dr. Ritya', 'Bogor', '08136879131'),
(3, 'Dr. Dwi Putra', 'Depok', '08567281617'),
(4, 'Dr. Randi', 'Jakarta', '08163816817'),
(5, 'Dr. Maizul', 'Jakarta', '08163816811');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(150) NOT NULL,
  `ukuran_obat` varchar(150) NOT NULL,
  `harga_obat` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) NOT NULL,
  `id_asuransi` int(10) DEFAULT NULL,
  `nama_pasien` varchar(250) NOT NULL,
  `alamat` text,
  `no_asuransi` varchar(25) DEFAULT NULL,
  `umur` varchar(10) DEFAULT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `nama_orangtua` varchar(50) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_asuransi`, `nama_pasien`, `alamat`, `no_asuransi`, `umur`, `no_telepon`, `agama`, `nama_orangtua`, `golongan_darah`, `id_user`) VALUES
(1, NULL, 'Ismail Adima', 'Bogor Baru', NULL, '23', '08156706780', 'islam', 'Heru Wiajayanto', 'AB', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nrp` varchar(30) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanganan`
--

CREATE TABLE `penanganan` (
  `id_penanganan` int(10) NOT NULL,
  `id_rekam_medis` int(10) NOT NULL,
  `jenis_penanganan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `id_rs_poli` int(10) NOT NULL,
  `tanggal_pendaftaran` datetime NOT NULL,
  `nomor_pendaftaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(10) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `id_dokter` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `keterangan`, `id_dokter`) VALUES
(1, 'Poliklinik Umum', 'Melayani pengobatan umum', NULL),
(2, 'Poliklinik Gigi', 'Melayani pengobatan gigi', NULL),
(3, 'Poliklinik Jantung', 'Melayani pengobatan jantung', NULL),
(4, 'Poliklinik Anak', 'Melayani pengobatan anak', NULL),
(5, 'Poliklinik THT', 'Melayani pengobatan telinga, hidung, tenggorokan', NULL),
(6, 'Poliklinik Kulit dan Kelamin', 'Melayani pengobatan kulit dan kelamin', NULL),
(7, 'Poliklinik Mata', 'Melayani pengobatan mata', NULL),
(8, 'Poliklinik Penyakit Dalam', 'Melayani pengobatan penyakit dalam', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `keluhan_utama` text NOT NULL,
  `riwayat_alergi` text NOT NULL,
  `tanda_vital` text NOT NULL,
  `tgl_periksa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_poli`
--

CREATE TABLE `rs_poli` (
  `id_rs_poli` int(10) NOT NULL,
  `id_rs` int(10) NOT NULL,
  `id_poli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rs_poli`
--

INSERT INTO `rs_poli` (`id_rs_poli`, `id_rs`, `id_poli`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 1, 7),
(5, 2, 1),
(6, 2, 3),
(7, 2, 5),
(8, 1, 6),
(9, 1, 8),
(10, 2, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rs` int(10) NOT NULL,
  `nama_rs` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `akreditasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rs`, `nama_rs`, `alamat`, `akreditasi`) VALUES
(1, 'RSUD Kota Bogor', 'Jalan Doktor Semeru No. 120, Bogor Barat', 'A'),
(2, 'RS PMI Bogor', 'Jalan Pajajaran No. 80 Bogor, Jawa Barat', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0 = superadmin,1 = admin, 2 = pasien'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `status`) VALUES
(4, 'ismailadima@gmail.com', 'b3c55a02882e9050dcd4a6739d4a288c', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`id_asuransi`);

--
-- Indexes for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  ADD PRIMARY KEY (`id_daftar_obat`),
  ADD KEY `fk_dfObat_obat` (`id_obat`),
  ADD KEY `fk_dfObat_rekmed` (`id_rekam_medis`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `fk_asuransi` (`id_asuransi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id_penanganan`),
  ADD KEY `fk_penanganan_rekmed` (`id_rekam_medis`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `fk_daftar_pasien` (`id_pasien`),
  ADD KEY `fk_daftar_pegawai` (`id_pegawai`),
  ADD KEY `fk_daftar_rsPoli` (`id_rs_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`),
  ADD KEY `fk_poli_dokter` (`id_dokter`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`),
  ADD KEY `fk_rekmed_pasien` (`id_pasien`);

--
-- Indexes for table `rs_poli`
--
ALTER TABLE `rs_poli`
  ADD PRIMARY KEY (`id_rs_poli`),
  ADD KEY `fk_rsPoli_rs` (`id_rs`),
  ADD KEY `fk_rsPoli_poli` (`id_poli`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `id_asuransi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  MODIFY `id_daftar_obat` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id_penanganan` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rekam_medis` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rs_poli`
--
ALTER TABLE `rs_poli`
  MODIFY `id_rs_poli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_obat`
--
ALTER TABLE `daftar_obat`
  ADD CONSTRAINT `fk_dfObat_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dfObat_rekmed` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekam_medis` (`id_rekam_medis`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_asuransi` FOREIGN KEY (`id_asuransi`) REFERENCES `asuransi` (`id_asuransi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD CONSTRAINT `fk_penanganan_rekmed` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekam_medis` (`id_rekam_medis`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_daftar_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_daftar_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_daftar_rsPoli` FOREIGN KEY (`id_rs_poli`) REFERENCES `rs_poli` (`id_rs_poli`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD CONSTRAINT `fk_poli_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `fk_rekmed_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rs_poli`
--
ALTER TABLE `rs_poli`
  ADD CONSTRAINT `fk_rsPoli_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rsPoli_rs` FOREIGN KEY (`id_rs`) REFERENCES `rumah_sakit` (`id_rs`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

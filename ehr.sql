-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Nov 2017 pada 21.43
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
  `no_telp` varchar(20) NOT NULL,
  `id_rs_poli` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat`, `no_telp`, `id_rs_poli`) VALUES
(1, 'Dr. Lathif', 'Depok', '08123456789', 1),
(2, 'Dr. Ritya', 'Bogor', '08136879131', 2),
(3, 'Dr. Dwi Putra', 'Depok', '08567281617', 2),
(4, 'Dr. Randi', 'Jakarta', '08163816817', 3),
(5, 'Dr. Maizul', 'Jakarta', '08163816811', 4);

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
  `nama_pasien` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_asuransi` varchar(50) DEFAULT NULL,
  `no_asuransi` varchar(25) DEFAULT NULL,
  `umur` varchar(10) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_orangtua` varchar(50) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `jenis_asuransi`, `no_asuransi`, `umur`, `no_telepon`, `agama`, `nama_orangtua`, `golongan_darah`, `id_user`) VALUES
(1, 'Ismail Adima', 'Bogor Baru', NULL, NULL, '23', '08156706780', 'islam', 'Heru Wiajayanto', 'AB', 'cdb4a967ba33c3a9fe2bbe674aafc3e2'),
(2, 'Ismail Adima', 'Bogor Baru', NULL, NULL, '', '08156706780', '', '', '', NULL),
(3, 'Ismail Adima', 'Bogor Baru', NULL, NULL, '', '08156706780', '', '', '', '4');

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
  `id_dokter` int(10) NOT NULL,
  `id_rs` int(10) NOT NULL,
  `id_poli` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
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
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
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
  `id` int(10) NOT NULL,
  `id_rs` int(10) NOT NULL,
  `id_poli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rs_poli`
--

INSERT INTO `rs_poli` (`id`, `id_rs`, `id_poli`) VALUES
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
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0 = superadmin,1 = admin, 2 = pasien',
  `api_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `api_key`) VALUES
(1, 'ismailadima@gmail.co', 'b3c55a02882e9050dcd4a6739d4a288c', '2', '54d0c08b686e6f6fd6ee0a0f2b32e43b'),
(2, 'ismailadima@gmail.co', 'b3c55a02882e9050dcd4a6739d4a288c', '2', '4427cbd468b6dd4f625e7143743d1592'),
(3, 'ismailadima@gmail.co', 'b3c55a02882e9050dcd4a6739d4a288c', '2', 'f27d755ded4b272480d99c9d5cb9133e'),
(4, 'ismailadima@gmail.co', 'b3c55a02882e9050dcd4a6739d4a288c', '2', '39718861486ae5e6706a04767605872b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_obat`
--
ALTER TABLE `daftar_obat`
  ADD PRIMARY KEY (`id_daftar_obat`);

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
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id_penanganan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`);

--
-- Indexes for table `rs_poli`
--
ALTER TABLE `rs_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

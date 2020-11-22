-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 05:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arc_indo`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_paket`
--

CREATE TABLE `daftar_paket` (
  `id_paket` int(11) NOT NULL,
  `jenis_paket` varchar(50) NOT NULL,
  `harga` int(25) NOT NULL,
  `keterangan` longtext NOT NULL,
  `gambar` longblob NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_paket`
--

INSERT INTO `daftar_paket` (`id_paket`, `jenis_paket`, `harga`, `keterangan`, `gambar`, `tipe`) VALUES
(1, 'Paket Standard', 2000, '1. Kertas Isi : AP 150 gr / MP 150 gr\r\n2. Jumlah Halaman : 120\r\n3. Warna Cetak : Full Color CMYK (4/4)\r\n4. Jenis Cover : Hard Cover\r\n5. Kertas Cover : Ivory 230 gr\r\n6. Laminasi Paper : Doff / Glosy\r\n7. Board Cover : Karton 30\r\n8. Jilid : Jahit & Lem Panas\r\n9. Hot Print : No\r\n\r\nSelengkapnya lihat di proposal ', 0x494d475f32303230303731365f3034353332302e6a7067, 'image/jpeg'),
(2, 'Paket Deluxe', 2500, '1. Kertas Isi : Ivory 190 gr\r\n2. Jumlah Halaman : 120\r\n3. Warna Cetak : Full Color CMYK (4/4)\r\n4. Jenis Cover : Hard Cover\r\n5. Kertas Cover : Ivory 230 gr\r\n6. Laminasi Paper : Doff / Glosy\r\n7. Board Cover : Karton 30\r\n8. Jilid : Jahit & Lem Panas\r\n9. Hot Print : No\r\n\r\nSelengkapnya lihat di proposal   ', 0x494d475f32303230303731365f3034353233322e6a7067, 'image/jpeg'),
(3, 'Paket Premium', 3300, '1. Kertas Isi : Ivory 190 gr\r\n2. Jumlah Halaman : 120\r\n3. Warna Cetak : Full Color CMYK (4/4)\r\n4. Jenis Cover : Hard Cover\r\n5. Kertas Cover : Import Paper\r\n6. Laminasi Paper : Doff / Glosy\r\n7. Board Cover : MDF Board\r\n8. Jilid : Jahit & Lem Panas\r\n9. Hot Print : Yes\r\n\r\nSelengkapnya lihat di proposal  ', 0x494d475f32303230303731365f3034353031332e6a7067, 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sekolah`
--

CREATE TABLE `daftar_sekolah` (
  `id` int(11) NOT NULL,
  `kode_sekolah` varchar(10) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `email_sekolah` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_sekolah`
--

INSERT INTO `daftar_sekolah` (`id`, `kode_sekolah`, `nama_sekolah`, `email_sekolah`, `telepon`, `alamat`) VALUES
(1, 'YK001', 'SMA N 1 Yogyakarta', 'humas@sman1yogya.sch.id', '0274513454', 'Jl. HOS Cokroaminoto No.10, Pakuncen, Wirobrajan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55253'),
(2, 'YK002', 'SMA N 2 Yogyakarta', ' sman2yk@gmail.com ', '0274563647', 'Jalan Bener, Tegalrejo, Yogyakarta 55243'),
(5, 'YK003', ' SMA N 3 Yogyakarta ', 'info@sman3-yog.sch.id', '0274512856', 'Jl. Yos Sudarso, No. 7, Kotabaru, Yogyakarta, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224'),
(6, 'YK004', 'SMA N 4 Yogyakarta', 'sman4yogya@gmail.com', '0274513245', 'Jln. Magelang, Karangwaru Lor, Kecamatan Tegalrejo, Yogyakarta, Yogyakarta 55241, DI Yogyakarta, Indonesia'),
(7, 'YK005', ' SMA N 5 Yogyakarta ', 'info@sman5yk.sch.id', '0274377400 ', 'Jl. Nyi Pembayun No.39, Prenggan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55172'),
(12, 'WNG001', 'SMA N 1 Wonogiri', 'sman1wng@yahoo.com', '0273321512', 'Jl.Perwakilan No.24 Giripurwo â€“ Wonogiri'),
(13, 'WNG002', 'SMA N 2 Wonogiri', 'sman2_giri@yahoo.com', '0273321385', 'Jln. Nakula V Wonokarto, Wonogiri 57612');

-- --------------------------------------------------------

--
-- Table structure for table `kirim_mou`
--

CREATE TABLE `kirim_mou` (
  `id` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_thn` int(11) NOT NULL,
  `no_mou` varchar(100) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `nama_tujuan` varchar(255) NOT NULL,
  `email_tujuan` varchar(50) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `file_mou` varchar(150) NOT NULL,
  `tipe` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kirim_proposal`
--

CREATE TABLE `kirim_proposal` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_thn` int(11) NOT NULL,
  `email_tujuan` varchar(255) NOT NULL,
  `no_proposal` varchar(255) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `file_proposal` varchar(150) NOT NULL,
  `tipe` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim_proposal`
--

INSERT INTO `kirim_proposal` (`id`, `id_sekolah`, `id_pegawai`, `id_thn`, `email_tujuan`, `no_proposal`, `tgl_kirim`, `subjek`, `pesan`, `file_proposal`, `tipe`) VALUES
(61, 13, 1, 1, 'rezaazisfauzan@gmail.com', '02/ARC/VIII/2019', '2020-07-28', 'Penawaran Jasa Buku Tahunan Sekolah', 'asd', '02 sma n 2 wonogiri.pdf', 'application/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `teks` text NOT NULL,
  `file_audio` longblob NOT NULL,
  `tipe` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pgw` int(11) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pgw`, `no_ktp`, `nama`, `no_telp`, `jabatan`, `email`, `username`, `password`) VALUES
(1, '38984741', 'Dhiazulfa Maulana Bachtiar', '085877070619', 'marketing', 'dhiazulfamb@gmail.com', 'dhiaz', 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, '334534535', 'Bayu Okke R', '08770760770', 'spv', 'boramandha12@gmail.com', 'bayu', 'cc03e747a6afbbcbf8be7668acfebee5');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_status`
--

CREATE TABLE `proposal_status` (
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal_status`
--

INSERT INTO `proposal_status` (`id_status`, `id_user`, `id_proposal`, `status`) VALUES
(17, 38, 61, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun`, `tahun_ajaran`) VALUES
(1, '2019/2020'),
(2, '2020/2021'),
(3, '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_akun` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_thn` int(11) NOT NULL,
  `nama_panitia` varchar(100) NOT NULL,
  `email_panitia` varchar(100) NOT NULL,
  `no_telp_panitia` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nisn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_akun`, `id_sekolah`, `id_thn`, `nama_panitia`, `email_panitia`, `no_telp_panitia`, `username`, `password`, `nisn`) VALUES
(37, 13, 1, 'Siswa', 'siswa@gmail.com', '080000000000', 'smandagiri', 'cc03e747a6afbbcbf8be7668acfebee5', '0'),
(38, 1, 1, 'Siswa', 'siswa@gmail.com', '080000000000', 'test', 'cc03e747a6afbbcbf8be7668acfebee5', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_paket`
--
ALTER TABLE `daftar_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `daftar_sekolah`
--
ALTER TABLE `daftar_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kirim_mou`
--
ALTER TABLE `kirim_mou`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_thn` (`id_thn`),
  ADD KEY `id_proposal` (`id_status`);

--
-- Indexes for table `kirim_proposal`
--
ALTER TABLE `kirim_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_admin` (`id_pegawai`),
  ADD KEY `id_thn` (`id_thn`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pgw`);

--
-- Indexes for table `proposal_status`
--
ALTER TABLE `proposal_status`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_proposal` (`id_proposal`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_thn` (`id_thn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_paket`
--
ALTER TABLE `daftar_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_sekolah`
--
ALTER TABLE `daftar_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kirim_mou`
--
ALTER TABLE `kirim_mou`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kirim_proposal`
--
ALTER TABLE `kirim_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pgw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proposal_status`
--
ALTER TABLE `proposal_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kirim_mou`
--
ALTER TABLE `kirim_mou`
  ADD CONSTRAINT `kirim_mou_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pgw`),
  ADD CONSTRAINT `kirim_mou_ibfk_3` FOREIGN KEY (`id_thn`) REFERENCES `tahun_ajaran` (`id_tahun`),
  ADD CONSTRAINT `kirim_mou_ibfk_6` FOREIGN KEY (`id_status`) REFERENCES `proposal_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kirim_mou_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kirim_proposal`
--
ALTER TABLE `kirim_proposal`
  ADD CONSTRAINT `kirim_proposal_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `daftar_sekolah` (`id`),
  ADD CONSTRAINT `kirim_proposal_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pgw`),
  ADD CONSTRAINT `kirim_proposal_ibfk_3` FOREIGN KEY (`id_thn`) REFERENCES `tahun_ajaran` (`id_tahun`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `daftar_paket` (`id_paket`),
  ADD CONSTRAINT `laporan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal_status`
--
ALTER TABLE `proposal_status`
  ADD CONSTRAINT `proposal_status_ibfk_1` FOREIGN KEY (`id_proposal`) REFERENCES `kirim_proposal` (`id`),
  ADD CONSTRAINT `proposal_status_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `daftar_sekolah` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_thn`) REFERENCES `tahun_ajaran` (`id_tahun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

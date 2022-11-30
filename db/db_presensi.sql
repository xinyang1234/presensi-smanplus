-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 09:00 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(100) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `notelp_admin` varchar(14) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isRoot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `nama_admin`, `email`, `notelp_admin`, `password`, `isRoot`) VALUES
('admin', 'Fathan Root', 'admin@polije.ac.id', '08191788922', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_presensi`
--

CREATE TABLE `tb_detail_presensi` (
  `id_presensi` int(11) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `time_stamp` datetime NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `status_kehadiran` varchar(30) NOT NULL,
  `koordinat` varchar(255) NOT NULL,
  `bukti_izin` varchar(255) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nuptk` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_guru` varchar(255) NOT NULL,
  `notelp_guru` varchar(14) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `status_kepegawaian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nuptk`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `alamat_guru`, `notelp_guru`, `password`, `email`, `status_kepegawaian`) VALUES
('198106152006041002', 'Syamsul Arifin, S.Kom, M.Cs', 'Jember', '1981-06-15', 'Jember', '081289172897', '$2y$10$Sasd0HFDpoyg/9EHZ4KUP.dYamI3v.nLoEvqttdZHlO2ma6bZq8i.', '', 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `desc` text NOT NULL,
  `thumbnail` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nuptk` varchar(255) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `hari` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `id_tahun_ajaran`) VALUES
(3, 'X 1', 3),
(4, 'X 2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Biologi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jam_awal` datetime NOT NULL,
  `jam_akhir` datetime NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(25) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `alamat_siswa` varchar(255) DEFAULT NULL,
  `notelp_siswa` varchar(14) DEFAULT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tempat_lahir` varchar(120) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `isLogin` int(1) DEFAULT NULL,
  `otp` int(4) DEFAULT NULL,
  `otp_expired` datetime DEFAULT NULL,
  `deviceId` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `email`, `password`, `id_kelas`, `nama_siswa`, `alamat_siswa`, `notelp_siswa`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `foto_profil`, `isLogin`, `otp`, `otp_expired`, `deviceId`) VALUES
('1005', '', '$2y$10$UhUlwNNr/YySpmbWoTL9PuCsCyWpMc4IyDHSUSTeJMfIltE7Xs7B6', 0, 'Dania Eka Febriyanti', 'Jl. Situbondo Kampung Haji', '082233212938', 'P', 'Bondowoso', '2003-02-26', '', 0, 0, '0000-00-00 00:00:00', ''),
('1517', '', '$2y$10$NQ/1ZkYZhah5QosU6Ng/0eIxMRmmMKWJ5dKQV4CO4s.h4.tnaS2f.', 0, 'Aviza Maharani NurPutri', 'Jl. Wisata Ijen, Wonokusumo', '081221222322', 'P', 'Bondowoso', '2003-03-28', '', 0, 0, '0000-00-00 00:00:00', ''),
('3646', '', '$2y$10$h5PPgzoNbHV1k9YaIntXteyjPRug7DPfXExuoAxO8tyrWY6kU6PP2', 0, 'Aisyah Yulia Damayanti', 'Jl. Situbondo Gg. SDN Tenggarang 01', '085623890131', 'P', 'Bondowoso', '2002-06-12', '', 0, 0, '0000-00-00 00:00:00', ''),
('3944', '', '$2y$10$tDjJCSsCtRcfHqi6Is8cu.33yl207BNhpZ7M06J/Q7gLBPbWpQiLq', 0, 'Muhammad Anton Maulana', 'Bondowoso', '085231133153', 'L', 'Bondowoso', '2003-05-08', '', 0, 0, '0000-00-00 00:00:00', ''),
('4424', '', '$2y$10$h.B/69ZWrj7bSEB.FpKvWujwhKxJqPAyHX/ecJCEeJjZGPdxrBOMC', 4, 'Aida Khoirotun Nisa\'', 'Sumber Gading', '0859302349', 'P', 'Bondowoso', '2003-06-21', '', 0, 0, '0000-00-00 00:00:00', ''),
('5948', '', '$2y$10$qS0lRMqtmYLCQ8T71ou1e./Cs57um1Xci6s1QMYpluNlF9pN13TKm', 0, 'Ara Saputra', 'Jl. Nogosari, Sumber Gading', '081992813748', 'L', 'Bondowoso', '2003-03-05', '', 0, 0, '0000-00-00 00:00:00', ''),
('E41212128', '', '$2y$10$jGPftJBVIj4ebyM0UzNkX.tvyDmGzESPLCJ2ajxyvjOtMzBGsTnJS', 0, 'Andini Putri Ramadhani', 'Jember', '081916556677', 'P', 'Jember', '2002-12-10', '', 0, 0, '0000-00-00 00:00:00', ''),
('E41212174', '', '$2y$10$.g/qUXe3y.hMebcF0w.U..7juY1OixbuW8MqgR2Fu1PxhAqLB7ikW', 0, 'Fathan Maulana', 'Jl. Kampung Haji, No.21, Tenggarang', '081294721833', 'L', 'Bondowoso', '2003-05-03', '', 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(12) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `isActive`) VALUES
(1, '2018/2019', 0),
(2, '2019/2020', 0),
(3, '2020/2021', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `tb_jadwal_fk0` (`id_kelas`),
  ADD KEY `tb_jadwal_fk2` (`id_tahun_ajaran`),
  ADD KEY `tb_jadwal_fk1` (`id_mapel`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `tb_kelas_fk0` (`id_tahun_ajaran`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_fk0` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_jadwal_fk1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`),
  ADD CONSTRAINT `tb_jadwal_fk2` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tb_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_fk0` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tb_tahun_ajaran` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

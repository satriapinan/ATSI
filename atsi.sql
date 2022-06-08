-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 04:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `tanggal_kehadiran` date NOT NULL,
  `waktu_kehadiran` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `no_induk`, `tanggal_kehadiran`, `waktu_kehadiran`) VALUES
(1, '2001360', '2022-06-06', '07:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `data_kepulangan`
--

CREATE TABLE `data_kepulangan` (
  `id_kepulangan` int(11) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `tanggal_kepulangan` date NOT NULL,
  `waktu_kepulangan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kepulangan`
--

INSERT INTO `data_kepulangan` (`id_kepulangan`, `no_induk`, `tanggal_kepulangan`, `waktu_kepulangan`) VALUES
(1, '2001360', '2022-06-06', '16:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_absensi`
--

CREATE TABLE `laporan_absensi` (
  `id_laporan` int(11) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `id_kehadiran` int(11) NOT NULL,
  `id_kepulangan` int(11) NOT NULL,
  `status_validasi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_absensi`
--

INSERT INTO `laporan_absensi` (`id_laporan`, `no_induk`, `id_kehadiran`, `id_kepulangan`, `status_validasi`) VALUES
(1, '2001360', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `no_induk` varchar(20) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`no_induk`, `nama_pegawai`, `jabatan`, `divisi`, `no_telp`, `email`, `password`) VALUES
('2000111', 'Tono Sutono', 'Karyawan', 'Pemasaran', '089999999999', 'tonos@gmail.com', '9a20c72cdd3b0b265c2ad11d6dd6349a'),
('2000514', 'Satria Pinandita Abyatarsyah', 'Manajer', 'Pemasaran', '083333333333', 'satriapinan@gmail.com', '81067f80c1bcb06d95b1e4ee728bc100'),
('2001111', 'Dani Dono', 'Karyawan', 'SDM', '087777777777', 'danid@gmail.com', '9a3a72d0723ecf1852fded040d4db3fb'),
('2001123', 'Muhammad Fikri Nur Bakhtiar', 'Operator', 'Administrasi', '081111111111', 'mfikri@gmail.com', 'dccaa30f9a7689e1636ea1279e49398b'),
('2001360', 'Salsabila Kanaya', 'Karyawan', 'Pemasaran', '084444444444', 'salsabilak@gmail.com', 'a0011eae075b61d76fda3c8926ba220e'),
('2005319', 'Adinda Salsabila', 'Karyawan', 'Pemasaran', '082222222222', 'adindas@gmail.com', '4430cc002903308b0ffd182b0979f3a5');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_absensi`
--

CREATE TABLE `rekap_absensi` (
  `id_rekap` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `telat` int(11) NOT NULL,
  `no_induk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_absensi`
--

INSERT INTO `rekap_absensi` (`id_rekap`, `hadir`, `tidak_hadir`, `telat`, `no_induk`) VALUES
(1, 1, 0, 0, '2001360');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_login`
--

CREATE TABLE `riwayat_login` (
  `id_login` int(11) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `tanggal_login` date NOT NULL,
  `waktu_login` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_login`
--

INSERT INTO `riwayat_login` (`id_login`, `no_induk`, `tanggal_login`, `waktu_login`) VALUES
(1, '2001360', '2022-06-06', '19:50:18'),
(7, '2001123', '0000-00-00', '00:00:00'),
(8, '2001123', '0000-00-00', '00:00:00'),
(9, '2000514', '0000-00-00', '00:00:00'),
(10, '2001123', '0000-00-00', '00:00:00'),
(11, '2001123', '0000-00-00', '00:00:00'),
(12, '2001123', '0000-00-00', '00:00:00'),
(13, '2001123', '0000-00-00', '00:00:00'),
(14, '2001123', '0000-00-00', '00:00:00'),
(15, '2001123', '0000-00-00', '00:00:00'),
(16, '2001123', '0000-00-00', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `data_kepulangan`
--
ALTER TABLE `data_kepulangan`
  ADD PRIMARY KEY (`id_kepulangan`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `laporan_absensi`
--
ALTER TABLE `laporan_absensi`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `id_kehadiran` (`id_kehadiran`),
  ADD KEY `id_kepulangan` (`id_kepulangan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indexes for table `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `riwayat_login`
--
ALTER TABLE `riwayat_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `no_induk` (`no_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_kepulangan`
--
ALTER TABLE `data_kepulangan`
  MODIFY `id_kepulangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_absensi`
--
ALTER TABLE `laporan_absensi`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat_login`
--
ALTER TABLE `riwayat_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD CONSTRAINT `data_kehadiran_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `pegawai` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_kepulangan`
--
ALTER TABLE `data_kepulangan`
  ADD CONSTRAINT `data_kepulangan_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `pegawai` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_absensi`
--
ALTER TABLE `laporan_absensi`
  ADD CONSTRAINT `laporan_absensi_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `pegawai` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_absensi_ibfk_2` FOREIGN KEY (`id_kehadiran`) REFERENCES `data_kehadiran` (`id_kehadiran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_absensi_ibfk_3` FOREIGN KEY (`id_kepulangan`) REFERENCES `data_kepulangan` (`id_kepulangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  ADD CONSTRAINT `rekap_absensi_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `pegawai` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_login`
--
ALTER TABLE `riwayat_login`
  ADD CONSTRAINT `riwayat_login_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `pegawai` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

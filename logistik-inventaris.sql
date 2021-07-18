-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 12:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistik-inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `jml` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nm_barang`, `jml`, `jenis_id`, `ruangan_id`, `ket`) VALUES
(1, 'BG-0001', 'Kursi Belajar', 20, 1, 2, '-'),
(2, 'BG-0002', 'Meja Kantor', 10, 2, 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `hilang`
--

CREATE TABLE `hilang` (
  `id` int(11) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `barang_id` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nm_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nm_jenis`) VALUES
(1, 'Kursi'),
(2, 'Meja'),
(3, 'Lemari'),
(5, 'Kertas');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `logistik_id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `logistik_id`, `jml`, `tgl`, `ket`) VALUES
(2, 2, 5, '2020-07-02', '-');

-- --------------------------------------------------------

--
-- Table structure for table `logistik`
--

CREATE TABLE `logistik` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nm_logistik` varchar(255) NOT NULL,
  `jml` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logistik`
--

INSERT INTO `logistik` (`id`, `kode`, `nm_logistik`, `jml`, `jenis_id`) VALUES
(2, 'LG-0001', 'Kertas', 15, 5),
(3, 'LG-0002', 'Logistik', 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(11) NOT NULL,
  `logistik_id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `logistik_id`, `jml`, `tgl`, `ket`) VALUES
(2, 3, 8, '2020-07-02', '-'),
(3, 2, 5, '2021-05-19', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nm_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nm_ruangan`) VALUES
(1, 'Kantor Guru'),
(2, 'Kelas IPA 2');

-- --------------------------------------------------------

--
-- Table structure for table `rusak`
--

CREATE TABLE `rusak` (
  `id` int(11) NOT NULL,
  `logistik_id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rusak`
--

INSERT INTO `rusak` (`id`, `logistik_id`, `jml`, `tgl`, `ket`) VALUES
(1, 2, 5, '2020-07-02', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `username`, `password`, `image`, `level`) VALUES
(1, 'Arbandi', 'Administrator', 'admin', '$2y$12$BAtggppi..q3WwW8iiZxpeRolcWo1QF/MCU1dSPAlr4u5A16ResfS', 'female.png', 0),
(2, 'Pengguna', 'User', 'user', '$2y$12$BAtggppi..q3WwW8iiZxpeRolcWo1QF/MCU1dSPAlr4u5A16ResfS', 'female.png', 1),
(4, 'akusada', 'User', 'Akulapar', '12345', 'female.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `jenis_id` (`jenis_id`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indexes for table `hilang`
--
ALTER TABLE `hilang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logistik_id` (`logistik_id`);

--
-- Indexes for table `logistik`
--
ALTER TABLE `logistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logistik_id` (`logistik_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rusak`
--
ALTER TABLE `rusak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logistik_id` (`logistik_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hilang`
--
ALTER TABLE `hilang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logistik`
--
ALTER TABLE `logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rusak`
--
ALTER TABLE `rusak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`);

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_ibfk_1` FOREIGN KEY (`logistik_id`) REFERENCES `logistik` (`id`);

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_ibfk_1` FOREIGN KEY (`logistik_id`) REFERENCES `logistik` (`id`);

--
-- Constraints for table `rusak`
--
ALTER TABLE `rusak`
  ADD CONSTRAINT `rusak_ibfk_1` FOREIGN KEY (`logistik_id`) REFERENCES `logistik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

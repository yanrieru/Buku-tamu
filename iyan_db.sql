-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 06:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iyan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id_bukutamu` int Primary Key, Auto_increment,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `pesan` text(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id_bukutamu`, `nama_lengkap`, `email`, `alamat`, `pesan`) VALUES
(4, '20200003', 'Tri Untoro', 'Semarang Tengah', 'soshum'),
(5, '20200004', 'Ahmad', 'Yogyakarta', 'saintek'),
(6, '20200005', 'Doni', 'Jakarta', 'soshum'),
(7, '20200006', 'Budi', 'Klaten', 'soshum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id_bukutamu`),
  ADD UNIQUE KEY `nama_lengkap` (`nama_lengkap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id_bukutamu` int Primary Key, Auto_increment, =8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

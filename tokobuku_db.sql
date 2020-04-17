-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 07:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `noisbn` varchar(15) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `ppn` float NOT NULL,
  `diskon` float NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`, `image`) VALUES
(1, 'The Godfather', '24-242-542-2', 'Mario Puzo', 'Eregi', 1970, 18, 10000, 100000, 5, 10, 'buku11.jpg'),
(2, 'Hacker Logbook', '31337-31337', 'Yogi Kortisa', 'Andi', 2017, 100, 55000, 65000, 5, 10, 'buku241.jpg'),
(3, 'Laskar Pelangi', '34-523-524', 'Adera', 'Andi', 2012, 16, 65000, 56000, 10, 5, 'buku242.jpg'),
(4, 'Dongeng Nusantara', '318-2837-21', 'Mbah Koding', 'Underground', 1966, 11, 20000, 40000, 10, 5, 'dongeng.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(1, 'Erlangga', 'Sumenep', 239479000000),
(2, 'Andi', 'Serang', 8947590);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
(1, 'Kasir-Penjualan', 'Jl. Kenangan', '080990000', 1, 'operator', '4b583376b2767b923c3e1da60d10de59', 2),
(3, 'Kasir-Manager', 'Jl. Durian', '01848720', 1, 'manager', '1d0258c2440a8d19e716292b231e3190', 3),
(4, 'Kasir-Admin', 'Jl. Semangka', '0839487000', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(7, 'Listia Indarti', 'sjklfkljs', '29847', 0, 'listia', '49a84fde606997f2ef6208c86c44cf6e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(2, 1, 2, 7, '2017-06-15'),
(4, 1, 1, 20, '2017-06-15'),
(5, 1, 4, 5, '2017-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `id_kasir`, `jumlah`, `total`, `tanggal`) VALUES
(18, 4, 4, 1, 41800, '2017-06-15'),
(19, 4, 4, 2, 83600, '2017-06-15'),
(20, 1, 4, 1, 19998, '2017-06-15'),
(21, 1, 4, 1, 94500, '2017-06-15'),
(22, 1, 4, 1, 94500, '2017-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `toko_sessions`
--

CREATE TABLE `toko_sessions` (
  `session_id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) NOT NULL,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko_sessions`
--

INSERT INTO `toko_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('d1f33d9a42c73e9d8ee21f512276fc0d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', 1497503754, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_distributor` (`id_distributor`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

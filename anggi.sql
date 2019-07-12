-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 01:24 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anggi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `rekening`, `nama_bank`, `atas_nama`) VALUES
(1, '13251351353', 'BRI', 'Aji');

-- --------------------------------------------------------

--
-- Table structure for table `izin_usaha`
--

CREATE TABLE `izin_usaha` (
  `id_izin_usaha` int(11) NOT NULL,
  `nama_izin` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `izin_usaha`
--

INSERT INTO `izin_usaha` (`id_izin_usaha`, `nama_izin`) VALUES
(1, 'perseroan terbatas'),
(2, 'Commanditaire Vennootschap'),
(3, 'IUMKM');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `id_parent2` int(11) DEFAULT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_parent`, `id_parent2`, `nama_kategori`, `slug`) VALUES
(1, NULL, NULL, 'Undangan Pernikahan', 'hanphone-tablet'),
(2, NULL, NULL, 'Undangan Khitanan', 'olahraga-aktivitas-luar-ruang');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `kategori` int(1) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tgljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga`, `deskripsi`, `gambar`, `satuan`, `tgljam`) VALUES
(1, 'Aji', 1, '50000', 'adfbabbadfdfbsdfbsfgbsfgbdf', '', '50 Buah', '2019-07-13 06:07:54'),
(2, 'yaqi', 1, '50000', 'vgh', '', '50 Buah', '2019-07-13 06:17:39'),
(3, 'v b', 1, '50000', 'dfcbhjkl', 'bdec59f4f3ee485dca76fa5a006eb950.jpg', '50 Buah', '2019-07-13 06:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `setting_web`
--

CREATE TABLE `setting_web` (
  `id_setting` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_web`
--

INSERT INTO `setting_web` (`id_setting`, `judul`, `deskripsi`, `logo`) VALUES
(1, 'Market Places', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ', '215521240.png'),
(2, 'Cara Pesan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, yaqiea</p>', ''),
(3, 'Tentang Kami', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,a</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `nowa` varchar(14) NOT NULL,
  `gambar_ktp` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL DEFAULT 'user',
  `validasi_akun` int(1) NOT NULL,
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `password`, `nohp`, `nowa`, `gambar_ktp`, `level`, `validasi_akun`, `tanggaljam`) VALUES
(1, 'admin', 'ahmad yahya', 'admin@admin.admin', '$2y$10$.RlhnGI2lpTfhNv7tU3t7.QcdB5ItFgFZE/WhskC61UEJ1zLG4u/i', '62895357948031', '62895357948031', '', 'super_admin', 0, '2019-07-01 00:00:00'),
(4, 'yaqie', 'ahmad yahya asy-syidqie', 'ahmadyahyay@gmail.com', '$2y$10$N3TN158dH6YxqQdPsg8hAefYydr2ep8C.QD.9lzZbU6xHEhItfgxW', '', '6287823028388', '698151818.jpg', 'user', 1, '2019-07-08 10:24:52'),
(5, 'yahya', 'ahmad yahya asy-syidqie', 'ahmadyahyaasysyidqie@gmail.com', '$2y$10$tzTIHFy/OapxI/PFrKzFcuAr8Atl4zVf1Pln8F9lbIjMvQw.64JPq', '', '0895357948031', '255008879.jpg', 'user', 1, '2019-07-08 13:16:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `izin_usaha`
--
ALTER TABLE `izin_usaha`
  ADD PRIMARY KEY (`id_izin_usaha`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `setting_web`
--
ALTER TABLE `setting_web`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `izin_usaha`
--
ALTER TABLE `izin_usaha`
  MODIFY `id_izin_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

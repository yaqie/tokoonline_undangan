-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 08:45 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

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
(1, NULL, NULL, 'Hanphone & Tablet', 'hanphone-tablet'),
(2, NULL, NULL, 'Olahraga & Aktivitas Luar Ruang', 'olahraga-aktivitas-luar-ruang'),
(3, NULL, NULL, 'Komputer & Laptop', 'komputer-laptop'),
(4, NULL, NULL, 'Kamera', 'kamera'),
(5, NULL, NULL, 'Mainan & Video Games', 'mainan-video-games'),
(6, NULL, NULL, 'Peralatan Elektronik', 'peralatan-elektronik'),
(7, NULL, NULL, 'Fashion Pria', 'fashion-pria'),
(8, NULL, NULL, 'Home & Living', 'home-living'),
(9, NULL, NULL, 'Fashion Wanita', 'fashion-wanita'),
(10, NULL, NULL, 'Ibu & Anak', 'ibu-anak'),
(11, NULL, NULL, 'Tiket & Voucher', 'tiket-voucher'),
(12, NULL, NULL, 'Kesehatan & Kecantikan', 'kesehatan-kecantikan'),
(13, NULL, NULL, 'Otomotif', 'otomotif'),
(14, NULL, NULL, 'Tour & Travel', 'tour-travel'),
(15, 4, NULL, 'Flash Kamera', 'flash-kamera'),
(17, 4, NULL, 'Aksesoris Kamera', 'aksesoris-kamera'),
(18, 4, 17, 'Kartu Memori Kamera', 'kartu-memori-kamera'),
(19, 4, 17, 'Aksesoris Kamera Lainnya', 'aksesoris-kamera-lainnya'),
(20, 4, 17, 'Aksesoris Action Cam', 'aksesoris-action-cam'),
(21, 4, 17, 'Frame Foto Digital', 'frame-foto-digital'),
(22, 4, 17, 'Dry Box Kamera', 'dry-box-kamera'),
(23, 4, 17, 'Tripod, Monopod &  Mount', 'tripod-monopod-mount'),
(24, 1, NULL, 'Hanphone', 'hanphone'),
(25, 1, NULL, 'Aksesoris Handphone & Tablet', 'aksesoris-handphone-tablet'),
(26, 1, NULL, 'Tablet', 'tablet'),
(27, 1, NULL, 'Tukar Tambah', 'tukar-tambah'),
(28, 1, NULL, 'Wearable Gadget', 'wearable-gadget'),
(29, 4, NULL, 'Baterai Kamera', 'baterai-kamera'),
(30, 4, NULL, 'Tas & Case', 'tas-case'),
(31, 4, NULL, 'Kamera Digital', 'kamera-digital'),
(32, 4, NULL, 'Kamera Video', 'kamera-video'),
(33, 4, NULL, 'Lensa Kamera', 'lensa-kamera'),
(34, 4, 15, 'Aksesoris Flash', 'aksesoris-flash'),
(35, 4, 15, 'Flash & Lighting Kamera', 'flash-lighting-kamera'),
(36, 4, 29, 'Baterai Grid Kamera', 'baterai-grid-kamera'),
(37, 4, 29, 'Baterai & Charger Kamera', 'baterai-charger-kamera'),
(38, 4, 30, 'Hard Case & Proteksi Kamera', 'hard-case-produksi-kamera'),
(39, 4, 30, 'Strap Kamera', 'strap-kamera'),
(40, 4, 30, 'Pouch Kamera', 'pouch-kamera'),
(41, 4, 30, 'Tas Kamera', 'tas-kamera');

-- --------------------------------------------------------

--
-- Table structure for table `setting_web`
--

CREATE TABLE `setting_web` (
  `id_setting` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_web`
--

INSERT INTO `setting_web` (`id_setting`, `judul`, `deskripsi`, `logo`) VALUES
(1, 'Market Place', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ', '853443301.jpg');

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
(1, 'admin', 'ahmad yahya', 'admin@admin.admin', '$2y$10$TPvEEbHHs7txjojjYsqyxeJFqE8KXgt9XFwC2WoBCxPzNJCdTg392', '62895357948031', '62895357948031', '', 'super_admin', 0, '2019-07-01 00:00:00'),
(4, 'yaqie', 'ahmad yahya asy-syidqie', 'ahmadyahyay@gmail.com', '$2y$10$N3TN158dH6YxqQdPsg8hAefYydr2ep8C.QD.9lzZbU6xHEhItfgxW', '', '6287823028388', '698151818.jpg', 'user', 1, '2019-07-08 10:24:52'),
(5, 'yahya', 'ahmad yahya asy-syidqie', 'ahmadyahyaasysyidqie@gmail.com', '$2y$10$tzTIHFy/OapxI/PFrKzFcuAr8Atl4zVf1Pln8F9lbIjMvQw.64JPq', '', '0895357948031', '255008879.jpg', 'user', 1, '2019-07-08 13:16:25');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

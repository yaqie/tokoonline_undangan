-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 10:28 PM
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
(1, '13251351353', 'BRI', 'Aji'),
(2, '091820938918023', 'BCA', 'yaqie');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_transaksi` int(11) NOT NULL,
  `nm1` varchar(100) NOT NULL,
  `nm_pang1` varchar(100) NOT NULL,
  `nm_ayah1` varchar(100) NOT NULL,
  `nm_ibu1` varchar(100) NOT NULL,
  `anak1` int(3) NOT NULL,
  `nm2` varchar(100) NOT NULL,
  `nm_pang2` varchar(100) NOT NULL,
  `nm_ayah2` varchar(100) NOT NULL,
  `nm_ibu2` varchar(100) NOT NULL,
  `anak2` int(3) NOT NULL,
  `tgl1` date NOT NULL,
  `jam1` varchar(100) NOT NULL,
  `tempat1` text NOT NULL,
  `tgl2` date NOT NULL,
  `jam2` varchar(100) NOT NULL,
  `tempat2` text NOT NULL,
  `hiburan` text NOT NULL,
  `mengundang` text NOT NULL,
  `ket_lain` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_transaksi`, `nm1`, `nm_pang1`, `nm_ayah1`, `nm_ibu1`, `anak1`, `nm2`, `nm_pang2`, `nm_ayah2`, `nm_ibu2`, `anak2`, `tgl1`, `jam1`, `tempat1`, `tgl2`, `jam2`, `tempat2`, `hiburan`, `mengundang`, `ket_lain`, `gambar`) VALUES
(3, 'Aprilianto Aji Nugroho', 'Aji', 'Steve', 'Natali', 1, 'Dilla Alfianur Kumalasari', 'Dilla', 'Roger', 'Freya', 3, '2019-07-20', '08.00 WIB', 'Masjid Baitut Thoyyibah', '2019-07-21', '10.00 WIB -Selesai', 'Jl. Banjaran Rt03/Rw10, Donan, Cilacap Tengah, Cilacap', 'Wayang', 'Keluarga Besar Mbah Wira', '', '4a47a0db6e60853dedfcfdf08a5ca249.png'),
(4, 'Yaqie Al Zahra', 'Yaqie', 'Diman', 'Tusiah', 5, '', '', '', '', 0, '2019-07-21', '08.00 WIB', 'Rumah Keidaman Zahra', '0000-00-00', '', '', 'Calung', 'Mbah Meja', '', 'bdec59f4f3ee485dca76fa5a006eb950.jpg'),
(6, 'Nyujeng Alhadi', 'Nyujeng', 'amin', 'rulan', 2, '', '', '', '', 0, '2019-07-20', '08.00 WIB', 'Rumah Keidaman nyujeng', '0000-00-00', '', '', 'Ebeg', 'Mbah sastro', '', '333934bc28a93a5497d312f2e9dc0e74.png');

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
(1, NULL, NULL, 'Soft Cover', 'soft-cover'),
(2, NULL, NULL, 'Hard Cover', 'hard-cover'),
(3, NULL, NULL, 'Undangan Pernikahan', 'undangan-pernikahan'),
(4, NULL, NULL, 'Undangan Khitanan', 'undangan-khitanan');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int(11) NOT NULL,
  `kode_invoice` varchar(20) NOT NULL,
  `bank_tujuan` varchar(100) NOT NULL,
  `bank_pengirim` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `nama_pengirim` varchar(200) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `jumlah_transfer` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `catatan` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `kode_invoice`, `bank_tujuan`, `bank_pengirim`, `no_rekening`, `nama_pengirim`, `tanggal_transfer`, `jumlah_transfer`, `gambar`, `catatan`, `status`) VALUES
(1, 'TR-0004', '1', 'BNI', '13513413', 'Aji', '2019-07-19', '400000', '014ee7aa2b63fbb64191e1e80fbc2a00.jpg', '', -1),
(2, 'TR-0003', '2', 'Mandiri', '46353414121', 'dilla', '2019-07-19', '700000', 'bdec59f4f3ee485dca76fa5a006eb950.jpg', '', 2),
(3, 'TR-0006', '2', 'Muamalat', '623423413', 'Nyujeng', '2019-07-20', '1000000', 'acba6124f453cf41c7f59dc6efb0d93b.jpg', '', 0);

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
  `berat` varchar(100) NOT NULL,
  `tgljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga`, `deskripsi`, `gambar`, `berat`, `tgljam`) VALUES
(1, 'Lorem Ipsum', 1, '50000', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, quisquam natus voluptas quibusdam aut corporis eos tempore optio amet harum ullam illum, officia fugiat maiores quo asperiores sunt, veritatis fuga!</p><p>Quam ut, aut a nihil beatae voluptates voluptate eum facilis ullam? Doloribus atque ipsum sapiente magni assumenda ratione non maiores facere minus aspernatur nam, sint fugiat consequatur, culpa neque dicta!</p><p>Dolor modi ullam cumque ratione laboriosam beatae aut maiores, in nisi reprehenderit voluptate provident libero, ipsam est quaerat rerum natus deleniti distinctio ducimus, minima eum architecto aperiam quia corrupti! Recusandae.</p><p>Accusamus sed labore possimus dolores enim? Iure, voluptatibus corporis! Provident eos harum dolorem, accusantium sed illum sequi officiis pariatur reprehenderit ex aut soluta vitae, qui nesciunt non animi quos quisquam.</p><p>Quo maxime rem porro a animi esse libero consequuntur harum veniam eius laborum quas aliquid ut corporis possimus dignissimos, voluptatibus totam corrupti enim reprehenderit? Corporis dicta incidunt iusto ducimus iste.</p>', '8541a09f7bd94e084132db479856f414.png', '10', '2019-07-15 14:58:36'),
(3, 'Dolor modi ullam cumque', 1, '100000', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, quisquam natus voluptas quibusdam aut corporis eos tempore optio amet harum ullam illum, officia fugiat maiores quo asperiores sunt, veritatis fuga!</p><p>Quam ut, aut a nihil beatae voluptates voluptate eum facilis ullam? Doloribus atque ipsum sapiente magni assumenda ratione non maiores facere minus aspernatur nam, sint fugiat consequatur, culpa neque dicta!</p><p>Dolor modi ullam cumque ratione laboriosam beatae aut maiores, in nisi reprehenderit voluptate provident libero, ipsam est quaerat rerum natus deleniti distinctio ducimus, minima eum architecto aperiam quia corrupti! Recusandae.</p><p>Accusamus sed labore possimus dolores enim? Iure, voluptatibus corporis! Provident eos harum dolorem, accusantium sed illum sequi officiis pariatur reprehenderit ex aut soluta vitae, qui nesciunt non animi quos quisquam.</p><p>Quo maxime rem porro a animi esse libero consequuntur harum veniam eius laborum quas aliquid ut corporis possimus dignissimos, voluptatibus totam corrupti enim reprehenderit? Corporis dicta incidunt iusto ducimus iste.</p>', 'eec14a6fbb642fb7b1ff1fb6d7a94855.jpg', '10', '2019-07-15 15:31:19'),
(4, 'blue', 1, '4000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '924fe1c9d4ddc7261753257a9d699baf.png', '10', '2019-07-16 18:56:27'),
(5, 'red', 1, '3000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '81c1dcb6d1a1eab8c25f401ae770424c.jpg', '10', '2019-07-16 18:56:52'),
(6, 'black', 1, '6000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '48ce820586d0276c7a02a5a468671888.jpg', '10', '2019-07-16 18:57:18'),
(7, 'white', 1, '7000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'fa76ef901f409356885f0a4a5090631a.jpg', '10', '2019-07-16 18:57:42'),
(8, 'green', 1, '5000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'bd02c5c31729ae2946ba2da8d8c355c2.jpg', '10', '2019-07-16 18:58:10'),
(9, 'grey', 1, '5000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '1bfb4c0e130881d0d17e7d9b5b1d9c52.jpg', '10', '2019-07-16 18:58:29'),
(10, 'gold', 1, '5000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '2dc08ca6b472aceb907c9e6284fcd88c.jpg', '10', '2019-07-16 19:00:07'),
(11, 'pink', 1, '4000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '40c42cc39ce79706934a24887b7d3ac0.jpg', '10', '2019-07-16 19:00:44'),
(12, 'dummy', 2, '4000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'c270eb7dd0e8b6b2e46e7b8efb3a1362.jpg', '11', '2019-07-16 19:03:55'),
(13, 'sani', 2, '5000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'bd02c5c31729ae2946ba2da8d8c355c2.jpg', '11', '2019-07-16 19:04:19'),
(14, 'jujeng', 2, '5000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'c270eb7dd0e8b6b2e46e7b8efb3a1362.jpg', '11', '2019-07-16 19:04:41'),
(15, 'thosiba', 2, '7000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '1bfb4c0e130881d0d17e7d9b5b1d9c52.jpg', '11', '2019-07-16 19:05:07'),
(16, 'samsung', 2, '7000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '9907eee19cb7274ac29128dd9e6e1bf0.png', '11', '2019-07-16 19:05:34'),
(17, 'samsung', 2, '7000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '7fdc1a630c238af0815181f9faa190f5.jpg', '11', '2019-07-16 19:05:53'),
(18, 'xiaomi', 2, '2000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'bd02c5c31729ae2946ba2da8d8c355c2.jpg', '11', '2019-07-16 19:06:15'),
(19, 'redmi', 2, '4000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '2d99ae9e904f880eef8feb4e61882b79.jpg', '11', '2019-07-16 19:06:37'),
(20, 'huawei', 2, '8000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '924fe1c9d4ddc7261753257a9d699baf.png', '11', '2019-07-16 19:07:09'),
(21, 'nokia', 2, '5000', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', '11', '2019-07-16 19:07:33'),
(22, 'Ultimate', 1, '4000', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, quisquam natus voluptas quibusdam aut corporis eos tempore optio amet harum ullam illum, officia fugiat maiores quo asperiores sunt, veritatis fugaQuam ut, aut a nihil beatae voluptates voluptate eum facilis ullam? Doloribus atque ipsum sapiente magni assumenda ratione non maiores facere minus aspernatur nam, sint fugiat consequatur, culpa neque dictaDolor modi ullam cumque ratione laboriosam beatae aut maiores, in nisi reprehenderit voluptate provident libero, ipsam est quaerat rerum natus deleniti distinctio ducimus, minima eum architecto aperiam quia corrupti! RecusandaeAccusamus sed labore possimus dolores enim? Iure, voluptatibus corporis! Provident eos harum dolorem, accusantium sed illum sequi officiis pariatur reprehenderit ex aut soluta vitae, qui nesciunt non animi quos quisquam.Quo maxime rem porro a animi esse libero consequuntur harum veniam eius laborum quas aliquid ut corporis possimus dignissimos, voluptatibus totam corrupti enim reprehenderit? Corporis dicta incidunt iusto ducimus iste.</p>', '41fbb36f87af43f5230bb50d90f7cad8.jpg', '12', '2019-07-22 03:13:57');

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
(1, 'Market Places', 'Loren ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ', '717623901.png'),
(2, 'Cara Pesan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, yaqieas</p>', ''),
(3, 'Tentang Kami', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,a</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantiti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `tipe` int(1) DEFAULT NULL,
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_produk`, `kuantiti`, `id_user`, `subtotal`, `ongkir`, `total`, `alamat`, `status`, `tipe`, `tanggaljam`) VALUES
(3, 'TR-0003', 7, 100, 6, '', '', '', 'Jl. Abimanyu No.18 Rt02/06, Kebonmanis, Cilacap Utara, Cilacap', 2, 1, '2019-07-19 19:03:59'),
(4, 'TR-0004', 11, 100, 6, '', '', '', 'Jl. Abimanyu No.18 Rt02/06, Kebonmanis, Cilacap Utara, Cilacap', -1, 2, '2019-07-19 19:07:23'),
(6, 'TR-0006', 9, 200, 6, '', '', '', 'Jl. Abimanyu No.18 Rt02/06, Kebonmanis, Cilacap Utara, Cilacap', 2, 2, '2019-07-19 20:55:12');

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
  `alamat` text NOT NULL,
  `level` varchar(15) NOT NULL DEFAULT 'user',
  `validasi_akun` int(1) NOT NULL,
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `password`, `nohp`, `alamat`, `level`, `validasi_akun`, `tanggaljam`) VALUES
(1, 'admin', 'ahmad yahya', 'admin@admin.admin', '$2y$10$.RlhnGI2lpTfhNv7tU3t7.QcdB5ItFgFZE/WhskC61UEJ1zLG4u/i', '62895357948032', 'purwokerto', 'super_admin', 0, '2019-07-01 00:00:00'),
(4, 'yaqie', 'ahmad yahya asy-syidqie', 'ahmadyahyay@gmail.com', '$2y$10$N3TN158dH6YxqQdPsg8hAefYydr2ep8C.QD.9lzZbU6xHEhItfgxW', '0895357948031', 'purwokerto', 'user', 1, '2019-07-08 10:24:52'),
(6, 'aji', 'Aprilianto Aji Nugroho', 'aji@aji.com', '$2y$10$rCYhRgVeROpq2PXwQEubx.JEWkIsJDgQ4JZXVV.CbCMqJWpnUoAf.', '085230330722', 'Jl. Abimanyu No.18 Rt02/06, Kebonmanis, Cilacap Utara, Cilacap', 'user', 0, '2019-07-19 19:02:01'),
(7, 'root', '', 'root@root.com', '$2y$10$aLnxIpAdbBMvYjOit.kfa.wVucX3lge11WrPeUzqrQIO/ncyLqXo6', '6289535794802', '', 'super_admin', 0, '2019-07-21 23:53:40'),
(8, 'admin2', '', 'admin2@admin.admin', '$2y$10$qeQ9ezrE1008DowDbDHO5OMpeA0kUq5mAHgLhW.R8qSHs4JzyBbUK', '6289535794802', '', 'super_admin', 0, '2019-07-22 00:16:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`);

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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

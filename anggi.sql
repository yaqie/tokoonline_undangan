-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 11:38 AM
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
(2, 'Aprilianto Aji Nugroho', 'Aji', 'Steven', 'Kimberley', 1, '', '', '', '', 0, '2019-07-23', '09.00 WIB', 'Masjid Baitut Thoyyibah', '0000-00-00', '', '', '', '', '', '2c719520c21aa4316a73fd870d3629ae.jpg'),
(3, 'ahmad yahya asy syidqie', 'yaqie', 'Steven', 'Kimberley', 1, 'elvira devy larasati', 'yayas', 'Jackson', 'Ariana', 2, '2019-07-23', '09.00 WIB', 'Masjid Fatimatuzahro', '2019-07-24', '10.00 WIB - Selesai', 'purwokerto', '', '', '', 'f9d99830c5f7e8b2b95362dd19d8c1c1.jpg'),
(4, 'Aprilianto Aji Nugroho', 'Aji', 'Steven', 'Kimberley', 1, '', '', '', '', 0, '2019-07-23', '09.00 WIB', 'Masjid Baitut Thoyyibah', '0000-00-00', '', '', 'asd as', 'd as dasd ', 'as dasd', 'f9d99830c5f7e8b2b95362dd19d8c1c1.jpg'),
(5, 'lalalalala', 'alalala', 'alalalal', 'Kimberley', 1, 'Dilla Alfianur Kumalasari', 'Dilla', 'Jackson', 'Ariana', 2, '2019-11-21', '10.00 sd 11.00', 'Masjid Fatimatuzahro', '2019-09-26', '10.00 WIB - Selesai', 'purwokerto', 'wayang', '', '', ''),
(6, 'Diaz Adrian', 'Diaz', 'Budi', 'Tuti', 1, 'Anya Geraldyne', 'Anya', 'Aji', 'Dila', 1, '2019-07-24', '09.00 WIB', 'Istana Negara', '2019-07-23', '10.00 WIB - Selesai', 'Istana Presiden', 'Via Vallen', '', '', '4b5d37a54d7e8db69a811f3ecdedbc9d.jpg'),
(7, 'lalalalala', 'Aji', 'bla', 'Tuti', 1, '', '', '', '', 0, '2019-07-24', '09.00 WIB', 'Masjid Baitut Thoyyibah', '0000-00-00', '', '', '', '', '', '3b317a6429affbf9afb03c131003a850.jpg'),
(8, 'Aprilianto Aji Nugroho', 'Aji', 'Steven', 'Kimberley', 1, 'Dilla Alfianur Kumalasari', 'Dilla', 'Jackson', 'Ariana', 2, '2019-07-24', '09.00 WIB', 'Masjid Baitut Thoyyibah', '2019-07-24', '10.00 WIB - Selesai', 'purwokerto', '', '', '', '766a8a3ac5c55d0f79e0684c5e9e40e7.jpg');

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
(2, NULL, NULL, 'Hard Cover', 'hard-cover');

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
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `kode_invoice`, `bank_tujuan`, `bank_pengirim`, `no_rekening`, `nama_pengirim`, `tanggal_transfer`, `jumlah_transfer`, `gambar`, `catatan`, `status`) VALUES
(2, 'TR-0001', '1', 'BRI', '2342342', 'yahya', '2019-07-23', '429000', '3b317a6429affbf9afb03c131003a850.jpg', '', 1),
(3, 'TR-0002', '1', 'BCA', '2342342', 'yahya', '2019-07-23', '264500', '3b317a6429affbf9afb03c131003a850.jpg', '', 0),
(4, 'TR-0002', '1', 'BRI', '2342342', 'yahya', '2019-07-23', '264500', 'b04f1b627fd4f32542bf3d129ed90fad.jpg', '', 1),
(5, 'TR-0003', '1', 'BCA', '2342342', 'yahya', '2019-07-23', '54500', '3b317a6429affbf9afb03c131003a850.jpg', '', 0),
(6, 'TR-0003', '1', 'BRI', '2342342', 'yahya', '2019-07-23', '54500', 'b04f1b627fd4f32542bf3d129ed90fad.jpg', '', 1),
(7, 'TR-0004', '2', 'yahya', '2342342', 'yahya', '2019-07-24', '1037000', '2c719520c21aa4316a73fd870d3629ae.jpg', '', 0),
(8, 'TR-0004', '2', 'bni', '2342342', 'yahya', '2019-07-24', '1037000', '766a8a3ac5c55d0f79e0684c5e9e40e7.jpg', '', 1),
(9, 'TR-0006', '1', 'BRI', '2342342', 'yahya', '2019-07-24', '126000', '766a8a3ac5c55d0f79e0684c5e9e40e7.jpg', '', 1),
(10, 'TR-0007', '1', 'BRI', '2342342', 'yahya', '2019-07-24', '115000', '18509052e68889168422e7f387e654f9.jpg', '', 0),
(11, 'TR-0007', '1', 'BCA', '2342342', 'yahya', '2019-07-24', '115000', 'f9d99830c5f7e8b2b95362dd19d8c1c1.jpg', '', 1);

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
(22, 'Ultimate', 1, '4000', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, quisquam natus voluptas quibusdam aut corporis eos tempore optio amet harum ullam illum, officia fugiat maiores quo asperiores sunt, veritatis fugaQuam ut, aut a nihil beatae voluptates voluptate eum facilis ullam? Doloribus atque ipsum sapiente magni assumenda ratione non maiores facere minus aspernatur nam, sint fugiat consequatur, culpa neque dictaDolor modi ullam cumque ratione laboriosam beatae aut maiores, in nisi reprehenderit voluptate provident libero, ipsam est quaerat rerum natus deleniti distinctio ducimus, minima eum architecto aperiam quia corrupti! RecusandaeAccusamus sed labore possimus dolores enim? Iure, voluptatibus corporis! Provident eos harum dolorem, accusantium sed illum sequi officiis pariatur reprehenderit ex aut soluta vitae, qui nesciunt non animi quos quisquam.Quo maxime rem porro a animi esse libero consequuntur harum veniam eius laborum quas aliquid ut corporis possimus dignissimos, voluptatibus totam corrupti enim reprehenderit? Corporis dicta incidunt iusto ducimus iste.</p>', '41fbb36f87af43f5230bb50d90f7cad8.jpg', '12', '2019-07-22 03:13:57'),
(23, 'white', 0, '10000', '<p>cbbvvbvb</p>', '18509052e68889168422e7f387e654f9.jpg', '26', '2019-07-23 14:00:08');

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
(1, 'Market Places', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ', '804387664.png'),
(2, 'Cara Pesan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, yaqiea</p>', ''),
(3, 'Tentang Kami', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,a</p>', ''),
(4, '', 'asd as das dasd asd asd as', '3b317a6429affbf9afb03c131003a850.jpg'),
(5, '', 'jkab skd wkaskd as dan smd', 'b570565bf6b7b650d45da4aa357d4d42.jpg'),
(6, '', ' as dma smd,asd as dm w,a d,a s,d ,aw,d', '18509052e68889168422e7f387e654f9.jpg');

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
  `provinsi` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `tipe` int(1) DEFAULT NULL,
  `tipe_pembayaran` int(11) NOT NULL DEFAULT '1',
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_produk`, `kuantiti`, `id_user`, `provinsi`, `kabupaten`, `kurir`, `subtotal`, `ongkir`, `total`, `alamat`, `status`, `tipe`, `tipe_pembayaran`, `tanggaljam`) VALUES
(2, 'TR-0001', 22, 100, 4, '10', '41', 'jne', '', '29000', '429000', 'purwokerto', 2, 2, 1, '2019-07-23 11:22:04'),
(3, 'TR-0002', 21, 100, 4, '10', '41', 'jne', '', '29000', '529000', 'purwokerto', 2, 1, 2, '2019-07-23 11:26:42'),
(4, 'TR-0003', 20, 10, 4, '10', '41', 'jne', '', '29000', '109000', 'purwokerto', 2, 2, 2, '2019-07-23 11:38:58'),
(5, 'TR-0004', 22, 500, 7, '10', '41', 'jne', '', '74000', '2074000', 'kaliori ', 2, 1, 2, '2019-07-23 13:34:15'),
(6, 'TR-0005', 12, 50, 7, '10', '105', 'jne', '', '33000', '233000', 'cilacap', 0, 1, 2, '2019-07-23 15:39:05'),
(7, 'TR-0006', 23, 10, 4, '10', '41', 'tiki', '', '26000', '126000', 'purwokerto', 2, 2, 1, '2019-07-24 07:11:50'),
(8, 'TR-0007', 18, 100, 4, '5', '39', 'pos', '', '30000', '230000', 'jogja bagian tengah', 2, 1, 2, '2019-07-24 11:24:09');

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
(1, 'admin', 'ahmad yahya', 'admin@admin.admin', '$2y$10$.RlhnGI2lpTfhNv7tU3t7.QcdB5ItFgFZE/WhskC61UEJ1zLG4u/i', '62895357948031', 'purwokerto', 'super_admin', 0, '2019-07-01 00:00:00'),
(4, 'yaqie', 'ahmad yahya asy-syidqie', 'ahmadyahyay@gmail.com', '$2y$10$N3TN158dH6YxqQdPsg8hAefYydr2ep8C.QD.9lzZbU6xHEhItfgxW', '0895357948031', 'purwokerto', 'user', 1, '2019-07-08 10:24:52'),
(5, 'yahya', 'ahmad yahya asy-syidqie', 'ahmadyahyaasysyidqie@gmail.com', '$2y$10$tzTIHFy/OapxI/PFrKzFcuAr8Atl4zVf1Pln8F9lbIjMvQw.64JPq', '', '', 'user', 1, '2019-07-08 13:16:25'),
(6, 'anggi', 'Anggaraeni Wijayanti', 'anggaraeniwijayanti@gmail.com', '$2y$10$F451zYC.5KBjgauuJm0hZetY1rIja00PqdziuEFilbPwnGA0.Gp3W', '0899999999999', 'Kaliori rt 05 rt 05', 'user', 0, '2019-07-20 08:53:21'),
(7, 'njajal', 'Njajal Lah', 'njajal@gmail.com', '$2y$10$HrSAzU3UeCcQSEThz5nN0.c25qc4ZzfBuPC8WnWqDBZbKNGWNZmc.', '08999999999999', 'kaliori', 'user', 0, '2019-07-23 13:32:36'),
(8, 'anggi', '', 'anggi@gmail.com', '$2y$10$isGbaPCII/AJtIhqLePViejPH1gZhNANJawCuQGut1SGUxtDysB1q', '', '', 'super_admin', 0, '2019-07-23 13:50:53');

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

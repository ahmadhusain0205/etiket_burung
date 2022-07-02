-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 01:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `burung`
--

CREATE TABLE `burung` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `burung`
--

INSERT INTO `burung` (`id`, `nama`, `id_kelas`) VALUES
(1, 'Muray Batu', 1),
(2, 'Cucak Hijau', 1),
(3, 'Anis Merah', 1),
(4, 'Cucak Hijau', 3),
(6, 'Nuri', 3),
(7, 'Dara', 5),
(8, 'Dara', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gantangan_24`
--

CREATE TABLE `gantangan_24` (
  `id` int(11) NOT NULL,
  `no_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gantangan_24`
--

INSERT INTO `gantangan_24` (`id`, `no_kursi`) VALUES
(1, 14),
(2, 15),
(3, 16),
(4, 17),
(5, 20),
(6, 21),
(7, 22),
(8, 23),
(9, 26),
(10, 27),
(11, 28),
(12, 29),
(13, 32),
(14, 33),
(15, 34),
(16, 35),
(17, 38),
(18, 39),
(19, 40),
(20, 41),
(21, 44),
(22, 45),
(23, 46),
(24, 47);

-- --------------------------------------------------------

--
-- Table structure for table `gantangan_32`
--

CREATE TABLE `gantangan_32` (
  `id` int(11) NOT NULL,
  `no_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gantangan_32`
--

INSERT INTO `gantangan_32` (`id`, `no_kursi`) VALUES
(1, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 14),
(6, 15),
(7, 16),
(8, 17),
(9, 20),
(10, 21),
(11, 22),
(12, 23),
(13, 26),
(14, 27),
(15, 28),
(16, 29),
(17, 32),
(18, 33),
(19, 34),
(20, 35),
(21, 38),
(22, 39),
(23, 40),
(24, 41),
(25, 44),
(26, 45),
(27, 46),
(28, 47),
(29, 50),
(30, 51),
(31, 52),
(32, 53);

-- --------------------------------------------------------

--
-- Table structure for table `gantangan_60`
--

CREATE TABLE `gantangan_60` (
  `id` int(11) NOT NULL,
  `no_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gantangan_60`
--

INSERT INTO `gantangan_60` (`id`, `no_kursi`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kolom_1` text NOT NULL,
  `kolom_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `gambar`, `kolom_1`, `kolom_2`) VALUES
(1, 'lomba.jpg', 'Fusce lacinia, erat et maximus mollis, neque enim laoreet nisi, vitae imperdiet mauris mi nec augue. Aenean ullamcorper sit amet arcu ut interdum. Ut ultricies non ipsum sit amet pulvinar. Donec eu sapien aliquet, interdum metus pharetra, varius tortor. Donec facilisis metus at lacinia lacinia. Nam a cursus justo. Nam quis elit laoreet, dictum diam vitae, consequat lectus. Duis ante felis, commodo fermentum massa vitae, dapibus dapibus justo.', 'Fusce lacinia, erat et maximus mollis, neque enim laoreet nisi, vitae imperdiet mauris mi nec augue. Aenean ullamcorper sit amet arcu ut interdum. Ut ultricies non ipsum sit amet pulvinar. Donec eu sapien aliquet, interdum metus pharetra, varius tortor. Donec facilisis metus at lacinia lacinia. Nam a cursus justo. Nam quis elit laoreet, dictum diam vitae, consequat lectus. Duis ante felis, commodo fermentum massa vitae, dapibus dapibus justo.');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `jum_gantangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `harga`, `jum_gantangan`) VALUES
(1, 'Surya', 70000, 24),
(2, 'Sempurna', 100000, 32),
(3, 'Jimjog', 150000, 60),
(5, 'Sultan', 1000000, 24),
(6, 'Gereja', 35000, 60);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama_pemesan` varchar(200) NOT NULL,
  `no_hp_pemesan` varchar(15) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `panitia` varchar(200) NOT NULL,
  `nama_panitia` varchar(200) NOT NULL,
  `no_hp_panitia` varchar(15) NOT NULL,
  `alamat_panitia` text NOT NULL,
  `rekening_tujuan` varchar(20) NOT NULL,
  `nama_kelas` varchar(200) NOT NULL,
  `harga_kelas` int(11) NOT NULL,
  `nama_burung` varchar(200) NOT NULL,
  `nomor_kursi` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL DEFAULT current_timestamp(),
  `bukti` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'peserta');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`) VALUES
(1, '410685-russian-wallpaper-top-free-russian-background.jpg'),
(2, '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `on_off` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `no_rekening` varchar(20) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `on_off`, `nama`, `alamat`, `no_hp`, `gambar`, `no_rekening`, `id_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin ku', 'Magelang', '123456789', 'default.png', '1234567890', 1),
(13, 'ahmadhusain', '0a61eae58bcb5869aee9c0ba6753180a', 1, 'Ahmad Husain', 'Mungkid, Magelang', '0895363260970', 'default.png', NULL, 2),
(14, 'admin123', '0192023a7bbd73250516f069df18b500', 0, 'admin 123', 'asdasd', '3333', 'default.png', '122211111', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burung`
--
ALTER TABLE `burung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gantangan_24`
--
ALTER TABLE `gantangan_24`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gantangan_32`
--
ALTER TABLE `gantangan_32`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gantangan_60`
--
ALTER TABLE `gantangan_60`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burung`
--
ALTER TABLE `burung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gantangan_24`
--
ALTER TABLE `gantangan_24`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gantangan_32`
--
ALTER TABLE `gantangan_32`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gantangan_60`
--
ALTER TABLE `gantangan_60`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

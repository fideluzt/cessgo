-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 10:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cessgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `npm` varchar(20) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `ket` enum('hadir','tidak hadir','','') NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_studi`
--

CREATE TABLE `bidang_studi` (
  `id` int(11) NOT NULL,
  `nama_bidang` varchar(128) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL,
  `mentor` varchar(128) NOT NULL DEFAULT '-',
  `foto` varchar(128) NOT NULL,
  `video` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_studi`
--

INSERT INTO `bidang_studi` (`id`, `nama_bidang`, `deskripsi`, `kuota`, `mentor`, `foto`, `video`) VALUES
(16, 'Web Junior 2', 'Merupakan bidang yang paling ditakuti dan disegani', 25, 'Irpansyah', '62b90b247355d.jpg', 'web_junior12.mp4'),
(17, 'Web Junior 1', 'Beajar HTML, CSS, dan Javascript', 20, 'Irpansyah', '62b90b60dd5fe.jpg', 'web_junior12.mp4'),
(18, 'Design Grafis', 'merupakan bidang yang sangat banyak juga diminati', 25, 'Irpansyah', '62bea21fa19f5.png', 'design-grafis.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `ruang` varchar(15) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `mentor` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `ruang`, `kelas`, `waktu`, `mentor`) VALUES
(8, 'Sabtu', 'Ruang 1', 'Web Junior 2', '13:56', 'Irpansyah');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `npm` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `testimoni` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ket` int(3) NOT NULL DEFAULT 3 COMMENT '1 = Diterima, 2 = Ditolak 3 = Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`npm`, `nama`, `title`, `testimoni`, `foto`, `ket`) VALUES
('062140720451', 'Baim', 'Peserta Web Junior 2', 'asd', '62b91c3d9ea0c.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `level` enum('admin','mentor','mahasiswa') CHARACTER SET utf8mb4 NOT NULL,
  `foto` varchar(128) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `email`, `password`, `kelas`, `level`, `foto`) VALUES
(1, 'admin', 'Fidel', 'fidel@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'user.jpg'),
(40, '062140720450', 'Irpansyah', 'irpansyah810@gmail.com', '202cb962ac59075b964b07152d234b70', 'Web Junior 1', 'mentor', 'user.jpg'),
(41, '062140720451', 'Baim', 'Baim@gmail.com', '202cb962ac59075b964b07152d234b70', 'Web Junior 2', 'mahasiswa', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

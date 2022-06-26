-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 03:08 PM
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
-- Table structure for table `bidang_studi`
--

CREATE TABLE `bidang_studi` (
  `id` int(11) NOT NULL,
  `nama_bidang` varchar(128) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL,
  `mentor` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_studi`
--

INSERT INTO `bidang_studi` (`id`, `nama_bidang`, `deskripsi`, `kuota`, `mentor`, `foto`) VALUES
(8, 'Fotografi', 'Merupakan Jenis Bidang Yang sangat banyak diminati oleh mahasiswa dan tidak hanya itu bidang ini juga murah serta mudah untuk dipelajari ya guys ya.', 50, 'Irpan dan Amal', 'Fotografi.jpg'),
(9, 'Web Design', 'Merupakan Jenis Bidang Yang sangat banyak diminati oleh mahasiswa dan tidak hanya itu bidang ini juga murah serta mudah untuk dipelajari ya guys ya.', 45, 'Irpan dan Amal', 'Web Design.jpg'),
(10, 'Robot', 'Merupakan Jenis Bidang Yang sangat banyak diminati oleh mahasiswa dan tidak hanya itu bidang ini juga murah serta mudah untuk dipelajari ya guys ya.', 40, 'Irpan dan Amal', 'Robot.jpg'),
(11, 'Design Grafis', 'Merupakan Jenis Bidang Yang sangat banyak diminati oleh mahasiswa dan tidak hanya itu bidang ini juga murah serta mudah untuk dipelajari ya guys ya.', 35, 'Irpan dan Amal', 'Design Grafis.jpg'),
(12, 'Database', 'Merupakan Jenis Bidang Yang sangat banyak diminati oleh mahasiswa dan tidak hanya itu bidang ini juga murah serta mudah untuk dipelajari ya guys ya.', 30, 'Irpan dan Amal', 'Database.jpg'),
(13, 'Audio Visual', 'Merupakan Jenis Bidang Yang sangat banyak diminati oleh mahasiswa dan tidak hanya itu bidang ini juga murah serta mudah untuk dipelajari ya guys ya.', 25, 'Irpan dan Amal', 'Audio Visual.jpg');

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
(1, 'Senin', 'Ruang 1', 'Photograpy', '13.00 WIB', ''),
(2, 'Selasa', 'Ruang 2', 'Web Developer', '09.00 WIB', ''),
(3, 'Rabu', 'Ruang 3', 'Robot', '10.00 WIB', ''),
(4, 'Kamis', 'Ruang 4', 'Design Grafis', '14.00 WIB', ''),
(5, 'Jumat', 'Ruang 5', 'Database', '14.00 WIB', ''),
(6, 'Sabtu', 'Ruang 6', 'Audio Visual', '09.00 WIB', '');

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
(33, '062140720450', 'Irpansyah', 'irpansyah@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Robot', 'mahasiswa', '62b83e856bd05.jpg');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

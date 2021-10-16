-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 01:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Sandika Galih', 'sandika', 'sandika1'),
(2, 'Agung Wahyu', 'agung', '$2y$10$tpi/s.3f/Kk/c2gtyCStJOk/8l3sq.aVxy5KJNP8HQ0hihVuFkwDK'),
(4, 'Gung Prami', 'prami', 'prami1');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(225) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `cover` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `kode_buku`, `cover`) VALUES
(14, 'Tate no Yusha', 'Yusagi Aneko, A. Kyu', 'Kinema Citrus', '00001', '613771f7e3503.jpg'),
(42, 'Menanti Hari Berganti', 'Titi Sanaria', 'Storial', '00002', '613a2abf84c33.jpeg'),
(43, 'Hunter x Hunter', 'Yoshihiro Togashi', '	Shueisha', '00003', '613a2b31b0412.jpg'),
(44, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '00004', '613a2b72f0637.jpg'),
(45, 'Harry Potter', 'J. K. Rowling', 'Bloomsbury Publishing', '00005', '613a2c4055e0a.jpg'),
(46, 'One Piece', 'Eiichiro Oda', 'Elex Media', '00006', '613a2cd24c9f8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `username`, `password`, `email`) VALUES
(5, 'Agung Kusuma', 'kusuma', '$2y$10$0oBUshasKz/Ahi9ErVm/SOPTuwA2VG4v9ohhF7yRkIE9vPRspWUDm', 'gungkusuma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `username`, `email`, `password`) VALUES
(2, 'Agung Wahyu', '28003', 'agungwahyu@gmail.com', '$2y$10$kGZxxU.2oV084B/VoNcdKO58FfGrcxtS8M.2bPybaBkrv.eGe8iMi'),
(7, 'GilangRahadi', '28004', 'gilangrahadi@gmail.com', '$2y$10$fGF.2kQJInkTytHYjAgGS.vt91Q4SOtL/8Bs8xMtKxrOqzGgBu3qe'),
(8, 'Rossi Gendut', '28007', 'rossisuartama10@gmail.com', '$2y$10$RCwdUsJ8QtaDIEimH4rwlOZAm1CFlDg5qKfmjOhbPXFaASjB1Bed2'),
(12, 'Wayan Kusuma', '28006', 'wayankusuma@gmail.com', '$2y$10$SMJYlV5Qh1dDUshswHlhPe81bYTR.A/zZhnNAb//IrCxiOVi5bNpa'),
(13, 'Bisma Kusuma', '28016', 'bismakusuma2@gmail.com', '$2y$10$PGdVY4eonCcbhuTos3KxpOGbTP4xGriiwqjOguEd.B8NXXPQbI00C'),
(14, 'Agung Bima', '28017', 'agungbima2gmail.com', '$2y$10$nSVI14C9y4i6FTB.jC5NCemKewhjxe5rcElp0o3Jvq5/5R2arLSQq');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_pinjam` varchar(10) NOT NULL,
  `tgl_kembali` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

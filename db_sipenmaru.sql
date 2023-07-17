-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2022 at 02:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipenmaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_calon_mhs`
--

CREATE TABLE `tb_calon_mhs` (
  `NIK` varchar(30) NOT NULL,
  `Nama_Lengkap` varchar(60) NOT NULL,
  `Tempat_lahir` varchar(60) NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `Jenis_Kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `Agama` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `Alamat` varchar(60) NOT NULL,
  `Desa` varchar(16) NOT NULL,
  `Kecamatan` varchar(16) NOT NULL,
  `Kabupaten` varchar(16) NOT NULL,
  `Provinsi` varchar(16) NOT NULL,
  `KodePos` int(6) NOT NULL,
  `Foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `Kode_DaftarAkun` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Nama_Lengkap` varchar(60) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `Kode_Jurusan` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Nama_jurusan` varchar(40) NOT NULL,
  `SK_Jurusan` int(11) NOT NULL,
  `Ketua_Jurusan` varchar(40) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `KodeLogin` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NamaLengkap` varchar(60) NOT NULL,
  `Level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `Kode_Prodi` int(5) NOT NULL,
  `Kode_Jurusan` int(10) NOT NULL,
  `Nama_Prodi` varchar(40) NOT NULL,
  `SK_Prodi` int(11) NOT NULL,
  `Ketua_Prodi` varchar(40) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_pend`
--

CREATE TABLE `tb_riwayat_pend` (
  `Kode_Pendidikan` int(5) UNSIGNED ZEROFILL NOT NULL,
  `NIK` varchar(30) NOT NULL,
  `Jenjang_Pend` varchar(20) NOT NULL,
  `Nama_sekolah` varchar(40) NOT NULL,
  `Tahun_masuk` date NOT NULL,
  `Tahun_lulus` date NOT NULL,
  `Nilai` int(3) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sipenmaru`
--

CREATE TABLE `tb_sipenmaru` (
  `Kode_Sipenmaru` int(5) UNSIGNED ZEROFILL NOT NULL,
  `No_Daftar` int(5) UNSIGNED ZEROFILL NOT NULL,
  `NIK` varchar(30) NOT NULL,
  `Pilihan1` varchar(40) NOT NULL,
  `Pilihan2` varchar(40) NOT NULL,
  `Tgl_Daftar` date NOT NULL,
  `Status` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_calon_mhs`
--
ALTER TABLE `tb_calon_mhs`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`Kode_DaftarAkun`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`Kode_Jurusan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`KodeLogin`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`Kode_Prodi`);

--
-- Indexes for table `tb_riwayat_pend`
--
ALTER TABLE `tb_riwayat_pend`
  ADD PRIMARY KEY (`Kode_Pendidikan`);

--
-- Indexes for table `tb_sipenmaru`
--
ALTER TABLE `tb_sipenmaru`
  ADD PRIMARY KEY (`Kode_Sipenmaru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `Kode_DaftarAkun` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `Kode_Jurusan` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `KodeLogin` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `Kode_Prodi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_riwayat_pend`
--
ALTER TABLE `tb_riwayat_pend`
  MODIFY `Kode_Pendidikan` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

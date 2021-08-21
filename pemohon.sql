-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2021 pada 15.45
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptslbm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `id_jk` int(11) NOT NULL,
  `desa_pemohon` varchar(11) NOT NULL,
  `kecamatan_pemohon` varchar(11) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `id_jenis_pemohon` int(11) NOT NULL,
  `nik_pemohon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id_jk`, `desa_pemohon`, `kecamatan_pemohon`, `nama_pemohon`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `kabupaten`, `id_jenis_pemohon`, `nik_pemohon`) VALUES
(2, 'Seoul xxx', 'Pleret', 'SeulRene', '08562165131', 'Seoul xxx', '2021-08-01', 'Idol', 'Atheis', 'Jepang Timur', 2, 1),
(2, 'Seoul', 'Pleret', 'SeulRene', '08562165131', 'Seoul', '2021-08-01', 'Idol', 'Atheis', 'Jepang Timur', 2, 123);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`nik_pemohon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

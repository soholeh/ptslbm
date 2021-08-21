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
-- Struktur dari tabel `pengukuran`
--

CREATE TABLE `pengukuran` (
  `id_pengukuran` int(11) NOT NULL,
  `nik_pemohon` int(11) NOT NULL,
  `id_alash` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nub` int(11) NOT NULL,
  `luas_pengukuran` int(11) NOT NULL,
  `penggunaan_tanah` varchar(255) NOT NULL,
  `tanda_batas` varchar(255) NOT NULL,
  `no_pbt` int(11) NOT NULL,
  `no_gu` int(11) NOT NULL,
  `no_berkas_fisik` int(11) NOT NULL,
  `nib` int(11) NOT NULL,
  `id_klaster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengukuran`
--

INSERT INTO `pengukuran` (`id_pengukuran`, `nik_pemohon`, `id_alash`, `id_user`, `nub`, `luas_pengukuran`, `penggunaan_tanah`, `tanda_batas`, `no_pbt`, `no_gu`, `no_berkas_fisik`, `nib`, `id_klaster`) VALUES
(1, 1, 1, 1, 1, 1, '1', '1', 1, 1, 1, 1, 1),
(4, 1, 0, 1, 2, 2, '2', '2', 2, 2, 2, 2, 4),
(5, 1, 0, 4, 1, 1, '1', '1', 1, 1, 2, 2, 4),
(6, 0, 0, 5, 2, 2, '2', '2', 2, 2, 2, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD PRIMARY KEY (`id_pengukuran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  MODIFY `id_pengukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

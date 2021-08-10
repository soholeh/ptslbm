-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2021 pada 14.40
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

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
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `kode_desa` varchar(50) NOT NULL,
  `nama_desa` varchar(225) NOT NULL,
  `kabupaten` varchar(225) NOT NULL,
  `reje_kampung` varchar(225) NOT NULL,
  `nama_camat` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kecamatan`, `kode_desa`, `nama_desa`, `kabupaten`, `reje_kampung`, `nama_camat`, `nip`, `alamat`, `kode_pos`) VALUES
(1, 9, '01221317', 'Bele Atu', 'Tinggi', 'Namsyiah', 'Camatan', '22535125', 'Bukit tinggi aja', '12435'),
(2, 1, '01221325', 'Blang Ara', 'Tinggi', 'Siomi', 'Rareti', '2222', 'Pelemwulung', '55198'),
(3, 3, '01221326', 'Tingkem Asli', 'Tinggi', 'Nona', 'Ana', '2324555', 'Tempelan', '33456'),
(4, 4, '01221327', 'Tingkem Ori', 'Tinggi', 'Nana', 'Nina', '2324555', 'Tempelan', '33456'),
(5, 5, '01221326', 'Ketandan', 'Rendah', 'Mama', 'Papa', '2324999', 'Ketandan Raya', '33457'),
(6, 6, '01221632', 'Tingkem Palsu', 'Sedang', 'Mbuh', 'Rareti', '2324567', 'Yungalah', '33451'),
(7, 7, '123456', 'babadan', 'banguntapan', 'sopo', 'kowe', '432341', 'jl mboh', '55198'),
(8, 0, '123', 'Ketandan', 'Tinggi', 'Nana', 'Rareti', '123', 'qweeq', '123'),
(9, 10, '321', 'Babadan Baru', 'Rendah', 'Nana', 'Nina', '321', 'qwer', '321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_ajudikasi`
--

CREATE TABLE `jabatan_ajudikasi` (
  `id_jabatan_ajudikasi` int(11) NOT NULL,
  `jabatan_ajudikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan_ajudikasi`
--

INSERT INTO `jabatan_ajudikasi` (`id_jabatan_ajudikasi`, `jabatan_ajudikasi`) VALUES
(1, 'Ketua Panitia Ajudikasi\r\n'),
(2, 'Wakil Ketua Bidang Fisik\r\n'),
(3, 'Wakil Ketua Bidang Yuridis\r\n'),
(4, 'Sekretaris\r\n'),
(5, 'Anggota Panitia Ajudikasi (I)\r\n'),
(6, 'Anggota Panitia Ajudikasi (II)\r\n'),
(7, 'Anggota Panitia Ajudikasi (III)\r\n'),
(8, 'Anggota Panitia Ajudikasi (IV)\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `nama_jk`) VALUES
(1, 'Peria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Bandar'),
(2, 'Bener Kelipah'),
(3, 'Bukit'),
(4, 'Gajah Putih'),
(5, 'Mesidah'),
(6, 'Permata'),
(7, 'Pintu Rime Gayo'),
(8, 'Syiah Utama'),
(9, 'Timah Gajah'),
(10, 'Wih Pesam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Petugas Yuridis'),
(3, 'Petugas Pengukuran'),
(4, 'Petugas Desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panitia_ajudikasi`
--

CREATE TABLE `panitia_ajudikasi` (
  `nama_pegawai` varchar(255) NOT NULL,
  `NIP` int(11) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `id_jabatan_ajudikasi` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panitia_ajudikasi`
--

INSERT INTO `panitia_ajudikasi` (`nama_pegawai`, `NIP`, `golongan`, `jabatan`, `id_jabatan_ajudikasi`, `id_proyek`) VALUES
('Mustafa', 1, 'Ketua', 'Ketua', 1, 2),
('Alhalim', 2, 'Wakil Ketua', 'Wakil Ketua', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penlok`
--

CREATE TABLE `penlok` (
  `id_penlok` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `jumlah_persil` int(11) NOT NULL,
  `no_sk_penlok` varchar(255) NOT NULL,
  `tgl_sk_penlok` date NOT NULL,
  `id_kecamatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penlok`
--

INSERT INTO `penlok` (`id_penlok`, `id_proyek`, `id_desa`, `jumlah_persil`, `no_sk_penlok`, `tgl_sk_penlok`, `id_kecamatan`) VALUES
(1, 2, 1, 1000, '41/KEP-100.02.UP.11.04/I/2020 ', '2021-08-05', '1'),
(2, 2, 2, 1000, '41/KEP-100.02.UP.11.04/I/2020 ', '2021-08-05', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(225) NOT NULL,
  `tahun_proyek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `tahun_proyek`) VALUES
(1, 'PTSLp', '2020'),
(2, 'PTSL', '2021'),
(3, 'PTSL', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saksi`
--

CREATE TABLE `saksi` (
  `id_saksi` int(11) NOT NULL,
  `nik_saksi` varchar(100) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `nama_saksi` varchar(225) NOT NULL,
  `alamat_saksi` text NOT NULL,
  `temp_lahir_saksi` varchar(225) NOT NULL,
  `desa_saksi` varchar(255) NOT NULL,
  `tgl_lahir_saksi` date NOT NULL,
  `kecamatan_saksi` varchar(255) NOT NULL,
  `pekerjaan_saksi` varchar(255) NOT NULL,
  `kabupaten_saksi` varchar(255) NOT NULL,
  `agama_saksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saksi`
--

INSERT INTO `saksi` (`id_saksi`, `nik_saksi`, `id_jk`, `nama_saksi`, `alamat_saksi`, `temp_lahir_saksi`, `desa_saksi`, `tgl_lahir_saksi`, `kecamatan_saksi`, `pekerjaan_saksi`, `kabupaten_saksi`, `agama_saksi`) VALUES
(1, '1117030205780001', 1, 'SYAFRI', 'Dimana mana', 'Aceh', 'Perorangan', '1995-02-06', 'Bukit', 'Swasta', 'Bener Meriah', 'Islam'),
(2, '1117030205780004', 1, 'RISWANDI', 'Orareti', 'Banda', 'Perorangan', '1997-02-02', 'Bukit', 'Swasta', 'Tinggi', 'Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `user_nama`, `password`, `id_desa`, `id_level`, `id_proyek`) VALUES
(1, 'Muhammad Solehudin', 'soleh', 'soleh', 9, 1, 1),
(2, 'Alhalim Nova', 'basuki', 'basuki', 9, 3, 1),
(4, 'Idal Ganda', 'idal', 'idal', 4, 2, 1),
(5, 'Dimas Pitera', 'dimas', 'dimas', 9, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indeks untuk tabel `saksi`
--
ALTER TABLE `saksi`
  ADD PRIMARY KEY (`id_saksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `saksi`
--
ALTER TABLE `saksi`
  MODIFY `id_saksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

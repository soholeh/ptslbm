-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2021 pada 06.05
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
-- Database: `pts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ahli_waris`
--

CREATE TABLE `ahli_waris` (
  `id_ahli_waris` int(11) NOT NULL,
  `nik_ahli_waris` varchar(255) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `nama_ahli_waris` varchar(255) NOT NULL,
  `temp_lahir_ahli_waris` varchar(255) NOT NULL,
  `desa_ahli_waris` varchar(255) NOT NULL,
  `tgl_lahir_ahli_waris` date DEFAULT NULL,
  `kecamatan_ahli_waris` varchar(255) NOT NULL,
  `pekerjaan_ahli_waris` varchar(255) NOT NULL,
  `kabupaten_ahli_waris` varchar(255) NOT NULL,
  `agama_ahli_waris` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ahli_waris`
--

INSERT INTO `ahli_waris` (`id_ahli_waris`, `nik_ahli_waris`, `id_jk`, `nama_ahli_waris`, `temp_lahir_ahli_waris`, `desa_ahli_waris`, `tgl_lahir_ahli_waris`, `kecamatan_ahli_waris`, `pekerjaan_ahli_waris`, `kabupaten_ahli_waris`, `agama_ahli_waris`) VALUES
(2, '1', 2, 'ab', 'ab                    ', 'ab', '2021-08-12', 'ab', 'ab                    ', 'ab', 'ab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_alas_hak`
--

CREATE TABLE `bukti_alas_hak` (
  `id_bah` int(11) NOT NULL,
  `id_jah` int(11) NOT NULL,
  `id_klaster` int(11) NOT NULL,
  `id_ss` int(11) NOT NULL,
  `nama_alas_hak` varchar(255) NOT NULL,
  `nomor_alas_hak` varchar(255) NOT NULL,
  `tgl_alas_hak` date NOT NULL,
  `pembuat_alas_hak` varchar(255) NOT NULL,
  `luas_yang_dimohon` varchar(255) NOT NULL,
  `bt_utara` varchar(255) NOT NULL,
  `bt_timur` varchar(255) NOT NULL,
  `bt_selatan` varchar(255) NOT NULL,
  `bt_barat` varchar(255) NOT NULL,
  `harga_bah` int(100) NOT NULL,
  `nama_alm` varchar(255) NOT NULL,
  `tgl_alm` date NOT NULL,
  `desa_alm` varchar(255) NOT NULL,
  `kecamatan_alm` varchar(255) NOT NULL,
  `kabupaten_alm` varchar(255) NOT NULL,
  `desa_akhir` varchar(255) NOT NULL,
  `kecamatan_akhir` varchar(255) NOT NULL,
  `kabupaten_akhir` varchar(255) NOT NULL,
  `kawin_dengan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukti_alas_hak`
--

INSERT INTO `bukti_alas_hak` (`id_bah`, `id_jah`, `id_klaster`, `id_ss`, `nama_alas_hak`, `nomor_alas_hak`, `tgl_alas_hak`, `pembuat_alas_hak`, `luas_yang_dimohon`, `bt_utara`, `bt_timur`, `bt_selatan`, `bt_barat`, `harga_bah`, `nama_alm`, `tgl_alm`, `desa_alm`, `kecamatan_alm`, `kabupaten_alm`, `desa_akhir`, `kecamatan_akhir`, `kabupaten_akhir`, `kawin_dengan`) VALUES
(1, 8, 4, 2, 'b', 'b', '2021-08-01', 'b', 'b', 'b', 'b', 'b', 'b', 1234, 'b', '2021-08-02', 'b', 'b', 'b', 'b', 'b', 'b', 'b'),
(3, 2, 2, 1, 'Akta Jual Aja', '01/BKT/AJB/2021', '2021-08-01', 'sopo', '100m', 'n', 'e', 's', 'w', 1000000, 'sopo', '2021-01-01', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

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
(4, 10, '01221412', 'Wih Pesam', 'Tinggi', 'Nana', 'Nina', '2324555', 'Tempelan', '33456');

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
-- Struktur dari tabel `jenis_alas_hak`
--

CREATE TABLE `jenis_alas_hak` (
  `id_jah` int(11) NOT NULL,
  `nama_jah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_alas_hak`
--

INSERT INTO `jenis_alas_hak` (`id_jah`, `nama_jah`) VALUES
(1, 'Sertipikat'),
(2, 'Pelelangan'),
(3, 'Putusan Pemberian Hak'),
(4, 'Jual Beli'),
(5, 'Hibah-Pemberian'),
(6, 'Warisan'),
(7, 'Garap / Usaha Sendiri'),
(8, 'Ganti Usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_hak`
--

CREATE TABLE `jenis_hak` (
  `id_jh` int(11) NOT NULL,
  `nama_jh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_hak`
--

INSERT INTO `jenis_hak` (`id_jh`, `nama_jh`) VALUES
(1, 'Hak Milik'),
(2, 'Hak Guna Bangunan'),
(3, 'Hak Guna Usaha'),
(4, 'Hak Pakai'),
(5, 'Hak Wakaf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `nama_jk`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pemohon`
--

CREATE TABLE `jenis_pemohon` (
  `id_jenis_pemohon` int(11) NOT NULL,
  `jenis_pemohon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pemohon`
--

INSERT INTO `jenis_pemohon` (`id_jenis_pemohon`, `jenis_pemohon`) VALUES
(1, 'Perorangan'),
(2, 'Badan Hukum'),
(3, 'Pemerintah Kabupaten'),
(4, 'Pemerintah Desa'),
(5, 'BUMN');

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
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `nik_keluarga` varchar(255) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `nama_keluarga` varchar(255) NOT NULL,
  `temp_lahir_keluarga` varchar(255) NOT NULL,
  `desa_keluarga` varchar(255) NOT NULL,
  `tgl_lahir_keluarga` date NOT NULL,
  `kecamatan_keluarga` varchar(255) NOT NULL,
  `pekerjaan_keluarga` varchar(255) NOT NULL,
  `kabupaten_keluarga` varchar(255) NOT NULL,
  `agama_keluarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `klaster`
--

CREATE TABLE `klaster` (
  `id_klaster` int(11) NOT NULL,
  `nama_klaster` varchar(255) NOT NULL,
  `keterangan_klaster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klaster`
--

INSERT INTO `klaster` (`id_klaster`, `nama_klaster`, `keterangan_klaster`) VALUES
(1, 'K1', 'yang Ikut Mendaftarkan Tanahanya untuk di Sertipikatan'),
(2, 'K2', 'Tanah yang Sengketa ( Pengadilan maupun mediasi di desa )'),
(3, 'K3', 'tanah yang Subjeknya tidak di ketahui / Tidak ikut Mendaftarkan tanahnya untuk di Sertipikatkan'),
(4, 'K4', 'Tanah yang sudah Terbit Sertipikat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuasa`
--

CREATE TABLE `kuasa` (
  `id_kuasa` int(11) NOT NULL,
  `nik_kuasa` varchar(255) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `nama_kuasa` varchar(255) NOT NULL,
  `temp_lahir_kuasa` varchar(255) NOT NULL,
  `desa_kuasa` varchar(255) NOT NULL,
  `tgl_lahir_kuasa` date NOT NULL,
  `kecamatan_kuasa` varchar(255) NOT NULL,
  `pekerjaan_kuasa` varchar(255) NOT NULL,
  `kabupaten_kuasa` varchar(255) NOT NULL,
  `agama_kuasa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuasa`
--

INSERT INTO `kuasa` (`id_kuasa`, `nik_kuasa`, `id_jk`, `nama_kuasa`, `temp_lahir_kuasa`, `desa_kuasa`, `tgl_lahir_kuasa`, `kecamatan_kuasa`, `pekerjaan_kuasa`, `kabupaten_kuasa`, `agama_kuasa`) VALUES
(2, '11', 2, 'a', 'a', 'aq', '2021-08-12', 'aa', 'aa', 'aa', 'aa');

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
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `nik` varchar(255) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `id_jenis_pemohon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`nik`, `id_jk`, `id_desa`, `id_kecamatan`, `nama_pemohon`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `kabupaten`, `id_jenis_pemohon`) VALUES
('340189851223', 2, 1, 1, 'Irene', '08562165131', 'Seoul', '1999-08-06', 'Idol', 'Atheis', 'Bener Meriah', 5),
('340189851333', 1, 3, 10, 'Leh Min Ho', '081227917430', 'Korea', '1993-12-01', 'Pedagang', 'Islam', 'Bener Meriah', 5);

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
-- Struktur dari tabel `penyanggah`
--

CREATE TABLE `penyanggah` (
  `id_penyanggah` int(11) NOT NULL,
  `nik_penyanggah` varchar(255) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `nama_penyanggah` varchar(255) NOT NULL,
  `temp_lahir_penyanggah` varchar(255) NOT NULL,
  `desa_penyanggah` varchar(255) NOT NULL,
  `tgl_lahir_penyanggah` date NOT NULL,
  `kecamatan_penyanggah` varchar(255) NOT NULL,
  `pekerjaan_penyanggah` varchar(255) NOT NULL,
  `kabupaten_penyanggah` varchar(255) NOT NULL,
  `agama_penyanggah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyanggah`
--

INSERT INTO `penyanggah` (`id_penyanggah`, `nik_penyanggah`, `id_jk`, `nama_penyanggah`, `temp_lahir_penyanggah`, `desa_penyanggah`, `tgl_lahir_penyanggah`, `kecamatan_penyanggah`, `pekerjaan_penyanggah`, `kabupaten_penyanggah`, `agama_penyanggah`) VALUES
(2, '2222', 2, 'bb', 'bb', 'bb', '2021-08-12', 'bb', 'bb', 'bb', 'bb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pihak_pertama`
--

CREATE TABLE `pihak_pertama` (
  `id_pihak_pertama` int(11) NOT NULL,
  `nik_pihak_pertama` varchar(255) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `nama_pihak_pertama` varchar(255) NOT NULL,
  `temp_lahir_pihak_pertama` varchar(255) NOT NULL,
  `desa_pihak_pertama` varchar(255) NOT NULL,
  `tgl_lahir_pihak_pertama` date NOT NULL,
  `kecamatan_pihak_pertama` varchar(255) NOT NULL,
  `pekerjaan_pihak_pertama` varchar(255) NOT NULL,
  `kabupaten_pihak_pertama` varchar(255) NOT NULL,
  `agama_pihak_pertama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pihak_pertama`
--

INSERT INTO `pihak_pertama` (`id_pihak_pertama`, `nik_pihak_pertama`, `id_jk`, `nama_pihak_pertama`, `temp_lahir_pihak_pertama`, `desa_pihak_pertama`, `tgl_lahir_pihak_pertama`, `kecamatan_pihak_pertama`, `pekerjaan_pihak_pertama`, `kabupaten_pihak_pertama`, `agama_pihak_pertama`) VALUES
(4, '212222', 2, 'a', 'a', 'a', '2021-08-12', 's', 'a', 'a', 'a');

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
(1, 'PTSL', '2020'),
(2, 'PTSL', '2021'),
(3, 'PTSL', '2022'),
(4, 'PTSL', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saksi`
--

CREATE TABLE `saksi` (
  `id_saksi` int(11) NOT NULL,
  `nik_saksi` varchar(100) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `nama_saksi` varchar(225) NOT NULL,
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

INSERT INTO `saksi` (`id_saksi`, `nik_saksi`, `id_jk`, `nama_saksi`, `temp_lahir_saksi`, `desa_saksi`, `tgl_lahir_saksi`, `kecamatan_saksi`, `pekerjaan_saksi`, `kabupaten_saksi`, `agama_saksi`) VALUES
(1, '1117030205780001', 1, 'SYAFRI', 'Aceh', 'Perorangan', '1995-02-06', 'Bukit', 'Swasta', 'Bener Meriah', 'Islam'),
(2, '1117030205780002', 2, 'RISWANDIy', 'Bandaa', 'Perorangann', '1997-02-01', 'Bukitt', 'Swastaa', 'Tinggii', 'Islamm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_surat`
--

CREATE TABLE `status_surat` (
  `id_ss` int(11) NOT NULL,
  `nama_ss` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_surat`
--

INSERT INTO `status_surat` (`id_ss`, `nama_ss`) VALUES
(1, 'Asli'),
(2, 'Foto Kopi');

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
(1, 'Muhammad Solehudin', 'soleh', 'soleh', 2, 1, 2),
(2, 'Alhalim Nova', 'basuki', 'basuki', 1, 3, 1),
(4, 'Idal Ganda', 'idal', 'idal', 4, 2, 1),
(5, 'Dimas Pitera A', 'dimas', 'dimas', 1, 1, 3),
(6, 'Faris Taqiyuddin', 'faris', 'faris', 3, 4, 2),
(7, 'pyuridis', 'py', 'py', 2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ahli_waris`
--
ALTER TABLE `ahli_waris`
  ADD PRIMARY KEY (`id_ahli_waris`);

--
-- Indeks untuk tabel `bukti_alas_hak`
--
ALTER TABLE `bukti_alas_hak`
  ADD PRIMARY KEY (`id_bah`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `jabatan_ajudikasi`
--
ALTER TABLE `jabatan_ajudikasi`
  ADD PRIMARY KEY (`id_jabatan_ajudikasi`);

--
-- Indeks untuk tabel `jenis_alas_hak`
--
ALTER TABLE `jenis_alas_hak`
  ADD PRIMARY KEY (`id_jah`);

--
-- Indeks untuk tabel `jenis_hak`
--
ALTER TABLE `jenis_hak`
  ADD PRIMARY KEY (`id_jh`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `jenis_pemohon`
--
ALTER TABLE `jenis_pemohon`
  ADD PRIMARY KEY (`id_jenis_pemohon`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indeks untuk tabel `klaster`
--
ALTER TABLE `klaster`
  ADD PRIMARY KEY (`id_klaster`);

--
-- Indeks untuk tabel `kuasa`
--
ALTER TABLE `kuasa`
  ADD PRIMARY KEY (`id_kuasa`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `panitia_ajudikasi`
--
ALTER TABLE `panitia_ajudikasi`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `penlok`
--
ALTER TABLE `penlok`
  ADD PRIMARY KEY (`id_penlok`);

--
-- Indeks untuk tabel `penyanggah`
--
ALTER TABLE `penyanggah`
  ADD PRIMARY KEY (`id_penyanggah`);

--
-- Indeks untuk tabel `pihak_pertama`
--
ALTER TABLE `pihak_pertama`
  ADD PRIMARY KEY (`id_pihak_pertama`);

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
-- Indeks untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  ADD PRIMARY KEY (`id_ss`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ahli_waris`
--
ALTER TABLE `ahli_waris`
  MODIFY `id_ahli_waris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bukti_alas_hak`
--
ALTER TABLE `bukti_alas_hak`
  MODIFY `id_bah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_alas_hak`
--
ALTER TABLE `jenis_alas_hak`
  MODIFY `id_jah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis_hak`
--
ALTER TABLE `jenis_hak`
  MODIFY `id_jh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_pemohon`
--
ALTER TABLE `jenis_pemohon`
  MODIFY `id_jenis_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `klaster`
--
ALTER TABLE `klaster`
  MODIFY `id_klaster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kuasa`
--
ALTER TABLE `kuasa`
  MODIFY `id_kuasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penlok`
--
ALTER TABLE `penlok`
  MODIFY `id_penlok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penyanggah`
--
ALTER TABLE `penyanggah`
  MODIFY `id_penyanggah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pihak_pertama`
--
ALTER TABLE `pihak_pertama`
  MODIFY `id_pihak_pertama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `saksi`
--
ALTER TABLE `saksi`
  MODIFY `id_saksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  MODIFY `id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

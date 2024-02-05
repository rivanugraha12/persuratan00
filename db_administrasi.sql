-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2024 pada 15.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_administrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keluar`
--

CREATE TABLE `tbl_keluar` (
  `id_keluar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_keluar`
--

INSERT INTO `tbl_keluar` (`id_keluar`, `tanggal`, `kode_surat`, `tujuan`, `perihal`, `deskripsi`, `file`) VALUES
(1, '2024-01-20', 'ddd', 'adxsd', 'cdsa', 'stupeeeen', 'Proposal_Sponsorship_DIESNATALIES.docx'),
(3, '2024-01-20', '009', 'awall', 'stupen', 'ini acara stupeen', 'Proposal_Sponsorsip_Stupen23.docx'),
(4, '2024-01-26', 'asdfg', 'jjjj', 'gfdt', 'fdff', 'revisi_ revisi+pamfletPROPOSAL_STUPEN_2023-2[2][1][1].doc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`id_masuk`, `tanggal`, `kode_surat`, `asal`, `perihal`, `deskripsi`, `file`) VALUES
(24, '2024-01-18', 'coba docx', '1', 'as', '0', '002.Surat_polsek.docx'),
(26, '2024-01-18', 'cek jpg', '1', '1', '1', 'CAHAYA_ENGGAL_PHOTO_-18.jpg'),
(31, '2024-01-20', 'asdfg', 'ddd', 'wed', 'stupeeeen', 'Proposal_Sponsorsip_Stupen23.docx'),
(32, '2024-01-22', 'uuuuu', 'kkk', 'uuuu', 'kkkkk', 'revisi_ revisi+pamfletPROPOSAL_STUPEN_2023-2[2][1][1].doc'),
(33, '2024-01-23', '001', 'presiden', 'undangan', 'menghadiri acara', 'Proposal_Sponsorship_DIESNATALIES.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_user`, `username`, `password`, `pengguna`) VALUES
(1, 'admin', '123', 'Admin'),
(3, 'ustadz', 'z123', 'Ustadz/Ustadzah'),
(4, 'ustadzah', 'h123', 'Ustadz/Ustadzah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2022 pada 12.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'FUNDAMENTAL DESKTOP '),
(2, 'FUNDAMENTAL DBMS'),
(3, 'VB.NET FOR INTERMEDIATE	'),
(4, 'SQL SERVER FOR INTERMEDIATE'),
(12, 'SQL SERVER FOR BEGINNER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `kd_mahasiswa` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_kategori` varchar(10) CHARACTER SET latin1 NOT NULL,
  `deskripsi` text CHARACTER SET latin1 NOT NULL,
  `npm` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`kd_mahasiswa`, `username`, `id_kategori`, `deskripsi`, `npm`, `tanggal_masuk`, `kelas`, `created_by`) VALUES
(16, 'ISFI', '4', 'PTA 2021/2022', '12345678', '2022-08-10', '4KA19', 11),
(17, 'Syahrul', '3', 'PTA 2021/2022', '16118910', '2022-08-20', '4KA19', 9),
(19, 'Resa', '2', 'PTA 2021/2022', '16118006', '2022-08-20', '4KA19', 10),
(20, 'Syahrul', '2', 'PTA 2021/2022', '16118910', '2022-08-10', '4KA19', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(8) NOT NULL,
  `visi` varchar(1500) NOT NULL,
  `misi` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `visi`, `misi`) VALUES
(2, 'Universitas Jewepe menjadi perguruan tinggi terkemuka yang bereputasi internasional, memiliki jejaring global, dan memberikan kontribusi signifikan bagi peningkatan daya saing bangsa. ', 'Menyelenggarakan pendidikan tinggi berbasis teknologi informasi dan komunikasi yang berkualitas dalam rangka meningkatkan daya saing bangsa. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `npm`, `kelas`, `email`, `level`, `blokir`) VALUES
(8, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin@gmail.com', 'Admin', 'N'),
(9, 'Syahrul ', '81dc9bdb52d04dc20036dbd8313ed055', '16118910  ', '4KA19   ', 'syahrulfahrurrozi8@gmail.com ', 'Pengguna', 'N'),
(10, 'Resa', '81dc9bdb52d04dc20036dbd8313ed055', '16118006', '4KA04', 'resanurul31@gmail.com', 'Pengguna', 'N'),
(11, 'ISFI', '81dc9bdb52d04dc20036dbd8313ed055', '12345678', '4KA19', 'syahrulfahrurrozi12@gmail.com', 'Pengguna', 'N');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`kd_mahasiswa`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `kd_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

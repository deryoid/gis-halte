-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Agu 2021 pada 02.09
-- Versi server: 5.7.24
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_gishalte`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `kd_bus` varchar(25) NOT NULL,
  `merk_bus` varchar(20) NOT NULL,
  `plat_nomor` varchar(100) NOT NULL,
  `kapasitas` varchar(15) NOT NULL,
  `status_bus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `kd_bus`, `merk_bus`, `plat_nomor`, `kapasitas`, `status_bus`) VALUES
(2, 'B1201', 'Hilux', 'DA 3005 BK', '30', 'Tidak Aktif'),
(3, 'B1200', 'Hinno', 'DA 3766 UB', '25', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halte`
--

CREATE TABLE `halte` (
  `id_halte` int(11) NOT NULL,
  `kd_halte` varchar(11) NOT NULL,
  `nama_halte` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(150) NOT NULL,
  `lng` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `halte`
--

INSERT INTO `halte` (`id_halte`, `kd_halte`, `nama_halte`, `alamat`, `lat`, `lng`) VALUES
(2, 'H001', 'Halte Hasan Basrie', 'Jln Hasan Basri Depan KAmpus ULM Kayu Tangi', '-3.2981191146175886', '114.58949803956786');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal_jadwal` date NOT NULL,
  `jam` varchar(25) NOT NULL,
  `id_halte` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `id_supir` int(11) NOT NULL,
  `id_kernet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal_jadwal`, `jam`, `id_halte`, `id_bus`, `id_supir`, `id_kernet`) VALUES
(1, '2021-08-06', '08.00', 2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kernet`
--

CREATE TABLE `kernet` (
  `id_kernet` int(11) NOT NULL,
  `nama_kernet` varchar(150) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kernet`
--

INSERT INTO `kernet` (`id_kernet`, `nama_kernet`, `no_telp`, `alamat`) VALUES
(1, 'Syamsuri Hakiman', '08116700032', 'Jl. Pramuka Komp Melati Indah No 50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id_supir` int(11) NOT NULL,
  `nama_supir` varchar(150) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id_supir`, `nama_supir`, `no_telp`, `alamat`) VALUES
(1, 'Syahdani Hilman', '0823111234', 'Jl. Keramat, Gg.2 No 21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Iqbal', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Super Admin'),
(2, 'Wahyu Abdillah', 'teknisi', 'e21394aaeee10f917f581054d24b031f', 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `halte`
--
ALTER TABLE `halte`
  ADD PRIMARY KEY (`id_halte`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_halte` (`id_halte`),
  ADD KEY `id_bis` (`id_bus`),
  ADD KEY `id_supir` (`id_supir`),
  ADD KEY `id_kernet` (`id_kernet`);

--
-- Indeks untuk tabel `kernet`
--
ALTER TABLE `kernet`
  ADD PRIMARY KEY (`id_kernet`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `halte`
--
ALTER TABLE `halte`
  MODIFY `id_halte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kernet`
--
ALTER TABLE `kernet`
  MODIFY `id_kernet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supir`
--
ALTER TABLE `supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

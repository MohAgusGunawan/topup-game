-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Des 2023 pada 01.53
-- Versi server: 10.9.4-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topup_game`
--
CREATE DATABASE IF NOT EXISTS `topup_game` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `topup_game`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `nama_game` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `game`
--

INSERT INTO `game` (`id_game`, `nama_game`) VALUES
(1, 'Mobile Legends'),
(2, 'Free Fire'),
(3, 'Call Of Duty'),
(4, 'Genshin Impact'),
(5, 'PUBG Mobile'),
(6, 'Stumble Guys'),
(7, 'Point Blank'),
(8, 'Honkai Impact 3'),
(9, 'Top Eleven'),
(10, 'LifeAfter'),
(11, 'Marvel Super War'),
(12, 'World War Heroes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `nama_game` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `jumlah_item` varchar(100) NOT NULL,
  `total_harga` decimal(9,2) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `status` enum('berhasil','proses','gagal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `username`, `email_user`, `nama_game`, `uid`, `jumlah_item`, `total_harga`, `tgl_transaksi`, `status`) VALUES
(2, 'agus', 'agus@gmail.com', 'Mobile Legends', 758757, '53 Diamonds', '16000.00', '2023-08-18 13:01:00', 'berhasil'),
(3, 'agus', 'agus@gmail.com', 'Marvel Super War', 7585858, '275 Star Credits', '75000.00', '2023-08-18 13:04:00', 'proses'),
(4, 'agus', 'agus@gmail.com', 'Mobile Legends', 897398, '5 Diamonds', '1500.00', '2023-08-26 12:05:00', 'gagal'),
(5, 'agus', 'agus@gmail.com', 'Point Blank', 863898, '2400 PB CASH', '22000.00', '2023-08-31 16:43:00', 'berhasil'),
(6, 'agus', 'agus@gmail.com', 'Mobile Legends', 647868686, '25 Diamonds', '8000.00', '2023-09-04 12:16:00', 'proses'),
(7, 'agus', 'agus@gmail.com', 'Mobile Legends', 75875875, '25 Diamonds', '8000.00', '2023-09-04 12:16:00', 'gagal'),
(8, 'agus', 'agus@gmail.com', 'Mobile Legends', 786286, '17 Diamonds', '5000.00', '2023-09-04 12:18:00', 'berhasil'),
(9, 'tes100', 'tes100@gmail.com', 'PUBG Mobile', 436576786, '250 UC', '50000.00', '2023-09-05 15:08:00', 'berhasil'),
(10, 'agus', 'agus@gmail.com', 'Call Of Duty', 656536, '127 CP', '0.00', '2023-09-06 09:48:00', 'berhasil'),
(11, 'agus', 'agus@gmail.com', 'Mobile Legends', 758758, '17 Diamonds', '5000.00', '2023-10-17 16:35:00', 'proses'),
(12, 'tes100', 'tes100@gmail.com', 'Mobile Legends', 56875696, '53 Diamonds', '16000.00', '2023-12-07 10:09:00', 'proses'),
(13, 'tes100', 'tes100@gmail.com', 'World War Heroes', 775858689, '550 Gold', '30000.00', '2023-12-14 19:53:00', 'proses'),
(14, 'tes100', 'tes100@gmail.com', 'Mobile Legends', 973590753, '53 Diamonds', '16000.00', '2023-12-14 20:07:00', 'proses'),
(15, 'tes100', 'tes100@gmail.com', 'Stumble Guys', 986359856, '800 Pile of Gems', '31500.00', '2023-12-14 20:10:00', 'proses'),
(16, 'tes100', 'tes100@gmail.com', 'LifeAfter', 639869269, '1108 Credits', '212000.00', '2023-12-16 06:45:00', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `level` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `saldo`, `level`) VALUES
(1, 'agus', 'e369853df766fa44e1ed0ff613f563bd', 'agus@gmail.com', '19084005.10', 'admin'),
(2, 'viky', '17e62166fc8586dfa4d1bc0e1742c08b', 'viky@gmail.com', '800000.00', 'admin'),
(15, 'tes100', '202cb962ac59075b964b07152d234b70', 'tes100@gmail.com', '8728178.00', 'user'),
(17, 'tes1000', '202cb962ac59075b964b07152d234b70', 'tes1000@gmail.com', '10.00', 'user'),
(22, 'yayaya', '12e086066892a311b752673a28583d3f', 'yayay@gmail.com', '0.00', 'user'),
(23, 'yayaya', '12e086066892a311b752673a28583d3f', 'yayay@gmail.com', '0.00', 'user'),
(24, 'ihwiffw', 'e369853df766fa44e1ed0ff613f563bd', 'ff@gmail.com', '0.00', 'user'),
(26, 'jcszjg', 'bc6dc48b743dc5d013b1abaebd2faed2', 'jgaj@gmail.com', '0.00', 'user'),
(31, 'apacoba', '2367a2216a3ec74c8c6dd02123836612', 'apaco@gmail.com', '0.00', 'user'),
(32, 'tutututy', '533cfabd03d46e4e4e22349f6fdbb46e', 'hgah@gmail.com', '0.00', 'user'),
(33, 'tutututy', '533cfabd03d46e4e4e22349f6fdbb46e', 'hgah@gmail.com', '0.00', 'user'),
(34, 'tutututy', '533cfabd03d46e4e4e22349f6fdbb46e', 'hgah@gmail.com', '0.00', 'user'),
(35, 'tutututy', '533cfabd03d46e4e4e22349f6fdbb46e', 'hgah@gmail.com', '0.00', 'user'),
(37, 'jhzjh', '71a3cb155f8dc89bf3d0365288219936', 'fdgs@gmail.com', '0.00', 'user'),
(38, 'jhzjh', '71a3cb155f8dc89bf3d0365288219936', 'fdgs@gmail.com', '0.00', 'user'),
(39, 'jhzjh', '71a3cb155f8dc89bf3d0365288219936', 'fdgs@gmail.com', '0.00', 'user'),
(40, 'jhzjh', '71a3cb155f8dc89bf3d0365288219936', 'fdgs@gmail.com', '0.00', 'user'),
(41, 'wewe', 'bce7e0d4712c446dff4cc8d45dcaf8da', 'egeg@yfj', '0.00', 'user'),
(42, 'jbafa', '7fd804295ef7f6a2822bf4c61f9dc4a8', 'sjgs@gaga', '0.00', 'user'),
(43, 'jkzjksfgk', '3ceccaebee066cbfad02f9e526f20202', 'sbfjksb@gmak', '0.00', 'user'),
(46, 'sgjkfs', 'b85e7aee7501a029532c54588d5a794b', 'jgwj@dkj', '0.00', 'user'),
(49, 'kjsbjka', '424e94c9a5216c13c2abd2cbeaacc697', 'jsjvkjv@jhv', '0.00', 'user'),
(50, 'jsbdmjs', '92650b2e92217715fe312e6fa7b90d82', 'jhsjha@hfj', '0.00', 'user'),
(51, 'jkgsejk', 'da9e6a4a4aeca98588e4dd77ceb37695', 'hdhd@jkg', '0.00', 'user'),
(52, 'kshkjs', 'bd3e996283ce29e7d10962cd1f86d003', 'fhjjh@gmail.com', '0.00', 'user'),
(53, 'jzjgk', '71a5c0514ab83382d98154e5a5f9d813', 'jfajh@jgaj', '0.00', 'user'),
(54, 'kashjg', '9ba82616fac74de9ce334ea7532cfddc', 'fah@gj', '0.00', 'user'),
(55, 'kgjgk', '767d01b4bac1a1e8824c9b9f7cc79a04', 'fydytd2GHCHG@yf', '0.00', 'user'),
(56, 'jgkjgk', 'a8849b052492b5106526b2331e526138', 'dgfdg@gjg', '0.00', 'user'),
(57, 'jgszjkh', 'de9d400a46bec4ebd7e4f4e83c7d96fc', 'hfshj@dg', '0.00', 'user'),
(58, 'kjsgkjf', 'f60f6b0d129342bb6a226305aaf842b7', 'hgdhd@fh', '0.00', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_ibfk_1` (`username`) USING BTREE,
  ADD KEY `transaksi_ibfk_2` (`email_user`) USING BTREE,
  ADD KEY `transaksi_ibfk_3` (`nama_game`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

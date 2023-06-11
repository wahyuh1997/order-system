-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 02.43
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_system`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `item` float(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `menu_id`, `item`) VALUES
(5, 1, 3, 10),
(6, 1, 4, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `is_available` int(1) NOT NULL DEFAULT 0 COMMENT '1 = ada\r\n0 = kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `product_name`, `description`, `price`, `image`, `is_available`) VALUES
(3, 'Donat Coklat', 'Donat coklat dengan tekstur yang lembut', 8000, '15889aefcb0d0bb1136aaf95d43425f0.png', 0),
(4, 'Cookies', 'Cookies dengan topping coklat', 12000, '1a878002bbc09259d434f782f7bec5a9.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_customer` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0 = entry\r\n1 = selesai\r\n2 = diterima admin\r\n3 = pembayaran\r\n4 = ditolak admin\r\n5 = tidak bayar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 1 COMMENT '1 = admin\r\n0 = user',
  `password` varchar(62) DEFAULT NULL COMMENT 'untuk owner',
  `photo` varchar(100) NOT NULL COMMENT 'untuk user',
  `no_telepon` bigint(15) DEFAULT NULL COMMENT 'jika user harus ada\r\njika admin tidak ada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_name`, `nama`, `email`, `is_admin`, `password`, `photo`, `no_telepon`) VALUES
(1, 'admin', 'Admin', 'admin@mail.com', 1, '$2y$10$av0raZdvmyxAz3OHq7KJRukvh01L211pz1wIjuyAO2VqOz6csw74.', '', 81297468390);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

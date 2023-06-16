-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 04:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `item` float(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `menu_id`, `item`) VALUES
(5, 1, 3, 10),
(6, 1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,0) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `is_available` int(1) NOT NULL DEFAULT 0 COMMENT '1 = ada\r\n0 = kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `product_name`, `description`, `price`, `image`, `is_available`) VALUES
(3, 'Donat Coklat', 'Donat coklat dengan tekstur yang lembut', 8000, '15889aefcb0d0bb1136aaf95d43425f0.png', 1),
(4, 'Cookies', 'Cookies dengan topping coklat', 12000, '1a878002bbc09259d434f782f7bec5a9.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_customer` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 = entry\r\n1 = selesai\r\n2 = diterima admin\r\n3 = pembayaran\r\n4 = ditolak admin\r\n5 = tidak bayar',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_customer`, `payment`, `status`, `date`) VALUES
(6, 1, '', 5, '2023-06-11 22:10:05'),
(7, 2, '878d7ad0e3751261359dee787ddc5d2d.jpg', 1, '2023-06-13 21:26:05'),
(8, 2, '84c442ba31237a1dd61d950aec93d768.jpg', 4, '2023-06-14 21:20:41'),
(9, 2, '5ade27401bfd03b6a09cda7b57670597.jpg', 1, '2023-06-14 21:38:24'),
(13, 2, '37f08b177e74ff2aada90a7a3a8f1606.jpg', 3, '2023-06-16 08:16:18'),
(14, 2, '65ba2e1ebcd4611c06623bb020bb3cc0.jpg', 3, '2023-06-16 08:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` float(10,0) NOT NULL,
  `item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `menu_id`, `pesanan_id`, `product_name`, `price`, `item`) VALUES
(1, 3, 6, 'Donat Coklat', 8000, 10),
(2, 4, 6, 'Cookies', 12000, 10),
(3, 3, 7, 'Donat Coklat', 8000, 2),
(4, 4, 7, 'Cookies', 12000, 1),
(5, 4, 8, 'Cookies', 12000, 2),
(6, 3, 8, 'Donat Coklat', 8000, 1),
(8, 4, 9, 'Cookies', 12000, 1),
(10, 3, 13, 'Donat Coklat', 8000, 3),
(11, 4, 14, 'Cookies', 12000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 1 COMMENT '1 = admin\r\n0 = user',
  `password` varchar(62) DEFAULT NULL COMMENT 'untuk owner',
  `photo` varchar(100) NOT NULL COMMENT 'untuk user',
  `no_telepon` varchar(15) DEFAULT NULL COMMENT 'jika user harus ada\r\njika admin tidak ada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `nama`, `email`, `is_admin`, `password`, `photo`, `no_telepon`) VALUES
(1, 'admin', 'Admin', 'admin@mail.com', 1, '$2y$10$av0raZdvmyxAz3OHq7KJRukvh01L211pz1wIjuyAO2VqOz6csw74.', '', '081297468390'),
(2, NULL, 'Efendy Gajalis', 'efendygajalis@gmail.com', 0, NULL, 'https://lh3.googleusercontent.com/a/AAcHTtexoGAQHLDSBSWf_2N_Q4w19VpkH7XGZj7nUaXd=s96-c', '089652123654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 03:34 AM
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
(10, 3, 13, 'Donat Coklat', 8000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

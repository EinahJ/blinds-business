-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 08:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `privilege`) VALUES
(1, 'admin@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `mail_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Inquiry` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`mail_id`, `name`, `email`, `Inquiry`) VALUES
(1, 'ACie', 'allencarldelasalas@gmail.com', 'Pwede po ba kayo makausap in person ?'),
(2, 'Adelle', 'jasmine@gmail.com', 'Saan po Location ng production nyo ? Free installment po ba?'),
(3, 'stephanie', 'steph@gmail.com', 'Can i get you production location? i want to apply as reseller');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `subject`, `message`, `status`) VALUES
(2, 'SALE!!', 'All Blinds are 30% off', 'Until July 30, 2023'),
(4, 'SALE!!', '50% off to all our blinds product', 'Until August 5, 2023'),
(5, 'SALE!!', '50% off to all our blinds product!!!', 'Until August 6, 2023'),
(7, '8.8 SALE!!', 'All of our product will be 50% off', 'Until August 8, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_no` int(20) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_no`, `img`, `name`, `href`) VALUES
(1, 'products/Duology/Duology.png', 'Duology', 'duology.php'),
(2, 'products/Trilogy/Trilogy.png', 'Trilogy', 'trilogy.php'),
(3, 'products/Prime Wood/Prime Wood.png', 'Prime Wood', 'primewood.php'),
(4, 'products/Mono/Mono.png', 'Mono', 'mono.php'),
(5, 'products/Timber Wood/Timber Wood.png', 'Timber Wood', 'timber.php'),
(6, 'products/Elegancy/Elegancy.png', 'Elegancy', 'elegancy.php'),
(7, 'products/Pleated Trinity/Pleated Trinity.png', 'Pleated Trinity', 'pleatedtri.php'),
(17, 'products/Sara Screen/Sara Screen.png', 'Sara Screen', 'sara.php');

-- --------------------------------------------------------

--
-- Table structure for table `sched`
--

CREATE TABLE `sched` (
  `shed_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `win_no` bigint(255) NOT NULL,
  `dov` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sched`
--

INSERT INTO `sched` (`shed_id`, `name`, `contact`, `win_no`, `dov`, `address`) VALUES
(1, 'Allen Carl Delas Alas', '09301356823', 123, '2023-08-02', 'Pantalan Nasugbu, Batangas'),
(2, 'aila', '09301356823', 24, '2023-08-04', 'San Roque, Naic, Cavite'),
(3, 'Gab', '123321', 12, '2023-08-10', 'Teresa Sta. Mesa'),
(4, 'PUP', '0912334523', 12, '2023-08-10', 'Pup Sta. Mesa'),
(7, 'stephanie', '093434523', 12, '2023-08-11', 'Sitio. Bukod Tangi, Brgy. Pantalan Nasugbu Batanag');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `email`, `gender`, `contact`, `address`, `password`, `privilege`) VALUES
(1, 468694282, 'AC', 'allencarldelasalas@gmail.com', 'Male', '09301356823', 'Sitio. Bukod Tangi, Brgy. Pantalan Nasugbu Batanag', '$2y$10$bes.yHdK6ZdAzZjm2G1vXOG.4iqQV1SGDjSsgoDxZ7LGef9hhReam', 'user'),
(2, 7336842522, 'Steph', 'curry@gmail.com', 'Female', '1231231', 'Pup Sta Mesa', '$2y$10$vzxf8bc6LhanNQIlbKFokuJYHr6KEWKXZ1Ut1vuupIuv16VtkBuLK', 'user'),
(3, 1416226791, 'ACCc', 'ac@gmail.com', 'Male', '123123', 'Pantalan City', '$2y$10$aZF5lx/3srGH94p1VgkrSuBMT7uUDmoTp4naZJFIY/lxcncO5YRgm', 'user'),
(4, 6845354275, 'Tryyyy', 'try@gmail.com', 'male', '09513673433', 'Pup Sta. Mesa', '$2y$10$Jq6utqpswcuIQ5i2P8MRVe2UrCuC8CdH9qyIbx5NYolPAEOlYcRGC', 'user'),
(5, 6200916462, 'PUP', 'pup@gmail.com', 'male', '0952834123', 'Pup Sta. Mesa', '$2y$10$yU4L7jcw8IT5o03MzL8hz.NWsHefUJ63U2UYjB/xKt10EpY3PTQFW', 'user'),
(8, 5408871014, 'Adelle', 'adelle@gmail.com', 'female', '093451233', 'Pup Sta. Mesa', '$2y$10$LhEPhP6xYFV48h88.7ixceKJrVs3aS8bY6AwGf7PGCsz4PFa43JFq', 'user'),
(13, 4472469204, 'stephanie', 'steph@gmail.com', 'female', '094572342', 'Sitio. Bukod Tangi, Brgy. Pantalan Nasugbu Batanag', '$2y$10$SmnMVZjMlxZr9sK.tXuCBewFJkrT/dZbv0ZVNNcxFsEizWTNR8aRK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_no`);

--
-- Indexes for table `sched`
--
ALTER TABLE `sched`
  ADD PRIMARY KEY (`shed_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `mail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sched`
--
ALTER TABLE `sched`
  MODIFY `shed_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

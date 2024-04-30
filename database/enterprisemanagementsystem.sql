-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 01:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterprisemanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `transaction_name` varchar(100) DEFAULT NULL,
  `amounts` decimal(10,2) DEFAULT NULL,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `user_id`, `bank_account`, `bank_name`, `transaction_name`, `amounts`, `Update_date`) VALUES
(1, 8, '400841004849', 'Equity', 'Deposit', 200000.00, '2024-04-16 12:41:47'),
(2, 1, '45-678900-900-76', 'BK', 'Deposit', 2500000.00, '2024-04-16 00:00:00'),
(4, 9, '500505', 'KCB', 'Withdraw', 60500.00, '2024-04-22 01:54:04'),
(6, 2, '55555555', 'Equity', 'Deposit', 200000.00, '2024-04-30 01:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `customerorders`
--

CREATE TABLE `customerorders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `paymentmethods` varchar(50) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerorders`
--

INSERT INTO `customerorders` (`order_id`, `user_id`, `product_id`, `quantity`, `paymentmethods`, `phone`, `order_date`) VALUES
(1, 1, 1, 20, 'cash in hand', '0789065320', '2024-04-15'),
(2, 8, 8, 50, 'bank cheque', '07888854321', '2024-04-15'),
(3, 6, 7, 2, 'cash', '0781032456', '2024-04-15'),
(6, 7, 3, 23, 'cash', '0788464908', '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(12) NOT NULL,
  `names` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `names`, `email`, `phone`, `message`) VALUES
(1, 'vestine ineza', 'veve123@gmail.com', '0781032456', 'your campony is so amezing'),
(2, 'Ntwari Brino', 'ntwaribr@gmail.com', '07888854321', 'I want to tolk to CEO on this campony'),
(3, 'vestine ineza', 'veve123@gmail.com', '0781032456', 'wertyu9[]');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `productname` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantityavailable` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `add_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `productname`, `user_id`, `quantityavailable`, `price`, `add_date`) VALUES
(1, 'Juice', 1, 90, 1000.00, '2024-04-11'),
(2, 'Snacks', 2, 50, 25.50, '2024-04-11'),
(3, 'Apples', 7, 80, 1500.50, '2024-04-11'),
(6, 'Water', 6, 100, 25.50, '2024-04-11'),
(7, 'Cheese and crackers', 6, 90, 1000.00, '2024-04-11'),
(8, 'Milk', 2, 80, 1000.00, '2024-04-13'),
(12, 'Snacks', 7, 80, 500.00, '2024-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supply_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `supplyname` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `supply_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supply_id`, `product_id`, `supplyname`, `phone`, `price`, `email`, `supply_date`) VALUES
(1, 8, 'Enock Rukundo', '0788865322', 2500.00, 'rukundoen123@gmail.com', '2024-04-13'),
(2, 1, 'Batiste Nkurunziza', '0789065320', 600.00, 'nkurubatiste123@gmail.com', '2024-04-13'),
(3, 2, 'vestine mucyo', '0788907654', 12000.00, 'vestmucyo123@gmail.com', '2024-04-13'),
(5, 6, 'yvette', '0789065320', 1500.50, 'yvette12@gmail.com', '2024-04-13'),
(7, 3, 'Mimi Kariza', '07888854321', 1000.00, 'mimi@gmail.com', '2024-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_name` varchar(100) DEFAULT NULL,
  `transaction_type` varchar(50) DEFAULT NULL,
  `amounts` decimal(10,2) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `transaction_name`, `transaction_type`, `amounts`, `transaction_date`) VALUES
(1, 6, 'Buying goods', 'cash on hands', 6000.00, '2024-04-16'),
(2, 2, 'purchace apple', 'on cheque', 200000.00, '2024-04-16'),
(4, 9, 'Buying goods', 'cash on hands', 80000000.00, '2024-04-16'),
(6, 2, 'Deposit', 'on credit', 6000.50, '2024-04-29'),
(7, 2, 'Deposit', 'on credit', 6000.50, '2024-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `position`, `gender`, `dob`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Ntwari Brino', 'Manager', 'male', '2000-11-10', '788464908', 'ntwaribr@gmail.com', 'brino', '123'),
(2, 'vestine ineza', 'Admin', 'female', '2000-04-23', '0781032456', 'veve123@gmail.com', 'veve', '6f12d5164b5f02f813af60bc0efc971c'),
(6, 'Rwibutso Gianni', 'Manager', 'male', '2008-06-10', '0785467842', 'rwibutso12@gmail.com', 'Gianni', '$2y$10$K5aUBSRTKygMECujirwWNOEmHLpfKtyMQRa0jOspSajB0BHnVL5YW'),
(7, 'Ineza Nickita', 'Stockmanager', 'female', '2000-10-10', '07888854321', 'nickita@gmail.com', 'Nickita', '$2y$10$Y7MNYWE5ShYBEs14zgHOCOl9XvbRfCEyZ1NtQtgUULn9hQ7rOQGCi'),
(8, 'Rukundo Agnes Laziah', 'Manager', 'female', '2024-04-13', '0781032456', 'milembe@gmail.com', 'Agnes', '$2y$10$9skpWUTn9bEkRW.nL6bU1uf2wn7BkHsS0quzZ.BknRAk9ZsJwb6xS'),
(9, 'Jackson', 'HR', 'male', '0000-00-00', '897645323', 'jack12@gmail.com', 'jackson', '$2y$10$tiFjTIkx4Sl8NDhAinpIFe3Qtbldi.OjDXRcUBv79vOkuvmn8GPra'),
(10, 'vestine nyiminani', 'Manager', 'female', '2024-04-29', '0788464908', 'nyirandikubwimana1999@gmail.com', 'vestine', '$2y$10$YUForkFediXyGd/8d6c4TOxzJseim4C7gGoKq/XaLYKKHnTdTBNym'),
(11, 'Rukundo Frank', 'Admin', 'female', '1998-10-21', '0781032450', 'rfrank@gmail.com', 'frank', '$2y$10$aaRyMl.lpBXKqu./1nNTrenfeUnShI1ZdAaru.adKSWOyfHM9MVoC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customerorders`
--
ALTER TABLE `customerorders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `userid` (`user_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supply_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customerorders`
--
ALTER TABLE `customerorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `customerorders`
--
ALTER TABLE `customerorders`
  ADD CONSTRAINT `customerorders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `customerorders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

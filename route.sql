-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 07:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `route`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Defacto'),
(2, 'Adids');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `quant` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `name`, `image`, `price`, `size`, `color`, `quant`, `user_id`) VALUES
(1, 'Porro illum numquam', '02.jpg', 252, 'Default Size', 'White', 1, 2),
(2, 'Distinctio Pariatur', '01.jpg', 121, 'Default Size', 'White', 5, 2),
(3, 'Dignissimos modi in ', '03.jpg', 130, 'Default Size', 'White', 1, 2),
(4, 'Distinctio Pariatur', '01.jpg', 121, 'Default Size', 'White', 1, 4),
(5, 'Dignissimos modi in ', '03.jpg', 130, 'Default Size', 'White', 1, 4),
(6, 'Porro illum numquam', '02.jpg', 252, 'Default Size', 'White', 1, 4),
(7, 'Porro illum numquam', '02.jpg', 252, 'Default Size', 'White', 2, 4),
(8, 'Porro illum numquam', '02.jpg', 252, 'Default Size', 'White', 1, 7),
(9, 'Distinctio Pariatur', '01.jpg', 121, 'Default Size', 'White', 1, 7),
(10, 'Dignissimos modi in ', '03.jpg', 130, 'Default Size', 'White', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `catgory`
--

CREATE TABLE `catgory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catgory`
--

INSERT INTO `catgory` (`id`, `name`, `image`) VALUES
(1, 'T-shirt', '01.jpg'),
(2, 'shorts', '02.jpg'),
(3, 'sports', '01.jpg'),
(4, 'sports', '01.jpg'),
(5, 'sports', '01.jpg'),
(6, 'SHOES', '01');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quant` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `user_id` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 5,
  `review` text NOT NULL DEFAULT 'good',
  `price` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `catg_id` int(11) NOT NULL,
  `breand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `content`, `rate`, `review`, `price`, `size`, `color`, `gender`, `catg_id`, `breand_id`) VALUES
(1, 'Distinctio Pariatur', '01.jpg', 'Tempore at ab conse', 4, 'Dolores voluptas cup', 121, 'Et reiciendis dolor ', '', 'MALE', 2, 2),
(2, 'Porro illum numquam', '02.jpg', 'Ut dolore rerum et s', 5, 'Sint rerum Nam ut m', 252, 'Pariatur Possimus ', '', 'wOMEN', 4, 1),
(3, 'Porro illum numquam', '02.jpg', 'Ut dolore rerum et s', 1, 'Sint rerum Nam ut m', 252, 'M/L', '', 'MALE', 4, 1),
(5, 'Dignissimos modi in ', '03.jpg', 'Quam praesentium mol', 5, 'Sint corporis accusa', 130, 'Doloribus eveniet v', '', 'male', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `type`, `pass`) VALUES
(1, 'Graiden Fletcher', 'dinokaxo@mailinator.com', '+1 (205) 696-6767', 'Reprehenderit quia e', 'user', 'Pa$$w0rd!'),
(2, 'Stone Wynn', 'nediwec@mailinator.com', '+1 (639) 352-9606', 'Tempore non saepe m', 'user', 'Pa$$w0rd!'),
(3, 'Xavier Tate', 'kofydexot@mailinator.com', '+1 (718) 555-1702', 'Eu architecto eum no', 'user', 'Pa$$w0rd!'),
(4, 'He shmat', 'Elnopy1515@gmail.com', '059333247', 'بني سويف الجديده بعد نهضه عند كحلاوي', 'user', '123456'),
(5, 'omar', 'hamam@gmail.com', '01559333247', 'new cairo', 'admin', '123456'),
(7, 'bedo heshmat', 'knknknkki@gmail.com', '01559333247', 'بني سويف شارع الشرق قدام كليه نهضه صيدله سكن 7 للطلاب', 'user', '154545');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alo` (`user_id`);

--
-- Indexes for table `catgory`
--
ALTER TABLE `catgory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forien` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forren` (`breand_id`),
  ADD KEY `hello` (`catg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `catgory`
--
ALTER TABLE `catgory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `alo` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `forien` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `forren` FOREIGN KEY (`breand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hello` FOREIGN KEY (`catg_id`) REFERENCES `catgory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

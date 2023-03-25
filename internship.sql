-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 06:42 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` int(22) NOT NULL,
  `productName` varchar(256) NOT NULL,
  `price` int(22) NOT NULL,
  `description` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `ukPrice` int(25) NOT NULL,
  `usaPrice` int(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `productName`, `price`, `description`, `location`, `ukPrice`, `usaPrice`) VALUES
(1, 'Apple Ipad', 650, 'Apple Ipad Pro launched in 2023', 'india', 34, 367),
(2, 'Apple Ipad', 650, 'Apple Ipad Pro launched in 2023', 'uk', 67, 89),
(3, 'Apple Iphone13', 750, 'Apple IPhone Pro launched in 2022', 'uk', 670, 78),
(4, 'Apple Iphone 12', 950, 'Apple Ipad Pro launched in 2023', 'india', 45, 89),
(5, 'Apple Iphone11', 550, 'Apple Iphone Pro launched in 2020', 'usa', 886, 23),
(6, 'Apple MacBook', 1150, 'Apple Macbook m2 Pro launched in 2023', 'usa', 12, 89),
(7, 'Pixel 6', 8090, 'From Google', 'india', 6780, 4568),
(8, 'Pixel 6a', 890, 'From Google', 'india', 6780, 4568),
(9, 'Pixel 7a', 890, 'From Google', 'india', 0, 4568),
(10, 'Pixel 7', 890, 'From Google', 'uk', 67, 0),
(11, 'Pixel 7 Pro', 890, 'From Google', 'uk', 0, 4568),
(12, 'Pixel 3', 890, 'From Google', 'usa', 0, 4568),
(13, 'Pixel 3a', 890, 'From Google', 'usa', 6780, 4568);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(22) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `email`) VALUES
(1, 'varma999.ashok@gmail.com', 'ashok', 'varma999.ashok@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

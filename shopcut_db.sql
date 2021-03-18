-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 02, 2020 at 10:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcut_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `category` text NOT NULL,
  `items` text NOT NULL,
  `description` text NOT NULL,
  `stock` text NOT NULL,
  `price` int(19) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `userid` int(19) NOT NULL,
  `item_sold` int(19) NOT NULL,
  `item_id` bigint(19) NOT NULL,
  `ws_price` int(19) NOT NULL,
  `picture_name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`category`, `items`, `description`, `stock`, `price`, `picture`, `id`, `userid`, `item_sold`, `item_id`, `ws_price`, `picture_name`, `date`) VALUES
('bicycle', 'Brake Cable', 'Rear Kent', '100', 40, '', 25, 2147483647, 0, 5601, 15, '', '2020-07-28 05:51:03'),
('bicycle', 'Tube', 'CST 26x1 3/8', '30', 140, '', 26, 2147483647, 0, 92058811671465759, 85, '', '2020-07-28 05:51:03'),
('bicycle', 'Hub', 'Sealed Bearing Allow Hub Kent RX-5 F/R', '15', 580, '', 27, 2147483647, 0, 20783020, 335, '', '2020-07-28 05:51:03'),
('bicycle', 'Pedal', 'Kent Plastic 9/16', '20', 120, '', 28, 2147483647, 0, 40916213, 68, '', '2020-07-28 05:51:03'),
('bicycle', 'Pedal', 'Kent Plastic 1/2', '20', 120, '', 29, 2147483647, 0, 519066983428985, 68, '', '2020-07-28 05:51:03'),
('bicycle', 'Head ', 'Head Parts w/ Teeth', '20', 100, '', 30, 2147483647, 0, 88200744186346308, 52, '', '2020-07-28 05:51:03'),
('bicycle', 'OPC Arm', 'OPC Arm #20', '10', 135, '', 31, 2147483647, 0, 5595955401764380593, 80, '', '2020-07-28 05:51:03'),
('bicycle', 'Fork', '#20 EX900 Blck', '5', 265, '', 32, 2147483647, 0, 507, 185, '', '2020-07-28 05:51:03'),
('bicycle', 'Tube', 'CST Tube 700 X 23C LV', '10', 180, '', 33, 2147483647, 0, 6343, 108, '', '2020-07-28 05:51:03'),
('bicycle', 'Brake', 'Steel F/R V-Brake', '10', 330, '', 34, 2147483647, 0, 4089678340221043644, 115, '', '2020-07-28 05:51:03'),
('bicycle', 'Brake', 'BMX Brake Shoe Ord', '216', 10, 'Images/uploaded_images/IMG_20200626_184057.jpg', 35, 2147483647, 0, 1723130509740214832, 2, 'CLOSE LAPTOP', '2020-07-29 09:18:46'),
('bicycle', 'Brake', 'Darwin MTB Brake Shoe Allen', '200', 25, '', 36, 2147483647, 0, 12631722978298, 8, '', '2020-07-28 05:51:03'),
('bicycle', 'Chain', 'Lock / Chain Link', '199', 5, '', 37, 2147483647, 1, 57547511003, 2, '', '2020-07-28 05:51:03'),
('bicycle', 'Brake', 'Bond Brake', '13', 140, '', 38, 2147483647, 7, 528031341191892, 62, '', '2020-07-28 05:51:03'),
('bicycle', 'Spoke', 'Stainless Spoke 16', '3', 576, '', 39, 2147483647, 0, 1930367728957083474, 275, '', '2020-07-28 05:51:03'),
('bicycle', 'Spoke', 'Stainless Spoke 26', '3', 872, '', 40, 2147483647, 0, 633601, 345, '', '2020-07-28 05:51:03'),
('bicycle', 'Brake Lever', 'Kent MX3 Alloy MTB', '20', 220, '', 41, 2147483647, 0, 2795937747709293074, 122, '', '2020-07-28 05:51:03'),
('bicycle', 'Seat Post', 'Steel Seat Post 25.4', '10', 100, '', 42, 2147483647, 0, 8107, 30, '', '2020-07-28 05:51:03'),
('bicycle', 'Shifter', 'ThumbShifter Plastic L/R', '15', 100, '', 43, 2147483647, 0, 6437, 45, '', '2020-07-28 05:51:03'),
('bicycle', 'Cone', 'Rear Cone w/ Dust Cup', '300', 10, '', 44, 2147483647, 0, 16523507, 3, '', '2020-07-28 05:51:03'),
('bicycle', 'Chain', 'TAYA Chain 114L 410', '50', 120, '', 45, 2147483647, 0, 406994268614, 54, '', '2020-07-28 05:51:03'),
('bicycle', 'Chain', 'TAYA Cambiada Chain Blk/Cp', '50', 200, '', 46, 2147483647, 0, 2409331199811, 100, '', '2020-07-28 05:51:03'),
('bicycle', 'Tube', 'CST 20x2.125', '100', 120, '', 47, 2147483647, 0, 9223372036854775807, 80, '', '2020-07-28 05:51:03'),
('bicycle', 'Rim', 'Kent Chopper Rim 20 x 10G', '20', 165, '', 48, 2147483647, 4, 919942144275098702, 115, '', '2020-07-28 05:51:03'),
('bicycle', 'Axle', 'Rear Ordinary', '108', 50, 'Images/uploaded_images/2nd-hand-Laptop.jpg', 49, 2147483647, 0, 16267239960162069, 18, 'Laptop', '2020-07-29 07:59:23'),
('bicycle', 'Brake', 'Steel F/R Caliper Brake Set', '252', 350, '', 50, 2147483647, 0, 7860144830870216, 100, '', '2020-07-28 05:51:03'),
('bicycle', 'Tire', 'CYT Tire 26 x 1.95 Blk', '50', 280, '', 51, 2147483647, 0, 6076329369142089, 160, '', '2020-07-30 11:45:35'),
('bicycle', 'Ball Retainer', 'Front Ball Retainer', '397', 5, '', 52, 2147483647, 0, 6753, 1, '', '2020-07-28 05:51:03'),
('bicycle', 'Ball Retainer', 'HeadParts Ball Retainer Ord', '600', 5, '', 53, 2147483647, 0, 744232814687222, 2, '', '2020-07-28 05:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(19) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `id`) VALUES
(5889669, 'Shaira', 'Alaba', 'shairarocamora@gmail.com', '123', 6),
(9912897, 'Shaira', 'Rocamora', 'shairarocamora@gmail.com', '1234', 4),
(643139814, 'Shaira', 'Rocamora', 'shairarocamora@gmail.com', '0909', 5),
(2147483647, 'Kimber ian', 'Alaba', 'kimberalaba88@gmail.com', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `price` (`price`),
  ADD KEY `id` (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `ws_price` (`ws_price`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `first_name` (`first_name`(768)),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `first_name_2` (`first_name`(768)),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

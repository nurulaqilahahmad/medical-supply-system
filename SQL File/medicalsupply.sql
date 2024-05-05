-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 03:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalsupply`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`, `CreationDate`) VALUES
(1, 'Admin', 'private1', '2021-07-10 08:10:12'),
(2, 'Admin2', 'private2', '2021-07-09 14:37:04'),
(3, 'Admin3', 'private3', '2021-07-09 14:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartId` int(11) NOT NULL,
  `CustomerEmail` varchar(200) DEFAULT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `ProductDetails` longtext DEFAULT NULL,
  `ProductPrice` int(11) DEFAULT NULL,
  `ProductImage` varchar(100) DEFAULT NULL,
  `ProductCategories` varchar(150) DEFAULT NULL,
  `ProductQuantity` int(11) DEFAULT NULL,
  `SellerEmail` varchar(255) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartId`, `CustomerEmail`, `ProductId`, `ProductName`, `ProductDetails`, `ProductPrice`, `ProductImage`, `ProductCategories`, `ProductQuantity`, `SellerEmail`, `Creationdate`, `UpdationDate`) VALUES
(36, 'syiqinyusof@gmail.com', 1, 'Nitrile Powder-Free Medical Gloves', 'No defects. All is clean gloves. 3-5grams gloves. Most sought after type of Nitrile Gloves.', 125, 'glovespurple.jpg', 'Medical Gloves & Masks', 1, 'khaliesha@gmail.com', '2021-07-11 09:44:20', NULL),
(37, 'nurulsyamira@gmail.com', 0, '3ply Black Face Mask', 'Ultra Soft Disposable Non-Woven Face Masks. High Quality. 3-ply and Breathable.', 40, 'facemaskblack.jpg', 'Medical Gloves & Masks', 2, 'khaliesha@gmail.com', '2021-07-11 09:45:17', NULL),
(38, 'nurulsyamira@gmail.com', 2, 'PPE Kit', 'Airport transfers by private car | Popular Sightseeing included | Suitable for Couple and budget travelers', 250, 'ppekit.jpg', 'PPE Kit', 3, 'irmazafirah@gmail.com', '2021-07-11 09:45:26', NULL),
(39, 'nurulaqilah@gmail.com', 5, '3ply White Face Mask', 'High-Quality Non-Woven Fabric. Meltblown Fabric. Comfortable and Breathable.', 35, 'facemaskwhite.jpg', 'Medical Gloves & Masks', 1, 'noorarinie@gmail.com', '2021-07-11 09:47:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Code` varchar(200) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `Name`, `Username`, `Email`, `MobileNumber`, `Address`, `Password`, `Code`, `Image`, `CreationDate`) VALUES
(1, 'Nursyahidatul Asyiqin', 'syiqinyusof', 'syiqinyusof@gmail.com', 60105785534, 'No5, Lorong 1 Balok Baru Fasa 2', 'Asyiqin123', 'ayam', 'd41d8cd98f00b204e9800998ecf8427e1625996585.jpg', '2021-07-11 09:43:05'),
(2, 'Nurul Syamira', 'syamira', 'nurulsyamira@gmail.com', 60105785577, 'No2, Lorong 1 Balok Baru Fasa 2', 'Syamira123', 'ayam', NULL, '2021-07-10 06:54:03'),
(3, 'Aqilah Ahmad', 'aqilah', 'nurulaqilah@gmail.com', 60105785555, 'No2, Lorong 1 Balok Baru Fasa 2', 'Aqilah123', 'ayam', NULL, '2021-07-10 06:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderId` int(11) NOT NULL,
  `CustomerEmail` varchar(200) DEFAULT NULL,
  `CustomerName` varchar(200) DEFAULT NULL,
  `CustomerAddress` varchar(200) DEFAULT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `ProductPrice` varchar(200) DEFAULT NULL,
  `ProductQuantity` varchar(200) DEFAULT NULL,
  `TotalPrice` int(11) DEFAULT NULL,
  `SellerEmail` varchar(255) NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `CustomerEmail`, `CustomerName`, `CustomerAddress`, `ProductName`, `ProductPrice`, `ProductQuantity`, `TotalPrice`, `SellerEmail`, `Status`, `Creationdate`, `UpdationDate`) VALUES
(10, 'syiqinyusof@gmail.com', 'Asyiqin Yusof', 'No25, Lorong 16 Balok Baru Fasa 2', 'Nitrile Powder-Free Medical Gloves', '125', '1', 225, 'khaliesha@gmail.com', 2, '2021-07-11 09:44:43', '2021-07-11 09:50:22'),
(11, 'nurulsyamira@gmail.com', 'Syamira', 'No1, Lorong 1 Balok Baru Fasa 2', '3ply Black Face Mask', '40', '2', 180, 'khaliesha@gmail.com', 1, '2021-07-11 09:46:06', '2021-07-11 09:50:35'),
(12, 'nurulsyamira@gmail.com', 'Syamira', 'No1, Lorong 1 Balok Baru Fasa 2', 'PPE Kit', '250', '3', 750, 'irmazafirah@gmail.com', 0, '2021-07-11 09:46:40', NULL),
(13, 'nurulaqilah@gmail.com', 'Aqilah Ahmad', 'No2, Lorong 16 Balok Baru Fasa 2', '3ply White Face Mask', '35', '1', 135, 'noorarinie@gmail.com', 0, '2021-07-11 09:48:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `SellerEmail` varchar(200) DEFAULT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `ProductCompany` varchar(150) DEFAULT NULL,
  `productLocation` varchar(255) DEFAULT NULL,
  `ProductPrice` int(11) DEFAULT NULL,
  `ProductStock` int(11) DEFAULT NULL,
  `ProductDetails` mediumtext DEFAULT NULL,
  `ProductShortDetails` varchar(255) DEFAULT NULL,
  `ProductImage` varchar(100) DEFAULT NULL,
  `ProductCategories` varchar(150) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `SellerEmail`, `ProductName`, `ProductCompany`, `productLocation`, `ProductPrice`, `ProductStock`, `ProductDetails`, `ProductShortDetails`, `ProductImage`, `ProductCategories`, `Creationdate`, `UpdationDate`) VALUES
(0, 'khaliesha@gmail.com', '3ply Black Face Mask', 'Covid-19 Supplier', 'China', 40, 99, 'Ultra Soft Disposable Non-Woven Face Masks. High Quality. 3-ply and Breathable.', 'Ultra Soft Disposable Non-Woven Face Masks. High Quality. 3-ply and Breathable.', 'facemaskblack.jpg', 'Medical Gloves & Masks', '2021-07-05 13:57:30', NULL),
(1, 'khaliesha@gmail.com', 'Nitrile Powder-Free Medical Gloves', 'Covid-19 Supplier', 'China', 125, 56, 'No defects. All is clean gloves. 3-5grams gloves. Most sought after type of Nitrile Gloves.', 'No defects. All is clean gloves. 3-5grams gloves.', 'glovespurple.jpg', 'Medical Gloves & Masks', '2021-07-05 13:57:30', NULL),
(2, 'irmazafirah@gmail.com', 'PPE Kit', 'Take It Global', 'Indonesia', 250, 30, 'Airport transfers by private car | Popular Sightseeing included | Suitable for Couple and budget travelers', 'Airport transfers by private car | Popular Sightseeing included | Suitable for Couple and budget travelers', 'ppekit.jpg', 'PPE Kit', '2021-07-05 13:57:30', NULL),
(3, 'irmazafirah@gmail.com', 'Latex Disposable Hand Gloves Powdered', 'Take It Global', 'Indonesia', 150, 50, 'Lightly powdered for easy donning and sweat. 100% natural latex. Low latex protein level. ', 'Lightly powdered for easy donning and sweat. ', 'gloveswhite.jpg', 'Medical Gloves & Masks', '2021-07-05 13:57:30', NULL),
(4, 'noorarinie@gmail.com', 'Non-Surgical Gowns', 'Corona Medical', 'Malaysia', 100, 89, '42gsm PP Non Woven Medical Isolation Gown / Surgical Gown. Breathable Fabric. KKM Approved.', '42gsm PP Non Woven Medical Isolation Gown', 'nonsurgicalgowns.jpg', 'Surgical Gown', '2021-07-05 13:57:30', NULL),
(5, 'noorarinie@gmail.com', '3ply White Face Mask', 'Corona Medical', 'Malaysia', 35, 100, 'High-Quality Non-Woven Fabric. Meltblown Fabric. Comfortable and Breathable.', 'High-Quality Non-Woven Fabric. Meltblown Fabric.', 'facemaskwhite.jpg', 'Medical Gloves & Masks', '2021-07-05 13:57:30', NULL),
(7, 'khaliesha@gmail.com', 'Scrub Suit Medical Full Set for Man & Women', 'manwei.my', 'KL', 150, 50, 'Features:\r\n1) washable\r\n2) Good quality and sewing\r\n3) slim fit   \r\n4)100% cotton\r\n5)Medical, can be ultraviolet disinfection', 'washable', 'd41d8cd98f00b204e9800998ecf8427e1625928618.jpg', 'Medical Shirt', '2021-07-10 14:50:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `BusinessAddress` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Code` varchar(200) DEFAULT NULL,
  `BusinessOwner` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `Name`, `Email`, `MobileNumber`, `BusinessAddress`, `Password`, `Code`, `BusinessOwner`, `CreationDate`) VALUES
(1, 'Irma Zafirah', 'irmazafirah@gmail.com', 60123456789, 'No 23, Lorong 2 Taman Intan', 'Irma123', 'ayam', 'Take It Global', '2021-07-10 08:15:11'),
(2, 'Noor Arinie', 'noorarinie@gmail.com', 19746372965, 'No 32, Jalan 1 Taman Permata', 'Arinie123', 'ayam', 'Corona Medical', '2021-07-09 14:37:04'),
(3, 'Khaireenur Khaliesha', 'khaliesha@gmail.com', 60135982654, 'No 15, Lot AB/2', 'Khaliesha123', 'ayam', 'Medical Care', '2021-07-10 08:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

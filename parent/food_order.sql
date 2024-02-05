-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 09:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'ervi', '80c500693e7bbc318c6441adb08a9270', 'Ervi');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Daily Set', NULL, NULL, NULL, NULL),
(2, 'Soup', NULL, NULL, NULL, NULL),
(3, 'Pasta', NULL, NULL, NULL, NULL),
(4, 'Breakfast & Stall', NULL, NULL, NULL, NULL),
(5, 'Protein', NULL, NULL, NULL, NULL),
(7, 'Rice', NULL, NULL, NULL, NULL),
(8, 'Fruit', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category_id`, `name`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 4, 'Indonesian chicken soup with coconut milk', NULL, NULL, NULL, NULL),
(2, 4, 'Chicken porridge', NULL, NULL, NULL, NULL),
(3, 4, 'Beef Burger', NULL, NULL, NULL, NULL),
(4, 4, 'Penang fried noodle', NULL, NULL, NULL, NULL),
(5, 4, 'Bakso Malang', NULL, NULL, NULL, NULL),
(6, 4, 'Pizza', NULL, NULL, NULL, NULL),
(7, 4, 'Siomay', NULL, NULL, NULL, NULL),
(8, 4, 'Chicken noodle with meatball', NULL, NULL, NULL, NULL),
(9, 4, 'Sausage rolled bread', NULL, NULL, NULL, NULL),
(10, 2, 'Sausage & corn soup', NULL, NULL, NULL, NULL),
(11, 2, 'Macaroni & vegetable soup', NULL, NULL, NULL, NULL),
(12, 2, 'Miso soup', NULL, NULL, NULL, NULL),
(13, 2, 'Chicken & vegetable soup', NULL, NULL, NULL, NULL),
(14, 3, 'Spaghetti bolognese', NULL, NULL, NULL, NULL),
(15, 3, 'Fettuccine carbonara', NULL, NULL, NULL, NULL),
(16, 3, 'Mac and Cheese ', NULL, NULL, NULL, NULL),
(17, 1, 'Steamed fish Hong Kong and bean curd fritter (Ikan Bakar Rosemary dan Perkedel Tahu)', NULL, NULL, NULL, NULL),
(18, 1, 'Chicken katsu and sausage with soy sauce (Ayam Katsu dan Sosis dengan Kecap)', NULL, NULL, NULL, NULL),
(19, 1, 'Crispy Calamari with sweet sour sauce and egg foo young (Cumi Goreng Asam Manis dan Fu Yunghai)', NULL, NULL, NULL, NULL),
(20, 8, 'Watermelon', NULL, NULL, NULL, NULL),
(21, 8, 'Banana', NULL, NULL, NULL, NULL),
(22, 5, 'Beef', NULL, NULL, NULL, NULL),
(23, 5, 'Shrimp', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_dtl`
--

CREATE TABLE `order_dtl` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_po_purchase_meal_dtl` int(11) NOT NULL,
  `cancel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_dtl`
--

INSERT INTO `order_dtl` (`id`, `id_order`, `id_po_purchase_meal_dtl`, `cancel`) VALUES
(1, 1, 2, 0),
(2, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_hdr`
--

CREATE TABLE `order_hdr` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `grade_level` varchar(50) NOT NULL,
  `parent_phone_number` varchar(50) NOT NULL,
  `submitted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_hdr`
--

INSERT INTO `order_hdr` (`id`, `email`, `student_name`, `grade_level`, `parent_phone_number`, `submitted_date`) VALUES
(1, 'johndoe@swa-jkt.com', 'Diana Doe', 'Grade 10', '0812328312312', '2023-10-20 13:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `po_purchase_meal_dtl`
--

CREATE TABLE `po_purchase_meal_dtl` (
  `id` int(11) NOT NULL,
  `id_po_purchase_meal_hdr` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_purchase_meal_dtl`
--

INSERT INTO `po_purchase_meal_dtl` (`id`, `id_po_purchase_meal_hdr`, `date`, `id_category`, `id_menu`, `parent`, `price`) VALUES
(1, 1, '2023-10-06', 1, 17, 0, 45000),
(2, 1, '2023-10-06', 4, 6, 0, 25000),
(3, 1, '2023-10-06', 2, 14, 0, 30000),
(4, 1, '2023-10-06', 8, 20, 1, 8000),
(5, 1, '2023-10-06', 5, 22, 1, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `po_purchase_meal_hdr`
--

CREATE TABLE `po_purchase_meal_hdr` (
  `id` int(11) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_purchase_meal_hdr`
--

INSERT INTO `po_purchase_meal_hdr` (`id`, `remark`, `begin_date`, `end_date`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Please fill in the attached google form and submit latest on Sunday, 5 November 2023,  at 12:00 pm.  Thank you very much for your kind cooperation.', '2023-10-06', '2023-10-17', 'ACTIVE', 14, '2023-10-20 11:40:13', 14, '2023-10-20 11:40:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_dtl`
--
ALTER TABLE `order_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_hdr`
--
ALTER TABLE `order_hdr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_purchase_meal_dtl`
--
ALTER TABLE `po_purchase_meal_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_purchase_meal_hdr`
--
ALTER TABLE `po_purchase_meal_hdr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_dtl`
--
ALTER TABLE `order_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_hdr`
--
ALTER TABLE `order_hdr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `po_purchase_meal_dtl`
--
ALTER TABLE `po_purchase_meal_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `po_purchase_meal_hdr`
--
ALTER TABLE `po_purchase_meal_hdr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

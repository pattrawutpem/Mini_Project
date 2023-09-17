-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 02:48 PM
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
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `cus_firstname` varchar(50) NOT NULL,
  `cus_lastname` varchar(50) NOT NULL,
  `cus_address` varchar(20) NOT NULL,
  `cus_subdis` varchar(50) NOT NULL,
  `cus_district` varchar(50) NOT NULL,
  `cus_province` varchar(50) NOT NULL,
  `cus_postcode` varchar(5) NOT NULL,
  `cus_phone` varchar(10) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `void` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_firstname`, `cus_lastname`, `cus_address`, `cus_subdis`, `cus_district`, `cus_province`, `cus_postcode`, `cus_phone`, `cus_email`, `void`) VALUES
(0001, 'จันทิรา', 'กิตติมานพ', '36/9', 'สถาน', 'เชียงของ', 'เชียงราย', '57140', '0698521473', 'juntira@gmail.com', 0),
(0002, 'Stephen', 'Dyer', 'Soluta consequuntur ', 'Consectetur sint eni', 'Harum molestias obca', 'Officia consectetur', '5555', '+1 (536) 7', 'pupa@mailinator.com', 0),
(0003, 'Jemima', 'Todd', 'Facilis suscipit rep', 'Est et mollit velit', 'Sunt rerum excepturi', 'Inventore aspernatur', '444', '+1 (936) 6', 'xyky@mailinator.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `emp_firstname` varchar(50) NOT NULL,
  `emp_lastname` varchar(50) NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `emp_subdis` varchar(100) NOT NULL,
  `emp_district` varchar(50) NOT NULL,
  `emp_province` varchar(50) NOT NULL,
  `emp_postcode` varchar(5) NOT NULL,
  `emp_phone` varchar(10) NOT NULL,
  `emp_email` varchar(150) NOT NULL,
  `emp_startworking` date NOT NULL,
  `emp_password` varchar(50) NOT NULL,
  `emp_department` varchar(100) NOT NULL,
  `void` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_firstname`, `emp_lastname`, `emp_address`, `emp_subdis`, `emp_district`, `emp_province`, `emp_postcode`, `emp_phone`, `emp_email`, `emp_startworking`, `emp_password`, `emp_department`, `void`) VALUES
(0001, 'มาลา', 'จันติตา', '16', 'สถาน', 'เชียงของ', 'เชียงราย', '57140', '0825011348', 'mala@gmail.com', '2023-09-01', 'mala1234', 'ผู้จัดการฝ่ายบัญชี', 0),
(0002, 'Adrienne', 'Burns', 'Provident dolorem t', 'Fugit voluptate adi', 'Modi omnis nostrum t', 'Quas sit animi non ', '11111', '+1 (744) 6', 'lyfopaver@mailinator.com', '1993-09-22', 'Neque illum qui eum', 'Ad nulla illum sit ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `project_start` date NOT NULL,
  `project_end` date NOT NULL,
  `project_valueprice` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL COMMENT 'ผู้ดูแลโครงการ',
  `project_status` int(1) NOT NULL COMMENT '0 = ยกเลิก, 1 = อยู่ระหว่างดำเนินการ, 2 = ปิดโครงการ',
  `void` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `cus_id`, `project_start`, `project_end`, `project_valueprice`, `emp_id`, `project_status`, `void`) VALUES
(001, 'GGG', 1, '2023-09-01', '2023-09-14', 50000, 1, 2, 1),
(002, 'Shafira Mcfarland', 2, '1972-06-05', '2018-12-27', 818, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_close`
--

CREATE TABLE `project_close` (
  `headcode` int(3) UNSIGNED ZEROFILL NOT NULL,
  `dateclose` date NOT NULL,
  `project_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `cost` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `emp_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `comment` varchar(150) NOT NULL,
  `void` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_close`
--

INSERT INTO `project_close` (`headcode`, `dateclose`, `project_id`, `cost`, `pay`, `emp_id`, `comment`, `void`) VALUES
(001, '1988-10-01', 001, 5000, 12, 001, 'gggg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_desc`
--

CREATE TABLE `project_desc` (
  `headcode` int(3) UNSIGNED ZEROFILL NOT NULL,
  `s_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `qty` int(11) NOT NULL,
  `s_price` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_desc`
--

INSERT INTO `project_desc` (`headcode`, `s_id`, `qty`, `s_price`, `totalprice`) VALUES
(004, 001, 289, 409, 249),
(004, 002, 807, 471, 751),
(004, 003, 753, 72, 395);

-- --------------------------------------------------------

--
-- Table structure for table `project_hd`
--

CREATE TABLE `project_hd` (
  `headcode` int(3) UNSIGNED ZEROFILL NOT NULL,
  `datesave` date NOT NULL,
  `receiptcode` int(3) UNSIGNED ZEROFILL NOT NULL,
  `datereceipt` date NOT NULL,
  `project_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `totalprice` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=ยกเลิก, 1=ปกติ',
  `void` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_hd`
--

INSERT INTO `project_hd` (`headcode`, `datesave`, `receiptcode`, `datereceipt`, `project_id`, `totalprice`, `status`, `void`) VALUES
(001, '2019-12-23', 002, '1994-09-23', 001, 50000, 1, 0),
(002, '1996-01-18', 002, '1970-04-08', 002, 818, 1, 0),
(003, '1981-06-16', 000, '2018-02-05', 002, 968, 1, 0),
(004, '1982-12-06', 005, '2011-02-06', 002, 395, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `s_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_unit` varchar(50) NOT NULL,
  `s_price` int(10) NOT NULL,
  `void` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `s_name`, `s_unit`, `s_price`, `void`) VALUES
(001, 'คอมพิวเตอร์', 'บาท', 10000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_close`
--
ALTER TABLE `project_close`
  ADD PRIMARY KEY (`headcode`);

--
-- Indexes for table `project_desc`
--
ALTER TABLE `project_desc`
  ADD PRIMARY KEY (`headcode`,`s_id`);

--
-- Indexes for table `project_hd`
--
ALTER TABLE `project_hd`
  ADD PRIMARY KEY (`headcode`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

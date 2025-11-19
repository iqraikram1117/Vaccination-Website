-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 02:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccination_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Syed Muhammad Taha', 'taha@gmail.com', 'taha1234', 'assets/imgs/vicky-hladynets-C8Ta0gwPbQg-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `v_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `p_id`, `h_id`, `date`, `time`, `v_id`, `status`) VALUES
(1, 5, 2, '2023-11-12', '1-3', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `name`) VALUES
(1, 'Karachi'),
(2, 'Lahore'),
(3, 'Multan'),
(4, 'Islamabad'),
(5, 'Faislabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `p_id`, `message`, `status`) VALUES
(1, 2, 'hello world....!', 'show'),
(2, 1, 'hello world xyz abc 123', 'show'),
(3, 1, 'xyz 321', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital`
--

CREATE TABLE `tbl_hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `cid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'deactivate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hospital`
--

INSERT INTO `tbl_hospital` (`id`, `name`, `contact`, `cid`, `email`, `password`, `image`, `address`, `status`) VALUES
(1, 'Ziauddin Hospital', '021354789', 2, 'ziauddin@gmail.com', 'zia123', 'assets/imgs/hospital-images/abc.webp', 'ABC Street Karachi', 'activate'),
(2, 'Jinnah Hospital', '0216547893', 1, 'jinnah@gmail.com', 'jinnah123', 'assets/imgs/hospital-images/jinnah.jpg', 'abc xyz 123', 'activate'),
(3, 'City Hospital', '0213654789', 5, 'city@gmail.com', 'city123', 'assets/imgs/hospital-images/hhh.jpg', 'ABC XYZ ', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'activate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id`, `name`, `contact`, `email`, `password`, `cid`, `address`, `gender`, `image`, `status`) VALUES
(1, 'Ali', '0213654789', 'ali@gmail.com', 'ali123', 3, 'ABC XYZ 1234', 'male', 'assets/imgs/patient-images/user.jpg', 'activate'),
(2, 'Zeeshan Ahmed', '0321654789', 'zeeshan@gmail.com', 'zeeshan123', 1, 'xyz abc 321', '', 'assets/imgs/patient-images/abc.webp', 'activate'),
(3, 'Hammad Ali', '0321654789', 'hammad@gmail.com', 'hammad123', 2, 'abc 123 321', 'male', 'assets/imgs/patient-images/lightbulb-3104355_1920.jpg', 'activate'),
(4, 'Hamza', '0321645789', 'hamza@gmail.com', '123', 3, 'xyz 123', 'male', 'assets/imgs/patient-images/unnamed.ico', 'activate'),
(5, 'Syed Muhammad Taha', '03032843872', 'taha@gmail.com', '123', 1, 'abc xyz 123', 'male', 'images/patient_images/vicky-hladynets-C8Ta0gwPbQg-unsplash.jpg', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `result` varchar(50) NOT NULL DEFAULT 'Process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `p_id`, `h_id`, `date`, `result`) VALUES
(1, 1, 2, '', 'Negative');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`id`, `name`, `status`) VALUES
(1, 'Sinovac', 'available'),
(2, 'Sinopharm', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

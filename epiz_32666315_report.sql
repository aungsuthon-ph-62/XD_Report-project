-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.epizy.com
-- Generation Time: Nov 11, 2022 at 04:32 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32666315_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugreport_tbl`
--

CREATE TABLE `bugreport_tbl` (
  `id` int(11) NOT NULL,
  `bug_text` varchar(255) NOT NULL,
  `bug_img` varchar(255) DEFAULT NULL,
  `bug_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `img_tbl`
--

CREATE TABLE `img_tbl` (
  `id` bigint(20) NOT NULL,
  `report_ref` varchar(255) NOT NULL,
  `img_file` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_tbl`
--

INSERT INTO `img_tbl` (`id`, `report_ref`, `img_file`, `create_at`) VALUES
(30, '91_636e0b159fa74', '8801934_295999486_449029873900942_8080763754541452338_n.jpg', '2022-11-11 04:42:45'),
(31, '91_636e0b159fa74', '8231711_294823405_785174832595514_1221136729508575951_n.jpg', '2022-11-11 04:42:45'),
(32, '65_636e0c293b680', '6716976_IMG_0859.JPG', '2022-11-11 04:47:23'),
(33, '65_636e0c293b680', '9094237_IMG_0858.JPG', '2022-11-11 04:47:23'),
(34, '65_636e0c293b680', '5031615_IMG_0836.JPG', '2022-11-11 04:47:23'),
(35, '65_636e0c293b680', '2144843_people1.jpg', '2022-11-11 04:47:23'),
(36, '65_636e0c293b680', '8814578_Wuttichai.JPG', '2022-11-11 04:47:27'),
(37, '53_636e0cb55d18f', '9493175_quiz-28-9-2565.png', '2022-11-11 04:49:41'),
(38, '27_636e120eb9233', '4103660_FLg4HFuWQAkFB2z.jfif', '2022-11-11 05:12:30'),
(39, '27_636e120eb9233', '6301102_FLg4HFyXMAIXXkG.jfif', '2022-11-11 05:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `report_tbl`
--

CREATE TABLE `report_tbl` (
  `id` bigint(20) NOT NULL,
  `report_user_ref` bigint(20) DEFAULT NULL,
  `report_fname` varchar(255) NOT NULL,
  `report_lname` varchar(255) NOT NULL,
  `report_email` varchar(255) NOT NULL,
  `report_tel` varchar(255) NOT NULL,
  `report_topic` varchar(255) NOT NULL,
  `report_text` varchar(255) NOT NULL,
  `report_img_ref` varchar(255) DEFAULT NULL,
  `report_status` varchar(255) NOT NULL,
  `report_create_at` datetime NOT NULL,
  `report_update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_tbl`
--

INSERT INTO `report_tbl` (`id`, `report_user_ref`, `report_fname`, `report_lname`, `report_email`, `report_tel`, `report_topic`, `report_text`, `report_img_ref`, `report_status`, `report_create_at`, `report_update_at`) VALUES
(17, 1, 'อังศุธร', 'โพธิ์สุ', 'monkung.mullet@gmail.com', '0622200843', 'test', 'test', '53_636e0cb55d18f', 'รอตรวจสอบ', '2022-11-11 04:42:45', NULL),
(18, 1, 'อังศุธร', 'โพธิ์สุ', 'monkung.mullet@gmail.com', '0622200843', 'testMember', 'safafadas', '53_636e0cb55d18f', 'รอตรวจสอบ', '2022-11-11 04:47:27', NULL),
(19, 1, 'อังศุธร', 'โพธิ์สุ', 'monkung.mullet@gmail.com', '0622200843', '31sfdfda', '31422', '53_636e0cb55d18f', 'รอตรวจสอบ', '2022-11-11 04:49:41', NULL),
(20, 1, 'อังศุธร', 'โพธิ์สุ', 'monkung.mullet@gmail.com', '0622200843', 'testxczxcdca', 'dldz;z;;zzskdf', '27_636e120eb9233', 'รอตรวจสอบ', '2022-11-11 16:12:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` bigint(20) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_tel` varchar(255) NOT NULL,
  `u_pwd` varchar(255) NOT NULL,
  `u_img` varchar(255) DEFAULT NULL,
  `u_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `u_fname`, `u_lname`, `u_email`, `u_tel`, `u_pwd`, `u_img`, `u_reg`) VALUES
(1, 'test', 'test', 'test@test.com', '123', '123', NULL, '2022-11-11 07:59:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bugreport_tbl`
--
ALTER TABLE `bugreport_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_tbl`
--
ALTER TABLE `img_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_tbl`
--
ALTER TABLE `report_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bugreport_tbl`
--
ALTER TABLE `bugreport_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_tbl`
--
ALTER TABLE `img_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `report_tbl`
--
ALTER TABLE `report_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

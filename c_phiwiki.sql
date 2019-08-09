-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 06:18 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c_phiwiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `preorders`
--

CREATE TABLE `preorders` (
  `cs_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cs_name` varchar(255) NOT NULL,
  `cs_email` varchar(255) NOT NULL,
  `cs_institution` varchar(255) NOT NULL,
  `cs_itb_or_not` varchar(255) NOT NULL DEFAULT 'itb',
  `cs_faculty` varchar(255) NOT NULL,
  `cs_order_amount` int(64) NOT NULL,
  `cs_phone` varchar(255) NOT NULL,
  `cs_line` varchar(255) NOT NULL,
  `cs_address` text NOT NULL,
  `cs_payment` varchar(255) NOT NULL DEFAULT '0',
  `cs_read` int(11) NOT NULL DEFAULT '0',
  `cs_confirmation` int(11) NOT NULL,
  `cs_uid` varchar(100) NOT NULL,
  `cs_taken` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preorders`
--

INSERT INTO `preorders` (`cs_id`, `user_id`, `cs_name`, `cs_email`, `cs_institution`, `cs_itb_or_not`, `cs_faculty`, `cs_order_amount`, `cs_phone`, `cs_line`, `cs_address`, `cs_payment`, `cs_read`, `cs_confirmation`, `cs_uid`, `cs_taken`) VALUES
(5, 1, 'asd', '', '', 'itb', 'Pilih Fakultas', 0, '', '', '', '0', 0, 0, '0', 0),
(6, 2, 'OOO', 'OOO@d.f', '', 'itb', 'SF', -3, '2', '3', 'OOO', '0', 0, 0, 'JDKWJOIDOWIOEJHUIUYIUIH672537872836', 0),
(7, 6, 'dw', 'da@f.c', '', 'itb', 'SBM', 13, '324', 'BBB', 'BBB', '1', 1, 1, 'O8k4PQLHysPUpO6gfzGrXZ6l9EJaYjR1xGlZ0XXkYvM9ElqldEpUJtPHtOB5zt8P3nGBKRGntW1Arb7THPMlLOaNFrP1yOeTzR7n', 1),
(487, 323, 'meme', 'me@me.me', '', 'itb', 'SBM', 3, '323', 'ddw', '', '1', 1, 1, '33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `sys_id` int(11) NOT NULL,
  `po_name` varchar(255) NOT NULL,
  `po_status` int(11) NOT NULL,
  `po_closed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`sys_id`, `po_name`, `po_status`, `po_closed`) VALUES
(1, 'dawdawd', 1, '2019-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_uname` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_auth` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uname`, `user_pass`, `user_email`, `user_name`, `user_auth`) VALUES
(1, 'a', 'a', 'a@gmail.com', '', 1),
(2, 'aa', 'a', 'sa@gmail.com', 'aaa', 1),
(3, 'muslim', 'a', 'muslim@gmail.com', 'muslim', 1),
(4, 'z', 'z', 'z@z.z', 'zzz', 0),
(5, 'ad', 'ad', 'ad@d.d', 'ad', 1),
(6, 'b', 'b', 'b@b.c', 'b', 1),
(7, 'c', 'c', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preorders`
--
ALTER TABLE `preorders`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`sys_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preorders`
--
ALTER TABLE `preorders`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `sys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

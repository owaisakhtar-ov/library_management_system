-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 04:50 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `auther` varchar(30) NOT NULL,
  `edition` varchar(30) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `book_name`, `auther`, `edition`, `quantity`, `creation_date`, `updated_date`) VALUES
(1, 'HARRY POTTER', 'J. K. ROWLLING', '1', '47', '2020-08-08 00:32:46', '2020-08-08 07:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue_detail`
--

CREATE TABLE `book_issue_detail` (
  `id` int(11) NOT NULL,
  `issue_id` varchar(10) NOT NULL,
  `book_id` varchar(10) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_issue_header`
--

CREATE TABLE `book_issue_header` (
  `id` int(11) NOT NULL,
  `std_id` varchar(10) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `till_date` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_issue_header`
--

INSERT INTO `book_issue_header` (`id`, `std_id`, `std_name`, `till_date`, `created_date`, `update_date`) VALUES
(4, '2', 'OWAIS AKHTER', '2020-08-22', '2020-08-08 06:45:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `std_id` varchar(10) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `cource` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_id`, `std_name`, `cource`, `address`, `status`, `created_date`, `updated_date`) VALUES
(2, 'Owais044', 'OWAIS AKHTER', 'BSCS', 'MALIR KALABOARD', 'ACTIVE', '2020-08-08 00:07:45', '2020-08-08 01:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `role`, `created_date`, `update_date`) VALUES
(1, 'ADMIN', '12345', 'ADMIN', '2020-07-30 21:41:55', '2020-08-08 00:36:46'),
(2, 'LIBRARIAN', '123', 'LIBRARIAN', '2020-08-05 22:42:37', '2020-08-08 00:36:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `book_issue_detail`
--
ALTER TABLE `book_issue_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue_header`
--
ALTER TABLE `book_issue_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book_issue_detail`
--
ALTER TABLE `book_issue_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `book_issue_header`
--
ALTER TABLE `book_issue_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

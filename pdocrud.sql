-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 07:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdocrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `EmailId` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `PostingDate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `EmailId`, `message`, `PostingDate`) VALUES
(1, 62, 'Joko Gadingan', 'jokogadingan357@gmail.com', 'dsdsd dj adkjsaklj klasjd kjskldj askldjskajdklsajdksajkldjklas jdklsa jkljas kdlsds', '2023-03-30 10:30:36.403469'),
(3, 62, 'Joko Gadingan', 'jokogadingan357@gmail.com', 'dsadasdsad dhjsadsd dhsa djasdak hdsa sdasd adas dada d asd ', '2023-03-30 10:30:36.403469'),
(4, 62, 'Joko Gadingan', 'jokogadingan357@gmail.com', 'sdsdsdsd', '2023-03-30 10:30:36.403469'),
(5, 62, 'Joko Gadingan', 'jokogadingan357@gmail.com', 'Hello devs!', '2023-03-30 10:30:36.403469'),
(6, 80, 'joko gadingan', 'gadingan.joko.bscs2020@gmail.com', 'dasdsadsadasd', '2023-03-30 10:30:36.403469'),
(8, 0, 'asdasdsa', 'dasdasda@gmailc.om', 'asdadasd', '2023-03-30 10:30:36.403469'),
(9, 33, 'Joko Gadingan', 'gadingan.joko.bscs2020@gmail.com', 'Testing', '2023-03-31 01:11:30.173393');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `admin_name`, `user_type`) VALUES
(1, 'Admin123', 'Password#123', 'Administrator', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `username` varchar(255) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `EmailId` varchar(250) NOT NULL,
  `Photo` varchar(250) NOT NULL,
  `vercoderegistration` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FirstName`, `LastName`, `username`, `PostingDate`, `EmailId`, `Photo`, `vercoderegistration`, `password`, `confirmpassword`, `name`, `user_type`) VALUES
(17, 'sdasdahaha', 'sdbabdbasjk', 'username12455', '2023-03-30 15:20:01', 'jsakddsad339@gmail.com', 'Default.jpg', '', '', '', '', ''),
(18, 'sadiiasod', 'sndnjakdasad', 'username12333', '2023-03-29 09:41:01', 'dshadas8799@gmail.com', 'Default.jpg', '', '', '', '', ''),
(19, 'dasdsad', 'jdkasjkdjshd', 'username2424', '2023-03-29 09:40:48', 'sddasdas88@gmail.com', 'Default.jpg', '', '', '', '', ''),
(22, 'bdsabdjkbs', 'hdiassahdnjnjk', 'username909044', '2023-03-29 09:40:31', 'asdsdsadsad22n@gmail.com', 'Default.jpg', '', '', '', '', ''),
(33, 'Joko', 'Gadingan', 'hdjashds67676', '2023-03-30 17:11:08', 'gadingan.joko.bscs2020@gmail.com', 'Joko Gadingan - 2023.03.30 - 07.11.08pm.jpg', '5905862', 'Password#123', 'Password#123', 'Joko Gadingan', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

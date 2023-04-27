-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 06:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `admin_name`) VALUES
(1, 'admin', 'admin', 'Andres P. Jario'),
(2, 'user', 'user', 'Crischel T Amorio');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `ContactNumber` char(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `EmailId` varchar(120) NOT NULL,
  `Photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FirstName`, `LastName`, `ContactNumber`, `Address`, `PostingDate`, `EmailId`, `Photo`) VALUES
(16, 'Andres', 'Jario', '936552411', 'Dumaguete City', '2021-07-26 03:11:26', 'andresjario@gmail.com', 'upload/user2-160x160.jpg'),
(17, 'Futterkiste', ' Alfreds M', '00912121', 'Obere Str. 57', '2021-07-26 03:52:15', 'Futterkiste@gmail.com', 'upload/user3-128x128.jpg'),
(18, 'Antonio G', 'Moreno Taquería', '09111111222', 'Mataderos 2312', '2021-07-28 03:18:49', 'Mataderos@gmail.com', 'upload/user7-128x128.jpg'),
(19, 'Crischel', 'Amorio', '00931322', 'Mabinay Negros Oriental', '2021-07-28 03:19:03', 'crischelamorio@gmail.com', 'upload/user1-128x128.jpg'),
(20, 'Familia K', 'Arquibaldo', '09882121', 'Rua Orós, 92', '2021-07-28 03:17:43', 'Arquibaldo@gmail.com', 'upload/219604930_865796534320809_3427328319495791222_n.jpg'),
(21, 'Carnes', 'Hanari O', '099812121', 'Rua do Paço, 67', '2021-07-27 03:55:34', 'Carnes@gmail.com', 'upload/user3-128x128.jpg'),
(22, 'Eastern B', 'Connection', '09212121', '35 King George', '2021-07-26 02:01:42', 'Eastern@gmail.com', 'upload/user5-128x128.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

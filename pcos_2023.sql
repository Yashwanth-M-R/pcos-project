-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 10:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcos_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `pcos_2023_form`
--

CREATE TABLE `pcos_2023_form` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `pregnant` varchar(255) NOT NULL,
  `excesshair` varchar(255) NOT NULL,
  `weightgain` varchar(255) NOT NULL,
  `thinhair` varchar(255) NOT NULL,
  `skinacne` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `bmi` varchar(255) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `bpm` varchar(255) NOT NULL,
  `breathminute` varchar(255) NOT NULL,
  `foodregular` varchar(255) NOT NULL,
  `excerciseregular` varchar(255) NOT NULL,
  `havebp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pcos_2023_user`
--

CREATE TABLE `pcos_2023_user` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pcos_2023_form`
--
ALTER TABLE `pcos_2023_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcos_2023_user`
--
ALTER TABLE `pcos_2023_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pcos_2023_form`
--
ALTER TABLE `pcos_2023_form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pcos_2023_user`
--
ALTER TABLE `pcos_2023_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

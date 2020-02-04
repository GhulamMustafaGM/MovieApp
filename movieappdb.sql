-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 05:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movieappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `firstname` varchar(75) NOT NULL,
  `lastname` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `associated_movies`
--

CREATE TABLE `associated_movies` (
  `id` int(11) NOT NULL,
  `sequel` varchar(75) NOT NULL,
  `prequel` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `box_office`
--

CREATE TABLE `box_office` (
  `id` int(11) NOT NULL,
  `weekend_gross` int(11) NOT NULL,
  `opening_weekend` int(11) NOT NULL,
  `gross` int(11) NOT NULL,
  `earning_in_country` int(11) NOT NULL,
  `budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `id` int(11) NOT NULL,
  `male` varchar(75) NOT NULL,
  `female` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `id` int(11) NOT NULL,
  `director` varchar(75) NOT NULL,
  `producer` varchar(75) NOT NULL,
  `company` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `date_release` date NOT NULL,
  `comments` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `user_id`, `movie_name`, `date_release`, `comments`, `created_at`) VALUES
(21, 13, 'Titanic', '1997-11-18', 'Great! Romantic movie', '2020-01-31 05:19:28'),
(22, 13, 'The Matrix', '1999-03-31', 'Fantastic movie', '2020-01-31 05:21:06'),
(23, 13, 'The Dark Knight', '2008-07-18', 'Great movie!', '2020-01-31 05:22:29'),
(24, 6, 'Gladiator', '2005-05-05', 'Nice movie', '2020-01-31 05:24:21'),
(25, 6, 'Top Gun', '1986-05-16', 'Good movie!', '2020-01-31 05:25:35'),
(26, 8, 'Gravity', '2013-10-04', 'Fantastic movie!', '2020-01-31 05:27:41'),
(27, 8, 'Avatar', '2013-12-18', 'Awesome movie!', '2020-01-31 05:28:59'),
(28, 10, 'Ice Age', '2002-03-15', 'Very good movie, especially for children.', '2020-01-31 05:31:08'),
(29, 9, 'Spiderman 1', '2002-05-03', 'Fascinating movie!', '2020-01-31 05:32:40'),
(30, 12, 'Captain America', '2015-07-22', 'Good movie!', '2020-01-31 05:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `country` varchar(75) NOT NULL,
  `persons_voted` float NOT NULL,
  `total_votes` decimal(10,2) NOT NULL,
  `rating` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `runtime`
--

CREATE TABLE `runtime` (
  `id` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `totaltime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(75) NOT NULL,
  `user_email` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `password`, `created_at`) VALUES
(6, 'johan', 'johan@gmail.com', '$2y$10$2um2DcNYv5U90wpKOR5XG.NGTrp7.U5pZEhRu8.RTSBfyVSa7E83.', '2020-01-31 05:08:20'),
(7, 'tim', 'tim@yahoo.com', '$2y$10$d3t1mo4PtA2xTxmULb06aO1Yoigt1obB/923F5GZ7CgBCVxtjpsgy', '2020-01-31 05:10:08'),
(8, 'kevin', 'kevin@gmail.com', '$2y$10$9BoXwd2RjOJX5Pn0eaZqBOU1.1oVqU4m4VNnv.hqMzhSu9xK/tPry', '2020-01-31 05:10:41'),
(9, 'emma', 'emma@gmai.com', '$2y$10$Fo4QUhpu.avXDvmRo5URRuQhojBm49HRkP0bdunVV0YYEIWrTmTde', '2020-01-31 05:11:17'),
(10, 'simon', 'simon@outlook.com', '$2y$10$g/MNpex8eJq3s1Q.XH8PauN.8rajQ5RPK5PEMS3OfpyL24EBU8yQi', '2020-01-31 05:11:54'),
(11, 'brian', 'brian@gmail.com', '$2y$10$kZt0FysoViSRlNvcZ77p2.nHWIy97Hr9Q.CVJa3QiLZ.GRISSAy6O', '2020-01-31 05:12:36'),
(12, 'frank', 'frank@yahoo.com', '$2y$10$CvBu96SyXYpoNxHX/kRYJOr0suhiEaMdIcorH9jZD1dUfuuM1syRG', '2020-01-31 05:13:04'),
(13, 'tony', 'tony@gmail.com', '$2y$10$kgPeaP4DI.JtDPe50gPpT.lkc.SICqGD6wDicSfhddOf4jiTt1JCG', '2020-01-31 05:14:32'),
(14, 'james', 'james@live.com', '$2y$10$Y6HbApWMja7WtcC3iOBP6OSETMLTfgHdgtG13/0RoQwSKZgmMcCIW', '2020-01-31 05:16:01'),
(15, 'zack', 'zack@hotmail.com', '$2y$10$rT4W15q3UHboLap0uhzb/uMxrUTCqqkhpX8wB0wxo1NRTcLnnsdjq', '2020-01-31 05:16:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associated_movies`
--
ALTER TABLE `associated_movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box_office`
--
ALTER TABLE `box_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `runtime`
--
ALTER TABLE `runtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `associated_movies`
--
ALTER TABLE `associated_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `box_office`
--
ALTER TABLE `box_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crew`
--
ALTER TABLE `crew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `runtime`
--
ALTER TABLE `runtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

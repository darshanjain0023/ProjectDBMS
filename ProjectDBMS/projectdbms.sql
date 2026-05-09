-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 09, 2026 at 04:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `terms` tinyint(1) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `terms`, `profile_image`) VALUES
(1, 'Darshan', 'Jain', 'darshan.jaind3@gmail.com', '$2y$10$6Uo3P0xnW6hHQOJD5P2yV.ousQzkBS35Q0i0nb0EssnA127ESnvbK', 'solo', 1, '1778266790_background.png'),
(2, 'Francis ', 'R.R', 'francisrr@gmail.com', '$2y$10$ZyxB/.sYVTOh7qbBXqVjBOOTHuNGEh1cNM5ddD3YAg4yrBymJpFUq', 'team-lead', 1, ''),
(3, 'aditya', 'kothari', 'addi@gmail.com', '$2y$10$ziFsupaIVcwdb6hdCcGOYuQQ8U8t9y7t9ac1gHWdNe84d35cl7i1i', 'solo', 1, '1778266881_MV5BZDQxYzQ5NzItYWRiYS00YTkyLTliMjItN2ZhODZjYzU3Y2NkXkEyXkFqcGdeQXVyMTU5ODM0Nzcw._V1_FMjpg_UX2048_-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

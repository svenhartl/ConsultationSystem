-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 02:52 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konzultacije`
--

-- --------------------------------------------------------

--
-- Table structure for table `termini`
--

CREATE TABLE `termini` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `kabinet` varchar(255) NOT NULL,
  `rezerviran` tinyint(1) DEFAULT NULL,
  `termin_name` varchar(255) DEFAULT NULL,
  `termin_surname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `termini`
--

INSERT INTO `termini` (`id`, `users_id`, `datum`, `time`, `kabinet`, `rezerviran`, `termin_name`, `termin_surname`) VALUES
(27, 27, '2022-02-24', '8:00', '6', 1, 'Sven', 'Hartl'),
(30, 27, '2022-02-27', '9:35', '5', 0, '0', NULL),
(76, 27, '2022-03-02', '10:45', 'Matematika', 0, '0', NULL),
(80, 27, '2022-03-31', '13:10', 'Matematika', 0, '0', NULL),
(92, 26, '2022-05-26', '22:47', 'Stručni', 1, 'Sven', 'Hartl'),
(93, 26, '2022-05-17', '23:45', 'Matematika', 0, '', NULL),
(94, 26, '2022-05-24', '23:49', 'Matematika', 1, 'Sven', 'Hartl'),
(95, 26, '2022-05-25', '12:45', 'Matematika', 0, '0', NULL),
(96, 26, '2022-06-02', '22:49', 'Stručni', 0, '', NULL),
(97, 26, '2022-05-24', '23:46', 'Stručni', 0, '0', NULL),
(99, 33, '2022-05-25', '15:25', 'Stručni', 0, '0', NULL),
(100, 33, '2022-05-17', '14:24', 'Matematika', 0, '', NULL),
(101, 33, '2022-05-23', '15:26', 'Hrvatski', 0, '0', NULL),
(102, 33, '2022-05-23', '23:25', 'Stručni', 0, '', NULL),
(103, 33, '2022-05-17', '15:22', 'Matematika', 1, 'Sven', 'Hartl'),
(104, 26, '2022-05-26', '21:05', 'Hrvatski', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_pic` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `username`, `password`, `email`, `profile_pic`) VALUES
(1, 'admin', 'Admin', 'Admin', 'admin', '$2y$10$S1O.F7iHD.h9c1lYJ.T4peXKE8b0AJ9sbcJDqE9N38Wu/zQ8aTbjK', 'admin', NULL),
(26, 'profesor', 'Krunoslav', 'Kulhavi', 'kulhavi', '$2y$10$m.oU2.eHfdv/GynAtS4YD.k.m7hCLYnakbr/IobeGUAIuA0/atmMG', 'kulhavi@gmail.com', NULL),
(27, 'profesor', 'Tatjana', 'Sekeres', 'tatjana.sekeres', '$2y$10$JO464w60m2MJMhtoQyTCzuJfX8.6X0UQuWtD/QOjxYu1UtVlQ4FPe', 'tatjana.sekeres@gmail.com', NULL),
(33, 'profesor', 'Kresimir', 'Ecimovic', 'kresimir.ecimovic', '$2y$10$N0th1LKc8vFx68RCIGQlC.g2ukoLdI41crd9z3Rhub0ZGcIZKfv22', 'kreso@gmail.com', NULL),
(34, 'student', 'Sven', 'Hartl', 'sven', '$2y$10$qhXHmLE3bq.BCe/JzccvT.sl1C2/fAne5.2GjuSqQhnzpX.3ystqy', 'sven.hartl5@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `termini`
--
ALTER TABLE `termini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `termini`
--
ALTER TABLE `termini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `termini`
--
ALTER TABLE `termini`
  ADD CONSTRAINT `termini_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

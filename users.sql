-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 09:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Firstname`, `Lastname`, `Email`) VALUES
(1, 'deathstar1', '123456', 'kostas', 'galatis', 'email@email.com'),
(2, 'galatis_p', '123456789', 'Panagiotis', 'Galatis', 'galatisp1@gmail.com'),
(3, 'deathstar2', 'deathstar', 'pant', 'galatis', 'email2@email.com'),
(4, 'deathstar5', 'destarui', 'kostantis', 'Gal', 'email3@email.com'),
(5, 'deathstar3', 'eam2020', 'k', 'g', 'email4@email.com'),
(6, 'galatis', '1234', 'Î Î±Î½Î±Î³Î¹ÏŽÏ„Î·Ï‚', 'Î“Î±Î»Î¬Ï„Î·Ï‚', 'galatisp0@gmail.com'),
(7, 'kostakis', 'kotsos', 'Kostakis', 'G', 'kostas@email.com'),
(8, 'deathstar13', 'kotsos13', 'kon', 'Gal', 'email13@email.com'),
(9, 'galatis_k', 'kotsos', 'ko', 'ga', 'email9@email.com'),
(10, 'krikor', 'kses', 'krikor', 'tseva', 'krikor@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 09:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotografije`
--

CREATE TABLE `fotografije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `nekretnina_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `fotografije`
--

INSERT INTO `fotografije` (`id`, `naziv`, `nekretnina_id`) VALUES
(119, './uploads/603a451e3b781.jpeg', 212),
(120, './uploads/603a451e3d8f2.jpeg', 212),
(121, './uploads/603a451e3f60d.jpeg', 212);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `name`) VALUES
(7, 'Budva'),
(8, 'Podgorica');

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

CREATE TABLE `nekretnina` (
  `id` int(11) NOT NULL,
  `grad_id` int(11) DEFAULT NULL,
  `tip_oglasa_id` int(11) NOT NULL,
  `tip_nekretnine_id` int(11) NOT NULL,
  `povrsina` decimal(11,0) NOT NULL,
  `godina_izgradnje` date NOT NULL,
  `opis` text COLLATE utf8mb4_bin NOT NULL,
  `nekretnina_status_id` int(11) NOT NULL,
  `cijena` decimal(11,0) NOT NULL,
  `fotografija_id` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`id`, `grad_id`, `tip_oglasa_id`, `tip_nekretnine_id`, `povrsina`, `godina_izgradnje`, `opis`, `nekretnina_status_id`, `cijena`, `fotografija_id`) VALUES
(212, 7, 3, 9, '86', '1988-06-12', 'Ovo je moja kuca, zivio sam tu ', 2, '85', './uploads/603a451e39b36.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `status_nekretnina`
--

CREATE TABLE `status_nekretnina` (
  `id` int(11) NOT NULL,
  `status_nekretnine` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `datum_prodaje` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `status_nekretnina`
--

INSERT INTO `status_nekretnina` (`id`, `status_nekretnine`, `datum_prodaje`) VALUES
(1, 'prodato', '0000-00-00'),
(2, 'dostupno', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tip_nekretnine`
--

CREATE TABLE `tip_nekretnine` (
  `id` int(11) NOT NULL,
  `tip` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tip_nekretnine`
--

INSERT INTO `tip_nekretnine` (`id`, `tip`) VALUES
(4, 'poslovni prostor'),
(8, 'kuca'),
(9, 'garaza');

-- --------------------------------------------------------

--
-- Table structure for table `tip_oglasa`
--

CREATE TABLE `tip_oglasa` (
  `id` int(11) NOT NULL,
  `naziv_oglasa` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tip_oglasa`
--

INSERT INTO `tip_oglasa` (`id`, `naziv_oglasa`) VALUES
(1, 'prodaja'),
(2, 'iznajmljivanje'),
(3, 'kompenzacija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nekretnina_id` (`nekretnina_id`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nekretnina_grad` (`grad_id`),
  ADD KEY `fk_tip_oglasa` (`tip_oglasa_id`),
  ADD KEY `fk_tip_nekretnine` (`tip_nekretnine_id`),
  ADD KEY `fk_nekretnina_status` (`nekretnina_status_id`);

--
-- Indexes for table `status_nekretnina`
--
ALTER TABLE `status_nekretnina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotografije`
--
ALTER TABLE `fotografije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nekretnina`
--
ALTER TABLE `nekretnina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `status_nekretnina`
--
ALTER TABLE `status_nekretnina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD CONSTRAINT `fk_nekretnina_id` FOREIGN KEY (`nekretnina_id`) REFERENCES `nekretnina` (`id`);

--
-- Constraints for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD CONSTRAINT `fk_nekretnina_grad` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`),
  ADD CONSTRAINT `fk_nekretnina_status` FOREIGN KEY (`nekretnina_status_id`) REFERENCES `status_nekretnina` (`id`),
  ADD CONSTRAINT `fk_tip_nekretnine` FOREIGN KEY (`tip_nekretnine_id`) REFERENCES `tip_nekretnine` (`id`),
  ADD CONSTRAINT `fk_tip_oglasa` FOREIGN KEY (`tip_oglasa_id`) REFERENCES `tip_oglasa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 05:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecole`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `anne` varchar(10) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `nom`, `anne`, `description`) VALUES
(1, 'physique', '', 'physique physique physique physique physique '),
(2, 'chimie', '', ''),
(3, 'phylosofie', '', 'phylosofie phylosofie phylosofie phylosofiephylosofie phylosofie'),
(4, 'arabic', '', ''),
(5, 'historique', '', ''),
(6, 'islamique', '', ''),
(8, 'classe 3', '2023/2024', 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `id_enseignant`, `description`) VALUES
(1, 'cours 1', 1, 'my desc'),
(2, 'cours 2', 4, 'desc');

-- --------------------------------------------------------

--
-- Table structure for table `enseignants`
--

CREATE TABLE `enseignants` (
  `id` int(11) NOT NULL,
  `matricule` varchar(100) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dateBirth` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignants`
--

INSERT INTO `enseignants` (`id`, `matricule`, `fName`, `lName`, `email`, `password`, `phone`, `dateBirth`, `adresse`, `city`, `created_at`, `updated_at`) VALUES
(1, 'adas12', 'said', 'said', 'said@gmail.com', 'saidaitdriss', '1234567890', '2023-06-14', 'saidaitdriss saidaitdriss saidaitdriss', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'adas12', 'said', 'said', 'said@gmail.com', 'saidaitdriss', '1234567890', '2023-06-14', 'saidaitdriss saidaitdriss saidaitdriss', 'default', '2023-06-13 23:00:00', '2023-06-13 23:00:00'),
(3, 'sdsf', 'test', 'test', 'test@gmail.com', '', '0982736478', '2023-06-08', 'asdasf', 'asfasfasfa', '2023-06-10 20:52:49', '2023-06-10 20:52:49'),
(4, 'mat1', 'ait d', 'ait', 'ait@gmail.com', '', '0718293748', '2023-06-07', 'adresse adresse adresse adresse adresse adresse adresse ', 'ouarzazate', '2023-06-10 20:55:41', '2023-06-10 20:55:41'),
(5, 'mat2', 'adresse ', 'adresse ', 'adresse@gmail.com', '', '0712345783', '2023-06-22', 'adresse adresse adresse adresse adresse adresse adresse adresse adresse adresse ', 'zagora', '2023-06-10 20:56:38', '2023-06-10 20:56:38'),
(6, 'mat5', 'prenom', 'nom', 'nomPrenom@gmail.com', '', '0671627182', '2023-06-23', 'adresse 1 adresse 1 adresse 1 adresse 1', 'marakech', '2023-06-10 20:57:23', '2023-06-10 20:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateBirth` date DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `fName`, `lName`, `email`, `dateBirth`, `phone`, `adresse`, `city`, `created_at`, `updated_at`) VALUES
(1, 'said', 'ait driss', 'saidaitdriss@gmail.com', '2023-06-10', '617260124', 'adresse', 'ville', '2023-06-09 21:56:25', '2023-06-09 21:56:25'),
(2, 'ali', 'mohamed', 'ali@gmail.com', '2023-06-10', '623478234', 'adresse', 'ville', '2023-06-10 08:46:04', '2023-06-10 08:46:04'),
(3, 'med', 'med', 'med@gmail.com', '2023-06-10', '0632456789', '', '', '2023-06-10 08:47:26', '2023-06-10 08:47:26'),
(4, 'zakaria', 'ali', 'zakaria@gmail.com', '2023-06-10', '0789734627', '', '', '2023-06-10 08:47:26', '2023-06-10 08:47:26'),
(5, 'abdel', 'abdel', 'abdel@gmail.com', '2023-06-10', '0723671827', '', '', '2023-06-10 08:48:04', '2023-06-10 08:48:04'),
(6, 'mostapha', 'ben', 'mostapha@gmail.com', '2023-06-10', '0623789182', 'default adress', 'default adress', '2023-06-10 08:48:59', '2023-06-10 08:48:59'),
(7, 'nordin', 'nordin', 'nordin@gmail.com', '2023-06-10', '0617287346', '', '', '2023-06-10 08:48:59', '2023-06-10 08:48:59'),
(8, 'test 1', 'test 1', 'test1@gmail.com', '2023-06-10', '0617283983', '', '', '2023-06-10 08:49:51', '2023-06-10 08:49:51'),
(9, 'test 2', 'test 2', 'test2@gmail.com', '2023-06-10', '0632536172', '', '', '2023-06-10 08:49:51', '2023-06-10 08:49:51'),
(10, 'test 3', 'test 3', 'test3@gmail.com', '2023-06-10', '0623267182', '', '', '2023-06-10 08:50:47', '2023-06-10 08:50:47'),
(11, 'zineb', 'zineb', 'zineb@gmail.com', '2023-06-10', '0634526718', '', '', '2023-06-10 08:50:47', '2023-06-10 08:50:47'),
(12, 'me', 'ne', 'saidaitdrissofficial1@gmail.com', '2023-06-11', '0617260124', 'adasfsdf', 'asfasfsf', '2023-06-10 14:50:49', '2023-06-10 14:50:49'),
(15, 'mehdi', 'mehdi', 'mehdi@sfsd.com', '2023-06-08', '8124124232', 'sfsdfsdf', 'sfsfsdfsd', '2023-06-11 15:18:58', '2023-06-11 15:18:58'),
(16, 'phone', 'phone', 'phone@phone.com', '2023-06-16', '1827381931', 'phone', 'phone', '2023-06-11 15:26:03', '2023-06-11 15:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id`, `nom`, `etat`, `description`) VALUES
(1, 'salle 1', 'bien', 'some desc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2026 at 06:15 PM
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
-- Database: `gestion_scolaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `id_matiere` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_AFFECTATION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation`
--

INSERT INTO `affectation` (`id_matiere`, `id_classe`, `id_enseignant`, `id_AFFECTATION`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(50) DEFAULT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  `capacite_max` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `niveau`, `capacite_max`) VALUES
(1, 'TCS1', 'Tronc Commun', '30'),
(2, '1BAC-SM', '1ere Bac', '35'),
(3, '2BAC-SM', '2eme Bac', '40');

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `id_eleve` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `date_naissance` int(11) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `nom`, `prenom`, `date_naissance`, `adresse`, `telephone`) VALUES
(1, 'Alaoui', 'Youssef', 2008, 'Beni Mellal', '0612345678'),
(2, 'Benali', 'Sara', 2009, 'Casablanca', '0623456789'),
(3, 'Karimi', 'Omar', 2008, 'Marrakech', '0634567890');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom`, `prenom`, `email`, `telephone`) VALUES
(1, 'Amrani', 'Khalid', 'k.amrani@gmail.com', '0645678901'),
(2, 'Idrissi', 'Fatima', 'f.idrissi@gmail.com', '0656789012'),
(3, 'Lahlou', 'Ahmed', 'a.lahlou@gmail.com', '0667890123');

-- --------------------------------------------------------

--
-- Table structure for table `inscrire`
--

CREATE TABLE `inscrire` (
  `id_eleve` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_inscrire` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscrire`
--

INSERT INTO `inscrire` (`id_eleve`, `id_classe`, `id_inscrire`, `date_inscription`) VALUES
(1, 1, 101, '2024-09-01'),
(2, 1, 102, '2024-09-01'),
(3, 2, 103, '2024-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`) VALUES
(1, 'Mathematiques'),
(2, 'Physique'),
(3, 'Informatique');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id_matiere`,`id_classe`,`id_enseignant`),
  ADD UNIQUE KEY `id_AFFECTATION` (`id_AFFECTATION`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_enseignant` (`id_enseignant`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id_eleve`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`);

--
-- Indexes for table `inscrire`
--
ALTER TABLE `inscrire`
  ADD PRIMARY KEY (`id_eleve`,`id_classe`),
  ADD UNIQUE KEY `id_inscrire` (`id_inscrire`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `affectation_ibfk_3` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`);

--
-- Constraints for table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `inscrire_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleve` (`id_eleve`),
  ADD CONSTRAINT `inscrire_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

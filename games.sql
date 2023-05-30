-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 mai 2023 à 11:24
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `games`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userUuid` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `profileUuid` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `visibility` int NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `duel`
--

DROP TABLE IF EXISTS `duel`;
CREATE TABLE IF NOT EXISTS `duel` (
  `uuid` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `user1Uuid` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `user2Uuid` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `duelStatus` int NOT NULL DEFAULT '0',
  `winnerUuid` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uuid` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `permission` int NOT NULL DEFAULT '0',
  `avatar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uuid`, `username`, `email`, `password`, `permission`, `avatar`, `date`) VALUES
('', 'dfza', 'dazd', 'zadza', 0, NULL, '2023-05-28'),
('c896f43e-e4e6-4eb0-871b-9e893ff0291a', 'ArcPro', 'admin@admin.com', '$2y$10$4zZ4BeMyZaxEM7AjUCtete8.4xwRBnHsGgxnqsvmLEbBquCYMBKU6', 1, NULL, '2023-05-02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 mai 2023 à 11:16
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userUuid` varchar(40) NOT NULL,
  `profileUuid` varchar(40) NOT NULL,
  `message` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `duel`
--

CREATE TABLE `duel` (
  `uuid` varchar(40) NOT NULL,
  `user1Uuid` varchar(40) NOT NULL,
  `user2Uuid` varchar(40) NOT NULL,
  `duelStatus` int(11) NOT NULL DEFAULT 0,
  `winnerUuid` varchar(40) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `uuid` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(100) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uuid`, `username`, `email`, `password`, `permission`, `avatar`, `date`) VALUES
('', 'dfza', 'dazd', 'zadza', 0, NULL, '2023-05-28'),
('91918de3-fc42-4d8f-b93b-1a71075d4ca6', 'tetetet', 'eafezz@gmail.com', '$2y$10$rz6cy0G4fLP./xAiD7R4zOfVYTB3A9/lJkz3ajGjBuCeoMqxp5jIa', 0, NULL, '0000-00-00'),
('939554ab-7599-4c81-8c7a-29ebcfc12636', 'tedaqz', 'azza@gmail.com', '$2y$10$PMjSpiFQdrntk2zGQOMx0eg9jRyPJTLWYVDqsBL/l3Rot0xpEAInC', 2, NULL, '2023-05-31'),
('c896f43e-e4e6-4eb0-871b-9e893ff0291a', 'ArcPro', 'admin@admin.com', '$2y$10$4zZ4BeMyZaxEM7AjUCtete8.4xwRBnHsGgxnqsvmLEbBquCYMBKU6', 1, NULL, '2023-05-02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `duel`
--
ALTER TABLE `duel`
  ADD PRIMARY KEY (`uuid`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uuid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 juin 2023 à 23:20
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
-- Base de données : `gestion_notes`
--

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `debutT` datetime DEFAULT NULL,
  `finT` datetime DEFAULT NULL,
  `id_statut` int NOT NULL DEFAULT '1',
  `CIN` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notes_ibfk_1` (`id_statut`),
  KEY `notes_ibfk_2` (`CIN`)
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `titre`, `description`, `debutT`, `finT`, `id_statut`, `CIN`) VALUES
(3, 'SGBD 1', 'Le cours de sgbd 1', '2023-05-30 08:37:00', '2023-06-12 08:43:00', 2, 'gy747885'),
(5, 'pray', 'go to pray jomoaa', '2023-06-16 01:00:00', '2023-06-16 02:00:00', 2, 'gy747885'),
(6, 'play football', 'play football tomorrow with friend', '2023-06-16 15:00:00', '2023-06-16 16:00:00', 2, 'gy747885'),
(7, 'sgbd 1', '', '2023-06-15 23:35:00', '2023-06-14 23:35:00', 2, 'gy747885'),
(8, 'test', '', '2023-06-15 23:43:00', '2023-06-16 23:43:00', 2, 'gy747885');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(50) DEFAULT NULL,
  `procColor` varchar(50) NOT NULL DEFAULT '#B31312',
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `Libelle`, `procColor`) VALUES
(1, 'En cours', '#B31312'),
(2, 'Terminé', '#116A7B');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `CIN` varchar(10) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CIN`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`CIN`, `nom`, `prenom`, `email`, `password`, `adresse`, `ville`, `telephone`, `photo`) VALUES
('gy747885', 'zakaria', 'Sdik', 'zakariasdik@gmail.com', '530f6e5b846984f688a176b37586f871', 'Av mohammed 5 no 166', 'Sidi yahia gharb', '0610544298', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `users` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

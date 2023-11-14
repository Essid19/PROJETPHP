-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 nov. 2023 à 20:38
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
-- Base de données : `snm_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_catg` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) NOT NULL,
  PRIMARY KEY (`id_catg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_cmd` int NOT NULL AUTO_INCREMENT,
  `date_cmd` date NOT NULL,
  `qte_cmd` int NOT NULL,
  `id_med` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id_cmd`),
  KEY `fk_cmd` (`id_med`),
  KEY `fk_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_cmn` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `id_d` int NOT NULL,
  `id_med` int NOT NULL,
  PRIMARY KEY (`id_cmn`),
  KEY `fk_d` (`id_d`),
  KEY `fk_med` (`id_med`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

DROP TABLE IF EXISTS `medicaments`;
CREATE TABLE IF NOT EXISTS `medicaments` (
  `id_med` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `qte_med` int NOT NULL,
  `id_catg` int NOT NULL,
  `id_ph` int NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`id_med`),
  KEY `fk_med` (`id_catg`),
  KEY `fk_ph` (`id_ph`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rendez-vous`
--

DROP TABLE IF EXISTS `rendez-vous`;
CREATE TABLE IF NOT EXISTS `rendez-vous` (
  `id_rendezvous` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_p` int NOT NULL,
  `id_d` int NOT NULL,
  PRIMARY KEY (`id_rendezvous`),
  KEY `fk_p` (`id_p`),
  KEY `fk_d` (`id_d`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `specialité` varchar(70) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `pwd` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_med`) REFERENCES `medicaments` (`id_med`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_med`) REFERENCES `medicaments` (`id_med`),
  ADD CONSTRAINT `commentaires_ibfk_3` FOREIGN KEY (`id_d`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD CONSTRAINT `medicaments_ibfk_1` FOREIGN KEY (`id_catg`) REFERENCES `categories` (`id_catg`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `medicaments_ibfk_2` FOREIGN KEY (`id_ph`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  ADD CONSTRAINT `rendez-vous_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `rendez-vous_ibfk_2` FOREIGN KEY (`id_d`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

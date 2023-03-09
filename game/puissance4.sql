-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 mars 2023 à 14:46
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
-- Base de données : `puissance4`
--

-- --------------------------------------------------------

--
-- Structure de la table `savepuissance4`
--

DROP TABLE IF EXISTS `savepuissance4`;
CREATE TABLE IF NOT EXISTS `savepuissance4` (
                                                `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                                `user1` varchar(50) NOT NULL,
    `user2` varchar(50) NOT NULL,
    `winner` varchar(50) NOT NULL,
    `gridData` varchar(500) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `savepuissance4`
--

INSERT INTO `savepuissance4` (`id`, `user1`, `user2`, `winner`, `gridData`) VALUES
    (3, 'Joueur 1', 'Joueur 2', 'Joueur 2', '[[0,0,0,0,0,0,0],[0,0,0,0,0,0,0],[0,1,0,0,0,0,0],[0,1,2,0,0,0,0],[0,1,2,0,0,0,0],[0,1,2,0,0,0,0],{\"1\":1,\"2\":2,\"3\":1,\"5\":2,\"4\":1,\"6\":1,\"0\":2}]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

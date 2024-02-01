-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 déc. 2019 à 07:03
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hockey_stats`
--
CREATE DATABASE IF NOT EXISTS `hockey_stats` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `hockey_stats`;

-- --------------------------------------------------------

--
-- Structure de la table `t_equipe`
--

DROP TABLE IF EXISTS `t_equipe`;
CREATE TABLE IF NOT EXISTS `t_equipe` (
  `PK_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  PRIMARY KEY (`PK_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_equipe`
--

INSERT INTO `t_equipe` (`PK_equipe`, `Nom`) VALUES
(1, 'SC Bern'),
(2, 'HC Fribourg-Gottéron'),
(3, 'EV Zug'),
(4, 'ZSC Lions');

-- --------------------------------------------------------

--
-- Structure de la table `t_joueur`
--

DROP TABLE IF EXISTS `t_joueur`;
CREATE TABLE IF NOT EXISTS `t_joueur` (
  `PK_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `FK_equipe` int(11) NOT NULL,
  `Points` int(11) NOT NULL,
  PRIMARY KEY (`PK_joueur`),
  KEY `FK_equipe` (`FK_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_joueur`
--

INSERT INTO `t_joueur` (`PK_joueur`, `Nom`, `FK_equipe`, `Points`) VALUES
(1, 'Byron Ritchie', 1, 22),
(2, 'Josh Holden', 3, 17),
(3, 'Andrey Bykov', 2, 17),
(4, 'Martin Plüss', 1, 16),
(5, 'Ryan Gardner', 1, 15),
(6, 'Travis Roche', 1, 15),
(7, 'Simon Gamache', 2, 14),
(8, 'Reto Suri', 3, 14),
(9, 'Lino Martschini', 3, 14),
(10, 'Julien Sprunger', 2, 13),
(11, 'Benny Plüss', 2, 11),
(12, 'Roman Wick', 4, 10),
(13, 'Ivo Rüthemann', 1, 9),
(14, 'Thibaut Monnet', 4, 9),
(15, 'Geoff Kinrade', 1, 9),
(16, 'Joël Vermin', 1, 9),
(17, 'Corsin Casutt', 3, 9),
(18, 'Christian Dubé', 2, 9),
(19, 'Mathias Seger', 4, 9),
(20, 'Fabian Sutter', 3, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

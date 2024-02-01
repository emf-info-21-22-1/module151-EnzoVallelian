-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 04 Septembre 2013 à 14:08
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `bd_kitzbuehl` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bd_kitzbuehl`;
-- --------------------------------------------------------

--
-- Structure de la table `t_pays`
--

CREATE TABLE IF NOT EXISTS `t_pays` (
  `PK_pays` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  PRIMARY KEY (`PK_pays`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `t_pays`
--

INSERT INTO `t_pays` (`PK_pays`, `Nom`) VALUES
(1, 'Suisse'),
(2, 'Autriche'),
(3, 'France'),
(4, 'Slovénie'),
(5, 'Allemagne'),
(6, 'Canada'),
(7, 'USA'),
(8, 'Norvège'),
(9, 'Italie'),
(10, 'Bulgarie'),
(13, 'Suède');

-- --------------------------------------------------------

--
-- Structure de la table `t_skieur`
--

CREATE TABLE IF NOT EXISTS `t_skieur` (
  `PK_Skieur` int(11) NOT NULL AUTO_INCREMENT,
  `Position` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `FK_Pays` int(11) NOT NULL,
  PRIMARY KEY (`PK_Skieur`),
  KEY `FK_Pays` (`FK_Pays`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

--
-- Contenu de la table `t_skieur`
--

INSERT INTO `t_skieur` (`PK_Skieur`, `Position`, `Nom`, `FK_Pays`) VALUES
(9, 1, 'Beat FEUZ', 1),
(7, 2, 'Marco ODERMATT', 1),
(1, 3, 'Daniel HEMETSBERGER', 2),
(13, 4, 'Matthias MAYER', 2),
(5, 5, 'Johan CLAREY', 3),
(11, 6, 'Aleksander Aamodt KILDE', 8),
(15, 7, 'Dominik PARIS', 9),
(3, 8, 'Niels HINTERMANN', 1),
(16, 9, 'Christof INNERHOFER', 9),
(27, 10, 'Daniel DANKLMAIER', 2),
(10, 11, 'Travis GANONG', 7),
(6, 12, 'Bryce BENNETT', 7),
(17, 13, 'Vincent KRIECHMAYR', 2),
(8, 14, 'Max FRANZ', 2),
(12, 15, 'Romed BAUMANN', 5),
(45, 16, 'Miha HROBAT', 4),
(18, 17, 'Matteo MARSAGLIA', 9),
(31, 18, 'Maxence MUZATON', 3),
(21, 19, 'Jared GOLDBERG', 7),
(24, 20, 'Josef FERSTL', 5),
(35, 21, 'Steven NYMAN', 7),
(14, 22, 'Dominik SCHWAIGER', 5),
(25, 23, 'James CRAWFORD', 6),
(28, 24, 'Urs KRYENBUEHL', 1),
(32, 25, 'Gilles ROULIN', 1),
(50, 26, 'Pietro ZAZZI', 9),
(30, 27, 'Nils ALLEGRE', 3),
(43, 28, 'Guglielmo BOSCA', 9),
(23, 29, 'Blaise GIEZENDANNER', 3),
(4, 30, 'Andreas SANDER', 5);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_skieur`
--
ALTER TABLE `t_skieur`
  ADD CONSTRAINT `t_skieur_ibfk_1` FOREIGN KEY (`FK_Pays`) REFERENCES `t_pays` (`PK_pays`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

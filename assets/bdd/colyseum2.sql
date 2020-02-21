-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 fév. 2020 à 08:00
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `colyseum2`
--

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_admin`
--

DROP TABLE IF EXISTS `colyseum_admin`;
CREATE TABLE IF NOT EXISTS `colyseum_admin` (
  `id_Admin` int(11) NOT NULL AUTO_INCREMENT,
  `login_Admin` varchar(50) NOT NULL,
  `password_Admin` varchar(255) NOT NULL,
  `mail_Admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_admin`
--

INSERT INTO `colyseum_admin` (`id_Admin`, `login_Admin`, `password_Admin`, `mail_Admin`) VALUES
(1, 'chapelleJ', '1234', 'chapelle.julien@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_clients`
--

DROP TABLE IF EXISTS `colyseum_clients`;
CREATE TABLE IF NOT EXISTS `colyseum_clients` (
  `id_Clients` int(11) NOT NULL AUTO_INCREMENT,
  `lastName_Clients` varchar(50) NOT NULL,
  `firstName_Clients` varchar(50) NOT NULL,
  `birthDate_Clients` varchar(50) NOT NULL,
  `mail_Clients` varchar(255) NOT NULL,
  `password_Clients` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Clients`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_clients`
--

INSERT INTO `colyseum_clients` (`id_Clients`, `lastName_Clients`, `firstName_Clients`, `birthDate_Clients`, `mail_Clients`, `password_Clients`) VALUES
(1, 'Dupont', 'Paul', '1980-11-02', 'dupont.paul@gmail.com', '$2y$10$VgNtTkdOdzV9fe8n8zI8.OyONiTrp32zwhEHMwSGcUYKYViodbpbm'),
(2, 'Chapelle', 'Julien', '1986-11-29', 'chapellejulien@laposte.net', '$2y$10$TEMa3OPgm74tWSkqMCsEiO9SUJX6jjkYCI1mMxfeisK.4azna0Gp.'),
(5, 'Cimer', 'Albert', '1963-02-14', 'cimer.albert@gmail.com', '$2y$10$XeffUB/9671dXMrzaSXgneajGe11Dpb4.hJ/XV3HBLor.vxTFeGJK');

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_command`
--

DROP TABLE IF EXISTS `colyseum_command`;
CREATE TABLE IF NOT EXISTS `colyseum_command` (
  `id_Command` int(11) NOT NULL AUTO_INCREMENT,
  `ref_Command` varchar(10) NOT NULL,
  `id_Clients` int(11) NOT NULL,
  `id_Tickets` int(11) NOT NULL,
  PRIMARY KEY (`id_Command`),
  KEY `colyseum_Command_colyseum_Clients_FK` (`id_Clients`),
  KEY `colyseum_Command_colyseum_Tickets0_FK` (`id_Tickets`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_command`
--

INSERT INTO `colyseum_command` (`id_Command`, `ref_Command`, `id_Clients`, `id_Tickets`) VALUES
(1, 'ROAC01', 1, 1),
(2, 'RANA01', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_comment`
--

DROP TABLE IF EXISTS `colyseum_comment`;
CREATE TABLE IF NOT EXISTS `colyseum_comment` (
  `id_Comment` int(11) NOT NULL AUTO_INCREMENT,
  `text_Comment` text NOT NULL,
  `id_Shows` int(11) NOT NULL,
  `id_Clients` int(11) NOT NULL,
  PRIMARY KEY (`id_Comment`),
  KEY `colyseum_Comment_colyseum_Shows_FK` (`id_Shows`),
  KEY `colyseum_Comment_colyseum_Clients0_FK` (`id_Clients`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_comment`
--

INSERT INTO `colyseum_comment` (`id_Comment`, `text_Comment`, `id_Shows`, `id_Clients`) VALUES
(1, 'Super Concert !! J\'ai adoré !', 1, 2),
(2, 'Toujours aussi impressionnant ! Un flow de fou !', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_contact`
--

DROP TABLE IF EXISTS `colyseum_contact`;
CREATE TABLE IF NOT EXISTS `colyseum_contact` (
  `id_Contact` int(11) NOT NULL AUTO_INCREMENT,
  `object_Contact` varchar(50) NOT NULL,
  `text_Contact` text NOT NULL,
  `id_Clients` int(11) NOT NULL,
  PRIMARY KEY (`id_Contact`),
  KEY `colyseum_Contact_colyseum_Clients_FK` (`id_Clients`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_genres`
--

DROP TABLE IF EXISTS `colyseum_genres`;
CREATE TABLE IF NOT EXISTS `colyseum_genres` (
  `id_Genres` int(11) NOT NULL AUTO_INCREMENT,
  `name_Genres` varchar(50) NOT NULL,
  `id_ShowTypes` int(11) NOT NULL,
  PRIMARY KEY (`id_Genres`),
  KEY `colyseum_Genres_colyseum_ShowTypes_FK` (`id_ShowTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_genres`
--

INSERT INTO `colyseum_genres` (`id_Genres`, `name_Genres`, `id_ShowTypes`) VALUES
(1, 'Concert', 1),
(2, 'Spectacle', 3);

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_shows`
--

DROP TABLE IF EXISTS `colyseum_shows`;
CREATE TABLE IF NOT EXISTS `colyseum_shows` (
  `id_Shows` int(11) NOT NULL AUTO_INCREMENT,
  `img_Shows` varchar(255) NOT NULL,
  `title_Shows` varchar(100) NOT NULL,
  `performer_Shows` varchar(50) NOT NULL,
  `dateHour_Shows` datetime NOT NULL,
  `duration_Shows` time NOT NULL,
  `id_ShowTypes` int(11) NOT NULL,
  `id_Genres` int(11) NOT NULL,
  PRIMARY KEY (`id_Shows`),
  KEY `colyseum_Shows_colyseum_ShowTypes_FK` (`id_ShowTypes`),
  KEY `colyseum_Shows_colyseum_Genres0_FK` (`id_Genres`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_shows`
--

INSERT INTO `colyseum_shows` (`id_Shows`, `img_Shows`, `title_Shows`, `performer_Shows`, `dateHour_Shows`, `duration_Shows`, `id_ShowTypes`, `id_Genres`) VALUES
(1, 'acdc.jpg', 'AC-DC Tour', 'AC-DC', '2020-05-21 20:00:00', '02:00:00', 1, 1),
(2, 'nas.jpg', 'NAS Tour', 'NAS', '2020-04-15 21:00:00', '03:00:00', 2, 1),
(5, 'jokerLive.jpg', 'Joker Live In Concert', 'Hildur Guðnadóttir', '2020-05-13 20:00:00', '02:00:00', 4, 1),
(6, 'bargeton.jpg', 'WOMAN IS COMING', 'Julien Bargeton', '2020-04-28 20:00:00', '02:00:00', 5, 2),
(7, 'foresti2.jpg', 'FLORENCE FORESTI - EPILOGUE', 'Florence Foresti', '2020-05-27 20:00:00', '02:00:00', 5, 2),
(8, 'roiLion.jpg', 'Le Roi Lion', 'Disney', '2020-09-22 20:00:00', '03:00:00', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_showtypes`
--

DROP TABLE IF EXISTS `colyseum_showtypes`;
CREATE TABLE IF NOT EXISTS `colyseum_showtypes` (
  `id_ShowTypes` int(11) NOT NULL AUTO_INCREMENT,
  `types_ShowTypes` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ShowTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_showtypes`
--

INSERT INTO `colyseum_showtypes` (`id_ShowTypes`, `types_ShowTypes`) VALUES
(1, 'Rock'),
(2, 'Rap'),
(3, 'Comédie Musicale'),
(4, 'Ciné-concert'),
(5, 'Comédie');

-- --------------------------------------------------------

--
-- Structure de la table `colyseum_tickets`
--

DROP TABLE IF EXISTS `colyseum_tickets`;
CREATE TABLE IF NOT EXISTS `colyseum_tickets` (
  `id_Tickets` int(11) NOT NULL AUTO_INCREMENT,
  `price_Tickets` float NOT NULL,
  `type_Tickets` varchar(50) NOT NULL,
  `id_Shows` int(11) NOT NULL,
  PRIMARY KEY (`id_Tickets`),
  KEY `colyseum_Tickets_colyseum_Shows_FK` (`id_Shows`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colyseum_tickets`
--

INSERT INTO `colyseum_tickets` (`id_Tickets`, `price_Tickets`, `type_Tickets`, `id_Shows`) VALUES
(1, 50, 'FOSSE', 1),
(2, 30, 'FOSSE', 2),
(6, 84, 'Plein Tarif - Carré Or ', 5),
(7, 56, 'Plein Tarif - Catégorie 2', 5),
(8, 40, 'Plein Tarif - Catégorie 3', 5),
(10, 67, 'Plein Tarif - Catégorie 1', 5),
(11, 28, 'Prix unique', 6),
(12, 19, 'Prix unique', 7),
(13, 75, 'Catégorie 1', 8),
(14, 56, 'Catégorie 2', 8),
(15, 38, 'Catégorie 3', 8),
(16, 24, 'Catégorie 4', 8);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `colyseum_command`
--
ALTER TABLE `colyseum_command`
  ADD CONSTRAINT `colyseum_Command_colyseum_Clients_FK` FOREIGN KEY (`id_Clients`) REFERENCES `colyseum_clients` (`id_Clients`),
  ADD CONSTRAINT `colyseum_Command_colyseum_Tickets0_FK` FOREIGN KEY (`id_Tickets`) REFERENCES `colyseum_tickets` (`id_Tickets`);

--
-- Contraintes pour la table `colyseum_comment`
--
ALTER TABLE `colyseum_comment`
  ADD CONSTRAINT `colyseum_Comment_colyseum_Clients0_FK` FOREIGN KEY (`id_Clients`) REFERENCES `colyseum_clients` (`id_Clients`),
  ADD CONSTRAINT `colyseum_Comment_colyseum_Shows_FK` FOREIGN KEY (`id_Shows`) REFERENCES `colyseum_shows` (`id_Shows`);

--
-- Contraintes pour la table `colyseum_contact`
--
ALTER TABLE `colyseum_contact`
  ADD CONSTRAINT `colyseum_Contact_colyseum_Clients_FK` FOREIGN KEY (`id_Clients`) REFERENCES `colyseum_clients` (`id_Clients`);

--
-- Contraintes pour la table `colyseum_genres`
--
ALTER TABLE `colyseum_genres`
  ADD CONSTRAINT `colyseum_Genres_colyseum_ShowTypes_FK` FOREIGN KEY (`id_ShowTypes`) REFERENCES `colyseum_showtypes` (`id_ShowTypes`);

--
-- Contraintes pour la table `colyseum_shows`
--
ALTER TABLE `colyseum_shows`
  ADD CONSTRAINT `colyseum_Shows_colyseum_Genres0_FK` FOREIGN KEY (`id_Genres`) REFERENCES `colyseum_genres` (`id_Genres`),
  ADD CONSTRAINT `colyseum_Shows_colyseum_ShowTypes_FK` FOREIGN KEY (`id_ShowTypes`) REFERENCES `colyseum_showtypes` (`id_ShowTypes`);

--
-- Contraintes pour la table `colyseum_tickets`
--
ALTER TABLE `colyseum_tickets`
  ADD CONSTRAINT `colyseum_Tickets_colyseum_Shows_FK` FOREIGN KEY (`id_Shows`) REFERENCES `colyseum_shows` (`id_Shows`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

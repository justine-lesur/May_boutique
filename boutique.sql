-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 avr. 2020 à 19:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--
CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_taille` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `date` timestamp NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `id_categorie`, `id_type`, `id_taille`, `image`, `description`, `prix`, `date`, `quantite`) VALUES
(1, 'Robe avec ceinture à nouer', 1, 2, 1, 'img/robe1.jpg', 'Robe courte tissée. Modèle avec ouverture dans le dos surmontée d’un bouton habillé sur la nuque. Courtes manches amples et ceinture amovible à nouer à la taille. Non doublée.', 19.99, '2020-04-05 17:00:00', 5),
(5, 'Robe à motif', 1, 2, 2, 'img/robe2.jpg', 'Robe de longueur mi-mollet en crêpe de viscose. Modèle avec encolure en V et boutonnage sur toute la hauteur devant. Manches courtes terminées par petite ouverture avec liens à nouer. Deux fentes à la base devant. Non doublée.', 24.99, '2020-04-05 17:00:00', 5),
(2, 'Robe avec ceinture à nouer', 1, 2, 2, 'img/robe1.jpg', 'Robe courte tissée. Modèle avec ouverture dans le dos surmontée d’un bouton habillé sur la nuque. Courtes manches amples et ceinture amovible à nouer à la taille. Non doublée.', 19.99, '2020-04-05 17:00:00', 5),
(6, 'Robe à motif', 1, 2, 3, 'img/robe2.jpg', 'Robe de longueur mi-mollet en crêpe de viscose. Modèle avec encolure en V et boutonnage sur toute la hauteur devant. Manches courtes terminées par petite ouverture avec liens à nouer. Deux fentes à la base devant. Non doublée.', 24.99, '2020-04-05 17:00:00', 5),
(3, 'Robe avec ceinture à nouer', 1, 2, 3, 'img/robe1.jpg', 'Robe courte tissée. Modèle avec ouverture dans le dos surmontée d’un bouton habillé sur la nuque. Courtes manches amples et ceinture amovible à nouer à la taille. Non doublée.', 19.99, '2020-04-05 17:00:00', 5),
(4, 'Robe à motif', 1, 2, 1, 'img/robe2.jpg', 'Robe de longueur mi-mollet en crêpe de viscose. Modèle avec encolure en V et boutonnage sur toute la hauteur devant. Manches courtes terminées par petite ouverture avec liens à nouer. Deux fentes à la base devant. Non doublée.', 24.99, '2020-04-05 17:00:00', 5),
(8, 'Robe à manches bouffantes', 1, 2, 2, 'img/robe3.jpg', 'Robe trapèze de longueur genou en jersey flammé de coton mélangé de bonne tenue. Modèle avec encolure carrée et élastique en haut. Courtes manches bouffantes terminées par élastique. Non doublée.', 19.99, '2020-04-05 16:00:00', 5),
(7, 'Robe à manches bouffantes', 1, 2, 1, 'img/robe3.jpg', 'Robe trapèze de longueur genou en jersey flammé de coton mélangé de bonne tenue. Modèle avec encolure carrée et élastique en haut. Courtes manches bouffantes terminées par élastique. Non doublée.', 19.99, '2020-04-05 16:00:00', 5),
(9, 'Robe à manches bouffantes', 1, 2, 3, 'img/robe3.jpg', 'Robe trapèze de longueur genou en jersey flammé de coton mélangé de bonne tenue. Modèle avec encolure carrée et élastique en haut. Courtes manches bouffantes terminées par élastique. Non doublée.', 19.99, '2020-04-05 16:00:00', 5),
(10, 'Top à manches longues', 1, 1, 1, 'img/top1.jpg', 'Top ajusté en jersey de coton doux. Modèle avec encolure ronde et manches longues.', 7.99, '2020-04-05 18:00:00', 5),
(11, 'Top à manches longues', 1, 1, 2, 'img/top1.jpg', 'Top ajusté en jersey de coton doux. Modèle avec encolure ronde et manches longues.', 7.99, '2020-04-05 18:00:00', 5),
(12, 'Top à manches longues', 1, 1, 3, 'img/top1.jpg', 'Top ajusté en jersey de coton doux. Modèle avec encolure ronde et manches longues.', 7.99, '2020-04-05 18:00:00', 5),
(13, 'Débardeur en lin', 1, 1, 1, 'img/top2.jpg', 'Débardeur en doux jersey de lin. Modèle avec encolure en V plongeante devant et dans le dos.\r\n\r\n', 12.99, '2020-04-04 22:00:00', 5),
(14, 'Débardeur en lin', 1, 1, 2, 'img/top2.jpg', 'Débardeur en doux jersey de lin. Modèle avec encolure en V plongeante devant et dans le dos.\r\n\r\n', 12.99, '2020-04-04 22:00:00', 5),
(15, 'Débardeur en lin', 1, 1, 3, 'img/top2.jpg', 'Débardeur en doux jersey de lin. Modèle avec encolure en V plongeante devant et dans le dos.\r\n\r\n', 12.99, '2020-04-04 22:00:00', 5),
(16, 'T-shirt à encolure ronde', 1, 1, 1, 'img/top3.jpg', 'T-shirt en jersey souple. Modèle à encolure ronde avec manches courtes terminées par revers cousu. Base arrondie.', 9.99, '2020-04-04 22:00:00', 5),
(17, 'T-shirt à encolure ronde', 1, 1, 2, 'img/top3.jpg', 'T-shirt en jersey souple. Modèle à encolure ronde avec manches courtes terminées par revers cousu. Base arrondie.', 9.99, '2020-04-04 22:00:00', 5),
(18, 'T-shirt à encolure ronde', 1, 1, 3, 'img/top3.jpg', 'T-shirt en jersey souple. Modèle à encolure ronde avec manches courtes terminées par revers cousu. Base arrondie.', 9.99, '2020-04-04 22:00:00', 5),
(19, 'Jupe en jean', 1, 3, 1, 'img/jupe1.jpg', 'Jupe courte en denim de coton lavé. Modèle taille haute avec braguette zippée et bouton. Poches devant et dans le dos. Bord à cru à la base.', 19.99, '2020-04-04 22:00:00', 5),
(20, 'Jupe en jean', 1, 3, 2, 'img/jupe1.jpg', 'Jupe courte en denim de coton lavé. Modèle taille haute avec braguette zippée et bouton. Poches devant et dans le dos. Bord à cru à la base.', 19.99, '2020-04-04 22:00:00', 5),
(21, 'Jupe en jean', 1, 3, 3, 'img/jupe1.jpg', 'Jupe courte en denim de coton lavé. Modèle taille haute avec braguette zippée et bouton. Poches devant et dans le dos. Bord à cru à la base.', 19.99, '2020-04-04 22:00:00', 5),
(22, 'Jupe saharienne', 1, 3, 1, 'img/jupe2.jpg', 'Jupe courte en twill de coton de bonne tenue. Modèle avec taille haute façon paper bag, soulignée par large élastique habillé. Braguette zippée surmontée de deux boutons. Grandes poches plaquées à rabat sur les côtés. Non doublée.', 19.99, '2020-04-04 22:00:00', 5),
(23, 'Jupe saharienne', 1, 3, 2, 'img/jupe2.jpg', 'Jupe courte en twill de coton de bonne tenue. Modèle avec taille haute façon paper bag, soulignée par large élastique habillé. Braguette zippée surmontée de deux boutons. Grandes poches plaquées à rabat sur les côtés. Non doublée.', 19.99, '2020-04-04 22:00:00', 5),
(24, 'Jupe saharienne', 1, 3, 3, 'img/jupe2.jpg', 'Jupe courte en twill de coton de bonne tenue. Modèle avec taille haute façon paper bag, soulignée par large élastique habillé. Braguette zippée surmontée de deux boutons. Grandes poches plaquées à rabat sur les côtés. Non doublée.', 19.99, '2020-04-04 22:00:00', 5),
(25, 'Jupe avec fente montante', 1, 3, 1, 'img/jupe3.jpg', 'Jupe de longueur mi-mollet en tissu de viscose aérien. Modèle taille haute avec fermeture à glissière dissimulée, boutons décoratifs habillés devant et fente latérale montante. Non doublée.', 19.99, '2020-04-04 22:00:00', 5),
(26, 'Jupe avec fente montante', 1, 3, 2, 'img/jupe3.jpg', 'Jupe de longueur mi-mollet en tissu de viscose aérien. Modèle taille haute avec fermeture à glissière dissimulée, boutons décoratifs habillés devant et fente latérale montante. Non doublée.', 19.99, '2020-04-04 22:00:00', 5),
(27, 'Jupe avec fente montante', 1, 3, 3, 'img/jupe3.jpg', 'Jupe de longueur mi-mollet en tissu de viscose aérien. Modèle taille haute avec fermeture à glissière dissimulée, boutons décoratifs habillés devant et fente latérale montante. Non doublée.', 19.99, '2020-04-04 22:00:00', 5),
(28, 'Legging en coton', 1, 4, 1, 'img/pantalon1.jpg', 'Legging en doux jersey de coton bio mélangé. Modèle avec large bande élastique à la taille.', 9.99, '2020-04-04 22:00:00', 5),
(29, 'Legging en coton', 1, 4, 2, 'img/pantalon1.jpg', 'Legging en doux jersey de coton bio mélangé. Modèle avec large bande élastique à la taille.', 9.99, '2020-04-04 22:00:00', 5),
(30, 'Legging en coton', 1, 4, 3, 'img/pantalon1.jpg', 'Legging en doux jersey de coton bio mélangé. Modèle avec large bande élastique à la taille.', 9.99, '2020-04-04 22:00:00', 5),
(31, 'Salopette en denim', 1, 4, 1, 'img/pantalon2.jpg', 'Salopette en denim lavé extensible. Modèle avec bretelles réglables par attache en métal. Poche de poitrine, poches plaquées devant et poches dans le dos. Fausse braguette et fermeture à glissière sur le côté. Jambes fines.', 29.99, '2020-04-04 22:00:00', 5),
(32, 'Salopette en denim', 1, 4, 2, 'img/pantalon2.jpg', 'Salopette en denim lavé extensible. Modèle avec bretelles réglables par attache en métal. Poche de poitrine, poches plaquées devant et poches dans le dos. Fausse braguette et fermeture à glissière sur le côté. Jambes fines.', 29.99, '2020-04-04 22:00:00', 5),
(33, 'Salopette en denim', 1, 4, 3, 'img/pantalon2.jpg', 'Salopette en denim lavé extensible. Modèle avec bretelles réglables par attache en métal. Poche de poitrine, poches plaquées devant et poches dans le dos. Fausse braguette et fermeture à glissière sur le côté. Jambes fines.', 29.99, '2020-04-04 22:00:00', 5),
(34, 'Pantalon cigarette', 1, 4, 1, 'img/pantalon3.jpg', 'Pantalon cigarette en tissu extensible. Modèle de hauteur classique avec élastique dissimulé à la taille. Braguette zippée avec fermeture par agrafe dissimulée. Poches latérales et fausses poches dans le dos. Jambes effilées, de longueur cheville.', 19.99, '2020-04-04 22:00:00', 5),
(35, 'Pantalon cigarette', 1, 4, 2, 'img/pantalon3.jpg', 'Pantalon cigarette en tissu extensible. Modèle de hauteur classique avec élastique dissimulé à la taille. Braguette zippée avec fermeture par agrafe dissimulée. Poches latérales et fausses poches dans le dos. Jambes effilées, de longueur cheville.', 19.99, '2020-04-04 22:00:00', 5),
(36, 'Pantalon cigarette', 1, 4, 3, 'img/pantalon3.jpg', 'Pantalon cigarette en tissu extensible. Modèle de hauteur classique avec élastique dissimulé à la taille. Braguette zippée avec fermeture par agrafe dissimulée. Poches latérales et fausses poches dans le dos. Jambes effilées, de longueur cheville.', 19.99, '2020-04-04 22:00:00', 5),
(37, 'T-shirt avec impression', 2, 1, 1, 'img/tophomme1.jpg', 'T-shirt en doux jersey de coton avec impression.', 9.99, '2020-04-05 22:00:00', 5),
(38, 'T-shirt avec impression', 2, 1, 2, 'img/tophomme1.jpg', 'T-shirt en doux jersey de coton avec impression.', 9.99, '2020-04-05 22:00:00', 5),
(39, 'T-shirt avec impression', 2, 1, 3, 'img/tophomme1.jpg', 'T-shirt en doux jersey de coton avec impression.', 9.99, '2020-04-05 22:00:00', 5),
(40, 'T-shirt imprimé', 2, 1, 1, 'img/tophomme2.jpg', 'T-shirt en jersey de coton doux avec motif imprimé. Coupe droite avec petit bord-côte à l\'encolure.', 14.99, '2020-04-05 22:00:00', 5),
(41, 'T-shirt imprimé', 2, 1, 2, 'img/tophomme2.jpg', 'T-shirt en jersey de coton doux avec motif imprimé. Coupe droite avec petit bord-côte à l\'encolure.', 14.99, '2020-04-05 22:00:00', 5),
(42, 'T-shirt imprimé', 2, 1, 3, 'img/tophomme2.jpg', 'T-shirt en jersey de coton doux avec motif imprimé. Coupe droite avec petit bord-côte à l\'encolure.', 14.99, '2020-04-05 22:00:00', 5),
(43, 'T-shirt Slim Fit', 2, 1, 1, 'img/tophomme3.jpg', 'T-shirt à col tunisien en jersey de coton doux et extensible. Modèle à manches longues avec boutonnage en haut.', 9.99, '2020-04-05 22:00:00', 5),
(44, 'T-shirt Slim Fit', 2, 1, 2, 'img/tophomme3.jpg', 'T-shirt à col tunisien en jersey de coton doux et extensible. Modèle à manches longues avec boutonnage en haut.', 9.99, '2020-04-05 22:00:00', 5),
(45, 'T-shirt Slim Fit', 2, 1, 3, 'img/tophomme3.jpg', 'T-shirt à col tunisien en jersey de coton doux et extensible. Modèle à manches longues avec boutonnage en haut.', 9.99, '2020-04-05 22:00:00', 5),
(46, 'Pantalon jogger', 2, 4, 1, 'img/pantalonhomme1.jpg', 'Pantalon jogger en molleton. Modèle avec élastique et lien de serrage à la taille. Poches latérales zippées et fond descendu. Jambes effilées avec coutures au niveau des genoux et bord-côte à la base.', 24.99, '2020-04-05 22:00:00', 5),
(47, 'Pantalon jogger', 2, 4, 2, 'img/pantalonhomme1.jpg', 'Pantalon jogger en molleton. Modèle avec élastique et lien de serrage à la taille. Poches latérales zippées et fond descendu. Jambes effilées avec coutures au niveau des genoux et bord-côte à la base.', 24.99, '2020-04-05 22:00:00', 5),
(48, 'Pantalon jogger', 2, 4, 3, 'img/pantalonhomme1.jpg', 'Pantalon jogger en molleton. Modèle avec élastique et lien de serrage à la taille. Poches latérales zippées et fond descendu. Jambes effilées avec coutures au niveau des genoux et bord-côte à la base.', 24.99, '2020-04-05 22:00:00', 5),
(49, 'Pantalon de costume Skinny Fit', 2, 4, 1, 'img/pantalonhomme2.jpg', 'Pantalon de costume en tissu extensible. Modèle avec braguette zippée, agrafe dissimulée et fermeture à glissière. Poches latérales et poches passepoilées dans le dos. Plis marqués.', 29.99, '2020-04-05 22:00:00', 5),
(50, 'Pantalon de costume Skinny Fit', 2, 4, 2, 'img/pantalonhomme2.jpg', 'Pantalon de costume en tissu extensible. Modèle avec braguette zippée, agrafe dissimulée et fermeture à glissière. Poches latérales et poches passepoilées dans le dos. Plis marqués.', 29.99, '2020-04-05 22:00:00', 5),
(51, 'Pantalon de costume Skinny Fit', 2, 4, 3, 'img/pantalonhomme2.jpg', 'Pantalon de costume en tissu extensible. Modèle avec braguette zippée, agrafe dissimulée et fermeture à glissière. Poches latérales et poches passepoilées dans le dos. Plis marqués.', 29.99, '2020-04-05 22:00:00', 5),
(52, 'Pantalon en molleton', 2, 4, 1, 'img/pantalonhomme3.jpg', 'Pantalon en molleton avec coutures modelantes. Modèle avec élastique et lien de serrage à la taille. Poches devant et poches dans le dos. Fond descendu et finition bord-côte en bas de jambe.', 24.99, '2020-04-05 22:00:00', 5),
(53, 'Pantalon en molleton', 2, 4, 2, 'img/pantalonhomme3.jpg', 'Pantalon en molleton avec coutures modelantes. Modèle avec élastique et lien de serrage à la taille. Poches devant et poches dans le dos. Fond descendu et finition bord-côte en bas de jambe.', 24.99, '2020-04-05 22:00:00', 5),
(54, 'Pantalon en molleton', 2, 4, 3, 'img/pantalonhomme3.jpg', 'Pantalon en molleton avec coutures modelantes. Modèle avec élastique et lien de serrage à la taille. Poches devant et poches dans le dos. Fond descendu et finition bord-côte en bas de jambe.', 24.99, '2020-04-05 22:00:00', 5),
(55, 'Short en molleton', 2, 5, 1, 'img/short1.jpg', 'Short de longueur genou en molleton léger avec impression. Modèle avec élastique et lien de serrage à la taille. Poches latérales et une poche dans le dos. Fond légèrement descendu.', 14.99, '2020-04-05 22:00:00', 5),
(56, 'Short en molleton', 2, 5, 2, 'img/short1.jpg', 'Short de longueur genou en molleton léger avec impression. Modèle avec élastique et lien de serrage à la taille. Poches latérales et une poche dans le dos. Fond légèrement descendu.', 14.99, '2020-04-05 22:00:00', 5),
(57, 'Short en molleton', 2, 5, 3, 'img/short1.jpg', 'Short de longueur genou en molleton léger avec impression. Modèle avec élastique et lien de serrage à la taille. Poches latérales et une poche dans le dos. Fond légèrement descendu.', 14.99, '2020-04-05 22:00:00', 5),
(58, 'Short en molleton', 2, 5, 1, 'img/short2.jpg', 'Short en molleton léger avec biais contrastants. Modèle avec élastique et lien de serrage à la taille. Poches latérales.', 9.99, '2020-04-05 22:00:00', 5),
(59, 'Short en molleton', 2, 5, 2, 'img/short2.jpg', 'Short en molleton léger avec biais contrastants. Modèle avec élastique et lien de serrage à la taille. Poches latérales.', 9.99, '2020-04-05 22:00:00', 5),
(60, 'Short en molleton', 2, 5, 3, 'img/short2.jpg', 'Short en molleton léger avec biais contrastants. Modèle avec élastique et lien de serrage à la taille. Poches latérales.', 9.99, '2020-04-05 22:00:00', 5),
(61, 'Short running', 2, 5, 1, 'img/short3.jpg', 'Short running en textile technique à séchage rapide. Modèle avec élastique et lien de serrage dissimulé à la taille. Poches latérales zippées. Fond en mesh ventilé. Fond en mesh aéré. Slip intérieur en jersey.', 19.99, '2020-04-05 22:00:00', 5),
(62, 'Short running', 2, 5, 2, 'img/short3.jpg', 'Short running en textile technique à séchage rapide. Modèle avec élastique et lien de serrage dissimulé à la taille. Poches latérales zippées. Fond en mesh ventilé. Fond en mesh aéré. Slip intérieur en jersey.', 19.99, '2020-04-05 22:00:00', 5),
(63, 'Short running', 2, 5, 3, 'img/short3.jpg', 'Short running en textile technique à séchage rapide. Modèle avec élastique et lien de serrage dissimulé à la taille. Poches latérales zippées. Fond en mesh ventilé. Fond en mesh aéré. Slip intérieur en jersey.', 19.99, '2020-04-05 22:00:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'femme'),
(2, 'homme');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tailles`
--

DROP TABLE IF EXISTS `tailles`;
CREATE TABLE IF NOT EXISTS `tailles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tailles`
--

INSERT INTO `tailles` (`id`, `nom`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `nom`) VALUES
(1, 'tops'),
(2, 'robes'),
(3, 'jupes'),
(4, 'pantalons'),
(5, 'shorts');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 1337);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

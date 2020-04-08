-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2020 at 11:37 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `S` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `achats` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `id_categorie`, `id_type`, `image`, `description`, `prix`, `date`, `S`, `M`, `L`, `achats`) VALUES
(1, 'Robe avec ceinture à nouer', 1, 2, 'img/robe1.jpg', 'Robe courte tissée. Modèle avec ouverture dans le dos surmontée d’un bouton habillé sur la nuque. Courtes manches amples et ceinture amovible à nouer à la taille. Non doublée.', 19.99, '2020-04-06 21:30:30', 5, 5, 5, 0),
(4, 'Robe à motif', 1, 2, 'img/robe2.jpg', 'Robe de longueur mi-mollet en crêpe de viscose. Modèle avec encolure en V et boutonnage sur toute la hauteur devant. Manches courtes terminées par petite ouverture avec liens à nouer. Deux fentes à la base devant. Non doublée.', 24.99, '2020-04-06 21:31:13', 5, 5, 5, 0),
(9, 'Robe à manches bouffantes', 1, 2, 'img/robe3.jpg', 'Robe trapèze de longueur genou en jersey flammé de coton mélangé de bonne tenue. Modèle avec encolure carrée et élastique en haut. Courtes manches bouffantes terminées par élastique. Non doublée.', 19.99, '2020-04-06 21:31:23', 5, 5, 5, 0),
(12, 'Top à manches longues', 1, 1, 'img/top1.jpg', 'Top ajusté en jersey de coton doux. Modèle avec encolure ronde et manches longues.', 7.99, '2020-04-06 21:36:20', 5, 5, 5, 0),
(15, 'Débardeur en lin', 1, 1, 'img/top2.jpg', 'Débardeur en doux jersey de lin. Modèle avec encolure en V plongeante devant et dans le dos.\r\n\r\n', 12.99, '2020-04-06 21:36:33', 5, 5, 5, 0),
(18, 'T-shirt à encolure ronde', 1, 1, 'img/top3.jpg', 'T-shirt en jersey souple. Modèle à encolure ronde avec manches courtes terminées par revers cousu. Base arrondie.', 9.99, '2020-04-06 21:36:44', 5, 5, 5, 0),
(21, 'Jupe en jean', 1, 3, 'img/jupe1.jpg', 'Jupe courte en denim de coton lavé. Modèle taille haute avec braguette zippée et bouton. Poches devant et dans le dos. Bord à cru à la base.', 19.99, '2020-04-06 21:36:55', 5, 5, 5, 0),
(24, 'Jupe saharienne', 1, 3, 'img/jupe2.jpg', 'Jupe courte en twill de coton de bonne tenue. Modèle avec taille haute façon paper bag, soulignée par large élastique habillé. Braguette zippée surmontée de deux boutons. Grandes poches plaquées à rabat sur les côtés. Non doublée.', 19.99, '2020-04-06 21:37:07', 5, 5, 5, 0),
(27, 'Jupe avec fente montante', 1, 3, 'img/jupe3.jpg', 'Jupe de longueur mi-mollet en tissu de viscose aérien. Modèle taille haute avec fermeture à glissière dissimulée, boutons décoratifs habillés devant et fente latérale montante. Non doublée.', 19.99, '2020-04-06 21:37:17', 5, 5, 5, 0),
(30, 'Legging en coton', 1, 4, 'img/pantalon1.jpg', 'Legging en doux jersey de coton bio mélangé. Modèle avec large bande élastique à la taille.', 9.99, '2020-04-06 21:37:32', 5, 5, 5, 0),
(33, 'Salopette en denim', 1, 4, 'img/pantalon2.jpg', 'Salopette en denim lavé extensible. Modèle avec bretelles réglables par attache en métal. Poche de poitrine, poches plaquées devant et poches dans le dos. Fausse braguette et fermeture à glissière sur le côté. Jambes fines.', 29.99, '2020-04-06 21:37:44', 5, 5, 5, 0),
(36, 'Pantalon cigarette', 1, 4, 'img/pantalon3.jpg', 'Pantalon cigarette en tissu extensible. Modèle de hauteur classique avec élastique dissimulé à la taille. Braguette zippée avec fermeture par agrafe dissimulée. Poches latérales et fausses poches dans le dos. Jambes effilées, de longueur cheville.', 19.99, '2020-04-06 21:38:06', 5, 5, 5, 0),
(39, 'T-shirt avec impression', 2, 1, 'img/tophomme1.jpg', 'T-shirt en doux jersey de coton avec impression.', 9.99, '2020-04-06 21:38:20', 5, 5, 5, 0),
(42, 'T-shirt imprimé', 2, 1, 'img/tophomme2.jpg', 'T-shirt en jersey de coton doux avec motif imprimé. Coupe droite avec petit bord-côte à l\'encolure.', 14.99, '2020-04-06 21:38:33', 5, 5, 5, 0),
(45, 'T-shirt Slim Fit', 2, 1, 'img/tophomme3.jpg', 'T-shirt à col tunisien en jersey de coton doux et extensible. Modèle à manches longues avec boutonnage en haut.', 9.99, '2020-04-06 21:38:43', 5, 5, 5, 0),
(48, 'Pantalon jogger', 2, 4, 'img/pantalonhomme1.jpg', 'Pantalon jogger en molleton. Modèle avec élastique et lien de serrage à la taille. Poches latérales zippées et fond descendu. Jambes effilées avec coutures au niveau des genoux et bord-côte à la base.', 24.99, '2020-04-06 21:38:53', 5, 5, 5, 0),
(51, 'Pantalon de costume Skinny Fit', 2, 4, 'img/pantalonhomme2.jpg', 'Pantalon de costume en tissu extensible. Modèle avec braguette zippée, agrafe dissimulée et fermeture à glissière. Poches latérales et poches passepoilées dans le dos. Plis marqués.', 29.99, '2020-04-06 21:39:21', 5, 5, 5, 0),
(54, 'Pantalon en molleton', 2, 4, 'img/pantalonhomme3.jpg', 'Pantalon en molleton avec coutures modelantes. Modèle avec élastique et lien de serrage à la taille. Poches devant et poches dans le dos. Fond descendu et finition bord-côte en bas de jambe.', 24.99, '2020-04-06 21:39:31', 5, 5, 5, 0),
(60, 'Short en molleton', 2, 5, 'img/short2.jpg', 'Short en molleton léger avec biais contrastants. Modèle avec élastique et lien de serrage à la taille. Poches latérales.', 9.99, '2020-04-06 21:42:06', 5, 5, 5, 0),
(63, 'Short running', 2, 5, 'img/short3.jpg', 'Short running en textile technique à séchage rapide. Modèle avec élastique et lien de serrage dissimulé à la taille. Poches latérales zippées. Fond en mesh ventilé. Fond en mesh aéré. Slip intérieur en jersey.', 19.99, '2020-04-06 21:42:17', 5, 5, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'femme'),
(2, 'homme');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresse` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `nom`) VALUES
(1, 'tops'),
(2, 'robes'),
(3, 'jupes'),
(4, 'pantalons'),
(5, 'shorts');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

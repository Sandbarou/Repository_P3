-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Sam 01 Juillet 2017 à 17:14
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet3_oc_cpm`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_commentaire`
--

CREATE TABLE IF NOT EXISTS `blog_commentaire` (
  `commentaire_ID` int(11) NOT NULL,
  `commentaire_Niveau` int(11) NOT NULL,
  `commentaire_ID_chapitre` int(11) NOT NULL,
  `commentaire_Nom` varchar(255) NOT NULL,
  `commentaire_Message` text NOT NULL,
  `commentaire_Date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_commentaire`
--

INSERT INTO `blog_commentaire` (`commentaire_ID`, `commentaire_Niveau`, `commentaire_ID_chapitre`, `commentaire_Nom`, `commentaire_Message`, `commentaire_Date`) VALUES
(1, 0, 6, 'Julien', 'Salut ! Super blog !', '2017-05-08 10:25:36'),
(2, 1, 5, 'Marc', 'Merci pour ton blog, c''est génial !', '2017-05-09 15:13:09'),
(3, 0, 4, 'Agathe', 'Bonjour ', '2017-05-10 18:42:14'),
(96, 0, 1, 'Martin', ' Salut', '2017-06-05 14:58:28'),
(100, 1, 7, 'Marge', 'Salut', '2017-06-18 13:47:04'),
(101, 0, 2, 'Sophie', ' Bonjour, c''est Sophie !', '2017-06-22 18:03:17'),
(103, 1, 4, 'Stéphanie', ' Merci à toi ! Bye', '2017-06-23 20:38:35'),
(105, 0, 2, 'Louis', ' Hello', '2017-06-22 21:47:10'),
(106, 0, 8, 'Hector', 'Bonjour à tous !', '2017-07-01 16:31:58');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog_commentaire`
--
ALTER TABLE `blog_commentaire`
  ADD PRIMARY KEY (`commentaire_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog_commentaire`
--
ALTER TABLE `blog_commentaire`
  MODIFY `commentaire_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

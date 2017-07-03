-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Sam 01 Juillet 2017 à 17:15
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
-- Structure de la table `blog_user`
--

CREATE TABLE IF NOT EXISTS `blog_user` (
  `user_ID` int(11) NOT NULL,
  `user_Pseudo` varchar(255) NOT NULL,
  `user_Pass` varchar(255) NOT NULL,
  `user_Email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_user`
--

INSERT INTO `blog_user` (`user_ID`, `user_Pseudo`, `user_Pass`, `user_Email`) VALUES
(1, 'Jean', '0,viP8hxSAeCM', 'jean.forteroche@gmail.com'),
(2, 'Marc Durand', '0,fjw6LF18kSE', 'marcdurand@gmail.com'),
(8, 'Damien', '0,BTJhLRTvlhc', 'damien@gmail.com'),
(9, 'Lucas', '0,Fj13TTicoD6', 'lucask@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

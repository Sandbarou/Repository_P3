-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Dim 23 Juillet 2017 à 13:25
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_cpm_p3`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_billet`
--

CREATE TABLE IF NOT EXISTS `t_billet` (
  `bil_ID` int(11) NOT NULL,
  `bil_Date` date NOT NULL,
  `bil_Titre` varchar(255) NOT NULL,
  `bil_Auteur` varchar(255) NOT NULL,
  `bil_Contenu` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_billet`
--

INSERT INTO `t_billet` (`bil_ID`, `bil_Date`, `bil_Titre`, `bil_Auteur`, `bil_Contenu`) VALUES
(1, '2017-07-01', 'Chapitre 1', 'Jean Forteroche', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non ex urna. In at est in elit sodales convallis. Vestibulum facilisis est vel tellus fringilla eleifend. Fusce laoreet erat eget efficitur sodales. Cras nec sollicitudin urna. In hac habitasse platea dictumst. Suspendisse volutpat neque risus, quis rhoncus nibh euismod ut. Duis tempus, mauris sit amet fermentum ornare, arcu est semper diam, sed dignissim quam libero ut tellus. Nulla sagittis iaculis malesuada. Nunc convallis magna tellus, ac lacinia massa blandit non. Nullam feugiat dictum volutpat. Aenean faucibus ultricies sodales.<br /> <br /> Phasellus aliquam tempus fermentum. Donec vel ornare leo. In suscipit tincidunt lacus, eu finibus turpis ultricies eu. Morbi tincidunt posuere tellus ut rutrum. Curabitur tempus tortor sit amet auctor lacinia. Nullam in mauris enim. Donec vel ex ut nibh ultricies finibus et a dui. Curabitur dictum laoreet nisl ut imperdiet. Sed vitae libero et lorem tristique convallis. Vestibulum ultricies mauris lacinia tempor porttitor. Praesent tincidunt tincidunt magna. Sed a massa euismod magna dictum mattis interdum et risus. Vivamus non enim sit amet nulla molestie facilisis. Phasellus blandit lorem a condimentum posuere. Sed vulputate eu leo quis placerat. Praesent porta libero vulputate, pharetra orci sit amet, rhoncus risus.<br /> <br /> Sed euismod nulla quis libero laoreet, tempus accumsan quam tempus. Maecenas ornare placerat urna, sed facilisis ipsum bibendum sed. Duis nibh velit, feugiat non pulvinar vitae, faucibus in eros. Suspendisse quis arcu et ligula venenatis consequat. Aliquam ut ultricies sapien. Vestibulum laoreet massa tellus, eget scelerisque sem iaculis eget. Proin maximus tincidunt tincidunt. Praesent mattis, nisi at commodo ornare, neque diam venenatis dui, nec pharetra enim augue in ante. Vestibulum maximus sem dignissim risus bibendum, molestie malesuada metus malesuada. Donec at malesuada nibh. Proin metus mauris, fermentum eu nulla ac, scelerisque interdum diam. Sed mattis massa augue, eget tristique risus ullamcorper sit amet. Maecenas in eros lacinia, auctor libero vitae, blandit justo. Nullam pellentesque pellentesque lectus.</p>'),
(2, '2017-07-02', 'Chapitre 2', 'Jean Forteroche', '<p style="text-align: justify;">Sed malesuada convallis risus. Pellentesque accumsan est vitae tortor blandit pharetra in ac lacus. Aenean ut massa sagittis, rutrum massa et, lobortis libero. Curabitur nisi mauris, egestas vel egestas nec, elementum ullamcorper erat. Donec posuere consectetur nibh, vel gravida diam semper tincidunt. Aenean bibendum, nibh ac suscipit tincidunt, arcu sapien volutpat enim, in elementum odio elit et lectus. Donec bibendum vitae metus ut tincidunt. Curabitur consequat ut magna facilisis faucibus. Duis mi nibh, vehicula sed ligula vel, condimentum commodo risus. Duis tristique convallis sapien, ut pretium tellus scelerisque finibus. Cras maximus auctor felis, vel venenatis nisl malesuada sed. Integer ultricies rhoncus mauris at rutrum. Aenean eget mi sit amet augue venenatis hendrerit non in magna. Mauris consequat et dolor non sodales. Etiam cursus, est sit amet pharetra gravida, est augue tristique felis, sed vulputate erat lorem maximus risus. Ut ac mauris sed turpis dignissim mollis eget sed ante.<br /> <br /> Fusce quis arcu felis. Suspendisse ipsum arcu, mollis id elit ac, ullamcorper vestibulum nisl. Donec consectetur sodales orci, ut scelerisque diam fringilla in. Vivamus sed nisi ligula. Nulla quis est eget lectus volutpat bibendum malesuada eu ex. Suspendisse est nulla, laoreet at cursus laoreet, tincidunt sed velit. Vivamus et dapibus ligula. Fusce bibendum ac urna sed finibus. Nam in vehicula ante. Praesent dapibus nisi nec felis ultrices tempus. Suspendisse sed leo iaculis, hendrerit orci in, facilisis arcu.<br /> <br /> Cras pretium mauris nulla, vitae tempus quam ullamcorper et. Curabitur ac erat at quam pulvinar iaculis. Praesent porta mollis ligula, in interdum purus sodales ut. Nunc elit eros, rutrum vel enim a, laoreet imperdiet metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus in nibh vitae nunc vulputate tincidunt eget eu elit. Nullam commodo, ipsum vitae tempus laoreet, erat augue ultricies massa, ut rhoncus purus turpis pretium ante. Sed viverra, urna eget ultrices finibus, lectus lacus varius dolor, eu sagittis dolor justo at sapien. Etiam non varius ante. Duis elementum, arcu ut cursus tincidunt, leo velit posuere nisi, at pulvinar felis tellus ac urna. Pellentesque congue accumsan lorem a pretium. Etiam id ipsum ac libero venenatis vestibulum et sit amet lorem.<br /> <br /> Sed egestas euismod fringilla. Duis in risus nulla. Phasellus malesuada luctus urna at consequat. Quisque pellentesque, sapien id aliquet ornare, tellus turpis rhoncus sem, eget suscipit urna tellus cursus tortor. Nulla ac hendrerit nisl. Donec erat purus, mattis vitae porta ut, fringilla ut odio. Maecenas euismod dolor rhoncus sapien maximus, a lacinia tellus commodo. Vestibulum at tellus ac mauris placerat porta sed vel lectus. Vivamus nec finibus metus. Aliquam bibendum, metus id egestas faucibus, turpis felis ultrices diam, in imperdiet urna mauris eu augue. Nam ornare rhoncus magna et laoreet.</p>'),
(3, '2017-07-03', 'Chapitre 3', 'Jean Forteroche', '<p style="text-align: justify;">Sed egestas euismod fringilla. Duis in risus nulla. Phasellus malesuada luctus urna at consequat. Quisque pellentesque, sapien id aliquet ornare, tellus turpis rhoncus sem, eget suscipit urna tellus cursus tortor. Nulla ac hendrerit nisl. Donec erat purus, mattis vitae porta ut, fringilla ut odio. Maecenas euismod dolor rhoncus sapien maximus, a lacinia tellus commodo. Vestibulum at tellus ac mauris placerat porta sed vel lectus. Vivamus nec finibus metus. Aliquam bibendum, metus id egestas faucibus, turpis felis ultrices diam, in imperdiet urna mauris eu augue. Nam ornare rhoncus magna et laoreet.<br /> <br /> In euismod dolor velit. Sed finibus neque nec diam malesuada, vel dignissim ex euismod. Proin placerat massa non lacus rhoncus, a auctor odio laoreet. Fusce vestibulum ipsum lorem, in posuere dolor efficitur vitae. Suspendisse ut lorem in lectus interdum vehicula. Nunc dictum lacus quis ante fringilla suscipit. Nam suscipit arcu id ex lacinia efficitur et non lorem. Nulla rutrum elit ex, vitae placerat massa scelerisque ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer lacinia orci erat, eu posuere elit vulputate non. Vivamus malesuada convallis tincidunt. Proin purus est, pretium eget consectetur sed, luctus quis tellus. Nam elementum fringilla enim id imperdiet. Aliquam venenatis nulla id quam varius, sed condimentum tellus blandit. Curabitur in posuere risus, ut venenatis sapien.<br /> <br /> Suspendisse gravida tellus ultrices, pulvinar justo vitae, gravida nulla. Nulla at ante id purus volutpat scelerisque. Curabitur ultrices risus nulla, id iaculis enim fringilla sed. Pellentesque felis turpis, convallis eu odio a, sagittis elementum enim. Donec vehicula sem ac magna bibendum placerat. Nam varius, erat nec fermentum mollis, erat enim mollis nisi, ac tincidunt nulla nisi ac purus. Nunc non sodales turpis, nec volutpat odio. Etiam elit lorem, iaculis in ligula nec, cursus posuere mauris. Aliquam nibh nisl, porta tincidunt lectus sit amet, sodales iaculis turpis. Sed at lobortis dolor. Morbi nec malesuada leo, in porta elit. Vivamus aliquam turpis non porta rhoncus. Donec rutrum vulputate dolor non ullamcorper.</p>'),
(4, '2017-07-04', 'Chapitre 4', 'Jean Forteroche', '<p style="text-align: justify;">Lloremm lorem ipsum&nbsp;ipsum dolor sit amet, consectetur adipiscing elit. Proin eget auctor augue. Nunc mattis, ligula ut tempus varius, velit neque suscipit nunc, vel auctor neque urna nec arcu. Donec accumsan commodo nunc a interdum. Mauris pharetra ultrices libero, vitae vehicula velit tempus a. Aenean volutpat, magna et gravida gravida, orci ante hendrerit diam, quis pulvinar ante lectus quis quam. Proin quis purus imperdiet quam cursus facilisis eget eget velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur quis commodo urna. Maecenas egestas diam mauris, in accumsan urna sodales a. Nulla augue lectus, sodales a elit eget, tempus laoreet felis. Fusce aliquet auctor neque. Cras libero elit, consequat vitae accumsan a, dapibus eu enim. Proin faucibus egestas tempor. Pellentesque hendrerit aliquet odio eget sollicitudin. Fusce pulvinar, ipsum eu pharetra posuere, risus felis sodales sapien, ut facilisis elit augue nec sem. Maecenas ultricies dapibus arcu vel sollicitudin. Phasellus id sem consectetur nisi pharetra dapibus. Quisque tempor velit ut tincidunt facilisis. Pellentesque a leo sed ante fermentum accumsan. Cras purus massa, tincidunt id malesuada in, tempus vitae dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur orci nibh, consectetur et metus at, luctus bibendum odio. Donec vestibulum tellus vel lorem lacinia ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque id dolor quis ante feugiat suscipit. Nullam porttitor metus odio, ac efficitur sem consectetur eget. Nunc feugiat scelerisque placerat. Donec a blandit libero, eget consequat nibh. Mauris velit lacus, rutrum sed dictum id, congue dapibus nibh. Sed leo sem, facilisis a diam non, venenatis pretium lacus. Duis quam risus, fermentum vitae lacus eget, ultricies dapibus dui. Sed in neque eleifend mi tincidunt bibendum vel sed nisl. Etiam et risus risus. Ut porta tellus neque, sed aliquam felis finibus ac. Sed nunc nulla, dictum vitae ultricies eu, interdum in diam. Pellentesque dignissim orci id gravida vehicula. Curabitur blandit nulla ut ex tincidunt, eu imperdiet est scelerisque. Mauris tincidunt eget quam ut rhoncus. Nullam volutpat porttitor purus. Morbi vitae tortor laoreet, ultricies dui dignissim, efficitur orci. Proin id tortor eget sem feugiat tempus eget vitae risus. Vivamus vitae lacus ac tortor dictum aliquet vitae ut ex. Nunc pulvinar sem massa, id laoreet mi pharetra non. Aenean lobortis felis et nisi pulvinar porttitor.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE IF NOT EXISTS `t_commentaire` (
  `com_ID` int(11) NOT NULL,
  `com_Niveau` int(11) NOT NULL,
  `com_Date` datetime NOT NULL,
  `com_Auteur` varchar(255) NOT NULL,
  `com_Contenu` varchar(255) NOT NULL,
  `bil_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`com_ID`, `com_Niveau`, `com_Date`, `com_Auteur`, `com_Contenu`, `bil_ID`) VALUES
(1, 0, '2017-07-01 10:02:50', 'Isabelle', ' Proin pulvinar sapien sit amet aliquet porta sapien sita', 1),
(2, 0, '2017-07-01 11:55:51', 'Marc', 'Etiam maximus nisl orci, vitae molestie lacus sollicitudin sit amet.', 1),
(3, 0, '2017-07-02 13:35:55', 'Roger', 'Nunc cursus vulputate nibh, ac aliquet libero ullamcorper euismod.', 2),
(4, 0, '2017-07-02 13:37:26', 'Sophie', 'Quisque magna leo, auctor vel lectus sed, fringilla congue nunc. Ut nec imperdiet erat.', 2),
(5, 1, '2017-07-03 18:50:20', 'Maurice', 'Donec sed auctor nibh. Nullam bibendum sapien vel porta tristique. Aliquam sagittis, mi cursus facilisis consequat, velit nulla dictum dolor, nec scelerisque elit orci nec ipsum.', 3),
(7, 0, '2017-07-04 08:40:30', 'Régis', 'Phasellus neque neque, tincidunt at efficitur id, elementum id velit. Aenean accumsan accumsan suscipit.', 4),
(8, 1, '2017-07-04 09:02:02', 'Stéphane', ' Etiam et risus risus. Ut porta tellus neque, sed aliquam felis finibus ac. Sed nunc nulla, dictum vitae ultricies eu, interdum in diam. Pellentesque dignissim orci id gravida vehicula. Etiam', 4),
(9, 0, '2017-07-04 10:00:00', 'Quentin', 'Maecenas euismod dolor rhoncus sapien maximus, a lacinia tellus commodo.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `user_ID` int(11) NOT NULL,
  `user_Email` varchar(255) NOT NULL,
  `user_Pass` varchar(255) NOT NULL,
  `user_Pseudo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`user_ID`, `user_Email`, `user_Pass`, `user_Pseudo`) VALUES
(1, 'jean.forteroche@gmail.com', '0,82fBr7DWQFc', 'Jean Forteroche'),
(2, 'didier@gmail.com', '0,LqjOLlbnyg.', 'Didier'),
(3, 'france@gmail.com', '0,QAVGRreDrUE', 'France');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_billet`
--
ALTER TABLE `t_billet`
  ADD PRIMARY KEY (`bil_ID`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`com_ID`),
  ADD KEY `BIL_ID` (`bil_ID`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_billet`
--
ALTER TABLE `t_billet`
  MODIFY `bil_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `com_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `fk_com_bil` FOREIGN KEY (`bil_ID`) REFERENCES `t_billet` (`bil_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

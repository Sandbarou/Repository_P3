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
-- Structure de la table `blog_chapitre`
--

CREATE TABLE IF NOT EXISTS `blog_chapitre` (
  `chapitre_ID` int(11) NOT NULL,
  `chapitre_Titre` varchar(255) NOT NULL,
  `chapitre_Auteur` varchar(255) NOT NULL,
  `chapitre_Contenu` text NOT NULL,
  `chapitre_Date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_chapitre`
--

INSERT INTO `blog_chapitre` (`chapitre_ID`, `chapitre_Titre`, `chapitre_Auteur`, `chapitre_Contenu`, `chapitre_Date`) VALUES
(1, 'Chapitre 1', 'Jean Forteroche', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non ex urna. In at est in elit sodales convallis. Vestibulum facilisis est vel tellus fringilla eleifend. Fusce laoreet erat eget efficitur sodales. Cras nec sollicitudin urna. In hac habitasse platea dictumst. Suspendisse volutpat neque risus, quis rhoncus nibh euismod ut. Duis tempus, mauris sit amet fermentum ornare, arcu est semper diam, sed dignissim quam libero ut tellus. Nulla sagittis iaculis malesuada. Nunc convallis magna tellus, ac lacinia massa blandit non. Nullam feugiat dictum volutpat. Aenean faucibus ultricies sodales.<br /> <br /> Phasellus aliquam tempus fermentum. Donec vel ornare leo. In suscipit tincidunt lacus, eu finibus turpis ultricies eu. Morbi tincidunt posuere tellus ut rutrum. Curabitur tempus tortor sit amet auctor lacinia. Nullam in mauris enim. Donec vel ex ut nibh ultricies finibus et a dui. Curabitur dictum laoreet nisl ut imperdiet. Sed vitae libero et lorem tristique convallis. Vestibulum ultricies mauris lacinia tempor porttitor. Praesent tincidunt tincidunt magna. Sed a massa euismod magna dictum mattis interdum et risus. Vivamus non enim sit amet nulla molestie facilisis. Phasellus blandit lorem a condimentum posuere. Sed vulputate eu leo quis placerat. Praesent porta libero vulputate, pharetra orci sit amet, rhoncus risus.<br /> <br /> Sed euismod nulla quis libero laoreet, tempus accumsan quam tempus. Maecenas ornare placerat urna, sed facilisis ipsum bibendum sed. Duis nibh velit, feugiat non pulvinar vitae, faucibus in eros. Suspendisse quis arcu et ligula venenatis consequat. Aliquam ut ultricies sapien. Vestibulum laoreet massa tellus, eget scelerisque sem iaculis eget. Proin maximus tincidunt tincidunt. Praesent mattis, nisi at commodo ornare, neque diam venenatis dui, nec pharetra enim augue in ante. Vestibulum maximus sem dignissim risus bibendum, molestie malesuada metus malesuada. Donec at malesuada nibh. Proin metus mauris, fermentum eu nulla ac, scelerisque interdum diam. Sed mattis massa augue, eget tristique risus ullamcorper sit amet. Maecenas in eros lacinia, auctor libero vitae, blandit justo. Nullam pellentesque pellentesque lectus.</p>', '2017-04-03'),
(2, 'Chapitre 2', 'Jean Forteroche', '<p style="text-align: justify;">Sed malesuada convallis risus. Pellentesque accumsan est vitae tortor blandit pharetra in ac lacus. Aenean ut massa sagittis, rutrum massa et, lobortis libero. Curabitur nisi mauris, egestas vel egestas nec, elementum ullamcorper erat. Donec posuere consectetur nibh, vel gravida diam semper tincidunt. Aenean bibendum, nibh ac suscipit tincidunt, arcu sapien volutpat enim, in elementum odio elit et lectus. Donec bibendum vitae metus ut tincidunt. Curabitur consequat ut magna facilisis faucibus. Duis mi nibh, vehicula sed ligula vel, condimentum commodo risus. Duis tristique convallis sapien, ut pretium tellus scelerisque finibus. Cras maximus auctor felis, vel venenatis nisl malesuada sed. Integer ultricies rhoncus mauris at rutrum. Aenean eget mi sit amet augue venenatis hendrerit non in magna. Mauris consequat et dolor non sodales. Etiam cursus, est sit amet pharetra gravida, est augue tristique felis, sed vulputate erat lorem maximus risus. Ut ac mauris sed turpis dignissim mollis eget sed ante.<br /> <br /> Fusce quis arcu felis. Suspendisse ipsum arcu, mollis id elit ac, ullamcorper vestibulum nisl. Donec consectetur sodales orci, ut scelerisque diam fringilla in. Vivamus sed nisi ligula. Nulla quis est eget lectus volutpat bibendum malesuada eu ex. Suspendisse est nulla, laoreet at cursus laoreet, tincidunt sed velit. Vivamus et dapibus ligula. Fusce bibendum ac urna sed finibus. Nam in vehicula ante. Praesent dapibus nisi nec felis ultrices tempus. Suspendisse sed leo iaculis, hendrerit orci in, facilisis arcu.<br /> <br /> Cras pretium mauris nulla, vitae tempus quam ullamcorper et. Curabitur ac erat at quam pulvinar iaculis. Praesent porta mollis ligula, in interdum purus sodales ut. Nunc elit eros, rutrum vel enim a, laoreet imperdiet metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus in nibh vitae nunc vulputate tincidunt eget eu elit. Nullam commodo, ipsum vitae tempus laoreet, erat augue ultricies massa, ut rhoncus purus turpis pretium ante. Sed viverra, urna eget ultrices finibus, lectus lacus varius dolor, eu sagittis dolor justo at sapien. Etiam non varius ante. Duis elementum, arcu ut cursus tincidunt, leo velit posuere nisi, at pulvinar felis tellus ac urna. Pellentesque congue accumsan lorem a pretium. Etiam id ipsum ac libero venenatis vestibulum et sit amet lorem.<br /> <br /> Sed egestas euismod fringilla. Duis in risus nulla. Phasellus malesuada luctus urna at consequat. Quisque pellentesque, sapien id aliquet ornare, tellus turpis rhoncus sem, eget suscipit urna tellus cursus tortor. Nulla ac hendrerit nisl. Donec erat purus, mattis vitae porta ut, fringilla ut odio. Maecenas euismod dolor rhoncus sapien maximus, a lacinia tellus commodo. Vestibulum at tellus ac mauris placerat porta sed vel lectus. Vivamus nec finibus metus. Aliquam bibendum, metus id egestas faucibus, turpis felis ultrices diam, in imperdiet urna mauris eu augue. Nam ornare rhoncus magna et laoreet.</p>', '2017-04-10'),
(3, 'Chapitre 3', 'Jean Forteroche', '<p style="text-align: justify;">Sed egestas euismod fringilla. Duis in risus nulla. Phasellus malesuada luctus urna at consequat. Quisque pellentesque, sapien id aliquet ornare, tellus turpis rhoncus sem, eget suscipit urna tellus cursus tortor. Nulla ac hendrerit nisl. Donec erat purus, mattis vitae porta ut, fringilla ut odio. Maecenas euismod dolor rhoncus sapien maximus, a lacinia tellus commodo. Vestibulum at tellus ac mauris placerat porta sed vel lectus. Vivamus nec finibus metus. Aliquam bibendum, metus id egestas faucibus, turpis felis ultrices diam, in imperdiet urna mauris eu augue. Nam ornare rhoncus magna et laoreet.<br /> <br /> In euismod dolor velit. Sed finibus neque nec diam malesuada, vel dignissim ex euismod. Proin placerat massa non lacus rhoncus, a auctor odio laoreet. Fusce vestibulum ipsum lorem, in posuere dolor efficitur vitae. Suspendisse ut lorem in lectus interdum vehicula. Nunc dictum lacus quis ante fringilla suscipit. Nam suscipit arcu id ex lacinia efficitur et non lorem. Nulla rutrum elit ex, vitae placerat massa scelerisque ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer lacinia orci erat, eu posuere elit vulputate non. Vivamus malesuada convallis tincidunt. Proin purus est, pretium eget consectetur sed, luctus quis tellus. Nam elementum fringilla enim id imperdiet. Aliquam venenatis nulla id quam varius, sed condimentum tellus blandit. Curabitur in posuere risus, ut venenatis sapien.<br /> <br /> Suspendisse gravida tellus ultrices, pulvinar justo vitae, gravida nulla. Nulla at ante id purus volutpat scelerisque. Curabitur ultrices risus nulla, id iaculis enim fringilla sed. Pellentesque felis turpis, convallis eu odio a, sagittis elementum enim. Donec vehicula sem ac magna bibendum placerat. Nam varius, erat nec fermentum mollis, erat enim mollis nisi, ac tincidunt nulla nisi ac purus. Nunc non sodales turpis, nec volutpat odio. Etiam elit lorem, iaculis in ligula nec, cursus posuere mauris. Aliquam nibh nisl, porta tincidunt lectus sit amet, sodales iaculis turpis. Sed at lobortis dolor. Morbi nec malesuada leo, in porta elit. Vivamus aliquam turpis non porta rhoncus. Donec rutrum vulputate dolor non ullamcorper.</p>', '2017-04-17'),
(4, 'Chapitre 4', 'Jean Forteroche', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget auctor augue. Nunc mattis, ligula ut tempus varius, velit neque suscipit nunc, vel auctor neque urna nec arcu. Donec accumsan commodo nunc a interdum. Mauris pharetra ultrices libero, vitae vehicula velit tempus a. Aenean volutpat, magna et gravida gravida, orci ante hendrerit diam, quis pulvinar ante lectus quis quam. Proin quis purus imperdiet quam cursus facilisis eget eget velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur quis commodo urna. Maecenas egestas diam mauris, in accumsan urna sodales a. Nulla augue lectus, sodales a elit eget, tempus laoreet felis. Fusce aliquet auctor neque. Cras libero elit, consequat vitae accumsan a, dapibus eu enim. Proin faucibus egestas tempor. Pellentesque hendrerit aliquet odio eget sollicitudin. Fusce pulvinar, ipsum eu pharetra posuere, risus felis sodales sapien, ut facilisis elit augue nec sem. Maecenas ultricies dapibus arcu vel sollicitudin. Phasellus id sem consectetur nisi pharetra dapibus. Quisque tempor velit ut tincidunt facilisis. Pellentesque a leo sed ante fermentum accumsan. Cras purus massa, tincidunt id malesuada in, tempus vitae dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur orci nibh, consectetur et metus at, luctus bibendum odio. Donec vestibulum tellus vel lorem lacinia ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque id dolor quis ante feugiat suscipit. Nullam porttitor metus odio, ac efficitur sem consectetur eget. Nunc feugiat scelerisque placerat. Donec a blandit libero, eget consequat nibh. Mauris velit lacus, rutrum sed dictum id, congue dapibus nibh. Sed leo sem, facilisis a diam non, venenatis pretium lacus. Duis quam risus, fermentum vitae lacus eget, ultricies dapibus dui. Sed in neque eleifend mi tincidunt bibendum vel sed nisl. Etiam et risus risus. Ut porta tellus neque, sed aliquam felis finibus ac. Sed nunc nulla, dictum vitae ultricies eu, interdum in diam. Pellentesque dignissim orci id gravida vehicula. Curabitur blandit nulla ut ex tincidunt, eu imperdiet est scelerisque. Mauris tincidunt eget quam ut rhoncus. Nullam volutpat porttitor purus. Morbi vitae tortor laoreet, ultricies dui dignissim, efficitur orci. Proin id tortor eget sem feugiat tempus eget vitae risus. Vivamus vitae lacus ac tortor dictum aliquet vitae ut ex. Nunc pulvinar sem massa, id laoreet mi pharetra non. Aenean lobortis felis et nisi pulvinar porttitor.</p>', '2017-04-24'),
(5, 'Chapitre 5', 'Jean Forteroche', '<p style="text-align: justify;">Quisque eleifend euismod venenatis. Nulla facilisi. Donec venenatis posuere odio sollicitudin tempus. Praesent ac fringilla augue. Aenean nec sem dolor. Ut id malesuada quam, non lacinia sem. Integer viverra velit neque. Sed sit amet tellus orci. Vestibulum nunc velit, hendrerit ac urna vitae, ultrices consectetur nulla. Nam vestibulum ipsum lectus, ut suscipit velit tristique ultricies. Fusce fermentum ultricies neque in facilisis.<br /> <br /> Pellentesque faucibus tortor lacinia consectetur lacinia. Vivamus pellentesque quam tortor, sit amet hendrerit tellus viverra sed. Aliquam auctor sagittis imperdiet. Nulla convallis nibh ac neque fringilla, eu vehicula neque rutrum. Nulla mollis eu risus pharetra sodales. Donec euismod, urna non varius laoreet, eros ligula sodales leo, quis auctor dolor ex in libero. Phasellus neque neque, tincidunt at efficitur id, elementum id velit. Aenean accumsan accumsan suscipit. Aenean bibendum est nisl, eu feugiat justo pulvinar a. Donec eget dolor sit amet dui vestibulum consequat id nec augue. Ut iaculis suscipit nibh vel lacinia. Morbi eu porttitor metus, in feugiat odio. Cras et scelerisque dui, sit amet pulvinar nunc. Suspendisse mattis nibh et imperdiet mollis. Maecenas ac blandit elit, id pharetra mi. In tempor quam at metus tincidunt sagittis.<br /> <br /> Suspendisse et risus mauris. Aliquam iaculis pretium scelerisque. Vivamus ultrices condimentum elit quis tincidunt. Pellentesque iaculis elit sed suscipit vestibulum. Vestibulum sollicitudin, lorem at ornare tincidunt, est nulla tincidunt nunc, non accumsan nisl mauris at justo. Integer non eros ornare, blandit ante tempus, aliquet metus. Proin fringilla, mi vel imperdiet porttitor, lectus magna varius turpis, quis lacinia sem enim id lectus. Integer pretium in turpis non vulputate. Donec at odio at enim facilisis placerat. Sed in tincidunt ante. Nulla facilisi. Donec eleifend elit erat, ac volutpat risus laoreet a. Aenean ultrices aliquet eros, a fringilla justo maximus volutpat. Donec erat risus, elementum non nunc id, interdum consequat risus. Morbi non maximus lectus, et vestibulum justo.</p>', '2017-05-02'),
(6, 'Chapitre 6', 'Jean Forteroche', '<p style="text-align: justify;">Donec sed auctor nibh. Nullam bibendum sapien vel porta tristique. Aliquam sagittis, mi cursus facilisis consequat, velit nulla dictum dolor, nec scelerisque elit orci nec ipsum. Nam sit amet enim consequat sapien molestie tincidunt a at ipsum. Aenean auctor commodo quam ac tincidunt. Aliquam ullamcorper tortor vel odio iaculis, eget viverra purus pulvinar. Nunc pretium consectetur diam, suscipit dapibus eros. Nullam porta ornare metus, sit amet porta quam maximus ut. Pellentesque maximus tellus ut felis finibus posuere. Morbi vel arcu enim. Nunc aliquet nunc diam, et molestie justo varius at. Cras quis varius massa. Pellentesque vel lacus gravida, convallis nisl interdum, imperdiet lacus. Pellentesque urna purus, tristique ac ipsum a, convallis blandit massa. Mauris et justo enim. Quisque magna leo, auctor vel lectus sed, fringilla congue nunc. Ut nec imperdiet erat. Sed tempus ipsum gravida turpis consectetur posuere. Integer in lorem lacus. Phasellus fermentum laoreet diam. Duis rhoncus nec libero sed ornare. Nam a dui a eros iaculis viverra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec sed quam quis ligula condimentum ornare. Aliquam condimentum augue et erat commodo, et blandit leo dapibus. In rutrum, diam in pharetra mattis, ante eros dignissim turpis, laoreet sodales tellus nulla at tellus. Quisque eleifend, orci id pulvinar volutpat, ex ante faucibus nisl, at feugiat metus nunc efficitur metus. Proin pulvinar sapien sit amet aliquet porta. Nullam consectetur ultrices ex, at ornare ipsum eleifend eget. Curabitur tincidunt, diam sit amet commodo consequat, tortor odio sodales erat, id blandit sem augue vitae elit. Etiam maximus nisl orci, vitae molestie lacus sollicitudin sit amet. Nunc quis lacus tellus. Nunc cursus vulputate nibh, ac aliquet libero ullamcorper euismod.</p>', '2017-05-09'),
(7, 'Chapitre 7', 'Jean Forteroche', '<p style="text-align: justify;">In rutrum, diam in pharetra mattis, ante eros dignissim turpis, laoreet sodales tellus nulla at tellus. Quisque eleifend, orci id <strong>pulvinar</strong> volutpat, ex ante faucibus nisl, at feugiat metus nunc efficitur metus. Proin pulvinar sapien sit amet aliquet porta. <strong>Nullam</strong> <em>consectetur ultrices ex</em>, at ornare ipsum eleifend eget. Curabitur tincidunt, diam sit amet commodo consequat, tortor odio sodales erat, id blandit sem augue vitae elit. Etiam maximus nisl orci, vitae molestie lacus <em>sollicitudin sit amet. </em>Nunc quis lacus tellus. Nunc cursus vulputate nibh, ac aliquet libero ullamcorper euismod.</p>\r\n<p style="text-align: justify;">In rutrum, diam in pharetra mattis, ante eros dignissim turpis, laoreet sodales tellus nulla at tellus. Quisque eleifend, orci id&nbsp;<strong>pulvinar</strong>&nbsp;volutpat, ex ante faucibus nisl, at feugiat metus nunc efficitur metus. Proin pulvinar sapien sit amet aliquet porta.&nbsp;<strong>Nullam</strong>&nbsp;<em>consectetur&nbsp;ultrices ex</em>, at ornare ipsum eleifend eget. Curabitur tincidunt, diam sit amet commodo consequat, tortor odio sodales erat, id blandit sem augue vitae elit. Etiam maximus nisl orci, vitae molestie lacus&nbsp;<em>sollicitudin&nbsp;sit amet.&nbsp;</em>Nunc quis lacus tellus. Nunc cursus vulputate nibh, ac aliquet libero ullamcorper euismod.</p>\r\n<p style="text-align: justify;">In rutrum, diam in pharetra mattis, ante eros dignissim turpis, laoreet sodales tellus nulla at tellus. Quisque eleifend, orci id&nbsp;<strong>pulvinar</strong>&nbsp;volutpat, ex ante faucibus nisl, at feugiat metus nunc efficitur metus. Proin pulvinar sapien sit amet aliquet porta.&nbsp;<strong>Nullam</strong>&nbsp;<em>consectetur&nbsp;ultrices ex</em>, at ornare ipsum eleifend eget. Curabitur tincidunt, diam sit amet commodo consequat, tortor odio sodales erat, id blandit sem augue vitae elit. Etiam maximus nisl orci, vitae molestie lacus&nbsp;<em>sollicitudin&nbsp;sit amet.&nbsp;</em>Nunc quis lacus tellus. Nunc cursus vulputate nibh, ac aliquet libero ullamcorper euismod.</p>', '2017-06-03'),
(8, 'Chapitre 8', 'Jean Forteroche', '<p style="text-align: justify;">Bonjour &agrave; toutes et &agrave; tous !! Comment allez-vous ?</p>', '2017-06-26');

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
-- Index pour la table `blog_chapitre`
--
ALTER TABLE `blog_chapitre`
  ADD PRIMARY KEY (`chapitre_ID`);

--
-- Index pour la table `blog_commentaire`
--
ALTER TABLE `blog_commentaire`
  ADD PRIMARY KEY (`commentaire_ID`);

--
-- Index pour la table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog_chapitre`
--
ALTER TABLE `blog_chapitre`
  MODIFY `chapitre_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `blog_commentaire`
--
ALTER TABLE `blog_commentaire`
  MODIFY `commentaire_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT pour la table `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 14:46
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ece_amazon`
--
CREATE DATABASE IF NOT EXISTS `ece_amazon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ece_amazon`;

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codepostal` int(5) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL,
  `typecarte` varchar(255) NOT NULL,
  `numerocarte` bigint(64) NOT NULL,
  `proprietairecarte` varchar(255) NOT NULL,
  `expirationcarte` date NOT NULL,
  `cryptocarte` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`id`, `nom`, `adresse`, `email`, `mdp`, `ville`, `codepostal`, `pays`, `telephone`, `typecarte`, `numerocarte`, `proprietairecarte`, `expirationcarte`, `cryptocarte`) VALUES
(1, 'Delagardette', '8 rue Bonaparte', 'Kieran.delagardette@edu.ece.fr', 'azerty', 'Chatou', 78400, 'France', 612345678, 'Mastercard', 1234123412341234, 'Delagardette', '2019-05-24', 123),
(2, 'Martin', '10 rue du lac', 'Martin@gmail.com', 'password', 'Paris', 75015, 'France', 6987654, 'Mastercard', 9876987698769876, 'Martin', '2020-01-09', 7),
(3, 'Petit', '90 rue camille courbel', 'Petit@gmail.com', 'mdpmdp', 'Clichy', 92110, 'France', 675721097, 'Visa', 2134567890987654, 'Petit', '2019-07-12', 879),
(4, 'Muller', '67 allée du lac supérieur ', 'Muller@gmail.com', 'eastpak', 'Le Vésinet', 78110, 'France', 682281902, 'Mastercard', 1357909876543212, 'Muller', '2019-07-11', 881);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(255) NOT NULL,
  `compteur` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idvendeur` int(10) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `prix` float NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `idvendeur`, `photo`, `prix`, `nom`, `date`, `auteur`, `style`, `modele`) VALUES
(1, 6, 'https://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/4/1/8/9782013232814/tsp20120918181211/Les-Miserables.jpg', 9, 'Les misérables', '2019-03-11', 'Victor Hugo', 'Roman', '0L00'),
(2, 2, 'https://static.fnac-static.com/multimedia/Images/FR/NR/bd/2b/1c/1846205/1540-1/tsp20180529165609/L-Heritage-poche.jpg', 10.99, 'Eragon', '2019-05-01', 'Christopher Paolini', 'Fantaisie ', '0E00'),
(3, 2, 'http://t0.gstatic.com/images?q=tbn:ANd9GcTTsQusoqVJByoqfH6N9QMvw-P1ItywuK3dfiFf4NuHJ8jC5lXN', 4.99, '1984', '2019-04-29', 'George Orwell', 'Fiction', '0100'),
(1005, 2, 'https://static.fnac-static.com/multimedia/Images/FR/NR/bd/2b/1c/1846205/1540-1/tsp20180529165609/L-Heritage-poche.jpg', 10.99, 'Eragon', '2019-05-01', 'Christopher Paolini', 'Fantaisie ', '0E00'),
(1006, 4, 'https://images-na.ssl-images-amazon.com/images/I/81TveXgGnXL.jpg', 2.99, 'Tintin en Amérique', '2019-05-02', 'Hergé', 'Bande-dessiné', '0T00');

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idvendeur` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `date` date NOT NULL,
  `artiste` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id`, `idvendeur`, `nom`, `prix`, `date`, `artiste`, `photo`, `modele`) VALUES
(1, 2, 'San', 2, '2019-03-14', 'Orelsan', 'https://i.ytimg.com/vi/PejyoeG_TmA/maxresdefault.jpg', 'S000'),
(2, 2, 'Bella ', 1, '2019-04-11', 'Maitre gims', 'https://i.ytimg.com/vi/rMltoD1jCGI/maxresdefault.jpg', 'B000'),
(3, 2, 'La bohème ', 4, '2019-02-13', 'Charles Aznavour ', 'http://www.chartsinfrance.net/style/breves/6/photo_1538488432.jpg', 'L000'),
(7, 2, 'Ac Milan', 2, '2019-04-01', 'Booba', 'https://images.genius.com/8105ce9b527f125adf707faecd0797be.1000x1000x1.jpg', 'A000'),
(8, 6, 'Au DD', 4.99, '2019-04-17', 'PNL', 'https://m.media-amazon.com/images/I/61iuG4fhYRL._SS500_.jpg', 'A001'),
(9, 4, 'La loi de murphy', 2.59, '2019-04-12', 'Angele', 'https://i.ytimg.com/vi/zGyThu7EAHQ/maxresdefault.jpg', 'L001'),
(10, 2, 'San', 2, '2019-03-14', 'Orelsan', 'https://i.ytimg.com/vi/PejyoeG_TmA/maxresdefault.jpg', 'S000');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idarticle` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `idarticle`, `type`) VALUES
(6, 1, 'Livres'),
(7, 3, 'Livres');

-- --------------------------------------------------------

--
-- Structure de la table `sportloisir`
--

DROP TABLE IF EXISTS `sportloisir`;
CREATE TABLE IF NOT EXISTS `sportloisir` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idvendeur` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `marque` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(500) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `descprition` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sportloisir`
--

INSERT INTO `sportloisir` (`id`, `idvendeur`, `date`, `marque`, `nom`, `taille`, `prix`, `photo`, `modele`, `descprition`) VALUES
(1, 6, '2019-04-02', 'Intersport', 'Ballon', '20 cm de diamètre', 9, 'https://media.intersport.fr/is/image/intersportfr/5003248E1Q_FA?$produit_l$', '00B0', ''),
(2, 2, '2019-02-05', 'Babolat', 'Raquette de tennis', '68.5 de longueur', 169.9, 'https://www.protennis.fr/2843-tm_large_default/raquette-babolat-pure-drive-lite-2018.jpg', '00B1', ''),
(3, 2, '2018-11-13', 'Addidas', 'Gants de boxe', '10 OZ', 49.95, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQT13Wv0CeooLXxK07IO7MuF-HXftnaZD5D3hGb9N8uSmxVH80rl6AiqIEs4LxSSTNM-K9syx-kTA&usqp=CAc', '00G0', ''),
(4, 4, '2019-03-05', 'Itwit', 'Kayak gonflable', 'Longueur : 382 cm\r\nLargeur : 108 cm', 300, 'https://www.decathlon.fr/media/838/8387563/big_1146854.jpg', '00K0', ''),
(5, 2, '2018-12-28', 'Go sport', 'Panier de basket', '2m à 3m', 149.9, 'https://medias.go-sport.com/media/resized/1300x/catalog/product/01/39/63/17/bskt-hoop_1_v1.jpg', '00P0', ''),
(6, 2, '2019-04-07', 'Kipsta', 'But de foot', '120X80 cm', 17, 'https://www.decathlon.fr/media/852/8526869/big_1596030.jpg', '00B1', ''),
(7, 2, '2019-04-02', 'Intersport', 'Ballon', '20 cm de diamètre', 9, 'https://media.intersport.fr/is/image/intersportfr/5003248E1Q_FA?$produit_l$', '00B0', '');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `imagefond` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `pseudo`, `email`, `nom`, `photo`, `imagefond`, `admin`) VALUES
(2, 'leo', 'Leo.beillevaire@edu.ece.fr', 'Beillevaire', 'http://cdn.24.co.za/files/Cms/General/d/5470/79958d58e26a45fa8bfb87e6ed155e18.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyB69fJErh0Qp_hQzswRuI13OgsN0y5yHhQZAt-L924JAdKSIi', 1),
(4, 'watson', 'watson@gmail.com', 'watson', 'http://res.cloudinary.com/hv9ssmzrz/image/fetch/c_fill,f_auto,g_auto,h_288,q_auto,w_512/http://images-site-chefsimon-eu.s3-eu-west-1.amazonaws.com/articles/e47cb97e-88ab-4afe-8ef4-319e0c844702/kiwis-coupe.jpg', 'https://tous-les-fruits.com/wp-content/uploads/2018/03/fruits-exotiques.jpg', 0),
(5, 'alex', 'alex@gmail.com', 'Dubois', 'https://s1.lmcdn.fr/multimedia/0f1501761445/3d4705be9ae49/produits/cube-chene-les-bois-massifs-et-imitants-bois/69507032-2-0-5379289-v-000100000000.jpg?$p=hi-w795', 'https://www.decomurale.ca/wp-content/uploads/2015/10/s_shutterstock_192111716.jpg', 0),
(6, 'thomas', 'richard@gmail.com', 'richard', 'https://images-na.ssl-images-amazon.com/images/I/41trnBjzshL.jpg', 'http://www.slate.fr/sites/default/files/styles/1060x523/public/super.jpg', 0),
(7, 'bob', 'durand@gmail.com', 'Durand', 'https://img.huffingtonpost.com/asset/5c930a863600001e266daa80.jpeg?ops=scalefit_630_noupscale', 'https://static1.runbabyrun.fr/articles/6/30/56/@/14684-comment-ranger-ses-baskets-quand-on-a-be-620x0-2.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vetement`
--

DROP TABLE IF EXISTS `vetement`;
CREATE TABLE IF NOT EXISTS `vetement` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idvendeur` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `marque` varchar(255) NOT NULL,
  `taille` varchar(200) NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `descprition` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetement`
--

INSERT INTO `vetement` (`id`, `idvendeur`, `nom`, `prix`, `marque`, `taille`, `sexe`, `photo`, `modele`, `descprition`) VALUES
(1, 5, 'Chaussure', 99, 'Nike', '43', 0, 'https://images.asos-media.com/products/nike-air-pegasus-89-baskets-blanc/10610787-1-white?$XXL$&wid=513&fit=constrain', '000C', ''),
(2, 2, 'T-shirt Supreme', 70, 'Supreme', 'M', 0, 'https://www.teewinek.com/wp-content/uploads/2018/08/T-shirt-Supreme-tee-shirt-personnalis%C3%A9-T-shirt-Supreme-en-Tunisie-510x510.png', '000T', ''),
(3, 7, 'Jean ', 79, 'Levis ', '42', 0, 'https://mosaic03.ztat.net/vgs/media/article-image-mhq/LE/22/2G/07/FK/11/LE222G07F-K11@16.jpg?imwidth=1524', '000J', ''),
(4, 2, 'Casquette ', 29.99, 'Ralph Lauren', 'M', 0, 'https://images-na.ssl-images-amazon.com/images/I/813IkcnYiCL._UX679_.jpg', '001C', ''),
(5, 2, 'Chaussure superstar', 79.95, 'Addidas', '38', 1, 'https://assets.adidas.com/images/w_840,h_840,f_auto,q_auto:sensitive,fl_lossy/4ed6658e09594a52acd9a976013f44fc_9366/Chaussure_Superstar_blanc_DB3346_01_standard.jpg', '002C', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`idvendeur`) REFERENCES `vendeur` (`id`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `musique_ibfk_1` FOREIGN KEY (`idvendeur`) REFERENCES `vendeur` (`id`);

--
-- Contraintes pour la table `sportloisir`
--
ALTER TABLE `sportloisir`
  ADD CONSTRAINT `sportloisir_ibfk_1` FOREIGN KEY (`idvendeur`) REFERENCES `vendeur` (`id`);

--
-- Contraintes pour la table `vetement`
--
ALTER TABLE `vetement`
  ADD CONSTRAINT `vetement_ibfk_1` FOREIGN KEY (`idvendeur`) REFERENCES `vendeur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

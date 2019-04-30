-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 30 avr. 2019 à 10:02
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
  `numerocarte` int(64) NOT NULL,
  `proprietairecarte` varchar(255) NOT NULL,
  `expirationcarte` date NOT NULL,
  `cryptocarte` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`id`, `nom`, `adresse`, `email`, `mdp`, `ville`, `codepostal`, `pays`, `telephone`, `typecarte`, `numerocarte`, `proprietairecarte`, `expirationcarte`, `cryptocarte`) VALUES
(1, 'Delagardette', '8 rue Bonaparte', 'Kieran.delagardette@edu.ece.fr', 'azerty', 'Chatou', 78400, 'France', 612345678, 'Mastercard', 12341234, 'Delagardette', '2019-05-24', 123);

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
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `idvendeur`, `photo`, `prix`, `nom`, `date`, `auteur`, `style`) VALUES
(1001, 2, 'https://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/4/1/8/9782013232814/tsp20120918181211/Les-Miserables.jpg', 6, 'Les miserables', '2019-04-03', 'Victor Hugo', 'Roman'),
(1002, 2, 'https://images-na.ssl-images-amazon.com/images/I/51V6YDH84BL.jpg', 10, 'Germinal', '2019-04-02', 'Victor Hugo', 'Naturalisme'),
(1003, 2, 'https://media.cultura.com/media/catalog/product/cache/1/image/1000x1000/9df78eab33525d08d6e5fb8d27136e95/j/0/j00837.jpg?t=1514302453', 13.5, 'Harry Potter et l\'enfant maudit', '2019-04-02', 'J.K Rowlling', 'fantastique'),
(1004, 2, 'https://images-na.ssl-images-amazon.com/images/I/517MH9KJ38L._SX327_BO1,204,203,200_.jpg', 13, 'Harry Potter à l\'ecole des sorciers\r\n', '2018-11-12', 'J.K Rowling', 'fantastique'),
(1005, 2, 'https://images-na.ssl-images-amazon.com/images/I/91OSvPibmJL.jpg', 14, 'Harry Potter et la chambre des secrets', '2019-04-15', 'J.K Rowling', 'fantastique');

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
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id`, `idvendeur`, `nom`, `prix`, `date`, `artiste`, `photo`) VALUES
(1, 2, 'San', 2, '2019-03-14', 'Orelsan', 'https://i.ytimg.com/vi/PejyoeG_TmA/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sportloisir`
--

DROP TABLE IF EXISTS `sportloisir`;
CREATE TABLE IF NOT EXISTS `sportloisir` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idvendeur` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sportloisir`
--

INSERT INTO `sportloisir` (`id`, `idvendeur`, `nom`, `prix`, `photo`) VALUES
(1, 2, 'Ballon', 9, 'https://media.intersport.fr/is/image/intersportfr/5003248E1Q_FA?$produit_l$');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `pseudo`, `email`, `nom`, `photo`, `imagefond`, `admin`) VALUES
(2, 'leo', 'Leo.beillevaire@edu.ece.fr', 'Beillevaire', 'http://cdn.24.co.za/files/Cms/General/d/5470/79958d58e26a45fa8bfb87e6ed155e18.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyB69fJErh0Qp_hQzswRuI13OgsN0y5yHhQZAt-L924JAdKSIi', 0);

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
  `taille` int(10) NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvendeur` (`idvendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetement`
--

INSERT INTO `vetement` (`id`, `idvendeur`, `nom`, `prix`, `marque`, `taille`, `sexe`, `photo`) VALUES
(1, 2, 'Chaussure', 99, 'Nike', 43, 0, 'https://images.asos-media.com/products/nike-air-pegasus-89-baskets-blanc/10610787-1-white?$XXL$&wid=513&fit=constrain');

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
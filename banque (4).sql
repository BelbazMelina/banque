-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 jan. 2024 à 13:44
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `banque`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `adresse` varchar(32) NOT NULL,
  `numeroTel` int NOT NULL,
  `email` varchar(32) NOT NULL,
  `profession` varchar(32) NOT NULL,
  `situationFamiliale` varchar(32) NOT NULL,
  `chargerClient` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateInscription` date NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `numeroTel` (`numeroTel`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `nom`, `prenom`, `dateDeNaissance`, `adresse`, `numeroTel`, `email`, `profession`, `situationFamiliale`, `chargerClient`, `dateInscription`) VALUES
(1, 'Dupont', 'abdoul', '2024-01-06', 'Tours', 749623703, 'ghadiridiallo007@gmail.com', 'Celibataire', 'Etudiant', '3', '2024-01-07');

-- --------------------------------------------------------

--
-- Structure de la table `comptesclient`
--

DROP TABLE IF EXISTS `comptesclient`;
CREATE TABLE IF NOT EXISTS `comptesclient` (
  `idCompte` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `nomducompte` varchar(32) NOT NULL,
  `Decouvertautoriser` double NOT NULL,
  `solde` double NOT NULL,
  `Dateouverture` date NOT NULL,
  PRIMARY KEY (`idCompte`,`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comptesclient`
--

INSERT INTO `comptesclient` (`idCompte`, `idClient`, `nomducompte`, `Decouvertautoriser`, `solde`, `Dateouverture`) VALUES
(1, 1, 'CompteCPL', -800, -400, '2024-01-08');

-- --------------------------------------------------------

--
-- Structure de la table `contratsclient`
--

DROP TABLE IF EXISTS `contratsclient`;
CREATE TABLE IF NOT EXISTS `contratsclient` (
  `idContrat` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `nomducontrat` varchar(32) NOT NULL,
  `Mensualite` double NOT NULL,
  `dateouverture` date NOT NULL,
  PRIMARY KEY (`idContrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `crenauxbloquer`
--

DROP TABLE IF EXISTS `crenauxbloquer`;
CREATE TABLE IF NOT EXISTS `crenauxbloquer` (
  `idConseiller` int NOT NULL,
  `motif` varchar(32) NOT NULL,
  `heure` time NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `crenauxbloquer`
--

INSERT INTO `crenauxbloquer` (`idConseiller`, `motif`, `heure`, `date`) VALUES
(3, 'Formation', '18:00:00', '2024-01-07'),
(3, 'CompteCPL', '13:00:00', '2024-01-08'),
(3, 'AssuranceSante', '18:00:00', '2024-01-08');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `idEmploye` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `identifiant` varchar(32) NOT NULL,
  `motDepasse` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categorie` varchar(32) NOT NULL,
  PRIMARY KEY (`idEmploye`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`idEmploye`, `nom`, `prenom`, `identifiant`, `motDepasse`, `categorie`) VALUES
(1, 'Bigstene', 'Abdoul', 'd21', 'd21', 'directeur'),
(2, 'Stene', 'Abdoul', 'a22', 'a22', 'agent'),
(3, 'Abdoul', 'Diallo', 'a23', 'a23', 'conseiller');

-- --------------------------------------------------------

--
-- Structure de la table `inter`
--

DROP TABLE IF EXISTS `inter`;
CREATE TABLE IF NOT EXISTS `inter` (
  `type` varchar(32) NOT NULL,
  `pieces` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inter`
--

INSERT INTO `inter` (`type`, `pieces`) VALUES
('CompteCPL', 'piecedidentite'),
('CompteCPL', 'cartevitale'),
('AssuranceSante', 'piecedidentite'),
('AssuranceSante', 'cartevitale');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE IF NOT EXISTS `motif` (
  `nomMotif` varchar(32) NOT NULL,
  PRIMARY KEY (`nomMotif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`nomMotif`) VALUES
('AssuranceSante'),
('Autre'),
('CompteCPL');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `idRdv` int NOT NULL AUTO_INCREMENT,
  `motif` varchar(32) NOT NULL,
  `dateRdv` date NOT NULL,
  `heureRdv` time NOT NULL,
  `idClient` varchar(32) NOT NULL,
  `idConseiler` varchar(32) NOT NULL,
  `numeroTel` int NOT NULL,
  PRIMARY KEY (`idRdv`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`idRdv`, `motif`, `dateRdv`, `heureRdv`, `idClient`, `idConseiler`, `numeroTel`) VALUES
(1, 'CompteCPL', '2024-01-08', '13:00:00', '1', '3', 749623703),
(2, 'AssuranceSante', '2024-01-08', '18:00:00', '1', '3', 749623703);

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

DROP TABLE IF EXISTS `typecompte`;
CREATE TABLE IF NOT EXISTS `typecompte` (
  `nomCompte` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`nomCompte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `typecompte`
--

INSERT INTO `typecompte` (`nomCompte`) VALUES
('CompteCPL');

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

DROP TABLE IF EXISTS `typecontrat`;
CREATE TABLE IF NOT EXISTS `typecontrat` (
  `nomContrat` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mensualite` double NOT NULL,
  PRIMARY KEY (`nomContrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `typecontrat`
--

INSERT INTO `typecontrat` (`nomContrat`, `mensualite`) VALUES
('AssuranceSante', 60);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

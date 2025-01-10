-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 jan. 2025 à 10:20
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
-- Base de données : `projet_lprs`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_contact` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cree`
--

DROP TABLE IF EXISTS `cree`;
CREATE TABLE IF NOT EXISTS `cree` (
  `ref_event` int NOT NULL,
  `ref_utilisateur` int NOT NULL,
  PRIMARY KEY (`ref_event`,`ref_utilisateur`),
  KEY `fk_cree_utilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

DROP TABLE IF EXISTS `emplois`;
CREATE TABLE IF NOT EXISTS `emplois` (
  `id_emplois` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `entreprise` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_utilisateur` int NOT NULL,
  `email_utilisateur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_emplois`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplois`
--

INSERT INTO `emplois` (`id_emplois`, `titre`, `entreprise`, `description`, `id_utilisateur`, `email_utilisateur`) VALUES
(9, 'testtest', 'testtest', 'testtest', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `gerant` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `adresseWeb` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_entreprise`),
  UNIQUE KEY `email` (`adresseWeb`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom`, `gerant`, `adresse`, `cp`, `adresseWeb`) VALUES
(39, 'mini', 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lieu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `elementsrequis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombreplaces` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `titre`, `description`, `lieu`, `elementsrequis`, `nombreplaces`) VALUES
(23, 'test', 'test', 'test', 'test', '2'),
(24, 'testtest', 'test', 'test', 'test', '2');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id_forum` int NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `messages` varchar(255) NOT NULL,
  `date_messages` date NOT NULL,
  `heure_messages` time NOT NULL,
  `canal` varchar(50) NOT NULL,
  `ref_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_forum`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id_forum`, `titre`, `messages`, `date_messages`, `heure_messages`, `canal`, `ref_utilisateur`) VALUES
(1, 'test', 'test', '2024-12-08', '21:40:00', 'generale', NULL),
(3, 'test', 'test', '2025-01-04', '18:37:55', 'eleve/professeur', NULL),
(4, 'hello', 'hello', '2025-01-04', '18:46:21', 'eleve/professeur', NULL),
(8, 'test', 'test', '2025-01-08', '14:36:03', 'entreprise/alumni', NULL),
(9, 'mini', 'mini', '2025-01-09', '13:05:12', 'generale', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

DROP TABLE IF EXISTS `inscrire`;
CREATE TABLE IF NOT EXISTS `inscrire` (
  `ref_utilisateur` int DEFAULT NULL,
  `ref_event` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrire`
--

INSERT INTO `inscrire` (`ref_utilisateur`, `ref_event`) VALUES
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(0, 7),
(0, 11),
(0, 11),
(1, 2),
(NULL, 11),
(NULL, 11),
(NULL, 11),
(NULL, 11),
(NULL, 11),
(NULL, 11),
(NULL, 13);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id_notification` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `message` text NOT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_notification`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

DROP TABLE IF EXISTS `offres`;
CREATE TABLE IF NOT EXISTS `offres` (
  `id_offre` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `missions` text NOT NULL,
  `type` enum('stage','alternance','CDD','CDI') NOT NULL,
  `salaire` decimal(10,2) DEFAULT NULL,
  `visibilite` enum('tous','profil_particulier') NOT NULL DEFAULT 'tous',
  `etat` enum('ouverte','cloturee') NOT NULL DEFAULT 'ouverte',
  `id_auteur` int NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_offre`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id_offre`, `titre`, `description`, `missions`, `type`, `salaire`, `visibilite`, `etat`, `id_auteur`, `date_creation`, `date_modification`) VALUES
(6, 'test', 'test', 'test', '', 150.00, '', '', 0, '2025-01-10 11:07:36', '2025-01-10 11:07:36');

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

DROP TABLE IF EXISTS `postuler`;
CREATE TABLE IF NOT EXISTS `postuler` (
  `ref_utilisateur` int DEFAULT NULL,
  `ref_emplois` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `postuler`
--

INSERT INTO `postuler` (`ref_utilisateur`, `ref_emplois`) VALUES
(0, 2),
(0, 2),
(0, 2),
(0, 2),
(NULL, 5),
(NULL, 5),
(NULL, 5),
(NULL, 5),
(NULL, 5),
(NULL, 5),
(NULL, 5),
(NULL, 5),
(NULL, 8);

-- --------------------------------------------------------

--
-- Structure de la table `rattacher`
--

DROP TABLE IF EXISTS `rattacher`;
CREATE TABLE IF NOT EXISTS `rattacher` (
  `ref_utilisateur` int NOT NULL,
  `ref_entreprise` int NOT NULL,
  PRIMARY KEY (`ref_utilisateur`,`ref_entreprise`),
  KEY `fk_rattacher_entreprise` (`ref_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int NOT NULL AUTO_INCREMENT,
  `message` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_message` date NOT NULL,
  `heure_message` time NOT NULL,
  `ref_forum` int DEFAULT NULL,
  `ref_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `fk_reponse_forum` (`ref_forum`),
  KEY `fk_reponse_utilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `message`, `date_message`, `heure_message`, `ref_forum`, `ref_utilisateur`) VALUES
(6, 'test', '2025-01-09', '12:49:20', 3, NULL),
(7, 'lke', '2025-01-09', '12:50:21', 3, NULL),
(8, 'hi', '2025-01-09', '12:55:43', 4, NULL),
(9, 'hey', '2025-01-09', '12:58:48', 4, NULL),
(10, 'kl', '2025-01-09', '12:59:01', 4, NULL),
(11, 'lk,', '2025-01-09', '12:59:31', 4, NULL),
(12, 'lk', '2025-01-09', '13:01:04', 4, NULL),
(14, 'hii', '2025-01-09', '13:04:15', NULL, NULL),
(15, 'hii', '2025-01-09', '13:04:19', NULL, NULL),
(16, 'hii', '2025-01-09', '13:04:22', NULL, NULL),
(17, 'dsf', '2025-01-09', '13:04:36', 4, NULL),
(18, 'ook', '2025-01-09', '13:05:00', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom_promo` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cv` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `motif_inscription` varchar(100) DEFAULT NULL,
  `classe` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `specialite_prof` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `poste_entreprise` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ref_emplois` int DEFAULT NULL,
  `id_entreprise` int DEFAULT NULL,
  `secteur_activite` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `validated` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_utilisateur_emplois` (`ref_emplois`),
  KEY `fk_id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `nom_promo`, `cv`, `motif_inscription`, `classe`, `specialite_prof`, `poste_entreprise`, `role`, `ref_emplois`, `id_entreprise`, `secteur_activite`, `validated`) VALUES
(159, 'angel', 'angel', 'angel@angel.com', '$2y$10$AeGXGobe0dXJPnKWlgp9A.y8qbO.GoVimTM3jJPq1p1Frpw/GYeFW', '', NULL, NULL, NULL, NULL, NULL, 'alumni', NULL, NULL, 'angel', 1);

-- --------------------------------------------------------

--
-- Structure de la table `valide`
--

DROP TABLE IF EXISTS `valide`;
CREATE TABLE IF NOT EXISTS `valide` (
  `ref_utilisateur` int NOT NULL,
  `ref_event` int NOT NULL,
  PRIMARY KEY (`ref_utilisateur`,`ref_event`),
  KEY `fk_valide_event` (`ref_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cree`
--
ALTER TABLE `cree`
  ADD CONSTRAINT `fk_cree_event` FOREIGN KEY (`ref_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `fk_cree_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `rattacher`
--
ALTER TABLE `rattacher`
  ADD CONSTRAINT `fk_rattacher_entreprise` FOREIGN KEY (`ref_entreprise`) REFERENCES `entreprise` (`id_entreprise`),
  ADD CONSTRAINT `fk_rattacher_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_reponse_forum` FOREIGN KEY (`ref_forum`) REFERENCES `forum` (`id_forum`),
  ADD CONSTRAINT `fk_reponse_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_id_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `valide`
--
ALTER TABLE `valide`
  ADD CONSTRAINT `fk_valide_event` FOREIGN KEY (`ref_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `fk_valide_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

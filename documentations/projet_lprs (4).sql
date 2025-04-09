-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 09 avr. 2025 à 09:50
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
  PRIMARY KEY (`id_emplois`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplois`
--

INSERT INTO `emplois` (`id_emplois`, `titre`, `entreprise`, `description`) VALUES
(2, 'test', 'test', 'test');

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
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_entreprise`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom`, `gerant`, `adresse`, `cp`, `email`) VALUES
(1, 'Autre', '', '', '', NULL),
(16, 'qzert', 'jklmù', 'sdfg', 'sdfg', 'jeqsdfcdszan.duerfepont@example.com'),
(18, 'qzert', 'jklmù', 'sdfg', '84651', 'jeqsdfcdscqzan.duerfepont@example.com');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Lieu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Elements_requis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Nombre_de_places` varchar(50) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `Titre`, `Description`, `Lieu`, `Elements_requis`, `Nombre_de_places`) VALUES
(2, 'test', '2021-10-24', 'test', 'test', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id_forum`, `titre`, `messages`, `date_messages`, `heure_messages`, `canal`, `ref_utilisateur`) VALUES
(1, 'JavaFx', 'test plus de test tourjours plus de test', '2024-12-09', '16:19:07', 'generale', NULL),
(2, 'Quel type de CV a favoriser ?', 'Je me demandais quel type de cv etais le plus mise en avant par les entreprise, pourriez vous m\'éclairer', '2024-12-09', '16:29:11', 'entreprise/alumni', NULL),
(3, 'JavaFx', 'aaaa aaaa aa', '2025-04-09', '11:13:13', 'generale', NULL);

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
(NULL, 2),
(NULL, 2),
(NULL, 2),
(NULL, 2),
(NULL, 2),
(NULL, 2),
(NULL, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id_offre`, `titre`, `description`, `missions`, `type`, `salaire`, `visibilite`, `etat`, `id_auteur`, `date_creation`, `date_modification`) VALUES
(1, 'Technicien informatique', 'Le ou la technicien(ne) informatique assure l’installation, la maintenance et le bon fonctionnement du parc informatique d’une entreprise ou d’un établissement. Il/elle intervient aussi bien sur les postes utilisateurs que sur les équipements réseaux et logiciels.', 'Missions principales : Installer, configurer et entretenir les postes de travail (PC, périphériques, imprimantes, etc.)  Assurer le support technique aux utilisateurs (dépannage matériel, logiciel, réseau)  Diagnostiquer et résoudre les pannes et incidents techniques (à distance ou sur site)  Gérer les comptes utilisateurs, les droits d’accès et les mises à jour  Participer à l’administration du réseau local (switchs, routeurs, pare-feu)  Mettre en place des outils de sécurité et de sauvegarde  Rédiger des procédures ou des guides à destination des utilisateurs  Accompagner les utilisateurs dans la prise en main des outils numériques', 'alternance', 900.00, '', '', 0, '2025-04-09 11:21:16', '2025-04-09 11:21:16');

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
(NULL, 2),
(NULL, 2);

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
  `ref_forum` int NOT NULL,
  `ref_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `fk_reponse_forum` (`ref_forum`),
  KEY `fk_reponse_utilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `message`, `date_message`, `heure_message`, `ref_forum`, `ref_utilisateur`) VALUES
(1, 'ca c\'est bien vrais !!', '2024-12-09', '16:19:58', 1, 62),
(2, 'Je sais pas ', '2024-12-09', '16:51:11', 2, NULL),
(3, 'Je sais pas ', '2024-12-09', '16:51:16', 2, NULL),
(4, 'Mais pourquoi alors ?', '2024-12-11', '11:05:24', 1, 56),
(5, 'J\'en  ai aucune idée', '2024-12-11', '11:15:46', 1, 61),
(6, 'Peut être :/', '2024-12-11', '11:16:38', 1, 56),
(10, 'rtyiop$oiii^^pll;,,klk', '2025-01-01', '16:57:55', 1, NULL),
(11, 'iMANY', '2025-01-01', '16:58:30', 1, NULL),
(12, 'IDRISS', '2025-01-01', '16:59:01', 1, NULL),
(13, 'sherazad', '2025-01-01', '16:59:10', 1, NULL),
(15, 'Moi aussi je sais', '2025-01-01', '17:05:12', 2, NULL),
(16, 'okokoko', '2025-01-01', '17:05:40', 1, NULL),
(17, 'Je sais pas', '2025-04-09', '11:13:31', 3, NULL);

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
  `secteur_activite` varchar(255) DEFAULT NULL,
  `validated` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_utilisateur_emplois` (`ref_emplois`),
  KEY `fk_id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `nom_promo`, `cv`, `motif_inscription`, `classe`, `specialite_prof`, `poste_entreprise`, `role`, `ref_emplois`, `id_entreprise`, `secteur_activite`, `validated`) VALUES
(38, 'a', 'a', 'a@lprs.fr', '$2y$10$u.39mDb90Bv5iPJCRYejvOq76LF11GTNQLCp54qxfx5zmK7aHPjR2', 'a', NULL, NULL, NULL, NULL, NULL, 'alumni', NULL, NULL, 'a', 1),
(50, 'a', 'a', 'ab@lprs.fr', '$2y$10$nCtiaPlv8iwM2lLpfpcP9uw402H3O4Ets3zTjIOXxBHsojTBPC0/i', NULL, NULL, NULL, NULL, NULL, 'a', 'partenaire', NULL, NULL, NULL, 1),
(51, 'a', 'a', 'azerty@lprs.fr', '$2y$10$yHP5D8oJWsqZxjp7Ai8acednEmTUQoCZ.1cPRQkSV7cY4QaUC4cHq', NULL, NULL, NULL, NULL, NULL, 'a', 'partenaire', NULL, NULL, NULL, 1),
(52, 'a', 'a', 'aazertyuiop@lprs.fr', '$2y$10$zqba1H3FiQkD1DRyjIrJ4O8fgqIa1SOVDpNwXDjmIfJWNYjleNhJu', NULL, NULL, NULL, NULL, 'a', NULL, 'professeur', NULL, NULL, NULL, 0),
(53, 'a', 'a', 'aazertyyuiop@lprs.fr', '$2y$10$nGb7dN7BP7GKmzrDKsd5XuoCt9RZOf6sm8hgCTQZdP5hhnqjXMT1e', NULL, NULL, NULL, NULL, 'a', NULL, 'professeur', NULL, NULL, NULL, 0),
(54, 'a', 'a', 'aazertyoyuiop@lprs.fr', '$2y$10$w4fvRx.7CStwCoio2aaY3e4t9A.KinRf9m9K6TJSczoNF7NPFRwqa', NULL, NULL, NULL, NULL, 'a', NULL, 'professeur', NULL, NULL, NULL, 0),
(55, 'a', 'a', 'aazertyfyuiop@lprs.fr', '$2y$10$ZAbdCyPSYDsEF0/vHXrUh.uWv.6O0egsVP3Gh8CYDG0eaE5qv.sVu', NULL, NULL, NULL, NULL, 'q', NULL, 'professeur', NULL, NULL, NULL, 0),
(56, 'a', 'a', 'aazertyfhyuiop@lprs.fr', '$2y$10$k3zevZEyzeNQh4ngYAYUKuiyGhHQt/CG8NUA/NZeirvTEjd7xhdle', NULL, NULL, NULL, NULL, 'q', NULL, 'professeur', NULL, NULL, NULL, 0),
(57, 'a', 'a', 'abracadabra@lprs.fr', '$2y$10$XR.0TGtWmHKPlUP6ISMbPONLWcUFgLQtdd4O3kVMx/G2W6B.HrT3O', NULL, NULL, NULL, NULL, NULL, 'a', 'partenaire', NULL, NULL, NULL, 0),
(58, 'a', 'a', 'abracadabra3@lprs.fr', '$2y$10$obOvhhn1sXLjgktuK53qyeMExU2.Yku4do8BIaaBwq/Wj3W..EWvy', NULL, NULL, 'voila', NULL, NULL, 'a', 'partenaire', NULL, 16, NULL, 1),
(59, 'ezfergt', 'zefrgt', 'fregtr@cqs.fr', '$2y$10$ig0Vct89IP/8/EOSbTiCtOER1WNURoU1uPSIM32aUWvHNZOtD0kwS', NULL, NULL, NULL, NULL, NULL, NULL, 'gestionnaire', NULL, NULL, NULL, 0),
(60, 'test', 'test', 'test.test@gmail.fr', 'test123', NULL, 'uploads/cv/edm21nc-QWANT.pdf', NULL, 'BTS SLAM 2', NULL, NULL, 'eleve', NULL, NULL, NULL, 0),
(61, 'AB', 'ab', 'ab.ab@gmail.fr', '$2y$10$jd/1nw9huqbLLqGgSsE5SO3yGFnV1K/oV9H42anDD7yJ722fz1bDy', NULL, 'uploads/cv/Rasterbation.pdf', NULL, 'BTS SLAM 2', NULL, NULL, 'eleve', NULL, NULL, NULL, 0),
(62, 'Eponge', 'Bob', 'bob.eponge@gmail.com', 'BikiniBotoms', NULL, 'uploads/cv/edm21nc-QWANT.pdf', NULL, 'BTS SLAM 2', NULL, NULL, 'eleve', NULL, NULL, NULL, 0),
(64, '.BB?NXS', 'SX?JWUHNJ', 'XJNJW?SKX?@gmail.com', 'HSXXN?', NULL, 'uploads/cv/Cours + TD Graphes.pdf', NULL, 'BTS SLAM 2', NULL, NULL, 'eleve', NULL, NULL, NULL, 0),
(65, 'Youssouf', 'Idriss', 'idriss.youssouf@gmail.com', 'test123', NULL, 'uploads/cv/ABDALLAH Shérazad.pdf', NULL, 'BTS SLAM 2', NULL, NULL, 'eleve', NULL, NULL, NULL, 0);

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

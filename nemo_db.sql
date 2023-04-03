-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 03 avr. 2023 à 07:46
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `nemo_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `name`, `surname`, `email`, `password`, `created_at`) VALUES
(1, 'SOH', 'Sylvain', 'sylvainsoh@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2023-03-28 09:40:34'),
(2, 'DUPOND', 'Olivier', 'olivierdupond@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2023-03-28 09:41:10');

-- --------------------------------------------------------

--
-- Structure de la table `db_distante`
--

CREATE TABLE `db_distante` (
  `id` int(11) NOT NULL,
  `db_name` varchar(255) NOT NULL,
  `port` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_distante`
--

INSERT INTO `db_distante` (`id`, `db_name`, `port`, `host`, `username`, `password`, `type`, `status`, `created_at`) VALUES
(6, 'cergy_universite', 3306, 'localhost', 'syl20', '12345678', 'mysql', 1, '2023-03-30 11:00:23'),
(7, 'itinovBank', 3306, 'localhost', 'syl20', '12345678', 'mysql', 1, '2023-03-30 11:05:13'),
(8, '_wshop_test', 3306, 'localhost', 'syl20', '12345678', 'mysql', 1, '2023-03-30 11:28:13'),
(9, 'sys', 3306, 'localhost', 'syl20', '12345678', 'mysql', 0, '2023-03-30 11:28:24'),
(10, 'weather_city', 3306, 'localhost', 'syl20', '12345678', 'mysql', 1, '2023-03-30 11:28:51');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `dure_validite` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id`, `code`, `libelle`, `dure_validite`) VALUES
(1, 'ETU', 'Etudiant', NULL),
(2, 'ENS', 'Enseignant', NULL),
(3, 'PEC', 'Personnel de l\'établissement composante', NULL),
(4, 'INT', 'Intervenant extérieur', NULL),
(5, 'GEC', 'Gestionnaire', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(100) NOT NULL,
  `id_profile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `nom_usuel` varchar(30) DEFAULT NULL,
  `nom_legal` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `adresse` text NOT NULL,
  `numero_ss` varchar(100) DEFAULT NULL,
  `interne` int(11) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '',
  `information_supp` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `identifiant`, `id_profile`, `email`, `password`, `date_debut`, `date_fin`, `telephone`, `nom_usuel`, `nom_legal`, `prenom`, `date_naissance`, `adresse`, `numero_ss`, `interne`, `status`, `information_supp`, `created_at`, `updated_at`) VALUES
(1, '1001', '1', 'john.doe@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 89', 'Doe', 'John', 'John', '1998-05-15', '123 Rue du Commerce, 75015 Paris', '123456789012345', 1, 'Actif', 'A remporté un prix en mathématiques au lycée', '2023-03-31 09:22:28', '2023-03-31 09:22:28'),
(2, '1002', '1', 'jane.smith@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 90', 'Smith', 'Jane', 'Jane', '1997-10-21', '456 Rue des Lilas, 75020 Paris', '234567890123456', 0, 'Actif', 'Passionné(e) de musique classique et membre d\'un orchestre amateur', '2023-03-31 09:22:28', '2023-03-31 09:22:28'),
(3, '1003', '1', 'robert.johnson@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 91', 'Johnson', 'Robert', 'Robert', '1999-03-07', '789 Rue de la Paix, 75008 Paris', '345678901234567', 1, 'Actif', 'A effectué un stage de 3 mois en marketing chez une entreprise de renom', '2023-03-31 09:22:28', '2023-03-31 09:22:28'),
(4, '1004', '1', 'emily.wang@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 92', 'Wang', 'Emily', 'Emily', '1996-12-01', '567 Rue des Ecoles, 75005 Paris', '456789012345678', 0, 'Actif', 'A effectué un stage de 3 mois en marketing chez une entreprise de renom', '2023-03-31 09:22:28', '2023-03-31 09:22:28'),
(5, '1005', '1', 'ali.khan@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 93', 'Khan', 'Ali', 'Ali', '1998-08-10', '890 Rue du Faubourg Saint-Antoine, 75012 Paris', '567890123456789', 1, 'Actif', 'Pratique la danse depuis l\'âge de 5 ans et a participé à plusieurs compétitions', '2023-03-31 09:22:28', '2023-03-31 09:22:28'),
(6, '1006', '1', 'sophie.tremblay@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 94', 'Tremblay', 'Sophie', 'Sophie', '1997-02-28', '234 Rue des Archives, 75003 Paris', '678901234567890', 0, 'Actif', 'A participé à une mission humanitaire au Cambodge pendant l\'été\n', '2023-03-31 09:22:28', '2023-03-31 09:22:28'),
(8, '1008', '1', 'mohammed.ali@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 95', 'Ali', 'Mohammed', 'Mohammed', '1999-06-20', '678 Rue de Belleville, 75020 Paris', '789012345678901', 1, 'Actif', 'Bénévole pour une association de protection des animaux depuis 2 ans\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(9, '1009', '1', 'sara.lee@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 96', 'Lee', 'Sara', 'Sara', '1998-11-08', '890 Rue de la Roquette, 75011 Paris', '890123456789012', 0, 'Actif', 'A réalisé un court-métrage primé lors d\'un festival de cinéma étudiant\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(10, '1010', '1', 'pauline.dubois@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 97', 'Dubois', 'Pauline', 'Pauline', '1997-04-12', '345 Rue de la Pompe, 75116 Paris', '901234567890123', 1, 'Actif', 'A étudié à l\'étranger pendant un semestre dans le cadre d\'un programme d\'échange\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(11, '1011', '1', 'marco.rossi@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 98', 'Rossi', 'Marco', 'Marco', '1996-09-18', '678 Rue du Temple, 75003 Paris', '012345678901234', 0, 'Actif', 'A étudié à l\'étranger pendant un semestre dans le cadre d\'un programme d\'échange\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(12, '1012', '1', 'anna.kovacs@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 99', 'Kovacs', 'Anna', 'Anna', '1999-01-25', '123 Rue de la Chapelle, 75018 Paris', '123456789012345', 1, 'Actif', 'A étudié à l\'étranger pendant un semestre dans le cadre d\'un programme d\'échange\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(13, '1013', '1', 'juan.perez@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 00', 'Perez', 'Juan', 'Juan', '1998-07-04', '567 Rue du Cherche-Midi, 75006 Paris', '234567890123456', 0, 'Actif', 'A étudié à l\'étranger pendant un semestre dans le cadre d\'un programme d\'échange\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(15, '1015', '1', 'pierre.dupont@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 02', 'Dupont', 'Pierre', 'Pierre', '1997-12-10', '345 Rue Saint-Honoré, 75001 Paris', '345678901234567', 1, 'Actif', 'Auteur(e) d\'un livre auto-publié sur la philosophie orientale\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(16, '1016', '1', 'maria.rodriguez@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 03', 'Rodriguez', 'Maria', 'Maria', '1995-03-21', '678 Rue de la Convention, 75015 Paris', '456789012345678', 0, 'Actif', 'Auteur(e) d\'un livre auto-publié sur la philosophie orientale\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(17, '1017', '1', 'alain.garcia@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 04', 'Garcia', 'Alain', 'Alain', '1996-08-15', '123 Rue de Vaugirard, 75015 Paris', '567890123456789', 1, 'Actif', 'Auteur(e) d\'un livre auto-publié sur la philosophie orientale\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(18, '1018', '1', 'julie.bernard@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 05', 'Bernard', 'Julie', 'Julie', '1999-02-28', '890 Rue Saint-Maur, 75011 Paris', '678901234567890', 0, 'Actif', 'Auteur(e) d\'un livre auto-publié sur la philosophie orientale\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(19, '1019', '1', 'antoine.durand@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 06', 'Durand', 'Antoine', 'Antoine', '1997-05-07', '345 Rue de la Convention, 75015 Paris', '789012345678901', 1, 'Actif', 'Auteur(e) d\'un livre auto-publié sur la philosophie orientale\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(20, '1020', '1', 'marie.leclerc@cyu.com', '220beee1e7109cdd1ee75c5c980de34352cf48ab', '2022-09-01', '2023-08-31', '+33 1 23 45 67 07', 'Leclerc', 'Marie', 'Marie', '1998-10-03', '678 Rue de Rivoli, 75001 Paris', '890123456789012', 0, 'Actif', 'Auteur(e) d\'un livre auto-publié sur la philosophie orientale\n', '2023-03-31 09:25:50', '2023-03-31 09:25:50'),
(31, ' int_6426e93d04d29 ', ' 1 ', ' olivier@cyu.com', ' 78d372c46a6da3b69a1de362d7dde3ec4336883c ', '2023-03-31', '2023-06-30', ' 0774424084 ', ' Olivier ', ' SOH ', ' SOH ', '1999-03-31', ' 1 Les Linandes Oranges ', ' 12121212121212 ', 0, ' Actif ', ' A remporté un prix en mathématiques au lycée ', '2023-03-31 14:11:27', '2023-03-31 14:11:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `db_distante`
--
ALTER TABLE `db_distante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `db_distante`
--
ALTER TABLE `db_distante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 27 août 2021 à 18:26
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `st`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `nom_societe` varchar(255) DEFAULT NULL,
  `abreviations` varchar(90) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `secteur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `nom_societe`, `abreviations`, `adresse`, `tel`, `email`, `secteur`) VALUES
(2, 'SOCITE ARABE DES INDUSTRIES PHARMACEUTIQUES', 'SAIPH', 'Rte de Zaghouan Km 24', '71 126 196', 'saiph@saiph.com.tn', 'PRIVATE'),
(3, 'SOCIETE PIERRE FABRE MEDICAMENTS', 'SPFM', 'Q63V+9HM Ben Arous TUNISIE', '79 100 400', 'contact.espacepro@pierre-fabre.com', 'PRIVATE'),
(4, 'ADWYA', 'LABORATOIRES VITAL', 'Route de la Marsa km 14  BP 658 2070 La Marsa Tunisie', '216 71 85 48 88', 'adwya@adwya.com.tn', 'PRIVATE'),
(5, 'SOCITE STAROIL', 'SS', 'Immeuble Setcar Route de Sousse 2034 EZZAHRA BEN AROUS ', '71456799', 'appro@staroil.com.tn', 'PRIVATE'),
(6, 'SOCIETE TRANSPORT MAES INTERNATIONL', 'TMI', '11 RUE ALI BACH HAMBA 2060 Tunis Tunisie', '71469090', NULL, 'PRIVATE'),
(7, 'COMPAGNIE MARITIMES DE CONSIGNATION', 'CMC', '1003 Rades Tunis', '98268086', 'lassad_zitouni@hotmail.com', 'PRIVATE'),
(8, 'SOCIETE MED TIR\r\nGROUPE MCTC', 'SMT', 'TUNISIE', '71 469 000', 'generalmail@mctc.com.tn', 'PRIVATE'),
(9, 'SOCIETE MEDILOG', 'SM', 'Z.I. Radès ', '79 457 281', NULL, 'PRIVATE'),
(10, 'SOCIETE GENERAL TRANSPORT SERVICES', 'GTS', 'TUNISIE', NULL, NULL, 'PRIVATE'),
(11, 'SOCIETE DE TRANSPORT COLLECTIF', 'STC', 'TUNISIE', '72 287 000', NULL, 'PRIVATE'),
(12, 'SOCIETE PROVITAL', 'SP', 'Rue de la Physique_Z.I.Grombalia 8030_Tunisie', '72 255 674', 'ste.provital@planet.tn', 'PRIVATE'),
(13, 'SOCIETE LES GRANDS MOULINS DE TUNIS', 'SGMT', '', NULL, 'SGMTetunis.com', 'PRIVATE'),
(14, 'SOCIETE SOCOGES DELICE DANONE', 'SS', 'MGQ6+MG8, Soliman', '22 183 519', NULL, 'PRIVATE'),
(15, 'SOCIETE TRANS FOOD GROUPE LA ROSE BLANCHE', 'STF', 'BEN AROUS', '73 211 515', 'rose.blanche@planet.tn', 'PRIVATE'),
(16, 'SOCIETE MEGA TRANSPORT GROUPE CARRELAGE CHAIEB', 'SMT', 'Route de Jemmel 5036 Menzel Harb Monastir,Tunisie', '73420800', NULL, 'PRIVATE'),
(17, 'CAISSE NATIONALE D ASSURRANCE MALADIE', 'CNAM', '12 Abouhamed El Ghazely', '71104200', 'info@cnam.nat.tn', 'PUBLIC'),
(18, 'SOCIETE TUNISIE LLD\r\nFILIALE DU GROUPE TUNISIE LEASING', 'LLD', 'Centre urbain nord Av. Hédi Karray 1082 Tunis Cité Mahrajène Tunisie', '216 70 132 000', '', 'PRIVATE'),
(19, 'SOCIETE FATHALLAH TRANSPORT', 'SFT', '45 RUE 9042 SIDI FATHALLAH', '71390944', 'mmefathallah@gmail.com', 'PRIVATE'),
(20, 'SOCIETE TUNISIENNE D ELECTRICITE ET DU GAZ', 'STEG', '38 rue Kamel Ataturk 1080 Tunis', '71 341 311', 'dpsc@steg.com.tn', 'PUBLIC'),
(21, 'Société nationale d exploitation et de distribution des eaux', 'SONEDE', 'Avenue Sliman Ben Sliman - Manar 2 2092 MANAR II Tunis', NULL, 'sonede@sonede.com.tn', 'PUBIC'),
(22, 'TUNISIE TELECOM', 'TT', 'MCR8+QJ9, Cité Seltenne', ' 71 002 002', 'extranet-incident@tunisietele.com.tn', 'PUBLIC');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `domaine realise` varchar(255) DEFAULT NULL,
  `tache realisee` varchar(255) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `domaine realise`, `tache realisee`, `image`) VALUES
(1, 'FleetSoft', 'transport', 'gestion de parc automobile', 'fleetsoft.PNG'),
(2, 'TransPro', 'transport maritimes', 'gestion des transport maritimes', 'transpro.jpg'),
(3, 'ColisExpress', 'transport', 'gestion des transport aeriens', 'colisexpress.jpg'),
(4, 'Delivery', 'livraison', 'gestion de livraison', 'delivery.jpg'),
(5, 'SoftRent', 'location voiture', 'gestion de l activite de location de voiture', 'softrent.jpg'),
(6, 'FormAssist', 'formation', 'gestion de l activite de formation', 'formassist.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

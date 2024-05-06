-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 mai 2023 à 17:43
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sourd`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id_demande` int(11) NOT NULL,
  `id_interpret` int(11) NOT NULL,
  `date_affectation` date NOT NULL,
  `etat` varchar(40) NOT NULL,
  `video_reçu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_demande` int(11) NOT NULL,
  `mot` varchar(40) NOT NULL,
  `date_ajout` date NOT NULL,
  `id_parent` int(11) NOT NULL,
  `statut` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `interpret`
--

CREATE TABLE `interpret` (
  `id_interpret` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` int(11) NOT NULL,
  `pays` varchar(40) NOT NULL,
  `association` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `mot_de_passe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `interpret`
--

INSERT INTO `interpret` (`id_interpret`, `nom`, `prenom`, `photo`, `email`, `telephone`, `pays`, `association`, `login`, `mot_de_passe`) VALUES
(0, '', '', 'IMG-64541f2a4f6a31.65467600.jpg', '', 0, '', '', '', ''),
(12, 'mohmed', 'moh', 'IMG-645375ec45d801.90398232.jpg', 'ali@aa', 145254112, 'alg', 'assosciation', 'moh', 'moh'),
(13, 'ahmed', 'ahmed', 'IMG-645370a37223d3.70887727.jpg', 'azer@hah', 74125, 'aaa', 'aa', 'aa', ''),
(14, 'ee', 'ee', 'IMG-6453704ab600a5.58972924.jpg', '', 0, '', '', '', ''),
(15, 'aa', 'aa', 'IMG-645370186dd6c0.95018402.jpg', '', 0, '', '', '', ''),
(17, 'azer', 'azer', 'IMG-645370eb7504f3.00734275.jpg', 'azer@j', 1111, 'tunis', 'sourd', 'azsd', 'asd'),
(22, 'ali', 'ali', 'IMG-6454b85c7d4252.81816620.jpg', 'ali@aaa', 2222, 'gab', 'aa', 'aaa', 'aaa'),
(25, 'zz', 'zz', 'IMG-6453702854e841.51755543.jpg', '', 0, '', '', '', ''),
(112, 'ali', 'ali', 'IMG-64537370ba5d79.54786217.jpg', 'ali@ahah', 1452, 'france', 'bebetter', 'ali', 'alii'),
(140, 'ahmed', 'ahmed', 'IMG-64540ba4b16028.30878846.jpg', 'aga@aa', 22255, 'fr', 'aa', 'aa', 'aaa'),
(1445, 'azer', 'azer', 'IMG-645377018358d8.64649435.jpg', 'azer@jh', 145, 'aaa', 'aa', 'aa', 'aa');

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE `parent` (
  `id_parent` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `e-mail` varchar(40) NOT NULL,
  `telephone` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `mot_de_passe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `description` varchar(40) NOT NULL,
  `date_reclamation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `signe`
--

CREATE TABLE `signe` (
  `id_signe` int(11) NOT NULL,
  `mot_ar` varchar(40) NOT NULL,
  `mot_fr` varchar(40) NOT NULL,
  `image` varchar(300) NOT NULL,
  `video` varchar(300) NOT NULL,
  `tag` varchar(40) NOT NULL,
  `id_interpret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `signe`
--

INSERT INTO `signe` (`id_signe`, `mot_ar`, `mot_fr`, `image`, `video`, `tag`, `id_interpret`) VALUES
(3, 'est', 'est', 'IMG-64540d88a6a555.70821241.jpg', 'VID-64540d88a6ea92.92851087.mp4', 'se', 13),
(11, 'marhaba', 'bonj', 'IMG-6454220f51f635.13179595.jpg', 'VID-6454220f524207.27356987.mp4', 'aa', 13),
(14, 'tarji', 'est', 'IMG-64540db6bedca9.68807625.jpg', 'VID-64540db6bf2460.76673317.mp4', 'aa', 17),
(21, 'asd', 'yvi', 'IMG-64540d187b1032.62589681.jpg', 'VID-64540d187b6e98.99204857.mp4', 'aa', 13),
(33, 'moncef', 'momo', 'IMG-6454ad6f14b840.04228017.jpg', 'VID-6454ad6f14ee99.87500344.mp4', 'aa', 17),
(112, 'marhaba', 'bonj', 'IMG-64540c290c4ae4.75736478.jpg', 'VID-64540c290c8f77.99320919.mp4', 'ahla', 13),
(142, 'asd', 'asd', 'IMG-64541d0398a5d3.88638003.jpg', 'VID-64541d0398e727.50349065.mp4', 'aa', 17),
(147, 'alakhir', 'bonne nuit', 'IMG-64541c88f21437.10671656.jpg', 'VID-64541c88f24ec4.68675144.mp4', 'fghj', 17),
(223, 'lil', 'soir', 'IMG-6454267527c993.03651407.jpg', 'VID-64542675281ad4.15119753.mp4', 'qqq', 17),
(336, 'aaaa', 'uuuu', 'IMG-6454bcdfc3cc63.36886483.jpg', 'VID-6454bcdfc41512.12485417.mp4', 'u', 17),
(1442, 'aazz', 'mmo', 'IMG-6454b3ee57c2b9.24335030.jpg', 'VID-6454b3ee57fa06.29045483.mp4', 'ooooo', 17),
(1443, 'yy', 'yy', 'IMG-6454b2bf16c523.59530738.jpg', 'VID-6454b2bf170af6.32809198.mp4', 'yy', 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD KEY `id_demande` (`id_demande`),
  ADD KEY `id_interpret` (`id_interpret`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Index pour la table `interpret`
--
ALTER TABLE `interpret`
  ADD PRIMARY KEY (`id_interpret`);

--
-- Index pour la table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id_parent`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`);

--
-- Index pour la table `signe`
--
ALTER TABLE `signe`
  ADD PRIMARY KEY (`id_signe`),
  ADD KEY `id_interpret` (`id_interpret`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`id_demande`) REFERENCES `demande` (`id_demande`),
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`id_interpret`) REFERENCES `interpret` (`id_interpret`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `parent` (`id_parent`);

--
-- Contraintes pour la table `signe`
--
ALTER TABLE `signe`
  ADD CONSTRAINT `signe_ibfk_1` FOREIGN KEY (`id_interpret`) REFERENCES `interpret` (`id_interpret`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

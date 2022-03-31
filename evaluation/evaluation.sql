-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 mars 2022 à 16:05
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exercice`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idPrd` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `dateAjout` date NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idPrd`, `nom`, `dateAjout`, `prix`) VALUES
(1, 'A', '2021-11-10', '23.20'),
(2, 'B', '2022-01-03', '56.54'),
(3, 'C', '2022-02-02', '25.10'),
(4, 'D', '2022-03-06', '35.36');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `idPrd` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `qt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `idPrd`, `type`, `qt`) VALUES
(1, 1, 'stock', 50),
(2, 1, 'vente', 2),
(3, 2, 'stock', 10),
(4, 3, 'stock', 5),
(5, 4, 'stock', 22),
(6, 1, 'vente', 10),
(7, 1, 'vente', 30),
(8, 1, 'stock', 10),
(9, 2, 'vente', 5),
(10, 2, 'vente', 4),
(11, 3, 'vente', 8),
(12, 4, 'vente', 2),
(13, 1, 'vente', 4),
(14, 2, 'stock', 5),
(15, 2, 'vente', 7),
(16, 4, 'vente', 12),
(17, 3, 'vente', 4),
(18, 2, 'vente', 4),
(19, 2, 'stock', 6),
(20, 3, 'stock', 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idPrd`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idPrd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

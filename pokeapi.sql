-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Avril 2018 à 18:14
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokeapi`
--

-- --------------------------------------------------------

--
-- Structure de la table `poke_cardlist`
--

CREATE TABLE `poke_cardlist` (
  `id_cardlist` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cardlist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poke_exchange`
--

CREATE TABLE `poke_exchange` (
  `id_exchange` int(11) NOT NULL,
  `userFrom` int(11) NOT NULL,
  `userTo` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poke_user`
--

CREATE TABLE `poke_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `poke_cardlist`
--
ALTER TABLE `poke_cardlist`
  ADD PRIMARY KEY (`id_cardlist`);

--
-- Index pour la table `poke_exchange`
--
ALTER TABLE `poke_exchange`
  ADD KEY `id_exchange` (`id_exchange`);

--
-- Index pour la table `poke_user`
--
ALTER TABLE `poke_user`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `poke_cardlist`
--
ALTER TABLE `poke_cardlist`
  MODIFY `id_cardlist` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `poke_exchange`
--
ALTER TABLE `poke_exchange`
  MODIFY `id_exchange` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

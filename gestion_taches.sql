-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 12 avr. 2024 à 03:23
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_taches`
--

-- --------------------------------------------------------

--
-- Structure de la table `Tache`
--

CREATE TABLE `Tache` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_echeance` datetime NOT NULL,
  `priorite` enum('faible','moyenne','élevée') NOT NULL,
  `etat` enum('à faire','en cours','terminée') NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Tache`
--

INSERT INTO `Tache` (`id`, `libelle`, `description`, `date_echeance`, `priorite`, `etat`, `id_utilisateur`) VALUES
(1, 'Acheter des fournitures de bureau', 'Acheter des stylos, des cahiers, etc.', '2024-04-12 00:00:00', 'moyenne', 'terminée', 1),
(4, 'Projet', 'poo bj ', '2024-04-12 00:00:00', 'moyenne', 'en cours', 1),
(5, 'Fonctionnalité d\'ajout', 'cet fonctionnalité me permet d\'ajouter des taches', '2024-04-12 00:00:00', 'élevée', 'en cours', 1),
(10, 'je dois aller travailler', 'pour avoir de l\'argent', '2024-04-12 12:00:00', 'faible', 'terminée', 2),
(11, 'je dois terminer mon projet', 'il me faut que je valide cet atelier', '2024-04-12 12:00:00', 'élevée', 'en cours', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'Thiam', 'Hapsatou', 'hapsthiam@gmail.com', 'hapsatou'),
(2, 'Sy', 'Amina', 'syamina@gmail.com', 'amina'),
(3, 'Sow', 'Adama', 'adamasow@gmail.com', 'adama');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Tache`
--
ALTER TABLE `Tache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_utilisateu` (`id_utilisateur`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Tache`
--
ALTER TABLE `Tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Tache`
--
ALTER TABLE `Tache`
  ADD CONSTRAINT `fk_id_utilisateu` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

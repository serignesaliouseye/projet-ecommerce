-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 mars 2025 à 23:00
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
-- Base de données : `nom_de_votre_base_de_données`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pnom` varchar(100) NOT NULL,
  `pemail` varchar(100) NOT NULL,
  `pmot_de_passe` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pnom`, `pemail`, `pmot_de_passe`, `created_at`) VALUES
(1, 'sow', 'sowelhadjimamadou25@gmail.com', 'badema', '2025-03-06 14:30:33'),
(5, 'mamadou', 'mamadou@gmail.com', 'mama', '2025-03-06 14:36:24'),
(11, 'nana', 'nana@gmail.com', 'nana', '2025-03-06 14:52:18'),
(12, 'saliou', 'saliou@gmail.com', 'saliou', '2025-03-06 14:58:05'),
(13, 'baba', 'baba@gmail.com', 'baba', '2025-03-06 15:02:50'),
(15, 'moussa', 'moussa@mail.com', 'moussa', '2025-03-06 15:06:31'),
(16, 'bakeli', 'bakeli@gmail.com', 'bakeli', '2025-03-06 15:07:17'),
(17, 'diallo', 'diallo@gmail.com', 'diallo', '2025-03-06 15:43:47'),
(18, 'keita', 'keita@gmail.com', 'keita', '2025-03-06 15:55:05'),
(19, 'lala', 'lala@gmail.com', 'lala', '2025-03-07 01:17:56'),
(20, 'mariama', 'mariama@gmail.com', 'mariama', '2025-03-07 01:30:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemail` (`pemail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

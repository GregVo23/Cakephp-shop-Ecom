-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 31 déc. 2020 à 03:32
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cake_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

CREATE TABLE `caracteristiques` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`id`, `nom`, `created`, `modified`, `deleted`) VALUES
(1, 'taille', '2020-12-25 03:31:36', '2020-12-25 03:31:36', NULL),
(2, 'couleur', '2020-12-25 03:31:48', '2020-12-25 03:31:48', NULL),
(3, 'modele', '2020-12-25 03:32:15', '2020-12-25 03:40:52', '2020-12-25 03:40:52');

-- --------------------------------------------------------

--
-- Structure de la table `caracteristique_values`
--

CREATE TABLE `caracteristique_values` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `caracteristique_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caracteristique_values`
--

INSERT INTO `caracteristique_values` (`id`, `nom`, `caracteristique_id`, `created`, `modified`, `deleted`) VALUES
(1, 'XL', 1, '2020-12-25 21:07:35', '2020-12-25 21:07:35', NULL),
(2, 'S', 1, '2020-12-25 21:12:50', '2020-12-25 21:12:50', NULL),
(3, 'M', 1, '2020-12-25 21:13:07', '2020-12-25 21:13:07', NULL),
(4, 'Blanc', 2, '2020-12-25 21:22:29', '2020-12-25 21:22:29', NULL),
(5, 'Noir', 2, '2020-12-25 21:22:37', '2020-12-25 21:22:37', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `caracteristique_values_produits`
--

CREATE TABLE `caracteristique_values_produits` (
  `id` int(11) NOT NULL,
  `caracteristique_value_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caracteristique_values_produits`
--

INSERT INTO `caracteristique_values_produits` (`id`, `caracteristique_value_id`, `produit_id`) VALUES
(1, 4, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created`, `modified`, `deleted`) VALUES
(1, 'basket', '2020-12-24 03:56:29', '0000-00-00 00:00:00', NULL),
(2, 'chaussures', '2020-12-24 04:46:45', '2020-12-24 04:59:30', '2020-12-24 04:59:30'),
(3, 'sandale', '2020-12-24 04:59:00', '2020-12-24 04:59:00', NULL),
(4, 'chaussure', '2020-12-24 05:00:50', '2020-12-24 05:03:12', '2020-12-24 05:03:12'),
(5, 'pantoufle', '2020-12-24 05:02:08', '2020-12-24 05:02:33', '2020-12-24 05:02:33'),
(6, 'chaussure', '2020-12-24 05:21:42', '2020-12-24 05:21:42', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `prenom`, `nom`, `email`, `created`, `modified`) VALUES
(2, 'Grégory', 'Van Ossel', 'gregovossel@gmail.com', '2020-12-29 02:04:04', '2020-12-31 02:04:04'),
(3, 'Grégory', 'Van Ossel', 'gregovossel@gmail.com', '2020-12-29 02:04:04', '2020-12-31 02:04:04');

-- --------------------------------------------------------

--
-- Structure de la table `commande_lignes`
--

CREATE TABLE `commande_lignes` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_lignes`
--

INSERT INTO `commande_lignes` (`id`, `commande_id`, `produit_id`, `quantite`) VALUES
(2, 2, 1, 2),
(3, 3, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20201208000712, 'Initial', '2020-12-07 23:07:13', '2020-12-07 23:07:13', 0),
(20201231002443, 'AddTableCommande', '2020-12-31 00:24:44', '2020-12-31 00:24:44', 0);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `file_dir` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `file_dir`, `file`, `alt`, `produit_id`, `created`, `modified`, `deleted`) VALUES
(1, 'air', 'air', 'air', 1, '2020-12-27 02:52:57', '2020-12-27 21:33:59', '2020-12-27 21:33:59'),
(2, '', 'basket.jpg', 'jaune', 1, '2020-12-27 03:57:37', '2020-12-27 21:34:05', '2020-12-27 21:34:05'),
(3, '', 'air.jpg', 'mauve', 1, '2020-12-27 04:07:59', '2020-12-27 21:33:52', '2020-12-27 21:33:52'),
(4, '', 'basket.jpg', 'basket', 1, '2020-12-27 21:31:56', '2020-12-27 21:34:10', '2020-12-27 21:34:10'),
(5, '', 'basket.jpg', 'jaune / orange', 1, '2020-12-27 21:34:37', '2020-12-27 21:50:18', '2020-12-27 21:50:18'),
(6, '', 'air.jpg', 'test', 1, '2020-12-27 21:46:26', '2020-12-27 21:50:24', '2020-12-27 21:50:24'),
(7, 'b319b2b5-801c-4208-b031-51b385fb037c', 'basket.jpg', 'thc', 1, '2020-12-27 21:49:54', '2020-12-27 21:50:13', '2020-12-27 21:50:13'),
(8, 'b0ab0135-21b1-47f0-bfb5-214b4404e8bf', 'basket.jpg', 'mauve', 1, '2020-12-27 21:50:41', '2020-12-27 22:00:20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(7,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `category_id`, `created`, `modified`, `deleted`) VALUES
(1, 'Air Max', 'Avec bulle d\'air dans la semelle.', '143.50', 1, '2020-12-26 11:12:48', '2020-12-26 15:54:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `prenom`, `nom`, `email`, `created`, `modified`, `deleted`) VALUES
(1, 'admin', 'admin', '$2y$10$earnqhGfemozXk4Y1QMSQu6PedexP7u.w9Zhf9maa4S/gav7b70BG', 'Prenom', 'Nom', 'admin@admin.be', '2020-12-08 01:45:10', '2020-12-08 01:45:10', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `caracteristique_values`
--
ALTER TABLE `caracteristique_values`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `caracteristique_values_produits`
--
ALTER TABLE `caracteristique_values_produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_lignes`
--
ALTER TABLE `commande_lignes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `caracteristique_values`
--
ALTER TABLE `caracteristique_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `caracteristique_values_produits`
--
ALTER TABLE `caracteristique_values_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande_lignes`
--
ALTER TABLE `commande_lignes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

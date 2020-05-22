-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 22 mai 2020 à 09:11
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Computer', '', NULL, NULL),
(2, 'phone', '', NULL, NULL),
(3, 'imprimante', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_07_091928_create_produits_table', 1),
(5, '2020_02_07_092156_create_categories_table', 1),
(6, '2020_02_07_092648_alter_produits_table', 1),
(7, '2020_02_07_092920_create_panniers_table', 1),
(8, '2020_02_07_093046_alter_panniers_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `panniers`
--

DROP TABLE IF EXISTS `panniers`;
CREATE TABLE IF NOT EXISTS `panniers` (
  `pannier_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `quantite` bigint(20) NOT NULL,
  `somme` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pannier_id`),
  KEY `panniers_user_id_foreign` (`user_id`),
  KEY `panniers_produit_id_foreign` (`produit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `panniers`
--

INSERT INTO `panniers` (`pannier_id`, `user_id`, `produit_id`, `quantite`, `somme`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 8, 96.00, '2020-05-21 22:01:06', '2020-05-21 22:01:06'),
(2, 2, 2, 5, 100000.00, '2020-05-21 22:01:09', '2020-05-21 22:01:09'),
(3, 2, 2, 4, 80000.00, '2020-05-21 22:01:15', '2020-05-21 22:01:15'),
(4, 2, 1, 3, 36.00, '2020-05-21 22:01:22', '2020-05-21 22:01:22');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(855) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(855) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produits_categorie_id_foreign` (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `image`, `prix`, `created_at`, `updated_at`, `categorie_id`) VALUES
(3, 'Je suis pas imprimante', 'Imprimante', '2020-05-221775537123.jpg', 1.00, '2020-05-21 22:02:43', '2020-05-21 22:02:43', 3),
(2, 'MACINTOSH :)', 'I9 1000 Go Ram 1000To SSD', '2020-05-221803365712.jpg', 20000.00, '2020-05-21 22:00:11', '2020-05-21 22:00:11', 1),
(4, 'Best phone', 'Best phone ever', '2020-05-22602361634.jpg', 1222.00, '2020-05-21 22:03:14', '2020-05-21 22:03:14', 2),
(5, 'Xiami mi3', 'Xiami 3 Go ram 64 Go', '2020-05-221366099712.jpg', 1111.00, '2020-05-21 22:03:48', '2020-05-21 22:03:48', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrateur` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `administrateur`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$CMG19YpJeXmAVsjpCMkb7OXGYKYsVPAS8wHeEuooJC91tFF7.Mhaa', 1, NULL, '2020-05-21 21:56:37', '2020-05-21 21:56:37'),
(2, 'client', 'client@gmail.com', NULL, '$2y$10$v1fAq0Uu8F4QV9K9.GwSB.SgmMjucgDJYcJMTvahslvBahYKrjMRu', 0, NULL, '2020-05-21 21:57:28', '2020-05-21 21:57:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

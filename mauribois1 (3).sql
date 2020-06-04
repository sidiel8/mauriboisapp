-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 juin 2020 à 18:31
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mauribois1`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quartier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendeur` int(11) NOT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `name`, `numero`, `email`, `quartier`, `vendeur`, `respo`, `created_at`, `updated_at`) VALUES
(1, 'client 1', 32659874, 'clint1@gmail.com', 'soukou', 22, 'sidi Elhaje', '2020-05-28 11:53:49', '2020-05-28 11:54:46'),
(3, 'Mourad', 36113117, NULL, 'F Nour', 9, 'Med Moubareck Lecouiry', '2020-05-28 13:58:28', '2020-05-28 13:58:28'),
(4, 'Dahmane', 36306211, NULL, 'T.v.z', 9, 'Med Moubareck Lecouiry', '2020-05-28 14:41:50', '2020-05-28 14:44:38'),
(17, 'Khaled', 37121313, NULL, 'Lksar', 2, 'sidi Elhaje', '2020-05-30 09:59:57', '2020-05-30 09:59:57'),
(19, 'sidi heybe', 32120542, NULL, 'soukouk', 9, 'Med Moubareck Lecouiry', '2020-06-01 11:00:50', '2020-06-02 15:21:45'),
(20, 'Habibe', 44445222, NULL, 'TVZ', 1, 'M\'barcka', '2020-06-01 11:04:35', '2020-06-01 11:04:35'),
(21, 'Med Abdellahi', 46732000, NULL, 'tvz', 9, 'Med Moubareck Lecouiry', '2020-06-01 11:20:54', '2020-06-01 11:20:54'),
(22, 'aichetou', 26184729, NULL, 'SAHERAWIO', 6, 'Brahim Ahmed', '2020-06-01 11:32:10', '2020-06-01 11:32:10'),
(23, 'GARMI', 36305311, NULL, 'ROUT NDB', 6, 'sidi Elhaje', '2020-06-01 11:33:47', '2020-06-02 09:20:37'),
(24, 'CHEIKHANI', 46666664, NULL, 'TVZ', 6, 'Brahim Ahmed', '2020-06-01 12:02:45', '2020-06-01 12:02:45'),
(25, 'Dah', 37555842, NULL, 'TVZ', 3, 'Hindou Cheikh Lehbib', '2020-06-01 12:08:19', '2020-06-01 12:08:19'),
(27, 'egueine', 44105555, 'egueine121@gmail.com', 'soukouk', 5, 'M\'barcka', '2020-06-01 12:47:23', '2020-06-01 12:47:23'),
(28, 'Mariem Naji', 43300107, NULL, 'tvz', 1, 'M\'barcka', '2020-06-01 13:21:38', '2020-06-01 13:21:38'),
(29, 'Mohamed Lgudaf', 32048389, NULL, 'Haye najahe', 7, 'M\'barcka', '2020-06-01 13:44:16', '2020-06-01 13:44:16'),
(30, 'Aicha karachi', 43832424, NULL, 'TVZ', 1, 'M\'barcka', '2020-06-01 13:54:17', '2020-06-01 13:54:17'),
(31, 'Ahmed Salem', 36304611, NULL, 'Soukouk', 5, 'M\'barcka', '2020-06-01 13:55:11', '2020-06-01 13:55:58'),
(32, 'Eminou', 36535393, NULL, 'SNDE', 5, 'M\'barcka', '2020-06-01 15:50:42', '2020-06-01 15:50:42'),
(34, 'mareim', 36265414, NULL, 'tvz', 6, 'Brahim Ahmed', '2020-06-01 16:48:44', '2020-06-01 16:48:44'),
(35, 'Brahim', 27818521, NULL, 'Centre Emetteur', 7, 'Ely Cheikh Sabar', '2020-06-02 09:18:02', '2020-06-02 09:18:02'),
(36, 'Fatimetou', 26411428, NULL, 'TVZ', 9, 'Med Moubareck Lecouiry', '2020-06-02 09:21:18', '2020-06-02 09:21:18'),
(37, 'Aicha maaloum', 46197524, NULL, 'F NOR', 7, 'Ely Cheikh Sabar', '2020-06-02 10:10:57', '2020-06-02 10:10:57'),
(38, 'Sy Moussa', 46527702, NULL, 'A cote de Bazep', 1, 'Ghali Ijeffa', '2020-06-02 11:54:05', '2020-06-02 11:54:05'),
(39, 'Madame Macire', 36688239, NULL, 'Ilotk extension', 7, 'Ely Cheikh Sabar', '2020-06-02 11:59:34', '2020-06-02 11:59:34'),
(40, 'Moyta', 44440202, NULL, 'A cote de MB', 7, 'Ely Cheikh Sabar', '2020-06-02 13:09:56', '2020-06-02 13:09:56'),
(41, 'brahim', 36317557, NULL, 'TVZ', 3, 'Hindou Cheikh Lehbib', '2020-06-02 13:22:01', '2020-06-02 13:22:01'),
(42, 'DAH', 36301838, NULL, 'SAHERAWIO', 6, 'Brahim Ahmed', '2020-06-02 13:27:50', '2020-06-02 13:27:50'),
(43, 'Ahmed Salem Blal', 36306128, NULL, 'TVZ', 1, 'M\'barcka', '2020-06-02 14:00:59', '2020-06-02 14:00:59'),
(44, 'keti', 38300230, NULL, 'Elvowz', 6, 'M\'barcka', '2020-06-02 14:28:58', '2020-06-02 14:28:58'),
(48, 'Ely Med Saleck', 36106060, NULL, 'Tvz', 7, 'Ely Cheikh Sabar', '2020-06-02 15:08:55', '2020-06-02 15:08:55'),
(49, 'Mariem', 49500969, NULL, 'A cote de MB', 7, 'Ely Cheikh Sabar', '2020-06-02 15:22:32', '2020-06-02 15:22:32'),
(50, 'Mariem Diallo', 47310561, NULL, 'Centre Emetteur', 7, 'Ely Cheikh Sabar', '2020-06-02 15:44:55', '2020-06-02 15:45:21'),
(51, 'Ahmedou', 22432928, NULL, 'Atac1', 7, 'Ely Cheikh Sabar', '2020-06-02 15:46:57', '2020-06-02 15:46:57'),
(52, '49488900Besma', 49488900, NULL, 'Soukouk', 7, 'Ely Cheikh Sabar', '2020-06-02 15:48:45', '2020-06-02 15:48:45'),
(53, 'Oum Lvadli', 26622406, NULL, 'Boutig keskes', 1, 'M\'barcka', '2020-06-02 16:21:32', '2020-06-02 16:21:32'),
(54, 'HOUDA', 22407076, NULL, 'BIG Mareket', 9, 'Med Moubareck Lecouiry', '2020-06-02 16:48:00', '2020-06-02 16:48:00'),
(55, 'Jedou khatri', 49555516, NULL, 'TVZ', 6, 'M\'barcka', '2020-06-02 17:00:18', '2020-06-02 17:00:18'),
(56, 'cheikh', 36352520, NULL, 'TVZ', 9, 'Med Moubareck Lecouiry', '2020-06-03 08:47:29', '2020-06-03 08:47:29'),
(57, 'FATIMETOU', 42741414, NULL, 'ELMECHROU2', 9, 'Med Moubareck Lecouiry', '2020-06-03 11:50:54', '2020-06-03 11:50:54'),
(58, 'Ghassem', 20607930, NULL, 'Saherawio', 6, 'Brahim Ahmed', '2020-06-03 12:09:37', '2020-06-03 12:09:37'),
(59, 'Didi', 48006341, NULL, 'A cote MB', 7, 'Ely Cheikh Sabar', '2020-06-03 14:01:37', '2020-06-03 14:01:37'),
(60, 'Antar Benzer', 36616943, 'antarbenzar@hotmail.fr', 'nkt', 7, 'Ely Cheikh Sabar', '2020-06-03 14:34:01', '2020-06-03 14:34:01'),
(61, 'Vatimttou', 41276354, NULL, 'tvz', 1, 'Ghali Ijeffa', '2020-06-03 14:43:35', '2020-06-03 14:43:35'),
(62, 'aichetou', 27893564, NULL, 'tvz', 3, 'Hindou Cheikh Lehbib', '2020-06-03 15:30:46', '2020-06-03 15:30:46'),
(63, 'Abderhman', 32838383, NULL, 'tvz', 3, 'Hindou Cheikh Lehbib', '2020-06-03 15:31:41', '2020-06-03 15:31:41');

-- --------------------------------------------------------

--
-- Structure de la table `confirmations`
--

CREATE TABLE `confirmations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mesure_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `confirmations`
--

INSERT INTO `confirmations` (`id`, `mesure_id`, `created_at`, `updated_at`, `respo`) VALUES
(1, 3, '2020-05-28 11:57:16', '2020-05-28 11:57:16', 'sidi Elhaje'),
(4, 10, '2020-05-30 10:00:16', '2020-05-30 10:00:16', 'sidi Elhaje'),
(5, 3, '2020-05-30 10:12:58', '2020-05-30 10:12:58', 'M\'barcka'),
(15, 33, '2020-06-01 15:52:24', '2020-06-01 15:52:24', 'M\'barcka'),
(16, 15, '2020-06-01 15:53:35', '2020-06-01 15:53:35', 'M\'barcka'),
(17, 16, '2020-06-01 15:53:40', '2020-06-01 15:53:40', 'M\'barcka'),
(18, 17, '2020-06-01 15:54:07', '2020-06-01 15:54:07', 'M\'barcka'),
(19, 18, '2020-06-01 15:54:11', '2020-06-01 15:54:11', 'M\'barcka'),
(20, 32, '2020-06-01 16:05:22', '2020-06-01 16:05:22', 'M\'barcka'),
(21, 39, '2020-06-02 09:23:05', '2020-06-02 09:23:05', 'M\'barcka'),
(22, 38, '2020-06-02 09:23:08', '2020-06-02 09:23:08', 'M\'barcka'),
(23, 37, '2020-06-02 09:23:12', '2020-06-02 09:23:12', 'M\'barcka'),
(24, 19, '2020-06-02 11:05:53', '2020-06-02 11:05:53', 'M\'barcka'),
(25, 21, '2020-06-02 11:06:31', '2020-06-02 11:06:31', 'M\'barcka'),
(26, 24, '2020-06-02 16:11:59', '2020-06-02 16:11:59', 'M\'barcka'),
(27, 27, '2020-06-02 16:15:31', '2020-06-02 16:15:31', 'M\'barcka'),
(28, 34, '2020-06-02 16:15:57', '2020-06-02 16:15:57', 'M\'barcka'),
(29, 29, '2020-06-02 16:17:10', '2020-06-02 16:17:10', 'M\'barcka'),
(30, 36, '2020-06-02 16:17:27', '2020-06-02 16:17:27', 'M\'barcka'),
(31, 40, '2020-06-02 16:18:46', '2020-06-02 16:18:46', 'M\'barcka'),
(32, 57, '2020-06-03 08:55:29', '2020-06-03 08:55:29', 'M\'barcka'),
(33, 41, '2020-06-03 15:46:34', '2020-06-03 15:46:34', 'M\'barcka'),
(34, 43, '2020-06-03 15:46:54', '2020-06-03 15:46:54', 'M\'barcka'),
(35, 46, '2020-06-03 15:47:21', '2020-06-03 15:47:21', 'M\'barcka'),
(36, 52, '2020-06-03 15:48:22', '2020-06-03 15:48:22', 'M\'barcka');

-- --------------------------------------------------------

--
-- Structure de la table `croquis`
--

CREATE TABLE `croquis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mesure_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `designer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `croquis`
--

INSERT INTO `croquis` (`id`, `filename`, `filext`, `designation`, `mesure_id`, `client_id`, `designer`, `created_at`, `updated_at`, `respo`) VALUES
(22, '38_Brahim_1591090288.pdf', 'pdf', 'croquis teowin numero 01107', 38, 35, 'Teowin', '2020-06-02 09:31:28', '2020-06-02 09:31:28', 'M\'barcka'),
(23, '15_sidi heybe_1591100299.jpeg', 'jpeg', 'mesure par dasio. \ncroqui par martin', 15, 19, 'Martin', '2020-06-02 12:18:19', '2020-06-02 12:18:19', 'M\'barcka'),
(24, '15_sidi heybe_1591100403.pdf', 'pdf', NULL, 15, 19, 'Martin', '2020-06-02 12:20:03', '2020-06-02 12:20:03', 'M\'barcka'),
(25, '16_sidi heybe_1591101582.pdf', 'pdf', NULL, 16, 19, 'Martin', '2020-06-02 12:39:42', '2020-06-02 12:39:42', 'M\'barcka'),
(26, '57_cheikh_1591174922.pdf', 'pdf', NULL, 57, 56, 'Dacio', '2020-06-03 09:02:02', '2020-06-03 09:02:02', 'M\'barcka');

-- --------------------------------------------------------

--
-- Structure de la table `decharges`
--

CREATE TABLE `decharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_facture` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `vendeur` int(11) NOT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_devis` int(11) NOT NULL,
  `montant_devis` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `numero_facture` int(11) DEFAULT NULL,
  `date_facturation` date DEFAULT NULL,
  `date_decharge` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id`, `numero_devis`, `montant_devis`, `client_id`, `user_id`, `numero_facture`, `date_facturation`, `date_decharge`, `created_at`, `updated_at`, `respo`) VALUES
(4, 16216, 58572, 4, 9, NULL, NULL, NULL, '2020-05-28 14:43:22', '2020-05-28 14:43:22', 'Med Moubareck Lecouiry'),
(35, 16318, 430500, 21, 9, NULL, NULL, NULL, '2020-06-01 11:21:58', '2020-06-01 11:21:58', 'Med Moubareck Lecouiry'),
(36, 16319, 279000, 21, 3, NULL, NULL, NULL, '2020-06-01 11:22:39', '2020-06-01 11:22:39', 'Med Moubareck Lecouiry'),
(38, 16357, 217193, 36, 9, NULL, NULL, NULL, '2020-06-02 09:21:51', '2020-06-02 09:21:51', 'Med Moubareck Lecouiry'),
(39, 16353, 32000, 23, 6, 2411, '2020-06-02', NULL, '2020-06-02 12:38:58', '2020-06-03 09:22:12', 'Brahim Ahmed'),
(41, 16375, 97614, 19, 9, NULL, NULL, NULL, '2020-06-02 15:22:10', '2020-06-02 15:22:10', 'Med Moubareck Lecouiry'),
(42, 16351, 29384, 56, 9, 2428, '2020-06-03', NULL, '2020-06-03 08:48:37', '2020-06-03 08:50:29', 'Med Moubareck Lecouiry'),
(43, 16410, 20100, 42, 6, NULL, NULL, NULL, '2020-06-03 16:01:53', '2020-06-03 16:01:53', 'Brahim Ahmed');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_facture` int(11) NOT NULL,
  `montant_facture` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `numero_devis` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `mesures`
--

INSERT INTO `mesures` (`id`, `type`, `client_id`, `respo`, `created_at`, `updated_at`) VALUES
(3, 'decoration', 1, 'sidi Elhaje', '2020-05-28 11:54:01', '2020-05-28 11:54:01'),
(10, 'cuisines', 17, 'sidi Elhaje', '2020-05-30 10:00:08', '2020-05-30 10:00:08'),
(15, 'cuisines', 19, 'M\'barcka', '2020-06-01 11:01:24', '2020-06-01 11:01:24'),
(16, 'cadre de paasgage', 19, 'M\'barcka', '2020-06-01 11:03:48', '2020-06-01 11:03:48'),
(17, 'cuisines', 20, 'M\'barcka', '2020-06-01 11:04:56', '2020-06-01 11:04:56'),
(18, 'chambre a coucher', 20, 'M\'barcka', '2020-06-01 11:04:59', '2020-06-01 11:04:59'),
(19, 'portes', 22, 'Brahim Ahmed', '2020-06-01 11:35:50', '2020-06-01 11:35:50'),
(21, 'fenetres', 25, 'Hindou Cheikh Lehbib', '2020-06-01 12:12:53', '2020-06-01 12:12:53'),
(24, 'dressing', 27, 'M\'barcka', '2020-06-01 12:57:29', '2020-06-01 12:57:29'),
(27, 'cuisines', 28, 'M\'barcka', '2020-06-01 13:21:58', '2020-06-01 13:21:58'),
(29, 'cuisines', 31, 'M\'barcka', '2020-06-01 13:55:21', '2020-06-01 13:55:21'),
(32, 'parquet', 23, 'Brahim Ahmed', '2020-06-01 14:34:19', '2020-06-01 14:34:19'),
(33, 'portes', 32, 'M\'barcka', '2020-06-01 15:51:56', '2020-06-01 15:51:56'),
(34, 'cuisines', 29, 'M\'barcka', '2020-06-01 16:35:39', '2020-06-01 16:35:39'),
(36, 'cuisines', 34, 'Brahim Ahmed', '2020-06-01 16:48:59', '2020-06-01 16:48:59'),
(37, 'portes', 35, 'Ely Cheikh Sabar', '2020-06-02 09:18:27', '2020-06-02 09:18:27'),
(38, 'cuisines', 35, 'Ely Cheikh Sabar', '2020-06-02 09:18:47', '2020-06-02 09:18:47'),
(39, 'fenetres', 35, 'Ely Cheikh Sabar', '2020-06-02 09:19:02', '2020-06-02 09:19:02'),
(40, 'cuisines', 37, 'Ely Cheikh Sabar', '2020-06-02 10:11:11', '2020-06-02 10:11:11'),
(41, 'parquet', 38, 'Ghali Ijeffa', '2020-06-02 11:54:20', '2020-06-02 11:54:20'),
(42, 'cuisines', 39, 'Ely Cheikh Sabar', '2020-06-02 11:59:49', '2020-06-02 11:59:49'),
(43, 'chambre a coucher', 40, 'Ely Cheikh Sabar', '2020-06-02 13:10:31', '2020-06-02 13:10:31'),
(45, 'Portes PVC ou Al', 41, 'Hindou Cheikh Lehbib', '2020-06-02 13:22:49', '2020-06-02 13:22:49'),
(46, 'cadre de passage', 42, 'Brahim Ahmed', '2020-06-02 13:28:13', '2020-06-02 13:28:13'),
(47, 'autres', 43, 'M\'barcka', '2020-06-02 14:01:09', '2020-06-02 14:01:09'),
(48, 'cuisines', 44, 'M\'barcka', '2020-06-02 14:29:14', '2020-06-02 14:29:14'),
(50, 'dressing', 48, 'Ely Cheikh Sabar', '2020-06-02 15:09:10', '2020-06-02 15:09:10'),
(51, 'portes', 49, 'Ely Cheikh Sabar', '2020-06-02 15:22:44', '2020-06-02 15:22:44'),
(52, 'cuisines', 53, 'M\'barcka', '2020-06-02 16:21:55', '2020-06-02 16:21:55'),
(54, 'cuisines', 55, 'M\'barcka', '2020-06-02 17:01:14', '2020-06-02 17:01:14'),
(55, 'pergola', 55, 'M\'barcka', '2020-06-02 17:01:44', '2020-06-02 17:01:44'),
(57, 'meuble TV', 56, 'Med Moubareck Lecouiry', '2020-06-03 08:51:50', '2020-06-03 08:51:50'),
(59, 'portes', 57, 'Med Moubareck Lecouiry', '2020-06-03 11:51:07', '2020-06-03 11:51:07'),
(60, 'portes', 58, 'Brahim Ahmed', '2020-06-03 12:09:54', '2020-06-03 12:09:54'),
(61, 'escalier bois', 61, 'Ghali Ijeffa', '2020-06-03 14:44:25', '2020-06-03 14:44:25'),
(62, 'fenetres', 62, 'Hindou Cheikh Lehbib', '2020-06-03 15:31:02', '2020-06-03 15:31:02'),
(63, 'fenetres', 63, 'Hindou Cheikh Lehbib', '2020-06-03 15:31:51', '2020-06-03 15:31:51');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_tests_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_04_12_190921_create_clients_table', 1),
(6, '2020_04_13_212456_create_roles_table', 1),
(7, '2020_04_13_212817_create_role_user_table', 1),
(8, '2020_04_16_150746_create_mesures_table', 1),
(9, '2020_04_16_151540_create_devis_table', 1),
(10, '2020_04_16_151635_create_factures_table', 1),
(11, '2020_04_16_152325_create_qroquis_table', 1),
(12, '2020_04_29_094237_create_confirmations_table', 1),
(13, '2020_04_30_002355_create_reclamations_table', 1),
(14, '2020_05_04_161124_create_decharges_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

CREATE TABLE `reclamations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_reparation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`id`, `name`, `numero`, `type`, `category`, `date_reparation`, `created_at`, `updated_at`, `respo`) VALUES
(1, 'Menah', 36670808, 'store manuelle', 'PVC', NULL, '2020-05-30 16:39:36', '2020-05-30 16:39:36', 'sidi Elhaje');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-05-29 07:32:45', '2020-05-29 07:32:45'),
(2, 'user', '2020-05-29 07:32:45', '2020-05-29 07:32:45'),
(3, 'actiu', '2020-05-30 09:18:20', '2020-05-30 09:18:20');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 2, 7, NULL, NULL),
(9, 2, 8, NULL, NULL),
(11, 3, 9, '2020-05-30 09:19:26', '2020-05-30 09:19:26'),
(12, 2, 10, NULL, NULL),
(13, 1, 2, NULL, NULL),
(14, 2, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `nv`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sidi Elhaje', '0', 47485279, '$2y$10$N6iRVSl4CRpK63O/nDlD4eyXCkgFg1mZv840E1/6.M9pYvHD1/ZKG', NULL, '2020-05-29 07:32:46', '2020-05-29 07:32:46'),
(2, 'M\'barcka', '22', 49555513, '$2y$10$h2WhmjvyTO1xZBdKwcM4a.r/QhAX4fj3CO9Fy9WQCNMoqy50kDo7a', NULL, '2020-05-29 07:32:46', '2020-05-29 07:32:46'),
(3, 'Brahim Ahmed', '06', 49555516, '$2y$10$lJtdQqFAM5WyrWGbSKKRVes/1KAC34E/a.Xn/9s5F.U704ZtEADOG', NULL, '2020-05-29 07:55:12', '2020-05-29 07:55:12'),
(4, 'Ely Cheikh Sabar', '07', 49555511, '$2y$10$HAMV9VxF04X2tl.2wU3VXOQFufKyq4TosmJWgt3jP3Z/HFe620J8i', NULL, '2020-05-29 07:55:49', '2020-05-29 07:55:49'),
(5, 'Ghali Ijeffa', '01', 31325579, '$2y$10$Ekwoqa41G6QAFhDJKzlj4OoRcDZ255S3/hl6UV8FPUYOJGom0WJF6', NULL, '2020-05-29 07:56:37', '2020-05-29 07:56:37'),
(6, 'Hindou Cheikh Lehbib', '03', 36292989, '$2y$10$9bKZnGFg1e8hcwMYZkv9POXXVJchTfMVd8YvnIuZBsv.U0o6nXkR6', NULL, '2020-05-29 07:57:41', '2020-05-29 07:57:41'),
(7, 'Med Moubareck Lecouiry', '09', 49555582, '$2y$10$KHvxCG2ZEVP1CbYUYyn.0ukFPKi0wU/xQ4/800BUsvrO.ow.gsZ4m', NULL, '2020-05-29 07:58:53', '2020-05-29 07:58:53'),
(8, 'Deddah', '05', 36111160, '$2y$10$IsNIh/BqMss0ghEBJWybW.BJvi9ipwUbLdUjBHCEt01caNFxLNW5O', NULL, '2020-05-29 08:34:10', '2020-05-29 08:34:10'),
(9, 'Client_Divers', '14', 49555578, '$2y$10$clMhdqb0JYHTlzS.pwiBxOoA/54ZrU992nqWPD1mqRM3ZX0ZTC3v.', NULL, '2020-05-29 11:08:09', '2020-05-29 11:08:09'),
(10, 'Yacoub Ahmedou', '02', 49555512, '$2y$10$ksnkOKdJjZSG.dzPB7R4EeMdb6byfPTRjZ6njXoUw9inrJkY3gE9i', NULL, '2020-05-30 09:57:39', '2020-05-30 09:57:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `confirmations`
--
ALTER TABLE `confirmations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `croquis`
--
ALTER TABLE `croquis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `decharges`
--
ALTER TABLE `decharges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_nv_unique` (`nv`),
  ADD UNIQUE KEY `tests_phone_unique` (`phone`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nv_unique` (`nv`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `croquis`
--
ALTER TABLE `croquis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `decharges`
--
ALTER TABLE `decharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

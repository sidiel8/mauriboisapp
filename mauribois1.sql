-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 mai 2020 à 18:38
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
(1, 'client 1', 32659874, 'clint1@gmail.com', 'soukou', 100, 'sidi Elhaje', '2020-05-28 11:53:49', '2020-05-28 11:54:46'),
(2, 'med', 22030340, NULL, 'Carrafour SNDE', 9, 'Med Moubareck Lecouiry', '2020-05-28 13:38:54', '2020-05-28 13:38:54'),
(3, 'Mourad', 36113117, NULL, 'F Nour', 9, 'Med Moubareck Lecouiry', '2020-05-28 13:58:28', '2020-05-28 13:58:28'),
(4, 'Dahmane', 36306211, NULL, 'T.v.z', 9, 'Med Moubareck Lecouiry', '2020-05-28 14:41:50', '2020-05-28 14:44:38');

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
(1, 3, '2020-05-28 11:57:16', '2020-05-28 11:57:16', 'sidi Elhaje');

-- --------------------------------------------------------

--
-- Structure de la table `croquis`
--

CREATE TABLE `croquis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
(1, '3_1_1590748563.jpg', 'jpg', 'designation ', 3, 1, 'Martin', '2020-05-29 08:36:03', '2020-05-29 08:36:03', 'sidi Elhaje'),
(4, '8_1_1590761964.jpg', 'jpg', 'designation ', 8, 1, 'Martin', '2020-05-29 12:19:24', '2020-05-29 12:19:24', 'sidi Elhaje');

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
(1, 2154, 6455878, 1, 100, 65321, '2020-05-28', NULL, '2020-05-28 11:54:14', '2020-05-28 11:54:28', 'sidi Elhaje'),
(2, 542, 215487, 1, 100, 6523, '2020-05-29', NULL, '2020-05-28 11:54:36', '2020-05-29 12:18:06', 'sidi Elhaje'),
(3, 16236, 14850, 2, 9, 2350, '2020-05-28', NULL, '2020-05-28 13:40:50', '2020-05-28 13:41:21', 'Med Moubareck Lecouiry'),
(4, 16216, 58572, 4, 9, NULL, NULL, NULL, '2020-05-28 14:43:22', '2020-05-28 14:43:22', 'Med Moubareck Lecouiry');

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
(6, 'portes', 3, 'Med Moubareck Lecouiry', '2020-05-28 13:58:48', '2020-05-28 13:58:48');

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
(2, 'user', '2020-05-29 07:32:45', '2020-05-29 07:32:45');

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
(8, 1, 2, NULL, NULL),
(9, 2, 8, NULL, NULL),
(10, 2, 9, NULL, NULL);

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
(9, 'Client_Divers', '14', 49555578, '$2y$10$clMhdqb0JYHTlzS.pwiBxOoA/54ZrU992nqWPD1mqRM3ZX0ZTC3v.', NULL, '2020-05-29 11:08:09', '2020-05-29 11:08:09');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `croquis`
--
ALTER TABLE `croquis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `decharges`
--
ALTER TABLE `decharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

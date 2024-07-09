-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 juil. 2024 à 15:56
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sysgms`
--

-- --------------------------------------------------------

--
-- Structure de la table `assures`
--

DROP TABLE IF EXISTS `assures`;
CREATE TABLE IF NOT EXISTS `assures` (
  `idAssure` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomAssure` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenomAssure` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateNaissanceAssure` date DEFAULT NULL,
  `sexeAssure` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephoneAssure` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresseAssure` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statutAssure` smallint DEFAULT NULL,
  `photoAssure` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAssure`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `details_prestations`
--

DROP TABLE IF EXISTS `details_prestations`;
CREATE TABLE IF NOT EXISTS `details_prestations` (
  `idPrestationSupporte` int NOT NULL,
  `idFiche` int NOT NULL,
  `coutTotal` decimal(8,2) DEFAULT NULL,
  `partMutuelle` decimal(8,2) DEFAULT NULL,
  `partMutuelleReel` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPrestationSupporte`,`idFiche`),
  KEY `details_prestations_idfiche_foreign` (`idFiche`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiches_prestations`
--

DROP TABLE IF EXISTS `fiches_prestations`;
CREATE TABLE IF NOT EXISTS `fiches_prestations` (
  `idFiche` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idAssure` int NOT NULL,
  `idPaiement` int NOT NULL,
  `datePrestation` date DEFAULT NULL,
  `montantFacturePrestation` decimal(8,2) DEFAULT NULL,
  `montantReelPrestation` decimal(8,2) DEFAULT NULL,
  `dossierPrestation` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idFiche`),
  KEY `fiches_prestations_idassure_foreign` (`idAssure`),
  KEY `fiches_prestations_idpaiement_foreign` (`idPaiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_09_135940_create_assures_table', 1),
(6, '2024_07_09_140000_create_details_prestations_table', 1),
(7, '2024_07_09_140018_create_fiches_prestations_table', 1),
(8, '2024_07_09_140028_create_mutualistes_table', 1),
(9, '2024_07_09_140035_create_paiements_table', 1),
(10, '2024_07_09_140045_create_personnes_a_charge_table', 1),
(11, '2024_07_09_140056_create_prestataires_table', 1),
(12, '2024_07_09_140109_create_prestations_disponibles_table', 1),
(13, '2024_07_09_140116_create_prestations_supportes_table', 1),
(14, '2024_07_09_140126_create_roles_table', 1),
(15, '2024_07_09_140127_create_users_table', 1),
(16, '2024_07_09_154930_add_foreign_keys_to_details_prestations_table', 1),
(17, '2024_07_09_154944_add_foreign_keys_to_fiches_prestations_table', 1),
(18, '2024_07_09_154952_add_foreign_keys_to_mutualistes_table', 1),
(19, '2024_07_09_155008_add_foreign_keys_to_paiements_table', 1),
(20, '2024_07_09_155025_add_foreign_keys_to_personnes_a_charge_table', 1),
(21, '2024_07_09_155037_add_foreign_keys_to_prestations_disponibles_table', 1),
(22, '2024_07_09_155045_add_foreign_keys_to_utilisateurs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mutualistes`
--

DROP TABLE IF EXISTS `mutualistes`;
CREATE TABLE IF NOT EXISTS `mutualistes` (
  `idAssure` int NOT NULL,
  `idMutualiste` int NOT NULL,
  `matriculeMutualiste` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorieMutualiste` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceMutualiste` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonctionMutualiste` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depensesSante` decimal(8,2) DEFAULT '0.00',
  `documentMutualiste` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAssure`,`idMutualiste`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
CREATE TABLE IF NOT EXISTS `paiements` (
  `idPaiement` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idPrestataire` int NOT NULL,
  `dateReceptionFacture` date DEFAULT NULL,
  `montantTotalFacture` decimal(8,2) DEFAULT NULL,
  `montantTotalReel` decimal(8,2) DEFAULT NULL,
  `factureRecue` blob,
  `statutPaiement` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPaiement`),
  KEY `paiements_idprestataire_foreign` (`idPrestataire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes_a_charge`
--

DROP TABLE IF EXISTS `personnes_a_charge`;
CREATE TABLE IF NOT EXISTS `personnes_a_charge` (
  `idAssure` int NOT NULL,
  `idPAC` int NOT NULL,
  `Mut_idAssure` int NOT NULL,
  `idMutualiste` int NOT NULL,
  `affilliationPAC` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentAffiliationPAC` blob,
  `certificatScolarite` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAssure`,`idPAC`),
  KEY `personnes_a_charge_mut_idassure_idmutualiste_foreign` (`Mut_idAssure`,`idMutualiste`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

DROP TABLE IF EXISTS `prestataires`;
CREATE TABLE IF NOT EXISTS `prestataires` (
  `idPrestataire` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomPrestataire` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephonePrestataire` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adressePrestataire` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logoPrestataire` blob,
  `conventionPrestataire` blob,
  `categoriePrestataire` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statutPrestataire` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPrestataire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestations_disponibles`
--

DROP TABLE IF EXISTS `prestations_disponibles`;
CREATE TABLE IF NOT EXISTS `prestations_disponibles` (
  `idPrestationDisponible` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idPrestataire` int NOT NULL,
  `nomPrestationDisponible` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coutPrestationDisponible` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPrestationDisponible`),
  KEY `prestations_disponibles_idprestataire_foreign` (`idPrestataire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestations_supportes`
--

DROP TABLE IF EXISTS `prestations_supportes`;
CREATE TABLE IF NOT EXISTS `prestations_supportes` (
  `idPrestationSupporte` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomPrestationSupporte` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plafondPrestationSupporte` decimal(8,2) DEFAULT NULL,
  `tauxPrestationSupporte` decimal(8,2) DEFAULT NULL,
  `observationPrestationSupporte` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPrestationSupporte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionRole` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUtilisateur` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idRole` int NOT NULL,
  `nomUtilisateur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomUtilisateur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statutUtilisateur` smallint DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_idrole_foreign` (`idRole`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

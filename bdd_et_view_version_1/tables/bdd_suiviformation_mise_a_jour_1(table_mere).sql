CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`role_name`, `created_at`, `updated_at`) VALUES
('admin', '2021-10-26 05:45:24', '2021-10-26 05:45:24'),
('referent', '2021-10-26 05:45:24', '2021-10-26 05:45:24'),
('stagiaire', '2021-10-26 05:45:24', '2021-10-26 05:45:24'),
('formateur', '2021-10-26 05:45:24', '2021-10-26 05:45:24'),
('manager', '2021-11-08 05:47:18', '2021-11-08 05:47:18'),
('SuperAdmin', '2021-11-10 02:59:59', '2021-11-10 02:59:59'),
('CFP', '2021-11-22 09:27:38', '2021-11-22 09:27:38');


CREATE TABLE `niveaux` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `niveau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `niveaux` (`id`,`niveau`, `created_at`, `updated_at`) VALUES
(1,'débutant',NOW(),NOW()),
(2,'intermédiaire',NOW(),NOW()),
(3,'avancé',NOW(),NOW());

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pourcent` decimal(5,2) DEFAULT NULL CHECK (`pourcent` >= 0),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `taxes` (`description`, `pourcent`, `created_at`, `updated_at`) VALUES
('TVA', '20.00', '2021-11-23 06:55:50', '2021-11-23 06:55:50'),
('Hors Taxe', '0.00', '2021-11-23 06:55:50', '2021-11-23 06:55:50');

CREATE TABLE `type_payement` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `type_payement` (`type`, `created_at`, `updated_at`) VALUES
('FP', NULL, NULL),
('FMFP', NULL, NULL);

CREATE TABLE `offre_gratuits` (
     `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
     `limite` INT,
    `type_abonne_id` bigint(20) UNSIGNED NOT NULL REFERENCES type_abonnes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `offre_gratuits` (`limite`, `type_abonne_id`) VALUES
(5, 1),
(2, 2);

CREATE TABLE `type_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `type_abonnements` (`id`, `nom_type`, `logo`, `created_at`, `updated_at`) VALUES
(51, 'Premium', 'Premium.png', '2021-11-29 02:54:23', '2021-11-29 02:54:23');

CREATE TABLE `mode_financements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `mode_financements` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Virement banquaire', NULL, NULL),
(2, 'Chèque', NULL, NULL),
(3, 'Espece', NULL, NULL);


CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Nicole', 'contact@formation.mg', NULL, '$2y$10$9i0uUmJpIwVtYX1dlEdM5.bNcYXU8CrD8QXDS5loPVAurII6BmbFm', NULL, '2021-08-04 05:53:44', '2021-08-04 05:53:44', 6);


CREATE TABLE `type_abonnes` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `abonne_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `type_abonnes` (`id`, `abonne_name`, `created_at`, `updated_at`) VALUES
(1, 'entreprises', '2021-11-23 09:06:31', '2021-11-23 09:06:31'),
(2, 'cfps', '2021-11-23 09:06:31', '2021-11-23 09:06:31');

CREATE TABLE `type_abonnement_roles` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_abonne_id` bigint(20) UNSIGNED NOT NULL REFERENCES type_abonnes(id) ON DELETE CASCADE,
  `type_abonnement_id` bigint(20) UNSIGNED NOT NULL REFERENCES type_abonnements(id) ON DELETE CASCADE,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `categorie_paiements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categorie_paiements` (`id`, `categorie`, `created_at`, `updated_at`) VALUES
(1, 'Mensuel', '2021-11-25 05:37:35', '2021-11-25 05:37:35'),
(2, 'Annuel', '2021-11-25 05:37:35', '2021-11-25 05:37:35');

CREATE TABLE `tarif_categories` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_abonnement_role_id` bigint(20) UNSIGNED NOT NULL REFERENCES type_abonnement_roles(id) ON DELETE CASCADE,
  `categorie_paiement_id` bigint(20) UNSIGNED NOT NULL REFERENCES categorie_paiements(id) ON DELETE CASCADE,
  `tarif` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE cfps (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_lot varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_quartier varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_code_postal varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_ville varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_region varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  telephone varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  domaine_de_formation varchar(255) COLLATE utf8mb4_unicode_ci,
  nif varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'XXXXXXXXXXXXX',
  stat varchar(191) COLLATE utf8mb4_unicode_ci   DEFAULT 'XXXXXXXXXXXXX',
  rcs varchar(191) COLLATE utf8mb4_unicode_ci   DEFAULT 'XXXXXXXXXXXXX',
  cif varchar(191) COLLATE utf8mb4_unicode_ci  DEFAULT 'XXXXXXXXXXXXX',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  logo varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  activiter boolean not null default true,
  site_cfp varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  user_id bigint(20) UNSIGNED NOT NULL REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `abonnement_cfps` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `date_demande` date NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `mode_paiement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_abonnement_role_id` bigint(20) UNSIGNED NOT NULL REFERENCES type_abonnement_roles(id) ON DELETE CASCADE,
  `cfp_id` bigint(20) UNSIGNED NOT NULL  REFERENCES cfps(id) ON DELETE CASCADE,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categorie_paiement_id` bigint(20) UNSIGNED NOT NULL REFERENCES categorie_paiements(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE responsables_cfp(
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  prenom_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci,
  sexe_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  date_naissance_resp_cfp date NOT NULL,
  cin_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  email_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  telephone_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  fonction_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_lot varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_quartier varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_code_postal varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_ville varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  adresse_region varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  photos_resp_cfp varchar(255) COLLATE utf8mb4_unicode_ci,
  cfp_id bigint(20) UNSIGNED NOT NULL REFERENCES cfps(id) ON DELETE CASCADE,
  user_id bigint(20) UNSIGNED NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  activiter boolean not null default true,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

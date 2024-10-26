-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 20 oct. 2024 à 17:50
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arcadia-ecf`
--


CREATE DATABASE `arcadia-ecf`;
-- --------------------------------------------------------
USE `arcadia-ecf`;
--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `breed_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `living_id` int(11) DEFAULT NULL,
  `consultation` int(11) NOT NULL,
  `consultation_ip` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`consultation_ip`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `breed_id`, `name`, `img`, `living_id`, `consultation`, `consultation_ip`) VALUES
(4, 2, 'Sultan', 'sultan.jpg', 4, 0, NULL),
(5, 12, 'Selva', 'selva.jpg', 4, 1, '[\"127.0.0.1\"]'),
(7, 4, 'Pico', 'pico.jpg', 4, 0, NULL),
(8, 11, 'Bongo', 'bongo.jpg', 4, 1, '[\"127.0.0.1\"]'),
(11, 10, 'Turbo', 'turbo.jpg', 2, 1, '[\"127.0.0.1\"]'),
(12, 6, 'Hippie', 'hippie.jpg', 2, 0, NULL),
(13, 9, 'Snappy', 'snappy.jpg', 2, 0, NULL),
(14, 8, 'Jumpy', 'jumpy.jpg', 2, 1, '[\"127.0.0.1\"]'),
(15, 5, 'Nala', 'nala.jpg', 5, 1, '[\"127.0.0.1\"]'),
(16, 4, 'Peppy', 'peppy.jpg', 5, 1, '[\"127.0.0.1\"]'),
(17, 3, 'Mosi', 'mosi.jpg', 5, 1, '[\"127.0.0.1\"]'),
(18, 7, 'Kumbo', 'kumbo.jpg', 5, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `breeds`
--

INSERT INTO `breeds` (`id`, `name`) VALUES
(2, 'Tigre'),
(3, 'Girafe'),
(4, 'Oiseau'),
(5, 'Lion'),
(6, 'Hippopotame'),
(7, 'Éléphant'),
(8, 'Grenouille'),
(9, 'Crocodile'),
(10, 'Tortue'),
(11, 'Singe'),
(12, 'Jaguar');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240927154358', '2024-09-27 17:57:23', 39),
('DoctrineMigrations\\Version20240927155715', '2024-09-27 17:57:23', 30),
('DoctrineMigrations\\Version20240927160720', '2024-09-27 18:07:28', 45),
('DoctrineMigrations\\Version20240927161021', '2024-09-27 18:10:26', 34),
('DoctrineMigrations\\Version20240927193222', '2024-09-27 21:32:29', 91),
('DoctrineMigrations\\Version20240927194924', '2024-09-27 21:49:31', 36),
('DoctrineMigrations\\Version20240927224708', '2024-09-28 00:47:26', 84),
('DoctrineMigrations\\Version20240927224812', '2024-09-28 00:48:16', 38),
('DoctrineMigrations\\Version20240927230045', '2024-09-28 01:00:49', 40),
('DoctrineMigrations\\Version20240927233337', '2024-09-28 01:33:46', 110),
('DoctrineMigrations\\Version20240927233555', '2024-09-28 01:35:58', 32),
('DoctrineMigrations\\Version20240927233626', '2024-09-28 01:36:28', 40),
('DoctrineMigrations\\Version20240927233708', '2024-09-28 01:37:11', 71),
('DoctrineMigrations\\Version20240927234831', '2024-09-28 01:48:38', 46),
('DoctrineMigrations\\Version20240927235946', '2024-09-28 01:59:50', 73),
('DoctrineMigrations\\Version20240928000744', '2024-09-28 02:07:48', 75),
('DoctrineMigrations\\Version20240928001134', '2024-09-28 02:11:43', 28),
('DoctrineMigrations\\Version20240928001313', '2024-09-28 02:13:19', 70),
('DoctrineMigrations\\Version20240928163212', '2024-09-28 18:32:20', 70),
('DoctrineMigrations\\Version20240929125510', '2024-09-29 14:55:17', 80),
('DoctrineMigrations\\Version20240929125700', '2024-09-29 14:57:05', 42),
('DoctrineMigrations\\Version20240929125741', '2024-09-29 14:57:44', 39),
('DoctrineMigrations\\Version20240929130930', '2024-09-29 15:09:33', 50),
('DoctrineMigrations\\Version20240929143504', '2024-09-29 16:35:08', 30),
('DoctrineMigrations\\Version20240929204159', '2024-09-29 22:42:07', 88),
('DoctrineMigrations\\Version20240929204431', '2024-09-29 22:44:34', 58),
('DoctrineMigrations\\Version20240930193040', '2024-09-30 21:31:02', 39),
('DoctrineMigrations\\Version20240930200114', '2024-09-30 22:01:20', 38),
('DoctrineMigrations\\Version20240930201732', '2024-09-30 22:17:35', 41),
('DoctrineMigrations\\Version20241002170032', '2024-10-02 19:00:39', 120),
('DoctrineMigrations\\Version20241003150710', '2024-10-03 17:07:17', 76),
('DoctrineMigrations\\Version20241003153521', '2024-10-03 17:35:25', 38),
('DoctrineMigrations\\Version20241007200116', '2024-10-07 22:01:23', 98),
('DoctrineMigrations\\Version20241018224405', '2024-10-19 00:44:14', 108);

-- --------------------------------------------------------

--
-- Structure de la table `employees_reports`
--

CREATE TABLE `employees_reports` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `food` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employees_reports`
--

INSERT INTO `employees_reports` (`id`, `animal_id`, `food`, `quantity`, `datetime`) VALUES
(3, 4, 'Gibier', 4, '2024-09-30 07:30:00'),
(4, 4, 'Gibier', 4, '2024-09-30 15:00:00'),
(5, 7, 'Bananes', 0.1, '2024-09-30 07:35:00'),
(6, 7, 'Bananes', 0.1, '2024-09-30 14:30:00'),
(7, 5, 'Cerf', 4, '2024-09-30 07:50:00'),
(8, 5, 'Cerf', 4, '2024-09-30 14:55:00'),
(9, 8, 'Bananes', 0.7, '2024-09-30 08:00:00'),
(10, 8, 'Bananes', 0.7, '2024-09-30 15:30:00'),
(11, 11, 'Carottes & Melons', 0.15, '2024-09-30 08:20:00'),
(12, 11, 'Epinards', 0.15, '2024-09-30 15:00:00'),
(13, 12, 'Herbes', 20, '2024-09-30 08:35:00'),
(14, 12, 'Herbes', 20, '2024-09-30 14:10:00'),
(15, 13, 'Mélange de viande & poisson', 1.5, '2024-09-30 09:00:00'),
(16, 13, 'Poissons', 1.5, '2024-09-30 14:45:00'),
(17, 14, 'Mouches', 0.5, '2024-09-30 09:15:00'),
(18, 14, 'Grillons', 0.5, '2024-09-30 14:55:00'),
(19, 15, 'Gibier', 2.5, '2024-09-30 08:45:00'),
(20, 15, 'Poulet', 3, '2024-09-29 15:50:00'),
(21, 16, 'Graines & légumes', 2, '2024-09-30 09:40:00'),
(22, 16, 'Feuilles', 2, '2024-09-30 15:20:00'),
(23, 17, 'Feuilles', 10, '2024-09-30 09:40:00'),
(24, 17, 'Mélange de légumes', 7, '2024-09-30 16:00:00'),
(25, 18, 'Mélange de fruits & légumes', 100, '2024-09-30 16:20:00'),
(26, 18, 'Mélange de fruits & légumes', 150, '2024-09-30 09:30:00'),
(28, 8, 'Bananes plantains', 0.5, '2024-10-20 12:07:00');

-- --------------------------------------------------------

--
-- Structure de la table `livings`
--

CREATE TABLE `livings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livings`
--

INSERT INTO `livings` (`id`, `name`, `comment`, `img`) VALUES
(2, 'Marais', 'L\'habitat marais est bien conçu et les animaux s\'y portent bien. Toutefois, l\'eau pourrait être filtrée plus souvent pour limiter les algues, et des zones d\'ombre supplémentaires offriraient un meilleur confort. Avec ces petits ajustements, l\'environnement serait optimal pour les espèces.', 'marais.jpg'),
(4, 'Jungle', 'L\'habitat jungle est riche en végétation, offrant aux animaux un environnement proche de leur milieu naturel. Cependant, améliorer la ventilation et augmenter la diversité des plantes permettrait de mieux réguler l\'humidité et de créer davantage d\'abris naturels. Un bon cadre, mais quelques améliorations seraient bénéfiques.', 'jungle.jpg'),
(5, 'Savane', 'L\'habitat savane est bien aménagé, avec des espaces ouverts qui permettent aux animaux de se déplacer librement. Un point d\'amélioration serait d\'ajouter plus de zones ombragées et quelques points d\'eau supplémentaires pour mieux refléter les conditions naturelles. Globalement, c\'est un environnement solide.', 'savane.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `opens_at` time DEFAULT NULL,
  `closes_at` time DEFAULT NULL,
  `closed_park` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `opens_at`, `closes_at`, `closed_park`) VALUES
(1, 'Lundi', NULL, NULL, 1),
(2, 'Mardi', '09:30:00', '19:30:00', 0),
(3, 'Mercredi', '09:30:00', '19:30:00', 0),
(4, 'Jeudi', '09:30:00', '19:30:00', 0),
(5, 'Vendredi', '09:30:00', '19:30:00', 0),
(6, 'Samedi', '09:30:00', '19:30:00', 0),
(12, 'Dimanche', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_free` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `is_free`) VALUES
(1, 'Shooting Photos', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', 'bad72b822f3b809488dfeda90d1a47524fbfb981.svg', 0),
(2, 'Bar & Restaurant', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', '7de3d34d5f64fe070c36005a71984ac0464f2305.svg', 0),
(3, 'Visite Guidée du Zoo', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', '79724fe5a54a87835eac2d60bd87ab41cccedd82.svg', 1),
(4, 'Tour en Petit Train', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', '8b84eba3fd15efa9c48de648d1673459d55f6ee2.svg', 0),
(5, 'Boutiques Souvenirs', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', 'd21ea04e8bb7840cde744b160b56a695bfeec0fc.svg', 0),
(6, 'Événemens Privés', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', '4a377d3e5e20e0c3ce35a3488a922c7c9b000b22.svg', 0),
(7, 'Foire aux Cadeaux', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', '20bdce499cb0bbdb02360c83f1a7cb89438fbc1b.svg', 0),
(8, 'Aires de Jeux', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', '251a29e0b862f65016ddac49f6ea53c416aeab4b.svg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `opinion` longtext NOT NULL,
  `is_valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `username`, `opinion`, `is_valid`) VALUES
(4, 'm.dumont', 'Superbe expérience au zoo ! Les enclos sont spacieux et bien entretenus, et on voit que les animaux sont heureux. La volière est incroyable et le personnel est très accueillant. Idéal pour une sortie en famille, avec des activités pour tous les âges. Nous reviendrons avec plaisir !', 1),
(5, 'c.dupont', 'Visite très agréable au zoo ! Les animaux semblaient en bonne santé et bien soignés. J\'ai particulièrement aimé l\'exposition des reptiles. Les aires de pique-nique sont parfaites pour faire une pause. Juste un petit bémol : certaines zones étaient un peu bondées. Dans l\'ensemble, une belle sortie en famille !', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `surname`, `img`) VALUES
(1, 'admin@admin.fr', '[\"ROLE_ADMIN\"]', '$2y$13$fsghih7yzXKwHxMu/LG0i.VDFKPtE2RHSl/TkfXMlW6bT9B3lKV5K', 'José', 'Arca', 'ceo.png'),
(2, 'veto@admin.fr', '[\"ROLE_VETO\"]', '$2y$13$jjolkBz7pk2t..GtfiDte.FPaCSPqN2CtvsN67BvwmdO9rqqwvCCe', 'Mathieu', 'Grimbert', 'veterinary.png'),
(16, 'employe1@admin.fr', '[\"ROLE_EMPLOYE\"]', '$2y$13$RJmwIt5ijNaGeo29yj2pdebcg8QEWSCdkF1X.v1aF3EyJT46emTWu', 'Sandra', 'Lamotte', 'employee-1.png'),
(17, 'employe2@admin.fr', '[\"ROLE_EMPLOYE\"]', '$2y$13$zIz7eBhAfUlqEqpxXFdCM.82GuineaHbZgAWIZbMjS4bLmeeC2XRm', 'Killian', 'Sola', 'employee-2.png');

-- --------------------------------------------------------

--
-- Structure de la table `veterinarians_reports`
--

CREATE TABLE `veterinarians_reports` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `datetime` datetime NOT NULL,
  `description` longtext NOT NULL,
  `animal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `veterinarians_reports`
--

INSERT INTO `veterinarians_reports` (`id`, `state`, `diet`, `quantity`, `datetime`, `description`, `animal_id`) VALUES
(5, 'Très bonne santé', 'Viandes', 9, '2024-09-30 09:00:00', '<div>Sultan, notre tigre de 12 ans, est en excellente santé. Ses examens vétérinaires récents montrent une condition physique optimale et une dentition en bon état. Aucun signe de problème majeur n\'a été détecté, et il est très actif dans son habitat.</div>', 4),
(6, 'Bonne santé', 'Fruits', 0.15, '2024-09-30 09:30:00', '<div>Pico, est en bonne santé. Son plumage est brillant et son bec est en parfait état. Il suit un régime équilibré à base de fruits, d\'insectes et de petites quantités de protéines. Aucun problème de santé notable n\'a été détecté lors de ses derniers examens.&nbsp;</div>', 7),
(7, 'Mauvaise santé', 'Viandes', 8, '2024-09-30 10:00:00', '<div>Selva présente des signes de mauvaise santé. Elle a perdu du poids et ne consomme que 5 à 6 kg de viande par jour, alors qu\'elle devrait en manger entre 7 et 10 kg. Son pelage est terne et elle montre une activité réduite. Des examens vétérinaires ont révélé une infection et des problèmes dentaires. Un suivi médical est en cours pour améliorer son état.&nbsp;</div>', 5),
(8, 'Très bonne santé', 'Fruits', 0.15, '2024-09-30 10:45:00', '<div>Bongo, notre petit singe, est en excellente santé. Son pelage est brillant, et il est très actif dans son habitat. Il consomme environ 150 à 200 grammes de nourriture par jour, comprenant des fruits, des légumes et quelques insectes. Aucun problème de santé n\'a été détecté lors de ses derniers examens vétérinaires, et il montre un comportement joyeux et curieux.&nbsp;</div>', 8),
(9, 'Mauvaise santé', 'Légumes', 0.15, '2024-09-30 11:00:00', '<div>Turbo, présente des signes de mauvaise santé. Elle mange très peu, environ 50 à 75 grammes de légumes par jour, alors qu\'elle devrait consommer au moins le double. Sa carapace montre des signes d\'usure, et elle est moins active. Des examens vétérinaires révèlent des problèmes respiratoires et une déshydratation. Un suivi médical est nécessaire pour améliorer son état.&nbsp;</div>', 11),
(10, 'Bonne santé', 'Légumes', 45, '2024-09-30 11:20:00', '<div>Hippie, notre hippopotame, est en excellente santé. Il pèse environ 1 500 kg et consomme entre 30 et 50 kg de végétation par jour, principalement de l\'herbe et des légumes. Son comportement est actif et curieux, et son pelage est propre et bien entretenu. Les derniers examens vétérinaires n\'ont révélé aucun problème de santé.&nbsp;</div>', 12),
(11, 'Bonne santé', 'Viandes', 3, '2024-09-30 11:50:00', '<div>Snappy, est en bonne santé. Il mesure environ 3 mètres et pèse près de 250 kg. Son régime alimentaire est équilibré, avec environ 2 à 3 kg de viande par jour, comprenant du poisson et des petits animaux. Son comportement est actif, et son écaillage est brillant et bien hydraté. Les examens vétérinaires récents n\'ont révélé aucun problème de santé.&nbsp;</div>', 13),
(12, 'Très bonne santé', 'Insectes', 0.1, '2024-09-30 12:00:00', '<div>Jumpy est en excellente santé. Elle est très active et se nourrit d\'environ 10 à 15 insectes par jour, principalement des mouches et des grillons. Son habitat est bien entretenu, avec un bon niveau d\'humidité. Les derniers examens n\'ont révélé aucun problème de santé, et son comportement est joyeux et curieux.&nbsp;</div>', 14),
(13, 'Très mauvaise santé', 'Viandes', 7, '2024-09-30 14:00:00', '<div>Nala montre des signes de mauvaise santé. Elle a perdu du poids et ne mange que 3 à 4 kg de viande par jour, alors qu\'elle devrait en consommer 5 à 7 kg. Son pelage est terne et elle semble moins active que d\'habitude. Des examens vétérinaires ont révélé une infection et des problèmes dentaires. Un traitement est en cours pour stabiliser son état&nbsp;</div>', 15),
(14, 'Très bonne santé', 'Légumes', 4, '2024-09-30 14:25:00', '<div>Peppy notre autruche, est en excellente santé. Elle pèse environ 90 kg et consomme entre 2 et 4 kg de nourriture par jour, principalement composée de grains, de légumes et de feuilles. Son plumage est brillant et elle est très active dans son enclos, montrant un comportement curieux et dynamique. Les examens vétérinaires récents n\'ont révélé aucun problème de santé&nbsp;</div>', 16),
(15, 'Bonne santé', 'Plantes', 30, '2024-09-30 14:50:00', '<div>Mosi est en excellente santé. Elle mesure environ 4,5 mètres et consomme entre 25 et 30 kg de feuilles et de branches par jour. Son pelage est brillant, et elle est très active, explorant son enclos avec curiosité. Les examens vétérinaires récents n\'ont montré aucun problème de santé&nbsp;</div>', 17),
(16, 'Mauvaise santé', 'Légumes', 200, '2024-09-30 15:00:00', '<div>Kumbo, présente des signes de mauvaise santé. Il a perdu du poids et ne mange que 100 à 150 kg de nourriture par jour, alors qu\'il devrait consommer environ 200 kg. Son comportement est moins actif, et il semble fatigué. Des examens vétérinaires ont révélé des problèmes dentaires et une déshydratation. Un suivi médical est nécessaire pour améliorer son état.&nbsp;</div>', 18);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_966C69DDA8B4A30F` (`breed_id`),
  ADD KEY `IDX_966C69DD2A4A7CB9` (`living_id`);

--
-- Index pour la table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `employees_reports`
--
ALTER TABLE `employees_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_71AD66488E962C16` (`animal_id`);

--
-- Index pour la table `livings`
--
ALTER TABLE `livings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- Index pour la table `veterinarians_reports`
--
ALTER TABLE `veterinarians_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FBBCF5E18E962C16` (`animal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `employees_reports`
--
ALTER TABLE `employees_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `livings`
--
ALTER TABLE `livings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `veterinarians_reports`
--
ALTER TABLE `veterinarians_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `FK_966C69DD2A4A7CB9` FOREIGN KEY (`living_id`) REFERENCES `livings` (`id`),
  ADD CONSTRAINT `FK_966C69DDA8B4A30F` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`);

--
-- Contraintes pour la table `employees_reports`
--
ALTER TABLE `employees_reports`
  ADD CONSTRAINT `FK_71AD66488E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Contraintes pour la table `veterinarians_reports`
--
ALTER TABLE `veterinarians_reports`
  ADD CONSTRAINT `FK_FBBCF5E18E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

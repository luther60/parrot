-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 fév. 2024 à 14:12
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dev60_g_parrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
CREATE TABLE IF NOT EXISTS `accueil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accueil`
--

INSERT INTO `accueil` (`id`, `titre`, `img`, `text`) VALUES
(1, 'Présentation de la société', 'upload/65bfa021c5a3a.jpg', 'Notre mission est d’entretenir et de réparer en Mécanique comme en Carrosserie tous les véhicules modernes mais aussi de collection. Toute l\'équipe de votre garage est composé de passionnés de l\'automobile qui se remettent en question chaque jour afin de fournir le meilleur de leurs compétences au service de votre véhicule.'),
(2, 'Service réparation', 'upload/65bfa092edd0c.jpg', 'Notre équipe, fort d\'une longues expériences sera en mesure d\'effectuer toutes les réparations nécessaires sur votre véhicule, récent ou plus ancien, tels que la distribution, remplacement de moteur, embrayage, etc.\r\nDe plus, notre équipe est formée continuellement aux toutes dernières technologies afin de vous offrir la meilleur prestation possible.'),
(3, 'Service carrosserie', 'upload/65bfa0ba42bf4.jpg', 'Votre service carrosserie s\'occupe de l\'expertise technique de votre véhicule et des démarches administratives auprès de votre assureur en cas de sinistre.\r\nNous remettons en état votre véhicule selon les méthodes préconisées par le constructeur, avec les pièces d\'origines et peintures spécifiques à votre véhicule.\r\nUn parc de véhicules de remplacement dédié est mis à votre disposition lors de l\'immobilisation de votre véhicule'),
(4, 'Service entretien', 'upload/65bfa0dd273da.jpg', 'Votre service entretien dispose de toutes les compétences techniques pour s\'occuper de votre véhicule et s\'engage au respect du programme d\'entretien de votre véhicule, à la sécurité grâce à la réalisation de 87 points de contrôle inclus dans la révision, de la fiabilité via le diagnostic électronique, le respect des huiles constructeur et bien évidemment une garantie des interventions.'),
(5, 'Véhicules d\'occasion', 'upload/65bfa13bc0552.jpg', 'Notre équipe de vente, fort d\'une longues expériences sera en mesure d\'effectuer toutes les réparations nécessaires sur votre véhicule, récent ou plus ancien, tels que la distribution, remplacement de moteur, embrayage, etc.\r\nDe plus, notre équipe est formée continuellement aux toutes dernières technologies afin de vous offrir la meilleur prestation possible.');

-- --------------------------------------------------------

--
-- Structure de la table `postusers`
--

DROP TABLE IF EXISTS `postusers`;
CREATE TABLE IF NOT EXISTS `postusers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avis` text COLLATE utf8mb4_general_ci,
  `note` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postusers`
--

INSERT INTO `postusers` (`id`, `name`, `username`, `phone`, `mail`, `avis`, `note`) VALUES
(3, 'Doe', 'John', '0618201760', 'test@avis.com', '  Super garagiste, je recommande !!    ', 5),
(21, 'Connor', 'john', '0649739462', 'test@avis.com', '   Super garage, espérons qu\'il continue ainsi.   ', 5),
(25, 'Mareaux', 'alain', '0649739462', 'test@avis.com', '   Garagiste professionnelle et honnête.\r\nDe plus, il est super rapide!!   ', 5);

-- --------------------------------------------------------

--
-- Structure de la table `postusersvalidate`
--

DROP TABLE IF EXISTS `postusersvalidate`;
CREATE TABLE IF NOT EXISTS `postusersvalidate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avis` text COLLATE utf8mb4_general_ci,
  `note` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postusersvalidate`
--

INSERT INTO `postusersvalidate` (`id`, `name`, `username`, `phone`, `mail`, `avis`, `note`) VALUES
(1, 'Doe', 'John', '0618201760', 'test@avis.com', '  Super garagiste, je recommande !!    ', 5),
(2, 'Mareaux', 'alain', '0649739462', 'test@avis.com', '   Garagiste professionnelle et honnête.\r\nDe plus, il est super rapide!!   ', 5),
(3, 'Connor', 'john', '0649739462', 'test@avis.com', '   Super garage, espérons qu\'il continue ainsi.   ', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `LastaName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Email`, `Password`, `FirstName`, `LastaName`, `role`) VALUES
(6, 'studi@admin.com', '$2y$10$FRdoa8CJ5/VzsmnBmmduE.LnCVO.6cYVBkJL3o2ZM.Mbx4CV2Gbu6', 'studi', 'studi', 'super'),
(7, 'gparrot@admin.com', '$2y$10$.lcryOLOa8SwiS7UnFrX7eiTd/hTGDW.HI7ft9WHqvSbvzqKZhm2.', 'vincent', 'parrot', 'admin'),
(8, 'emp.1@super.com', '$2y$10$lqmHlOCNgkyvIiC8CBQ2w.T/istDhlnTyPUZT3dC87RZt2lvK6Sga', 'employe1', 'employe1', 'super');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Brand` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Model` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Price` int NOT NULL,
  `Registration` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Kilometer` int NOT NULL,
  `Img1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Img2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Img3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Fuel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `MaxSpeed` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `CV` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Option` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`id`, `Brand`, `Model`, `Price`, `Registration`, `Kilometer`, `Img1`, `Img2`, `Img3`, `Fuel`, `MaxSpeed`, `CV`, `Option`) VALUES
(4, 'Ford', 'F150', 149970, '2023', 500, 'upload/65cb4513d1e7b.jpg', 'upload/65cb4513d230c.jpg', 'upload/65cb4513d2816.jpg', 'electrique', '280', '20', '           Transmission automatique 1 vitesse\r\nLariat Extended-Range\r\nSystème de gestion de charge boxlink\r\nCoffre avant\r\nChâssis entièrement en acier\r\nPhares à projecteur à LED\r\nÉclairage LED de la benne\r\nCrochets d\'arrimage de la caisse\r\nVerrouillage et ouverture/fermeture électrique du hayon\r\nVitre centrale de lunette arrière coulissante électrique avec dégivrage\r\nMarchepied de hayon\r\nÉclairage de zone\r\nCompteur digital de 12\'\r\nÉclairage ambient intérieur\r\nApple CARPLAY et Android auto sans fil\r\nGPS US (GPS Europe en option)\r\nSystème audio B&O\r\nEntrée illuminée\r\nRétroviseur à atténuation automatique\r\nPédales réglables électriquement avec mémoire\r\nSupport lombaire électrique\r\nSièges avant chauffants et ventilés                                                                                                                                                                                                                         '),
(5, 'renault', 'Talisman', 17900, '2016', 84324, 'upload/65c4f5e164aa4.jpg', 'upload/65c4f5e164db1.jpg', 'upload/65c4f5e164f91.jpg', 'Diesel', '250', '8', '  Phares à allumage automatique\r\nAmpoules de phares Led\r\nFreins régénérateurs\r\nFeux arrières à LED\r\n                                          Antibrouillards avant                                                  '),
(6, 'Dacia', 'Spring', 11900, '2020', 21, 'upload/65cb462b5e54d.jpg', 'upload/65cb462b5e7db.jpg', 'upload/65cb462b5e985.jpg', 'electrique', '150', '2', '                     Fonction éco-mode\r\nEnjoliveurs Flexwheel 14\'\' DORIA\r\nPeinture intégrale                           '),
(7, 'Mercedes', 'Class a', 28290, '2022', 25900, 'upload/65cb469f70c10.jpg', 'upload/65cb469f70e40.jpg', 'upload/65cb469f71094.jpg', 'essence', '190', '200', '          Kit anticrevaison TIREFIT\r\nBoîte de vitesse automatique 7G-DCT\r\nPavé tactile TOUCHPAD\r\nEléments de design chromés\r\nInserts décoratifs façon Carbone              '),
(8, 'bentley', 'Continental', 47990, '2007', 88752, 'upload/65cb46eea75f4.jpg', 'upload/65cb46eea7830.jpg', 'upload/65cb46eea7a01.jpg', 'essence', '300', '200', '       Climatisation automatique\r\nDirection assistée\r\nIntérieur tout cuir                 '),
(9, 'Skoda', 'Karoq', 19990, '2019', 49645, 'upload/65cb4756732d8.jpg', 'upload/65cb4756734f8.jpg', 'upload/65cb4756736cd.jpg', 'essence', '190', '200', '            Aide parking\r\nLunette arrière dégivrante\r\nPeinture intégrale            '),
(10, 'Peugeot', '3008', 22800, '2019', 28455, 'upload/65cb47b9b75e0.jpg', 'upload/65cb47b9b782b.jpg', 'upload/65cb47b9b7a29.jpg', 'essence', '160', '200', '            Rétroviseurs extérieurs indexés marche arrière\r\nRétroviseurs extérieurs réglage électrique\r\nFeux de route à LED\r\nPhares à allumage automatique\r\nRétroviseurs extérieurs chauffants            '),
(11, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(12, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(13, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(14, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(15, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(17, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(18, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(20, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(26, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(29, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  '),
(30, 'renault', 'Talisman', 50000, '2018', 27292, '', 'upload/', NULL, 'essence', '5', '200', '                  ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

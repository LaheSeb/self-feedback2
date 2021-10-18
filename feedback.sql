-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.31 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour feedback
CREATE DATABASE IF NOT EXISTS `feedback` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `feedback`;

-- Listage de la structure de la table feedback. avis_plats
CREATE TABLE IF NOT EXISTS `avis_plats` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `gout_plat` int(5) NOT NULL DEFAULT '0',
  `diversité_plat` int(5) NOT NULL DEFAULT '0',
  `chaleur_plat` int(5) NOT NULL DEFAULT '0',
  `commentaire_plat` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table feedback.avis_plats : ~0 rows (environ)
DELETE FROM `avis_plats`;
/*!40000 ALTER TABLE `avis_plats` DISABLE KEYS */;
INSERT INTO `avis_plats` (`id_p`, `gout_plat`, `diversité_plat`, `chaleur_plat`, `commentaire_plat`) VALUES
	(1, 3, 4, 2, 'Manque de cuisson de la viande'),
	(2, 2, 2, 5, 'Patate pas assez cuite'),
	(3, 4, 3, 3, NULL),
	(4, 2, 1, 4, 'Je n\'ai pas aimé la sauce'),
	(5, 1, 5, 1, 'Le plat était froid et le goût était fade');
/*!40000 ALTER TABLE `avis_plats` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

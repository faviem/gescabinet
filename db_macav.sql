SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS adversairephysique (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_id` int(11) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `telmobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telfixe` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresserue` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_18E36910A73F0036` (`ville_id`),
  KEY `IDX_18E36910A6E44244` (`pays_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO adversairephysique (id, ville_id, pays_id, loginpersist, datepersist, logindelete, datedelete, estdelete, telmobile, telfixe, fax, bp, adresserue, email, nom, prenom, sexe) VALUES
(1, 1, 1, 'admin', '2016-07-07 15:54:09', NULL, NULL, 0, '+229 78 41 47 45', NULL, NULL, 'em@yahoo.fr', 'em@yahoo.fr', 'em@yahoo.fr', 'BANKOLE  Ambroise', NULL, NULL),
(2, 1, 1, 'admin', '2016-07-07 16:13:15', NULL, NULL, 0, '+229 78 41 47 45', NULL, NULL, 'em@yahoo.fr', 'em@yahoo.fr', 'em@yahoo.fr', 'BANKOLE  Ambroise', NULL, NULL),
(3, 1, 1, 'admin', '2016-07-07 16:15:10', NULL, NULL, 0, '+229 78 41 47 45', NULL, NULL, 'em@yahoo.fr', 'em@yahoo.fr', 'em@yahoo.fr', 'BANKOLE  Ambroise', NULL, NULL),
(4, 1, 5, 'admin', '2016-07-10 07:55:25', NULL, NULL, 0, 'ferferergre', NULL, NULL, NULL, NULL, NULL, 'cezvezfer', NULL, NULL),
(5, 1, 10, 'admin', '2016-07-10 15:21:26', NULL, NULL, 0, 'gegregre', NULL, NULL, 'regregreg', NULL, 'gegregerg', 'gregre', NULL, NULL),
(6, 1, 1, 'admin', '2016-07-10 15:26:05', NULL, NULL, 0, 'greggrregre', NULL, NULL, 'gregergre', NULL, 'gregregre', 'gergregree', NULL, NULL);

CREATE TABLE IF NOT EXISTS affaire (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adversairephysique_id` int(11) DEFAULT NULL,
  `clientphysique_id` int(11) DEFAULT NULL,
  `exercice_id` int(11) DEFAULT NULL,
  `natureaffaire_id` int(11) DEFAULT NULL,
  `juridiction_id` int(11) DEFAULT NULL,
  `qualiteaffaire_id` int(11) DEFAULT NULL,
  `coutaffaire` int(11) DEFAULT NULL,
  `coutrestant` int(11) DEFAULT NULL,
  `dateaffaire` date DEFAULT NULL,
  `datecloturee` date DEFAULT NULL,
  `datearchivee` date DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroaffaire` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appreciationclient` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estarchivee` tinyint(1) DEFAULT NULL,
  `estnouveau` tinyint(1) DEFAULT NULL,
  `estentraitement` tinyint(1) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `estreglee` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9C3F18EFF75B0574` (`adversairephysique_id`),
  UNIQUE KEY `UNIQ_9C3F18EFA0CF2AA1` (`clientphysique_id`),
  KEY `IDX_9C3F18EF89D40298` (`exercice_id`),
  KEY `IDX_9C3F18EFA05FF789` (`natureaffaire_id`),
  KEY `IDX_9C3F18EFD38DB6BD` (`juridiction_id`),
  KEY `IDX_9C3F18EF4E8EC5E9` (`qualiteaffaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO affaire (id, adversairephysique_id, clientphysique_id, exercice_id, natureaffaire_id, juridiction_id, qualiteaffaire_id, coutaffaire, coutrestant, dateaffaire, datecloturee, datearchivee, objet, numeroaffaire, appreciationclient, estarchivee, estnouveau, estentraitement, loginpersist, datepersist, logindelete, datedelete, estdelete, estreglee) VALUES
(1, 2, 2, 1, 2, 1, 6, 2000000, 1520000, '2016-07-14', NULL, NULL, 'Vol publique', 'AAA45124', NULL, 0, 1, 0, 'admin', '2016-07-07 16:13:14', NULL, NULL, 0, 0),
(2, 3, 3, 1, 2, 1, 6, 2000000, 0, '2016-07-14', NULL, NULL, 'Vol publique', '14528', NULL, 0, 1, 0, 'admin', '2016-07-07 16:15:10', 'admin', '2016-07-10 09:08:16', 1, 1),
(3, 4, 4, 2, 2, 2, 6, 154782, 154782, '2016-07-13', NULL, NULL, 'czeczervrever', '15945615ZDZ', NULL, 0, 1, 1, 'admin', '2016-07-10 07:55:25', 'admin', NULL, 0, NULL),
(4, 5, 5, 9, 6, 1, 6, 201552552, NULL, '2016-07-10', NULL, NULL, 'erverrrr', 'r5165veve', NULL, 0, 1, 0, 'admin', '2016-07-10 15:21:26', NULL, NULL, 0, NULL),
(5, 6, 6, 1, 4, 1, 6, 21655616, NULL, '2016-07-10', NULL, NULL, 'gregregr', 'vregrght', NULL, 0, 1, 1, 'admin', '2016-07-10 15:26:05', NULL, NULL, 0, NULL);

CREATE TABLE IF NOT EXISTS agent (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `fonction` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `telmobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telfixe` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresserue` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_268B9C9DA76ED395` (`user_id`),
  KEY `IDX_268B9C9DA73F0036` (`ville_id`),
  KEY `IDX_268B9C9DA6E44244` (`pays_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO agent (id, user_id, ville_id, pays_id, fonction, loginpersist, datepersist, logindelete, datedelete, estdelete, telmobile, telfixe, fax, bp, adresserue, email, nom, prenom, sexe) VALUES
(1, 1, 5, NULL, 'PDG Gérant', 'admin', '2016-06-30 23:42:28', NULL, NULL, 0, '96 89 26 27', NULL, NULL, NULL, NULL, 'faviem2012@gmail.com', 'FADONOUGBO', 'Emile', 'M'),
(2, 6, 4, NULL, NULL, 'admin', '2016-06-30 23:52:25', 'admin', '2016-06-30 23:57:57', 1, '96 87 41 45', NULL, NULL, NULL, NULL, 'pro@pro.com', 'AKO', 'pro', 'M'),
(3, 7, 6, NULL, NULL, 'admin', '2016-06-30 23:54:21', NULL, NULL, 0, '98 74 14 45', NULL, NULL, NULL, NULL, 'franck@yahoo.com', 'YELIAN', 'Franck', 'F');

CREATE TABLE IF NOT EXISTS avocatadverse (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affaire_id` int(11) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `telmobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telfixe` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresserue` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_27E9ADD2A73F0036` (`ville_id`),
  KEY `IDX_27E9ADD2A6E44244` (`pays_id`),
  KEY `IDX_27E9ADD2F082E755` (`affaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO avocatadverse (id, affaire_id, ville_id, pays_id, loginpersist, datepersist, logindelete, datedelete, estdelete, telmobile, telfixe, fax, bp, adresserue, email, nom, prenom, sexe) VALUES
(2, 2, 1, 1, 'admin', '2016-07-07 17:19:43', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'ASSOGBA', 'Jacob', NULL),
(3, 3, 1, 1, 'admin', '2016-07-10 07:58:31', NULL, NULL, 0, 'vrevrevre', NULL, NULL, NULL, NULL, NULL, 'gqvfvf', 'fregergrgr', NULL),
(4, 1, 1, 1, 'admin', '2016-07-10 08:12:20', NULL, NULL, 0, 'HJKHKJ', NULL, NULL, NULL, NULL, NULL, 'VRFDVKJKHJK', 'HJKHKJLHJK', NULL),
(5, 1, 6, 1, 'admin', '2016-07-10 08:12:31', NULL, NULL, 0, 'ERVE', NULL, NULL, NULL, NULL, NULL, 'BRBR', 'VREGRE', NULL),
(6, 4, 1, 1, 'admin', '2016-07-10 15:21:45', NULL, NULL, 0, 'gergrege', NULL, NULL, NULL, NULL, NULL, 'frefgerg', 'gregr', NULL),
(7, 5, 1, 1, 'admin', '2016-07-10 15:27:05', NULL, NULL, 0, 'gerggreg', NULL, NULL, NULL, NULL, NULL, 'dezferfgr', 'regregre', NULL),
(8, 5, 5, 1, 'admin', '2016-07-10 15:28:10', NULL, NULL, 0, 'ververver', NULL, NULL, NULL, NULL, NULL, 'vrevre', 'VRevre', NULL);

CREATE TABLE IF NOT EXISTS categorienote (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO categorienote (id, libelle, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 'Courier', 'admin', '2016-07-01 07:02:33', NULL, NULL, 0),
(2, 'Pense bête', 'admin', '2016-07-01 07:02:41', NULL, NULL, 0),
(3, 'Information', 'admin', '2016-07-01 07:03:07', NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS chargecabinet (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubriquecharge_id` int(11) DEFAULT NULL,
  `exercice_id` int(11) DEFAULT NULL,
  `datecharge` date DEFAULT NULL,
  `montantcharge` int(11) DEFAULT NULL,
  `estprevue` tinyint(1) DEFAULT NULL,
  `estrealisee` tinyint(1) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `piececharge_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_807D6EC54F9A639B` (`piececharge_id`),
  KEY `IDX_807D6EC5F2338E` (`rubriquecharge_id`),
  KEY `IDX_807D6EC589D40298` (`exercice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO chargecabinet (id, rubriquecharge_id, exercice_id, datecharge, montantcharge, estprevue, estrealisee, loginpersist, datepersist, logindelete, datedelete, estdelete, piececharge_id) VALUES
(1, 3, 1, '2017-01-12', 20000, NULL, NULL, 'admin', '2016-07-06 15:27:29', NULL, NULL, 0, NULL),
(2, 1, 1, '2016-07-07', 5000, NULL, NULL, 'admin', '2016-07-06 15:28:01', NULL, NULL, 0, NULL);

CREATE TABLE IF NOT EXISTS clientphysique (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_id` int(11) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `telmobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telfixe` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresserue` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B98C8DE7A73F0036` (`ville_id`),
  KEY `IDX_B98C8DE7A6E44244` (`pays_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO clientphysique (id, ville_id, pays_id, loginpersist, datepersist, logindelete, datedelete, estdelete, telmobile, telfixe, fax, bp, adresserue, email, nom, prenom, sexe) VALUES
(1, 1, 1, 'admin', '2016-07-07 15:54:09', NULL, NULL, 0, '+229 95 85 47 41', NULL, NULL, 'em@yahoo.fr', 'em@yahoo.fr', 'em@yahoo.fr', 'AKPAMOLI  Jean', NULL, NULL),
(2, 1, 1, 'admin', '2016-07-07 16:13:15', NULL, NULL, 0, '+229 95 85 47 41', NULL, NULL, 'em@yahoo.fr', 'em@yahoo.fr', 'em@yahoo.fr', 'AKPAMOLI  Jean', NULL, NULL),
(3, 1, 1, 'admin', '2016-07-07 16:15:10', NULL, NULL, 0, '+229 95 85 47 41', NULL, NULL, 'em@yahoo.fr', 'em@yahoo.fr', 'em@yahoo.fr', 'AKPAMOLI  Jean', NULL, NULL),
(4, 1, 1, 'admin', '2016-07-10 07:55:25', NULL, NULL, 0, '54988989', NULL, NULL, NULL, NULL, NULL, 'cezcrevref', NULL, NULL),
(5, 1, 7, 'admin', '2016-07-10 15:21:26', NULL, NULL, 0, 'gverb', NULL, NULL, 'gegr', 'vregreg', 'erevreber', 'vrevre', NULL, NULL),
(6, 1, 7, 'admin', '2016-07-10 15:26:05', NULL, NULL, 0, 'regregreg', NULL, NULL, NULL, NULL, 'rgregergre', 'gregreg', NULL, NULL);

CREATE TABLE IF NOT EXISTS discussionreunion (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F44F18D93414710B` (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO discussionreunion (id, agent_id, message, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 1, 'yghjghjgj', 'admin', '2016-07-13 21:49:59', NULL, NULL, 0),
(2, 1, 'yghjgj', 'admin', '2016-07-13 22:00:16', NULL, NULL, 0),
(3, 1, 'xait kw le verdicte', 'admin', '2016-07-13 22:00:29', NULL, NULL, 0),
(4, 3, 'et xa veux dire kw', 'franck', '2016-07-13 22:01:46', NULL, NULL, 0),
(5, 1, 'bien sûre', 'admin', '2016-07-13 22:02:02', NULL, NULL, 0),
(6, 1, 'di kelk chose', 'admin', '2016-07-13 22:05:15', NULL, NULL, 0),
(7, 1, 'et puis koiiii encoreee et wwiiii.....', 'admin', '2016-07-13 22:07:50', NULL, NULL, 0),
(8, 1, 'frdgrthtyj', 'admin', '2016-07-13 22:18:41', NULL, NULL, 0),
(9, 1, 'CMT', 'admin', '2016-07-18 20:34:49', NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS Exercice (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` int(11) DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO Exercice (id, annee, datedelete, loginpersist, datepersist, estdelete, logindelete) VALUES
(1, 2010, NULL, 'admin', '2016-06-30 17:18:40', 0, NULL),
(2, 2011, NULL, 'admin', '2016-06-30 17:18:43', 0, NULL),
(3, 2012, NULL, 'admin', '2016-06-30 17:18:45', 0, NULL),
(4, 2013, NULL, 'admin', '2016-06-30 17:18:48', 0, NULL),
(5, 2014, NULL, 'admin', '2016-06-30 17:18:50', 0, NULL),
(6, 2015, NULL, 'admin', '2016-06-30 17:18:51', 0, NULL),
(7, 2016, NULL, 'admin', '2016-06-30 17:18:53', 0, NULL),
(8, 2017, NULL, 'admin', '2016-06-30 17:18:55', 0, NULL),
(9, 2018, NULL, 'admin', '2016-06-30 17:18:57', 0, NULL),
(10, 2019, NULL, 'admin', '2016-06-30 17:18:59', 0, NULL),
(11, 2020, NULL, 'admin', '2016-06-30 17:19:19', 0, NULL);

CREATE TABLE IF NOT EXISTS juridiction (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO juridiction (id, libelle, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 'Cour d\'Appel de COTONOU', 'admin', '2016-06-30 17:34:38', NULL, NULL, 0),
(2, 'Cour d\'Appel de PARAKOU', 'admin', '2016-06-30 17:34:44', NULL, NULL, 0),
(3, 'Cour Constitutionnelle', 'admin', '2016-06-30 17:34:56', NULL, NULL, 0),
(4, 'Haute cours de Justice', 'admin', '2016-06-30 17:35:15', NULL, NULL, 0),
(5, 'Tribunal de 1er instance de COTONOU', 'admin', '2016-06-30 17:35:32', NULL, NULL, 0),
(6, 'Tribunal de 1er instance de PORTO-NOVO', 'admin', '2016-06-30 17:35:39', NULL, NULL, 0),
(7, 'Cour Pénale de NATITINGOU', 'admin', '2016-06-30 17:36:25', NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS modereglement (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO modereglement (id, libelle, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 'Chèque bancaire', 'admin', '2016-06-30 20:43:51', NULL, NULL, 0),
(2, 'Espèce', 'admin', '2016-06-30 20:43:18', NULL, NULL, 0),
(3, 'Chèque postal', 'admin', '2016-06-30 20:43:40', NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS natureaffaire (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO natureaffaire (id, libelle, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 'Commerciale', 'admin', '2016-07-03 16:24:11', NULL, NULL, 0),
(2, 'Droit administratif', 'admin', '2016-07-03 16:24:30', NULL, NULL, 0),
(3, 'Etat de personne : contentieux successorale', 'admin', '2016-07-03 16:26:07', NULL, NULL, 0),
(4, 'Droit de propriété fonctionnaire', 'admin', '2016-07-03 16:24:00', NULL, NULL, 0),
(5, 'Pénale : citation directe', 'admin', '2016-07-03 16:23:08', NULL, NULL, 0),
(6, 'Droit electorale', 'admin', '2016-07-03 16:24:46', NULL, NULL, 0),
(7, 'Pénale : criminelle', 'admin', '2016-07-03 16:23:24', NULL, NULL, 0),
(8, 'Etat de personne : état civil', 'admin', '2016-07-03 16:25:24', NULL, NULL, 0),
(9, 'Pénale : flagrant d\'élit', 'admin', '2016-07-03 16:22:52', NULL, NULL, 0),
(10, 'Droit fiscal', 'admin', '2016-07-03 16:24:58', NULL, NULL, 0),
(11, 'Etat des personnes : affaire matrimoniale', 'admin', '2016-07-03 16:26:51', NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS noteredigee (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `estarchivee` tinyint(1) DEFAULT NULL,
  `datearchivee` datetime DEFAULT NULL,
  `categorienote_id` int(11) DEFAULT NULL,
  `estpubliee` tinyint(1) DEFAULT NULL,
  `datepubliee` datetime DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1D158E5659F845EF` (`categorienote_id`),
  KEY `IDX_1D158E563414710B` (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO noteredigee (id, note, loginpersist, datepersist, logindelete, datedelete, estdelete, estarchivee, datearchivee, categorienote_id, estpubliee, datepubliee, agent_id) VALUES
(2, 'dbfdbdf et puis encore, tu ne connais rien xait àa na ? d\'accord à toi........', 'admin', '2016-07-02 08:59:18', NULL, NULL, 0, 0, NULL, 3, 1, '2016-07-04 21:54:34', 1),
(3, 'lk,kl,ùlkjlkjk', 'admin', '2016-07-03 15:37:37', NULL, NULL, 0, 0, NULL, 3, 0, NULL, 1);

CREATE TABLE IF NOT EXISTS partagernote (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agentexpediteur_id` int(11) DEFAULT NULL,
  `agentdestinataire_id` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `noteredigee_id` int(11) DEFAULT NULL,
  `estarchivee` tinyint(1) DEFAULT NULL,
  `estpubliee` tinyint(1) DEFAULT NULL,
  `datearchivee` datetime DEFAULT NULL,
  `datepubliee` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F6B4131F3C24B203` (`agentexpediteur_id`),
  KEY `IDX_F6B4131F2D88F499` (`agentdestinataire_id`),
  KEY `IDX_F6B4131FC6ADC601` (`noteredigee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO partagernote (id, agentexpediteur_id, agentdestinataire_id, loginpersist, datepersist, logindelete, datedelete, estdelete, noteredigee_id, estarchivee, estpubliee, datearchivee, datepubliee) VALUES
(7, 1, 3, 'admin', '2016-07-02 09:03:19', NULL, NULL, 0, 2, 0, 1, NULL, '2016-07-04 21:54:34');

CREATE TABLE IF NOT EXISTS pays (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO pays (id, libelle, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 'Bénin', 'admin', '2016-06-30 16:49:56', NULL, NULL, 0),
(2, 'Togo', 'admin', '2016-06-30 16:50:00', NULL, NULL, 0),
(3, 'Nigéria', 'admin', '2016-06-30 16:50:05', NULL, NULL, 0),
(4, 'Niger', 'admin', '2016-06-30 16:50:08', NULL, NULL, 0),
(5, 'Côte d\'ivoire', 'admin', '2016-06-30 16:50:15', NULL, NULL, 0),
(6, 'Gabon', 'admin', '2016-06-30 16:50:21', NULL, NULL, 0),
(7, 'Burkina-faso', 'admin', '2016-06-30 16:50:30', NULL, NULL, 0),
(8, 'Algérie', 'admin', '2016-06-30 16:50:49', NULL, NULL, 0),
(9, 'Sénégal', 'admin', '2016-06-30 16:50:53', NULL, NULL, 0),
(10, 'Maroc', 'admin', '2016-06-30 16:50:57', NULL, NULL, 0),
(11, 'Rhwanda', 'admin', '2016-06-30 16:51:45', 'admin', '2016-06-30 16:51:50', 1);

CREATE TABLE IF NOT EXISTS photopersonnel (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS pieceaffaire (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  `affaire_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BF7EF43DF082E755` (`affaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO pieceaffaire (id, url, alt, dateEnregistrement, affaire_id) VALUES
(1, 'pdf', 'a1002f_2.pdf', '2016-07-07 17:23:51', 2),
(2, 'pdf', 'a1002f_2.pdf', '2016-07-10 08:12:08', 1),
(3, 'pdf', '200-CITATIONS.pdf', '2016-07-10 15:26:33', 5),
(4, 'pdf', 'a1002f_2.pdf', '2016-07-10 15:26:48', 5);

CREATE TABLE IF NOT EXISTS pieceaudience (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  `tacheaudience_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9533660CE79FE5E3` (`tacheaudience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO pieceaudience (id, url, alt, dateEnregistrement, tacheaudience_id) VALUES
(1, 'pdf', 'a1002f_3_4.pdf', '2016-07-16 18:27:57', 7);

CREATE TABLE IF NOT EXISTS piececharge (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS piecenote (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  `noteredigee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31CBAF68C6ADC601` (`noteredigee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO piecenote (id, url, alt, dateEnregistrement, noteredigee_id) VALUES
(2, 'pdf', 'a1002f_2.pdf', '2016-07-01 23:33:00', 2),
(3, 'pdf', 'a1002f_3_4.pdf', '2016-07-01 23:33:06', 2);

CREATE TABLE IF NOT EXISTS piecereglement (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  `reglementaffaire_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F156EBC3DD85CE06` (`reglementaffaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS previsioncharge (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubriquecharge_id` int(11) DEFAULT NULL,
  `exercice_id` int(11) DEFAULT NULL,
  `montantcharge` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F2E9C21BF2338E` (`rubriquecharge_id`),
  KEY `IDX_F2E9C21B89D40298` (`exercice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO previsioncharge (id, rubriquecharge_id, exercice_id, montantcharge, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 2, 2, 1000, 'admin', '2016-07-05 22:48:08', NULL, NULL, NULL),
(2, 3, 2, 100, 'admin', '2016-07-05 22:43:11', NULL, NULL, NULL),
(3, 3, 1, 300000, 'admin', '2016-07-06 15:25:29', NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS profil (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO profil (id, `code`, libelle, loginpersist, datepersist) VALUES
(1, 'ROLE_AVOCAT', 'Avocat', NULL, NULL),
(2, 'ROLE_COLLABORATEUR', 'Avocat Correspondant', NULL, NULL),
(3, 'ROLE_COMPTABLE', 'Comptable', NULL, NULL),
(4, 'ROLE_SECRETAIRE', 'Secrétaire', NULL, NULL),
(5, 'ROLE_STAGIAIRE', 'Avocat Stagiaire', NULL, NULL),
(6, 'ROLE_USER', 'Juriste Collaborateur', NULL, NULL),
(7, 'ROLE_ADMIN', 'Administrateur', NULL, NULL);

CREATE TABLE IF NOT EXISTS qualiteaffaire (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO qualiteaffaire (id, libelle, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 'Licenciement abusif', 'admin', '2016-06-30 17:27:48', 'admin', '2016-07-03 16:18:05', 1),
(2, 'Demandeur', 'admin', '2016-07-03 16:18:23', NULL, NULL, 0),
(3, 'Vol à main armée', 'admin', '2016-06-30 17:28:10', 'admin', '2016-07-03 16:18:00', 1),
(4, 'Légitime défense', 'admin', '2016-06-30 17:28:17', 'admin', '2016-07-03 16:18:10', 1),
(5, 'Fraude', 'admin', '2016-06-30 17:28:25', 'admin', '2016-07-03 16:18:14', 1),
(6, 'Défendeur', 'admin', '2016-07-03 16:18:31', NULL, NULL, 0),
(7, 'Appelant', 'admin', '2016-07-10 15:51:13', NULL, NULL, 0),
(8, 'Intimé', 'admin', '2016-07-10 15:51:19', NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS reglementaffaire (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exercice_id` int(11) DEFAULT NULL,
  `modereglement_id` int(11) DEFAULT NULL,
  `affaire_id` int(11) DEFAULT NULL,
  `montantregelement` int(11) DEFAULT NULL,
  `montantrestant` int(11) DEFAULT NULL,
  `datereglement` datetime DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `piecereglement_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_190A6DD5CA2A333E` (`piecereglement_id`),
  KEY `IDX_190A6DD589D40298` (`exercice_id`),
  KEY `IDX_190A6DD55D39DCF4` (`modereglement_id`),
  KEY `IDX_190A6DD5F082E755` (`affaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO reglementaffaire (id, exercice_id, modereglement_id, affaire_id, montantregelement, montantrestant, datereglement, loginpersist, datepersist, logindelete, datedelete, estdelete, piecereglement_id) VALUES
(1, 1, 2, 1, 180000, NULL, '2016-07-13 00:00:00', 'admin', '2016-07-07 23:06:59', NULL, NULL, 0, NULL),
(2, 1, 3, 1, 300000, NULL, '2016-07-14 00:00:00', 'admin', '2016-07-07 23:07:51', NULL, NULL, 0, NULL),
(4, 1, 3, 2, 500000, NULL, '2016-07-07 00:00:00', 'admin', '2016-07-07 23:32:31', 'admin', '2016-07-10 09:08:16', 1, NULL),
(6, 1, 3, 2, 200000, NULL, '2016-07-13 00:00:00', 'admin', '2016-07-07 23:35:50', 'admin', '2016-07-10 09:08:16', 1, NULL),
(7, 1, 2, 2, 1300000, NULL, '2016-07-19 00:00:00', 'admin', '2016-07-07 23:36:25', 'admin', '2016-07-10 09:08:16', 1, NULL);

CREATE TABLE IF NOT EXISTS rubriquecharge (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO rubriquecharge (id, libelle, loginpersist, datepersist, logindelete, datedelete, estdelete, `code`) VALUES
(1, 'Electricité', 'admin', '2016-06-30 18:02:47', NULL, NULL, 0, '6144'),
(2, 'Achat de matériels', 'admin', '2016-06-30 18:02:57', NULL, NULL, 0, '514'),
(3, 'Charge du personnel', 'admin', '2016-06-30 18:02:40', NULL, NULL, 0, '6010');

CREATE TABLE IF NOT EXISTS tacheaffaire (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affaire_id` int(11) DEFAULT NULL,
  `agentexpediteur_id` int(11) DEFAULT NULL,
  `agentdestinataire_id` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateassignee` datetime DEFAULT NULL,
  `estvue` tinyint(1) DEFAULT NULL,
  `datevue` datetime DEFAULT NULL,
  `estresolue` tinyint(1) DEFAULT NULL,
  `notedestinataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_89F0C09DF082E755` (`affaire_id`),
  KEY `IDX_89F0C09D3C24B203` (`agentexpediteur_id`),
  KEY `IDX_89F0C09D2D88F499` (`agentdestinataire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tacheaffaire (id, affaire_id, agentexpediteur_id, agentdestinataire_id, note, dateassignee, estvue, datevue, estresolue, notedestinataire, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(2, 3, 1, 3, 'fooookkkk', '2016-07-10 10:49:32', 0, NULL, 0, NULL, 'admin', '2016-07-10 10:49:32', NULL, NULL, 0),
(3, 5, 1, 1, 'rtqhrhrtrqthtr', '2016-07-10 16:14:49', 0, NULL, 0, NULL, 'admin', '2016-07-10 16:14:49', NULL, NULL, 0),
(4, 5, 1, 3, 'jhgkhjfhgfgh', '2016-07-10 18:17:54', 0, NULL, 0, NULL, 'admin', '2016-07-10 18:17:54', NULL, NULL, 0);

CREATE TABLE IF NOT EXISTS tacheaudience (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tacheaffaire_id` int(11) DEFAULT NULL,
  `agentenregistree_id` int(11) DEFAULT NULL,
  `agentdestinataire_id` int(11) DEFAULT NULL,
  `dateEnregistree` datetime DEFAULT NULL,
  `estvue` tinyint(1) DEFAULT NULL,
  `datevue` datetime DEFAULT NULL,
  `estparticipee` tinyint(1) DEFAULT NULL,
  `dateparticipee` date DEFAULT NULL,
  `estresolue` tinyint(1) DEFAULT NULL,
  `notedestinataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conclusion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43D34BD01C7179BC` (`agentenregistree_id`),
  KEY `IDX_43D34BD02D88F499` (`agentdestinataire_id`),
  KEY `IDX_43D34BD0E5CDCB48` (`tacheaffaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tacheaudience (id, tacheaffaire_id, agentenregistree_id, agentdestinataire_id, dateEnregistree, estvue, datevue, estparticipee, dateparticipee, estresolue, notedestinataire, loginpersist, datepersist, logindelete, datedelete, estdelete, observation, motif, conclusion) VALUES
(1, 4, 1, 3, '2016-07-10 19:24:15', NULL, NULL, NULL, '2016-07-13', 0, 'rthtyhytehytnynytnyt', NULL, '2016-07-10 19:24:15', NULL, NULL, 0, NULL, 'ytnytnytnty', NULL),
(2, 4, 2, 3, '2016-07-10 19:24:19', NULL, NULL, NULL, '2016-07-13', 0, 'rthtyhytehytnynytnyt', NULL, '2016-07-10 19:24:19', NULL, NULL, 0, NULL, 'ytnytnytnty', NULL),
(4, 3, 1, 3, '2016-07-12 23:33:54', NULL, NULL, NULL, '2016-07-13', 0, 'gregrhre', NULL, '2016-07-12 23:33:54', NULL, NULL, 0, NULL, 'gfngfn', NULL),
(5, 3, 1, 1, '2016-07-13 01:06:32', NULL, NULL, NULL, '2016-07-13', 0, 'hererherhe', NULL, '2016-07-13 01:06:32', NULL, NULL, 0, NULL, 'herhreher', NULL),
(7, 3, 1, 1, '2016-07-16 18:25:39', NULL, NULL, NULL, '2016-07-16', 1, 'tyntynyt', NULL, '2016-07-16 18:25:39', NULL, NULL, 0, 'ntrntrnrtntrntrntrn\r\nrtnrtntrnr\r\nntrnrtntrn\r\ntrntrnrt', 'yjtjdt', ';fjh,dngnxtrnrtnrtntr\r\ntrntrnrtssrtntrntrntrntrntrnrt');

CREATE TABLE IF NOT EXISTS temoinaudience (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tacheaudience_id` int(11) DEFAULT NULL,
  `nomcomplet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactcomplet` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `propostemoin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadversaire` tinyint(1) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65C91D31E79FE5E3` (`tacheaudience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) DEFAULT NULL,
  `profil_id` int(11) NOT NULL,
  `photopersonnel_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `user_isconnect` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D6493414710B` (`agent_id`),
  UNIQUE KEY `UNIQ_8D93D6494C3ACE57` (`photopersonnel_id`),
  KEY `IDX_8D93D649275ED078` (`profil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (id, agent_id, profil_id, photopersonnel_id, username, username_canonical, email, email_canonical, enabled, salt, `password`, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at, user_isconnect) VALUES
(1, 1, 7, NULL, 'admin', 'admin', 'faviem2012@gmail.com', 'faviem2012@gmail.com', 1, '9h1hdf3j8f0gc8c40wc8kskkokwcw8', '047Kv9N36fd29IQrfsXSXxe9jqzK+0GZaTNE2mLbBsdCRp2ng//Ead4opg4FCaEaCf6bJwEil7h0VyMndxV/Xw==', '2016-07-18 19:16:05', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '0'),
(6, 2, 2, NULL, 'pro', 'pro', 'pro@pro.com', 'pro@pro.com', 0, '96oqjajam78kssgcooc800c4g0os0c0', 'lKWamS8M4BaFBfm0ilZSNcFKt0n34vTvRXBgLxyJVCIZqlMU1MUGBafoKkHSvclLg0NmOQk6ucu00OnGXkfhKA==', '2016-06-30 23:55:21', 1, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '0'),
(7, 3, 4, NULL, 'franck', 'franck', 'franck@yahoo.com', 'franck@yahoo.com', 1, '32fari8i12skws00k0ok4k44kg08kkw', 'bmLD89Et7/cG+LmRQ0TglcpjCCDkw8b7f12DX1L8yNreqKr+fdszI1/CtnKzoEeL/GEqydMdjDZK0BDKhpakdw==', '2016-07-13 22:01:23', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1');

CREATE TABLE IF NOT EXISTS ville (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO ville (id, nomville, loginpersist, datepersist, logindelete, datedelete, estdelete) VALUES
(1, 'Cotonou', 'admin', '2016-06-29 23:12:15', NULL, NULL, 0),
(2, 'Parakou', 'admin', '2016-06-29 23:12:42', 'admin', '2016-06-29 23:30:28', 1),
(3, 'Porto-Novo', 'admin', '2016-06-29 23:14:40', 'admin', '2016-06-30 16:17:59', 1),
(4, 'Parakou', 'admin', '2016-06-30 15:53:43', NULL, NULL, 0),
(5, 'Calavi', 'admin', '2016-06-30 15:53:58', NULL, NULL, 0),
(6, 'Ouidah', 'admin', '2016-06-30 16:18:27', NULL, NULL, 0);


ALTER TABLE adversairephysique
  ADD CONSTRAINT `FK_18E36910A6E44244` FOREIGN KEY (`pays_id`) REFERENCES pays (`id`),
  ADD CONSTRAINT `FK_18E36910A73F0036` FOREIGN KEY (`ville_id`) REFERENCES ville (`id`);

ALTER TABLE affaire
  ADD CONSTRAINT `FK_9C3F18EF4E8EC5E9` FOREIGN KEY (`qualiteaffaire_id`) REFERENCES qualiteaffaire (`id`),
  ADD CONSTRAINT `FK_9C3F18EF89D40298` FOREIGN KEY (`exercice_id`) REFERENCES Exercice (`id`),
  ADD CONSTRAINT `FK_9C3F18EFA05FF789` FOREIGN KEY (`natureaffaire_id`) REFERENCES natureaffaire (`id`),
  ADD CONSTRAINT `FK_9C3F18EFA0CF2AA1` FOREIGN KEY (`clientphysique_id`) REFERENCES clientphysique (`id`),
  ADD CONSTRAINT `FK_9C3F18EFD38DB6BD` FOREIGN KEY (`juridiction_id`) REFERENCES juridiction (`id`),
  ADD CONSTRAINT `FK_9C3F18EFF75B0574` FOREIGN KEY (`adversairephysique_id`) REFERENCES adversairephysique (`id`);

ALTER TABLE agent
  ADD CONSTRAINT `FK_268B9C9DA6E44244` FOREIGN KEY (`pays_id`) REFERENCES pays (`id`),
  ADD CONSTRAINT `FK_268B9C9DA73F0036` FOREIGN KEY (`ville_id`) REFERENCES ville (`id`),
  ADD CONSTRAINT `FK_268B9C9DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE avocatadverse
  ADD CONSTRAINT `FK_27E9ADD2A6E44244` FOREIGN KEY (`pays_id`) REFERENCES pays (`id`),
  ADD CONSTRAINT `FK_27E9ADD2A73F0036` FOREIGN KEY (`ville_id`) REFERENCES ville (`id`),
  ADD CONSTRAINT `FK_27E9ADD2F082E755` FOREIGN KEY (`affaire_id`) REFERENCES affaire (`id`);

ALTER TABLE chargecabinet
  ADD CONSTRAINT `FK_807D6EC54F9A639B` FOREIGN KEY (`piececharge_id`) REFERENCES piececharge (`id`),
  ADD CONSTRAINT `FK_807D6EC589D40298` FOREIGN KEY (`exercice_id`) REFERENCES Exercice (`id`),
  ADD CONSTRAINT `FK_807D6EC5F2338E` FOREIGN KEY (`rubriquecharge_id`) REFERENCES rubriquecharge (`id`);

ALTER TABLE clientphysique
  ADD CONSTRAINT `FK_B98C8DE7A6E44244` FOREIGN KEY (`pays_id`) REFERENCES pays (`id`),
  ADD CONSTRAINT `FK_B98C8DE7A73F0036` FOREIGN KEY (`ville_id`) REFERENCES ville (`id`);

ALTER TABLE discussionreunion
  ADD CONSTRAINT `FK_F44F18D93414710B` FOREIGN KEY (`agent_id`) REFERENCES agent (`id`);

ALTER TABLE noteredigee
  ADD CONSTRAINT `FK_1D158E563414710B` FOREIGN KEY (`agent_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_1D158E5659F845EF` FOREIGN KEY (`categorienote_id`) REFERENCES categorienote (`id`);

ALTER TABLE partagernote
  ADD CONSTRAINT `FK_F6B4131F2D88F499` FOREIGN KEY (`agentdestinataire_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_F6B4131F3C24B203` FOREIGN KEY (`agentexpediteur_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_F6B4131FC6ADC601` FOREIGN KEY (`noteredigee_id`) REFERENCES noteredigee (`id`);

ALTER TABLE pieceaffaire
  ADD CONSTRAINT `FK_BF7EF43DF082E755` FOREIGN KEY (`affaire_id`) REFERENCES affaire (`id`);

ALTER TABLE pieceaudience
  ADD CONSTRAINT `FK_9533660CE79FE5E3` FOREIGN KEY (`tacheaudience_id`) REFERENCES tacheaudience (`id`);

ALTER TABLE piecenote
  ADD CONSTRAINT `FK_31CBAF68C6ADC601` FOREIGN KEY (`noteredigee_id`) REFERENCES noteredigee (`id`);

ALTER TABLE piecereglement
  ADD CONSTRAINT `FK_F156EBC3DD85CE06` FOREIGN KEY (`reglementaffaire_id`) REFERENCES reglementaffaire (`id`);

ALTER TABLE previsioncharge
  ADD CONSTRAINT `FK_F2E9C21B89D40298` FOREIGN KEY (`exercice_id`) REFERENCES Exercice (`id`),
  ADD CONSTRAINT `FK_F2E9C21BF2338E` FOREIGN KEY (`rubriquecharge_id`) REFERENCES rubriquecharge (`id`);

ALTER TABLE reglementaffaire
  ADD CONSTRAINT `FK_190A6DD55D39DCF4` FOREIGN KEY (`modereglement_id`) REFERENCES modereglement (`id`),
  ADD CONSTRAINT `FK_190A6DD589D40298` FOREIGN KEY (`exercice_id`) REFERENCES Exercice (`id`),
  ADD CONSTRAINT `FK_190A6DD5CA2A333E` FOREIGN KEY (`piecereglement_id`) REFERENCES piecereglement (`id`),
  ADD CONSTRAINT `FK_190A6DD5F082E755` FOREIGN KEY (`affaire_id`) REFERENCES affaire (`id`);

ALTER TABLE tacheaffaire
  ADD CONSTRAINT `FK_89F0C09D2D88F499` FOREIGN KEY (`agentdestinataire_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_89F0C09D3C24B203` FOREIGN KEY (`agentexpediteur_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_89F0C09DF082E755` FOREIGN KEY (`affaire_id`) REFERENCES affaire (`id`);

ALTER TABLE tacheaudience
  ADD CONSTRAINT `FK_43D34BD01C7179BC` FOREIGN KEY (`agentenregistree_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_43D34BD02D88F499` FOREIGN KEY (`agentdestinataire_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_43D34BD0E5CDCB48` FOREIGN KEY (`tacheaffaire_id`) REFERENCES tacheaffaire (`id`);

ALTER TABLE temoinaudience
  ADD CONSTRAINT `FK_65C91D31E79FE5E3` FOREIGN KEY (`tacheaudience_id`) REFERENCES tacheaudience (`id`);

ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649275ED078` FOREIGN KEY (`profil_id`) REFERENCES profil (`id`),
  ADD CONSTRAINT `FK_8D93D6493414710B` FOREIGN KEY (`agent_id`) REFERENCES agent (`id`),
  ADD CONSTRAINT `FK_8D93D6494C3ACE57` FOREIGN KEY (`photopersonnel_id`) REFERENCES photopersonnel (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

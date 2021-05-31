-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 31, 2021 la 01:14 PM
-- Versiune server: 10.4.17-MariaDB
-- Versiune PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `play`
--
CREATE DATABASE IF NOT EXISTS `play` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `play`;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rating_no` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `pegi_age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `game`
--

INSERT INTO `game` (`id`, `title`, `url`, `category`, `rating_no`, `rating`, `pegi_age`) VALUES
(1, 'Counter-Strike: Global Offensive', 'https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/', 'FPS', 8, 3, NULL),
(4, 'Arma 3', 'https://store.steampowered.com/app/107410/Arma_3/', 'Action', 1, 2, NULL),
(5, 'Red Dead Redemption 2', 'https://store.steampowered.com/app/1174180/Red_Dead_Redemption_2/', 'OpenWorld', 2, 4, NULL),
(6, 'Terraria', 'https://store.steampowered.com/app/105600/Terraria/', 'OpenWorldSurvivalCraft', 0, 0, NULL);

--
-- Declanșatori `game`
--
DROP TRIGGER IF EXISTS `eraseBeforeGame`;
DELIMITER $$
CREATE TRIGGER `eraseBeforeGame` BEFORE DELETE ON `game` FOR EACH ROW BEGIN
 DELETE FROM tournaments WHERE game_id = OLD.id;
 DELETE FROM user_game WHERE game_id = OLD.id;
DELETE FROM review WHERE game_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `review`
--

INSERT INTO `review` (`id`, `game_id`, `user_id`, `rating`, `comment`) VALUES
(1, 5, 2, 4, 'I love it'),
(3, 1, 5, 4, 'salut, imi place jocul!'),
(4, 1, 5, 4, 'chiar da!'),
(5, 1, 2, 2, 'fainut');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tournaments`
--

DROP TABLE IF EXISTS `tournaments`;
CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `email`, `phone`, `organizer`, `begin_date`, `end_date`, `game_id`) VALUES
(5, 'RDR2 Tournament', 'rdr2@rdr2.com', '12452', 'Cosmin', '2021-04-12', '2021-04-13', 5),
(6, 'Marcelin League', 'marcelin@marcelin.com', '12321', 'Cosmin', '2021-12-15', '2021-12-16', 6),
(9, 'fasd', 'fas', 'fasd', 'fasd', '2011-11-11', '2011-11-11', 5);

--
-- Declanșatori `tournaments`
--
DROP TRIGGER IF EXISTS `eraseBeforeTournament`;
DELIMITER $$
CREATE TRIGGER `eraseBeforeTournament` BEFORE DELETE ON `tournaments` FOR EACH ROW BEGIN
DELETE FROM user_tournament WHERE tournament_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `emailaddress` (`emailaddress`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `emailaddress`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 1),
(2, 'test', 'test', 'test', 'test', 'test@gmail.com', 0);

--
-- Declanșatori `user`
--
DROP TRIGGER IF EXISTS `eraseBeforeUser`;
DELIMITER $$
CREATE TRIGGER `eraseBeforeUser` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
DELETE FROM user_tournament WHERE user_id = OLD.id;
 DELETE FROM user_game WHERE user_id = OLD.id;
DELETE FROM review WHERE user_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_game`
--

DROP TABLE IF EXISTS `user_game`;
CREATE TABLE IF NOT EXISTS `user_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_game_user_id` (`user_id`),
  KEY `fk_user_game_game_id` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `user_game`
--

INSERT INTO `user_game` (`id`, `user_id`, `game_id`) VALUES
(4, 2, 4),
(5, 2, 5),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_tournament`
--

DROP TABLE IF EXISTS `user_tournament`;
CREATE TABLE IF NOT EXISTS `user_tournament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `user_team_name` varchar(255) NOT NULL,
  `user_ign` varchar(255) NOT NULL,
  `user_rank` varchar(255) NOT NULL,
  `user_phone_number` varchar(255) NOT NULL,
  `score` int(101) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `user_tournament`
--

INSERT INTO `user_tournament` (`id`, `user_id`, `tournament_id`, `user_team_name`, `user_ign`, `user_rank`, `user_phone_number`, `score`) VALUES
(1, 2, 5, 'marcelin cel mai fin', 'msf', '1', '123243', 542),
(2, 2, 6, 'asdsa', 'sada', 'sad', '123-456-7890', 21),
(5, 3, 5, 'test', 'fdsa', 'fdsa', '123-456-7890', 41);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `user_game`
--
ALTER TABLE `user_game`
  ADD CONSTRAINT `fk_user_game_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `fk_user_game_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

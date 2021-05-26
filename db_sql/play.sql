-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 05:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `play`
--

-- --------------------------------------------------------

--

-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rating_no` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `title`, `url`, `category`, `rating_no`, `rating`) VALUES
(1, 'Counter-Strike: Global Offensive', 'https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/', 'FPS', 4, 3),
(4, 'Arma 3', 'https://store.steampowered.com/app/107410/Arma_3/', 'Action', 1, 2),
(5, 'Red Dead Redemption 2', 'https://store.steampowered.com/app/1174180/Red_Dead_Redemption_2/', 'OpenWorld', 2, 4),
(6, 'Terraria', 'https://store.steampowered.com/app/105600/Terraria/', 'OpenWorldSurvivalCraft', 0, 0),
(7, 'Apex Legends™', 'https://store.steampowered.com/app/1172470/Apex_Legends/', 'FreetoPlay', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(200) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `game_id`, `user_id`, `rating`, `comment`) VALUES
(1, 5, 2, 4, 'I love it'),
(2, 7, 2, 5, 'Iubesc acest joc!!! <3');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `email`, `phone`, `organizer`, `begin_date`, `end_date`, `game_id`) VALUES
(5, 'RDR2 Tournament', 'rdr2@rdr2.com', '12452', 'Cosmin', '2021-04-12', '2021-04-13', 5),
(6, 'Marcelin League', 'marcelin@marcelin.com', '12321', 'Cosmin', '2021-12-15', '2021-12-16', 6),
(7, 'Mr Brick', 'brick@brick.com', '353153154', 'Bobby3802', '2021-05-26', '2021-05-27', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `emailaddress`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com'),
(2, 'test', 'test', 'test', 'test', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_game`
--

CREATE TABLE `user_game` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_game`
--

INSERT INTO `user_game` (`id`, `user_id`, `game_id`) VALUES
(3, 2, 1),
(4, 2, 4),
(5, 2, 5),
(6, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_tournament`
--

CREATE TABLE `user_tournament` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `user_team_name` varchar(255) NOT NULL,
  `user_ign` varchar(255) NOT NULL,
  `user_rank` varchar(255) NOT NULL,
  `user_phone_number` varchar(255) NOT NULL,
  `score` int(101) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tournament`
--

INSERT INTO `user_tournament` (`id`, `user_id`, `tournament_id`, `user_team_name`, `user_ign`, `user_rank`, `user_phone_number`, `score`) VALUES
(1, 2, 5, 'marcelin cel mai fin', 'msf', '1', '123243', 34),
(2, 2, 6, 'asdsa', 'sada', 'sad', '123-456-7890', 0),
(3, 2, 7, 'LEOFS', 'Legolas', 'Diamond', '123-456-7890', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `emailaddress` (`emailaddress`);

--
-- Indexes for table `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_game_user_id` (`user_id`),
  ADD KEY `fk_user_game_game_id` (`game_id`);

--
-- Indexes for table `user_tournament`
--
ALTER TABLE `user_tournament`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_game`
--
ALTER TABLE `user_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_tournament`
--
ALTER TABLE `user_tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_game`
--
ALTER TABLE `user_game`
  ADD CONSTRAINT `fk_user_game_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `fk_user_game_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

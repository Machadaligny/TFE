-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 05:29 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `IDcomment` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `estimation` int(2) DEFAULT NULL,
  `IDfilm` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`IDcomment`, `commentaire`, `estimation`, `IDfilm`) VALUES
(36, 'Un autre!\r\nVive Tim Burton!', NULL, 6),
(35, 'Pauvre Edward...', NULL, 6),
(33, 'Brillant!', NULL, 3),
(34, 'Emouvant!', NULL, 6),
(37, 'How beautiful!\r\n', NULL, 2),
(38, 'Magnifique', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Titre` varchar(40) NOT NULL,
  `Réalisateur` varchar(20) DEFAULT NULL,
  `Catégorie` varchar(15) DEFAULT NULL,
  `Description` text,
  `URL` varchar(45) DEFAULT NULL,
  `Affiche` varchar(100) DEFAULT NULL,
  `Commentaires` varchar(20000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`ID`, `Titre`, `Réalisateur`, `Catégorie`, `Description`, `URL`, `Affiche`, `Commentaires`) VALUES
(1, 'Batman begins', 'Christopher Nolan', 'Action', 'After training with his mentor, Batman begins his fight to free crime-ridden Gotham City from the corruption that Scarecrow and the League of Shadows have cast upon it.', 'https://www.youtube.com/watch?v=vak9ZLfhGnQ', 'images/Batmanbegins.jpg', NULL),
(2, 'Dirty Dancing', 'Wayne Blair', 'Romance', 'Spending the summer at a Catskills resort with her family, Frances "Baby" Houseman falls in love with the camp\'s dance instructor, Johnny Castle.', 'https://www.youtube.com/watch?v=wcra0-0Gu4U', 'images/DirtyDancing.jpg', NULL),
(3, 'The Matrix', 'Lana&Lilly Wachowski', 'Action', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'https://www.youtube.com/watch?v=Q8g9zL-JL8E', 'images/TheMatrix.jpg', NULL),
(4, 'Charlie & the Chocolate Factory', 'Tim Burton', 'Comedy', 'A young boy wins a tour through the most magnificent chocolate factory in the world, led by the world\'s most unusual candy maker.', 'https://www.youtube.com/watch?v=l8CyS2xKL2E', 'images/Charlie&TheChocolateFactory.jpg', NULL),
(5, 'Monsters, Inc.', 'Pete Docter', 'Animation', 'In order to power the city, monsters have to scare children so that they scream. However, the children are toxic to the monsters, and after a child gets through, 2 monsters realize things may not be what they think.', 'https://www.youtube.com/watch?v=1Tb8Zf8_GGY', 'images/MonstersInc.jpg', NULL),
(6, 'Edward Scissorhands', 'Tim Burton', 'Fantasy', 'A gentle man, with scissors for hands, is brought into a new community after living in isolation.', 'https://www.youtube.com/watch?v=7iTFYsmFV_Q', 'images/EdwardScissorhands.jpg', NULL),
(7, 'Howl\'s moving castle', 'Hayao Miyazaki', 'Animation', 'When an unconfident young woman is cursed with an old body by a spiteful witch, her only chance of breaking the spell lies with a self-indulgent yet insecure young wizard and his companions in his legged, walking castle.', 'https://www.youtube.com/watch?v=iwROgK94zcM', 'images/HowlsMovingCastle.jpg', NULL),
(38, 'ggfsfg', 'gsdf', 'gsdfg', 'gsdfg', 'gsdfg', 'images/thisisus.jpg', NULL),
(39, 'dsdfgddddddf', 'dqsdfsdfq', 'dqsdfsqdf', 'dqsdfsqdfdrsrggggggggf', '', 'images/got.jpg', 'qsdfqsdf');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD UNIQUE KEY `IDcomment` (`IDcomment`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `IDcomment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

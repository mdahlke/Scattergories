-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2014 at 02:52 PM
-- Server version: 5.5.35-1ubuntu1
-- PHP Version: 5.5.9-1+sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scattergories`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `gameID` int(11) NOT NULL AUTO_INCREMENT,
  `winner` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gameID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `1` varchar(100) NOT NULL COMMENT 'THINGS YOU DON''T WANT IN THE HOUST',
  `2` varchar(100) NOT NULL,
  `3` varchar(100) NOT NULL,
  `4` varchar(100) NOT NULL,
  `5` varchar(100) NOT NULL,
  `6` varchar(100) NOT NULL,
  `7` varchar(100) NOT NULL,
  `8` varchar(100) NOT NULL,
  `9` varchar(100) NOT NULL,
  `10` varchar(100) NOT NULL,
  `11` varchar(100) NOT NULL,
  `12` varchar(100) NOT NULL,
  `timesPlayed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `timesPlayed`) VALUES
(1, 'A BOY''S NAME', 'U.S CITIES', 'THINGS THAT ARE COLD', 'THINGS YOU DON''T WANT IN THE HOUSE', 'PRO SPORTS TEMS', 'INSECTS', 'THING IN A COFFEE BAR', 'THINGS YOU MIX UP', 'TV SHOWS', 'THINGS FOUND IN THE OCEAN', 'KINDS OF WEATHER', 'FOODS THAT KIDS HATE', 5),
(2, 'FAMOUS FEMALES', 'MEDICINE/DRUGS', 'MACHINES', 'HOBBIES', 'ACRONYMS (E.G., NASA)', 'THINGS YOU PLUG IN', 'ANIMALS', 'LANGUAGES', 'THINGS YOU GRAB ON YOUR WAY OUT THE DOOR', 'JUNK FOOD', 'THINGS THAT GROW', 'THINGS IN AN ARCADE', 5),
(3, 'ARTICLES OF CLOTHING', 'DESSERTS', 'CAR PARTS', 'THINGS AT A GAS STATION', 'ATLETES', '4-LETTER WORDS', 'THINGS YOU FOLD', 'THINGS IN A JUNK DRAWER', 'THINGS YOU DO ONLINE', 'THINGS AT THE BEACH', 'THINGS YOU DREAM ABOUT', 'TOOLS', 5),
(4, 'HEROES', 'GIFTS/PRESENTS', 'TERMS OF ENDEARMENT', 'KINDS OF DANCES', 'THINGS THAT ARE BLACK', 'VEHICLES', 'THINGS FOUND IN AN ARENA', 'THINGS PEOPLE GOSSIP ABOUT', 'COLORS', 'THINGS IN A SOUVENIR SHOP', 'ITEMS IN YOUR PURSE/WALLET', 'WORLD RECORDS', 5),
(5, 'SANDWICHES', 'THINGS YOU CAN DO WITH YOUR FEET', 'WORLD LEADERS/POLITICIANS', 'SCHOOL SUBJECTS', 'EXCUSES FOR BEING LATE', 'ICE CREAM FLAVORS', 'THINGS WITH BALLS', 'TELEVISION STARS', 'THINGS IN A PARK', 'FOREIGN CITIES', 'STONES/GEMS', 'MUSICAL INSTRUMENTS', 5),
(6, 'NICKNAMES', 'THINGS IN THE SKY', 'THINGS WITH WINDOWS', 'COLLEGES/UNIVERSITIES', 'FISH', 'COUNTRIES', 'THINGS THAT HAVE SPOTS', 'THINGS THAT SMELL BAD', 'THINGS YOU''RE AFRAID OF', 'TERMS OF MEASUREMENT', 'ITEMS IN THIS ROOM', 'BOOK TITLES', 5),
(7, 'FICTIONAL CHARACTERS', 'PLACES TO GO ON A DATE', 'MAGAZINES', 'CAPITALS', 'KINDS OF CANDY', 'THINGS YOU SAVE UP TO BUY', 'FOOTWEAR', 'SOMETHING YOU KEEP HIDDEN', 'ITEMS IN A SUITCASE', 'THINGS WITH TAILS', 'SPORTS EQUIPMENT', 'CRIMES', 6),
(8, 'THINGS THAT ARE STICKY', 'AWARDS/CEREMONIES', 'CARS', 'SPICES/HERBS', 'BAD HABITS', 'COSMETICS/TOILETRIES', 'CELEBRITIES', 'THINGS TO DO WITH LEFTOVER TURKEY', 'REPTILES/AMPHIBIANS', 'FADS', 'LEISURE ACTIVITIES', 'THINGS YOU''RE ALLERGIC TO', 5),
(9, '', '', '', '', '', '', '', '', '', '', '', '', 5),
(10, '', '', '', '', '', '', '', '', '', '', '', '', 5),
(11, '', '', '', '', '', '', '', '', '', '', '', '', 5),
(12, '', '', '', '', '', '', '', '', '', '', '', '', 5),
(13, '', '', '', '', '', '', '', '', '', '', '', '', 5),
(14, '', '', '', '', '', '', '', '', '', '', '', '', 6),
(15, '', '', '', '', '', '', '', '', '', '', '', '', 5),
(16, '', '', '', '', '', '', '', '', '', '', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE IF NOT EXISTS `round` (
  `roundID` int(11) NOT NULL AUTO_INCREMENT,
  `gameID` int(11) NOT NULL,
  `roundNumber` tinyint(1) NOT NULL,
  `1` varchar(50) NOT NULL,
  `2` varchar(50) NOT NULL,
  `3` varchar(50) NOT NULL,
  `4` varchar(50) NOT NULL,
  `5` varchar(50) NOT NULL,
  `6` varchar(50) NOT NULL,
  `7` varchar(50) NOT NULL,
  `8` varchar(50) NOT NULL,
  `9` varchar(50) NOT NULL,
  `10` varchar(50) NOT NULL,
  `11` varchar(50) NOT NULL,
  `12` varchar(50) NOT NULL,
  PRIMARY KEY (`roundID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

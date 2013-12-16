-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2013 at 09:05 PM
-- Server version: 5.1.69
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `debu223`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='list of games and their players. player1 is owner of game' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game`, `size`) VALUES
(1, 'asdf', '5'),
(2, '4e5a2ab257ddb476cb30263502213171', '6'),
(3, 'de925124fc23064f71b41509674a4847', '10'),
(4, 'f59368bda85e2e5685d3514f5a8b5c6f', '5');

-- --------------------------------------------------------

--
-- Table structure for table `moves`
--

CREATE TABLE IF NOT EXISTS `moves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(255) NOT NULL,
  `char` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `moves`
--

INSERT INTO `moves` (`id`, `game`, `char`, `location`) VALUES
(1, 'asdf', 'X', '13'),
(2, 'asdf', 'O', '14'),
(3, 'asdf', 'T', '8'),
(4, 'asdf', 'X', '17'),
(5, 'de925124fc23064f71b41509674a4847', 'X', '35'),
(6, 'asdf', 'O', '18'),
(7, 'asdf', 'T', '12'),
(8, 'asdf', 'X', '19'),
(9, 'asdf', 'O', '15'),
(10, 'asdf', 'T', '25'),
(11, 'f59368bda85e2e5685d3514f5a8b5c6f', 'X', '19'),
(12, 'f59368bda85e2e5685d3514f5a8b5c6f', 'O', '12'),
(13, 'de925124fc23064f71b41509674a4847', 'O', '12'),
(14, 'de925124fc23064f71b41509674a4847', 'T', '1'),
(15, 'de925124fc23064f71b41509674a4847', 'X', '1'),
(16, 'asdf', 'X', '9'),
(17, 'asdf', 'O', '6'),
(18, 'asdf', 'T', '7'),
(19, 'asdf', 'X', '10'),
(20, 'asdf', 'O', '24'),
(21, 'asdf', 'T', '11'),
(22, 'asdf', 'X', '23'),
(23, 'asdf', 'O', '5'),
(24, 'asdf', 'T', '4'),
(25, 'asdf', 'X', '21'),
(26, 'asdf', 'O', '20'),
(27, 'asdf', 'T', '16'),
(28, 'asdf', 'X', '22'),
(29, 'asdf', 'O', '3'),
(30, 'asdf', 'T', '2'),
(31, 'asdf', 'X', '1');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player` int(11) NOT NULL,
  `game` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player`, `game`) VALUES
(1, 1, 'asdf'),
(2, 2, 'asdf'),
(3, 4, 'asdf'),
(4, 1, '4e5a2ab257ddb476cb30263502213171'),
(5, 2, '4e5a2ab257ddb476cb30263502213171'),
(6, 3, '4e5a2ab257ddb476cb30263502213171'),
(7, 1, 'de925124fc23064f71b41509674a4847'),
(8, 3, 'de925124fc23064f71b41509674a4847'),
(9, 2, 'de925124fc23064f71b41509674a4847'),
(10, 1, 'f59368bda85e2e5685d3514f5a8b5c6f'),
(11, 2, 'f59368bda85e2e5685d3514f5a8b5c6f'),
(12, 4, 'f59368bda85e2e5685d3514f5a8b5c6f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `ip`) VALUES
(1, 'Derek', '6dbd0fe19c9a301c4708287780df41a2', '65.23.62.123'),
(2, 'NotDerek', '6dbd0fe19c9a301c4708287780df41a2', '74.138.155.255'),
(3, 'Derek2', '6dbd0fe19c9a301c4708287780df41a2', '1234'),
(4, 'AnthonySaunders', 'a873b70b93a2c992f173592f6a29d9de', '74.141.250.67'),
(5, 'jwryle2', '5f4dcc3b5aa765d61d8327deb882cf99', '74.137.245.86');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

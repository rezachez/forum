-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2012 at 06:27 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `noteId` int(11) NOT NULL,
  `content` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userId`, `noteId`, `content`, `dateCreation`) VALUES
(2, 1, 1, 'qwer', '2012-09-12 22:51:01'),
(3, 1, 1, 'check\r\n', '2012-09-12 22:52:30'),
(4, 1, 1, 'buy', '2012-09-12 22:52:34'),
(5, 3, 1, 'Helo', '2012-09-16 15:33:20'),
(6, 3, 1, 'Ð§Ðµ ÐºÐ°Ðº?', '2012-09-16 15:33:40'),
(7, 3, 1, 'BUY', '2012-09-16 16:03:22'),
(8, 3, 1, 'check', '2012-09-16 16:04:38'),
(9, 3, 1, 'qwer', '2012-09-16 16:06:34'),
(10, 3, 1, 'ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ°', '2012-09-16 16:10:02'),
(11, 3, 6, 'ÐŸÑ€Ð²Ð¸ÐµÑ‚', '2012-09-16 16:11:55'),
(12, 3, 4, 'ÐŸÑ€Ð¾Ð²ÐµÑ€ÐºÐ°', '2012-09-16 16:12:05'),
(13, 3, 4, 'Ð•Ñ‰Ðµ Ð¾Ð´Ð½Ð°', '2012-09-16 16:12:10'),
(14, 1, 1, 'ÐŸÑ€Ð¸Ð²ÐµÑ‚', '2012-09-16 16:12:26'),
(15, 1, 5, 'ÐžÐ³Ð°', '2012-09-16 16:12:38'),
(16, 2, 7, 'ÐŸÐ¾ÐºÐ°', '2012-09-16 16:13:14'),
(17, 2, 6, 'Check', '2012-09-16 16:43:47'),
(18, 4, 10, 'Hi', '2012-09-16 23:22:06'),
(19, 4, 11, 'fff', '2012-09-16 23:30:21'),
(20, 4, 11, 'eee', '2012-09-16 23:31:14'),
(21, 4, 13, 'Ð°Ð°Ð°Ð¹Ñ†ÑƒÐº', '2012-09-16 23:40:57'),
(22, 4, 13, 'Ñ„Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð°', '2012-09-16 23:42:55'),
(23, 4, 13, 'С„С‹РІР°С„С‹РІР°', '2012-09-16 23:43:35'),
(24, 4, 13, 'ÐºÐºÐº', '2012-09-16 23:44:28'),
(25, 4, 13, 'qwer', '2012-09-16 23:51:13'),
(26, 4, 13, 'Ð¹Ñ†ÑƒÐº', '2012-09-16 23:51:17'),
(27, 1, 12, 'ÐŸÑ€Ð¸Ð²ÐµÑ‚. Ð•Ð±Ð°Ð½ÑŒÐºÐ¾. Ð§Ñ‚Ð¾ Ð·Ð° Ð°Ð´, Ñ‚ÑƒÑ‚?', '2012-09-17 01:02:35'),
(28, 1, 14, 'Ð¹Ðº Ñ†ÑƒÐº Ð¹Ñ†ÑƒÐº ', '2012-09-17 01:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `commentCount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `userId`, `content`, `dateCreation`, `commentCount`) VALUES
(1, 1, '<p>hi</p>', '2012-09-05 19:19:46', 3),
(2, 1, '<p>hi</p>', '2012-09-05 19:21:37', 0),
(3, 1, '<p>buy</p>', '2012-09-05 19:21:45', 0),
(4, 1, '<p>check</p><p><br></p>', '2012-09-05 19:51:53', 2),
(5, 1, '<p>Ð¿Ñ€Ð¾Ð²ÐµÑ€ÐºÐ° Ñ€ÑƒÑÑÐºÐ¸Ñ…</p>', '2012-09-05 19:52:07', 1),
(6, 3, '<p>Hello</p>', '2012-09-15 12:28:48', 2),
(7, 2, '<p>ÐŸÑ€Ð²Ð¸ÐµÑ‚</p>', '2012-09-16 16:13:09', 1),
(8, 1, '<p>ÐŸÑ€Ð¸Ð²ÐµÑ‚ ÐŸÐ Ð¾Ð²ÐµÑ€ÐºÐ°</p>', '2012-09-16 23:05:33', 0),
(9, 4, '<p>CHECK</p>', '2012-09-16 23:18:00', 0),
(10, 4, '<p>CHECK@!</p>', '2012-09-16 23:21:53', 1),
(11, 4, '<p>fff</p>', '2012-09-16 23:30:11', 2),
(12, 4, '<p>ee</p>', '2012-09-16 23:36:07', 1),
(13, 4, '<p>Ð¿Ñ€Ð¾Ð²ÐµÑ€ÐºÐ° Ñ€ÑƒÑÑÐºÐ¸Ñ…</p>', '2012-09-16 23:40:40', 6),
(14, 1, '<p><div style="text-align: center;"><span style="line-height: 20px;">Ð²Ñ„Ñ‹Ð²Ñ„Ñ‹Ð²Ð° Ñ‹Ð²Ñ„Ð°Ñ„</span></div><div style="text-align: center;"><span style="line-height: 20px;">Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð°</span></div><div style="text-align: left;"><span style="line-height: 20px;">Ð°Ñ„Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð° Ñ„Ñ‹Ð²Ð° Ñ„Ñ‹Ð²Ð° Ñ‹Ñ„Ð² Ð°Ñ„Ñ‹Ð² Ð°Ñ„Ñ‹Ð² Ð° Ñ„Ñ‹Ð²Ð° Ñ‹Ñ„Ð² &nbsp;Ñ‹Ñ„Ð²Ð° Ñ„Ñ‹Ð²Ð° Ñ„Ñ‹Ð² Ð°Ñ„Ñ‹Ð² Ð°Ñ„ Ñ‹Ð²Ð° Ñ„Ñ‹Ð²Ð° Ñ„Ñ‹Ð² Ð° Ñ„Ñ‹Ð²Ð° &nbsp;Ñ‹Ñ„Ð²Ð° Ñ‹Ð²Ñ„ Ñ‹Ð² Ñ„Ñ‹Ð²Ð° Ñ‹Ð² Ð° Ñ„Ñ‹Ð²Ð° Ñ„Ñ‹Ð² Ð°Ñ„Ñ‹Ð² Ð° Ñ‹Ð²Ð° Ñ‹Ð²&nbsp;</span></div><hr>&nbsp;Ñ„Ñ‹Ð²Ð° Ñ‹Ñ„Ð²Ð° Ñ„Ñ‹Ð²Ð°&nbsp;<div style="text-align: left;"><span style="line-height: 20px;">Ð°</span></div></p>', '2012-09-17 01:39:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateRegistration` datetime NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notesCount` int(11) NOT NULL,
  `commentsCount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `dateRegistration`, `avatar`, `notesCount`, `commentsCount`) VALUES
(1, 'qwer', '1234', 'Pavel Lysenko', '2012-09-07 21:28:35', './files/images/avatars/1.jpg', 2, 2),
(2, 'qwer1', '1234', 'Anonymous', '2012-09-14 20:18:01', './files/images/avatars/2.jpg', 3, 0),
(3, 'qwer2', '1234', 'Anonymous', '2012-09-15 12:28:36', './files/images/avatars/anonymous.png', 4, 0),
(4, 'qwer4', '1234', 'Anonymous', '2012-09-16 23:17:44', './files/images/avatars/anonymous.png', 5, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

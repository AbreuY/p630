-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2013 at 04:21 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p630`
--

-- --------------------------------------------------------

--
-- Table structure for table `p630_admin_details`
--

CREATE TABLE IF NOT EXISTS `p630_admin_details` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_lang` int(10) unsigned NOT NULL DEFAULT '0',
  `last_name` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_passwd_gen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_date` datetime NOT NULL,
  `upd_date` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `p630_admin_details`
--

INSERT INTO `p630_admin_details` (`admin_id`, `id_lang`, `last_name`, `first_name`, `email`, `username`, `password`, `last_passwd_gen`, `add_date`, `upd_date`, `active`) VALUES
(28, 1, 'Rao', 'Krishna', 'krishna@panaceatek.com', 'krishna', '0192023a7bbd73250516f069df18b500', '2012-12-01 09:38:10', '2012-12-01 09:38:10', '2012-12-01 09:38:10', 1),
(26, 1, 'Lanjewar', 'Vaibhav', 'vaibhav@panaceatek.com', 'admin', '0192023a7bbd73250516f069df18b500', '2012-12-10 09:20:19', '2012-12-01 06:58:55', '2012-12-10 09:20:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p630_advisor_availability`
--

CREATE TABLE IF NOT EXISTS `p630_advisor_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advisor_id` int(11) NOT NULL,
  `time_id` smallint(3) NOT NULL,
  `monday` enum('No','Yes') NOT NULL,
  `tuesday` enum('No','Yes') NOT NULL,
  `wednesday` enum('No','Yes') NOT NULL,
  `thursday` enum('No','Yes') NOT NULL,
  `friday` enum('No','Yes') NOT NULL,
  `saturday` enum('No','Yes') NOT NULL,
  `sunday` enum('No','Yes') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advisor_id` (`advisor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=380 ;

--
-- Dumping data for table `p630_advisor_availability`
--

INSERT INTO `p630_advisor_availability` (`id`, `advisor_id`, `time_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(1, 3, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(2, 3, 1, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(3, 3, 2, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(4, 3, 3, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(5, 3, 4, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(6, 3, 5, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(7, 3, 6, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(8, 3, 7, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(9, 3, 8, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(10, 3, 9, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(11, 3, 10, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(12, 3, 11, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(14, 3, 12, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(15, 3, 13, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(16, 3, 14, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(17, 3, 15, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(18, 3, 16, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(19, 3, 17, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(20, 3, 18, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(21, 3, 19, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(22, 3, 20, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(23, 3, 21, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(24, 3, 22, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(25, 3, 23, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(26, 19, 0, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(27, 19, 1, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(28, 19, 2, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(29, 19, 3, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(30, 19, 4, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(31, 19, 5, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(32, 19, 6, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(33, 19, 7, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(34, 19, 8, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(35, 19, 9, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(36, 19, 10, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(37, 19, 11, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(38, 19, 12, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(39, 19, 13, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(40, 19, 14, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(41, 19, 15, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(42, 19, 16, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(43, 19, 17, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(44, 19, 18, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(45, 19, 19, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(46, 19, 20, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(47, 19, 21, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(48, 19, 22, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(49, 19, 23, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(92, 20, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(93, 20, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(94, 20, 2, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(95, 20, 3, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(96, 20, 4, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(97, 20, 5, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(98, 20, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(99, 20, 7, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(100, 20, 8, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(101, 20, 9, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(102, 20, 10, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No'),
(103, 20, 11, 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(104, 20, 12, 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No'),
(105, 20, 13, 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No'),
(106, 20, 14, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(107, 20, 15, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No'),
(108, 20, 16, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(109, 20, 17, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No'),
(110, 20, 18, 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No'),
(111, 20, 19, 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No'),
(112, 20, 20, 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(113, 20, 21, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No'),
(114, 20, 22, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(115, 20, 23, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(164, 21, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(165, 21, 1, 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No'),
(166, 21, 2, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(167, 21, 3, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(168, 21, 4, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(169, 21, 5, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(170, 21, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(171, 21, 7, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(172, 21, 8, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(173, 21, 9, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(174, 21, 10, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(175, 21, 11, 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(176, 21, 12, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(177, 21, 13, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(178, 21, 14, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(179, 21, 15, 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(180, 21, 16, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(181, 21, 17, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(182, 21, 18, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(183, 21, 19, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(184, 21, 20, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(185, 21, 21, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(186, 21, 22, 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes'),
(187, 21, 23, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(188, 22, 0, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(189, 22, 1, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(190, 22, 2, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(191, 22, 3, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(192, 22, 4, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(193, 22, 5, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(194, 22, 6, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(195, 22, 7, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(196, 22, 8, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(197, 22, 9, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(198, 22, 10, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(199, 22, 11, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(200, 22, 12, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(201, 22, 13, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(202, 22, 14, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(203, 22, 15, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(204, 22, 16, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(205, 22, 17, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(206, 22, 18, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(207, 22, 19, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(208, 22, 20, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(209, 22, 21, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(210, 22, 22, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(211, 22, 23, 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No'),
(212, 26, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(213, 26, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(214, 26, 2, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(215, 26, 3, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(216, 26, 4, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(217, 26, 5, 'No', 'No', 'Yes', 'No', 'No', 'No', 'No'),
(218, 26, 6, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(219, 26, 7, 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(220, 26, 8, 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(221, 26, 9, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(222, 26, 10, 'No', 'No', 'Yes', 'No', 'No', 'No', 'No'),
(223, 26, 11, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(224, 26, 12, 'No', 'No', 'Yes', 'No', 'No', 'No', 'No'),
(225, 26, 13, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(226, 26, 14, 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(227, 26, 15, 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(228, 26, 16, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(229, 26, 17, 'No', 'No', 'Yes', 'No', 'No', 'No', 'No'),
(230, 26, 18, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(231, 26, 19, 'No', 'No', 'Yes', 'No', 'No', 'No', 'No'),
(232, 26, 20, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(233, 26, 21, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(234, 26, 22, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(235, 26, 23, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(236, 23, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(237, 23, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(238, 23, 2, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(239, 23, 3, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(240, 23, 4, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(241, 23, 5, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(242, 23, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(243, 23, 7, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(244, 23, 8, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(245, 23, 9, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(246, 23, 10, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(247, 23, 11, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(248, 23, 12, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No'),
(249, 23, 13, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(250, 23, 14, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(251, 23, 15, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(252, 23, 16, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(253, 23, 17, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No'),
(254, 23, 18, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(255, 23, 19, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(256, 23, 20, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(257, 23, 21, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(258, 23, 22, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(259, 23, 23, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(260, 28, 0, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No'),
(261, 28, 1, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(262, 28, 2, 'No', 'No', 'Yes', 'No', 'No', 'No', 'No'),
(263, 28, 3, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(264, 28, 4, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(265, 28, 5, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(266, 28, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(267, 28, 7, 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(268, 28, 8, 'No', 'No', 'No', 'No', 'No', 'Yes', 'No'),
(269, 28, 9, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(270, 28, 10, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(271, 28, 11, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(272, 28, 12, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(273, 28, 13, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(274, 28, 14, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(275, 28, 15, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(276, 28, 16, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(277, 28, 17, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(278, 28, 18, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(279, 28, 19, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(280, 28, 20, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(281, 28, 21, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(282, 28, 22, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(283, 28, 23, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(284, 29, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(285, 29, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(286, 29, 2, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(287, 29, 3, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(288, 29, 4, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(289, 29, 5, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(290, 29, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(291, 29, 7, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(292, 29, 8, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(293, 29, 9, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(294, 29, 10, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(295, 29, 11, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(296, 29, 12, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(297, 29, 13, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(298, 29, 14, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(299, 29, 15, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(300, 29, 16, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(301, 29, 17, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(302, 29, 18, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(303, 29, 19, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(304, 29, 20, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(305, 29, 21, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(306, 29, 22, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(307, 29, 23, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(332, 37, 0, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(333, 37, 1, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(334, 37, 2, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(335, 37, 3, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(336, 37, 4, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(337, 37, 5, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(338, 37, 6, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(339, 37, 7, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(340, 37, 8, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(341, 37, 9, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(342, 37, 10, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(343, 37, 11, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(344, 37, 12, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(345, 37, 13, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(346, 37, 14, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(347, 37, 15, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(348, 37, 16, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(349, 37, 17, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(350, 37, 18, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(351, 37, 19, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(352, 37, 20, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(353, 37, 21, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(354, 37, 22, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(355, 37, 23, 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(356, 38, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(357, 38, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(358, 38, 2, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(359, 38, 3, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(360, 38, 4, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(361, 38, 5, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(362, 38, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(363, 38, 7, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(364, 38, 8, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(365, 38, 9, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(366, 38, 10, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(367, 38, 11, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(368, 38, 12, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(369, 38, 13, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(370, 38, 14, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(371, 38, 15, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(372, 38, 16, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(373, 38, 17, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(374, 38, 18, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(375, 38, 19, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(376, 38, 20, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(377, 38, 21, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(378, 38, 22, 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(379, 38, 23, 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `p630_advisor_details`
--

CREATE TABLE IF NOT EXISTS `p630_advisor_details` (
  `advisor_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `linkedin_profile_id` varchar(225) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `country` smallint(3) NOT NULL,
  `timezone` int(4) NOT NULL,
  `advisor_status` enum('Inactive','Active','Blocked') NOT NULL,
  `verification_code` varchar(125) NOT NULL,
  `created_date` datetime NOT NULL,
  `verified` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Advisor Verify Satus.',
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL,
  `phone_code` int(11) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `priceWebConsulte` varchar(125) NOT NULL COMMENT 'Consultation Type & Rate',
  `priceEmailConsulte` varchar(125) NOT NULL,
  `bank_code` varchar(225) NOT NULL COMMENT 'Bank Details Info',
  `branch_code` varchar(225) NOT NULL,
  `IBAN_code` varchar(225) NOT NULL,
  `image_path` varchar(30) NOT NULL COMMENT 'Advisor Photo And Next Fields Is For Intro. ',
  `video_path` varchar(225) NOT NULL,
  `qualification` text NOT NULL COMMENT 'Adviasor Qualification Note...',
  `availability_comment` text NOT NULL,
  `my_pitch` text NOT NULL,
  `registration_ip` varchar(255) NOT NULL,
  `is_online` enum('no','yes') NOT NULL,
  `online_login_time` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `upd_date` datetime NOT NULL,
  PRIMARY KEY (`advisor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `p630_advisor_details`
--

INSERT INTO `p630_advisor_details` (`advisor_id`, `username`, `email`, `linkedin_profile_id`, `password`, `first_name`, `last_name`, `dob`, `gender`, `location`, `country`, `timezone`, `advisor_status`, `verification_code`, `created_date`, `verified`, `address`, `city`, `zipcode`, `phone_code`, `contact_no`, `priceWebConsulte`, `priceEmailConsulte`, `bank_code`, `branch_code`, `IBAN_code`, `image_path`, `video_path`, `qualification`, `availability_comment`, `my_pitch`, `registration_ip`, `is_online`, `online_login_time`, `last_login`, `upd_date`) VALUES
(11, '', 'sahil@saaaaa.com', '', 'MTIzNDU2', 'SAhil', 'Shroff', '0000-00-00', '', '', 0, 0, 'Inactive', '', '2012-12-14 14:11:18', 'No', '', '', '', 0, '', '', '', '', '', '', '', '', 'qualllli sdsaduio', '', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '', 'sahil@panaceatek.com', '', 'MTIzNDU2', 'Sahil', 'Shroff', '0000-00-00', '', '', 0, 19, 'Active', 'MjM=:50dad0c0d7a1e:MjM=', '2012-12-25 10:32:53', 'Yes', '', '', '', 1, '', '200.00', '120.00', '', '', '', '50f6763caa446.jpg', '', 'yaday y y yasyd yasdy yasd', 'Comment on availablilty Comment on availablilty Comment on availablilty Comment on availablilty ', 'MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch  MyPitch MyPitch MyPitch MyPitchMy PitchMy Pitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch MyPitch', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-16 09:54:44'),
(37, '', 'vaibhav@panaceatek.com', '', 'dmFpYmhhdjEyMw==', 'Vaibhav', 'Lanjewar', '0000-00-00', '', '', 0, 96, 'Active', 'Mzc=:50f3d213a5a4e:Mzc=', '2013-01-14 09:37:26', 'Yes', '', '', '', 1, '9970363640', '150.00', '100.00', '15246', '1148526', '45875264455', '50f3d377a0c89.jpg', '', 'Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. ', 'Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. ', 'My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. My Pitch Info.. ', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-15 15:26:16'),
(38, '', 'sahilsshroff@gmail.com', 'in.linkedin.com/pub/sahil-shroff/60/80a/7b8/', 'MTExMTExMTE=', 'Sponge', 'Sponge', '0000-00-00', '', '', 0, 17, 'Inactive', 'Mzg=:50f90e0adec26:Mzg=', '2013-01-18 08:55:12', 'Yes', '', '', '', 1, '11111111', '30', '20', '111', '111', '111', '', '', '', 'blah blah blah blah blah blah blah blah blah blah ', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-18 08:58:09'),
(39, '', 'popey@pop.com', '', 'MTExMTExMTE=', 'Popeye', 'DaSailor', '0000-00-00', '', '', 0, 39, 'Inactive', 'Mzk=:50fa9e0e9f928:Mzk=', '2013-01-19 13:21:51', 'Yes', '', '', '', 1, '', '00.00', '00.00', '', '', '', '', '', 'Briefly, what areas would you be able to advise on and Why?Briefly, what areas would you be able to advise on and Why?Briefly, what areas would you be able to advise on and Why?Briefly, what areas would you be able to advise on and Why?sds sd', '', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-01-21 05:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `p630_advisor_education`
--

CREATE TABLE IF NOT EXISTS `p630_advisor_education` (
  `advisor_edu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Education Id Autoincrement.',
  `advisor_id` bigint(11) NOT NULL,
  `school` varchar(225) NOT NULL,
  `degree` varchar(225) NOT NULL,
  `concentration` varchar(225) NOT NULL,
  `graduation_year` varchar(225) NOT NULL,
  `current_students_free_call` enum('0','1') NOT NULL COMMENT 'To current students (Not available yet)',
  `current_students_free_email` enum('0','1') NOT NULL COMMENT 'To current students (Not available yet)',
  `to_alumni_free_call` enum('0','1') NOT NULL COMMENT 'To alumni (Not available yet)',
  `to_alumni_free_email` enum('0','1') NOT NULL COMMENT 'To alumni (Not available yet)',
  `ondate` datetime NOT NULL,
  PRIMARY KEY (`advisor_edu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `p630_advisor_education`
--

INSERT INTO `p630_advisor_education` (`advisor_edu_id`, `advisor_id`, `school`, `degree`, `concentration`, `graduation_year`, `current_students_free_call`, `current_students_free_email`, `to_alumni_free_call`, `to_alumni_free_email`, `ondate`) VALUES
(17, 3, 'University of California, Santa Barbara', 'B.A. Bachelor of Arts, Communications', 'basic', '2012', '1', '1', '1', '1', '2012-12-11 17:45:23'),
(18, 11, 'uni1', 'deg1', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(19, 11, 'uni2', 'deg2', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(20, 11, 'uni3', 'deg3', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(24, 13, '', '', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(25, 14, '', '', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(26, 15, '', '', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(27, 16, '', '', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(28, 17, '', '', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(29, 18, 'dfsdf', 'ddfs', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(128, 19, 'blah blah', 'adadg', 'adgadg', '1234', '1', '1', '1', '1', '2012-12-19 07:19:32'),
(129, 19, 'adgadg', 'adgadg', 'adgadg', 'adgadg', '1', '', '', '1', '2012-12-19 07:19:32'),
(155, 21, 'Pune University', 'saas', '', '', '', '', '', '', '2012-12-25 08:50:42'),
(156, 21, 'Un13', 'De13', '', '', '', '', '', '', '2012-12-25 08:50:42'),
(158, 24, 'Uni1', 'Deg1', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(159, 25, 'Uni1', 'Deg1', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(232, 22, '', 'BE computer science', 'Basic', '2012', '', '', '', '', '2012-12-27 14:47:24'),
(234, 20, 'sadasd', 'asdasdasd', '', '12123', '', '', '', '', '2012-12-28 08:52:05'),
(235, 24, 'BAMU', 'BE(CS)', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(236, 25, '123456', '123456', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00'),
(240, 23, 'Oxford University', 'B. A. Psycology', 'Child Psycology', '1956', '', '', '', '', '2013-01-03 05:12:31'),
(241, 23, 'Hogwards University', 'Bachelor of Arts', 'Dark Arts', '2012', '', '', '', '', '2013-01-03 05:12:31'),
(243, 26, 'asas', 'asasa', '', '1999', '', '', '', '', '2013-01-03 12:48:43'),
(244, 26, 'uni1', 'deg1', '', '2012', '', '', '', '', '2013-01-03 12:48:43'),
(246, 28, 'qwe', 'qwe', '', '1234', '', '', '', '', '2013-01-03 13:37:19'),
(247, 29, 'uni1', 'deg1', '', '1234', '', '', '', '', '2013-01-03 13:50:56'),
(251, 37, 'BAMU', 'BS(CS)', 'Operating System, Coding', '2010', '', '', '', '', '2013-01-14 09:40:55'),
(252, 39, 'MIT', 'Bachelors in Arts', '', '', '0', '0', '0', '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p630_advisor_experience`
--

CREATE TABLE IF NOT EXISTS `p630_advisor_experience` (
  `advisor_exp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Experience Id Autoincrement.',
  `advisor_id` bigint(11) NOT NULL,
  `employer` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `office_country_id` int(11) NOT NULL,
  `state_province_id` int(11) NOT NULL,
  `office_city` varchar(225) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `time_period_type` enum('Work','Internship') NOT NULL,
  `month_from` varchar(30) NOT NULL,
  `month_to` varchar(30) NOT NULL,
  `time_period_from` year(4) NOT NULL,
  `time_period_to` year(4) NOT NULL,
  `description` text NOT NULL,
  `ondate` datetime NOT NULL,
  PRIMARY KEY (`advisor_exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `p630_advisor_experience`
--

INSERT INTO `p630_advisor_experience` (`advisor_exp_id`, `advisor_id`, `employer`, `title`, `office_country_id`, `state_province_id`, `office_city`, `industry_id`, `time_period_type`, `month_from`, `month_to`, `time_period_from`, `time_period_to`, `description`, `ondate`) VALUES
(12, 11, 'emp1', 'tit1', 0, 0, '', 0, 'Work', 'feb', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(13, 11, 'emp2', 'tit2', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(17, 13, '', '', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(18, 14, '', '', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(19, 15, '', '', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(20, 16, '', '', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(21, 17, '', '', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(22, 18, 'burp', 'fsdfsd', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(26, 3, 'vdl', 'Panaceatek.com', 1, 2, 'Pune1', 0, 'Internship', '', '', 2010, 1989, 'Detalis.. ', '2012-12-15 06:14:02'),
(52, 19, 'vdlxyz', 'xyz', 1, 0, '', 0, 'Work', '', '', 2012, 2012, '', '2012-12-19 07:19:39'),
(53, 19, 'vdlxyz2', 'xyz2', 1, 0, '', 0, 'Work', '', '', 2012, 2012, '', '2012-12-19 07:19:39'),
(75, 21, 'H', 'Pos1', 1, 0, '', 0, '', '', '', 2012, 2012, '', '2012-12-25 08:57:21'),
(76, 21, 'sdas', '', 1, 0, '', 0, '', '', '', 2012, 2012, '', '2012-12-25 08:57:21'),
(79, 24, 'emp1', 'tit1', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(80, 25, 'emp1', 'tit1', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(98, 22, '', 'TL', 105, 0, 'Pune', 0, '', '', '', 2007, 2010, 'Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. Info.. ', '2012-12-27 15:16:02'),
(99, 22, '', '', 1, 0, '', 0, '', '', '', 2012, 2012, '', '2012-12-27 15:16:02'),
(100, 20, 'Ha', 'Tester', 233, 0, '', 0, '', '', '', 1994, 2010, 'Details .. Details .. Details .. Details .. Details .. Details .. ', '2012-12-27 15:34:39'),
(101, 24, 'Panacea', 'TeamLead', 0, 0, '', 0, 'Work', 'feb', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(102, 25, '123456', '123456', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00'),
(111, 23, 'Moes Assoc.', 'Devoloper', 167, 0, 'Amsterdamn', 0, '', '', '', 2010, 2013, 'Desc 1 desc 1 desc 1 desc 1 desc 1 ', '2013-01-03 05:01:09'),
(112, 23, 'Microbig', 'Project Manager', 20, 0, '', 0, '', '', '', 2005, 2010, 'Desc 2 desc 2 desc 2 desc 2 desc 2 desc 2 ', '2013-01-03 05:01:09'),
(114, 26, 'ssa', 'sas', 1, 0, '', 0, '', '', '', 2011, 2012, '', '2013-01-03 12:48:46'),
(115, 26, 'emp1', 'tit1', 1, 0, '', 0, '', '', '', 2013, 2013, '', '2013-01-03 12:48:46'),
(117, 28, 'qwe', 'wqe', 1, 0, '', 0, '', '', '', 2013, 2013, '', '2013-01-03 13:37:34'),
(118, 29, 'e1', 'dsad', 1, 0, '', 0, '', '', '', 2013, 2013, '', '2013-01-03 13:51:08'),
(122, 37, 'Panaceatek', 'Team Lead', 1, 0, 'Pune', 0, '', '', '', 2013, 2013, 'Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. ', '2013-01-14 09:41:13'),
(123, 39, 'Google', 'Web Analyser', 0, 0, '', 0, 'Work', 'jan', 'jan', 0000, 0000, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p630_advisor_expertise`
--

CREATE TABLE IF NOT EXISTS `p630_advisor_expertise` (
  `advisor_expertise_id` int(11) NOT NULL AUTO_INCREMENT,
  `advisor_id` int(11) NOT NULL COMMENT 'advisor id',
  `area_service_id` int(11) NOT NULL COMMENT 'In which areas would you like to offer your services',
  `expertise_cat_id` int(11) NOT NULL COMMENT 'Which services are you willing to offer ',
  `about_experience_info` text NOT NULL,
  `one` enum('off','on') NOT NULL COMMENT 'first check box',
  `two` enum('off','on') NOT NULL COMMENT 'second check box',
  `three` enum('off','on') NOT NULL COMMENT 'third check box',
  `four` enum('off','on') NOT NULL COMMENT 'fourth check box',
  `five` enum('off','on') NOT NULL COMMENT 'fifth check box',
  `one_txt` text NOT NULL COMMENT 'first text box',
  `two_txt` text NOT NULL COMMENT 'second text box',
  `three_txt` text NOT NULL COMMENT 'third text box',
  `four_txt` text NOT NULL COMMENT 'fourth text box',
  `five_txt` text NOT NULL COMMENT 'fifth text box',
  `date_on` datetime NOT NULL,
  PRIMARY KEY (`advisor_expertise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `p630_advisor_expertise`
--

INSERT INTO `p630_advisor_expertise` (`advisor_expertise_id`, `advisor_id`, `area_service_id`, `expertise_cat_id`, `about_experience_info`, `one`, `two`, `three`, `four`, `five`, `one_txt`, `two_txt`, `three_txt`, `four_txt`, `five_txt`, `date_on`) VALUES
(26, 19, 1, 19, 'Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. Details.. ', 'on', 'on', 'on', 'on', 'on', 'Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', 'Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', 'Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', 'Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', 'Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', '2012-12-20 13:59:22'),
(27, 19, 2, 28, 'Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', 'on', '', 'on', '', '', '                      \r\n                      Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', '                      ', '                      Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..Info.. Info.. Info..', '                      ', '                     ', '2012-12-20 13:59:22'),
(33, 21, 1, 19, '', 'on', '', '', '', '', '              ghjgj                                  \r\n                        \r\n                        ', '                                                \r\n                        \r\n                        ', '                        \r\n                        ', '                                                \r\n                        \r\n                        ', '                                                \r\n                        \r\n                        ', '2012-12-25 08:59:36'),
(91, 20, 18, 19, 'Business Details Information ..  Info..  Business Details Information .. Info..Business Details Information ..  Info.. Business Details Information ..  Info.. Business Details Information ..  Info..Business Details Information ..  Info.. Business Details Information ..  Info.. Business Details Information .. Info..', 'on', '', 'on', '', 'on', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', '', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', '', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', '2013-01-03 06:02:29'),
(92, 20, 23, 27, 'Careers: Career Management ..  Info..  Business Details Information .. Info..Business Details Information ..  Info.. Business Details Information ..  Info.. Business Details Information ..  Info..Business Details Information ..  Info.. Business Details Information ..  Info.. Business Details Information .. Info..', 'on', 'on', 'on', 'on', 'on', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', 'Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    Details..    ', '2013-01-03 06:02:29'),
(93, 22, 23, 27, '', '', '', '', '', '', '', '', '', '', '', '2013-01-03 08:05:19'),
(94, 26, 23, 33, 'gfdgdfg', 'on', '', '', '', '', 'fg', '                      ', '                      ', '                      ', '                     ', '2013-01-03 12:48:55'),
(95, 28, 18, 19, 'jhgjg', '', 'on', '', '', '', '', 'hgjghjg', '', '', '', '2013-01-03 13:37:44'),
(98, 37, 18, 20, 'Info Admissions: College (Undergrad).. Info Admissions: College (Undergrad).. Info Admissions: College (Undergrad).. Info Admissions: College (Undergrad).. Info Admissions: College (Undergrad).. Info Admissions: College (Undergrad).. Info Admissions: College (Undergrad).. Info Admissions: College (Undergrad).. ', 'on', 'on', 'on', 'on', 'on', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', '2013-01-14 09:43:30'),
(99, 37, 18, 37, 'Info Admissions: Graduate.. Info Admissions: Graduate.. Info Admissions: Graduate.. Info Admissions: Graduate.. Info Admissions: Graduate.. Info Admissions: Graduate.. Info Admissions: Graduate.. Info Admissions: Graduate.. Info Admissions: Graduate.. ', 'on', 'on', 'on', 'on', 'on', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', '2013-01-14 09:43:30'),
(100, 37, 23, 27, 'Info Careers: Career Management.. Info Careers: Career Management.. Info Careers: Career Management.. Info Careers: Career Management.. Info Careers: Career Management.. Info Careers: Career Management.. ', 'on', 'on', 'on', 'on', 'on', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', 'details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. details.. ', '2013-01-14 09:43:30'),
(124, 23, 18, 37, '', 'on', '', '', 'on', 'on', '', '', '', 'dfsddsfsdfsfsd fsdf sf df ds fdsdsfsf sdfsfs sfds', '', '2013-01-22 11:33:28'),
(125, 23, 23, 31, '', '', '', '', '', '', '', '', '', '', '', '2013-01-22 11:33:28'),
(126, 23, 23, 33, '', '', '', '', '', '', '', '', '', '', '', '2013-01-22 11:33:29'),
(127, 23, 23, 25, '', '', '', '', '', '', '', '', '', '', '', '2013-01-22 11:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `p630_advisor_language`
--

CREATE TABLE IF NOT EXISTS `p630_advisor_language` (
  `advisor_lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `advisor_id` bigint(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `flag_more_lang` enum('0','1') CHARACTER SET latin1 NOT NULL COMMENT 'If advisor select a more than defaulate lang then this flag will set',
  `status` enum('1','0') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`advisor_lang_id`),
  KEY `FK_advisor_id3` (`advisor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=475 ;

--
-- Dumping data for table `p630_advisor_language`
--

INSERT INTO `p630_advisor_language` (`advisor_lang_id`, `advisor_id`, `lang_id`, `flag_more_lang`, `status`) VALUES
(453, 37, 17, '', '1'),
(454, 37, 25, '', '1'),
(455, 37, 30, '', '1'),
(468, 23, 16, '', '1'),
(469, 23, 30, '', '1'),
(470, 23, 54, '', '1'),
(471, 23, 2, '1', '1'),
(472, 38, 16, '', '1'),
(473, 38, 25, '', '1'),
(474, 38, 30, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `p630_advisor_socailmedia_info`
--

CREATE TABLE IF NOT EXISTS `p630_advisor_socailmedia_info` (
  `socailmedia_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `advisor_id` bigint(11) NOT NULL,
  `website` varchar(225) NOT NULL,
  `blog` varchar(225) NOT NULL,
  `linkedin` varchar(225) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `twitter` varchar(225) NOT NULL,
  `extra` varchar(2) NOT NULL,
  PRIMARY KEY (`socailmedia_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `p630_advisor_socailmedia_info`
--

INSERT INTO `p630_advisor_socailmedia_info` (`socailmedia_info_id`, `advisor_id`, `website`, `blog`, `linkedin`, `facebook`, `twitter`, `extra`) VALUES
(1, 3, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(3, 19, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(4, 18, 'www.testWEBSITE.com', 'www.testBLOG.com', 'www.testLINKED.com', 'www.testFACEBOOK.com', 'www.testTWITTER.com', ''),
(5, 0, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(6, 0, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(7, 0, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(8, 0, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(9, 0, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(10, 20, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(11, 21, '', '', '', '', '', ''),
(12, 22, 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', 'http://indicampus.com', ''),
(13, 26, '', '', '', '', '', ''),
(14, 23, 'http://dsfsdf.com', 'http://dsfsdf.com', 'http://dsfsdf.com', 'http://dsfsdf.com', 'http://dsfsdf.com', ''),
(15, 28, '', '', '', '', '', ''),
(16, 29, '', '', '', '', '', ''),
(18, 37, 'http://website.com', 'http://blog.com', 'http://linkedin.com', 'http://facebook.com', 'http://twitter.com', ''),
(19, 38, 'http://dsfsdf.com', 'http://dsfsdf.com', '', '', '', ''),
(20, 39, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `p630_availability_time`
--

CREATE TABLE IF NOT EXISTS `p630_availability_time` (
  `availability_time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `extra` varchar(125) CHARACTER SET latin1 NOT NULL,
  `status` enum('1','0') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`availability_time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `p630_availability_time`
--

INSERT INTO `p630_availability_time` (`availability_time_id`, `time`, `extra`, `status`) VALUES
(1, 0, '', '1'),
(2, 1, '', '1'),
(3, 2, '', '1'),
(4, 3, '', '1'),
(5, 4, '', '1'),
(6, 5, '', '1'),
(7, 6, '', '1'),
(8, 7, '', '1'),
(9, 8, '', '1'),
(10, 9, '', '1'),
(11, 10, '', '1'),
(12, 11, '', '1'),
(13, 12, '', '1'),
(14, 13, '', '1'),
(15, 14, '', '1'),
(16, 15, '', '1'),
(17, 16, '', '1'),
(18, 17, '', '1'),
(19, 18, '', '1'),
(20, 19, '', '1'),
(21, 20, '', '1'),
(22, 21, '', '1'),
(23, 22, '', '1'),
(24, 23, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `p630_category`
--

CREATE TABLE IF NOT EXISTS `p630_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `cat_level` int(11) NOT NULL,
  `home` int(11) NOT NULL DEFAULT '0' COMMENT 'if 1 display on home page',
  `expr` int(11) NOT NULL COMMENT '1 to show on Advisor Expertise page',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `p630_category`
--

INSERT INTO `p630_category` (`cat_id`, `cat_name`, `parent_id`, `cat_level`, `home`, `expr`) VALUES
(23, 'Careers', 0, 1, 1, 1),
(21, 'Law', 18, 2, 1, 1),
(22, 'Medicine', 18, 2, 1, 1),
(18, 'Admissions', 0, 1, 1, 1),
(19, 'Business', 18, 2, 1, 1),
(20, 'College (Undergrad)', 18, 2, 1, 1),
(25, 'Interviewing', 23, 2, 0, 1),
(24, 'Resumes & Cover Letters', 23, 2, 0, 0),
(26, 'Consulting & Case Interviews', 23, 2, 0, 0),
(27, 'Career Management', 23, 2, 0, 1),
(28, 'Careers in Consulting', 23, 2, 0, 1),
(29, 'Job Search', 23, 2, 0, 0),
(30, 'Finance Interviews', 23, 2, 0, 0),
(31, 'Careers in Financial Services', 23, 2, 0, 1),
(32, 'Careers in Tech & Operations', 23, 2, 0, 1),
(33, 'Careers in Retail & Marketing', 23, 2, 0, 1),
(36, 'Testhomeon', 19, 3, 0, 0),
(37, 'Graduate', 18, 2, 1, 1),
(39, 'Tutoring', 0, 1, 1, 0),
(40, 'Business', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `p630_category_expertise_services`
--

CREATE TABLE IF NOT EXISTS `p630_category_expertise_services` (
  `id_cat_exprt_service` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `cat_level` int(11) NOT NULL,
  `serviceA` varchar(125) NOT NULL,
  `serviceB` varchar(125) NOT NULL,
  `serviceC` varchar(125) NOT NULL,
  `serviceD` varchar(125) NOT NULL,
  `serviceE` varchar(125) NOT NULL,
  PRIMARY KEY (`id_cat_exprt_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `p630_category_expertise_services`
--

INSERT INTO `p630_category_expertise_services` (`id_cat_exprt_service`, `cat_id`, `parent_cat_id`, `cat_level`, `serviceA`, `serviceB`, `serviceC`, `serviceD`, `serviceE`) VALUES
(1, 19, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(2, 19, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(3, 19, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(6, 27, 23, 2, 'Career Assessment', 'Informational Interview', 'Resume & Cover Letter', 'Job Search', 'Interview Practice'),
(7, 28, 23, 2, 'Career Assessment', 'Informational Interview', 'Resume & Cover Letter', 'Job Search', 'Interview Practice'),
(8, 31, 23, 2, 'Career Assessment', 'Informational Interview', 'Resume & Cover Letter', 'Job Search', 'Interview Practice'),
(9, 33, 23, 2, 'Career Assessment', 'Informational Interview', 'Resume & Cover Letter', 'Job Search', 'Interview Practice'),
(10, 32, 23, 2, 'Career Assessment', 'Informational Interview', 'Resume & Cover Letter', 'Job Search', 'Interview Practice'),
(11, 25, 23, 2, 'Career Assessment', 'Informational Interview', 'Resume & Cover Letter', 'Job Search', 'Interview Practice'),
(12, 20, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(13, 37, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(14, 21, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(15, 22, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(16, 19, 18, 2, 'Positioning Yourself', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(17, 19, 18, 2, 'Positioning Yourself-你好', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(18, 19, 18, 2, 'Positioning Yourself 123', 'College Matching', 'Applications', 'Interview Prep', 'Paying for College'),
(26, 40, 0, 1, '', '', '', '', ''),
(28, 18, 0, 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `p630_clarify_msg`
--

CREATE TABLE IF NOT EXISTS `p630_clarify_msg` (
  `clarify_msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `from_user` enum('0','1') NOT NULL COMMENT '0 for from user, 1 for from adv',
  `content` varchar(512) NOT NULL,
  `date` datetime NOT NULL,
  `new` enum('1','0') NOT NULL,
  PRIMARY KEY (`clarify_msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `p630_clarify_msg`
--

INSERT INTO `p630_clarify_msg` (`clarify_msg_id`, `message_id`, `from_user`, `content`, `date`, `new`) VALUES
(1, 2, '1', 'dfadsasd', '2013-01-18 13:20:13', '1'),
(2, 2, '0', 'from Userrrr1', '2013-01-18 13:21:13', '0'),
(3, 2, '1', 'dfdsfdsf', '2013-01-18 13:33:57', '1'),
(4, 2, '1', 'dfsfdsf', '2013-01-18 13:37:21', '1'),
(5, 2, '1', 'dfsfdsf', '2013-01-18 13:37:22', '1'),
(6, 2, '1', 'dfsfdsf', '2013-01-18 13:37:22', '1'),
(7, 2, '1', 'dfsfdsf', '2013-01-18 13:37:22', '1'),
(8, 2, '1', 'dfsfdsf', '2013-01-18 13:37:23', '1'),
(9, 2, '1', 'dfsfdsf', '2013-01-18 13:37:23', '1'),
(10, 2, '1', 'dfsfdsf', '2013-01-18 13:37:23', '1'),
(11, 2, '1', 'dfsfdsf', '2013-01-18 13:37:23', '1'),
(12, 2, '1', 'dfsfdsf', '2013-01-18 13:37:23', '1'),
(13, 2, '1', 'dfsfdsf', '2013-01-18 13:37:23', '1'),
(14, 2, '1', 'dfsfdsf', '2013-01-18 13:37:23', '1'),
(15, 2, '1', 'dfsfdsf', '2013-01-18 13:37:24', '1'),
(16, 2, '1', 'dfsfdsf', '2013-01-18 13:37:24', '1'),
(17, 2, '1', 'dfsfdsf', '2013-01-18 13:37:24', '1'),
(18, 2, '1', 'dfsfdsf', '2013-01-18 13:37:24', '1'),
(19, 1, '1', 'sdadad', '2013-01-18 14:14:23', '1'),
(20, 1, '1', '', '2013-01-18 14:15:39', '1'),
(21, 1, '1', 'dasda', '2013-01-18 14:15:50', '1'),
(22, 1, '1', 'asdasd', '2013-01-18 14:16:57', '1'),
(23, 1, '1', 'blah', '2013-01-18 14:18:00', '1'),
(24, 1, '1', 'blah', '2013-01-18 14:18:03', '1'),
(25, 1, '1', 'blah', '2013-01-18 14:18:05', '1'),
(26, 2, '1', 'wassup', '2013-01-19 05:01:17', '1'),
(27, 2, '1', 'yo ho', '2013-01-19 05:33:59', '1'),
(28, 2, '1', 'yo ho\n', '2013-01-19 05:34:36', '1'),
(29, 2, '1', 'yo ho\n\n', '2013-01-19 05:36:42', '1'),
(30, 2, '1', 'yo ho\n\n\n', '2013-01-19 05:36:44', '1'),
(31, 2, '1', 'yo', '2013-01-19 05:36:52', '1'),
(32, 2, '1', 'das', '2013-01-19 05:37:05', '1'),
(33, 2, '1', 'asadsa', '2013-01-19 05:37:08', '1'),
(34, 2, '1', 'adasd', '2013-01-19 05:37:17', '1'),
(35, 7, '1', 'yo ', '2013-01-19 06:05:24', '1'),
(36, 7, '1', 'dfdsfs', '2013-01-19 06:05:25', '1'),
(37, 7, '1', 'sdfsf', '2013-01-19 06:05:26', '1'),
(38, 7, '1', 'dfsdf', '2013-01-19 06:05:27', '1'),
(39, 7, '1', 'sdfds', '2013-01-19 06:05:27', '1'),
(40, 7, '1', 'dsf', '2013-01-19 06:05:28', '1'),
(41, 7, '1', '\n', '2013-01-19 06:05:29', '1'),
(42, 7, '1', '\n', '2013-01-19 06:05:30', '1'),
(43, 7, '1', 'dsfsdfsfd', '2013-01-19 06:05:31', '1'),
(44, 7, '1', 'dsfsd', '2013-01-19 06:05:32', '1'),
(45, 7, '1', 'sdf', '2013-01-19 06:05:32', '1'),
(46, 7, '1', 'dsf', '2013-01-19 06:05:33', '1'),
(47, 7, '1', 'sfsdf', '2013-01-19 06:05:34', '1'),
(49, 2, '1', 'sdasd', '2013-01-21 09:55:31', '1'),
(50, 2, '1', 'new 123', '2013-01-21 09:55:35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `p630_cms`
--

CREATE TABLE IF NOT EXISTS `p630_cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `page_name` varchar(40) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `p630_cms`
--

INSERT INTO `p630_cms` (`cms_id`, `lang_id`, `page_name`, `content`) VALUES
(1, 1, 'privacy', '<p>PRIVACY PRIVACY PRIVACY sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(13, 1, 'video', '<p style="text-align: center;"><span style="text-decoration: line-through;"><strong>&nbsp;______________________________________________________________________________</strong></span></p>\r\n<p style="text-align: center;"><span style="font-family: ''arial black'', ''avant garde''; font-size: medium;">TESTING VIDEOS</span></p>\r\n<p style="text-align: center;"><strong><span style="text-decoration: line-through;">&nbsp;&nbsp;______________________________________________________________________________</span></strong><br /><span style="font-family: ''arial black'', ''avant garde''; font-size: medium;">&nbsp;</span></p>\r\n<p style="text-align: center;">&nbsp;<span style="font-family: ''arial black'', ''avant garde''; font-size: medium;">Fire Poi</span>&nbsp;</p>\r\n<p style="text-align: center;">&nbsp;<iframe src="http://www.youtube.com/embed/5En5CJTLq3U" frameborder="0" width="250" height="206"></iframe></p>\r\n<p style="text-align: center;"><strong>&nbsp;&nbsp;____________________________________________________________________</strong><br /><span style="font-family: ''arial black'', ''avant garde''; font-size: medium;">&nbsp;</span></p>\r\n<p style="text-align: center;"><span style="font-family: ''arial black'', ''avant garde''; font-size: medium;">Cannon 600D&nbsp;</span></p>\r\n<p style="text-align: center;"><iframe src="http://www.youtube.com/embed/KAi2QIq1SUs" frameborder="0" width="250" height="206"></iframe></p>\r\n<p style="text-align: center;"><span style="text-decoration: line-through;"><strong>&nbsp;______________________________________________________________________________</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<p style="text-align: center;"><br /><span style="font-family: ''arial black'', ''avant garde''; font-size: medium;">&nbsp;</span></p>'),
(3, 1, 'press-/-socail-media', '<p>PRESS PRESS PRESS sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(5, 1, 'jobs', '<p>JOBS JOBS JOBS sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(6, 1, 'terms-and-service', '<p>TERMS OF SERVICE sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(9, 1, 'contact-us', '<p>CONTACT CONTACT CONTACT sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(10, 1, 'FAQ', '<p>FAQ FAQ FAQ sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(12, 1, 'about-us', '<p>About Us Info.. About Us Info..About Us Info..About Us Info..About Us Info..</p>\r\n<p>About Us Info..About Us Info..About Us Info..About Us Info..About Us Info..</p>\r\n<p>About Us Info..About Us Info..About Us Info..About Us Info..About Us Info..</p>\r\n<p>About Us Info..About Us Info..About Us Info..About Us Info..About Us Info..</p>\r\n<p>About Us Info..About Us Info..About Us Info..About Us Info..</p>'),
(14, 1, 'recommended-software', '<p>Software sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n            <p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(15, 1, 'page3', '<p>pAGE3 sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>\r\n<p>Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</p>'),
(16, 1, 'advisor-guidelines', '<p style="text-align: left;"><span style="color: #808080; font-size: small;">&nbsp;</span></p>\r\n<p style="text-align: left;"><span style="color: #808080; font-size: small;">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</span></p>\r\n<p style="text-align: left;"><span style="color: #808080; font-size: small;">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</span></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><span style="color: #808080; font-size: small;">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</span></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><span style="color: #808080; font-size: small;">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</span></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><span style="color: #808080; font-size: small;">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</span></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><span style="color: #808080; font-size: small;">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</span></p>\r\n<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><span style="color: #808080; font-size: small;">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo. Luctus arcu, urna praesent at id quisque ac. Arcu massa vestibulum malesuada, integer vivamus elit eu mauris eu, cum eros quis aliquam nisl wisi.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `p630_communication`
--

CREATE TABLE IF NOT EXISTS `p630_communication` (
  `communication_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `from_type` enum('0','1') NOT NULL COMMENT '0 for from user, 1 for from advisor',
  `new_flag` enum('0','1') NOT NULL COMMENT '0 for old, 1 for new',
  `subject` varchar(125) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL COMMENT 'date message head sent',
  `date_updated` datetime NOT NULL COMMENT 'date last reply sent',
  `del_adv` enum('0','1') NOT NULL,
  `del_usr` enum('0','1') NOT NULL,
  `new_adv` enum('1','0') NOT NULL,
  `new_usr` enum('0','1') NOT NULL,
  PRIMARY KEY (`communication_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `p630_communication`
--

INSERT INTO `p630_communication` (`communication_id`, `from`, `to`, `from_type`, `new_flag`, `subject`, `message`, `date_created`, `date_updated`, `del_adv`, `del_usr`, `new_adv`, `new_usr`) VALUES
(1, 27, 23, '0', '1', 'What came first chicken or Egg?', 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah ', '2012-12-22 12:51:24', '2013-01-12 08:33:42', '0', '0', '0', '0'),
(2, 27, 36, '0', '1', 'blah blah blah blah blah blah?', 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah ', '2012-12-20 12:55:50', '2013-01-16 14:49:59', '0', '0', '1', '1'),
(3, 27, 23, '0', '1', 'blah blah blah blah blah blah22?', 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah 222', '2012-12-22 12:55:50', '2013-01-23 12:49:22', '0', '0', '0', '0'),
(4, 27, 23, '0', '1', 'Newest Message ?', '1 - h jh jh jsadk jkjs d kks\r\n2 - dads asd adsa s da sd\r\n3 - dj ks djka sjdkas jdkasd.\r\n\r\nplz. jdh asjd hja sd kjskas', '2013-01-16 06:50:54', '2013-01-16 06:50:54', '1', '1', '1', '1'),
(5, 27, 23, '0', '1', 'asdasdasd asdas ads ', '', '2013-01-16 06:54:21', '2013-01-16 06:54:21', '0', '0', '1', '1'),
(6, 27, 23, '0', '1', '12345', 'fdssdfsdf<br />\r\ndsfsf<br />\r\nsdfsdf<br />\r\nsdfdsfs<br />\r\ndsfsdf', '2013-01-16 06:55:10', '2013-01-16 06:55:42', '0', '0', '1', '1'),
(7, 0, 23, '0', '1', 'sadasd', 'asdasdadadas', '2013-01-22 05:09:04', '2013-01-22 05:09:04', '0', '0', '1', '1'),
(8, 27, 23, '0', '1', 'Msg test New ', 'Msg test New Msg test New Msg test New Msg test New Msg test New Msg test New Msg test New Msg test New ', '2013-01-23 13:15:07', '2013-01-23 13:19:24', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `p630_communication_reply`
--

CREATE TABLE IF NOT EXISTS `p630_communication_reply` (
  `communication_reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `from_type` enum('0','1') NOT NULL COMMENT '0 for from user, 1 for from advisor',
  `new_flag` enum('0','1') NOT NULL COMMENT '0 for old, 1 for new',
  `message` text NOT NULL,
  `communication_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`communication_reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `p630_communication_reply`
--

INSERT INTO `p630_communication_reply` (`communication_reply_id`, `from`, `to`, `from_type`, `new_flag`, `message`, `communication_id`, `date`) VALUES
(3, 23, 27, '1', '1', 'this message(reply) is from advisor to user', 3, '2013-01-11 12:27:42'),
(5, 23, 27, '1', '1', 'wassup', 3, '2013-01-12 08:01:09'),
(6, 23, 27, '1', '1', '123', 3, '2013-01-12 08:02:32'),
(7, 27, 23, '0', '1', 'this message(reply) is from user to advisor  this message(reply) is from user to advisor  this message(reply) is from user to advisor  this message(reply) is from user to advisor  123123', 3, '2013-01-08 12:27:53'),
(8, 23, 27, '1', '1', 'yo', 1, '2013-01-12 08:10:15'),
(9, 27, 23, '0', '1', 'hi', 1, '2013-01-12 08:33:42'),
(10, 27, 36, '0', '1', 'u der?', 2, '2013-01-12 08:34:27'),
(11, 27, 23, '0', '1', 'woaaa', 3, '2013-01-12 10:15:15'),
(12, 23, 27, '1', '1', 'ajdhskjaadsasd', 3, '2013-01-15 13:02:52'),
(13, 23, 27, '1', '1', 'blah', 6, '2013-01-16 06:55:42'),
(14, 23, 27, '1', '1', 'hjsdhfjdhfjdhsfj sdfhjkhfjksdh', 3, '2013-01-16 13:56:00'),
(15, 27, 23, '0', '1', 'fdsfdsfdsf ', 3, '2013-01-16 14:07:28'),
(16, 27, 36, '0', '1', '', 2, '2013-01-16 14:49:50'),
(17, 27, 36, '0', '1', '', 2, '2013-01-16 14:49:55'),
(18, 27, 36, '0', '1', '', 2, '2013-01-16 14:49:59'),
(19, 23, 27, '1', '1', '', 3, '2013-01-22 11:04:57'),
(20, 23, 27, '1', '1', 'saddddddddddddddddddddddddddddddddddddddddddddddddsadddddddddddddddddddddddddddddddddddddddddddddddd', 3, '2013-01-22 11:11:52'),
(21, 23, 27, '1', '1', 'g dfg dgfd f', 3, '2013-01-23 12:49:22'),
(22, 23, 27, '1', '1', 'blah', 8, '2013-01-23 13:19:10'),
(23, 27, 23, '0', '1', 'yes', 8, '2013-01-23 13:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `p630_country`
--

CREATE TABLE IF NOT EXISTS `p630_country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iso` varchar(2) DEFAULT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  `iso_num` int(3) DEFAULT NULL,
  `fips` varchar(30) DEFAULT NULL,
  `country_name` varchar(200) DEFAULT NULL,
  `country_capital` varchar(100) DEFAULT NULL,
  `area` int(11) DEFAULT NULL COMMENT 'km2',
  `population` int(11) DEFAULT NULL,
  `continent` varchar(2) DEFAULT NULL,
  `tld` varchar(5) DEFAULT NULL,
  `currency_code` varchar(4) DEFAULT NULL,
  `currency_name` varchar(11) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `postal_code_format` varchar(10) DEFAULT NULL,
  `postal_code_regex` varchar(20) DEFAULT NULL,
  `languages` varchar(200) DEFAULT NULL,
  `geonameid` int(11) DEFAULT NULL,
  `neighbours` varchar(200) DEFAULT NULL,
  `equivalentfipscode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `p630_country`
--

INSERT INTO `p630_country` (`id`, `iso`, `iso3`, `iso_num`, `fips`, `country_name`, `country_capital`, `area`, `population`, `continent`, `tld`, `currency_code`, `currency_name`, `phone`, `postal_code_format`, `postal_code_regex`, `languages`, `geonameid`, `neighbours`, `equivalentfipscode`) VALUES
(1, 'AD', 'AND', 20, 'AN', 'Andorra', 'Andorra la Vella', 468, 84000, 'EU', '.ad', 'EUR', 'Euro', '376', 'AD###', '^(?:AD)*(\\d{3})$', 'ca', 3041565, 'ES,FR', ''),
(2, 'AE', 'ARE', 784, 'AE', 'United Arab Emirates', 'Abu Dhabi', 82880, 4975593, 'AS', '.ae', 'AED', 'Dirham', '971', '', '', 'ar-AE,fa,en,hi,ur', 290557, 'SA,OM', ''),
(3, 'AF', 'AFG', 4, 'AF', 'Afghanistan', 'Kabul', 647500, 29121286, 'AS', '.af', 'AFN', 'Afghani', '93', '', '', 'fa-AF,ps,uz-AF,tk', 1149361, 'TM,CN,IR,TJ,PK,UZ', ''),
(4, 'AG', 'ATG', 28, 'AC', 'Antigua and Barbuda', 'St. John''s', 443, 86754, 'NA', '.ag', 'XCD', 'Dollar', '+1-268', '', '', 'en-AG', 3576396, '', ''),
(5, 'AI', 'AIA', 660, 'AV', 'Anguilla', 'The Valley', 102, 13254, 'NA', '.ai', 'XCD', 'Dollar', '+1-264', '', '', 'en-AI', 3573511, '', ''),
(6, 'AL', 'ALB', 8, 'AL', 'Albania', 'Tirana', 28748, 2986952, 'EU', '.al', 'ALL', 'Lek', '355', '', '', 'sq,el', 783754, 'MK,GR,CS,ME,RS,XK', ''),
(7, 'AM', 'ARM', 51, 'AM', 'Armenia', 'Yerevan', 29800, 2968000, 'AS', '.am', 'AMD', 'Dram', '374', '######', '^(\\d{6})$', 'hy', 174982, 'GE,IR,AZ,TR', ''),
(8, 'AO', 'AGO', 24, 'AO', 'Angola', 'Luanda', 1246700, 13068161, 'AF', '.ao', 'AOA', 'Kwanza', '244', '', '', 'pt-AO', 3351879, 'CD,NA,ZM,CG', ''),
(9, 'AQ', 'ATA', 10, 'AY', 'Antarctica', '', 14000000, 0, 'AN', '.aq', '', '', '', '', '', '', 6697173, '', ''),
(10, 'AR', 'ARG', 32, 'AR', 'Argentina', 'Buenos Aires', 2766890, 41343201, 'SA', '.ar', 'ARS', 'Peso', '54', '@####@@@', '^([A-Z]\\d{4}[A-Z]{3}', 'es-AR,en,it,de,fr,gn', 3865483, 'CL,BO,UY,PY,BR', ''),
(11, 'AS', 'ASM', 16, 'AQ', 'American Samoa', 'Pago Pago', 199, 57881, 'OC', '.as', 'USD', 'Dollar', '+1-684', '', '', 'en-AS,sm,to', 5880801, '', ''),
(12, 'AT', 'AUT', 40, 'AU', 'Austria', 'Vienna', 83858, 8205000, 'EU', '.at', 'EUR', 'Euro', '43', '####', '^(\\d{4})$', 'de-AT,hr,hu,sl', 2782113, 'CH,DE,HU,SK,CZ,IT,SI,LI', ''),
(13, 'AU', 'AUS', 36, 'AS', 'Australia', 'Canberra', 7686850, 21515754, 'OC', '.au', 'AUD', 'Dollar', '61', '####', '^(\\d{4})$', 'en-AU', 2077456, '', ''),
(14, 'AW', 'ABW', 533, 'AA', 'Aruba', 'Oranjestad', 193, 71566, 'NA', '.aw', 'AWG', 'Guilder', '297', '', '', 'nl-AW,es,en', 3577279, '', ''),
(15, 'AX', 'ALA', 248, '', 'Aland Islands', 'Mariehamn', NULL, 26711, 'EU', '.ax', 'EUR', 'Euro', '+358-18', '', '', 'sv-AX', 661882, '', 'FI'),
(16, 'AZ', 'AZE', 31, 'AJ', 'Azerbaijan', 'Baku', 86600, 8303512, 'AS', '.az', 'AZN', 'Manat', '994', 'AZ ####', '^(?:AZ)*(\\d{4})$', 'az,ru,hy', 587116, 'GE,IR,AM,TR,RU', ''),
(17, 'BA', 'BIH', 70, 'BK', 'Bosnia and Herzegovina', 'Sarajevo', 51129, 4590000, 'EU', '.ba', 'BAM', 'Marka', '387', '#####', '^(\\d{5})$', 'bs,hr-BA,sr-BA', 3277605, 'CS,HR,ME,RS', ''),
(18, 'BB', 'BRB', 52, 'BB', 'Barbados', 'Bridgetown', 431, 285653, 'NA', '.bb', 'BBD', 'Dollar', '+1-246', 'BB#####', '^(?:BB)*(\\d{5})$', 'en-BB', 3374084, '', ''),
(19, 'BD', 'BGD', 50, 'BG', 'Bangladesh', 'Dhaka', 144000, 156118464, 'AS', '.bd', 'BDT', 'Taka', '880', '####', '^(\\d{4})$', 'bn-BD,en', 1210997, 'MM,IN', ''),
(20, 'BE', 'BEL', 56, 'BE', 'Belgium', 'Brussels', 30510, 10403000, 'EU', '.be', 'EUR', 'Euro', '32', '####', '^(\\d{4})$', 'nl-BE,fr-BE,de-BE', 2802361, 'DE,NL,LU,FR', ''),
(21, 'BF', 'BFA', 854, 'UV', 'Burkina Faso', 'Ouagadougou', 274200, 16241811, 'AF', '.bf', 'XOF', 'Franc', '226', '', '', 'fr-BF', 2361809, 'NE,BJ,GH,CI,TG,ML', ''),
(22, 'BG', 'BGR', 100, 'BU', 'Bulgaria', 'Sofia', 110910, 7148785, 'EU', '.bg', 'BGN', 'Lev', '359', '####', '^(\\d{4})$', 'bg,tr-BG', 732800, 'MK,GR,RO,CS,TR,RS', ''),
(23, 'BH', 'BHR', 48, 'BA', 'Bahrain', 'Manama', 665, 738004, 'AS', '.bh', 'BHD', 'Dinar', '973', '####|###', '^(\\d{3}\\d?)$', 'ar-BH,en,fa,ur', 290291, '', ''),
(24, 'BI', 'BDI', 108, 'BY', 'Burundi', 'Bujumbura', 27830, 9863117, 'AF', '.bi', 'BIF', 'Franc', '257', '', '', 'fr-BI,rn', 433561, 'TZ,CD,RW', ''),
(25, 'BJ', 'BEN', 204, 'BN', 'Benin', 'Porto-Novo', 112620, 9056010, 'AF', '.bj', 'XOF', 'Franc', '229', '', '', 'fr-BJ', 2395170, 'NE,TG,BF,NG', ''),
(26, 'BL', 'BLM', 652, 'TB', 'Saint Barthélemy', 'Gustavia', 21, 8450, 'NA', '.gp', 'EUR', 'Euro', '590', '### ###', '', 'fr', 3578476, '', ''),
(27, 'BM', 'BMU', 60, 'BD', 'Bermuda', 'Hamilton', 53, 65365, 'NA', '.bm', 'BMD', 'Dollar', '+1-441', '@@ ##', '^([A-Z]{2}\\d{2})$', 'en-BM,pt', 3573345, '', ''),
(28, 'BN', 'BRN', 96, 'BX', 'Brunei', 'Bandar Seri Begawan', 5770, 395027, 'AS', '.bn', 'BND', 'Dollar', '673', '@@####', '^([A-Z]{2}\\d{4})$', 'ms-BN,en-BN', 1820814, 'MY', ''),
(29, 'BO', 'BOL', 68, 'BL', 'Bolivia', 'La Paz', 1098580, 9947418, 'SA', '.bo', 'BOB', 'Boliviano', '591', '', '', 'es-BO,qu,ay', 3923057, 'PE,CL,PY,BR,AR', ''),
(30, 'BQ', 'BES', 535, '', 'Bonaire, Saint Eustatius and Saba ', '', NULL, 18012, 'NA', '.bq', 'USD', 'Dollar', '599', '', '', 'nl,pap,en', 7626844, '', ''),
(31, 'BR', 'BRA', 76, 'BR', 'Brazil', 'Brasília', 8511965, 201103330, 'SA', '.br', 'BRL', 'Real', '55', '#####-###', '^(\\d{8})$', 'pt-BR,es,en,fr', 3469034, 'SR,PE,BO,UY,GY,PY,GF,VE,CO,AR', ''),
(32, 'BS', 'BHS', 44, 'BF', 'Bahamas', 'Nassau', 13940, 301790, 'NA', '.bs', 'BSD', 'Dollar', '+1-242', '', '', 'en-BS', 3572887, '', ''),
(33, 'BT', 'BTN', 64, 'BT', 'Bhutan', 'Thimphu', 47000, 699847, 'AS', '.bt', 'BTN', 'Ngultrum', '975', '', '', 'dz', 1252634, 'CN,IN', ''),
(34, 'BV', 'BVT', 74, 'BV', 'Bouvet Island', '', NULL, 0, 'AN', '.bv', 'NOK', 'Krone', '', '', '', '', 3371123, '', ''),
(35, 'BW', 'BWA', 72, 'BC', 'Botswana', 'Gaborone', 600370, 2029307, 'AF', '.bw', 'BWP', 'Pula', '267', '', '', 'en-BW,tn-BW', 933860, 'ZW,ZA,NA', ''),
(36, 'BY', 'BLR', 112, 'BO', 'Belarus', 'Minsk', 207600, 9685000, 'EU', '.by', 'BYR', 'Ruble', '375', '######', '^(\\d{6})$', 'be,ru', 630336, 'PL,LT,UA,RU,LV', ''),
(37, 'BZ', 'BLZ', 84, 'BH', 'Belize', 'Belmopan', 22966, 314522, 'CA', '.bz', 'BZD', 'Dollar', '501', '', '', 'en-BZ,es', 3582678, 'GT,MX', ''),
(38, 'CA', 'CAN', 124, 'CA', 'Canada', 'Ottawa', 9984670, 33679000, 'NA', '.ca', 'CAD', 'Dollar', '1', '@#@ #@#', '^([a-zA-Z]\\d[a-zA-Z]', 'en-CA,fr-CA,iu', 6251999, 'US', ''),
(39, 'CC', 'CCK', 166, 'CK', 'Cocos Islands', 'West Island', 14, 628, 'AS', '.cc', 'AUD', 'Dollar', '61', '', '', 'ms-CC,en', 1547376, '', ''),
(40, 'CD', 'COD', 180, 'CG', 'Democratic Republic of the Congo', 'Kinshasa', 2345410, 70916439, 'AF', '.cd', 'CDF', 'Franc', '243', '', '', 'fr-CD,ln,kg', 203312, 'TZ,CF,SD,RW,ZM,BI,UG,CG,AO', ''),
(41, 'CF', 'CAF', 140, 'CT', 'Central African Republic', 'Bangui', 622984, 4844927, 'AF', '.cf', 'XAF', 'Franc', '236', '', '', 'fr-CF,sg,ln,kg', 239880, 'TD,SD,CD,CM,CG', ''),
(42, 'CG', 'COG', 178, 'CF', 'Republic of the Congo', 'Brazzaville', 342000, 3039126, 'AF', '.cg', 'XAF', 'Franc', '242', '', '', 'fr-CG,kg,ln-CG', 2260494, 'CF,GA,CD,CM,AO', ''),
(43, 'CH', 'CHE', 756, 'SZ', 'Switzerland', 'Berne', 41290, 7581000, 'EU', '.ch', 'CHF', 'Franc', '41', '####', '^(\\d{4})$', 'de-CH,fr-CH,it-CH,rm', 2658434, 'DE,IT,LI,FR,AT', ''),
(44, 'CI', 'CIV', 384, 'IV', 'Ivory Coast', 'Yamoussoukro', 322460, 21058798, 'AF', '.ci', 'XOF', 'Franc', '225', '', '', 'fr-CI', 2287781, 'LR,GH,GN,BF,ML', ''),
(45, 'CK', 'COK', 184, 'CW', 'Cook Islands', 'Avarua', 240, 21388, 'OC', '.ck', 'NZD', 'Dollar', '682', '', '', 'en-CK,mi', 1899402, '', ''),
(46, 'CL', 'CHL', 152, 'CI', 'Chile', 'Santiago', 756950, 16746491, 'SA', '.cl', 'CLP', 'Peso', '56', '#######', '^(\\d{7})$', 'es-CL', 3895114, 'PE,BO,AR', ''),
(47, 'CM', 'CMR', 120, 'CM', 'Cameroon', 'Yaoundé', 475440, 19294149, 'AF', '.cm', 'XAF', 'Franc', '237', '', '', 'en-CM,fr-CM', 2233387, 'TD,CF,GA,GQ,CG,NG', ''),
(48, 'CN', 'CHN', 156, 'CH', 'China', 'Beijing', 9596960, 1330044000, 'AS', '.cn', 'CNY', 'Yuan Renmin', '86', '######', '^(\\d{6})$', 'zh-CN,yue,wuu,dta,ug,za', 1814991, 'LA,BT,TJ,KZ,MN,AF,NP,MM,KG,PK,KP,RU,VN,IN', ''),
(49, 'CO', 'COL', 170, 'CO', 'Colombia', 'Bogotá', 1138910, 44205293, 'SA', '.co', 'COP', 'Peso', '57', '', '', 'es-CO', 3686110, 'EC,PE,PA,BR,VE', ''),
(50, 'CR', 'CRI', 188, 'CS', 'Costa Rica', 'San José', 51100, 4516220, 'CA', '.cr', 'CRC', 'Colon', '506', '####', '^(\\d{4})$', 'es-CR,en', 3624060, 'PA,NI', ''),
(51, 'CU', 'CUB', 192, 'CU', 'Cuba', 'Havana', 110860, 11423000, 'NA', '.cu', 'CUP', 'Peso', '53', 'CP #####', '^(?:CP)*(\\d{5})$', 'es-CU', 3562981, 'US', ''),
(52, 'CV', 'CPV', 132, 'CV', 'Cape Verde', 'Praia', 4033, 508659, 'AF', '.cv', 'CVE', 'Escudo', '238', '####', '^(\\d{4})$', 'pt-CV', 3374766, '', ''),
(53, 'CW', 'CUW', 531, 'UC', 'Curaçao', 'Willemstad', NULL, 141766, 'NA', '.cw', 'ANG', 'Guilder', '599', '', '', 'nl,pap', 7626836, '', ''),
(54, 'CX', 'CXR', 162, 'KT', 'Christmas Island', 'Flying Fish Cove', 135, 1500, 'AS', '.cx', 'AUD', 'Dollar', '61', '####', '^(\\d{4})$', 'en,zh,ms-CC', 2078138, '', ''),
(55, 'CY', 'CYP', 196, 'CY', 'Cyprus', 'Nicosia', 9250, 1102677, 'EU', '.cy', 'EUR', 'Euro', '357', '####', '^(\\d{4})$', 'el-CY,tr-CY,en', 146669, '', ''),
(56, 'CZ', 'CZE', 203, 'EZ', 'Czech Republic', 'Prague', 78866, 10476000, 'EU', '.cz', 'CZK', 'Koruna', '420', '### ##', '^(\\d{5})$', 'cs', 3077311, 'PL,DE,SK,AT', ''),
(57, 'DE', 'DEU', 276, 'GM', 'Germany', 'Berlin', 357021, 81802257, 'EU', '.de', 'EUR', 'Euro', '49', '#####', '^(\\d{5})$', 'de', 2921044, 'CH,PL,NL,DK,BE,CZ,LU,FR,AT', ''),
(58, 'DJ', 'DJI', 262, 'DJ', 'Djibouti', 'Djibouti', 23000, 740528, 'AF', '.dj', 'DJF', 'Franc', '253', '', '', 'fr-DJ,ar,so-DJ,aa', 223816, 'ER,ET,SO', ''),
(59, 'DK', 'DNK', 208, 'DA', 'Denmark', 'Copenhagen', 43094, 5484000, 'EU', '.dk', 'DKK', 'Krone', '45', '####', '^(\\d{4})$', 'da-DK,en,fo,de-DK', 2623032, 'DE', ''),
(60, 'DM', 'DMA', 212, 'DO', 'Dominica', 'Roseau', 754, 72813, 'NA', '.dm', 'XCD', 'Dollar', '+1-767', '', '', 'en-DM', 3575830, '', ''),
(61, 'DO', 'DOM', 214, 'DR', 'Dominican Republic', 'Santo Domingo', 48730, 9823821, 'CA', '.do', 'DOP', 'Peso', '+1-809 and ', '#####', '^(\\d{5})$', 'es-DO', 3508796, 'HT', ''),
(62, 'DZ', 'DZA', 12, 'AG', 'Algeria', 'Algiers', 2381740, 34586184, 'AF', '.dz', 'DZD', 'Dinar', '213', '#####', '^(\\d{5})$', 'ar-DZ', 2589581, 'NE,EH,LY,MR,TN,MA,ML', ''),
(63, 'EC', 'ECU', 218, 'EC', 'Ecuador', 'Quito', 283560, 14790608, 'SA', '.ec', 'USD', 'Dollar', '593', '@####@', '^([a-zA-Z]\\d{4}[a-zA', 'es-EC', 3658394, 'PE,CO', ''),
(64, 'EE', 'EST', 233, 'EN', 'Estonia', 'Tallinn', 45226, 1291170, 'EU', '.ee', 'EUR', 'Euro', '372', '#####', '^(\\d{5})$', 'et,ru', 453733, 'RU,LV', ''),
(65, 'EG', 'EGY', 818, 'EG', 'Egypt', 'Cairo', 1001450, 80471869, 'AF', '.eg', 'EGP', 'Pound', '20', '#####', '^(\\d{5})$', 'ar-EG,en,fr', 357994, 'LY,SD,IL', ''),
(66, 'EH', 'ESH', 732, 'WI', 'Western Sahara', 'El-Aaiun', 266000, 273008, 'AF', '.eh', 'MAD', 'Dirham', '212', '', '', 'ar,mey', 2461445, 'DZ,MR,MA', ''),
(67, 'ER', 'ERI', 232, 'ER', 'Eritrea', 'Asmara', 121320, 5792984, 'AF', '.er', 'ERN', 'Nakfa', '291', '', '', 'aa-ER,ar,tig,kun,ti-ER', 338010, 'ET,SD,DJ', ''),
(68, 'ES', 'ESP', 724, 'SP', 'Spain', 'Madrid', 504782, 46505963, 'EU', '.es', 'EUR', 'Euro', '34', '#####', '^(\\d{5})$', 'es-ES,ca,gl,eu,oc', 2510769, 'AD,PT,GI,FR,MA', ''),
(69, 'ET', 'ETH', 231, 'ET', 'Ethiopia', 'Addis Ababa', 1127127, 88013491, 'AF', '.et', 'ETB', 'Birr', '251', '####', '^(\\d{4})$', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 337996, 'ER,KE,SD,SO,DJ', ''),
(70, 'FI', 'FIN', 246, 'FI', 'Finland', 'Helsinki', 337030, 5244000, 'EU', '.fi', 'EUR', 'Euro', '358', '#####', '^(?:FI)*(\\d{5})$', 'fi-FI,sv-FI,smn', 660013, 'NO,RU,SE', ''),
(71, 'FJ', 'FJI', 242, 'FJ', 'Fiji', 'Suva', 18270, 875983, 'OC', '.fj', 'FJD', 'Dollar', '679', '', '', 'en-FJ,fj', 2205218, '', ''),
(72, 'FK', 'FLK', 238, 'FK', 'Falkland Islands', 'Stanley', 12173, 2638, 'SA', '.fk', 'FKP', 'Pound', '500', '', '', 'en-FK', 3474414, '', ''),
(73, 'FM', 'FSM', 583, 'FM', 'Micronesia', 'Palikir', 702, 107708, 'OC', '.fm', 'USD', 'Dollar', '691', '#####', '^(\\d{5})$', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 2081918, '', ''),
(74, 'FO', 'FRO', 234, 'FO', 'Faroe Islands', 'Tórshavn', 1399, 48228, 'EU', '.fo', 'DKK', 'Krone', '298', 'FO-###', '^(?:FO)*(\\d{3})$', 'fo,da-FO', 2622320, '', ''),
(75, 'FR', 'FRA', 250, 'FR', 'France', 'Paris', 547030, 64768389, 'EU', '.fr', 'EUR', 'Euro', '33', '#####', '^(\\d{5})$', 'fr-FR,frp,br,co,ca,eu,oc', 3017382, 'CH,DE,BE,LU,IT,AD,MC,ES', ''),
(76, 'GA', 'GAB', 266, 'GB', 'Gabon', 'Libreville', 267667, 1545255, 'AF', '.ga', 'XAF', 'Franc', '241', '', '', 'fr-GA', 2400553, 'CM,GQ,CG', ''),
(77, 'GB', 'GBR', 826, 'UK', 'United Kingdom', 'London', 244820, 62348447, 'EU', '.uk', 'GBP', 'Pound', '44', '@# #@@|@##', '^(([A-Z]\\d{2}[A-Z]{2', 'en-GB,cy-GB,gd', 2635167, 'IE', ''),
(78, 'GD', 'GRD', 308, 'GJ', 'Grenada', 'St. George''s', 344, 107818, 'NA', '.gd', 'XCD', 'Dollar', '+1-473', '', '', 'en-GD', 3580239, '', ''),
(79, 'GE', 'GEO', 268, 'GG', 'Georgia', 'Tbilisi', 69700, 4630000, 'AS', '.ge', 'GEL', 'Lari', '995', '####', '^(\\d{4})$', 'ka,ru,hy,az', 614540, 'AM,AZ,TR,RU', ''),
(80, 'GF', 'GUF', 254, 'FG', 'French Guiana', 'Cayenne', 91000, 195506, 'SA', '.gf', 'EUR', 'Euro', '594', '#####', '^((97)|(98)3\\d{2})$', 'fr-GF', 3381670, 'SR,BR', ''),
(81, 'GG', 'GGY', 831, 'GK', 'Guernsey', 'St Peter Port', 78, 65228, 'EU', '.gg', 'GBP', 'Pound', '+44-1481', '@# #@@|@##', '^(([A-Z]\\d{2}[A-Z]{2', 'en,fr', 3042362, '', ''),
(82, 'GH', 'GHA', 288, 'GH', 'Ghana', 'Accra', 239460, 24339838, 'AF', '.gh', 'GHS', 'Cedi', '233', '', '', 'en-GH,ak,ee,tw', 2300660, 'CI,TG,BF', ''),
(83, 'GI', 'GIB', 292, 'GI', 'Gibraltar', 'Gibraltar', 7, 27884, 'EU', '.gi', 'GIP', 'Pound', '350', '', '', 'en-GI,es,it,pt', 2411586, 'ES', ''),
(84, 'GL', 'GRL', 304, 'GL', 'Greenland', 'Nuuk', 2166086, 56375, 'NA', '.gl', 'DKK', 'Krone', '299', '####', '^(\\d{4})$', 'kl,da-GL,en', 3425505, '', ''),
(85, 'GM', 'GMB', 270, 'GA', 'Gambia', 'Banjul', 11300, 1593256, 'AF', '.gm', 'GMD', 'Dalasi', '220', '', '', 'en-GM,mnk,wof,wo,ff', 2413451, 'SN', ''),
(86, 'GN', 'GIN', 324, 'GV', 'Guinea', 'Conakry', 245857, 10324025, 'AF', '.gn', 'GNF', 'Franc', '224', '', '', 'fr-GN', 2420477, 'LR,SN,SL,CI,GW,ML', ''),
(87, 'GP', 'GLP', 312, 'GP', 'Guadeloupe', 'Basse-Terre', 1780, 443000, 'NA', '.gp', 'EUR', 'Euro', '590', '#####', '^((97)|(98)\\d{3})$', 'fr-GP', 3579143, 'AN', ''),
(88, 'GQ', 'GNQ', 226, 'EK', 'Equatorial Guinea', 'Malabo', 28051, 1014999, 'AF', '.gq', 'XAF', 'Franc', '240', '', '', 'es-GQ,fr', 2309096, 'GA,CM', ''),
(89, 'GR', 'GRC', 300, 'GR', 'Greece', 'Athens', 131940, 11000000, 'EU', '.gr', 'EUR', 'Euro', '30', '### ##', '^(\\d{5})$', 'el-GR,en,fr', 390903, 'AL,MK,TR,BG', ''),
(90, 'GS', 'SGS', 239, 'SX', 'South Georgia and the South Sandwich Islands', 'Grytviken', 3903, 30, 'AN', '.gs', 'GBP', 'Pound', '', '', '', 'en', 3474415, '', ''),
(91, 'GT', 'GTM', 320, 'GT', 'Guatemala', 'Guatemala City', 108890, 13550440, 'CA', '.gt', 'GTQ', 'Quetzal', '502', '#####', '^(\\d{5})$', 'es-GT', 3595528, 'MX,HN,BZ,SV', ''),
(92, 'GU', 'GUM', 316, 'GQ', 'Guam', 'Hagåtña', 549, 168564, 'OC', '.gu', 'USD', 'Dollar', '+1-671', '969##', '^(969\\d{2})$', 'en-GU,ch-GU', 4043988, '', ''),
(93, 'GW', 'GNB', 624, 'PU', 'Guinea-Bissau', 'Bissau', 36120, 1565126, 'AF', '.gw', 'XOF', 'Franc', '245', '####', '^(\\d{4})$', 'pt-GW,pov', 2372248, 'SN,GN', ''),
(94, 'GY', 'GUY', 328, 'GY', 'Guyana', 'Georgetown', 214970, 748486, 'SA', '.gy', 'GYD', 'Dollar', '592', '', '', 'en-GY', 3378535, 'SR,BR,VE', ''),
(95, 'HK', 'HKG', 344, 'HK', 'Hong Kong', 'Hong Kong', 1092, 6898686, 'AS', '.hk', 'HKD', 'Dollar', '852', '', '', 'zh-HK,yue,zh,en', 1819730, '', ''),
(96, 'HM', 'HMD', 334, 'HM', 'Heard Island and McDonald Islands', '', 412, 0, 'AN', '.hm', 'AUD', 'Dollar', '', '', '', '', 1547314, '', ''),
(97, 'HN', 'HND', 340, 'HO', 'Honduras', 'Tegucigalpa', 112090, 7989415, 'CA', '.hn', 'HNL', 'Lempira', '504', '@@####', '^([A-Z]{2}\\d{4})$', 'es-HN', 3608932, 'GT,NI,SV', ''),
(98, 'HR', 'HRV', 191, 'HR', 'Croatia', 'Zagreb', 56542, 4491000, 'EU', '.hr', 'HRK', 'Kuna', '385', 'HR-#####', '^(?:HR)*(\\d{5})$', 'hr-HR,sr', 3202326, 'HU,SI,CS,BA,ME,RS', ''),
(99, 'HT', 'HTI', 332, 'HA', 'Haiti', 'Port-au-Prince', 27750, 9648924, 'NA', '.ht', 'HTG', 'Gourde', '509', 'HT####', '^(?:HT)*(\\d{4})$', 'ht,fr-HT', 3723988, 'DO', ''),
(100, 'HU', 'HUN', 348, 'HU', 'Hungary', 'Budapest', 93030, 9930000, 'EU', '.hu', 'HUF', 'Forint', '36', '####', '^(\\d{4})$', 'hu-HU', 719819, 'SK,SI,RO,UA,CS,HR,AT,RS', ''),
(101, 'ID', 'IDN', 360, 'ID', 'Indonesia', 'Jakarta', 1919440, 242968342, 'AS', '.id', 'IDR', 'Rupiah', '62', '#####', '^(\\d{5})$', 'id,en,nl,jv', 1643084, 'PG,TL,MY', ''),
(102, 'IE', 'IRL', 372, 'EI', 'Ireland', 'Dublin', 70280, 4622917, 'EU', '.ie', 'EUR', 'Euro', '353', '', '', 'en-IE,ga-IE', 2963597, 'GB', ''),
(103, 'IL', 'ISR', 376, 'IS', 'Israel', 'Jerusalem', 20770, 7353985, 'AS', '.il', 'ILS', 'Shekel', '972', '#####', '^(\\d{5})$', 'he,ar-IL,en-IL,', 294640, 'SY,JO,LB,EG,PS', ''),
(104, 'IM', 'IMN', 833, 'IM', 'Isle of Man', 'Douglas, Isle of Man', 572, 75049, 'EU', '.im', 'GBP', 'Pound', '+44-1624', '@# #@@|@##', '^(([A-Z]\\d{2}[A-Z]{2', 'en,gv', 3042225, '', ''),
(105, 'IN', 'IND', 356, 'IN', 'India', 'New Delhi', 3287590, 1173108018, 'AS', '.in', 'INR', 'Rupee', '91', '######', '^(\\d{6})$', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 1269750, 'CN,NP,MM,BT,PK,BD', ''),
(106, 'IO', 'IOT', 86, 'IO', 'British Indian Ocean Territory', 'Diego Garcia', 60, 4000, 'AS', '.io', 'USD', 'Dollar', '246', '', '', 'en-IO', 1282588, '', ''),
(107, 'IQ', 'IRQ', 368, 'IZ', 'Iraq', 'Baghdad', 437072, 29671605, 'AS', '.iq', 'IQD', 'Dinar', '964', '#####', '^(\\d{5})$', 'ar-IQ,ku,hy', 99237, 'SY,SA,IR,JO,TR,KW', ''),
(108, 'IR', 'IRN', 364, 'IR', 'Iran', 'Tehran', 1648000, 76923300, 'AS', '.ir', 'IRR', 'Rial', '98', '##########', '^(\\d{10})$', 'fa-IR,ku', 130758, 'TM,AF,IQ,AM,PK,AZ,TR', ''),
(109, 'IS', 'ISL', 352, 'IC', 'Iceland', 'Reykjavík', 103000, 308910, 'EU', '.is', 'ISK', 'Krona', '354', '###', '^(\\d{3})$', 'is,en,de,da,sv,no', 2629691, '', ''),
(110, 'IT', 'ITA', 380, 'IT', 'Italy', 'Rome', 301230, 60340328, 'EU', '.it', 'EUR', 'Euro', '39', '#####', '^(\\d{5})$', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 3175395, 'CH,VA,SI,SM,FR,AT', ''),
(111, 'JE', 'JEY', 832, 'JE', 'Jersey', 'Saint Helier', 116, 90812, 'EU', '.je', 'GBP', 'Pound', '+44-1534', '@# #@@|@##', '^(([A-Z]\\d{2}[A-Z]{2', 'en,pt', 3042142, '', ''),
(112, 'JM', 'JAM', 388, 'JM', 'Jamaica', 'Kingston', 10991, 2847232, 'NA', '.jm', 'JMD', 'Dollar', '+1-876', '', '', 'en-JM', 3489940, '', ''),
(113, 'JO', 'JOR', 400, 'JO', 'Jordan', 'Amman', 92300, 6407085, 'AS', '.jo', 'JOD', 'Dinar', '962', '#####', '^(\\d{5})$', 'ar-JO,en', 248816, 'SY,SA,IQ,IL,PS', ''),
(114, 'JP', 'JPN', 392, 'JA', 'Japan', 'Tokyo', 377835, 127288000, 'AS', '.jp', 'JPY', 'Yen', '81', '###-####', '^(\\d{7})$', 'ja', 1861060, '', ''),
(115, 'KE', 'KEN', 404, 'KE', 'Kenya', 'Nairobi', 582650, 40046566, 'AF', '.ke', 'KES', 'Shilling', '254', '#####', '^(\\d{5})$', 'en-KE,sw-KE', 192950, 'ET,TZ,SD,SO,UG', ''),
(116, 'KG', 'KGZ', 417, 'KG', 'Kyrgyzstan', 'Bishkek', 198500, 5508626, 'AS', '.kg', 'KGS', 'Som', '996', '######', '^(\\d{6})$', 'ky,uz,ru', 1527747, 'CN,TJ,UZ,KZ', ''),
(117, 'KH', 'KHM', 116, 'CB', 'Cambodia', 'Phnom Penh', 181040, 14453680, 'AS', '.kh', 'KHR', 'Riels', '855', '#####', '^(\\d{5})$', 'km,fr,en', 1831722, 'LA,TH,VN', ''),
(118, 'KI', 'KIR', 296, 'KR', 'Kiribati', 'Tarawa', 811, 92533, 'OC', '.ki', 'AUD', 'Dollar', '686', '', '', 'en-KI,gil', 4030945, '', ''),
(119, 'KM', 'COM', 174, 'CN', 'Comoros', 'Moroni', 2170, 773407, 'AF', '.km', 'KMF', 'Franc', '269', '', '', 'ar,fr-KM', 921929, '', ''),
(120, 'KN', 'KNA', 659, 'SC', 'Saint Kitts and Nevis', 'Basseterre', 261, 49898, 'NA', '.kn', 'XCD', 'Dollar', '+1-869', '', '', 'en-KN', 3575174, '', ''),
(121, 'KP', 'PRK', 408, 'KN', 'North Korea', 'Pyongyang', 120540, 22912177, 'AS', '.kp', 'KPW', 'Won', '850', '###-###', '^(\\d{6})$', 'ko-KP', 1873107, 'CN,KR,RU', ''),
(122, 'KR', 'KOR', 410, 'KS', 'South Korea', 'Seoul', 98480, 48422644, 'AS', '.kr', 'KRW', 'Won', '82', 'SEOUL ###-', '^(?:SEOUL)*(\\d{6})$', 'ko-KR,en', 1835841, 'KP', ''),
(123, 'XK', 'XKX', 0, 'KV', 'Kosovo', 'Pristina', NULL, 1800000, 'EU', '', 'EUR', 'Euro', '', '', '', 'sq,sr', 831053, 'RS,AL,MK,ME', ''),
(124, 'KW', 'KWT', 414, 'KU', 'Kuwait', 'Kuwait City', 17820, 2789132, 'AS', '.kw', 'KWD', 'Dinar', '965', '#####', '^(\\d{5})$', 'ar-KW,en', 285570, 'SA,IQ', ''),
(125, 'KY', 'CYM', 136, 'CJ', 'Cayman Islands', 'George Town', 262, 44270, 'NA', '.ky', 'KYD', 'Dollar', '+1-345', '', '', 'en-KY', 3580718, '', ''),
(126, 'KZ', 'KAZ', 398, 'KZ', 'Kazakhstan', 'Astana', 2717300, 15340000, 'AS', '.kz', 'KZT', 'Tenge', '7', '######', '^(\\d{6})$', 'kk,ru', 1522867, 'TM,CN,KG,UZ,RU', ''),
(127, 'LA', 'LAO', 418, 'LA', 'Laos', 'Vientiane', 236800, 6368162, 'AS', '.la', 'LAK', 'Kip', '856', '#####', '^(\\d{5})$', 'lo,fr,en', 1655842, 'CN,MM,KH,TH,VN', ''),
(128, 'LB', 'LBN', 422, 'LE', 'Lebanon', 'Beirut', 10400, 4125247, 'AS', '.lb', 'LBP', 'Pound', '961', '#### ####|', '^(\\d{4}(\\d{4})?)$', 'ar-LB,fr-LB,en,hy', 272103, 'SY,IL', ''),
(129, 'LC', 'LCA', 662, 'ST', 'Saint Lucia', 'Castries', 616, 160922, 'NA', '.lc', 'XCD', 'Dollar', '+1-758', '', '', 'en-LC', 3576468, '', ''),
(130, 'LI', 'LIE', 438, 'LS', 'Liechtenstein', 'Vaduz', 160, 35000, 'EU', '.li', 'CHF', 'Franc', '423', '####', '^(\\d{4})$', 'de-LI', 3042058, 'CH,AT', ''),
(131, 'LK', 'LKA', 144, 'CE', 'Sri Lanka', 'Colombo', 65610, 21513990, 'AS', '.lk', 'LKR', 'Rupee', '94', '#####', '^(\\d{5})$', 'si,ta,en', 1227603, '', ''),
(132, 'LR', 'LBR', 430, 'LI', 'Liberia', 'Monrovia', 111370, 3685076, 'AF', '.lr', 'LRD', 'Dollar', '231', '####', '^(\\d{4})$', 'en-LR', 2275384, 'SL,CI,GN', ''),
(133, 'LS', 'LSO', 426, 'LT', 'Lesotho', 'Maseru', 30355, 1919552, 'AF', '.ls', 'LSL', 'Loti', '266', '###', '^(\\d{3})$', 'en-LS,st,zu,xh', 932692, 'ZA', ''),
(134, 'LT', 'LTU', 440, 'LH', 'Lithuania', 'Vilnius', 65200, 3565000, 'EU', '.lt', 'LTL', 'Litas', '370', 'LT-#####', '^(?:LT)*(\\d{5})$', 'lt,ru,pl', 597427, 'PL,BY,RU,LV', ''),
(135, 'LU', 'LUX', 442, 'LU', 'Luxembourg', 'Luxembourg', 2586, 497538, 'EU', '.lu', 'EUR', 'Euro', '352', '####', '^(\\d{4})$', 'lb,de-LU,fr-LU', 2960313, 'DE,BE,FR', ''),
(136, 'LV', 'LVA', 428, 'LG', 'Latvia', 'Riga', 64589, 2217969, 'EU', '.lv', 'LVL', 'Lat', '371', 'LV-####', '^(?:LV)*(\\d{4})$', 'lv,ru,lt', 458258, 'LT,EE,BY,RU', ''),
(137, 'LY', 'LBY', 434, 'LY', 'Libya', 'Tripolis', 1759540, 6461454, 'AF', '.ly', 'LYD', 'Dinar', '218', '', '', 'ar-LY,it,en', 2215636, 'TD,NE,DZ,SD,TN,EG', ''),
(138, 'MA', 'MAR', 504, 'MO', 'Morocco', 'Rabat', 446550, 31627428, 'AF', '.ma', 'MAD', 'Dirham', '212', '#####', '^(\\d{5})$', 'ar-MA,fr', 2542007, 'DZ,EH,ES', ''),
(139, 'MC', 'MCO', 492, 'MN', 'Monaco', 'Monaco', 2, 32965, 'EU', '.mc', 'EUR', 'Euro', '377', '#####', '^(\\d{5})$', 'fr-MC,en,it', 2993457, 'FR', ''),
(140, 'MD', 'MDA', 498, 'MD', 'Moldova', 'Chişinău', 33843, 4324000, 'EU', '.md', 'MDL', 'Leu', '373', 'MD-####', '^(?:MD)*(\\d{4})$', 'ro,ru,gag,tr', 617790, 'RO,UA', ''),
(141, 'ME', 'MNE', 499, 'MJ', 'Montenegro', 'Podgorica', 14026, 666730, 'EU', '.me', 'EUR', 'Euro', '382', '#####', '^(\\d{5})$', 'sr,hu,bs,sq,hr,rom', 3194884, 'AL,HR,BA,RS,XK', ''),
(142, 'MF', 'MAF', 663, 'RN', 'Saint Martin', 'Marigot', 53, 35925, 'NA', '.gp', 'EUR', 'Euro', '590', '### ###', '', 'fr', 3578421, 'SX', ''),
(143, 'MG', 'MDG', 450, 'MA', 'Madagascar', 'Antananarivo', 587040, 21281844, 'AF', '.mg', 'MGA', 'Ariary', '261', '###', '^(\\d{3})$', 'fr-MG,mg', 1062947, '', ''),
(144, 'MH', 'MHL', 584, 'RM', 'Marshall Islands', 'Majuro', 181, 65859, 'OC', '.mh', 'USD', 'Dollar', '692', '', '', 'mh,en-MH', 2080185, '', ''),
(145, 'MK', 'MKD', 807, 'MK', 'Macedonia', 'Skopje', 25333, 2061000, 'EU', '.mk', 'MKD', 'Denar', '389', '####', '^(\\d{4})$', 'mk,sq,tr,rmm,sr', 718075, 'AL,GR,CS,BG,RS,XK', ''),
(146, 'ML', 'MLI', 466, 'ML', 'Mali', 'Bamako', 1240000, 13796354, 'AF', '.ml', 'XOF', 'Franc', '223', '', '', 'fr-ML,bm', 2453866, 'SN,NE,DZ,CI,GN,MR,BF', ''),
(147, 'MM', 'MMR', 104, 'BM', 'Myanmar', 'Nay Pyi Taw', 678500, 53414374, 'AS', '.mm', 'MMK', 'Kyat', '95', '#####', '^(\\d{5})$', 'my', 1327865, 'CN,LA,TH,BD,IN', ''),
(148, 'MN', 'MNG', 496, 'MG', 'Mongolia', 'Ulan Bator', 1565000, 3086918, 'AS', '.mn', 'MNT', 'Tugrik', '976', '######', '^(\\d{6})$', 'mn,ru', 2029969, 'CN,RU', ''),
(149, 'MO', 'MAC', 446, 'MC', 'Macao', 'Macao', 254, 449198, 'AS', '.mo', 'MOP', 'Pataca', '853', '', '', 'zh,zh-MO,pt', 1821275, '', ''),
(150, 'MP', 'MNP', 580, 'CQ', 'Northern Mariana Islands', 'Saipan', 477, 86000, 'OC', '.mp', 'USD', 'Dollar', '+1-670', '', '', 'fil,tl,zh,ch-MP,en-MP', 4041468, '', ''),
(151, 'MQ', 'MTQ', 474, 'MB', 'Martinique', 'Fort-de-France', 1100, 432900, 'NA', '.mq', 'EUR', 'Euro', '596', '#####', '^(\\d{5})$', 'fr-MQ', 3570311, '', ''),
(152, 'MR', 'MRT', 478, 'MR', 'Mauritania', 'Nouakchott', 1030700, 3205060, 'AF', '.mr', 'MRO', 'Ouguiya', '222', '', '', 'ar-MR,fuc,snk,fr,mey,wo', 2378080, 'SN,DZ,EH,ML', ''),
(153, 'MS', 'MSR', 500, 'MH', 'Montserrat', 'Plymouth', 102, 9341, 'NA', '.ms', 'XCD', 'Dollar', '+1-664', '', '', 'en-MS', 3578097, '', ''),
(154, 'MT', 'MLT', 470, 'MT', 'Malta', 'Valletta', 316, 403000, 'EU', '.mt', 'EUR', 'Euro', '356', '@@@ ###|@@', '^([A-Z]{3}\\d{2}\\d?)$', 'mt,en-MT', 2562770, '', ''),
(155, 'MU', 'MUS', 480, 'MP', 'Mauritius', 'Port Louis', 2040, 1294104, 'AF', '.mu', 'MUR', 'Rupee', '230', '', '', 'en-MU,bho,fr', 934292, '', ''),
(156, 'MV', 'MDV', 462, 'MV', 'Maldives', 'Malé', 300, 395650, 'AS', '.mv', 'MVR', 'Rufiyaa', '960', '#####', '^(\\d{5})$', 'dv,en', 1282028, '', ''),
(157, 'MW', 'MWI', 454, 'MI', 'Malawi', 'Lilongwe', 118480, 15447500, 'AF', '.mw', 'MWK', 'Kwacha', '265', '', '', 'ny,yao,tum,swk', 927384, 'TZ,MZ,ZM', ''),
(158, 'MX', 'MEX', 484, 'MX', 'Mexico', 'Mexico City', 1972550, 112468855, 'NA', '.mx', 'MXN', 'Peso', '52', '#####', '^(\\d{5})$', 'es-MX', 3996063, 'GT,US,BZ', ''),
(159, 'MY', 'MYS', 458, 'MY', 'Malaysia', 'Kuala Lumpur', 329750, 28274729, 'AS', '.my', 'MYR', 'Ringgit', '60', '#####', '^(\\d{5})$', 'ms-MY,en,zh,ta,te,ml,pa,th', 1733045, 'BN,TH,ID', ''),
(160, 'MZ', 'MOZ', 508, 'MZ', 'Mozambique', 'Maputo', 801590, 22061451, 'AF', '.mz', 'MZN', 'Meticail', '258', '####', '^(\\d{4})$', 'pt-MZ,vmw', 1036973, 'ZW,TZ,SZ,ZA,ZM,MW', ''),
(161, 'NA', 'NAM', 516, 'WA', 'Namibia', 'Windhoek', 825418, 2128471, 'AF', '.na', 'NAD', 'Dollar', '264', '', '', 'en-NA,af,de,hz,naq', 3355338, 'ZA,BW,ZM,AO', ''),
(162, 'NC', 'NCL', 540, 'NC', 'New Caledonia', 'Nouméa', 19060, 216494, 'OC', '.nc', 'XPF', 'Franc', '687', '#####', '^(\\d{5})$', 'fr-NC', 2139685, '', ''),
(163, 'NE', 'NER', 562, 'NG', 'Niger', 'Niamey', 1267000, 15878271, 'AF', '.ne', 'XOF', 'Franc', '227', '####', '^(\\d{4})$', 'fr-NE,ha,kr,dje', 2440476, 'TD,BJ,DZ,LY,BF,NG,ML', ''),
(164, 'NF', 'NFK', 574, 'NF', 'Norfolk Island', 'Kingston', 35, 1828, 'OC', '.nf', 'AUD', 'Dollar', '672', '', '', 'en-NF', 2155115, '', ''),
(165, 'NG', 'NGA', 566, 'NI', 'Nigeria', 'Abuja', 923768, 154000000, 'AF', '.ng', 'NGN', 'Naira', '234', '######', '^(\\d{6})$', 'en-NG,ha,yo,ig,ff', 2328926, 'TD,NE,BJ,CM', ''),
(166, 'NI', 'NIC', 558, 'NU', 'Nicaragua', 'Managua', 129494, 5995928, 'CA', '.ni', 'NIO', 'Cordoba', '505', '###-###-#', '^(\\d{7})$', 'es-NI,en', 3617476, 'CR,HN', ''),
(167, 'NL', 'NLD', 528, 'NL', 'Netherlands', 'Amsterdam', 41526, 16645000, 'EU', '.nl', 'EUR', 'Euro', '31', '#### @@', '^(\\d{4}[A-Z]{2})$', 'nl-NL,fy-NL', 2750405, 'DE,BE', ''),
(168, 'NO', 'NOR', 578, 'NO', 'Norway', 'Oslo', 324220, 4907000, 'EU', '.no', 'NOK', 'Krone', '47', '####', '^(\\d{4})$', 'no,nb,nn,se,fi', 3144096, 'FI,RU,SE', ''),
(169, 'NP', 'NPL', 524, 'NP', 'Nepal', 'Kathmandu', 140800, 28951852, 'AS', '.np', 'NPR', 'Rupee', '977', '#####', '^(\\d{5})$', 'ne,en', 1282988, 'CN,IN', ''),
(170, 'NR', 'NRU', 520, 'NR', 'Nauru', 'Yaren', 21, 10065, 'OC', '.nr', 'AUD', 'Dollar', '674', '', '', 'na,en-NR', 2110425, '', ''),
(171, 'NU', 'NIU', 570, 'NE', 'Niue', 'Alofi', 260, 2166, 'OC', '.nu', 'NZD', 'Dollar', '683', '', '', 'niu,en-NU', 4036232, '', ''),
(172, 'NZ', 'NZL', 554, 'NZ', 'New Zealand', 'Wellington', 268680, 4252277, 'OC', '.nz', 'NZD', 'Dollar', '64', '####', '^(\\d{4})$', 'en-NZ,mi', 2186224, '', ''),
(173, 'OM', 'OMN', 512, 'MU', 'Oman', 'Muscat', 212460, 2967717, 'AS', '.om', 'OMR', 'Rial', '968', '###', '^(\\d{3})$', 'ar-OM,en,bal,ur', 286963, 'SA,YE,AE', ''),
(174, 'PA', 'PAN', 591, 'PM', 'Panama', 'Panama City', 78200, 3410676, 'CA', '.pa', 'PAB', 'Balboa', '507', '', '', 'es-PA,en', 3703430, 'CR,CO', ''),
(175, 'PE', 'PER', 604, 'PE', 'Peru', 'Lima', 1285220, 29907003, 'SA', '.pe', 'PEN', 'Sol', '51', '', '', 'es-PE,qu,ay', 3932488, 'EC,CL,BO,BR,CO', ''),
(176, 'PF', 'PYF', 258, 'FP', 'French Polynesia', 'Papeete', 4167, 270485, 'OC', '.pf', 'XPF', 'Franc', '689', '#####', '^((97)|(98)7\\d{2})$', 'fr-PF,ty', 4030656, '', ''),
(177, 'PG', 'PNG', 598, 'PP', 'Papua New Guinea', 'Port Moresby', 462840, 6064515, 'OC', '.pg', 'PGK', 'Kina', '675', '###', '^(\\d{3})$', 'en-PG,ho,meu,tpi', 2088628, 'ID', ''),
(178, 'PH', 'PHL', 608, 'RP', 'Philippines', 'Manila', 300000, 99900177, 'AS', '.ph', 'PHP', 'Peso', '63', '####', '^(\\d{4})$', 'tl,en-PH,fil', 1694008, '', ''),
(179, 'PK', 'PAK', 586, 'PK', 'Pakistan', 'Islamabad', 803940, 184404791, 'AS', '.pk', 'PKR', 'Rupee', '92', '#####', '^(\\d{5})$', 'ur-PK,en-PK,pa,sd,ps,brh', 1168579, 'CN,AF,IR,IN', ''),
(180, 'PL', 'POL', 616, 'PL', 'Poland', 'Warsaw', 312685, 38500000, 'EU', '.pl', 'PLN', 'Zloty', '48', '##-###', '^(\\d{5})$', 'pl', 798544, 'DE,LT,SK,CZ,BY,UA,RU', ''),
(181, 'PM', 'SPM', 666, 'SB', 'Saint Pierre and Miquelon', 'Saint-Pierre', 242, 7012, 'NA', '.pm', 'EUR', 'Euro', '508', '#####', '^(97500)$', 'fr-PM', 3424932, '', ''),
(182, 'PN', 'PCN', 612, 'PC', 'Pitcairn', 'Adamstown', 47, 46, 'OC', '.pn', 'NZD', 'Dollar', '870', '', '', 'en-PN', 4030699, '', ''),
(183, 'PR', 'PRI', 630, 'RQ', 'Puerto Rico', 'San Juan', 9104, 3916632, 'NA', '.pr', 'USD', 'Dollar', '+1-787 and ', '#####-####', '^(\\d{9})$', 'en-PR,es-PR', 4566966, '', ''),
(184, 'PS', 'PSE', 275, 'WE', 'Palestinian Territory', 'East Jerusalem', 5970, 3800000, 'AS', '.ps', 'ILS', 'Shekel', '970', '', '', 'ar-PS', 6254930, 'JO,IL', ''),
(185, 'PT', 'PRT', 620, 'PO', 'Portugal', 'Lisbon', 92391, 10676000, 'EU', '.pt', 'EUR', 'Euro', '351', '####-###', '^(\\d{7})$', 'pt-PT,mwl', 2264397, 'ES', ''),
(186, 'PW', 'PLW', 585, 'PS', 'Palau', 'Melekeok', 458, 19907, 'OC', '.pw', 'USD', 'Dollar', '680', '96940', '^(96940)$', 'pau,sov,en-PW,tox,ja,fil,zh', 1559582, '', ''),
(187, 'PY', 'PRY', 600, 'PA', 'Paraguay', 'Asunción', 406750, 6375830, 'SA', '.py', 'PYG', 'Guarani', '595', '####', '^(\\d{4})$', 'es-PY,gn', 3437598, 'BO,BR,AR', ''),
(188, 'QA', 'QAT', 634, 'QA', 'Qatar', 'Doha', 11437, 840926, 'AS', '.qa', 'QAR', 'Rial', '974', '', '', 'ar-QA,es', 289688, 'SA', ''),
(189, 'RE', 'REU', 638, 'RE', 'Reunion', 'Saint-Denis', 2517, 776948, 'AF', '.re', 'EUR', 'Euro', '262', '#####', '^((97)|(98)(4|7|8)\\d', 'fr-RE', 935317, '', ''),
(190, 'RO', 'ROU', 642, 'RO', 'Romania', 'Bucharest', 237500, 21959278, 'EU', '.ro', 'RON', 'Leu', '40', '######', '^(\\d{6})$', 'ro,hu,rom', 798549, 'MD,HU,UA,CS,BG,RS', ''),
(191, 'RS', 'SRB', 688, 'RI', 'Serbia', 'Belgrade', 88361, 7344847, 'EU', '.rs', 'RSD', 'Dinar', '381', '######', '^(\\d{6})$', 'sr,hu,bs,rom', 6290252, 'AL,HU,MK,RO,HR,BA,BG,ME,XK', ''),
(192, 'RU', 'RUS', 643, 'RS', 'Russia', 'Moscow', 17100000, 140702000, 'EU', '.ru', 'RUB', 'Ruble', '7', '######', '^(\\d{6})$', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 2017370, 'GE,CN,BY,UA,KZ,LV,PL,EE,LT,FI,MN,NO,AZ,KP', ''),
(193, 'RW', 'RWA', 646, 'RW', 'Rwanda', 'Kigali', 26338, 11055976, 'AF', '.rw', 'RWF', 'Franc', '250', '', '', 'rw,en-RW,fr-RW,sw', 49518, 'TZ,CD,BI,UG', ''),
(194, 'SA', 'SAU', 682, 'SA', 'Saudi Arabia', 'Riyadh', 1960582, 25731776, 'AS', '.sa', 'SAR', 'Rial', '966', '#####', '^(\\d{5})$', 'ar-SA', 102358, 'QA,OM,IQ,YE,JO,AE,KW', ''),
(195, 'SB', 'SLB', 90, 'BP', 'Solomon Islands', 'Honiara', 28450, 559198, 'OC', '.sb', 'SBD', 'Dollar', '677', '', '', 'en-SB,tpi', 2103350, '', ''),
(196, 'SC', 'SYC', 690, 'SE', 'Seychelles', 'Victoria', 455, 88340, 'AF', '.sc', 'SCR', 'Rupee', '248', '', '', 'en-SC,fr-SC', 241170, '', ''),
(197, 'SD', 'SDN', 736, 'SU', 'Sudan', 'Khartoum', 2505810, 43939598, 'AF', '.sd', 'SDG', 'Dinar', '249', '#####', '^(\\d{5})$', 'ar-SD,en,fia', 366755, 'TD,ER,ET,LY,KE,CF,CD,UG,EG', ''),
(198, 'SE', 'SWE', 752, 'SW', 'Sweden', 'Stockholm', 449964, 9045000, 'EU', '.se', 'SEK', 'Krona', '46', 'SE-### ##', '^(?:SE)*(\\d{5})$', 'sv-SE,se,sma,fi-SE', 2661886, 'NO,FI', ''),
(199, 'SG', 'SGP', 702, 'SN', 'Singapore', 'Singapur', 693, 4701069, 'AS', '.sg', 'SGD', 'Dollar', '65', '######', '^(\\d{6})$', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 1880251, '', ''),
(200, 'SH', 'SHN', 654, 'SH', 'Saint Helena', 'Jamestown', 410, 7460, 'AF', '.sh', 'SHP', 'Pound', '290', 'STHL 1ZZ', '^(STHL1ZZ)$', 'en-SH', 3370751, '', ''),
(201, 'SI', 'SVN', 705, 'SI', 'Slovenia', 'Ljubljana', 20273, 2007000, 'EU', '.si', 'EUR', 'Euro', '386', 'SI- ####', '^(?:SI)*(\\d{4})$', 'sl,sh', 3190538, 'HU,IT,HR,AT', ''),
(202, 'SJ', 'SJM', 744, 'SV', 'Svalbard and Jan Mayen', 'Longyearbyen', 62049, 2550, 'EU', '.sj', 'NOK', 'Krone', '47', '', '', 'no,ru', 607072, '', ''),
(203, 'SK', 'SVK', 703, 'LO', 'Slovakia', 'Bratislava', 48845, 5455000, 'EU', '.sk', 'EUR', 'Euro', '421', '###  ##', '^(\\d{5})$', 'sk,hu', 3057568, 'PL,HU,CZ,UA,AT', ''),
(204, 'SL', 'SLE', 694, 'SL', 'Sierra Leone', 'Freetown', 71740, 5245695, 'AF', '.sl', 'SLL', 'Leone', '232', '', '', 'en-SL,men,tem', 2403846, 'LR,GN', ''),
(205, 'SM', 'SMR', 674, 'SM', 'San Marino', 'San Marino', 61, 31477, 'EU', '.sm', 'EUR', 'Euro', '378', '4789#', '^(4789\\d)$', 'it-SM', 3168068, 'IT', ''),
(206, 'SN', 'SEN', 686, 'SG', 'Senegal', 'Dakar', 196190, 12323252, 'AF', '.sn', 'XOF', 'Franc', '221', '#####', '^(\\d{5})$', 'fr-SN,wo,fuc,mnk', 2245662, 'GN,MR,GW,GM,ML', ''),
(207, 'SO', 'SOM', 706, 'SO', 'Somalia', 'Mogadishu', 637657, 10112453, 'AF', '.so', 'SOS', 'Shilling', '252', '@@  #####', '^([A-Z]{2}\\d{5})$', 'so-SO,ar-SO,it,en-SO', 51537, 'ET,KE,DJ', ''),
(208, 'SR', 'SUR', 740, 'NS', 'Suriname', 'Paramaribo', 163270, 492829, 'SA', '.sr', 'SRD', 'Dollar', '597', '', '', 'nl-SR,en,srn,hns,jv', 3382998, 'GY,BR,GF', ''),
(209, 'ST', 'STP', 678, 'TP', 'Sao Tome and Principe', 'São Tomé', 1001, 175808, 'AF', '.st', 'STD', 'Dobra', '239', '', '', 'pt-ST', 2410758, '', ''),
(210, 'SV', 'SLV', 222, 'ES', 'El Salvador', 'San Salvador', 21040, 6052064, 'CA', '.sv', 'USD', 'Dollar', '503', 'CP ####', '^(?:CP)*(\\d{4})$', 'es-SV', 3585968, 'GT,HN', ''),
(211, 'SX', 'SXM', 534, 'NN', 'Sint Maarten', 'Philipsburg', NULL, 37429, 'NA', '.sx', 'ANG', 'Guilder', '599', '', '', 'nl,en', 7609695, 'MF', ''),
(212, 'SY', 'SYR', 760, 'SY', 'Syria', 'Damascus', 185180, 22198110, 'AS', '.sy', 'SYP', 'Pound', '963', '', '', 'ar-SY,ku,hy,arc,fr,en', 163843, 'IQ,JO,IL,TR,LB', ''),
(213, 'SZ', 'SWZ', 748, 'WZ', 'Swaziland', 'Mbabane', 17363, 1354051, 'AF', '.sz', 'SZL', 'Lilangeni', '268', '@###', '^([A-Z]\\d{3})$', 'en-SZ,ss-SZ', 934841, 'ZA,MZ', ''),
(214, 'TC', 'TCA', 796, 'TK', 'Turks and Caicos Islands', 'Cockburn Town', 430, 20556, 'NA', '.tc', 'USD', 'Dollar', '+1-649', 'TKCA 1ZZ', '^(TKCA 1ZZ)$', 'en-TC', 3576916, '', ''),
(215, 'TD', 'TCD', 148, 'CD', 'Chad', 'N''Djamena', 1284000, 10543464, 'AF', '.td', 'XAF', 'Franc', '235', '', '', 'fr-TD,ar-TD,sre', 2434508, 'NE,LY,CF,SD,CM,NG', ''),
(216, 'TF', 'ATF', 260, 'FS', 'French Southern Territories', 'Port-aux-Français', 7829, 140, 'AN', '.tf', 'EUR', 'Euro  ', '', '', '', 'fr', 1546748, '', ''),
(217, 'TG', 'TGO', 768, 'TO', 'Togo', 'Lomé', 56785, 6587239, 'AF', '.tg', 'XOF', 'Franc', '228', '', '', 'fr-TG,ee,hna,kbp,dag,ha', 2363686, 'BJ,GH,BF', ''),
(218, 'TH', 'THA', 764, 'TH', 'Thailand', 'Bangkok', 514000, 67089500, 'AS', '.th', 'THB', 'Baht', '66', '#####', '^(\\d{5})$', 'th,en', 1605651, 'LA,MM,KH,MY', ''),
(219, 'TJ', 'TJK', 762, 'TI', 'Tajikistan', 'Dushanbe', 143100, 7487489, 'AS', '.tj', 'TJS', 'Somoni', '992', '######', '^(\\d{6})$', 'tg,ru', 1220409, 'CN,AF,KG,UZ', ''),
(220, 'TK', 'TKL', 772, 'TL', 'Tokelau', '', 10, 1466, 'OC', '.tk', 'NZD', 'Dollar', '690', '', '', 'tkl,en-TK', 4031074, '', ''),
(221, 'TL', 'TLS', 626, 'TT', 'East Timor', 'Dili', 15007, 1154625, '', '.tp', 'USD', 'Dollar', '670', '', '', 'tet,pt-TL,id,en', 1966436, 'ID', ''),
(222, 'TM', 'TKM', 795, 'TX', 'Turkmenistan', 'Ashgabat', 488100, 4940916, 'AS', '.tm', 'TMT', 'Manat', '993', '######', '^(\\d{6})$', 'tk,ru,uz', 1218197, 'AF,IR,UZ,KZ', ''),
(223, 'TN', 'TUN', 788, 'TS', 'Tunisia', 'Tunis', 163610, 10589025, 'AF', '.tn', 'TND', 'Dinar', '216', '####', '^(\\d{4})$', 'ar-TN,fr', 2464461, 'DZ,LY', ''),
(224, 'TO', 'TON', 776, 'TN', 'Tonga', 'Nuku''alofa', 748, 122580, 'OC', '.to', 'TOP', 'Pa''anga', '676', '', '', 'to,en-TO', 4032283, '', ''),
(225, 'TR', 'TUR', 792, 'TU', 'Turkey', 'Ankara', 780580, 77804122, 'AS', '.tr', 'TRY', 'Lira', '90', '#####', '^(\\d{5})$', 'tr-TR,ku,diq,az,av', 298795, 'SY,GE,IQ,IR,GR,AM,AZ,BG', ''),
(226, 'TT', 'TTO', 780, 'TD', 'Trinidad and Tobago', 'Port of Spain', 5128, 1228691, 'NA', '.tt', 'TTD', 'Dollar', '+1-868', '', '', 'en-TT,hns,fr,es,zh', 3573591, '', ''),
(227, 'TV', 'TUV', 798, 'TV', 'Tuvalu', 'Funafuti', 26, 10472, 'OC', '.tv', 'AUD', 'Dollar', '688', '', '', 'tvl,en,sm,gil', 2110297, '', ''),
(228, 'TW', 'TWN', 158, 'TW', 'Taiwan', 'Taipei', 35980, 22894384, 'AS', '.tw', 'TWD', 'Dollar', '886', '#####', '^(\\d{5})$', 'zh-TW,zh,nan,hak', 1668284, '', ''),
(229, 'TZ', 'TZA', 834, 'TZ', 'Tanzania', 'Dodoma', 945087, 41892895, 'AF', '.tz', 'TZS', 'Shilling', '255', '', '', 'sw-TZ,en,ar', 149590, 'MZ,KE,CD,RW,ZM,BI,UG,MW', ''),
(230, 'UA', 'UKR', 804, 'UP', 'Ukraine', 'Kiev', 603700, 45415596, 'EU', '.ua', 'UAH', 'Hryvnia', '380', '#####', '^(\\d{5})$', 'uk,ru-UA,rom,pl,hu', 690791, 'PL,MD,HU,SK,BY,RO,RU', ''),
(231, 'UG', 'UGA', 800, 'UG', 'Uganda', 'Kampala', 236040, 33398682, 'AF', '.ug', 'UGX', 'Shilling', '256', '', '', 'en-UG,lg,sw,ar', 226074, 'TZ,KE,SD,CD,RW', ''),
(232, 'UM', 'UMI', 581, '', 'United States Minor Outlying Islands', '', 0, 0, 'OC', '.um', 'USD', 'Dollar ', '1', '', '', 'en-UM', 5854968, '', ''),
(233, 'US', 'USA', 840, 'US', 'United States', 'Washington', 9629091, 310232863, 'NA', '.us', 'USD', 'Dollar', '1', '#####-####', '^(\\d{9})$', 'en-US,es-US,haw,fr', 6252001, 'CA,MX,CU', ''),
(234, 'UY', 'URY', 858, 'UY', 'Uruguay', 'Montevideo', 176220, 3477000, 'SA', '.uy', 'UYU', 'Peso', '598', '#####', '^(\\d{5})$', 'es-UY', 3439705, 'BR,AR', ''),
(235, 'UZ', 'UZB', 860, 'UZ', 'Uzbekistan', 'Tashkent', 447400, 27865738, 'AS', '.uz', 'UZS', 'Som', '998', '######', '^(\\d{6})$', 'uz,ru,tg', 1512440, 'TM,AF,KG,TJ,KZ', ''),
(236, 'VA', 'VAT', 336, 'VT', 'Vatican', 'Vatican City', 0, 921, 'EU', '.va', 'EUR', 'Euro', '379', '', '', 'la,it,fr', 3164670, 'IT', ''),
(237, 'VC', 'VCT', 670, 'VC', 'Saint Vincent and the Grenadines', 'Kingstown', 389, 104217, 'NA', '.vc', 'XCD', 'Dollar', '+1-784', '', '', 'en-VC,fr', 3577815, '', ''),
(238, 'VE', 'VEN', 862, 'VE', 'Venezuela', 'Caracas', 912050, 27223228, 'SA', '.ve', 'VEF', 'Bolivar', '58', '####', '^(\\d{4})$', 'es-VE', 3625428, 'GY,BR,CO', ''),
(239, 'VG', 'VGB', 92, 'VI', 'British Virgin Islands', 'Road Town', 153, 21730, 'NA', '.vg', 'USD', 'Dollar', '+1-284', '', '', 'en-VG', 3577718, '', ''),
(240, 'VI', 'VIR', 850, 'VQ', 'U.S. Virgin Islands', 'Charlotte Amalie', 352, 108708, 'NA', '.vi', 'USD', 'Dollar', '+1-340', '', '', 'en-VI', 4796775, '', ''),
(241, 'VN', 'VNM', 704, 'VM', 'Vietnam', 'Hanoi', 329560, 89571130, 'AS', '.vn', 'VND', 'Dong', '84', '######', '^(\\d{6})$', 'vi,en,fr,zh,km', 1562822, 'CN,LA,KH', ''),
(242, 'VU', 'VUT', 548, 'NH', 'Vanuatu', 'Port Vila', 12200, 221552, 'OC', '.vu', 'VUV', 'Vatu', '678', '', '', 'bi,en-VU,fr-VU', 2134431, '', ''),
(243, 'WF', 'WLF', 876, 'WF', 'Wallis and Futuna', 'Matâ''Utu', 274, 16025, 'OC', '.wf', 'XPF', 'Franc', '681', '#####', '^(986\\d{2})$', 'wls,fud,fr-WF', 4034749, '', ''),
(244, 'WS', 'WSM', 882, 'WS', 'Samoa', 'Apia', 2944, 192001, 'OC', '.ws', 'WST', 'Tala', '685', '', '', 'sm,en-WS', 4034894, '', ''),
(245, 'YE', 'YEM', 887, 'YM', 'Yemen', 'San‘a’', 527970, 23495361, 'AS', '.ye', 'YER', 'Rial', '967', '', '', 'ar-YE', 69543, 'SA,OM', ''),
(246, 'YT', 'MYT', 175, 'MF', 'Mayotte', 'Mamoudzou', 374, 159042, 'AF', '.yt', 'EUR', 'Euro', '262', '#####', '^(\\d{5})$', 'fr-YT', 1024031, '', ''),
(247, 'ZA', 'ZAF', 710, 'SF', 'South Africa', 'Pretoria', 1219912, 49000000, 'AF', '.za', 'ZAR', 'Rand', '27', '####', '^(\\d{4})$', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 953987, 'ZW,SZ,MZ,BW,NA,LS', ''),
(248, 'ZM', 'ZMB', 894, 'ZA', 'Zambia', 'Lusaka', 752614, 13460305, 'AF', '.zm', 'ZMK', 'Kwacha', '260', '#####', '^(\\d{5})$', 'en-ZM,bem,loz,lun,lue,ny,toi', 895949, 'ZW,TZ,MZ,CD,NA,MW,AO', ''),
(249, 'ZW', 'ZWE', 716, 'ZI', 'Zimbabwe', 'Harare', 390580, 11651858, 'AF', '.zw', 'ZWL', 'Dollar', '263', '', '', 'en-ZW,sn,nr,nd', 878675, 'ZA,MZ,BW,ZM', ''),
(251, 'AN', 'ANT', 530, 'NT', 'Netherlands Antilles', 'Willemstad', 960, 136197, '', '.an', 'ANG', 'Guilder', '599', '', '', 'nl-AN,en,es', 0, 'GP', ''),
(252, 'TR', 'TUR', 792, 'TU', 'Turkey', 'Ankara', 780580, 77804122, 'EU', '.tr', 'TRY', 'Lira', '90', '#####', '^(\\d{5})$', 'tr-TR,ku,diq,az,av', 298795, 'SY,GE,IQ,IR,GR,AM,AZ,BG', '');

-- --------------------------------------------------------

--
-- Table structure for table `p630_files`
--

CREATE TABLE IF NOT EXISTS `p630_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `location` varchar(64) NOT NULL,
  `type` enum('photo','video','micro','pdf','audio') NOT NULL,
  `date` datetime NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `format` varchar(12) NOT NULL,
  `size` varchar(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `p630_files`
--

INSERT INTO `p630_files` (`file_id`, `name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`) VALUES
(13, 'Penguins', '50d96f68aa24a.jpg', 'photo', '2012-12-25 09:18:32', 21, 'jpg', '0.74'),
(14, 'Hydrangeas', '50d97159328b2.jpg', 'photo', '2012-12-25 09:26:49', 21, 'jpg', '0.57'),
(15, 'Gangnam Style - PSY-(MobiDreamz.in)', '50d97480c5d88.mp4', 'video', '2012-12-25 09:40:16', 21, 'mp4', '24.25'),
(16, 'Design-2Brequirement-2Bform', '50d9748c8aa04.doc', 'micro', '2012-12-25 09:40:28', 21, 'doc', '0.13'),
(17, 'Maid with the Flaxen Hair', '50d97498e50ca.mp3', 'audio', '2012-12-25 09:40:40', 21, 'mp3', '3.92'),
(18, 'Kalimba', '50d9749fbe89f.mp3', 'audio', '2012-12-25 09:40:47', 21, 'mp3', '8.02'),
(19, 'WBS_P630-Somnath-Sir', '50d974bb92ad6.docx', 'micro', '2012-12-25 09:41:15', 21, 'docx', '0.03'),
(20, 'Tulips', '50da9c482b71a.jpg', 'photo', '2012-12-26 06:42:16', 26, 'jpg', '0.59'),
(21, 'Lighthouse', '50dd4210571de.jpg', 'photo', '2012-12-28 06:54:08', 20, 'jpg', '0.54'),
(22, 'Design-2Brequirement-2Bform', '50dd424e28ab2.doc', 'micro', '2012-12-28 06:55:10', 20, 'doc', '0.13'),
(23, 'Tulips', '50de8d1560ea2.jpg', 'photo', '2012-12-29 06:26:29', 23, 'jpg', '0.59'),
(24, 'Chrysanthemum', '50de8d1aea0e7.jpg', 'photo', '2012-12-29 06:26:35', 23, 'jpg', '0.84'),
(25, 'Jellyfish', '50de8d221f433.jpg', 'photo', '2012-12-29 06:26:42', 23, 'jpg', '0.74'),
(26, 'Design-2Brequirement-2Bform', '50de8d2af3b7a.doc', 'micro', '2012-12-29 06:26:50', 23, 'doc', '0.13'),
(27, 'Maid with the Flaxen Hair', '50de8d3575027.mp3', 'audio', '2012-12-29 06:27:01', 23, 'mp3', '3.92'),
(33, 'Confirm - Functionality-doc-of-P630_comments_v2', '50e80c5b4b490.docx', 'micro', '2013-01-05 11:19:55', 23, 'docx', '1.18'),
(34, 'Design-2Brequirement-2Bform', '50e80c5b4c591.doc', 'micro', '2013-01-05 11:19:55', 23, 'doc', '0.13'),
(35, 'atoms1', '50ebb8cd9ce7c.jpg', 'photo', '2013-01-08 06:12:30', 23, 'jpg', '0.72'),
(36, 'atoms2', '50ebb8ce09f7d.gif', 'photo', '2013-01-08 06:12:30', 23, 'gif', '0.03'),
(37, '2100997fa43fa2eac8f4797bbc26f5b8', '50ebb92e30de9.jpeg', 'photo', '2013-01-08 06:14:06', 23, 'jpeg', '0'),
(38, 'atoms1', '50ebb92e34776.jpg', 'photo', '2013-01-08 06:14:06', 23, 'jpg', '0.72'),
(39, 'Confirm - Functionality-doc-of-P630_comments_v2', '50ebb92e9a6f8.docx', 'micro', '2013-01-08 06:14:06', 23, 'docx', '1.18'),
(40, 'Penguins', '50ebea122feca.jpg', 'photo', '2013-01-08 09:42:42', 23, 'jpg', '0.74'),
(41, 'Penguins', '50ebea1d5d3e9.jpg', 'photo', '2013-01-08 09:42:53', 23, 'jpg', '0.74'),
(42, 'Koala', '50ebeab1ec444.jpg', 'photo', '2013-01-08 09:45:22', 23, 'jpg', '0.74'),
(43, 'Lighthouse', '50ebeab22bfc4.jpg', 'photo', '2013-01-08 09:45:22', 23, 'jpg', '0.54'),
(44, 'Penguins', '50ebeab25c501.jpg', 'photo', '2013-01-08 09:45:22', 23, 'jpg', '0.74'),
(45, 'Desert', '50ec23ed72fd3.jpg', 'photo', '2013-01-08 13:49:33', 23, 'jpg', '0.81'),
(46, 'Hydrangeas', '50ec23edaa97f.jpg', 'photo', '2013-01-08 13:49:33', 23, 'jpg', '0.57'),
(47, 'Koala', '50ec23eddb71e.jpg', 'photo', '2013-01-08 13:49:34', 23, 'jpg', '0.74'),
(48, '2100997fa43fa2eac8f4797bbc26f5b8', '50f0ec9836348.jpeg', 'photo', '2013-01-12 04:54:48', 23, 'jpeg', '0'),
(49, 'computer science', '50f5598fc16aa.gif', 'photo', '2013-01-15 13:28:47', 37, 'gif', '0.01'),
(51, 'Tesing Pdf File', '50f55c12302f6.pdf', 'pdf', '2013-01-15 13:39:30', 37, 'pdf', '0'),
(52, 'Test - Copy', '50f55c270364f.ppt', 'micro', '2013-01-15 13:39:51', 37, 'ppt', '0.87'),
(53, 'Test', '50f55c4501617.docx', 'micro', '2013-01-15 13:40:21', 37, 'docx', '0.02'),
(54, 'Sleep Away', '50f55cb53396a.mp3', 'audio', '2013-01-15 13:42:13', 37, 'mp3', '4.62'),
(55, 'Interview Tips - Get Your Next HR Manager Job _ HR Crest', '50f55cc76ed2b.mp4', 'video', '2013-01-15 13:42:31', 37, 'mp4', '72.22'),
(56, 'Wildlife', '50f7ffd210228.wmv', 'video', '2013-01-17 13:42:42', 23, 'wmv', '25.03'),
(57, 'Wildlife', '50f7ffdac4842.wmv', 'video', '2013-01-17 13:42:50', 23, 'wmv', '25.03');

-- --------------------------------------------------------

--
-- Table structure for table `p630_global_setting`
--

CREATE TABLE IF NOT EXISTS `p630_global_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `p630_global_setting`
--

INSERT INTO `p630_global_setting` (`id`, `name`, `value`) VALUES
(1, 'SITE_TITLE', 'Guru Bul'),
(2, 'SITE_EMAIL', 'sahil@panaceatek.com'),
(3, 'FIRST_CONSULTATIONS_COST', '40'),
(4, 'REPEAT_CONSULTATIONS_COST', '20');

-- --------------------------------------------------------

--
-- Table structure for table `p630_language`
--

CREATE TABLE IF NOT EXISTS `p630_language` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(100) DEFAULT NULL,
  `lang_icon` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `p630_language`
--

INSERT INTO `p630_language` (`lang_id`, `lang_name`, `lang_icon`, `status`) VALUES
(2, 'Afrikaans', '', 'I'),
(4, 'Arabic', '', 'I'),
(5, 'Armenian', '', 'I'),
(7, 'Basque', '', 'I'),
(8, 'Belarusian', '', 'I'),
(9, 'Bengali', '', 'I'),
(10, 'Bulgarian', '', 'I'),
(11, 'Catalan', '', 'I'),
(12, 'Chinese', '', 'I'),
(13, 'Croatian', '', 'I'),
(14, 'Czech', '', 'I'),
(15, 'Danish', '', 'I'),
(16, 'Dutch', '', 'I'),
(17, 'English', 'en.jpg', 'A'),
(18, 'Esperanto', '', 'I'),
(19, 'Estonian', '', 'I'),
(20, 'Filipino', '', 'I'),
(21, 'Finnish', '', 'I'),
(22, 'French', '', 'I'),
(23, 'Galician', '', 'I'),
(24, 'Georgian', '', 'I'),
(25, 'German', '', 'I'),
(26, 'Greek', '', 'I'),
(27, 'Gujarati', '', 'I'),
(28, 'Haitian Creole', '', 'I'),
(29, 'Hebrew', '', 'I'),
(30, 'Hindi', '', 'I'),
(31, 'Hungarian', '', 'I'),
(32, 'Icelandic', '', 'I'),
(33, 'Indonesian', '', 'I'),
(34, 'Irish', '', 'I'),
(35, 'Italian', '', 'I'),
(36, 'Japanese', 'ar.png', 'A'),
(37, 'Kannada', '', 'I'),
(38, 'Korean', '', 'I'),
(39, 'Latin', '', 'I'),
(40, 'Latvian', '', 'I'),
(41, 'Lithuanian', '', 'I'),
(42, 'Macedonian', '', 'I'),
(43, 'Malay', '', 'I'),
(44, 'Maltese', '', 'I'),
(45, 'Norwegian', '', 'I'),
(46, 'Persian', '', 'I'),
(47, 'Polish', '', 'I'),
(48, 'Portuguese', '', 'I'),
(49, 'Romanian', '', 'I'),
(50, 'Russian', '', 'I'),
(51, 'Serbian', '', 'I'),
(52, 'Slovak', '', 'I'),
(53, 'Slovenian', '', 'I'),
(54, 'Spanish', '', 'I'),
(55, 'Swahili', '', 'I'),
(56, 'Swedish', '', 'I'),
(57, 'Tamil', '', 'I'),
(58, 'Telugu', '', 'I'),
(59, 'Thai', '', 'I'),
(60, 'Turkish', '', 'I'),
(61, 'Ukrainian', '', 'I'),
(62, 'Urdu', '', 'I'),
(63, 'Vietnamese', '', 'I'),
(64, 'Welsh', '', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `p630_mail_bodies`
--

CREATE TABLE IF NOT EXISTS `p630_mail_bodies` (
  `mail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mail_page_id` varchar(100) NOT NULL DEFAULT '0',
  `mail_lang` varchar(50) NOT NULL,
  `mail_subject` varchar(150) NOT NULL,
  `mail_description` longtext NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `p630_mail_bodies`
--

INSERT INTO `p630_mail_bodies` (`mail_id`, `mail_page_id`, `mail_lang`, `mail_subject`, `mail_description`) VALUES
(1, 'user_change_email', '1', 'Guru Bul - user new email - verification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJXVzZXJuYW1lJSU8c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7Ij4sPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgbGluZS1oZWlnaHQ6IDIwcHg7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6ICM2NDY0NjQ7Ij4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwO1lvdXIgZW1haWwgYWRkcmVzcyBoYXMgYmVlbiBjaGFuZ2VkLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxzcGFuPllvdSB3aWxsIG5vdCBiZSBhYmxlIHRvIHVzZSB5b3VyIG9sZCBlbWFpbCBhZGRyZXNzIHRvIGxvZ2luIGFueW1vcmUuPC9zcGFuPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPllvdXIgbG9naW4gZGV0YWlscyBhcmUgYmVsb3cgOi08L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij48c3Ryb25nPkVtYWlsPC9zdHJvbmc+Oi0gJSVlbWFpbCUlPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+PHN0cm9uZz5QYXNzd29yZDwvc3Ryb25nPjotICUlcGFzc3dvcmQlJTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxhIGhyZWY9IiUlY29uZmlybV9saW5rJSUiPkNsaWNrIGhlcmU8L2E+IHRvIGFjdGl2YXRlIHlvdXIgYWNjb3VudCB3aXRoIHlvdXIgbmV3IGVtYWlsIGFkZHJlc3MuJm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5TaW5jZXJseTxiciAvPjxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsgbGluZS1oZWlnaHQ6IG5vcm1hbDsiPkd1cnUgQnVsIFRlYW08L3NwYW4+PC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7IGJvcmRlci1ib3R0b206IDVweCBzb2xpZCAjN0M3RjgyOyBib3JkZXItdG9wOiA1cHggc29saWQgIzdDN0Y4MjsgYmFja2dyb3VuZDogIzRCNEU1MTsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBmbG9hdDogbGVmdDsgaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiA1MHB4OyBjb2xvcjogI2ZmZmZmZjsiPg0KPGRpdiBzdHlsZT0iY29sb3I6ICNmZmZmZmY7IGZvbnQtc2l6ZTogMTJweDsgZm9udC13ZWlnaHQ6IGJvbGQ7IGxpbmUtaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGZsb2F0OiBsZWZ0OyBtYXJnaW46IDAgNXB4OyI+JmNvcHk7IDIwMTIgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5HdXJ1QnVsLmNvbTwvYT4gTGltaXRlZCB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2VjdXJpdHkgJmFtcDsgUHJpdmFjeTwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlRlcm1zICZhbXA7IExlZ2FsPC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2l0ZSBNYXA8L2E+PC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogcmlnaHQ7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDI2cHg7IG1hcmdpbjogMCAxMHB4OyBmb250LXNpemU6IDEzcHg7Ij5DcmVhdGVkIGJ5IFBhbmFjZWEgSW5mb3RlY2ggUHZ0LiBMdGQuPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+'),
(15, 'user_change_pass', '1', 'Guru Bul - Successful password change - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJXVzZXJuYW1lJSU8c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7Ij4sPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgbGluZS1oZWlnaHQ6IDIwcHg7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6ICM2NDY0NjQ7Ij4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPllvdSBoYXZlIHN1Y2Nlc2Z1bGx5IGNoYW5nZWQgeW91ciBwYXNzd29yZDwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPllvdXIgbG9naW4gZGV0YWlscyBhcmUgYmVsb3cgOi08L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij48c3Ryb25nPkVtYWlsPC9zdHJvbmc+Oi0gJSVlbWFpbCUlPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+PHN0cm9uZz5QYXNzd29yZDwvc3Ryb25nPjotICUlcGFzc3dvcmQlJTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTZweDsgY29sb3I6ICM0MjQyNDI7IGxpbmUtaGVpZ2h0OiAzMHB4OyI+U2luY2VybHk8YnIgLz48c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7IGxpbmUtaGVpZ2h0OiBub3JtYWw7Ij5HdXJ1IEJ1bCBUZWFtPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBoZWlnaHQ6IDI1cHg7IG1hcmdpbjogMTBweCAwcHggMTBweCAwcHg7Ij4NCjxkaXYgc3R5bGU9ImZsb2F0OiByaWdodDsiPg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9ImZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE2cHg7IGNvbG9yOiAjMDAzZGE2OyBsaW5lLWhlaWdodDogMjRweDsgcGFkZGluZy1yaWdodDogNXB4OyI+PHNwYW4gc3R5bGU9ImZsb2F0OiBsZWZ0OyI+Rm9sbG93IHVzIG9uPC9zcGFuPiA8YSBzdHlsZT0icGFkZGluZzogMHB4IDVweDsgZmxvYXQ6IGxlZnQ7IiBocmVmPSJqYXZhc2NyaXB0OnZvaWQoMCk7Ij48aW1nIHNyYz0iaW1hZ2VzL3R3aXQucG5nIiBhbHQ9InR3aXQiIGJvcmRlcj0iMCIgLz48L2E+IDxhIHN0eWxlPSJwYWRkaW5nOiAwcHggNXB4OyBmbG9hdDogbGVmdDsiIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKTsiPjxpbWcgc3JjPSJpbWFnZXMvZmFjZS5wbmciIGFsdD0iZmFjZSIgYm9yZGVyPSIwIiAvPjwvYT4gPGEgc3R5bGU9InBhZGRpbmc6IDBweCA1cHg7IGZsb2F0OiBsZWZ0OyIgaHJlZj0iamF2YXNjcmlwdDp2b2lkKDApOyI+PGltZyBzcmM9ImltYWdlcy9mbGlja2VyLnBuZyIgYWx0PSJmbGlja2VyIiBib3JkZXI9IjAiIC8+PC9hPiA8YSBzdHlsZT0icGFkZGluZzogMHB4IDVweDsgZmxvYXQ6IGxlZnQ7IiBocmVmPSJqYXZhc2NyaXB0OnZvaWQoMCk7Ij48aW1nIHNyYz0iaW1hZ2VzL3l1b3QucG5nIiBhbHQ9InlvdXR1YmUiIGJvcmRlcj0iMCIgLz48L2E+PC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7IGJvcmRlci1ib3R0b206IDVweCBzb2xpZCAjN0M3RjgyOyBib3JkZXItdG9wOiA1cHggc29saWQgIzdDN0Y4MjsgYmFja2dyb3VuZDogIzRCNEU1MTsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBmbG9hdDogbGVmdDsgaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiA1MHB4OyBjb2xvcjogI2ZmZmZmZjsiPg0KPGRpdiBzdHlsZT0iY29sb3I6ICNmZmZmZmY7IGZvbnQtc2l6ZTogMTJweDsgZm9udC13ZWlnaHQ6IGJvbGQ7IGxpbmUtaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGZsb2F0OiBsZWZ0OyBtYXJnaW46IDAgNXB4OyI+JmNvcHk7IDIwMTIgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5HdXJ1QnVsLmNvbTwvYT4gTGltaXRlZCB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2VjdXJpdHkgJmFtcDsgUHJpdmFjeTwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlRlcm1zICZhbXA7IExlZ2FsPC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2l0ZSBNYXA8L2E+PC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogcmlnaHQ7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDI2cHg7IG1hcmdpbjogMCAxMHB4OyBmb250LXNpemU6IDEzcHg7Ij5DcmVhdGVkIGJ5IFBhbmFjZWEgSW5mb3RlY2ggUHZ0LiBMdGQuPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+'),
(2, 'forgot_password', '1', 'Guru Bul - Forgot your password - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJXVzZXJuYW1lJSU8c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7Ij4sPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgbGluZS1oZWlnaHQ6IDIwcHg7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6ICM2NDY0NjQ7Ij4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPllvdXIgbG9naW4gZGV0YWlscyBhcmUgYmVsb3c8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij5FbWFpbDotICUlZW1haWwlJTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPlBhc3N3b3JkOi0gJSVwYXNzd29yZCUlPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5TaW5jZXJseTxiciAvPjxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsgbGluZS1oZWlnaHQ6IG5vcm1hbDsiPkd1cnUgQnVsIFRlYW08L3NwYW4+PC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7IGJvcmRlci1ib3R0b206IDVweCBzb2xpZCAjN0M3RjgyOyBib3JkZXItdG9wOiA1cHggc29saWQgIzdDN0Y4MjsgYmFja2dyb3VuZDogIzRCNEU1MTsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBmbG9hdDogbGVmdDsgaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiA1MHB4OyBjb2xvcjogI2ZmZmZmZjsiPg0KPGRpdiBzdHlsZT0iY29sb3I6ICNmZmZmZmY7IGZvbnQtc2l6ZTogMTJweDsgZm9udC13ZWlnaHQ6IGJvbGQ7IGxpbmUtaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGZsb2F0OiBsZWZ0OyBtYXJnaW46IDAgNXB4OyI+JmNvcHk7IDIwMTIgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5HdXJ1QnVsLmNvbTwvYT4gTGltaXRlZCB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2VjdXJpdHkgJmFtcDsgUHJpdmFjeTwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlRlcm1zICZhbXA7IExlZ2FsPC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2l0ZSBNYXA8L2E+PC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogcmlnaHQ7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDI2cHg7IG1hcmdpbjogMCAxMHB4OyBmb250LXNpemU6IDEzcHg7Ij5DcmVhdGVkIGJ5IDxhIHRpdGxlPSJwYW5hY2VhdGVrLmNvbSIgaHJlZj0iaHR0cDovL3d3dy5wYW5hY2VhdGVrLmNvbS8iPlBhbmFjZWEgSW5mb3RlY2ggUHZ0LiBMdGQ8L2E+LjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg=='),
(14, 'advisor_regular_registration', '1', 'Guru Bul - advisor registration - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJWZpcnN0X25hbWUlJTxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsiPiw8L3NwYW4+PC9kaXY+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogMTAwJTsgZmxvYXQ6IGxlZnQ7IGZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBsaW5lLWhlaWdodDogMjBweDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogIzY0NjQ2NDsiPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+V2UgaGF2ZSByZWNpdmVkIHlvdXIgYXBwbGljYXRpb24gYW5kIGFyZSBpbiB0aGUgcHJvY2VzcyBvZiByZXZpZXdpbmcgaXQuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+V2Ugc2hhbGwgZ2V0IGJhY2sgd2l0aGluIDQ4IGhvdXJzLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTZweDsgY29sb3I6ICM0MjQyNDI7IGxpbmUtaGVpZ2h0OiAzMHB4OyI+U2luY2VybHk8YnIgLz48c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7IGxpbmUtaGVpZ2h0OiBub3JtYWw7Ij5HdXJ1IEJ1bCBUZWFtPC9zcGFuPjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjxkaXYgc3R5bGU9ImZsb2F0OiBsZWZ0OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7Ij4NCjxkaXYgc3R5bGU9IndpZHRoOiA5MjBweDsgZmxvYXQ6IGxlZnQ7IGhlaWdodDogMzJweDsgdGV4dC1hbGlnbjogY2VudGVyOyBsaW5lLWhlaWdodDogNTBweDsgY29sb3I6ICNmZmZmZmY7Ij4NCjxkaXYgc3R5bGU9ImNvbG9yOiAjZmZmZmZmOyBmb250LXNpemU6IDEycHg7IGZvbnQtd2VpZ2h0OiBib2xkOyBsaW5lLWhlaWdodDogMzJweDsgdGV4dC1hbGlnbjogY2VudGVyOyBmbG9hdDogbGVmdDsgbWFyZ2luOiAwIDVweDsiPiZjb3B5OyAyMDEyIDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+R3VydUJ1bC5jb208L2E+IExpbWl0ZWQgfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlNlY3VyaXR5ICZhbXA7IFByaXZhY3k8L2E+IHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5UZXJtcyAmYW1wOyBMZWdhbDwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlNpdGUgTWFwPC9hPjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IHJpZ2h0OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiAyNnB4OyBtYXJnaW46IDAgMTBweDsgZm9udC1zaXplOiAxM3B4OyI+Q3JlYXRlZCBieSBQYW5hY2VhIEluZm90ZWNoIFB2dC4gTHRkLjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg=='),
(18, 'new_user_registration', '1', 'Guru Bul - new user registration - admin notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSA8c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7Ij4sPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgbGluZS1oZWlnaHQ6IDIwcHg7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6ICM2NDY0NjQ7Ij4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwO0EgbmV3IHVzZXIgaGFzIHJlZ2lzdGVyZWQgb24gR3VydSBCdWwsIGhpcyBkZXRhaWxzIGFyZSBub3cgYXZhaWxhYmxlIGluIHRoZSAnTWFuYWdlIFVzZXJzJyBzZWN0aW9uLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPlRoZSBmb2xsb3dpbmcgdXNlciBoYXMgcmVnaXN0ZXJlZCAmbmJzcDs6LTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxzcGFuPjxzdHJvbmc+TmFtZTwvc3Ryb25nPjxzcGFuPjotJm5ic3A7PC9zcGFuPiUldXNlcm5hbWUlJTwvc3Bhbj48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij48c3Ryb25nPkVtYWlsPC9zdHJvbmc+Oi0gJSVlbWFpbCUlPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+PHNwYW4gc3R5bGU9ImNvbG9yOiAjNDI0MjQyOyBmb250LXNpemU6IDE2cHg7IGxpbmUtaGVpZ2h0OiAzMHB4OyI+U2luY2VybHk8L3NwYW4+PC9wPg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij48c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7IGxpbmUtaGVpZ2h0OiBub3JtYWw7Ij5HdXJ1IEJ1bCBUZWFtPC9zcGFuPjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjxkaXYgc3R5bGU9ImZsb2F0OiBsZWZ0OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7Ij4NCjxkaXYgc3R5bGU9IndpZHRoOiA5MjBweDsgZmxvYXQ6IGxlZnQ7IGhlaWdodDogMzJweDsgdGV4dC1hbGlnbjogY2VudGVyOyBsaW5lLWhlaWdodDogNTBweDsgY29sb3I6ICNmZmZmZmY7Ij4NCjxkaXYgc3R5bGU9ImNvbG9yOiAjZmZmZmZmOyBmb250LXNpemU6IDEycHg7IGZvbnQtd2VpZ2h0OiBib2xkOyBsaW5lLWhlaWdodDogMzJweDsgdGV4dC1hbGlnbjogY2VudGVyOyBmbG9hdDogbGVmdDsgbWFyZ2luOiAwIDVweDsiPiZjb3B5OyAyMDEyIDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+R3VydUJ1bC5jb208L2E+IExpbWl0ZWQgfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlNlY3VyaXR5ICZhbXA7IFByaXZhY3k8L2E+IHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5UZXJtcyAmYW1wOyBMZWdhbDwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlNpdGUgTWFwPC9hPjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IHJpZ2h0OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiAyNnB4OyBtYXJnaW46IDAgMTBweDsgZm9udC1zaXplOiAxM3B4OyI+Q3JlYXRlZCBieSBQYW5hY2VhIEluZm90ZWNoIFB2dC4gTHRkLjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg=='),
(6, 'advisor_linkedin_registration', '1', 'Guru Bul - advisor application requested - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSBBZHZpc29yPHNwYW4gc3R5bGU9ImNvbG9yOiAjMDAzZGE2OyI+LDwvc3Bhbj48L2Rpdj4NCjxkaXYgc3R5bGU9IndpZHRoOiAxMDAlOyBmbG9hdDogbGVmdDsgZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGxpbmUtaGVpZ2h0OiAyMHB4OyBmb250LXNpemU6IDEycHg7IGNvbG9yOiAjNjQ2NDY0OyI+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij5XZSBoYXZlIHJlY2l2ZWQgeW91ciBhcHBsaWNhdGlvbiBhbmQgYXJlIGluIHRoZSBwcm9jZXNzIG9mIHJldmlld2luZyBpdC4uLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPldlIHNoYWxsIGdldCBiYWNrIHdpdGhpbiA0OCBob3Vycy48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8L2Rpdj4NCjxkaXYgc3R5bGU9ImZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE2cHg7IGNvbG9yOiAjNDI0MjQyOyBsaW5lLWhlaWdodDogMzBweDsiPlNpbmNlcmx5PGJyIC8+PHNwYW4gc3R5bGU9ImNvbG9yOiAjMDAzZGE2OyBsaW5lLWhlaWdodDogbm9ybWFsOyI+R3VydSBCdWwgVGVhbTwvc3Bhbj48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsgYm9yZGVyLWJvdHRvbTogNXB4IHNvbGlkICM3QzdGODI7IGJvcmRlci10b3A6IDVweCBzb2xpZCAjN0M3RjgyOyBiYWNrZ3JvdW5kOiAjNEI0RTUxOyI+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogOTIwcHg7IGZsb2F0OiBsZWZ0OyBoZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDUwcHg7IGNvbG9yOiAjZmZmZmZmOyI+DQo8ZGl2IHN0eWxlPSJjb2xvcjogI2ZmZmZmZjsgZm9udC1zaXplOiAxMnB4OyBmb250LXdlaWdodDogYm9sZDsgbGluZS1oZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgZmxvYXQ6IGxlZnQ7IG1hcmdpbjogMCA1cHg7Ij4mY29weTsgMjAxMiA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPkd1cnVCdWwuY29tPC9hPiBMaW1pdGVkIHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TZWN1cml0eSAmYW1wOyBQcml2YWN5PC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+VGVybXMgJmFtcDsgTGVnYWw8L2E+IHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TaXRlIE1hcDwvYT48L2Rpdj4NCjxkaXYgc3R5bGU9ImZsb2F0OiByaWdodDsgdGV4dC1hbGlnbjogY2VudGVyOyBsaW5lLWhlaWdodDogMjZweDsgbWFyZ2luOiAwIDEwcHg7IGZvbnQtc2l6ZTogMTNweDsiPkNyZWF0ZWQgYnkgUGFuYWNlYSBJbmZvdGVjaCBQdnQuIEx0ZC48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4='),
(19, 'new_advisor_regular_registration', '1', 'Guru Bul - new advisor registration - admin notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSA8c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7Ij4sPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgbGluZS1oZWlnaHQ6IDIwcHg7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6ICM2NDY0NjQ7Ij4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwO0EgbmV3IGFkdmlzb3IgaGFzIHJlZ2lzdGVyZWQgb24gR3VydSBCdWwsIGhpcyBkZXRhaWxzIGFyZSBub3cgYXZhaWxhYmxlIGluIHRoZSAnTWFuYWdlIEFkdmlzb3JzJyBzZWN0aW9uLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPlRoZSBmb2xsb3dpbmcgYWR2aXNvciBoYXMgcmVnaXN0ZXJlZCAmbmJzcDs6LTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxzcGFuPjxzdHJvbmc+TmFtZTwvc3Ryb25nPjxzcGFuPjotJm5ic3A7JSVmaXJzdF9uYW1lJSU8L3NwYW4+PGJyIC8+PC9zcGFuPjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxzdHJvbmc+RW1haWw8L3N0cm9uZz46LSAlJWVtYWlsJSU8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij48c3BhbiBzdHlsZT0iY29sb3I6ICM0MjQyNDI7IGZvbnQtc2l6ZTogMTZweDsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5TaW5jZXJseTwvc3Bhbj48L3A+DQo8L2Rpdj4NCjxkaXYgc3R5bGU9ImZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE2cHg7IGNvbG9yOiAjNDI0MjQyOyBsaW5lLWhlaWdodDogMzBweDsiPjxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsgbGluZS1oZWlnaHQ6IG5vcm1hbDsiPkd1cnUgQnVsIFRlYW08L3NwYW4+PC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7IGJvcmRlci1ib3R0b206IDVweCBzb2xpZCAjN0M3RjgyOyBib3JkZXItdG9wOiA1cHggc29saWQgIzdDN0Y4MjsgYmFja2dyb3VuZDogIzRCNEU1MTsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBmbG9hdDogbGVmdDsgaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiA1MHB4OyBjb2xvcjogI2ZmZmZmZjsiPg0KPGRpdiBzdHlsZT0iY29sb3I6ICNmZmZmZmY7IGZvbnQtc2l6ZTogMTJweDsgZm9udC13ZWlnaHQ6IGJvbGQ7IGxpbmUtaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGZsb2F0OiBsZWZ0OyBtYXJnaW46IDAgNXB4OyI+JmNvcHk7IDIwMTIgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5HdXJ1QnVsLmNvbTwvYT4gTGltaXRlZCB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2VjdXJpdHkgJmFtcDsgUHJpdmFjeTwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlRlcm1zICZhbXA7IExlZ2FsPC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2l0ZSBNYXA8L2E+PC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogcmlnaHQ7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDI2cHg7IG1hcmdpbjogMCAxMHB4OyBmb250LXNpemU6IDEzcHg7Ij5DcmVhdGVkIGJ5IFBhbmFjZWEgSW5mb3RlY2ggUHZ0LiBMdGQuPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+'),
(8, 'verify_account_email_by_admin ', '1', 'Guru Bul - verify advisor account email - notification. ', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJWZpcnN0X25hbWUlJTxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsiPiw8L3NwYW4+PC9kaXY+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogMTAwJTsgZmxvYXQ6IGxlZnQ7IGZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBsaW5lLWhlaWdodDogMjBweDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogIzY0NjQ2NDsiPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+WW91ciByZXF1ZXN0IGhhcyBiZWVuIGFjY2VwdGVkIGJ5IHRoZSBhZG1pbmlzdHJhdG9yLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPlBsZWFzZSwgdXNlIGJlbGxvdyBsaW5rIGFuZCByZWdpc3RyYXRpb24gY29kZSB0byB2ZXJpZnkgYWNjb3VudC48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiB1bmRlcmxpbmU7IiBocmVmPSIlJWNvbmZpcm1fbGluayUlIiB0YXJnZXQ9Il9ibGFuayI+Q2xpY2sgSGVyZTwvYT4gdG8gdmVyaWZ5IGFjY291bnQuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+WW91ciByZWdpc3RyYXRpb24gY29kZSAtICUlY29uZmlybV9jb2RlJSU8L3A+DQo8L2Rpdj4NCjxkaXYgc3R5bGU9ImZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE2cHg7IGNvbG9yOiAjNDI0MjQyOyBsaW5lLWhlaWdodDogMzBweDsiPlNpbmNlcmx5PGJyIC8+PHNwYW4gc3R5bGU9ImNvbG9yOiAjMDAzZGE2OyBsaW5lLWhlaWdodDogbm9ybWFsOyI+R3VydSBCdWwgVGVhbTwvc3Bhbj48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsgYm9yZGVyLWJvdHRvbTogNXB4IHNvbGlkICM3QzdGODI7IGJvcmRlci10b3A6IDVweCBzb2xpZCAjN0M3RjgyOyBiYWNrZ3JvdW5kOiAjNEI0RTUxOyI+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogOTIwcHg7IGZsb2F0OiBsZWZ0OyBoZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDUwcHg7IGNvbG9yOiAjZmZmZmZmOyI+DQo8ZGl2IHN0eWxlPSJjb2xvcjogI2ZmZmZmZjsgZm9udC1zaXplOiAxMnB4OyBmb250LXdlaWdodDogYm9sZDsgbGluZS1oZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgZmxvYXQ6IGxlZnQ7IG1hcmdpbjogMCA1cHg7Ij4mY29weTsgMjAxMiA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPkd1cnVCdWwuY29tPC9hPiBMaW1pdGVkIHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TZWN1cml0eSAmYW1wOyBQcml2YWN5PC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+VGVybXMgJmFtcDsgTGVnYWw8L2E+IHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TaXRlIE1hcDwvYT48L2Rpdj4NCjxkaXYgc3R5bGU9ImZsb2F0OiByaWdodDsgdGV4dC1hbGlnbjogY2VudGVyOyBsaW5lLWhlaWdodDogMjZweDsgbWFyZ2luOiAwIDEwcHg7IGZvbnQtc2l6ZTogMTNweDsiPkNyZWF0ZWQgYnkgUGFuYWNlYSBJbmZvdGVjaCBQdnQuIEx0ZC48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4='),
(20, 'new_advisor_linkedin_registration', '1', 'Guru Bul - new advisor linkedin registration - admin notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSA8c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7Ij4sPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgbGluZS1oZWlnaHQ6IDIwcHg7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6ICM2NDY0NjQ7Ij4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwO0EgbmV3IGFkdmlzb3IgaGFzIHJlZ2lzdGVyZWQgb24gR3VydSBCdWwgdGhyb3VnaCBMaW5rZWRpbiwgaGlzIGRldGFpbHMgYXJlIG5vdyBhdmFpbGFibGUgaW4gdGhlICdNYW5hZ2UgVXNlcnMnIHNlY3Rpb24uPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+VGhlIGZvbGxvd2luZyBhZHZpc29yIGhhcyByZWdpc3RlcmVkICZuYnNwOzotPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+PHNwYW4+PHN0cm9uZz5MaW5rZWRpbiBwdWJsaWMgcHJvZmlsZSBsaW5rPC9zdHJvbmc+PHNwYW4+Oi0gJm5ic3A7Jm5ic3A7PC9zcGFuPiUlbGlua2VkJSU8L3NwYW4+PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+PHN0cm9uZz5FbWFpbDwvc3Ryb25nPjotICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICUlZW1haWwlJTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxzcGFuIHN0eWxlPSJjb2xvcjogIzQyNDI0MjsgZm9udC1zaXplOiAxNnB4OyBsaW5lLWhlaWdodDogMzBweDsiPlNpbmNlcmx5PC9zcGFuPjwvcD4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTZweDsgY29sb3I6ICM0MjQyNDI7IGxpbmUtaGVpZ2h0OiAzMHB4OyI+PHNwYW4gc3R5bGU9ImNvbG9yOiAjMDAzZGE2OyBsaW5lLWhlaWdodDogbm9ybWFsOyI+R3VydSBCdWwgVGVhbTwvc3Bhbj48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsgYm9yZGVyLWJvdHRvbTogNXB4IHNvbGlkICM3QzdGODI7IGJvcmRlci10b3A6IDVweCBzb2xpZCAjN0M3RjgyOyBiYWNrZ3JvdW5kOiAjNEI0RTUxOyI+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogOTIwcHg7IGZsb2F0OiBsZWZ0OyBoZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDUwcHg7IGNvbG9yOiAjZmZmZmZmOyI+DQo8ZGl2IHN0eWxlPSJjb2xvcjogI2ZmZmZmZjsgZm9udC1zaXplOiAxMnB4OyBmb250LXdlaWdodDogYm9sZDsgbGluZS1oZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgZmxvYXQ6IGxlZnQ7IG1hcmdpbjogMCA1cHg7Ij4mY29weTsgMjAxMiA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPkd1cnVCdWwuY29tPC9hPiBMaW1pdGVkIHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TZWN1cml0eSAmYW1wOyBQcml2YWN5PC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+VGVybXMgJmFtcDsgTGVnYWw8L2E+IHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TaXRlIE1hcDwvYT48L2Rpdj4NCjxkaXYgc3R5bGU9ImZsb2F0OiByaWdodDsgdGV4dC1hbGlnbjogY2VudGVyOyBsaW5lLWhlaWdodDogMjZweDsgbWFyZ2luOiAwIDEwcHg7IGZvbnQtc2l6ZTogMTNweDsiPkNyZWF0ZWQgYnkgUGFuYWNlYSBJbmZvdGVjaCBQdnQuIEx0ZC48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4='),
(9, 'advisor_verify_account', '1', 'Guru Bul - advisor verify  account - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJWZpcnN0X25hbWUlJTxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsiPiw8L3NwYW4+PC9kaXY+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogMTAwJTsgZmxvYXQ6IGxlZnQ7IGZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBsaW5lLWhlaWdodDogMjBweDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogIzY0NjQ2NDsiPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+WW91ciByZXF1ZXN0IGhhcyBiZWVuIGFjY2VwdGVkIGJ5IHRoZSBhZG1pbmlzdHJhdG9yLjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPllvdXIgbG9naW4gZGV0YWlscyBhcmU6LTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPkUtbWFpbDogJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsmbmJzcDslJWVtYWlsJSU8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij5QYXNzd29yZDogJm5ic3A7ICZuYnNwOyAmbmJzcDsmbmJzcDslJXBhc3N3b3JkJSU8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij5QbGVhc2UsIGNsaWNrIHRoZSBsaW5rJm5ic3A7YmVsb3cmbmJzcDt0byBhY3RpdmF0ZSB5b3VyIGFjY291bnQuJm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lOyIgaHJlZj0iJSVjb25maXJtX2xpbmslJSIgdGFyZ2V0PSJfYmxhbmsiPkNsaWNrIEhlcmU8L2E+IHRvIGFjdGl2ZSBhY2NvdW50LjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTZweDsgY29sb3I6ICM0MjQyNDI7IGxpbmUtaGVpZ2h0OiAzMHB4OyI+U2luY2VybHk8YnIgLz48c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7IGxpbmUtaGVpZ2h0OiBub3JtYWw7Ij5HdXJ1IEJ1bCBUZWFtPC9zcGFuPjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjxkaXYgc3R5bGU9ImZsb2F0OiBsZWZ0OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7Ij4NCjxkaXYgc3R5bGU9IndpZHRoOiA5MjBweDsgZmxvYXQ6IGxlZnQ7IGhlaWdodDogMzJweDsgdGV4dC1hbGlnbjogY2VudGVyOyBsaW5lLWhlaWdodDogNTBweDsgY29sb3I6ICNmZmZmZmY7Ij4NCjxkaXYgc3R5bGU9ImNvbG9yOiAjZmZmZmZmOyBmb250LXNpemU6IDEycHg7IGZvbnQtd2VpZ2h0OiBib2xkOyBsaW5lLWhlaWdodDogMzJweDsgdGV4dC1hbGlnbjogY2VudGVyOyBmbG9hdDogbGVmdDsgbWFyZ2luOiAwIDVweDsiPiZjb3B5OyAyMDEyIDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+R3VydUJ1bC5jb208L2E+IExpbWl0ZWQgfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlNlY3VyaXR5ICZhbXA7IFByaXZhY3k8L2E+IHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5UZXJtcyAmYW1wOyBMZWdhbDwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlNpdGUgTWFwPC9hPjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IHJpZ2h0OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiAyNnB4OyBtYXJnaW46IDAgMTBweDsgZm9udC1zaXplOiAxM3B4OyI+Q3JlYXRlZCBieSBQYW5hY2VhIEluZm90ZWNoIFB2dC4gTHRkLjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg=='),
(17, 'user_registration', '1', 'Guru Bul - user registration - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJXVzZXJuYW1lJSU8c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7Ij4sPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgbGluZS1oZWlnaHQ6IDIwcHg7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6ICM2NDY0NjQ7Ij4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwO1dlbGNvbWUgdG8gR3VydSBCdWwhPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+WW91ciBsb2dpbiBkZXRhaWxzIGFyZSBiZWxvdyA6LTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxzdHJvbmc+RW1haWw8L3N0cm9uZz46LSAlJWVtYWlsJSU8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij48c3Ryb25nPlBhc3N3b3JkPC9zdHJvbmc+Oi0gJSVwYXNzd29yZCUlPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+PGEgaHJlZj0iJSVjb25maXJtX2xpbmslJSI+Q2xpY2sgaGVyZTwvYT4gdG8gYWN0aXZhdGUgeW91ciBhY2NvdW50LiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTZweDsgY29sb3I6ICM0MjQyNDI7IGxpbmUtaGVpZ2h0OiAzMHB4OyI+U2luY2VybHk8YnIgLz48c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7IGxpbmUtaGVpZ2h0OiBub3JtYWw7Ij5HdXJ1IEJ1bCBUZWFtPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBoZWlnaHQ6IDI1cHg7IG1hcmdpbjogMTBweCAwcHggMTBweCAwcHg7Ij4NCjxkaXYgc3R5bGU9ImZsb2F0OiByaWdodDsiPg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9ImZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE2cHg7IGNvbG9yOiAjMDAzZGE2OyBsaW5lLWhlaWdodDogMjRweDsgcGFkZGluZy1yaWdodDogNXB4OyI+PHNwYW4gc3R5bGU9ImZsb2F0OiBsZWZ0OyI+Rm9sbG93IHVzIG9uPC9zcGFuPiA8YSBzdHlsZT0icGFkZGluZzogMHB4IDVweDsgZmxvYXQ6IGxlZnQ7IiBocmVmPSJqYXZhc2NyaXB0OnZvaWQoMCk7Ij48aW1nIHNyYz0iaW1hZ2VzL3R3aXQucG5nIiBhbHQ9InR3aXQiIGJvcmRlcj0iMCIgLz48L2E+IDxhIHN0eWxlPSJwYWRkaW5nOiAwcHggNXB4OyBmbG9hdDogbGVmdDsiIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKTsiPjxpbWcgc3JjPSJpbWFnZXMvZmFjZS5wbmciIGFsdD0iZmFjZSIgYm9yZGVyPSIwIiAvPjwvYT4gPGEgc3R5bGU9InBhZGRpbmc6IDBweCA1cHg7IGZsb2F0OiBsZWZ0OyIgaHJlZj0iamF2YXNjcmlwdDp2b2lkKDApOyI+PGltZyBzcmM9ImltYWdlcy9mbGlja2VyLnBuZyIgYWx0PSJmbGlja2VyIiBib3JkZXI9IjAiIC8+PC9hPiA8YSBzdHlsZT0icGFkZGluZzogMHB4IDVweDsgZmxvYXQ6IGxlZnQ7IiBocmVmPSJqYXZhc2NyaXB0OnZvaWQoMCk7Ij48aW1nIHNyYz0iaW1hZ2VzL3l1b3QucG5nIiBhbHQ9InlvdXR1YmUiIGJvcmRlcj0iMCIgLz48L2E+PC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7IGJvcmRlci1ib3R0b206IDVweCBzb2xpZCAjN0M3RjgyOyBib3JkZXItdG9wOiA1cHggc29saWQgIzdDN0Y4MjsgYmFja2dyb3VuZDogIzRCNEU1MTsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBmbG9hdDogbGVmdDsgaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiA1MHB4OyBjb2xvcjogI2ZmZmZmZjsiPg0KPGRpdiBzdHlsZT0iY29sb3I6ICNmZmZmZmY7IGZvbnQtc2l6ZTogMTJweDsgZm9udC13ZWlnaHQ6IGJvbGQ7IGxpbmUtaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGZsb2F0OiBsZWZ0OyBtYXJnaW46IDAgNXB4OyI+JmNvcHk7IDIwMTIgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5HdXJ1QnVsLmNvbTwvYT4gTGltaXRlZCB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2VjdXJpdHkgJmFtcDsgUHJpdmFjeTwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlRlcm1zICZhbXA7IExlZ2FsPC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2l0ZSBNYXA8L2E+PC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogcmlnaHQ7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDI2cHg7IG1hcmdpbjogMCAxMHB4OyBmb250LXNpemU6IDEzcHg7Ij5DcmVhdGVkIGJ5IFBhbmFjZWEgSW5mb3RlY2ggUHZ0LiBMdGQuPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+'),
(13, 'by_administrator_user_password', '1', 'Guru Bul - by administrator user password change  - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJWZpcnN0X25hbWUlJSAlJWxhc3RfbmFtZSUlPHNwYW4gc3R5bGU9ImNvbG9yOiAjMDAzZGE2OyI+LDwvc3Bhbj48L2Rpdj4NCjxkaXYgc3R5bGU9IndpZHRoOiAxMDAlOyBmbG9hdDogbGVmdDsgZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGxpbmUtaGVpZ2h0OiAyMHB4OyBmb250LXNpemU6IDEycHg7IGNvbG9yOiAjNjQ2NDY0OyI+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij5Zb3VyIGxvZ2luIGRldGFpbHMgYXJlIGJlbG93PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+RW1haWw6LSAlJWVtYWlsJSU8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij5QYXNzd29yZDotICUlcGFzc3dvcmQlJTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPiZuYnNwOzwvcD4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTZweDsgY29sb3I6ICM0MjQyNDI7IGxpbmUtaGVpZ2h0OiAzMHB4OyI+U2luY2VybHk8YnIgLz48c3BhbiBzdHlsZT0iY29sb3I6ICMwMDNkYTY7IGxpbmUtaGVpZ2h0OiBub3JtYWw7Ij5HdXJ1IEJ1bCBUZWFtPC9zcGFuPjwvZGl2Pg0KPGRpdiBzdHlsZT0id2lkdGg6IDEwMCU7IGZsb2F0OiBsZWZ0OyBoZWlnaHQ6IDI1cHg7IG1hcmdpbjogMTBweCAwcHggMTBweCAwcHg7Ij4NCjxkaXYgc3R5bGU9ImZsb2F0OiByaWdodDsiPg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9ImZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE2cHg7IGNvbG9yOiAjMDAzZGE2OyBsaW5lLWhlaWdodDogMjRweDsgcGFkZGluZy1yaWdodDogNXB4OyI+PHNwYW4gc3R5bGU9ImZsb2F0OiBsZWZ0OyI+Rm9sbG93IHVzIG9uPC9zcGFuPiA8YSBzdHlsZT0icGFkZGluZzogMHB4IDVweDsgZmxvYXQ6IGxlZnQ7IiBocmVmPSJqYXZhc2NyaXB0OnZvaWQoMCk7Ij48aW1nIHNyYz0iaW1hZ2VzL3R3aXQucG5nIiBhbHQ9InR3aXQiIGJvcmRlcj0iMCIgLz48L2E+IDxhIHN0eWxlPSJwYWRkaW5nOiAwcHggNXB4OyBmbG9hdDogbGVmdDsiIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKTsiPjxpbWcgc3JjPSJpbWFnZXMvZmFjZS5wbmciIGFsdD0iZmFjZSIgYm9yZGVyPSIwIiAvPjwvYT4gPGEgc3R5bGU9InBhZGRpbmc6IDBweCA1cHg7IGZsb2F0OiBsZWZ0OyIgaHJlZj0iamF2YXNjcmlwdDp2b2lkKDApOyI+PGltZyBzcmM9ImltYWdlcy9mbGlja2VyLnBuZyIgYWx0PSJmbGlja2VyIiBib3JkZXI9IjAiIC8+PC9hPiA8YSBzdHlsZT0icGFkZGluZzogMHB4IDVweDsgZmxvYXQ6IGxlZnQ7IiBocmVmPSJqYXZhc2NyaXB0OnZvaWQoMCk7Ij48aW1nIHNyYz0iaW1hZ2VzL3l1b3QucG5nIiBhbHQ9InlvdXR1YmUiIGJvcmRlcj0iMCIgLz48L2E+PC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7IGJvcmRlci1ib3R0b206IDVweCBzb2xpZCAjN0M3RjgyOyBib3JkZXItdG9wOiA1cHggc29saWQgIzdDN0Y4MjsgYmFja2dyb3VuZDogIzRCNEU1MTsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBmbG9hdDogbGVmdDsgaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGxpbmUtaGVpZ2h0OiA1MHB4OyBjb2xvcjogI2ZmZmZmZjsiPg0KPGRpdiBzdHlsZT0iY29sb3I6ICNmZmZmZmY7IGZvbnQtc2l6ZTogMTJweDsgZm9udC13ZWlnaHQ6IGJvbGQ7IGxpbmUtaGVpZ2h0OiAzMnB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IGZsb2F0OiBsZWZ0OyBtYXJnaW46IDAgNXB4OyI+JmNvcHk7IDIwMTIgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5HdXJ1QnVsLmNvbTwvYT4gTGltaXRlZCB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2VjdXJpdHkgJmFtcDsgUHJpdmFjeTwvYT4gfCA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPlRlcm1zICZhbXA7IExlZ2FsPC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+U2l0ZSBNYXA8L2E+PC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogcmlnaHQ7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDI2cHg7IG1hcmdpbjogMCAxMHB4OyBmb250LXNpemU6IDEzcHg7Ij5DcmVhdGVkIGJ5IFBhbmFjZWEgSW5mb3RlY2ggUHZ0LiBMdGQuPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+');
INSERT INTO `p630_mail_bodies` (`mail_id`, `mail_page_id`, `mail_lang`, `mail_subject`, `mail_description`) VALUES
(16, 'advisor_change_pass', '1', 'Guru Bul - Successful password change - notification.', 'PGRpdiBzdHlsZT0id2lkdGg6IDkyMHB4OyBtYXJnaW46IDBweCBhdXRvOyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0id2lkdGg6IDg5MHB4OyBoZWlnaHQ6IDYwcHg7IHBhZGRpbmc6IDMwcHggMHB4IDBweCAzMHB4OyBib3JkZXItYm90dG9tOiA1cHggc29saWQgIzdDN0Y4MjsgYm9yZGVyLXRvcDogNXB4IHNvbGlkICM3QzdGODI7IGJhY2tncm91bmQ6ICM0QjRFNTE7IGZsb2F0OiBsZWZ0OyI+PGltZyB0aXRsZT0iR3VydSBCdWwiIHNyYz0iaHR0cDovLzY0LjI1MS4yMi4xNDgvcDYzMC9mcm9udF9tZWRpYS9pbWFnZXMvbG9nby5wbmciIGFsdD0iTG9nbyIgd2lkdGg9IjE2NSIgaGVpZ2h0PSIzNSIgLz48L2Rpdj4NCjwvZGl2Pg0KPGRpdiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij4NCjxkaXYgc3R5bGU9Im1hcmdpbjogMTBweDsgZmxvYXQ6IGxlZnQ7IHBhZGRpbmc6IDEwcHg7IHdpZHRoOiA4ODBweDsgYm9yZGVyLXJhZGl1czogNXB4OyBib3JkZXI6IDFweCBzb2xpZCAjY2NjOyBoZWlnaHQ6IGF1dG87IG1pbi1oZWlnaHQ6IDIwMHB4OyI+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5IaSAlJWZpcnN0X25hbWUlJTxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsiPiw8L3NwYW4+PC9kaXY+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogMTAwJTsgZmxvYXQ6IGxlZnQ7IGZvbnQtZmFtaWx5OiBBcmlhbCwgSGVsdmV0aWNhLCBzYW5zLXNlcmlmOyBsaW5lLWhlaWdodDogMjBweDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogIzY0NjQ2NDsiPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+WW91IGhhdmUgc3VjY2VzZnVsbHkgY2hhbmdlZCB5b3VyIHBhc3N3b3JkPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+WW91ciBsb2dpbiBkZXRhaWxzIGFyZSBiZWxvdyA6LTwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDBweDsiPjxzdHJvbmc+RW1haWw8L3N0cm9uZz46LSAlJWVtYWlsJSU8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwcHg7Ij48c3Ryb25nPlBhc3N3b3JkPC9zdHJvbmc+Oi0gJSVwYXNzd29yZCUlPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4OyI+Jm5ic3A7PC9wPg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNnB4OyBjb2xvcjogIzQyNDI0MjsgbGluZS1oZWlnaHQ6IDMwcHg7Ij5TaW5jZXJseTxiciAvPjxzcGFuIHN0eWxlPSJjb2xvcjogIzAwM2RhNjsgbGluZS1oZWlnaHQ6IG5vcm1hbDsiPkd1cnUgQnVsIFRlYW08L3NwYW4+PC9kaXY+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogMTAwJTsgZmxvYXQ6IGxlZnQ7IGhlaWdodDogMjVweDsgbWFyZ2luOiAxMHB4IDBweCAxMHB4IDBweDsiPg0KPGRpdiBzdHlsZT0iZmxvYXQ6IHJpZ2h0OyI+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsiPg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTZweDsgY29sb3I6ICMwMDNkYTY7IGxpbmUtaGVpZ2h0OiAyNHB4OyBwYWRkaW5nLXJpZ2h0OiA1cHg7Ij48c3BhbiBzdHlsZT0iZmxvYXQ6IGxlZnQ7Ij5Gb2xsb3cgdXMgb248L3NwYW4+IDxhIHN0eWxlPSJwYWRkaW5nOiAwcHggNXB4OyBmbG9hdDogbGVmdDsiIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKTsiPjxpbWcgc3JjPSJpbWFnZXMvdHdpdC5wbmciIGFsdD0idHdpdCIgYm9yZGVyPSIwIiAvPjwvYT4gPGEgc3R5bGU9InBhZGRpbmc6IDBweCA1cHg7IGZsb2F0OiBsZWZ0OyIgaHJlZj0iamF2YXNjcmlwdDp2b2lkKDApOyI+PGltZyBzcmM9ImltYWdlcy9mYWNlLnBuZyIgYWx0PSJmYWNlIiBib3JkZXI9IjAiIC8+PC9hPiA8YSBzdHlsZT0icGFkZGluZzogMHB4IDVweDsgZmxvYXQ6IGxlZnQ7IiBocmVmPSJqYXZhc2NyaXB0OnZvaWQoMCk7Ij48aW1nIHNyYz0iaW1hZ2VzL2ZsaWNrZXIucG5nIiBhbHQ9ImZsaWNrZXIiIGJvcmRlcj0iMCIgLz48L2E+IDxhIHN0eWxlPSJwYWRkaW5nOiAwcHggNXB4OyBmbG9hdDogbGVmdDsiIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKTsiPjxpbWcgc3JjPSJpbWFnZXMveXVvdC5wbmciIGFsdD0ieW91dHViZSIgYm9yZGVyPSIwIiAvPjwvYT48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8ZGl2IHN0eWxlPSJmbG9hdDogbGVmdDsgYm9yZGVyLWJvdHRvbTogNXB4IHNvbGlkICM3QzdGODI7IGJvcmRlci10b3A6IDVweCBzb2xpZCAjN0M3RjgyOyBiYWNrZ3JvdW5kOiAjNEI0RTUxOyI+DQo8ZGl2IHN0eWxlPSJ3aWR0aDogOTIwcHg7IGZsb2F0OiBsZWZ0OyBoZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgbGluZS1oZWlnaHQ6IDUwcHg7IGNvbG9yOiAjZmZmZmZmOyI+DQo8ZGl2IHN0eWxlPSJjb2xvcjogI2ZmZmZmZjsgZm9udC1zaXplOiAxMnB4OyBmb250LXdlaWdodDogYm9sZDsgbGluZS1oZWlnaHQ6IDMycHg7IHRleHQtYWxpZ246IGNlbnRlcjsgZmxvYXQ6IGxlZnQ7IG1hcmdpbjogMCA1cHg7Ij4mY29weTsgMjAxMiA8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjogI2ZmZmZmZjsiIG9ubW91c2VvdmVyPSJ0aGlzLnN0eWxlLmNvbG9yPScjY2NjJyIgb25tb3VzZW91dD0idGhpcy5zdHlsZS5jb2xvcj0nI2ZmZmZmZiciIGhyZWY9IiMiPkd1cnVCdWwuY29tPC9hPiBMaW1pdGVkIHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TZWN1cml0eSAmYW1wOyBQcml2YWN5PC9hPiB8IDxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IGNvbG9yOiAjZmZmZmZmOyIgb25tb3VzZW92ZXI9InRoaXMuc3R5bGUuY29sb3I9JyNjY2MnIiBvbm1vdXNlb3V0PSJ0aGlzLnN0eWxlLmNvbG9yPScjZmZmZmZmJyIgaHJlZj0iIyI+VGVybXMgJmFtcDsgTGVnYWw8L2E+IHwgPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgY29sb3I6ICNmZmZmZmY7IiBvbm1vdXNlb3Zlcj0idGhpcy5zdHlsZS5jb2xvcj0nI2NjYyciIG9ubW91c2VvdXQ9InRoaXMuc3R5bGUuY29sb3I9JyNmZmZmZmYnIiBocmVmPSIjIj5TaXRlIE1hcDwvYT48L2Rpdj4NCjxkaXYgc3R5bGU9ImZsb2F0OiByaWdodDsgdGV4dC1hbGlnbjogY2VudGVyOyBsaW5lLWhlaWdodDogMjZweDsgbWFyZ2luOiAwIDEwcHg7IGZvbnQtc2l6ZTogMTNweDsiPkNyZWF0ZWQgYnkgUGFuYWNlYSBJbmZvdGVjaCBQdnQuIEx0ZC48L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4=');

-- --------------------------------------------------------

--
-- Table structure for table `p630_message`
--

CREATE TABLE IF NOT EXISTS `p630_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `deadline` int(11) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `status` enum('pending','accepted','completed','rejected') NOT NULL,
  `paid` enum('n','y') NOT NULL,
  `date_accepted` datetime NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `p630_message`
--

INSERT INTO `p630_message` (`message_id`, `user_id`, `advisor_id`, `date_created`, `deadline`, `subject`, `description`, `status`, `paid`, `date_accepted`, `date_paid`) VALUES
(1, 27, 23, '2013-01-15 13:56:30', 5, 'Sub message 1 ', 'Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 ', 'accepted', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 27, 23, '2013-01-16 13:56:30', 5, 'Sub message 2', 'Desc message 22 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 ', 'pending', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 27, 23, '2013-01-16 13:56:30', 5, 'Sub message 2 ACC', 'Desc ACC message 22 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 ', 'accepted', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 27, 23, '2013-01-16 13:56:30', 5, 'Sub message 2 ACC', 'Desc ACC message 22 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 ', 'accepted', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 27, 23, '2013-01-16 13:56:30', 5, 'Sub message 2 COMP', 'Desc COMP message 22 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 ', 'completed', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 27, 23, '2013-01-16 13:56:30', 5, 'Sub message 2 COMP', 'Desc COMP message 22 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 Desc message 1 ', 'completed', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 27, 23, '2013-01-16 11:40:17', 3, 'sahil 123', 'blah blah blah bah<br />\r\ndada<br />\r\nasda<br />\r\nasd<br />\r\n<br />\r\nasdasdadasd<br />\r\n<br />\r\n<br />\r\nasdadada', 'accepted', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 27, 23, '2013-01-22 13:55:55', 3, '123 123', 'asdasd ads da ads as', 'rejected', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 27, 23, '2013-01-22 13:56:44', 3, '123 123', 'asdasd ads da ads as', 'pending', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 27, 23, '2013-01-22 13:57:07', 3, '123 123', 'asdasd ads da ads as', 'pending', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 27, 23, '2013-01-22 13:57:23', 3, '123 123', 'asdasd ads da ads as', 'rejected', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 27, 23, '2013-01-22 13:57:41', 3, '123 123', 'asdasd ads da ads as', 'rejected', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p630_message_file`
--

CREATE TABLE IF NOT EXISTS `p630_message_file` (
  `message_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `location` varchar(64) NOT NULL,
  `message_id` int(11) NOT NULL,
  `format` varchar(10) NOT NULL,
  PRIMARY KEY (`message_file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `p630_message_file`
--

INSERT INTO `p630_message_file` (`message_file_id`, `name`, `location`, `message_id`, `format`) VALUES
(4, 'Lighthouse', '50fe9ad5cf607.jpg', 12, 'jpg'),
(5, 'Penguins', '50fe9ad5dfa68.jpg', 12, 'jpg'),
(6, 'Tulips', '50fe9ad5f2a14.jpg', 12, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `p630_product`
--

CREATE TABLE IF NOT EXISTS `p630_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `type` enum('paid','free') NOT NULL,
  `combination` enum('video','videoppt','audioppt') NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `p630_product`
--

INSERT INTO `p630_product` (`product_id`, `name`, `type`, `combination`, `description`, `category_id`, `advisor_id`, `status`, `price`) VALUES
(66, 'fdsfsdf', 'paid', 'video', '', 0, 23, 'active', 200),
(67, 'dasd', 'free', 'video', 'sdasda asd d', 0, 23, 'inactive', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p630_product_category`
--

CREATE TABLE IF NOT EXISTS `p630_product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `p630_product_category`
--

INSERT INTO `p630_product_category` (`product_category_id`, `product_id`, `cat_id`) VALUES
(11, 67, 18),
(12, 67, 22),
(13, 66, 18),
(14, 66, 39),
(15, 66, 19),
(16, 66, 20);

-- --------------------------------------------------------

--
-- Table structure for table `p630_product_file`
--

CREATE TABLE IF NOT EXISTS `p630_product_file` (
  `product_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  PRIMARY KEY (`product_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `p630_product_file`
--


-- --------------------------------------------------------

--
-- Table structure for table `p630_timezones`
--

CREATE TABLE IF NOT EXISTS `p630_timezones` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `timezone_location` varchar(30) NOT NULL DEFAULT '',
  `gmt` varchar(11) NOT NULL DEFAULT '',
  `offset` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `p630_timezones`
--

INSERT INTO `p630_timezones` (`id`, `timezone_location`, `gmt`, `offset`) VALUES
(1, 'International Date Line West', '(GMT-12:00)', -12),
(2, 'Midway Island', '(GMT-11:00)', -11),
(3, 'Samoa', '(GMT-11:00)', -11),
(4, 'Hawaii', '(GMT-10:00)', -10),
(5, 'Alaska', '(GMT-09:00)', -9),
(6, 'Pacific Time (US & Canada)', '(GMT-08:00)', -8),
(7, 'Tijuana', '(GMT-08:00)', -8),
(8, 'Arizona', '(GMT-07:00)', -7),
(9, 'Mountain Time (US & Canada)', '(GMT-07:00)', -7),
(10, 'Chihuahua', '(GMT-07:00)', -7),
(11, 'La Paz', '(GMT-07:00)', -7),
(12, 'Mazatlan', '(GMT-07:00)', -7),
(13, 'Central Time (US & Canada)', '(GMT-06:00)', -6),
(14, 'Central America', '(GMT-06:00)', -6),
(15, 'Guadalajara', '(GMT-06:00)', -6),
(16, 'Mexico City', '(GMT-06:00)', -6),
(17, 'Monterrey', '(GMT-06:00)', -6),
(18, 'Saskatchewan', '(GMT-06:00)', -6),
(19, 'Eastern Time (US & Canada)', '(GMT-05:00)', -5),
(20, 'Indiana (East)', '(GMT-05:00)', -5),
(21, 'Bogota', '(GMT-05:00)', -5),
(22, 'Lima', '(GMT-05:00)', -5),
(23, 'Quito', '(GMT-05:00)', -5),
(24, 'Atlantic Time (Canada)', '(GMT-04:00)', -4),
(25, 'Caracas', '(GMT-04:00)', -4),
(26, 'La Paz', '(GMT-04:00)', -4),
(27, 'Santiago', '(GMT-04:00)', -4),
(28, 'Newfoundland', '(GMT-03:30)', -3.5),
(29, 'Brasilia', '(GMT-03:00)', -3),
(30, 'Buenos Aires', '(GMT-03:00)', -3),
(31, 'Georgetown', '(GMT-03:00)', -3),
(32, 'Greenland', '(GMT-03:00)', -3),
(33, 'Mid-Atlantic', '(GMT-02:00)', -2),
(34, 'Azores', '(GMT-01:00)', -1),
(35, 'Cape Verde Is.', '(GMT-01:00)', -1),
(36, 'Casablanca', '(GMT)', 0),
(37, 'Dublin', '(GMT)', 0),
(38, 'Edinburgh', '(GMT)', 0),
(39, 'Lisbon', '(GMT)', 0),
(40, 'London', '(GMT)', 0),
(41, 'Monrovia', '(GMT)', 0),
(42, 'Amsterdam', '(GMT+01:00)', 1),
(43, 'Belgrade', '(GMT+01:00)', 1),
(44, 'Berlin', '(GMT+01:00)', 1),
(45, 'Bern', '(GMT+01:00)', 1),
(46, 'Bratislava', '(GMT+01:00)', 1),
(47, 'Brussels', '(GMT+01:00)', 1),
(48, 'Budapest', '(GMT+01:00)', 1),
(49, 'Copenhagen', '(GMT+01:00)', 1),
(50, 'Ljubljana', '(GMT+01:00)', 1),
(51, 'Madrid', '(GMT+01:00)', 1),
(52, 'Paris', '(GMT+01:00)', 1),
(53, 'Prague', '(GMT+01:00)', 1),
(54, 'Rome', '(GMT+01:00)', 1),
(55, 'Sarajevo', '(GMT+01:00)', 1),
(56, 'Skopje', '(GMT+01:00)', 1),
(57, 'Stockholm', '(GMT+01:00)', 1),
(58, 'Vienna', '(GMT+01:00)', 1),
(59, 'Warsaw', '(GMT+01:00)', 1),
(60, 'West Central Africa', '(GMT+01:00)', 1),
(61, 'Zagreb', '(GMT+01:00)', 1),
(62, 'Athens', '(GMT+02:00)', 2),
(63, 'Bucharest', '(GMT+02:00)', 2),
(64, 'Cairo', '(GMT+02:00)', 2),
(65, 'Harare', '(GMT+02:00)', 2),
(66, 'Helsinki', '(GMT+02:00)', 2),
(67, 'Istanbul', '(GMT+02:00)', 2),
(68, 'Jerusalem', '(GMT+02:00)', 2),
(69, 'Kyev', '(GMT+02:00)', 2),
(70, 'Minsk', '(GMT+02:00)', 2),
(71, 'Pretoria', '(GMT+02:00)', 2),
(72, 'Riga', '(GMT+02:00)', 2),
(73, 'Sofia', '(GMT+02:00)', 2),
(74, 'Tallinn', '(GMT+02:00)', 2),
(75, 'Vilnius', '(GMT+02:00)', 2),
(76, 'Baghdad', '(GMT+03:00)', 3),
(77, 'Kuwait', '(GMT+03:00)', 3),
(78, 'Moscow', '(GMT+03:00)', 3),
(79, 'Nairobi', '(GMT+03:00)', 3),
(80, 'Riyadh', '(GMT+03:00)', 3),
(81, 'St. Petersburg', '(GMT+03:00)', 3),
(82, 'Volgograd', '(GMT+03:00)', 3),
(83, 'Tehran', '(GMT+03:30)', 3.5),
(84, 'Abu Dhabi', '(GMT+04:00)', 4),
(85, 'Baku', '(GMT+04:00)', 4),
(86, 'Muscat', '(GMT+04:00)', 4),
(87, 'Tbilisi', '(GMT+04:00)', 4),
(88, 'Yerevan', '(GMT+04:00)', 4),
(89, 'Kabul', '(GMT+04:30)', 4.5),
(90, 'Ekaterinburg', '(GMT+05:00)', 5),
(91, 'Islamabad', '(GMT+05:00)', 5),
(92, 'Karachi', '(GMT+05:00)', 5),
(93, 'Tashkent', '(GMT+05:00)', 5),
(94, 'Chennai', '(GMT+05:30)', 5.5),
(95, 'Kolkata', '(GMT+05:30)', 5.5),
(96, 'Mumbai', '(GMT+05:30)', 5.5),
(97, 'New Delhi', '(GMT+05:30)', 5.5),
(98, 'Kathmandu', '(GMT+06:00)', 6),
(99, 'Almaty', '(GMT+06:00)', 6),
(100, 'Astana', '(GMT+06:00)', 6),
(101, 'Dhaka', '(GMT+06:00)', 6),
(102, 'Novosibirsk', '(GMT+06:00)', 6),
(103, 'Sri Jayawardenepura', '(GMT+06:00)', 6),
(104, 'Rangoon', '(GMT+06:30)', 6.5),
(105, 'Bangkok', '(GMT+07:00)', 7),
(106, 'Hanoi', '(GMT+07:00)', 7),
(107, 'Jakarta', '(GMT+07:00)', 7),
(108, 'Krasnoyarsk', '(GMT+07:00)', 7),
(109, 'Beijing', '(GMT+08:00)', 8),
(110, 'Chongqing', '(GMT+08:00)', 8),
(111, 'Hong Kong', '(GMT+08:00)', 8),
(112, 'Irkutsk', '(GMT+08:00)', 8),
(113, 'Kuala Lumpur', '(GMT+08:00)', 8),
(114, 'Perth', '(GMT+08:00)', 8),
(115, 'Singapore', '(GMT+08:00)', 8),
(116, 'Taipei', '(GMT+08:00)', 8),
(117, 'Ulaan Bataar', '(GMT+08:00)', 8),
(118, 'Urumqi', '(GMT+08:00)', 8),
(119, 'Osaka', '(GMT+09:00)', 9),
(120, 'Sapporo', '(GMT+09:00)', 9),
(121, 'Seoul', '(GMT+09:00)', 9),
(122, 'Tokyo', '(GMT+09:00)', 9),
(123, 'Yakutsk', '(GMT+09:00)', 9),
(124, 'Adelaide', '(GMT+09:30)', 9.5),
(125, 'Darwin', '(GMT+09:30)', 9.5),
(126, 'Brisbane', '(GMT+10:00)', 10),
(127, 'Canberra', '(GMT+10:00)', 10),
(128, 'Guam', '(GMT+10:00)', 10),
(129, 'Hobart', '(GMT+10:00)', 10),
(130, 'Melbourne', '(GMT+10:00)', 10),
(131, 'Port Moresby', '(GMT+10:00)', 10),
(132, 'Sydney', '(GMT+10:00)', 10),
(133, 'Vladivostok', '(GMT+10:00)', 10),
(134, 'Magadan', '(GMT+11:00)', 11),
(135, 'New Caledonia', '(GMT+11:00)', 11),
(136, 'Solomon Is.', '(GMT+11:00)', 11),
(137, 'Auckland', '(GMT+12:00)', 12),
(138, 'Fiji', '(GMT+12:00)', 12),
(139, 'Kamchatka', '(GMT+12:00)', 12),
(140, 'Marshall Is.', '(GMT+12:00)', 12),
(141, 'Wellington', '(GMT+12:00)', 12),
(142, 'Nuku''alofa', '(GMT+13:00)', 13);

-- --------------------------------------------------------

--
-- Table structure for table `p630_user_details`
--

CREATE TABLE IF NOT EXISTS `p630_user_details` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_flag` enum('0','1') NOT NULL COMMENT 'this flag indicate that if any user on runtime change his/her email address then this flag set from 0 to 1.',
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `country` smallint(3) NOT NULL,
  `user_status` enum('Active','Inactive','Blocked') NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `verified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `bank_code` varchar(225) NOT NULL,
  `branch_code` varchar(225) NOT NULL,
  `IBAN_code` varchar(225) NOT NULL,
  `image_path` varchar(30) NOT NULL,
  `registration_ip` varchar(255) NOT NULL,
  `is_online` enum('no','yes') NOT NULL,
  `online_login_time` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `p630_user_details`
--

INSERT INTO `p630_user_details` (`user_id`, `username`, `email`, `email_flag`, `password`, `first_name`, `last_name`, `dob`, `gender`, `location`, `country`, `user_status`, `verification_code`, `created_date`, `verified`, `address`, `city`, `zipcode`, `contact_no`, `bank_code`, `branch_code`, `IBAN_code`, `image_path`, `registration_ip`, `is_online`, `online_login_time`, `last_login`) VALUES
(30, 'vaibhav', 'vaibhav@panaceatek.com', '0', 'dmFpYmhhdjEyMw==', 'vaibhav', '', '0000-00-00', '', '', 0, 'Active', 'MzA=:50e6814e6718e1.85369695', '2013-01-04 07:14:22', 'Yes', '', '', '', '', '123456', '123456', '123456', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Sahil Shroff', 'sahilsshroff@gmail.com', '0', 'MTIzNDU2', '', '', '0000-00-00', '', '', 0, 'Active', 'MjY=:50dd354fc0e354.16350180', '2012-12-28 05:59:43', 'Yes', '', '', '', '', '', '', '', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Peter', 'petter@griffin.com', '0', 'MTIzNDU2', '', '', '0000-00-00', '', '', 0, 'Active', '', '2012-12-11 07:42:52', 'Yes', '', '', '', '', '', '', '', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'sahil', 'sahil@goo.com', '0', 'MTIzNDU2', '', '', '0000-00-00', '', '', 0, 'Active', '', '2012-12-11 09:33:29', 'Yes', '', '', '', '', '', '', '', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'qqq', 'qqq@qqq.com', '0', 'cXFxcXFx', '', '', '0000-00-00', '', '', 0, 'Active', '', '2012-12-11 09:38:07', 'Yes', '', '', '', '', '', '', '', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'vaibhav', 'hancy.pipl@gmail.com', '0', 'MTIzNDU2Nzg=', 'vaibhav', '', '0000-00-00', '', '', 0, 'Active', 'MjU=:50daa5724ce103.59899894', '2012-12-26 07:21:22', 'Yes', '', '', '', '', '123456', 'Av456', '4587962', '50dc287dd7611.jpg', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Sahil Shroff', 'sahil@panaceatek.com', '0', 'MTIzNDU2', '', '', '0000-00-00', '', '', 0, 'Active', 'Mjc=:50dd4f3a86f269.19561437', '2012-12-28 07:50:18', 'Yes', '', '', '', '', '', '', '', '50f13b8c5ee00.jpg', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'ram', 'ram@blues.com', '0', 'MTExMTExMTE=', '', '', '0000-00-00', '', '', 0, 'Active', 'MzE=:50f7c05ec59a70.06710597', '2013-01-17 09:11:58', 'Yes', '', '', '', '', '', '', '', '', '', 'no', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p630_us_state`
--

CREATE TABLE IF NOT EXISTS `p630_us_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `state_code` varchar(2) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `p630_us_state`
--

INSERT INTO `p630_us_state` (`state_id`, `state_name`, `state_code`) VALUES
(1, 'Alabama', 'AL'),
(2, 'Alaska', 'AK'),
(3, 'Arizona', 'AZ'),
(4, 'Arkansas', 'AR'),
(5, 'California', 'CA'),
(6, 'Colorado', 'CO'),
(7, 'Connecticut', 'CT'),
(8, 'Delaware', 'DE'),
(9, 'District of Columbia', 'DC'),
(10, 'Florida', 'FL'),
(11, 'Georgia', 'GA'),
(12, 'Hawaii', 'HI'),
(13, 'Idaho', 'ID'),
(14, 'Illinois', 'IL'),
(15, 'Indiana', 'IN'),
(16, 'Iowa', 'IA'),
(17, 'Kansas', 'KS'),
(18, 'Kentucky', 'KY'),
(19, 'Louisiana', 'LA'),
(20, 'Maine', 'ME'),
(21, 'Maryland', 'MD'),
(22, 'Massachusetts', 'MA'),
(23, 'Michigan', 'MI'),
(24, 'Minnesota', 'MN'),
(25, 'Mississippi', 'MS'),
(26, 'Missouri', 'MO'),
(27, 'Montana', 'MT'),
(28, 'Nebraska', 'NE'),
(29, 'Nevada', 'NV'),
(30, 'New Hampshire', 'NH'),
(31, 'New Jersey', 'NJ'),
(32, 'New Mexico', 'NM'),
(33, 'New York', 'NY'),
(34, 'North Carolina', 'NC'),
(35, 'North Dakota', 'ND'),
(36, 'Ohio', 'OH'),
(37, 'Oklahoma', 'OK'),
(38, 'Oregon', 'OR'),
(39, 'Pennsylvania', 'PA'),
(40, 'Rhode Island', 'RI'),
(41, 'South Carolina', 'SC'),
(42, 'South Dakota', 'SD'),
(43, 'Tennessee', 'TN'),
(44, 'Texas', 'TX'),
(45, 'Utah', 'UT'),
(46, 'Vermont', 'VT'),
(47, 'Virginia', 'VA'),
(48, 'Washington', 'WA'),
(49, 'West Virginia', 'WV'),
(50, 'Wisconsin', 'WI'),
(51, 'Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `p630_webcam`
--

CREATE TABLE IF NOT EXISTS `p630_webcam` (
  `webcam_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `duration` tinyint(4) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `date_1` datetime NOT NULL,
  `date_2` datetime NOT NULL,
  `date_3` datetime NOT NULL,
  `date_accept` enum('0','1','2','3') NOT NULL,
  `user_offset` float NOT NULL,
  `status` enum('pending','accepted','completed','rejected') NOT NULL,
  `paid` enum('n','y') NOT NULL,
  `date_created` datetime NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`webcam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `p630_webcam`
--

INSERT INTO `p630_webcam` (`webcam_id`, `user_id`, `advisor_id`, `duration`, `subject`, `description`, `date_1`, `date_2`, `date_3`, `date_accept`, `user_offset`, `status`, `paid`, `date_created`, `date_paid`) VALUES
(1, 27, 23, 1, 'Subject2', 'desc 2 desc 2 desc 2 desc 2 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 ', '2013-01-22 13:37:26', '2013-01-24 13:37:43', '2013-01-24 13:37:46', '1', 3.5, 'accepted', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 27, 23, 1, 'Subject1', 'desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 ', '2013-01-22 13:37:26', '2013-01-24 13:37:43', '2013-01-24 13:37:46', '1', 3.5, 'accepted', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 27, 23, 1, 'Subject1 CMP', 'desc COMP 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 ', '2013-01-22 13:37:26', '2013-01-24 13:37:43', '2013-01-24 13:37:46', '3', 3.5, 'completed', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 27, 23, 1, 'Subject2 CMP', 'desc COMP2 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 ', '2013-01-22 13:37:26', '2013-01-24 13:37:43', '2013-01-25 13:37:46', '1', 3.5, 'completed', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 27, 23, 1, 'Subject2 ACC', 'desc ACC2 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 ', '2013-01-22 13:37:26', '2013-01-23 13:37:43', '2013-01-25 13:37:46', '1', 3.5, 'accepted', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 27, 23, 1, 'Subject1 ACC', 'desc ACC2 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 desc 1 ', '2013-01-22 13:37:26', '2013-01-23 13:37:43', '2013-01-25 13:37:46', '2', 3.5, 'accepted', 'y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 27, 23, 2, 'Sub 2121', 'blah blah blah blah blah blah blah blah blah <br />\r\nblah blah blah blah blah blah <br />\r\nblah blah blah blah blah blah <br />\r\nblah blah blah ', '2013-01-24 20:00:00', '2013-01-16 21:00:00', '2013-01-25 21:00:00', '0', -3, 'rejected', 'n', '2013-01-16 10:20:14', '0000-00-00 00:00:00'),
(8, 27, 23, 2, 'Subject ---- New', 'Descp New 123 Descp New 123 Descp New 123 Descp New 123 <br />\r\nDescp New 123 <br />\r\nDescp New 123 <br />\r\nDescp New 123 Descp New 123 ', '2013-01-18 16:00:00', '2013-01-25 17:00:00', '2013-01-30 20:00:00', '1', 0, 'rejected', 'n', '2013-01-16 11:11:49', '0000-00-00 00:00:00'),
(9, 27, 23, 3, 'sub 3 wid edt -8', '<font size="3" color="#000000">sub 3 wid edt </font>-8 su<u>b<font color="#33ffcc"> 3 wid edt</font></u><font color="#33ffcc"> +</font>6&nbsp;sub 3 wid edt +6&nbsp;<br><div><br></div><div>sub 3 wid <b>edt +6</b><br></div><div>sub 3 wid edt +6<br></div>', '2013-01-23 18:34:00', '2013-01-30 18:34:00', '2013-01-31 18:34:00', '0', -8, 'rejected', 'n', '2013-01-16 13:00:56', '0000-00-00 00:00:00'),
(10, 27, 23, 1, 'dadas sdadas', 'asdasdas', '2013-01-23 18:51:00', '2013-01-24 18:51:00', '2013-01-25 18:51:00', '0', -5, 'pending', 'n', '2013-01-22 13:22:17', '0000-00-00 00:00:00'),
(11, 27, 23, 1, 'dsad sdas as2', 'asdasd asd dasas as adas dadas dasdas d', '2013-01-31 18:52:00', '2013-01-30 18:52:00', '2013-01-29 18:52:00', '0', -5, 'pending', 'n', '2013-01-22 13:24:04', '0000-00-00 00:00:00'),
(12, 27, 23, 1, 'dsfdsf', '<br>', '2013-01-31 18:55:00', '2013-01-28 18:55:00', '2013-01-29 18:55:00', '0', -5, 'pending', 'n', '2013-01-22 13:30:01', '0000-00-00 00:00:00'),
(13, 27, 23, 1, 'New 12345', 'fsdfdsf &nbsp;dsf df d', '2013-01-23 19:05:00', '2013-01-29 19:05:00', '2013-01-31 19:05:00', '0', -5, 'pending', 'n', '2013-01-22 13:37:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p630_webcam_file`
--

CREATE TABLE IF NOT EXISTS `p630_webcam_file` (
  `webcam_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `location` varchar(64) NOT NULL,
  `webcam_id` int(11) NOT NULL,
  `format` varchar(10) NOT NULL,
  PRIMARY KEY (`webcam_file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `p630_webcam_file`
--

INSERT INTO `p630_webcam_file` (`webcam_file_id`, `name`, `location`, `webcam_id`, `format`) VALUES
(1, 'Lighthouse', '50fe95fcd78bd.jpg', 13, 'jpg'),
(2, 'Penguins', '50fe95fce7fe6.jpg', 13, 'jpg'),
(3, 'Tulips', '50fe95fd0ed21.jpg', 13, 'jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p630_advisor_language`
--
ALTER TABLE `p630_advisor_language`
  ADD CONSTRAINT `FK_advisor_id3` FOREIGN KEY (`advisor_id`) REFERENCES `p630_advisor_details` (`advisor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

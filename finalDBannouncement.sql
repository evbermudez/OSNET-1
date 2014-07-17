-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2014 at 10:46 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osnet2`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `announcement_title` varchar(100) NOT NULL,
  `duration_start` date NOT NULL,
  `duration_end` date NOT NULL,
  `announcement_message` text NOT NULL,
  `archive` date DEFAULT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `user_id`, `feature_id`, `feedback`, `announcement_title`, `duration_start`, `duration_end`, `announcement_message`, `archive`) VALUES
(4, 0, 0, 'feedback', 'test edited', '2014-07-16', '2014-07-17', 'dalsk<br><br>', NULL),
(5, 0, 0, 'feedback', 'new new neww neww neww neww neww neww neww neww neww neww neww neww neww neww neww neww neww', '2014-07-17', '2014-07-18', 'test', NULL),
(6, 0, 0, 'feedback', 'again', '2014-07-14', '2014-07-17', 'saasf', '2014-07-16'),
(7, 0, 0, 'feedback', 'new', '2014-07-15', '2014-07-16', 'test2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Web Development'),
(2, 'Doggy');

-- --------------------------------------------------------

--
-- Table structure for table `department_manager`
--

CREATE TABLE IF NOT EXISTS `department_manager` (
  `department_manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  PRIMARY KEY (`department_manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department_team`
--

CREATE TABLE IF NOT EXISTS `department_team` (
  `department_team_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`department_team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE IF NOT EXISTS `feature` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_type` enum('wala','ko','kabalo') NOT NULL,
  `feature_name` enum('wala','ko','kabalo') NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_id`, `feature_type`, `feature_name`) VALUES
(1, 'wala', ''),
(2, 'wala', ''),
(3, 'wala', ''),
(4, 'wala', ''),
(5, 'wala', ''),
(6, 'wala', ''),
(7, 'wala', ''),
(8, 'wala', ''),
(9, 'wala', ''),
(10, 'wala', ''),
(11, 'wala', ''),
(12, 'wala', '');

-- --------------------------------------------------------

--
-- Table structure for table `feature_role`
--

CREATE TABLE IF NOT EXISTS `feature_role` (
  `feature_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`feature_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feature_role`
--

INSERT INTO `feature_role` (`feature_user_id`, `feature_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date_created` datetime NOT NULL,
  `status` enum('solved','pending') NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feature_id`, `subject`, `text`, `date_created`, `status`) VALUES
(1, 201038998, 1, 'Ben10', 'Ben10', '2014-07-14 23:16:41', 'pending'),
(2, 201038998, 1, 'Hello', 'Yellow!', '2014-07-14 23:18:21', 'pending'),
(3, 201038998, 1, 'Hello', 'World', '2014-07-14 23:20:39', 'pending'),
(4, 201038998, 1, 'as', 'as', '2014-07-14 23:23:03', 'pending'),
(5, 201038998, 3, 'Lol', 'What', '2014-07-16 00:29:49', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `usertype` enum('superadmin','hr-admin','manager','team leader','regular user') NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `user_id`, `usertype`) VALUES
(1, 201038998, 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_leader`
--

CREATE TABLE IF NOT EXISTS `team_leader` (
  `team_leader_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`team_leader_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_login_id`, `user_id`, `username`, `password`) VALUES
(1, 201038998, 'evil', '5f4dcc3b5aa765d61d8327deb882cf99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

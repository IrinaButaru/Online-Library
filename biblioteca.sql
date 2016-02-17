-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2015 at 09:06 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY  (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `link`, `category`) VALUES
(2, 'Dracula', 'Bram Stoker', 'books/Dracula.pdf', 'aventura'),
(3, 'Murder on the Orient Express', 'Agatha Christie', 'books/murder_on_the_orient_express.pdf', 'roman politist'),
(4, 'Codul lui Da Vinci', 'Dan Brown', 'books/dan brown-codul lui da vinci.pdf', 'aventura'),
(5, 'Conspiratia', 'Dan Brown', 'books/dan brown - conspiratia', 'aventura'),
(6, 'Dune-Volumul1-Dune', 'Frank Herbert', 'books/Frank_Herbert-Dune-Volumul1_Dune.pdf', 'SF'),
(7, 'Dune-Volumul2-Mintuitorul Dunei', 'Frank Herbert', 'books/Frank_Herbert-Dune-Volumul2_Mintuitorul_Dunei.pdf', 'SF');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `date_time`) VALUES
(1, 'Irina', '2015-04-20 08:23:34'),
(2, 'Irina', '2015-04-20 08:31:49'),
(3, 'Irina', '2015-04-20 09:15:38'),
(4, 'Irina', '2015-04-20 09:23:48'),
(5, 'Irina', '2015-04-21 10:00:27'),
(6, 'Irina', '2015-04-25 09:47:10'),
(7, 'Irina', '2015-04-25 09:47:20'),
(8, 'Irina', '2015-04-25 09:49:39'),
(9, 'Irina', '2015-04-25 09:50:50'),
(10, 'Irina', '2015-04-25 09:51:37'),
(11, 'Irina', '2015-04-25 09:53:19'),
(12, 'Irina', '2015-04-25 09:54:12'),
(13, 'Irina', '2015-04-26 09:11:25'),
(14, 'Irina', '2015-04-26 09:14:25'),
(15, 'Irina', '2015-04-26 09:54:11'),
(16, 'Irina', '2015-04-27 08:38:06'),
(17, 'Irina', '2015-04-27 09:04:48'),
(18, 'Irina', '2015-04-27 09:10:32'),
(19, 'Irina', '2015-04-27 09:13:51'),
(20, 'Irina', '2015-04-27 09:18:12'),
(21, 'Irina', '2015-04-27 09:27:35'),
(22, 'Irina', '2015-04-27 11:21:42'),
(23, 'Irina', '2015-04-27 11:32:41'),
(24, 'Irina', '2015-04-27 11:34:53'),
(25, 'Irina', '2015-04-27 05:58:02'),
(26, 'Irina', '2015-04-28 09:17:48'),
(27, 'Irina', '2015-04-28 10:57:34'),
(28, 'Irina', '2015-04-28 05:24:51'),
(29, 'irina', '2015-04-28 05:57:02'),
(30, 'Irina', '2015-04-28 05:57:15'),
(31, 'Irina', '2015-04-28 07:47:42'),
(32, 'Irina', '2015-04-28 08:24:48'),
(33, 'Irina', '2015-04-29 08:57:48'),
(34, 'Irina', '2015-04-29 09:35:47'),
(35, 'user', '2015-04-29 09:43:10'),
(36, 'Irina', '2015-04-29 09:43:27'),
(37, 'Irina', '2015-04-29 12:53:29'),
(38, 'Irina', '2015-04-29 01:23:54'),
(39, 'Irina', '2015-04-29 01:30:45'),
(40, 'Irina', '2015-04-29 01:35:35'),
(41, 'user', '2015-04-29 01:35:48'),
(42, 'Irina', '2015-04-29 01:43:03'),
(43, 'user', '2015-04-30 11:25:56'),
(44, 'Irina', '2015-04-30 11:38:57'),
(45, 'user', '2015-04-30 05:47:47'),
(46, 'Irina', '2015-04-30 05:55:07'),
(47, 'Irina', '2015-04-30 08:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(11) NOT NULL,
  `newsletter` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `last_name`, `first_name`, `email`, `username`, `password`, `type`, `newsletter`) VALUES
(1, 'Butaru', 'Irina', 'irina.butaru@yahoo.com', 'Irina', 'cre3KvmzozXBM', 1, 0),
(2, 'Optional', 'PHP', 'php.optional@gmail.com', 'user', 'crvLj6uCSTOO6', 0, 1),
(3, 'lab223', 'lab223', 'lab223@email', 'php', 'crvLj6uCSTOO6', 0, 1);

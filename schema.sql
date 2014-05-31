-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2014 at 01:02 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `meatmaps`
--
CREATE DATABASE IF NOT EXISTS `meatmaps` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `meatmaps`;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `long` varchar(20) NOT NULL DEFAULT '0',
  `lat` varchar(20) NOT NULL DEFAULT '0',
  `twitter` varchar(20) NOT NULL,
  `foreign_network` varchar(10) NOT NULL DEFAULT 'local' COMMENT 'local or twitter',
  `foreign_id` varchar(32) NOT NULL COMMENT 'use varchar because int has limit',
  PRIMARY KEY (`mem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(64) NOT NULL,
  `session_user` int(16) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Novembre 2016 à 19:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `librairie_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(8) PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `overview` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `year` int(8) NOT NULL,
  `deleted` int(8) NOT NULL,
  `price` int(8) NOT NULL,
  `book_cover` varchar(50) NOT NULL,
  `genre` int(8) NOT NULL,
  `edition` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(8) PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(50) PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `book` int(50) NOT NULL,
  `user` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `deleted` int(8) NOT NULL,
  `total_price` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

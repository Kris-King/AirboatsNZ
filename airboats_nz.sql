-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 08:48 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airboats_nz`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` varchar(250) NOT NULL,
  `title` varchar(150) NOT NULL,
  `city_town` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start_date`, `end_date`, `description`, `title`, `city_town`, `country`, `user_id`) VALUES
(5, '2015-05-24 13:31:00', '2015-05-26 17:00:00', 'An airboat exhibition is underway and we would love to see you there.', 'Airboat Exhibition', 'Newcastle', 'Australia', 1),
(9, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(10, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(13, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(14, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(15, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(16, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(17, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(18, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(19, '2015-05-24 13:30:00', '2015-05-26 16:30:00', '65uw5u65u5u', 'Airboat Exhibition', 'Nelson', 'New Zealand', 1),
(23, '2015-05-24 13:30:00', '2015-05-26 17:00:00', '3wr34wtsasdvfsdhjtyjtyjt', 'Airboat Meet', 'Nelson', 'New Zealand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `user_id`) VALUES
(2, 'Penguins.jpg', 1),
(3, 'Koala.jpg', 1),
(4, 'Lighthouse.jpg', 1),
(5, 'Jellyfish.jpg', 1),
(6, 'Tulips.jpg', 1),
(7, 'Tulips.jpg', 1),
(8, 'Jellyfish.jpg', 1),
(9, 'Lighthouse.jpg', 1),
(10, 'Koala.jpg', 1),
(11, 'Penguins.jpg', 1),
(12, 'Desert.jpg', 1),
(13, 'Desert.jpg', 1),
(15, 'Tulips1.jpg', 1),
(16, 'Desert1.jpg', 1),
(17, 'Desert2.jpg', 1),
(18, 'Penguins1.jpg', 1),
(19, 'Koala1.jpg', 1),
(20, 'Desert3.jpg', 1),
(21, 'Desert4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `password`, `status`) VALUES
(1, 'Malcolm', 'King', 'malcolmking@xtra.co.nz', '5604eb1517471c09e208bcb0478a57f3', 'Pending'),
(2, 'Richard', 'Roma', 'richardroma@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

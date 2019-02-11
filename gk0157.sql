-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: student-db.cse.unt.edu
-- Generation Time: Feb 08, 2019 at 10:39 PM
-- Server version: 5.5.54-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gk0157`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `zipcode` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `zipcode`) VALUES
(1, 'Gg', 65201),
(2, 'Lg', 87945),
(3, 'Jk', 74521),
(4, 'Gk', 76201),
(5, 'Bn', 74421),
(6, 'Yo', 12345),
(7, 'Gowtham', 76201),
(8, 'Mangu', 76201),
(9, 'Rishi', 98790),
(10, 'Sourab', 99098),
(11, 'Sai', 78976);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `customerid` (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `name`, `size`, `type`, `quantity`, `timestamp`) VALUES
(81, 3, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 2, '02-08-2019 13:01:36'),
(82, 4, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 2, '02-08-2019 13:05:23'),
(83, 3, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 2, '02-08-2019 13:08:45'),
(84, 3, 'Adidas Soccer Ball', 'Medium', 'Indoor Ball', 2, '02-08-2019 13:09:17'),
(85, 3, 'Nike Soccer Ball', 'Large', 'Indoor Ball', 4, '02-08-2019 13:09:17'),
(86, 5, 'Nike Soccer Ball', 'Small', 'Indoor Ball', 3, '02-08-2019 13:10:13'),
(87, 6, 'Adidas Soccer Ball', 'Large', 'Turf Ball', 5, '02-08-2019 13:11:23'),
(88, 6, 'Nike Soccer Ball', 'Medium', 'Turf Ball', 10, '02-08-2019 13:11:23'),
(89, 6, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 1, '02-08-2019 13:12:01'),
(90, 7, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 1, '02-08-2019 13:23:27'),
(91, 7, 'Nike Soccer Ball', 'Small', 'Indoor Ball', 2, '02-08-2019 13:23:27'),
(92, 4, 'Adidas Soccer Ball', 'Small', 'Indoor Ball', 3, '02-08-2019 17:19:20'),
(93, 8, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 2, '02-08-2019 21:49:34'),
(94, 3, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 5, '02-08-2019 21:55:43'),
(95, 3, 'Nike Soccer Ball', 'Small', 'Indoor Ball', 8, '02-08-2019 21:55:43'),
(96, 3, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 3, '02-08-2019 22:24:55'),
(97, 9, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 4, '02-08-2019 22:25:09'),
(98, 5, 'Adidas Soccer Ball', 'Large', 'Turf Ball', 2, '02-08-2019 22:30:13'),
(99, 5, 'Nike Soccer Ball', 'Medium', 'Indoor Ball', 4, '02-08-2019 22:30:13'),
(100, 2, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 2, '02-08-2019 22:31:49'),
(101, 10, 'Nike Soccer Ball', 'Small', 'Indoor Ball', 2, '02-08-2019 22:32:30'),
(102, 4, 'Adidas Soccer Ball', 'Small', 'Turf Ball', 2, '02-08-2019 22:35:44');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `foreignKeyConstraint` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 09:36 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angularjs2shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `fullName`, `email`, `roleId`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrator', 'admin@gmail.com', 1),
(11, 'customer1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Customer 1', 'customer1@gmail.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `detail` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `publishDate` date NOT NULL,
  `categoryId` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `brandId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `detail`, `status`, `views`, `publishDate`, `categoryId`, `photo`, `price`, `quantity`, `brandId`) VALUES
(3, 'Product 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 7, '2017-04-27', 5, 'product1.jpg', 5, 0, 1),
(21, 'Product 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 1, '2017-04-27', 5, 'product2.jpg', 1, 0, 1),
(22, 'Product 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 7, '2017-04-27', 9, 'product3.jpg', 2, 0, 1),
(23, 'Product 4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 1, '2017-04-27', 9, 'product4.jpg', 8, 0, 1),
(24, 'Product 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 4, '2017-04-27', 12, 'product5.jpg', 9, 0, 2),
(25, 'Product 6', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 1, '2017-04-27', 12, 'product1.jpg', 11, 0, 1),
(26, 'Product 7', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 5, '2017-04-27', 12, 'product2.jpg', 3, 0, 1),
(27, 'Product 8', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>', 1, 6, '2017-04-27', 12, 'product3.jpg', 4, 0, 1),
(28, 'Product 9', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 4, '2017-04-27', 12, 'product5.jpg', 5, 0, 1),
(29, 'Product 10', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 5, '2017-04-27', 12, 'product4.jpg', 6, 0, 1),
(30, 'Product 11', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 4, '2017-04-27', 12, 'product1.jpg', 2, 0, 1),
(31, 'Product 12', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 7, '2017-04-27', 12, 'product2.jpg', 20, 0, 1),
(32, 'Product 13', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 20, '2017-04-27', 12, 'product3.jpg', 11, 0, 1),
(33, 'Product 14', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 1, '2017-04-27', 12, 'product5.jpg', 4, 0, 1),
(34, 'Product 15', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis. Nam felis lectus, feugiat ac leo non, luctus elementum augue</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae. Vivamus nec purus felis.</p>', 1, 4, '2017-04-27', 12, 'product1.jpg', 5, 0, 1),
(35, 'Product 16', '<p>sub sub</p>', '<p>sub sub</p>', 1, 16, '2017-05-02', 12, 'product2.jpg', 9, 0, 1),
(36, 'Product 17', '<p>m.,m.,m.,</p>', '<p>,m.m,m,.</p>', 1, 29, '2017-05-05', 12, 'product5.jpg', 6, 0, 1),
(38, 'Product Test 1', '', '<p>Description for Product Test 1</p>', 1, 5, '2017-05-12', 12, '209eb8fba7357fdf4d7aa562f84b2b83.jpg', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`) VALUES
(1, 'Brand 1', 1),
(2, 'Brand 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `parentId` int(11) NOT NULL,
  `orders` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `photo`, `parentId`, `orders`) VALUES
(1, 'Category 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', 1, '045feb82c19b467f98076eec0ee2e873.gif', 0, 1),
(2, 'Category 1.1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', 1, 'e27edb1154a35f0413981e836cd0dda0.gif', 1, 5),
(4, 'Category 1.3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', 1, '7cc18ec5cdd6fb8dac005c4153a8e8bd.gif', 1, 0),
(5, 'Category 1.4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', 1, '8fba09ed261ba4a65d275d8f7d6f3ee2.gif', 1, 0),
(6, 'Category 1.5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', 1, 'e70f95ff466f85abb849207766ad27aa.gif', 1, 0),
(7, 'Category 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', 1, '102072ab415f32af3bb96cf5cde692cf.gif', 0, 5),
(8, 'Category 1.2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor sed nunc eleifend pharetra euismod vitae.</p>', 1, '605b505a8f43b41ea2710283697866f1.gif', 1, 6),
(9, 'Category 3', '<p><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit </b></p>', 1, '86f39073af5247ef3af53d8676bdc267.gif', 0, 8),
(10, 'Category 2.1', '<p>Hjjhffhhjjhg</p>', 1, 'no-image.png', 7, 0),
(11, 'Category 4', '', 1, 'no-image.png', 0, 0),
(12, 'Category 4.1', '', 1, 'no-image.png', 11, 0),
(13, 'Category 4.2', '', 1, 'no-image.png', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `sendDate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `articleId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, '034849cb33d276eb61ac6b9871c7a140f08f386b', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `creation` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `username`, `creation`, `status`) VALUES
('5T913479UL725441R', 'Order from PayPal', 'customer1', '2017-07-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `articleId` int(11) NOT NULL,
  `ordersid` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`articleId`, `ordersid`, `quantity`, `price`) VALUES
(32, '5T913479UL725441R', 2, 11),
(36, '5T913479UL725441R', 1, 6),
(31, '5T913479UL725441R', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `publishDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `status`, `publishDate`) VALUES
(1, 'About Us', 'About Us Page', 0, '2017-04-24'),
(2, 'Help', 'Help Page', 1, '2017-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'Administrator', 1),
(7, 'Customer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `group` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `description`, `group`) VALUES
(1, 'base_url', 'http://localhost:9092/angularjs2shoppingcart/api/', '', 'basic'),
(2, 'base_url_photo', 'http://localhost:9092/angularjs2shoppingcart/assets/upload/', '', 'basic'),
(3, 'limit_latest', '9', '', 'basic'),
(4, 'limit_most_viewed', '9', '', 'basic'),
(5, 'limit_pagination', '9', '', 'basic'),
(8, 'limit_random', '9', '', 'basic'),
(9, 'rest_api_key', '034849cb33d276eb61ac6b9871c7a140f08f386b', '', 'api'),
(10, 'photo_article', '1', '<p>1: Photo from article<br />2: Photo from category</p>', 'basic'),
(14, 'type_display_sub_category', '1', '<p>1: List View<br />2: GridView</p>', 'gridview category'),
(15, 'number_of_columns_gridview', '3', '', 'gridview category'),
(16, 'app_name', 'OctopusCodes Angular 2 Shopping Cart', '', 'basic'),
(17, 'time_loading', '5000', '<p>unit: milliseconds</p>', 'loading'),
(18, 'is_loading', 'true', '<p>1: true<br />0: false</p>', 'loading'),
(19, 'is_display_latest_articles', 'true', '', 'nav_menu'),
(20, 'is_latest_and_most_viewed', 'true', '', 'nav_menu'),
(21, 'is_display_most_viewed', 'true', '', 'nav_menu'),
(22, 'is_display_category', 'true', '', 'nav_menu'),
(23, 'is_display_help_and_support', 'true', '', 'nav_menu'),
(24, 'is_display_about_us', 'true', '', 'nav_menu'),
(25, 'is_display_contact_us', 'true', '', 'nav_menu'),
(27, 'path_logo', 'http://localhost:9092/angularjs2shoppingcart/assets/upload/logo.png', '', 'nav_menu'),
(28, 'is_article_description', 'true', '', 'article'),
(29, 'is_article_category', 'true', '', 'article'),
(30, 'is_article_published', 'true', '', 'article'),
(31, 'is_article_hits', 'true', '', 'article'),
(32, 'article_date_format', 'dd MMM yyyy', '', 'article'),
(33, 'is_article_photo', 'true', '', 'article'),
(34, 'is_banner_ads', 'true', '', 'ads'),
(35, 'is_interstitialAd_ads', 'true', '', 'ads'),
(36, 'is_menu_write_comment', 'true', '', 'menu'),
(37, 'is_menu_comment_list', 'true', '', 'menu'),
(38, 'is_contact_page_detail', 'true', '', 'menu'),
(40, 'is_category_description', 'true', '', 'category'),
(41, 'is_category_count_articles', 'true', '', 'category'),
(42, 'is_category_photo', 'true', '', 'category'),
(43, 'limit_best_seller', '6', '', 'basic'),
(44, 'paypal_business_email', 'kevin-facilitator@findingsoftware.com', 'paypal business name', 'paypal'),
(45, 'paypal_return', 'http://127.0.0.1:8080/#/success', '', 'paypal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`articleId`,`ordersid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

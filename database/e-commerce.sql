-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 12:15 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'sany', 'mazharulalam26@gmail.com', 'asd'),
(4, '', 'playerc950@gmail.com', 'asd'),
(5, 'admin', 'mazharalam753@gmail.com', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `front_show`
--

CREATE TABLE `front_show` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `h` varchar(25) NOT NULL,
  `p` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `front_show`
--

INSERT INTO `front_show` (`id`, `img`, `h`, `p`, `content`) VALUES
(0, '01.jpg', 'hello world', 'welcome to your online shopping world', 'carouse_item_1'),
(0, '02.jpg', 'this is your time to sell', 'you cal sell here everything what u wanto sell if ', 'carouse_item_2');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `postedby` varchar(50) NOT NULL,
  `editedby` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` text NOT NULL,
  `flash_sale` tinyint(1) NOT NULL,
  `special_offers` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `postedby`, `editedby`, `title`, `description`, `category`, `price`, `img`, `flash_sale`, `special_offers`) VALUES
(8, 'sany', '', 'Royal Enfield classic 350', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae ipsa impedit non nihil deleniti, voluptate libero, sint, alias, incidunt blanditiis sapiente id eveniet. Magnam quam odio illo, sint tempore quod!          ', '1', 300000, 'royal_enfield.jpg', 0, 1),
(7, 'sany', '', 'BMW GTR m3', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae ipsa impedit non nihil deleniti, voluptate libero, sint, alias, incidunt blanditiis sapiente id eveniet. Magnam quam odio illo, sint tempore quod!          ', '1', 900000, 'blog-large-img-1.jpg', 0, 1),
(9, 'sany', '', 'T-shirt', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae ipsa impedit non nihil deleniti, voluptate libero, sint, alias, incidunt blanditiis sapiente id eveniet. Magnam quam odio illo, sint tempore quod!          ', '2', 300, 'cloth.jpg', 0, 0),
(14, 'sany', '', 'Beauty box', '            		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, temporibus!          ', '5', 1000, 'cosmetics.jpg', 0, 1),
(13, 'sany', '', 'Tab', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum natus perspiciatis a inventore sequi in, magnam cupiditate excepturi facilis aliquid corporis provident, voluptates modi nulla quam, est perferendis ducimus laboriosam!          ', '3', 8000, 'tab.jpg', 0, 0),
(15, 'sany', '', 'iphone back cover', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, maxime.\n', '4', 500, 'Mobile-Accessories.jpg', 1, 0),
(16, 'sany', '', 'Badminton racket', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati iusto reiciendis aspernatur repudiandae impedit repellendus quaerat, quae doloribus tempora quo.', '6', 350, 'badminton-racket.jpg', 0, 0),
(17, 'sany', '', 'watch', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati iusto reiciendis aspernatur repudiandae impedit repellendus quaerat, quae doloribus tempora quo.', '2', 350, 'watch.jpg', 1, 0),
(19, 'sany', '', 'cap', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe iusto libero enim provident architecto delectus!', '2', 250, 'cap2.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `public`
--

CREATE TABLE `public` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `public`
--

INSERT INTO `public` (`id`, `name`, `phone`, `email`, `password`) VALUES
(17, 'rafi', 1876626011, 'playerc950@gmail.com', 'asd'),
(16, 'sany', 1876626011, 'mazharulalam26@gmail.com', 'asd'),
(9, 'sany', 1876626011, 'mazharulalam2@gmail.com', '1'),
(21, 'sany', 1876626011, 'mazharalam753@gmail.com', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `public`
--
ALTER TABLE `public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

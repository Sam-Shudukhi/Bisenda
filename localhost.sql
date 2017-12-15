-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2017 at 01:15 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `date_added`) VALUES
(1, 'admin', 'f5bb0c8de146c67b44babbf4e6584cc0', '2017-10-26 16:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `BusinessHours`
--

CREATE TABLE `BusinessHours` (
  `hid` int(11) NOT NULL,
  `did` int(1) NOT NULL,
  `lid` int(11) NOT NULL,
  `from_time` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `to_time` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL,
  `date-added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `BusinessHours`
--

INSERT INTO `BusinessHours` (`hid`, `did`, `lid`, `from_time`, `to_time`, `active`, `date-added`) VALUES
(1, 1, 7, '', '', 0, '2017-11-09 02:37:06'),
(2, 2, 7, '', '', 0, '2017-11-09 02:37:06'),
(3, 3, 7, '08:00', '11:00', 1, '2017-11-09 02:37:26'),
(4, 4, 7, '', '', 0, '2017-11-09 02:37:26'),
(5, 5, 7, '10:00', '11:00', 1, '2017-11-09 02:37:50'),
(6, 6, 7, '10:00', '11:00', 1, '2017-11-09 02:37:50'),
(7, 7, 7, '08:00', '11:00', 1, '2017-11-09 02:38:12'),
(8, 1, 25, '12:00', '07:00', 1, '2017-11-09 23:13:48'),
(9, 2, 25, '01:00', '01:05', 0, '2017-11-09 23:14:19'),
(10, 3, 25, '01:00', '01:00', 1, '2017-11-09 23:14:19'),
(11, 4, 25, '01:00', '01:00', 0, '2017-11-09 23:14:47'),
(12, 5, 25, '09:00', '09:00', 1, '2017-11-09 23:14:47'),
(13, 6, 25, '01:00', '01:00', 1, '2017-11-09 23:15:07'),
(14, 7, 25, '01:00', '01:00', 0, '2017-11-09 23:15:07'),
(15, 1, 1, '09:00', '09:00', 1, '2017-11-18 04:15:10'),
(16, 2, 1, '09:00', '09:00', 1, '2017-11-18 04:15:10'),
(17, 3, 1, '09:00', '05:00', 1, '2017-11-18 04:15:10'),
(18, 4, 1, '10:00', '12:00', 1, '2017-11-18 04:15:10'),
(19, 5, 1, '12:00', '12:00', 1, '2017-11-18 04:15:10'),
(20, 6, 1, '10:00', '09:00', 1, '2017-11-18 04:15:10'),
(21, 7, 1, '10:00', '05:00', 1, '2017-11-18 04:15:10'),
(22, 1, 35, '', '', 0, '2017-11-19 03:30:39'),
(23, 2, 35, '', '', 0, '2017-11-19 03:30:39'),
(24, 3, 35, '', '', 0, '2017-11-19 03:30:39'),
(25, 4, 35, '', '', 0, '2017-11-19 03:30:39'),
(26, 5, 35, '', '', 0, '2017-11-19 03:30:39'),
(27, 6, 35, '', '', 0, '2017-11-19 03:30:39'),
(28, 7, 35, '', '', 0, '2017-11-19 03:30:39'),
(29, 1, 36, '', '', 0, '2017-11-19 05:33:06'),
(30, 2, 36, '', '', 0, '2017-11-19 05:33:06'),
(31, 3, 36, '', '', 0, '2017-11-19 05:33:06'),
(32, 4, 36, '', '', 0, '2017-11-19 05:33:06'),
(33, 5, 36, '', '', 0, '2017-11-19 05:33:06'),
(34, 6, 36, '', '', 0, '2017-11-19 05:33:06'),
(35, 7, 36, '', '', 0, '2017-11-19 05:33:06'),
(36, 1, 37, '', '', 0, '2017-11-20 09:40:58'),
(37, 2, 37, '', '', 0, '2017-11-20 09:40:58'),
(38, 3, 37, '', '', 0, '2017-11-20 09:40:58'),
(39, 4, 37, '', '', 0, '2017-11-20 09:40:58'),
(40, 5, 37, '', '', 0, '2017-11-20 09:40:58'),
(41, 6, 37, '', '', 0, '2017-11-20 09:40:58'),
(42, 7, 37, '', '', 0, '2017-11-20 09:40:58'),
(43, 1, 38, '', '', 0, '2017-11-21 20:50:30'),
(44, 2, 38, '', '', 0, '2017-11-21 20:50:30'),
(45, 3, 38, '', '', 0, '2017-11-21 20:50:30'),
(46, 4, 38, '', '', 0, '2017-11-21 20:50:30'),
(47, 5, 38, '', '', 0, '2017-11-21 20:50:30'),
(48, 6, 38, '', '', 0, '2017-11-21 20:50:30'),
(49, 7, 38, '', '', 0, '2017-11-21 20:50:30'),
(50, 1, 39, '', '', 0, '2017-11-25 23:03:52'),
(51, 2, 39, '', '', 0, '2017-11-25 23:03:52'),
(52, 3, 39, '', '', 0, '2017-11-25 23:03:52'),
(53, 4, 39, '', '', 0, '2017-11-25 23:03:52'),
(54, 5, 39, '', '', 0, '2017-11-25 23:03:52'),
(55, 6, 39, '', '', 0, '2017-11-25 23:03:52'),
(56, 7, 39, '', '', 0, '2017-11-25 23:03:52'),
(57, 1, 40, '', '', 0, '2017-11-25 23:26:28'),
(58, 2, 40, '', '', 0, '2017-11-25 23:26:28'),
(59, 3, 40, '', '', 0, '2017-11-25 23:26:28'),
(60, 4, 40, '', '', 0, '2017-11-25 23:26:28'),
(61, 5, 40, '', '', 0, '2017-11-25 23:26:28'),
(62, 6, 40, '', '', 0, '2017-11-25 23:26:28'),
(63, 7, 40, '', '', 0, '2017-11-25 23:26:28'),
(64, 1, 41, '', '', 0, '2017-12-11 15:39:29'),
(65, 2, 41, '', '', 0, '2017-12-11 15:39:29'),
(66, 3, 41, '', '', 0, '2017-12-11 15:39:29'),
(67, 4, 41, '', '', 0, '2017-12-11 15:39:29'),
(68, 5, 41, '', '', 0, '2017-12-11 15:39:29'),
(69, 6, 41, '', '', 0, '2017-12-11 15:39:29'),
(70, 7, 41, '', '', 0, '2017-12-11 15:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `BusinessListing`
--

CREATE TABLE `BusinessListing` (
  `lid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `booking` int(11) NOT NULL DEFAULT '0',
  `booking_url` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL,
  `hours` int(11) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `BusinessListing`
--

INSERT INTO `BusinessListing` (`lid`, `bid`, `title`, `category`, `address`, `city`, `province`, `postal_code`, `email`, `phone`, `booking`, `booking_url`, `description`, `website`, `hours`, `verified`, `logo`, `date_added`) VALUES
(1, 1, 'Trifons', 'Restaurant', '1101 Kramer Blvd', 'Regina', 'SK', 'S4S', 'xx@gmail.com', '3065559998', 2, ' ', 'The first Trifon\'s Pizza was opened in 1972 by our founder Trifon Agioritis.  If it was one thing Trifon knew, it was great pizza! So he decided to stake his name on it.  With an honest to goodness crust, smothered with fresh tomato sauce, gooey mozzarella cheese, and all your favorite fresh toppings, it is no wonder Trifon\'s has been serving customers for over 40 years.  Our tasty meals are a welcome and convenient break in a busy day. Good eating from Trifon\'s Pizza!', 'http://www.trifons.com', 0, 1, '', '2017-10-28 23:41:06'),
(2, 2, 'Dollarama', 'Retail', '4602 Gordon Rd ', 'Regina', 'SK', '', 'dollarama@gmail.com', '3065868929', 3, NULL, 'Dollarama Inc. is a Canadian dollar store retail chain headquartered in Montreal. Since 2009, it has been Canada\'s largest retailer of items for four dollars or less', 'http://www.dollarama.com', 0, 1, '', '2017-10-28 23:41:06'),
(3, 3, 'Burger King', 'Restaurant', '2413 Albert st', 'Regina', 'SK', '', 'burgerking@gmail.com', '3067891232', 3, NULL, 'SINCE 1954\r\n60 years of our flame-grilled,\r\nfreshly prepared tradition goes into every order.', 'http://burgerking.ca', 0, 1, '', '2017-10-28 23:53:32'),
(4, 4, 'Ragged Ass Barbers', 'Barber shop/Spa', '2 - 1965 Hamilton St', 'Regina', 'SK', '', 'raggedass@gmail.com', '3065652729', 1, 'https://booksy.net/en-ca/718_ragged-ass-barbers-inc_barbers_1221848_regina', 'Ragged Ass Barbers originated in 2010 in Yellowknife, NWT – the home of its namesake. The Barbers opened its shop doors providing exceptional grooming services in with a unique focus on traditional men\'s hairstyles.  When an opportunity arose for one barber to return to his prairie roots, Craig welcomed the challenge to reach a completely new clientele with a twist on a traditional concept. \r\n\r\nIn January 2012, Ragged Ass Barbers’ revitalized ideal of the barber shop tradition was introduced to Regina, SK.  These barbers are professionally trained to provide the public with precision haircuts, beard and mustache trims, and the ever popular hot-towel, straight razor shave. \r\n\r\nGet your Ragged Ass hair cut!!\r\n', 'http://www.raggedassbarbers.com/index.html', 0, 0, '', '2017-10-28 23:53:32'),
(5, 5, 'Macs Convenience Store', 'Convenience Store', '210 Broad st', 'Regina', 'SK', '', 'macs@gmail.com', '3063214567', 3, NULL, 'Careers. Great people make a great team. We have many business and career opportunities in many different areas! Whether you are looking for.', 'http://www.macs.ca', 0, 1, '', '2017-10-29 00:04:55'),
(6, 6, 'The Source', 'Electronic Store', 'Southland Mall', 'Regina', 'SK', '', 'thesource@gmail.com', '3065556678', 3, NULL, 'Tablets, Laptops, TVs & More. Shop and Save Big at The Source!\r\nWide Product Selection · Free Shipping to Store · 550+ Stores in Canada · Best Price Guarantee\r\nTypes: Tablets, Headphones, Laptops, Portable Audio, Cameras, TVs & Home Theatre', 'https://www.thesource.ca', 0, 0, '', '2017-10-29 00:04:55'),
(7, 7, 'Regina Bar and Grill', 'Restaurant', '123 Broad St', 'Regina', 'SK', 's4s9d4', 'jax@mail.com', '3061112022', 2, 'http://www.google.ca', 'Bar and Grill ', 'http://www.example.com', 0, 1, '', '2017-11-01 04:36:04'),
(13, 20, 'Testing', 'Personal Health', 'Munroe Place', 'Regina', 'SK', '', 'testing@mail.com', '306789090', 3, NULL, '', '', 0, 0, '', '2017-11-02 02:27:22'),
(16, 23, 'Testing2', 'Restaurant', '14th Avenue', 'Regina', 'SK', '', 'testing2@gmail.com', '306789090', 1, NULL, '', '', 0, 0, '', '2017-11-03 04:10:09'),
(18, 25, 'Salon', 'Barber shop/Spa', 'Downtown', 'Regina', 'SK', '', 'down@town.ca', '306789090', 2, NULL, '', '', 0, 1, '', '2017-11-03 04:26:09'),
(19, 26, 'PizzaPizza', 'Restaurant', 'Golden Mile', 'Regina', 'SK', '', 'pizza@pizza.ca', '306789090', 3, NULL, '', '', 0, 0, '', '2017-11-03 23:59:43'),
(20, 45, 'Domios Pizza', 'Restaurant', 'South Albert st', 'Regina', 'SK', '', 'polo@mail.com', '3065152776', 1, NULL, '', '', 0, 0, '', '2017-11-04 11:07:17'),
(21, 43, 'Burger King', 'Restaurant', 'South Albert', 'Regina', 'SK', '', 'nono@mail.com', '2323234', 3, NULL, '', '', 0, 0, '', '2017-11-04 21:24:26'),
(22, 82, 'Mcdonalds', 'Restaurant', 'Kramer Blvd', 'Regina', 'SK', '', 'naxx2@mail.com', '3065152776', 3, NULL, '', '', 0, 0, '', '2017-11-05 01:13:19'),
(23, 84, 'Mcdonalds', 'Restaurant', 'South Albert st', 'Regina', 'SK', '', 'jacc@mail.com', '3065152776', 1, NULL, '', '', 0, 0, '', '2017-11-05 01:28:24'),
(24, 85, 'Pita Pit', 'Restaurant', 'Kramer Blvd', 'Regina', 'SK', '', 'Ina@mail.com', '3065152776', 2, NULL, '', '', 0, 0, '', '2017-11-05 01:49:17'),
(25, 86, 'EB Games', 'Entertainment', 'Cornwall Mall', 'Regina', 'SK', '', 'fifa@fifa.fifa', '3063612784', 2, NULL, '', '', 0, 0, '', '2017-11-05 01:57:49'),
(26, 87, 'ZamZams', 'Restaurant', 'Cornwall Mall', 'Regina', 'SK', '', 'zam@mail.com', '3065152776', 1, NULL, '', '', 0, 1, '', '2017-11-05 03:35:45'),
(27, 88, 'Regina Spa', 'Personal Health', 'Northgate Mall', 'Regina', 'SK', '', 'jojo@mail.com', '3065152776', 2, NULL, '', '', 0, 0, '', '2017-11-05 03:41:34'),
(28, 89, 'Home Care Services', 'Personal Health', '4211 Albert st', 'Regina', 'SK', '', 'jojox@mail.com', '3065152776', 3, NULL, '', '', 0, 0, '', '2017-11-05 04:16:22'),
(29, 90, 'Home Care Treatment Centre', 'Personal Health', '1311 Broadway avenue', 'Regina', 'SK', '', 'jojox3@mail.com', '3065152776', 3, NULL, '', '', 0, 0, '', '2017-11-05 04:18:06'),
(30, 91, 'Bowling Bar', 'Entertainment', '222 Albert St', 'Regina', 'SK', 'S4S222', 'zac@mail.com', '3060002122', 1, 'http://www.google.com', 'Bowling Bar', 'http://www.google.ca', 0, 0, '', '2017-11-14 01:41:15'),
(31, 97, '', 'Restaurant', '', 'Regina', 'SK', '', 'gin@mail.ca', '3065152776', 1, NULL, '', '', 0, 0, '', '2017-11-14 03:29:54'),
(32, 98, '', 'Restaurant', '', 'Regina', 'SK', '', 'ky@mail.com', '3065152776', 2, NULL, '', '', 0, 0, '', '2017-11-14 03:31:56'),
(33, 99, '', 'Restaurant', '', 'Regina', 'SK', '', 'marco@mail.com', '3065152776', 3, NULL, '', '', 0, 0, '', '2017-11-14 03:34:21'),
(34, 100, 'RayRay', 'Clothing/Shoe Store', '223 Broad St', 'Regina', 'SK', 'S3ER5T', 'ray@example.com', '3065152733', 1, 'http://www.google.ca', 'Ray\'s Sports Clothing and Shoes', 'http://www.google.ca', 0, 0, '', '2017-11-19 02:53:36'),
(35, 101, '', 'Restaurant', '', 'Regina', 'SK', '', 'owneremailtesting@whatever.com', '306555512', 3, NULL, '', '', 0, 0, '', '2017-11-19 03:30:38'),
(36, 102, '', 'Personal Health', '', 'Regina', 'SK', '', 'nana@mail.com', '3065152733', 3, NULL, '', '', 0, 0, '', '2017-11-19 05:33:06'),
(37, 103, '', 'Restaurant', '', 'Regina', 'SK', '', 'xx@gmail.com', '3065559090', 2, NULL, '', '', 0, 0, '', '2017-11-20 09:40:58'),
(38, 104, 'Boston Pizza', 'Restaurant', '4657 Rae St', 'Regina', 'SK', 'S4S 6K6', 'boston@mail.com', '3065152711', 1, 'https://bostonpizza.com', 'Boston Pizza', 'https://bostonpizza.com', 0, 1, '', '2017-11-21 20:50:30'),
(39, 105, 'Merch', 'Department Store', '222 Albert St', 'Regina', 'SK', 'S4S6W1', 'ky123@mail.com', '3065152776', 3, 'http://www.google.com', 'Merchs', 'http://www.example.com', 0, 0, '', '2017-11-25 23:03:52'),
(40, 106, '', 'Grocery Store', '', 'Regina', 'SK', '', 'cynicxs@gmail.com', '3065152776', 3, NULL, '', '', 0, 0, '', '2017-11-25 23:26:28'),
(41, 107, 'test', 'Restaurant', '00010', 'Nairobi', 'OA', '40700', 'loneleaner@gmail.com', '0772477726', 3, 'http://ambtionistkenya.com', 'doo', 'http://ambtionistkenya.com', 0, 0, '', '2017-12-11 15:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `BusinessOwner`
--

CREATE TABLE `BusinessOwner` (
  `bid` int(11) NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ein` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `BusinessOwner`
--

INSERT INTO `BusinessOwner` (`bid`, `owner`, `ein`, `city`, `province`, `phone`, `email`, `password`, `confirmed`, `date_added`, `pic`) VALUES
(1, 'Hussam', '123456789', 'Regina', 'SK', '3065516943', 'xx@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-28 23:23:04', ''),
(2, 'Ali', '987654321', 'Regina', 'SK', '3063512043', 'xx@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-28 23:23:04', ''),
(3, 'Ahmad', '135792468', 'Regina', 'SK', '3065517890', 'xx@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-28 23:24:40', ''),
(4, 'John Doe', '246813579', 'Regina', 'SK', '3061231234', 'john@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-28 23:24:40', ''),
(5, 'Jane Doe', '131313123', 'Regina', 'SK', '3067891232', 'jane@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-28 23:26:21', ''),
(6, 'Alex', '123123123', 'Regina', 'SK', '3965516944', 'alex@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-28 23:26:21', ''),
(7, 'Jax', '1231231231', 'Regina', 'SK', '3065152776', 'jax@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-30 03:44:39', ''),
(8, 'Ahmad Alghoson', '31222222', 'Regina', 'SK', '3065152776', 'xx@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-10-30 04:16:02', ''),
(20, 'Hussam Alshudukhi', '123123123', 'Regina', 'SK', '3065516943', 'xx@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-02 02:27:22', ''),
(23, 'Jack', '12312312', 'Regina', 'OA', '3065152776', 'jjjj@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-03 04:10:09', ''),
(25, 'Hussam Alshudukhi', '123123123', 'Regin', 'OA', '3065546789', 'xx@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-03 04:26:09', ''),
(26, 'Sara', '12312123', 'Regina', 'SK', '3065152776', 'sara@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-03 23:59:43', ''),
(29, 'Toots', '2233', 'Regina', 'OA', '3065152776', 'toots@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-04 01:29:34', ''),
(42, 'Koda', '234234234', 'Regina', 'OA', '3065152776', 'kod@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-04 07:44:10', ''),
(43, 'ISM', '23423423', 'Regina', 'SK', '3065152776', 'ism@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-04 07:45:33', ''),
(44, 'Jack', '3123123', 'Regina', 'OA', '3065152776', 'jacks@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-04 07:48:07', ''),
(45, 'newguy', '2342423423', 'Regina', 'OA', '3065152776', 'guy@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-04 07:59:25', ''),
(46, 'tttt', '23423432', 'Regina', 'OA', '3065152776', 'ttttt@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-04 08:02:22', ''),
(68, 'Max222', '00000000', 'Regina', 'OA', '3065152776', 'dmax112@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-04 11:27:53', ''),
(74, 'wewe', '12312312', 'Regina', 'SK', '3065152776', 'wewe@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-04 21:17:37', ''),
(75, 'wewe22', '12312312', 'Regina', 'SK', '3065152776', 'wewe22@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-04 21:19:00', ''),
(80, 'Neo', '23423432', 'Regina', 'OA', '3065152776', 'neo@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 00:45:56', ''),
(81, 'Naxx', '12312312', 'Regina', 'OA', '3065152776', 'naxx@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 01:11:27', ''),
(82, 'Naxx2', '12312312', 'Regina', 'OA', '3065152776', 'naxx2@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 01:13:19', ''),
(84, 'jaccc', '12312312', 'Regina', 'OA', '3065152776', 'jacc@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 01:28:24', ''),
(85, 'xxxx', '23423423', 'Regina', 'SK', '3065152776', 'Ina@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 01:49:17', ''),
(86, 'Fifa18', '123456789123', 'Regina', 'SK', '3063612784', 'fifa@fifa.fifa', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-05 01:57:49', ''),
(87, 'ahmad2', '11111111', 'Regina', 'OA', '3065152776', 'xx@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 03:35:45', ''),
(88, 'jojo', '2222222', 'Regina', 'OA', '3065152776', 'jojo@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 03:41:34', ''),
(89, 'jojo2', '2222222', 'Regina', 'OA', '3065152776', 'jojox@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 04:16:22', ''),
(90, 'jojo3', '423212', 'Regina', 'SK', '3065152776', 'jojox3@mail.com', '4297f44b13955235245b2497399d7a93', 0, '2017-11-05 04:18:06', ''),
(91, 'Zac', '3123122', 'Regina', 'SK', '3060002122', 'zac@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-11-14 01:41:15', ''),
(97, 'Gin', '1230000', 'Regina', 'SK', '3065152776', 'gin@mail.ca', '4297f44b13955235245b2497399d7a93', 0, '2017-11-14 03:29:54', ''),
(98, 'Kyle', '52523523', 'Regina', 'SK', '3065152776', 'ky@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-11-14 03:31:56', ''),
(99, 'Marco', '402020932', 'Regina', 'SK', '3065152776', 'marco@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-14 03:34:21', ''),
(100, 'Ray', '12412423', 'Regina', 'SK', '3065152733', 'ray@example.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-11-19 02:53:36', ''),
(101, 'owner name', '123123123', 'Regina', 'SK', '306555512', 'owneremailtesting@whatever.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-19 03:30:38', ''),
(102, 'Nana', '35454456456', 'Regina', 'SK', '3065152733', 'nana@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-19 05:33:05', ''),
(103, 'Hussam Alshudukhi', '1234567890', 'Regina', 'SK', '3065559090', 'alshuduki@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-20 09:40:58', ''),
(104, 'BostonManager', '2312312312', 'Regina', 'SK', '3065152711', 'boston@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, '2017-11-21 20:50:29', ''),
(105, 'kyle', '23423432', 'Regina', 'SK', '3065152776', 'ky123@mail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, '2017-11-25 23:03:52', ''),
(106, 'Cyn', '2222222', 'Regina', 'SK', '3065152776', 'cynicxs@gmail.com', '4297f44b13955235245b2497399d7a93', 1, '2017-11-25 23:26:28', ''),
(107, 'test', '124542388348959', 'Nairobi', 'OA', '0772477726 ', 'loneleaner@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1, '2017-12-11 15:39:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `Days`
--

CREATE TABLE `Days` (
  `did` int(11) NOT NULL,
  `d_name` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Days`
--

INSERT INTO `Days` (`did`, `d_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `Deals`
--

CREATE TABLE `Deals` (
  `did` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `deal_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `deal_info` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `promo_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `expiry` date NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Deals`
--

INSERT INTO `Deals` (`did`, `lid`, `deal_name`, `deal_info`, `discount`, `promo_code`, `expiry`, `date_added`) VALUES
(0, 7, 'Saturday Ribs', 'Get Extra Ribs for Free', '100%', 'BISENDA50', '2017-11-25', '2017-11-12 04:30:48'),
(6, 7, 'Friday Wings', 'Get Extra Wings', '50%', 'BISWING22', '2017-11-30', '2017-11-12 04:47:18'),
(7, 7, 'Everyday side', 'Free side', '100% OFF YOUR PURCHASE', 'BOH232', '2017-11-12', '2017-11-12 08:43:09'),
(8, 7, 'Sunday free drink', 'Get Free drink + refills', '100% ', 'BISDRINKK12', '2017-11-11', '2017-11-12 08:50:23'),
(9, 4, 'Haircut Deal', 'First Haircut for half off', '50%', 'BISRAGG50', '2017-11-22', '2017-11-12 10:43:13'),
(10, 18, 'Monday Deal', 'First time customers get haircut for free', '100%', 'BISHAIR100', '2017-11-23', '2017-11-12 23:20:12'),
(12, 21, 'New Year 2018 celebration special offer ', 'Get whatever you want, whenever you want, and however you want bla bla', '55%', 'NEWYEAR2018', '2017-11-30', '2017-11-19 02:56:15'),
(13, 1, 'Cyber Wings', 'All you can wings', '30%', '', '0000-00-00', '2017-11-27 23:52:00'),
(14, 7, 'Deal', 'Deal description', '30%', 'Regina', '0000-00-00', '2017-11-28 19:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gid`, `lid`, `image`, `date_added`) VALUES
(16, 7, 'f5289b81865c7c5fd6677bd6e240a586.jpg', '2017-11-17 04:03:37'),
(17, 7, '22e5e603da2225b051141edb926fe08e.jpeg', '2017-11-17 04:03:42'),
(18, 7, '471038f3680655f8270d362c7fc84dd9.jpg', '2017-11-17 04:03:49'),
(19, 7, 'dbfe39f1460301a52b7529c27fed015e.jpg', '2017-11-17 04:04:02'),
(20, 7, '384b8627116417b3589a6313adf72bbc.jpg', '2017-11-17 04:04:07'),
(25, 38, '8ccb70ac9ba7f7c065f2fce1d10a57f1.png', '2017-11-21 20:57:52'),
(26, 38, '7405be54a0f563cd5f0baecde27f8406.jpg', '2017-11-21 20:58:04'),
(27, 38, 'd3c2e27f25aedcd1722c28f906b5ce57.jpg', '2017-11-21 20:58:21'),
(28, 38, '00d5b3f27acb5c5e6aa156bf666c2749.jpg', '2017-11-21 20:58:41'),
(29, 38, 'ea9c32bcf5256dea1e64e8b7b00e6ddd.jpg', '2017-11-21 20:59:09'),
(30, 39, 'cf71ae3a866ee2fe53ed28fd38f0752a.jpg', '2017-11-25 23:10:03'),
(32, 1, 'd1366acebaf59801adb5a5329ab365bf.jpg', '2017-11-28 00:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `mid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`mid`, `lid`, `uid`, `message`, `url`, `date_received`) VALUES
(1, 7, 7, 'Hello World from MetroX!', '', '2017-11-13 01:26:49'),
(2, 7, 3, 'Hello World from MetroX!', '', '2017-11-13 01:26:49'),
(3, 7, 6, 'Hello World from MetroX!', '', '2017-11-13 01:26:49'),
(4, 7, 2, 'Hello World from MetroX!', '', '2017-11-13 01:26:49'),
(5, 7, 7, 'Hello World from MX', '', '2017-11-13 01:26:49'),
(6, 7, 3, 'Hello World from MX', '', '2017-11-13 01:26:49'),
(7, 7, 6, 'Hello World from MX', '', '2017-11-13 01:26:49'),
(8, 7, 2, 'Hello World from MX', '', '2017-11-13 01:26:49'),
(9, 7, 7, '%20 OFF Coupon: 123123', '', '2017-11-13 01:26:49'),
(10, 7, 3, '%20 OFF Coupon: 123123', '', '2017-11-13 01:26:49'),
(11, 7, 6, '%20 OFF Coupon: 123123', '', '2017-11-13 01:26:49'),
(12, 7, 2, '%20 OFF Coupon: 123123', '', '2017-11-13 01:26:49'),
(83, 4, 3, 'Hello from Salon 2', '', '2017-11-13 01:26:49'),
(84, 4, 5, 'Hello from Salon 2', '', '2017-11-13 01:26:49'),
(85, 4, 3, 'Hello from Salon 3', '', '2017-11-13 01:26:49'),
(86, 4, 5, 'Hello from Salon 3', '', '2017-11-13 01:26:49'),
(432, 7, 7, 'We are updating our menu soon', '', '2017-11-18 06:47:30'),
(433, 7, 2, 'We are updating our menu soon', '', '2017-11-18 06:47:30'),
(434, 7, 3, 'We are updating our menu soon', '', '2017-11-18 06:47:30'),
(435, 7, 5, 'We are updating our menu soon', '', '2017-11-18 06:47:30'),
(436, 7, 6, 'We are updating our menu soon', '', '2017-11-18 06:47:30'),
(437, 7, 8, 'We are updating our menu soon', '', '2017-11-18 06:47:30'),
(438, 7, 7, 'We are sorry', '', '2017-11-18 06:53:35'),
(439, 7, 2, 'We are sorry', '', '2017-11-18 06:53:35'),
(440, 7, 3, 'We are sorry', '', '2017-11-18 06:53:35'),
(441, 7, 5, 'We are sorry', '', '2017-11-18 06:53:35'),
(442, 7, 6, 'We are sorry', '', '2017-11-18 06:53:35'),
(443, 7, 8, 'We are sorry', '', '2017-11-18 06:53:35'),
(444, 7, 7, 'We are sorry', '', '2017-11-18 06:55:05'),
(445, 7, 2, 'We are sorry', '', '2017-11-18 06:55:05'),
(446, 7, 3, 'We are sorry', '', '2017-11-18 06:55:05'),
(447, 7, 5, 'We are sorry', '', '2017-11-18 06:55:05'),
(448, 7, 6, 'We are sorry', '', '2017-11-18 06:55:05'),
(449, 7, 8, 'We are sorry', '', '2017-11-18 06:55:05'),
(450, 7, 7, 'We are updating', '', '2017-11-18 22:23:58'),
(451, 7, 2, 'We are updating', '', '2017-11-18 22:23:58'),
(452, 7, 3, 'We are updating', '', '2017-11-18 22:23:58'),
(453, 7, 5, 'We are updating', '', '2017-11-18 22:23:58'),
(454, 7, 6, 'We are updating', '', '2017-11-18 22:23:58'),
(455, 7, 8, 'We are updating', '', '2017-11-18 22:23:58'),
(456, 7, 7, 'Hola', '', '2017-11-19 01:55:51'),
(457, 7, 2, 'Hola', '', '2017-11-19 01:55:51'),
(458, 7, 3, 'Hola', '', '2017-11-19 01:55:51'),
(459, 7, 5, 'Hola', '', '2017-11-19 01:55:51'),
(460, 7, 6, 'Hola', '', '2017-11-19 01:55:51'),
(461, 7, 8, 'Hola', '', '2017-11-19 01:55:51'),
(462, 7, 7, 'We are updating our menu soon', '', '2017-11-19 02:00:48'),
(463, 7, 2, 'We are updating our menu soon', '', '2017-11-19 02:00:48'),
(464, 7, 3, 'We are updating our menu soon', '', '2017-11-19 02:00:48'),
(465, 7, 5, 'We are updating our menu soon', '', '2017-11-19 02:00:48'),
(466, 7, 6, 'We are updating our menu soon', '', '2017-11-19 02:00:48'),
(467, 7, 8, 'We are updating our menu soon', '', '2017-11-19 02:00:48'),
(468, 7, 1, 'We are updating our menu soon', '', '2017-11-19 02:00:48'),
(469, 7, 7, 'Hello World from MX', '', '2017-11-19 02:04:54'),
(470, 7, 2, 'Hello World from MX', '', '2017-11-19 02:04:54'),
(471, 7, 3, 'Hello World from MX', '', '2017-11-19 02:04:54'),
(472, 7, 5, 'Hello World from MX', '', '2017-11-19 02:04:54'),
(473, 7, 6, 'Hello World from MX', '', '2017-11-19 02:04:54'),
(474, 7, 8, 'Hello World from MX', '', '2017-11-19 02:04:54'),
(475, 7, 1, 'Hello World from MX', '', '2017-11-19 02:04:54'),
(476, 7, 7, 'blablablabla', '', '2017-11-19 02:21:51'),
(477, 7, 2, 'blablablabla', '', '2017-11-19 02:21:51'),
(478, 7, 3, 'blablablabla', '', '2017-11-19 02:21:52'),
(479, 7, 5, 'blablablabla', '', '2017-11-19 02:21:52'),
(480, 7, 6, 'blablablabla', '', '2017-11-19 02:21:52'),
(481, 7, 8, 'blablablabla', '', '2017-11-19 02:21:52'),
(482, 7, 1, 'blablablabla', '', '2017-11-19 02:21:52'),
(483, 7, 2, 'Hola', '', '2017-11-28 00:16:39'),
(484, 7, 3, 'Hola', '', '2017-11-28 00:16:39'),
(485, 7, 5, 'Hola', '', '2017-11-28 00:16:39'),
(486, 7, 6, 'Hola', '', '2017-11-28 00:16:39'),
(487, 7, 2, 'We are updating our menu soon', '', '2017-11-28 04:18:47'),
(488, 7, 3, 'We are updating our menu soon', '', '2017-11-28 04:18:47'),
(489, 7, 5, 'We are updating our menu soon', '', '2017-11-28 04:18:47'),
(490, 7, 6, 'We are updating our menu soon', '', '2017-11-28 04:18:47'),
(491, 7, 2, 'Cyber Monday Deals', '', '2017-11-28 19:22:35'),
(492, 7, 3, 'Cyber Monday Deals', '', '2017-11-28 19:22:35'),
(493, 7, 5, 'Cyber Monday Deals', '', '2017-11-28 19:22:35'),
(494, 7, 6, 'Cyber Monday Deals', '', '2017-11-28 19:22:35'),
(495, 7, 1, 'Cyber Monday Deals', '', '2017-11-28 19:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `ReserveRestaurantTable`
--

CREATE TABLE `ReserveRestaurantTable` (
  `reserve_table_id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `quantity` int(3) NOT NULL,
  `date_reserved` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time_reserved` text COLLATE utf8_unicode_ci NOT NULL,
  `cancelled` int(1) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ReserveRestaurantTable`
--

INSERT INTO `ReserveRestaurantTable` (`reserve_table_id`, `rid`, `lid`, `uid`, `quantity`, `date_reserved`, `time_reserved`, `cancelled`, `date_added`) VALUES
(5, 56, 18, 9, 6, '', '20:30', 1, '2017-11-13 10:36:04'),
(6, 54, 1, 6, 1, '2017-11-22', '18:00', 0, '2017-11-18 03:20:42'),
(26, 55, 1, 7, 2, '2017-11-25', '02:00', 1, '2017-11-19 06:08:40'),
(27, 53, 1, 1, 1, '2017-11-19', '04:00', 3, '2017-11-19 06:46:53'),
(28, 54, 1, 1, 1, '2017-11-19', '06:00', 0, '2017-11-19 06:46:53'),
(29, 55, 1, 1, 2, '2017-11-19', '07:00', 3, '2017-11-19 06:46:53'),
(30, 53, 1, 1, 1, '2017-11-19', '03:00', 0, '2017-11-19 06:59:12'),
(31, 54, 1, 1, 2, '2017-11-19', '03:00', 0, '2017-11-19 06:59:12'),
(32, 53, 1, 1, 1, '2017-11-21', '12:00', 3, '2017-11-19 07:28:40'),
(33, 54, 1, 1, 2, '2017-11-21', '12:00', 0, '2017-11-19 07:28:40'),
(34, 55, 1, 1, 3, '2017-11-21', '12:00', 0, '2017-11-19 07:28:40'),
(35, 53, 1, 1, 1, '2017-11-21', '11:00', 0, '2017-11-19 07:31:32'),
(36, 54, 1, 1, 1, '2017-11-21', '11:00', 0, '2017-11-19 07:31:33'),
(37, 55, 1, 1, 1, '2017-11-21', '11:00', 0, '2017-11-19 07:31:33'),
(38, 53, 1, 1, 1, '2017-11-21', '12:00', 0, '2017-11-19 07:33:07'),
(39, 54, 1, 1, 1, '2017-11-21', '12:00', 0, '2017-11-19 07:33:07'),
(40, 55, 1, 1, 1, '2017-11-21', '12:00', 0, '2017-11-19 07:33:07'),
(41, 54, 1, 7, 1, '2017-11-21', '02:00', 3, '2017-11-20 23:02:53'),
(42, 59, 7, 7, 2, '2017-11-23', '12:00', 0, '2017-11-21 03:49:59'),
(43, 53, 1, 1, 1, '2017-11-29', '02:00', 1, '2017-11-28 00:17:36'),
(44, 57, 7, 8, 2, '2017-11-29', '08:00', 1, '2017-11-28 04:04:39'),
(45, 53, 1, 13, 1, '2017-12-03', '03:00', 1, '2017-11-28 19:32:19'),
(46, 54, 1, 13, 1, '2017-12-03', '03:00', 0, '2017-11-28 19:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `RestaurantTables`
--

CREATE TABLE `RestaurantTables` (
  `rid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `table_type` int(2) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RestaurantTables`
--

INSERT INTO `RestaurantTables` (`rid`, `lid`, `table_type`, `amount`, `date_added`) VALUES
(53, 1, 1, 1, '2017-11-11 04:39:34'),
(54, 1, 2, 4, '2017-11-11 04:39:34'),
(55, 1, 3, 4, '2017-11-11 04:39:34'),
(56, 18, 4, 9, '2017-11-11 04:39:34'),
(57, 7, 1, 3, '2017-11-21 00:35:44'),
(58, 7, 2, 3, '2017-11-21 00:35:44'),
(59, 7, 3, 3, '2017-11-21 00:35:44'),
(60, 7, 4, 4, '2017-11-21 00:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `Subscriptions`
--

CREATE TABLE `Subscriptions` (
  `sid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Subscriptions`
--

INSERT INTO `Subscriptions` (`sid`, `lid`, `uid`, `date_added`) VALUES
(16, 7, 2, '2017-11-10 03:11:27'),
(26, 7, 3, '2017-11-13 03:34:51'),
(31, 7, 5, '2017-11-13 04:08:49'),
(32, 25, 5, '2017-11-13 04:08:51'),
(33, 28, 5, '2017-11-13 04:08:53'),
(34, 29, 5, '2017-11-13 04:08:56'),
(35, 4, 7, '2017-11-13 04:48:58'),
(36, 18, 7, '2017-11-13 04:49:18'),
(37, 1, 3, '2017-11-13 05:32:49'),
(38, 4, 3, '2017-11-13 05:32:52'),
(39, 5, 3, '2017-11-13 05:32:56'),
(40, 18, 3, '2017-11-13 05:33:36'),
(41, 5, 3, '2017-11-13 05:40:42'),
(44, 7, 6, '2017-11-18 02:50:37'),
(47, 1, 1, '2017-11-20 23:31:07'),
(50, 7, 1, '2017-11-28 04:23:23'),
(51, 1, 13, '2017-11-28 19:27:21'),
(52, 1, 13, '2017-11-28 19:27:21'),
(54, 29, 14, '2017-11-29 02:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `Tables`
--

CREATE TABLE `Tables` (
  `tid` int(11) NOT NULL,
  `t_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Tables`
--

INSERT INTO `Tables` (`tid`, `t_name`) VALUES
(1, '4 Seater'),
(2, '2 Seater'),
(3, 'Booth'),
(4, 'Bar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `first` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `pic` text COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `UserNotes`
--

CREATE TABLE `UserNotes` (
  `nid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserNotes`
--

INSERT INTO `UserNotes` (`nid`, `lid`, `uid`, `note`, `date_added`) VALUES
(1, 1, 7, 'Only cash accepted', '2017-11-01 00:00:00'),
(5, 2, 4, 'Test for other user', '2017-11-03 03:04:45'),
(17, 4, 7, 'deleeeete this', '2017-11-04 23:20:11'),
(19, 6, 6, 'test for other user 2', '2017-11-04 23:20:11'),
(21, 7, 7, 'test uid7 lid7', '2017-11-08 03:40:15'),
(22, 7, 7, 'Note #2 for metroids', '2017-11-08 04:26:38'),
(23, 7, 7, 'note #3', '2017-11-08 04:32:25'),
(25, 1, 7, 'I did NOT like the wings', '2017-11-09 00:54:34'),
(26, 7, 7, 'test', '2017-11-09 00:56:01'),
(31, 1, 1, 'only cash here', '2017-11-28 00:09:01'),
(32, 1, 13, 'only cash here ', '2017-11-28 19:27:34'),
(33, 29, 14, 'Hi', '2017-11-29 02:11:56'),
(34, 5, 14, 'hi', '2017-11-29 02:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `UserReviews`
--

CREATE TABLE `UserReviews` (
  `rid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(1) NOT NULL,
  `status` int(11) DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserReviews`
--

INSERT INTO `UserReviews` (`rid`, `lid`, `uid`, `comment`, `rate`, `status`, `date_added`) VALUES
(4, 1, 2, 'Great food. Great service', 4, 1, '2017-10-29 03:40:31'),
(5, 1, 3, 'Try honey with tea I really dig it', 4, 0, '2017-10-29 03:41:32'),
(6, 1, 4, 'Go wings or go drinks ', 5, 0, '2017-10-29 03:41:32'),
(10, 1, 7, 'IT IS OKAY.', 3, 1, '2017-11-04 01:05:00'),
(11, 5, 7, 'Cool', 3, 0, '2017-11-04 23:27:54'),
(12, 3, 7, 'i like itttt', 4, 1, '2017-11-04 23:27:54'),
(13, 7, 8, 'I like this place', 4, 1, '2017-11-19 22:47:59'),
(14, 7, 8, 'I love it!', 5, 1, '2017-11-19 22:51:13'),
(15, 1, 7, 'Yummy ', 4, 0, '2017-11-20 01:43:16'),
(16, 6, 1, 'more comments', 5, 0, '2017-11-20 01:50:00'),
(18, 1, 7, 'me like it ', 5, 0, '2017-11-21 00:12:21'),
(19, 1, 8, 'Really good pasta', 5, 0, '2017-11-27 05:01:27'),
(20, 1, 13, 'good', 4, 1, '2017-11-28 19:28:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `BusinessHours`
--
ALTER TABLE `BusinessHours`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `did` (`did`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `BusinessListing`
--
ALTER TABLE `BusinessListing`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `BusinessOwner`
--
ALTER TABLE `BusinessOwner`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `Days`
--
ALTER TABLE `Days`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `Deals`
--
ALTER TABLE `Deals`
  ADD PRIMARY KEY (`did`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `ReserveRestaurantTable`
--
ALTER TABLE `ReserveRestaurantTable`
  ADD PRIMARY KEY (`reserve_table_id`),
  ADD KEY `rid` (`rid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `RestaurantTables`
--
ALTER TABLE `RestaurantTables`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `table_type` (`table_type`);

--
-- Indexes for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `Tables`
--
ALTER TABLE `Tables`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `UserNotes`
--
ALTER TABLE `UserNotes`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `UserReviews`
--
ALTER TABLE `UserReviews`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `BusinessHours`
--
ALTER TABLE `BusinessHours`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `BusinessListing`
--
ALTER TABLE `BusinessListing`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `BusinessOwner`
--
ALTER TABLE `BusinessOwner`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `Days`
--
ALTER TABLE `Days`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Deals`
--
ALTER TABLE `Deals`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT for table `ReserveRestaurantTable`
--
ALTER TABLE `ReserveRestaurantTable`
  MODIFY `reserve_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `RestaurantTables`
--
ALTER TABLE `RestaurantTables`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `Tables`
--
ALTER TABLE `Tables`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `UserNotes`
--
ALTER TABLE `UserNotes`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `UserReviews`
--
ALTER TABLE `UserReviews`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BusinessHours`
--
ALTER TABLE `BusinessHours`
  ADD CONSTRAINT `BusinessHours_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BusinessHours_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Days` (`did`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `BusinessListing`
--
ALTER TABLE `BusinessListing`
  ADD CONSTRAINT `BusinessListing_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `BusinessOwner` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Deals`
--
ALTER TABLE `Deals`
  ADD CONSTRAINT `Deals_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `listingID` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `lid` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uid` FOREIGN KEY (`lid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ReserveRestaurantTable`
--
ALTER TABLE `ReserveRestaurantTable`
  ADD CONSTRAINT `ReserveRestaurantTable_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `RestaurantTables` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ReserveRestaurantTable_ibfk_2` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ReserveRestaurantTable_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `RestaurantTables`
--
ALTER TABLE `RestaurantTables`
  ADD CONSTRAINT `RestaurantTables_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RestaurantTables_ibfk_2` FOREIGN KEY (`table_type`) REFERENCES `Tables` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  ADD CONSTRAINT `Subscriptions_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Subscriptions_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `UserNotes`
--
ALTER TABLE `UserNotes`
  ADD CONSTRAINT `UserNotes_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserNotes_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `UserReviews`
--
ALTER TABLE `UserReviews`
  ADD CONSTRAINT `UserReviews_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `BusinessListing` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserReviews_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

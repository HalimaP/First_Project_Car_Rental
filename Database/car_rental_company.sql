-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 11:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_tytle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `car_brand_id` int(3) NOT NULL,
  `car_overview` longtext COLLATE utf8_unicode_ci NOT NULL,
  `daily_price` float NOT NULL,
  `fuel_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `model_year` int(6) NOT NULL,
  `seating_capasity` int(11) NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `air_conditioner` int(11) NOT NULL,
  `driver_airbag` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `car_status_id` int(3) NOT NULL,
  `rating` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_tytle`, `car_brand_id`, `car_overview`, `daily_price`, `fuel_type`, `model_year`, `seating_capasity`, `image`, `air_conditioner`, `driver_airbag`, `reg_date`, `updation_date`, `car_status_id`, `rating`) VALUES
(3, 'Mercedes', 0, 'This car is the best for family tour', 50, '', 0, 4, '../car_image/image_2019-08-28-01-28-12_5d65bc8cb53ee.jpg', 0, 0, '2019-08-08 17:03:26', '2019-08-27 23:28:12', 2, 0),
(4, 'CAMPER ', 0, 'This car is the best for family tour', 100, '', 0, 4, '../car_image/image_2019-08-28-01-52-06_5d65c2261738b.jpg', 0, 0, '2019-08-08 17:28:32', '2019-08-28 00:12:30', 2, 0),
(5, 'BMW', 0, 'This car is the best for family tour', 50, '', 0, 4, '../car_image/image_2019-09-10-00-24-44_5d76d12cf2e7d.jpg', 0, 0, '2019-08-25 19:59:42', '2019-09-09 22:24:44', 2, 0),
(6, 'Skoda Rapid', 0, '  It is available with the Manual and Automatic transmission.', 50, '', 0, 4, '../car_image/image_2019-09-07-17-35-44_5d73ce504a75c.jpg', 0, 0, '2019-08-25 20:00:49', '2019-09-07 15:35:44', 2, 0),
(7, 'Škoda Fabia', 0, 'This car is the best for ...', 50, '', 0, 4, '../car_image/image_2019-08-28-01-36-43_5d65be8b162a3.jpg', 0, 0, '2019-08-25 20:01:53', '2019-08-27 23:36:43', 0, 0),
(8, 'Renault Laguna', 0, 'This car is most comfortable..', 50, '', 0, 4, '../car_image/image_2019-08-28-01-45-45_5d65c0a943930.jpg', 0, 0, '2019-08-26 11:38:36', '2019-08-27 23:45:45', 2, 0),
(9, 'Kombi Renault', 0, 'The best multi-person travel car.', 100, '', 0, 9, '../car_image/image_2019-08-28-01-49-40_5d65c194459a3.jpg', 0, 0, '2019-08-26 11:50:37', '2019-08-28 00:11:58', 2, 0),
(10, 'Škoda Octavia', 0, 'Ovaj automobil namijenjen je za ...', 50, '', 0, 4, '../car_image/image_2019-08-28-01-42-38_5d65bfee4e8fb.jpg', 0, 0, '2019-08-26 21:44:13', '2019-08-27 23:42:38', 0, 0),
(11, 'new model of car', 0, 'This is a new car...', 50, '', 0, 4, '../car_image/image_2019-08-28-01-22-57_5d65bb515cb40.jpg', 0, 0, '2019-08-26 22:09:26', '2019-09-05 09:08:16', 2, 0),
(12, 'BMW', 0, 'This car is the best for ...', 50, '', 0, 4, '../car_image/image_2019-08-28-01-33-46_5d65bdda126c6.jpg', 0, 0, '2019-08-27 23:02:51', '2019-08-27 23:33:46', 0, 0),
(13, 'Audi', 0, 'This is a new car', 50, '', 0, 4, '../car_image/image_2019-09-10-00-24-33_5d76d1217ee39.jpg', 0, 0, '2019-08-30 11:42:11', '2019-09-09 22:24:33', 2, 0),
(14, 'Mercedes', 0, 'This car is the best for ...', 50, '', 0, 4, '../car_image/image_2019-09-10-00-25-11_5d76d147b4124.jpg', 0, 0, '2019-09-05 11:11:29', '2019-09-09 22:25:11', 0, 0),
(15, 'BMW', 0, 'This car is the best for ...', 50, '', 0, 4, '../car_image/image_2019-09-10-00-24-59_5d76d13bd6598.jpg', 0, 0, '2019-09-09 21:29:54', '2019-09-09 22:24:59', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_empleyee`
--

CREATE TABLE `car_empleyee` (
  `car_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `res_date` date NOT NULL,
  `r_hr` int(11) NOT NULL,
  `r_ampm` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `car_id`, `user_id`, `message`, `status`, `res_date`, `r_hr`, `r_ampm`) VALUES
(3, 4, 16, 'family', 0, '0000-00-00', 0, '0'),
(15, 3, 24, 'ffffffff', 0, '2019-08-29', 1, 'AM'),
(24, 5, 25, 'inasa', 0, '2019-08-25', 8, 'AM'),
(25, 11, 25, 'kkkkjjhhhhhh', 0, '2019-08-31', 1, 'AM'),
(29, 4, 22, 'KKKSSSDDDDDDD', 0, '2019-11-28', 1, 'AM'),
(30, 13, 19, 'Hello', 0, '2019-09-30', 11, 'PM'),
(31, 9, 27, 'message', 0, '2019-09-28', 1, 'AM'),
(32, 5, 22, 'Message', 0, '2019-09-29', 1, 'AM'),
(33, 13, 28, 'Message', 0, '2019-09-19', 12, 'AM'),
(34, 5, 22, 'MESSAGE', 0, '2019-09-30', 1, 'AM'),
(35, 15, 22, 'Message', 0, '2019-10-13', 1, 'AM'),
(36, 15, 29, 'Reservation ', 0, '2019-09-28', 1, 'AM'),
(37, 5, 22, 'HalimaHalima', 0, '2019-09-25', 1, 'AM'),
(38, 9, 30, 'I need it ...', 0, '2019-10-31', 1, 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'active'),
(2, 'deleted'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT '1',
  `user_status_id` int(11) NOT NULL DEFAULT '1',
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `adress`, `email`, `contact`, `username`, `password`, `user_type_id`, `user_status_id`, `registered`) VALUES
(16, 'Indira', 'Indi', 'Sarajevo', 'indira@indira.com', '456789432', 'indira', 'fb0bb7ca6787a56bde5c867910390544', 1, 1, '2019-09-08 11:34:11'),
(17, 'Azra', 'Dedić', 'Grad', '', '987654321', 'azra', 'a8a40cc92308c1b1838c5d777bf4fe11', 1, 2, '2019-08-20 21:52:42'),
(18, 'Asja', 'Asijac', 'Adresa', '', '7777778797979', 'asija', '0230a35cd58b464d88aaa9b4678de20e', 1, 1, '2019-08-06 14:30:18'),
(19, 'Armann', 'Potur', 'Konjic', 'arman.potur@yahoo.com', '061203288', 'arman', '66059a527018b32e4597dd27574929f6', 1, 1, '2019-09-08 11:26:02'),
(21, 'Sanela', 'Potur', 'Sarajevo', '', '111111', 'sanela', 'edd771fd5107567550e3a411e3187eca', 1, 2, '2019-08-21 10:17:17'),
(22, 'Halima', 'Potur', 'Konjic 88400 Orašje2 L3', 'halima.potur@gmail.com', '061-499-972', 'halima', '3365c419771dba259497be18b92c6c10', 1, 1, '2019-09-12 23:57:24'),
(23, 'Kerim', 'Potur', 'Sarajevo', 'kerim@kerim.com', '062 455 789', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, 1, '2019-09-12 23:59:06'),
(24, 'Ajla', 'Dedić', 'Mostar', '', '062 292 110', 'ajla', '59e86d9b7519708c8001edc5c015700f', 1, 2, '2019-09-16 21:16:31'),
(25, 'Inasa', 'Inasa', 'Konjic', '', '061-498-982', 'inasa', 'ab006a2a7ab70eebaac761bf37e81a2e', 1, 1, '2019-08-26 23:49:24'),
(26, 'Arman', 'Potur', 'Konjic', '', '061-203-287', 'arman', '66059a527018b32e4597dd27574929f6', 1, 1, '2019-08-27 16:15:31'),
(27, 'Nedim', 'Duran', 'Tuzla', 'nedim@nedim.com', '00 387 61 306 798', 'nedim', 'ac1fbc15be73fdcf2d2a36ad2bbc2c91', 1, 2, '2019-09-08 12:14:28'),
(28, 'Ajdin', 'Mehmedbašić', 'Sarajevo', '', '063-567-876', 'ajdin', 'eeae02c1fb8babc6a89f8071755cce87', 1, 1, '2019-09-09 21:31:04'),
(29, 'Sonja ', 'Zelenika', 'Mostar', '', '063-543-789', 'sonja', '84c1c5cd9db275231f5e705ae5a31750', 1, 1, '2019-09-13 00:00:30'),
(30, 'Azra', 'Pašić', 'Konjic', '', '00 387 61 306 798', 'azraa', '9fd250719005a092b414627772c18700', 1, 1, '2019-09-16 20:50:51'),
(31, 'Omar', 'Bišćević', 'Sarajevo', 'omar@omar.com', '061-498-964', 'omar', 'd4466cce49457cfea18222f5a7cd3573', 1, 2, '2019-09-16 21:12:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_empleyee`
--
ALTER TABLE `car_empleyee`
  ADD KEY `car_id` (`car_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`,`car_id`,`user_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type_id` (`user_type_id`),
  ADD KEY `user_ibfk_1` (`user_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_empleyee`
--
ALTER TABLE `car_empleyee`
  ADD CONSTRAINT `car_empleyee_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `car_empleyee_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_status_id`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

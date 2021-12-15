-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Dec 15, 2021 at 12:50 AM
-- Server version: 8.0.26
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(1, 'Emmanuel', 'Kumordji', 'imanuelizi@live.com', '$2y$10$fN1YDHoEp7Uf9eqRtzUvN.O5PTxeeXWRYdsXI83BjJmTKDwfRsbrS', '3', NULL),
(2, 'Admin', 'User', 'admin@cse340.net', '$2y$10$WFrEz51UM7Ms3uCeneKWL.RGndvbGiO9HytRgicGdapbKRTnZJepm', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int NOT NULL,
  `invId` int NOT NULL,
  `ImgName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgPrimary` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `ImgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(1, 1, 'jeep-wrangler.jpg', '/phpmotors/images/vehicles/jeep-wrangler.jpg', '2021-12-06 00:34:17', 1),
(2, 1, 'jeep-wrangler-tn.jpg', '/phpmotors/images/vehicles/jeep-wrangler-tn.jpg', '2021-12-06 00:34:17', 1),
(3, 2, 'ford-modelt.jpg', '/phpmotors/images/vehicles/ford-modelt.jpg', '2021-12-06 00:35:21', 1),
(4, 2, 'ford-modelt-tn.jpg', '/phpmotors/images/vehicles/ford-modelt-tn.jpg', '2021-12-06 00:35:21', 1),
(5, 2, 'model-t.jpg', '/phpmotors/images/vehicles/model-t.jpg', '2021-12-06 00:35:47', 0),
(6, 2, 'model-t-tn.jpg', '/phpmotors/images/vehicles/model-t-tn.jpg', '2021-12-06 00:35:47', 0),
(7, 2, 'model-T-alt.jpg', '/phpmotors/images/vehicles/model-T-alt.jpg', '2021-12-06 00:36:14', 0),
(8, 2, 'model-T-alt-tn.jpg', '/phpmotors/images/vehicles/model-T-alt-tn.jpg', '2021-12-06 00:36:14', 0),
(9, 3, 'lambo-Adve.jpg', '/phpmotors/images/vehicles/lambo-Adve.jpg', '2021-12-06 00:36:41', 1),
(10, 3, 'lambo-Adve-tn.jpg', '/phpmotors/images/vehicles/lambo-Adve-tn.jpg', '2021-12-06 00:36:41', 1),
(11, 3, 'adventador.jpg', '/phpmotors/images/vehicles/adventador.jpg', '2021-12-06 00:37:06', 0),
(12, 3, 'adventador-tn.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '2021-12-06 00:37:06', 0),
(13, 4, 'monster.jpg', '/phpmotors/images/vehicles/monster.jpg', '2021-12-06 00:37:44', 1),
(14, 4, 'monster-tn.jpg', '/phpmotors/images/vehicles/monster-tn.jpg', '2021-12-06 00:37:44', 1),
(15, 5, 'ms.jpg', '/phpmotors/images/vehicles/ms.jpg', '2021-12-06 00:38:20', 1),
(16, 5, 'ms-tn.jpg', '/phpmotors/images/vehicles/ms-tn.jpg', '2021-12-06 00:38:20', 1),
(17, 6, 'bat.jpg', '/phpmotors/images/vehicles/bat.jpg', '2021-12-06 00:38:43', 1),
(18, 6, 'bat-tn.jpg', '/phpmotors/images/vehicles/bat-tn.jpg', '2021-12-06 00:38:43', 1),
(19, 7, 'mm.jpg', '/phpmotors/images/vehicles/mm.jpg', '2021-12-06 00:39:24', 1),
(20, 7, 'mm-tn.jpg', '/phpmotors/images/vehicles/mm-tn.jpg', '2021-12-06 00:39:24', 1),
(21, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2021-12-06 00:40:05', 1),
(22, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2021-12-06 00:40:05', 1),
(23, 9, 'crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic.jpg', '2021-12-06 00:40:38', 1),
(24, 9, 'crown-vic-tn.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', '2021-12-06 00:40:38', 1),
(25, 6, 'batmobile-alt.png', '/phpmotors/images/vehicles/batmobile-alt.png', '2021-12-06 00:41:11', 0),
(26, 6, 'batmobile-alt-tn.png', '/phpmotors/images/vehicles/batmobile-alt-tn.png', '2021-12-06 00:41:11', 0),
(27, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2021-12-06 00:41:49', 1),
(28, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2021-12-06 00:41:49', 1),
(29, 10, 'chevrolet-camaro-alt.jpg', '/phpmotors/images/vehicles/chevrolet-camaro-alt.jpg', '2021-12-06 00:42:08', 0),
(30, 10, 'chevrolet-camaro-alt-tn.jpg', '/phpmotors/images/vehicles/chevrolet-camaro-alt-tn.jpg', '2021-12-06 00:42:08', 0),
(31, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2021-12-06 00:42:38', 1),
(32, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2021-12-06 00:42:38', 1),
(33, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2021-12-06 00:42:58', 1),
(34, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2021-12-06 00:42:58', 1),
(37, 14, 'fbi.jpg', '/phpmotors/images/vehicles/fbi.jpg', '2021-12-06 00:43:48', 1),
(38, 14, 'fbi-tn.jpg', '/phpmotors/images/vehicles/fbi-tn.jpg', '2021-12-06 00:43:48', 1),
(39, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2021-12-06 00:45:09', 1),
(40, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2021-12-06 00:45:09', 1),
(41, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2021-12-06 06:56:54', 1),
(42, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2021-12-06 06:56:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. It is great for everyday driving as well as off-roading whether that be on the rocks or in the mud!', '/images/jeep-wrangler.jpg', '/images/jeep-wrangler-tn.jpg', '28045', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/images/ford-modelt.jpg', '/images/ford-modelt-tn.jpg', '30000', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/images/lambo-Adve.jpg', '/images/lambo-Adve-tn.jpg', '417650', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/images/monster.jpg', '/images/monster-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/images/ms.jpg', '/images/ms-tn.jpg', '100', 1, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/images/bat.jpg', '/images/bat-tn.jpg', '65000', 1, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/images/mm.jpg', '/images/mm-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/images/fire-truck.jpg', '/images/fire-truck-tn.jpg', '50000', 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/images/crown-vic.jpg', '/images/crown-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/images/camaro.jpg', '/images/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/images/escalade.jpg', '/images/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/images/hummer.jpg', '/images/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!', '/images/aerocar.jpg', '/images/aerocar-tn.jpg', '1000000', 1, 'Red', 2),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month. ', '/images/fbi.jpg', '/images/fbi-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/images/no-image.jpg', '/images/no-image-tn.jpg', '35000', 1, 'Brown', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int NOT NULL,
  `reviewText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int NOT NULL,
  `clientId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(1, 'nice car', '2021-12-11 22:49:01', 13, 1),
(3, 'nice', '2021-12-13 07:19:52', 4, 2),
(4, 'cool', '2021-12-13 07:19:59', 4, 2),
(7, 'I really love this car', '2021-12-13 07:40:06', 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `reviews_ibfk_1` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

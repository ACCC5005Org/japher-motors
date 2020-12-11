-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 08:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japhermotorsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingId` int(11) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `datetimeIn` datetime NOT NULL,
  `datetimeOut` datetime NOT NULL,
  `bookingReference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingId`, `customerId`, `datetimeIn`, `datetimeOut`, `bookingReference`) VALUES
(1, 1, '2020-12-11 19:23:00', '2020-12-11 19:23:01', 'aa-bb-cc-dd-ee-123');

-- --------------------------------------------------------

--
-- Table structure for table `bookingservices`
--

CREATE TABLE `bookingservices` (
  `bookingServicesId` int(11) NOT NULL,
  `bookingId` int(11) DEFAULT NULL,
  `serviceId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingservices`
--

INSERT INTO `bookingservices` (`bookingServicesId`, `bookingId`, `serviceId`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bookingspareparts`
--

CREATE TABLE `bookingspareparts` (
  `bookingSparePartId` int(11) NOT NULL,
  `bookingId` int(11) DEFAULT NULL,
  `sparePartId` int(11) DEFAULT NULL,
  `usedQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `phoneNumber`, `email`, `isDeleted`) VALUES
(1, 'John Smith', '0799345213', 'john.smith@gmail.com', b'0'),
(2, 'Olivia Jacob', '0792245211', 'olivia.jacob@gmail.com', b'0'),
(3, 'Emily Wilson', '0792332210', 'emily.wilson@gmail.com', b'0'),
(4, 'Jacob Hail', '0784559902', 'jacob.hail@gmail.com', b'0'),
(5, 'Paul Evans', '0745622219', 'paul.evans@gmail.com', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `sparePartId` int(11) NOT NULL,
  `sparePartName` varchar(255) NOT NULL,
  `carType` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`sparePartId`, `sparePartName`, `carType`, `quantity`, `price`) VALUES
(1, 'Oil 1L', 'sedan', 250, 50),
(2, 'Transmission for Audi A8', 'sport', 12, 1760),
(3, 'Transmission for Volkswagen golf', 'sport', 20, 1330);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `bookingId` int(11) DEFAULT NULL,
  `isProcessed` bit(1) NOT NULL DEFAULT b'0',
  `totalServices` float NOT NULL DEFAULT 0,
  `totalSpareParts` float NOT NULL DEFAULT 0,
  `totalPrice` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `carType` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `serviceName`, `carType`, `price`) VALUES
(1, 'Oil change', 'sedan', 500),
(2, 'Transmission change', 'sport', 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `bookingservices`
--
ALTER TABLE `bookingservices`
  ADD PRIMARY KEY (`bookingServicesId`),
  ADD KEY `bookingId` (`bookingId`),
  ADD KEY `serviceId` (`serviceId`);

--
-- Indexes for table `bookingspareparts`
--
ALTER TABLE `bookingspareparts`
  ADD PRIMARY KEY (`bookingSparePartId`),
  ADD KEY `bookingId` (`bookingId`),
  ADD KEY `sparePartId` (`sparePartId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`sparePartId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `bookingId` (`bookingId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingservices`
--
ALTER TABLE `bookingservices`
  MODIFY `bookingServicesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookingspareparts`
--
ALTER TABLE `bookingspareparts`
  MODIFY `bookingSparePartId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `sparePartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`);

--
-- Constraints for table `bookingservices`
--
ALTER TABLE `bookingservices`
  ADD CONSTRAINT `bookingservices_ibfk_1` FOREIGN KEY (`bookingId`) REFERENCES `bookings` (`bookingId`),
  ADD CONSTRAINT `bookingservices_ibfk_2` FOREIGN KEY (`serviceId`) REFERENCES `services` (`serviceId`);

--
-- Constraints for table `bookingspareparts`
--
ALTER TABLE `bookingspareparts`
  ADD CONSTRAINT `bookingspareparts_ibfk_1` FOREIGN KEY (`bookingId`) REFERENCES `bookings` (`bookingId`),
  ADD CONSTRAINT `bookingspareparts_ibfk_2` FOREIGN KEY (`sparePartId`) REFERENCES `inventory` (`sparePartId`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`bookingId`) REFERENCES `bookings` (`bookingId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

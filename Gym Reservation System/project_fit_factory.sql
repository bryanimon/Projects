-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 12:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fit_factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Item_ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_ID`, `name`, `price`, `quantity`) VALUES
(1, 'Fat Burners', 20, 18),
(2, 'Weigh Protein', 20, 17);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `ID` int(11) NOT NULL,
  `Log_description` varchar(255) NOT NULL,
  `Log_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `table_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`ID`, `Log_description`, `Log_date`, `table_ID`) VALUES
(1, 'Bryan has reserved Muay Thai with the schedule 10:00 AM - 2:00PM', '2019-10-04 17:43:31', 1),
(2, 'A new item has been added to the inventory: Name - Fat Burners , quantity - 20 , price - 20.', '2019-10-04 17:52:57', 2),
(3, 'The item - Fat Burners - quantity has been updated from 20 to 18.', '2019-10-04 17:53:05', 2),
(4, 'A new item has been added to the inventory: Name - Weigh Protein , quantity - 20 , price - 20.', '2019-10-04 17:57:29', 2),
(5, 'The item - Weigh Protein - quantity has been updated from 20 to 17.', '2019-10-04 17:57:37', 2),
(6, 'John Benedict Maculada has reserved Muay Thai with the schedule 10:00 AM - 2:00PM', '2019-10-04 17:58:23', 1),
(7, '123 has reserved Muay Thai with the schedule 10:00 AM - 2:00PM', '2020-03-05 00:10:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_ID` int(11) NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `joined` date DEFAULT NULL,
  `renew_due` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_ID`, `member_name`, `contact`, `email`, `joined`, `renew_due`) VALUES
(1, 'John Maculada', '09613096169', 'johnbenedictmaculada@gmail.com', '2019-10-04', '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `Program_ID` int(11) NOT NULL,
  `Program_Name` varchar(255) DEFAULT NULL,
  `Member_Limit` int(11) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`Program_ID`, `Program_Name`, `Member_Limit`, `details`, `thumbnail`) VALUES
(1, 'Muay Thai', 20, 'Learn the technical and fundamental aspects of different styles of Muay Thai while also experiencing an intense core and body workout! Perfect for all fitness enthusiasts around the world.', '5d948e174c5075.35676829.jpg'),
(2, 'Boxing', 20, '', '5d9497c91cc819.66485246.jpg'),
(3, 'Cardio', 20, '', '5d949b3d760e16.52433077.jpg'),
(4, 'Zumba', 20, 'Move to the groove and sweat those worries away in this dance fitness sessions consisting of zumba and hiphop, handled by our professional dance instructor and director.', '5d9497f1dcf297.71233979.jpg'),
(5, 'VIP', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Contact` varchar(255) DEFAULT '',
  `Email` varchar(255) DEFAULT NULL,
  `Reserve_Code` varchar(255) DEFAULT NULL,
  `Reserve_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Program_ID` int(11) DEFAULT NULL,
  `Schedule_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ID`, `Name`, `Contact`, `Email`, `Reserve_Code`, `Reserve_Date`, `Program_ID`, `Schedule_ID`) VALUES
(1, 'Bryan', '123', 'bryan@gmail.com', '1ZVSQ', '2019-10-04 17:43:31', 1, 1),
(2, 'John Benedict Maculada', '09613096169', 'johnbenedictmaculada@gmail.com', 'W26LT', '2019-10-04 17:58:23', 1, 1),
(3, '123', '123', '123@gmail.com', 'VLP21', '2020-03-05 00:10:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `Schedule_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Trainer_ID` int(11) NOT NULL,
  `Program_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`Schedule_ID`, `Name`, `Trainer_ID`, `Program_ID`) VALUES
(1, '10:00 AM - 2:00PM', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `Trainer_ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `joined` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`Trainer_ID`, `name`, `contact`, `email`, `joined`) VALUES
(2, 'Ash', 'ash@gmail.com', '21287162', '2019-08-27 15:53:01'),
(3, 'Brock', 'brock@gmail.com', '21398812', '2019-08-30 00:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `walk_ins`
--

CREATE TABLE `walk_ins` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `logged_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walk_ins`
--

INSERT INTO `walk_ins` (`ID`, `name`, `contact`, `logged_date`) VALUES
(1, 'Colleen', '09773987654', '2019-10-04 17:56:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_ID`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`Program_ID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Program_ID` (`Program_ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`Schedule_ID`),
  ADD KEY `Program_ID` (`Program_ID`),
  ADD KEY `Trainer_ID` (`Trainer_ID`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`Trainer_ID`);

--
-- Indexes for table `walk_ins`
--
ALTER TABLE `walk_ins`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `Program_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `Trainer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `walk_ins`
--
ALTER TABLE `walk_ins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`Schedule_ID`) REFERENCES `schedules` (`Schedule_ID`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `Trainer_ID` FOREIGN KEY (`Trainer_ID`) REFERENCES `trainers` (`Trainer_ID`),
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

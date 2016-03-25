-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2016 at 05:33 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `familyhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '7', NULL, 'N;'),
('Doctor', '8', NULL, 'N;'),
('Doctor', '9', NULL, 'N;'),
('Paciente', '10', NULL, 'N;'),
('Paciente', '11', NULL, 'N;'),
('Paciente', '12', NULL, 'N;'),
('Paciente', '13', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, '', NULL, 'N;'),
('Doctor', 2, '', NULL, 'N;'),
('Paciente', 2, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `diagnostic` varchar(2000) DEFAULT NULL,
  `treatment` varchar(2000) DEFAULT NULL,
  `appointmentdate` datetime DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0',
  `patientuserid` int(11) NOT NULL,
  `doctoruserid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `diagnostic`, `treatment`, `appointmentdate`, `completed`, `patientuserid`, `doctoruserid`) VALUES
(40, '<p><span style="text-decoration: underline;"><strong>asdasdasdasd</strong></span></p>', '<p>asdasdasdasdasd</p>', '2016-03-25 08:00:00', 1, 10, 8),
(41, NULL, NULL, '2016-03-25 08:00:00', 0, 11, 9),
(47, NULL, NULL, '2016-03-28 08:00:00', 0, 10, 9),
(48, '<p>Te estas muriendo</p>', '<p><strong>Pues pelas!</strong></p>', '2016-03-25 11:40:00', 1, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `licencenumber` varchar(128) DEFAULT NULL,
  `speciality` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`id`, `firstname`, `lastname`, `address`, `phone`, `birthdate`, `licencenumber`, `speciality`) VALUES
(7, 'admin nombre', 'admin apellido', NULL, NULL, NULL, NULL, NULL),
(8, 'doctor1 nombre', 'doctor1 apellido', NULL, NULL, NULL, '123-456-789', 'DOCTOR GENERAL'),
(9, 'doctor2 nombre', 'doctor2 apellido', NULL, NULL, NULL, '789-789-456', 'MEDICO PARTERO'),
(10, 'paciente1 nombre', 'paciente1 apellido', NULL, NULL, NULL, NULL, NULL),
(11, 'paciente2 nombre', 'paciente2 apellido', NULL, NULL, NULL, NULL, NULL),
(12, 'paciente3 nombre', 'paciente3 apellido', NULL, NULL, NULL, NULL, NULL),
(13, 'FN', 'LN', 'Av vadepenas 3110123123', '33 3333 3333', '2016-03-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `profileid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `profileid`) VALUES
(7, 'administrador', '9dbf7c1488382487931d10235fc84a74bff5d2f4', 'administrador@familyhealth.com', 7),
(8, 'doctor1', '83725262b1400688274c24d6d60a7ca247040ba5', 'doctor1@familyhealth.com', 8),
(9, 'doctor2', '67d87aec19fa699b23849a92b33f37dfe9be57d5', 'doctor2@familyhealth.com', 9),
(10, 'paciente1', '73b226d52b8ed64903559277e6b15b6707739b27', 'paciente1@familyhealth.com', 10),
(11, 'paciente2', '17d6d2b17ecda4285b482b89695ca35fc634528b', 'paciente2@familyhealth.com', 11),
(12, 'paciente3', '2cb484eb82b3a074858b8096a369feaa75227551', 'paciente3@familyhealth.com', 12),
(13, 'TestUser', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tu@familyhealth.com', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workabledays`
--

CREATE TABLE `tbl_workabledays` (
  `id` int(11) NOT NULL,
  `dayname` varchar(50) NOT NULL,
  `dayshortname` varchar(50) NOT NULL,
  `weekday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workablehours`
--

CREATE TABLE `tbl_workablehours` (
  `id` int(11) NOT NULL,
  `timeframeup` varchar(50) NOT NULL,
  `timeframedown` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_appointment_tbl_user1_idx` (`patientuserid`),
  ADD KEY `fk_tbl_appointment_tbl_user2_idx` (`doctoruserid`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `licencenumber` (`licencenumber`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_tbl_user_tbl_profile1_idx` (`profileid`);

--
-- Indexes for table `tbl_workabledays`
--
ALTER TABLE `tbl_workabledays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_workablehours`
--
ALTER TABLE `tbl_workablehours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_workabledays`
--
ALTER TABLE `tbl_workabledays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_workablehours`
--
ALTER TABLE `tbl_workablehours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `fk_tbl_appointment_tbl_user1` FOREIGN KEY (`patientuserid`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_appointment_tbl_user2` FOREIGN KEY (`doctoruserid`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_tbl_profile1` FOREIGN KEY (`profileid`) REFERENCES `tbl_profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

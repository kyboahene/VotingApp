-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 10:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voteapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `ID_number` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `first_name`, `last_name`, `ID_number`, `password`) VALUES
(1, 'Admin', '', '1234567654321', 'adm1nPassw0rd');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_img` text NOT NULL,
  `party_id` int(10) NOT NULL,
  `party_logo` text NOT NULL,
  `position_id` int(10) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `candidate_name`, `candidate_img`, `party_id`, `party_logo`, `position_id`, `candidate_cvotes`) VALUES
(25, 'John Mahama', '', 2, '', 1, 1),
(26, 'Nana Addo', '', 1, '', 1, 0),
(27, 'Ivor Green', '', 3, '', 1, 0),
(28, 'Papa Kwesi Nduom', '', 5, '', 1, 0),
(29, 'Konadu Rawlings', '', 4, '', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` int(11) NOT NULL,
  `party_name` text NOT NULL,
  `party_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party_name`, `party_logo`) VALUES
(1, 'NPP', ''),
(2, 'NDC', ''),
(3, 'CPP', ''),
(4, 'NDP', ''),
(5, 'PPP', ''),
(6, 'PNC', ''),
(7, 'Independent', '');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(5) NOT NULL,
  `position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position_name`) VALUES
(1, 'President'),
(2, 'Secretary'),
(5, 'Vice-Secretary'),
(7, 'Organizing-Secretary'),
(8, 'Treasurer'),
(9, 'Vice-Treasurer'),
(10, 'Vice-Chairperson'),
(11, 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `member_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `ID_number` varchar(45) NOT NULL,
  `voter_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`member_id`, `first_name`, `last_name`, `ID_number`, `voter_password`) VALUES
(4, 'yaw', 'Boahene', '123456789', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(5, 'Kwabs', 'Boahene', '987654321', '$2y$10$U1zkxjetOaoe9qNZQZ9dGOcN6VZ4BfYZ7u9mFE'),
(6, 'yaw', 'Gyamfi', '1234567890', '$2y$10$9Lpekw/I0.ehJSDte.wXZeCmQclT7xQCfMB2x5'),
(7, 'Kweku', 'Appiah', '123454321', '$2y$10$xfqf2/j4DN8dNsdonceIbeVyIiKlbkk/YnzR4Q'),
(8, 'George', 'Appiah', '12345678998', '$2y$10$weWDpCDAvx2d0S57nSBXTOB3gcemGLrF8PXWQt'),
(9, 'George', 'Appiah', '123456789', '$2y$10$QvkVANBCLoeVzv372Niyr.dWKwOzShNcb/Gn2n'),
(10, 'Kweku', 'Boahene', '1234567898765432', '$2y$10$WoYl7/uQVRr6J8Vslqq6MuceLhYiXSjmqzyZjn'),
(11, 'Randy', 'Abbey', '2222222222', '$2y$10$5DN.oBwXE45rf8imTe0cWeTGybLJ7aFDm3J8u1'),
(12, 'Randy', 'Abbey', '2222222222', '$2y$10$9EjKLxzOkkaBylAKP9RSme606eRQ0TQA6NObjx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

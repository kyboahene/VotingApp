-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 01:12 PM
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
  `ID_number` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `ID_number`, `password`) VALUES
(1, '1234567654321', 'adm1nPassw0rd');

-- --------------------------------------------------------

--
-- Table structure for table `constituency`
--

CREATE TABLE `constituency` (
  `const_id` int(11) NOT NULL,
  `constituency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `constituency`
--

INSERT INTO `constituency` (`const_id`, `constituency`) VALUES
(1, 'Gomoa East'),
(2, 'Gomoa West'),
(3, 'Bantama'),
(4, 'Ejisu'),
(5, 'Kwabre East'),
(6, 'Obuasi East'),
(7, 'Offinso North'),
(8, 'Tano North'),
(9, 'Offinso North'),
(10, 'Tano North'),
(11, 'Asunafo North'),
(12, 'Asutifi South'),
(13, 'Asunafo North'),
(14, 'Asutifi South'),
(15, 'Techiman North'),
(16, 'Sunyani East'),
(17, 'Agona East'),
(18, 'Assin Central'),
(19, 'Cape Coast North'),
(20, 'Effutu'),
(21, 'Nkawkaw'),
(22, 'New Juaben North'),
(23, 'Odododiodoo'),
(24, 'Ablekuma South'),
(25, 'Adenta'),
(26, 'Ashaiman'),
(27, 'Tema East'),
(28, 'Yendi'),
(29, 'Ho Central'),
(30, 'Anlo'),
(31, 'Keta'),
(32, 'Ketu North'),
(33, 'Sekondi'),
(34, 'Takoradi'),
(35, 'BORTIANOR-NGLESHIE AMANFRO'),
(36, 'WEIJA- GBAWE');

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
(1, 'NPP', 'npp.png'),
(2, 'NDC', 'ndc.png'),
(3, 'CPP', 'cpp.jpg'),
(4, 'NDP', 'ndp.png'),
(5, 'PPP', 'ppp.jpg'),
(6, 'PNC', 'pnc.jpg'),
(7, 'Independent', ''),
(8, 'APC', 'apc.jpg'),
(9, 'DPP', 'dpp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `par_candidates`
--

CREATE TABLE `par_candidates` (
  `candidate_id` int(11) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_img` text NOT NULL,
  `party_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `const_id` int(255) NOT NULL,
  `candidate_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_candidates`
--

INSERT INTO `par_candidates` (`candidate_id`, `candidate_name`, `candidate_img`, `party_id`, `position_id`, `const_id`, `candidate_votes`) VALUES
(1, '  Nana Kum', '', 0, 0, 1, 2),
(2, '  Nana Kum', '', 0, 0, 1, 1),
(3, '  Nana Kum', '', 0, 0, 2, 2),
(5, '  Nana Kum', '', 0, 0, 1, 0),
(6, 'Adjetey Larbie', '', 5, 2, 35, 0),
(7, 'Bright Edward Kordzo', '', 2, 2, 35, 0),
(8, 'Habiab Saad', '', 1, 2, 35, 0),
(9, 'Jessica Manuel', '', 5, 2, 36, 0),
(10, 'Obuobia Darko-Opoku', '', 2, 2, 36, 0),
(11, 'Tina Gifty Naa Ayeley', '', 1, 2, 36, 0),
(12, 'William Larbi', '', 5, 2, 23, 0),
(13, 'Edwin N. L. Vanderpuye ', '', 2, 2, 23, 0),
(14, 'Edward P. N. L. Bann', '', 1, 2, 23, 0),
(16, 'Jonathan M. Heward-Mil', '', 8, 2, 23, 0),
(17, 'Sampson Issaka', '', 3, 2, 23, 0),
(18, 'Ishmael P. K. Longdon', '', 5, 2, 24, 0),
(19, 'Vanderpuye A. Okoe', '', 2, 2, 24, 0),
(20, 'Jerry A. Shaib', '', 1, 2, 24, 0),
(21, 'Goodman Baah', '', 4, 2, 24, 0),
(22, 'Abdulai O. Squire', '', 7, 2, 24, 0),
(23, 'Alhaji M. muftao', '', 5, 2, 25, 0),
(24, 'Mohammed A. Ramadan', '', 2, 2, 25, 0),
(25, 'Yaw B. Asamoah', '', 1, 2, 25, 0),
(26, 'Alhaji R. Alhassan', '', 3, 2, 25, 0),
(27, 'Hummi Sinare', '', 6, 2, 25, 0),
(28, 'kojo A. Ayetey', '', 5, 2, 26, 0),
(29, 'Ernest H. Norgbey', '', 2, 2, 26, 0),
(30, 'Larbaran Y. Barry', '', 1, 0, 26, 0);

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
(2, 'Parlimentary');

-- --------------------------------------------------------

--
-- Table structure for table `pres_candidates`
--

CREATE TABLE `pres_candidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_img` text NOT NULL,
  `party_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `candidate_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pres_candidates`
--

INSERT INTO `pres_candidates` (`candidate_id`, `candidate_name`, `candidate_img`, `party_id`, `position_id`, `candidate_votes`) VALUES
(25, '  Papa Kwesi Nduom', '', 5, 1, 1),
(26, '  John Mahama', '', 2, 1, 4),
(27, '        Nana Addo', '', 1, 1, 0),
(28, 'Ivor Green', '', 3, 1, 1),
(29, 'Nana Konadu Rawlings', '', 4, 1, 0),
(30, ' Papa Kwesi Nduom', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `member_id` int(5) NOT NULL,
  `registered_date` date NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `ID_number` varchar(45) NOT NULL,
  `constituency` text NOT NULL,
  `voter_password` varchar(45) NOT NULL,
  `pres_voted` tinyint(1) NOT NULL,
  `par_voted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`member_id`, `registered_date`, `first_name`, `last_name`, `ID_number`, `constituency`, `voter_password`, `pres_voted`, `par_voted`) VALUES
(24, '0000-00-00', 'George', 'Appiah', '0504512117', 'Gomoa East', '$2y$10$LmA7m7chnQ5sQfFJycJfBOvwsQrITnRni4dfTN', 1, 1),
(25, '0000-00-00', 'Debrah', 'Fifa', '0244933988', 'Gomoa West', '$2y$10$PYW.n0cpyTIzqXDW2e0BeuO/uEs3pDPEuZORPC', 1, 1),
(26, '0000-00-00', 'Ellen', 'Boahene', '0244933988', 'Gomoa East', '$2y$10$ZAXYTiUm6P3BK1UcwnrVietqZASIsQtFLrwFbd', 1, 1),
(27, '2020-06-11', 'Kelvin', 'Allotey', '0244933988', 'Gomoa East', '$2y$10$9zcdzXs5MCRrHS.Ba7lomOqI/jwqEBXC8afrGT', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `constituency`
--
ALTER TABLE `constituency`
  ADD PRIMARY KEY (`const_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `par_candidates`
--
ALTER TABLE `par_candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `pres_candidates`
--
ALTER TABLE `pres_candidates`
  ADD PRIMARY KEY (`candidate_id`);

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
-- AUTO_INCREMENT for table `constituency`
--
ALTER TABLE `constituency`
  MODIFY `const_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `par_candidates`
--
ALTER TABLE `par_candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pres_candidates`
--
ALTER TABLE `pres_candidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

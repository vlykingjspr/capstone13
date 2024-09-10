-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 03:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cagroplms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_email`, `action`, `timestamp`) VALUES
(1, 'testfw@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-08-28 09:08:41'),
(2, 'jesusnew@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-08-30 00:37:01'),
(3, 'James@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-01 06:33:22'),
(4, 'jamesnew@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-01 06:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `fishcage`
--

CREATE TABLE `fishcage` (
  `id` int(11) NOT NULL,
  `fc_fname` varchar(255) DEFAULT NULL,
  `fc_mname` varchar(255) DEFAULT NULL,
  `fc_lname` varchar(255) DEFAULT NULL,
  `fc_appell` varchar(255) DEFAULT NULL,
  `fc_postal` int(11) DEFAULT NULL,
  `fc_prov` varchar(255) NOT NULL,
  `fc_municipal` varchar(255) NOT NULL,
  `fc_brgy` varchar(255) NOT NULL,
  `fc_street` varchar(255) DEFAULT NULL,
  `fc_contact` varchar(50) NOT NULL,
  `fc_invcategory` varchar(255) DEFAULT NULL,
  `fc_cagetype` varchar(255) DEFAULT NULL,
  `fc_culturedspicies` varchar(255) DEFAULT NULL,
  `fc_dimension_size` varchar(255) DEFAULT NULL,
  `fc_intendedfor` varchar(255) DEFAULT NULL,
  `fc_businessname` varchar(255) DEFAULT NULL,
  `fc_businessadd` varchar(255) DEFAULT NULL,
  `fc_businessreg` varchar(255) DEFAULT NULL,
  `fc_capitalinv` decimal(15,2) DEFAULT NULL,
  `fc_source` varchar(255) DEFAULT NULL,
  `u_profile` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL,
  `approval_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fisherfolks`
--

CREATE TABLE `fisherfolks` (
  `ff_id` int(11) NOT NULL,
  `ff_fname` varchar(255) DEFAULT NULL,
  `ff_mname` varchar(255) DEFAULT NULL,
  `ff_lname` varchar(255) DEFAULT NULL,
  `ff_appell` varchar(100) DEFAULT NULL,
  `ff_postall` int(11) DEFAULT NULL,
  `ff_prov` varchar(255) DEFAULT NULL,
  `ff_municipal` varchar(100) DEFAULT NULL,
  `ff_barangay` varchar(100) DEFAULT NULL,
  `ff_street` varchar(100) DEFAULT NULL,
  `ff_age` int(11) DEFAULT NULL,
  `ff_dob` date DEFAULT NULL,
  `ff_residence` varchar(100) DEFAULT NULL,
  `ff_gender` varchar(100) DEFAULT NULL,
  `ff_contact` char(15) NOT NULL,
  `ff_OR` char(10) NOT NULL,
  `ff_orgname` varchar(100) DEFAULT NULL,
  `ff_membersince` int(15) DEFAULT NULL,
  `ff_orgposition` varchar(100) DEFAULT NULL,
  `u_profile` varchar(255) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_pass` varchar(100) DEFAULT NULL,
  `u_role` varchar(100) DEFAULT NULL,
  `u_status` char(10) DEFAULT NULL,
  `approval_type` varchar(50) DEFAULT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fisherfolks`
--

INSERT INTO `fisherfolks` (`ff_id`, `ff_fname`, `ff_mname`, `ff_lname`, `ff_appell`, `ff_postall`, `ff_prov`, `ff_municipal`, `ff_barangay`, `ff_street`, `ff_age`, `ff_dob`, `ff_residence`, `ff_gender`, `ff_contact`, `ff_OR`, `ff_orgname`, `ff_membersince`, `ff_orgposition`, `u_profile`, `u_email`, `u_pass`, `u_role`, `u_status`, `approval_type`, `issuance_date`) VALUES
(93, 'James', 'Test', 'Account', '', 8000, 'davao del sur', 'davao city', 'calderon', '', 32, '0000-00-00', '2006', 'Male', '09916604843', '45451234', '', 0, '', '../uploads/logo.jfif', 'jamesnew@gmail.com', '123', 'Fisherfolks', '4', 'Fishery License Permit', '2024-08-29 23:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `fishingboats`
--

CREATE TABLE `fishingboats` (
  `id` int(11) NOT NULL,
  `fb_opfname` varchar(255) DEFAULT NULL,
  `fb_opmname` varchar(255) DEFAULT NULL,
  `fb_oplname` varchar(255) DEFAULT NULL,
  `fb_opappel` varchar(255) DEFAULT NULL,
  `fb_postal` int(11) DEFAULT NULL,
  `fb_opprov` varchar(255) DEFAULT NULL,
  `fb_opmunicipal` varchar(255) DEFAULT NULL,
  `fb_opbarangay` varchar(255) DEFAULT NULL,
  `fb_opstreet` varchar(255) DEFAULT NULL,
  `fb_homeport` varchar(255) DEFAULT NULL,
  `fb_vesselname` varchar(255) DEFAULT NULL,
  `fb_vesseltype` varchar(255) DEFAULT NULL,
  `fb_placebuilt` varchar(255) DEFAULT NULL,
  `fb_yearbuilt` int(11) DEFAULT NULL,
  `fb_materialbuilt` varchar(255) DEFAULT NULL,
  `fb_RL` float DEFAULT NULL,
  `fb_RB` float DEFAULT NULL,
  `fb_RD` float DEFAULT NULL,
  `fb_TL` float DEFAULT NULL,
  `fb_TB` float DEFAULT NULL,
  `fb_TD` float DEFAULT NULL,
  `fb_GT` float DEFAULT NULL,
  `fb_NT` float DEFAULT NULL,
  `fb_enginemake` varchar(255) DEFAULT NULL,
  `fb_serial` varchar(255) DEFAULT NULL,
  `fb_horsepower` float DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fishinggears`
--

CREATE TABLE `fishinggears` (
  `fg_id` int(11) NOT NULL,
  `fg_locfname` varchar(100) DEFAULT NULL,
  `fg_locmname` varchar(100) DEFAULT NULL,
  `fg_loclname` varchar(100) DEFAULT NULL,
  `fg_dob` date DEFAULT NULL,
  `fg_locappel` varchar(100) DEFAULT NULL,
  `fg_postal` int(11) DEFAULT NULL,
  `fg_locprov` varchar(255) DEFAULT NULL,
  `fg_locmunicipal` varchar(255) DEFAULT NULL,
  `fg_locbarangay` varchar(255) DEFAULT NULL,
  `fg_locstreet` varchar(100) DEFAULT NULL,
  `fg_loccontact` varchar(15) DEFAULT NULL,
  `fg_OR` char(15) NOT NULL,
  `fg_gender` char(50) NOT NULL,
  `fg_type` varchar(100) DEFAULT NULL,
  `fg_wing` varchar(100) DEFAULT NULL,
  `fg_centerline` varchar(100) DEFAULT NULL,
  `fg_otherspec` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_status` char(10) NOT NULL,
  `approval_type` varchar(50) NOT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fishinggears`
--

INSERT INTO `fishinggears` (`fg_id`, `fg_locfname`, `fg_locmname`, `fg_loclname`, `fg_dob`, `fg_locappel`, `fg_postal`, `fg_locprov`, `fg_locmunicipal`, `fg_locbarangay`, `fg_locstreet`, `fg_loccontact`, `fg_OR`, `fg_gender`, `fg_type`, `fg_wing`, `fg_centerline`, `fg_otherspec`, `u_email`, `u_status`, `approval_type`, `issuance_date`) VALUES
(34, 'James', 'Test', 'Account', NULL, '', 8000, 'davao del sur', 'davao city', 'calderon', '', '09916604843', '0', 'Male', 'DEEP SEA FISH CORAL (PAGUMAD)', '2x2', '3x2', '2x2', 'jamesnew@gmail.com', '4', 'Fishing Gear Permit', '2024-09-01 06:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `fishworkerlicense`
--

CREATE TABLE `fishworkerlicense` (
  `fw_id` int(11) NOT NULL,
  `fw_fname` varchar(100) DEFAULT NULL,
  `fw_mname` varchar(100) DEFAULT NULL,
  `fw_lname` varchar(100) DEFAULT NULL,
  `fw_appell` varchar(100) DEFAULT NULL,
  `fw_postal` int(11) DEFAULT NULL,
  `fw_province` varchar(255) DEFAULT NULL,
  `fw_municipal` varchar(255) DEFAULT NULL,
  `fw_barangay` varchar(255) DEFAULT NULL,
  `fw_street` varchar(255) DEFAULT NULL,
  `fw_gender` varchar(255) DEFAULT NULL,
  `fw_age` int(11) DEFAULT NULL,
  `fw_dob` date DEFAULT NULL,
  `fw_contact` int(15) DEFAULT NULL,
  `fw_OR` int(15) DEFAULT NULL,
  `fw_caretakerof` varchar(100) DEFAULT NULL,
  `fw_caretakersince` int(15) DEFAULT NULL,
  `fw_location` varchar(255) DEFAULT NULL,
  `fw_aquaculture` varchar(100) DEFAULT NULL,
  `fw_FLA_Private` varchar(100) DEFAULT NULL,
  `fw_unitsmanaged` int(15) DEFAULT NULL,
  `fw_unitdeminsions` varchar(255) DEFAULT NULL,
  `u_profile` varchar(255) NOT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_pass` varchar(100) DEFAULT NULL,
  `u_role` varchar(100) DEFAULT NULL,
  `u_status` char(10) DEFAULT NULL,
  `approval_type` varchar(50) DEFAULT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licensing`
--

CREATE TABLE `licensing` (
  `client_id` int(11) NOT NULL,
  `client_gender` varchar(255) DEFAULT NULL,
  `client_fname` varchar(255) DEFAULT NULL,
  `client_mname` varchar(255) DEFAULT NULL,
  `client_lname` varchar(255) DEFAULT NULL,
  `client_dob` date DEFAULT NULL,
  `client_prov` varchar(255) DEFAULT NULL,
  `client_municipal` varchar(255) DEFAULT NULL,
  `client_street` varchar(255) DEFAULT NULL,
  `client_brgy` varchar(255) DEFAULT NULL,
  `client_OR` varchar(255) DEFAULT NULL,
  `approval_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `licensing`
--

INSERT INTO `licensing` (`client_id`, `client_gender`, `client_fname`, `client_mname`, `client_lname`, `client_dob`, `client_prov`, `client_municipal`, `client_street`, `client_brgy`, `client_OR`, `approval_type`) VALUES
(45, 'Male', 'James', 'Test', 'Account', '0000-00-00', 'davao del sur', 'davao city', '', 'calderon', '0', 'Fishing Gear Permit');

-- --------------------------------------------------------

--
-- Table structure for table `locatorinvestor`
--

CREATE TABLE `locatorinvestor` (
  `loc_id` int(11) NOT NULL,
  `fw_id` int(11) DEFAULT NULL,
  `loc_fname` varchar(100) DEFAULT NULL,
  `loc_mname` varchar(100) DEFAULT NULL,
  `loc_lname` varchar(100) DEFAULT NULL,
  `loc_appell` varchar(100) DEFAULT NULL,
  `loc_prov` varchar(100) DEFAULT NULL,
  `loc_municipal` varchar(100) DEFAULT NULL,
  `loc_brgy` varchar(100) DEFAULT NULL,
  `loc_street` varchar(100) DEFAULT NULL,
  `loc_units` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_head`
--

CREATE TABLE `section_head` (
  `client_id` int(11) NOT NULL,
  `client_gender` varchar(50) NOT NULL,
  `client_fname` varchar(100) NOT NULL,
  `client_mname` varchar(50) NOT NULL,
  `client_lname` varchar(50) NOT NULL,
  `client_dob` date DEFAULT NULL,
  `client_prov` varchar(50) NOT NULL,
  `client_municipal` varchar(50) NOT NULL,
  `client_street` varchar(50) NOT NULL,
  `client_brgy` varchar(50) DEFAULT NULL,
  `client_OR` int(50) DEFAULT NULL,
  `approval_type` varchar(50) NOT NULL,
  `client_role` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(50) DEFAULT NULL,
  `u_lname` varchar(50) DEFAULT NULL,
  `u_pass` varchar(50) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_role` varchar(50) DEFAULT NULL,
  `u_prof` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_pass`, `u_email`, `u_role`, `u_prof`) VALUES
(6, 'Admin', 'admin', '123', 'admin@cagro.com', 'CAGRO - Administrator', NULL),
(17, 'Dana', 'Vespoli', '123', 'dana@gmail.com', 'Section Head', NULL),
(18, 'Zenoen', 'Sullivan', '123', 'zenoen@cagro.plms', 'Section Head', NULL),
(19, 'James', 'Dela Norte', '123', 'delanorte@gmail.com', 'CAGRO - Administrator', NULL),
(20, 'Jamaica', 'Rosales', '123', 'jammyrosales@gmail.com', 'CAGRO - Administrator', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishcage`
--
ALTER TABLE `fishcage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fisherfolks`
--
ALTER TABLE `fisherfolks`
  ADD PRIMARY KEY (`ff_id`);

--
-- Indexes for table `fishingboats`
--
ALTER TABLE `fishingboats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishinggears`
--
ALTER TABLE `fishinggears`
  ADD PRIMARY KEY (`fg_id`);

--
-- Indexes for table `fishworkerlicense`
--
ALTER TABLE `fishworkerlicense`
  ADD PRIMARY KEY (`fw_id`);

--
-- Indexes for table `licensing`
--
ALTER TABLE `licensing`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `locatorinvestor`
--
ALTER TABLE `locatorinvestor`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `fw_id` (`fw_id`);

--
-- Indexes for table `section_head`
--
ALTER TABLE `section_head`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fishcage`
--
ALTER TABLE `fishcage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fisherfolks`
--
ALTER TABLE `fisherfolks`
  MODIFY `ff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `fishingboats`
--
ALTER TABLE `fishingboats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fishinggears`
--
ALTER TABLE `fishinggears`
  MODIFY `fg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `fishworkerlicense`
--
ALTER TABLE `fishworkerlicense`
  MODIFY `fw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `licensing`
--
ALTER TABLE `licensing`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `locatorinvestor`
--
ALTER TABLE `locatorinvestor`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `section_head`
--
ALTER TABLE `section_head`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locatorinvestor`
--
ALTER TABLE `locatorinvestor`
  ADD CONSTRAINT `locatorinvestor_ibfk_1` FOREIGN KEY (`fw_id`) REFERENCES `fishworkerlicense` (`fw_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

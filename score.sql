-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2021 at 06:21 AM
-- Server version: 5.6.43-84.3
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmstech_lmsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `name`) VALUES
(1, 'Kolkata-HO'),
(2, 'Mumbai'),
(3, 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `name`) VALUES
(1, 'Kolkata'),
(2, 'Delhi'),
(3, 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `gstn` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `pin` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `whatsapp` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `alt_email` varchar(191) NOT NULL,
  `website` varchar(255) NOT NULL,
  `contact_1` varchar(191) NOT NULL,
  `designation_1` varchar(191) NOT NULL,
  `phone_1` varchar(191) NOT NULL,
  `whatsapp_1` varchar(255) NOT NULL,
  `email_1` varchar(191) NOT NULL,
  `contact_2` varchar(191) NOT NULL,
  `designation_2` varchar(191) NOT NULL,
  `phone_2` varchar(191) NOT NULL,
  `whatsapp_2` varchar(191) NOT NULL,
  `email_2` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `user_id`, `company_name`, `type`, `gstn`, `address`, `city`, `state`, `pin`, `country`, `phone`, `whatsapp`, `email`, `alt_email`, `website`, `contact_1`, `designation_1`, `phone_1`, `whatsapp_1`, `email_1`, `contact_2`, `designation_2`, `phone_2`, `whatsapp_2`, `email_2`) VALUES
(1, 2, 'Soumen Majumder', '1', '', 'Sikkim / Kolkata', 'Kolkata', 'West Bengal', '700000', 'India', '07063597941', '', '', '', '', 'Soumen Majumder', 'Prop.', '07063597941', '', '', '', '', '', '', ''),
(2, 2, 'Swami Vivekananda Cancer Aspatal', '1', 'lOAAGTS583OAIZ2', 'Vivekananda Nagar , Mabbi, Darbhanga, Bihar 846004', 'Darbhanga', 'West Bengal', '846004', 'India', '8298649999', '', 'svcaceo@gmail.com', '', 'www.svcad.org', 'Dr. Ashok kumar singh', 'Owner', '8298649999', '', 'svcaceo@gmail.com', '', '', '', '', ''),
(3, 2, 'Mrinal Education Private Limited', '1', '', 'Gr. Floor, FI-G/3, 104/2 Ramlal Dutta Road, Bhadrakali Lp-10/15,\r\nHoogly, West Bengal, Pincode-712232', 'Hoogly', 'West Bengal', '712232', 'India', '9674571990', '9674571990', 'mrigankaju@gmail.com', 'author.mriganka@gmail.com', 'www.mrinaleducation.com', 'Mriganka Bhattacharya', 'Director', '9674571990', '9674571990', 'mrigankaju@gmail.com', '', '', '', '', ''),
(4, 2, 'Sri Sri Balananda Trust', '1', '', 'AE-467, Salt Lake City, Kolkata-700064', 'Kolkata', 'West Bengal', '700064', 'India', '9433044341', '9433044341', 'westonengineers@gmail.com', '', 'www.balanandaashram.org', 'Sri Surajit Dey', 'Trustee', '9433044341', '9433044341', 'westonengineers@gmail.com', 'Dr.Sanjay Bhattarjee', 'Member', '9038161825', '9038161825', ''),
(5, 2, ' Sree Sree Mohanananda Brahmachari Cancer Hospital', '1', '', 'Rangamati Path, Bidhannagar, Durgapur, West Bengal', 'Durgapur', 'West Bengal', '713212', 'India', '0343-2537336/2531032', '', 'contact@ssmbch.org', 'westonengineers@gmail.com', 'www.ssmbch.org', 'Sri Surajit Dey', 'Trustee', '9433044341', '9433044341', 'westonengineers@gmail.com', 'Dr. Sanjay Bhattarjee', 'Doctor', '9038161825', '9038161825', ''),
(6, 2, 'Sukanta Das', '1', '', 'Saltlake', 'Kolkata', 'West Bengal', '700093', 'India', '9830889567', '9830889567', 'sukantadas007@gmail.com', '', '', 'Sukanta Das', 'IT', '9830889567', '9830889567', 'sukantadas007@gmail.com', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE `company_type` (
  `type_id` int(11) NOT NULL,
  `number` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`type_id`, `number`, `type`) VALUES
(1, '1', 'End User'),
(2, '2', 'Business Associate');

-- --------------------------------------------------------

--
-- Table structure for table `converations`
--

CREATE TABLE `converations` (
  `conversation_id` int(11) NOT NULL,
  `prospect_id` int(11) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `converations`
--

INSERT INTO `converations` (`conversation_id`, `prospect_id`, `statement`, `time`, `status`) VALUES
(1, 1, 'Will call & meet tomorrow for detail discussion.', '2020-12-01 11:45:54', 'Read'),
(2, 1, 'Followup Date has been changed from 02-12-2020 to 03-12-2020', '2021-02-02 09:17:15', 'Read'),
(3, 1, 'Followup Date has been changed from 03-12-2020 to 02-12-2020', '2021-02-02 09:17:30', 'Read'),
(4, 1, 'Discussionis underway!', '2021-02-02 09:20:57', 'Read'),
(5, 2, 'Work-in-Progress', '2021-08-23 04:23:05', 'Unread'),
(6, 3, 'Advance payment received. Waiting for the content.', '2021-08-23 04:24:02', 'Unread'),
(7, 4, 'Domains registered. Old website hosted. Waiting for the content for the new website development.', '2021-08-23 04:35:20', 'Unread'),
(8, 1, 'Prospect Value has been changed from 125000 to 25000', '2021-08-23 04:47:57', 'Read'),
(9, 5, 'Pending discussion. Renewal & migration of the existing website will come first.', '2021-08-23 05:01:03', 'Unread'),
(10, 1, 'Followup Date has been changed from 02-12-2020 to 31-08-2021', '2021-08-23 05:03:53', 'Unread'),
(11, 6, 'May require Dedicated Server / VPS, Server Administration, Hosting Services', '2021-08-23 14:52:57', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `level` varchar(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `level`, `name`) VALUES
(1, 'L1', 'Admin'),
(2, 'L2', 'Marketing Manager'),
(3, 'L3', 'Branch Manager'),
(4, 'L4', 'Business Executive');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `smtp` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `port` varchar(191) NOT NULL,
  `from` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `smtp`, `username`, `password`, `port`, `from`) VALUES
(1, 'mail.lms.techworth.co.in', 'mail@lms.techworth.co.in', '(admin123)', '465', 'SCORE ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `financialyear`
--

CREATE TABLE `financialyear` (
  `f_id` int(11) NOT NULL,
  `open` varchar(255) NOT NULL,
  `close` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financialyear`
--

INSERT INTO `financialyear` (`f_id`, `open`, `close`) VALUES
(1, '2021-04-01', '2022-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `prospects`
--

CREATE TABLE `prospects` (
  `prospect_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(191) NOT NULL,
  `requirement` varchar(191) NOT NULL,
  `prospect_value` varchar(191) NOT NULL,
  `order_value` varchar(191) NOT NULL,
  `followup_date` varchar(191) NOT NULL,
  `closing_date` varchar(191) NOT NULL,
  `date` varchar(191) NOT NULL,
  `date2` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prospects`
--

INSERT INTO `prospects` (`prospect_id`, `company_id`, `user_id`, `status`, `requirement`, `prospect_value`, `order_value`, `followup_date`, `closing_date`, `date`, `date2`) VALUES
(1, 1, 2, 'Open', 'Web Application Development, ', '25000', '0', '31-08-2021', '', '01-12-2020', '2020-12-01'),
(2, 3, 2, 'Open', 'Web Application Development, Website Development, ', '65000', '0', '31-08-2021', '', '23-08-2021', '2021-08-23'),
(3, 2, 2, 'Open', 'Web Application Development, Website Development, ', '120000', '0', '31-08-2021', '', '23-08-2021', '2021-08-23'),
(4, 4, 2, 'Open', 'Web Application Development, Website Development, ', '45000', '0', '31-08-2021', '', '23-08-2021', '2021-08-23'),
(5, 5, 2, 'New', 'Domain Registration/Hosting, Web Application Development, Website Development, ', '50000', '0', '31-08-2021', '', '23-08-2021', '2021-08-23'),
(6, 6, 2, 'New', 'Domain Registration/Hosting, ', '100000', '0', '31-08-2021', '', '23-08-2021', '2021-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(191) NOT NULL,
  `report` varchar(255) NOT NULL,
  `expense` varchar(191) NOT NULL,
  `date2` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `number` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `number`, `name`) VALUES
(1, '2', 'Web Application Development'),
(2, '3', 'Website Development'),
(3, '4', 'E-Commerce Website Development'),
(4, '5', 'Social Media Marketing'),
(5, '1', 'Domain Registration/Hosting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `code` varchar(191) NOT NULL,
  `branch` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `head` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `create_date` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `logoname` varchar(255) NOT NULL,
  `unknown` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `code`, `branch`, `name`, `designation_id`, `head`, `phone`, `email`, `password`, `city`, `create_date`, `status`, `logoname`, `unknown`) VALUES
(1, '', 1, 'SCORE ADMIN', 1, '', '9007547033', 'admin@techworth.in', '261f1a8b07f6eea1ec03384bd17dbc2a', '', '', 'Active', 'admin.jpg', 'password'),
(2, 'TW1', 1, 'Rajiv Sarkar', 2, '1', '9007547033', 'rs@techworth.in', '261f1a8b07f6eea1ec03384bd17dbc2a', 'Kolkata', '01-12-2020', 'Active', 'FB-Image-big.jpg', '(admin123)'),
(3, 'TW2', 1, 'Saumya Sengupta', 3, '2', '9007547033', 'ss@techworth.in', '20c9d51cad35f1a134fe31c9950a38c4', 'Kolkata', '01-12-2020', 'Active', 'ss1.jpg', 'titas123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `converations`
--
ALTER TABLE `converations`
  ADD PRIMARY KEY (`conversation_id`),
  ADD KEY `prospect_id` (`prospect_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financialyear`
--
ALTER TABLE `financialyear`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`prospect_id`),
  ADD KEY `prospects_ibfk_1` (`user_id`),
  ADD KEY `prospects_ibfk_2` (`company_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `designation_id` (`designation_id`),
  ADD KEY `branch` (`branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `converations`
--
ALTER TABLE `converations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `financialyear`
--
ALTER TABLE `financialyear`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `prospect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

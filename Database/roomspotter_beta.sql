-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 08:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roomspotter`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `accom_id` int(100) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `available_space` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`accom_id`, `room_no`, `available_space`) VALUES
(1, '503', 2),
(2, '0', 0),
(3, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accom_pro_reservation`
--

CREATE TABLE `accom_pro_reservation` (
  `reserve_id` int(11) NOT NULL,
  `providers_id` int(11) NOT NULL,
  `applicants_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accom_pro_reservation`
--

INSERT INTO `accom_pro_reservation` (`reserve_id`, `providers_id`, `applicants_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `pass`) VALUES
(1, 'abunowhashchy@gmail.com', '65d98620161cb0fa116020ca3bf81c55');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicants_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_contact` varchar(15) NOT NULL,
  `e_contact` varchar(15) NOT NULL,
  `bcn` varchar(50) NOT NULL,
  `ssc_reg` varchar(50) NOT NULL,
  `hsc_reg` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `c_pass` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `img_dest` varchar(500) NOT NULL,
  `vkey` varchar(500) NOT NULL,
  `verified` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicants_id`, `fname`, `lname`, `email`, `p_contact`, `e_contact`, `bcn`, `ssc_reg`, `hsc_reg`, `pass`, `c_pass`, `gender`, `img_dest`, `vkey`, `verified`) VALUES
(1, 'Abu Nowhash', 'Chowdhury', 'abunowhashchy@gmail.com', '01521487507', '01521487507', '171081', '26531265', '14354894', 'f71b22449140d2f1def9bcbaeb519a2a', 'f71b22449140d2f1def9bcbaeb519a2a', 'male', '../upload/profile_thumbnail.png', 'ace0e19b0ec951b2a356234d19ae8200', 1),
(2, 'Nowhash', 'Chowdhury', '844959595h@gmail.com', '01521487507', '01521487507', '171081', '5615151', '171081', 'f71b22449140d2f1def9bcbaeb519a2a', 'f71b22449140d2f1def9bcbaeb519a2a', 'male', '../upload/profile_thumbnail.png', '1f692c791b1447b53569c500ac8e0389', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `solution` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `solution`) VALUES
(1, 'What is RoomSpotter System?', 'It is an accommodation Crisis Resolving System which helps applicants to find their accommodation near to their exam center.');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `reporter` varchar(50) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `headline`, `date`, `reporter`, `content`) VALUES
(1, 'IIUC-Admission Open || SPRING-2020 Session', '11-03-20', 'Nurul Amin Sohan', '<b>Admission Requirement:</b>\r\n<br>\r\n#At least GPA 6.50 (Combined in SSC/Dakhil & HSC/Alim, but not less than 3.00 in any individual examination for CCE & ETE. <br>\r\n#At least GPA 6.00 (Combined in Dakhil & Alim/HSC, but not less than 2.50 in any individual examination fo QSIS,DIS & SHIS. <br>\r\n#Five Subjects in O level and two major subjects in A level with minimum B Grade in four subjects & C grade in three subjects.\r\n<br>\r\n<b>Application Deadline: March 20,2020</b><br>\r\n<b>Admission Test: March 22,2020</b>'),
(2, ' IIUC-Admission Open || AUTUMN-2020 Session', '11-03-20', 'Shaown Guho', '<b>Admission Requirement:</b>\r\n<br>\r\n#At least GPA 6.50 (Combined in SSC/Dakhil & HSC/Alim, but not less than 3.00 in any individual examination for CCE & ETE. <br>\r\n#At least GPA 6.00 (Combined in Dakhil & Alim/HSC, but not less than 2.50 in any individual examination fo QSIS,DIS & SHIS. <br>\r\n#Five Subjects in O level and two major subjects in A level with minimum B Grade in four subjects & C grade in three subjects.\r\n<br>\r\n<b>Application Deadline: March 20,2020</b><br>\r\n<b>Admission Test: March 22,2020</b>');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `providers_id` int(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_contact` varchar(15) NOT NULL,
  `bcn` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `c_pass` varchar(100) NOT NULL,
  `img_dest` varchar(500) NOT NULL,
  `vkey` varchar(500) NOT NULL,
  `verified` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`providers_id`, `fname`, `lname`, `email`, `p_contact`, `bcn`, `department`, `gender`, `pass`, `c_pass`, `img_dest`, `vkey`, `verified`) VALUES
(1, 'Shawon ', 'Guha', 'shawon.roomspotter@gmail.com', '01521325587', '171074', 'Computer Science & Engineering', 'male', 'f71b22449140d2f1def9bcbaeb519a2a', 'f71b22449140d2f1def9bcbaeb519a2a', '../upload/profile_thumbnail.png', 'ffe74a1eb9c9a19687b60ca8f749f090', 1),
(2, 'Mehedi Hasan', 'Shakil', 'smartboyp7@gmail.com', '01839583523', '171019', 'Electrical & Electronics Engineering', 'male', 'f71b22449140d2f1def9bcbaeb519a2a', 'f71b22449140d2f1def9bcbaeb519a2a', '../upload/profile_thumbnail.png', '5e44b0829d4dec300f5e595c3e825981', 1),
(3, 'Mohammad', 'Forhad', 'mohammadforhad031@gmail.com', '01977077929', '171021', 'Electrical & Electronics Engineering', 'male', 'f71b22449140d2f1def9bcbaeb519a2a', 'f71b22449140d2f1def9bcbaeb519a2a', '../upload/profile_thumbnail.png', 'ca33c74ab4ea36aec1382a1b370845d2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `providers_accom_info`
--

CREATE TABLE `providers_accom_info` (
  `providers_id` int(100) NOT NULL,
  `accom_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providers_accom_info`
--

INSERT INTO `providers_accom_info` (`providers_id`, `accom_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `providers_info`
--

CREATE TABLE `providers_info` (
  `providers_id` int(100) NOT NULL,
  `versity_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providers_info`
--

INSERT INTO `providers_info` (`providers_id`, `versity_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `reserve_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `check_in`, `check_out`, `reserve_status`) VALUES
(1, '2020-03-01', '2020-03-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `versity`
--

CREATE TABLE `versity` (
  `versity_id` int(100) NOT NULL,
  `versity_name` varchar(50) NOT NULL,
  `hall_name` varchar(50) NOT NULL,
  `loc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `versity`
--

INSERT INTO `versity` (`versity_id`, `versity_name`, `hall_name`, `loc`) VALUES
(1, 'International Islamic University Chittagong', 'Hazrat Abu Bakar(R) Hall', 'Behind Faculty of Science & Engineering. 3.1 km Distance From Main Gate'),
(2, 'International Islamic University Chittagong', 'Hazrat Uthman(R) Hall', 'Behind Faculty of Science & Engineering.'),
(3, 'International Islamic University Chittagong', 'Hazrat Abu Bakar(R) Hall', 'Behind Faculty of Science & Engineering. 3.1 km Distance From Main Gate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`accom_id`);

--
-- Indexes for table `accom_pro_reservation`
--
ALTER TABLE `accom_pro_reservation`
  ADD KEY `applicants_id` (`applicants_id`),
  ADD KEY `providers_id` (`providers_id`),
  ADD KEY `reserve_id` (`reserve_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicants_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`providers_id`);

--
-- Indexes for table `providers_accom_info`
--
ALTER TABLE `providers_accom_info`
  ADD KEY `providers_accom_info_ibfk_1` (`accom_id`),
  ADD KEY `providers_id` (`providers_id`);

--
-- Indexes for table `providers_info`
--
ALTER TABLE `providers_info`
  ADD KEY `providers_info_ibfk_1` (`providers_id`),
  ADD KEY `providers_info_ibfk_2` (`versity_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `versity`
--
ALTER TABLE `versity`
  ADD PRIMARY KEY (`versity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accom_pro_reservation`
--
ALTER TABLE `accom_pro_reservation`
  ADD CONSTRAINT `accom_pro_reservation_ibfk_1` FOREIGN KEY (`applicants_id`) REFERENCES `applicants` (`applicants_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accom_pro_reservation_ibfk_2` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`providers_id`),
  ADD CONSTRAINT `accom_pro_reservation_ibfk_3` FOREIGN KEY (`reserve_id`) REFERENCES `reservation` (`reserve_id`);

--
-- Constraints for table `providers_accom_info`
--
ALTER TABLE `providers_accom_info`
  ADD CONSTRAINT `providers_accom_info_ibfk_1` FOREIGN KEY (`accom_id`) REFERENCES `accommodation` (`accom_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `providers_accom_info_ibfk_2` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`providers_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `providers_info`
--
ALTER TABLE `providers_info`
  ADD CONSTRAINT `providers_info_ibfk_1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`providers_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `providers_info_ibfk_2` FOREIGN KEY (`versity_id`) REFERENCES `versity` (`versity_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

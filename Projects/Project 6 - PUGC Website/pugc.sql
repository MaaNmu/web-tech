-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2024 at 10:38 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pugc`
--
CREATE DATABASE IF NOT EXISTS `pugc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pugc`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `contacts`
--

TRUNCATE TABLE `contacts`;
--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Muhammad Saad Faisal', 'saadstudent.cs@gmail.com', 'asdasda', 'asdasdasd', '2024-09-23 14:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `departments`
--

TRUNCATE TABLE `departments`;
--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `image_path`) VALUES
(1, 'Department of IT', 'The Department of Information Technology provides a state of the art learning environment.', '../assets/img/courses/it.jpg'),
(2, 'Department of Banking & Finance', 'The Banking & Finance Department covers the fundamentals of banking, finance, and economics.', '../assets/img/courses/banking.jpg'),
(3, 'Department of Business Administration', 'The Business Administration Department focuses on management, marketing, and entrepreneurship.', '../assets/img/courses/business.jpg'),
(4, 'Department of Commerce', 'The Commerce Department provides education in commerce, accounting, and economics.', '../assets/img/courses/commerce.jpg'),
(5, 'Department of English Language & Literature', 'The English Department explores literature, linguistics, and language studies.', '../assets/img/courses/english.jpg'),
(6, 'Department of Law', 'The Law Department provides an understanding of legal studies and justice.', '../assets/img/courses/law.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

DROP TABLE IF EXISTS `faculty_members`;
CREATE TABLE `faculty_members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `faculty_members`
--

TRUNCATE TABLE `faculty_members`;
--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`id`, `name`, `position`, `department`, `email`, `phone`, `image_path`) VALUES
(38, 'Mr. Umair Ali', 'Deputy Registrar', 'Administration', 'umairali1948@hotmail.com', '055-9201224', '../assets/img/team/faculty/Umair_Ali.png'),
(39, 'Ms. Saima Nadeem', 'Sr. Librarian', 'Administration', 'srlibrarianpugc@gmail.com', '055-9201361', '../assets/img/team/faculty/Saima_Nadeem.jpg'),
(40, 'Muhammad Sajid Akhtar', 'Deputy Registrar', 'Administration', 'sajidakhtarr@pugc.edu.pk', '055-9201227', '../assets/img/team/faculty/Sajid_Akhtar.jpeg'),
(41, 'Mr. Imran Javed', 'Estate Officer', 'Administration', 'iman866@hotmail.com', '+92 (0) 55 92 00 98 5', '../assets/img/team/faculty/Imran_Javed.png'),
(42, 'Mrs. Akasha Waraich', 'Asstt. Network Administrator', 'Administration', 'akasha_warraich@yahoo.com', '+92 (0) 321 64 05 46 5', '../assets/img/team/faculty/Akasha_Waraich.png'),
(43, 'Mr. Shazib Maqsood Butt', 'Admin. Officer', 'Administration', 'ursshazib@hotmail.com', '055-9201225-26', '../assets/img/team/faculty/Shazib_Maqsood_Butt.png'),
(44, 'Mr. Abrar Ahmad Khan', 'Network Administrator', 'Administration', 'na@pugc.edu.pk', '055-9201220', '../assets/img/team/faculty/Abrar_Ahmad_Khan.png'),
(45, 'Muhammad Shahbaz Cheema', 'PS to Director General', 'Administration', 'shahbaz.cheema@pugc.edu.pk', '055-9201221', '../assets/img/team/faculty/Shahbaz_Cheema.jpg'),
(46, 'Prof. Dr. Naveed Iqbal Chaudhry', 'Professor', 'Faculty', 'naveed.iqbal@pugc.edu.pk', NULL, '../assets/img/team/faculty/Naveed_Iqbal_Chaudhry.jpg'),
(47, 'Mr. Amer Sohail', 'Incharge / Assistant Professor', 'Faculty', 'amer.sohail@pugc.edu.pk', NULL, '../assets/img/team/faculty/Amer_Sohail.jpg'),
(48, 'Dr. Naveed Ahmad Jhamat', 'Incharge / Assistant Professor', 'Faculty', 'naveed.jhamat@pugc.edu.pk', NULL, '../assets/img/team/faculty/Naveed_Ahmad_Jhamat.jpg'),
(49, 'Dr. Salman Naseer', 'Assistant Professor', 'Faculty', 'salman@pugc.edu.pk', '+923338201017', '../assets/img/team/faculty/Salman_Naseer.jpg'),
(50, 'Dr. Ghulam Mustafa', 'Assistant Professor', 'Faculty', 'gmustafa@pugc.edu.pk', NULL, '../assets/img/team/faculty/Ghulam_Mustafa.jpg'),
(51, 'Miss Farhana Aziz Rana', 'Incharge / Assistant Professor', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Farhana_Aziz_Rana.jpg'),
(52, 'Mr. Muhammad Younas', 'Assistant Professor', 'Faculty', 'younas100@yahoo.com', NULL, '../assets/img/team/faculty/Muhammad_Younas.jpg'),
(53, 'Dr. Muhammad Siddique Malik', 'Incharge / Associate Professor', 'Faculty', 'dr.siddique@pugc.edu.pk', '0559201363', '../assets/img/team/faculty/Muhammad_Siddique_Malik.jpg'),
(54, 'Mr. Zeeshan Arshad', 'Lecturer', 'Faculty', 'Zeeshan.arshad@pugc.edu.pk', '+92 332 8159859', '../assets/img/team/faculty/Zeeshan_Arshad.jpeg'),
(55, 'Dr. Muzammil Khurshid', 'Assistant Professor', 'Faculty', 'muzammil.khurshid@pugc.edu.pk', NULL, '../assets/img/team/faculty/Muzammil_Khurshid.jpg'),
(56, 'Dr. Wasim ul Rehman (Rana)', 'Incharge Department / Assistant Professor', 'Faculty', 'wasim.rehman@pugc.edu.pk', '+92 313 4522135, +92 343 4050646', '../assets/img/team/faculty/Wasim_ul_Rehman.jpg'),
(57, 'Waqas Rafiq', 'Lecturer', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Waqas_Rafiq.jpg'),
(58, 'Miss Rabia Iram', 'Lecturer', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Rabia_Iram.jpg'),
(59, 'Mr. Muhammad Sarfraz Khan', 'Lecturer', 'Faculty', 'sarfraz.khan@pugc.edu.pk', NULL, '../assets/img/team/faculty/Muhammad_Sarfraz_Khan.jpg'),
(60, 'Mr. Aamer Shahzad', 'Lecturer', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Aamer_Shahzad.jpg'),
(61, 'Miss Naheeda Ali', 'Assistant Professor', 'Faculty', 'naheeda.ali@pugc.edu.pk', NULL, '../assets/img/team/faculty/Naheeda_Ali.jpg'),
(62, 'Mr. Hafiz Muhammad Imran Akram', 'Incharge / Assistant Professor', 'Faculty', 'imranakram76@yahoo.com', NULL, '../assets/img/team/faculty/Hafiz_Muhammad_Imran_Akram.jpg'),
(63, 'Mr. Musarat Nawaz', 'Assistant Professor', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Musarat_Nawaz.png'),
(64, 'Mr. Bilal Ghaffar', 'Lecturer', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Bilal_Ghaffar.jpg'),
(65, 'Miss Aadila Hussain', 'Incharge / Lecturer', 'Faculty', 'aadilahussain12@gamil.com', NULL, '../assets/img/team/faculty/Aadila_Hussain.jpg'),
(66, 'Mr. Muhammad Hassan Zia', 'Assistant Professor', 'Faculty', 'hasanzia489@hotmail.com', NULL, '../assets/img/team/faculty/Muhammad_Hassan_Zia.jpg'),
(67, 'Mr. Muhammad Haris Khan', 'Lecturer', 'Faculty', NULL, NULL, ''),
(68, 'Miss Sumera Asghar Butt', 'Lecturer', 'Faculty', NULL, NULL, ''),
(69, 'Miss Maham Ijaz', 'Lecturer', 'Faculty', NULL, NULL, ''),
(70, 'Miss Affaf Asghar Butt', 'Lecturer', 'Faculty', NULL, NULL, ''),
(71, 'Mr. Muhammad Abdullah', 'Lecturer', 'Faculty', 'muhammad.abdullah@pugc.edu.pk', '0334-963879', '../assets/img/team/faculty/Muhammad_Abdullah.jpg'),
(72, 'Hafiz Ihsan Ur Rehman', 'Lecturer', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Hafiz_Ihsan_Ur_Rehman.jpg'),
(73, 'Mr. Kamran Ali', 'Lecturer', 'Faculty', NULL, NULL, '../assets/img/team/faculty/Kamran_Ali.jpg'),
(74, 'Mr. Abrar Hussain', 'Lecturer', 'Faculty', 'abrarmbm@gmail.com', NULL, '../assets/img/team/faculty/Abrar_Hussain.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `programs`
--

TRUNCATE TABLE `programs`;
--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `department_id`, `NAME`, `description`, `image_path`) VALUES
(1, 1, 'Bachelors of Banking & Finance (BBF)', 'A 4 years program that covers the fundamentals of banking, finance, and economics.', '../assets/img/courses/banking.jpg'),
(2, 1, 'Bachelors of Accounting & Finance (BAF)', 'A 4 years program that covers the fundamentals of accounting, finance, and economics.', '../assets/img/courses/banking.jpg'),
(3, 2, 'Bachelors of Business Administrations (BBA)', 'A 4 years program that covers the fundamentals of business administration, management, and marketing.', '../assets/img/courses/business.jpg'),
(4, 2, 'Masters in Business Administrations (MBA)', 'A 2 years program that covers the fundamentals of business administration and management.', '../assets/img/courses/business.jpg'),
(5, 2, 'Masters of Philosophy in Business Administrations (M.Phil)', 'A 1.5 years program that covers the advanced concepts of business administration and management.', '../assets/img/courses/business.jpg'),
(6, 3, 'Bachelors of Commerce (B.Com)', 'A 4 years program that covers the fundamentals of commerce, accounting, and economics.', '../assets/img/courses/commerce.jpg'),
(7, 3, 'Bachelors of E.Commerce (B.ECom)', 'A 4 years program that covers the fundamentals of commerce, accounting, and economics.', '../assets/img/courses/e-commerce.png'),
(8, 3, 'Masters of Commerce (M.Com)', 'A 1.5 years program that covers the advanced concepts of commerce, accounting, and economics.', '../assets/img/courses/commerce.jpg'),
(9, 3, 'Masters of Philosophy in Commerce (M.Phil)', 'A 1.5 years program that covers the advanced concepts of commerce, accounting, and economics.', '../assets/img/courses/commerce.jpg'),
(10, 4, 'Bachelors of English (BS English)', 'A 4 years program that covers the fundamentals of English language, literature, and linguistics.', '../assets/img/courses/english.jpg'),
(11, 5, 'Bachelors of Computer Science (BSCS)', 'A 4 years program that covers the fundamentals of computer science, programming, and software development.', '../assets/img/courses/cs.jpg'),
(12, 5, 'Bachelors of Information Technology (BSIT)', 'A 4 years program that covers the fundamentals of information technology, networking, and software development.', '../assets/img/courses/it.jpg'),
(13, 6, 'Bachelors of Law (LLB)', 'A 5 years program that covers the fundamentals of law, justice, and legal studies.', '../assets/img/courses/law.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty_members`
--
ALTER TABLE `faculty_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

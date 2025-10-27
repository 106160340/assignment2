-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2025 at 02:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `member_id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `project1_work` text DEFAULT NULL,
  `project2_work` text DEFAULT NULL,
  `favourite_language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`member_id`, `full_name`, `student_id`, `project1_work`, `project2_work`, `favourite_language`) VALUES
(1, 'Ali Jawid Behzad', '106188559', 'Designed and structured the About page for Project 1, ensuring consistent design, proper semantic HTML, and accessibility. Created a well-documented layout using <dl>, <figure>, and <table> elements to present team details and fun facts.', 'Responsible for Tasks 1, 2, and 7 in Project 2. Converted all static pages into PHP with reusable includes for header, navigation, and footer. Created and tested the main database connection (settings.php). Developed the dynamic About page integrated with MySQL, displaying team contributions from both projects.', 'Java – زبان قوی برای ساختار (A strong language for'),
(2, 'Yitian Yuan', '106160340', 'Created the Apply page and job application form for Project 1 with proper form validation, fieldsets, and accessibility labels. Integrated client-side testing with formtest.php and ensured semantic markup.', 'Handled Task 5 in Project 2, implementing process_eoi.php for backend validation and database insertion of job applications. Ensured secure form handling and sanitisation on the server side.', 'Python – 编程的艺术 (The art of coding)'),
(3, 'Yousaff Mohammad', '106175315', 'Developed the Jobs page for Project 1 with realistic job postings, semantic structure, and well-organised lists and asides for clarity and readability.', 'Responsible for Task 6 in Project 2, building a database-driven Jobs page (jobs.php) that dynamically renders job listings from the MySQL jobs table.', 'C++ – البرمجة عالية الأداء (High performance progr'),
(4, 'Ayon Ahammed', '105962794', 'Created the Index page (homepage) for Project 1, including the hero image, overview section, and navigation structure. Focused on layout consistency and responsive design.', 'Handled Tasks 3 and 4 in Project 2, developing process_eoi.php and manage.php functionalities, enabling HR management and form submissions to connect with the eoi database table.', 'JavaScript – প্রযুক্তির ভাষা (The language of inte');

-- --------------------------------------------------------

--
-- Table structure for table `essential`
--

CREATE TABLE `essential` (
  `esse_id` int(11) NOT NULL,
  `esse_item` varchar(255) DEFAULT NULL,
  `ref_num` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essential`
--

INSERT INTO `essential` (`esse_id`, `esse_item`, `ref_num`) VALUES
(1, 'Certificate IV in School Based Education Support or Certificate IV in Information Technology. ', 'DLS15'),
(2, 'Experience with handling digital learning platforms like a Learning Management System. ', 'DLS15'),
(3, 'Strong Communications skills paired with problem-solving skills.', 'DLS15'),
(4, 'Certificate IV in School Based Education Support or Certificate IV in Information Technology. ', 'RA025'),
(5, 'Experience with handling digital learning platforms like a Learning Management System. ', 'RA025'),
(6, 'Strong Communications skills paired with problem-solving skills. ', 'RA025'),
(7, 'Strong research methodology knowledge.', 'RA025');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `title` text NOT NULL,
  `ref_num` varchar(5) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `report_line` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`title`, `ref_num`, `salary`, `report_line`, `description`, `index`) VALUES
('Digital Learning Support Officer', 'DLS15', 70000, 'Head of Digital Learning', 'Provide support for online learning platforms. You are tasked with ensuring staff and students have constant access to digital tool, resources, and effective training to ensure the teaching and learning experience is optimal.', 1),
('Research Assistant', 'RA025', 60000, 'Senior Lecturer in Digital Education', 'Assist academic staff with any research projects relating to digital learning. This involves gathering and analysing data, reviewing online learning content, and providing support for preparation of digital learning content with research for needed material.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `preferable`
--

CREATE TABLE `preferable` (
  `pref_id` int(11) NOT NULL,
  `pref_item` varchar(255) DEFAULT NULL,
  `ref_num` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferable`
--

INSERT INTO `preferable` (`pref_id`, `pref_item`, `ref_num`) VALUES
(1, 'Coding skills using Python, HTML/CSS, JavaScript and using API. ', 'DLS15'),
(2, 'Driver\'s Licence. ', 'DLS15'),
(3, 'Microsoft Office Skills.', 'DLS15'),
(4, 'Bachelor’s degree in Education, Information Technology or any other related fields. ', 'RA025'),
(5, 'Coding skills using Python, HTML/CSS, JavaScript and using API. ', 'RA025'),
(6, 'Driver\'s Licence.', 'RA025'),
(7, 'Microsoft Office Skills.', 'RA025'),
(8, 'Experience with data analysis software (SPSS Or R).', 'RA025');

-- --------------------------------------------------------

--
-- Table structure for table `responsibility`
--

CREATE TABLE `responsibility` (
  `resp_id` int(11) NOT NULL,
  `resp_item` varchar(255) DEFAULT NULL,
  `ref_num` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responsibility`
--

INSERT INTO `responsibility` (`resp_id`, `resp_item`, `ref_num`) VALUES
(1, 'Assist University staff with creation and delivery of digital learning content.', 'DLS15'),
(2, 'Maintain and update online learning platforms.', 'DLS15'),
(3, 'Provide training to academic staff and students in learning online platforms.', 'DLS15'),
(4, 'Support academic staff with research activities. ', 'RA025'),
(5, 'Support with qualitative and quantitative data analysis. ', 'RA025'),
(6, 'Collect, filter, and organize research data from various sources. ', 'RA025'),
(7, 'Assist with academic staff with creating and finalizing research reports.', 'RA025');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT 'tempuser'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password_hash`, `role`, `username`) VALUES
(1, '$2y$10$emi.Wb/i4hWy1C6eiRgXlOxXvBSg2RXxo3sNwe16kJ8g0ezlB8AYe', 'admin', 'admin'),
(2, '$2y$10$HKg6gwxrL7Ogzut5McHbi.70ZazEBZzHKetO4k9L1ADtDfd1eIqSC', 'user', 'yitian'),
(3, '$2y$10$Vc3LrzKj2tR.3d8NtvQkCu3AB/hi50VWghc7bb7bfquXJ4FOcJk3u', 'user', 'player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `essential`
--
ALTER TABLE `essential`
  ADD PRIMARY KEY (`esse_id`),
  ADD KEY `ref_num` (`ref_num`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`ref_num`),
  ADD KEY `INDEX` (`index`);

--
-- Indexes for table `preferable`
--
ALTER TABLE `preferable`
  ADD PRIMARY KEY (`pref_id`),
  ADD KEY `ref_num` (`ref_num`);

--
-- Indexes for table `responsibility`
--
ALTER TABLE `responsibility`
  ADD PRIMARY KEY (`resp_id`),
  ADD KEY `ref_num` (`ref_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essential`
--
ALTER TABLE `essential`
  MODIFY `esse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `preferable`
--
ALTER TABLE `preferable`
  MODIFY `pref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `responsibility`
--
ALTER TABLE `responsibility`
  MODIFY `resp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `essential`
--
ALTER TABLE `essential`
  ADD CONSTRAINT `essential_ibfk_1` FOREIGN KEY (`ref_num`) REFERENCES `jobs` (`ref_num`);

--
-- Constraints for table `preferable`
--
ALTER TABLE `preferable`
  ADD CONSTRAINT `preferable_ibfk_1` FOREIGN KEY (`ref_num`) REFERENCES `jobs` (`ref_num`);

--
-- Constraints for table `responsibility`
--
ALTER TABLE `responsibility`
  ADD CONSTRAINT `responsibility_ibfk_1` FOREIGN KEY (`ref_num`) REFERENCES `jobs` (`ref_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

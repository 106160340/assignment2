-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 09:31 AM
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
-- Database: `project2_db`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

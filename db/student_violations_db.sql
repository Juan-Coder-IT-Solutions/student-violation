-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 09:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_violations_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`course_id`, `course_name`, `date_added`) VALUES
(2, 'Bachelor of Science in Information Technology', '2024-05-26 22:06:39'),
(3, 'Bachelor of Science in Information System', '2024-05-26 22:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offenses`
--

CREATE TABLE `tbl_offenses` (
  `offense_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `offense_remarks` text NOT NULL,
  `discplinary_action` text NOT NULL,
  `offense_date` datetime NOT NULL DEFAULT current_timestamp(),
  `offense_status` int(1) NOT NULL COMMENT '1- cleared ; 0 - not cleared',
  `cleared_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_offenses`
--

INSERT INTO `tbl_offenses` (`offense_id`, `student_id`, `violation_id`, `offense_remarks`, `discplinary_action`, `offense_date`, `offense_status`, `cleared_by`, `date_added`) VALUES
(5, 27, 4, 'On January 15, 2024, at 10:30 AM, Felix Ortega caused a disturbance during a lecture by making loud noises and ignoring the instructor\'s warnings.', 'The student will receive a formal warning and be reminded of the institution’s code of conduct.', '2025-01-15 00:00:00', 1, 2, '2025-01-21 16:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_id` int(11) NOT NULL,
  `student_fname` varchar(50) NOT NULL,
  `student_mname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `student_fname`, `student_mname`, `student_lname`, `student_email`, `year_level`, `course_id`, `section`, `user_id`, `date_added`) VALUES
(12, 'Ana', 'Pimentel', 'Alonzo', 'ana.pimentel@gmail.com', 'First Year', 2, 'A', 18, '2025-01-21 16:39:29'),
(13, 'Maria Kate', 'Cruz', 'Paz', 'mariakate.cruz@gmail.com', 'First Year', 2, 'A', 19, '2025-01-21 16:39:29'),
(14, 'Keno', 'Dela Cruz', 'Santos', 'juan.santos@example.com', 'First Year', 2, 'B', 20, '2025-01-21 16:39:29'),
(15, 'Maria Clara', 'Reyes', 'Hernandez', 'mariaclara.reyes@example.com', 'First Year', 2, 'C', 21, '2025-01-21 16:39:29'),
(16, 'Carlos', 'Lopez', 'Garcia', 'carlos.lopez@example.com', 'First Year', 2, 'C', 22, '2025-01-21 16:39:29'),
(17, 'Emilia', 'Ana', 'Alvarez', 'emilia.alvarez@example.com', 'First Year', 2, 'A', 23, '2025-01-21 16:39:29'),
(18, 'Marcos', 'Esteban', 'Bautista', 'marcos.bautista@example.com', 'First Year', 2, 'B', 24, '2025-01-21 16:39:29'),
(19, 'Sofia', 'Gracia', 'Hernandez', 'sofia.hernandez@example.com', 'First Year', 2, 'C', 25, '2025-01-21 16:39:29'),
(20, 'David', 'Lee', 'Tomas', 'david.tomas@example.com', 'First Year', 2, 'C', 26, '2025-01-21 16:39:29'),
(21, 'Olivia', 'Grace', 'Villanueva', 'olivia.villanueva@example.com', 'First Year', 2, 'A', 27, '2025-01-21 16:39:29'),
(22, 'Andres', 'Santiago', 'Reyes', 'andres.reyes@example.com', 'Second Year', 2, 'A', 28, '2025-01-21 16:40:58'),
(23, 'Beatriz', 'Maria', 'Cruz', 'beatriz.cruz@example.com', 'Second Year', 2, 'B', 29, '2025-01-21 16:40:58'),
(24, 'Carlo', 'Luis', 'Valdez', 'carlo.valdez@example.com', 'Third Year', 2, 'C', 30, '2025-01-21 16:42:19'),
(25, 'Daniel', 'Jose', 'Santos', 'daniel.santos@example.com', 'Fourth Year', 2, 'D', 31, '2025-01-21 16:43:00'),
(26, 'Erika', 'Luz', 'Mendoza', 'erika.mendoza@example.com', 'Fourth Year', 2, 'A', 32, '2025-01-21 16:43:00'),
(27, 'Felix', 'Xavier', 'Ortega', 'felix.ortega@example.com', 'First Year', 3, 'B', 33, '2025-01-21 16:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_category` varchar(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_category`, `username`, `password`, `date_added`) VALUES
(2, 'Juan', '', 'Dela Cruz', 'A', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2024-05-26 19:56:25'),
(18, 'Ana', 'Pimentel', 'Alonzo', 'S', 'ana', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(19, 'Maria Kate', 'Cruz', 'Paz', 'S', 'maria kate', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(20, 'Keno', 'Dela Cruz', 'Santos', 'S', 'keno', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(21, 'Maria Clara', 'Reyes', 'Hernandez', 'S', 'maria clara', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(22, 'Carlos', 'Lopez', 'Garcia', 'S', '', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(23, 'Emilia', 'Ana', 'Alvarez', 'S', 'emilia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(24, 'Marcos', 'Esteban', 'Bautista', 'S', 'marcos', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(25, 'Sofia', 'Gracia', 'Hernandez', 'S', 'sofia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(26, 'David', 'Lee', 'Tomas', 'S', '', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(27, 'Olivia', 'Grace', 'Villanueva', 'S', 'olivia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
(28, 'Andres', 'Santiago', 'Reyes', 'S', 'andres', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:40:58'),
(29, 'Beatriz', 'Maria', 'Cruz', 'S', 'beatriz', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:40:58'),
(30, 'Carlo', 'Luis', 'Valdez', 'S', 'carlo1', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:42:19'),
(31, 'Daniel', 'Jose', 'Santos', 'S', 'daniel', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:00'),
(32, 'Erika', 'Luz', 'Mendoza', 'S', 'erika', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:00'),
(33, 'Felix', 'Xavier', 'Ortega', 'S', 'felix', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_violations`
--

CREATE TABLE `tbl_violations` (
  `violation_id` int(11) NOT NULL,
  `violation_name` varchar(100) NOT NULL,
  `violation_desc` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_violations`
--

INSERT INTO `tbl_violations` (`violation_id`, `violation_name`, `violation_desc`, `date_added`) VALUES
(2, 'Academic Dishonesty', 'This includes cheating on exams, plagiarism, falsifying academic records, or using unauthorized materials during exams or assignments.', '2024-05-26 22:15:55'),
(3, 'Bullying or Harassment', 'Any form of bullying, whether physical, verbal, emotional, or online, that targets an individual or group.', '2024-05-26 22:16:21'),
(4, 'Disruptive Behavior', 'Engaging in behavior that disrupts the learning environment, such as talking loudly in class, using phones during lectures, or creating disturbances.', '2025-01-21 16:27:07'),
(5, 'Substance Abuse', 'Possession, distribution, or consumption of illegal drugs, alcohol, or any prohibited substances on campus.', '2025-01-21 16:27:25'),
(6, 'Vandalism', 'Damaging or defacing school property, including graffiti, broken windows, or destroyed facilities.', '2025-01-21 16:28:01'),
(7, 'Theft', 'Stealing or attempting to steal personal or university property.', '2025-01-21 16:28:17'),
(8, 'Unauthorized Use of Campus Facilities', 'Using university facilities (e.g., classrooms, labs, dormitories) without permission or outside the approved hours.', '2025-01-21 16:28:31'),
(9, 'Violation of Dress Code', 'Wearing inappropriate clothing that goes against the university\'s dress code policy.', '2025-01-21 16:28:52'),
(10, 'Smoking in Prohibited Areas', 'Smoking in areas where it is not permitted, such as in classrooms, libraries, or dormitories.', '2025-01-21 16:29:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_offenses`
--
ALTER TABLE `tbl_offenses`
  ADD PRIMARY KEY (`offense_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_violations`
--
ALTER TABLE `tbl_violations`
  ADD PRIMARY KEY (`violation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_offenses`
--
ALTER TABLE `tbl_offenses`
  MODIFY `offense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_violations`
--
ALTER TABLE `tbl_violations`
  MODIFY `violation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

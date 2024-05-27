-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 01:00 PM
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
  `offense_remarks` text NOT NULL,
  `offense_date` datetime NOT NULL DEFAULT current_timestamp(),
  `offense_status` varchar(1) NOT NULL COMMENT '1- cleared ; 0 - not cleared',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_offenses`
--

INSERT INTO `tbl_offenses` (`offense_id`, `student_id`, `offense_remarks`, `offense_date`, `offense_status`, `date_added`) VALUES
(1, 3, '', '2024-05-27 00:00:00', '1', '2024-05-27 11:09:52'),
(2, 2, '', '2024-05-27 00:00:00', '', '2024-05-27 11:36:40'),
(3, 2, '', '2024-05-27 00:00:00', '', '2024-05-27 11:39:26'),
(4, 2, '', '2024-05-27 00:00:00', '', '2024-05-27 16:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offense_details`
--

CREATE TABLE `tbl_offense_details` (
  `od_id` int(11) NOT NULL,
  `offense_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_id` int(11) NOT NULL,
  `student_fname` varchar(50) NOT NULL,
  `student_mname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `student_fname`, `student_mname`, `student_lname`, `year_level`, `course_id`, `section`, `user_id`, `date_added`) VALUES
(2, 'Mary Anne', 'Lastimosa', 'Cruz', 'Second Year', 2, 'A', 0, '2024-05-27 09:46:42'),
(3, 'Pepe', 'Santos', 'Uy', 'First Year', 2, 'A', 5, '2024-05-27 10:14:05');

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
(3, 'Pepe', 'Santos', 'Uy', 'S', 'student', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 09:44:08'),
(4, 'a', 'a', 'a', 'S', 'a', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 09:46:42'),
(5, 'Pepe', 'Santos', 'Uy', 'S', 'student', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 10:14:05');

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
(2, 'Cheating', '', '2024-05-26 22:15:55'),
(3, 'Truancy', 'Skipping classes without a valid reason.\r\nExcessive tardiness.\r\nConsequences: Detention, parental notification, loss of privileges, in-school suspension.', '2024-05-26 22:16:21');

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
-- Indexes for table `tbl_offense_details`
--
ALTER TABLE `tbl_offense_details`
  ADD PRIMARY KEY (`od_id`);

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
  MODIFY `offense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_offense_details`
--
ALTER TABLE `tbl_offense_details`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_violations`
--
ALTER TABLE `tbl_violations`
  MODIFY `violation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

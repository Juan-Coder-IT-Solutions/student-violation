-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2025 at 05:37 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u814036432_sv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`course_id`, `course_name`, `date_added`) VALUES
(2, 'Bachelor of Science in Information Technology', '2024-05-26 22:06:39'),
(3, 'Bachelor of Science in Information System', '2024-05-26 22:06:48'),
(5, 'Bachelor of Science in Electronics Engineering', '2025-01-30 19:06:43'),
(6, 'Bachelor of Science in Computer Engineering', '2025-01-31 00:46:22'),
(7, 'Bachelor of Technical Vocational Teacher Education', '2025-01-31 00:47:12'),
(8, 'Bachelor of Science in Industrial Technology', '2025-01-31 03:05:34'),
(9, 'Bachelor of Science in Food Technogy', '2025-01-31 12:20:25');

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
  `offense_date` date NOT NULL DEFAULT current_timestamp(),
  `offense_status` int(1) NOT NULL COMMENT '1- cleared ; 0 - not cleared',
  `offense_type` varchar(10) NOT NULL DEFAULT '',
  `cleared_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_offenses`
--

INSERT INTO `tbl_offenses` (`offense_id`, `student_id`, `violation_id`, `offense_remarks`, `discplinary_action`, `offense_date`, `offense_status`, `offense_type`, `cleared_by`, `date_added`) VALUES
(5, 15, 3, 'On January 15, 2025, at 10:30 AM,  the student caused a disturbance during a lecture by making loud noises and ignoring the instructor\'s warnings.', 'The student will receive a formal warning and be reminded of the institution’s code of conduct.', '2025-01-17', 1, 'Minor', 2, '2025-01-21 16:48:34'),
(6, 27, 11, 'A student was reported for writing graffiti on university property.', 'Cleaning of vandalized area\r\nCommunity service (10 hours)\r\nWritten warning', '2025-01-21', 0, 'Minor', 0, '2025-01-21 18:57:26'),
(7, 30, 22, 'Student used inappropriate language toward a faculty member during class on Jan. 21, 2025.', 'Apology letter to faculty member\r\nParental notification', '2025-01-21', 0, 'Major', 0, '2025-01-21 19:13:17'),
(8, 14, 43, 'Student repeatedly sent derogatory messages to a classmate via social media, causing emotional distress.', 'Counseling sessions for both parties involved\r\nWritten apology to the victim\r\nTwo-week suspension\r\nParental notification', '2025-01-21', 0, 'Major', 0, '2025-01-21 19:15:35'),
(9, 53, 29, 'Student was caught taking another student\'s unattended mobile phone in the library without permission.', 'The student is required to return the stolen item and issue a formal written apology to the victim. A one-month suspension will be imposed, during which the student must complete a restorative justice program focusing on accountability and respect for others\' property. The parents or guardians of the student will be informed, and the student will be placed under probation for the remainder of the semester.', '2025-01-21', 0, 'Major', 0, '2025-01-21 19:17:27'),
(10, 31, 14, 'Student was observed entering the university premises on January 15, 2025, wearing inappropriate attire that did not conform to the university\'s prescribed dress code policy.', 'The student received a verbal warning and was advised to change into proper attire before attending classes. A record of the violation has been noted, and repeated offenses will result in a formal written warning and possible restriction from campus access until compliance is ensured.', '2025-01-15', 0, 'Minor', 0, '2025-01-15 19:22:39'),
(12, 29, 2, 'To make clarifications for the incidence the student have an one one discussion between the student and the discipline officers.', 'She was advise to send an apology letter to the adviser\r\nVerbal warning', '2025-01-30', 0, 'Minor', 0, '2025-01-31 03:48:33');

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
  `gender` varchar(10) NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `student_fname`, `student_mname`, `student_lname`, `student_email`, `gender`, `year_level`, `course_id`, `section`, `user_id`, `date_added`) VALUES
(14, 'Keno', 'Dela Cruz', 'Santos', 'kenodela21@gmail.com', 'Male', 'First Year', 2, 'A', 20, '2025-01-21 16:39:29'),
(15, 'Maria Clara', 'Reyes', 'Hernandez', 'mariaclara.reyes@gmail.com', 'Female', 'Fourth Year', 2, 'C', 21, '2025-01-21 16:39:29'),
(27, 'Felix', 'Xavier', 'Ortega', 'felix@gmail.com', 'Male', 'Second Year', 3, 'B', 33, '2025-01-21 16:43:43'),
(29, 'Mary Joy', 'Gonzales', 'Cornel', 'maryjoycornel18@gmail.com', 'Female', 'Fourth Year', 5, 'B', 36, '2025-01-30 19:08:54'),
(30, 'Bryan', 'Villanueva', 'Pabillo', 'bryanpab07@gmail.com', 'Male', 'Second Year', 5, 'B', 37, '2025-01-30 19:22:01'),
(31, 'Arlyn', 'Vargas', 'Artus', 'arlynartus@gmail.com', 'Female', 'Fourth Year', 3, 'B', 38, '2025-01-30 23:58:53'),
(36, 'Eda', 'Hue', 'Yanong', 'edahue61@gmail.com', 'Female', 'Second Year', 3, 'A', 44, '2025-01-31 03:10:01'),
(37, 'Sara', 'Reyes', 'Santos', 'sarasantos034@gmail.com', 'Female', 'Fourth Year', 3, 'B', 45, '2025-01-31 03:10:01'),
(39, 'Rachell', 'Cuz', 'Alfonso', 'rachellcruz834@gamil.com', 'Female', 'Fourth Year', 3, 'B', 47, '2025-01-31 03:10:01'),
(44, 'Micah', 'Ortega', 'Aldas', 'micahaldas333@gmail.com', 'Female', 'Third Year', 7, 'C', 52, '2025-01-31 04:02:15'),
(53, 'Lucille', 'Alipin', 'Limsiaco', 'limsiacolucille23@gmail.com', 'Female', 'Second Year', 8, 'A', 61, '2025-01-31 10:43:30'),
(54, 'Juan', 'Gino', 'Villanueva', 'juanvillanueva34@gmail.com', 'Male', 'Second Year', 3, 'B', 62, '2025-01-31 12:22:26'),
(55, 'Danica', 'Collins', 'Joyce', 'Danicacollins45@gmail.com', 'Female', 'Second Year', 3, 'B', 63, '2025-01-31 12:22:26'),
(56, 'Sofia', 'Blaster', 'Oy', 'sofiaoy23@gmail.com', 'Female', 'Second Year', 3, 'B', 64, '2025-01-31 12:22:26'),
(57, 'Mark', 'Santos', 'Simon', 'marksimon256@gmail.com', 'Male', 'Second Year', 3, 'B', 65, '2025-01-31 12:22:26'),
(58, 'Daniel', 'Divina', 'Fernandez', 'daneilfer193@gamil.com', 'Male', 'Second Year', 3, 'B', 66, '2025-01-31 12:22:26'),
(59, 'Roy', 'Reyes', 'Tan', 'oliviareyes654@gamil.com', 'Male', 'Second Year', 3, 'B', 67, '2025-01-31 12:22:26'),
(60, 'Laura', 'Treyes', 'Mendoza', 'lauramendoza562@gmail.com', 'Female', 'Second Year', 3, 'B', 68, '2025-01-31 12:22:26'),
(61, 'Ethan', 'Tom', 'Reyes', 'ethanreyes345@gmail.com', 'Male', 'Second Year', 3, 'B', 69, '2025-01-31 12:22:26');

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
  `user_email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_category`, `user_email`, `username`, `password`, `date_added`, `otp`) VALUES
(18, 'Ana', 'Pimentel', 'Alonzo', 'S', 'ana@gmail.com', 'ana', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(19, 'Maria Kate', 'Cruz', 'Paz', 'S', 'jacildokaye@gmail.com', 'kate', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', '426389'),
(20, 'Keno', 'Dela Cruz', 'Santos', 'S', 'kenodela21@gmail.com', 'keno', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(21, 'Maria Clara', 'Reyes', 'Hernandez', 'S', 'mariaclara.reyes@gmail.com', 'mariaclara', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(22, 'Carlos', 'Lopez', 'Garcia', 'S', 'lopez@gmail.com', 'lopez', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(23, 'Emilia', 'Ana', 'Alvarez', 'S', 'emilia@gmail.com', 'emilia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(24, 'Marcos', 'Esteban', 'Bautista', 'S', 'arlynartus@gmail.com', 'marcos', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(25, 'Sofia', 'Gracia', 'Hernandez', 'S', 'sofia@gmail.com', 'sofia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(26, 'David', 'Lee', 'Tomas', 'S', 'davidleeeee@gmail.com', 'david', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(27, 'Olivia', 'Grace', 'Villanueva', 'S', 'olivia.villanueva@example.com', 'olivia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29', ''),
(28, 'Andres', 'Santiago', 'Reyes', 'S', 'arlynartus@gmail.com', 'andres', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:40:58', ''),
(29, 'Beatriz', 'Maria', 'Cruz', 'S', 'arlynartus@gmail.com', 'beatriz', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:40:58', ''),
(30, 'Carlo', 'Luis', 'Valdez', 'S', 'arlynartus@gmail.com', 'carlo1', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:42:19', ''),
(31, 'Daniel', 'Jose', 'Santos', 'S', 'maryjoycornel18@gmail.com', 'daniel', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:00', ''),
(32, 'Erika', 'Luz', 'Mendoza', 'S', 'maryjoycornel18@gmail.com', 'erika', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:00', ''),
(33, 'Felix', 'Xavier', 'Ortega', 'S', 'felix@gmail.com', 'felix', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:43', '744313'),
(34, 'test', 'tes', 'test', 'S', 'qweqwe@gmail.com', 'test', '098f6bcd4621d373cade4e832627b4f6', '2025-01-29 14:30:56', ''),
(35, 'Anelia', 'B.', 'Bascos', 'A', '', 'anelia', 'dd34cede98607b6380f94cc5a86453bb', '2025-01-30 19:07:56', ''),
(36, 'Mary Joy', 'Gonzales', 'Cornel', 'S', 'maryjoycornel18@gmail.com', 'mary joy', '2d469af420bafc2be5a1f8969db5d01a', '2025-01-30 19:08:54', ''),
(37, 'Bryan', 'Villanueva', 'Pabillo', 'S', 'bryanpab07@gmail.com', 'bryanpabs', '928530470dada2a9d3a8c24217efecd2', '2025-01-30 19:22:01', ''),
(38, 'Arlyn', 'Vargas', 'Artus', 'S', 'arlynartus@gmail.com', 'arlynartus', '129cf86091b9133e1f6db6eed5fce827', '2025-01-30 23:58:53', '246178'),
(39, 'Melanie', 'M.', 'Reynoso', 'A', '', 'Melanie ', '1c963c8a9ad7d8ff5e325623e66c23e3', '2025-01-31 03:06:37', ''),
(40, 'Lucille', 'Alipin', 'Limsiaco', 'S', 'limsiacolucille23@gmail.com', 'limsiaco879', '81aa086c7bef081731281c4f871ab25e', '2025-01-31 03:10:01', ''),
(41, 'Juan', 'Gino', 'Villanueva', 'S', 'juanvillanueva34@gmail.com', 'Juan890', '6dbc06b32be4aa03d2fdd76c0770b0f4', '2025-01-31 03:10:01', ''),
(42, 'Danica', 'Collins', 'Joyce', 'S', 'Danicacollins45@gmail.com', 'dan934', 'b2440215caa3cb85a5aa846f37047f19', '2025-01-31 03:10:01', ''),
(43, 'Sofia', 'Blaster', 'Oy', 'S', 'sofiaoy23@gmail.com', 'sofi456', 'd4b290eb07669bba643b4c18f4c359f4', '2025-01-31 03:10:01', ''),
(44, 'Eda', 'Hue', 'Yanong', 'S', 'edahue61@gmail.com', 'eda743', '1c847a62e7b331a1df550e58248c71b7', '2025-01-31 03:10:01', ''),
(45, 'Sara', 'Reyes', 'Santos', 'S', 'sarasantos034@gmail.com', 'vc876', 'ec0bf960b9a4fb2f987bb6b52d41e154', '2025-01-31 03:10:01', ''),
(46, 'Mark', 'Santos', 'Simon', 'S', 'marksimon256@gmail.com', 'op233', 'bb045487105cc268b8e231c5ea528f18', '2025-01-31 03:10:01', ''),
(47, 'Rachell', 'Cuz', 'Alfonso', 'S', 'rachellcruz834@gamil.com', 'as754', 'ecc9087d409dd27cb660ffa8ba262d5b', '2025-01-31 03:10:01', ''),
(48, 'Daniel', 'Divina', 'Fernandez', 'S', 'daneilfer193@gamil.com', 'ew546', '4a4d2b5c68dbc03d0b14fc2ea1a988a4', '2025-01-31 03:10:01', ''),
(49, 'Roy', 'Reyes', 'Tan', 'S', 'oliviareyes654@gamil.com', 'roy573', 'a0b20da0b2d8b7add344468256724da5', '2025-01-31 03:10:01', ''),
(50, 'Laura', 'Treyes', 'Mendoza', 'S', 'lauramendoza562@gmail.com', 'laura784', 'f88a148dd53fc7658b0d336a60f1c1e0', '2025-01-31 03:10:01', ''),
(51, 'Ethan', 'Tom', 'Reyes', 'S', 'ethanreyes345@gmail.com', 'Ethan654', 'e375c00c43f4e44c66039f6f0b26528e', '2025-01-31 03:10:01', ''),
(52, 'Micah', 'Ortega', 'Aldas', 'S', 'micahaldas333@gmail.com', 'Micah Aldas', '76c3e17120cd08e4ce398a51ffa28ac7', '2025-01-31 04:02:15', ''),
(53, 'Juan', 'Gino', 'Villanueva', 'S', 'juanvillanueva34@gmail.com', 'Juan890', '6dbc06b32be4aa03d2fdd76c0770b0f4', '2025-01-31 04:08:49', ''),
(54, 'Danica', 'Collins', 'Joyce', 'S', 'Danicacollins45@gmail.com', 'dan934', 'b2440215caa3cb85a5aa846f37047f19', '2025-01-31 04:08:49', ''),
(55, 'Sofia', 'Blaster', 'Oy', 'S', 'sofiaoy23@gmail.com', 'sofi456', 'd4b290eb07669bba643b4c18f4c359f4', '2025-01-31 04:08:49', ''),
(56, 'Mark', 'Santos', 'Simon', 'S', 'marksimon256@gmail.com', 'op233', 'bb045487105cc268b8e231c5ea528f18', '2025-01-31 04:08:49', ''),
(57, 'Daniel', 'Divina', 'Fernandez', 'S', 'daneilfer193@gamil.com', 'ew546', '4a4d2b5c68dbc03d0b14fc2ea1a988a4', '2025-01-31 04:08:49', ''),
(58, 'Roy', 'Reyes', 'Tan', 'S', 'oliviareyes654@gamil.com', 'roy573', 'a0b20da0b2d8b7add344468256724da5', '2025-01-31 04:08:49', ''),
(59, 'Laura', 'Treyes', 'Mendoza', 'S', 'lauramendoza562@gmail.com', 'laura784', 'f88a148dd53fc7658b0d336a60f1c1e0', '2025-01-31 04:08:49', ''),
(60, 'Ethan', 'Tom', 'Reyes', 'S', 'ethanreyes345@gmail.com', 'Ethan654', 'e375c00c43f4e44c66039f6f0b26528e', '2025-01-31 04:08:49', ''),
(61, 'Lucille', 'Alipin', 'Limsiaco', 'S', 'limsiacolucille23@gmail.com', 'lucillelimsiaco', '450cf60fcf9ee54294320baa1a64d57a', '2025-01-31 10:43:30', ''),
(62, 'Juan', 'Gino', 'Villanueva', 'S', 'juanvillanueva34@gmail.com', 'Juan890', '6dbc06b32be4aa03d2fdd76c0770b0f4', '2025-01-31 12:22:26', ''),
(63, 'Danica', 'Collins', 'Joyce', 'S', 'Danicacollins45@gmail.com', 'dan934', 'b2440215caa3cb85a5aa846f37047f19', '2025-01-31 12:22:26', ''),
(64, 'Sofia', 'Blaster', 'Oy', 'S', 'sofiaoy23@gmail.com', 'sofi456', 'd4b290eb07669bba643b4c18f4c359f4', '2025-01-31 12:22:26', ''),
(65, 'Mark', 'Santos', 'Simon', 'S', 'marksimon256@gmail.com', 'op233', 'bb045487105cc268b8e231c5ea528f18', '2025-01-31 12:22:26', ''),
(66, 'Daniel', 'Divina', 'Fernandez', 'S', 'daneilfer193@gamil.com', 'ew546', '4a4d2b5c68dbc03d0b14fc2ea1a988a4', '2025-01-31 12:22:26', ''),
(67, 'Roy', 'Reyes', 'Tan', 'S', 'oliviareyes654@gamil.com', 'roy573', 'a0b20da0b2d8b7add344468256724da5', '2025-01-31 12:22:26', ''),
(68, 'Laura', 'Treyes', 'Mendoza', 'S', 'lauramendoza562@gmail.com', 'laura784', 'f88a148dd53fc7658b0d336a60f1c1e0', '2025-01-31 12:22:26', ''),
(69, 'Ethan', 'Tom', 'Reyes', 'S', 'ethanreyes345@gmail.com', 'Ethan654', 'e375c00c43f4e44c66039f6f0b26528e', '2025-01-31 12:22:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_violations`
--

CREATE TABLE `tbl_violations` (
  `violation_id` int(11) NOT NULL,
  `violation_name` varchar(100) NOT NULL,
  `violation_desc` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_violations`
--

INSERT INTO `tbl_violations` (`violation_id`, `violation_name`, `violation_desc`, `date_added`) VALUES
(2, 'Leaving/entering the room without permission from the instructor while the class is going on', 'The student was seen leaving the classroom during class hours without the adviser\'s consent.', '2024-05-26 22:15:55'),
(3, 'Lottering, intentionally disturbing classes by shouting, chanting, talking aloud, or singing in corr', '', '2024-05-26 22:16:21'),
(4, 'Text, messaging, and gaming on cell phones during class hours', '', '2025-01-21 16:27:07'),
(5, 'Sitting on the steps/stairways', '', '2025-01-21 16:27:25'),
(6, 'Gambling within the school premises', '', '2025-01-21 16:28:01'),
(7, 'Unauthorized selling of tickets, and, or initiating or participating in fundraising campaign without', '', '2025-01-21 16:28:17'),
(8, 'Posting printed materials in the school without the approval of the school officials', '', '2025-01-21 16:28:31'),
(9, 'Unauthorized or illegitimate use of classrooms, halls, and laboratories outside of class sessions an', '', '2025-01-21 16:28:52'),
(10, 'Oral announcements, campaigns, and other forms of propaganda conducted in the classrooms, halls, lab', '', '2025-01-21 16:29:25'),
(11, 'Violating the regulative signs (e.g., No smoking, No sitting on the stairway, proper waste disposal,', '', '2025-01-31 03:24:50'),
(12, 'Public display of intimacy', '', '2025-01-31 03:24:58'),
(13, 'Sitting on the tables and the armchairs of the classrooms, halls, and laboratories', '', '2025-01-31 03:25:06'),
(14, 'Violation of dress code regulation during washday', '', '2025-01-31 03:25:14'),
(15, 'Failure to claim confiscated ID within one day', '', '2025-01-31 03:25:27'),
(16, 'Wearing earrings of male and multiple earrings of female', '', '2025-01-31 03:25:36'),
(17, 'Loud colored hair', '', '2025-01-31 03:25:45'),
(18, 'Deliberate blocking of stairways and doors', '', '2025-01-31 03:25:55'),
(19, 'Refusal to undergo drug testing', '', '2025-01-31 03:26:04'),
(20, 'Violence and physical assault/injury caused by fighting inside/outside the school', '', '2025-01-31 03:30:55'),
(21, 'Cheating during the examinations, test, or quiz a quarrel', '', '2025-01-31 03:31:05'),
(22, 'Disrespecting or molesting faculty members by ridiculing, mocking, or instigating entering the campu', '', '2025-01-31 03:31:15'),
(23, 'Preventing or threatening students, faculty members, or school authorities from personnel to obtain ', '', '2025-01-31 03:31:27'),
(24, 'Bribery in any form, such as giving gifts to teachers and other school officials and the social, mor', '', '2025-01-31 03:31:36'),
(25, 'Possession and distribution of banned articles that are damaging or detrimental to acts of lasciviou', '', '2025-01-31 03:31:46'),
(26, 'Sexual harassment, in any form, as defined according to R.A. 7877 (An Act Declaring Sexual Harassmen', '', '2025-01-31 03:31:57'),
(27, 'Slander/Libel such as uttering defamatory, slanderous, and libelous statements/reputation of another', '', '2025-01-31 03:32:06'),
(28, 'Gossiping or rumor-mongering with the malicious intention of destroying the individuals affiliated d', '', '2025-01-31 03:32:17'),
(29, 'Stealing monetary or material goods, personal belongings, school property, or from in authority', '', '2025-01-31 03:32:29'),
(30, 'Gross and deliberate discourtesy to any school official, faculty member, or person', '', '2025-01-31 03:32:40'),
(31, 'Rape and attempted rape', '', '2025-01-31 03:32:48'),
(32, 'Swindling, community fraud, and issuance of bouncing a check to any member of the school degrade or ', '', '2025-01-31 03:32:58'),
(33, 'Hazing or inflicting physical or mental harm and, or illicit initiation for admission to any organiz', '', '2025-01-31 03:33:11'),
(34, 'Forcible and, or unauthorized entry into the school premises 35. Bringing of liquors and/or entering', '', '2025-01-31 03:33:21'),
(35, 'Processing, selling, using, or taking prohibited drugs, intoxicating liquor, or unapproved group act', '', '2025-01-31 03:33:38'),
(36, 'Joining, instigating, or leading rallies, demonstrations and other forms of to the school', '', '2025-01-31 03:33:49'),
(37, 'Posting, distributing, disseminating, and/or circulating leaflets and other printed materials that t', '', '2025-01-31 03:34:02'),
(38, 'Carrying deadly and dangerous weapons, including explosives and incendiary', '', '2025-01-31 03:34:10'),
(39, 'Forcibly asking money from anybody or extortion', '', '2025-01-31 03:34:18'),
(40, 'Forging, falsifying, or tampering school records, documents, or credentials, or knowingly furnishing', '', '2025-01-31 03:34:29'),
(41, 'Forging signatures of authorities', '', '2025-01-31 03:34:40'),
(42, 'Any other misbehaviors or misconducts which may endanger or threaten the health or safety of an indi', '', '2025-01-31 03:34:50'),
(43, 'Bullying i. Cyberbullying: deliberate and repeated negative behavior using information and communica', '', '2025-01-31 03:35:02'),
(44, 'Malversation of funds of a class, group, organization, or the student government', '', '2025-01-31 03:35:12'),
(45, 'Violating the right to confidentiality, and/or security of one\'s records or credentials of any membe', '', '2025-01-31 03:35:22'),
(46, 'Viewing and reading objects, pictures, and literature that are pornographic', '', '2025-01-31 03:35:31'),
(47, 'Entering into a contract or any financial transaction/s with any outside party, organization, compan', '', '2025-01-31 03:35:41'),
(48, ' Tampering of fire extinguisher, fire alarm, and other emergency devices', '', '2025-01-31 03:35:53');

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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_offenses`
--
ALTER TABLE `tbl_offenses`
  MODIFY `offense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_violations`
--
ALTER TABLE `tbl_violations`
  MODIFY `violation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

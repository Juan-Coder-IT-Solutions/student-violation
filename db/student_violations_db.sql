-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table student_violations_db.tbl_complaints
CREATE TABLE IF NOT EXISTS `tbl_complaints` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `complainee_id` int(11) NOT NULL,
  `complainant_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `file_path` varchar(250) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`complaint_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_complaints: ~5 rows (approximately)
INSERT INTO `tbl_complaints` (`complaint_id`, `complainee_id`, `complainant_id`, `violation_id`, `remarks`, `file_path`, `date_added`) VALUES
	(1, 18, 2, 2, 'qweqwe123', '', '2025-02-26 15:00:21'),
	(5, 20, 2, 4, 'qweqwe', '', '2025-02-26 15:23:24'),
	(6, 25, 2, 6, 'test', '67bec47ecfa44_cloud security 1.png', '2025-02-26 15:26:17'),
	(7, 20, 2, 3, 'qweqwe', '67bed2e87e11f_cloud security 3.png', '2025-02-26 16:38:00'),
	(8, 18, 36, 7, 'QWE', '67bed3d0684e8_cloud security 2.png', '2025-02-26 16:41:52');

-- Dumping structure for table student_violations_db.tbl_courses
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_id` int(11) NOT NULL DEFAULT 0,
  `course_name` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_courses: ~5 rows (approximately)
INSERT INTO `tbl_courses` (`course_id`, `degree_id`, `course_name`, `date_added`) VALUES
	(2, 5, 'Bachelor of Science in Information Technology', '2024-05-26 22:06:39'),
	(3, 3, 'Bachelor of Science in Information System', '2024-05-26 22:06:48'),
	(4, 4, 'Testing course', '2025-01-29 13:46:20'),
	(5, 5, 'test', '2025-02-15 10:54:55'),
	(6, 4, 'test1235456', '2025-02-26 15:59:27');

-- Dumping structure for table student_violations_db.tbl_degree
CREATE TABLE IF NOT EXISTS `tbl_degree` (
  `degree_id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_name` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`degree_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_degree: ~4 rows (approximately)
INSERT INTO `tbl_degree` (`degree_id`, `degree_name`, `date_added`) VALUES
	(2, 'College of Computer Studies', '2025-02-26 15:53:13'),
	(3, 'College of Education', '2025-02-26 15:53:22'),
	(4, 'College of Engineering', '2025-02-26 15:53:33'),
	(5, 'College of Industrial Technology', '2025-02-26 15:53:42');

-- Dumping structure for table student_violations_db.tbl_offenses
CREATE TABLE IF NOT EXISTS `tbl_offenses` (
  `offense_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `offense_remarks` text NOT NULL,
  `discplinary_action` text NOT NULL,
  `offense_date` date NOT NULL DEFAULT current_timestamp(),
  `offense_status` int(1) NOT NULL COMMENT '1- cleared ; 0 - not cleared',
  `offense_type` varchar(10) NOT NULL DEFAULT '',
  `cleared_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`offense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_offenses: ~7 rows (approximately)
INSERT INTO `tbl_offenses` (`offense_id`, `student_id`, `violation_id`, `offense_remarks`, `discplinary_action`, `offense_date`, `offense_status`, `offense_type`, `cleared_by`, `date_added`) VALUES
	(5, 27, 4, 'On January 15, 2025, at 10:30 AM, Felix Ortega caused a disturbance during a lecture by making loud noises and ignoring the instructor\'s warnings.', 'The student will receive a formal warning and be reminded of the institution’s code of conduct.', '2025-01-17', 1, 'Minor', 2, '2025-01-21 16:48:34'),
	(6, 27, 6, 'A student was reported for writing graffiti on university property.', 'Cleaning of vandalized area\r\nCommunity service (10 hours)\r\nWritten warning', '2025-01-21', 0, 'Minor', 0, '2025-01-21 18:57:26'),
	(7, 12, 4, 'Student used inappropriate language toward a faculty member during class on Jan. 21, 2025.', 'Apology letter to faculty member\r\nParental notification', '2025-01-21', 0, 'Major', 0, '2025-01-21 19:13:17'),
	(8, 14, 3, 'Student repeatedly sent derogatory messages to a classmate via social media, causing emotional distress.', 'Counseling sessions for both parties involved\r\nWritten apology to the victim\r\nTwo-week suspension\r\nParental notification', '2025-01-21', 0, 'Major', 0, '2025-01-21 19:15:35'),
	(9, 16, 7, 'Student was caught taking another student\'s unattended mobile phone in the library without permission.', 'The student is required to return the stolen item and issue a formal written apology to the victim. A one-month suspension will be imposed, during which the student must complete a restorative justice program focusing on accountability and respect for others\' property. The parents or guardians of the student will be informed, and the student will be placed under probation for the remainder of the semester.', '2025-01-21', 0, 'Major', 0, '2025-01-21 19:17:27'),
	(10, 26, 9, 'Student was observed entering the university premises on January 15, 2025, wearing inappropriate attire that did not conform to the university\'s prescribed dress code policy.', 'he student received a verbal warning and was advised to change into proper attire before attending classes. A record of the violation has been noted, and repeated offenses will result in a formal written warning and possible restriction from campus access until compliance is ensured.', '2025-01-15', 0, 'Major', 0, '2025-01-15 19:22:39'),
	(11, 20, 2, 'test1', 'test2', '2025-01-29', 0, 'Major', 0, '2025-01-29 14:12:17');

-- Dumping structure for table student_violations_db.tbl_students
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_fname` varchar(50) NOT NULL,
  `student_mname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_students: ~18 rows (approximately)
INSERT INTO `tbl_students` (`student_id`, `student_fname`, `student_mname`, `student_lname`, `student_email`, `gender`, `year_level`, `course_id`, `section`, `user_id`, `date_added`) VALUES
	(12, 'Ana', 'Pimentel', 'Alonzo', 'ana.pimentel@gmail.com', 'Female', 'First Year', 2, 'B', 18, '2025-01-21 16:39:29'),
	(13, 'Maria Kate', 'Cruz', 'Paz', 'mariakate.cruz@gmail.com', 'Female', 'First Year', 2, 'A', 19, '2025-01-21 16:39:29'),
	(14, 'Keno', 'Dela Cruz', 'Santos', 'juan.santos@example.com', 'Male', 'First Year', 2, 'B', 20, '2025-01-21 16:39:29'),
	(15, 'Maria Clara', 'Reyes', 'Hernandez', 'mariaclara.reyes@example.com', 'Female', 'First Year', 2, 'C', 21, '2025-01-21 16:39:29'),
	(16, 'Carlos', 'Lopez', 'Garcia', 'carlos.lopez@example.com', 'Male', 'First Year', 2, 'C', 22, '2025-01-21 16:39:29'),
	(17, 'Emilia', 'Ana', 'Alvarez', 'emilia.alvarez@example.com', 'Female', 'First Year', 2, 'A', 23, '2025-01-21 16:39:29'),
	(18, 'Marcos', 'Esteban', 'Bautista', 'marcos.bautista@example.com', 'Male', 'First Year', 2, 'B', 24, '2025-01-21 16:39:29'),
	(19, 'Sofia', 'Gracia', 'Hernandez', 'sofia.hernandez@example.com', 'Female', 'First Year', 2, 'C', 25, '2025-01-21 16:39:29'),
	(20, 'David', 'Lee', 'Tomas', 'david.tomas@example.com', 'Male', 'First Year', 2, 'C', 26, '2025-01-21 16:39:29'),
	(21, 'Olivia', 'Grace', 'Villanueva', 'olivia.villanueva@example.com', 'Female', 'First Year', 2, 'A', 27, '2025-01-21 16:39:29'),
	(22, 'Andres', 'Santiago', 'Reyes', 'andres.reyes@example.com', 'Male', 'Second Year', 2, 'A', 28, '2025-01-21 16:40:58'),
	(23, 'Beatriz', 'Maria', 'Cruz', 'beatriz.cruz@example.com', 'Female', 'Second Year', 2, 'B', 29, '2025-01-21 16:40:58'),
	(24, 'Carlo', 'Luis', 'Valdez', 'carlo.valdez@example.com', 'Male', 'Third Year', 2, 'C', 30, '2025-01-21 16:42:19'),
	(25, 'Daniel', 'Jose', 'Santos', 'daniel.santos@example.com', 'Male', 'Fourth Year', 2, 'D', 31, '2025-01-21 16:43:00'),
	(26, 'Erika', 'Luz', 'Mendoza', 'erika.mendoza@example.com', 'Female', 'Fourth Year', 2, 'A', 32, '2025-01-21 16:43:00'),
	(27, 'Felix', 'Xavier', 'Ortega', 'felix.ortega@example.com', 'Male', 'First Year', 3, 'B', 33, '2025-01-21 16:43:43'),
	(28, 'test', 'tes', 'test', 'qweqwe@gmail.com', 'Female', 'First Year', 2, '1', 34, '2025-01-29 14:30:56'),
	(29, 'ASD', 'ASD1', 'test2', 'ASD@gmail.com', 'Female', 'First Year', 2, 'A', 35, '2025-01-29 14:59:22');

-- Dumping structure for table student_violations_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_category` varchar(5) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_users: ~24 rows (approximately)
INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_category`, `user_email`, `username`, `password`, `date_added`) VALUES
	(2, 'Juan', '', 'Dela Cruz', 'A', '', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2024-05-26 19:56:25'),
	(18, 'Ana', 'Pimentel', 'Alonzo', 'S', 'ana.pimentel@gmail.com', 'ana', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(19, 'Maria Kate', 'Cruz', 'Paz', 'S', '', 'maria kate', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(20, 'Keno', 'Dela Cruz', 'Santos', 'S', '', 'keno', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(21, 'Maria Clara', 'Reyes', 'Hernandez', 'S', '', 'maria clara', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(22, 'Carlos', 'Lopez', 'Garcia', 'S', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(23, 'Emilia', 'Ana', 'Alvarez', 'S', '', 'emilia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(24, 'Marcos', 'Esteban', 'Bautista', 'S', '', 'marcos', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(25, 'Sofia', 'Gracia', 'Hernandez', 'S', '', 'sofia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(26, 'David', 'Lee', 'Tomas', 'S', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(27, 'Olivia', 'Grace', 'Villanueva', 'S', '', 'olivia', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:39:29'),
	(28, 'Andres', 'Santiago', 'Reyes', 'S', '', 'andres', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:40:58'),
	(29, 'Beatriz', 'Maria', 'Cruz', 'S', '', 'beatriz', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:40:58'),
	(30, 'Carlo', 'Luis', 'Valdez', 'S', '', 'carlo1', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:42:19'),
	(31, 'Daniel', 'Jose', 'Santos', 'S', '', 'daniel', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:00'),
	(32, 'Erika', 'Luz', 'Mendoza', 'S', '', 'erika', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:00'),
	(33, 'Felix', 'Xavier', 'Ortega', 'S', '', 'felix', '827ccb0eea8a706c4c34a16891f84e7b', '2025-01-21 16:43:43'),
	(34, 'test', 'tes', 'test', 'S', 'qweqwe@gmail.com', 'test', '098f6bcd4621d373cade4e832627b4f6', '2025-01-29 14:30:56'),
	(35, 'ASD', 'ASD1', 'test2', 'S', 'ASD@gmail.com', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', '2025-01-29 14:59:22'),
	(36, 'Jane ', 'Aquino', 'Magsaysay', 'C', 'Jane@gmail.com', 'jane', '0cc175b9c0f1b6a831c399e269772661', '2025-02-26 14:10:35'),
	(37, 'June', 'Magsaysay', 'Perez', 'D', 'june@gmail.com', 'june', '0cc175b9c0f1b6a831c399e269772661', '2025-02-26 14:11:13'),
	(38, 'Mark', 'Marco', 'Go', 'DO', 'mark@gmail.com', 'mark', '0cc175b9c0f1b6a831c399e269772661', '2025-02-26 14:13:55'),
	(39, 'John', 'Quezon', 'Citi', 'G', 'john@gmail.com', 'john', '0cc175b9c0f1b6a831c399e269772661', '2025-02-26 14:15:01'),
	(40, 'Margie', 'Bagyo', 'Didal', 'S', 'margie@gmail.com', 'margie', '0cc175b9c0f1b6a831c399e269772661', '2025-02-26 14:15:46');

-- Dumping structure for table student_violations_db.tbl_violations
CREATE TABLE IF NOT EXISTS `tbl_violations` (
  `violation_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_name` varchar(100) NOT NULL,
  `violation_desc` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`violation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_violations: ~9 rows (approximately)
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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

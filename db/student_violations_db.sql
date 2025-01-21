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

-- Dumping structure for table student_violations_db.tbl_courses
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_courses: ~2 rows (approximately)
INSERT INTO `tbl_courses` (`course_id`, `course_name`, `date_added`) VALUES
	(2, 'Bachelor of Science in Information Technology', '2024-05-26 22:06:39'),
	(3, 'Bachelor of Science in Information System', '2024-05-26 22:06:48');

-- Dumping structure for table student_violations_db.tbl_offenses
CREATE TABLE IF NOT EXISTS `tbl_offenses` (
  `offense_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `offense_remarks` text NOT NULL,
  `offense_date` datetime NOT NULL DEFAULT current_timestamp(),
  `offense_status` varchar(1) NOT NULL COMMENT '1- cleared ; 0 - not cleared',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`offense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_offenses: ~4 rows (approximately)
INSERT INTO `tbl_offenses` (`offense_id`, `student_id`, `violation_id`, `offense_remarks`, `offense_date`, `offense_status`, `date_added`) VALUES
	(1, 3, 2, 'test 12345', '2025-01-21 00:00:00', '1', '2024-05-27 11:09:52'),
	(2, 2, 2, 'test 345345', '2025-01-21 00:00:00', '', '2024-05-27 11:36:40'),
	(3, 2, 3, '', '2025-01-21 00:00:00', '', '2024-05-27 11:39:26'),
	(4, 2, 2, '', '2025-01-21 00:00:00', '', '2024-05-27 16:52:14');

-- Dumping structure for table student_violations_db.tbl_offense_details
CREATE TABLE IF NOT EXISTS `tbl_offense_details` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `offense_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`od_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_offense_details: ~0 rows (approximately)

-- Dumping structure for table student_violations_db.tbl_students
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_fname` varchar(50) NOT NULL,
  `student_mname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_students: ~5 rows (approximately)
INSERT INTO `tbl_students` (`student_id`, `student_fname`, `student_mname`, `student_lname`, `student_email`, `year_level`, `course_id`, `section`, `user_id`, `date_added`) VALUES
	(2, 'Mary Anne', 'Lastimosa', 'Cruz', 'Lastimosa@gmail.com', 'Second Year', 2, 'A', 0, '2024-05-27 09:46:42'),
	(3, 'Pepe', 'Santos', 'Uy', 'Pepe@gmail.com', 'First Year', 2, 'A', 5, '2024-05-27 10:14:05'),
	(8, 'rapa', 'test1', 'test2', 'test3@gmail.com', 'Second Year', 2, 'test3', 14, '2025-01-21 09:14:50'),
	(9, 'rapa1', 'test11', 'test22', 'test33@gmail.com', 'Second Year', 2, 'test33', 15, '2025-01-21 09:14:50'),
	(10, 'qwe', 'qwe', 'qwe', 'qwe@gmail.com', 'First Year', 2, 'qwe', 16, '2025-01-21 09:17:35');

-- Dumping structure for table student_violations_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_category` varchar(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_users: ~9 rows (approximately)
INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_category`, `username`, `password`, `date_added`) VALUES
	(2, 'Juan', '', 'Dela Cruz', 'A', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2024-05-26 19:56:25'),
	(3, 'Pepe', 'Santos', 'Uy', 'S', 'student', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 09:44:08'),
	(4, 'a', 'a', 'a', 'S', 'a', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 09:46:42'),
	(5, 'Pepe', 'Santos', 'Uy', 'S', '', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 10:14:05'),
	(6, 'rapa', 'test1', 'test2', 'S', 'test4', 'e3d704f3542b44a621ebed70dc0efe13', '2025-01-21 08:55:37'),
	(7, 'rapa1', 'test11', 'test22', 'S', 'test44', '7e39cfce74d155294619613f42484f18', '2025-01-21 08:55:37'),
	(14, 'rapa', 'test1', 'test2', 'S', 'test4', 'e3d704f3542b44a621ebed70dc0efe13', '2025-01-21 09:14:50'),
	(15, 'rapa1', 'test11', 'test22', 'S', 'test44', '7e39cfce74d155294619613f42484f18', '2025-01-21 09:14:50'),
	(16, 'qwe', 'qwe', 'qwe', 'S', 'qwe', '76d80224611fc919a5d54f0ff9fba446', '2025-01-21 09:17:35');

-- Dumping structure for table student_violations_db.tbl_violations
CREATE TABLE IF NOT EXISTS `tbl_violations` (
  `violation_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_name` varchar(100) NOT NULL,
  `violation_desc` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`violation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table student_violations_db.tbl_violations: ~2 rows (approximately)
INSERT INTO `tbl_violations` (`violation_id`, `violation_name`, `violation_desc`, `date_added`) VALUES
	(2, 'Cheating', '', '2024-05-26 22:15:55'),
	(3, 'Truancy', 'Skipping classes without a valid reason.\r\nExcessive tardiness.\r\nConsequences: Detention, parental notification, loss of privileges, in-school suspension.', '2024-05-26 22:16:21');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

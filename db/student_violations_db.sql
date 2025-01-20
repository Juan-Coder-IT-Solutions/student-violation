-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table student_violations_db.tbl_offenses: ~2 rows (approximately)
INSERT INTO `tbl_offenses` (`offense_id`, `student_id`, `violation_id`, `offense_remarks`, `offense_date`, `offense_status`, `date_added`) VALUES
	(9, 2, 1, '', '2025-01-20 00:00:00', '', '2025-01-20 14:26:40');

-- Dumping structure for table student_violations_db.tbl_offense_details
CREATE TABLE IF NOT EXISTS `tbl_offense_details` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `offense_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `check_status` int(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`od_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table student_violations_db.tbl_offense_details: ~7 rows (approximately)
INSERT INTO `tbl_offense_details` (`od_id`, `offense_id`, `violation_id`, `check_status`, `date_added`) VALUES
	(1, 7, 1, 1, '2024-05-27 22:40:14'),
	(2, 8, 1, 0, '2024-05-27 22:40:23'),
	(3, 7, 4, 1, '2024-05-27 22:42:06'),
	(4, 7, 3, 0, '2024-05-27 22:53:25'),
	(5, 8, 2, 0, '2024-05-27 22:53:33'),
	(6, 8, 4, 0, '2024-05-27 22:53:38'),
	(7, 7, 2, 1, '2024-05-27 22:56:04');

-- Dumping structure for table student_violations_db.tbl_students
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_fname` varchar(50) NOT NULL,
  `student_mname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table student_violations_db.tbl_students: ~2 rows (approximately)
INSERT INTO `tbl_students` (`student_id`, `student_fname`, `student_mname`, `student_lname`, `year_level`, `course_id`, `section`, `user_id`, `date_added`) VALUES
	(2, 'Mary Anne', 'Lastimosa', 'Cruz', 'Second Year', 2, 'A', 0, '2024-05-27 09:46:42'),
	(3, 'Pepe', 'Santos', 'Uy', 'First Year', 2, 'A', 5, '2024-05-27 10:14:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table student_violations_db.tbl_users: ~4 rows (approximately)
INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_category`, `username`, `password`, `date_added`) VALUES
	(2, 'Juan', '', 'Dela Cruz', 'A', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2024-05-26 19:56:25'),
	(3, 'Pepe', 'Santos', 'Uy', 'S', 'student', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 09:44:08'),
	(4, 'a', 'a', 'a', 'S', 'a', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 09:46:42'),
	(5, 'Pepe', 'Santos', 'Uy', 'S', 'student', '0cc175b9c0f1b6a831c399e269772661', '2024-05-27 10:14:05');

-- Dumping structure for table student_violations_db.tbl_violations
CREATE TABLE IF NOT EXISTS `tbl_violations` (
  `violation_id` int(11) NOT NULL AUTO_INCREMENT,
  `violation_name` varchar(100) NOT NULL,
  `violation_desc` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`violation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table student_violations_db.tbl_violations: ~4 rows (approximately)
INSERT INTO `tbl_violations` (`violation_id`, `violation_name`, `violation_desc`, `date_added`) VALUES
	(1, 'Improper wearing of uniform', '', '2024-05-27 21:45:44'),
	(2, 'Gambling within the school and its immediate vicinity', '', '2024-05-27 21:46:32'),
	(3, 'Smoking inside the school', '', '2024-05-27 21:47:05'),
	(4, 'Theft of school properties', '', '2024-05-27 21:47:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

<?php

function getCurrentDate()
{
	ini_set('date.timezone', 'UTC');
	//error_reporting(E_ALL);
	date_default_timezone_set('UTC');
	$today = date('H:i:s');
	$system_date = date('Y-m-d H:i:s', strtotime($today) + 28800);
	return $system_date;
}

function getUser($user_id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT * FROM `tbl_users` WHERE user_id = '$user_id'");
	if ($fetchData->num_rows > 0) {

		$row = $fetchData->fetch_array();
		return $row['user_fname'] . " " . $row['user_fname'] . " " . $row['user_fname'];
	} else {
		return "---";
	}
}

function getUserFirstName($user_id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT * FROM `tbl_users` WHERE user_id = '$user_id'");
	if ($fetchData->num_rows > 0) {

		$row = $fetchData->fetch_array();
		return $row['user_fname'];
	} else {
		return "---";
	}
}

function getStudent($student_id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT * FROM `tbl_students` WHERE student_id = '$student_id'");
	if ($fetchData->num_rows > 0) {

		$row = $fetchData->fetch_array();
		return $row['student_fname'] . " " . $row['student_mname'] . " " . $row['student_lname'];
	} else {
		return "---";
	}
}

function getStudentRow($student_id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT * FROM `tbl_students` WHERE student_id = '$student_id'");
	if ($fetchData->num_rows > 0) {

		$row = $fetchData->fetch_array();
		return $row;
	} else {
		return "";
	}
}



function getUserCategory($user_id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT user_category FROM `tbl_users` WHERE user_id = '$user_id'");
	if($fetchData->num_rows == 0){
		return "---";
	}else {
	$row = $fetchData->fetch_assoc();
	return $row['user_category'] == "A" ? "Admin" : "Student";
	}
}

function course_name($id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT course_name FROM `tbl_courses` WHERE course_id='$id'");
	if ($fetchData->num_rows > 0) {
		$row = $fetchData->fetch_array();
		return $row[0];
	} else {
		return "---";
	}
}

function violation_name($id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT violation_name FROM `tbl_violations` WHERE violation_id ='$id'");
	if ($fetchData->num_rows > 0) {
		$row = $fetchData->fetch_array();
		return $row[0];
	} else {
		return "---";
	}
}

function task_row($id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT * FROM `tbl_tasks` WHERE task_id='$id'");
	$row = $fetchData->fetch_array();

	return $row;
}

function user_row($id)
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT * FROM `tbl_users` WHERE user_id='$id'");
	$row = $fetchData->fetch_array();

	return $row;
}

function total_users()
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT count(user_id) FROM `tbl_users` WHERE user_category='A'");
	$row = $fetchData->fetch_array();

	return $row[0];
}

function total_students()
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT count(student_id) FROM `tbl_students`");
	$row = $fetchData->fetch_array();

	return $row[0];
}

function total_violations()
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT count(violation_id) FROM `tbl_violations`");
	$row = $fetchData->fetch_array();

	return $row[0];
}


function total_offenses()
{

	global $mysqli_connect;

	$fetchData = $mysqli_connect->query("SELECT count(offense_id) FROM `tbl_offenses`");
	$row = $fetchData->fetch_array();

	return $row[0];
}

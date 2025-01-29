<?php
require_once '../../core/config.php';

$course_id          = $_POST['course_id'];
$violation_id       = $_POST['violation_id'];
$course_param       = $course_id == "All" ? "c.course_id > 0" : "c.course_id='$course_id'";
$violation_param    = $violation_id == "All" ? " AND v.violation_id > 0" : " AND v.violation_id='$violation_id'";

$fetch_products = $mysqli_connect->query("SELECT o.offense_type, COUNT(o.offense_id) AS total_offenses, SUM(CASE WHEN s.gender = 'Female' THEN 1 ELSE 0 END) AS female_count, SUM(CASE WHEN s.gender = 'Male' THEN 1 ELSE 0 END) AS male_count FROM tbl_offenses o LEFT JOIN tbl_students s ON s.student_id = o.student_id LEFT JOIN tbl_violations v ON v.violation_id = o.violation_id
LEFT JOIN tbl_courses c ON c.course_id = s.course_id WHERE $course_param $violation_param GROUP BY o.offense_type") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch_products->fetch_array() ){
    
	$list                       = array(); 
    $list['count']              = $count++;
    $list['offense_type']       = $row['offense_type'];    
    $list['total_offenses']     = $row['total_offenses'];
    $list['gender_list']    =  "F- ".$row['female_count']." M- ".$row['male_count'];

	array_push($response['data'], $list);
}

echo json_encode($response);

?>
<?php
require_once '../../core/config.php';

$course_id          = $_POST['course_id'];
$violation_id       = $_POST['violation_id'];
$course_param       = $course_id == "All" ? "c.course_id > 0" : "c.course_id='$course_id'";
$violation_param    = $violation_id == "All" ? " AND v.violation_id > 0" : " AND v.violation_id='$violation_id'";

$fetch_products = $mysqli_connect->query("SELECT * FROM tbl_offenses o LEFT JOIN tbl_students s ON s.student_id=o.student_id LEFT JOIN tbl_violations v ON v.violation_id=o.violation_id LEFT JOIN tbl_courses c ON c.course_id=s.course_id WHERE $course_param $violation_param") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch_products->fetch_array() ){
    
	$list                       = array(); 
    $list['count']              = $count++;
    $list['violation_id']       = $row['violation_id'];    
    $list['student']            = $row['student_fname'] . " " . $row['student_mname'] . " " . $row['student_lname'];
    $list['violation_name']     = $row['violation_name'];
   
    $list['offense_remarks']    = $row['offense_remarks'];
    $list['discplinary_action'] = $row['discplinary_action'];
    
    $list['date_added']         = date('F d,Y', strtotime($row['date_added']));
	array_push($response['data'], $list);
}

echo json_encode($response);

?>
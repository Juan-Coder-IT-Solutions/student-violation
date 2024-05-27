<?php
require_once '../../core/config.php';
$fetch_products = $mysqli_connect->query("SELECT * FROM tbl_offenses") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch_products->fetch_array() ){
    
	$list = array(); 
    $list['count'] = $count++;
    $list['offense_id'] = $row['offense_id'];
    $list['status'] = $row['offense_status'] == 1 ? "CLEARED" : "NOT-CLEARED";
    $list['violation'] = violation_name($row['violation_id']);
    $list['student_name'] = getStudent($row['student_id']);
    $list['offense_remarks'] = $row['offense_remarks'];
    $list['offense_date'] = date('F d,Y', strtotime($row['offense_date']));
    $list['date_added'] = date('F d,Y', strtotime($row['date_added']));
	array_push($response['data'], $list);
}

echo json_encode($response);

?>
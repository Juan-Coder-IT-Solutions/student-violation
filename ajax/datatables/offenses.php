<?php
require_once '../../core/config.php';
$fetch_products = $mysqli_connect->query("SELECT * FROM tbl_offenses ORDER BY offense_id DESC") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch_products->fetch_array() ){
    
	$list = array(); 
    $list['count'] = $count++;
    $list['offense_id'] = $row['offense_id'];
    $list['status'] = $row['offense_status'] == 1 ? "<span class='badge bg-success me-1'></span> <b>CLEARED</b>" : "<span class='badge bg-warning me-1'></span> <i>NOT-CLEARED</i>";
    $list['violation'] = violation_name($row['violation_id']);
    $list['student_name'] = getStudent($row['student_id']);
    $list['offense_remarks'] = $row['offense_remarks'];
    $list['offense_date'] = date('F d,Y', strtotime($row['offense_date']));
    $list['date_added'] = date('F d,Y', strtotime($row['date_added']));
    $list['offense_status'] = $row['offense_status'];
    $list['cleared_by'] = $row['cleared_by'] > 0 ? getUser($row['cleared_by']) : "---";
	array_push($response['data'], $list);
}

echo json_encode($response);

?>
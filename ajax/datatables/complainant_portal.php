

<?php
require_once '../../core/config.php';
$fetch = $mysqli_connect->query("SELECT * FROM tbl_complaints") or die(mysqli_error());
$response['data'] = array();
$count = 1;
while( $row = $fetch->fetch_array() ){

    $file_path = $row['file_path'];

    $preview = "";
    if (!empty($file_path)) {
        $preview = "<a href='../student-violation/uploads/$file_path' target='_blank' class='btn btn-sm btn-info'>View File</a>";
    }

	$list = array(); 
    $list['count'] = $count++;
    $list['complaint_id'] = $row['complaint_id'];
    $list['complainee'] = getUser($row['complainee_id']);
    $list['cimplainant'] = getUser($row['complainant_id']);
    $list['violation'] = violation_name($row['violation_id']);
    $list['remarks'] = $row['remarks'];
    $list['file'] = $preview;
    $list['date_added'] = date('F d,Y', strtotime($row['date_added']));

	array_push($response['data'], $list);
}

echo json_encode($response);

?>
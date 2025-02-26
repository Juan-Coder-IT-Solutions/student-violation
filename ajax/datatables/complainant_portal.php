

<?php
require_once '../../core/config.php';
$user_category = $_SESSION['user_category'];
$user_id = $_SESSION['dvsa_user_id'];
$param = $user_category=="S"? "WHERE complainee_id='$user_id'":(($user_category=="C")? "WHERE complainant_id='$user_id'" : "");

$fetch = $mysqli_connect->query("SELECT * FROM tbl_complaints $param") or die(mysqli_error());
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
    $list['hide_this'] = $user_category;


	array_push($response['data'], $list);
}

echo json_encode($response);

?>
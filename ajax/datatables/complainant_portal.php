<?php
require_once '../../core/config.php';
$user_category = $_SESSION['user_category'];
$user_id = $_SESSION['dvsa_user_id'];

if($user_category == "A"){
    $param = "";
}else if($user_category == "DO"){
    $param = "WHERE status = 'A'";
}else if($user_category == "G"){
    $param = "WHERE status = 'G'";
}else if($user_category == "D"){
    $param = "WHERE status = 'F'";
}else{
    $param = "WHERE complainant_id='$user_id'";
}

$fetch = $mysqli_connect->query("SELECT * FROM tbl_complaints $param") or die(mysqli_error());
$response['data'] = array();
$count = 1;

while ($row = $fetch->fetch_array()) {

    $file_path = $row['file_path'];
    $preview = !empty($file_path) ? "<a href='../student-violation/ajax/uploads/$file_path' target='_blank' class='btn btn-sm btn-info'>View File</a>" : "";

    // Add colored text based on status
    $stat = "Unknown Status";
    $color = "#6c757d"; // Default gray color

    switch ($row['status']) {
        case "":
            $stat = "Reported";
            $color = "#6c757d"; // Gray
            $btn = "<button class='btn btn-primary btn-accept' onclick=changeStatus(".$row['complaint_id'].",'A')>Accept</button>";
            break;
        case "A":
            $stat = "Accepted by Admin";
            $color = "#0d6efd"; // Blue
            $btn = "<button class='btn btn-success btn-clear' onclick=changeStatus(".$row['complaint_id'].",'D')>Clear</button>";
            break;
        case "D":
            $stat = "Cleared";
            $color = "#198754"; // Green
            $btn = "<button class='btn btn-warning btn-counsel' onclick=changeStatus(".$row['complaint_id'].",'G')>Forward/For Counseling</button>";
            break;
        case "G":
            $stat = "For Counseling";
            $color = "#ffc107"; // Yellow
            $btn = "<button class='btn btn-danger btn-finish' onclick=changeStatus(".$row['complaint_id'].",'F')>Finish</button>";
            break;
        case "F":
            $stat = "Finished";
            $color = "#0dcaf0"; // Light Blue
            $btn = "";
            break;
    }

    $colored_stat = "<span style='color: $color; font-weight: bold;'>$stat</span>";

    $list = array(); 
    $list['count'] = $count++;
    $list['complaint_id'] = $row['complaint_id'];
    $list['complainee'] = $row['complainee'];
    $list['cimplainant'] = getUser($row['complainant_id']);
    $list['violation'] = violation_name($row['violation_id']);
    $list['remarks'] = $row['remarks'];
    $list['status'] = $row['status'];
    $list['stat'] = $colored_stat; // Colored status as simple text
    $list['user_category'] = $user_category;

    $list['btn_check'] = $btn;
    $list['file'] = $preview;
    $list['date_added'] = date('F d, Y h:i a', strtotime($row['date_reported']));
    $list['hide_this'] = $user_category;

    array_push($response['data'], $list);
}

echo json_encode($response);
?>

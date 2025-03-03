<?php
require_once '../../core/config.php';

$status = $_POST['status'];
$status_param = $status == "All" ? "complaint_id > 0" : "status='$status'";

$fetch_complaints = $mysqli_connect->query("SELECT * FROM tbl_complaints WHERE $status_param ORDER BY date_reported DESC") or die(mysqli_error($mysqli_connect));

$response['data'] = array();
$count = 1;
while ($row = $fetch_complaints->fetch_array()) {

    switch ($row['status']) {
        case "":
            $stat = "Reported";
            $color = "#6c757d"; // Gray
            break;
        case "A":
            $stat = "Accepted by Admin";
            $color = "#0d6efd"; // Blue
            break;
        case "D":
            $stat = "Cleared";
            $color = "#198754"; // Green
            break;
        case "G":
            $stat = "For Counseling";
            $color = "#ffc107"; // Yellow
            break;
        case "F":
            $stat = "Finished";
            $color = "#0dcaf0"; // Light Blue
            break;
    }

    $list = array();
    $list['count'] = $count++;
    $list['complainee'] = $row['complainee'];
    $list['complainant'] = getUser($row['complainant_id']);

    // Handle violation_id as a comma-separated string and fetch violation names safely
    $violation_ids = explode(',', $row['violation_id']);
    $violation_names = array();
    foreach ($violation_ids as $violation_id) {
        $violation_names[] = violation_name(trim($violation_id));
    }
    $list['violation'] = implode(', ', $violation_names);

    $list['remarks'] = $row['remarks'];
    $list['status'] = "<span style='color: $color;'>$stat</span>";
    $list['date_reported'] = $row['date_reported'];

    array_push($response['data'], $list);
}

echo json_encode($response);

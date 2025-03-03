<?php

require_once '../core/config.php';
$id = $_POST['id'];
$status = $_POST['status'];

$query = $mysqli_connect->query("UPDATE tbl_complaints SET status = '$status' WHERE complaint_id = '$id'");
if($query){
    $fetch_complaints = $mysqli_connect->query("SELECT * FROM tbl_complaints WHERE complaint_id = '$id'");
    $c_row = $fetch_complaints->fetch_assoc();
    $complainee = $c_row["complainee"];
    $complainee_program = degree_name($c_row["complainee_program"]);
    
    if($status == "A"){
        $fetch = $mysqli_connect->query("SELECT user_id FROM tbl_users WHERE user_category='DO'") or die(mysqli_error());
        while ($do_row = $fetch->fetch_array()) {
            add_notification($do_row[0], "New Complaint Accepted", 'A complaint has been filed against ' . $complainee . ' of ' . $complainee_program . '. Please review and take necessary action.');
        }
    }else if($status == 'D'){
        $fetch = $mysqli_connect->query("SELECT user_id FROM tbl_users WHERE user_category='A' OR user_category='G'") or die(mysqli_error());
        while ($do_row = $fetch->fetch_array()) {
            add_notification($do_row[0], "Guidance Counseling Required", 'A complaint has been filed against ' . $complainee . ' of ' . $complainee_program . '. Please proceed with guidance counseling.');
        }
    }else if($status == "F"){
        $fetch = $mysqli_connect->query("SELECT user_id FROM tbl_users WHERE user_category='A' OR user_category='D'") or die(mysqli_error());
        while ($do_row = $fetch->fetch_array()) {
            add_notification($do_row[0], "Complaint Resolved", 'The complaint against ' . $complainee . ' of ' . $complainee_program . ' has been marked as finished.');
        }
    }
    echo 1;
}else{
    echo 0;
}

?>
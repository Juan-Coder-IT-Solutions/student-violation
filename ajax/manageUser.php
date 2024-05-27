<?php
require_once '../core/config.php';
$user_fname = $mysqli_connect->real_escape_string($_POST['user_fname']);
$user_mname = $mysqli_connect->real_escape_string($_POST['user_mname']);
$user_lname = $mysqli_connect->real_escape_string($_POST['user_lname']);
$username = $mysqli_connect->real_escape_string($_POST['username']);
$password = $mysqli_connect->real_escape_string($_POST['password']);
$type = $mysqli_connect->real_escape_string($_POST['type']);
$user_id  = $mysqli_connect->real_escape_string($_POST['user_id']);

$date = getCurrentDate();
//$user_id = $_SESSION['user_id'];

if($type == "add"){
    
    $checker = $mysqli_connect->query("SELECT * FROM tbl_users WHERE username='$username'") or die(mysqli_error());
    $count_rows = $checker->fetch_array();
    if($count_rows && $count_rows[0] > 0){
        echo 2;
    }else{
        $sql = $mysqli_connect->query("INSERT INTO tbl_users SET user_fname='$user_fname',user_mname='$user_mname',user_lname='$user_lname',user_category='A',username='$username',password=md5('$password'), date_added='$date'") or die(mysqli_error());

        if($sql){
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $checker = $mysqli_connect->query("SELECT * FROM tbl_users WHERE username='$username' AND user_id  != '$user_id '") or die(mysqli_error());
    $count_rows = $checker->fetch_array();
    if($count_rows && $count_rows[0] > 0){
        echo 2;
    }else{
        $sql = $mysqli_connect->query("UPDATE tbl_users SET user_fname='$user_fname',user_mname='$user_mname',user_lname='$user_lname' WHERE user_id ='$user_id '") or die(mysqli_error());
        if($sql){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>

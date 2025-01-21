<?php
require_once '../core/config.php';

if (isset($_POST['offense_id'])) {
    $offense_id = $_POST['offense_id'];
    $user_id = $_SESSION['dvsa_user_id'];

    $query = $mysqli_connect->query("UPDATE tbl_offenses SET offense_status='1', cleared_by='$user_id' WHERE offense_id='$offense_id'") or die(mysqli_error());
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}

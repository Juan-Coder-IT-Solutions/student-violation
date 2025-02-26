<?php
require_once '../core/config.php';

$complainee_id = $mysqli_connect->real_escape_string($_POST['complainee_id']);
$complainant_id = $_SESSION['dvsa_user_id'];
$violation_id = $mysqli_connect->real_escape_string($_POST['violation_id']);
$remarks = $mysqli_connect->real_escape_string($_POST['remarks']);
$complaint_id = $mysqli_connect->real_escape_string($_POST['complaint_id']);
$date = getCurrentDate();
$type = $mysqli_connect->real_escape_string($_POST['type']);

$file_name = "";
$upload_dir = "../uploads/"; 
$allowed_types = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx']; 

if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $file_ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $file_size = $_FILES['file']['size'];

    if (!in_array($file_ext, $allowed_types)) {
        die("Invalid file type. Only JPG, PNG, PDF, DOC, and DOCX files are allowed.");
    }

    if ($file_size > 5 * 1024 * 1024) { // 5MB limit
        die("File size exceeds 5MB limit.");
    }

    $file_name = uniqid() . "_" . basename($_FILES['file']['name']);
    $file_path = $upload_dir . $file_name;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        die("Error uploading file.");
    }
}

if ($type == "add") {
    $sql = $mysqli_connect->query("
        INSERT INTO tbl_complaints 
        (complainee_id, complainant_id, violation_id, remarks, date_added, file_path) 
        VALUES 
        ('$complainee_id', '$complainant_id', '$violation_id', '$remarks', '$date', '$file_name')
    ") or die(mysqli_error());

    echo ($sql) ? 1 : 0;
} else { // Update
    $query = $mysqli_connect->query("SELECT file_path FROM tbl_complaints WHERE complaint_id = '$complaint_id'");
    $row = $query->fetch_assoc();
    $existing_file = $row['file_path'];

    $update_query = "
        UPDATE tbl_complaints 
        SET complainee_id='$complainee_id', violation_id='$violation_id', remarks='$remarks'
    ";

    if ($file_name != "") {
        $update_query .= ", file_path='$file_name'";

        if (!empty($existing_file) && file_exists($upload_dir . $existing_file)) {
            unlink($upload_dir . $existing_file);
        }
    }

    $update_query .= " WHERE complaint_id='$complaint_id'";

    $sql = $mysqli_connect->query($update_query) or die(mysqli_error());

    echo ($sql) ? 1 : 0;
}
?>

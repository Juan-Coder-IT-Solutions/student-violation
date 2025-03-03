<?php
require_once '../core/config.php';

// $complainee_id = $mysqli_connect->real_escape_string($_POST['complainee_id']);
$complainant_id = $_SESSION['dvsa_user_id'];
$violation_id = isset($_POST['violations']) ? implode(',', $_POST['violations']) : '';
$remarks = $mysqli_connect->real_escape_string($_POST['remarks']);
$complaint_id = $mysqli_connect->real_escape_string($_POST['complaint_id']);
$date = getCurrentDate();
$type = $mysqli_connect->real_escape_string($_POST['type']);

$other_violations = $mysqli_connect->real_escape_string($_POST['other_violations']);
$year = $mysqli_connect->real_escape_string($_POST['year']);
$section = $mysqli_connect->real_escape_string($_POST['section']);
$section_type = $mysqli_connect->real_escape_string($_POST['section_type']);
$complainee = $mysqli_connect->real_escape_string($_POST['complainee']);
$complainee_program = $mysqli_connect->real_escape_string($_POST['complainee_program']);
$complainee_year = $mysqli_connect->real_escape_string($_POST['complainee_year']);
$complainee_section = $mysqli_connect->real_escape_string($_POST['complainee_section']);
$complainee_section_type = $mysqli_connect->real_escape_string($_POST['complainee_section_type']);
$date_reported = $mysqli_connect->real_escape_string($_POST['date_reported']);
$person_involved = $mysqli_connect->real_escape_string($_POST['person_involved']);

$file_name = "";
$upload_dir = "uploads/";
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
    // $sql = $mysqli_connect->query("
    //     INSERT INTO tbl_complaints 
    //     (`complainee_id`, `complainee`, `complainant_id`, `violation_id`, `other_violations`, `year`, `section`, `section_type`, `complainee_program`, `complainee_year`, `complainee_section`, `complainee_section_type`, `date_reported`, `person_involved`, `remarks`, `file_path`, `date_added`) 
    //     VALUES 
    //     ('$complainee_id', '$complainee', '$complainant_id', '$violation_id', '$other_violations', '$year', '$section','$remarks', '$date')
    // ") or die(mysqli_error());

    $sql = $mysqli_connect->query("INSERT INTO tbl_complaints (`complainee`, `complainant_id`, `violation_id`, `other_violations`, `year`, `section`, `section_type`, `complainee_program`, `complainee_year`, `complainee_section`, `complainee_section_type`, `date_reported`, `person_involved`, `remarks`, `file_path`) VALUES  ('$complainee', '$complainant_id', '$violation_id', '$other_violations', '$year', '$section', '$section_type', '$complainee_program', '$complainee_year', '$complainee_section', '$complainee_section_type', '$date_reported', '$person_involved', '$remarks', '$file_name')
") or die($mysqli_connect->error);

    //  file_path='$file_name'
    $fetch_do = $mysqli_connect->query("SELECT user_id FROM tbl_users WHERE user_category='A'") or die(mysqli_error());
    while ($do_row = $fetch_do->fetch_array()) {
        add_notification($do_row[0], "New Complaint Received", 'A complaint has been filed against ' . $complainee . ' of ' . $complainee_program . '. Please review and take necessary action.');
    }

    echo ($sql) ? 1 : 0;
} else { // Update
    $query = $mysqli_connect->query("SELECT file_path FROM tbl_complaints WHERE complaint_id = '$complaint_id'");
    $row = $query->fetch_assoc();
    $existing_file = $row['file_path'];

    $update_query = "
        UPDATE tbl_complaints 
        SET violation_id='$violation_id', remarks='$remarks', other_violations='$other_violations', year='$year', section='$section', section_type='$section_type', complainee='$complainee', complainee_program='$complainee_program', complainee_year='$complainee_year', complainee_section='$complainee_section', complainee_section_type='$complainee_section_type', date_reported='$date_reported', person_involved='$person_involved'
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

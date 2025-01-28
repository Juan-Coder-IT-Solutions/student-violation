<?php
require_once '../core/config.php';

$course_id  = $mysqli_connect->real_escape_string($_POST['import_course_id']);
$year_level = $mysqli_connect->real_escape_string($_POST['import_year_level']);
$date       = getCurrentDate();

if (isset($_FILES['import_file']) && $_FILES['import_file']['error'] == 0) {
    $fileTmpPath = $_FILES['import_file']['tmp_name'];
    $fileName = $_FILES['import_file']['name'];
    $fileSize = $_FILES['import_file']['size'];
    $fileType = $_FILES['import_file']['type'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if ($fileExtension !== 'csv') {
        echo "Invalid file format. Please upload a CSV file.";
        exit;
    }

    if (($handle = fopen($fileTmpPath, 'r')) !== false) {
        $row = 0;
        $insertedCount = 0;
        $duplicateCount = 0;

        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $row++;
            if ($row == 1) {
                continue;
            }

            $student_fname = $mysqli_connect->real_escape_string(trim($data[0]));
            $student_mname = $mysqli_connect->real_escape_string(trim($data[1]));
            $student_lname = $mysqli_connect->real_escape_string(trim($data[2]));
            $section = $mysqli_connect->real_escape_string(trim($data[3]));
            $student_email = $mysqli_connect->real_escape_string(trim($data[4]));
            $username = $mysqli_connect->real_escape_string(trim($data[5]));
            $password = $mysqli_connect->real_escape_string(trim($data[6]));

            $checker = $mysqli_connect->query("SELECT COUNT(*) as count FROM tbl_students WHERE student_fname='$student_fname' AND student_mname='$student_mname' AND student_lname='$student_lname'") or die(mysqli_error());
            $result = $checker->fetch_assoc();

            if ($result['count'] > 0) {
                $duplicateCount++;
                continue;
            }

            $sql = $mysqli_connect->query("INSERT INTO tbl_users SET user_fname='$student_fname', user_mname='$student_mname', user_lname='$student_lname', user_category='S', username='$username', password=md5('$password'), date_added='$date',user_email='$student_email'") or die(mysqli_error());

            if ($sql) {
                $user_id = $mysqli_connect->insert_id;

                $mysqli_connect->query("INSERT INTO tbl_students SET student_fname='$student_fname', student_mname='$student_mname', student_lname='$student_lname', course_id='$course_id',student_email='$student_email', date_added='$date', user_id='$user_id', section='$section', year_level='$year_level'") or die(mysqli_error());
                $insertedCount++;
            }
        }

        fclose($handle);

        echo 1;
    } else {
        echo "Error opening the file.";
    }
} else {
    echo "No file uploaded or an error occurred during upload.";
}
?>

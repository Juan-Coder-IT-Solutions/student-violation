<?php
	if($page == 'dashboard'){
		require view.'dashboard.php';
	}else if($page == 'users'){
		require view.'users.php';
	}else if($page == 'complainant_portal'){
		require view.'complainant_portal.php';
	}else if($page == 'courses'){
		require view.'courses.php';
	}else if($page == 'violations'){
		require view.'violations.php';
	}else if($page == 'violation-report'){
		require view.'violation_report.php';
	}else if($page == 'student-violation-report'){
		require view.'student_violation_report.php';
	}else if($page == 'students'){
		require view.'students.php';
	}else if($page == 'offenses'){
		require view.'offenses.php';
	}else if($page == 'profile'){
		require view.'profile.php';
	}else{
		if(!empty($page) or $page != $page){
			require './404.php';
		}else{
			require view.'dashboard.php';
		}
	}
	
 ?>

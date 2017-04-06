<?php
session_start();
if(isset($_SESSION["employee_user_name"])) {
	require_once("../database/dbconnection.php");

	$event_id = $_POST["event_id"];
	$title = $_POST["title"];
	$event_date = $_POST["date"];
	$page_url = str_replace(dirname(__FILE__),"", $_POST["page_url"]);

	if(isset($_POST['editEvent']) && !empty($title) && !empty($event_date)) {
		$result = mysqli_query($db->db_conn,"update events set title = '$title', event_date = '$event_date' where id= $event_id");
		if($result) {
			echo "<script>alert('Event has been successfully updated.')</script>";
			echo "<script>window.location.href='".$page_url."'</script>";
		}
		else{
			echo "<script>alert('Insertion Error.')</script>";
			echo "<script>window.location.href='".$page_url."'</script>";
		}
	}
	else{
		echo "<script>window.location.href='".$page_url."'</script>";
	}
}else{
	echo "<script>window.location.href='employee-login.php'</script>";
}
?>
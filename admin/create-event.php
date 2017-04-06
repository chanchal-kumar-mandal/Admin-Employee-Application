<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	require_once("../database/dbconnection.php");

	$title = $_POST["title"];
	if($_POST["date"]){	
		$event_date = $_POST["date"];
	}else {	
		$event_date = date("Y-m-d");
	}

	if(isset($_POST['createEvent']) && !empty($title) && !empty($event_date)) {
		$result = mysqli_query($db->db_conn,"insert into events(title, event_date) values('$title', '$event_date')");
		if($result) {
			echo "<script>alert('Event has been successfully created.')</script>";
			echo "<script>window.location.href='event.php'</script>";
		}
		else{
			echo "<script>alert('Insertion Error.')</script>";
			echo "<script>window.location.href='event.php'</script>";
		}
	}
	else{
		echo "<script>window.location.href='event.php'</script>";
	}
}else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
?>
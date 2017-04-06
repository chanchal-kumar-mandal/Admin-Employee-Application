<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	require_once("../database/dbconnection.php");

	$userId = $_POST['user_id'];
	$done = $_POST["done"];
	$progress = $_POST["progress"];
	$upcoming = $_POST["upcoming"];

	if(isset($_POST['editAdminTasks'])) {
		$result = mysqli_query($db->db_conn,"UPDATE tasks SET 
			done = '$done',
			progress = '$progress',
			upcoming = '$upcoming'
			WHERE user_id = $userId"
			);
		if($result) {
			echo "<script>alert('Tasks has been successfully updated.')</script>";
			echo "<script>window.location.href='admin-profile.php'</script>";
		}
		else{
			echo "<script>alert('Updation Error.')</script>";
			echo "<script>window.location.href='admin-profile.php'</script>";
		}
	}
	else{
		echo "<script>window.location.href='admin-profile.php'</script>";
	}
}else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
?>
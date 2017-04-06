<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	require_once("../database/dbconnection.php");

	$adminId = $_POST['admin_id'];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$address = $_POST["address"];

	if(isset($_POST['editAdminBySelf']) && !empty($name)) {
		$result = mysqli_query($db->db_conn,"UPDATE users SET 
			name = '$name',
			email = '$email',
			mobile = '$mobile',
			address = '$address'
			WHERE id = $adminId
			AND role = 'Admin'"
			);
		if($result) {
			echo "<script>alert('Admin information has been successfully updated.')</script>";
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
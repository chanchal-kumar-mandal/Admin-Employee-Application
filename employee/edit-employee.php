<?php
session_start();
if(isset($_SESSION["employee_user_name"])) {
	require_once("../database/dbconnection.php");

	$employeeId = $_POST['employee_id'];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$address = $_POST["address"];

	if(isset($_POST['editEmployeeBySelf']) && !empty($name)) {
		$result = mysqli_query($db->db_conn,"UPDATE users SET 
			name = '$name',
			email = '$email',
			mobile = '$mobile',
			address = '$address'
			WHERE id = $employeeId
			AND role != 'Admin'"
			);
		if($result) {
			echo "<script>alert('Employee information has been successfully updated.')</script>";
			echo "<script>window.location.href='employee-profile.php'</script>";
		}
		else{
			echo "<script>alert('Updation Error.')</script>";
			echo "<script>window.location.href='employee-profile.php'</script>";
		}
	}
	else{
		echo "<script>window.location.href='employee-profile.php'</script>";
	}
}else{
	echo "<script>window.location.href='employee-login.php'</script>";
}
?>
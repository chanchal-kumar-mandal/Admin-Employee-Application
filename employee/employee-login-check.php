<?php
session_start();
require_once("../database/dbconnection.php");
$employee_user = $_POST["eusername"];
$employee_pass = $_POST["epassword"];
if(isset($_POST['elogin']) && !empty($employee_user) && !empty($employee_pass)) {
	$employee_hash_pass = md5($employee_pass);
	$result = mysqli_query($db->db_conn, "SELECT * FROM users WHERE username = '$employee_user' AND password = '$employee_hash_pass' AND role != 'Admin' ");
	if ( mysqli_num_rows($result) == 1 ) {
		$_SESSION["employee_user_name"] = $employee_user;
		foreach($result as $user){
			$_SESSION["e_id"] = $user['id'];
			$_SESSION["e_password"] = $user['password'];
		}
		echo "<script>window.location.href='employee-profile.php'</script>";
	} else {
		echo "<script>alert('Wrong username or password. Please check.')</script>";
		echo "<script>window.location.href='employee-login.php'</script>";
	}
}
else{
	echo "<script>alert('Require both username and password.')</script>";
	echo "<script>window.location.href='employee-login.php'</script>";
}
?>
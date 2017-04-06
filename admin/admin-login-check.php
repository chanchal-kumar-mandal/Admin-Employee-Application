<?php
session_start();
require_once("../database/dbconnection.php");
$admin_user = $_POST["ausername"];
$admin_pass = $_POST["apassword"];
if(!empty($admin_user) && !empty($admin_pass)) {
	$admin_hash_pass = md5($admin_pass);
	$result = mysqli_query($db->db_conn, "SELECT * FROM users WHERE username = '$admin_user' AND password = '$admin_hash_pass' AND role = 'Admin' ");
	if ( mysqli_num_rows($result) == 1 ) {
		$_SESSION["admin_user_name"] = $admin_user;
		foreach($result as $user){
			$_SESSION["a_id"] = $user['id'];
			$_SESSION["a_password"] = $user['password'];
		}
		echo json_encode(array('status'=>'success', 'message' => 'Successfully login.'));
	} else {
		echo json_encode(array('status'=>'fail', 'message' => 'Wrong username or password. Please check.'));
	}
}
else{
	echo json_encode(array('status'=>'fail', 'message' => 'Require both username and password.'));
}
?>
<?php
session_start();
/* Authentication Check */
if(empty($_SESSION["admin_user_name"])){
    echo json_encode(array('status'=>'fail', 'message' => 'Please login'));
}else{
	require_once("../database/dbconnection.php");

	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$mobile = $_POST["mobile"];
	$salary = $_POST["salary"];
	if($_POST["date"]){	
		$dateOfJoinning = $_POST["date"];
	}else {	
		$dateOfJoinning = date("Y-m-d");
	}
	$role = $_POST["role"];

	if(!empty($name) && !empty($username) && !empty($password) && !empty($role)) {
		/* Check duplicate Client ID */

		$resultClientId = mysqli_query($db->db_conn, "SELECT * FROM users WHERE username = '$username'");
		if($resultClientId->num_rows > 0){
			echo json_encode(array('status'=>'fail', 'message' => 'Duplicate username. Please check.'));
		}else{
			$emp_hash_pass = md5($password);
			$result = mysqli_query($db->db_conn,"insert into users(name,username,password,address,mobile,email,salary,dateOfJoinning,role) values('$name','$username','$emp_hash_pass','$address','$mobile','$email','$salary','$dateOfJoinning','$role')");

			if($result) {
				$empResult = mysqli_query($db->db_conn,"select max(id) as id from users");
				foreach($empResult as $empResult){
					$userId = $empResult['id'];
					$tasksResult = mysqli_query($db->db_conn,"insert into tasks(done,progress,upcoming,user_id) values('HTML, CSS, PHP','JAVASCRIPT, AJAX','CODEIGNITER, LARAVEL', '$userId')");	
				}
				echo json_encode(array('status'=>'success', 'message' => 'Employee has been successfully added.'));
			}
			else{
				echo json_encode(array('status'=>'fail', 'message' => 'Employee insertion error.'));
			}
		}
	}
	else{
		echo json_encode(array('status'=>'fail', 'message' => 'Please insert all required fields.'));
	}
}
?>
<?php
session_start();
/* Authentication Check */
if(empty($_SESSION["admin_user_name"])){
    echo json_encode(array('status'=>'fail', 'message' => 'Please login'));
}else{
	require_once("../database/dbconnection.php");

	$uid = $_POST['emp_id'];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$mobile = $_POST["mobile"];
	$email = $_POST["email"];
	$salary = $_POST["salary"];
	$dateOfJoinning = $_POST["date"];
	$role = $_POST["role"];

	if(!empty($uid) && !empty($name) && !empty($role)) {
		$result = mysqli_query($db->db_conn,"UPDATE users SET 
			name = '$name',
			address = '$address',
			mobile = '$mobile',
			email = '$email',
			salary = '$salary',
			dateOfJoinning = '$dateOfJoinning',
			role = '$role'
			where id = " . $uid
			);
		if($result) {
			echo json_encode(array('status'=>'success', 'message' => 'Employee has been successfully updated.'));
		}
		else{
			echo json_encode(array('status'=>'fail', 'message' => 'Updation Error.'));
		}
	}
	else{
		echo json_encode(array('status'=>'fail', 'message' => 'Please insert all required fields.'));
	}
}
?>
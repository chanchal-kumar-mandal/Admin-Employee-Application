<?php
session_start();
/* Authentication Check */
if(empty($_SESSION["admin_user_name"])){
    echo json_encode(array('status'=>'fail', 'message' => 'Please login'));
}else{
	require_once("../database/dbconnection.php");
	
	$uid = $_POST['uid'];

	if(!empty($uid)) {
		$result = mysqli_query($db->db_conn, "SELECT * FROM users
			where role != 'Admin' AND id = " . $uid);
		if(mysqli_num_rows($result) > 0) {
			$row=mysqli_fetch_assoc($result);
			echo json_encode(array('status'=>'success', 'userData' => $row));
		}
		else{
			echo json_encode(array('status'=>'fail', 'message' => 'No user found.'));
		}
	}
	else{
		echo json_encode(array('status'=>'fail', 'message' => 'Please insert all required fields.'));
	}
}
?>
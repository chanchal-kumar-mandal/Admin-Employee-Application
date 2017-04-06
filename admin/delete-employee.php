<?php
session_start();
/* Authentication Check */
if(empty($_SESSION["admin_user_name"])){
    echo json_encode(array('status'=>'fail', 'message' => 'Please login'));
}else{
	require_once("../database/dbconnection.php");
	$uid = $_POST['uid'];
	if($uid){
		$result = mysqli_query($db->db_conn, "DELETE FROM users WHERE id = " . $uid);
		if($result){
			$tasksResult = mysqli_query($db->db_conn, "DELETE FROM tasks WHERE user_id = " . $uid);
			echo json_encode(array('status'=>'success', 'message' => 'Employee has been successfully deleted.'));
		}
		else{
			echo json_encode(array('status'=>'fail', 'message' => 'Employee deletion error.'));
		}
	}
	else{
		echo json_encode(array('status'=>'fail', 'message' => 'Please insert all required fields.'));
	}
}
?>
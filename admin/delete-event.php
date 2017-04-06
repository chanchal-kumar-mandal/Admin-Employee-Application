<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	require_once("../database/dbconnection.php");

	$event_id = $_REQUEST["event_id"];
	$page_url = str_replace(dirname(__FILE__),"", $_POST["page_url"]);

	if($event_id){
		$result = mysqli_query($db->db_conn, "DELETE FROM events WHERE id = " . $event_id);
		if($result){
			echo "<script>alert('Event has been successfully deleted.')</script>";
			echo "<script>window.location.href='".$page_url."'</script>";
		}
		else{
			echo "<script>alert('Deletion Error.')</script>";
			echo "<script>window.location.href='".$page_url."'</script>";
		}
	}
}else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
?>
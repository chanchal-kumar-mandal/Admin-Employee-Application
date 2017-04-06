<?php 
if(isset($_SESSION["employee_user_name"])) {
	require_once("employee-profile.php");
}else{
	require_once("employee-login.php");
}
?>
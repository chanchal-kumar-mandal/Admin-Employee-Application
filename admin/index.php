<?php 
if(isset($_SESSION["admin_user_name"])) {
	require_once("admin-profile.php");
}else{
	require_once("admin-login.php");
}
?>
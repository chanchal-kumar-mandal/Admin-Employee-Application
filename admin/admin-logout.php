<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	unset($_SESSION["admin_user_name"]);
	echo "<script>window.location.href='admin-login.php'</script>";
}
?>
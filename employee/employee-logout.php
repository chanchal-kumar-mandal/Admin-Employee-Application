<?php
session_start();
if(isset($_SESSION["employee_user_name"])) {
	unset($_SESSION["employee_user_name"]);
	echo "<script>window.location.href='employee-login.php'</script>";
}
?>
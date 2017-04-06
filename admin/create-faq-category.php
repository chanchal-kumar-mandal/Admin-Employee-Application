<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	require_once("../database/dbconnection.php");

	$category = $_POST["category"];
	if(isset($_POST['createFAQCategory']) && !empty($category)) {
		$result = mysqli_query($db->db_conn,"insert into faq_categories(category) values('$category')");		
		if($result) {
			echo "<script>alert('FAQ Category has been successfully created.')</script>";
			echo "<script>window.location.href='faq.php'</script>";
		}
		else{
			echo "<script>alert('Insertion Error.')</script>";
			echo "<script>window.location.href='faq.php'</script>";
		}
	}
	else{
		echo "<script>window.location.href='faq.php'</script>";
	}
}else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
?>
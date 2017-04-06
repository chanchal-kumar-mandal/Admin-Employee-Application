<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	require_once("../database/dbconnection.php");

	$categoryId = $_POST['category_id'];
	$category = $_POST["category"];
	
	if(isset($_POST['editFAQCategory']) && !empty($category)) {
		$result = mysqli_query($db->db_conn,"UPDATE faq_categories SET 
			category = '$category'
			WHERE id = $categoryId"
			);		
		if($result) {
			echo "<script>alert('FAQ Category has been successfully updated.')</script>";
			echo "<script>window.location.href='faq.php'</script>";
		}
		else{
			echo "<script>alert('Updation Error.')</script>";
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
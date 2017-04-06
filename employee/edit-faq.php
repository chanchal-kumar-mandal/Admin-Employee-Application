<?php
session_start();
if(isset($_SESSION["employee_user_name"])) {
	require_once("../database/dbconnection.php");

	$faqId = $_POST['faq_id'];
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$categoryId = $_POST["category_id"];
	if(isset($_POST['editFAQ']) && !empty($faqId)) {
		$result = mysqli_query($db->db_conn,"UPDATE faq SET 
			question = '$question',
			answer = '$answer'
			WHERE id = $faqId"
			);		
		if($result) {
			echo "<script>alert('FAQ has been successfully updated.')</script>";
			echo "<script>window.location.href='faq-with-single-category.php?category_id=$categoryId'</script>";
		}
		else{
			echo "<script>alert('Updation Error.')</script>";
			echo "<script>window.location.href='faq-with-single-category.php?category_id=$categoryId'</script>";
		}
	}
	else{
		echo "<script>window.location.href='faq-with-single-category.php?category_id=$categoryId'</script>";
	}
}else{
	echo "<script>window.location.href='employee-login.php'</script>";
}
?>
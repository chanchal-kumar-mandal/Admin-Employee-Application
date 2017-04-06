<?php
session_start();
if(isset($_SESSION["admin_user_name"])) {
	require_once("../database/dbconnection.php");

	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$categoryId = $_POST["category_id"];

	if(isset($_POST['createFAQ']) && !empty($question) && !empty($answer) && !empty($category)) {
		$result = mysqli_query($db->db_conn,"insert into faq(question, answer, category_id) values('$question', '$answer', '$categoryId')");		
		if($result) {
			$categoryResult = mysqli_query($db->db_conn,"update faq_categories set total_faq = (total_faq + 1) WHERE category = '$category'");
			echo "<script>alert('FAQ has been successfully created.')</script>";
			echo "<script>window.location.href='faq-with-single-category.php?category_id=$categoryId'</script>";
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
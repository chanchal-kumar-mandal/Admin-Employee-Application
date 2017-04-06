<?php
require_once("admin-header.php");
if(isset($_SESSION["admin_user_name"])) {
?>
	<div class="page-container">
		<div class="row">
			<div class="col-md-12" id="allUsers"></div>
		</div>
		<?php require_once("admin-modals-page.php");?>
  	</div><!--End Page Container-->	
	<?php
	require_once("admin-footer.php");	
} else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
?>
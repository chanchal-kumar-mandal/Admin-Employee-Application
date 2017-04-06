<?php
require_once("admin-header.php");
if(isset($_SESSION["admin_user_name"])) {
?>
	<div class="page-container">
		<div class="col-md-3"> 
			<form action="attendance-calender-for-admin.php" method="get">
				<input type="hidden" class="form-control" name="month" value="<?php echo date('m');?>">
				<input type="hidden" class="form-control" name="year" value="<?php echo date('Y');?>">
				<button type="submit" class="btn btn-xs btn-primary">
				  <span class="glyphicon glyphicon-calendar"></span> Emploee Attendance In Calender
				</button>
			</form>
		</div>
	</div>
<?php
} else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
require_once("admin-footer.php");
?>

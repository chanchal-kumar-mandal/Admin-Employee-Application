<?php
require_once("employee-header.php");
if(isset($_SESSION["employee_user_name"])) {
?>
	<div class="page-container">
		<div class="col-md-3"> 
			<form action="attendance-calender-for-employee.php" method="get">
				<input type="hidden" class="form-control" name="month" value="<?php echo date('m');?>">
				<input type="hidden" class="form-control" name="year" value="<?php echo date('Y');?>">
				<button type="submit" class="btn btn-primary">
				  <span class="glyphicon glyphicon-calendar"></span> Emploee Attendance In Calender
				</button>
			</form>
		</div>
	</div>
<?php
} else{
	echo "<script>window.location.href='employee-login.php'</script>";
}
require_once("employee-footer.php");
?>

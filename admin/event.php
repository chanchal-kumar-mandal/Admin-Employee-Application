<?php
require_once("admin-header.php");
if(isset($_SESSION["admin_user_name"])) {
?>
	<div class="page-container">
		<div class="col-md-2">
			<form action="events-calender-for-admin.php" method="get">
				<input type="hidden" class="form-control" name="month" value="<?php echo date('m');?>">
				<input type="hidden" class="form-control" name="year" value="<?php echo date('Y');?>">
				<button type="submit" class="btn btn-primary">
				  <span class="glyphicon glyphicon-calendar"></span> Events In Calender
				</button>
			</form>
		</div>	
		<div class="col-md-2">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createEventModal"><span class="glyphicon glyphicon-plus"></span> Create Event</button>
		</div>



	  	<!-- Create Event Modal-->

		<div class="modal fade" id="createEventModal" role="dialog">
	    	<div class="modal-dialog">
	    
		      	<!-- Modal content-->
		      	<div class="modal-content">
		        	<div class="modal-header">
		          		<button type="button" class="close" data-dismiss="modal">&times;</button>
		          		<h4 class="modal-title text-center">Create Event</h4>
		        	</div>
		        	<div class="modal-body">
		          	<form role="form" action="create-event.php" method="post">
		          		<div class = "form-group">
					        <label for = "title">Event Title</label>
					        <input type = "text" class = "form-control" name = "title" placeholder = "Enter Event Title" required autofocus>
					   	</div>
						<div class="form-group">
					        <label class="control-label" for="date">Event Date:</label>
        					<input class="form-control" id="date" name="date" type="text" placeholder = "Enter Event Date" required/>
					    </div>
						<button type="submit" class="btn btn-primary" name="createEvent">Submit</button>
					</form>
		        	</div>
		        	<div class="modal-footer">
		          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        	</div>
		      	</div>		      
	    	</div>
	  	</div><!--End modal-->

	</div>
<?php
} else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
require_once("admin-footer.php");
?>

	

	  	<!-- Change Password Modal-->

		<div class="modal fade" id="changePasswordModal" role="dialog">
	    	<div class="modal-dialog">	    
		      	<!-- Modal content-->
		      	<div class="modal-content">
		        	<div class="modal-header">
		          		<button type="button" class="close" data-dismiss="modal">&times;</button>
		          		<h4 class="modal-title text-center">Change Password:</h4>
		        	</div>
		        	<div class="modal-body">
		          	<form role="form" action="change-employee-password.php" method="post">
		          		<input type = "hidden" class = "form-control" name="a_id" value="<?php echo $employee_id;?>">
						<div class="form-group">
							<label for="pwd">Old Password:</label>
							<input type="password" class="form-control" name="opassword" required autofocus>
						</div>
						<div class="form-group">
							<label for="pwd">New Password:</label>
							<input type="password" class="form-control" name="npassword" required>
						</div>
						<div class="form-group">
							<label for="pwd">Cofirm Password:</label>
							<input type="password" class="form-control" name="cpassword" required>
						</div>
						<button type="submit" class="btn btn-primary" name="changePassword">Submit</button>
					</form>
		        	</div>
		        	<div class="modal-footer">
		          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        	</div>
		      	</div>
		      
	    	</div>
	  	</div><!--End Change Password Modal-->
	  	
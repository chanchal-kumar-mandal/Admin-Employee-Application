<?php
require_once("admin-header.php");
if(isset($_SESSION["admin_user_name"])) {
?>
	<div class="page-container">
	
		<!-- Admin Section -->		
		<div class="row">
			<div class="col-md-4">
			<?php 
			foreach($adminResult as $user){
				echo '<table class="table table-bordered table-hover">	  
					<thead style="color: #fff;background-color: #752275;">
					<tr><th colspan="2"><span class="glyphicon glyphicon-user"></span> Your Info</th></tr>
					</thead>
				  	<tbody>	  	
					  	<tr>
					      <th>Name</th><td>' .  $user['name'] . '</td>
					    </tr>
					    <tr>
					      <th>Email</th><td>' .  $user['email'] . '</td>
					    </tr>
					    <tr>
					      <th>Mobile</th><td>' .  $user['mobile'] . '</td>
					    </tr>
					    <tr>
					      <th>Address</th><td>' .  $user['address'] . '</td>
					    </tr>
					    <tr>
					      <th>Salary</th><td>' .  $user['salary'] . '</td>
					    </tr>
					    <tr>
					      <th>Job Role</th><td>' .  $user['role'] . '</td>
					    </tr>
					    <tr>
					      	<th>Actions</th>
					      	<td>
					      		<button type="button" class="btn btn-xs btn-warning"  data-toggle="modal" data-target="#editAdminModal' . $user['id'] . '"><span class="glyphicon glyphicon-edit"></span> Edit</button>
					      	</td>
					  	</tr>
					</tbody>
				</table>
				<div class="modal fade" id="editAdminModal' . $user['id'] . '" role="dialog">
				    <div class="modal-dialog">
				    
				      	<!-- Modal content-->
				      	<div class="modal-content">
				        	<div class="modal-header">
				          		<button type="button" class="close" data-dismiss="modal">&times;</button>
				          		<h4 class="modal-title text-center">Edit Profile</h4>
				        	</div>
				        	<div class="modal-body">
				          		<form role="form" action="edit-admin.php" method="post">
				          			<input type = "hidden" class = "form-control" name = "admin_id" value="' . $user['id'] .'">
				          			<div class = "form-group">
								        <label for = "name">Name</label>
								        <input type = "text" class = "form-control" name = "name" value="' . $user['name'] .'" required autofocus>
							   		</div>
									<div class="form-group">
										<label for="email">Email address:</label>
										<input type="email" class="form-control" name="email" value="' . $user['email'] . '">
									</div>
									<div class="form-group">
										<label for="mobile">Mobile:</label>
										<input type="number" class="form-control" name="mobile" value="' . $user['mobile'] . '">
									</div>
									<div class="form-group">
										<label for="address">Address:</label>
										<textarea type="email" class="form-control" name="address">' . $user['address'] . '</textarea>
									</div>
									<button type="submit" class="btn  btn-xs btn-primary" name="editAdminBySelf">Submit</button>
							   	</form>
							</div>
				        	<div class="modal-footer">
				          		<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
				        	</div>
				      	</div>
	      
	    			</div>
	  			</div>';
	  		}
	  		?>
			</div>

			<!-- My Tasaks Section -->
			<div class="col-md-5">
				<ul id = "aboutTab" class = "nav nav-tabs">
				   <li class = "active">
				      <a href = "#done" data-toggle = "tab">
				         <button type="button" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-ok-circle"></span> Done Tasks</button>
				      </a>
				   </li>				   
				   <li>
				   		<a href = "#progress" data-toggle = "tab">					
				   			<button type="button" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pause"></span> Progress Tasks</button>
				   		</a>
				   	</li>					
				   	<li class = "dropdown">
				      <a href = "#upcoming" data-toggle = "tab">
				         <button type="button" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-tree-conifer"></span> Upcoming Tasks</button>
				      </a>				      
				   </li>					
				</ul>
				<?php
				$taskResult = mysqli_query($db->db_conn, "SELECT * FROM tasks WHERE user_id = " . $user['id']);
				foreach($taskResult as $task){
				?>
					<div id = "aboutTabContent" class = "tab-content">
					   	<div class = "tab-pane fade in active" id = "done">
					      	<?php echo '<p>'.$task['done'].'</p>'; ?>
					   	</div>				   
					   	<div class = "tab-pane fade" id = "progress">
					      	<?php echo '<p>'.$task['progress'].'</p>'; ?>
					   	</div>				   
					   	<div class = "tab-pane fade" id = "upcoming">
					      	<?php echo '<p>'.$task['upcoming'].'</p>'; ?>
					   	</div>
					   	<div class="row text-center">
					   		<button type="button" class="btn btn-xs btn-warning"  data-toggle="modal" data-target="#editMyTasksModal"><span class="glyphicon glyphicon-edit"></span> Edit</button>
					   	</div>
					   	<div class="modal fade" id="editMyTasksModal" role="dialog">
						    <div class="modal-dialog">
						      	<div class="modal-content">
						        	<div class="modal-header">
						          		<button type="button" class="close" data-dismiss="modal">&times;</button>
						          		<h4 class="modal-title text-center">My Tasks</h4>
						        	</div>
						        	<div class="modal-body">
						        		<form role="form" action="edit-tasks.php" method="post">
						          			<input type = "hidden" class = "form-control" name = "user_id" value="<?php echo $user['id']; ?>">
											<div class="form-group">
												<label for="done">Done Tasks:</label>
												<textarea type="email" class="form-control task-textarea" name="done"><?php echo $task['done']; ?></textarea>
											</div>
											<div class="form-group">
												<label for="progress">Progress Tasks:</label>
												<textarea type="email" class="form-control task-textarea" name="progress"><?php echo $task['progress']; ?></textarea>
											</div>
											<div class="form-group">
												<label for="upcoming">Upcoming Tasks:</label>
												<textarea type="email" class="form-control task-textarea" name="upcoming"><?php echo $task['upcoming']; ?></textarea>
											</div>
											<button type="submit" class="btn btn-xs btn-primary" name="editAdminTasks">Submit</button>
									   	</form>
						        	</div>
						        	<div class="modal-footer">
						          		<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
						        	</div>
						      	</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>	

			<!-- FAQ Section -->
			<div class="col-md-3">
				<?php require_once("faq-category-menu.php");?>
			</div>
		</div>

		<!-- Employee Section -->
		<div class="row">
			<div class="col-md-12" id="allUsers"></div>
		</div>	

		<!-- Menu Remaining Section -->
		<div class="row">			
			<div class="col-md-2">
				<div class="btn-group" role="group" aria-label="...">
				  <button type="button" class="btn btn-xs btn-info">1</button>
				  <button type="button" class="btn btn-xs btn-warning">2</button>

				  <div class="btn-group" role="group">
				    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu
				      <span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu">
				      <li><a href="#">Dropdown link</a></li>
				      <li><a href="#">Dropdown link</a></li>
				      <li><a href="#">Dropdown link</a></li>
				    </ul>
				  </div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="btn-group-vertical" role="group" aria-label="My Tasks">
					 <button type="button" class="btn btn-xs btn-success"><a href = "#done"><span class="glyphicon glyphicon-heart"></span> My Tasks</a></button>
					<button type="button" class="btn btn-xs btn-warning"><a href = "#progress"  data-toggle = "tab"><span class="glyphicon glyphicon-pause"></span> Progress Tasks</a></button>
					<button type="button" class="btn btn-xs btn-info"><a href = "#upcoming"><span class="glyphicon glyphicon-tree-conifer"></span> Upcoming Tasks</a></button>
				</div>
			</div>
		</div>
		<?php require_once("admin-modals-page.php");?>
  	</div><!--End Page Container-->	
	<?php
	require_once("admin-footer.php");	
} else{
	echo "<script>window.location.href='admin-login.php'</script>";
}
?>
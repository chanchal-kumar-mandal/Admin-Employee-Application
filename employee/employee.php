<?php
require_once("employee-header.php");
if(isset($_SESSION["employee_user_name"])) {
?>
	<div class="page-container">
		<table class="table table-bordered table-hover">	  
			  <thead style="color: #fff;background-color: #0e5a5a;">
			    <tr><th colspan="8"><span class="glyphicon glyphicon-list"></span> Employee List</th></tr>
			  </thead>
			  <tbody>	  	
				  <tr>
				      <th>Serial No.</th>
				      <th>Name</th>
				      <th>Address</th>
				      <th>Mobile</th>
				      <th>Email</th>
				      <th>Salary</th>
				      <th>Joinning Date</th>
				      <th>Job Role</th>
				  </tr>
		<?php
		if(mysqli_num_rows($result) > 0) {
		    $i= 1;
			foreach($result as $user){
				$salary_percentage = ($user['salary'] / 100000 )*100;
				echo '<tr>
					<td>' . $i . '</td>
					<td>' .  $user['name'] . '</td>
					<td>' . $user['address'] . '</td>
					<td>' . $user['mobile'] . '</td>
					<td>' . $user['email'] . '</td>
					<td>' . $user['salary'] . ' Rs
						<div class="progress">
						  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="'.$salary_percentage.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$salary_percentage.'%;">
						    '.$salary_percentage.'%
						  </div>
						</div>
					</td>
					<td>' . $user['dateOfJoinning'] . '</td>
					<td>' . $user['role'] . '</td>
				</tr>
				';
				$i++;
			}

		}else{
			echo '<tr>
					<td colspan="8" style="text-align:center;color:#ff0000;">No record found.</td>
				</tr>';
		}
				?>	      
			    
		  	</tbody>
		</table>
		
  	</div><!--End Page Container-->	
	<?php
	require_once("employee-footer.php");	
} else{
	echo "<script>window.location.href='employee-login.php'</script>";
}
?>
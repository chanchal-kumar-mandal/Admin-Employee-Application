<?php
require_once("../database/dbconnection.php");
session_start();
if(isset($_SESSION["admin_user_name"])) {
	$admin_id = $_SESSION['a_id'];
	$result = mysqli_query($db->db_conn, "SELECT * FROM users WHERE role != 'admin' order by name");
	$usersHtml ='<table class="table table-bordered table-hover datatable" id="dataTables-example">	  
				  	<thead style="color: #fff;background-color: #B66712;">
				    	<tr>
					    	<th colspan="9"><span class="glyphicon glyphicon-list"></span> Employee List
					    	<button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#createEmpModal"><span class="glyphicon glyphicon-plus"></span> Create Employee</button>
					    	</th>
					    </tr>
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
							<th class="text-center">Actions</th>
						</tr>';

			if(mysqli_num_rows($result) > 0) {
			    $i= 1;
				foreach($result as $user){
					$salary_percentage = ($user['salary'] / 100000 )*100;
					$usersHtml .= '<tr>
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
						<td>' . date("F j, Y", strtotime($user['dateOfJoinning'])) . '</td>
						<td>' . $user['role'] . '</td>
						<td>
							<button type="button" class="btn btn-xs btn-warning"  onclick="editUser('. $user['id'] .')"><span class="glyphicon glyphicon-edit"></span> Edit</button>
							<button type="button" class="btn btn-xs btn-danger" onclick="removeEmployee(' . $user['id'] . ')"><span class="glyphicon glyphicon-trash"></span> Delete</button>
							<button type="button" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#empLocationMapModal' . $user['id'] . '"><span class="glyphicon glyphicon-map-marker"></span> Location In Map</button>
						</td>
					</tr>
		  			<div class="modal fade" id="empLocationMapModal' . $user['id'] . '" role="dialog">
					    <div class="modal-dialog">
					      	<div class="modal-content">
					        	<div class="modal-header">
					          		<button type="button" class="close" data-dismiss="modal">&times;</button>
					          		<h4 class="modal-title text-center">Employee Location</h4>
					        	</div>
					        	<div class="modal-body">
					        		<h4 class="modal-title text-center">Working On Progress...</h4>
					        	</div>
					        	<div class="modal-footer">
					          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        	</div>
					      	</div>
						</div>
					</div>
					';
					$i++;
				}

			}else{
				$usersHtml .= '<tr>
						<td colspan="9" style="text-align:center;color:#ff0000;">No record found.</td>
					</tr>';
			}    
				    
			$usersHtml .='</tbody>
			</table>';

			// Return users informations table
			//echo $usersHtml;

			echo json_encode(array('status'=>'success', 'htmlData' => $usersHtml));
} else{
	echo json_encode(array('status'=>'fail', 'message' => 'Please login'));
}
?>
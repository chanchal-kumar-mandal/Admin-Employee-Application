<?php
require_once("employee-header.php");
if(isset($_SESSION["employee_user_name"])) {
?>
	<div class="page-container">
		<div class="col-md-6">
			<button type="button" class="btn btn-success" style="float:right" data-toggle="modal" data-target="#createFAQCategoryModal"><span class="glyphicon glyphicon-plus"></span> Create FAQ Category</button>
			<table class="table table-bordered table-hover pull-right">	  
			  	<thead style="color: #fff;background-color: #0e5a5a;">
				    <tr><th colspan="4"><span class="glyphicon glyphicon-list"></span> FAQ Category List</th></tr>
				</thead>
				<tbody>	  	
				  	<tr>
				      	<th>Serial No.</th>
				      	<th>Category</th>
				      	<th>Total FAQ</th>
				      	<th>Actions</th>
				  	</tr>
				<?php
				$i=0;
				foreach($faqCategoryResult as $category){
					if($i % 5 == 0){
						$listGroupItemClass = "list-group-item-primary";
						$panelClass = "panel-primary";
					}elseif($i % 5 == 1){
						$listGroupItemClass = "list-group-item-success";
						$panelClass = "panel-success";
					}elseif($i % 5 == 2){
						$listGroupItemClass = "list-group-item-info";
						$panelClass = "panel-info";
					}elseif($i % 5 == 3){
						$listGroupItemClass = "list-group-item-warning";
						$panelClass = "panel-warning";
					}elseif($i % 5 == 4){
						$listGroupItemClass = "list-group-item-danger";
						$panelClass = "panel-danger";
					}else{
						$listGroupItemClass = "list-group-item-default";
						$panelClass = "panel-default";
					}

					echo '<tr ">
						<td>' . $i . '</td>
						<td>' .  $category['category'] . '</td>
						<td>' . $category['total_faq'] . '</td>
						<td>
							<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#editFAQCategoryModal' . $category['id'] . '"><span class="glyphicon glyphicon-edit"></span> Edit</button>
							<button type="button" class="btn btn-danger"><a href="#" onclick="return checkDelete()"><span class="glyphicon glyphicon-remove"></span> Delete</a></button>
						</td>
					</tr>
					<div class="modal fade" id="editFAQCategoryModal' . $category['id'] . '" role="dialog">
					    <div class="modal-dialog">
					      	<div class="modal-content">
					        	<div class="modal-header">
					          		<button type="button" class="close" data-dismiss="modal">&times;</button>
					          		<h4 class="modal-title text-center">Edit FAQ</h4>
					        	</div>
					        	<div class="modal-body">
					        		<form role="form" action="edit-faq-category.php" method="post">
					        			<input type = "hidden" class = "form-control" name = "category_id" value="' . $category['id'] .'">
						          		<div class = "form-group">
									        <label for = "category">Category Name:</label>
									        <input type = "text" class = "form-control" id = "category" name = "category" value = "' .  $category['category'] . '" required autofocus>
									   	</div>
										<button type="submit" class="btn btn-primary" name="editFAQCategory">Submit</button>
									</form>
					        	</div>
					        	<div class="modal-footer">
					          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        	</div>
					      	</div>

						</div>
					</div>';
					$i++;
				}
				?>
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<div class="row"><button type="button" class="btn btn-success" style="float:right" data-toggle="modal" data-target="#createFAQModal"><span class="glyphicon glyphicon-plus"></span> Create FAQ</button></div>
			<div class="row"><?php require_once("faq-category-menu.php");?></div>
		</div>

		<!-- Create FAQ Category Modal-->

		<div class="modal fade" id="createFAQCategoryModal" role="dialog">
		    <div class="modal-dialog">
		    
		      	<!-- Modal content-->
		      	<div class="modal-content">
		        	<div class="modal-header">
		          		<button type="button" class="close" data-dismiss="modal">&times;</button>
		          		<h4 class="modal-title text-center">Create FAQ Category</h4>
		        	</div>
		        	<div class="modal-body">
		        		<form role="form" action="create-faq-category.php" method="post">
			          		<div class = "form-group">
						        <label for = "category">Category Name:</label>
						        <input type = "text" class = "form-control" id = "category" name = "category" placeholder = "Enter Question" required autofocus>
						   	</div>
							<button type="submit" class="btn btn-primary" name="createFAQCategory">Submit</button>
						</form>
		        	</div>
		        	<div class="modal-footer">
		          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        	</div>
		      	</div>

			</div>
		</div><!--End modal-->

		<!-- Create FAQ Modal-->

		<div class="modal fade" id="createFAQModal" role="dialog">
		    <div class="modal-dialog">
		    
		      	<!-- Modal content-->
		      	<div class="modal-content">
		        	<div class="modal-header">
		          		<button type="button" class="close" data-dismiss="modal">&times;</button>
		          		<h4 class="modal-title text-center">Create FAQ</h4>
		        	</div>
		        	<div class="modal-body">
		        		<form role="form" action="create-faq.php" method="post">
			          		<div class = "form-group">
						        <label for = "question">Question:</label>
						        <input type = "text" class = "form-control" id = "question"name = "question" placeholder = "Enter Question" required autofocus>
						   	</div>
							<div class="form-group">
						        <label class="control-label" for="answer">Answer:</label>
						        <textarea class="form-control" id="answer" name="answer" placeholder = "Enter Answer" required></textarea>
						    </div>
						    <div class="form-group">
							  	<label for="category">Category:</label>
							  	<select class="form-control" name="category" required>
							  		<?php 
							  		foreach ($faqCategoryResult as $category) {
							  			echo "<option>".$category['category']."</option>";
							  		}
							  		?>
							  	</select>
							</div>
							<button type="submit" class="btn btn-primary" name="createFAQ">Submit</button>
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
	echo "<script>window.location.href='employee-login.php'</script>";
}
require_once("employee-footer.php");
?>

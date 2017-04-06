<?php require_once("employee-header.php");?>
<div class="page-container">
	<div class="row">
		<ul id = "aboutTab" class = "nav nav-tabs">
		   <li class = "active">
		      <a href = "#home" data-toggle = "tab">
		         <span class="label label-primary">About Us</span>
		      </a>
		   </li>
		   
		   <li><a href = "#ios" data-toggle = "tab"><span class="label label-success">Progress List</span></a></li>
			
		   <li class = "dropdown">
		      <a href = "#" id = "aboutTabDrop1" class = "dropdown-toggle" data-toggle = "dropdown">
		         <span class="label label-info">User Role</span>
		         <b class = "caret"></b>
		      </a>
		      
		      <ul class = "dropdown-menu" role = "menu" aria-labelledby = "aboutTabDrop1">
		         <li style="margin-bottom:10px;"><a href = "#jmeter" tabindex = "-1" data-toggle = "tab"><span class="label label-danger">Admin</span></a></li>
		         <li><a href = "#ejb" tabindex = "-1" data-toggle = "tab"><span class="label label-warning">Employee</span></a></li>
		      </ul>
		      
		   </li>
			
		</ul>

		<div id = "aboutTabContent" class = "tab-content">

		   <div class = "tab-pane fade in active" id = "home">
		      	<p>Admin can create, edit, delete employee and view calender events , employee attendance calender.</p>
		      	<p>Employee can edit profile informatiom and view calender events.</p>
		   </div>
		   
		   <div class = "tab-pane fade" id = "ios">
		      	<ol>
		      		<li>Bootstrap Navmenu</li>
		      		<li>Bootstrap Tab</li>
		      		<li>Bootstrap Table</li>
		      		<li>Bootstrap Modal</li>
		      		<li>Bootstrap Form</li>
		      		<li>Bootstrap Label</li>
		      		<li>Bootstrap Label</li>
		      		<li>Bootstrap Bootstrap Progress Bar</li>
		      		<li>Calender Wise Data Show</li>
		      	</ol>
		   </div>
		   
		   <div class = "tab-pane fade" id = "jmeter">
		      <p>Admin can create, edit, delete employee and also view calender events , employee attendance calender.</p>
		   </div>
		   
		   <div class = "tab-pane fade" id = "ejb">
		      <p>Employee can edit profile informatiom and view calender events.</p>
		   </div>
		   
		</div>
	</div>
</div>
<?php require_once("employee-footer.php");?>
		
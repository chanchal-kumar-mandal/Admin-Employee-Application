<?php
session_start();
require_once("../database/dbconnection.php");
?>
<html>
	<head>
		 <!-- Browser Auto Refresh 
		 <meta http-equiv="refresh" content="60" />
		-->
		<!--<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">-->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-datepicker3.css"/>
		<link rel="stylesheet" type="text/css" href="../assets/css/login-form.css"/>
		<link rel="stylesheet" type="text/css" href="../assets/css/admin-style.css"/>
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/admin-main.js"></script>
		<style type="text/css">
		.navbar-dark .navbar-toggle {
		    border-color: #3d85c3;
		}
		.navbar-dark .navbar-toggle: hover{
			background-color: #1b63a2;
		}
		.navbar-dark .navbar-toggle: hover{
			background-color: #1a67ab;
		}
		.navbar-dark .navbar-toggle .icon-bar {
		    background-color: #fff;
		}
		.navbar-nav li> a:hover{
			background-color: #0e4575;
		}

		</style>
	</head>
	<body>	
		<nav role="navigation" class="navbar navbar-dark bg-primary navbar-fixed-top">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	        </div>
	        <!-- Collection of nav links and other content for toggling -->
	        <div id="navbarCollapse" class="collapse navbar-collapse header-menu">
	        	<div class="navbar-header">
			      	<a class="navbar-brand" href="employee-profile.php">Employe</a>
			    </div>
			    <?php
			    if(isset($_SESSION["employee_user_name"])) {
					$employe_id = $_SESSION['e_id'];
					$employeResult = mysqli_query($db->db_conn, "SELECT * FROM users WHERE role != 'admin' AND id = " . $employe_id);
					$result = mysqli_query($db->db_conn, "SELECT * FROM users WHERE role != 'admin' order by name");

					$faqCategoryResult = mysqli_query($db->db_conn, "SELECT * FROM faq_categories order by category");
				?>							
	            <ul class="nav navbar-nav">
			      	<li class="active"><a href="employee-profile.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			        <li><a href="about-us.php"><span class="glyphicon glyphicon-globe"></span> About</a></li>
			        <li><a href="employee.php"><span class="glyphicon glyphicon-list-alt"></span> Employee</a></li>
			        <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendence</a></li>
			        <li><a href="event.php"><span class="glyphicon glyphicon-tint"></span> Event</a>
			        </li>
			        <li><a href="faq.php"><span class="glyphicon glyphicon-plus-sign"></span> FAQ</a>
			        </li>
			    </ul>
			    <?php
				foreach($employeResult as $userEmploye) {
			    ?>
				    <ul class="nav navbar-nav navbar-right">
				      	<li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $userEmploye['name'] . ' (' . $userEmploye['role'] . ')'; ?><span class="caret"></span></a>
					      	<ul class="dropdown-menu">
					          	<li><a href="#" data-toggle="modal" data-target="#changePasswordModal"><span class="glyphicon glyphicon-eye-open"></span> Change Password</a></li>
					          	<li><a href="employee-logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					        </ul>
				      	</li>
				    </ul>
			    <?php
			    	}
			    require_once("employee-required-modals.php");
				}else{ 
			    ?>
			    <ul class="nav navbar-nav navbar-right">
			      	<li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
				      	<ul class="dropdown-menu">
				          	<li><a href="employee-login.php">Employe Login</a></li>
			        	</ul>
			      	</li>
			    </ul>
			    <?php
				}
				?>
	        </div>
	    </nav>
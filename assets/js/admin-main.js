
/*Form Message Vanish*/

function message_remove(){
    setTimeout(function(){ 
        $("#message").html('');
    }, 3000);
}
function message_remove_and_page_reload(){
    setTimeout(function(){ 
        location.reload(true);
    }, 3000);
}
function close_message_modal(){
    setTimeout(function(){ 
        $('#messageModal').modal('hide');
    }, 3000);

}

/* Show All Users */

function showAllUsers(){
    $.ajax({
        type: "POST",
        url: "all-users.php",
        data: {},
        dataType: "json",
        cache: false,
        success: function(result){
            if(result.status == 'success'){                
                $("#allUsers").html(result.htmlData);             
                $("#dataTables-example").DataTable(); 

            }
            if(result.status == 'fail'){
                $("#allUsers").html(result.message); 
            }               
        }
    });
}

/* Show User Info In Update Modal */

function editUser(uid){
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "user-info.php",
        data: {uid : uid},
        dataType: "json",
        cache: false,
        success: function(result){
            if(result.status == 'success'){
                $("#userId").val(result.userData.id);
                $("#userName").val(result.userData.name);
                $("#userEmail").val(result.userData.email);
                $("#userAddress").val(result.userData.address);
                $("#userMobile").val(result.userData.mobile);
                $("#userSalary").val(result.userData.salary);
                $("#userJoinningDate").val(result.userData.dateOfJoinning);
                $("#userRole").val(result.userData.role);
                $("#editEmpModal").modal();
            }
            if(result.status == 'fail'){
                if(result.message == 'Please login'){
                    window.location.href = "login.php";
                }else{
                    $("#messageModal").modal(); 
                    $("#message").html('<div class="error-message">'+result.message+'</div>');
                    close_message_modal(); 
                }   
            }                     
        }
    });
}

/* Show Remove Employee/User Modal  */

function removeEmployee(uid){
    $("#deleteModal").modal();  
    $('#confirmMessage').html('<h5 class="text-danger text-center">Are you sure delete this employee?</h5>');
    $('#deleteButton').html('<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteEmployee(' + uid + ')"><span class="glyphicon glyphicon-trash"></span> Delete</a>');
}

/* Remove Employee/User From Database */

function deleteEmployee(uid){
    $('#deleteModal').modal('hide');
    $.ajax({
        type: "POST",
        url: "delete-employee.php",
        data: {uid : uid},
        dataType: "json",
        cache: false,
        success: function(result){
            if(result.status == 'success'){
                $("#message").html('<div class="success-message">'+result.message+'</div>');
                $("#messageModal").modal(); 
                showAllUsers();
                close_message_modal();
            }
            if(result.status == 'fail'){
                if(result.message == 'Please login'){
                    window.location.href = "login.php";
                }else{
                    $("#messageModal").modal(); 
                    $("#message").html('<div class="error-message">'+result.message+'</div>');
                    close_message_modal(); 
                }   
            }                
        }
    });
}

function checkDelete(){
    return confirm('Are you sure you want to delete this record?');
}

function checkPermission(){
    return confirm('Are you sure you want to change permission?');
}

/* Document Ready */ 

$(document).ready(function() {

	/* Call showAllUsers() function */
    showAllUsers();

    /* Date Picker */
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input.datepicker({
		format: 'yyyy-mm-dd',
		container: container,
		todayHighlight: true,
		autoclose: true,
	})
	
	var date_input_edit = $('input[name="dateEdit"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input_edit.datepicker({
	format: 'yyyy-mm-dd',
		container: container,
		todayHighlight: true,
		autoclose: true,
	})
	
	$('[data-toggle="popover"]').popover({
		trigger : 'hover'
	});
	

	/* Admin Login*/
	$("#adminLoginForm").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "admin-login-check.php",
            data: $('#adminLoginForm').serialize(),
            dataType: "json",
            cache: false,
			success: function(result){
				if(result.status == 'success'){
					$('#adminLoginForm').trigger("reset");
					$("#message").html('<div class="success-message">'+result.message+'<img src="../assets/images/admin/loading-small.gif" alt="loading" "></div>');
					window.location.href='admin-profile.php';					
				}
				if(result.status == 'fail'){
					$("#message").html('<div class="error-message">'+result.message+'</div>');
				}
			}
		});
	});
	
	/* Employee Login*/
	$("#employeeLoginForm").submit(function(event){
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "employee-login-check.php",
			data: $("#employeeLoginForm").serialize(),
			dataType: "json",
			cache: false,
			success: function(result){
				if(result.status == 'success'){
					$('#employeeLoginForm').trigger("reset");
					$("#message").html('<div class="success-message">'+result.message+'<img src="../assets/images/admin/loading-small.gif" alt="loading"></div>');
					window.location.href='employee-login.php';					
				}
				if(result.status == 'fail'){
					$("#message").html('<div class="error-message">'+result.message+'</div>');
				}
			}
		});
		return false;
	});		

	/* Change Admin Password */

    $("#changeAdminPasswordForm").submit(function(event){  
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "change-admin-password-submit.php",
            data: $('#changeAdminPasswordForm').serialize(),
            dataType: "json",
            cache: false,
            success: function(result){
                if(result.status == 'success'){
                    $('#changeAdminPasswordForm').trigger("reset");
                    $("#changePasswordModal").modal('hide'); 
                    $("#message").html('<div class="success-message">'+result.message+'</div>');
                    $("#messageModal").modal(); 
                    close_message_modal();
                    /*window.location.href='admin-logout.php';*/
                }
                if(result.status == 'fail'){
                    if(result.message == 'Please login'){
                        window.location.href = "login.php";
                    }else{
                        $("#messageModal").modal(); 
                        $("#message").html('<div class="error-message">'+result.message+'</div>');
                        close_message_modal(); 
                    }   
                }                
            }
        });
    });

    /* Create/Add Employee */

    $("#addEmployeeForm").submit(function(event){  
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "add-employee-submit.php",
            data: $('#addEmployeeForm').serialize(),
            dataType: "json",
            cache: false,
            success: function(result){
                if(result.status == 'success'){
                    $('#addEmployeeForm').trigger("reset");
                    $("#createEmpModal").modal('hide'); 
                    $("#message").html('<div class="success-message">'+result.message+'</div>');
                    $("#messageModal").modal(); 
                    showAllUsers();
                    close_message_modal();
                }
                if(result.status == 'fail'){
                    if(result.message == 'Please login'){
                        window.location.href = "login.php";
                    }else{
                        $("#messageModal").modal(); 
                        $("#message").html('<div class="error-message">'+result.message+'</div>');
                        close_message_modal(); 
                    }   
                }                
            }
        });
    });

    /* Edit Employee */

    $("#editEmployeeForm").submit(function(event){  
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "edit-employee-submit-by-admin.php",
            data: $('#editEmployeeForm').serialize(),
            dataType: "json",
            cache: false,
            success: function(result){
                if(result.status == 'success'){
                    $('#editEmployeeForm').trigger("reset");
                    $("#editEmpModal").modal('hide'); 
                    $("#message").html('<div class="success-message">'+result.message+'</div>');
                    $("#messageModal").modal(); 
                    showAllUsers();
                    close_message_modal();
                }
                if(result.status == 'fail'){
                    if(result.message == 'Please login'){
                        window.location.href = "login.php";
                    }else{
                        $("#messageModal").modal(); 
                        $("#message").html('<div class="error-message">'+result.message+'</div>');
                        close_message_modal(); 
                    }   
                }                
            }
        });
    });



	/* Create/Add FAQ */

    $("#addFAQForm").submit(function(event){  
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "add-faq-submit.php",
            data: $('#addFAQForm').serialize(),
            dataType: "json",
            cache: false,
            success: function(result){
                if(result.status == 'success'){
                    $('#addFAQForm').trigger("reset");
                    $("#createFAQModal").modal('hide'); 
                    $("#message").html('<div class="success-message">'+result.message+'</div>');
                    $("#messageModal").modal(); 
                    close_message_modal();
                }
                if(result.status == 'fail'){
                    if(result.message == 'Please login'){
                        window.location.href = "login.php";
                    }else{
                        $("#messageModal").modal(); 
                        $("#message").html('<div class="error-message">'+result.message+'</div>');
                        close_message_modal(); 
                    }   
                }                
            }
        });
    });

    /* Create/Add Event */

    $("#addEventForm").submit(function(event){  
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "add-event-submit.php",
            data: $('#addEventForm').serialize(),
            dataType: "json",
            cache: false,
            success: function(result){
                if(result.status == 'success'){
                    $('#addEventForm').trigger("reset");
                    $("#createEventModal").modal('hide'); 
                    $("#message").html('<div class="success-message">'+result.message+'</div>');
                    $("#messageModal").modal();
                    close_message_modal();
                }
                if(result.status == 'fail'){
                    if(result.message == 'Please login'){
                        window.location.href = "login.php";
                    }else{
                        $("#messageModal").modal(); 
                        $("#message").html('<div class="error-message">'+result.message+'</div>');
                        close_message_modal(); 
                    }   
                }                
            }
        });
    });

});
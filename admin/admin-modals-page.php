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
                        <form role="form" id="changeAdminPasswordForm">
                            <input type = "hidden" class = "form-control" name="a_id" value="<?php echo $admin_id;?>">
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
                            <button type="submit" class="btn btn-xs btn-primary" name="changePassword"><span class="glyphicon glyphicon-leaf"></span> Submit</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </div>
                  
                </div>
            </div>
            <!--End Change Password Modal-->


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
                            <form role="form" id="addFAQForm">
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
                                <button type="submit" class="btn btn-xs btn-primary" name="createFAQ"><span class="glyphicon glyphicon-leaf"></span> Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </div>

                </div>
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
                        <form role="form" id="addEventForm">
                            <div class = "form-group">
                                <label for = "title">Event Title</label>
                                <input type = "text" class = "form-control" name = "title" placeholder = "Enter Event Title" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="date">Event Date:</label>
                                <input class="form-control" id="date" name="date" type="text" placeholder = "Enter Event Date" required/>
                            </div>
                            <button type="submit" class="btn btn-xs btn-primary" name="createEvent"><span class="glyphicon glyphicon-leaf"></span> Submit</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </div>            
                </div>
            </div><!--End modal-->

            <!-- Create Employee Modal-->

            <div class="modal fade" id="createEmpModal" role="dialog">
                <div class="modal-dialog">
            
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Create Employee</h4>
                        </div>
                        <div class="modal-body">
                        <form id="addEmployeeForm">
                            <div class = "form-group">
                                <label for = "name">Name:</label>
                                <input type = "text" class = "form-control" name = "name" placeholder = "Enter Name" required autofocus>
                            </div>
                            <div class = "form-group">
                                <label for = "username">Username:</label>
                                <input type = "text" class = "form-control" name = "username" placeholder = "Enter Username" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea type="email" class="form-control" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="number" class="form-control" name="mobile">
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input type="number" class="form-control" name="salary">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="date">Joinning Date:</label>
                                <input class="form-control" id="date" name="date" type="date"/>
                            </div>
                            <div class="form-group">
                                <label for="role">Job Role:</label>
                                <select class="form-control" name="role" required>
                                    <option>Emp</option>
                                    <option>HR</option>
                                    <option>Designer</option>
                                    <option>Developer</option>
                                    <option>PM</option>
                                </select>
                            </div>
                            <button type="submit" id="addEmployeeSubmitButton" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-leaf"></span> Submit</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </div>            
                </div>
            </div><!--End modal-->

            <!-- Edit Employee Modal-->

            <div class="modal fade" id="editEmpModal" role="dialog">
                <div class="modal-dialog">
            
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Edit Employee</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" id="editEmployeeForm">
                            <input type = "hidden" class = "form-control" id = "userId" name = "emp_id">
                            <div class = "form-group">
                                <label for = "name">Name:</label>
                                <input type = "text" class = "form-control" id = "userName" name = "name" placeholder = "Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" id="userEmail" name="email">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea type="email" class="form-control" id="userAddress" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="number" class="form-control" id="userMobile" name="mobile">
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input type="number" class="form-control" id="userSalary" name="salary">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="date">Joinning Date:</label>
                                <input class="form-control"  id="userJoinningDate" name="date" type="date"/>
                            </div>
                            <div class="form-group">
                                <label for="role">Job Role:</label>
                                <select class="form-control" id="userRole" name="role" required>
                                    <option>Emp</option>
                                    <option>HR</option>
                                    <option>Designer</option>
                                    <option>Developer</option>
                                    <option>PM</option>
                                </select>
                            </div>
                            <button type="submit" id="editEmployeeSubmitButton" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-leaf"></span> Update</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </div>            
                </div>
            </div><!--End modal-->
            
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" role="dialog">
                <div class="modal-dialog modal-sm">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center"></h4>
                        </div>
                        <div class="modal-body">
                            <span id='confirmMessage'></span>
                        </div>
                        <div class="modal-footer">
                            <span id='deleteButton'></span>
                            <button type="button" class="btn btn-xs btn-default btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </div>
      
                </div>
            </div>
            <!-- End Delete Modal -->

            <!-- Employee Location Modal -->
            <div class="modal fade" id="empLocationMapModal" role="dialog">
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
                            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Location Modal -->
            
            <!-- Messaage Modal -->
            <div class="modal fade" id="messageModal" role="dialog">
                <div class="modal-dialog modal-sm">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center"></h4>
                        </div>
                        <div class="modal-body">
                            <span id='message'></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-xs btn-default btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </div>
      
                </div>
            </div>
            <!--End Messaage Modal -->
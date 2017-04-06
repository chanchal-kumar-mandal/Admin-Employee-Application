<?php 
require_once("employee-header.php");
if(isset($_SESSION["employee_user_name"])) {
    require_once("employee-profile.php");
}else{
?>
    <div class="page-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Sign in to continue to Employee Section</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                            alt="">
                        <form class="form-signin" action="employee-login-check.php" method="post">
                        <div id="message"></div>
                        <label class="checkbox text-center">Employee Login</label>
                        <input name="eusername" type="text" class="form-control" placeholder="Username" required autofocus>
                        <input name="epassword" type="password" class="form-control" placeholder="Password" required>
                        <button name="elogin" class="btn btn-lg btn-primary btn-block" type="submit">
                            Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}
require_once("employee-footer.php");
?>
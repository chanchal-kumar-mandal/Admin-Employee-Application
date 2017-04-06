<?php 
require_once("admin-header.php");
if(isset($_SESSION["admin_user_name"])) {
    require_once("admin-profile.php");
}else{
?>
    <div class="page-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Sign in to continue to Admin Section</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                            alt="Login Img">
                        <form class="form-signin" role="form" id="adminLoginForm">
                            <div id="message"></div>
                            <label class="checkbox text-center">Admin Login</label>
                            <input name="ausername" type="text" class="form-control" placeholder="Username" required autofocus>
                            <input name="apassword" type="password" class="form-control" placeholder="Password" required>
                            <input class="btn btn-lg btn-primary btn-block" type="submit" id="adminLoginSubmitButton" value="Log in"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}
require_once("admin-footer.php");
?>
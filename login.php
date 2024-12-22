<?php
require_once "header.php";
require_once "navbar.php";
require_once 'function.php';
if(isset($_POST['login'])){
$email= $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$pass=trim(filter_input(INPUT_POST, 'pass'));
if (empty_form($email)) $_SESSION['empty_email'] = 'Email is required';
if (empty_form($pass)) $_SESSION['empty_pass'] = 'Password is required';
if(vaild_Email($email))$_SESSION['vaild_email']='vaild_email';
else{
$select="SELECT * FROM `users` WHERE `email`='$email' ";
$selectdone=mysqli_query($conn,$select);
$selectdone=mysqli_fetch_assoc($selectdone);
if($email==$selectdone['email']){
    if($pass==$selectdone['pass']){
    $_SESSION['user_login']=$selectdone['name'];
       $_SESSION['user_email']=$selectdone['email'];
       $_SESSION['user_phone']=$selectdone['phone'];
       $_SESSION['user_id']=$selectdone['id'];
       $_SESSION['user_type']=$selectdone['type'];

    }
    else $_SESSION['wrong_pass']="the pass is incorrected";
}
else $_SESSION['wrong_email']="this email is wrong";    
}

    
}
if(isset($_SESSION['user_login'])&& $_SESSION['user_type']=='user')header('location:shop.php');
else if(isset($_SESSION['user_login'])&& $_SESSION['user_type']=='admin')header('location:admin/view/layout.php');




?>


<div class="card-body px-5 py-5" style="background-color:darkgray;">





    <h3 class="card-title text-left mb-3">Login</h3>
    <form action="" method="post">
        <div class="form-group">
            <label>email *</label>
            <?php if(isset($_SESSION['vaild_email']))echo $_SESSION['vaild_email'];
                        else if(isset($_SESSION['empty_email']))echo$_SESSION['empty_email'];
                        else if(isset($_SESSION['wrong_email']))echo$_SESSION['wrong_email'];
                        unset($_SESSION['empty_email']);
                        unset($_SESSION['vaild_email']);
                        unset($_SESSION['wrong_email']);?>
            <input type="email" name="email" class="form-control p_input">
        </div>
        <div class="form-group">
            <label>Password *</label>
            <?php if(isset($_SESSION['empty_pass']))echo$_SESSION['empty_pass'];
                               else if(isset($_SESSION['wrong_pass']))echo $_SESSION['wrong_pass'];
                        unset($_SESSION['empty_pass']);
                        unset($_SESSION['wrong_pass']);?>
            <input type="text" name="pass" class="form-control p_input">
        </div>
        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me </label>
            </div>
            <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
        </div>
        <div class="text-center">
            <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
        </div>
        <div class="d-flex">
            <button class="btn btn-facebook me-2 col">
                <i class="mdi mdi-facebook"></i> Facebook </button>
            <button class="btn btn-google col">
                <i class="mdi mdi-google-plus"></i> Google plus </button>
        </div>
        <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
    </form>
</div>
</div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- row ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<?php include "footer.php" ?>
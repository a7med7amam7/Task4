<?php
require_once "header.php";
require_once "navbar.php";
require_once 'function.php';
if(isset($_POST['submit'])){
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $pass = trim(filter_input(INPUT_POST, 'pass'));
    $address = trim(filter_input(INPUT_POST, 'address'));
    if (empty_form($email)) $_SESSION['empty_email'] = 'Email is required';
    if (empty_form($pass)) $_SESSION['empty_pass'] = 'Password is required';
    if (empty_form($name)) $_SESSION['empty_name'] = 'name is required';
    if (empty_form($phone)) $_SESSION['empty_phone'] = 'phone is required';
    if (empty_form($address)) $_SESSION['address'] = 'address is required';
    if(vaild_Email($email))$_SESSION['vaild_email']='vaild_email';
    if(empty($_SESSION)){
     $check=insert_user($name,$email,$pass,$phone,$address);   
     if($check)header('location:login.php');
     else $_SESSION['wrong_email']="this email is used";
    }
}
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">



    <h3 class="card-title text-left mb-3">Register</h3>
    <form action="" method="post">
        <div class="form-group">
            <label>Username</label>
            <?php if(isset($_SESSION['empty_name']))echo$_SESSION['empty_name'];
                        unset($_SESSION['empty_name']);?>
            <input type="text" class="form-control p_input" name="name" value="">
        </div>
        <div class="form-group">
            <label>Email</label>
            <?php if(isset($_SESSION['vaild_email']))echo $_SESSION['vaild_email'];
                        else if(isset($_SESSION['empty_email']))echo$_SESSION['empty_email'];
                        else if(isset($_SESSION['wrong_email']))echo$_SESSION['wrong_email'];
                        unset($_SESSION['empty_email']);
                        unset($_SESSION['vaild_email']);
                        unset($_SESSION['wrong_email']);
                        ?>
            <input type="email" class="form-control p_input" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <?php if(isset($_SESSION['empty_pass']))echo$_SESSION['empty_pass'];
                        unset($_SESSION['empty_pass']);?>
            <input type="password" class="form-control p_input" name="pass">

        </div>
        <div class="form-group">
            <label>Phone</label>
            <?php if(isset($_SESSION['empty_phone']))echo$_SESSION['empty_phone'];
                        unset($_SESSION['empty_phone']);?>
            <input type="text" class="form-control p_input" name="phone">
        </div>
        <div class="form-group">
            <label>Address</label>
            <?php if(isset($_SESSION['empty_address']))echo$_SESSION['empty_adress'];
                        unset($_SESSION['empty_address']);?>
            <input type="text" class="form-control p_input" name="address">
        </div>

        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Signup</button>
                </div>
                <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                        <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div>
                <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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


<!-- regex 

  $regex = /^01[0,1,2,5][0-9]{8}$/

  preg_match($regex,) 
  
  -->
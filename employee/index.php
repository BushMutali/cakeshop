<?php
include '../admin/header.php';
if (isset($_SESSION["employee_name"])) {
    header('location: dashboard.php');
}

?>
<section class="header">
<div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <h1>Employee Log In</h1>
                    <span><?php 
                        if(isset($_GET["password-error"])){
                            echo "Invalid Password!";
                        }elseif(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidemail'])) {
                            echo 'Invalid email format!';
                        }elseif (isset($_GET['emaildoesnotexist'])) {
                            echo 'Email does not exist!';
                        }elseif (isset($_GET['regsuccess'])) {
                            echo 'Registration Successfull, you can now login!';
                        }
                    ?></span>
                </div>
                <form action="../config/forms.php" method="post">
                    <div class="form-input">
                        <label>email</label>
                        <input type="email" name="email">
                    </div>
                    <div class="form-input">
                        <label>password</label>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" value="Login" name="employee-login">
                </form>
                <a href="">Forgot password?</a>
            </div>
        </div>
    </section>
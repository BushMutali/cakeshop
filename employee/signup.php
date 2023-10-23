<?php
include '../admin/header.php';


?>
<section class="header">
<div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <h1>Add Employee</h1>
                    <span><?php 
                        if(isset($_GET["passwordsdon'tmatch"])){
                            echo "Passwords didn't match!";
                        }elseif(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidemail'])) {
                            echo 'Invalid email format!';
                        }
                        elseif (isset($_GET['invalidname'])) {
                            echo 'Name cannot be number or special character!';
                        }elseif (isset($_GET['email-taken'])) {
                            echo 'Email already in use. Try another one!';
                        }
                    ?></span>
                </div>
                <form action="../config/forms.php" method="post">
                    <div class="form-input">
                        <label>name</label>
                        <input type="text" name="username">
                    </div>
                    <div class="form-input">
                        <label>email</label>
                        <input type="email" name="email" >
                    </div>
                    <div class="form-input">
                        <label>password</label>
                        <input type="password" name="password1">
                    </div>
                    <div class="form-input">
                        <label>confirm password</label>
                        <input type="password" name="password2">
                    </div>
                    <input type="submit" value="Add" name="employee-signup">
                </form>
            </div>
        </div>
    </section>
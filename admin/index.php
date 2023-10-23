<?php
    include 'header.php';
    if (isset($_SESSION["admin"])) {
        header('location: dashboard.php');
    }
?>
<section class="header">
<div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <h1>Admin Log In</h1>
                    <span><?php 
                        if(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidusername'])) {
                            echo 'Invalid username!';
                        }elseif (isset($_GET['loginerror'])) {
                            echo 'Invalid details!';
                        }
                    ?></span>
                </div>
                <form action="../config/forms.php" method="post">
                    <div class="form-input">
                        <label>username</label>
                        <input type="text" name="username">
                    </div>
                    <div class="form-input">
                        <label>password</label>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" value="Login" name="admin-login">
                </form>
            </div>
        </div>
    </section>
<?php
    include 'header.php';
    if (isset($_SESSION["customer_name"]))  {
        header('location: index.php');
    } 
?>
        <div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <h1>Log In</h1>
                    <span><?php 
                        if(isset($_GET["password-error"])){
                            echo "Invalid Password!";
                        }elseif(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidemail'])) {
                            echo 'Invalid email format!';
                        }elseif (isset($_GET['emaildoesnotexist'])) {
                            echo 'Email does not exist!';
                        }elseif (isset($_GET['signupsuccess'])) {
                            echo 'Sign up successfull, you can now login!';
                        }
                    ?></span>
                </div>
                <form action="config/forms.php" method="post">
                    <div class="form-input">
                        <label>email</label>
                        <input type="email" name="email">
                    </div>
                    <div class="form-input">
                        <label>password</label>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" value="Login" name="customer-login">
                </form>
                <a href="">Forgot password?</a>
                <h5>Are you an employee? <a href="employee/">Login &rightarrow;</a></h5>
                <h5><a href="admin/">Admin </a>Login</h5>
                <h5>Don't have an account? <a href="signup.php">Signup</a></h5>
            </div>
        </div>
    </section>
    <?php
    include 'footer.php';
    if (isset($_GET['loginrequired'])) {
        echo '<script>
        alert("You need to login before placing an order!");
        </script>';
    }
?>
<?php
    include 'header.php';
    if (isset($_SESSION["customer_name"])) {
        header('location: index.php');
    }
?>
        <div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <h1>Signup</h1>
                    <span><?php 
                        if(isset($_GET["passwordsdon'tmatch"])){
                            echo "Passwords didn't match!";
                        }elseif(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidemail'])) {
                            echo 'Invalid email format!';
                        }elseif (isset($_GET['email-taken'])) {
                            echo 'Email already in use. Try another one!';
                        }elseif (isset($_GET['invalidname'])) {
                            echo 'Invalid name format!';
                        }
                    ?></span>
                </div>
                <form action="config/forms.php" method="post">
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
                    <input type="submit" value="Signup" name="customer-signup">
                </form>
                <h5>Already have an account? <a href="login.php">Login</a></h5>
            </div>
        </div>
    </section>
<?php
    include 'footer.php';
?>
<?php
include '../admin/header.php';
if (isset($_SESSION["employee_name"])) {
    header('location: dashboard.php');
}

?>
<div class="login-form-container">
            <div class="login-form">
                <h1>login</h1>
    <form action="../config/forms.php" method="post" >
                    <p class="error" style="color: red;"><?php 
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
                    ?></p>
                    <span><i class="fa-solid fa-user-group"></i> Employee</span>
                    <div class="form-input">
                        <label>email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-input">
                        <label>password</label>
                        <input type="password" name="password" id="passwordField" required>
                        <i class="fa-solid fa-eye" id="hide" ></i>
                        <i class="fa-solid fa-eye-slash" id="show" style="display: none;"></i>
                    </div>
                    <a href="">Forgot password?</a>
                    <button type="submit" name="employee-login">login</button>
                </form>
                <a href="../login.php">back</a>
            </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            var passwordField = document.getElementById('passwordField');
            var showIcon = document.getElementById('show');
            var hideIcon = document.getElementById('hide');
    
            // Function to toggle password visibility
            function togglePasswordVisibility() {
                var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
            }
    
            // Add click event listeners to the eye icons
            showIcon.addEventListener('click', function () {
                togglePasswordVisibility();
                showIcon.style.display = 'none';
                hideIcon.style.display = 'inline-block';
            });
    
            hideIcon.addEventListener('click', function () {
                togglePasswordVisibility();
                hideIcon.style.display = 'none';
                showIcon.style.display = 'inline-block';
            });

            
        });
</script>
<?php
    include 'header.php';
    if (isset($_SESSION["admin"])) {
        header('location: dashboard.php');
    }
?>
<div class="login-form-container">
            <div class="login-form">
                <h1>login</h1>
                    <form action="../config/forms.php" method="post" >
                        <p class="error" style="color: red;"><?php 
                            if(isset($_GET['empty'])){
                                echo 'Fill in all the fields!';
                            }elseif (isset($_GET['invalidusername'])) {
                                echo 'Invalid username!';
                            }elseif (isset($_GET['loginerror'])) {
                                echo 'Invalid login information!';
                            }
                        ?></p>
                        <span><i class="fa-solid fa-lock"></i> Admin</span>
                        <div class="form-input">
                            <label>username</label>
                            <input type="text" name="username" required>
                        </div>
                        <div class="form-input">
                            <label>password</label>
                            <input type="password" name="password" id="passwordField" required>
                            <i class="fa-solid fa-eye" id="hide" ></i>
                            <i class="fa-solid fa-eye-slash" id="show" style="display: none;"></i>
                        </div>
                        <a href="">Forgot password?</a>
                        <button type="submit" name="admin-login">login</button>
                    </form>
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
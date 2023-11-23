<?php
session_start();
    if (isset($_SESSION["customer_name"])) {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" async></script>
    <title>Login</title> 
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
     <!-- fontawesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- bootstrap  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
    <main>
        <div class="login-form-container">
            <div class="login-form">
                <h1>login</h1>
                <form action="config/forms.php" method="post" id="userForm" style="display: flex;">
                    <p class="error" style="color: red;"><?php 
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
                    ?></p>
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
                    <button type="submit" name="customer-login">login</button>
                    <h5>Don't have an account? <a href="signup.php">Signup</a></h5>
                </form>

                <!-- admin login form  -->
                
                
                <!-- employee login form  -->
                
               

                <div class="user">
                    <button onclick="adminLogin()">Admin</button>
                    <button onclick="employeeLogin()">Employee</button>
                    <button id="customerBtn">Customer</button>
                </div>
                <div class="or">Or</div>
                <div class="social-login">
                    <i class="fa-brands fa-google"></i>
                    <a href="">Login with Google</a>
                </div>
                <i class="fa-solid fa-arrow-left" onclick="goBack()" style="cursor: pointer;"> </i> Back
            </div>
        </div>
    </main>
    <script>
        function goBack() {
            window.history.back();
        }
        function adminLogin(){
            window.location.href = 'admin/index.php';
        }
        function employeeLogin(){
            window.location.href = 'employee/index.php';
        }
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
</body>
</html>
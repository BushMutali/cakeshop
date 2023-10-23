<?php
    include 'header.php';
?>
<section class="header">
<div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <h1>Edit Customer Details</h1>
                    <span><?php 
                    if(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidemail'])) {
                            echo 'Invalid email format!';
                        }elseif (isset($_GET['email-taken'])) {
                            echo 'Email already in use. Try another one!';
                        }
                    ?></span>
                </div>
                <form action="../config/forms.php" method="post">
                <div class="form-input">
                        
                        <input type="hidden" name="userid" value="<?= $_GET['id'];?>">
                    </div>
                    <div class="form-input">
                        <label>name</label>
                        <input type="text" name="username" value="<?= $_GET['name'];?>">
                    </div>
                    <div class="form-input">
                        <label>email</label>
                        <input type="email" name="email"  value="<?= $_GET['email'];?>">
                    </div>
                    <input type="submit" value="UPDATE" name="customer-update">
                </form>
                <h5><?php
                        if(isset($_SERVER['HTTP_REFERER'])) {
                            echo "<a href='{$_SERVER['HTTP_REFERER']}'>&leftarrow;Go Back</a>";
                        } else {
                            echo "No previous page available.";
                        }
                        ?>
                </h5>
            </div>
        </div>
    </section>
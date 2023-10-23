<?php
include 'header.php';
?>
<section class="header">
<div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <h1>Add Cake</h1>
                    <span><?php 
                        if(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidname'])) {
                            echo 'Name cannot be number or special character!';
                        }elseif (isset($_GET['nametaken'])) {
                            echo 'Cake name provided already exists!';
                        }
                    ?></span>
                </div>
                <form action="../config/forms.php" method="post" enctype="multipart/form-data">
                    
                        <input type="file" name="image" required>
                    
                    <div class="form-input">
                        <label>cake name</label>
                        <input type="text" name="cake_name">
                    </div>
                    <div class="form-input">
                        <label>price</label>
                        <input type="number" name="cake_price" min="150" max="5000">
                    </div>
                    <div class="form-input">
                        <label>description</label>
                        <textarea name="cake_description"></textarea>
                    </div>
                    <input type="submit" value="Add cake" name="add-cake">
                    <input type="reset" value="reset">
                </form>
            </div>
        </div>
    </section>
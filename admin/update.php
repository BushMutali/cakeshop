<?php
include 'header.php';
require_once '../config/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cakes WHERE id = $id";
    $result = $conn->query($sql);
    $cake = $result->fetch_assoc();
    $result->free();

    if (!$cake) {
        header('location: ../admin/dashboard.php?cakes&error');
        exit();
    }


}
?>
    <main>
        <div class="login-form-container">
            <div class="login-form">
                <h1>update cake</h1>
                <form action="../config/forms.php" method="post" enctype="multipart/form-data">
                    <p class="error" style="color: red;"><?php 
                        if(isset($_GET['empty'])){
                            echo 'Fill in all the fields!';
                        }elseif (isset($_GET['invalidname'])) {
                            echo 'Name cannot be number or special character!';
                        }elseif (isset($_GET['nametaken'])) {
                            echo 'Cake name provided already exists!';
                        }elseif (isset($_GET['invalidpriceformat'])){
                            echo 'Invalid price format';
                        }
                    ?></p>
                    <div class="form-input">
                    <input type="file" name="image" required>
                    </div>
                    <div class="form-input">
                        <input type="hidden" name="id" value="<?= $id?>" required>
                    </div>
                    <div class="form-input">
                        <label>cake name</label>
                        <input type="text" name="cake_name" value="<?= $cake['name']?>" required>
                    </div>
                    <div class="form-input">
                    <label>price</label>
                        <input type="number" name="cake_price" min="100" max="5000" value="<?=$cake['price']?>" required>
                    </div>
                    <div class="form-input">
                        <label>category</label>
                        <select name="category">
                            <option value="none">------</option>
                            <?php
                            require '../config/db.php';
                            $query = "SELECT name FROM categories";
                            $result = $conn->query($query);
                        
                            // Check if the query was successful
                            if ($result) {
                                // Fetch each category and generate an option element
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                }
                        
                                // Free the result set
                                $result->free();
                            } else {
                                // Handle query error
                                echo 'Error: ' . $conn->error;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-input">
                    <label>description</label>
                        <textarea name="cake_description"  required><?= $cake['description'] ?></textarea>
                    </div>
                    <button type="submit" name="update-cake">update</button>
                    <button type="reset">reset</button>
                </form>
            </div>
        </div>
    </main>
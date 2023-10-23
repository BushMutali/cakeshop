<section class="header">
        <nav class="navigation-bar">
            <h1>Cake Shop</h1>
            <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="">about us</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="">contact us</a></li>
                <?php
                    if (isset($_SESSION["customer_name"])){
                        echo '<li><a href="logout.php">logout</a></li>';
                    }
                    else {
                        echo '<li><a href="login.php">login</a></li>';
                        echo '<li><a href="signup.php">signup</a></li>';
                    }
                ?>
            </ul>
        </nav>
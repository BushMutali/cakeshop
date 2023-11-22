
<nav>
                <h1><a href="index.php"><img src="assets/img/logo.png" alt="logo" width="250px"></a></h1>
                <ul id="_menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="about.php">about us</a></li>
                    <li><a href="services.php">services</a></li>
                    
                    <?php
                    if (isset($_SESSION["customer_name"])){
                        echo '<li><a href="logout.php">logout</a></li>';
                    } elseif (isset($_SESSION["employee_name"])){
                        echo '<li><a href="employee/dashboard.php">dashboard</a></li>';
                        echo '<li><a href="logout.php">logout</a></li>';
                    }else{
                        echo '<li><a href="login.php">login</a></li>';
                        echo '<li><a href="signup.php">sign up</a></li>';
                    }
                    ?>
                    <li><i class="fa-solid fa-cart-shopping" id="cart-icon" onclick="openCartPage()"><span id="cart-count">0</span></i></li>
                </ul>
                <i class="fa-solid fa-bars" id="menu"></i>
            </nav>
            <div class="phone-menu" id="dropdown">
                <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="about.php">about us</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="login.php">login</a></li>
                <li><a href="signup.php">sign up</a></li>
                <li><i class="fa-solid fa-cart-shopping" id="cart-icon" onclick="openCartPage()"><span>0</span></i></li>
                </ul>
            </div>
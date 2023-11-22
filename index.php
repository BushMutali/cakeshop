
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" async></script>
    <script src="cart.js" async></script>
    <title>Cake Haven</title>
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
        <div id="loading-overlay" class="load">
            <div class="spinner-border text-warning" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
        <section class="header">
            <nav>
                <h1><a href="index.php"><img src="assets/img/logo.png" alt="logo" width="250px"></a></h1>
                <ul id="_menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="about.php">about us</a></li>
                    <li><a href="services.php">services</a></li>
                    <li><a href="login.php">login</a></li>
                    <li><a href="signup.php">sign up</a></li>
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
            
            <section class="hero">
                <div class="hero-text">
                    <h5>30% discount for all cakes</h5>
                    <h1>Indulge in Sweet Moments</h1>
                    <?php if (isset($_SESSION["customer_name"]) || isset($_SESSION["employee_name"])):?>
                    <a href="order.php" class="heroBtn order">Order Now</a>
                    <?php else:?>
                        <a href="login.php?loginrequired" class="heroBtn order">Order Now</a>
                    <?php endif;?>
                    <a href="services.php" class="heroBtn read">Read More</a>
                </div>
                <div class="hero-image">
                    <!-- <img src="cake-hero.png" alt="cake image" width="30px"> -->
                </div>
            </section>
        </section> 
        <section class="cake-container">
            <h1>Featured Cakes</h1>
            <div class="cakes" id="cake-list">
                <!-- loop cakes  -->
                <?php
        include 'config/get_cakes.php';
        while ($cakes = mysqli_fetch_assoc($query)):
            ?>
                <div class="cake-box" >
                    <div class="cake-image">
                        <img src="assets/img/cakes/<?=$cakes['img_path']?>" alt="">
                    </div>
                    <div class="cake-text">
                        <h2><?=$cakes['cake_name']?></h2>
                        <p data-price="250">Ksh. <?=$cakes['cake_price']?></p>
                    </div>
                    <button class="add-to-cart-btn">add to cart</button>
                </div>
                   <?php
            endwhile;
        ?> 
                
                <!-- end loop -->
                <div id="pagination"></div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container-2">
            <div class="row">
                <h1>Cake Haven</h1>
                <p>Indulge in Sweet Delights with Our Exquisite Cakes – Crafting Moments of Joy and Celebration for Every Palate. Where Every Slice Tells a Story.</p>
                <div class="social-links">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
            <div class="row">
                <h1>usefull links</h1>
                <ul>
                    <li><a href="about.php#blog">blog</a></li>
                    <li><a href="services.php#training">training</a></li>
                    <li><a href="about.php#contact">contact</a></li>
                    <li><a href="about.php">about</a></li>
                </ul>
            </div>
            <div class="row">
                <h1>contact us</h1>
                <p><strong>Phone: </strong> +254 702 264733</p>
                <p><strong>Email: </strong><a href="mailto:info@cakeshop.com">info@cakeshop.com</a></p>
            </div>
            <div class="row">
                <h1>subscribe</h1>
                <p>Subscribe to our newsletter.</p>
                <form action="" method="">
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                    <input type="submit" value="Submit" class="btn">
                </form>
            </div>
        </div>
        <hr>
        <br>
        &copy; 2023 Cake Haven. All Rights Reserved.
    </footer>
    <script>
            function openCartPage() {
                // Display the loading overlay
                var loadingOverlay = document.getElementById('loading-overlay');
                loadingOverlay.style.display = 'flex';
                setTimeout(function () {
                    window.location.href = 'cart.html';
                }, 600);
            }
    </script>
</body>
</html>
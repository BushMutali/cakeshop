<?php
    include 'header.php';
?>
    
            
            <section class="hero">
                <div class="hero-text">
                    <h5>30% discount for all cakes</h5>
                    <h1>Indulge in Sweet Moments</h1>
                    <?php if (isset($_SESSION["customer_name"]) || isset($_SESSION["employee_name"])):?>
                    <a href="order.php" class="heroBtn order">Order Now</a>
                    <?php else:?>
                        <span></span><a href="login.php?loginrequired" class="heroBtn order">Order Now</a>
                    <?php endif;?>
                    <a href="services.php" class="heroBtn read">Read More</a></span>
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
                        <img src="assets/img/cakes/<?=$cakes['img_file_path']?>" alt="">
                    </div>
                    <div class="cake-text">
                        <h2><?=$cakes['name']?></h2>
                        <p data-price="250">Ksh. <?=$cakes['price']?></p>
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
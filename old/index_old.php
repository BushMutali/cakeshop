<?php
    include 'header.php';
?>
        <div class="hero">
            <div class="hero-text">
                <h1>Yummy sweeties delivered to your dining table</h1>
                <h5>Indulge in the art of exquisite cakes at our cake shop. From weddings to birthdays, our creations are crafted with passion and precision. Elevate your special moments with flavors that captivate and  designs that enchant. Explore our gallery and savor the magic today!</h5>
                <div class="hero-text-btn">
                    <button class="read"><a href="services.php">Read More</a></button>
                    <?php if (isset($_SESSION["customer_name"]) || isset($_SESSION["employee_name"])):?>
                    <button class="order"><a href="order.php">Order Now</a></button>
                    <?php else:?>
                        <button class="order"><a href="login.php?loginrequired">Order Now</a></button>
                    <?php endif;?>
                </div>
            </div>
            <div class="hero-img">
                <img src="assets/img/cake.png" alt="">
            </div>
        </div>
    </section>
   
    <!-- start cakes section -->
    <section class="cakes">
        <div class="cakes-header">
            <h1>This week's special</h1>
            <h5>Try our most popular cakes and taste the difference</h5>
        </div>
        
          
        <div class="cakes-container">
        <?php
        include 'config/get_cakes.php';
        while ($cakes = mysqli_fetch_assoc($query)):
            ?>
            <div class="cake-card">
                <div class="img-box">
                <img src="assets/img/cakes/<?=$cakes['img_path']?>" alt="Cake Image">
                </div>
                <h5><a href="product.php?id=<?=$cakes['id']?>"><?=$cakes['cake_name']?></a></h5>
                <h4>Ksh. <?=$cakes['cake_price']?></h4>
                <div class="card-btn">
                    <button><a href="product.php?id=<?=$cakes['id']?>">buy now</a></button>
                    <button>wishlist</button>
                </div>
            </div> 
            <?php
            endwhile;
        ?>
        </div>
        
    </section>
<?php
    include 'footer.php'
?>
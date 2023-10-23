<?php
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

    include 'header.php';
    require 'config/db.php';
    if (!isset($_GET['id'])) {
        header('location: index.php');
    }
    $cakeId = $_GET['id'];

    // get cake details
    $sql = "SELECT * FROM cakes WHERE id = $cakeId";
    $result = mysqli_query($conn, $sql);
    $cake = mysqli_fetch_assoc($result);

    if (isset($_GET['success'])) {?>
        <script>
            alert("Order placed successfully!");
        </script>
    <?php }
?>
        <div class="hero">
            <?php if ($cake):?>
            <div class="hero-text">
                <img src="assets/img/cakes/<?=$cake['img_path']?>" alt="">
                <h2 style="text-transform: capitalize;"><?php echo $cake['cake_name'];?></h2>
                <!-- product description -->
                <h5><?php echo $cake['cake_description'];?></h5>
            </div>
            
            <div class="hero-img">
                <div class="product-form">
                    <div class="form-header">
                        <h1>Cake Shop</h1>
                    </div>
                    <form action="config/forms.php" method="post">
                        <span class="title" style="text-transform: capitalize;"><?php echo $cake['cake_name'];?></span>
                        <span class="price">Ksh. <strong><?php echo $cake['cake_price'];?></strong></span>
                        <span class="quantity">Quantity <input type="number" id="quantityInput" value="1" max="20" min="1" name="quantity"></span>
                        <span class="total">Total Ksh. <strong><?php echo $cake['cake_price'];?></strong></span>

                        <!-- hidden inputs -->
                        <?php  if (isset($_SESSION['customer_name'])){?>
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <input type="hidden" name="name" value="<?=$cake['cake_name']?>">
                        <input type="hidden" name="customer_name" value="<?= $_SESSION['customer_name']?>">
                        <input type="hidden" name="customer_email" value="<?= $_SESSION['customer_email']?>">
                        <input type="hidden" name="price" value="<?=$cake['cake_price']?>">
                        <input type="hidden" name="total" value="<?=$cake['cake_price']?>">
                        <?php }?>
                        <div class="hero-text-btn product-btn">
                            <?php  if (isset($_SESSION['customer_name'])):?>
                            <button type="submit" name="order" class="order">order now</button>
                            <?php else:?>
                                <button id="order" class="order"><a href="login.php?loginrequired">order now</a></button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
                <?php endif;?>                 
            </div>
        </div>
    </section>


    <script>
        document.getElementById('quantityInput').addEventListener('change', function() {
        var quantity = parseInt(this.value);
        var price = parseInt(document.querySelector('.price strong').textContent);
        var total = quantity * price;

        document.querySelector('.total strong').textContent = total;
        document.querySelector('input[name="total"]').value = total;
        });

        document.querySelector('.total strong').textContent = price;
        document.querySelector('input[name="total"]').value = price;
    </script>
    <?php
    include 'footer.php';
?>
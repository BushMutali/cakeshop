<?php

    session_start();

?>
<head>
    <title>Cake order</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style_old.css">
</head>
    
<?php
            if (isset($_GET["id"])):?>
    <div class="payment" style="z-index: 1000;">
            <div class="payment-content">
            <i class="fa-solid fa-cart-shopping fa-bounce"></i>
                <h1>Order '<?=$_GET["id"]?>' Placed</h1>
                <p>Please continue to payment to confirm your order.</p>
                <a href="payment.php?id=<?=$_GET['id']?>"><img src="assets/img/mpesa.png" alt=""></a>
            </div>
            </div>
            <?php endif;?>
            <?php
            if (isset($_GET["paysuccess"])):?>
    <div class="payment">
            <div class="payment-content">
            <i class="fa-solid fa-truck-fast"></i>
                <h1>Enter your pin to confirm payment.</h1>
                <p>You will recieve an email notification on how to track your order. Thank You.</p>
                <a href="index.php">Home</a>
                <a href="order.php">Back</a>
            </div>
            </div>
            <?php endif; ?>

    <section class="order-page">
        <div class="title ordering">
            <h1>Cake Order</h1>
        </div>
        <form action="config/forms.php" method="post">
            <h1 style="color: red; font-size: 12px;"><?php if (isset($_GET['empty'])){
        echo "Please fill all the fields";
    }?></h1>
            <input type="hidden" name="user_email" value="<?php
                if (isset($_SESSION["user_email"])) {
                    echo $_SESSION["user_email"];
                }
            ?>">
            <div class="form-input">
                <label>Cake Type</label>
                <select name="cake-type" id="cake-type">
                    <option value="">------</option>
                    <option value="Chocolate">Chocolate</option>
                    <option value="Vanilla">Vanilla</option>
                    <option value="Strawberry">Strawberry</option>
                    <option value="White">White</option>
                    <option value="Confetti">Confetti</option>
                </select>
            </div>
            <div class="form-input">
                <label>Choose the filling</label>
                <select name="cake-filling" id="cake-type">
                    <option value="">------</option>
                    <option value="Cream Cheese">Cream Cheese</option>
                    <option value="Vanilla">Vanilla</option>
                    <option value="Butter Cream">Butter Cream</option>
                    <option value="Chocolate">Chocolate</option>
                </select>
            </div>
            <div class="form-input">
                <label>Shape</label>
                <select name="cake-shape" id="cake-type">
                    <option value="">------</option>
                    <option value="Circle">Circle</option>
                    <option value="Square">Square</option>
                    <option value="Rectangle">Rectangle</option>
                    <option value="Special">Special</option>
                </select>
            </div>
            <div class="form-input">
                <label>Message/Text</label>
                <p>*to be written on the cake(optional)</p>
                <input type="text" name="message">
            </div>
            <div class="form-input">
                <label>Size</label>
                <select name="cake-size" id="cake-type">
                    <option value="">------</option>
                    <option value="15cm">15cm - 4 to 6 people</option>
                    <option value="20cm">20cm - 8 to 10 people</option>
                    <option value="25cm">25cm - 16 to 20 people</option>
                </select>
            </div>
            <div class="form-input">
                <label>Design and Decoration</label>
                <p>Give a description of the type of design you are looking for</p>
                <textarea name="design"></textarea>
            </div>
            <input type="submit" name="place-order" value="Place Order">
        </form>
        <div class="pricing">
            <h1>cake pricing</h1>
            <table>
                <tr>
                    <th>Size</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>15cm</td>
                    <td>Ksh. 1,500</td>
                </tr>
                <tr>
                    <td>20cm</td>
                    <td>Ksh. 2,500</td>
                </tr>
                <tr>
                    <td>25cm</td>
                    <td>Ksh. 3,500</td>
                </tr>
        </div>
        
    </section>
</body>
</html>
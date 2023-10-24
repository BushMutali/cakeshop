<?php
session_start();
include 'config/db.php';
if(isset($_GET['id'])){
    $orderid = $_GET['id'];
   
}
$sql = "SELECT * FROM sales WHERE receipt_no = '$orderid';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total = $row['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="order-page">
    <?php
            if (isset($_GET["paysuccess"])):?>
    <div class="payment">
            <div class="payment-content">
            <i class="fa-solid fa-truck-fast"></i>
                <h1>Enter your pin to confirm payment.</h1>
                <p>You will recieve an email notification on how to track your order. Thank You.</p>
                <a href="index.php">Home</a>
                <a href="product.php?id=<?=$row['cake_id']?>">Back</a>
            </div>
            </div>
            <?php endif; ?>
    
        <div class="title order">
            <h2>Checkout</h2>
        </div>
        <form action="config/stk_initiate.php" method="POST" class="pay">
            <div class="form-header-title">
                <img src="assets/img/mpesa-logo.png" width="100px">
                <h3>Confirm Payment of Ksh. <?=$total?> for <?=$_GET['id']?></h3>
            </div>
            <h1 style="color: red; font-size: 12px;"><?php if (isset($_GET['empty'])){
        echo "Please fill all the fields";
        }?></h1>
            <input type="hidden" name="user_email" value="<?php
                if (isset($_SESSION["customer_name"])) {
                    echo $customer_email;
                }else if(isset($_SESSION["employee_name"])){
                    echo $employee_email;
                }
            ?>">
            <input type="hidden" name="user_name" value="<?php 
                if (isset($_SESSION["customer_name"])) {
                    echo $customer_name; 
                }else if(isset($_SESSION["employee_name"])){
                    echo $employee_name;
                }
            ?>">
            <div class="form-input">
                <input type="hidden" value="<?=$total?>" name="amount" required> 
            </div>
            <div class="form-input">
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="254723999999" required>
            </div>
            <input type="submit" name="pay" value="Pay">
        </form>
    </section>

</body>
</html>
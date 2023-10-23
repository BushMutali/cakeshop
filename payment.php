<?php
session_start();
include 'config/db.php';
if(isset($_GET['id'])){
    $orderid = $_GET['id'];
}
$sql = "SELECT amount FROM bookings WHERE booking_id = '$orderid';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_GET['amount'] = $row['amount'];
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
        <div class="title order">
            <h2>Checkout</h2>
        </div>
        <form action="config/forms.php" method="post" class="pay">
            <div class="form-header-title">
                <img src="assets/img/mpesa-logo.png" width="100px">
                <h3>Confirm Payment of Ksh. <?=$_GET['amount']?> for <?=$_GET['id']?></h3>
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
                <input type="hidden" value="<?=$_GET['amount']?>" name="amount"> 
            </div>
            <div class="form-input">
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="0723999999">
            </div>

            <input type="submit" name="pay" value="Pay">
        </form>

    </section>
</body>
</html>
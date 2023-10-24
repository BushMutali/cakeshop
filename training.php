<?php
    session_start();
    if (isset($_SESSION["customer_name"])) {
        $customer_name = $_SESSION["customer_name"];
        $customer_email = $_SESSION["customer_email"];
    }elseif (isset($_SESSION["employee_name"])) {
        $employee_name = $_SESSION["employee_name"];
        $employee_email = $_SESSION["employee_email"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Application</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <section class="order-page">
        <?php
            if (isset($_GET["id"])):?>
    <div class="payment">
            <div class="payment-content">
            <i class="fa-solid fa-cart-shopping fa-bounce"></i>
                <h1>'<?=$_GET["id"]?>' is your application number</h1>
                <p>Use it to track application status. Please continue to payment to confirm your order.</p>
                <a href="application.php?id=<?=$_GET['id']?>"><img src="assets/img/mpesa.png" alt="mpesa logo"></a>
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
        <div class="title order">
            <h1>Application</h1>
            <a href="index.php">Home</a>
        </div>
        <form action="config/forms.php" method="post">
            <h1 style="color: red; font-size: 12px;"><?php if (isset($_GET['empty'])){
        echo "Please fill all the fields";
    }?></h1>
            <div class="form-input">
                <label>First Name</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-input">
                <label>Second Name</label>
                <input type="text" name="second_name" required>
            </div>
            <div class="form-input">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-input">
                <label>Town</label>
                <input type="text" name="town" required>
            </div>
            <input type="submit" name="apply" value="Apply">
        </form>
    </section>
</body>
</html>
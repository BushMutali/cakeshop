<?php
  session_start()
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/script.js" async></script>
    <script src="assets/js/cart.js" async></script>
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
  <!-- notification -->
<?php if(isset($_GET['notification'])):?>
    <div class="item-deleted" id="animatedDiv">
        <h1><?php if (isset($_GET['success'])){
                            echo 'Paid';
                            }else{
                              echo 'Failed';
                            }
                            echo '<script>localStorage.removeItem("cart");</script>';?>
        </h1> <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        </div>

    </div>
    <audio id="notificationSound" src="assets/notification.mp3"></audio>
    <?php endif; ?>
<?php 
      if (isset($_GET['confirm'])):?>
<div class="confirm-overlay">
          <form action="config/payment/stk_initiate.php" method="post">
          <i class="fa-solid fa-circle-info"></i><p>Please confirm your transaction </p>
          
             <input type='hidden' name='amount' value='<?=$_GET['amount']?>'>
             <input type="hidden" name="phone" value="<?=$_GET['phone']?>">
            <button type="submit" name="pay">CONFIRM <i class="fa-regular fa-circle-check"></i></button>
          </form>
        </div>
        <?php endif; ?>
<main>
        <div id="loading-overlay" class="load">
            <div class="spinner-border text-warning" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
        
        <section class="header">
            <?php include 'navbar.php'; ?>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const animatedDiv = document.getElementById("animatedDiv");
    const notificationSound = document.getElementById("notificationSound");

    animatedDiv.style.opacity = "0";

    function animateDiv() {
        animatedDiv.style.opacity = "1";
        animatedDiv.style.left = "20px";

        // Play the notification sound
        notificationSound.play();

        setTimeout(() => {
            animatedDiv.style.left = "-200px";
            animatedDiv.style.opacity = ".3";
        }, 4000);
    }

    animateDiv();

           

});
</script>
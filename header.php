<?php
 session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Shop</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    include 'navbar.php';
    ?>

<?php if (isset($_SESSION["customer_name"])):?>
    <div class="pop-up" id="popup">
        <h1>Welcome <i class="fa-solid fa-circle-info fa-beat-fade"></i></h1> 
        <h5>Hey <?= $_SESSION["customer_name"]?>, check out our cake collection!</h5>
    </div>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
      document.getElementById('popup').style.display = 'block';
      setTimeout(function() {
        document.getElementById('popup').style.display = 'none';
      }, 4000);
    }, 2000);
  });
    </script> -->
    <script src="assets/js//script.js"></script>
<?php endif;?>

    
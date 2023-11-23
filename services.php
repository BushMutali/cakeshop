<?php
include 'header.php';

?>
<link rel="stylesheet" href="assets/styles/style_old.css">
<section class="services">
        <h1>Our Services</h1>
        <div class="hero">
        
        </div>
            <div class="services-container">
                <div class="training box1">
                <img src="assets/img/chef.png" alt="deliveries">
                    <h3>Training</h3>
                    <p>We offer training classes to those who wish to learn how to bake cakes</p>
                    <button><a href="training.php">Apply Today</a></button>
                </div>
                <div class="deliveries box1">
                    <img src="assets/img/delivery.png" alt="deliveries">
                    <h3>Deliveries</h3>
                    <p>We offer deliveries to your door step</p>
                    <?php  if (isset($_SESSION['customer_name'])):?>
                    <button><a href="">Track Order</a></button>
                    <?php else:?>
                        <button><a href="login.php?loginrequired">Track Order</a></button>
                    <?php endif; ?>
                </div>
                <div class="event-planning box1">
                    <img src="assets/img/event.png" alt="deliveries">
                    <h3>Event Planning</h3>
                    <p>We offer event, ceremonies planning</p>
                    <button><a href="">Read More</a></button>
                </div>
                <div class="cake box1">
                    <img src="assets/img/order.png" alt="deliveries">
                    <h3>Cakes</h3>
                    <p>Order your custom cakes</p>
                    <?php  if (isset($_SESSION['customer_name'])):?>
                    <button><a href="order.php">Order Now</a></button>
                    <?php else:?>
                        <button><a href="login.php?loginrequired">Order Now</a></button>
                    <?php endif; ?>
                </div>
            </div>
    </section>
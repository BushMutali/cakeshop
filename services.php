<?php
include 'header.php';

?>

<section class="services">
        <h1>Our Services</h1>
        <div class="hero">
        
        </div>
            <div class="services-container">
                <div class="training box">
                <img src="assets/img/delivery.png" alt="deliveries">
                    <h3>Training</h3>
                    <p>We offer training classes to those who wish to learn how to bake cakes</p>
                    <?php  if (isset($_SESSION['customer_name'])):?>
                    <button><a href="">Apply Today</a></button>
                    <?php else:?>
                        <button><a href="login.php?loginrequired">Apply Today</a></button>
                    <?php endif; ?>
                </div>
                <div class="deliveries box">
                    <img src="assets/img/delivery.png" alt="deliveries">
                    <h3>Deliveries</h3>
                    <p>We offer deliveries to your door step</p>
                </div>
                <div class="event-planning box">
                    <img src="assets/img/delivery.png" alt="deliveries">
                    <h3>Event Planning</h3>
                    <p>We offer event, ceremonies planning</p>
                    <button><a href="">Read More</a></button>
                </div>
                <div class="cakes box">
                    <img src="assets/img/delivery.png" alt="deliveries">
                    <h3>Cakes</h3>
                    <p>Order your custom cakes</p>
                    <?php  if (isset($_SESSION['customer_name'])):?>
                    <button><a href="">Order Now</a></button>
                    <?php else:?>
                        <button><a href="login.php?loginrequired">Order Now</a></button>
                    <?php endif; ?>
                </div>
            </div>
    </section>
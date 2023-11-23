<?php
 include 'header.php';
?>
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the radio buttons and forms
            var paypalRadio = document.getElementById('paypal');
            var mpesaRadio = document.getElementById('mpesa');
            var paypalForm = document.getElementById('paypalForm');
            var mpesaForm = document.getElementById('mpesaForm');
    
            // Function to toggle the visibility of forms based on the selected radio button
            function toggleForms() {
                paypalForm.style.display = paypalRadio.checked ? 'block' : 'none';
                mpesaForm.style.display = mpesaRadio.checked ? 'block' : 'none';
            }
    
            // Initial toggle based on the default checked radio
            toggleForms();
    
            // Add event listeners to the radio buttons
            paypalRadio.addEventListener('change', toggleForms);
            mpesaRadio.addEventListener('change', toggleForms);
        });
    </script>
</head>
<body>
    <main class="checkout-page">
        <section class="cart-container">
            <div class="cart-items">
                <div class="cart-items-header">
                    <h1><i class="fa-solid fa-arrow-left" onclick="goBack()"></i> Continue shopping</h1>
                    <hr>
                    <h5>Shopping Cart</h5>
                   
                </div>
                <div id="cart-items-container">
                
            </div>
            <br>
            <h5 class="total" id="subtotal">Total: <span></span></h5>
            </div>
            <div class="cart-payment">
                <div class="payment-header">
                    <h1>Payment Details</h1>
                </div>
                <h3 class="total" id="payable">Amount to be paid - <span></span></h3>
                <label for="">Payment Method</label>
                <input type="radio" name="payment" id="paypal"><i class="fa-brands fa-cc-paypal"></i>
                <input type="radio" name="payment" id="mpesa" checked><img src="assets/img/mpesa-logo.png" alt="mpesa logo" width="50px" style="margin-left: 0;">
                <form action="" method="" id="paypalForm" style="display: none;">
                    <label>Email:*</label>
                    <input type="email" placeholder="johndoe@gmail.com" name="phone" required>
                    <input type="hidden" name="amount" id="amount-input" required>
                    <button type="submit" class="paypal">Checkout <i class="fa-regular fa-circle-check"></i></button>
                </form>
                <form action="config/forms.php" method="post" id="mpesaForm">
                    <label>Phone Number:*</label>
                    <input type="tel" placeholder="254712000000" name="phone" required>
                    <input type="hidden" name="amount" id="amount-input2" required>
                    <?php if(isset($_SESSION['customer_name']) || isset($_SESSION['employee_name'])): ?>
                    <button type="submit" class="mpesa" name="confirm">Checkout <i class="fa-regular fa-circle-check"></i></button>
                    <?php else: ?>
                        <button class="mpesa"><a href="login.php?loginrequired">Login Required</a> <i class="fa-solid fa-lock"></i></button>
                        <?php endif; ?>
                </form>
            </div>
        </section>
    </main>
    <script>
        function goBack() {
            window.history.back();
        }
        
    </script>
</body>
</html>
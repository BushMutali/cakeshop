function getInitialCartCount() {
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    return cart.length;
}
document.addEventListener('DOMContentLoaded', function () {
    
    var cartCount = 0;
    var addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    var cartIcon = document.getElementById('cart-icon');
    var countSpan = cartIcon.querySelector('span');

    var cart = JSON.parse(localStorage.getItem('cart')) || [];

    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var imageSrc = this.parentElement.querySelector('.cake-image img').src;
            var cakeName = this.parentElement.querySelector('h2').innerText;
            var cakePrice = parseInt(this.parentElement.querySelector('p').getAttribute('data-price'));
            addToCart(cakeName, cakePrice, imageSrc);
        });
    });
    var initialCartCount = getInitialCartCount();
    countSpan.textContent = initialCartCount;
    

    function addToCart(name, price, src) {
        var imageName = src.split('/').pop(); 
    
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
    
        var existingItem = cart.find(item => item.name === name);
    
        if (!existingItem) {
            cart.push({ name: name, price: price, imageSrc: imageName, quantity: 1 });
    
            var cartCount = cart.reduce((total, item) => total + item.quantity, 0);
            countSpan.textContent = cartCount;
        } else {
            if (existingItem.quantity === 1) {
            }
            existingItem.quantity++;
        }
        localStorage.setItem('cart', JSON.stringify(cart));
    }

   // Retrieve
   var storedCart = localStorage.getItem('cart');

   if (storedCart) {
       var cart = JSON.parse(storedCart);
       var cartItemsContainer = document.getElementById('cart-items-container');
       cart.forEach(function (item) {
           var cartItem = document.createElement('div');
           cartItem.className = 'cart-item';

           var imgContainer = document.createElement('div');
           imgContainer.className = 'img';
           var img = document.createElement('img');
           img.src = item.imageSrc;
           img.alt = 'cake image';
           imgContainer.appendChild(img);

           var itemName = document.createElement('h1');
           itemName.className = 'item-name';
           itemName.textContent = item.name;

           var quantityInput = document.createElement('input');
           quantityInput.type = 'number';
           quantityInput.className = 'quantity-input';
           quantityInput.id = 'quantity-input';
           quantityInput.min = 1;
           quantityInput.max = 20;
           quantityInput.value = item.quantity;


            var itemPrice = document.createElement('h3');
            itemPrice.className = 'item-price';
            var spanPrice = document.createElement('span');
            spanPrice.textContent = 'KES ' + item.price;
            itemPrice.appendChild(spanPrice);


           var removeBtn = document.createElement('i');
           removeBtn.className = 'fa-solid fa-trash remove-btn';

 
            var subTotalPrice = document.createElement('div');
            subTotalPrice.className = 'subtotal';
            var h3Value = document.createElement('h3');
            var subTotalPriceValue = document.createElement('span');
            subTotalPriceValue.textContent = 'KES ' + item.price;
            h3Value.appendChild(subTotalPriceValue);
            subTotalPrice.appendChild(h3Value);


           cartItem.appendChild(imgContainer);
           cartItem.appendChild(itemName);
           cartItem.appendChild(quantityInput);
           cartItem.appendChild(itemPrice);
           cartItem.appendChild(removeBtn);
           cartItem.appendChild(subTotalPrice);

           cartItemsContainer.appendChild(cartItem);
           updateTotal();
       });
   }

        function updateSubtotal(cartItem) {
            var priceString = cartItem.querySelector('.item-price span').textContent;
            var price = parseInt(priceString.replace('KES ', '').trim());
            var quantity = parseInt(cartItem.querySelector('.quantity-input').value);
            var subTotal = price * quantity;
            cartItem.querySelector('.subtotal span').textContent = subTotal.toLocaleString('en-US', { style: 'currency', currency: 'KES' });
        }

    var quantityInputs = document.querySelectorAll('.cart-item .quantity-input');

    quantityInputs.forEach(function (quantityInput) {
        quantityInput.addEventListener('change', function () {
            updateSubtotal(this.closest('.cart-item'));
        });
        updateSubtotal(quantityInput.closest('.cart-item'));
        
    });


        function updateTotal() {
            var cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            var total = cart.reduce((total, item) => total + (item.price * item.quantity), 0);

            var totalSpan = document.querySelector('#subtotal span');
            var payableSpan = document.querySelector('#payable span');
            var amountInput = document.getElementById('amount-input');

            totalSpan.textContent = total.toLocaleString('en-US', { style: 'currency', currency: 'KES' });
            payableSpan.textContent = total.toLocaleString('en-US', { style: 'currency', currency: 'KES' });
            amountInput.value = total.toLocaleString('en-US');
        }
        updateTotal();

});
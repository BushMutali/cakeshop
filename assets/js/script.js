document.addEventListener('DOMContentLoaded', function () {
    var cakesPerPage = 9;
    var $cakes = $('#cake-list .cake-box');
    var numberOfPages = Math.ceil($cakes.length / cakesPerPage);

    showPage(1);

    function showPage(pageNumber) {
        var startIndex = (pageNumber - 1) * cakesPerPage;
        var endIndex = startIndex + cakesPerPage;
    
        $cakes.hide().slice(startIndex, endIndex).show();
        renderPagination(pageNumber);
    }

    function renderPagination(currentPage) {
        var paginationHTML = '';
    
        for (var i = 1; i <= numberOfPages; i++) {
            paginationHTML += '<a href="#" class="page-link' + (i === currentPage ? ' active' : '') + '">' + i + '</a>';
        }
    
        $('#pagination').html(paginationHTML);
    
        // Add click event to pagination links
        $('.page-link').on('click', function (e) {
            e.preventDefault();
            var selectedPage = parseInt($(this).text(), 10);
            showPage(selectedPage);
        });
    }

 //menu
    document.getElementById('menu').addEventListener('click', function () {
        toggleMenu();
    });

    function toggleMenu() {
        var dropdown = document.getElementById('dropdown');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }
   
    // Get the radio buttons and forms
        var paypalRadio = document.getElementById('paypal');
        var mpesaRadio = document.getElementById('mpesa');
        var paypalForm = document.getElementById('paypalForm');
        var mpesaForm = document.getElementById('mpesaForm');
        console.log(paypalRadio, mpesaRadio, paypalForm, mpesaForm);

        function toggleForms() {
            paypalForm.style.display = paypalRadio.checked ? 'block' : 'none';
            mpesaForm.style.display = mpesaRadio.checked ? 'block' : 'none';
        }
        toggleForms();
        paypalRadio.addEventListener('change', toggleForms);
        mpesaRadio.addEventListener('change', toggleForms);

    
});

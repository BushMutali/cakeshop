<?php
include 'header.php';
require'../config/db.php';

// customers 
$sql = "SELECT 'customer' as type, customers.*, invoices.invoice_number, invoices.due_date, invoices.total_amount, invoices.payment_status
FROM customers
LEFT JOIN invoices ON customers.id = invoices.customer_id";


$result = $conn->query($sql);

$customers = array();

while ($row = $result->fetch_assoc()) {
    $customers[] = $row;
}


// employees 
$employeeSql = "SELECT 'employee' as type, employees.*, invoices.invoice_number, invoices.due_date, invoices.total_amount, invoices.payment_status
FROM employees
LEFT JOIN invoices ON employees.employee_id = invoices.customer_id";
$employeeResult = $conn->query($employeeSql);

$employees = array();

while ($employeeRow = $employeeResult->fetch_assoc()) {
    $employees[] = $employeeRow;
}
// bookings

$bookingSql = "SELECT * FROM bookings";
$bookingResult = $conn->query($bookingSql);

$bookings = array();

while ($bookingRow = $bookingResult->fetch_assoc()) {
    $bookings[] = $bookingRow;
}
?>

<!-- notification -->
<?php if(isset($_GET['notification'])):?>
    <div class="item-deleted" id="animatedDiv">
        <h1><?php if (isset($_GET['success'])){
                            echo 'Deleted';
                        }elseif (isset($_GET['updated'])){
                            echo 'Success';
                        }elseif (isset($_GET['regsuccess'])){
                            echo 'Added';
                        }?>
        </h1> <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        </div>

    </div>
    <audio id="notificationSound" src="../assets/notification.mp3"></audio>
    <?php endif; ?>
<!-- end notification  -->
    <main>
        <section class="dashboard-container">
            <?php include 'sidebar.php' ?>
            <div class="dashboard-content">
                <nav>
                    <h1><?php if (isset($_GET['customers'])) {
                        echo 'Customers';
                        }else if (isset($_GET['invoices'])) {
                            echo 'Invoices';
                        }
                        else if (isset($_GET['bookings'])) {
                            echo 'Bookings';
                        }
                        else if (isset($_GET['employees'])) {
                            echo 'Employees';
                        }
                        else{
                            echo 'Dashboard';
                        }
                    ?> <i class="fa-solid fa-chevron-right"></i></h1>
                    <div class="query">
                        <input type="search" placeholder="Search...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-bell"></i></a></li>
                        <div class="profile">
                            <div class="profile-img">
                                <img src="../assets/img/avatar.jpg" alt="profile image">
                            </div>
                            <div class="text">
                                <h4><?php echo $_SESSION["admin"]?></h4>
                                <p>admin@gmail.com</p>
                            </div>
                        </div>
                    </ul>
                </nav>
                
                <?php
                if (isset($_GET['customers'])) {
                    include 'customers.php';
                }elseif (isset($_GET['employees'])) {
                    include 'employees.php';
                }elseif (isset($_GET['bookings'])) {
                    include 'bookings.php';
                }else{
                    include 'home.php';
                }
            ?>
            </div>
        </section>
    </main>
</body>
</html>
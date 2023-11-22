<?php
include 'header.php';
require'../config/db.php';

// customers 
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

$customers = array();

while ($row = $result->fetch_assoc()) {
    $customers[] = $row;
}

// employees 
$employeeSql = "SELECT * FROM employees";
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
    <div class="item-deleted" id="animatedDiv">
        <h1>Deleted</h1> <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        </div>
    </div>
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
                                <h4>Admin</h4>
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
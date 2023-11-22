<?php
include 'header.php';
    include 'sidebar.php';
?>

<?php
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


<section id="content">
        <main>
            <div class="header-title">
                <div class="left">
                    <h1>
                    <?php if (isset($_GET['customers'])) {
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
                    ?>
                    </h1>


                    <h5><?php if(isset($_GET['noneselected'])){
                            echo 'No user selected!';
                        }elseif (isset($_GET['success'])){
                            echo 'deleted successfully';
                        }elseif (isset($_GET['updated'])){
                            echo 'Customer details updated successfully!';
                        }elseif (isset($_GET['regsuccess'])){
                            echo 'Employee added successfully';
                        }
                      ?> </h5>
                </div>
                <a href="" class="btn-download">
                    <i class="fa-solid fa-download"></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>
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
        </main>
    </section>
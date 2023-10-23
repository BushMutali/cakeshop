<?php
include 'header.php';
include 'sidebar.php';

require '../config/db.php';

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
                    <?php if (isset($_GET['bookings'])) {
                            echo 'Bookings';
                        }
                        else{
                            echo 'Dashboard';
                        }
                    ?>
                    </h1>
                </div>
                
            </div>
            <?php
                if (isset($_GET['bookings'])) {
                    include '../admin/bookings.php';
                }else{
                    include 'dashboard.php';
                }
            ?>
        </main>
    </section>
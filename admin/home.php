<?php
if (isset($_GET['cake-added'])) {
    echo '
    <script>
    alert("Cake added successfully");
    </script>
    ';
    include 'config/db.php';
}
?>
<div class="customer-admin-page scroll">
    <div class="cakes-container">
        <div class="dashboard-card">
            
            <h1><i class="fa-solid fa-user-group"></i><a href="dashboard.php?customers">Customers</a></h1>
            <?php
    $sql = "SELECT COUNT(*) as total_rows FROM customers";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h5>".$row["total_rows"]."</h5>";
        }
    } else {
        echo "<h5>No customers available</h5>";
    }
            ?>
                 
        </div>
        <div class="dashboard-card">
            
            <h1><i class="fa-solid fa-users"></i><a href="dashboard.php?bookings">Employees</a></h1>
            <?php
                $sql = "SELECT COUNT(*) as total_rows FROM employees";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<h5>".$row["total_rows"]."</h5>";
                    }
                } else {
                    echo "<h5>No employees available</h5>";
                }
            ?>
        </div>
        <div class="dashboard-card">
            
            <h1><i class="fa-solid fa-bookmark"></i><a href="dashboard.php?bookings">Bookings</a></h1>
            <?php
    $sql = "SELECT COUNT(*) as total_rows FROM bookings";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h5>".$row["total_rows"]."</h5>";
        }
    } else {
        echo "<h5>No bookings available</h5>";
    }
            ?>        
        </div>
        <div class="dashboard-card">
            <h1><i class="fa-solid fa-file-invoice"></i><a href="dashboard.php?invoices">Invoices</a></h1>
            <?php
    $sql = "SELECT COUNT(*) as total_rows FROM invoices";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h5>".$row["total_rows"]."</h5>";
        }
    } else {
        echo "<h5>No invoices available</h5>";
    }
            ?>       
        </div>
    </div>
    <div class="cakes-container">
        <div class="dashboard-card">
            <a href="add.php"><h1><i class="fa-solid fa-file-invoice"></i>Add Cake</h1>
            <h5>+</h5></a>  
        </div>
        <div class="dashboard-card">
            <a href="../employee/signup.php""><h1><i class="fa-solid fa-file-invoice"></i>Add Employee</h1>
            <h5>+</h5></a>  
        </div>

    </div>
</div>
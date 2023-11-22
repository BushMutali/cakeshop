<div class="summary-count">
                    <div class="box">
                        <div class="overlay-bg">
                            <h1>This Month Revenue</h1>
                            <h2>KES 25000</h2>
                            <span>+23.4%</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="overlay-bg">
                            <h1>Today Earnings</h1>
                            <h2>KES 5000</h2>
                            <span>+2.8%</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="overlay-bg">
                            <h1>Cakes Sold</h1>
                            <h2>KES 2500</h2>
                            <span>+56.1%</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="overlay-bg">
                            <h1>This Month Revenue</h1>
                            <h2>KES 25000</h2>
                            <span>+13.6%</span>
                        </div>
                    </div>
                </div>
                <div class="manage-count">
                    <div class="container-bx">
                        <div class="overlay-bg">
                            <h1>Manage Customers</h1>
                            <h2><?php
                                    $sql = "SELECT COUNT(*) as total_rows FROM customers";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo $row["total_rows"];
                                        }
                                    } else {
                                        echo "No customers available";
                                    }
                                            ?>
                                    </h2>
                            <a href="dashboard.php?customers">manage</a>
                        </div>
                    </div>
                    <div class="container-bx">
                        <div class="overlay-bg">
                            <h1>Manage Employees</h1>
                            <h2><?php
                                        $sql = "SELECT COUNT(*) as total_rows FROM employees";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["total_rows"];
                                            }
                                        } else {
                                            echo "No employees available";
                                        }
                                    ?>
                                </h2>
                            <a href="dashboard.php?employees">manage</a>
                        </div>
                    </div>
                </div>
                <div class="manage-count">
                    <div class="container-bx">
                        <div class="overlay-bg">
                            <h1>Manage Cakes</h1>
                            <h2><?php
                                    $sql = "SELECT COUNT(*) as total_cakes FROM cakes";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo $row["total_cakes"];
                                        }
                                    } else {
                                        echo "No cakes available";
                                    }
                                ?></h2>
                            <a href="dashboard.php?cakes">manage</a>
                        </div>
                    </div>
                    <div class="container-bx">
                        <div class="overlay-bg">
                            <h1>Bookings</h1>
                            <h2><?php
                                    $sql = "SELECT COUNT(*) as total_bookings FROM bookings";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo $row["total_bookings"];
                                        }
                                    } else {
                                        echo "No bookings available";
                                    }
                                ?></h2>
                            <a href="dashboard.php?bookings">view</a>
                        </div>
                    </div>
                </div>
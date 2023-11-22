<div class="customer-container">
                    <div class="header-customer">
                        <h1>Bookings</h1>
                        <div class="content">
                        
                            <div class="query">
                                <input type="search" placeholder="Search...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <form method="post" action="../config/forms.php">
                            
                        </div>
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    <table>
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1">Booking Id</th>
                                                <th class="column1">Email</th>
                                                <th class="column2">Design</th>
                                                <th class="column3">Type</th>
                                                <th class="column4">Size</th>
                                                <th class="column5">Payment Status</th>
                                                <th class="column6">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- start loop  -->
                                            <?php foreach ($bookings as $booking): ?>
                                            <tr>
                                                <td class="column1"><?=$booking['booking_id']?></td>
                                                <td class="column2"><?=$booking['email']?></td>
                                                <td class="column3"><?=$booking['cake_design']?></td>
                                                <td class="column4"><?=$booking['cake_type']?></td>
                                                <td class="column5"><?=$booking['cake_size']?></td>
                                                <td class="column6">
                                                    <span class="status">
                                                    <?php if ($booking['payment_status'] === 'paid'): ?>
                                                        Paid <i class="fa-regular fa-circle-check"></i>
                                                    <?php else: ?>
                                                        Pending <i class="fa-regular fa-circle-xmark"></i>
                                                    <?php endif; ?>
                                                    </span>
                                                </td>
                                                <td class="column6"><?= date('Y-m-d', strtotime($booking['created']))?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <!-- end loop  -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
<div class="customer-container">
                    <div class="header-customer">
                        <h1>Customers</h1>
                        <div class="content">
                        
                            <div class="query">
                                <input type="search" placeholder="Search...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <form method="post" action="../config/forms.php">
                            <div class="btn">
                                <input type="submit" name="delete-customer" value="Remove Selected Customer">
                            </div>
                        </div>
                        <span style="color: var(--blue);"><?php if(isset($_GET['noneselected'])){
                            echo 'No item selected!';
                        }
                      ?></span>
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    <table>
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="newColumn"></th>
                                                <th class="column1">Customer</th>
                                                <th class="column2">Invoice</th>
                                                <th class="column3">Payment Status</th>
                                                <th class="column4">Total Amount</th>
                                                <th class="column5">Due Amount</th>
                                                <th class="column6">Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- start loop  -->
                                            <?php foreach ($customers as $customer): ?>
                                            <tr>
                                                <td class="newColumn"><input type="checkbox" name="customer[]" value="<?=$customer['id']?>"></td>
                                                <td class="column1"><?=$customer['name']?></td>
                                                <td class="column2"><?=$customer['invoice_number']?></td>
                                                <td class="column3">
                                                    <span class="status">
                                                    <?php if ($customer['payment_status'] === 'paid'): ?>
                                                        Paid <i class="fa-regular fa-circle-check"></i>
                                                    <?php elseif ($customer['payment_status'] === 'pending'): ?>
                                                        Pending <i class="fa-regular fa-circle-xmark"></i>
                                                    <?php else: ?>
                                                        None
                                                    <?php endif; ?>
                                                    </span>
                                                </td>
                                                <td class="column4">KES <?=$customer['total_amount']?></td>
                                                <td class="column5">KES <?=$customer['total_amount']?></td>
                                                <td class="column6"><?=$customer['due_date']?></td>
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
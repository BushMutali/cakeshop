<div class="customer-container">
                    <div class="header-customer">
                        <h1>Invoice</h1>
                        <div class="content">
                        
                            <div class="query">
                                <input type="search" placeholder="Search...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <form method="post" action="../config/forms.php">
                            <div class="btn">
                                <input type="submit" name="delete-invoice" value="Remove Selected">
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
                                                <th class="column1">Invoice No.</th>
                                                <th class="column2">Email</th>
                                                <th class="column3">Payment Status</th>
                                                <th class="column4">Total Amount</th>
                                                <th class="column6">Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- start loop  -->
                                            <?php foreach ($invoices as $invoice): ?>
                                            <tr>
                                                <td class="newColumn"><input type="checkbox" name="invoice[]" value="<?=$invoice['invoice_number']?>"></td>
                                                <td class="column1"><?=$invoice['invoice_number']?></td>
                                                <td class="column2"><?=$invoice['email']?></td>
                                                <td class="column3">
                                                    <span class="status">
                                                    <?php if ($invoice['payment_status'] === 'paid'): ?>
                                                        Paid <i class="fa-regular fa-circle-check"></i>
                                                    <?php elseif ($invoice['payment_status'] === 'pending'): ?>
                                                        Pending <i class="fa-regular fa-circle-xmark"></i>
                                                    <?php else: ?>
                                                        None
                                                    <?php endif; ?>
                                                    </span>
                                                </td>
                                                <td class="column4">KES <?=$invoice['total_amount']?></td>
                                                <td class="column6"><?=$invoice['due_date']?></td>
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
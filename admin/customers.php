<div class="customer-container">
                    <div class="header-customer">
                        <h1>Customers</h1>
                        <div class="content">
                            <div class="query">
                                <input type="search" placeholder="Search...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="btn">
                                <a href="#"><i class="fa-solid fa-trash"></i> Remove Selected</a>
                            </div>
                        </div>
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    <table>
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="newColumn"></th>
                                                <th class="column1">Customer</th>
                                                <th class="column2">Invoice</th>
                                                <th class="column3">Status</th>
                                                <th class="column4">Total Amount</th>
                                                <th class="column5">Due Amount</th>
                                                <th class="column6">Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- start loop  -->
                                            <?php foreach ($customers as $customer): ?>
                                            <tr>
                                                <td class="newColumn"><input type="checkbox" name="username[]" value="<?=$customer['id']?>"></td>
                                                <td class="column1"><?=$customer['customer_name']?></td>
                                                <td class="column2">F-8967835</td>
                                                <td class="column3"><span class="status">Paid <i class="fa-regular fa-circle-check"></i></span></td>
                                                <td class="column4">KES 800</td>
                                                <td class="column5">KES 0</td>
                                                <td class="column6">2023-12-08</td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <!-- end loop  -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
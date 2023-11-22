<div class="customer-container">
                    <div class="header-customer">
                        <h1>Employees</h1>
                        <div class="content">
                        
                            <div class="query">
                                <input type="search" placeholder="Search...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <form method="post" action="../config/forms.php">
                            <div class="btn">
                            <a href="../employee/signup.php">
                        <span>Add Employee</span>
                    </a>
                                <input type="submit" name="delete-employee" value="Remove Selected Employee">
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
                                                <th class="newColumn"></th>
                                                <th class="column1">Employee</th>
                                                <th class="column2">Invoice</th>
                                                <th class="column3">Status</th>
                                                <th class="column4">Total Amount</th>
                                                <th class="column5">Due Amount</th>
                                                <th class="column6">Due Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- start loop  -->
                                            <?php foreach ($employees as $employee): ?>
                                            <tr>
                                                <td class="newColumn"><input type="checkbox" name="employee[]" value="<?=$employee['employee_id']?>"></td>
                                                <td class="newColumn"><a href="edit.php?id=<?= $employee['employee_id']; ?>&name=<?= $employee['name'];?>&email=<?= $employee['email'];?>"<i class="fa-solid fa-pen-to-square"></i></a></td>
                                                <td class="column1"><?=$employee['name']?></td>
                                                <td class="column2"><?=$employee['invoice_number']?></td>
                                                <td class="column3">
                                                    <span class="status">
                                                    <?php if ($employee['payment_status'] === 'paid'): ?>
                                                        Paid <i class="fa-regular fa-circle-check"></i>
                                                    <?php elseif ($employee['payment_status'] === 'pending'): ?>
                                                        Pending <i class="fa-regular fa-circle-xmark"></i>
                                                    <?php else: ?>
                                                        None
                                                    <?php endif; ?>
                                                    </span>
                                                </td>
                                                <td class="column4">KES <?=$employee['total_amount']?></td>
                                                <td class="column5">KES <?=$employee['total_amount']?></td>
                                                <td class="column6"><?=$employee['due_date']?></td>
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
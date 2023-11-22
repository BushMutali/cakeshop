<div class="customer-admin-page scroll">
                <form method="post" action="../config/forms.php">
                <div class="header-title">
                    <a href="../employee/signup.php" class="btn-download">
                        <span class="text">Add Employee</span>
                    </a>
                    <a href="" class="btn-download">
                        <i class="fa-solid fa-user-xmark"></i>
                        <span class="text"><input type="submit" name="delete-employee" value="Remove Selected Employee"></span>
                        
                    </a>
                </div>
                
                     <table class="scroll">
                    <thead>
                        <tr>
                        <th> </th>
                        <th>Id.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th> </th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><input type="checkbox" name="employee[]" value="<?=$employee['id']?>"></td>
                            <td><?=$employee['id']?></td>
                            <td><?=$employee['employee_name']?></td>
                            <td><?=$employee['employee_email']?></td>
                            <td><a href="edit.php?id=<?= $employee['id']; ?>&name=<?= $employee['employee_name'];?>&email=<?= $employee['employee_email'];?>">edit</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody> 
                </table>

                </form>
               
            </div>
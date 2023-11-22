<div class="customer-admin-page scroll">
                <form method="post" action="../config/forms.php">
                <div class="header-title">
                    <a href="" class="btn-download">
                        <i class="fa-solid fa-user-xmark"></i>
                        <span class="text"><input type="submit" name="delete-customer" value="Remove Selected Customer"></span>
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
                        <th> </th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><input type="checkbox" name="username[]" value="<?=$customer['id']?>"></td>
                            <td><?=$customer['id']?></td>
                            <td><?=$customer['customer_name']?></td>
                            <td><?=$customer['customer_email']?></td>
                            <td><a href="edit.php?id=<?= $customer['id']; ?>&name=<?= $customer['customer_name'];?>&email=<?= $customer['customer_email'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="">Invoice</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                </form>
               
            </div>
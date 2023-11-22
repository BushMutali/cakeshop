<div class="customer-container">
                    <div class="header-customer">
                        <h1>Cakes</h1>
                        <div class="content">
                        
                            <div class="query">
                                <input type="search" placeholder="Search...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <form method="post" action="../config/forms.php">
                            <div class="btn">
                            <a href="add.php">
                        <span>Add Cake</span>
                    </a>
                                <input type="submit" name="delete-cake" value="Remove Selected Cake">
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
                                                <th class="column1">Name</th>
                                                <th class="column2">Category</th>
                                                <th class="column3">Description</th>
                                                <th class="column4">Date Added</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- start loop  -->
                                            <?php foreach ($cakes as $cake): ?>
                                            <tr>
                                                <td class="newColumn"><input type="checkbox" name="cake[]" value="<?=$cake['id']?>"></td>
                                                <td class="newColumn"><a href="edit.php?id=<?= $cake['id']; ?>&name=<?= $cake['name'];?>&category=<?= $cake['category'];?>"<i class="fa-solid fa-pen-to-square"></i></a></td>
                                                <td class="column1"><?=$cake['name']?></td>
                                                <td class="column2"><?=$cake['category']?></td>
                                                <td class="column3"><?=$cake['description']?></td>
                                                <td class="column4"><?= date('Y-m-d', strtotime($cake['date_created']))?></td>
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
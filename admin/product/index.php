<?php require_once('../../private/initialize.php'); ?>

<?php admin_require_login();

$product_set = find_all_product();

?>




<?php $page_title = 'Product Menu'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>


<body>
    <header>
        <h1>Admin: <?php echo $_SESSION['username'] ?? ''; ?></h1>
        <nav>
            <ul>
                
                <li><a href="<?php echo url_for('index.php'); ?>"> Main Menu</a> </li>
                <li><a href="<?php echo url_for('admin_account/index.php'); ?>"> Admin Accounts</a> </li>
                <li><a href="<?php echo url_for('user_account/index.php'); ?>"> Customer Accounts</a> </li>
                <li><a href="<?php echo url_for('product/index.php'); ?>"> Products</a> </li>
                <li><a href="<?php echo url_for('web_edit/index.php'); ?>"> Page Editor</a> </li>
                <li><a href="<?php echo url_for('admin_account/logout.php'); ?>"> Logout</a> </li>
            </ul>
        </nav>
    </header>

    <div id="content">
        <div id="productlisting">
            <h1>Products Management</h1>

            <div class="actions">
                <a class="action" href="<?php echo url_for('product/new.php'); ?>">Create New Product</a>
            </div>

            <table class="list">
                <tr>
                    <!-- <th>product_id</th> -->
                    <th>product_name</th>
                    <th>Product Image</th>
                    <th>Inventory</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <!-- Display all product -->
                <?php while ($product = mysqli_fetch_assoc($product_set)) { ?>
                    <tr>
                        <!-- <td><? //php echo h($product['product_id']); 
                                    ?></td> -->
                        <td><?php echo h($product['product_name']); ?></td>
                        <td><img width="100px" src="images/<?php echo h($product['product_img']); ?>" alt="Image of Product"></td>
                        <td>
                            <?php 
                            echo h($product['product_quantity']);
                            if ($product['product_quantity'] <= 0) {
                                echo '<h4 style="color: red;">Need restock!</h4>';
                            }
                            ?>
                        </td>
                        <td><a class="action" href="<?php echo url_for('product/product.php?id=' . h(u($product['product_id']))); ?>">More</a></td>
                        <td><a class="action" href="<?php echo url_for('product/edit.php?id=' . h(u($product['product_id']))); ?>">Edit</a></td>
                        <!-- After delecting a product run this mysql code "ALTER TABLE `products` AUTO_INCREMENT = 1" to reset the product_id auto increment -->
                        <td><a class="action" href="<?php echo url_for('product/deleted.php?id=' . h(u($product['product_id']))); ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>


    <?php include(SHARED_PATH . '/footer.php'); ?>
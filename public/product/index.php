<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); 

    $product_set = find_all_products();

?>




<?php $page_title = 'Product Menu'; //used in header.php?> 
<?php include(SHARED_PATH . '/header.php'); ?>


    <body>
        <header>
        <h1>Product Menu</h1>
        </header>

        <nav>
            <ul>
                <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
                <li><a href="<?php echo url_for('/index.php'); ?>"> Main Menu</a> </li>
                <li><a href="<?php echo url_for('/account/index.php'); ?>"> Account Menu</a> </li>
                <li><a href="<?php echo url_for('/product/index.php'); ?>"> Product Menu</a> </li>
                <li><a href="<?php echo url_for('/account/logout.php'); ?>"> Logout</a> </li>
            </ul>
        </nav>

        <div id="content">
            <div id="productlisting">
                <h1>Products</h1>

                <div class="actions">
                    <a class="action" href="<?php echo url_for('/product/new.php'); ?>">Create New Product</a>
                </div>

                <table class="list">
                    <tr>
                        <th>product_id</th>
                        <th>product_name</th>
  	                    <th>quantity</th>
  	                    <th>&nbsp;</th>
  	                    <th>&nbsp;</th>
  	                </tr>

                    <?php while($product = mysqli_fetch_assoc($product_set)) {?>
                    <tr>
                        <td><?php echo h($product['product_id']); ?></td>
                        <td><?php echo h($product['product_name']); ?></td>
  	                    <td><?php echo h($product['quantity']); ?></td>
  	                    <td><a class="action" href="<?php echo url_for('/product/index.php?id=' . h(u($product['product_id']))); ?>">Edit</a></td>
                        <td><a class="action" href="<?php echo url_for('/product/index.php?id=' . h(u($product['product_id']))); ?>">delete</a></td>
  	                </tr>
                    <?php } ?>
                </table>


            </div>


        </div>


<?php include(SHARED_PATH . '/footer.php'); ?>

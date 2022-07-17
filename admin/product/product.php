<?php require_once('../../private/initialize.php'); ?>

<?php require_login();
$product_set = find_all_product();

$id = $_GET['id'];

?>




<?php $page_title = 'Product Menu'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>


<body>
    <header>
        <h1>The Product</h1>
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
                <a class="back-link" href="<?php echo url_for('/product/index.php'); ?>">&laquo; Back to List</a>
            </div>

            <table class="list">
                <tr>
                    <th>product_id</th>
                    <th>product_name</th>
                    <th>Product Image</th>
                    <th>Product Description</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php while ($product = mysqli_fetch_assoc($product_set)) {
                    if ($id == $product['product_id']) { ?>
                        <tr>
                            <td><?php echo h($product['product_id']); ?></td>
                            <td><?php echo h($product['product_name']); ?></td>
                            <td><img width="200px" src="images/<?php echo h($product['product_img']); ?>" alt="Image of Product"></td>
                            <td><?php echo h($product['product_description']); ?></td>
                            <td><a class="action" href="<?php echo url_for('/product/index.php?id=' . h(u($product['product_id']))); ?>">Edit</a></td>
                            <!-- After delecting a product run this mysql code "ALTER TABLE `products` AUTO_INCREMENT = 1" to reset the product_id auto increment -->
                            <td><a class="action" href="<?php echo url_for('/product/deleted.php?id=' . h(u($product['product_id']))); ?>">delete</a></td>
                        </tr>
                <?php }
                } ?>
            </table>


        </div>


    </div>


    <?php include(SHARED_PATH . '/footer.php'); ?>
<?php require_once('../../private/initialize.php');

admin_require_login();

$id = $_GET['id'];

// check is the form is posted
if (is_post_request()) {
    if (delete_product($id)) {  // if is product is deleted
        reset_product_id();  // Try to reset product id
        redirect_to(url_for('product/index.php'));
    }
}
?>

<?php $page_title = 'Delete'; ?>
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
                <li><a href="<?php echo url_for('page_edit.php'); ?>"> Edit Page Style</a> </li>
                <li><a href="<?php echo url_for('admin_account/logout.php'); ?>"> Logout</a> </li>
            </ul>
        </nav>
    </header>


    <div id="content">

        <h1>Delete Product</h1>
        <p>Are you sure you want to delete this Product?</p>

        <!-- Product info -->
        <table class="list">
            <tr>
                <!-- <th>product_id</th> -->
                <th>product_name</th>
                <th>Product Image</th>
                <th>Product Description</th>
            </tr>

            <?php
            $product = find_product_by_id($id);
            ?>
            <tr>
                <td><?php echo h($product['product_name']); ?></td>
                <td><img width="200px" src="images/<?php echo h($product['product_img']); ?>" alt="Image of Product"></td>
                <td><?php echo h($product['product_description']); ?></td>
            </tr>
        </table>

        <!-- Confirm delete -->
        <form style="float:left;" action="<?php echo url_for('product/deleted.php?id=' . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Product" />
            </div>
        </form>

        <!-- Cancel delete -->
        <form style="float:left; margin-left:50px;" action="<?php echo url_for('product/index.php'); ?>">
            <div id="operations">
                <input type="submit" name="commit" value="Cancel" />
            </div>
        </form>


    </div>

    <?php include(SHARED_PATH . '/footer.php'); ?>
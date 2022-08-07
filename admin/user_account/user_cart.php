<?php require_once('../../private/initialize.php'); ?>

<?php admin_require_login();

$account_set = find_all_users();
$cart = get_cart_by_email($_GET['email']);
$email = $_GET['email'];

?>


<?php $page_title = 'Account Menu'; //used in header.php
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

        <a class="action" href="<?php echo url_for('user_account/index.php'); ?>">&laquo; Back to List</a>

        <div class="cart_display">
            <h1>Customer Shopping Cart</h1>
            <p class="red_alert">As a admin you can only remove all item form customer's shopping cart!</p>
            <table class="list">
                <?php
                foreach ($cart as $key => $value) {
                    $product = find_product_by_id($value[1]);
                    echo '
                        <tr>
                            <td><img width="100px" src="../product/images/' . $product['product_img'] . '" alt="Image of Product"></td>
                            <td>' . $product['product_name'] . '</td>
                            <td>Quantity: &nbsp;' . $value[2] . '</td>
                        </tr>
                    ';
                }
                ?>
            </table>
            <a class="action" href="<?php echo url_for('user_account/clear_cart.php?email=' . h(u($email))); ?>">Clear Customer's Cart</a>
        </div>
    </div>


    <?php include(SHARED_PATH . '/footer.php'); ?>
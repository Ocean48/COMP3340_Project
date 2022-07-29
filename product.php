<?php

require_once('private/initialize.php');

$product_set = find_all_product();
$layout = get_style_by_view(1);

$count = 0;

// Check has seesion been started
if (isset($_SESSION) && isset($_SESSION["cart"])) {
    if (is_post_request()) {  // if add to cart is clicked
        $count = 0;
        array_push($_SESSION["cart"], $_POST["product_id"]);  //  add product if to session array
        // count product in cart
        foreach ($_SESSION["cart"] as $key => $value) {
            $count++;
        }
    } else {  // if add to cart was never clicked
        if (!empty($_SESSION["cart"])) {  // if cart is not empty count number of product inside
            foreach ($_SESSION["cart"] as $key => $value) {
                $count++;
            }
        }
    }
} else {  // creat cart session
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION["cart"] = array();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="X">
    <link rel="stylesheet" href="css/style.css">
    <title>Shop</title>

    <!-- load style from database -->
    <style>
        body {
            background-color: <?php echo $layout["background_color"]; ?>;
        }

        .topnav {
            background-color: <?php echo $layout["margin_color"]; ?>;
        }

        .topnav a {
            color: <?php echo $layout["margin_text_color"]; ?>;
        }

        .container_footer {
            background-color: <?php echo $layout["margin_color"]; ?>;
            color: <?php echo $layout["margin_text_color"]; ?>;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.php"><img src="images/logo.png" alt="logo" class="logo"></a>
            <a href="index.php" class="htext htext2">Home</a>
            <a href="products.php" class="htext">Shop</a>
            <a href="account/account.php" class="htext">Account</a>
            <a href="cart.php" class="htext">Cart <span style="font-size: 25px;"><?php if ($count != 0) {
                                                                                        echo "(" . $count . ")";
                                                                                    } ?></span></a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
            <a href="contact.php" class="htext">Contact</a>
            <a href="shipping-policy.php" class="htext_bottom">Shipping Policy</a>
            <a href="privacy-policy.php" class="htext_bottom">Privacy Policy</a>
            <a href="return-policy.php" class="htext_bottom">Return Policy</a>
        </div>
    </header>

    <div id="content">
        <div id="productlisting">
            <h1>Products</h1>


            <!-- Display all product -->
            <?php while ($product = mysqli_fetch_assoc($product_set)) { ?>
                <form action="" method="POST">
                    <div class="product_gallery">
                        <div class="card">
                            <img width="50%" src="admin/product/images/<?php echo h($product['product_img']); ?>" alt="Image of Product">
                            <h1><?php echo h($product['product_name']); ?></h1>
                            <p class="price">$<?php echo h($product['product_price']); ?></p>
                            <p><?php echo h($product['product_description']); ?></p>
                            <input type="hidden" class="button" name="product_id" value="<?php echo h($product['product_id']); ?>"></input>
                            <?php
                            if ($product['product_quantity'] != 0) {
                                echo '<p><input type="submit" class="button" name="add" value="Add to Cart"></input></p>';
                            } else {
                                echo '<h2 style="color: red;">Out of stock!</h2>';
                            }
                            ?>


                        </div>
                    </div>
                </form>
            <?php } ?>


        </div>


    </div>


    <footer>
        <div class="container_footer">
            <br>
            <a href="index.php"><img src="images/logo.png" alt="logo" class="footer_logo"></a>
            <div class="center">
                <a href="contact.php" class="footer_text">Contact</a>
                <a href="shipping-policy.php" class="footer_text">Shipping Policy</a>
                <a href="privacy-policy.php" class="footer_text">Privacy Policy</a>
                <a href="return-policy.php" class="footer_text">Return Policy</a>
                <a href="terms-and-conditions.php" class="footer_text">Term and Conditions</a>
            </div>
            <p class="copyright">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> WEB | All Rights Reserved
            </p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>


</html>

<?php db_disconnect($db); ?>
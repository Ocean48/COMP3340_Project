<?php

require_once('private/initialize.php');

$product = find_product_by_id($_GET['id']);
$layout = get_style_by_view(1);

$count = 0;
if (user_is_logged_in()) {  // if user is logged in
    $cart = get_cart_by_email($_SESSION["user_email"]);
    // count item is shopping cart
    foreach ($cart as $key => $value) {
        $count++;
    }
}

// Check is user login
if (is_post_request()) {
    if (!user_is_logged_in()) {
        echo "<script type='text/javascript'>alert('You must login to add this item to your shopping cart!');
        document.location='account/account.php'</script>";
    }
    add_to_cart($_SESSION["user_email"], $_POST["product_id"], $_POST["quantity"]);
    header("Location: index.php");
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

        .container_footer .footer_text {
            color: <?php echo $layout["margin_text_color"]; ?>;
        }

        .copyright {
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
            <a href="account/cart.php" class="htext"><?php if ($count != 0) {
                                                            echo "Cart•";
                                                        } else {
                                                            echo "Cart";
                                                        } ?></a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
            <a href="contact.php" class="htext">Contact</a>
            <a href="shipping-policy.php" class="htext_bottom">Shipping Policy</a>
            <a href="privacy-policy.php" class="htext_bottom">Privacy Policy</a>
            <a href="return-policy.php" class="htext_bottom">Return Policy</a>
        </div>
    </header>

    <br>

    <a class="back_button" href="products.php">&laquo; Back</a>

    <!-- Display product -->
    <div class="center_block80">
        <div style="float: left;">
            <img width="500px" src="admin/product/images/<?php echo h($product['product_img']); ?>" alt="Image of Product">
        </div>
        <div style="float: left; margin-left:50px;">
            <br><br>
            <form action="" method="POST">
                <h1><?php echo h($product['product_name']); ?></h1>
                <p><?php echo h($product['product_description']); ?></p>
                <input type="hidden" name="product_id" value="<?php echo h($product['product_id']); ?>"></input>
                <p class="price">$<?php echo h($product['product_price']); ?></p>
                Quantity: <input style="width:40px; height:20px;" type="number" min=0 name="quantity" value="1"></input>
                <?php
                if ($product['product_quantity'] > 0) {
                    echo '<p><input type="submit" class="button" name="add" value="Add to Cart"></input></p>';
                } else {
                    echo '<h2 class="red_alert">Out of stock!</h2>';
                }
                ?>
            </form>
        </div>
    </div>

    <p style="clear: both;"><br><br><br></p>


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
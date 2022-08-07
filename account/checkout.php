<?php

require_once('../private/initialize.php');

user_require_login();
$account = find_user_by_email($_SESSION["user_email"]);
$cart = get_cart_by_email($_SESSION["user_email"]);
$layout = get_style_by_view(1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Indoor plants, windsor, personal garden, zen garden, home decoration - plants">
    <meta name="description" content="Windosr local indoor plants">
    <meta name="author" content="SiChao Chen, Arthur Wei, Zaiqing Zhang, Zixun Wang">
    <link rel="stylesheet" href="../css/style.css">
    <title>Checkout</title>

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

    <?php
    // count item is shopping cart
    $count = 0;
    foreach ($cart as $key => $value) {
        $count++;
    }
    ?>

    <!-- Haader -->
    <header>
        <div class="topnav" id="myTopnav">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <a href="../index.php" class="htext htext2">Home</a>
            <a href="../products.php" class="htext">Shop</a>
            <a href="account.php" class="htext">Account</a>
            <a href="../cart.php" class="htext"><?php if ($count != 0) {
                                                    echo "Cart•";
                                                } else {
                                                    echo "Cart";
                                                } ?></a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
            <a href="../contact.php" class="htext">Contact</a>
            <a href="../shipping-policy.php" class="htext_bottom">Shipping Policy</a>
            <a href="../privacy-policy.php" class="htext_bottom">Privacy Policy</a>
            <a href="../return-policy.php" class="htext_bottom">Return Policy</a>
        </div>
    </header>

    <!-- login div -->
    <div class="center_block80 text_center">
        <h1>Checkout</h1>

        <?php
        $total_price = 0;
        foreach ($cart as $key => $value) {
            $product = find_product_by_id($value[1]);
            $price = ($product['product_price'] * $value[2]);
            $total_price += $price;
        }
        echo '<h2>Total: $' . $total_price . '</h2>';
        ?>

        <form action="pay.php" method="POST">
            <input class="submit_save" type="submit" name="checkout" value="Pay">
        </form>
        <br><br>

    </div>

    <footer>
        <div class="container_footer">
            <br>
            <a href="index.php"><img src="../images/logo.png" alt="logo" class="footer_logo"></a>
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
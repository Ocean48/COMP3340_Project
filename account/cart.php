<?php require_once('../private/initialize.php');

user_require_login();

$cart = get_cart_by_email($_SESSION["user_email"]);
$layout = get_style_by_view(1);

// if the form is submitted
if (is_post_request()) {
    // if checkout was clicked
    if (isset($_POST['checkout'])) {
        header("Location:checkout.php");
    }
    // if minus for decrase item quantity was clicked
    elseif (isset($_POST['decrease'])) {
        decrease_cart_item_quantity($_SESSION["user_email"], $_POST["pid"], $_POST["time"]);
        // Check if item quantity is 0 remove it from shopping cart
        if ($_POST["q"] - 1 == 0) {
            remove_item_zero_quantity($_SESSION["user_email"], $_POST["pid"], $_POST["time"]);
        }
        header("Refresh:0");
    }
    // if plus for incrase item quantity was clicked
    elseif (isset($_POST['increase'])) {
        increase_cart_item_quantity($_SESSION["user_email"], $_POST["pid"], $_POST["time"]);
        header("Refresh:0");
    }
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Cart</title>

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
            <a href="cart.php" class="htext"><?php if ($count != 0) {
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

    <br>
    <h1 class="page_title">Shopping Cart</h1>
    <hr>
    <br><br>

    <div class="cart_display">

        <?php
        if ($count != 0) {
        ?>
            <table>
                <?php
                $total_price = 0;
                foreach ($cart as $key => $value) {
                    $product = find_product_by_id($value[1]);
                    $price = ($product['product_price'] * $value[2]);
                    $total_price += $price;
                    echo '
                        <tr>
                            <form action="" method="POST">
                                <td><img width="100px" src="../admin/product/images/' . $product['product_img'] . '" alt="Image of Product"></td>
                                <td>' . $product['product_name'] . '</td>
                                <input type="hidden" name="pid" value="' . $product['product_id'] . '">
                                <td>Quantity: &nbsp;&nbsp;&nbsp;<input type="submit" name="decrease" value="&#8722;"/> ' . $value[2] . ' <input type="submit" name="increase" value="&#43;"/></td>
                                <input type="hidden" name="q" value="' . $value[2] . '">
                                <input type="hidden" name="time" value="' . $value[3] . '">
                                <td>Price: $' . $price . '</td>
                            </form>
                        </tr>
                    ';
                }
                ?>
            </table>
            <?php echo '<h1>Total: $' . $total_price . '</h1>'; ?>

            <br><br>
            <p style="font-size: 16px;">Shipping & taxes calculated at checkout</p>
            <form action="" method="POST">
                <input class="submit_save" type="submit" name="checkout" value="Checkout">
            </form>
        <?php
        } else {
            echo "<br><br><br><br><br><br><br><br><br>";
            echo "<p class='text_center' style='color: #4e4e4e;'>You don't have any items in your shopping cart yet</p>";
            echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        }
        ?>

    </div>


    <footer>
        <div class="container_footer">
            <br>
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="footer_logo"></a>
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
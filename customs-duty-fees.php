<?php

require_once('private/initialize.php');

$layout = get_style_by_view(1);
$product_set = find_all_product();

$count = 0;
if (!empty($_SESSION["cart"])) {  // if cart is not empty count number of product inside
    foreach ($_SESSION["cart"] as $key => $value) {
        $count++;
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="X">
    <link rel="stylesheet" href="css/style.css">
    <title>Privacy Policy</title>

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

    <blockquote cite="https://www.lttstore.com/pages/customs-duty-fees">
        <h1>Customs & Duty Fess </h1>
        <br>
        <br>
        <p>Customers are responsible for any customs and duty fees, which may be assessed to your order once it arrives
            in the destination country. <b>We does not include any coverage for customs or duty fees in quoted
                shipping costs, or at any point in our checkout or billing process.</b></p>
        <br>
        <p>If you have any questions related to customs, duty, and import charges, please contact your local customs
            office prior to ordering.</p>
    </blockquote>

</body>

</html>
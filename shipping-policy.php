<?php

require_once('private/initialize.php');

$layout = get_style_by_view(1);
$product_set = find_all_product();

$count = 0;
if (user_is_logged_in()) {  // if user is logged in
    $cart = get_cart_by_email($_SESSION["user_email"]);
    // count item is shopping cart
    foreach ($cart as $key => $value) {
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
    <title>Shipping Policy</title>

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

    <blockquote cite="https://www.lttstore.com/pages/shipping-policy">

        <h1 class="page_title">Shipping Policy</h1>
        <hr>
        <br>
        <br>
        <p>We offers worldwide shipping where service is available through the shipping companies.</p>
        <br>
        <h4>USA & Canada Orders</h4>
        <p>Most deliveries within the US & Canada should arrive within 7 days after your shipping confirmation email is
            received.</p>
        <br>
        <br>
        <h4>Worldwide Orders</h4>
        <p>Deliveries outside of the US & Canada may take anywhere from 7-40 days to arrive, depending on the
            destination
            country.</p>
        <br>
        <p>These times may be delayed by a number of factors, including delays in customs processing within your
            destination
            country.</p>
        <br>
        <P>If your tracking number shows your package has been delivered, but you have not yet received it, please call
            your
            local post office for more information. If there is an issue with the listed address on your package, they
            may
            need to get in touch with you before delivery can be completed.</P>
        <br>
        <br>
        <h4>Pre-orders & back-orders</h4>
        <p>We aims to provide accurate shipping & delivery estimates for pre-order and back-order products, but may be
            limited by production delays, shipping delays, and other factors outside of our control.</p>
        <br>
        <p>More information may be available on pre-orders and back-orders, on a case-by-case basis. Please contact
            support
            at the email listed in our site's footer for more details.</p>
        <br>
        <br>
        <h1>Customs & Duty Fess </h1>
        <hr>
        <br>
        <br>
        <p>Customers are responsible for any customs and duty fees, which may be assessed to your order once it arrives
            in the destination country. <b>We does not include any coverage for customs or duty fees in quoted
                shipping costs, or at any point in our checkout or billing process.</b></p>
        <br>
        <p>If you have any questions related to customs, duty, and import charges, please contact your local customs
            office prior to ordering.</p>
        <br><br>

    </blockquote>

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
</body>

</html>
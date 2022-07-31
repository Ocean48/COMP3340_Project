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
    <title>Return Policy</title>

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

    <blockquote cite="https://www.lttstore.com/pages/return-policy">
        <h1 class="page_title">Return Policy</h1>
        <br>
        <br>
        <p>We aims to provide a happy shopping experience for all of our customers, but we do understand that
            sometimes a product is just not right for you. We aim to make our returns and exchanges program as simple as
            possible for our valued customers.</p>
        <br>
        <p>
            Returns - We will issue a full refund, including any applicable sales taxes, for any products returned
            within the requirements outlined below. <u><b>Please note that any shipping fees you may have paid in
                    connection
                    with your purchase are non-refundable.</b></u>
        </p>
        <br>
        <p>Exchanges - Free for equal value products. If you choose to exchange for higher value products, we will
            collect the difference from you prior to shipping. For lower value products, we will refund the difference
            to your original payment method. Exchanges will be shipped to the same address as your last order unless
            otherwise specified. Shipping for exchanges is free.</p>

        <br>

        <P>Note to customers outside the US & Canada: <u><b>Refunds for any import/customs/duty fees charged to you at
                    the
                    time of import or delivery should be sought through your local customs bureau. we cannot provide
                    any coverage for this.</b></u></P>
        <br>
        <br>
        <h4>Requirements for returns & exchanges</h4>
        <br>
        <p>Within 30 days - you must contact our site by email about any issues with your order within 30 days of
            delivery</p>
        <br>
        <p>Includes original packaging & product in like-new condition - any returned product(s) must be returned with
            any original packaging, and in the condition which the product(s) arrived. If your return is accepted, we
            will issue a refund or an exchange depending on your stated preference.</p>
        <br>
        <p>We may reject the returned product if there is damage to the product and/or product packaging. If a returned
            product is rejected, no refund will be issued to the customer, and the customer may choose to have the
            product shipped back to them at their own cost. If the customer chooses not to ship the product back to
            them, We will recycle or dispose of the product.</p>
        <br>
        <br>
        <h4>Process</h4>
        <br>
        <p>1. Contact our at the email listed in our site's footer or contact page.</p>
        <br>
        <p>2. If an order or product is deemed eligible for return by our support, we will email you a return
            label. Follow the instructions in the return label email to ship the product back to our distribution
            facility.</p>
        <br>
        <p>3. Drop the package off at the any of shipping company near by your location.</p>
        <br>
        <p>4. Reply to your email from our site to confirm.</p>
        <br>
        <br>
        <p>If you have any additional questions about our returns process, or any other aspect of our purchase
            experience, please contact support at the email listed in our site's footer or contact page</p>
        <br>
        <br>
        <P>Thank you for shopping with us!</P>



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
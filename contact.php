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
    <title>Contact</title>

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

<body">

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

    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Later for replace Later for replace Later for replace Later for replace Later for replace Later for
                replace Later for replace
                Later for replace Later for replace Later for replace Later for replace Later for replace Later for
                replace Later for replace</p>
        </div>
        <div class="container">
            <div class="contactInfo">

                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>001 StayAtHome Ave, Home, Online, S1H O0A (later for replace)</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>100-000-1000 </p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>laterforeplace@fakemail.com</p>
                    </div>
                </div>
                <div class="contactForm">
                    <form>
                        <h2>
                            Send Message
                        </h2>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required"></textarea>
                            <span>Type your message...</span>
                        </div>

                        <div class="inputBox">
                            <input type="submit" name="" value="send">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>

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
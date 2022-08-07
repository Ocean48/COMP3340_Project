<?php
require_once('../private/initialize.php');

// Get page style from database
$layout = get_style_by_view(1);

$count = 0;
if (!empty($_SESSION["cart"])) {  // if cart is not empty count number of product inside
    foreach ($_SESSION["cart"] as $key => $value) {
        $count++;
    }
}

if (is_post_request()) { //if post request process the form
    $account = [];
    $account['email'] = $_POST['email'] ?? '';
    $account['username'] = $_POST['username'] ?? '';
    $account['password'] = $_POST['password'] ?? '';

    // add user
    $result = insert_user($account);
    if ($result) {
        header("Location: login.php");
    }
}
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
    <title>Register</title>

    <!-- load style from database -->
    <style>
        body {
            background-color: <?php echo $layout["background_color"]; ?>;
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

    <body>
        <!-- Haader -->
        <header>
            <div class="topnav" id="myTopnav">
                <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
                <a href="../index.php" class="htext htext2">Home</a>
                <a href="../products.php" class="htext">Shop</a>
                <a href="account.php" class="htext">Account</a>
                <a href="cart.php" class="htext">Cart</a>
                <a href="../contact.php" class="htext">Contact</a>
                <a href="../shipping-policy.php" class="htext_bottom">Shipping Policy</a>
                <a href="../privacy-policy.php" class="htext_bottom">Privacy Policy</a>
                <a href="../return-policy.php" class="htext_bottom">Return Policy</a>
            </div>
        </header>

        <!-- bolck -->
        <div class="center_block80 text_center">
            <h1>REGISTER</h1>
            <p>Please fill in the information below:</p>

            <form action="register.php" method="post">
                <input type="text" name="email" placeholder="Email" required/>
                <br><br>
                <input type="text" name="username" placeholder="Username" required/>
                <br><br>
                <input type="password" name="password" placeholder="Password" id="mypassword" required/>
                <br>
                <input type="checkbox" onclick="show_password()">Show Password
                <script src="../js/script.js"></script>
                <br><br>
                <input class="submit_save" type="submit" name="submit" value="Create My Account" />
            </form>
        </div>

        <p><br><br></p>

        <footer>
            <div class="container_footer">
                <br>
                <a href="../index.php"><img src="../images/logo.png" alt="logo" class="footer_logo"></a>
                <div class="center">
                    <a href="../contact.php" class="footer_text">Contact</a>
                    <a href="../shipping-policy.php" class="footer_text">Shipping Policy</a>
                    <a href="../privacy-policy.php" class="footer_text">Privacy Policy</a>
                    <a href="../return-policy.php" class="footer_text">Return Policy</a>
                    <a href="../terms-and-conditions.php" class="footer_text">Term and Conditions</a>
                </div>
                <p class="copyright">Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> WEB | All Rights Reserved
                </p>
            </div>
        </footer>

        <script src="../js/script.js"></script>
    </body>

</html>
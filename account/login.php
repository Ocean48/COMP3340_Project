<?php require_once('../private/initialize.php'); ?>

<?php



// Get page style from database
$layout = get_style_by_view(1);
$errors = [];

// if form is submitted
if (is_post_request()) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // if there were no errors, try to login
    if (empty($errors)) {
        // Using one variable ensures that msg is the same
        $login_failure_msg = "Log in was unsuccessful.";

        $user = find_user_by_email($username);
        if (!empty($user)) {
            if (password_verify_own($password, $user['password'])) {
                // echo password_verify_own($password, $admin['password']);
                // password matches
                log_in_user($user);
                header("Location: account.php");
            } else {
                // username found, but password does not match
                $errors[] = $login_failure_msg;
            }
        } else {
            // no email found
            $errors[] = $login_failure_msg;
        }
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
    <title>Onsale</title>

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
    </style>
</head>

<body>

    <!-- Haader -->
    <header>
        <div class="topnav" id="myTopnav">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <a href="../index.php" class="htext htext2">Home</a>
            <a href="../products.php" class="htext">Shop</a>
            <a href="account.php" class="htext">Account</a>
            <a href="cart.php" class="htext">Cart</a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
            <a href="../contact.php" class="htext">Contact</a>
            <a href="../shipping-policy.php" class="htext_bottom">Shipping Policy</a>
            <a href="../privacy-policy.php" class="htext_bottom">Privacy Policy</a>
            <a href="../return-policy.php" class="htext_bottom">Return Policy</a>
        </div>
    </header>

    <!-- login div -->
    <div class="center_block80 text_center">
            <h1>LOGIN</h1>

            <?php echo display_errors($errors); ?>

            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Email" require />
                <br><br>
                <input type="password" name="password" placeholder="Password" id="mypassword" require />
                <br>
                <input type="checkbox" onclick="show_password()">Show Password
                <script src="js/script.js"></script>
                <br><br>
                <input class="submit_save" type="submit" name="submit" value="Login" />
            </form>
            <p>Don't have an account? <a href="register.php">Register today!</a></p>
        </div>
    </div>

    <p><br><br></p>

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

    <script src="../js/script.js"></script>

</body>

</html>
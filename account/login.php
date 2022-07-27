<?php require_once('../private/initialize.php'); ?>

<?php

// Get page style from database
$layout = get_style_by_view(1);

$errors = [];

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

    <?php
    $count = 0;
    if (!empty($_SESSION["cart"])) {  // if cart is not empty count number of product inside
        foreach ($_SESSION["cart"] as $key => $value) {
            $count++;
        }
    }
    ?>

    <!-- Haader -->
    <header>
        <div class="topnav" id="myTopnav">
            <a href="../index.html"><img src="images/" alt="logo" class="logo"></a>
            <a href="../index.php" class="htext htext2">Home</a>
            <a href="../products.php" class="htext">Shop</a>
            <a href="account.php" class="htext">Account</a>
            <a href="../cart.php" class="htext">Cart <span style="font-size: 25px;"><?php if ($count != 0) {
                                                                                        echo "(" . $count . ")";
                                                                                    } ?></span></a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
            <a href="../contact.html" class="htext">Contact</a>
            <a href="../shipping-policy.html" class="htext_bottom">Shipping Policy</a>
            <a href="../privacy-policy.html" class="htext_bottom">Privacy Policy</a>
            <a href="../return-policy.html" class="htext_bottom">Return Policy</a>
        </div>

    </header>

    <!-- login div -->
    <div id="block">
        <h1>Log in</h1>

        <?php echo display_errors($errors); ?>

        <form action="login.php" method="post">

            Email:<br />
            <input type="text" name="username" placeholder="email" require /><br />
            Password:<br />
            <input type="password" name="password" placeholder="password" require /><br />
            <input type="submit" name="submit" value="Login" />
        </form>
        <p>Don't have an account? <a href="register.php">Register today!</a></p>
    </div>

    <footer>
        <div class="container_footer">
            <p>Thw Web</p>
            <br>
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
<?php
require_once('../private/initialize.php');

// Get page style from database
$layout = get_style_by_view(1);

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
    <meta name="description" content="">
    <meta name="author" content="X">
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
    </style>
</head>

<body>

    <body>
        <!-- Header -->
        <header>
            <div class="topnav" id="myTopnav">
                <a href="../index.html"><img src="images/" alt="logo" class="logo"></a>
                <a href="../index.php" class="htext htext2">HOME</a>
                <a href="../products.php" class="htext">Shop</a>
                <a href="account.php" class="htext">Account</a>
                <a href="../cart.php" class="htext">Cart</a>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
            </div>

        </header>

        <!-- Input bolck -->
        <div id="block">
            <h1>Register</h1>

            <form action="register.php" method="post">
                Email:<br />
                <input type="text" name="email" placeholder="email" require /><br />
                Username:<br />
                <input type="text" name="username" placeholder="username" require /><br />
                Password:<br />
                <input type="password" name="password" placeholder="password" require /><br />
                <input type="submit" name="submit" value="Register" />
            </form>
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
<?php require_once('../private/initialize.php'); ?>

<?php
user_require_login();
$account = find_user_by_email($_SESSION["user_email"]);

// Get page style from database
$layout = get_style_by_view(1);
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
            <a href="../index.html"><img src="images/" alt="logo" class="logo"></a>
            <a href="../index.php" class="htext htext2">HOME</a>
            <a href="../products.php" class="htext">Shop</a>
            <a href="account.php" class="htext">Account</a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
        </div>

    </header>

    <!-- Show account info -->
    <p><a href="logout.php"> Logout</a></p>

    <div id="content">
        <div id="productlisting">
            <h1>Hi <?php echo h($account['username']); ?>!</h1>


            <table class="list">
                <tr>
                    <th>email</th>
                    <th>username</th>
                    <th>password</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <tr>
                    <td><?php echo h($account['email']); ?></td>
                    <td><?php echo h($account['username']); ?></td>
                    <td><?php echo h($account['password']); ?></td>
                    <td><a class="action" href="<?php echo url_for('/user_account/edit.php?email=' . h(u($account['email']))); ?>">Update Account</a></td>
                </tr>
            </table>
        </div>

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
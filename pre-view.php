<?php

require_once('private/initialize.php');

$layout = get_style_by_view(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="X">
    <link rel="stylesheet" href="css/style.css">
    <title>Onsale</title>
</head>

<body style="background-color: <?php echo $layout["background_color"] ?>;">
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.html"><img src="images/" alt="logo" class="logo"></a>
            <a href="index.php" class="htext htext2">HOME</a>
            <a href="" class="htext">About</a>
            <a href="" class="htext">CART</a>
            <a href="" class="htext">ACCOUNT</a>

            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
        </div>

    </header>



    <p>Main</p>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




    <footer>
        <div class="container_footer">
            <p>fudhu</p>
            <br>
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
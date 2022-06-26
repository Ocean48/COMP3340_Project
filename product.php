<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>
        <?php
            $t = $_POST['t'];
            echo $t;
        ?>
    </title>

</head>
<body>
    <!-- <header>
        <div class="container_header">
            <img src="https://i.ibb.co/vq7sysz/logo.png" alt="logo" class="logo">

            <nav>
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="sign_in.php">Account</a></li>
                </ul>
            </nav>
        </div>
    </header> -->

    <button class="event_button" style="margin-top: 1%;" onclick="window.location.href='products.php'">☚<span style="font-size:x-large;"><b>Back </b></span></button>

    <?php
        session_start();

        $t = $_POST['t'];

        $conn = mysqli_connect("localhost", "root", "123456", "web");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        }
        $sql = "SELECT * FROM `products`";

        $result = $conn->query($sql);

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $go = FALSE;
            $e = $_SESSION['email'];

            while ($row = $result->fetch_assoc()) {
                if ($t == $row['name']) {
                    echo '<h1 style="color: #af0000; padding-top: 1%; text-align:center; font-size: xx-large;">'.$row['name'].'</h1><br>';
                    if($row['image_url2'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url2'].'">';
                    }
                    if($row['image_url3'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url3'].'">';
                    }
                    if($row['image_url4'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url4'].'">';
                    }
                    if($row['image_url5'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url5'].'">';
                    }
                    if($row['image_url6'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url6'].'">';
                    }
                    if($row['image_url7'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url7'].'">';
                    }
                    echo '<form action = "product_.php" method="POST">   
                    <input name="t" type="hidden" value="'.$t.'">
                    <input style="border: none; background-color: orange; color: #0e0d0d; padding: 1% 3%; margin-left: 45%; margin-top: 2%; text-align: center; font-size: larger; cursor: pointer;" type="submit" value="Add to Cart"></form>';
                }
            }
            $conn->close();
        }

        else {

            while ($row = $result->fetch_assoc()) {
                if ($t == $row['name']) {
                    echo '<h1 style="color: #af0000; padding-top: 1%; text-align:center; font-size: xx-large;">'.$row['name'].'</h1><br>';
                    if($row['image_url2'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url2'].'">';
                    }
                    if($row['image_url3'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url3'].'">';
                    }
                    if($row['image_url4'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url4'].'">';
                    }
                    if($row['image_url5'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url5'].'">';
                    }
                    if($row['image_url6'] != '') {
                        echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$row['image_url6'].'">';
                    }
                    echo '<br><p style="text-align: center; color: red; font-size: x-large;"><b>Please sign in to add to cart!</b></p>';
                }
            }
            $conn->close();
        }


    ?>

    <!-- <footer class="container_footer">
        <div class="footer_logo">
            <img src="https://i.ibb.co/vq7sysz/logo.png" alt="logo">
        </div>
        <h2 class="footer_comp_name">NTST-Tech Development Ltd.</h2>
        <div class="contact_us">
            <a style="color: #e9e9e9; text-decoration: none; font-size: x-large; font-weight: bold;" href="contact.html"><li>CONTACT US</li></a>
            <li style="background: url(https://i.ibb.co/3pm5jWx/tel.png) no-repeat 0; padding-left: 12%;">(123)456-7890</li>
            <li style="background: url(https://i.ibb.co/WHscy1Q/email.png) no-repeat 0; padding-left: 12%;">email@gmail.com</li>
        </div> 
        <div class="follow_us">
            <li style="font-size: x-large; font-weight: bold;">FOLLOW US</li>
            <li style="background: url(https://i.ibb.co/nwDgBmM/facebook.png) no-repeat; background-position: -2.5%; padding-left: 16%; margin: 3px 0;"><a class="social_link" href="">Fackbook</a></li>
            <li style="background: url(https://i.ibb.co/LDwsPN2/twitter.png) no-repeat; background-position: -1%; padding-left: 16%; margin: 3px 0;"><a class="social_link" href="">Twitter</a></li>
            <li style="background: url(https://i.ibb.co/5L5rHhq/instgram.png) no-repeat; background-position: 1%; padding-left: 16%; margin: 3px 0;"><a class="social_link" href="">Instagram</a></li>
        </div>

        <p class="copyright">Copyright &copy; <script>document.write(new Date().getFullYear())</script> All Rights Reserved</p>
    </footer> -->
</body>
</html> 

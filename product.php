<?php

require_once('private/initialize.php');

$product_set = find_all_product();

?>

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

    <div id="content">
        <div id="productlisting">
            <h1>Products</h1>

            <div class="actions">
                <a class="action" href="<?php echo url_for('/product/new.php'); ?>">Create New Product</a>
            </div>

            <table class="list">
                <tr>
                    <!-- <th>product_id</th> -->
                    <th>product_name</th>
                    <th>Product Image</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <!-- Display all product -->
                <?php while ($product = mysqli_fetch_assoc($product_set)) { ?>
                    <tr>
                        <!-- <td><?//php echo h($product['product_id']); ?></td> -->
                        <td><?php echo h($product['product_name']); ?></td>
                        <td><img width="100px" src="images/<?php echo h($product['product_img']); ?>" alt="Image of Product"></td>
                        <td><a class="action" href="<?php echo url_for('/product/product.php?id=' . h(u($product['product_id']))); ?>">More</a></td>
                        <td><a class="action" href="<?php echo url_for('/product/edit.php?id=' . h(u($product['product_id']))); ?>">Edit</a></td>
                        <!-- After delecting a product run this mysql code "ALTER TABLE `products` AUTO_INCREMENT = 1" to reset the product_id auto increment -->
                        <td><a class="action" href="<?php echo url_for('/product/deleted.php?id=' . h(u($product['product_id']))); ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>


        </div>


    </div>

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

<?php db_disconnect($db); ?>
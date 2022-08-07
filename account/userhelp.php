<?php require_once('../private/initialize.php'); ?>

<?php

user_require_login();
$layout = get_style_by_view(1);
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
    <link rel="stylesheet" href="../admin/stylesheets/admin.css">
    <title>User Help</title>
</head>

<body>
    <h1>User Help</h1>

    <a href="https://youtu.be/PxjmCPBbnnM">Video Turtorial</a>
    <br>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/PxjmCPBbnnM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <br>
    <h3>Support: <a href="mailto:<?php echo $layout['contact_email'] ?>"><?php echo $layout['contact_email'] ?></a></h3>

    <br><br>
    <div>
        <h2>Account</h2>
        <h3> - Account information</h3>
        <ul>
            <li>When you first create your account, your shipping address is empty. <br> Shipping address can be update under account</li>
            <li>You can also update your account info under Account as well</li>
            <li>A basic shopping cart is included in Account</li>
        </ul>
    </div>

    <br><br>
    <div>
        <h2>Cart</h2>
        <h3> - Shopping cart</h3>
        <ul>
            <li>The dot will show up beside Cart if you have items in your shopping cart</li>
            <li>You can change the quanitiy of the item you wish to purchase</li>
            <li>You can delete a customer account</li>
            <li>The item will be removed from your shopping cart is the quantity is zero</li>
            <li>Note shipping & taxes are calculated at checkout</li>
        </ul>
    </div>

    <br><br>
    <div>
        <h2>Shop</h2>
        <h3> - Shop for indoor plants</h3>
        <ul>
            <li>You can browse through all of out indoor plant in Store</li>
            <li>You can choose the quanitiy of the plant you want to add to cart. <br> Don't worry you can change the quanity later in shopping cart too</li>
        </ul>
    </div>

    <br><br>
    <div>
        <h3>Before making any purchase, please take some time to review our shipping policy and return policy</h3>
        <h3>We hope you will find the plant you are looking for</h3>
    </div>
</body>

</html>
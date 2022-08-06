<?php
require_once('../private/initialize.php');

user_require_login();

$cart = get_cart_by_email($_SESSION["user_email"]);
// to reduce all product's inventoy by 1 because customer has pay for the products
foreach ($cart as $key => $value) {
    update_inventory($value[1], $value[2]);
}

clear_user_cart($_SESSION['user_email']);

header("Location: ../index.php");

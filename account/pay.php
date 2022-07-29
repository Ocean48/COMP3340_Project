<?php
require_once('../private/initialize.php');

// to reduce all product's inventoy by 1 because customer has pay for the products
foreach ($_SESSION["cart"] as $key => $value) {
    update_inventory($value);
}

unset($_SESSION['cart']);

header("Location: ../index.php");

?>

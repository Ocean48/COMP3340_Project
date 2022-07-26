<?php
require_once('../private/initialize.php');

unset($_SESSION['cart']);

header("Location: ../index.php");

?>

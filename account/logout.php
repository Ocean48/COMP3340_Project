<?php
require_once('../private/initialize.php');

unset($_SESSION['user_email']);
unset($_SESSION['last_login']);
unset($_SESSION['username']);

// session_destroy(); // DONOT destory session because shopping cart session

header("Location: ../index.php");

?>

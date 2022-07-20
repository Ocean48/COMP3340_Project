<?php
require_once('../../private/initialize.php');

unset($_SESSION['username']);
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session

redirect_to(url_for('/admin_account/login.php'));

?>

<?php
require_once('../private/initialize.php');

unset($_SESSION['user_email']);
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session

header("Location: ../index.php");

?>

<?php
require_once('../../private/initialize.php');

session_destroy(); //destroy the session since it was only used for admin login info

redirect_to(url_for('admin_account/login.php'));

?>

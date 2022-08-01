<?php require_once('../../private/initialize.php');

admin_require_login();

$layout = get_style_by_view(0);

// Check is form posted
if (is_post_request()) {

    // If pre view is clicked
    if (isset($_POST["pre-view"])) {
        $bc = $_POST["bc"];
        $mc = $_POST["mc"];
        $mtc = $_POST["mtc"];
        update_style($bc, $mc, $mtc, 0);
        $layout = get_style_by_view(0);
    }

    // If save is clicked
    else if (isset($_POST["save"])) {
        $bc = $_POST["bc"];
        $mc = $_POST["mc"];
        $mtc = $_POST["mtc"];
        update_style($bc, $mc, $mtc, 1);
        $layout = get_style_by_view(1);
    }
}


?>

<?php $page_title = 'Main Menu'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>


<body>
    <header>
        <h1>Admin: <?php echo $_SESSION['username'] ?? ''; ?></h1>
        <nav>
            <ul>

                <li><a href="<?php echo url_for('index.php'); ?>"> Main Menu</a> </li>
                <li><a href="<?php echo url_for('admin_account/index.php'); ?>"> Admin Accounts</a> </li>
                <li><a href="<?php echo url_for('user_account/index.php'); ?>"> Customer Accounts</a> </li>
                <li><a href="<?php echo url_for('product/index.php'); ?>"> Products</a> </li>
                <li><a href="<?php echo url_for('web_edit/index.php'); ?>"> Page Editor</a> </li>
                <li><a href="<?php echo url_for('admin_account/logout.php'); ?>"> Logout</a> </li>
            </ul>
        </nav>
    </header>

    <nav>
        <ul>
            <li><a href="<?php echo url_for('web_edit/page_style.php'); ?>"> Page Style</a> </li>
            <li><a href="<?php echo url_for('web_edit/change_logo.php'); ?>"> Change logo</a> </li>
            <li><a href="<?php echo url_for('web_edit/policy.php'); ?>"> Change Policy</a> </li>
        </ul>
    </nav>


    <p><br><br><br></p>

    <?php include(SHARED_PATH . '/footer.php'); ?>
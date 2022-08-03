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
            <li><a href="<?php echo url_for('web_edit/page_style.php'); ?>">Page Style</a></li>
            <li><a href="<?php echo url_for('web_edit/change_logo.php'); ?>">Change logo</a></li>
            <li><a href="<?php echo url_for('web_edit/edit_contact.php'); ?>">Edit Contact</a></li>
            <li><a href="<?php echo url_for('web_edit/shipping_policy.php'); ?>">Shipping Policy</a></li>
            <li><a href="<?php echo url_for('web_edit/privacy_policy.php'); ?>">Privacy Policy</a></li>
            <li><a href="<?php echo url_for('web_edit/return_policy.php'); ?>">Return Policy</a></li>
            <li><a href="<?php echo url_for('web_edit/term_and_condition.php'); ?>">Term&Conditons</a></li>
        </ul>
    </nav>


    <div id="content">

        <form class="style_form" action="page_style.php" method="POST">
            Background color: <input type="color" name="bc" value="<?php echo $layout['background_color'] ?>">
            <br><br>
            Header and Footer background color: <input type="color" name="mc" value="<?php echo $layout['margin_color'] ?>">
            <br><br>
            Header and Footer Text background color: <input type="color" name="mtc" value="<?php echo $layout['margin_text_color'] ?>">
            <br><br>
            <input type="submit" name="pre-view" value="Pre View">
            <input type="submit" name="save" value="Save">
            <br><br>
            <p>Pre View: </p>
        </form>

        <!-- <iframe src="https://chen2d.myweb.cs.uwindsor.ca/COMP3340/project/pre-view.php" style="width:1100px; height:600px;" title="Iframe Example"></iframe> -->
        <iframe src="http://localhost/COMP3340_Project/pre-view.php" style="width:1100px; height:600px;" title="Iframe Example"></iframe>
    </div>

    <p><br><br><br></p>

    <?php include(SHARED_PATH . '/footer.php'); ?>
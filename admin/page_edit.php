<?php require_once('../private/initialize.php');

require_login();

$layout = get_style_by_view(0);

// Check is form posted
if (is_post_request()) {

    // If pre view is clicked
    if (isset($_POST["pre-view"])) {
        $bc = $_POST["bc"];
        update_style($bc, 0);
        $layout = get_style_by_view(0);
    }

    // If save is clicked
    else if (isset($_POST["save"])) {
        $bc = $_POST["bc"];
        update_style($bc, 1);
        $layout = get_style_by_view(1);
    }
}


?>

<?php $page_title = 'Main Menu'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>


<body>
    <header>
        <h1>Main Menu</h1>
    </header>

    <nav>
        <ul>
            <li>Admin: <?php echo $_SESSION['username'] ?? ''; ?></li>
            <li><a href="<?php echo url_for('index.php'); ?>"> Main Menu</a> </li>
            <li><a href="<?php echo url_for('admin_account/index.php'); ?>"> Admin Accounts</a> </li>
            <li><a href="<?php echo url_for('user_account/index.php'); ?>"> User Accounts</a> </li>
            <li><a href="<?php echo url_for('product/index.php'); ?>"> Product Menu</a> </li>
            <li><a href="<?php echo url_for('page_edit.php'); ?>"> Edit Page Color</a> </li>
            <li><a href="<?php echo url_for('admin_account/logout.php'); ?>"> Logout</a> </li>
        </ul>
    </nav>

    <div>

        <form action="page_edit.php" method="POST">
            Color for background color<input type="color" name="bc" value="<?php echo $layout['background_color'] ?>">
            <input type="submit" name="pre-view" value="Pre View">
            <input type="submit" name="save" value="Save">
        </form>

        <br><br>
        <p>Pre View: </p>

        <br>
        <!-- <iframe src="https://chen2d.myweb.cs.uwindsor.ca/COMP3340/project/pre-view.php" style="width:1000px; height:400px;" title="Iframe Example"></iframe> -->
        <iframe src="http://localhost/COMP3340_Project/pre-view.php" style="width:1000px; height:400px;" title="Iframe Example"></iframe>
    </div>


    <?php include(SHARED_PATH . '/footer.php'); ?>
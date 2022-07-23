<?php require_once('../private/initialize.php');

require_login();

$layout = mysqli_fetch_assoc(get_style());

// Check is form posted
if (is_post_request()) {
    
    $bc = $_POST["bc"];

    $sql = "UPDATE `layout` SET `background_color`='" . $bc . "' WHERE 1";
    $result = mysqli_query($db, $sql);
    $layout = mysqli_fetch_assoc(get_style());
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
            <input type="submit" value="Submit">
        </form>

        <br><br>
        <p>Pre View: </p>

        <br>
        <iframe src="https://chen2d.myweb.cs.uwindsor.ca/COMP3340/project/index.php" style="width:1000px; height:400px;" title="Iframe Example"></iframe>
    </div>


    <?php include(SHARED_PATH . '/footer.php'); ?>
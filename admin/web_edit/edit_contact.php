<?php require_once('../../private/initialize.php');

admin_require_login();
$layout = get_style_by_view(1);

// Check is form posted
if (is_post_request()) {

    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $map = $_POST['map'];
    $result = update_contact($address, $phone, $email, $map);

    if ($result) {
        header("Location:index.php");
    }
}


?>

<?php $page_title = 'Edit Contact Page';
?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact Page</title>

</head>

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

    <div><br><br><br></div>

    <div id="content">

        <form action="" method="POST">
            Address: <input type="text" name="address" value="<?php echo $layout['contact_address'] ?>">
            <br><br>
            Phone: <input type="text" name="phone" value="<?php echo $layout['contact_phone'] ?>">
            <br><br>
            Email: <input type="text" name="email" value="<?php echo $layout['contact_email'] ?>">
            <br><br>
            Embed Google Map: <br><textarea style="width: 300px; height:100px" name="map" value="<?php echo $layout['contact_map'] ?>"> </textarea>
            <br><br>
            <input type="submit" name="save" value="Save">
            <br><br>
        </form>

    </div>


    <p><br><br><br></p>

    <?php include(SHARED_PATH . '/footer.php'); ?>
<?php require_once('../../private/initialize.php');

admin_require_login();
$layout = get_style_by_view(1);

// Check is form posted
if (is_post_request()) {

    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // if upload file is not named logo.png or logo.PNG
    if (strtolower(htmlspecialchars(basename($_FILES["fileToUpload"]["name"]))) != 'logo.png') {
        echo "<script type='text/javascript'>alert('The file submitted is not a png image or file name is not logo.png');
        document.location='change_logo.php'</script>";
    } else {
        // if file is moved to the right location, refresh page
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            header("Location:change_logo.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


?>

<?php $page_title = 'Edit Logo'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Logo</title>
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


    <div id="content">

        <form class="style_form" action="change_logo.php" method="POST" enctype="multipart/form-data">
            Logo:
            <div style="background-color: #5b6162; width:100px">
                <img src="<?php echo "../../images/"; ?>logo.png" width="100px" alt="logo">
            </div>
            <br>
            <h4 class="red_alert">Make sure file name is logo.png!<br>The recommended logo size is 400x400 pixels with a transparent background</h4>
            Upload Image:
            <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*">
            <br><br>
            <input type="submit" value="Save">
            <br><br>
            <p>Pre View: </p>
        </form>

        <!-- <iframe src="https://chen2d.myweb.cs.uwindsor.ca/COMP3340/project/pre-view.php" style="width:1000px; height:600px;" title="Iframe Example"></iframe> -->
        <iframe src="http://localhost/COMP3340_Project/pre-view.php" style="width:1100px; height:600px;" title="Iframe Example"></iframe>
    </div>

    <p><br><br><br></p>

    <?php include(SHARED_PATH . '/footer.php'); ?>
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

<?php $page_title = 'Main Menu'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
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
            <li><a href="<?php echo url_for('web_edit/page_style.php'); ?>"> Page Style</a> </li>
            <li><a href="<?php echo url_for('web_edit/change_logo.php'); ?>"> Change logo</a> </li>
            <li><a href="<?php echo url_for('web_edit/policy.php'); ?>"> Change Policy</a> </li>
        </ul>
    </nav>

    <textarea name="content" id="editor">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
        <nav>
        <ul>
            <li><a href="<?php echo url_for('web_edit/page_style.php'); ?>"> Page Style</a> </li>
            <li><a href="<?php echo url_for('web_edit/change_logo.php'); ?>"> Change logo</a> </li>
        </ul>
    </nav>
    </textarea>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

</script>
   

    <p><br><br><br></p>

    <?php include(SHARED_PATH . '/footer.php'); ?>
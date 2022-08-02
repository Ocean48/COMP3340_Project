<?php require_once('../../private/initialize.php');

admin_require_login();
$layout = get_style_by_view(1);

// Check is form posted
if (is_post_request()) {

    $content = $_POST['content'];
    $result = update_privacy_policy($content);

    if ($result) {
        header("Location:index.php");
    }
    else {
        echo '<script>alert("Remember to use Special Characters to inserct things like single and double quotes and more!");</script>';
    }
}


?>

<?php $page_title = 'Edit Privacy Policy';
?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Privacy Policy</title>

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
            <li><a href="<?php echo url_for('web_edit/shipping_policy.php'); ?>"> Shipping Policy</a> </li>
            <li><a href="<?php echo url_for('web_edit/privacy_policy.php'); ?>"> Privacy Policy</a> </li>
            <li><a href="<?php echo url_for('web_edit/return_policy.php'); ?>"> Return Policy</a> </li>
            <li><a href="<?php echo url_for('web_edit/term_and_condition.php'); ?>"> Term&Conditons</a> </li>
        </ul>
    </nav>

    <p class="red_alert">Remember to use Special Characters &Omega; to inserct things like single and double quotes and more!</p>

    <form action="" method="POST">
        <div id="content">
            <div class="row row-editor">
                <div class="editor-container">
                    <textarea name="content" class="editor">
                        <?php
                        echo $layout['privacy_policy'];
                        ?>
                    </textarea>
                </div>
            </div>
        </div>

        <script src="build/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('.editor'), {})
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error('Oops, something went wrong!');
                    console.error(error);
                });
        </script>

        <input type="submit" value="save">
    </form>


    <p><br><br><br></p>

    <?php include(SHARED_PATH . '/footer.php'); ?>
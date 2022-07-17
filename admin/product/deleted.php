<?php require_once('../../private/initialize.php'); ?>

<?php

$id = $_GET['id'];

?>

<?php $page_title = 'Delete'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
    <header>
        <h1>Upload</h1>
    </header>


    <div id="content">

        <h1>Product delecting</h1>

        <?php
        if (delete_product($id)) {
            echo "Deleted<br>";
            reset_product_id();
            echo "You will be redirected back in 5 seconds";
            ?>
            <meta http-equiv="Refresh" content="5;url=index.php">
            <?php
        }


        ?>


    </div>

    <?php include(SHARED_PATH . '/footer.php'); ?>
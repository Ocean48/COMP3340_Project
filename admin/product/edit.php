<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Edit'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php

$product_id = $_GET['id'];


if (is_post_request()) {
    echo "changing...";
    $product_name = $_POST['product_name'];
    $product_img = $_POST['product_img'];
    $product_description = $_POST['product_description'];
    $product_set = find_all_product();
    while ($product = mysqli_fetch_assoc($product_set)) {
        if ($product['product_id'] == $product_id) {
            if ($_POST['product_name'] == null) {
                $product_name = $product['product_name'];
            }
            if ($_POST['product_img'] == null) {
                $product_img = $product['product_img'];
            }
            if ($_POST['product_description'] == null) {
                $product_description = $product['product_description'];
            }
            break;
        }
    }

    $result = update_product($product_id, $product_name, $product_img, $product_description);
    if ($result) {
        echo "Updated<br>";
        echo "You will be redirected back in 5 seconds";
        ?>
        <meta http-equiv="Refresh" content="5;url=index.php">
        <?php
    }
}

?>

<body>
    <header>
        <h1>Upload</h1>
    </header>


    <div id="content">

        <h1>Product editing</h1>

        <div id="content">

            <a class="back-link" href="<?php echo url_for('/product/index.php'); ?>">&laquo; Back to List</a>

            <div class="subject new">

                <h1>Edit Product</h1>

                <form action="<?php echo url_for('/product/edit.php?id=' . h(u($product_id))); ?>" method="post" enctype="multipart/form-data">
                    <dl>
                        <dt>Product Name</dt>
                        <dd><input type="text" name="product_name" placeholder="Product Name" /></dd>
                        <br><br>
                        <dt>Product Image name</dt>
                        <dd><input type="text" name="product_img" placeholder="Enter name of image with extension image.png" /></dd>
                        <br><br>
                        <dt>Upload Image</dt>
                        <dd><input type="file" id="fileToUpload" name="fileToUpload" accept="image/*"></dd>
                        <br><br>
                        <dt>Product Description</dt>
                        <dd><textarea name="product_description"> </textarea></dd>
                    </dl>

                    <div>
                        <input type="submit" value="Submit" />
                    </div>
                </form>


            </div>


        </div>


    </div>

    <?php include(SHARED_PATH . '/footer.php'); ?>
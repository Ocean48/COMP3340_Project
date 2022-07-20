<?php require_once('../../private/initialize.php');
require_login();


$page_title = 'Create Product';
include(SHARED_PATH . '/header.php'); ?>

<body>
    <header>
        <h1>Create Product</h1>
    </header>


    <div id="content">

        <a class="action" href="<?php echo url_for('/product/index.php'); ?>">&laquo; Back to List</a>

        <div class="subject new">

            <h1>Create Product</h1>

            <!-- Product info input fileds -->
            <form action="<?php echo url_for('/product/upload.php'); ?>" method="post" enctype="multipart/form-data">
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
                    <input type="submit" value="Create Product" />
                </div>
            </form>
            <br><br>
        </div>
    </div>

    <br><br>

    <?php include(SHARED_PATH . '/footer.php'); ?>
<?php require_once('../../private/initialize.php');
admin_require_login();


$page_title = 'Create Product';
include(SHARED_PATH . '/header.php'); ?>

<body>
    <header>
        <h1>Admin: <?php echo $_SESSION['username'] ?? ''; ?></h1>
        <nav>
            <ul>
                
                <li><a href="<?php echo url_for('index.php'); ?>"> Main Menu</a> </li>
                <li><a href="<?php echo url_for('admin_account/index.php'); ?>"> Admin Accounts</a> </li>
                <li><a href="<?php echo url_for('user_account/index.php'); ?>"> Customer Accounts</a> </li>
                <li><a href="<?php echo url_for('product/index.php'); ?>"> Products</a> </li>
                <li><a href="<?php echo url_for('page_edit.php'); ?>"> Edit Page Style</a> </li>
                <li><a href="<?php echo url_for('admin_account/logout.php'); ?>"> Logout</a> </li>
            </ul>
        </nav>
    </header>


    <div id="content">

        <a class="action" href="<?php echo url_for('product/index.php'); ?>">&laquo; Back to List</a>

        <div class="subject new">

            <h1>Create New Product</h1>

            <!-- Product info input fileds -->
            <form action="<?php echo url_for('product/upload.php'); ?>" method="post" enctype="multipart/form-data">
                <dl>
                    <dt>Product Name:</dt>
                    <dd><input type="text" name="product_name" placeholder="Product Name" /></dd>
                    <br><br><br>
                    <dt>Product Image name:</dt>
                    <dd><input type="text" name="product_img" placeholder="Enter name of image with extension image.png" /></dd>
                    <br><br><br>
                    <dt>Upload Image:</dt>
                    <dd><input type="file" id="fileToUpload" name="fileToUpload" accept="image/*"></dd>
                    <br><br>
                    <dt>Product Description:</dt>
                    <dd><textarea class="text_area" name="product_description"> </textarea></dd>
                    <br><br><br><br><br>
                    <dt>Product Price:</dt>
                    <dd><input type="text" name="product_price" placeholder="price"> </input></dd>
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
<?php require_once('../../private/initialize.php');
require_login();


$page_title = 'Edit';
include(SHARED_PATH . '/header.php');

$product_set = find_all_product();

$product_id = $_GET['id'];

// Check is form posted
if (is_post_request()) {
    $product_name = $_POST['product_name'];
    $product_img = $_POST['product_img'];
    $product_description = $_POST['product_description'];
    $product_set = find_all_product();

    // Old info will be used if field is left empty
    while ($product = mysqli_fetch_assoc($product_set)) {
        if ($product['product_id'] == $product_id) {
            if (empty($_POST['product_name'])) {
                $product_name = $product['product_name'];
            }
            if (empty($_POST['product_img'])) {
                $product_img = $product['product_img'];
            }
            if (empty($_POST['product_description'])) {
                $product_description = $product['product_description'];
            }
            break;
        }
    }

    // update product
    $result = update_product($product_id, $product_name, $product_img, $product_description);
    if ($result) {
?>
        <!-- redirect -->
        <meta http-equiv="Refresh" content="0.5;url=index.php">
<?php
    }
}

?>

<body>
    <header>
        <h1>Edit</h1>
    </header>


    <div id="content">

        <h1>Product editing</h1>
        <p style="color:red;">If field is left empty data will NOT be changed!</p>

        <div id="content">

            <a class="action" href="<?php echo url_for('/product/index.php'); ?>">&laquo; Back to List</a>

            <div class="subject new">

                <h1>Edit Product</h1>

                <br><br><br>    

                <!-- Display product info -->
                <table class="list">
                    <tr>
                        <th>product_name</th>
                        <th>Product Image</th>
                        <th>Product Description</th>
                    </tr>

                    <!-- Look for product using id -->
                    <?php while ($product = mysqli_fetch_assoc($product_set)) {
                        if ($product_id == $product['product_id']) { ?>
                            <tr>
                                <td><?php echo h($product['product_name']); ?></td>
                                <td><img width="200px" src="images/<?php echo h($product['product_img']); ?>" alt="Image of Product"></td>
                                <td><?php echo h($product['product_description']); ?></td>
                            </tr>
                    <?php }
                    } ?>
                </table>

                <br><br><br>


                <!-- Fields to update product -->
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
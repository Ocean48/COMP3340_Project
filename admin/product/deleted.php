<?php require_once('../../private/initialize.php');

require_login();

$id = $_GET['id'];

$product_set = find_all_product();

// check is the form is posted
if(is_post_request()) {
    if (delete_product($id)) {  // if is product is deleted
    ?>
        <!-- Redirect back to list of product -->
        <meta http-equiv="Refresh" content="0.5;url=index.php">  
    <?php
    }
  }
?>

<?php $page_title = 'Delete'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
    <header>
        <h1>Upload</h1>
    </header>


    <div id="content">

        <h1>Delete Product</h1>
        <p>Are you sure you want to delete this Product?</p>

        <!-- Product info -->
        <table class="list">
            <tr>
                <!-- <th>product_id</th> -->
                <th>product_name</th>
                <th>Product Image</th>
                <th>Product Description</th>
            </tr>

            <?php while ($product = mysqli_fetch_assoc($product_set)) {
                if ($id == $product['product_id']) { ?>
                    <tr>
                        <!-- <td><?php //echo h($product['product_id']); ?></td> -->
                        <td><?php echo h($product['product_name']); ?></td>
                        <td><img width="200px" src="images/<?php echo h($product['product_img']); ?>" alt="Image of Product"></td>
                        <td><?php echo h($product['product_description']); ?></td>
                    </tr>
            <?php }
            } ?>
        </table>

        <!-- Confirm delete -->
        <form style="float:left;" action="<?php echo url_for('/product/deleted.php?id=' . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Product" />
            </div>
        </form>

        <!-- Cancel delete -->
        <form style="float:left; margin-left:50px;" action="<?php echo url_for('/product/index.php'); ?>">
            <div id="operations">
                <input type="submit" name="commit" value="Cancel" />
            </div>
        </form>


    </div>

    <?php include(SHARED_PATH . '/footer.php'); ?>
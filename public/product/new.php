<?php require_once('../../private/initialize.php'); ?>

<?php

    $product = [];
    $product["product_name"] = "";

?>

<?php $page_title = 'Create Product'; ?>
<?php include(SHARED_PATH. '/header.php'); ?>

<body>
        <header>
        <h1>Create Product</h1>
        </header>


    <div id="content">

        <a class="back-link" href="<?php echo url_for('/product/index.php'); ?>">&laquo; Back to List</a>

        <div class="subject new">

            <h1>Create Subject</h1>

            <form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="post">
                <dl>
                    <dt>Product Name</dt>
                    <dd><input type="text" name="product_name" value="<?php echo h($product['product_name']); ?>" /></dd>
                </dl>

                <div>
                    <input type="submit" value="Create Product" />
                </div>
            </form>


        </div>


    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
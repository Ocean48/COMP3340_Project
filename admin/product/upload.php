<?php require_once('../../private/initialize.php'); ?>

<?php

$product_id = 0;
$product_name = $_POST['product_name'];
$product_img= $_POST['product_img'];

?>

<?php $page_title = 'Upload'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
    <header>
        <h1>Upload</h1>
    </header>


    <div id="content">

        <h1>P</h1>

        <?php
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large. Must be under 500kB";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                insert_product($product_id, $product_name, $product_img);
                ?>
                <a class="back-link" href="<?php echo url_for('/product/index.php'); ?>">&laquo; Back to List</a>
                <?php
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        ?>


    </div>

    <?php include(SHARED_PATH . '/footer.php'); ?>
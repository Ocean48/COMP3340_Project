<?php require_once('../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Main Menu'; //used in header.php?> 
<?php include(SHARED_PATH . '/header.php'); ?>


    <body>
        <header>
        <h1>Main Menu</h1>
        </header>

        <nav>
            <ul>
                <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
                <li><a href="<?php echo url_for('/index.php'); ?>"> Main Menu</a> </li>
                <li><a href="<?php echo url_for('/account/index.php'); ?>"> Account Menu</a> </li>
                <li><a href="<?php echo url_for('/product/index.php'); ?>"> Product Menu</a> </li>
                <li><a href="<?php echo url_for('/account/logout.php'); ?>"> Logout</a> </li>
            </ul>
        </nav>

        <div> Content </div>


<?php include(SHARED_PATH . '/footer.php'); ?>

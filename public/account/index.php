<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); 

    $admin_set = find_all_admins();

?>


<?php $page_title = 'Account Menu'; //used in header.php?> 
<?php include(SHARED_PATH . '/header.php'); ?>


    <body>
        <header>
        <h1>Account Menu</h1>
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

        <div id="content">
            <div id="productlisting">
                <h1>Users in Database</h1>

                <div class="actions">
                    <a class="action" href="<?php echo url_for('/account/new.php'); ?>">Create New Product</a>
                </div>

                <table class="list">
                    <tr>
                        <th>id</th>
                        <th>username</th>
  	                    <th>password</th>
  	                    <th>&nbsp;</th>
  	                    <th>&nbsp;</th>
  	                </tr>

                    <?php while($admin = mysqli_fetch_assoc($admin_set)) {?>
                    <tr>
                        <td><?php echo h($admin['id']); ?></td>
                        <td><?php echo h($admin['username']); ?></td>
  	                    <td><?php echo h($admin['password']); ?></td>
  	                    <td><a class="action" href="<?php echo url_for('/account/index.php?id=' . h(u($admin['id']))); ?>">Edit</a></td>
                        <td><a class="action" href="<?php echo url_for('/account/index.php?id=' . h(u($admin['id']))); ?>">delete</a></td>
  	                </tr>
                    <?php } ?>
                </table>


            </div>


        </div>


<?php include(SHARED_PATH . '/footer.php'); ?>

<?php

require_once('../../private/initialize.php');

require_login();

if(is_post_request()) { //if post request process the form
  $admin = [];
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';

  $result = insert_admin($admin);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    //$_SESSION['message'] = 'Admin created.';
    redirect_to(url_for('/account/index.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $admin = [];
  $admin["username"] = '';
  $admin['password'] = '';
}
?>

<?php $page_title = 'Register Admin'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
        <header>
        <h1>Product Menu</h1>
        </header>


        <div id="content">

            <a class="back-link" href="<?php echo url_for('/account/index.php'); ?>">&laquo; Back to List</a>

            <div class="admin new">
                <h1>Register Admin</h1>

                <form action="<?php echo url_for('/account/new.php'); ?>" method="post">
    
                <dl>
                    <dt>Username</dt>
                    <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
                </dl>

                <dl>
                    <dt>Password</dt>
                    <dd><input type="password" name="password" value="" /></dd>
                </dl>
            <br/>

            <div id="operations">
            <input type="submit" value="Register User" />
            </div>
        </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
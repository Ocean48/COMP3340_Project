<?php

require_once('../../private/initialize.php');

require_login();

if(is_post_request()) { //if post request process the form
  $account = [];
  $account['username'] = $_POST['username'] ?? '';
  $account['password'] = $_POST['password'] ?? '';

  $result = insert_admin($account);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    //$_SESSION['message'] = 'Admin created.';
    redirect_to(url_for('/admin_account/index.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $account = [];
  $account["username"] = '';
  $account['password'] = '';
}
?>

<?php $page_title = 'Register User Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
        <header>
        <h1>Account Menu</h1>
        </header>


        <div id="content">

            <a class="action" href="<?php echo url_for('/admin_account/index.php'); ?>">&laquo; Back to List</a>

            <div class="admin new">
                <h1>Register User Account</h1>

                <form action="<?php echo url_for('/admin_account/new.php'); ?>" method="post">
    
                <dl>
                    <dt>Username</dt>
                    <dd><input type="text" name="username" placeholder="username" /></dd>
                </dl>

                <dl>
                    <dt>Password</dt>
                    <dd><input type="password" name="password" placeholder="password" /></dd>
                </dl>
            <br/>

            <div id="operations">
            <input type="submit" value="Create Admin" />
            </div>
        </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
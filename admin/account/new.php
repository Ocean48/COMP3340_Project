<?php

require_once('../../private/initialize.php');

require_login();

if(is_post_request()) { //if post request process the form
  $account = [];
  $account['email'] = $_POST['email'] ?? '';
  $account['password'] = $_POST['password'] ?? '';

  $result = insert_user($account);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    //$_SESSION['message'] = 'Admin created.';
    redirect_to(url_for('/account/index.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $account = [];
  $account["email"] = '';
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

            <a class="back-link" href="<?php echo url_for('/account/index.php'); ?>">&laquo; Back to List</a>

            <div class="admin new">
                <h1>Register User Account</h1>

                <form action="<?php echo url_for('/account/new.php'); ?>" method="post">
    
                <dl>
                    <dt>Email</dt>
                    <dd><input type="text" name="email" value="<?php echo h($account['email']); ?>" /></dd>
                </dl>

                <dl>
                    <dt>Password</dt>
                    <dd><input type="password" name="password" value="" /></dd>
                </dl>
            <br/>

            <div id="operations">
            <input type="submit" value="Register User Account" />
            </div>
        </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
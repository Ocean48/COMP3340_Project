<?php

require_once('../../private/initialize.php');

admin_require_login();

if(is_post_request()) { //if post request process the form
  $account = [];
  $account['email'] = $_POST['email'] ?? '';
  $account['password'] = $_POST['password'] ?? '';

  $result = insert_user($account);
  if($result === true) {
    redirect_to(url_for('/user_account/index.php'));
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

            <a class="action" href="<?php echo url_for('/user_account/index.php'); ?>">&laquo; Back to List</a>

            <div class="admin new">
                <h1>Register User Account</h1>

                <form action="<?php echo url_for('/user_account/new.php'); ?>" method="post">
    
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
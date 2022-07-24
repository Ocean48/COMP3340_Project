<?php
require_once('../../private/initialize.php');
admin_require_login();

if (!isset($_GET['email'])) {
  redirect_to(url_for('/user_account/index.php'));
}
$email = $_GET['email'];

if (is_post_request()) {
  $new_email = $_POST['email'];

  $account = [];
  $account_email = $email;
  $account_password = $_POST['password'];
  $account_username = $_POST['username'];
  $confirm_password = $_POST['confirm_password'];

  $account = find_user_by_email($email);
  if (empty($_POST['email'])) {
    $new_email = $email;
  }
  if (empty($_POST['password'])) {
    $account_password = $account['password'];
  }


  $result = update_user($account_email, $new_email, $account_username, $account_password);
  if ($result === true) {
    $_SESSION['message'] = 'User account updated.';
    redirect_to(url_for('/user_account/index.php'));
  } else {
    $errors = $result;
  }
} else {
  $account = find_user_by_email($email);
}

?>

<?php $page_title = 'Edit User Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
  <header>
    <h1>Account Menu</h1>
  </header>

  <div id="content">

    <a class="action" href="<?php echo url_for('/user_account/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin edit">
      <h1>Edit User Account</h1>
      <p style="color:red;">If field is left empty data will NOT be changed!</p>

      <!-- <?php // echo display_errors($errors); 
            ?> -->

      <form action="<?php echo url_for('/user_account/edit.php?email=' . h(u($email))); ?>" method="post">

        <dl>
          <dt>New Email</dt>
          <dd><input type="text" name="email" placeholder="new email" /><br /></dd>
        </dl>

        <dl>
          <dt>New Username</dt>
          <dd><input type="text" name="username" placeholder="new username" /><br /></dd>
        </dl>

        <dl>
          <dt>New Password</dt>
          <dd><input type="password" name="password" placeholder="new password" /></dd>
        </dl>

        <dl>
          <dt>Confirm Password</dt>
          <dd><input type="password" name="confirm_password" placeholder="confirm password" /></dd>
        </dl>
        <!-- <p>
                Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
              </p> -->
        <br />

        <div id="operations">
          <input type="submit" value="Edit User Account" />
        </div>
      </form>

    </div>

  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
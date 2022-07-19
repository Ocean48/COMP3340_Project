<?php

require_once('../../private/initialize.php');

if(!isset($_GET['email'])) {
  redirect_to(url_for('/account/index.php'));
}
$email = $_GET['email'];

if(is_post_request()) {
  $account = [];
  //$account['id'] = $id;
  $account['email'] = $email;
  $account['password'] = $_POST['password'] ?? '';
  $account['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = update_user($account);
  if($result === true) {
    $_SESSION['message'] = 'User account updated.';
    //redirect_to(url_for('/staff/admins/show.php?id=' . $id));
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

          <a class="back-link" href="<?php echo url_for('/account/index.php'); ?>">&laquo; Back to List</a>

          <div class="admin edit">
            <h1>Edit User Account</h1>

            <!-- <?php // echo display_errors($errors); ?> -->

            <form action="<?php echo url_for('/account/edit.php?email=' . h(u($email))); ?>" method="post">

              <dl>
                <dt>Email</dt>
                <dd><input type="text" name="email" value="<?php echo h($account['email']); ?>" /><br /></dd>
              </dl>

              <dl>
                <dt>Password</dt>
                <dd><input type="password" name="password" value="" /></dd>
              </dl>

              <dl>
                <dt>Confirm Password</dt>
                <dd><input type="password" name="confirm_password" value="" /></dd>
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

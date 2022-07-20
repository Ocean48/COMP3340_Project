<?php
require_once('../../private/initialize.php');
require_login();

if (!isset($_GET['id'])) {
  redirect_to(url_for('/admin_account/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {
  $new_usrname = $_POST['username'];
  $account = [];
  //$account['id'] = $id;
  $account_id = $id;
  $account_username = $_POST["username"];
  $account_password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  $account_set = find_all_admins();
  while ($account = mysqli_fetch_assoc($account_set)) {
    if ($account['id'] == $account_id) {
      if ($_POST['username'] == null) {
        $new_usrname = $account['username'];
      }
      if ($_POST['password'] == null) {
        $account_password = $account['password'];
      }
      break;
    }
  }

  $result = update_admin($account_id, $new_usrname, $account_password);
  if ($result === true) {
    $_SESSION['message'] = 'User account updated.';
?>
    <meta http-equiv="Refresh" content="0.5;url=index.php">
<?php
    //redirect_to(url_for('/staff/admins/show.php?id=' . $id));
  } else {
    $errors = $result;
  }
} else {
  $account = find_admin_by_id($id);
}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
  <header>
    <h1>Edit Admin</h1>
  </header>

  <div id="content">

    <a class="action" href="<?php echo url_for('/admin_account/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin edit">
      <h1>Edit Admin</h1>
      <p style="color:red;">If field is left empty data will NOT be changed!</p>

      <!-- <?php // echo display_errors($errors); 
            ?> -->

      <!-- new info field -->
      <form action="<?php echo url_for('/admin_account/edit.php?id=' . h(u($id))); ?>" method="post">

        <dl>
          <p class="bold" style="float: left;">Old Username:</p>
          <p style="float: left; margin-left: 10px"><?php echo ($account['username']); ?></p>
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
<?php
require_once('../../private/initialize.php');
admin_require_login();

if (!isset($_GET['email'])) {
  redirect_to(url_for('user_account/index.php'));
}
$email = $_GET['email'];

if (is_post_request()) {
  $result = delete_user($email);
  $_SESSION['message'] = 'Customer Account deleted.';
  redirect_to(url_for('user_account/index.php'));
} else {
  $account = find_user_by_email($email);
}

?>

<?php $page_title = 'Customer Management - Delete Customer Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
  <header>
    <h1>Admin: <?php echo $_SESSION['username'] ?? ''; ?></h1>
    <nav>
      <ul>

        <li><a href="<?php echo url_for('index.php'); ?>"> Main Menu</a> </li>
        <li><a href="<?php echo url_for('admin_account/index.php'); ?>"> Admin Accounts</a> </li>
        <li><a href="<?php echo url_for('user_account/index.php'); ?>"> Customer Accounts</a> </li>
        <li><a href="<?php echo url_for('product/index.php'); ?>"> Products</a> </li>
        <li><a href="<?php echo url_for('web_edit/index.php'); ?>"> Page Editor</a> </li>
        <li><a href="<?php echo url_for('admin_account/logout.php'); ?>"> Logout</a> </li>
      </ul>
    </nav>
  </header>

  <div id="content">


    <div class="admin delete">
      <h1>Delete Customer Account</h1>
      <p>Are you sure you want to delete this Customer Account?</p>
      <p class="item"><?php echo h($account['email']); ?></p>

      <form style="float:left;" action="<?php echo url_for('user_account/delete.php?email=' . h(u($account['email']))); ?>" method="post">
        <div id="operations">
          <input type="submit" name="commit" value="Delete Customer Account" />
        </div>
      </form>

      <form style="float:left; margin-left:50px;" action="<?php echo url_for('user_account/index.php'); ?>">
        <div id="operations">
          <input type="submit" name="commit" value="Cancel" />
        </div>
      </form>

    </div>

  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
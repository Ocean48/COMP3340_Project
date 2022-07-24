<?php
require_once('../../private/initialize.php');
admin_require_login();

if (!isset($_GET['email'])) {
  redirect_to(url_for('/user_account/index.php'));
}
$email = $_GET['email'];

if (is_post_request()) {
  $result = delete_user($email);
  $_SESSION['message'] = 'User Account deleted.';
  redirect_to(url_for('/user_account/index.php'));
} else {
  $account = find_user_by_email($email);
}

?>

<?php $page_title = 'Delete User Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
  <header>
    <h1>Account Menu</h1>
  </header>

  <div id="content">

    <a class="action" href="<?php echo url_for('/user_account/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin delete">
      <h1>Delete User Account</h1>
      <p>Are you sure you want to delete this User Account?</p>
      <p class="item"><?php echo h($account['email']); ?></p>

      <form style="float:left;" action="<?php echo url_for('/user_account/delete.php?email=' . h(u($account['email']))); ?>" method="post">
        <div id="operations">
          <input type="submit" name="commit" value="Delete User Account" />
        </div>
      </form>

      <form style="float:left; margin-left:50px;" action="<?php echo url_for('/user_account/index.php'); ?>">
        <div id="operations">
          <input type="submit" name="commit" value="Cancel" />
        </div>
      </form>

    </div>

  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
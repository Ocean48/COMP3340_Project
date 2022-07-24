<?php
require_once('../../private/initialize.php');
admin_require_login();


if (!isset($_GET['id'])) {
  redirect_to(url_for('/admin_account/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {
  $result = delete_admin($id);
  reset_admin_id();
  redirect_to(url_for('/admin_account/index.php'));
} else {
  $account = find_admin_by_id($id);
}

?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
  <header>
    <h1>Account Menu</h1>
  </header>

  <div id="content">

    <a class="action" href="<?php echo url_for('/admin_account/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin delete">
      <h1>Delete Admin</h1>
      <p>Are you sure you want to delete this Admin?</p>
      <p class="item"><?php echo h($account['username']); ?></p>

      <form style="float:left;" action="<?php echo url_for('/admin_account/delete.php?id=' . h(u($account['id']))); ?>" method="post">
        <div id="operations">
          <input type="submit" name="commit" value="Delete Admin" />
        </div>
      </form>

      <form style="float:left; margin-left:50px;" action="<?php echo url_for('/admin_account/index.php'); ?>">
        <div id="operations">
          <input type="submit" name="commit" value="Cancel" />
        </div>
      </form>

    </div>

  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
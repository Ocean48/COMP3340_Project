<?php
require_once('../../private/initialize.php');
admin_require_login();

if (!isset($_GET['email'])) {
  redirect_to(url_for('user_account/index.php'));
}
$email = $_GET['email'];
$account = find_user_by_email($email);

// if cancel button was clicked
if (isset($_POST["cancel"])) {
  header("Location: index.php");
} else {

  if (is_post_request()) {

    $account_array = array();
    $account_array["id"] = $account['user_id'];
    $account_array["email"] = $_POST['email'];
    $account_array["password"] = $_POST['password'];
    $account_array["username"] = $_POST['username'];

    $result = update_user_by_id($account_array);
    if ($result === true) {
      $_SESSION['message'] = 'User account updated.';
      redirect_to(url_for('user_account/index.php'));
    } else {
      $errors = $result;
    }
  } else {
    $account = find_user_by_email($email);
  }
}

?>

<?php $page_title = 'Edit Customer Account'; ?>
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

    <a class="action" href="<?php echo url_for('user_account/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin edit">
      <h1>Edit Customer Account</h1>

      <form action="<?php echo url_for('user_account/edit.php?email=' . h(u($email))); ?>" method="post">

        <dl>
          <dt>Email:</dt>
          <dd><input type="text" name="email" value="<?php echo $account['email']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Username:</dt>
          <dd><input type="text" name="username" placeholder="new username" value="<?php echo $account['username'] ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Password:</dt>
          <dd>
            <input type="password" name="password" value="<?php echo $account['password']; ?>" id="mypassword"/>
            <input type="checkbox" onclick="show_password()">Show Password
            <script src="../js/script.js"></script>
          </dd>
        </dl>

        <!-- <p>
                Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
              </p> -->
        <br />

        <div id="operations">
          <input type="submit" value="Save" />
          <input style="margin-left:50px;" type="submit" name="cancel" value="Cancel" />
        </div>
      </form>

    </div>

  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
<?php

require_once('../../private/initialize.php');

admin_require_login();

// if cancel button was clicked
if (isset($_POST["cancel"])) {
  header("Location: index.php");
} else {

  if (is_post_request()) { //if post request process the form
    $account = [];
    $account['email'] = $_POST['email'];
    $account['username'] = $_POST['username'];
    $account['password'] = $_POST['password'];

    $result = insert_user($account);
    if ($result === true) {
      redirect_to(url_for('user_account/index.php'));
    } else {
      $errors = $result;
    }
  } else {
    // display the blank form
    $account = [];
    $account["email"] = '';
    $account["username"] = '';
    $account['password'] = '';
  }
}
?>

<?php $page_title = 'Register Customer Account'; ?>
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

    <div class="admin new">
      <h1>Register Customer Account</h1>

      <form action="<?php echo url_for('user_account/new.php'); ?>" method="post">

        <dl>
          <dt>Email:</dt>
          <dd><input type="text" name="email" placeholder="email" /></dd>
        </dl>

        <dl>
          <dt>Username:</dt>
          <dd><input type="password" name="username" placeholder="username" /></dd>
        </dl>

        <dl>
          <dt>Password:</dt>
          <dd>
            <input type="password" name="password" placeholder="password" id="mypassword" />
            <input type="checkbox" onclick="show_password()">Show Password
            <script src="../js/script.js"></script>
          </dd>
        </dl>
        <br />

        <div id="operations">
          <input type="submit" value="Register Customer Account" />
          <input style="margin-left:50px;" type="submit" name="cancel" value="Cancel" />
        </div>
      </form>
    </div>
  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
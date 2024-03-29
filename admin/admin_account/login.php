<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if (is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if (empty($errors)) {
    // Using one variable ensures that msg is the same
    $login_failure_msg = "Log in was unsuccessful. Wrong username or password";

    $admin = find_admin_by_username($username);
    if ($admin) {

      if (password_verify_own($password, $admin['password'])) {
        // echo password_verify_own($password, $admin['password']);
        // password matches
        log_in_admin($admin);
        redirect_to(url_for('index.php'));
      } else {
        // username found, but password does not match
        $errors[] = $login_failure_msg;
      }
    } else {
      // no username found
      $errors[] = $login_failure_msg;
    }
  }
}

?>

<?php $page_title = 'Admin'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
  <header>
    <h1>Login</h1>
  </header>

  <div id="content">
    <h1>Log in</h1>

    <?php echo display_errors($errors); ?>

    <form action="login.php" method="post">

      Username:<br />
      <input type="text" name="username" required/><br />

      Password:<br />
      <input type="password" name="password" id="mypassword" required/>
      <input type="checkbox" onclick="show_password()">Show Password
      <script src="../js/script.js"></script>
      <br><br>
      <input type="submit" name="submit" value="Submit" />
    </form>

  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
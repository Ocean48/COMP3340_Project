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
  // update user address
  if (is_post_request()) {

    $account_array = array();
    $account_array["id"] = $account['user_id'];
    $account_array["fname"] = $_POST['fname'];
    $account_array["lname"] = $_POST['lname'];
    $account_array["phone"] = $_POST['phone'];
    $account_array["address"] = $_POST['address'];
    $account_array["city"] = $_POST['city'];
    $account_array["province"] = $_POST['province'];
    $account_array["country"] = $_POST['country'];
    $account_array["postcodes"] = $_POST['postcodes'];
    
    $result = update_user_address_by_id($account_array);
    if ($result === true) {
      $_SESSION['message'] = 'User address updated.';
      redirect_to(url_for('user_account/index.php'));
    } else {
      $errors = $result;
    }
  } else {
    $account = find_user_by_email($email);
  }
}

?>

<?php $page_title = 'Customer Management - Edit Customer Address'; ?>
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
      <h1>Edit Customer Address</h1>

      <form action="<?php echo url_for('user_account/change_address.php?email=' . h(u($email))); ?>" method="post">

        <dl>
          <dt>First Name:</dt>
          <dd><input type="text" name="fname" value="<?php echo $account['first_name']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Last Name:</dt>
          <dd><input type="text" name="lname" value="<?php echo $account['last_name']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Phone:</dt>
          <dd><input type="text" name="phone" value="<?php echo $account['phone']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Address:</dt>
          <dd><input type="text" name="address" value="<?php echo $account['address']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>City:</dt>
          <dd><input type="text" name="city" value="<?php echo $account['city']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Province:</dt>
          <dd><input type="text" name="province" value="<?php echo $account['province']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Country:</dt>
          <dd><input type="text" name="country" value="<?php echo $account['country']; ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Postcodes:</dt>
          <dd><input type="text" name="postcodes" value="<?php echo $account['postcodes']; ?>" /><br /></dd>
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
<?php
require_once('../../private/initialize.php');
admin_require_login();

if (!isset($_GET['id'])) {
	redirect_to(url_for('admin_account/index.php'));
}
$id = $_GET['id'];

$account = find_admin_by_id($id);

// if cancel button was clicked
if (isset($_POST["cancel"])) {
	header("Location: index.php");
} else {
	if (is_post_request()) {
		$new_usrname = $_POST['username'];
		$account_id = $id;
		$account_username = $_POST["username"];
		$account_password = $_POST['password'];

		$result = update_admin($account_id, $new_usrname, $account_password);
		if ($result === true) {
			$_SESSION['message'] = 'User account updated.';
			redirect_to(url_for('admin_account/index.php'));
		} else {
			$errors = $result;
		}
	} else {
		$account = find_admin_by_id($id);
	}
}

?>

<?php $page_title = 'Edit Admin'; ?>
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

		<a class="action" href="<?php echo url_for('admin_account/index.php'); ?>">&laquo; Back to List</a>

		<div class="admin edit">
			<h1>Edit Admin</h1>
			<p style="color:red;">If field is left empty data will NOT be changed!</p>

			<!-- <?php // echo display_errors($errors); 
					?> -->

			<!-- new info field -->
			<form action="<?php echo url_for('admin_account/edit.php?id=' . h(u($id))); ?>" method="post">
				<dl>
					<dt>Username:</dt>
					<dd><input type="text" name="username" value="<?php echo $account['username']; ?>" /><br /></dd>
				</dl>

				<dl>
					<dt>Password:</dt>
					<dd>
						<input type="password" name="password" id="mypassword" value="<?php echo $account['password']; ?>" />
						<input type="checkbox" onclick="show_password()">Show Password
						<script src="../js/script.js"></script>
					</dd>

				</dl>
				<br />

				<div id="operations">
					<input type="submit" value="Edit Customer Account" />
					<input style="margin-left:50px;" type="submit" name="cancel" value="Cancel" />
				</div>
			</form>

		</div>

	</div>

	<?php include(SHARED_PATH . '/footer.php'); ?>
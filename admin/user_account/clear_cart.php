<?php
require_once('../../private/initialize.php');
admin_require_login();

$cart = get_cart_by_email($_GET['email']);

if (!isset($_GET['email'])) {
	redirect_to(url_for('user_account/index.php'));
}
$email = $_GET['email'];

if (is_post_request()) {
	$result = clear_user_cart($email);;
	$_SESSION['message'] = 'Customer Cart Cleared.';
	redirect_to(url_for('user_account/user_cart.php?email='. h(u($email))));
} else {
	$account = find_user_by_email($email);
}

?>

<?php $page_title = 'Customer Management - Clear Shopping Cart'; ?>
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
			<h1>Clear Customer's Shopping Cart</h1>
			<p>Are you sure you want to delete this customer's shopping cart?</p>
			<table class="list">
				<?php
				foreach ($cart as $key => $value) {
					$product = find_product_by_id($value[1]);
					echo '
						<tr>
							<td><img width="100px" src="../product/images/' . $product['product_img'] . '" alt="Image of Product"></td>
							<td>' . $product['product_name'] . '</td>
							<td>Quantity: &nbsp;' . $value[2] . '</td>
						</tr>
					';
				}
				?>
			</table>

			<form style="float:left;" action="<?php echo url_for('user_account/clear_cart.php?email=' . h(u($account['email']))); ?>" method="post">
				<div id="operations">
					<input type="submit" name="commit" value="Clear Cart" />
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
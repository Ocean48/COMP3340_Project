<?php require_once('../private/initialize.php'); ?>

<?php

user_require_login();

// get user info and shopping cart
$account = find_user_by_email($_SESSION["user_email"]);
$cart = get_cart_by_email($_SESSION["user_email"]);

// Get page style from database
$layout = get_style_by_view(1);

$count = 0;
if (!empty($_SESSION["cart"])) {  // if cart is not empty count number of product inside
	foreach ($_SESSION["cart"] as $key => $value) {
		$count++;
	}
}

// if cancel button was clicked
if (isset($_POST["cancel"])) {
	header("Location: account.php");
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
			header("Location:account.php");
		} else {
			$errors = $result;
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="X">
	<link rel="stylesheet" href="../css/style.css">
	<title>Account</title>

	<!-- load style from database -->
	<style>
		body {
			background-color: <?php echo $layout["background_color"]; ?>;
			background-color: <?php echo $layout["background_color"]; ?>;
		}

		.topnav {
			background-color: <?php echo $layout["margin_color"]; ?>;
		}

		.topnav a {
			color: <?php echo $layout["margin_text_color"]; ?>;
		}

		.container_footer {
			background-color: <?php echo $layout["margin_color"]; ?>;
			color: <?php echo $layout["margin_text_color"]; ?>;
		}
	</style>
</head>

<body>

	<?php
	// count item is shopping cart
	$count = 0;
	foreach ($cart as $key => $value) {
		$count++;
	}
	?>

	<!-- Haader -->
	<header>
		<div class="topnav" id="myTopnav">
			<a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
			<a href="../index.php" class="htext htext2">Home</a>
			<a href="../products.php" class="htext">Shop</a>
			<a href="account.php" class="htext">Account</a>
			<a href="cart.php" class="htext"><?php if ($count != 0) {
													echo "Cart•";
												} else {
													echo "Cart";
												} ?></a>
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
			<a href="../contact.php" class="htext">Contact</a>
			<a href="../shipping-policy.php" class="htext_bottom">Shipping Policy</a>
			<a href="../privacy-policy.php" class="htext_bottom">Privacy Policy</a>
			<a href="../return-policy.php" class="htext_bottom">Return Policy</a>
		</div>
	</header>

	<!-- Show account info -->
	<div class="center_block40">
		<form action="" method="post">
			<div style="float: left;">
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
			</div>

			<div style="float: left; margin-left: 50px;">
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
			</div>

			<div style="clear:both; text-align: center;">
				<br>
				<input class="submit_save" type="submit" value="Save" />
				<input class="submit_save" style="margin-left:50px;" type="submit" name="cancel" value="Cancel" />
			</div>
		</form>

	</div>

	<footer>
		<div class="container_footer">
			<br>
			<a href="index.php"><img src="../images/logo.png" alt="logo" class="footer_logo"></a>
			<div class="center">
				<a href="contact.php" class="footer_text">Contact</a>
				<a href="shipping-policy.php" class="footer_text">Shipping Policy</a>
				<a href="privacy-policy.php" class="footer_text">Privacy Policy</a>
				<a href="return-policy.php" class="footer_text">Return Policy</a>
				<a href="terms-and-conditions.php" class="footer_text">Term and Conditions</a>
			</div>
			<p class="copyright">Copyright &copy;
				<script>
					document.write(new Date().getFullYear())
				</script> WEB | All Rights Reserved
			</p>
		</div>
	</footer>

	<script src="../js/script.js"></script>

</body>

</html>
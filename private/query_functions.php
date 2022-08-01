<?php


// Get all product from database
function find_all_product($options = [])
{
  global $db;

  $sql = "SELECT * FROM `products` ";
  // if($visible) {
  //   $sql .= "WHERE visible = true ";
  // }
  $sql .= "ORDER BY product_id ASC";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_product_by_id($id)
{
  global $db;

  //$visible = $options['visible'] ?? false;

  $sql = "SELECT * FROM `products` WHERE `product_id` = $id";
  // $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  // if($visible) {
  //   $sql .= "AND visible = true";
  // }
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $product = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $product; // returns an assoc. array
}

// function validate_product($product) {
//   $errors = [];

//   // menu_name
//   if(is_blank($product['product_name'])) {
//     $errors[] = "Name cannot be blank.";
//   } elseif(!has_length($product['product_name'], ['min' => 2, 'max' => 255])) {
//     $errors[] = "Name must be between 2 and 255 characters.";
//   }

//   // position
//   // Make sure we are working with an integer
//   $postion_int = (int) $product['position'];
//   if($postion_int <= 0) {
//     $errors[] = "Position must be greater than zero.";
//   }
//   if($postion_int > 999) {
//     $errors[] = "Position must be less than 999.";
//   }

//   // visible
//   // Make sure we are working with a string
//   $visible_str = (string) $product['visible'];
//   if(!has_inclusion_of($visible_str, ["0","1"])) {
//     $errors[] = "Visible must be true or false.";
//   }

//   return $errors;
// }

function insert_product($product_id, $product_name, $product_img, $product_price, $product_description, $product_quantity)
{
  global $db;

  // To check does product exist
  // $errors = validate_product($product);
  // if(!empty($errors)) {
  //   return $errors;
  // }
  $sql = "INSERT INTO `products`(`product_id`, `product_name`, `product_img`, `product_description`, `product_price` ,`product_quantity`) VALUES ('$product_id','$product_name','$product_img','$product_description','$product_price','$product_quantity')";
  // $sql = "INSERT INTO `cart` ";
  // $sql .= "(menu_name, position, visible) ";
  // $sql .= "VALUES (";
  // $sql .= "'" . db_escape($db, $product['menu_name']) . "',";
  // $sql .= "'" . db_escape($db, $product['position']) . "',";
  // $sql .= "'" . db_escape($db, $product['visible']) . "'";
  // $sql .= ")";
  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_product($product_id, $product_name, $product_img, $product_price, $product_description)
{
  global $db;

  // $errors = validate_product($product);
  // if(!empty($errors)) {
  //   return $errors;
  // }

  $sql = "UPDATE `products` SET `product_name`='$product_name',`product_price`='$product_price',`product_img`='$product_img',`product_description`='$product_description' WHERE `product_id` = $product_id;";
  // $sql = "UPDATE `cart` SET ";
  // $sql .= "menu_name='" . db_escape($db, $product['menu_name']) . "', ";
  // $sql .= "position='" . db_escape($db, $product['position']) . "', ";
  // $sql .= "visible='" . db_escape($db, $product['visible']) . "' ";
  // $sql .= "WHERE id='" . db_escape($db, $product['id']) . "' ";
  // $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_product($id)
{
  global $db;

  $sql = "DELETE FROM `products` WHERE `product_id` = " . $id . "";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function reset_product_id()
{
  global $db;
  $sql = "ALTER TABLE `products` AUTO_INCREMENT = 1;";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Pages

function find_all_pages()
{
  global $db;

  $sql = "SELECT * FROM pages ";
  $sql .= "ORDER BY product_id ASC, position ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_page_by_id($id, $options = [])
{
  global $db;

  $visible = $options['visible'] ?? false;

  $sql = "SELECT * FROM `pages` ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  if ($visible) {
    $sql .= "AND visible = true";
  }
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $page = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $page; // returns an assoc. array
}

// function validate_page($page) {
//   $errors = [];

//   // product_id
//   if(is_blank($page['product_id'])) {
//     $errors[] = "product cannot be blank.";
//   }

//   // menu_name
//   if(is_blank($page['product_name'])) {
//     $errors[] = "Name cannot be blank.";
//   } elseif(!has_length($page['product_name'], ['min' => 2, 'max' => 255])) {
//     $errors[] = "Name must be between 2 and 255 characters.";
//   }
//   $current_id = $page['id'] ?? '0';
//   if(!has_unique_page_menu_name($page['product_name'], $current_id)) {
//     $errors[] = "Menu name must be unique.";
//   }


//   // position
//   // Make sure we are working with an integer
//   $postion_int = (int) $page['position'];
//   if($postion_int <= 0) {
//     $errors[] = "Position must be greater than zero.";
//   }
//   if($postion_int > 999) {
//     $errors[] = "Position must be less than 999.";
//   }

//   // visible
//   // Make sure we are working with a string
//   $visible_str = (string) $page['visible'];
//   if(!has_inclusion_of($visible_str, ["0","1"])) {
//     $errors[] = "Visible must be true or false.";
//   }

//   // content
//   if(is_blank($page['content'])) {
//     $errors[] = "Content cannot be blank.";
//   }

//   return $errors;
// }

// function insert_page($page) {
//   global $db;

//   $errors = validate_page($page);
//   if(!empty($errors)) {
//     return $errors;
//   }

//   $sql = "INSERT INTO `pages` ";
//   $sql .= "(product_id, menu_name, position, visible, content) ";
//   $sql .= "VALUES (";
//   $sql .= "'" . db_escape($db, $page['product_id']) . "',";
//   $sql .= "'" . db_escape($db, $page['menu_name']) . "',";
//   $sql .= "'" . db_escape($db, $page['position']) . "',";
//   $sql .= "'" . db_escape($db, $page['visible']) . "',";
//   $sql .= "'" . db_escape($db, $page['content']) . "'";
//   $sql .= ")";
//   $result = mysqli_query($db, $sql);
//   // For INSERT statements, $result is true/false
//   if($result) {
//     return true;
//   } else {
//     // INSERT failed
//     echo mysqli_error($db);
//     db_disconnect($db);
//     exit;
//   }
// }

// function update_page($page) {
//   global $db;

//   $errors = validate_page($page);
//   if(!empty($errors)) {
//     return $errors;
//   }

//   $sql = "UPDATE pages SET ";
//   $sql .= "product_id='" . db_escape($db, $page['product_id']) . "', ";
//   $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
//   $sql .= "position='" . db_escape($db, $page['position']) . "', ";
//   $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
//   $sql .= "content='" . db_escape($db, $page['content']) . "' ";
//   $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
//   $sql .= "LIMIT 1";

//   $result = mysqli_query($db, $sql);
//   // For UPDATE statements, $result is true/false
//   if($result) {
//     return true;
//   } else {
//     // UPDATE failed
//     echo mysqli_error($db);
//     db_disconnect($db);
//     exit;
//   }

// }

// function delete_page($id) {
//   global $db;

//   $sql = "DELETE FROM `pages` ";
//   $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
//   $sql .= "LIMIT 1";
//   $result = mysqli_query($db, $sql);

//   // For DELETE statements, $result is true/false
//   if($result) {
//     return true;
//   } else {
//     // DELETE failed
//     echo mysqli_error($db);
//     db_disconnect($db);
//     exit;
//   }
// }

// function find_pages_by_product_id($product_id, $options=[]) {
//   global $db;

//   $visible = $options['visible'] ?? false;

//   $sql = "SELECT * FROM pages ";
//   $sql .= "WHERE product_id='" . db_escape($db, $product_id) . "' ";
//   if($visible) {
//     $sql .= "AND visible = true ";
//   }
//   $sql .= "ORDER BY position ASC";
//   $result = mysqli_query($db, $sql);
//   confirm_result_set($result);
//   return $result;
// }

// Admins
// Find all admins, ordered by id
function find_all_admins()
{
  global $db;

  $sql = "SELECT * FROM admins ";
  $sql .= "ORDER BY id ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

// Find all admins, ordered by email
function find_all_users()
{
  global $db;

  $sql = "SELECT * FROM `account` ";
  $sql .= "ORDER BY user_id ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

// Find an admin by id
function find_admin_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM `admins` ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $admin = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $admin; // returns an assoc. array
}


// function find_user_by_id($id) {
//   global $db;

//   $sql = "SELECT * FROM `users` ";
//   $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
//   $sql .= "LIMIT 1";
//   $result = mysqli_query($db, $sql);
//   confirm_result_set($result);
//   $admin = mysqli_fetch_assoc($result); // find first
//   mysqli_free_result($result);
//   return $admin; // returns an assoc. array
// }

// Find an admin by username, used in admin login
function find_admin_by_username($username)
{
  global $db;

  $sql = "SELECT * FROM `admins` ";
  $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $admin = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $admin; // returns an assoc. array
}

// Add a new admin
function insert_admin($admin)
{
  global $db;

  // $errors = validate_admin($admin);
  // if (!empty($errors)) {
  //   return $errors;
  // }

  $password = ($admin['password']);

  $sql = "INSERT INTO `admins` ";
  $sql .= "(username, password) ";
  $sql .= "VALUES (";
  // $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
  // $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
  // $sql .= "'" . db_escape($db, $admin['email']) . "',";
  $sql .= "'" . db_escape($db, $admin['username']) . "',";
  $sql .= "'" . db_escape($db, $password) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Update an admin's info. i.e admin username and password
function update_admin($account_id, $new_usrname, $account_password)
{
  global $db;

  // $errors = validate_admin($admin);
  // if (!empty($errors)) {
  //   return $errors;
  // }

  $sql = "UPDATE `admins` SET `username`='" . $new_usrname . "',`password`='" . $account_password . "' WHERE `id` = " . $account_id . ";";
  // $sql = "UPDATE admins SET ";
  // // $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
  // // $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
  // // $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
  // // $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "',";
  // $sql .= "password='" . db_escape($db, $password) . "', ";
  // $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
  // $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";

  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Delete an admin from database
function delete_admin($id)
{
  global $db;

  $sql = "DELETE FROM `admins` WHERE `id` = " . $id . "";
  // $sql = "DELETE FROM `admins` ";
  // $sql .= "WHERE id='" . db_escape($db, $admin[0]) . "' ";
  // $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Try to reset admin id
function reset_admin_id()
{
  global $db;
  $sql = "ALTER TABLE `admins` AUTO_INCREMENT = 1;";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// User
// Find an user by email
function find_user_by_email($email)
{
  global $db;

  $sql = "SELECT * FROM `account` ";
  $sql .= "WHERE email='" . db_escape($db, $email) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $account = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $account; // returns an assoc. array
}

// Add a new user
function insert_user($account)
{
  global $db;

  // $errors = validate_admin($admin);
  // if (!empty($errors)) {
  //   return $errors;
  // }

  $sql = "INSERT INTO `account` ";
  $sql .= "(email,username, password) ";
  $sql .= "VALUES (";
  // $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
  // $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
  // $sql .= "'" . db_escape($db, $admin['email']) . "',";
  $sql .= "'" . db_escape($db, $account['email']) . "',";
  $sql .= "'" . db_escape($db, $account['username']) . "',";
  $sql .= "'" . db_escape($db, $account['password']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Update an user's account info. i.e email, username, password
function update_user_by_id($account)
{
  global $db;

  // $errors = validate_admin($admin);
  // if (!empty($errors)) {
  //   return $errors;
  // }

  $sql = "UPDATE account SET ";
  // $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
  // $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
  // $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
  //$sql .= "WHERE id='" . db_escape($db, $account['id']) . "' ";
  $sql .= "email='" . db_escape($db, $account['email']) . "', ";
  $sql .= "username='" . db_escape($db, $account['username']) . "', ";
  $sql .= "password='" . db_escape($db, $account['password']) . "' ";
  $sql .= "WHERE user_id='" . db_escape($db, $account['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Update an user's address info.
function update_user_address_by_id($account)
{
  global $db;
  $sql = "UPDATE `account` SET `first_name`='".$account['fname']."',`last_name`='".$account['lname']."',`phone`='".$account['phone']."',`address`='".$account['address']."',`city`='".$account['city']."',`province`='".$account['province']."',`country`='".$account['country']."',`postcodes`='".$account['postcodes']."' WHERE `user_id` = ".$account['id']."";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Delete a user account, only in admin interface
function delete_user($email)
{
  global $db;

  $sql = "DELETE FROM `account` ";
  $sql .= "WHERE email='" . db_escape($db, $email) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Get page style by view mode. view mode 0 - for pre-view page.  view mode 1 - for real page 
function get_style_by_view($view)
{
  global $db;

  $sql = "SELECT * FROM `layout` WHERE `view` = $view";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $style = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $style; // returns an assoc. array
}

// Update page style
function update_style($bc, $mc, $mtc, $n)
{
  global $db;

  $sql = "UPDATE `layout` SET `background_color`='$bc',`margin_color`='$mc',`margin_text_color`='$mtc' WHERE `view` = $n";

  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Used to reduce product's inventory after customer made a purchase
function update_inventory($product_id, $n)
{
  global $db;

  $sql = "UPDATE `products` SET `product_quantity`=`product_quantity`-$n WHERE `product_id` = $product_id";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Get customer's shopping cart from database
function get_cart_by_email($email)
{
  global $db;

  $sql = "SELECT * FROM `cart` WHERE `email` = '$email'";
  $result = mysqli_query($db, $sql);
  // For UPDATE statements, $result is true/false
  confirm_result_set($result);
  $cart = mysqli_fetch_all($result);
  mysqli_free_result($result);
  return $cart; // returns an assoc. array
}

// Add shopping cart item from session to the database
function add_to_cart($email, $pid, $q)
{
  global $db;

  $sql = "INSERT INTO `cart`(`email`, `product_id`, `quantity`) VALUES ('$email','$pid','$q')";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// decrease the quantity of the item in user's shopping cart by 1
function decrease_cart_item_quantity($email, $pid, $time)
{
  global $db;

  $sql = "UPDATE `cart` SET `quantity`=`quantity`-1 WHERE `email`='$email' and `product_id`=$pid and `added_time` = '$time'";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// increase the quantity of the item in user's shopping cart by 1
function increase_cart_item_quantity($email, $pid, $time)
{
  global $db;

  $sql = "UPDATE `cart` SET `quantity`=`quantity`+1 WHERE `email`='$email' and `product_id`=$pid and `added_time` = '$time'";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// remove item from shopping cart when quantity is 0
function remove_item_zero_quantity($email, $pid, $time) {
  global $db;

  $sql = "DELETE FROM `cart` WHERE `email` = '$email' and `product_id` = $pid and `quantity` = 0 and `added_time` = '$time'";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// crear user's shopping cart
function clear_user_cart($email) {
  
  global $db;

  $sql = "DELETE FROM `cart` WHERE `email` = '$email'";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
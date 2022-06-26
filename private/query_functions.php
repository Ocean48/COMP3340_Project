<?php

  // products

  function find_all_products($options=[]) {
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

  function find_product_by_id($id, $options=[]) {
    global $db;

    //$visible = $options['visible'] ?? false;

    $sql = "SELECT * FROM `products` ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
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

  function validate_product($product) {
    $errors = [];

    // menu_name
    if(is_blank($product['product_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($product['product_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $product['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $product['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }

  function insert_product($product) {
    global $db;

    $errors = validate_product($product);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO `products` ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $product['menu_name']) . "',";
    $sql .= "'" . db_escape($db, $product['position']) . "',";
    $sql .= "'" . db_escape($db, $product['visible']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_product($product) {
    global $db;

    $errors = validate_product($product);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE `products` SET ";
    $sql .= "menu_name='" . db_escape($db, $product['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $product['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $product['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $product['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_product($id) {
    global $db;

    $sql = "DELETE FROM `products` ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  // Pages

  function find_all_pages() {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY product_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_page_by_id($id, $options=[]) {
    global $db;

    $visible = $options['visible'] ?? false;

    $sql = "SELECT * FROM `pages` ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    if($visible) {
      $sql .= "AND visible = true";
    }
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // returns an assoc. array
  }

  function validate_page($page) {
    $errors = [];

    // product_id
    if(is_blank($page['product_id'])) {
      $errors[] = "product cannot be blank.";
    }

    // menu_name
    if(is_blank($page['product_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($page['product_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }
    $current_id = $page['id'] ?? '0';
    if(!has_unique_page_menu_name($page['product_name'], $current_id)) {
      $errors[] = "Menu name must be unique.";
    }


    // position
    // Make sure we are working with an integer
    $postion_int = (int) $page['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $page['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    // content
    if(is_blank($page['content'])) {
      $errors[] = "Content cannot be blank.";
    }

    return $errors;
  }

  function insert_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO `pages` ";
    $sql .= "(product_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $page['product_id']) . "',";
    $sql .= "'" . db_escape($db, $page['menu_name']) . "',";
    $sql .= "'" . db_escape($db, $page['position']) . "',";
    $sql .= "'" . db_escape($db, $page['visible']) . "',";
    $sql .= "'" . db_escape($db, $page['content']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE pages SET ";
    $sql .= "product_id='" . db_escape($db, $page['product_id']) . "', ";
    $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $page['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
    $sql .= "content='" . db_escape($db, $page['content']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_page($id) {
    global $db;

    $sql = "DELETE FROM `pages` ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function find_pages_by_product_id($product_id, $options=[]) {
    global $db;

    $visible = $options['visible'] ?? false;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE product_id='" . db_escape($db, $product_id) . "' ";
    if($visible) {
      $sql .= "AND visible = true ";
    }
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // Admins

  // Find all admins, ordered last_name, first_name
  function find_all_admins() {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY username ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  function find_all_users() {
    global $db;

    $sql = "SELECT * FROM `users` ";
    $sql .= "ORDER BY username ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_admin_by_id($id) {
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

  function find_user_by_id($id) {
    global $db;

    $sql = "SELECT * FROM `users` ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function find_admin_by_username($username) {
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

  function find_user_by_username($username) {
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
  // function validate_admin($admin) {

  //   $errors = [];

  //   if(is_blank($admin['username'])) {
  //     $errors[] = "Username cannot be blank.";
  //   } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
  //     $errors[] = "Username must be between 8 and 255 characters.";
  //   } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
  //     $errors[] = "Username not allowed. Try another.";
  //   }

  //   if(is_blank($admin['password'])) {
  //     $errors[] = "Password cannot be blank.";
  //   }
  //   // }  elseif (!preg_match('/[a-z]/', $admin['password'])) {
  //   //   $errors[] = "Password must contain at least 1 lowercase letter";
  //   // } elseif (!preg_match('/[0-9]/', $admin['password'])) {
  //   //   $errors[] = "Password must contain at least 1 number";
  //   // } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
  //   //   $errors[] = "Password must contain at least 1 symbol";
  //   // }

  //   if(is_blank($admin['confirm_password'])) {
  //     $errors[] = "Confirm password cannot be blank.";
  //   } elseif ($admin['password'] !== $admin['confirm_password']) {
  //     $errors[] = "Password and confirm password must match.";
  //   }
    
  //   return $errors;
  // }

  function insert_admin($admin) {
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
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  function insert_user($admin) {
    global $db;

    // $errors = validate_admin($admin);
    // if (!empty($errors)) {
    //   return $errors;
    // }

    $password = ($admin['password']);

    $sql = "INSERT INTO `users` ";
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
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


  function update_admin($admin) {
    global $db;

    // $errors = validate_admin($admin);
    // if (!empty($errors)) {
    //   return $errors;
    // }

    $password = $admin['password'];

    $sql = "UPDATE admins SET ";
    // $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    // $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    // $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    // $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "',";
    $sql .= "password='" . db_escape($db, $password) . "', ";
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
  
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  function update_user($admin) {
    global $db;

    // $errors = validate_admin($admin);
    // if (!empty($errors)) {
    //   return $errors;
    // }

    $password = $admin['password'];

    $sql = "UPDATE `users` SET ";
    // $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    // $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    // $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    $sql .= "password='" . db_escape($db, $password) . "', ";
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_admin($admin) {
    global $db;

    $sql = "DELETE FROM `admins` ";
    $sql .= "WHERE id='" . db_escape($db, $admin[0]) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_user($admin) {
    global $db;

    $sql = "DELETE FROM `users` ";
    $sql .= "WHERE id='" . db_escape($db, $admin[0]) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


?>

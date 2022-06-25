<?php

  // Performs all actions necessary to log in an admin
  function log_in_admin($admin) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    return true;
  }
  function log_in_user($admin) {
    // Renerating the ID protects the admin from session fixation.
      session_regenerate_id();
      $_SESSION['user_id'] = $admin['id'];
      $_SESSION['last_login'] = time();
      $_SESSION['username'] = $admin['username'];
      return true;
    }

  // is_logged_in() contains all the logic for determining if a
  // request should be considered a "logged in" request or not.
  // It is the core of require_login() but it can also be called
  // on its own in other contexts (e.g. display one link if an admin
  // is logged in and display another link if they are not)
  function is_logged_in() {
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['admin_id']);
  }
  function is_logged_in_user() {
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['user_id']);
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('/account/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }
  function require_login_user() {
    if(!is_logged_in()) {
      redirect_to(url_for('/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

  function password_verify_own($password1, $password2) {
      if($password1 === $password2){
        return true;
      }else {
        return false;
      }

  }

?>

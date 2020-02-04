<?php
session_start();

// Session flash helper give message (register_success, you are registered', display in view) 

function flash($user_name = '', $message = '', $class = 'alert alert-success')
{
  if (!empty($user_name)) {
    if (!empty($message) && empty($_SESSION[$user_name])) {
      if (!empty($_SESSION[$user_name])) {
        unset($_SESSION[$user_name]);
      }
      if (!empty($_SESSION[$user_name . '_class'])) {
        unset($_SESSION[$user_name . '_class']);
      }
      $_SESSION[$user_name] = $message;
      $_SESSION[$user_name . '_class'] = $class;
    } elseif (empty($message) && !empty($_SESSION[$user_name])) {
      $class = !empty($_SESSION[$user_name . '_class']) ? $_SESSION[$user_name . '_class'] : '';
      echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$user_name] . '</div>';
      unset($_SESSION[$user_name]);
      unset($_SESSION[$user_name . '_class']);
    }
  }
}

function isLoggedIn()
{
  if (isset($_SESSION['user_id'])) {
    return true;
  } else {
    return false;
  }
}

<?php
// Redirect To Page
function redirect($page = FALSE, $message = NULL, $message_type = NULL) {
  if(is_string($page)) {
    $location = $page;
  }else {
    $location = $_SERVER['SCRIPT_NAME'];
  }

  if($message != NULL) {
    $_SESSION['message'] = $message;
  }

  if($message_type != NULL) {
    $_SESSION['message_type'] = $message_type;
  }

  header('Location: ' . $location);
  exit;
}

// Display Message
function displayMessage() {
  if(!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    if(!empty($_SESSION['message_type'])) {
      $message_type = $_SESSION['message_type'];
      // create output
      if($message_type == 'error') {
        echo '<div class="alert alert-danger">' . $message . '</div>';
      }else {
        echo '<div class="alert alert-success">' . $message . '</div>';
      }
    }
    // Unset Message
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
  }else {
    echo '';
  }
}

// Check if user is logged in
function isLoggedIn() {
  if(isset($_SESSION['is_logged_in'])) {
    return true;
  }else {
    return false;
  }
}

// Get user data
function getUserData() {
  $userArray = array();
  $userArray['user_id'] = $_SESSION['user_id'];
  $userArray['username'] = $_SESSION['username'];
  $userArray['name'] = $_SESSION['name'];
  return $userArray;
}
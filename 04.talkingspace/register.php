<?php
require('core/init.php');

// Create topic object
$topic = new Topic;
// Create user object
$user = new User;
// Create validator object
$validate = new Validator;

// Create data array
if(isset($_POST['register'])) {
  $data = array();
  $data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['username'] = $_POST['username'];
  $data['password'] = md5($_POST['password']);
  $data['password2'] = md5($_POST['password2']);
  $data['about'] = $_POST['about'];
  $data['last_activity'] = date('Y-m-d H:i:s');

  // Required fields array
  $fields_array = array('name', 'email', 'username', 'password', 'password2');

  if($validate->isRequired($fields_array)) {
    if($validate->isValidEmail($data['email'])) {
      if($validate->passwordsmatch($data['password'], $data['password2'])) {
        // Upload Avatar Image
        if($user->uploadAvatar()) {
          $data['avatar'] = $_FILES['avatar']['name'];
        }else {
          $data['avatar'] = 'noimage.png';
        }
        // Register User
        if($user->register($data)) {
          redirect('index.php', 'You ara regisered and can now log in', 'success');
        }else {
          redirect('index.php', 'Something went wrong with registeration', 'error');
        }
      }else {
        redirect('register.php', 'Your passwords did not match', 'error');
      }
    }else {
      redirect('register.php', 'Please use a valid email address', 'error');
    }
  }else {
    redirect('register.php', 'Please fill in all required fields', 'error');
  }
}


// Get template and assign variables
$template = new Template('templates/register.php');
// Assign vars

// Display template
echo $template;
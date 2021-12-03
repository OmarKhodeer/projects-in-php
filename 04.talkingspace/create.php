<?php
require('core/init.php');

// Create topic object
$topic = new Topic;
// Create validator object
$validator = new Validator;

if(isset($_POST['do_create'])) {
  $data = array();
  $data['title'] = $_POST['title'];
  $data['category_id'] = $_POST['category'];
  $data['body'] = $_POST['body'];
  $data['user_id'] = getUserData()['user_id'];
  $data['last_activity'] = date('Y-m-d H:i:s');
  // Required fields
  $field_array = array('title', 'body', 'category');

  if($validator->isRequired($field_array)) {
    if($topic->create($data)) {
      redirect('index.php', 'Your Topic Has Been Posted', 'success');
    }else {
      redirect('topic.php?id=' . $topic_id, 'Something went wrong with your post', 'error');
    }
  }else {
    redirect('create.php', 'Please fill in all required fields', 'error');
  }
}

// Get template and assign variables
$template = new Template('templates/create.php');
// Assign vars

// Display template
echo $template;
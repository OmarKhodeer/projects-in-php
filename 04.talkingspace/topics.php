<?php
require('core/init.php');

// Create topic object
$topic = new Topic;
// Create user object
$user = new User;

// Get category_id from URL
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

// Get template and assign variables
$template = new Template('templates/topics.php');

// Assign vars
if(isset($category_id)) {
  $template->topics = $topic->getTopicsByCategory($category_id);
  $template->title = 'Posts in "' . $topic->getCategory($category_id)['name'] . '"';
}

if(!isset($category_id)) {
  $template->topics = $topic->getAllTopics();
}

$template->totalUsers = $user->getTotalUsers();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

// Display template
echo $template;
<?php
require('core/init.php');

// Create topic object
$topic = new Topic;
// Create user object
$user = new User;

// Get template and assign variables
$template = new Template('templates/frontpage.php');

// Assign vars
$template->topics = $topic->getAllTopics();
$template->totalUsers = $user->getTotalUsers();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

// Display template
echo $template;
<?php
// Get # of replies per post
function replyCount($topic_id) {
  $db = new Database;
  $db->query("SELECT * FROM replies WHERE topic_id = :topic_id");
  $db->bind(':topic_id', $topic_id);
  $rows = $db->resultset();
  return $db->rowCount();
}

function getCatagories() {
  $db = new Database;
  $db->query("SELECT * FROM categories");
  $rows = $db->resultset();
  return $rows;
}
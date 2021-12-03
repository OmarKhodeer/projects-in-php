<?php
// URL Format
function urlFormat($str) {
  // strip out all whitespaces
  $str = preg_replace('/\s*/', '', $str);
  // convert the string to all lowercase
  $str = strtolower($str);
  // URL Encode
  $str = urlencode($str);
  return $str;
}

// Format Date
function formatDate($date) {
  $date = date("F j, Y, g:ia", strtotime($date));
  return $date;
}

function is_active($category_id) {
  if(isset($_GET['category'])) {
    if($_GET['category'] == $category_id) {
      return 'active';
    }else {
      return '';
    }
  }else {
    if($category_id == null) {
      return 'active';
    }
  }
}
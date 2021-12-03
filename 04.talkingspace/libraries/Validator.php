<?php
class Validator {
  // Check required fields
  public function isRequired($fields_array) {
    foreach($fields_array as $field) {
      if($_POST[$field] == '') {
        return false;
      }
    }
    return true;
  }

  // Validate Email Field
  public function isValidEmail($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    }else {
      return false;
    }
  }

  // Check password match
  public function passwordsmatch($pw1, $pw2) {
    if($pw1 === $pw2) {
      return true;
    }else {
      return false;
    }
  }
}
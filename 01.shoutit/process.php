<?php
include "database.php";

// Check if the form is submitted
if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $time = date('h:i:s a', time());
    
    // Validate inputs
    if(!isset($user) || $user == '' || !isset($message) || $message == '') {
        $errorMsg = "Please fill in your name and a message!";
        header("Location: index.php?error=" . urlencode($errorMsg));
    } else {
        $query = "INSERT INTO shouts (user, message, time)
                VALUES ('$user', '$message', '$time')";
        if(!mysqli_query($con, $query)) {
            die("Error: " . mysqli_error($con));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
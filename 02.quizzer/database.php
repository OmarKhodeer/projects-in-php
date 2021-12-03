<?php
$con = new mysqli('localhost', 'root', '', 'quizzer');

// Error Handler
if($con->connect_error) {
    printf("Connect failed: %s\n", $con->connect_error);
    exit();
}
<?php
$con = mysqli_connect("localhost", "root", "", "shoutit");

if (mysqli_connect_errno()) {
    die("failed to connect to Mysql: " . $mysqli_connect_error());
}
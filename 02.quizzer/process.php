<?php
session_start();
include "database.php";

if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if($_POST) {
    $questionNumber = $_POST['questionNumber'];
    $selectedChoice = $_POST['choice'];
    $nextQuestion = $questionNumber + 1;
    
    // Get Correct Choice
    $query = "SELECT * FROM choices WHERE question_number = $questionNumber AND is_correct = 1";
    $result = $con->query($query) or die($con->error.__LINE__);
    $row = $result->fetch_assoc();

    $results = $con->query("SELECT * FROM questions") or die($con->error.__LINE__);
    $totalQuestions = $results->num_rows;

    // Set the correct choice
    $correct_choice = $row['id'];
    if($correct_choice == $selectedChoice) {
        $_SESSION['score']++;
    }

    if($questionNumber == $totalQuestions) {
        header("Location: final.php");
        exit();
    } else {
        header("Location: questions.php?n=" . $nextQuestion);
    }
}

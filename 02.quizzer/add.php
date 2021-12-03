<?php 
include "database.php";

$results = $con->query("SELECT * FROM questions") or die($con->error.__LINE__);
$totalQuestions = $results->num_rows;

if(isset($_POST['submit'])) {
    $questionNumber = $_POST['question_number'];
    $questionText = $_POST['question_text'];
    $correctChoice = $_POST['correct_choice'];
    $choices = array();
    $choices[1] = $_POST['choice_1'];
    $choices[2] = $_POST['choice_2'];
    $choices[3] = $_POST['choice_3'];
    $choices[4] = $_POST['choice_4'];
    $choices[5] = $_POST['choice_5'];

    // Questions query
    $query = "INSERT INTO questions(question_number, text) VALUES('$questionNumber', '$questionText')";
    $insertQuestion = $con->query($query) or die($con->error.__LINE__);

    // Validate the insert
    if($insertQuestion) {
        foreach($choices as $choice => $value) {
            if($value != '') {
                if($correctChoice == $choice) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }

                $query = "INSERT INTO choices(question_number, is_correct, text) VALUES('$questionNumber', '$is_correct', '$value')";
                $insertChoices = $con->query($query) or die($con->error.__LINE__);
                if($insertChoices) {
                    continue;
                } else {
                    die("Error: (" . $con->errno . ") " . $con->error);
                }
            }
        }
        $msg = "Question has been added";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>PHP Quizzer</title>
      <link rel="stylesheet" href="css/style.css" />
   </head>
   <body>
      <header>
         <div class="container">
            <h1>PHP Quizzer</h1>
         </div>
      </header>

      <main>
         <div class="container">
            <h2>Add A Question</h2>
            <?php if(isset($msg)) {
                echo "<p>$msg</p>";
            }?>
            <form action="add.php" method="POST">
                <p>
                    <label>Question Number: </label>
                    <input type="number" name="question_number" value="<?=$totalQuestions+1?>">
                </p>
                <p>
                    <label>Question Text: </label>
                    <input type="text" name="question_text">
                </p>
                <p>
                    <label>Choice #1: </label>
                    <input type="text" name="choice_1">
                </p>
                <p>
                    <label>Choice #2: </label>
                    <input type="text" name="choice_2">
                </p>
                <p>
                    <label>Choice #3: </label>
                    <input type="text" name="choice_3">
                </p>
                <p>
                    <label>Choice #4: </label>
                    <input type="text" name="choice_4">
                </p>
                <p>
                    <label>Choice #5: </label>
                    <input type="text" name="choice_5">
                </p>
                <p>
                    <label>Correct Choice Number: </label>
                    <input type="text" name="correct_choice">
                </p>
                <p>
                    <input type="submit" name="submit" value="submit">
                </p>
            </form>
         </div>
      </main>

      <footer>
         <div class="container">
            Copyrights &copy; 2020, PHP Quizzer
         </div>
      </footer>
   </body>
</html>

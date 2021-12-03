<?php
session_start();
include "database.php";
$questionNumber = (int) $_GET['n'];
$query = "SELECT * FROM questions WHERE question_number = $questionNumber";
$result = $con->query($query) or die($con->error.__LINE__);
$question = $result->fetch_assoc();

$query = "SELECT * FROM choices WHERE question_number = $questionNumber";
$choices = $con->query($query) or die($con->error.__LINE__);

$results = $con->query("SELECT * FROM questions") or die($con->error.__LINE__);
$count = $results->num_rows;
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
            <div class="current">Question <?=$questionNumber?> of <?=$count?></div>
            <p class="question"><?=$question['text']?></p>
            <form action="process.php" method="POST">
               <ul class="choices">
                  <?php while($row = $choices->fetch_assoc()) : ?>
                     <li>
                        <input name="choice" type="radio" value="<?=$row['id']?>" /><?=$row['text']?>
                     </li>
                  <?php endwhile; ?>
               </ul>
               <input type="hidden" name="questionNumber" value="<?=$questionNumber?>" />
               <input type="submit" value="Submit" />
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

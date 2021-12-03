<?php
include "database.php";
$result = $con->query("SELECT * FROM questions") or die($con->error.__LINE__);
$count = $result->num_rows;

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
            <h2>Test Your Knowledge In PHP</h2>
            <p>This is a multiple choice quiz to text your knowledge of PHP</p>
            <ul>
               <li><strong>Number Of Questions: </strong><?=$count?></li>
               <li><strong>Type: </strong>Multiple choice</li>
               <li><strong>Estimated Time: </strong><?=$count * .5?> min</li>
            </ul>
            <a href="questions.php?n=1" class="start">Start Quiz</a>
         </div>
      </main>

      <footer>
         <div class="container">
            Copyrights &copy; 2020, PHP Quizzer
         </div>
      </footer>
   </body>
</html>

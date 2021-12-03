<?php
session_start();
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
            <h2>You're Done!</h2>
            <p>Congrats! You have completed the test</p>
            <p>Final Score: <?=isset($_SESSION['score']) ? $_SESSION['score'] : 0?></p>
            <a href="questions.php?n=1" class="start">Take Again</a>
         </div>
      </main>

      <footer>
         <div class="container">
            Copyrights &copy; 2020, PHP Quizzer
         </div>
      </footer>
   </body>
</html>

<?php session_destroy();?>
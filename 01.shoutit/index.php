<?php
include "database.php";
$shouts = mysqli_query($con, "SELECT * FROM shouts ORDER BY id DESC");
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>ShoutIt</title>
      <link rel="stylesheet" href="css/style.css" />
   </head>
   <body>
      <div class="container">
         <header>
            <h1>SHOUT IT! ShoutBox</h1>
         </header>
         <div id="shouts">
            <ul>
               <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
                  <li class="shout"><span><?=$row['time']?> - </span><strong><?=$row['user']?>:</strong> <?=$row['message']?></li>
               <?php endwhile ?>
            </ul>
         </div>
         <div id="input">
            <?php if(isset($_GET['error'])) :?>
               <div class="error"><?=$_GET['error']?></div>
            <?php endif ?>
            <form method="post" action="process.php">
               <input type="text" name="user" placeholder="Enter Your Name" />
               <input
                  type="text"
                  name="message"
                  placeholder="Enter A Message"
               />
               <br />
               <input
                  class="shout-btn"
                  type="submit"
                  name="submit"
                  value="Shout It Out"
               />
            </form>
         </div>
      </div>
   </body>
</html>

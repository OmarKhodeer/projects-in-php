<?php 
include "includes/header.php";

// Create Database Object
$db = new Database();
// Create query
$query = "SELECT * FROM posts ORDER BY date DESC";
// Run query
$posts = $db->select($query);

// Create query
$query = "SELECT * FROM categories";
// Run query
$categories = $db->select($query);
?>
<?php if($posts) :?>
  <?php while($row = $posts->fetch_assoc()) :?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?=$row['post_title']?></h2>
            <p class="blog-post-meta"><?=formatDate($row['date'])?> by <a href="#"><?=$row['author']?></a></p>

            <p><?=shorttenText($row['body'])?></p>
            <a class="read-more" href="post.php?id=<?=urldecode($row['id'])?>">Read More</a>
          </div>
          <!-- /.blog-post -->
  <?php endwhile;?>
<?php else :?>
          <p>There are no posts yet</p>
<?php endif;?>
<?php include "includes/footer.php";?>
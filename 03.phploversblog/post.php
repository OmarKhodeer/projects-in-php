<?php 
include "includes/header.php";

$id = $_GET['id'];

// Create Database Object
$db = new Database();
// Create query
$query = "SELECT * FROM posts WHERE id=" . $id;
// Run query
$post = $db->select($query)->fetch_assoc();

// Create query
$query = "SELECT * FROM categories";
// Run query
$categories = $db->select($query);
?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?=$post['post_title']?></h2>
            <p class="blog-post-meta"><?=formatDate($post['date'])?> by <a href="#"><?=$post['author']?></a></p>
            <p><?=$post['body']?></p>
          </div>
          <!-- /.blog-post -->
<?php include "includes/footer.php";?>
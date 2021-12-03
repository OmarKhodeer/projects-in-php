<?php include "includes/header.php"; ?>
<?php
$db = new Database();
if(isset($_POST['submit'])) {
  $title = mysqli_real_escape_string($db->link, $_POST['title']);
  $body = mysqli_real_escape_string($db->link, $_POST['body']);
  $category = mysqli_real_escape_string($db->link, $_POST['category']);
  $author = mysqli_real_escape_string($db->link, $_POST['author']);
  $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
  // Simple Validation
  if($title == "" || $body == "" || $category == "" || $author == "") {
    $error = "Please fill out all required fileds";
  } else {
    $query = "INSERT INTO posts(post_title, body, category, author, tags)
              VALUES('$title', '$body', '$category', '$author', '$tags')";
    $insert_row = $db->insert_row($query);
  }
}
?>
<?php if(isset($error)) : ?>
  <div class="alert alert-danger"><?=$error?></div>
<?php endif; ?>
<?php 
$query = "SELECT * FROM categories";
$catagories = $db->select($query);
?>
<form action="add_post.php" method="POST">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea class="form-control" name="body" placeholder="Enter Post Body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
      <?php while($row = $catagories->fetch_assoc()) : ?>
        <option value="<?=$row['id']?>"><?=$row['name']?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" name="author" placeholder="Enter Author Name">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input type="text" class="form-control" name="tags" placeholder="Enter Tags">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    <a href="index.php" class="btn btn-warning">Cancel</a>
  </div>
  </br>
</form>
<?php include "includes/footer.php"; ?>
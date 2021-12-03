<?php include "includes/header.php"; ?>
<?php 
$post_id = $_GET['id'];
// Create Database Object
$db = new Database();
// Create query
$query = "SELECT posts.* FROM posts WHERE posts.id=" . $post_id;
// Run query
$post = $db->select($query)->fetch_assoc();

$query = "SELECT * FROM categories";
$catagories = $db->select($query);

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
    $query = "UPDATE posts SET post_title = '$title', body = '$body', category = '$category', author = '$author', tags = '$tags' WHERE id=" . $post_id;
    $insert_row = $db->update($query);
  }
}

if(isset($_POST['delete'])) {
  $query = "DELETE FROM posts WHERE id=" . $post_id;
  $db->delete($query);
}

?>
<?php if(isset($error)) : ?>
  <div class="alert alert-danger"><?=$error?></div>
<?php endif; ?>
<form action="edit_post.php?id=<?=$post_id?>" method="POST">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?=$post['post_title']?>">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea class="form-control" name="body" placeholder="Enter Post Body"><?=$post['body']?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
      <?php while($row = $catagories->fetch_assoc()) : ?>
        <?php 
        $selected = "";
        if($post['category'] == $row['id']) {
          $selected = "selected";
        }
        ?>
        <option <?=$selected?> value="<?=$row['id']?>"><?=$row['name']?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" name="author" placeholder="Enter Author Name" value="<?=$post['author']?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input type="text" class="form-control" name="tags" placeholder="Enter Tags" value="<?=$post['tags']?>">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    <a href="index.php" class="btn btn-warning">Cancel</a>
    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
  </div>
  </br>
</form>
<?php include "includes/footer.php"; ?>
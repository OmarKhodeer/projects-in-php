<?php include "includes/header.php"; ?>
<?php
$category_id = $_GET['id'];
// Create Database Object
$db = new Database();
// Create query
$query = "SELECT name FROM categories WHERE id=" . $category_id;
// Run query and fetch
$category = $db->select($query)->fetch_assoc();

if(isset($_POST['submit'])) {
  $cat_name = mysqli_real_escape_string($db->link, $_POST['category']);
  if($cat_name == '') {
    $error = "Please fill out Category Name";
  } else {
    $query = "UPDATE categories SET name = '$cat_name' WHERE id=" . $category_id;
    $db->update($query);
  }
}

if(isset($_POST['delete'])) {
  $query = "DELETE FROM categories WHERE id=" . $category_id;
  $db->delete($query);
}

?>
<?php if(isset($error)) : ?>
  <div class="alert alert-danger"><?=$error?></div>
<?php endif; ?>
<form action="edit_category.php?id=<?=$category_id?>" method="POST">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name="category" placeholder="Enter Category Name" value="<?=$category['name']?>">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    <a href="index.php" class="btn btn-warning">Cancel</a>
    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
  </div>
  </br>
</form>
<?php include "includes/footer.php"; ?>
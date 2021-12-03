<?php include "includes/header.php"; ?>
<?php
$db = new Database();
if(isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($db->link, $_POST['category']);
  // Simple Validation
  if($name == "") {
    $error = "Please fill out all required fileds";
  } else {
    $query = "INSERT INTO categories(name) VALUES('$name')";
    $insert_row = $db->insert_row($query);
  }
}
?>
<?php if(isset($error)) : ?>
  <div class="alert alert-danger"><?=$error?></div>
<?php endif; ?>
<form action="add_category.php" method="POST">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name="category" placeholder="Enter Category Name">
  </div>
  <div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    <a href="index.php" class="btn btn-warning">Cancel</a>
  </div>
  </br>
</form>
<?php include "includes/footer.php"; ?>
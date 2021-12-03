<?php include('includes/header.php'); ?>
<form rel="form" action="create.php" method="POST">
  <div class="form-group">
    <div class="form-group">
      <label>Title*</label>
      <input type="text" class="form-control" name="title" placeholder="Enter Topic Title" />
    </div>
    <label>Category*</label>
    <select class="form-control" name="category">
        <?php foreach(getCatagories() as $category) : ?>
          <option value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label style="display: block;">Topic Body*</label>
    <textarea
      id="body"
      rows="6"
      cols="80"
      class="from-control"
      name="body"
      placeholder="Tell us about Yourself (optional)"
    ></textarea>
    <script>
      CKEDITOR.replace("body");
    </script>
  </div>
  <button name="do_create" type="submit" class="btn btn-default">Submit</button>
</form>
<?php include('includes/footer.php'); ?>

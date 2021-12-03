</div>
</div>
</div>
<!-- Login Form -->
<div class="col-md-4">
  <div class="sidebar">
    <div class="block">
      <?php if(isLoggedIn()) : ?>
        <div class="userdata">
          Welcome, <?=getUserData()['username']?>
        </div>
        <br />
        <form role="form" action="logout.php" method="POST">
          <input type="submit" name="do_logout" value="Logout" class="btn btn-primary">
        </form>
      <?php else : ?>
        <h3>Login Form</h3>
        <form role="form" action="login.php" method="POST">
          <div class="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control" placeholder="Enter Username" />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Enter Password" />
          </div>
          <button name="do_login" type="submit" class="btn btn-primary">Lgoin</button>
          <a class="btn btn-default" href="register.php">Create Account</a>
        </form>
      <?php endif ?>
    </div>
    <div class="block">
      <h3>Categories</h3>
      <div class="list-group">
        <a href="topics.php" class="list-group-item <?=is_active(null)?>">All Topics<span class="badge pull-right">14</span></a>
        <?php foreach(getCatagories() as $category) : ?>
          <a href="topics.php?category=<?=$category['id']?>" class="list-group-item <?=is_active($category['id'])?>"><?=$category['name']?><span class="badge pull-right">4</span></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /.container -->

<script src="<?=BASE_URI?>templates/js/jquery.min.js"></script>
<script src="<?=BASE_URI?>templates/js/bootstrap.min.js"></script>
</body>

</html>
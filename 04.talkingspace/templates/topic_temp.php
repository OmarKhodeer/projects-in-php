<?php include('includes/header.php') ?>
<ul id="topics" class="list-unstyled">
  <li id="main-topic" class="topic">
    <div clas="row">
      <div class="col-md-2">
        <div class="user-info">
          <img class="avatar img-responsive" src="img/avatar.png" />
          <ul class="list-unstyled">
            <li><strong>OmarKho</strong></li>
            <li>43 Posts</li>
            <li><a href="profile.php">profile</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10">
        <div class="topic-content pull-right">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quod veniam reprehenderit distinctio
            corrupti beatae eaque quos, aliquid dolores doloribus eum voluptatem vel facilis vitae eius et, temporibus
          </p>
        </div>
      </div>
    </div>
  </li>

  <div class="clearfix"></div>
  <li class="topic">
    <div clas="row">
      <div class="col-md-2">
        <div class="user-info">
          <img class="avatar img-responsive" src="img/avatar.png" />
          <ul class="list-unstyled">
            <li><strong>OmarKho</strong></li>
            <li>43 Posts</li>
            <li><a href="profile.php">profile</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10">
        <div class="topic-content pull-right">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quod veniam reprehenderit distinctio
            corrupti beatae eaque quos, aliquid dolores doloribus eum voluptatem vel facilis vitae eius et, temporibus
          </p>
        </div>
      </div>
    </div>
  </li>
  <div class="clearfix"></div>
</ul>
<h3>Reply To Topic</h3>
<?php if(isLoggedIn()) : ?>
  <form role="form" action="topic.php?id=<?=$topic->id?>" method="POST">
    <div class="form-group">
      <textarea
        id="reply"
        rows="6"
        cols="80"
        class="from-control"
        name="reply"
        placeholder="Tell us about Yourself (optional)"
      ></textarea>
      <script>
        CKEDITOR.replace("reply");
      </script>
    </div>
    <button name="do_reply" type="submit" class="btn btn-default">Submit</button>
  </form>
<?php else : ?>
  <p>Please Login to Reply</p>
<?php endif ?>
<?php include('includes/footer.php') ?>

<?php include('includes/header.php') ?>
<?php if($topics) : ?>
  <ul id="topics" class="list-unstyled">
    <?php foreach($topics as $topic) : ?>
      <li class="topic">
        <div clas="row">
          <div class="col-md-2">
            <img class="avatar pull-left img-responsive" src="<?=BASE_URI?>images/avatars/<?=$topic['avatar']?>" />
          </div>
          <div class="col-md-10">
            <div class="topic-content">
              <h3><a href="topic.php"><?=$topic['title']?></a></h3>
              <div class=" topic-info">
                <a href="topics.php?category=<?=urlFormat($topic['category_id'])?>"><?=$topic['name']?></a> >> 
                <a href="topics.php?user=<?=urlFormat($topic['user_id'])?>"><?=$topic['username']?></a> >> Posted
                on: <?=formatDate($topic['create_date'])?>
                <span class="badge pull-right"><?=replyCount($topic['id'])?> Replies</span>
              </div>
            </div>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else : ?>
  <p>There is no Topics to display</p>
<?php endif; ?>
<h3>Form statistics</h3>
<ul class="list-unstyled">
  <li>Total Number of Users: <strong><?=$totalUsers?></strong></li>
  <li>Total Number of Users: <strong><?=$totalTopics?></strong></li>
  <li>Total Number of Categories: <strong><?=$totalCategories?></strong></li>
</ul>
<?php include('includes/footer.php') ?>
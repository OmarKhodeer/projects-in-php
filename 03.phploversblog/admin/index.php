<?php include "includes/header.php"; ?>
<?php 
// Create Database Object
$db = new Database();
// Create query
$query = "SELECT posts.*, categories.name FROM posts, categories WHERE posts.category = categories.id ORDER BY date DESC";
// Run query
$posts = $db->select($query);

$query = "SELECT * FROM categories";
$catagories = $db->select($query);
?>
<!-- Posts Tavle -->
<table class="table">
    <tr>
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
    </tr>
    <?php if($posts) : ?>
        <?php while($row = $posts->fetch_assoc()) : ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><a href="edit_post.php?id=<?=$row['id']?>"><?=$row['post_title']?></a></td>
                <td><?=$row['name']?></td>
                <td><?=$row['author']?></td>
                <td><?=formatDate($row['date'])?></td>
            </tr>
        <?php endwhile; ?>
    <?php endif; ?>
</table>

<!-- Category Tavle -->
<table class="table">
    <tr>
        <th>Category ID#</th>
        <th>Category Name</th>
    </tr>
    <?php if($catagories) : ?>
        <?php while($row = $catagories->fetch_assoc()) : ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><a href="edit_category.php?id=<?=$row['id']?>"><?=$row['name']?></a></td>
            </tr>
        <?php endwhile; ?>
    <?php endif; ?>
</table>
<?php include "includes/footer.php"; ?>
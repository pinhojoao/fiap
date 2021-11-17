<?php

require_once('config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT p.image, p.id as post_id, c.id as category_id, p.title, p.content, DATE_FORMAT(p.created_at, '%d/%m/%Y') as created_at, c.name as category_name FROM posts p
        LEFT JOIN categories c ON c.id = p.category_id 
        WHERE p.id = :id";
$stmt = $conn->prepare($sql);
$id = $_REQUEST['id'];
$stmt->bindParam('id', $id);
$stmt->execute();
$post = $stmt->fetch();
?>

<ul>
    <li><a href="index.php">HOME</a> ></li>
    <li><a href="index.php?categoria=<?php echo $post['category_id']?>"><?php echo $post['category_name']?></a></li>
</ul>

<img src="<?php echo $post['image']?>">
<h2><?php echo $post['created_at'] ?> - <?php echo $post['title'] ?></h2>
<div>
    <?php echo $post['content'] ?>
</div>
<a href="javascript: history.go(-1)">Voltar</a>



<?php require_once('rodape.php') ?>
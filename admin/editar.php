<?php

require_once('../config/bootstrap.php');
include_once('menu.php');
$sql = "SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y') as created_at, `image`
        FROM posts
        WHERE id = :id";
$stmt = $conn->prepare($sql);
$id = $_POST['id'];
$stmt->bindParam('id', $id);
$stmt->execute();
$post = $stmt->fetch();

$sql = "UPDATE posts SET category_id = :category_id, title = :title, content = :content, `image` = :img, created_at = :created_at WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam('category_id', $_POST['category_id']);
$stmt->bindParam('title', $_POST['title']);
$stmt->bindParam('content', $_POST['content']);
if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    $image = uploadFile($_FILES['image']);
} else {
    $image = $post['image'];
}
$stmt->bindParam('img', $image);
$created_at = formatDate($_POST['created_at']);
$stmt->bindParam('created_at', $created_at);
$stmt->bindParam('id', $id);
$stmt->execute();
?>

<div class="container">
    <h1>Post atualizado com sucesso!</h1>
    <div class="row">
        <a class="btn waves-effect waves-light" type="submit" href="index.php">Concluido</a>
    </div>
</div>

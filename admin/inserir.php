<?php

require_once('../config/bootstrap.php');

$sql = "INSERT INTO posts (category_id, title, content, `image`, created_at) VALUE (:category_id, :title, :content, :img, :created_at)";
$stmt = $conn->prepare($sql);
$stmt->bindParam('category_id', $_POST['category_id']);
$stmt->bindParam('title', $_POST['title']);
$stmt->bindParam('content', $_POST['content']);
$image = uploadFile($_FILES['image']);
$stmt->bindParam('img', $image);
$created_at = formatDate($_POST['created_at']);
$stmt->bindParam('created_at', $created_at);
$stmt->execute();
?>

<h1>Post enviado com sucesso!</h1>
<a href="index.php">Voltar</a>